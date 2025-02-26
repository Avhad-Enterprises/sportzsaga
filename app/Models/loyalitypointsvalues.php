<?php

namespace App\Models;

use CodeIgniter\Model;

class loyalitypointsvalues extends Model
{
    protected $table = 'loyalty_points_values';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id',
        'loyalty_point_key',
        'loyalty_point_value',
        'point_expiry_period',
        'min_points_for_redemption',
        'max_discount_percentage',
        'is_active',
        'created_at',
        'updated_at',
    ];

    public function getLoyaltyPointValue()
    {
        return $this->where('is_active', 1)->first();
    }

    public function updateLoyaltyPointValue($id, $updateData)
    {
        return $this->db->table('loyalty_points_values')->where('id', $id)->update($updateData);
    }

    public function GetLoyalityPointData()
    {
        return $this->findAll();
    }

    public function getPointsHistory($id)
    {
        return $this->db->table('loyalty_points_history')->where('user_id', $id)->get()->getResultArray();
    }
}
