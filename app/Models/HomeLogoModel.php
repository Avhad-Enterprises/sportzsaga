<?php

namespace App\Models;

use CodeIgniter\Model;

class HomeLogoModel extends Model
{
    protected $table = 'home_logo';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'logo', 'visibility', 'created_at', 'updated_at'];
    protected $useTimestamps = true;
}
