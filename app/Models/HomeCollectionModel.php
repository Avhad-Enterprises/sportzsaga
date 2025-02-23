<?php

namespace App\Models;

use CodeIgniter\Model;

class HomeCollectionModel extends Model
{
    protected $table = 'home_collection';
    protected $primaryKey = 'id';
    protected $allowedFields = ['collection_id', 'collection_title'];
}
