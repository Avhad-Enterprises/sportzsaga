<?php

namespace App\Models;

use CodeIgniter\Model;

class RobotsTxtModel extends Model
{
    protected $table = 'robots_txt';
    protected $primaryKey = 'id';
    protected $allowedFields = ['content', 'updated_at', 'updated_by'];
}
