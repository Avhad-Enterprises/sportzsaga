<?php

namespace App\Models;

use CodeIgniter\Model;

class BlogModel extends Model
{
    protected $table = 'onlinestore_blogs';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'blogs_name',
        'blogs_description',
        'blogs',
        'tags',
        'content_type',
        'added_by',
        'updated_by',
        'created_at',
        'updated_at',
        'is_deleted',
        'deleted_by',
        'deleted_at'
    ];
    
}