<?php

namespace App\Models;

use CodeIgniter\Model;

class WarehouseModel extends Model
{
    protected $table = 'warehouses';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'name',
        'pincode',
        'manager',
        'storage_capacity',
        'floor_area',
        'pallet_capacity',
        'address',
        'status',
        'contact_number',
        'email',
        'opening_hours',
    ];
    protected $useTimestamps = true;
}
