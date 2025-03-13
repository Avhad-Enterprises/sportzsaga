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

            // Process change log
            if ($existingRecord) {
                $oldData = [
                    'blogs_title' => $existingRecord['blogs_title'],
                    'popular_tags' => $existingRecord['popular_tags'],
                    'popular_posts' => $existingRecord['popular_posts'],
                ];

                // Fetch and decode existing change log
                $existingChangeLog = !empty($existingRecord['change_log']) ? json_decode($existingRecord['change_log'], true) : [];
                if (!is_array($existingChangeLog)) {
                    $existingChangeLog = [];
                }

                // Append new change entry
                $newChange = [
                    'old' => $oldData,
                    'new' => $data,
                    'timestamp' => date('Y-m-d H:i:s'),
                ];

                $existingChangeLog[] = $newChange; // Append to the existing change log
                $data['change_log'] = json_encode($existingChangeLog);
            } else {
                // First-time save, initialize change log
                $data['change_log'] = json_encode([[
                    'old' => null,
                    'new' => $data,
                    'timestamp' => date('Y-m-d H:i:s'),
                ]]);
            }

            // Save or update settings
            if ($model->update(1, $data)) {
                return $this->response->setJSON(['success' => true, 'message' => 'Settings saved successfully.']);
            } else {
                log_message('error', 'Database save failed.');
                return $this->response->setJSON(['success' => false, 'message' => 'Failed to save settings.']);
            }
        } catch (\Exception $e) {
            log_message('error', 'Error saving settings: ' . $e->getMessage());
            return $this->response->setJSON(['success' => false, 'message' => 'An error occurred: ' . $e->getMessage()]);
        }
    }






    public function saveCollection()
    {
        if ($this->request->isAJAX()) {
            $title = $this->request->getPost('title');
            $favproduct = $this->request->getPost('fav_product');
    
            // Handle image uploads
            $image1 = $this->request->getFile('image1');
            $image2 = $this->request->getFile('image2');
    
            $image1Name = $image1 && $image1->isValid() ? $image1->store() : null;
            $image2Name = $image2 && $image2->isValid() ? $image2->store() : null;
    
            // Validate input
            if (empty($title)) {
                return $this->response->setJSON(['success' => false, 'message' => 'Title is required']);
            }
    
            $collectionModel = new \App\Models\os_collectionModel();
    
            // Always check for ID = 1
            $existingRecord = $collectionModel->find(1);
    
            $data = [
                'image1' => $image1Name ?? ($existingRecord['image1'] ?? null),
                'image2' => $image2Name ?? ($existingRecord['image2'] ?? null),
                'title' => $title,
                'fav_product' => $favproduct,
            ];
    
            if ($existingRecord) {
                // Prepare change log
                $oldData = [
                    'image1' => $existingRecord['image1'],
                    'image2' => $existingRecord['image2'],
                    'title' => $existingRecord['title'],
                    'fav_product' => $existingRecord['fav_product'],
                ];
    
                // Fetch and decode existing change log
                $existingChangeLog = !empty($existingRecord['change_log']) ? json_decode($existingRecord['change_log'], true) : [];
                if (!is_array($existingChangeLog)) {
                    $existingChangeLog = [];
                }
    
                // Append new change entry
                $newChange = [
                    'old' => $oldData,
                    'new' => $data,
                    'timestamp' => date('Y-m-d H:i:s'),
                ];
    
                $existingChangeLog[] = $newChange; // Append to change log
                $data['change_log'] = json_encode($existingChangeLog);
    
                // Update existing record with ID = 1
                $collectionModel->update(1, $data);
    
                return $this->response->setJSON(['success' => true, 'message' => 'Collection updated successfully']);
            } else {
                // Insert a new record with ID = 1
                $data['id'] = 1;
                $data['change_log'] = json_encode([[ 
                    'old' => null,
                    'new' => $data,
                    'timestamp' => date('Y-m-d H:i:s'),
                ]]);
    
                $collectionModel->insert($data);
    
                return $this->response->setJSON(['success' => true, 'message' => 'Collection saved successfully']);
            }
        }
    
        throw new \CodeIgniter\Exceptions\PageNotFoundException();
    }
    
}
