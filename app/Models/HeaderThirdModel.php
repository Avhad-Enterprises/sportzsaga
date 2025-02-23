<?php

namespace App\Models;

use CodeIgniter\Model;

class HeaderThirdModel extends Model
{
    protected $table = 'header_third';
    protected $primaryKey = 'id';
    protected $allowedFields = ['header_second_id', 'title', 'collection_id', 'visibility', 'is_deleted', 'added_by', 'updated_by', 'created_at', 'updated_at', 'deleted_by', 'deleted_at'];
    protected $useTimestamps = true;

    public function GetHeaderThirdData($headerSecondId)
    {
        return $this->where('header_second_id', $headerSecondId)
            ->where('is_deleted', 0)
            ->findAll();
    }
}
