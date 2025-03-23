<?php

namespace App\Controllers;

use App\Models\BlogSettingsModel;
use App\Models\Blogs_model;
use App\Models\TagModel;
use App\Models\os_collectionModel;

class BlogSettingsController extends BaseController
{
    public function index()
    {
        $blogSettingsModel = new BlogSettingsModel();

        // Fetch settings from the blog_settings table
        $settings = $blogSettingsModel->find(1); // Assuming there's a single row for blog settings with ID=1

        // Convert comma-separated string to array (Ensure no empty values)
        // $selectedBlogIds = array_filter(explode(',', $settings['blogs'] ?? ''));

        // Fetch **all blogs** from the table (to display in dropdown)
        //$blogsModel = new Blogs_model();
        //$allBlogs = $blogsModel->findAll(); // ✅ Fetch all blogs

        // Fetch **only selected blogs** (for displaying in the sortable list)
        // $selectedBlogs = !empty($selectedBlogIds) ? $blogsModel->whereIn('blog_id', $selectedBlogIds)->findAll() : [];

        // Fetch all available tags
        $tagsModel = new TagModel();
        $tags = $tagsModel->findAll();

        return view('admin/blog_settings', [
            'settings' => $settings,        // Pass saved settings
            //'blogs' => $allBlogs,           // ✅ Pass all blogs for dropdown
            //selectedBlogs' => $selectedBlogs, // ✅ Pass selected blogs for sortable list
            'tags' => $tags,                // Pass all tags
        ]);
    }


    public function save()
    {
        $model = new BlogSettingsModel();
        $session = session();
        $userId = $session->get('user_id'); // Retrieve user ID from session

        try {
            log_message('debug', 'POST Data: ' . json_encode($this->request->getPost()));

            // Retrieve and filter unique IDs
            $blogsOrder = array_unique(array_filter(explode(',', $this->request->getPost('blogs') ?? '')));
            $tagsOrder = array_unique(array_filter(explode(',', $this->request->getPost('popular_tags') ?? '')));
            $postsOrder = array_unique(array_filter(explode(',', $this->request->getPost('popular_posts') ?? '')));

            // New data to be saved
            $data = [
                'blogs_title' => $this->request->getPost('blogs_title') ?? '',
                'popular_tags' => implode(',', $tagsOrder),
                'popular_posts' => implode(',', $postsOrder),
            ];

            // Fetch existing record (assuming ID=1)
            $existingRecord = $model->find(1);
            $changedFields = [];

            if ($existingRecord) {
                // Compare old and new data, only storing changes
                foreach ($data as $key => $newValue) {
                    $oldValue = $existingRecord[$key] ?? null;
                    if ($newValue !== $oldValue) {
                        $changedFields[$key] = [
                            'old' => $oldValue,
                            'new' => $newValue,
                        ];
                    }
                }

                if (!empty($changedFields)) {
                    // Fetch and decode existing change log
                    $existingChangeLog = !empty($existingRecord['change_log']) ? json_decode($existingRecord['change_log'], true) : [];
                    if (!is_array($existingChangeLog)) {
                        $existingChangeLog = [];
                    }

                    // Append new change entry with only changed fields
                    $newChange = [
                        'updated_by' => $userId, // Log user ID
                        'changes' => $changedFields,
                        'timestamp' => date('Y-m-d H:i:s'),
                    ];

                    $existingChangeLog[] = $newChange;
                    $data['change_log'] = json_encode($existingChangeLog);
                }

                // Update record with ID = 1
                $model->update(1, $data);

                return $this->response->setJSON(['success' => true, 'message' => 'Settings updated successfully.']);
            } else {
                // First-time save, initialize change log
                $data['change_log'] = json_encode([[
                    'updated_by' => $userId,
                    'changes' => $data, // Log all initial data
                    'timestamp' => date('Y-m-d H:i:s'),
                ]]);

                $model->insert(['id' => 1] + $data);

                return $this->response->setJSON(['success' => true, 'message' => 'Settings saved successfully.']);
            }
        } catch (\Exception $e) {
            log_message('error', 'Error saving settings: ' . $e->getMessage());
            return $this->response->setJSON(['success' => false, 'message' => 'An error occurred: ' . $e->getMessage()]);
        }
    }







    public function saveCollection()
    {
        if ($this->request->isAJAX()) {
            $session = session();
            $userId = $session->get('user_id'); // Retrieve user ID from session
            $userName = $session->get('admin_name') ?? $session->get('user_name'); // Fetch dynamic user name

            // Ensure updated_by field is correctly formatted
            $updatedBy = !empty($userName) ? "$userName ($userId)" : "User ID ($userId)";

            // Debug log to check session data (remove in production)
            log_message('debug', 'User ID: ' . $userId);
            log_message('debug', 'User Name: ' . $userName);

            $title = $this->request->getPost('title');
            $favproduct = $this->request->getPost('fav_product');

            // Handle image uploads
            $image1 = $this->request->getFile('image1');
            $image2 = $this->request->getFile('image2');

            $image1Name = ($image1 && $image1->isValid()) ? $image1->store() : null;
            $image2Name = ($image2 && $image2->isValid()) ? $image2->store() : null;

            // Validate input
            if (empty($title)) {
                return $this->response->setJSON(['success' => false, 'message' => 'Title is required']);
            }

            $collectionModel = new \App\Models\os_collectionModel();
            $fixedId = 1; // Always using ID = 1

            // Fetch existing record
            $existingRecord = $collectionModel->find($fixedId);

            // Prepare new data
            $newData = [
                'image1' => $image1Name ?? ($existingRecord['image1'] ?? null),
                'image2' => $image2Name ?? ($existingRecord['image2'] ?? null),
                'title' => $title,
                'fav_product' => $favproduct,
            ];

            $changedFields = [];

            if ($existingRecord) {
                // Compare old and new data, only storing changes
                foreach ($newData as $key => $newValue) {
                    $oldValue = $existingRecord[$key] ?? null;

                    if ($newValue !== $oldValue) {
                        $changedFields[$key] = [
                            'old' => $oldValue,
                            'new' => $newValue,
                        ];
                    }
                }

                if (!empty($changedFields)) {
                    // Fetch and decode existing change log
                    $existingChangeLog = !empty($existingRecord['change_log']) ? json_decode($existingRecord['change_log'], true) : [];
                    if (!is_array($existingChangeLog)) {
                        $existingChangeLog = [];
                    }

                    // Append new change entry
                    $newChange = [
                        'updated_by' => $updatedBy, // Corrected user info
                        'timestamp' => date('Y-m-d H:i:s'),
                        'changes' => $changedFields,
                    ];

                    $existingChangeLog[] = $newChange;
                    $newData['change_log'] = json_encode($existingChangeLog);

                    // Update the record
                    $collectionModel->update($fixedId, $newData);

                    return $this->response->setJSON(['success' => true, 'message' => 'Collection updated successfully']);
                } else {
                    return $this->response->setJSON(['success' => true, 'message' => 'No changes detected.']);
                }
            } else {
                // Insert new record with ID = 1
                $newData['id'] = $fixedId;
                $newData['change_log'] = json_encode([
                    [
                        'updated_by' => $updatedBy,
                        'timestamp' => date('Y-m-d H:i:s'),
                        'changes' => [
                            'title' => ['old' => null, 'new' => $title],
                            'fav_product' => ['old' => null, 'new' => $favproduct],
                            'image1' => ['old' => null, 'new' => $image1Name],
                            'image2' => ['old' => null, 'new' => $image2Name],
                        ],
                    ]
                ]);

                $collectionModel->insert($newData);

                return $this->response->setJSON(['success' => true, 'message' => 'Collection saved successfully']);
            }
        }

        throw new \CodeIgniter\Exceptions\PageNotFoundException();
    }
}
