<?php

namespace App\Models;

use CodeIgniter\Model;

class InvitationModel extends Model
{
    protected $table = 'invitations';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id',
        'email',
        'name',
        'roles',
        'user_type',
        'status',
        'created_at',
        'department',
        'job_title',
        'roles',
        'updated_at',
        'token',
        'token_expiry'
    ];
}
