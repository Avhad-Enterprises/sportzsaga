<?php

namespace App\Models;

use CodeIgniter\Model;

class CollectionProducts_model extends Model
{
    protected $table = 'collection_products';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'collection_id',
        'product_title',
        'brand',
        'cost_price',
        'selling_price',
        'product_image'
    ];

    public function getcollectionproducts($collection_id)
    {
        return $this->where('collection_id', $collection_id)->findAll();
    }
}
