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
        'change_log'
    ];

    public function getCollection()
    {
        return $this->where('id', 1)->first();
    }

    public function saveOrUpdateCollection($data)
    {
        // Fetch existing record with ID = 1
        $existingRecord = $this->find(1);

        if ($existingRecord) {
            // Prepare change log
            $changeLog = json_decode($existingRecord['change_log'], true) ?? [];

            // Capture only changed fields
            $changes = [];
            foreach ($data as $key => $value) {
                if (isset($existingRecord[$key]) && $existingRecord[$key] != $value) {
                    $changes['old'][$key] = $existingRecord[$key];
                    $changes['new'][$key] = $value;
                }
            }

            if (!empty($changes)) {
                $changes['updated_at'] = date('Y-m-d H:i:s'); // Timestamp for log
                $changeLog[] = $changes;
            }

            // Update the record with ID = 1, including the new change log
            $data['change_log'] = json_encode($changeLog);
            return $this->update(1, $data);
        } else {
            // First-time insert with ID = 1
            $data['id'] = 1;
            $data['change_log'] = json_encode([[
                'old' => null,
                'new' => $data,
                'updated_at' => date('Y-m-d H:i:s')
            ]]);
            return $this->insert($data);
        }
    }
}
