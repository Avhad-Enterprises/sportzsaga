<?php

namespace App\Models;

use CodeIgniter\Model;

class os_collectionModel extends Model
{
    protected $table = 'os_collections'; // Table name
    protected $primaryKey = 'id'; // Primary key

    protected $useTimestamps = true; // Enable automatic timestamping
    protected $createdField = 'created_at'; // Field for record creation
    protected $updatedField = 'updated_at'; // Field for record updates
  
    protected $allowedFields = [
        'image1',
        'image2',
        'title',
        'fav_product',
    ];

    public function getCollection()
    {
        return $this->where('id', 1)->first();
    }

    public function saveOrUpdateCollection($data)
    {
        // Check if ID 1 exists
        if ($this->where('id', 1)->countAllResults() > 0) {
            // Update the record with ID 1
            return $this->update(1, $data);
        } else {
            // Insert the first record
            $data['id'] = 1; // Ensure ID 1 is set explicitly
            return $this->insert($data);
        }
    }
}
