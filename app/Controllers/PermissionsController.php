<?php

namespace App\Controllers;

use App\Models\PermissionsModel;

class PermissionsController extends BaseController
{
    protected $permissionsModel;

    public function __construct()
    {
        $this->permissionsModel = new PermissionsModel();
    }

    public function unauthorized()
    {
        return view('unauthorized');
    }

    public function fetchUsers()
    {
        $users = $this->permissionsModel->getUsers();

        if (empty($users)) {
            return $this->response->setJSON(['message' => 'No users found.']);
        }

        return $this->response->setJSON($users);
    }

    public function fetchTables()
    {
        $tables = $this->permissionsModel->getTables();
        return $this->response->setJSON($tables);
    }



    public function fetchColumns($table)
    {
        $columns = $this->permissionsModel->getColumns($table);
        return $this->response->setJSON($columns);
    }

    public function savePermissions()
    {
        $userId = $this->request->getPost('user_id');
        $permissions = $this->request->getPost('permissions');
    
        if (empty($userId) || empty($permissions)) {
            return $this->response->setJSON(['message' => 'Invalid input.']);
        }
    
        $db = db_connect();
        foreach ($permissions as $permission) {
            $data = [
                'user_id' => $userId,
                'table_name' => $permission['table'],
                'column_name' => $permission['column'] ?? '*',
                'action' => $permission['action'],
            ];
            $db->table('user_permissions')->replace($data);
        }
    
        return $this->response->setJSON(['message' => 'Permissions saved successfully.']);
    }
    

    public function getImportExportPermissions($userId, $tableName)
    {
        $db = db_connect();
        $query = $db->table('user_permissions')
            ->where('user_id', $userId)
            ->where('table_name', $tableName)
            ->whereIn('action', ['import', 'export'])
            ->get();

        return $query->getResultArray();
    }

    public function inventoryView($userId)
    {
        $permissions = $this->getImportExportPermissions($userId, 'inventory');
        $data = [
            'canImport' => in_array('import', array_column($permissions, 'action')),
            'canExport' => in_array('export', array_column($permissions, 'action')),
        ];

        return view('inventory_view', $data); // Pass the data to your inventory view
    }





    public function viewPermissionsPage()
    {
        return view('permissions_view'); // Name of your view file
    }

}