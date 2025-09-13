<?php

namespace App\Models;

use CodeIgniter\Model;

class TagModel extends Model
{
    protected $table = 'tags'; // Table name
    protected $primaryKey = 'id'; // Primary key
    protected $allowedFields = [
        'tag_name',
        'tag_value',
        'type',
        'created_at',
        'added_by',
    ];

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

    // Method to fetch all tags
    public function getTags()
    {
        return $this->findAll(); // Fetch all tags
    }
}
