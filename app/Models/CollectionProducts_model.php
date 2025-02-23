<?php

namespace App\Models;

use CodeIgniter\Model;

class CollectionProducts_model extends Model
{
    protected $table = 'collection_products';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'collection_id',
        'product_id',
        'product_title',
        'brand',
        'cost_price',
        'selling_price',
        'product_image',
        'selected_products',
        'selected_collections',
        'discount_percent',
        'discount_value',
        'status',
    ];

    // Get all products for a specific collection ID
    public function getCollectionProducts($collection_id)
    {
        return $this->where('collection_id', $collection_id)->findAll();
    }

    // Get the title of a specific collection
    public function getCollectionTitle($collection_id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('collection');
        $builder->select('collection_title');
        $builder->where('collection_id', $collection_id);

        $query = $builder->get();
        $result = $query->getRow();

        return $result ? $result->collection_title : null;
    }
}

