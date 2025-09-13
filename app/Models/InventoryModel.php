<?php

namespace App\Models;

use CodeIgniter\Model;

class InventoryModel extends Model
{
    protected $table = 'inventory_stock';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'product_id',
        'warehouse_id',
        'stock_quantity',
        'reserved_stock',
        'stock_adjusted',
        'batch_number',
        'expiry_date',
        'priority',
        'stock_reduction_rule',
        'created_at',
        'updated_at',
    ];
    protected $returnType = 'array';

    public function GetAllStockData()
    {
        return $this->db->table('inventory_stock')->get()->getResultArray();
    }

    public function addStock($warehouseId, $productId, $qty)
    {
        // Check if the product exists in the given warehouse
        $row = $this->where('product_id', $productId)
            ->where('warehouse_id', $warehouseId)
            ->first();

        if ($row) {
            // If the product exists, add the new stock quantity to the existing one
            $newQty = $row['stock_quantity'] + $qty;
            $this->update($row['id'], ['stock_quantity' => $newQty]);
            return $newQty;  // Return the updated stock quantity
        } else {
            // If the product doesn't exist, create a new entry with the provided quantity
            $this->insert([
                'product_id' => $productId,
                'warehouse_id' => $warehouseId,
                'stock_quantity' => $qty
            ]);
            return $qty;  // Return the inserted stock quantity
        }
    }

    public function findStockDataId($id)
    {
        $stocks = $this->db->table('inventory_stock')->where('id', $id)->get()->getResultArray();
        return $stocks;
    }

    public function GetProductdatabyid($id)
    {
        $data = $this->db->table('products')->where('product_id', $id)->get()->getResultArray();
        return $data;
    }
}
