<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductSettingModel extends Model
{
    protected $table = 'product_setting';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'product_id', 'Description', 'is_deleted', 'deleted_by', 'deleted_at', 'added_by', 'updated_by', 'created_at', 'updated_at', 'bundle_id'];

    public function getSettings($productIdsCsv)
    {
        return $this->like('product_id', $productIdsCsv)->first();  // Use LIKE to find matches in CSV
    }

    public function getSetting($selectedBundle)
    {
        return $this->like('bundle_id',  $selectedBundle)->first();  // Use LIKE to find matches in CSV
    }

    public function updateproductpage($data)
    {
        return $this->where('id', 1)->update($data);
    }
}
