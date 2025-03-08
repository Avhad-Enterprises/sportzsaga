<?php

namespace App\Controllers;

use App\Models\PageModel;
use App\Models\Blogs_model;
use App\Models\Products_model;
use CodeIgniter\Controller;
use CodeIgniter\Database\BaseConnection;
use Google\Cloud\Storage\StorageClient;
class HeaderController extends Controller
{
    protected $pageModel;
    protected $db;

    public function __construct()
    {
        $this->pageModel = new PageModel();
        $this->db = \Config\Database::connect();
    }

    public function add_new_page()
    {
        $session = session();
        $request = $this->request;

        // ✅ Fetch User ID from Session
        $userId = $session->get('user_id');

        if (!$userId) {
            return redirect()->back()->with('error', 'User session not found. Please log in again.');
        }

        log_message('debug', 'Session User ID: ' . $userId);

        // ✅ Log the raw form data
        log_message('debug', 'Raw Form Data: ' . print_r($request->getPost(), true));

        // ✅ Retrieve subtypes and specific items
        $subtypes = $request->getPost('subtype') ?? [];
        $specific_items_raw = $request->getPost('specific_item') ?? [];

        // ✅ Remove empty subtypes
        $subtypes = array_values(array_filter($subtypes, function ($value) {
            return !empty(trim($value));
        }));

        log_message('debug', 'Filtered Subtypes (After Cleaning): ' . print_r($subtypes, true));

        // ✅ Ensure specific items are mapped correctly
        $formatted_specific_items = [];

        // ✅ Correct index alignment for `specific_item`
        $realigned_items = array_values($specific_items_raw); // Reset indexes to 0-based

        // ✅ Map specific items correctly to their corresponding subtypes
        foreach ($subtypes as $index => $subtype) {
            if (isset($realigned_items[$index]) && is_array($realigned_items[$index])) {
                $selected_items = array_filter($realigned_items[$index]); // Remove empty values
                if (!empty($selected_items)) {
                    $formatted_specific_items[$subtype] = implode(',', $selected_items);
                }
            }
        }

        log_message('debug', 'Final Specific Items Mapping: ' . print_r($formatted_specific_items, true));

        // ✅ Convert data for database storage
        $subtypes_data = !empty($subtypes) ? implode(',', $subtypes) : null;
        $specific_item_data = !empty($formatted_specific_items) ? json_encode($formatted_specific_items) : null;

        // Handle image file upload
        $imageFile = $this->request->getFile('image');
        $imageUrl = '';

        if ($imageFile && $imageFile->isValid() && !$imageFile->hasMoved()) {
            try {
                // Initialize Google Cloud Storage
                $storage = new StorageClient([
                    'keyFilePath' => WRITEPATH . 'public/mkvgsc.json',
                    'projectId' => 'peak-tide-441609-r1',
                ]);
                $bucket = $storage->bucket('sportzsaga_imgs');

                // Create a unique filename and upload the file
                $imageName = uniqid() . '-' . $imageFile->getClientName();
                $object = $bucket->upload(
                    fopen($imageFile->getTempName(), 'r'),
                    [
                        'name' => 'pages/' . $imageName, // Path in the bucket
                        'predefinedAcl' => 'publicRead', // Set file to be publicly accessible
                    ]
                );

                // Get the public URL of the uploaded image
                $imageUrl = sprintf('https://storage.googleapis.com/%s/%s', $bucket->name(), 'pages/' . $imageName);
                log_message('info', 'Image uploaded successfully: ' . $imageUrl);

            } catch (\Exception $e) {
                log_message('error', 'Error uploading image: ' . $e->getMessage());
            }
        }

        // ✅ Prepare data for insertion into the database
        $data = [
            'title' => $request->getPost('title'),
            'link' => $request->getPost('link'),
            'visibility' => $request->getPost('visibility'),
            'page_type' => implode(',', (array) $request->getPost('page_type')),
            'subtype' => $subtypes_data,
            'specific_item' => $specific_item_data,
            'image' => $imageUrl,
            'added_by' => $userId,  // ✅ Store User ID who added the page
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        log_message('debug', 'Final Data to Insert: ' . print_r($data, true));

        // ✅ Insert into the database
        if ($this->pageModel->insert($data)) {
            return redirect()->back()->with('success', 'Page added successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to add page.');
        }
    }


    public function get_items($type)
    {
        try {
            log_message('debug', "Fetching items for type: $type");

            if (!in_array($type, ['collection', 'blogs', 'product'])) {
                return $this->response->setStatusCode(400)->setJSON(['error' => 'Invalid type specified']);
            }

            $db = \Config\Database::connect();
            $tableMap = [
                'collection' => ['table' => 'collection', 'id' => 'collection_id', 'title' => 'collection_title'],
                'blogs' => ['table' => 'blogs', 'id' => 'blog_id', 'title' => 'blog_title'],
                'product' => ['table' => 'products', 'id' => 'product_id', 'title' => 'product_title'],
            ];

            if (!isset($tableMap[$type])) {
                return $this->response->setStatusCode(400)->setJSON(['error' => 'Invalid type specified']);
            }

            $table = $tableMap[$type]['table'];
            $idColumn = $tableMap[$type]['id'];
            $titleColumn = $tableMap[$type]['title'];

            if (!$db->tableExists($table)) {
                return $this->response->setStatusCode(500)->setJSON(['error' => "Table '$table' does not exist"]);
            }

            $query = $db->query("SELECT $idColumn AS id, $titleColumn AS name FROM $table");
            $results = $query->getResultArray();

            if (empty($results)) {
                return $this->response->setJSON([]);
            }

            return $this->response->setJSON($results);
        } catch (\Exception $e) {
            log_message('error', 'Error fetching items: ' . $e->getMessage());
            return $this->response->setStatusCode(500)->setJSON(['error' => 'Server error, please check logs.']);
        }
    }

    public function update_page($id)
    {
        // Load model
        $pageModel = new PageModel();

        // Validate Request
        if ($this->request->getMethod() === 'post') {
            // Retrieve form inputs
            $data = [
                'title' => $this->request->getPost('title'),
                'link' => $this->request->getPost('link'),
                'visibility' => $this->request->getPost('visibility'),
            ];

            // Handle Page Type (Multiple Selection)
            $pageType = $this->request->getPost('page_type');
            $data['page_type'] = (!empty($pageType)) ? implode(',', array_unique(explode(',', $pageType))) : '';

            // Handle Subtype (Multiple Selection)
            $subtype = $this->request->getPost('subtype');
            $data['subtype'] = (!empty($subtype) && is_array($subtype)) ? implode(',', array_unique($subtype)) : '';

            $specificItems = $this->request->getPost('specific_item');
            log_message('debug', 'Received Specific Items: ' . print_r($specificItems, true));

            $formattedSpecificItems = [];

            if (!empty($subtype) && is_array($subtype)) {
                foreach ($subtype as $index => $selectedSubtype) {
                    if (isset($specificItems[$index])) {
                        // ✅ Flatten nested arrays and split comma-separated values
                        $flattenedItems = [];

                        foreach ($specificItems[$index] as $items) {
                            if (is_array($items)) {
                                $flattenedItems = array_merge($flattenedItems, $items);
                            } else {
                                $flattenedItems = array_merge($flattenedItems, explode(',', $items));
                            }
                        }

                        // ✅ Remove duplicates and trim spaces
                        $uniqueItems = array_values(array_unique(array_map('trim', $flattenedItems)));
                        sort($uniqueItems);

                        if (!empty($uniqueItems)) {
                            $formattedSpecificItems[$selectedSubtype] = implode(',', $uniqueItems);
                        }
                    }
                }
            }

            $data['specific_item'] = !empty($formattedSpecificItems) ? json_encode($formattedSpecificItems) : json_encode([]);
            log_message('debug', 'Formatted Specific Items Before Update: ' . print_r($data['specific_item'], true));

            // Handle image upload with Google Cloud Storage (GCS)
            $imageFile = $this->request->getFile('image');
            if ($imageFile && $imageFile->isValid() && !$imageFile->hasMoved()) {
                try {
                    // Initialize Google Cloud Storage
                    $storage = new StorageClient([
                        'keyFilePath' => WRITEPATH . 'public/mkvgsc.json',
                        'projectId' => 'peak-tide-441609-r1',
                    ]);
                    $bucket = $storage->bucket('sportzsaga_imgs');

                    // Create a unique filename and upload the file
                    $imageName = uniqid() . '-' . $imageFile->getClientName();
                    $object = $bucket->upload(
                        fopen($imageFile->getTempName(), 'r'),
                        [
                            'name' => 'pages/' . $imageName,
                            'predefinedAcl' => 'publicRead',
                        ]
                    );

                    // Get the public URL of the uploaded image
                    $imageUrl = sprintf('https://storage.googleapis.com/%s/%s', $bucket->name(), 'pages/' . $imageName);
                    log_message('info', 'Image uploaded successfully: ' . $imageUrl);

                    $data['image'] = $imageUrl; // Update image URL in database

                } catch (\Exception $e) {
                    log_message('error', 'Error uploading image: ' . $e->getMessage());
                }
            }

            // Fetch existing image if no new image is uploaded
            if (empty($data['image'])) {
                $existingPage = $pageModel->find($id);
                if ($existingPage) {
                    $data['image'] = $existingPage['image']; // Retain existing image
                }
            }

            // Log the final update data
            log_message('debug', 'Update Data: ' . print_r($data, true));

            // Update Page Data in the Database
            $updateStatus = $pageModel->update($id, $data);

            if ($updateStatus) {
                return redirect()->to(base_url('online_store/edit'))->with('success', 'Page updated successfully.');
            } else {
                return redirect()->to(base_url('online_store/edit'))->with('error', 'Failed to update the page.');
            }
        }

        return redirect()->to(base_url('online_store/edit'));
    }






}

