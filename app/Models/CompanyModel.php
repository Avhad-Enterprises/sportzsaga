<?php

namespace App\Models;

use CodeIgniter\Model;

class CompanyModel extends Model
{
    protected $table = 'companies';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'company_name',
        'user_ids',
        'tags',
        'address',
        'notes',
        'apply_for_credit',
        'registration_number',
        'principal_director',
        'change_log'
    ];

    protected $useTimestamps = true;


    public function getcompanybyid($id)
    {
        return $this->where('id', $id)->findAll();
    }

    public function updatecompaniesdata($id, $data)
    {
        return $this->db->table('companies')->where('id', $id)->update($data);
    }

    public function insertBatchCompanies($data)
    {
        return $this->db->table('companies')->insertBatch($data);
    }

    public function updateCompanyStatus($id, $data)
    {
        return $this->db->table('companies')->where('id', $id)->update($data);
    }
    
    public function getAlllogscompany()
    {
        return $this->db->table('companies')->where('is_deleted', 1)->get()->getResultArray();
    }
    
}
