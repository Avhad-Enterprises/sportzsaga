<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $DBGroup = 'default';

    public function getSpecificTables()
    {
        $db = \Config\Database::connect();

        // Fetching only the projects and services tables
        $builder = $db->query('SHOW TABLES');
        $tables = $builder->getResultArray();

        // Define allowed tables
        $allowedTables = ['products', 'order_management', 'visitors', 'sales_test'];

        $tableNames = [];
        foreach ($tables as $table) {
            if (in_array($table['Tables_in_' . $db->database], $allowedTables)) {
                $tableNames[] = $table['Tables_in_' . $db->database];
            }
        }

        return $tableNames;
    }

    public function getAllReports()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('saved_reports');
        $builder->where('is_deleted', 0);
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function getReportLogs()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('saved_reports');
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function getReportById($reportId)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('saved_reports');
        $builder->select('id, report_name, table_name, columns, filters');
        $builder->where('id', $reportId);
        $query = $builder->get();
        $report = $query->getRowArray();

        if ($report) {
            $report['columns'] = json_decode($report['columns'], true);
            $report['filters'] = $report['filters'] ? json_decode($report['filters'], true) : [];
        }

        return $report;
    }

    public function DeleteReportsData($id, $data)
    {
        return $this->db->table('saved_reports')->where('id', $id)->update($data);
    }

    public function RestoreReportsData($id, $data)
    {
        return $this->db->table('saved_reports')->where('id', $id)->update($data);
    }
}
