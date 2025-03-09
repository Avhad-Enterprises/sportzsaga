<?php

namespace App\Models;

use CodeIgniter\Model;
use Exception;

class MemberModel extends Model
{
    protected $table = 'team_members';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'member_name',
        'member_occupation',
        'member_pic',
        'member_email',
        'member_linkedin',
        'visibility',
        'order',
        'added_by',
        'created_at',
        'updated_at',
        'is_deleted',
        'deleted_by',
        'deleted_at'
    ];

    protected $useTimestamps = true;

    // Fetch single award by ID
    public function getMemberById($id)
    {
        return $this->find($id);
    }

    // Fetch all awards
    public function getAllMembers()
    {
        return $this->orderBy('order', 'ASC')->findAll();
    }

    public function getAllfrontMembers()
    {
        return $this->orderBy('order', 'ASC')->where('visibility', 1)->findAll();
    }

    public function UpdateMembersOrder($id, $position)
    {
        return $this->update($id, ['order' => $position]);
    }

    
    public function Deletemembers($id, $data)
    {
        return $this->db->table('team_members')->where('id', $id)->update($data);
    }
}
