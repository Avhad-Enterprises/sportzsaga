<?php

namespace App\Controllers;

use App\Models\Blogs_model;
use App\Models\TagModel;
use App\Models\SingleBlogModel;
use CodeIgniter\Controller;

class SingleBlogController extends Controller
{
    public function edit($id)
    {
        $blogModel = new Blogs_model();
        $tagModel = new TagModel();

        $data['blogs'] = $blogModel->findAll();
        $data['tags'] = $tagModel->findAll();


        return view('edit_page', $data);
    }

    public function store()
{
    if ($this->request->isAJAX()) {
        $pageTitle = $this->request->getPost('page_title');
        $relatedBlogs = $this->request->getPost('related_blogs');
        $tags = $this->request->getPost('tags');
        $popularPosts = $this->request->getPost('popular_posts');

        // Validate input
        if (empty($pageTitle)) {
            return $this->response->setJSON(['success' => false, 'message' => 'Page title is required']);
        }

        // Define the fixed ID to update
        $fixedId = 3; // Replace with your desired ID

        // Database connection
        $db = db_connect();
        $builder = $db->table('singleblog_data');

        $data = [
            'page_title' => $pageTitle,
            'related_blogs' => $relatedBlogs,
            'tags' => $tags,
            'popular_posts' => $popularPosts,
        ];

        // Check if the record exists
        $existingRecord = $builder->where('id', $fixedId)->get()->getRowArray();

        if ($existingRecord) {
            // Prepare change log
            $oldData = [
                'page_title' => $existingRecord['page_title'],
                'related_blogs' => $existingRecord['related_blogs'],
                'tags' => $existingRecord['tags'],
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

            // Update the record
            $builder->where('id', $fixedId)->update($data);

            return $this->response->setJSON(['success' => true, 'message' => 'Data updated successfully.']);
        } else {
            // Handle case where the record doesn't exist
            return $this->response->setJSON(['success' => false, 'message' => 'Record not found.']);
        }
    }

    throw new \CodeIgniter\Exceptions\PageNotFoundException();
}

}
