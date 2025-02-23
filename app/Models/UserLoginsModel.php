<?php

namespace App\Models;

use CodeIgniter\Model;

class UserLoginsModel extends Model
{
    protected $table = 'user_logins';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'user_name', 'login_time', 'logout_time'];
    
    public function getuserslogs()
    {
        return $this->findAll();
    }
    
}
