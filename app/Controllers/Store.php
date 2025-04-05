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
use App\Models\BlogModel;
use App\Models\PageModel;
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

    public function online_store_logs()
    {
        $db = db_connect();
        $builder = $db->table('home_logo');

        $modal = new onlinestoremodal();

        // Fetch only soft-deleted records
        $data['logos'] = $builder->where('is_deleted', 1)->get()->getResultArray();
        $data['blogs'] = $modal->getAlllogblogs();
        $data['members'] = $modal->getAlllogsmembers();
        $data['policies'] = $modal->restorepolicies();
        $data['pages'] = $modal->getDeletedHeaderPages();
        $data['marquees'] = $modal->getDeletedMarqueeTexts();
        $data['carousels'] = $modal->getcarouselTexts();

        return view('online_store_logs', $data);
    }

    public function online_store_history()
    {
        $modal = new onlinestoremodal();

        $data['carousels'] = $modal->findall();
        $data['marquees'] = $modal->getMarquees();
        $data['home_collections'] = $modal->getHomeCollections();
        $data['home_carousel2'] = $modal->getHomecarousel2();
        $data['home_logos'] = $modal->getlogohistory();
        $data['home_images'] = $modal->getimagehistory();
        $data['home_blogs'] = $modal->gethome_bloghistory();
        $data['blog_settings'] = $modal->getblog1history();
        $data['onlinestore_blogs'] = $modal->getblog2history();
        $data['singleblog_datas'] = $modal->getsinglebloghistory();
        $data['os_collections'] = $modal->getcollectionhistory();
        $data['product_settings'] = $modal->getproducthistory();
        $data['policies'] = $modal->getpolicieshistory();
        $data['footer_datas'] = $modal->getfooterhistory();
        $data['header_pages'] = $modal->getheaderhistory();
        $data['email_pop_ups'] = $modal->getemailhistory();
        $data['aboutpages'] = $modal->getabouthistory();
        $data['contactpages'] = $modal->getcontacthistory();
        $data['cartpages'] = $modal->getcartpagehistory();
        $data['checkoutpages'] = $modal->getcheckouthistory();
        $data['trackingpages'] = $modal->gettrackinghistory();
        $data['team_members'] = $modal->getour_teamhistory();
        $data['error_pages'] = $modal->get404pagehistory();
        return view('online_store_history', $data);
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
        $data['selectedBlogs'] = $modal->getHomeBlogIds();
        $data['carousel2'] = $modal->getAllCarousel2();
        $data['marqueeTexts'] = $modal->getAllmarqueeText();
        $data['marqueebottomText'] = $modal->getAllmarqueebottomText();
        $data['email_pop_up'] = $modal->getAllEmail_POP_UP();
        $data['availableCollections'] = $modal->getAllAvailableCollections();
        $data['selectedCollections'] = $modal->getHomeCollectionIds();
        $data['product_list'] = $modal->Getproductsection();
        $data['os_blogs'] = $modal->getAllonlineblogs();
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




    //----------------------------------------------------------------------------- Carousel ---------------------------------------------------------------------------
    public function addcarousel()
    {
        $session = session();

        // ✅ Fetch User ID from Session
        $userId = $session->get('user_id');

        if (!$userId) {
            return redirect()->back()->with('error', 'User session not found. Please log in again.');
        }

        // ✅ Google Cloud Storage Setup
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
            return redirect()->back()->with('error', 'Failed to connect to Google Cloud Storage.');
        }

        $carouselImage = $this->request->getFile('carousel_image');
        $mobileImage = $this->request->getFile('carousel_image_mobile');
        $carouselImageUrl = '';
        $mobileImageUrl = '';

        try {
            // ✅ Upload Carousel Image
            if ($carouselImage && $carouselImage->isValid() && !$carouselImage->hasMoved()) {
                log_message('info', 'Uploading carousel image.');
                $carouselFileName = 'carousel/' . uniqid() . '_' . $carouselImage->getClientName();
                $bucket->upload(
                    fopen($carouselImage->getTempName(), 'r'),
                    ['name' => $carouselFileName, 'predefinedAcl' => 'publicRead']
                );
                $carouselImageUrl = sprintf('https://storage.googleapis.com/%s/%s', $bucket->name(), $carouselFileName);
            }

            // ✅ Upload Mobile Image
            if ($mobileImage && $mobileImage->isValid() && !$mobileImage->hasMoved()) {
                log_message('info', 'Uploading mobile image.');
                $mobileFileName = 'carousel/mobile/' . uniqid() . '_' . $mobileImage->getClientName();
                $bucket->upload(
                    fopen($mobileImage->getTempName(), 'r'),
                    ['name' => $mobileFileName, 'predefinedAcl' => 'publicRead']
                );
                $mobileImageUrl = sprintf('https://storage.googleapis.com/%s/%s', $bucket->name(), $mobileFileName);
            }
        } catch (\Exception $e) {
            log_message('error', 'Image upload failed: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to upload images.');
        }

        // ✅ Prepare Carousel Data
        $carouselData = [
            'title' => $this->request->getPost('carousel_title'),
            'description' => $this->request->getPost('carousel_description'),
            'selection_type' => $this->request->getPost('select_link'),
            'product_id' => $this->request->getPost('selected_product') ?: null,
            'collection_id' => $this->request->getPost('selected_collection') ?: null,
            'image' => $carouselImageUrl,
            'image_mobile' => $mobileImageUrl,
            'visibility' => $this->request->getPost('carousel_visibility') == '1' ? 1 : 0,
            'added_by' => $userId,  // ✅ Store User ID who added the carousel
            'created_at' => date('Y-m-d H:i:s'),
        ];

        $carouselModel = new onlinestoremodal();
        if ($carouselModel->insert($carouselData)) {
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
            return redirect()->to('online_store/edit')->with('error', 'Carousel not found.');
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
            return redirect()->to('online_store/edit')->with('error', 'Failed to upload images: ' . $e->getMessage());
        }

        // Handle selection logic: If product is selected, collection should be NULL, and vice versa.
        $selectionType = $this->request->getPost('select_link');
        $productId = $this->request->getPost('selected_product') ?: null;
        $collectionId = $this->request->getPost('selected_collection') ?: null;

        if ($selectionType === 'product') {
            $collectionId = null;
        } elseif ($selectionType === 'collection') {
            $productId = null;
        }

        $newData = [
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

        // Track changes
        $changes = [];
        foreach ($newData as $key => $value) {
            if ($carousel[$key] != $value) {
                $changes[$key] = [
                    'old' => $carousel[$key],
                    'new' => $value
                ];
            }
        }

        if (!empty($changes)) {
            // Retrieve existing change log
            $existingChangeLog = json_decode($carousel['change_log'], true);
            if (!is_array($existingChangeLog)) {
                $existingChangeLog = [];
            }

            // Append new change log entry
            $existingChangeLog[] = [
                'updated_by' => $session->get('user_id'),
                'timestamp' => date('Y-m-d H:i:s'),
                'changes' => $changes
            ];

            // Update the main carousel table with the new change log
            $newData['change_log'] = json_encode($existingChangeLog);

            $carouselModel->update($id, $newData);

            return redirect()->to('online_store/edit')->with('success', 'Carousel updated successfully.');
        }

        return redirect()->to('online_store/edit')->with('success', 'No changes were made.');
    }


    public function delete_carousel($id)
    {
        $db = db_connect();
        $builder = $db->table('carousels');

        // Check if the carousel exists
        $existing = $builder->where('id', $id)->get()->getRow();
        if (!$existing) {
            return redirect()->to('online_store/edit')->with('error', 'Carousel not found.');
        }

        // Get the current user's ID for logging who deleted it
        $userId = session()->get('user_id');
        $deletedAt = date('Y-m-d H:i:s');

        // Perform soft deletion by updating specific fields
        $updateSuccess = $builder->where('id', $id)->update([
            'is_deleted' => 1,         // Mark as deleted
            'deleted_by' => $userId,   // Store who deleted it
            'deleted_at' => $deletedAt // Record deletion timestamp
        ]);

        if (!$updateSuccess) {
            return redirect()->to('online_store/edit')->with('error', 'Failed to delete carousel. Please try again.');
        }

        return redirect()->to('online_store/edit')->with('success', 'Carousel deleted successfully.');
    }


    public function restore_carousel($id)
    {
        $db = db_connect();
        $builder = $db->table('carousels');

        // Check if the carousel exists and is soft deleted
        $existing = $builder->where('id', $id)->where('is_deleted', 1)->get()->getRow();
        if (!$existing) {
            return redirect()->to('carousels/deleted')->with('error', 'Carousel not found.');
        }

        // Restore the soft-deleted record
        $builder->where('id', $id)->update([
            'is_deleted' => 0,
            'deleted_by' => null,
            'deleted_at' => null
        ]);

        return redirect()->to('online_store/edit')->with('success', 'Carousel restored successfully.');
    }



    public function carousel_change_logs($id = null)
    {
        $db = \Config\Database::connect();

        if ($id === null) {
            return view('edit_carousel_logs_view', ['updates' => []]); // No bundle ID provided
        }

        // Fetch bundle details
        $query = $db->table('carousels')->select('change_log')->where('id', $id)->get();
        $row = $query->getRow();

        if ($row) {
            $decodedData = json_decode($row->change_log, true);

            if (!is_array($decodedData)) {
                return view('edit_carousel_logs_view', ['updates' => []]); // Return empty if decoding fails
            }

            $updates = [];

            foreach ($decodedData as $key => $log) {
                // Extract only numeric keys (0, 1, 2, ...)
                if (is_numeric($key) && isset($log['timestamp'])) {
                    $updates[] = [
                        'updated_by' => $log['updated_by'] ?? 'Unknown',
                        'updated_at' => $log['timestamp'], // Fix: Use 'timestamp' instead of 'updated_at'
                        'changes' => $log['changes'] ?? [],
                    ];
                }
            }

            return view('edit_carousel_logs_view', ['updates' => $updates]);
        }

        return view('edit_carousel_logs_view', ['updates' => []]); // No logs found
    }


    public function getcarouselChangeLogs()
    {
        $db = \Config\Database::connect();
        $query = $db->table('carousels')->select('change_log')->get();
        $row = $query->getRow();

        if ($row) {
            $decodedData = json_decode($row->change_log, true);

            if (!is_array($decodedData)) {
                return []; // Return empty array if decoding fails
            }

            $updates = [];

            // Extract only the indexed updates (0, 1, 2, ...)
            foreach ($decodedData as $key => $log) {
                if (is_numeric($key) && isset($log['updated_at'])) {
                    $updates[] = $log;
                }
            }

            return $updates;
        }
        return [];
    }
























    //---------------------------------------------------------------------------------- Policy --------------------------------------------------------------------------------
    public function add_policy()
    {
        if ($this->request->isAJAX()) {
            $policyModel = new PolicyModel();
            $session = session();

            // Fetch user ID and name from session
            $userId = $session->get('user_id') ?? 1;
            $userName = $session->get('admin_name') ?? 'Admin';

            $addedBy = $userName . ' (' . $userId . ')'; // Format: "Name (ID)"

            $data = [
                'policy_name' => $this->request->getPost('policy_name'),
                'policy_description' => $this->request->getPost('policy_description'),
                'policy_link' => $this->request->getPost('policy_link'),
                'added_by' => $addedBy, // Storing both Name and ID
                'updated_by' => $addedBy, // Storing both Name and ID
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
            $session = session();
            $policyModel = new PolicyModel();
            $id = $this->request->getPost('policy_id');

            // Fetch existing policy data
            $existingPolicy = $policyModel->find($id);
            if (!$existingPolicy) {
                return $this->response->setJSON(['success' => false, 'message' => 'Policy not found.']);
            }

            // Retrieve user details
            $userId = $session->get('user_id');
            $userName = $session->get('admin_name') ?? $session->get('user_name'); // Get admin_name or fallback to user_name
            $updatedBy = !empty($userName) ? "$userName ($userId)" : "User ID ($userId)";

            // New data from request
            $newData = [
                'policy_name' => $this->request->getPost('policy_name'),
                'policy_description' => $this->request->getPost('policy_description'),
                'policy_link' => $this->request->getPost('policy_link'),
                'updated_by' => $updatedBy,
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            // Track changes (excluding updated_by & updated_at)
            $changes = [];
            foreach ($newData as $key => $value) {
                if (in_array($key, ['updated_by', 'updated_at'])) {
                    continue; // Skip tracking these fields
                }
                if ($existingPolicy[$key] != $value) {
                    $changes[$key] = [
                        'old' => $existingPolicy[$key],
                        'new' => $value
                    ];
                }
            }

            if (!empty($changes)) {
                // Fetch existing change log
                $existingChangeLog = !empty($existingPolicy['change_log']) ? json_decode($existingPolicy['change_log'], true) : [];
                if (!is_array($existingChangeLog)) {
                    $existingChangeLog = [];
                }

                // Append new change entry
                $newChange = [
                    'updated_by' => $updatedBy,
                    'timestamp' => date('Y-m-d H:i:s'),
                    'changes' => $changes
                ];

                $existingChangeLog[] = $newChange; // Append to logs

                // Store updated change log
                $newData['change_log'] = json_encode($existingChangeLog);

                // Update policy
                if ($policyModel->update($id, $newData)) {
                    return $this->response->setJSON([
                        'success' => true,
                        'message' => 'Policy updated successfully.',
                        'changes' => $changes, // Send back only actual changes
                    ]);
                } else {
                    return $this->response->setJSON(['success' => false, 'message' => 'Failed to update policy.']);
                }
            } else {
                return $this->response->setJSON(['success' => false, 'message' => 'No changes detected.']);
            }
        }

        return $this->response->setJSON(['success' => false, 'message' => 'Invalid request.']);
    }



    public function delete_policy($id)
    {
        $policyModel = new PolicyModel();
        $session = session();
        $deletedby = $session->get('admin_name') . '(' . $session->get('user_id') . ')';

        $data = [
            'is_deleted' => 1,
            'deleted_by' => $deletedby,
            'deleted_at' => date('Y-m-d H:i:s'),
        ];

        if ($policyModel->deletepolicy($id, $data)) {
            return redirect()->back()->with('success', 'Deleted successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to Delete.');
        }
    }

    public function Restorepolicy($id)
    {
        $policyModel = new policyModel();
        $session = session();
        $deletedby = $session->get('admin_name') . '(' . $session->get('user_id') . ')';

        $data = [
            'is_deleted' => 0,
            'deleted_by' => null,
            'deleted_at' => null,
        ];

        if ($policyModel->update($id, $data)) { // Use update() method
            return redirect()->back()->with('success', 'Restored successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to restore.');
        }
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
        $session = session();
        $userId = strval($session->get('user_id'));
        $userName = $session->get('admin_name') ?? $session->get('user_name'); // Get admin_name or fallback to user_name
        $updatedBy = !empty($userName) ? "$userName ($userId)" : "User ID ($userId)";

        if ($request->isAJAX()) {
            // Fetch existing footer data
            $existingFooter = $footerModel->find(1); // Footer ID = 1
            if (!$existingFooter) {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Footer data not found']);
            }

            // Function to format post values
            function formatPostValue($value)
            {
                return is_array($value) ? implode(", ", $value) : trim($value);
            }

            // Prepare new form data
            $newData = [
                'footer_email' => formatPostValue($request->getPost('Footer_mail')),
                'footer_hours' => formatPostValue($request->getPost('Footer_Hours')),
                'footer_name' => formatPostValue($request->getPost('Footer_payment')),
                'facebook' => formatPostValue($request->getPost('Facebook_link')),
                'instagram' => formatPostValue($request->getPost('Instagram_link')),
                'twitter' => formatPostValue($request->getPost('Twitter_link')),
                'youtube' => formatPostValue($request->getPost('Youtube_link')),
                'footer_payment_link1' => formatPostValue($request->getPost('socialpayment_link1')),
                'footer_payment_link2' => formatPostValue($request->getPost('socialpayment_link2')),
                'footer_payment_link3' => formatPostValue($request->getPost('socialpayment_link3')),
            ];

            // Detect changes (excluding `updated_by` & `updated_at`)
            $changes = [];
            foreach ($newData as $key => $value) {
                if ($existingFooter[$key] != $value) {
                    $changes[$key] = [
                        'old' => $existingFooter[$key] ?? 'N/A',
                        'new' => $value
                    ];
                }
            }

            if (empty($changes)) {
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'No changes detected.',
                ]);
            }

            // Retrieve existing change log
            $existingChangeLog = json_decode($existingFooter['change_log'] ?? '[]', true);
            if (!is_array($existingChangeLog)) {
                $existingChangeLog = []; // Ensure it's an array
            }

            // Append new change entry
            $newChangeLogEntry = [
                'updated_by' => $updatedBy,
                'timestamp' => date('Y-m-d H:i:s'),
                'changes' => $changes
            ];

            $existingChangeLog[] = $newChangeLogEntry; // Append changes

            // Store updated change log
            $newData['change_log'] = json_encode($existingChangeLog, JSON_UNESCAPED_SLASHES);

            log_message('info', 'Footer updated. Changes: ' . json_encode($changes));

            // Update footer data
            if ($footerModel->update(1, $newData)) {
                return $this->response->setJSON([
                    'status' => 'success',
                    'message' => 'Footer Updated Successfully',
                    'change_log' => $existingChangeLog, // ✅ Returns properly formatted log
                ]);
            } else {
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'Footer Update Failed',
                ]);
            }
        }

        return $this->response->setJSON(['status' => 'error', 'message' => 'Invalid Request']);
    }







    //<!----------------------------------------------------------------------------- About Page -------------------------------------------------------------------------------->
    public function update_about()
    {
        try {
            log_message('info', 'update_about function triggered');

            // Initialize session to get the logged-in user
            $session = \Config\Services::session();



            // Initialize Google Cloud Storage
            $storage = new \Google\Cloud\Storage\StorageClient([
                'keyFilePath' => WRITEPATH . 'public/mkvgsc.json',
                'projectId' => 'peak-tide-441609-r1',
            ]);
            $bucket = $storage->bucket('sportzsaga_imgs');

            // Fetch existing data
            $modal = new onlinestoremodal();
            $existingData = $modal->getabout();
            $existingData = $existingData ? (array) $existingData : [];

            log_message('info', 'Existing Data: ' . json_encode($existingData));

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
                'blogs' => $this->request->getPost('blogs'),
                'updated_by' => $session->get('admin_name') . ' (' . $session->get('user_id') . ')',

            ];

            // Handle background image
            $bgFile = $this->request->getFile('about_bg');
            if ($bgFile && $bgFile->isValid() && !$bgFile->hasMoved()) {
                $fileName = 'about/' . uniqid() . '_' . $bgFile->getClientName();
                $bucket->upload(fopen($bgFile->getTempName(), 'r'), ['name' => $fileName, 'predefinedAcl' => 'publicRead']);
                $data['about_bg'] = "https://storage.googleapis.com/sportzsaga_imgs/$fileName";
            } else {
                // Keep existing image if no new image is uploaded
                $data['about_bg'] = $existingData['about_bg'] ?? null;
            }

            // Handle icons
            $iconsData = json_decode($this->request->getPost('icons_data'), true) ?? [];
            for ($i = 1; $i <= 5; $i++) {
                $iconFile = $this->request->getFile("icon{$i}_file");
                if ($iconFile && $iconFile->isValid() && !$iconFile->hasMoved()) {
                    $fileName = 'icons/' . uniqid() . '_' . $iconFile->getClientName();
                    $bucket->upload(fopen($iconFile->getTempName(), 'r'), ['name' => $fileName, 'predefinedAcl' => 'publicRead']);
                    $iconsData[$i - 1]['icon'] = "https://storage.googleapis.com/sportzsaga_imgs/$fileName";
                }
                $data["icon{$i}"] = isset($iconsData[$i - 1]) ? json_encode($iconsData[$i - 1]) : ($existingData["icon{$i}"] ?? null);
            }

            // Handle info data
            $infoData = json_decode($this->request->getPost('info_data'), true) ?? [];
            foreach (['info_data1', 'info_data2', 'info_data3'] as $key) {
                $data[$key] = isset($infoData[$key]) ? json_encode($infoData[$key]) : ($existingData[$key] ?? null);
            }

            // Track changes properly
            $changes = [];
            foreach ($data as $key => $value) {
                $oldValue = isset($existingData[$key]) ? trim(strval($existingData[$key])) : null;
                $newValue = isset($value) ? trim(strval($value)) : null;

                // Skip unchanged values, also handle null cases properly
                if ($oldValue !== $newValue) {
                    $changes[$key] = ['old' => $oldValue ?? '', 'new' => $newValue ?? ''];
                }
            }

            // Update change log only if there are changes
            if (!empty($changes)) {
                $oldChangeLog = json_decode($existingData['change_log'] ?? '[]', true) ?? [];
                $oldChangeLog[] = [
                    'updated_by' => $session->get('admin_name') . ' (' . $session->get('user_id') . ')',
                    'timestamp' => date('Y-m-d H:i:s'),
                    'changes' => $changes
                ];
                $data['change_log'] = json_encode($oldChangeLog);
            }

            // Call update function
            $success = $modal->updateAbout($data);
            log_message('info', 'Database Update Result: ' . json_encode($success));

            return $this->response->setJSON([
                'success' => true,
                'message' => $success ? 'About page updated successfully' : 'No changes made',
                'changes' => $changes
            ]);
        } catch (\Exception $e) {
            log_message('error', 'Error updating about page: ' . $e->getMessage());
            return $this->response->setJSON([
                'success' => false,
                'message' => 'An error occurred while updating the about page'
            ]);
        }
    }


    // Contact
    public function update_contact()
    {
        try {
            $storage = new \Google\Cloud\Storage\StorageClient([
                'keyFilePath' => WRITEPATH . 'public/mkvgsc.json',
                'projectId' => 'peak-tide-441609-r1',
            ]);
            $bucketName = 'sportzsaga_imgs';
            $bucket = $storage->bucket($bucketName);

            log_message('info', 'update_contact function triggered');

            $session = \Config\Services::session();



            $db = \Config\Database::connect();
            $builder = $db->table('contactpage');
            $id = 1;

            $existingData = $builder->where('id', $id)->get()->getRowArray();
            if (!$existingData) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Contact page not found.'
                ]);
            }

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
                'contact_subscribe_btn' => $this->request->getPost('contact_subscribe_btn'),
                'updated_by' => $session->get('admin_name') . ' (' . $session->get('user_id') . ')',
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

            // Track changes
            $changes = [];
            foreach ($data as $key => $value) {
                if (isset($existingData[$key]) && trim(strval($existingData[$key])) !== trim(strval($value))) {
                    $changes[$key] = [
                        'old' => $existingData[$key],
                        'new' => $value
                    ];
                }
            }

            // Fetch existing change log
            $oldChangeLog = json_decode($existingData['change_log'] ?? '[]', true) ?? [];

            // Append new changes to change log
            if (!empty($changes)) {
                $oldChangeLog[] = [
                    'updated_by' => $session->get('admin_name') . ' (' . $session->get('user_id') . ')',
                    'timestamp' => date('Y-m-d H:i:s'),
                    'changes' => $changes
                ];
                $data['change_log'] = json_encode($oldChangeLog);
            }

            // Update database
            $builder->where('id', $id)->update($data);

            return $this->response->setJSON([
                'success' => true,
                'message' => 'Contact page updated successfully.',
                'changes' => $changes
            ]);
        } catch (\Exception $e) {
            log_message('error', 'Error updating contact page: ' . $e->getMessage());
            return $this->response->setJSON([
                'success' => false,
                'message' => 'An error occurred while updating the contact page.'
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

    //<!----------------------------------------------------------------------------------- Cart Page ---------------------------------------------------------------------------->

    public function update_cart()
    {
        try {
            log_message('info', 'update_cart function triggered');

            // Initialize Google Cloud Storage
            $storage = new \Google\Cloud\Storage\StorageClient([
                'keyFilePath' => WRITEPATH . 'public/mkvgsc.json',
                'projectId' => 'peak-tide-441609-r1',
            ]);
            $bucketName = 'sportzsaga_imgs';
            $bucket = $storage->bucket($bucketName);

            // Retrieve user ID from session
            $session = session();


            // Log all incoming POST data
            log_message('info', 'Received POST Data: ' . json_encode($this->request->getPost()));

            // Fetch existing data
            $modal = new onlinestoremodal();
            $existingData = $modal->getcartpage();
            log_message('info', 'Existing Data: ' . json_encode($existingData));

            // Prepare new data array
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

            log_message('info', 'Data to be updated: ' . json_encode($data));

            // Check for changes
            $changedFields = [];
            if ($existingData) {
                foreach ($data as $key => $newValue) {
                    $oldValue = $existingData[$key] ?? null;
                    if ($newValue !== $oldValue) {
                        $changedFields[$key] = [
                            'old' => $oldValue,
                            'new' => $newValue,
                        ];
                    }
                }

                if (!empty($changedFields)) {
                    // Get existing change log from the database
                    $existingChangeLog = !empty($existingData['change_log']) ? json_decode($existingData['change_log'], true) : [];
                    if (!is_array($existingChangeLog)) {
                        $existingChangeLog = [];
                    }

                    // Append only changed fields
                    $newChange = [
                        'updated_by' => $session->get('admin_name') . ' (' . $session->get('user_id') . ')',
                        'timestamp' => date('Y-m-d H:i:s'),
                        'changes' => $changedFields,
                    ];
                    $existingChangeLog[] = $newChange;

                    // Store updated change log
                    $data['change_log'] = json_encode($existingChangeLog);
                    log_message('info', 'Updated Change Log: ' . json_encode($data['change_log']));
                } else {
                    log_message('info', 'No changes detected, skipping update.');
                    return $this->response->setJSON([
                        'success' => false,
                        'message' => 'No changes were made to the Cart page'
                    ]);
                }
            }

            // Update record
            $affectedRows = $modal->updateCart($data);
            log_message('info', 'Database update affected rows: ' . $affectedRows);

            if ($affectedRows) {
                return $this->response->setJSON([
                    'success' => true,
                    'message' => 'Cart page updated successfully'
                ]);
            } else {
                log_message('error', 'No changes made to cart page.');
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

    // Checkout page

    public function update_checkout()
    {
        try {
            $session = session();
            $modal = new onlinestoremodal();

            // Fetch existing record
            $existingData = $modal->getCheckoutData();
            if (!$existingData) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Checkout page data not found'
                ]);
            }

            // Prepare data array
            $data = [
                'checkout_title' => $this->request->getPost('checkout_title'),
                'comment_info' => $this->request->getPost('comment_info'),
                'promocode_info' => $this->request->getPost('promocode_info')
            ];

            // Track changes
            $changes = [];
            foreach ($data as $key => $value) {
                if ($existingData[$key] != $value) {
                    $changes[$key] = [
                        'old' => $existingData[$key],
                        'new' => $value
                    ];
                }
            }

            if (!empty($changes)) {
                // Retrieve existing change log
                $existingChangeLog = json_decode($existingData['change_log'], true);
                if (!is_array($existingChangeLog)) {
                    $existingChangeLog = [];
                }

                // Append new changes to the change log
                $existingChangeLog[] = [
                    'updated_by' => $session->get('admin_name') . ' (' . $session->get('user_id') . ')',
                    'timestamp' => date('Y-m-d H:i:s'),
                    'changes' => $changes
                ];

                // Save the updated change log back into the database
                $data['change_log'] = json_encode($existingChangeLog);
            }

            // Update the checkout page
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

    //<!------------------------------------------------------------------------------------- Tracking page -------------------------------------------------------------------------->


    public function update_tracking()
    {
        try {
            $session = session();
            $modal = new onlinestoremodal();

            // Fetch existing record
            $existingData = $modal->getTrackingData();
            if (!$existingData) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Tracking page data not found'
                ]);
            }

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

            // Handle background images
            $bnr_bg = $this->request->getFile('bnr_bg');
            if ($bnr_bg && $bnr_bg->isValid() && !$bnr_bg->hasMoved()) {
                $fileName = 'contact/' . uniqid() . '_' . $bnr_bg->getClientName();
                $bucket->upload(
                    fopen($bnr_bg->getTempName(), 'r'),
                    ['name' => $fileName, 'predefinedAcl' => 'publicRead']
                );
                $data['bnr_bg'] = sprintf('https://storage.googleapis.com/%s/%s', $bucket->name(), $fileName);
            }

            $mobbnr_bg = $this->request->getFile('mobbnr_bg');
            if ($mobbnr_bg && $mobbnr_bg->isValid() && !$mobbnr_bg->hasMoved()) {
                $fileName = 'contact/' . uniqid() . '_' . $mobbnr_bg->getClientName();
                $bucket->upload(
                    fopen($mobbnr_bg->getTempName(), 'r'),
                    ['name' => $fileName, 'predefinedAcl' => 'publicRead']
                );
                $data['mobbnr_bg'] = sprintf('https://storage.googleapis.com/%s/%s', $bucket->name(), $fileName);
            }

            // Track changes and store each change as a separate entry
            $changes = [];
            foreach ($data as $key => $value) {
                if ($existingData[$key] != $value) {
                    $changes[] = [
                        $key => [
                            'old' => $existingData[$key],
                            'new' => $value
                        ]
                    ];
                }
            }

            if (!empty($changes)) {
                // Retrieve existing change log
                $existingChangeLog = json_decode($existingData['change_log'], true);
                if (!is_array($existingChangeLog)) {
                    $existingChangeLog = [];
                }

                // Append new changes with separate array format
                $existingChangeLog[] = [
                    'updated_by' => $session->get('admin_name') . ' (' . $session->get('user_id') . ')',
                    'timestamp' => date('Y-m-d H:i:s'),
                    'changes' => $changes
                ];

                // Save the updated change log back into the database
                $data['change_log'] = json_encode($existingChangeLog);
            }

            // Update the tracking page
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



    //<!------------------------------------------------------------------------------------- 404 page -------------------------------------------------------------------------->
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




    //<!------------------------------------------------------------------------------------- WISHLIST--------------------------------------------------------------------------
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
            $session = session();

            // Fetch user ID and name from session
            $userId = $session->get('user_id') ?? 1;
            $userName = $session->get('admin_name') ?? 'Admin';

            $addedBy = $userName . ' (' . $userId . ')'; // Format: "Name (ID)"

            $data = [
                'member_name' => $this->request->getPost('member_name'),
                'member_occupation' => $this->request->getPost('member_occupation'),
                'member_email' => $this->request->getPost('member_email'),
                'member_linkedin' => $this->request->getPost('member_linkedin'),
                'visibility' => $this->request->getPost('member_visibility'),
                'added_by' => $addedBy, // Now storing both Name and ID
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
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
                return $this->response->setJSON(['success' => true, 'message' => 'Member added successfully.']);
            } else {
                return $this->response->setJSON(['success' => false, 'message' => 'Failed to add member.']);
            }
        }

        return $this->response->setJSON(['success' => false, 'message' => 'Invalid request.']);
    }




    public function edit_members()
    {
        try {
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
                $session = session();


                // Fetch existing member data
                $existingMember = $members_model->find($id);
                if (!$existingMember) {
                    return $this->response->setJSON(['success' => false, 'message' => 'Member not found.']);
                }

                // New Data
                $data = [
                    'member_name' => $this->request->getPost('member_name'),
                    'member_occupation' => $this->request->getPost('member_occupation'),
                    'member_email' => $this->request->getPost('member_email'),
                    'member_linkedin' => $this->request->getPost('member_linkedin'),
                    'visibility' => $this->request->getPost('member_visibility'),

                ];

                // Track changes
                $changes = [];
                foreach ($data as $key => $value) {
                    if (trim(strval($existingMember[$key])) !== trim(strval($value))) {
                        $changes[$key] = [
                            'old' => $existingMember[$key],
                            'new' => $value
                        ];
                    }
                }

                // Handle image upload
                $member_pic = $this->request->getFile('member_pic');
                if ($member_pic && $member_pic->isValid() && !$member_pic->hasMoved()) {
                    // Delete old image if exists
                    if (!empty($existingMember['member_pic'])) {
                        $oldFilePath = parse_url($existingMember['member_pic'], PHP_URL_PATH);
                        $object = $bucket->object(ltrim($oldFilePath, '/'));
                        if ($object->exists()) {
                            $object->delete();
                        }
                    }

                    // Upload new image
                    $fileName = 'members/' . uniqid() . '_' . $member_pic->getClientName();
                    $object = $bucket->upload(
                        fopen($member_pic->getTempName(), 'r'),
                        [
                            'name' => $fileName,
                            'predefinedAcl' => 'publicRead',
                        ]
                    );

                    $imageUrl = sprintf('https://storage.googleapis.com/%s/%s', $bucket->name(), $fileName);
                    $data['member_pic'] = $imageUrl;

                    // Track image change
                    if ($existingMember['member_pic'] !== $imageUrl) {
                        $changes['member_pic'] = [
                            'old' => $existingMember['member_pic'],
                            'new' => $imageUrl
                        ];
                    }
                }

                // Fetch existing change log
                $oldChangeLog = json_decode($existingMember['change_log'], true) ?? [];

                // Append changes if there are any
                if (!empty($changes)) {
                    $newChangeLogEntry = [
                        'updated_by' => $session->get('admin_name') . ' (' . $session->get('user_id') . ')',
                        'timestamp' => date('Y-m-d H:i:s'),
                        'changes' => $changes
                    ];

                    $oldChangeLog[] = $newChangeLogEntry;
                    $data['change_log'] = json_encode($oldChangeLog);

                    // Log changes
                    log_message('info', 'Member ID: ' . $id . ' updated. Changes: ' . json_encode($changes));
                }

                // Always update (even if no changes) to refresh `updated_at`
                $members_model->update($id, $data);

                return $this->response->setJSON([
                    'success' => true,
                    'message' => 'Member updated successfully.',
                    'changes' => $changes,
                ]);
            }

            return $this->response->setJSON(['success' => false, 'message' => 'Invalid request.']);
        } catch (\Exception $e) {
            log_message('error', 'Error updating member: ' . $e->getMessage());
            return $this->response->setJSON(['success' => false, 'message' => 'An error occurred while updating the member.']);
        }
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

                // Fetch user ID and name from session
                $session = session();
                $userId = $session->get('user_id') ?? 1;
                $userName = $session->get('admin_name') ?? 'Admin';

                $addedBy = $userName . ' (' . $userId . ')'; // Format: "Name (ID)"

                // Save file URL to database
                $data = [
                    'logo' => $fileUrl,
                    'visibility' => $this->request->getPost('visibility'),
                    'title' => $this->request->getPost('title'),
                    'added_by' => $addedBy, // Now storing both Name and ID
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
                'keyFilePath' => WRITEPATH . 'public/mkvgsc.json',
                'projectId' => 'peak-tide-441609-r1',
            ]);
            $bucketName = 'sportzsaga_imgs';
            $bucket = $storage->bucket($bucketName);

            // Find the existing logo
            $existingLogo = $this->logoModel->find($logoId);
            if (!$existingLogo) {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Logo not found.']);
            }

            // New Data
            $newData = [
                'title' => $this->request->getPost('title'),
                'visibility' => $this->request->getPost('visibility'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            // Track changes
            $changes = [];
            foreach ($newData as $key => $value) {
                if (trim(strval($existingLogo[$key])) !== trim(strval($value))) {
                    $changes[$key] = [
                        'old' => $existingLogo[$key],
                        'new' => $value
                    ];
                }
            }

            // Check if a new file is uploaded
            $logo = $this->request->getFile('logo');
            $fileUrl = $existingLogo['logo']; // Default to old image URL

            if ($logo && $logo->isValid() && !$logo->hasMoved()) {
                // Delete old logo from Google Cloud Storage
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
                $newData['logo'] = $fileUrl;

                // Track logo change
                if ($existingLogo['logo'] !== $fileUrl) {
                    $changes['logo'] = [
                        'old' => $existingLogo['logo'],
                        'new' => $fileUrl
                    ];
                }
            }

            // Fetch existing change log
            $oldChangeLog = json_decode($existingLogo['change_log'], true) ?? [];

            // If changes exist, update and log them
            if (!empty($changes)) {
                // Append new changes instead of overwriting
                $newChangeLogEntry = [
                    'updated_by' => session()->get('user_id'),
                    'timestamp' => date('Y-m-d H:i:s'),
                    'changes' => $changes
                ];

                $oldChangeLog[] = $newChangeLogEntry;
                $newData['change_log'] = json_encode($oldChangeLog);

                // Log changes
                log_message('info', 'Logo ID: ' . $logoId . ' updated. Changes: ' . json_encode($changes));
            }

            // Always update (even if no changes) to refresh `updated_at`
            $this->logoModel->update($logoId, $newData);

            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Logo updated successfully.',
                'changes' => $changes,
                'file_url' => $fileUrl
            ]);
        } catch (\Exception $e) {
            log_message('error', 'Error updating logo: ' . $e->getMessage());
            return $this->response->setJSON(['status' => 'error', 'message' => 'An error occurred while updating the logo.']);
        }
    }




    // Soft delete a logo
    public function deleteLogo($logoId)
    {
        $userId = session()->get('user_id');

        if (!$logoId) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Invalid request.']);
        }

        $logoModel = new \App\Models\HomeLogoModel();

        // Check if logo exists
        $logo = $logoModel->find($logoId);
        if (!$logo) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Logo not found.']);
        }

        // Soft delete: update instead of deleting
        $deletedBy = session()->get('admin_name') . '(' . $userId . ')';
        $deletedAt = date('Y-m-d H:i:s');

        $updateSuccess = $logoModel->update($logoId, [
            'is_deleted' => 1,
            'deleted_by' => $deletedBy,
            'deleted_at' => $deletedAt,
        ]);

        if (!$updateSuccess) {
            log_message('error', "Failed to delete logo with ID: $logoId");
            return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to delete logo.']);
        }

        return $this->response->setJSON(['status' => 'success', 'message' => 'Logo deleted successfully.']);
    }


    // View all deleted logos
    public function deletedLogos()
    {
        $logoModel = new \App\Models\HomeLogoModel();
        $data['logos'] = $logoModel->where('is_deleted', 1)->findAll();
        return view('logos_deleted', $data);
    }

    // Restore a soft-deleted logo
    public function restoreLogo($logoId)
    {
        $logoModel = new \App\Models\HomeLogoModel();
        $logo = $logoModel->find($logoId);

        if (!$logo) {
            return redirect()->to('logos/deleted')->with('error', 'Logo not found.');
        }

        $logoModel->update($logoId, [
            'is_deleted' => 0,
            'deleted_by' => null,
            'deleted_at' => null,
        ]);

        return redirect()->to('online_store/edit')->with('success', 'Logo restored successfully.');
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
            $session = session();
            $userId = $session->get('user_id'); // Get user ID from session

            try {
                // Check if an entry with ID=1 already exists
                $existingRecord = $homeCollectionModel->find(1);

                if ($existingRecord) {
                    // Capture old data
                    $oldCollection = $existingRecord['collection_id'];

                    // Only proceed if there is a change
                    if ($oldCollection !== $favCollection) {
                        // Fetch existing change log and decode it
                        $existingChangeLog = !empty($existingRecord['change_log']) ? json_decode($existingRecord['change_log'], true) : [];

                        // Ensure it's an array
                        if (!is_array($existingChangeLog)) {
                            $existingChangeLog = [];
                        }

                        // Append new change entry
                        $newChange = [
                            'old' => $oldCollection,
                            'new' => $favCollection,
                            'updated_by' => $userId,
                            'timestamp' => date('Y-m-d H:i:s')
                        ];

                        $existingChangeLog[] = $newChange; // Append to the existing change log

                        // Update the existing record
                        $homeCollectionModel->update(1, [
                            'collection_id' => $favCollection,
                            'change_log' => json_encode($existingChangeLog)
                        ]);

                        return $this->response->setJSON([
                            'success' => true,
                            'message' => 'Collections updated successfully.',
                        ]);
                    } else {
                        return $this->response->setJSON([
                            'success' => false,
                            'message' => 'No changes detected.',
                        ]);
                    }
                } else {
                    // Insert a new record with ID=1
                    $homeCollectionModel->insert([
                        'id' => 1,
                        'collection_id' => $favCollection,
                        'change_log' => json_encode([
                            [
                                'old' => null,
                                'new' => $favCollection,
                                'updated_by' => $userId,
                                'timestamp' => date('Y-m-d H:i:s')
                            ]
                        ])
                    ]);

                    return $this->response->setJSON([
                        'success' => true,
                        'message' => 'Collections saved successfully.',
                    ]);
                }
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

    public function home_collection_change_logs($id = null)
    {
        $db = \Config\Database::connect();

        if ($id === null) {
            return view('collection_os_change_logs', ['updates' => []]);
        }

        $query = $db->table('home_collection')->select('change_log')->where('id', $id)->get();
        $row = $query->getRow();

        if ($row && !empty($row->change_log)) {
            $decodedData = json_decode($row->change_log, true);

            if (is_array($decodedData)) {
                $updates = [];

                foreach ($decodedData as $log) {
                    if (isset($log['timestamp'])) {
                        // Manually wrap old/new into a 'changes' array with a label
                        $changes = [
                            'home_collection_items' => [
                                'old' => $log['old'] ?? '',
                                'new' => $log['new'] ?? '',
                            ]
                        ];

                        $updates[] = [
                            'updated_by' => $log['updated_by'] ?? 'Unknown',
                            'updated_at' => $log['timestamp'],
                            'changes' => $changes,
                        ];
                    }
                }

                return view('collection_os_change_logs', ['updates' => $updates]);
            }
        }

        return view('collection_os_change_logs', ['updates' => []]);
    }



    public function gethome_collectionChangeLogs()
    {
        $db = \Config\Database::connect();
        $query = $db->table('home_collection')->select('change_log')->get();
        $row = $query->getRow();

        if ($row) {
            $decodedData = json_decode($row->change_log, true);

            if (!is_array($decodedData)) {
                return []; // Return empty array if decoding fails
            }

            $updates = [];

            // Extract only the indexed updates (0, 1, 2, ...)
            foreach ($decodedData as $key => $log) {
                if (is_numeric($key) && isset($log['updated_at'])) {
                    $updates[] = $log;
                }
            }

            return $updates;
        }
        return [];
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
            $session = session();


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
                $changes = [];
                $message = '';

                if ($existingRecord) {
                    // Track changes
                    if ($existingRecord['blog_id'] != $favBlog) {
                        $changes['blog_id'] = [
                            'old' => $existingRecord['blog_id'],
                            'new' => $favBlog
                        ];
                    }

                    // If no changes, return
                    if (empty($changes)) {
                        return $this->response->setJSON([
                            'success' => false,
                            'message' => 'No changes detected.',
                        ]);
                    }

                    // Retrieve and decode existing change log
                    $existingChangeLog = !empty($existingRecord['change_log']) ? json_decode($existingRecord['change_log'], true) : [];

                    // Append new change entry
                    $newChangeEntry = [
                        'updated_by' => $session->get('admin_name') . ' (' . $session->get('user_id') . ')',
                        'timestamp' => date('Y-m-d H:i:s'),
                        'changes' => $changes
                    ];

                    // Store the entire history as an array of JSON objects
                    $existingChangeLog[] = $newChangeEntry;

                    // Update the existing record with new change log
                    $homeBlogModel->update(1, [
                        'blog_id' => $favBlog,
                        'updated_by' => $session->get('admin_name') . ' (' . $session->get('user_id') . ')',
                        'edited_at' => date('Y-m-d H:i:s'),
                        'change_log' => json_encode($existingChangeLog) // Store as an array of JSON objects
                    ]);
                    $message = 'Blogs updated successfully.';
                } else {
                    // First-time insert with an initial change log
                    $newChangeLog = [
                        [
                            'updated_by' => $session->get('admin_name') . ' (' . $session->get('user_id') . ')',
                            'timestamp' => date('Y-m-d H:i:s'),
                            'changes' => ['blog_id' => ['old' => null, 'new' => $favBlog]]
                        ]
                    ];

                    $homeBlogModel->insert([
                        'id' => 1,
                        'blog_id' => $favBlog,
                        'updated_by' => $session->get('admin_name') . ' (' . $session->get('user_id') . ')',
                        'edited_at' => date('Y-m-d H:i:s'),
                        'change_log' => json_encode($newChangeLog) // Store as an array of JSON objects
                    ]);
                    $message = 'Blogs saved successfully.';
                }

                return $this->response->setJSON([
                    'success' => true,
                    'message' => $message,
                    'changes' => $changes,
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
            $session = session();
            $data = $this->request->getPost();

            // Fetch existing record
            $existingData = $model->find(1);
            if (!$existingData) {
                return redirect()->back()->with('error', 'Carousel data not found.');
            }

            // Assign selected values to data array
            $data['select_link'] = $this->request->getPost('select_link');
            $data['selected_product'] = ($data['select_link'] === 'product') ? $this->request->getPost('selected_product') : null;
            $data['selected_collection'] = ($data['select_link'] === 'collection') ? $this->request->getPost('selected_collection') : null;

            // Initialize Google Cloud Storage
            $storage = new \Google\Cloud\Storage\StorageClient([
                'keyFilePath' => WRITEPATH . 'public/mkvgsc.json',
                'projectId' => 'peak-tide-441609-r1',
            ]);
            $bucket = $storage->bucket('sportzsaga_imgs');

            // Handle file uploads
            foreach (['image', 'image_mobile'] as $field) {
                $file = $this->request->getFile($field);
                if ($file && $file->isValid() && !$file->hasMoved()) {
                    $fileName = 'carousel/' . uniqid() . '_' . $file->getClientName();
                    $object = $bucket->upload(fopen($file->getTempName(), 'r'), ['name' => $fileName, 'predefinedAcl' => 'publicRead']);
                    $data[$field] = sprintf('https://storage.googleapis.com/%s/%s', $bucket->name(), $fileName);
                }
            }

            // Track changes
            $changes = [];
            foreach ($data as $key => $value) {
                if ($existingData[$key] != $value) {
                    $changes[$key] = [
                        'old' => $existingData[$key],
                        'new' => $value
                    ];
                }
            }

            if (!empty($changes)) {
                // Retrieve existing change log
                $existingChangeLog = json_decode($existingData['change_log'], true);
                if (!is_array($existingChangeLog)) {
                    $existingChangeLog = [];
                }

                // Append new changes to the change log
                $existingChangeLog[] = [
                    'updated_by' => $session->get('user_id'),
                    'timestamp' => date('Y-m-d H:i:s'),
                    'changes' => $changes
                ];

                // Save the updated change log back into the database
                $data['change_log'] = json_encode($existingChangeLog);
            }

            // Update the database
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

    // Home Image

    public function save()
    {
        try {
            helper(['form', 'url']);
            $session = session(); // Get the session instance

            log_message('info', 'Received Data: ' . json_encode($this->request->getPost()));

            $homeImageModel = new \App\Models\HomeImageModel();

            // Fetch existing record (assuming ID=1)
            $existingRecord = $homeImageModel->find(1);

            // Prepare new data for saving
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
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => $session->get('admin_name') . ' (' . $session->get('user_id') . ')', // Store the user ID who made the update
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

            // Determine what has changed
            $changedFields = [];
            if ($existingRecord) {
                foreach ($data as $key => $newValue) {
                    $oldValue = $existingRecord[$key] ?? null;

                    // Only log changes if the new value is different from the old value
                    if ($newValue !== $oldValue) {
                        $changedFields[$key] = [
                            'old' => $oldValue,
                            'new' => $newValue,
                        ];
                    }
                }
            }

            // If there are changes, update the change_log
            if (!empty($changedFields)) {
                $existingChangeLog = !empty($existingRecord['change_log']) ? json_decode($existingRecord['change_log'], true) : [];
                if (!is_array($existingChangeLog)) {
                    $existingChangeLog = [];
                }

                // Append new change entry with only changed fields
                $newChange = [
                    'updated_by' => $session->get('admin_name') . ' (' . $session->get('user_id') . ')',
                    'changes' => $changedFields,
                    'timestamp' => date('Y-m-d H:i:s'),
                ];

                $existingChangeLog[] = $newChange;
                $data['change_log'] = json_encode($existingChangeLog);
            }

            // Save or update the data (assumes one row for home_image, always with ID=1)
            $homeImageModel->update(1, $data);

            return redirect()->to(base_url('online_store/edit'))->with('success', 'Data saved successfully.');
        } catch (\Exception $e) {
            log_message('error', 'Error saving data: ' . $e->getMessage());
            return redirect()->to(base_url('online_store/edit'))->with('error', 'Failed to save data: ' . $e->getMessage());
        }
    }




    //<!------------------------------------------------------------------------- Marquee text ----------------------------------------------------------------------------------------------->
    public function saveMarqueeText()
    {
        $session = session();
        $response = ['status' => 'error', 'message' => 'Something went wrong'];


        $userId = $session->get('user_id');

        if (!$userId) {
            $response['message'] = 'User session not found. Please log in again.';
            return $this->response->setJSON($response);
        }

        log_message('debug', 'Session User ID: ' . $userId);

        $marqueeText = $this->request->getPost('marqueeText');
        $marqueeTextLink = $this->request->getPost('marqueeText_link');
        $textVisibility = $this->request->getPost('text_visibility');

        // ✅ Validation
        if (empty($marqueeText)) {
            $response['message'] = 'Text field is required.';
            return $this->response->setJSON($response);
        }


        $data = [
            'marqueeText' => $marqueeText,
            'marqueeText_link' => $marqueeTextLink,
            'text_visibility' => $textVisibility,
            'added_by' => $userId,
            'created_at' => date('Y-m-d H:i:s'),
        ];

        log_message('debug', 'Final Data to Insert: ' . print_r($data, true));

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
        $session = session();
        $userId = $session->get('user_id');


        $marquee = $model->find($id);
        if (!$marquee) {
            return redirect()->to('online_store/edit')->with('error', 'Marquee text not found.');
        }


        $updateSuccess = $model->update($id, [
            'is_deleted' => 1,
            'deleted_by' => $userId,
            'deleted_at' => date('Y-m-d H:i:s')
        ]);

        if (!$updateSuccess) {
            return redirect()->to('online_store/edit')->with('error', 'Failed to delete marquee text. Please try again.');
        }

        return redirect()->to('online_store/edit')->with('success', 'Marquee text deleted successfully.');
    }


    public function restore_marquee($id)
    {
        $model = new MarqueeTextModel();

        $marquee = $model->where('id', $id)->where('is_deleted', 1)->first();
        if (!$marquee) {
            return redirect()->to('marquees/deleted')->with('error', 'Marquee text not found.');
        }


        $model->update($id, [
            'is_deleted' => 0,
            'deleted_by' => null,
            'deleted_at' => null
        ]);

        return redirect()->to('online_store/edit')->with('success', 'Marquee text restored successfully.');
    }

    public function UpdateMarquee($id)
    {
        $model = new MarqueeTextModel();
        $session = session();

        // Validate the input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'marqueeText' => 'required',
            'marqueeText_link' => 'permit_empty|valid_url',
            'text_visibility' => 'required|in_list[0,1]'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->to('online_store/edit')->with('error', 'Validation failed. Please check your input.');
        }

        // Fetch the existing record
        $existingData = $model->find($id);
        if (!$existingData) {
            return redirect()->to('online_store/edit')->with('error', 'Marquee text not found.');
        }

        // Prepare new data
        $newData = [
            'marqueeText' => $this->request->getPost('marqueeText'),
            'marqueeText_link' => $this->request->getPost('marqueeText_link'),
            'text_visibility' => $this->request->getPost('text_visibility'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        // Track changes
        $changes = [];
        foreach ($newData as $key => $value) {
            if ($existingData[$key] != $value) {
                $changes[$key] = [
                    'old' => $existingData[$key],
                    'new' => $value
                ];
            }
        }

        if (!empty($changes)) {
            // Retrieve existing change log
            $existingChangeLog = json_decode($existingData['change_log'], true);
            if (!is_array($existingChangeLog)) {
                $existingChangeLog = [];
            }

            // Append the new changes as a new JSON entry
            $existingChangeLog[] = [
                'updated_by' => $session->get('user_id'),
                'timestamp' => date('Y-m-d H:i:s'),
                'changes' => $changes
            ];

            // Save back to the database
            $newData['change_log'] = json_encode($existingChangeLog);

            // Update the database
            if ($model->update($id, $newData)) {
                return redirect()->to('online_store/edit')->with('success', 'Text updated successfully.');
            } else {
                return redirect()->to('online_store/edit')->with('error', 'Failed to update text.');
            }
        }

        return redirect()->to('online_store/edit')->with('success', 'No changes were made.');
    }


    public function marquee_change_logs($id = null)
    {
        $db = \Config\Database::connect();

        if ($id === null) {
            return view('marquee_change_logs', ['updates' => []]); // No bundle ID provided
        }

        // Fetch bundle details
        $query = $db->table('marquee_texts')->select('change_log')->where('id', $id)->get();
        $row = $query->getRow();

        if ($row) {
            $decodedData = json_decode($row->change_log, true);

            if (!is_array($decodedData)) {
                return view('marquee_change_logs', ['updates' => []]); // Return empty if decoding fails
            }

            $updates = [];

            foreach ($decodedData as $key => $log) {
                // Extract only numeric keys (0, 1, 2, ...)
                if (is_numeric($key) && isset($log['timestamp'])) {
                    $updates[] = [
                        'updated_by' => $log['updated_by'] ?? 'Unknown',
                        'updated_at' => $log['timestamp'], // Fix: Use 'timestamp' instead of 'updated_at'
                        'changes' => $log['changes'] ?? [],
                    ];
                }
            }

            return view('marquee_change_logs', ['updates' => $updates]);
        }

        return view('marquee_change_logs', ['updates' => []]); // No logs found
    }


    public function getmarqueeLogs()
    {
        $db = \Config\Database::connect();
        $query = $db->table('marquee_texts')->select('change_log')->get();
        $row = $query->getRow();

        if ($row) {
            $decodedData = json_decode($row->change_log, true);

            if (!is_array($decodedData)) {
                return []; // Return empty array if decoding fails
            }

            $updates = [];

            // Extract only the indexed updates (0, 1, 2, ...)
            foreach ($decodedData as $key => $log) {
                if (is_numeric($key) && isset($log['updated_at'])) {
                    $updates[] = $log;
                }
            }

            return $updates;
        }
        return [];
    }




    //<!-------------------------------------------------------------------------------------- Marquee Second Form -----------------------------------------------------------------------

    public function saveBottomText()
    {
        $model = new onlinestoremodal();
        $session = session();
        $userId = $session->get('user_id'); // Get logged-in user ID

        // Sanitize inputs to remove unwanted `value="..."` wrappers
        function cleanInput($input)
        {
            return trim(str_replace(['value="', '"'], '', htmlspecialchars_decode(strip_tags($input), ENT_QUOTES)));
        }

        $newData = [
            'marqueebottomText1' => cleanInput($this->request->getPost('marqueebottomText1')),
            'marqueebottomDescription1' => cleanInput($this->request->getPost('marqueebottomDescription1')),
            'marqueebottomText2' => cleanInput($this->request->getPost('marqueebottomText2')),
            'marqueebottomDescription2' => cleanInput($this->request->getPost('marqueebottomDescription2')),
            'marqueebottomText3' => cleanInput($this->request->getPost('marqueebottomText3')),
            'marqueebottomDescription3' => cleanInput($this->request->getPost('marqueebottomDescription3')),
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => $userId,
        ];

        // Fetch the existing row
        $existingRow = $model->db->table('marqueebottomtext')->where('id', 1)->get()->getRowArray();

        if ($existingRow) {
            // Track changes (only if actual content is modified)
            $changes = [];
            foreach ($newData as $key => $value) {
                $existingValue = cleanInput($existingRow[$key] ?? '');

                if ($existingValue !== $value) {
                    $changes[$key] = [
                        'old' => $existingValue,
                        'new' => $value
                    ];
                }
            }

            if (!empty($changes)) {
                // Retrieve existing change log
                $existingChangeLog = json_decode($existingRow['change_log'] ?? '[]', true);
                if (!is_array($existingChangeLog)) {
                    $existingChangeLog = [];
                }

                // Append new change log entry
                $existingChangeLog[] = [
                    'updated_by' => $userId,
                    'timestamp' => date('Y-m-d H:i:s'),
                    'changes' => $changes
                ];

                // Store changes in JSON format
                $newData['change_log'] = json_encode($existingChangeLog, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

                // Update the existing row
                if ($model->db->table('marqueebottomtext')->update($newData, ['id' => 1])) {
                    return redirect()->back()->with('success', 'Bottom text updated successfully.');
                } else {
                    return redirect()->back()->with('error', 'Failed to update bottom text.');
                }
            }

            return redirect()->back()->with('info', 'No changes detected.');
        } else {
            // Insert as new row if it doesn't exist
            $newData['id'] = 1;
            $newData['change_log'] = json_encode([
                [
                    'updated_by' => $userId,
                    'timestamp' => date('Y-m-d H:i:s'),
                    'changes' => 'Initial data entry'
                ]
            ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

            if ($model->db->table('marqueebottomtext')->insert($newData)) {
                return redirect()->back()->with('success', 'Bottom text saved successfully.');
            } else {
                return redirect()->back()->with('error', 'Failed to save bottom text.');
            }
        }
    }



























    //---------------------------------------------------------------------------------------- Header pages Delete-------------------------------------------------------------------------------

    public function delete_page($id)
    {
        $pageModel = new PageModel();
        $session = session();
        $userId = $session->get('user_id');


        $page = $pageModel->find($id);
        if (!$page) {
            return redirect()->to('online_store/edit')->with('error', 'Page not found.');
        }


        $updateSuccess = $pageModel->update($id, [
            'is_deleted' => 1,
            'deleted_by' => $userId,
            'deleted_at' => date('Y-m-d H:i:s')
        ]);

        if (!$updateSuccess) {
            return redirect()->to('online_store/edit')->with('error', 'Failed to delete page. Please try again.');
        }

        return redirect()->to('online_store/edit')->with('success', 'Page deleted successfully.');
    }


    public function restore_page($id)
    {
        $pageModel = new PageModel();


        $page = $pageModel->where('id', $id)->where('is_deleted', 1)->first();
        if (!$page) {
            return redirect()->to('header_pages/deleted')->with('error', 'Page not found.');
        }


        $pageModel->update($id, [
            'is_deleted' => 0,
            'deleted_by' => null,
            'deleted_at' => null
        ]);

        return redirect()->to('online_store/edit')->with('success', 'Page restored successfully.');
    }











    ////////////////////////////////////////////////////////////////////// Product Selection section //////////////////////////////////////////////////////////////////
    public function add_new_product()
    {
        $session = session();
        $addedBy = $session->get('admin_name') . '(' . $session->get('user_id') . ')';
        $productModel = new onlinestoremodal();

        // Get form inputs
        $title = $this->request->getPost('product_title');
        $description = $this->request->getPost('product_description');
        $selectionType = $this->request->getPost('productcarousel_select_type'); // ✅ Fixed ID mismatch
        $visibility = $this->request->getPost('productcar_visibility'); // ✅ Added visibility

        // Get selected product or collection IDs
        $selectedProducts = json_decode($this->request->getPost('selected_product_items'), true);
        $selectedCarCollections = json_decode($this->request->getPost('selected_collection_items'), true);

        $selectedItems = [];

        if ($selectionType === 'product' && !empty($selectedProducts)) {
            // ✅ Ensure valid JSON format
            $selectedItems = json_encode($selectedProducts);
        } elseif ($selectionType === 'collection' && !empty($selectedCarCollections)) {
            // ✅ Ensure collection_id is correctly assigned
            $collectionid = is_array($selectedCarCollections) ? reset($selectedCarCollections) : $selectedCarCollections;

            // Fetch product IDs linked to this collection
            $collectionData = $productModel->GetProdctsBycollectionid($collectionid);

            if ($collectionData && !empty($collectionData['product_ids'])) {
                // ✅ Convert comma-separated product IDs from the collection into JSON array
                $selectedItems = json_encode(explode(',', $collectionData['product_ids']));
            }
        }

        // ✅ Prepare data for insertion
        $data = [
            'title' => $title,
            'description' => $description,
            'selection_type' => $selectionType,
            'selected_items' => $selectedItems ?: json_encode([]), // ✅ Ensure valid JSON
            'collection_id' => $collectionid ?? NULL, // ✅ Ensures NULL value doesn't break SQL
            'visibility' => $visibility,
            'added_by' => $addedBy,
            'created_at' => date('Y-m-d H:i:s'),
        ];

        // ✅ Debugging: Log the SQL query before execution
        log_message('error', 'Insert Query: ' . json_encode($data));

        // Insert into database
        if ($productModel->InsertProductCarData($data)) {
            return redirect()->back()->with('success', 'Product added successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to add product.');
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
        $session = session();
        $updatedBy = $session->get('admin_name') . '(' . $session->get('user_id') . ')';
        $productModel = new onlinestoremodal();

        // Get form inputs
        $title = $this->request->getPost('product_title');
        $description = $this->request->getPost('product_description');
        $selectionType = $this->request->getPost('select_type');

        // Get selected product or collection IDs
        $selectedProducts = $this->request->getPost('selected_product');
        $selectedCarCollections = $this->request->getPost('selected_collection');

        $selectedItems = [];

        if ($selectionType === 'product' && !empty($selectedProducts)) {
            // Convert array to JSON format for storage
            $selectedItems = json_encode($selectedProducts);
        } elseif ($selectionType === 'collection' && !empty($selectedCarCollections)) {
            // Decode JSON collection ID
            $collectionid = is_array($selectedCarCollections) ? reset($selectedCarCollections) : (string) $selectedCarCollections;

            // Fetch product IDs linked to this collection
            $collectionData = $productModel->GetProdctsBycollectionid($collectionid);

            if ($collectionData && !empty($collectionData['product_ids'])) {
                // Convert comma-separated product IDs from the collection into a JSON array
                $selectedItems = json_encode(explode(',', $collectionData['product_ids']));
            }
        }

        // Prepare data for update
        $data = [
            'title' => $title,
            'description' => $description,
            'selection_type' => $selectionType,
            'selected_items' => $selectedItems,
            'collection_id' => $collectionid ?? null,
            'updated_by' => $updatedBy,
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        // Update the database record
        if ($productModel->updateProductData($id, $data)) {
            return redirect()->back()->with('success', 'Product updated successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to update product.');
        }
    }

    public function reorder_products()
    {
        $requestData = $this->request->getJSON(true);
        $productModel = new onlinestoremodal();

        if (!isset($requestData['reorderedProducts']) || empty($requestData['reorderedProducts'])) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'No data provided']);
        }

        try {
            foreach ($requestData['reorderedProducts'] as $product) {
                $productModel->UpdateProductOrder($product['id'], ['display_order' => $product['position']]);
            }
            return $this->response->setJSON(['status' => 'success', 'message' => 'Product order updated']);
        } catch (\Exception $e) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to update product order.']);
        }
    }

    public function delete_product($id)
    {
        $session = session();
        $deletedBy = $session->get('admin_name') . '(' . $session->get('user_id') . ')';
        $productModel = new onlinestoremodal();

        $data = [
            'is_deleted' => 1,
            'deleted_by' => $deletedBy,
            'deleted_at' => date('Y-m-d H:i:s'),
        ];

        if ($productModel->deleteProductData($id, $data)) {
            return redirect()->back()->with('success', 'Product deleted successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to delete product.');
        }
    }


    //<!-------------------------------------------------------------------------------------- Blog ---------------------------------------------------------------------------->
    public function saveBlogs()
    {
        try {
            if ($this->request->getMethod() !== 'post') {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Invalid request method.']);
            }

            log_message('debug', 'Received POST data: ' . print_r($this->request->getPost(), true));

            $contentType = trim($this->request->getPost('content_type'));

            if (empty($contentType)) {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Content type is missing.']);
            }

            $blogModel = new BlogModel();
            $session = session();

            // Fetch user ID and name from session
            $userId = $session->get('user_id') ?? 1;
            $userName = $session->get('admin_name') ?? 'Admin';  // Ensure you're using the correct session key
            $addedBy = $userName . ' (' . $userId . ')'; // Concatenating name and ID

            $data = [
                'blogs_name' => $this->request->getPost('blogs_name'),
                'blogs_description' => $this->request->getPost('blogs_description'),
                'content_type' => $contentType,
                'blogs' => json_encode(array_filter(explode(',', $this->request->getPost('blogs')))),
                'tags' => json_encode(array_filter(explode(',', $this->request->getPost('tags')))),
                'added_by' => $addedBy,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            log_message('debug', 'Data before insert: ' . json_encode($data));

            if (!$blogModel->insert($data)) {
                log_message('error', 'DB Insert Failed: ' . json_encode($blogModel->errors()));
                return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to insert data.']);
            }

            return $this->response->setJSON(['status' => 'success', 'message' => 'Blog saved successfully.']);
        } catch (\Exception $e) {
            return $this->response->setJSON(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function updateBlog($id)
    {
        try {
            log_message('debug', 'Received blog ID: ' . $id);

            if ($this->request->getMethod() === 'post') {
                $db = db_connect();
                $builder = $db->table('onlinestore_blogs');

                // Fetch existing blog data
                $blogData = $builder->where('id', $id)->get()->getRowArray();
                if (!$blogData) {
                    log_message('error', 'Blog not found for ID: ' . $id);
                    return $this->response->setJSON(['status' => 'error', 'message' => 'Blog not found.']);
                }

                // Get the content type from the form
                $content_type = $this->request->getPost('content_type');

                // Prepare update data
                $data = [
                    'blogs_name' => $this->request->getPost('blogs_name'),
                    'blogs_description' => $this->request->getPost('blogs_description'),
                    'content_type' => $content_type, // Ensure content type is updated
                    'blogs' => ($content_type === 'blogs') ? json_encode($this->request->getPost('blogs') ?? []) : json_encode([]),
                    'tags' => ($content_type === 'tags') ? json_encode($this->request->getPost('tags') ?? []) : json_encode([]),
                    'updated_by' => session('admin_name') . ' (' . session('user_id') . ')',
                    'updated_at' => date('Y-m-d H:i:s')
                ];

                // Track changes
                $changes = [];
                foreach ($data as $key => $value) {
                    if (trim(strval($blogData[$key])) !== trim(strval($value))) {
                        $changes[$key] = [
                            'old' => $blogData[$key],
                            'new' => $value
                        ];
                    }
                }

                // Fetch existing change log
                $oldChangeLog = json_decode($blogData['change_log'], true) ?? [];

                // Append new changes to change log
                if (!empty($changes)) {
                    $newChangeLogEntry = [
                        'updated_by' => session('admin_name') . ' (' . session('user_id') . ')',
                        'timestamp' => date('Y-m-d H:i:s'),
                        'changes' => $changes
                    ];

                    $oldChangeLog[] = $newChangeLogEntry;
                    $data['change_log'] = json_encode($oldChangeLog);

                    // Log changes
                    log_message('info', 'Blog ID: ' . $id . ' updated. Changes: ' . json_encode($changes));
                }

                // Always update even if no changes are detected (to refresh updated_at)
                $builder->where('id', $id)->update($data);

                return $this->response->setJSON([
                    'status' => 'success',
                    'message' => 'Blog updated successfully.',
                    'changes' => $changes,
                ]);
            }

            return $this->response->setStatusCode(400)->setJSON(['status' => 'error', 'message' => 'Invalid request.']);
        } catch (\Exception $e) {
            log_message('error', 'Error updating blog: ' . $e->getMessage());
            return $this->response->setJSON(['status' => 'error', 'message' => 'An error occurred while updating the blog.']);
        }
    }




    // sweet delete message function 
    public function deleteBlog($id)
    {
        $blogModel = new BlogModel();
        $session = session();
        $deletedby = $session->get('admin_name') . '(' . $session->get('user_id') . ')';

        $data = [
            'is_deleted' => 1,
            'deleted_by' => $deletedby,
            'deleted_at' => date('Y-m-d H:i:s'),
        ];

        if ($blogModel->DeleteRelBlog($id, $data)) {
            return redirect()->back()->with('success', 'Deleted successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to Delete.');
        }
    }

    public function RestoreBlog($id)
    {
        $blogModel = new BlogModel();
        $session = session();
        $deletedby = $session->get('admin_name') . '(' . $session->get('user_id') . ')';

        $data = [
            'is_deleted' => 0,
            'deleted_by' => null,
            'deleted_at' => null,
        ];

        if ($blogModel->update($id, $data)) { // Use update() method
            return redirect()->back()->with('success', 'Restored successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to restore.');
        }
    }









    //<!---------------------------------------------------------------------------------- Logs ---------------------------------------------------------------------------------------->





    // sweet delete message function 
    public function deletemember($id)
    {
        $members_model = new MemberModel();
        $session = session();
        $deletedby = $session->get('admin_name') . '(' . $session->get('user_id') . ')';

        $data = [
            'is_deleted' => 1,
            'deleted_by' => $deletedby,
            'deleted_at' => date('Y-m-d H:i:s'),
        ];

        if ($members_model->Deletemembers($id, $data)) {
            return redirect()->back()->with('success', 'Deleted successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to Delete.');
        }
    }


    public function Restoremember($id)
    {
        $members_model = new MemberModel();
        $session = session();
        $deletedby = $session->get('admin_name') . '(' . $session->get('user_id') . ')';

        $data = [
            'is_deleted' => 0,
            'deleted_by' => null,
            'deleted_at' => null,
        ];

        if ($members_model->update($id, $data)) { // Use update() method
            return redirect()->back()->with('success', 'Restored successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to restore.');
        }
    }

    public function Carousel2_history($carousel_id)
    {
        $carouselModel = new \App\Models\onlinestoremodal();

        // Fetch change log
        $updates = $carouselModel->getChangeLog($carousel_id);

        return view('carousel2_change_logs_view', ['updates' => $updates]);
    }

    public function logo_history($logo_id)
    {
        $logomodel = new \App\Models\onlinestoremodal();

        // Fetch change log
        $updates = $logomodel->getLogochange($logo_id);


        return view('home_logo_change_logs_view', ['updates' => $updates]);
    }

    public function image_history($image_id)
    {
        $imagemodel = new \App\Models\onlinestoremodal();

        // Fetch change log
        $updates = $imagemodel->getimagechange($image_id);

        return view('home_image_change_logs_view', ['updates' => $updates]);
    }

    public function home_blog_history($home_blog_id)
    {
        $blogmodel = new \App\Models\onlinestoremodal();

        // Fetch change log
        $updates = $blogmodel->gethome_blogchange($home_blog_id);

        return view('home_blog_change_logs_view', ['updates' => $updates]);
    }

    public function blog1_history($blog1_id)
    {
        $blog1model = new \App\Models\onlinestoremodal();

        // Fetch change log
        $updates = $blog1model->getblog1change($blog1_id);

        return view('blog1_change_logs_view', ['updates' => $updates]);
    }

    public function blog2_history($blog2_id)
    {
        $blog2model = new \App\Models\onlinestoremodal();

        // Fetch change log
        $updates = $blog2model->getblog2change($blog2_id);

        return view('blog2_change_logs_view', ['updates' => $updates]);
    }


    public function singleblog_history($singleblog_id)
    {
        $singleblogmodel = new \App\Models\onlinestoremodal();

        // Fetch change log
        $updates = $singleblogmodel->getsingleblogchange($singleblog_id);

        return view('single_blog_change_logs_view', ['updates' => $updates]);
    }

    public function collection_history($collection_id)
    {
        $collectionmodel = new \App\Models\onlinestoremodal();

        // Fetch change log
        $updates = $collectionmodel->getcollectionchange($collection_id);

        return view('os_collection_change_logs_view', ['updates' => $updates]);
    }

    public function product_history($product_id)
    {
        $productmodel = new \App\Models\onlinestoremodal();

        // Fetch change log
        $updates = $productmodel->getproductchange($product_id);

        return view('os_product_change_logs_view', ['updates' => $updates]);
    }


    public function policies_history($policies_id)
    {
        $policiesmodel = new \App\Models\onlinestoremodal();

        // Fetch change log
        $updates = $policiesmodel->getpolicieschange($policies_id);

        return view('os_policies_change_logs_view', ['updates' => $updates]);
    }


    public function Footer_history($Footer_id)
    {
        $Footermodel = new \App\Models\onlinestoremodal();

        // Fetch change log
        $updates = $Footermodel->getfooterchange($Footer_id);

        return view('os_Footer_change_logs_view', ['updates' => $updates]);
    }

    public function Header_history($Header_id)
    {
        $Headermodel = new \App\Models\onlinestoremodal();

        // Fetch change log
        $updates = $Headermodel->getheaderchange($Header_id);

        return view('os_Header_change_logs_view', ['updates' => $updates]);
    }

    public function email_pop_up_history($email_id)
    {
        $emailmodel = new \App\Models\onlinestoremodal();

        // Fetch change log
        $updates = $emailmodel->getemailchange($email_id);

        return view('os_email_change_logs_view', ['updates' => $updates]);
    }


    public function about_history($about_id)
    {
        $aboutmodel = new \App\Models\onlinestoremodal();

        // Fetch change log
        $updates = $aboutmodel->getaboutchange($about_id);

        return view('os_about_change_logs_view', ['updates' => $updates]);
    }

    public function contact_history($contact_id)
    {
        $contactmodel = new \App\Models\onlinestoremodal();

        // Fetch change log
        $updates = $contactmodel->getcontactchange($contact_id);

        return view('os_contact_change_logs_view', ['updates' => $updates]);
    }

    public function cart_history($cart_id)
    {
        $cartmodel = new \App\Models\onlinestoremodal();

        // Fetch change log
        $updates = $cartmodel->getcartpagechange($cart_id);

        return view('os_cart_change_logs_view', ['updates' => $updates]);
    }


    public function checkout_history($checkout_id)
    {
        $checkoutmodel = new \App\Models\onlinestoremodal();

        // Fetch change log
        $updates = $checkoutmodel->getcheckoutchange($checkout_id);

        return view('os_checkout_change_logs_view', ['updates' => $updates]);
    }


    public function tracking_history($tracking_id)
    {
        $trackingmodel = new \App\Models\onlinestoremodal();

        // Fetch change log
        $updates = $trackingmodel->gettrackingchange($tracking_id);

        return view('os_tracking_change_logs_view', ['updates' => $updates]);
    }

    public function errorpage_history($error_id)
    {
        $model = new \App\Models\onlinestoremodal();

        // Fetch change log
        $updates = $model->get404pagechange($error_id);

        return view('os_404_change_logs_view', ['updates' => $updates]);
    }

    public function team_history($team_id)
    {
        $model = new \App\Models\onlinestoremodal();

        // Fetch change log
        $updates = $model->getour_teamchange($team_id);

        return view('os_our_team_change_logs_view', ['updates' => $updates]);
    }
}
