<?php

namespace App\Models;

use CodeIgniter\Model;

class InventoryModel extends Model
{
    protected $table = 'inventory';
    protected $primaryKey = 'id';

    // Add all the new fields to the allowedFields array
    protected $allowedFields = [
        'product_id',
        'warehouse_id',
        'inventory_count',
        'sku',
        'inner_barcode',
        'outer_barcode',
        'length',
        'width',
        'height',
        'breadth',
        'category',
        'brand_name',
        'supplier',
        'supplier_item_code',
        'base_unit',
        'layer',
        'pallet',
        'manufacturer',
        'manufacturer_location',
        'stock_quantity',
        'reorder_level',
        'safety_stock',
        'single_unit_price',
        'case_price',
        'compare_at_price',
        'batch_number',
        'lot_number',
        'manufacturing_date',
        'expiration_date',
        'storage_location',
        'vat_gst',
        'state_gst',
        'custom_duty',
        'origin',
        'custom_labels',
        'fifo_lifo',
        'stock_rotation',
        'stock_reduction_rule',
        'stock_threshold',
        'created_at',
        'updated_at',
        'is_deleted',
        'deleted_by',
        'deleted_at',
        'created_at',
        'updated_by',
        'change_log',
        'added_by'
    ];
}
