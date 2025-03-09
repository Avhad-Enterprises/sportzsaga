<?php

namespace App\Models;

use CodeIgniter\Model;

class HomeLogoModel extends Model
{
    protected $table = 'home_logo';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'logo', 'visibility', 'created_at', 'updated_at', 'deleted_at', 'deleted_by', 'is_deleted', 'added_by', 'change_log'];
    protected $useTimestamps = true;

    public function Restorelogo($logoId, $data)
    {
        return $this->db->table('home_logo')->where('id', $logoId)->update($data);

    }
}
