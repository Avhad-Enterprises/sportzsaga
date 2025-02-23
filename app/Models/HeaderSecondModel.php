<?php

namespace App\Models;

use CodeIgniter\Model;

class HeaderSecondModel extends Model
{
    protected $table = 'header_second';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id',
        'header_first_id',
        'title',
        'collection_id',
        'visibility',
        'created_at',
        'updated_at',
        'is_deleted',
        'deleted_by',
        'deleted_at',
        'added_by',
        'updated_by',
    ];

    public function GetHeaderSecondData($headerFirstId)
    {
        return $this->where('header_first_id', $headerFirstId)
            ->findAll();
    }
}
