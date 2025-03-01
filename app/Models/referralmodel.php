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

    public function getReferralHistory($referrerId)
    {
        return $this->db->table('referrals')
            ->select('referrals.*, referrer.name as referrer_name, referee.name as referee_name')
            ->join('users as referrer', 'referrals.referrer_id = referrer.user_id', 'left')
            ->join('users as referee', 'referrals.referee_id = referee.user_id', 'left')
            ->where('referrals.referrer_id', $referrerId)
            ->get()
            ->getResultArray();
    }
}
