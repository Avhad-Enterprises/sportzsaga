<?php

namespace App\Controllers;

use App\Models\onlinestoremodal;
use App\Models\HomeLogoModel;
use App\Models\HomeCollectionModel;
use App\Models\HomeProductModel;
use App\Models\HomeBlogModel;
use App\Models\HomeCarousel2Model;
use App\Models\HomeImageModel;
use App\Models\PolicyModel;
use App\Models\HeaderFourthModel;
use App\Models\HeaderSecondModel;
use App\Models\HeaderThirdModel;
use App\Models\HeaderFirstModel;
use App\Models\Footer_model;
use App\Models\MemberModel;
use App\Models\MarqueeTextModel;
use App\Models\Productselection;
use Google\Cloud\Storage\StorageClient;

class Store extends BaseController
{
    protected $aboutModel;
    protected $logoModel;

    public function __construct()
    {
        $this->aboutModel = new onlinestoremodal();
        $this->logoModel = new \App\Models\HomeLogoModel();
        helper(['url', 'filesystem']);
    }

    public function index()
    {
        return view('online_store');
    }

    public function edit_onlinestore()
    {
        $modal = new onlinestoremodal();
        $homeImageModel = new HomeImageModel();

        $data['mewproducts'] = $modal->GetallProductsData();

        $data['about'] = $modal->getabout();
        $data['tags'] = $modal->getTags();
        $data['products'] = $modal->getproduct();
        $data['carousels'] = $modal->GetallCarouselData();
        $data['settings'] = $modal->getallblogs();
        $data['contact'] = $modal->getcontact();
        $data['search'] = $modal->getsearch();
        $data['wishlist_page'] = $modal->getwishlistpage();
        $data['cart_page'] = $modal->getcartpage();
        $data['checkout_page'] = $modal->getcheckoutpage();
        $data['carousels'] = $modal->GetallCarouselData();
        $data['blogs'] = $modal->GetallBlogsData();
        $data['products'] = $modal->GetallProductsData();
        $data['collections'] = $modal->GetallCollectionsData();
        $data['members'] = $modal->getAllMembers();
        $data['tracking'] = $modal->gettrackingpage();
        $data['error'] = $modal->geterror_page();
        $data['page_data'] = $modal->getsingleblogs();
        $data['page1_data'] = $modal->getoscollection();
        $data['logos'] = $modal->getoslogo();
        $data['product_setting'] = $modal->getproduct_setting();
        $data['bundles'] = $modal->getAllBundle();
        $data['dataimages'] = $modal->homeimage();
        $data['policies'] = $modal->getAllpolicies();
        $data['footer_data'] = $modal->getAllfooter();
        $data['pages'] = $modal->getpages();
        $data['availableCollections'] = $modal->getAllAvailableCollections();
        $data['availableProducts'] = $modal->getAllAvailableProducts();
        $data['selectedProducts'] = $modal->getHomeProductIds();
        $data['selectedBlogs'] = $modal->getHomeBlogIds();
        $data['carousel2'] = $modal->getAllCarousel2();
        $data['marqueeTexts'] = $modal->getAllmarqueeText();
        $data['marqueebottomText'] = $modal->getAllmarqueebottomText();
        $data['email_pop_up'] = $modal->getAllEmail_POP_UP();
        $data['availableCollections'] = $modal->getAllAvailableCollections();
        $data['selectedCollections'] = $modal->getHomeCollectionIds();
        $data['product_list'] = $modal->Getproductsection(); // Fixing the undefined variable issue
        // Fetch Instagram posts
        $accessToken = 'IGQWRPTVE0S2lUS3BpYWhNekZAvbnppeGh6OWFXT1F0VTR6Tld2UGduV0UyYU9tQjAtejY5WWxLQTZAaa3N1cmVwel9jX1FoNWFESk9zbm4yMnE2TWhJYzFrWW9PVnBpcmswb3JJVnNKY3hsUUJUTE9JbXpLLU1LTEEZD';
        $apiUrl = "https://graph.instagram.com/me/media?fields=id,media_type,media_url,thumbnail_url,caption,timestamp,like_count,comments_count,children{media_url}&access_token={$accessToken}";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);
        curl_close($ch);

        $responseData = json_decode($response, true);

        if (isset($responseData['data'])) {
            // Process each post to ensure all required fields exist
            $processedPosts = array_map(function ($post) {
                return [
                    'id' => $post['id'] ?? '',
                    'media_url' => $post['media_url'] ?? '',
                    'caption' => isset($post['caption']) ? $post['caption'] : 'No caption',
                    'media_type' => $post['media_type'] ?? '',
                    'timestamp' => $post['timestamp'] ?? '',
                    'like_count' => $post['like_count'] ?? 0,
                    'comments_count' => $post['comments_count'] ?? 0
                ];
            }, $responseData['data']);

            $data['posts'] = $processedPosts;
        } else {
            $data['posts'] = [];
            log_message('error', 'Instagram API Error: ' . print_r($responseData, true));
        }

        $headerFirstModel = new HeaderFirstModel();
        $headerSecondModel = new HeaderSecondModel();
        $headerThirdModel = new HeaderThirdModel();
        $headerFourthModel = new HeaderFourthModel();

        // Fetch the first header data
        $data['headerFirstItems'] = $headerFirstModel->GetHeaderFirstData();

        // For each header first, fetch associated second, third, and fourth headers
        foreach ($data['headerFirstItems'] as &$header) {
            // Fetch associated second headers for each first header
            $header['headerSecondItems'] = $headerSecondModel->GetHeaderSecondData($header['id']);

            // For each second header, fetch associated third headers
            foreach ($header['headerSecondItems'] as &$secondHeader) {
                $secondHeader['headerThirdItems'] = $headerThirdModel->GetHeaderThirdData($secondHeader['id']);

                // For each third header, fetch associated fourth headers
                foreach ($secondHeader['headerThirdItems'] as &$thirdHeader) {
                    $thirdHeader['headerFourthItems'] = $headerFourthModel->GetHeaderFourthData($thirdHeader['id']);
                }
            }
        }

        // Get collections data
        $data['collections'] = $modal->GetAllCollections();

        // Process the data for display
        if ($data['about']) {
            for ($i = 1; $i <= 5; $i++) {
                $iconKey = 'icon' . $i;
                if (!empty($data['about'][$iconKey])) {
                    $data['about'][$iconKey] = json_decode($data['about'][$iconKey], true);
                }
            }

            $data['about']['info_data1'] = json_decode($data['about']['info_data1'], true);
            $data['about']['info_data2'] = json_decode($data['about']['info_data2'], true);
            $data['about']['info_data3'] = json_decode($data['about']['info_data3'], true);
        }

        return view('edit_onlinestore', $data);
    }

    public function addcarousel()
    {
        $session = session();

        log_message('info', 'addcarousel method started.');

        // Google Cloud Storage Setup
        try {
            log_message('info', 'Setting up Google Cloud Storage.');
            $storage = new \Google\Cloud\Storage\StorageClient([
                'keyFilePath' => WRITEPATH . 'public/mkvgsc.json',
                'projectId' => 'peak-tide-441609-r1',
            ]);
            $bucketName = 'mkv_imagesbackend';
            $bucket = $storage->bucket($bucketName);
        } catch (\Exception $e) {
            log_message('error', 'Google Cloud Storage setup failed: ' . $e->getMessage());
            $session->setFlashdata('toast', [
                'type' => 'error',
                'message' => 'Failed to connect to Google Cloud Storage.',
            ]);
            return redirect()->back();
        }

        $carouselImage = $this->request->getFile('carousel_image');
        $mobileImage = $this->request->getFile('carousel_image_mobile');
        $carouselImageUrl = '';
        $mobileImageUrl = '';

        try {
            // Upload Carousel Image
            if ($carouselImage && $carouselImage->isValid() && !$carouselImage->hasMoved()) {
                log_message('info', 'Uploading carousel image.');
                $carouselFileName = 'carousel/' . uniqid() . '_' . $carouselImage->getClientName();
                $bucket->upload(
                    fopen($carouselImage->getTempName(), 'r'),
                    [
                        'name' => $carouselFileName,
                        'predefinedAcl' => 'publicRead',
                    ]
                );
                $carouselImageUrl = sprintf('https://storage.googleapis.com/%s/%s', $bucket->name(), $carouselFileName);
                log_message('info', 'Carousel image uploaded: ' . $carouselImageUrl);
            } else {
                log_message('info', 'No valid carousel image provided.');
            }

            // Upload Mobile Image
            if ($mobileImage && $mobileImage->isValid() && !$mobileImage->hasMoved()) {
                log_message('info', 'Uploading mobile image.');
                $mobileFileName = 'carousel/mobile/' . uniqid() . '_' . $mobileImage->getClientName();
                $bucket->upload(
                    fopen($mobileImage->getTempName(), 'r'),
                    [
                        'name' => $mobileFileName,
                        'predefinedAcl' => 'publicRead',
                    ]
                );
                $mobileImageUrl = sprintf('https://storage.googleapis.com/%s/%s', $bucket->name(), $mobileFileName);
                log_message('info', 'Mobile image uploaded: ' . $mobileImageUrl);
            } else {
                log_message('info', 'No valid mobile image provided.');
            }
        } catch (\Exception $e) {
            log_message('error', 'Image upload failed: ' . $e->getMessage());
            $session->setFlashdata('toast', [
                'type' => 'error',
                'message' => 'Failed to upload images: ' . $e->getMessage(),
            ]);
            return redirect()->back();
        }

        // Prepare Carousel Data
        $carouselData = [
            'title' => $this->request->getPost('carousel_title'),
            'description' => $this->request->getPost('carousel_description'),
            'selection_type' => $this->request->getPost('select_link'),
            'product_id' => $this->request->getPost('selected_product') ?: null,
            'collection_id' => $this->request->getPost('selected_collection') ?: null,
            'image' => $carouselImageUrl,
            'image_mobile' => $mobileImageUrl,
            'visibility' => $this->request->getPost('carousel_visibility') == '1' ? 1 : 0,
            'added_by' => $session->get('user_id'),
            'created_at' => date('Y-m-d H:i:s'),
        ];

        $carouselModel = new onlinestoremodal();
        if ($carouselModel->insert($carouselData, false)) { // Using false prevents re-insertion
            return redirect()->back()->with('success', 'Carousel added successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to save carousel data.');
        }
    }

    public function update_carousel($id)
    {
        $carouselModel = new onlinestoremodal();
        $session = session();

        $carousel = $carouselModel->find($id);

        if (!$carousel) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Carousel not found.',
            ]);
        }

        // File upload handling
        $carouselImage = $this->request->getFile('carousel_image');
        $mobileImage = $this->request->getFile('carousel_image_mobile');
        $carouselImageUrl = $carousel['image'];
        $mobileImageUrl = $carousel['image_mobile'];

        try {
            if ($carouselImage && $carouselImage->isValid() && !$carouselImage->hasMoved()) {
                $carouselFileName = 'carousel/' . uniqid() . '_' . $carouselImage->getClientName();
                $storage = new \Google\Cloud\Storage\StorageClient([
                    'keyFilePath' => WRITEPATH . 'public/mkvgsc.json',
                    'projectId' => 'peak-tide-441609-r1',
                ]);
                $bucket = $storage->bucket('mkv_imagesbackend');
                $bucket->upload(
                    fopen($carouselImage->getTempName(), 'r'),
                    ['name' => $carouselFileName, 'predefinedAcl' => 'publicRead']
                );
                $carouselImageUrl = sprintf('https://storage.googleapis.com/%s/%s', $bucket->name(), $carouselFileName);
            }

            if ($mobileImage && $mobileImage->isValid() && !$mobileImage->hasMoved()) {
                $mobileFileName = 'carousel/mobile/' . uniqid() . '_' . $mobileImage->getClientName();
                $storage = new \Google\Cloud\Storage\StorageClient([
                    'keyFilePath' => WRITEPATH . 'public/mkvgsc.json',
                    'projectId' => 'peak-tide-441609-r1',
                ]);
                $bucket = $storage->bucket('mkv_imagesbackend');
                $bucket->upload(
                    fopen($mobileImage->getTempName(), 'r'),
                    ['name' => $mobileFileName, 'predefinedAcl' => 'publicRead']
                );
                $mobileImageUrl = sprintf('https://storage.googleapis.com/%s/%s', $bucket->name(), $mobileFileName);
            }
        } catch (\Exception $e) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Failed to upload images: ' . $e->getMessage(),
            ]);
        }

        // Handle selection logic: If product is selected, collection should be NULL, and vice versa.
        $selectionType = $this->request->getPost('select_link');
        $productId = $this->request->getPost('selected_product') ?: null;
        $collectionId = $this->request->getPost('selected_collection') ?: null;

        if ($selectionType === 'product') {
            $collectionId = null; // Reset collection_id if product is selected
        } elseif ($selectionType === 'collection') {
            $productId = null; // Reset product_id if collection is selected
        }

        $updateData = [
            'title' => $this->request->getPost('carousel_title'),
            'description' => $this->request->getPost('carousel_description'),
            'selection_type' => $selectionType,
            'product_id' => $productId,
            'collection_id' => $collectionId,
            'image' => $carouselImageUrl,
            'image_mobile' => $mobileImageUrl,
            'visibility' => $this->request->getPost('carousel_visibility'),
            'updated_by' => $session->get('user_id'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        // Update data in database
        if ($carouselModel->update($id, $updateData)) {
            return redirect()->back()->with('success', 'Carousel updated successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to update carousel data.');
        }
    }

    public function delete_carousel($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('carousels'); // ✅ Corrected table name

        // Debug: Check if the ID exists before deleting
        $existing = $builder->where('id', $id)->get()->getRow();
        if (!$existing) {
            return $this->response->setJSON(['success' => false, 'message' => 'Carousel not found.']);
        }

        // Attempt deletion
        if ($builder->where('id', $id)->delete()) {
            return $this->response->setJSON(['success' => true, 'message' => 'Carousel deleted successfully.']);
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'Failed to delete carousel.']);
        }
    }

    public function SaveHomeImage()
    {
        try {
            helper(['form', 'url']);

            // Log incoming data for debugging
            log_message('info', 'Received Data: ' . json_encode($this->request->getPost()));

            $homeImageModel = new \App\Models\HomeImageModel();

            // Prepare data for saving
            $data = [
                'image_title1' => $this->request->getPost('image_title1'),
                'description1' => $this->request->getPost('description1'),
                'title2' => $this->request->getPost('title2'),
                'description2' => $this->request->getPost('description2'),
            ];

            // Initialize Google Cloud Storage
            $storage = new StorageClient([
                'keyFilePath' => WRITEPATH . 'public/mkvgsc.json',
                'projectId' => 'peak-tide-441609-r1',
            ]);
            $bucket = $storage->bucket('sportzsaga_imgs');

            // Handle file uploads
            foreach (['background_image1', 'background_image2'] as $field) {
                $file = $this->request->getFile($field);
                if ($file && $file->isValid() && !$file->hasMoved()) {
                    $fileName = 'backgrounds/' . uniqid() . '_' . $file->getClientName();
                    $object = $bucket->upload(
                        fopen($file->getTempName(), 'r'),
                        [
                            'name' => $fileName,
                            'predefinedAcl' => 'publicRead',
                        ]
                    );
                    $data[$field] = sprintf('https://storage.googleapis.com/%s/%s', $bucket->name(), $fileName);
                }
            }

            // Save or update the data (assumes one row for home_image, always with ID=1)
            $homeImageModel->update(1, $data);

            return $this->response->setJSON([
                'status' => true,
                'message' => 'Data saved successfully.',
            ]);
        } catch (\Exception $e) {
            log_message('error', 'Error saving data: ' . $e->getMessage());
            return $this->response->setJSON([
                'status' => false,
                'message' => 'Failed to save data: ' . $e->getMessage(),
            ]);
        }
    }

    public function add_policy()
    {
        if ($this->request->isAJAX()) {
            $policyModel = new PolicyModel();

            $data = [
                'policy_name' => $this->request->getPost('policy_name'),
                'policy_description' => $this->request->getPost('policy_description'),
                'policy_link' => $this->request->getPost('policy_link'),
            ];

            // Attempt to insert new policy data into the database
            if ($policyModel->insert($data)) {
                return $this->response->setJSON(['success' => true, 'message' => 'Policy added successfully.']);
            } else {
                return $this->response->setJSON(['success' => false, 'message' => 'Failed to add policy.']);
            }
        }

        return $this->response->setJSON(['success' => false, 'message' => 'Invalid request.']);
    }

    public function edit_policy()
    {
        if ($this->request->isAJAX()) {
            $policyModel = new PolicyModel();
            $id = $this->request->getPost('policy_id');

            $data = [
                'policy_name' => $this->request->getPost('policy_name'),
                'policy_description' => $this->request->getPost('policy_description'),
                'policy_link' => $this->request->getPost('policy_link'),
            ];

            log_message('info', 'Policy ID: ' . $id);
            log_message('info', 'Data to update: ' . json_encode($data));

            if ($policyModel->updatePolicy($id, $data)) {
                return $this->response->setJSON(['success' => true, 'message' => 'Policy updated successfully.']);
            } else {
                return $this->response->setJSON(['success' => false, 'message' => 'Failed to update policy.']);
            }
        }

        return $this->response->setJSON(['success' => false, 'message' => 'Invalid request.']);
    }


    public function delete_policy()
    {
        if ($this->request->isAJAX()) {
            // Get the policy ID from the POST data
            $policyId = $this->request->getPost('policy_id');

            // Load the PolicyModel
            $policyModel = new PolicyModel();

            // Try to delete the policy
            $deleted = $policyModel->delete($policyId);

            if ($deleted) {
                return $this->response->setJSON(['success' => true]);
            } else {
                return $this->response->setJSON(['success' => false]);
            }
        }

        return $this->response->setJSON(['success' => false, 'message' => 'Invalid request.']);
    }

    public function update_policy_order()
    {
        $policyModel = new PolicyModel();
        $request = $this->request->getJSON();

        if (isset($request->order) && is_array($request->order)) {
            $order = $request->order;

            foreach ($order as $position => $id) {
                $policyModel->updatePolicyOrder($id, $position + 1);
            }

            return $this->response->setJSON(['success' => true, 'message' => 'Policy order updated successfully.']);
        }

        return $this->response->setJSON(['success' => false, 'message' => 'Invalid request.']);
    }

    public function updateFooter()
    {
        $footerModel = new Footer_model();
        $request = $this->request;

        if ($request->isAJAX()) {
            // Initialize Google Cloud Storage
            $storage = new \Google\Cloud\Storage\StorageClient([
                'keyFilePath' => WRITEPATH . 'public/mkvgsc.json',
                'projectId' => 'peak-tide-441609-r1',
            ]);
            $bucketName = 'sportzsaga_imgs';
            $bucket = $storage->bucket($bucketName);

            // Prepare image paths for storage
            $imagePaths = [];
            $footerImage = $request->getFile('Footer_Image');
            if ($footerImage && $footerImage->isValid() && !$footerImage->hasMoved()) {
                $imageName = 'footer/' . uniqid() . '_' . $footerImage->getClientName();
                $object = $bucket->upload(
                    fopen($footerImage->getTempName(), 'r'),
                    [
                        'name' => $imageName,
                        'predefinedAcl' => 'publicRead',
                    ]
                );
                $imagePaths['footer_image'] = sprintf('https://storage.googleapis.com/%s/%s', $bucket->name(), $imageName);
            } else {
                // If no new image, keep the old image (you'll need to fetch the existing one from the database)
                $existingFooter = $footerModel->find(1); // Assuming the footer ID is 1
                $imagePaths['footer_image'] = $existingFooter['footer_image'] ?? '';
            }

            // Social Media Links
            $facebook = $request->getPost('Facebook_link') ?? '';
            $instagram = $request->getPost('Instagram_link') ?? '';
            $twitter = $request->getPost('Twitter_link') ?? '';
            $youtube = $request->getPost('Youtube_link') ?? '';

            // Handle Payment Methods (For Images and Links)
            $paymentLinks = [];
            $paymentImagePaths = [];
            for ($i = 1; $i <= 3; $i++) {
                $paymentLinks[] = $request->getPost("socialpayment_link{$i}") ?? '';
                $paymentImage = $request->getFile("Footer_paymentImage{$i}");
                if ($paymentImage && $paymentImage->isValid() && !$paymentImage->hasMoved()) {
                    $imageName = 'payment/' . uniqid() . '_' . $paymentImage->getClientName();
                    $object = $bucket->upload(
                        fopen($paymentImage->getTempName(), 'r'),
                        [
                            'name' => $imageName,
                            'predefinedAcl' => 'publicRead',
                        ]
                    );
                    $paymentImagePaths["footer_payment_image{$i}"] = sprintf('https://storage.googleapis.com/%s/%s', $bucket->name(), $imageName);
                } else {
                    // If no new payment image, keep the old image (fetch from database)
                    $existingFooter = $footerModel->find(1); // Assuming the footer ID is 1
                    $paymentImagePaths["footer_payment_image{$i}"] = $existingFooter["footer_payment_image{$i}"] ?? '';
                }
            }

            // Data to update footer
            $data = [
                'footer_image' => $imagePaths['footer_image'] ?? '',
                'footer_email' => $request->getPost('Footer_mail') ?? '',
                'footer_hours' => $request->getPost('Footer_Hours') ?? '',
                'footer_name' => $request->getPost('Footer_payment') ?? '',
                'facebook' => $facebook,
                'instagram' => $instagram,
                'twitter' => $twitter,
                'youtube' => $youtube,
                'footer_payment_image1' => $paymentImagePaths['footer_payment_image1'] ?? '',
                'footer_payment_image2' => $paymentImagePaths['footer_payment_image2'] ?? '',
                'footer_payment_image3' => $paymentImagePaths['footer_payment_image3'] ?? '',
                'footer_payment_link1' => $paymentLinks[0] ?? '',
                'footer_payment_link2' => $paymentLinks[1] ?? '',
                'footer_payment_link3' => $paymentLinks[2] ?? '',
                'updated_at' => date('Y-m-d H:i:s')
            ];

            // Update the footer data in the model
            if ($footerModel->updateFooterData($data)) {
                return $this->response->setJSON(['status' => 'success', 'message' => 'Footer Updated Successfully']);
            } else {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Footer Update Failed']);
            }
        }

        return $this->response->setJSON(['status' => 'error', 'message' => 'Invalid Request']);
    }

    public function update_about()
    {
        try {
            // Initialize Google Cloud Storage
            $storage = new \Google\Cloud\Storage\StorageClient([
                'keyFilePath' => WRITEPATH . 'public/mkvgsc.json',
                'projectId' => 'peak-tide-441609-r1',
            ]);
            $bucketName = 'sportzsaga_imgs';
            $bucket = $storage->bucket($bucketName);

            // Prepare data array
            $data = [
                'about_title' => $this->request->getPost('about_title'),
                'about_description' => $this->request->getPost('about_description'),
                'why_title' => $this->request->getPost('why_title'),
                'team_title' => $this->request->getPost('team_title'),
                'subscribe_title' => $this->request->getPost('subscribe_title'),
                'subscribe_subtitle' => $this->request->getPost('subscribe_subtitle'),
                'subscribe_placeholder' => $this->request->getPost('subscribe_placeholder'),
                'subscribe_btn' => $this->request->getPost('subscribe_btn'),
                'blogs_title' => $this->request->getPost('blogs_title'),
                'blogs' => $this->request->getPost('blogs')
            ];

            // Handle background image
            $bgFile = $this->request->getFile('about_bg');
            if ($bgFile && $bgFile->isValid() && !$bgFile->hasMoved()) {
                $fileName = 'about/' . uniqid() . '_' . $bgFile->getClientName();
                $object = $bucket->upload(
                    fopen($bgFile->getTempName(), 'r'),
                    [
                        'name' => $fileName,
                        'predefinedAcl' => 'publicRead',
                    ]
                );
                $data['about_bg'] = sprintf('https://storage.googleapis.com/%s/%s', $bucket->name(), $fileName);
            }

            // Handle icons
            $iconsData = json_decode($this->request->getPost('icons_data'), true);
            for ($i = 1; $i <= 5; $i++) {
                $iconFile = $this->request->getFile('icon' . ($i) . '_file');
                if ($iconFile && $iconFile->isValid() && !$iconFile->hasMoved()) {
                    $fileName = 'icons/' . uniqid() . '_' . $iconFile->getClientName();
                    $object = $bucket->upload(
                        fopen($iconFile->getTempName(), 'r'),
                        [
                            'name' => $fileName,
                            'predefinedAcl' => 'publicRead',
                        ]
                    );
                    if (isset($iconsData[$i - 1])) {
                        $iconsData[$i - 1]['icon'] = sprintf('https://storage.googleapis.com/%s/%s', $bucket->name(), $fileName);
                    }
                }
                $data['icon' . $i] = isset($iconsData[$i - 1]) ? json_encode($iconsData[$i - 1]) : null;
            }

            // Handle info data
            $infoData = json_decode($this->request->getPost('info_data'), true);
            if ($infoData) {
                $data['info_data1'] = isset($infoData['info_data1']) ? json_encode($infoData['info_data1']) : null;
                $data['info_data2'] = isset($infoData['info_data2']) ? json_encode($infoData['info_data2']) : null;
                $data['info_data3'] = isset($infoData['info_data3']) ? json_encode($infoData['info_data3']) : null;
            }


            $modal = new onlinestoremodal();
            $success = $modal->updateAbout($data);

            if ($success) {
                return $this->response->setJSON([
                    'success' => true,
                    'message' => 'About page updated successfully'
                ]);
            } else {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'No changes were made to the about page'
                ]);
            }
        } catch (\Exception $e) {
            log_message('error', 'Error updating about page: ' . $e->getMessage());
            return $this->response->setJSON([
                'success' => false,
                'message' => 'An error occurred while updating the about page'
            ]);
        }
    }


    public function update_contact()
    {
        try {
            // Initialize Google Cloud Storage
            $storage = new \Google\Cloud\Storage\StorageClient([
                'keyFilePath' => WRITEPATH . 'public/mkvgsc.json',
                'projectId' => 'peak-tide-441609-r1',
            ]);
            $bucketName = 'sportzsaga_imgs';
            $bucket = $storage->bucket($bucketName);

            // Prepare data array
            $data = [
                'contact_title' => $this->request->getPost('contact_title'),
                'contact_description' => $this->request->getPost('contact_description'),
                'quote' => $this->request->getPost('quote'),
                'quote_author' => $this->request->getPost('quote_author'),
                'contact_info_title' => $this->request->getPost('contact_info_title'),
                'contact_info_description' => $this->request->getPost('contact_info_description'),
                'address_title' => $this->request->getPost('address_title'),
                'address' => $this->request->getPost('address'),
                'phone_title' => $this->request->getPost('phone_title'),
                'phone' => $this->request->getPost('phone'),
                'info_title' => $this->request->getPost('info_title'),
                'info' => $this->request->getPost('info'),
                'help_title' => $this->request->getPost('help_title'),
                'help_details' => $this->request->getPost('help_details'),
                'git_title' => $this->request->getPost('git_title'),
                'git_description' => $this->request->getPost('git_description'),
                'contact_subscribe_title' => $this->request->getPost('contact_subscribe_title'),
                'contact_subscribe_subtitle' => $this->request->getPost('contact_subscribe_subtitle'),
                'contact_subscribe_placeholder' => $this->request->getPost('contact_subscribe_placeholder'),
                'contact_subscribe_btn' => $this->request->getPost('contact_subscribe_btn')
            ];

            // Handle background image
            $bgFile = $this->request->getFile('contact_bg');
            if ($bgFile && $bgFile->isValid() && !$bgFile->hasMoved()) {
                $fileName = 'contact/' . uniqid() . '_' . $bgFile->getClientName();
                $object = $bucket->upload(
                    fopen($bgFile->getTempName(), 'r'),
                    [
                        'name' => $fileName,
                        'predefinedAcl' => 'publicRead',
                    ]
                );
                $data['contact_bg'] = sprintf('https://storage.googleapis.com/%s/%s', $bucket->name(), $fileName);
            }



            $modal = new onlinestoremodal();
            $success = $modal->updateContact($data);

            if ($success) {
                return $this->response->setJSON([
                    'success' => true,
                    'message' => 'Contact page updated successfully'
                ]);
            } else {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'No changes were made to the Contact page'
                ]);
            }
        } catch (\Exception $e) {
            log_message('error', 'Error updating Contact page: ' . $e->getMessage());
            return $this->response->setJSON([
                'success' => false,
                'message' => 'An error occurred while updating the Contact page'
            ]);
        }
    }

    public function update_search()
    {
        try {
            /*
            // Initialize Google Cloud Storage
            $storage = new \Google\Cloud\Storage\StorageClient([
                'keyFilePath' => WRITEPATH . 'public/mkvgsc.json',
                'projectId' => 'peak-tide-441609-r1',
            ]);
            $bucketName = 'sportzsaga_imgs';
            $bucket = $storage->bucket($bucketName);
            */

            // Prepare data array
            $data = [
                'search_placeholder' => $this->request->getPost('search_placeholder'),
                'sec1_title' => $this->request->getPost('sec1_title'),
                'r_products' => $this->request->getPost('r_products'),
                'sec2_title' => $this->request->getPost('sec2_title'),
                't_products' => $this->request->getPost('t_products'),
                'sec3_title' => $this->request->getPost('sec3_title'),
                'm_products' => $this->request->getPost('m_products'),
                'sec4_title' => $this->request->getPost('sec4_title'),
                's_blogs' => $this->request->getPost('s_blogs')
            ];


            $modal = new onlinestoremodal();
            $success = $modal->updateSearch($data);

            if ($success) {
                return $this->response->setJSON([
                    'success' => true,
                    'message' => 'search page updated successfully'
                ]);
            } else {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'No changes were made to the search page'
                ]);
            }
        } catch (\Exception $e) {
            log_message('error', 'Error updating search page: ' . $e->getMessage());
            return $this->response->setJSON([
                'success' => false,
                'message' => 'An error occurred while updating the search page'
            ]);
        }
    }

    public function update_cart()
    {
        try {

            // Initialize Google Cloud Storage
            $storage = new \Google\Cloud\Storage\StorageClient([
                'keyFilePath' => WRITEPATH . 'public/mkvgsc.json',
                'projectId' => 'peak-tide-441609-r1',
            ]);
            $bucketName = 'sportzsaga_imgs';
            $bucket = $storage->bucket($bucketName);


            // Prepare data array
            $data = [
                'cart_title' => $this->request->getPost('cart_title'),
                'offer_title' => $this->request->getPost('offer_title'),
                'offer_subtitle' => $this->request->getPost('offer_subtitle'),
                'shipping_title' => $this->request->getPost('shipping_title'),
                'shipping_subtitle' => $this->request->getPost('shipping_subtitle'),
                'shipping_description' => $this->request->getPost('shipping_description'),
                'discount_info' => $this->request->getPost('discount_info'),
                'note_info' => $this->request->getPost('note_info'),
                'more_title' => $this->request->getPost('more_title'),
                'cm_products' => $this->request->getPost('cm_products'),
            ];

            // Handle background image
            $bgFile = $this->request->getFile('offer_bg');
            if ($bgFile && $bgFile->isValid() && !$bgFile->hasMoved()) {
                $fileName = 'contact/' . uniqid() . '_' . $bgFile->getClientName();
                $object = $bucket->upload(
                    fopen($bgFile->getTempName(), 'r'),
                    [
                        'name' => $fileName,
                        'predefinedAcl' => 'publicRead',
                    ]
                );
                $data['offer_bg'] = sprintf('https://storage.googleapis.com/%s/%s', $bucket->name(), $fileName);
            }


            $modal = new onlinestoremodal();
            $success = $modal->updateCart($data);

            if ($success) {
                return $this->response->setJSON([
                    'success' => true,
                    'message' => 'Cart page updated successfully'
                ]);
            } else {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'No changes were made to the Cart page'
                ]);
            }
        } catch (\Exception $e) {
            log_message('error', 'Error updating Cart page: ' . $e->getMessage());
            return $this->response->setJSON([
                'success' => false,
                'message' => 'An error occurred while updating the Cart page'
            ]);
        }
    }


    public function update_checkout()
    {
        try {

            // Prepare data array
            $data = [
                'checkout_title' => $this->request->getPost('checkout_title'),
                'comment_info' => $this->request->getPost('comment_info'),
                'promocode_info' => $this->request->getPost('promocode_info')
            ];


            $modal = new onlinestoremodal();
            $success = $modal->updateCheckout($data);

            if ($success) {
                return $this->response->setJSON([
                    'success' => true,
                    'message' => 'Checkout page updated successfully'
                ]);
            } else {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'No changes were made to the Checkout page'
                ]);
            }
        } catch (\Exception $e) {
            log_message('error', 'Error updating Checkout page: ' . $e->getMessage());
            return $this->response->setJSON([
                'success' => false,
                'message' => 'An error occurred while updating the Checkout page'
            ]);
        }
    }


    public function update_tracking()
    {
        try {

            // Initialize Google Cloud Storage
            $storage = new \Google\Cloud\Storage\StorageClient([
                'keyFilePath' => WRITEPATH . 'public/mkvgsc.json',
                'projectId' => 'peak-tide-441609-r1',
            ]);
            $bucketName = 'sportzsaga_imgs';
            $bucket = $storage->bucket($bucketName);


            // Prepare data array
            $data = [
                'tracking_title' => $this->request->getPost('tracking_title'),
                'bnr_title' => $this->request->getPost('bnr_title'),
                'bnr_subtitle' => $this->request->getPost('bnr_subtitle'),
                'bnr_link' => $this->request->getPost('bnr_link'),
                'bnr_btntext' => $this->request->getPost('bnr_btntext'),
                'textinfo' => $this->request->getPost('textinfo'),
                'tbtntext' => $this->request->getPost('tbtntext'),
                'view_type' => $this->request->getPost('view_type'),
                'sort_order' => $this->request->getPost('sort_order'),
                'selected_posts' => $this->request->getPost('selected_posts'),
            ];

            // Handle background image
            $bnr_bg = $this->request->getFile('bnr_bg');
            if ($bnr_bg && $bnr_bg->isValid() && !$bnr_bg->hasMoved()) {
                $fileName = 'contact/' . uniqid() . '_' . $bnr_bg->getClientName();
                $object = $bucket->upload(
                    fopen($bnr_bg->getTempName(), 'r'),
                    [
                        'name' => $fileName,
                        'predefinedAcl' => 'publicRead',
                    ]
                );
                $data['bnr_bg'] = sprintf('https://storage.googleapis.com/%s/%s', $bucket->name(), $fileName);
            }
            $mobbnr_bg = $this->request->getFile('mobbnr_bg');
            if ($mobbnr_bg && $mobbnr_bg->isValid() && !$mobbnr_bg->hasMoved()) {
                $fileName = 'contact/' . uniqid() . '_' . $mobbnr_bg->getClientName();
                $object = $bucket->upload(
                    fopen($mobbnr_bg->getTempName(), 'r'),
                    [
                        'name' => $fileName,
                        'predefinedAcl' => 'publicRead',
                    ]
                );
                $data['mobbnr_bg'] = sprintf('https://storage.googleapis.com/%s/%s', $bucket->name(), $fileName);
            }


            $modal = new onlinestoremodal();
            $success = $modal->updateTracking($data);

            if ($success) {
                return $this->response->setJSON([
                    'success' => true,
                    'message' => 'Tracking page updated successfully'
                ]);
            } else {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'No changes were made to the Tracking page'
                ]);
            }
        } catch (\Exception $e) {
            log_message('error', 'Error updating Tracking page: ' . $e->getMessage());
            return $this->response->setJSON([
                'success' => false,
                'message' => 'An error occurred while updating the Tracking page'
            ]);
        }
    }

    public function update_404()
    {
        try {

            // Initialize Google Cloud Storage
            $storage = new \Google\Cloud\Storage\StorageClient([
                'keyFilePath' => WRITEPATH . 'public/mkvgsc.json',
                'projectId' => 'peak-tide-441609-r1',
            ]);
            $bucketName = 'sportzsaga_imgs';
            $bucket = $storage->bucket($bucketName);


            // Prepare data array
            $data = [
                'error_head' => $this->request->getPost('error_head'),
                'error_title' => $this->request->getPost('error_title'),
                'error_description' => $this->request->getPost('error_description'),
                'errorbnr_title' => $this->request->getPost('errorbnr_title'),
                'errorbnr_subtitle' => $this->request->getPost('errorbnr_subtitle'),
                'errorbnr_link' => $this->request->getPost('errorbnr_link'),
                'errorbnr_btntext' => $this->request->getPost('errorbnr_btntext'),
                'errormore_title' => $this->request->getPost('errormore_title'),
                'error_products' => $this->request->getPost('error_products'),
                'element1' => $this->request->getPost('element1'),
                'element2' => $this->request->getPost('element2'),
                'element3' => $this->request->getPost('element3'),
                'element4' => $this->request->getPost('element4'),
                'element5' => $this->request->getPost('element5'),
                'element6' => $this->request->getPost('element6'),
                'element_id1' => $this->request->getPost('element_id1'),
                'element_id2' => $this->request->getPost('element_id2'),
                'element_id3' => $this->request->getPost('element_id3'),
                'element_id4' => $this->request->getPost('element_id4'),
                'element_id5' => $this->request->getPost('element_id5'),
                'element_id6' => $this->request->getPost('element_id6'),

            ];

            // Handle background image
            $errorbnr_bg = $this->request->getFile('errorbnr_bg');
            if ($errorbnr_bg && $errorbnr_bg->isValid() && !$errorbnr_bg->hasMoved()) {
                $fileName = 'contact/' . uniqid() . '_' . $errorbnr_bg->getClientName();
                $object = $bucket->upload(
                    fopen($errorbnr_bg->getTempName(), 'r'),
                    [
                        'name' => $fileName,
                        'predefinedAcl' => 'publicRead',
                    ]
                );
                $data['errorbnr_bg'] = sprintf('https://storage.googleapis.com/%s/%s', $bucket->name(), $fileName);
            }


            $point_bg1 = $this->request->getFile('point_bg1');
            if ($point_bg1 && $point_bg1->isValid() && !$point_bg1->hasMoved()) {
                $fileName = 'contact/' . uniqid() . '_' . $point_bg1->getClientName();
                $object = $bucket->upload(
                    fopen($point_bg1->getTempName(), 'r'),
                    [
                        'name' => $fileName,
                        'predefinedAcl' => 'publicRead',
                    ]
                );
                $data['point_bg1'] = sprintf('https://storage.googleapis.com/%s/%s', $bucket->name(), $fileName);
            }

            $point_bg2 = $this->request->getFile('point_bg2');
            if ($point_bg2 && $point_bg2->isValid() && !$point_bg2->hasMoved()) {
                $fileName = 'contact/' . uniqid() . '_' . $point_bg2->getClientName();
                $object = $bucket->upload(
                    fopen($point_bg2->getTempName(), 'r'),
                    [
                        'name' => $fileName,
                        'predefinedAcl' => 'publicRead',
                    ]
                );
                $data['point_bg2'] = sprintf('https://storage.googleapis.com/%s/%s', $bucket->name(), $fileName);
            }

            $point_bg3 = $this->request->getFile('point_bg3');
            if ($point_bg3 && $point_bg3->isValid() && !$point_bg3->hasMoved()) {
                $fileName = 'contact/' . uniqid() . '_' . $point_bg3->getClientName();
                $object = $bucket->upload(
                    fopen($point_bg3->getTempName(), 'r'),
                    [
                        'name' => $fileName,
                        'predefinedAcl' => 'publicRead',
                    ]
                );
                $data['point_bg3'] = sprintf('https://storage.googleapis.com/%s/%s', $bucket->name(), $fileName);
            }

            $point_bg4 = $this->request->getFile('point_bg4');
            if ($point_bg4 && $point_bg4->isValid() && !$point_bg4->hasMoved()) {
                $fileName = 'contact/' . uniqid() . '_' . $point_bg4->getClientName();
                $object = $bucket->upload(
                    fopen($point_bg4->getTempName(), 'r'),
                    [
                        'name' => $fileName,
                        'predefinedAcl' => 'publicRead',
                    ]
                );
                $data['point_bg4'] = sprintf('https://storage.googleapis.com/%s/%s', $bucket->name(), $fileName);
            }

            $point_bg5 = $this->request->getFile('point_bg5');
            if ($point_bg5 && $point_bg5->isValid() && !$point_bg5->hasMoved()) {
                $fileName = 'contact/' . uniqid() . '_' . $point_bg5->getClientName();
                $object = $bucket->upload(
                    fopen($point_bg5->getTempName(), 'r'),
                    [
                        'name' => $fileName,
                        'predefinedAcl' => 'publicRead',
                    ]
                );
                $data['point_bg5'] = sprintf('https://storage.googleapis.com/%s/%s', $bucket->name(), $fileName);
            }

            $point_bg6 = $this->request->getFile('point_bg6');
            if ($point_bg6 && $point_bg6->isValid() && !$point_bg6->hasMoved()) {
                $fileName = 'contact/' . uniqid() . '_' . $point_bg6->getClientName();
                $object = $bucket->upload(
                    fopen($point_bg6->getTempName(), 'r'),
                    [
                        'name' => $fileName,
                        'predefinedAcl' => 'publicRead',
                    ]
                );
                $data['point_bg6'] = sprintf('https://storage.googleapis.com/%s/%s', $bucket->name(), $fileName);
            }


            $modal = new onlinestoremodal();
            $success = $modal->update404($data);

            if ($success) {
                return $this->response->setJSON([
                    'success' => true,
                    'message' => '404 page updated successfully'
                ]);
            } else {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'No changes were made to the 404 page'
                ]);
            }
        } catch (\Exception $e) {
            log_message('error', 'Error updating 404 page: ' . $e->getMessage());
            return $this->response->setJSON([
                'success' => false,
                'message' => 'An error occurred while updating the 404 page'
            ]);
        }
    }

    public function update_wishlist()
    {
        try {
            /*
            // Initialize Google Cloud Storage
            $storage = new \Google\Cloud\Storage\StorageClient([
                'keyFilePath' => WRITEPATH . 'public/mkvgsc.json',
                'projectId' => 'peak-tide-441609-r1',
            ]);
            $bucketName = 'sportzsaga_imgs';
            $bucket = $storage->bucket($bucketName);
            */

            // Prepare data array
            $data = [
                'wishlist_title' => $this->request->getPost('wishlist_title')
            ];


            $modal = new onlinestoremodal();
            $success = $modal->updateWishlist($data);

            if ($success) {
                return $this->response->setJSON([
                    'success' => true,
                    'message' => 'Wishlist page updated successfully'
                ]);
            } else {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'No changes were made to the Wishlist page'
                ]);
            }
        } catch (\Exception $e) {
            log_message('error', 'Error updating Wishlist page: ' . $e->getMessage());
            return $this->response->setJSON([
                'success' => false,
                'message' => 'An error occurred while updating the Wishlist page'
            ]);
        }
    }

    public function add_members()
    {

        // Initialize Google Cloud Storage
        $storage = new \Google\Cloud\Storage\StorageClient([
            'keyFilePath' => WRITEPATH . 'public/mkvgsc.json',
            'projectId' => 'peak-tide-441609-r1',
        ]);
        $bucketName = 'sportzsaga_imgs';
        $bucket = $storage->bucket($bucketName);


        if ($this->request->isAJAX()) {
            $members_model = new MemberModel();


            $data = [
                'member_name' => $this->request->getPost('member_name'),
                'member_occupation' => $this->request->getPost('member_occupation'),
                'member_email' => $this->request->getPost('member_email'),
                'member_linkedin' => $this->request->getPost('member_linkedin'),
                'visibility' => $this->request->getPost('member_visibility')
            ];

            // Handle image upload
            $member_pic = $this->request->getFile('member_pic');
            if ($member_pic && $member_pic->isValid() && !$member_pic->hasMoved()) {
                $fileName = 'members/' . uniqid() . '_' . $member_pic->getClientName();
                $object = $bucket->upload(
                    fopen($member_pic->getTempName(), 'r'),
                    [
                        'name' => $fileName,
                        'predefinedAcl' => 'publicRead',
                    ]
                );
                $data['member_pic'] = sprintf('https://storage.googleapis.com/%s/%s', $bucket->name(), $fileName);
            }

            if ($members_model->insert($data)) {
                return $this->response->setJSON(['success' => true, 'message' => 'Awards Added successfully.']);
            } else {
                return $this->response->setJSON(['success' => false, 'message' => 'Failed to update Awards.']);
            }
        }

        return $this->response->setJSON(['success' => false, 'message' => 'Invalid request.']);
    }



    public function edit_members()
    {

        // Initialize Google Cloud Storage
        $storage = new \Google\Cloud\Storage\StorageClient([
            'keyFilePath' => WRITEPATH . 'public/mkvgsc.json',
            'projectId' => 'peak-tide-441609-r1',
        ]);
        $bucketName = 'sportzsaga_imgs';
        $bucket = $storage->bucket($bucketName);


        if ($this->request->isAJAX()) {
            $members_model = new MemberModel();

            $id = $this->request->getPost('member_id');


            $data = [
                'member_name' => $this->request->getPost('member_name'),
                'member_occupation' => $this->request->getPost('member_occupation'),
                'member_email' => $this->request->getPost('member_email'),
                'member_linkedin' => $this->request->getPost('member_linkedin'),
                'visibility' => $this->request->getPost('member_visibility')
            ];

            // Handle image upload
            $member_pic = $this->request->getFile('member_pic');
            if ($member_pic && $member_pic->isValid() && !$member_pic->hasMoved()) {
                $fileName = 'members/' . uniqid() . '_' . $member_pic->getClientName();
                $object = $bucket->upload(
                    fopen($member_pic->getTempName(), 'r'),
                    [
                        'name' => $fileName,
                        'predefinedAcl' => 'publicRead',
                    ]
                );
                $data['member_pic'] = sprintf('https://storage.googleapis.com/%s/%s', $bucket->name(), $fileName);
            }

            if ($members_model->update($id, $data)) {
                return $this->response->setJSON(['success' => true, 'message' => 'Awards Added successfully.']);
            } else {
                return $this->response->setJSON(['success' => false, 'message' => 'Failed to update Awards.']);
            }
        }

        return $this->response->setJSON(['success' => false, 'message' => 'Invalid request.']);
    }

    public function update_member_order()
    {
        $members_model = new MemberModel();
        $request = $this->request->getJSON();

        if (isset($request->order) && is_array($request->order)) {
            $order = $request->order;

            foreach ($order as $position => $id) {
                $members_model->UpdateMembersOrder($id, $position + 1); // Position starts from 1
            }

            return $this->response->setJSON(['success' => true, 'message' => 'Awards order updated successfully!']);
        }

        return $this->response->setJSON(['success' => false, 'message' => 'Invalid request.']);
    }










    //<!------------------------------------------------------------------------------------Home logp------------------------------------------------------------------------------------------------------------>

    public function saveLogo()
    {
        try {
            // Initialize Google Cloud Storage
            $storage = new StorageClient([
                'keyFilePath' => WRITEPATH . 'public/mkvgsc.json', // Update the path to your service account JSON key
                'projectId' => 'peak-tide-441609-r1', // Update with your Google Cloud project ID
            ]);
            $bucketName = 'sportzsaga_imgs'; // Update with your bucket name
            $bucket = $storage->bucket($bucketName);

            // Check if a file is uploaded
            $logo = $this->request->getFile('logo');
            if ($logo && $logo->isValid() && !$logo->hasMoved()) {
                // Generate unique filename
                $fileName = 'logos/' . uniqid() . '_' . $logo->getClientName();

                // Upload file to Google Cloud Storage
                $object = $bucket->upload(
                    fopen($logo->getTempName(), 'r'),
                    [
                        'name' => $fileName,
                        'predefinedAcl' => 'publicRead',
                    ]
                );

                // Get public URL of the uploaded file
                $fileUrl = sprintf('https://storage.googleapis.com/%s/%s', $bucket->name(), $fileName);

                // Save file URL to database
                $data = [
                    'logo' => $fileUrl,
                    'visibility' => $this->request->getPost('visibility'),
                    'title' => $this->request->getPost('title')
                ];
                $this->logoModel->insert($data);

                return $this->response->setJSON(['status' => 'success', 'message' => 'Logo saved successfully.', 'file_url' => $fileUrl]);
            } else {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Invalid file upload.']);
            }
        } catch (\Exception $e) {
            log_message('error', 'Error uploading logo: ' . $e->getMessage());
            return $this->response->setJSON(['status' => 'error', 'message' => 'An error occurred while uploading the logo.']);
        }
    }

    public function editLogo()
    {
        try {
            // Get logo ID from request
            $logoId = $this->request->getPost('id');

            // Initialize Google Cloud Storage
            $storage = new StorageClient([
                'keyFilePath' => WRITEPATH . 'public/mkvgsc.json', // Update path to your service account JSON key
                'projectId' => 'peak-tide-441609-r1', // Update with your Google Cloud project ID
            ]);
            $bucketName = 'sportzsaga_imgs'; // Update with your bucket name
            $bucket = $storage->bucket($bucketName);

            // Find the existing logo
            $existingLogo = $this->logoModel->find($logoId);
            if (!$existingLogo) {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Logo not found.']);
            }

            // Check if a new file is uploaded
            $logo = $this->request->getFile('logo');
            $fileUrl = $existingLogo['logo']; // Default to old image URL

            if ($logo && $logo->isValid() && !$logo->hasMoved()) {
                // Delete the old logo from Google Cloud Storage
                if (!empty($existingLogo['logo'])) {
                    $oldFilePath = parse_url($existingLogo['logo'], PHP_URL_PATH);
                    $object = $bucket->object(ltrim($oldFilePath, '/'));
                    if ($object->exists()) {
                        $object->delete();
                    }
                }

                // Generate unique filename
                $fileName = 'logos/' . uniqid() . '_' . $logo->getClientName();

                // Upload new logo to Google Cloud Storage
                $object = $bucket->upload(
                    fopen($logo->getTempName(), 'r'),
                    [
                        'name' => $fileName,
                        'predefinedAcl' => 'publicRead',
                    ]
                );

                // Get public URL of the uploaded file
                $fileUrl = sprintf('https://storage.googleapis.com/%s/%s', $bucket->name(), $fileName);
            }

            // Update logo data in the database
            $data = [
                'logo' => $fileUrl, // If no new file, the old logo remains
                'visibility' => $this->request->getPost('visibility'),
                'title' => $this->request->getPost('title')
            ];
            $this->logoModel->update($logoId, $data);

            return $this->response->setJSON(['status' => 'success', 'message' => 'Logo updated successfully.', 'file_url' => $fileUrl]);
        } catch (\Exception $e) {
            log_message('error', 'Error updating logo: ' . $e->getMessage());
            return $this->response->setJSON(['status' => 'error', 'message' => 'An error occurred while updating the logo.']);
        }
    }



    // Delete Logo
    public function deleteLogo()
    {
        $logoId = $this->request->getPost('logo_id');

        if ($logoId) {
            $logoModel = new \App\Models\HomeLogoModel(); // ✅ Load the model

            $logo = $logoModel->find($logoId);
            if ($logo) {
                // ✅ Delete logo file
                $file = FCPATH . 'uploads/' . $logo['logo'];
                if (is_file($file)) {
                    unlink($file);
                }

                // ✅ Delete record from database
                $logoModel->delete($logoId);

                return $this->response->setJSON(['status' => 'success', 'message' => 'Logo deleted successfully.']);
            } else {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Logo not found.']);
            }
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Invalid request.']);
        }
    }


    //<!------------------------------------------------------------------------------------Home Collection------------------------------------------------------------------------------------------------------------>
    public function saveCollection()
    {
        if ($this->request->isAJAX()) {
            $favCollection = $this->request->getPost('fav_collection'); // Comma-separated collection IDs

            if (empty($favCollection)) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'No collections selected.',
                ]);
            }

            $homeCollectionModel = new HomeCollectionModel();

            try {
                // Check if an entry with ID=1 already exists
                $existingRecord = $homeCollectionModel->find(1);

                if ($existingRecord) {
                    // Update the existing record
                    $homeCollectionModel->update(1, ['collection_id' => $favCollection]);
                    $message = 'Collections updated successfully.';
                } else {
                    // Insert a new record with ID=1
                    $homeCollectionModel->insert([
                        'id' => 1,
                        'collection_id' => $favCollection,
                    ]);
                    $message = 'Collections saved successfully.';
                }

                return $this->response->setJSON([
                    'success' => true,
                    'message' => $message,
                ]);
            } catch (\Exception $e) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'An error occurred: ' . $e->getMessage(),
                ]);
            }
        }

        return $this->response->setJSON([
            'success' => false,
            'message' => 'Invalid request.',
        ]);
    }

    //<!------------------------------------------------------------------------------------Home Products------------------------------------------------------------------------------------------------------------>
    public function saveProduct()
    {
        if ($this->request->isAJAX()) {
            $favProduct = $this->request->getPost('fav_product'); // Comma-separated product IDs

            if (empty($favProduct)) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'No products selected.',
                ]);
            }

            $homeProductModel = new HomeProductModel();

            try {
                // Check if an entry with ID=1 already exists
                $existingRecord = $homeProductModel->find(1);

                if ($existingRecord) {
                    // Update the existing record
                    $homeProductModel->update(1, ['product_id' => $favProduct]);
                    $message = 'Products updated successfully.';
                } else {
                    // Insert a new record with ID=1
                    $homeProductModel->insert([
                        'id' => 1,
                        'product_id' => $favProduct,
                    ]);
                    $message = 'Products saved successfully.';
                }

                return $this->response->setJSON([
                    'success' => true,
                    'message' => $message,
                ]);
            } catch (\Exception $e) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'An error occurred: ' . $e->getMessage(),
                ]);
            }
        }

        return $this->response->setJSON([
            'success' => false,
            'message' => 'Invalid request.',
        ]);
    }





    //<!------------------------------------------------------------------------------------Home Blogs------------------------------------------------------------------------------------------------------------>
    public function saveBlog()
    {
        if ($this->request->isAJAX()) {
            $favBlog = $this->request->getPost('fav_blog'); // Comma-separated blog IDs

            if (empty($favBlog)) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'No blogs selected.',
                ]);
            }

            $homeBlogModel = new HomeBlogModel();

            try {
                // Check if an entry with ID=1 already exists
                $existingRecord = $homeBlogModel->find(1);

                if ($existingRecord) {
                    // Update the existing record
                    $homeBlogModel->update(1, ['blog_id' => $favBlog]);
                    $message = 'Blogs updated successfully.';
                } else {
                    // Insert a new record with ID=1
                    $homeBlogModel->insert([
                        'id' => 1,
                        'blog_id' => $favBlog,
                    ]);
                    $message = 'Blogs saved successfully.';
                }

                return $this->response->setJSON([
                    'success' => true,
                    'message' => $message,
                ]);
            } catch (\Exception $e) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'An error occurred: ' . $e->getMessage(),
                ]);
            }
        }

        return $this->response->setJSON([
            'success' => false,
            'message' => 'Invalid request.',
        ]);
    }


    //<!------------------------------------------------------------------------------------Home Carousel2Controllers------------------------------------------------------------------------------------------------------------>
    public function add()
    {
        try {
            $model = new HomeCarousel2Model();
            $existingRecord = $model->find(1);
            $data = $this->request->getPost();

            // Assign selected values to data array
            $data['select_link'] = $this->request->getPost('select_link');
            $data['selected_product'] = ($data['select_link'] === 'product') ? $this->request->getPost('selected_product') : null;
            $data['selected_collection'] = ($data['select_link'] === 'collection') ? $this->request->getPost('selected_collection') : null;

            $storage = new StorageClient([
                'keyFilePath' => WRITEPATH . 'public/mkvgsc.json',
                'projectId' => 'peak-tide-441609-r1',
            ]);
            $bucket = $storage->bucket('sportzsaga_imgs');

            foreach (['image', 'image_mobile'] as $field) {
                $file = $this->request->getFile($field);
                if ($file && $file->isValid() && !$file->hasMoved()) {
                    $fileName = 'carousel/' . uniqid() . '_' . $file->getClientName();
                    $object = $bucket->upload(fopen($file->getTempName(), 'r'), ['name' => $fileName, 'predefinedAcl' => 'publicRead']);
                    $data[$field] = sprintf('https://storage.googleapis.com/%s/%s', $bucket->name(), $fileName);
                }
            }

            if ($existingRecord) {
                $model->update(1, $data);
                $message = 'Carousel updated successfully';
            } else {
                $data['id'] = 1;
                $model->insert($data);
                $message = 'Carousel added successfully';
            }

            return redirect()->back()->with('message', $message);
        } catch (\Exception $e) {
            log_message('error', 'Error updating carousel: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while updating the carousel.');
        }
    }


    public function update_carsecond()
    {
        try {
            $model = new HomeCarousel2Model();
            $data = $this->request->getPost();

            // Assign selected values to data array
            $data['select_link'] = $this->request->getPost('select_link');
            $data['selected_product'] = ($data['select_link'] === 'product') ? $this->request->getPost('selected_product') : null;
            $data['selected_collection'] = ($data['select_link'] === 'collection') ? $this->request->getPost('selected_collection') : null;

            $storage = new StorageClient([
                'keyFilePath' => WRITEPATH . 'public/mkvgsc.json',
                'projectId' => 'peak-tide-441609-r1',
            ]);
            $bucket = $storage->bucket('sportzsaga_imgs');

            foreach (['image', 'image_mobile'] as $field) {
                $file = $this->request->getFile($field);
                if ($file && $file->isValid() && !$file->hasMoved()) {
                    $fileName = 'carousel/' . uniqid() . '_' . $file->getClientName();
                    $object = $bucket->upload(fopen($file->getTempName(), 'r'), ['name' => $fileName, 'predefinedAcl' => 'publicRead']);
                    $data[$field] = sprintf('https://storage.googleapis.com/%s/%s', $bucket->name(), $fileName);
                }
            }

            $model->update(1, $data);

            return redirect()->back()->with('success', 'Carousel updated successfully');
        } catch (\Exception $e) {
            log_message('error', 'Error updating carousel: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while updating the carousel.');
        }
    }

    public function delete($id)
    {
        $model = new HomeCarousel2Model();
        $model->delete($id);
        return redirect()->back()->with('message', 'Carousel deleted successfully');
    }

    //<!-----------------------------------------------------------------------------------------Home Image -------------------------------------------------------------------------------->
    public function save()
    {
        try {
            helper(['form', 'url']);

            // Log incoming data for debugging
            log_message('info', 'Received Data: ' . json_encode($this->request->getPost()));

            $homeImageModel = new \App\Models\HomeImageModel();

            // Prepare data for saving
            $data = [
                'image_title1' => $this->request->getPost('image_title1'),
                'description1' => $this->request->getPost('description1'),
                'title2' => $this->request->getPost('title2'),
                'description2' => $this->request->getPost('description2'),
                'select_link1' => $this->request->getPost('select_link1'),
                'selected_product1' => $this->request->getPost('select_link1') === 'product' ? $this->request->getPost('selected_product1') : null,
                'selected_collection1' => $this->request->getPost('select_link1') === 'collection' ? $this->request->getPost('selected_collection1') : null,
                'select_link2' => $this->request->getPost('select_link2'),
                'selected_product2' => $this->request->getPost('select_link2') === 'product' ? $this->request->getPost('selected_product2') : null,
                'selected_collection2' => $this->request->getPost('select_link2') === 'collection' ? $this->request->getPost('selected_collection2') : null,
                'updated_at' => date('Y-m-d H:i:s'), // Add timestamp for updates
            ];

            // Initialize Google Cloud Storage
            $storage = new StorageClient([
                'keyFilePath' => WRITEPATH . 'public/mkvgsc.json',
                'projectId' => 'peak-tide-441609-r1',
            ]);
            $bucket = $storage->bucket('sportzsaga_imgs');

            // Handle file uploads
            foreach (['background_image1', 'background_image2'] as $field) {
                $file = $this->request->getFile($field);
                if ($file && $file->isValid() && !$file->hasMoved()) {
                    $fileName = 'backgrounds/' . uniqid() . '_' . $file->getClientName();
                    $object = $bucket->upload(
                        fopen($file->getTempName(), 'r'),
                        [
                            'name' => $fileName,
                            'predefinedAcl' => 'publicRead',
                        ]
                    );
                    $data[$field] = sprintf('https://storage.googleapis.com/%s/%s', $bucket->name(), $fileName);
                }
            }

            // Save or update the data (assumes one row for home_image, always with ID=1)
            $homeImageModel->update(1, $data);

            // Redirect to the edit form with a success message
            return redirect()->to(base_url('online_store/edit'))->with('success', 'Data saved successfully.');
        } catch (\Exception $e) {
            log_message('error', 'Error saving data: ' . $e->getMessage());

            // Redirect to the edit form with an error message
            return redirect()->to(base_url('online_store/edit'))->with('error', 'Failed to save data: ' . $e->getMessage());
        }
    }





























    public function add_new_header_first()
    {
        // Validate and get POST data
        $data = [
            'title' => $this->request->getPost('header_first_title'),
            'collection_id' => $this->request->getPost('collection_id'),
            'visibility' => $this->request->getPost('header_first_visibility'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        // Insert new data
        $headerFirstModel = new HeaderFirstModel();
        $headerFirstModel->insert($data);

        // Redirect to the same page to show the updated list (or wherever you want)
        return redirect()->back()->with('success', 'Added');
    }

    public function update_header_first($id)
    {
        // Validate and get updated data
        $data = [
            'title' => $this->request->getPost('header_first_title'),
            'collection_id' => $this->request->getPost('collection_id'),
            'visibility' => $this->request->getPost('header_first_visibility'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        // Update the header data
        $headerFirstModel = new HeaderFirstModel();
        $headerFirstModel->update($id, $data);

        // Redirect back to the page to show the updated list
        return redirect()->back()->with('success', 'Updated');
    }

    public function add_new_header_second()
    {
        // Get POST data directly
        $data = [
            'title' => $this->request->getPost('header_second_title'),
            'header_first_id' => $this->request->getPost('header_first_id'),
            'collection_id' => $this->request->getPost('collection_id'),
            'visibility' => $this->request->getPost('header_second_visibility'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        // Insert the second header data
        $headerSecondModel = new HeaderSecondModel();
        $headerSecondModel->insert($data);

        // Redirect back to the same page to show updated data
        return redirect()->back()->with('success', 'Added');
    }

    public function update_header_second($id)
    {
        // Get updated POST data directly
        $data = [
            'title' => $this->request->getPost('header_second_title'),
            'collection_id' => $this->request->getPost('collection_id'),
            'visibility' => $this->request->getPost('header_second_visibility'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        // Update the second header data
        $headerSecondModel = new HeaderSecondModel();
        $headerSecondModel->update($id, $data);

        // Redirect back to the page to show the updated data
        return redirect()->back()->with('success', 'Updated');
    }

    // Add New Third Header
    public function add_new_header_third()
    {
        $data = [
            'header_second_id' => $this->request->getPost('header_second_id'),
            'title' => $this->request->getPost('header_third_title'),
            'collection_id' => $this->request->getPost('collection_id'),
            'visibility' => $this->request->getPost('header_third_visibility'),
        ];

        $model = new HeaderThirdModel();
        $model->insert($data);

        // Redirect or return success message
        return redirect()->back()->with('success', 'Added');
    }

    // Update Third Header
    public function update_header_third($id)
    {
        $data = [
            'title' => $this->request->getPost('header_third_title'),
            'collection_id' => $this->request->getPost('collection_id'),
            'visibility' => $this->request->getPost('header_third_visibility'),
        ];

        $model = new HeaderThirdModel();
        $model->update($id, $data);

        // Redirect or return success message
        return redirect()->back()->with('success', 'Updated');
    }

    // Add New Fourth Header
    public function add_new_header_fourth()
    {
        $data = [
            'header_third_id' => $this->request->getPost('header_third_id'),
            'title' => $this->request->getPost('header_fourth_title'),
            'collection_id' => $this->request->getPost('collection_id'),
            'visibility' => $this->request->getPost('header_fourth_visibility'),
            'added_by' => session()->get('user_id'),
        ];

        $model = new HeaderFourthModel();
        $model->insert($data);

        // Redirect or return success message
        return redirect()->back()->with('success', 'Fourth Header Added');
    }


    public function saveMarqueeText()
    {
        $response = ['status' => 'error', 'message' => 'Something went wrong'];

        $marqueeText = $this->request->getPost('marqueeText');
        $marqueeTextLink = $this->request->getPost('marqueeText_link');
        $textVisibility = $this->request->getPost('text_visibility');

        // Validation (Optional)
        if (empty($marqueeText)) {
            $response['message'] = 'Text field is required.';
            return $this->response->setJSON($response);
        }

        $data = [
            'marqueeText' => $marqueeText,
            'marqueeText_link' => $marqueeTextLink,
            'text_visibility' => $textVisibility,
            'added_by' => 1,
        ];

        $model = new MarqueeTextModel();
        if ($model->insert($data)) {
            $response = [
                'status' => 'success',
                'message' => 'Data saved successfully'
            ];
        }

        return $this->response->setJSON($response);
    }

    public function GetMarqueeText($id)
    {
        $model = new MarqueeTextModel();
        $text = $model->find($id);

        if ($text) {
            return $this->response->setJSON(['status' => 'success', 'text' => $text]);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Text not found']);
        }
    }

    public function delete_marquee($id)
    {
        $model = new MarqueeTextModel();
        if ($model->delete($id)) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Text deleted successfully']);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to delete text']);
        }
    }

    public function UpdateMarquee($id)
    {
        $model = new MarqueeTextModel();

        // Validate the input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'marqueeText' => 'required',
            'marqueeText_link' => 'permit_empty|valid_url',
            'text_visibility' => 'required|in_list[0,1]'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Validation failed. Please check your input.',
                'errors' => $validation->getErrors()
            ]);
        }

        // Prepare data for updating
        $data = [
            'marqueeText' => $this->request->getPost('marqueeText'),
            'marqueeText_link' => $this->request->getPost('marqueeText_link'),
            'text_visibility' => $this->request->getPost('text_visibility'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        // Update the record
        if ($model->update($id, $data)) {
            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Text updated successfully.'
            ]);
        } else {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Failed to update text.'
            ]);
        }
    }

    public function saveBottomText()
    {
        $model = new onlinestoremodal();

        // Prepare the data
        $data = [
            'marqueebottomText1' => $this->request->getPost('marqueebottomText1'),
            'marqueebottomDescription1' => $this->request->getPost('marqueebottomDescription1'),
            'marqueebottomText2' => $this->request->getPost('marqueebottomText2'),
            'marqueebottomDescription2' => $this->request->getPost('marqueebottomDescription2'),
            'marqueebottomText3' => $this->request->getPost('marqueebottomText3'),
            'marqueebottomDescription3' => $this->request->getPost('marqueebottomDescription3'),
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => 1, // Placeholder for user ID
        ];

        // Check if the row with ID 1 exists
        $existingRow = $model->db->table('marqueebottomtext')->where('id', 1)->get()->getRowArray();

        if ($existingRow) {
            // If the row exists, update it
            if ($model->db->table('marqueebottomtext')->update($data, ['id' => 1])) {
                return $this->response->setJSON(['status' => 'success', 'message' => 'Data updated successfully']);
            } else {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to update data']);
            }
        } else {
            // If the row doesn't exist, insert it with ID 1
            $data['id'] = 1;
            if ($model->db->table('marqueebottomtext')->insert($data)) {
                return $this->response->setJSON(['status' => 'success', 'message' => 'Data saved successfully']);
            } else {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to save data']);
            }
        }
    }












    ////////////////////////////////////////////////////////////////////// Product Selection section //////////////////////////////////////////////////////////////////
    public function add_new_product()
    {
        $productModel = new Productselection();

        $title = $this->request->getPost('product_title');
        $description = $this->request->getPost('product_description');
        $selectionType = $this->request->getPost('select_type');
        $selectedProducts = $this->request->getPost('selected_product');
        $selectedCollections = $this->request->getPost('selected_collection');

        // Ensure at least one selection is made
        if (!$title || !$selectionType || (empty($selectedProducts) && empty($selectedCollections))) {
            return $this->response->setJSON(['success' => false, 'message' => 'All fields are required, including at least one selection.']);
        }

        // Prepare selected items array only if they are not empty
        $selectedItems = [];
        if (!empty($selectedProducts)) {
            $selectedItems = $selectedProducts;
        }
        if (!empty($selectedCollections)) {
            $selectedItems = $selectedCollections;
        }

        $data = [
            'title' => $title,
            'description' => $description,
            'selection_type' => $selectionType,
            'selected_items' => !empty($selectedItems) ? json_encode($selectedItems) : null // Store only if not empty
        ];

        if ($productModel->insert($data)) {
            return redirect()->to(base_url('online_store/edit'))->with('success', 'Product selection saved successfully.');
        } else {
            return redirect()->to(base_url('online_store/edit'))->with('error', 'Failed to save product selection.');
        }
    }



    public function fetch_products()
    {
        $modal = new onlinestoremodal();
        $products = $modal->GetallProductsData();

        return $this->response->setJSON([
            'items' => array_map(function ($product) {
                return [
                    'id' => $product['product_id'],
                    'title' => $product['product_title']
                ];
            }, $products)
        ]);
    }


    public function fetch_collections()
    {
        $modal = new onlinestoremodal();
        $collections = $modal->GetallCollectionsData();

        return $this->response->setJSON([
            'items' => array_map(function ($collection) {
                return [
                    'id' => $collection['collection_id'],
                    'title' => $collection['collection_title']
                ];
            }, $collections)
        ]);
    }

    public function update_product($id)
    {
        $productModel = new Productselection();

        // Fetch existing product data
        $product = $productModel->find($id);

        if (!$product) {
            return redirect()->to(base_url('online_store/index'))->with('error', 'Product not found.');
        }

        // Get input values
        $title = $this->request->getPost('product_title');
        $description = $this->request->getPost('product_description');
        $selectionType = $this->request->getPost('select_type');
        $selectedProducts = $this->request->getPost('selected_product'); // Array of selected products
        $selectedCollections = $this->request->getPost('selected_collection'); // Array of selected collections

        // Ensure at least one selection is made
        if (!$title || !$selectionType || (empty($selectedProducts) && empty($selectedCollections))) {
            return redirect()->to(base_url('online_store/index'))->with('error', 'All fields are required, including at least one selection.');
        }

        // Prepare selected items array only if they are not empty
        $selectedItems = [];
        if ($selectionType === 'product' && !empty($selectedProducts)) {
            $selectedItems['products'] = $selectedProducts;
        } elseif ($selectionType === 'collection' && !empty($selectedCollections)) {
            $selectedItems['collections'] = $selectedCollections;
        }

        $data = [
            'title' => $title,
            'description' => $description,
            'selection_type' => $selectionType,
            'selected_items' => !empty($selectedItems) ? json_encode($selectedItems) : null // Store only if not empty
        ];

        // Update product in database
        if ($productModel->update($id, $data)) {
            return redirect()->to(base_url('online_store/edit'))->with('success', 'Product updated successfully.');
        } else {
            return redirect()->to(base_url('online_store/edit'))->with('error', 'Failed to update product.');
        }
    }

    public function delete_product($id)
    {
        $productModel = new Productselection();

        // Check if product exists
        $product = $productModel->find($id);
        if (!$product) {
            return $this->response->setJSON(['success' => false, 'message' => 'Product not found.']);
        }

        // Delete product
        if ($productModel->delete($id)) {
            return $this->response->setJSON(['success' => true, 'message' => 'Product deleted successfully.']);
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'Failed to delete product.']);
        }
    }
}
