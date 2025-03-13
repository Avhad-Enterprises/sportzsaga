<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductCollectionModel extends Model
{
    protected $table      = 'product_collections';
    protected $primaryKey = 'bundle_id';

    // Add the new fields to the allowed fields array
    protected $allowedFields = [
        'bundle_name', 
        'selling_price', 
        'discount_type', 
        'discount_percent_input', 
        'discount_value_input', 
        'status', 
        'quantity', 
        'selected_products', 
        'selected_collections',
        'is_deleted',        // New field
        'deleted_by',        // New field
        'deleted_at',        // New field
        'created_at',        // New field (If you want to manage timestamps manually)
        'updated_at',        // New field (If you want to manage timestamps manually)
        'updated_by',
        'change_log'    
    ];
    protected $useTimestamps = true;  
}
