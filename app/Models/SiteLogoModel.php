<?php

namespace App\Models;

use CodeIgniter\Model;

class SiteLogoModel extends Model
{
    protected $table = 'site_logos';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'website_logo',
        'navbar_logo',
        'navbar_logo_mobile',
        'footer_logo',
        'favicon',
        'updated_at',
        'updated_by'
    ];
}
