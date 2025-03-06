<?php

namespace App\Models;

use CodeIgniter\Model;

class RelatedProductModel extends Model
{
    protected $table = 'related_products';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'collection_ids', // Keep this
        'related_product_ids', // Keep this
        'selection_method',
        'condition_type',
        'conditions',
        'sort_by',
        'created_at',
        'updated_at'
    ];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    public function saveRelatedProducts($data)
    {
        return $this->insert($data);
    }

    public function updateRelatedProducts($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteRelatedProducts($id)
    {
        return $this->delete($id);
    }

    public function getRelatedProducts($productId)
    {
        $relatedProducts = $this->where('product_id', $productId)->first();

        if ($relatedProducts) {
            return json_decode($relatedProducts['related_product_ids'], true);
        }
        return [];
    }

    public function getAllRelatedProducts()
    {
        $db = \Config\Database::connect();

        $relatedProducts = $db->table('related_products rp')
            ->select('rp.id, rp.collection_ids, rp.related_product_ids, rp.selection_method, rp.created_at,
            (SELECT collection_title FROM collection c WHERE FIND_IN_SET(c.collection_id, rp.collection_ids) LIMIT 1) AS collection_title')
            ->orderBy('rp.created_at', 'DESC')
            ->get()
            ->getResultArray();

        $productModel = new Products_model();

        foreach ($relatedProducts as &$rp) {
            // Decode JSON related product IDs
            $productIds = json_decode($rp['related_product_ids'], true);

            if (!empty($productIds) && is_array($productIds)) {
                // Get first product title as fallback if no collection is present
                $firstProduct = $productModel->where('product_id', $productIds[0])
                    ->select('product_title')
                    ->first();

                $rp['product_title'] = $rp['collection_title'] ?? ($firstProduct['product_title'] ?? 'No product');
            } else {
                $rp['product_title'] = 'No product';
            }
        }

        return $relatedProducts;
    }


    public function RelatedProducts($productId)
    {
        // Fetch related products where product_id = $productId
        $relatedProducts = $this->where('product_id', $productId)->first();

        $relatedProductIds = [];

        if ($relatedProducts && !empty($relatedProducts['related_product_ids'])) {
            $relatedProductIds = json_decode($relatedProducts['related_product_ids'], true);
        }

        return is_array($relatedProductIds) ? $relatedProductIds : [];
  
    }    
}
