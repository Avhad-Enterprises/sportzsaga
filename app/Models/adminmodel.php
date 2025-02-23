<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function getAllTableNames()
    {
        $query = $this->db->query("SHOW TABLES");
        $result = $query->getResultArray();

        // Extract table names from the result
        $tables = [];
        foreach ($result as $row) {
            $tables[] = array_values($row)[0];
        }
        return $tables;
    }

    public function getTableColumns($tableName)
    {
        return $this->db->getFieldNames($tableName);
    }

    public function fetchReportData($tableName, $selectedColumns)
    {
        return $this->db->table($tableName)->select($selectedColumns)->get()->getResultArray();
    }
}
