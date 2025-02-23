<?php

namespace App\Models;

use CodeIgniter\Model;

class GiftModel extends Model
{
    protected $table = 'giftcards';
    protected $primaryKey = 'gift_card_id';
    protected $allowedFields = [
        'gift_card_code',
        'creation_date',
        'expiration_date',
        'initial_value',
        'issued_by',
        'issued_to',
        'status',
        'balance',
        'security_features',
        'restrictions',
        'issued_by_id',
        'issued_to_id'
    ];

    protected $useTimestamps = false;

    public function getAllGiftCards()
    {
        return $this->findAll();
    }

    public function updatemodel($gift_card_id, $data)
    {
        return $this->where('gift_card_id', $gift_card_id)->set($data)->update();
    }
}
