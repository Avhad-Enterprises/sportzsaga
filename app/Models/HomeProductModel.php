<?php

namespace App\Models;

use CodeIgniter\Model;

class HomeProductModel extends Model
{
    protected $table = 'home_product';
    protected $primaryKey = 'id';
    protected $allowedFields = ['product_id'];
}
