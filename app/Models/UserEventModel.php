<?php

namespace App\Models;

use CodeIgniter\Model;

class UserEventModel extends Model
{
    protected $table = 'user_events';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id',
        'name',
        'visitor_id',
        'session_id',
        'event_type',
        'event_data',
        'timestamp'
    ];

    public function getuserevents()
    {
        return $this->findAll();
    }

    public function geteventdata($id)
    {
        return $this->where('id', $id)->findAll();
    }
}
