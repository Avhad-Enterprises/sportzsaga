<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'id';
    protected $allowedFields = ['category_name', 'category_value'];

    protected $validationRules = [
        'category_name' => 'required|min_length[3]',
        'category_value' => 'required|min_length[1]'
    ];

    public function InsertCat($data)
    {
        return $this->insert($data);
    }

    public function getAllCategories()
    {
        return $this->findAll();
    }
}
