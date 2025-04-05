<?php

namespace App\Models;

use CodeIgniter\Model;

class BlogCommentModel extends Model
{
    protected $table = 'blog_comments';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'blog_metaurl',
        'user_id',
        'user_name',
        'user_email',
        'name',
        'email',
        'comment',
        'user_status',
        'created_at'
    ];
    
    protected $useTimestamps = true;
    
    public function insertcomment($data)
    {
        return $this->insert($data);
    }
    
}
