<?php

/* Models */
namespace App\Models;

use CodeIgniter\Model;

class CatalogModel extends Model
{
    protected $table = 'catalogs';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'catalog_name',
        'discount_type',
        'discount_value',
        'products',
        'overall_adjustment', // New field for increase/decrease
        'status',             // New field for active/inactive status
        'publish_for',        // New field for user assignments
        'selling_price',  
        'quantity_rules', // Store quantity rules as JSON
        'volume_pricing',     // New field for calculated selling price
        'select_company',
        'select_customer_segment', 
        'product_rules',
        'change_log',        
        'is_deleted',
        'deleted_by',
        'deleted_at',
        'added_by',
        'updated_by',
    ];
    protected $useTimestamps = true;
}

class ProductModel extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name'];
}