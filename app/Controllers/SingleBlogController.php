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

            if (empty($pageTitle)) {
                return $this->response->setJSON(['success' => false, 'message' => 'Page title is required']);
            }

            $fixedId = 3; 
            $db = db_connect();
            $builder = $db->table('singleblog_data');

            $existingRecord = $builder->where('id', $fixedId)->get()->getRowArray();

            if (!$existingRecord) {
                return $this->response->setJSON(['success' => false, 'message' => 'Record not found.']);
            }

            $changes = [];
            $fieldsToCheck = [
                'page_title' => $pageTitle,
                'related_blogs' => $relatedBlogs,
                'tags' => $tags,
                'popular_posts' => $popularPosts
            ];

            foreach ($fieldsToCheck as $dbField => $newValue) {
                if ($existingRecord[$dbField] != $newValue) {
                    $changes[$dbField] = [
                        'old' => $existingRecord[$dbField],
                        'new' => $newValue
                    ];
                }
            }

            $updateData = [
                'page_title' => $pageTitle,
                'related_blogs' => $relatedBlogs,
                'tags' => $tags,
                'popular_posts' => $popularPosts
            ];

            if (!empty($changes)) {
                $existingChangeLog = !empty($existingRecord['change_log']) ? json_decode($existingRecord['change_log'], true) : [];
                if (!is_array($existingChangeLog)) {
                    $existingChangeLog = [];
                }

                $updatedBy = "Aditya Patil (201)"; 
                $timestamp = date('Y-m-d H:i:s');

                $newChange = [
                    'updated_by' => $updatedBy,
                    'timestamp' => $timestamp,
                    'changes' => $changes
                ];

                $existingChangeLog[] = $newChange;
                $updateData['change_log'] = json_encode($existingChangeLog);
            }

            $builder->where('id', $fixedId)->update($updateData);

            return $this->response->setJSON(['success' => true, 'message' => 'Data updated successfully.']);
        }

        throw new \CodeIgniter\Exceptions\PageNotFoundException();
    }
}
