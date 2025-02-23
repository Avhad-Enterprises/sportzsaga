<?php

namespace App\Controllers;

use App\Models\InstagramModel;
use CodeIgniter\Controller;
use Instagram\User\Media;
use Instagram\User\MediaPublish;
use App\Models\InstagramSchedulePostModel;
use CodeIgniter\I18n\Time;
use CURLFile;

class InstagramController extends Controller
{
    protected $instagramModel;
    protected $instagramSchedulePostModel;

    public function index()
    {
        return view('socialmedia_view');
    }

    public function instagram()
    {
        $model = new InstagramModel();
        $data['instagramposts'] = $model->getallinstagramposts();
        $schedule = new InstagramSchedulePostModel();
        $data['instagramscheduleposts'] = $schedule->getallinstagramscheduleposts();
        return view('instagram', $data);
    }

    public function postToInstagram()
    {
        if ($this->request->getMethod() === 'post') {
            $publishTo = $this->request->getPost('PUBLISH_TO') ?? 'FEED';
            $mediaType = $this->request->getPost('MEDIA_TYPE') ?? 'IMAGE';
            if (!in_array($mediaType, ['IMAGE', 'REELS', 'CAROUSEL_ALBUM'])) {
                return redirect()->back()->with('error', 'Invalid media type selected.');
            }
            $caption = $this->request->getPost('caption');
            $tags = $this->request->getPost('tags');
            $location = $this->request->getPost('location');

            $mediaFile = $this->request->getFile('media');

            if ($mediaFile->isValid() && !$mediaFile->hasMoved()) {
                $newName = $mediaFile->getRandomName();
                $mediaFile->move(FCPATH . 'uploads', $newName);

                // Generate a public URL for the image
                $mediaUrl =  $this->uploadToPublicHost(FCPATH . 'uploads/' . $newName);
                if (!$mediaUrl) {
                    return redirect()->back()->with('error', 'Failed to upload image to public host');
                }

                // Post to Instagram
                $instagramResult = $this->postMediaToInstagram($mediaUrl, $caption, $location, $tags, $mediaType, $publishTo);

                if ($instagramResult['success']) {
                    // Save to database
                    $model = new InstagramModel();
                    $data = [
                        'user_id' => env('INSTAGRAM_USER_ID'), // Replace with actual user ID
                        'post_id' => $instagramResult['post_id'],
                        'image_url' => $mediaUrl,
                        'caption' => $caption,
                        'location' => $location,
                        'hashtags' => $tags,
                        'post_type' => "{$publishTo}_{$mediaType}"
                    ];

                    if ($model->insert($data)) {
                        return redirect()->to('instagram')->with('success', 'Posted to Instagram and saved to database.');
                    } else {
                        return redirect()->to('instagram/addnewpost')->with('error', 'Posted to Instagram but failed to save to database.');
                    }
                } else {
                    return redirect()->to('instagram/addnewpost')->with('error', $instagramResult['message']);
                }
            } else {
                return redirect()->to('instagram/addnewpost')->with('error', 'Invalid file upload.');
            }
        }

        return view('instagram');
    }

    public function addnewpost()
    {
        return view('instagram_post');
    }

    public function schedulenewpost()
    {
        $schedule = new InstagramSchedulePostModel();
        $data['instagramscheduleposts'] = $schedule->where('postMediaToInstagram', 'pending')->getallinstagramscheduleposts();
        return view('instagram_schedule_posts', $data);
    }

    private function uploadToPublicHost($localFilePath)
    {
        $client_id = env('IMGUR_CLIENT_ID');

        // Determine if the file is a video or an image
        $fileInfo = finfo_open(FILEINFO_MIME_TYPE);
        $mimeType = finfo_file($fileInfo, $localFilePath);
        finfo_close($fileInfo);

        $isVideo = strpos($mimeType, 'video') === 0;

        $fileContent = file_get_contents($localFilePath);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.imgur.com/3/upload');
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Client-ID ' . $client_id));

        // If it's a video, we need to send it as a file, not as base64
        if ($isVideo) {
            $postFields = array(
                'video' => new CURLFile($localFilePath, $mimeType, basename($localFilePath))
            );
        } else {
            $postFields = array(
                'image' => base64_encode($fileContent)
            );
        }

        curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);

        $response = curl_exec($ch);
        $curl_error = curl_error($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($response === false) {
            log_message('error', 'cURL error: ' . $curl_error);
            return false;
        }

        if ($http_code != 200) {
            log_message('error', 'Imgur API returned non-200 status code: ' . $http_code);
            log_message('error', 'Response: ' . $response);
            return false;
        }

        $resp = json_decode($response);

        if (json_last_error() !== JSON_ERROR_NONE) {
            log_message('error', 'Failed to parse JSON response: ' . json_last_error_msg());
            log_message('error', 'Response: ' . $response);
            return false;
        }

        if (!isset($resp->success) || !$resp->success) {
            log_message('error', 'Imgur upload failed: ' . json_encode($resp));
            return false;
        }

        if ($isVideo) {
            if (!isset($resp->data->mp4)) {
                log_message('error', 'Imgur response does not contain video link: ' . json_encode($resp));
                return false;
            }
            return $resp->data->mp4;
        } else {
            if (!isset($resp->data->link)) {
                log_message('error', 'Imgur response does not contain image link: ' . json_encode($resp));
                return false;
            }
            return $resp->data->link;
        }
    }

    private function postMediaToInstagram($mediaUrl, $caption, $location, $tags, $mediaType, $publishTo)
    {
        $config = [
            'user_id' => env('INSTAGRAM_USER_ID'),
            'access_token' => env('INSTAGRAM_ACCESS_TOKEN'),
        ];

        try {
            $media = new Media($config);

            $containerParams = [
                'caption' => $caption,
                'location_id' => $location,
            ];

            if ($mediaType === 'IMAGE') {
                $containerParams['image_url'] = $mediaUrl;
            } elseif ($mediaType === 'REELS') {
                $containerParams['video_url'] = $mediaUrl;
                $containerParams['media_type'] = 'REELS';
            } elseif ($mediaType === 'CAROUSEL_ALBUM') {
                $containerParams['image_url'] = $mediaUrl;
                $containerParams['media_type'] = 'CAROUSEL';
                $containerParams['is_carousel_item'] = TRUE;
            }

            if ($publishTo === 'STORIES') {
                $containerParams['is_stories'] = TRUE;
                $containerParams['media_type'] = $publishTo;
            } else {
                $containerParams['is_stories'] = FALSE;
            }

            $mediaContainer = $media->create($containerParams);

            if (isset($mediaContainer['id'])) {
                $containerId = $mediaContainer['id'];
                $mediaPublish = new MediaPublish($config);

                // Implement retry logic
                $maxRetries = 10;
                $retryDelay = 30; // seconds

                for ($i = 0; $i < $maxRetries; $i++) {
                    $publishResult = $mediaPublish->create($containerId);

                    if (isset($publishResult['id'])) {
                        log_message('info', 'Successfully posted to Instagram');
                        return [
                            'success' => true,
                            'post_id' => $publishResult['id'],
                            'message' => 'Successfully posted to Instagram'
                        ];
                    } else {
                        $errorMessage = json_encode($publishResult);
                        if (strpos($errorMessage, 'The media is not ready to be published') !== false) {
                            log_message('info', "Attempt {$i}: Media not ready. Retrying in {$retryDelay} seconds.");
                            sleep($retryDelay);
                        } else {
                            break; // Exit loop if it's a different error
                        }
                    }
                }

                $errorMessage = 'Failed to publish media after ' . $maxRetries . ' attempts: ' . json_encode($publishResult);
                log_message('error', $errorMessage);
                return [
                    'success' => false,
                    'message' => $errorMessage
                ];
            } else {
                $errorMessage = 'Failed to create media container: ' . json_encode($mediaContainer);
                log_message('error', $errorMessage);
                return [
                    'success' => false,
                    'message' => $errorMessage
                ];
            }
        } catch (\Exception $e) {
            $errorMessage = 'Error posting to Instagram: ' . $e->getMessage();
            if (method_exists($e, 'getRawResponse')) {
                $errorMessage .= ' Raw response: ' . $e->getRawResponse();
            }
            log_message('error', $errorMessage);
            return [
                'success' => false,
                'message' => $errorMessage
            ];
        }
    }

    public function __construct()
    {
        $this->instagramModel = new InstagramModel();
        $this->instagramSchedulePostModel = new InstagramSchedulePostModel(); // Initialize the model
    }

    public function schedulePost()
    {
        if ($this->request->getMethod() === 'post') {
            $mediaFile = $this->request->getFile('media');
            if ($mediaFile->isValid() && !$mediaFile->hasMoved()) {
                $newName = $mediaFile->getRandomName();
                $mediaFile->move(FCPATH . 'uploads', $newName);
                $mediaUrl = $this->uploadToPublicHost(FCPATH . 'uploads/' . $newName);

                if ($mediaUrl) {
                    $data = [
                        'user_id' => env('INSTAGRAM_USER_ID'),
                        'image_url' => $mediaUrl,
                        'caption' => $this->request->getPost('caption'),
                        'location' => $this->request->getPost('location'),
                        'hashtags' => $this->request->getPost('tags'),
                        'post_type' => $this->request->getPost('PUBLISH_TO') . '_' . $this->request->getPost('MEDIA_TYPE'),
                        'Publish_at' => $this->request->getPost('Publish_at'),
                        'uploadToPublicHost_status' => 'success',
                        'postMediaToInstagram' => 'pending'
                    ];

                    $scheduleModel = new InstagramSchedulePostModel();
                    $scheduleModel->insert($data);
                    return redirect()->to('instagram')->with('success', 'Post scheduled successfully.');
                } else {
                    return redirect()->back()->with('error', 'Failed to upload image to public host');
                }
            }
        }
        return view('instagram_schedule_posts');
    }

    public function scheduleAllPosts()
    {
        log_message('error', 'scheduleAllPosts method called');
        if ($this->request->getMethod() === 'post') {
            log_message('error', 'POST method detected');
            $scheduleModel = new InstagramSchedulePostModel();
            $mediaFiles = $this->request->getFiles('media');
            log_message('error', 'Files: ' . print_r($mediaFiles, true));
            $captions = $this->request->getPost('caption');
            $publishAt = $this->request->getPost('Publish_at');
            $publishTo = $this->request->getPost('PUBLISH_TO');
            $mediaType = $this->request->getPost('MEDIA_TYPE');

            $success = true;
            $message = '';

            foreach ($mediaFiles['media'] as $index => $mediaFile) {
                log_message('error', 'Processing post #' . ($index + 1));
                if ($mediaFile->isValid() && !$mediaFile->hasMoved()) {
                    $newName = $mediaFile->getRandomName();
                    log_message('error', 'Media file valid, new name: ' . $newName);
                    $mediaFile->move(FCPATH . 'uploads', $newName);
                    $mediaUrl = $this->uploadToPublicHost(FCPATH . 'uploads/' . $newName);

                    if ($mediaUrl) {
                        $data = [
                            'user_id' => env('INSTAGRAM_USER_ID'),
                            'image_url' => $mediaUrl,
                            'caption' => $captions[$index],
                            'post_type' => $publishTo[$index] . '_' . $mediaType[$index],
                            'Publish_at' => $publishAt[$index],
                            'uploadToPublicHost_status' => 'success',
                            'postMediaToInstagram' => 'pending'
                        ];

                        if (!$scheduleModel->insert($data)) {
                            $success = false;
                            $message = 'Error scheduling post #' . ($index + 1);
                            break;
                        }
                    } else {
                        $success = false;
                        $message = 'Failed to upload image for post #' . ($index + 1);
                        break;
                    }
                } else {
                    $success = false;
                    $message = 'Invalid media file for post #' . ($index + 1);
                    break;
                }
            }


            log_message('error', 'Success: ' . $success . ', Message: ' . $message);
            return $this->response->setJSON(['success' => $success, 'message' => $message]);
        }

        log_message('error', 'Invalid request method');
        return redirect()->to('instagram')->with('error', 'Invalid request method');
    }




    public function refreshScheduledPosts()
    {
        $now = new \DateTime();
        log_message('info', 'Refresh button clicked. Current time: ' . $now->format('Y-m-d H:i:s'));

        // Fetch scheduled posts that are pending and need to be published
        $scheduledPosts = $this->instagramSchedulePostModel->where('postMediaToInstagram', 'pending')
            ->where('Publish_at <=', $now->format('Y-m-d H:i:s'))
            ->findAll();

        if ($scheduledPosts) {
            foreach ($scheduledPosts as $post) {
                $config = [
                    'user_id' => env('INSTAGRAM_USER_ID'),
                    'access_token' => env('INSTAGRAM_ACCESS_TOKEN'),
                ];

                log_message('info', 'Attempting to post media to Instagram with the following URL: ' . $post['image_url']);

                try {
                    $media = new Media($config);

                    $containerParams = [
                        'caption' => $post['caption'],
                        'location_id' => $post['location'],
                    ];

                    if ($post['post_type'] === 'FEED_IMAGE' || $post['post_type'] === 'STORIES_IMAGE') {
                        $containerParams['image_url'] = $post['image_url'];
                    } elseif ($post['post_type'] === 'FEED_REELS' || $post['post_type'] === 'STORIES_REELS') {
                        $containerParams['video_url'] = $post['image_url'];
                        $containerParams['media_type'] = 'REELS';
                    } elseif ($post['post_type'] === 'CAROUSEL_ALBUM') {
                        $containerParams['image_url'] = $post['image_url'];
                        $containerParams['media_type'] = 'CAROUSEL';
                        $containerParams['is_carousel_item'] = TRUE;
                    }

                    if ($post['post_type'] === 'STORIES_IMAGE' || $post['post_type'] === 'STORIES_REELS') {
                        $containerParams['is_stories'] = TRUE;
                        $containerParams['media_type'] = 'STORIES';
                    } else {
                        $containerParams['is_stories'] = FALSE;
                    }

                    log_message('info', 'Final containerParams being sent: ' . json_encode($containerParams));

                    $mediaContainer = $media->create($containerParams);

                    if (isset($mediaContainer['id'])) {
                        $containerId = $mediaContainer['id'];
                        $mediaPublish = new MediaPublish($config);

                        // Implement retry logic
                        $maxRetries = 5;
                        $retryDelay = 20; // seconds

                        for ($i = 0; $i < $maxRetries; $i++) {
                            $publishResult = $mediaPublish->create($containerId);

                            if (isset($publishResult['id'])) {

                                // Update the database with success
                                $this->instagramSchedulePostModel->update($post['id'], [
                                    'post_id' => $publishResult['id'],
                                    'postMediaToInstagram' => 'success'
                                ]);

                                $instagramModel = new InstagramModel();
                                $data = [
                                    'user_id' => $post['user_id'],
                                    'post_id' => $publishResult['id'],
                                    'image_url' => $post['image_url'],
                                    'caption' => $post['caption'],
                                    'location' => $post['location'],
                                    'hashtags' => $post['hashtags'],
                                    'post_type' => $post['post_type']
                                ];
                                $instagramModel->insert($data);

                                log_message('info', 'Successfully posted to Instagram');
                            } else {
                                $errorMessage = json_encode($publishResult);
                                if (strpos($errorMessage, 'The media is not ready to be published') !== false) {
                                    log_message('info', "Attempt {$i}: Media not ready. Retrying in {$retryDelay} seconds.");
                                    sleep($retryDelay);
                                } else {
                                    break; // Exit loop if it's a different error
                                }
                            }
                        }

                        /*
        
                        $errorMessage = 'Failed to publish media after ' . $maxRetries . ' attempts: ' . json_encode($publishResult);
                        log_message('error', $errorMessage);
        
                        // Update the database with error
                        $this->instagramSchedulePostModel->update($post['id'], [
                            'postMediaToInstagram' => 'error'
                        ]);
                        */
                    } else {
                        $errorMessage = 'Failed to create media container: ' . json_encode($mediaContainer);
                        log_message('error', $errorMessage);

                        // Update the database with error
                        $this->instagramSchedulePostModel->update($post['id'], [
                            'postMediaToInstagram' => 'error'
                        ]);
                    }
                } catch (\Exception $e) {
                    $errorMessage = 'Error posting to Instagram: ' . $e->getMessage();
                    if (method_exists($e, 'getRawResponse')) {
                        $errorMessage .= ' Raw response: ' . $e->getRawResponse();
                    }
                    log_message('error', $errorMessage);

                    // Update the database with error
                    $this->instagramSchedulePostModel->update($post['id'], [
                        'postMediaToInstagram' => 'error'
                    ]);
                }
            }
            return redirect()->to('instagram');
        } else {
            log_message('info', 'Scheduled posts refreshed, No post Found');
            return redirect()->to('instagram')->with('success', 'Scheduled posts refreshed.');
        }
    }
}
