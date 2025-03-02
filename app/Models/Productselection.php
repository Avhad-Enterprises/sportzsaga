<?php
namespace App\Models;

use CodeIgniter\Model;

class Productselection extends Model
{
    protected $table = 'products_section';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'description', 'selection_type', 'selected_items'];

}
