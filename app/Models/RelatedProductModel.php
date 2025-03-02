<?php

namespace App\Models;

use CodeIgniter\Model;

class RelatedProductModel extends Model
{
    protected $table = 'related_products';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'product_id',
        'sku',
        'product_tag',
        'inventory',
        'selling_price',
        'cost_price',
        'selection_method',
        'condition_type',
        'conditions',
        'related_product_ids',
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
        return $this->db->table('related_products rp')
            ->select('rp.id, p.product_title, rp.related_product_ids, rp.selection_method, rp.created_at')
            ->join('products p', 'p.product_id = rp.product_id', 'left')
            ->orderBy('rp.created_at', 'DESC')
            ->get()
            ->getResultArray();
    }
}
