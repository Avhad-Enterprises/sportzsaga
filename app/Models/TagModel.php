<?php

namespace App\Models;

use CodeIgniter\Model;

class TagModel extends Model
{
    protected $table = 'tags'; // Table name
    protected $primaryKey = 'id'; // Primary key

    // Fields that can be inserted/updated
    protected $allowedFields = ['tag_name'];

    // Validation rules
    protected $validationRules = [
        'tag_name' => 'required|is_unique[tags.tag_name]',
    ];

    // Custom validation messages
    protected $validationMessages = [
        'tag_name' => [
            'required' => 'The tag name is required.',
            'is_unique' => 'This tag already exists.',
        ],
    ];


    public function getTags()
    {
        $tagModel = new TagModel();
        $tags = $tagModel->findAll(); // Fetch all tags
        return $this->response->setJSON($tags); // Return tags as JSON
    }
}
