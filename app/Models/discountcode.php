<?php

namespace App\Models;

use CodeIgniter\Model;

class discountcode extends Model
{
    protected $table = 'discountcode';
    protected $primaryKey = 'id';


    protected $allowedFields = [
        'title',
        'typeOfCode',
        'numberOfCodes',
        'prefix',
        'suffix',
        'code',
        'discountValue',
        'minimumPurchaseRequirement',
        'customerEligibility',
        'maximumDiscountUses',
        'limitPerCustomer',
        'startDate',
        'endDate',
        'discountstatus',
        'exclusion_rules',
        'usage_tracking',
        'auto_expiration_notification',
        'notification_period',
        'randomization_option',
        'randomization_range',
        'code_deactivation',
        'discount_type',
        'codeLength'
    ];

    public function getDiscountCodesByStatus($status)
    {
        return $this->where('discountstatus', $status)->findAll();
    }

    public function insertDiscountCode($data)
    {
        return $this->insert($data);
    }


    public function getDiscountCodes()
    {
        return $this->findAll();
    }

    public function getDiscountCodeById($id)
    {
        return $this->where('id', $id)->first();
    }

    public function createDiscountCode($discountData)
    {
        return $this->insert($discountData);
    }

    public function updateDiscountCode($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deletecode($id)
    {
        return $this->where('id', $id)->delete();
    }

    public function getDiscountCodesByDateRange($startDate, $endDate)
    {
        return $this->where('startDate >=', $startDate)
            ->where('endDate <=', $endDate)
            ->findAll();
    }

    public function getActiveDiscountCodes()
    {
        $currentDate = date('Y-m-d H:i:s');
        return $this->where('startDate <=', $currentDate)
            ->where('endDate >=', $currentDate)
            ->findAll();
    }

    public function getDiscountCodeData()
    {
        return $this->findAll();
    }
}
