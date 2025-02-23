<?php

namespace App\Models;

use CodeIgniter\Model;

class Cart_model extends Model
{
    protected $table = 'cart';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'product_id', 'session_id', 'quantity', 'size', 'created_at', 'updated_at', 'user_type'];
    protected $useTimestamps = true;

    public function addToCart($userId, $productId, $quantity)
    {
        $data = [
            'user_id' => $userId,
            'product_id' => $productId,
            'quantity' => $quantity
        ];

        $existingItem = $this->where('user_id', $userId)
            ->where('product_id', $productId)
            ->first();

        if ($existingItem) {
            $this->update($existingItem['id'], ['quantity' => $existingItem['quantity'] + $quantity]);
        } else {
            // Insert new item
            $this->insert($data);
        }
    }

    public function getCartItems($user_id)
    {
        return $this->select('cart.*, products.*')
            ->join('products', 'cart.product_id = products.product_id')
            ->where('cart.user_id', $user_id)
            ->findAll();
    }

    public function getCartItemsByses($user_id)
    {
        return $this->select('cart.*, products.*')
            ->join('products', 'cart.product_id = products.product_id')
            ->where('cart.session_id', $user_id)
            ->findAll();
    }

    public function removeFromCart($productId)
    {
        return $this->where('product_id', $productId)->delete();
    }

    public function clearCart($user_id)
    {
        $this->where('user_id', $user_id)->delete();
    }

    public function getCartItemCount($user_id)
    {
        return $this->where('user_id', $user_id)->countAllResults();
    }

    public function updateProductQuantity($productId, $quantity)
    {
        $existingProduct = $this->where('product_id', $productId)->first();

        if ($existingProduct) {
            return $this->set('quantity', $quantity)
                ->where('product_id', $productId)
                ->update();
        }

        return false;
    }
}
