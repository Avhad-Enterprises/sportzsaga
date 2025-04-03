<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomerSegmentModel extends Model
{
    protected $table = 'customer_segments'; // Table name
    protected $primaryKey = 'segment_id'; // Primary key

    // Allowed fields for insert/update
    protected $allowedFields = [
        'segment_name',
        'segment_description',
        'segment_type',
        'created_by',
        'filters',
        'filtered_users',
        'is_deleted',
        'change_log'
    ];

    // Enable automatic timestamps
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';


    public function updateCustomersegment($id, $data)
    {
        return $this->where('segment_id', $id)->set($data)->update();
    }


    public function getAlllogsegment()
    {
        return $this->db->table('customer_segments')->where('is_deleted', 1)->get()->getResultArray();
    }


    public function getChangeLog($segmentId)
    {
        return $this->select('change_log')->where('segment_id', $segmentId)->get()->getRowArray()['change_log'] ?? null;
    }

}
