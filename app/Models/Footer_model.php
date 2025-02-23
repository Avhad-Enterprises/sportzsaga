<?php

namespace App\Models;

use CodeIgniter\Model;

class Footer_model extends Model
{
    protected $table = 'footer_data';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'footer_image',
        'footer_email',
        'footer_hours',
        'footer_name',
        'facebook',
        'instagram',
        'twitter',
        'youtube',
        'footer_payment_image1',
        'footer_payment_image2',
        'footer_payment_image3',
        'footer_payment_link1',
        'footer_payment_link2',
        'footer_payment_link3',
        'updated_at'
    ];

    public function updateFooterData($data)
    {
        $existingData = $this->find(1);

        if ($existingData) {
            return $this->update(1, $data);
        } else {
            $data['id'] = 1;
            return $this->insert($data);
        }
    }
}
