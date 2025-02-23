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

        // Fetch all available blogs
        $blogsModel = new Blogs_model();
        $blogs = $blogsModel->findAll();

        // Fetch all available tags
        $tagsModel = new TagModel();
        $tags = $tagsModel->findAll();

        return view('admin/blog_settings', [
            'settings' => $settings, // Pass saved settings
            'blogs' => $blogs,       // Pass all blogs
            'tags' => $tags,         // Pass all tags
        ]);
    }


    public function save()
    {
        $model = new BlogSettingsModel();

        try {
            // Log incoming data for debugging
            log_message('debug', 'POST Data: ' . json_encode($this->request->getPost()));

            // Retrieve ordered data from the request
            $blogsOrder = $this->request->getPost('blogs') ?? '';
            $tagsOrder = $this->request->getPost('popular_tags') ?? '';
            $postsOrder = $this->request->getPost('popular_posts') ?? '';

            $data = [
                'blogs_title' => $this->request->getPost('blogs_title') ?? '',
                'blogs' => $blogsOrder, // Save blogs order as a comma-separated string
                'popular_tags' => $tagsOrder, // Save tags order as a comma-separated string
                'popular_posts' => $postsOrder, // Save popular posts order as a comma-separated string
                'meta_title' => $this->request->getPost('meta_title') ?? '',
            ];

            if ($model->saveSettings($data)) {
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








    ////////////////////////////////Collections////////////////////////////////
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

            // Prepare data for saving
            $data = [
                'image1' => $image1Name,
                'image2' => $image2Name,
                'title' => $title,
                'fav_product' => $favproduct,

            ];

            $collectionModel = new \App\Models\os_collectionModel();

            // Save or update the data
            if ($collectionModel->saveOrUpdateCollection($data)) {
                return $this->response->setJSON(['success' => true, 'message' => 'Collection saved successfully']);
            }

            return $this->response->setJSON(['success' => false, 'message' => 'Failed to save collection']);
        }

        throw new \CodeIgniter\Exceptions\PageNotFoundException();
    }
}
