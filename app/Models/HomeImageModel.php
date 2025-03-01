<?php

namespace App\Models;

use CodeIgniter\Model;

class HomeImageModel extends Model
{
    protected $table = 'home_image';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'image_title1',
        'description1',
        'background_image1',
        'title2',
        'description2',
        'background_image2',
        'select_link1',
        'selected_product1',
        'selected_collection1',
        'select_link2',
        'selected_product2',
        'selected_collection2',
        'is_deleted',
        'deleted_by',
        'deleted_at',
        'added_by',
        'updated_by',
        'created_at',
        'updated_at'
    ];

    // Method to fetch data for the form (row with id=1)
    public function getHomeImage()
    {
        return $this->where('id', 1)->first();
    }

    
    public function updateHomeImage($data)
    {
        // Log the data being sent for update
        log_message('info', 'Update Data: ' . json_encode($data));

        // Update the row with id 1
        return $this->update(1, $data);
    }
}
