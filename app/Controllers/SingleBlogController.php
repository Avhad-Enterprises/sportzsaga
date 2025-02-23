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
            if ($builder->where('id', $fixedId)->countAllResults() > 0) {
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
