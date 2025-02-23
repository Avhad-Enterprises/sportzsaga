<?php

namespace App\Models;

use CodeIgniter\Model;
use GuzzleHttp\Client;

class InstagramModel extends Model
{
    protected $table = 'instagram_posts';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'post_id', 'image_url', 'caption', ' location', 'hashtags', 'post_type'];

    public function getallinstagramposts()
    {
        return $this->findAll();
    }
}
