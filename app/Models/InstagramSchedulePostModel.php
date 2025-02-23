<?php

namespace App\Models;

use CodeIgniter\Model;

class InstagramSchedulePostModel extends Model
{
    protected $table = 'instagram_schedule_posts';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'user_id',
        'post_id',
        'image_url',
        'caption',
        'location',
        'hashtags',
        'post_type',
        'Publish_at',
        'visibility',
        'uploadToPublicHost_status',
        'postMediaToInstagram'
    ];

    public function getallinstagramscheduleposts()
    {
        return $this->findAll();
    }

    public function getallpendinginstagramscheduleposts()
    {
        return $this->where('postMediaToInstagram', 'pending')->findAll();
    }
}