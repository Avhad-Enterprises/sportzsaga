<?php

namespace App\Models;

use CodeIgniter\Model;

class PageModel extends Model
{
    protected $table = 'header_pages';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['title', 'link', 'visibility', 'page_type', 'subtype', 'specific_item', 'image', 'is_deleted', 'deleted_at', 'deleted_by','added_by'];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    // ✅ Fetch only active pages by default
    public function getActivePages()
    {
        return $this->where('is_deleted', 0)->findAll();
    }
}
