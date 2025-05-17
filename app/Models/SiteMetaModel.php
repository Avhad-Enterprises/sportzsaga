<?php

namespace App\Models;

use CodeIgniter\Model;

class SiteMetaModel extends Model
{
    protected $table = 'site_meta';
    protected $primaryKey = 'id';
    protected $allowedFields = ['page_name', 'meta_title', 'meta_description', 'updated_at', 'updated_by'];

    public function GetMetaFeilds()
    {
        return $this->db->table('site_meta')->get()->getResultArray();
    }
}
