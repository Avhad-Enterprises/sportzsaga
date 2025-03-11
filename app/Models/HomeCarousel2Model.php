<?php

namespace App\Models;

use CodeIgniter\Model;

class HomeCarousel2Model extends Model
{
    protected $table = 'home_carousel2';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'description', 'select_link', 'selected_product', 'selected_collection', 'image', 'image_mobile', 'visibility','change_log'];

}
