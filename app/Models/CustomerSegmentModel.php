<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomerSegmentModel extends Model
{
    protected $table = 'customer_segments'; // Table name
    protected $primaryKey = 'segment_id'; // Primary key

    // Allowed fields for insert/update
    protected $allowedFields = [
        'segment_name',
        'segment_description',
        'segment_type',
        'created_by',
        'filters',
        'filtered_users',
    ];

    // Enable automatic timestamps
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
}
