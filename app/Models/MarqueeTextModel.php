<?php

namespace App\Models;

use CodeIgniter\Model;

class MarqueeTextModel extends Model
{
    protected $table = 'marquee_texts';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'marqueeText',
        'marqueeText_link',
        'text_visibility',
        'is_deleted',
        'deleted_by',
        'deleted_at',
        'added_by',
        'updated_by',
        'created_at',
        'updated_at'
    ];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
}
