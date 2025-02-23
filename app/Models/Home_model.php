<?php

namespace App\Models;

use CodeIgniter\Model;

class Home_model extends Model
{
    protected $table = 'blogs';
    protected $primaryKey = 'blog_id';
    protected $allowedFields = ['blog_id', 'blog_title', 'publish_date_and_time', 'blog_description', 'main_description', 'blog_visibility', 'blog_tags', 'blog_comments', 'blog_image', 'blog_metatitle', 'blog_metadescription', 'blog_metaurl', 'category'];
    
    public function getposts($limit = 6)
    {
        return $this->where('blog_visibility', 'public')->orderBy('publish_date_and_time', 'DESC')->findAll($limit);
    }
}
