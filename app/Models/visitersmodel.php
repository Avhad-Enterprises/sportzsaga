<?php

namespace App\Models;

use CodeIgniter\Model;

class visitersmodel extends Model
{
    protected $table = 'visitors';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id',
        'ip_address',
        'user_agent',
        'device_type',
        'browser',
        'operating_system',
        'location',
        'referrer',
        'visit_type',
        'visited_at'
    ];

    public function GetAllVisitorsData()
    {
        return $this->db->table('visitors')
            ->orderBy('id', 'DESC')
            ->get()
            ->getResultArray();
    }

    public function getVisitorTrends()
    {
        return $this->select('ip_address, user_agent, device_type, browser, operating_system, location, referrer, visit_type, visited_at,')
            ->findAll();
    }
}
