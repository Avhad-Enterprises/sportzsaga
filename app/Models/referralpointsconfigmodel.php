<?php

namespace App\Models;

use CodeIgniter\Model;

class referralpointsconfigmodel extends Model
{
    protected $table = 'referral_points_config';
    protected $primaryKey = 'id';
    protected $allowedFields = ['points_for_referrer', 'points_for_referred', 'created_at', 'updated_at'];

    public function getReferralPointsConfig()
    {
        return $this->find(1);
    }

    public function updateReferralPointsConfig($data)
    {
        return $this->update(1, $data);
    }
}
