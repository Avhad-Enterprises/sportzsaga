<?php

namespace App\Models;

use CodeIgniter\Model;

class PermissionsModel extends Model
{
    protected $table = 'user_permissions';
    protected $primaryKey = 'permission_id'; // Ensure this matches your table's primary key
    protected $allowedFields = ['user_id', 'table_name', 'column_name', 'action'];

    /**
     * Get all users from the users table
     *
     * @return array
     */
    public function getUsers()
    {
        $db = db_connect();
        $builder = $db->table('users');
        return $builder->select('user_id, email')->get()->getResultArray(); // Fetch user_id and email
    }


    /**
     * Get all tables from the database
     *
     * @return array
     */
    public function getTables()
    {
        $db = db_connect();
        $query = $db->query("SELECT table_name FROM information_schema.tables WHERE table_schema = DATABASE()");
        return $query->getResultArray();
    }

    /**
     * Get all columns of a specific table
     *
     * @param string $table Table name
     * @return array
     */
    public function getColumns(string $table)
    {
        $db = db_connect();

        // Use prepared statements to avoid SQL injection
        $query = $db->query("SELECT column_name FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = ?", [$table]);

        return $query->getResultArray();
    }


    /**
     * Save permissions for a user
     *
     * @param int $userId User ID
     * @param array $permissions Permissions array
     * @return bool
     */
    public function savePermissions(int $userId, array $permissions)
    {
        $db = db_connect();
        $builder = $db->table($this->table);

        // Start a transaction for safe updates
        $db->transStart();

        // Delete existing permissions for the user
        $builder->where('user_id', $userId)->delete();

        // Insert new permissions
        foreach ($permissions as $perm) {
            $data = [
                'user_id' => $userId,
                'table_name' => $perm['table'],
                'column_name' => $perm['column'] ?? null,
                'action' => $perm['action']
            ];

            $builder->insert($data);
        }

        // Complete the transaction
        $db->transComplete();

        return $db->transStatus(); // Returns true if the transaction succeeded
    }

    public function hasPermission($userId, $tableName, $action)
    {
        log_message('debug', "Checking permission: User ID: $userId, Table: $tableName, Action: $action");

        $builder = $this->builder();

        // Check for both specific column permissions and wildcard (*) permissions
        $builder->where('user_id', $userId)
            ->where('table_name', $tableName)
            ->where('action', $action)
            ->groupStart()
            ->where('column_name', '*') // General permission for all columns
            ->orWhere('column_name IS NOT NULL') // Permission for specific columns
            ->groupEnd();

        $result = $builder->get()->getRow();

        if ($result) {
            log_message('debug', "Permission granted: User ID: $userId, Table: $tableName, Action: $action");
            return true;
        } else {
            log_message('debug', "Permission denied: User ID: $userId, Table: $tableName, Action: $action");
            return false;
        }
    }
}
