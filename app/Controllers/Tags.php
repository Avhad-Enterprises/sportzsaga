<?php

namespace App\Controllers;

use App\Models\TagModel;

class Tags extends BaseController
{
    public function save()
    {
        $tagModel = new TagModel();
        $tagName = trim($this->request->getPost('tag_name'));

        if (empty($tagName)) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Tag name cannot be empty.',
            ]);
        }

        // Check if the tag already exists
        if ($tagModel->where('tag_name', $tagName)->first()) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'This tag already exists.',
            ]);
        }

        // Insert the new tag into the tags table
        $tagModel->insert([
            'tag_name' => $tagName,
        ]);

        return $this->response->setJSON([
            'success' => true,
            'message' => 'Tag added successfully.',
        ]);
    }
}


