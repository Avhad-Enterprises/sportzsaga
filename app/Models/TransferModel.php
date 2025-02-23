<?php

namespace App\Models;

use CodeIgniter\Model;

class TransferModel extends Model
{
    protected $table = 'transfer_inventory';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'giver',
        'receiver',
        'transfer_order_number',
        'reference_number',
        'date_of_transfer',
        'mode_of_transport',
        'type_of_transport',
        'transport_party',
        'company_name',
        'tracking_info',
        'product_id',
        'product_name',
        'quantity_to_transfer',
        'storage_location',
        'destination_location',
        'uom',
        'insurance',
        'checks',
        'digital_signature',
        'additional_documents',
        'created_at',
        'updated_at',
    ];

    protected $useTimestamps = true;
}
