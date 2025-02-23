<?php

namespace App\Models;

use CodeIgniter\Model;

class PolicyModel extends Model
{
    protected $table = 'policies';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'policy_name',
        'policy_description',
        'policy_link',
        'is_deleted',
        'deleted_by',
        'deleted_at',
        'added_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];

    /**
     * Save Policy (Insert or Update Record)
     */
    public function savePolicy($data)
    {
        return $this->insert($data);
    }

    public function getPolicy($id)
    {
        return $this->find($id);
    }

    public function updatePolicyOrder($id, $position)
    {
        return $this->update($id, ['order_position' => $position]);
    }
    // In PolicyModel
    public function deletePolicy($id)
    {
        return $this->db->table('policies')->delete(['id' => $id]);
    }

    public function updatePolicy($id, $data)
    {
        return $this->update($id, $data);
    }
}
