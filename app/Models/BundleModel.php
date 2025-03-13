<?php

namespace App\Models;

use CodeIgniter\Model;

class BundleModel extends Model
{
    protected $table = 'bundles';
    protected $primaryKey = 'bundle_id';
    protected $allowedFields = [
        'bundle_name', 'bundle_price', 'discount_type', 'discount_value', 
        'start_date', 'end_date', 'status', 'selected_products', 'badge_image',
        'is_deleted', 'deleted_by', 'deleted_at', 'created_at', 'updated_at', 'updated_by','change_log'
    ];

    // Enable automatic timestamps
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    // Validation Rules
    protected $validationRules = [
        'bundle_name'        => 'required|max_length[255]',
        'bundle_price'       => 'required|numeric',
        'discount_type'      => 'required|in_list[percent,value]', // Ensure discount type is valid
        'discount_value'     => 'required|numeric',              // Ensure discount value is numeric
        'selected_products'  => 'required'                       // Ensure that selected products are provided
    ];

    /**
     * Get Bundles with Products
     * This method fetches bundles and their associated products.
     *
     * @return array
     */
    public function getBundlesWithProducts($isDeleted = 0)
    {
        return $this->select('bundles.*, GROUP_CONCAT(products.product_title) as product_titles')
                    ->join('products', 'FIND_IN_SET(products.product_id, bundles.selected_products)', 'left')
                    ->groupBy('bundles.bundle_id')
                    ->where('bundles.is_deleted', $isDeleted)
                    ->findAll();
    }

    /**
     * Get Active Bundles
     * Fetch bundles that are not soft-deleted.
     *
     * @return array
     */
    public function getActiveBundles()
    {
        return $this->where('is_deleted', 0)->findAll();
    }

    /**
     * Soft Delete a Bundle
     * Mark a bundle as deleted without permanently removing it.
     *
     * @param int $id
     * @param string $deletedBy
     * @return bool
     */
    public function softDeleteBundle($id, $deletedBy)
    {
        return $this->update($id, [
            'is_deleted' => 1,
            'deleted_by' => $deletedBy,
            'deleted_at' => date('Y-m-d H:i:s'),
        ]);
    }

    /**
     * Restore a Soft-Deleted Bundle
     * Undo the soft deletion of a bundle.
     *
     * @param int $id
     * @return bool
     */
    public function restoreBundle($id)
    {
        return $this->update($id, [
            'is_deleted' => 0,
            'deleted_by' => null,
            'deleted_at' => null,
        ]);
    }

   
}

