<?php

namespace App\Models;

use CodeIgniter\Model;

class HeaderFourthModel extends Model
{
    protected $table = 'header_fourth';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id',
        'header_second_id',
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

    // Fetch header fourth items associated with header third
    public function GetHeaderFourthData($headerThirdId)
    {
        return $this->where('header_third_id', $headerThirdId)->findAll();
    }
}
