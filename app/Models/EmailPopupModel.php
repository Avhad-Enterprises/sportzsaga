<?php

namespace App\Models;

use CodeIgniter\Model;

class EmailPopupModel extends Model
{
    protected $table = 'email_pop_up';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'email_pop_up_image',
        'email_pop_up_mail_title',
        'email_pop_up_mail_text',
        'email_pop_up_mail_linktext',
        'email_pop_up_description'
    ];
}
