<?php

namespace App\Models;

use CodeIgniter\Model;

class headerfirstmodel extends Model
{
    protected $table = 'header_first';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id',
        'title',
        'collection_id',
        'visibility',
        'is_deleted',
        'deleted_by',
        'deleted_at',
        'added_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];
    protected $useTimestamps = true;

    //Header First Model Functionas

    public function GetHeaderFirstData()
    {
        return $this->db->table('header_first')->where('is_deleted', 0)->get()->getResultArray();
    }
}
