<?php

namespace App\Models;

use CodeIgniter\Model;

class HomeBlogModel extends Model
{
    protected $table = 'home_blog';
    protected $primaryKey = 'id';
    protected $allowedFields = ['blog_id','change_log'];
}
