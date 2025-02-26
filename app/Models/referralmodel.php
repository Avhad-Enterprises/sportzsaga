<?php

namespace App\Models;

use CodeIgniter\Model;

class referralmodel extends Model
{
    protected $table = 'referrals';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id',
        'referrer_id',
        'referee_id',
        'status',
        'reward_points',
        'created_at',
    ];

    public function GetReferralsByUserIds(array $userIds)
    {
        return $this->db->table('referrals')
            ->whereIn('referrer_id', $userIds)
            ->get()
            ->getResultArray();
    }

    public function getReferralHistory($refereeId)
    {
        return $this->db->table('referrals')
            ->where('referrer_id', $refereeId)
            ->get()
            ->getResultArray();
    }
}
