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


    public function getCompanyChangeLogs($companyId)
    {
        $company = $this->find($companyId);

        if (!$company || empty($company['change_log'])) {
            return [];
        }

        // Decode the JSON stored in change_log column
        $changeLogs = json_decode($company['change_log'], true);

        // If it's not an array (invalid JSON or empty), return empty array
        if (!is_array($changeLogs)) {
            return [];
        }

        // Process each change log entry to ensure it has updated_at
        foreach ($changeLogs as $key => $log) {
            // Check for updated_at in different places
            if (!isset($log['updated_at'])) {
                // Try to get updated_at from timestamp
                if (isset($log['timestamp'])) {
                    $changeLogs[$key]['updated_at'] = $log['timestamp'];
                }
                // Try to get updated_at from changes array
                else if (isset($log['changes']['updated_at']['new'])) {
                    $changeLogs[$key]['updated_at'] = $log['changes']['updated_at']['new'];
                }
                // As a last resort, set to current time
                else {
                    $changeLogs[$key]['updated_at'] = date('Y-m-d H:i:s');
                }
            }
        }

        // Sort by updated_at in descending order (newest first)
        usort($changeLogs, function ($a, $b) {
            $timeA = isset($a['updated_at']) ? strtotime($a['updated_at']) : 0;
            $timeB = isset($b['updated_at']) ? strtotime($b['updated_at']) : 0;
            return $timeB - $timeA;
        });

        return $changeLogs;
    }
}
