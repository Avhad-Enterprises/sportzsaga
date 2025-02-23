<?php

namespace App\Models;

use CodeIgniter\Model;

class PincodeModel extends Model
{
    protected $table = 'pincode_mapping';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'cdttorg',
        'cdttorgdesc',
        'area_pincode',
        'carea',
        'cscrcd',
        'cscrcddesc',
        'cregion',
        'cstatecd',
        'cstate',
        'cproduct',
        'csubproduct',
        'cpacktype',
        'clocation',
        'sfczone',
        'edl',
        'cedldistance',
        'tat',
        'e00val',
        'ec0val',
        'ep0val',
        'e00',
        'e0d',
        'e0f',
        'ec0',
        'ep0'
    ];

    public function getPincodedata()
    {
        return $this->db->table('pincode_mapping')
            ->select('delivery_partner, COUNT(area_pincode) AS pincode_count')
            ->groupBy('delivery_partner')
            ->get()
            ->getResultArray();
    }

    public function insertPincodeExcelData($data)
    {
        return $this->db->table('pincode_mapping')->insertBatch($data);
    }
}
