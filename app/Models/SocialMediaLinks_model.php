<?php

namespace App\Models;

use CodeIgniter\Model;

class SocialMediaLinks_model extends Model
{
    protected $table = 'social_media_links';
    protected $primaryKey = 'id';
    protected $allowedFields = ['platform', 'link','icon'];
}
