<?php

namespace App\Controllers;

use App\Models\SupplierModel;
use App\Models\PermissionsModel;

class SupplierController extends BaseController
{
    protected $supplierModel;
    protected $permissionsModel;

    public function __construct()
    {
        $this->supplierModel = new SupplierModel();
        $this->permissionsModel = new PermissionsModel();
    }

    public function index()
    {
        $supplierModel = new \App\Models\SupplierModel();
        $session = session();

        // Get user ID from the session
        $userId = $session->get('user_id');

        // Fetch all suppliers
        $data['suppliers'] = $supplierModel->where('is_deleted', 0)->findAll();

        // Fetch permissions for the current user
        $db = \Config\Database::connect();
        $permissions = $db->table('user_permissions')
            ->select('action')
            ->where('user_id', $userId)
            ->where('table_name', 'suppliers')
            ->get()
            ->getResultArray();

        $allowedActions = array_column($permissions, 'action'); // Extract allowed actions
        $data['canDelete'] = in_array('delete', $allowedActions); // Check if 'delete' is allowed

        // Load the view
        return view('supplier_list_view', $data);
    }


    public function create()
    {
        return view('add_new_supplier');
    }

    public function save()
    {
        $session = session();
        $userId = $session->get('user_id');
        $files = $this->request->getFiles();
        $fileNames = [];

        // Handle multiple file uploads
        if ($files && isset($files['attachments'])) {
            foreach ($files['attachments'] as $file) {
                if ($file->isValid() && !$file->hasMoved()) {
                    $fileName = $file->getRandomName();
                    $file->move('uploads/suppliers', $fileName);
                    $fileNames[] = $fileName;
                } else {
                    log_message('error', 'File upload error: ' . $file->getError());
                }
            }
        }

        // Prepare data
        $data = [
            'supplier_name' => $this->request->getPost('supplier_name'),
            'supplier_code' => $this->request->getPost('supplier_code'),
            'contact_person' => $this->request->getPost('contact_person'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone'),
            'alternate_phone' => $this->request->getPost('alternate_phone'),
            'address' => $this->request->getPost('address'),
            'city' => $this->request->getPost('city'),
            'state' => $this->request->getPost('state'),
            'postal_code' => $this->request->getPost('postal_code'),
            'country' => $this->request->getPost('country'),
            'bank_name' => $this->request->getPost('bank_name'),
            'account_number' => $this->request->getPost('account_number'),
            'ifsc_code' => $this->request->getPost('ifsc_code'),
            'payment_terms' => $this->request->getPost('payment_terms'),
            'attachments' => json_encode($fileNames),
            'added_by' => $userId,
            'created_at' => date('Y-m-d H:i:s'),
        ];

        if (!$this->supplierModel->save($data)) {
            return redirect()->back()->withInput()->with('error', 'Failed to save supplier data.');
        }

        return redirect()->to('supplier_list_view')->with('success', 'Supplier added successfully.');
    }

    public function edit($id)
    {
        $session = session();
        $userId = $session->get('user_id');

        $supplier = $this->supplierModel->find($id);

        if (!$supplier) {
            return redirect()->to('/suppliers')->with('error', 'Supplier not found.');
        }

        $db = \Config\Database::connect();
        $permissions = $db->table('user_permissions')
            ->select('column_name')
            ->where('user_id', $userId)
            ->where('table_name', 'suppliers')
            ->where('action', 'edit')
            ->get()
            ->getResultArray();

        $allowedFields = array_column($permissions, 'column_name');

        return view('supplier_edit_view', [
            'supplier' => $supplier,
            'allowedFields' => array_flip($allowedFields)
        ]);
    }


    public function update($id)
    {
        $session = session();
        $userId = $session->get('user_id');

        // Fetch existing supplier data
        $existingSupplier = $this->supplierModel->find($id);
        if (!$existingSupplier) {
            return redirect()->to('supplier_list_view')->with('error', 'Supplier not found.');
        }

        // Handle file upload
        $file = $this->request->getFile('attachments');
        $fileName = $this->request->getPost('existing_attachment');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $fileName = $file->getRandomName();
            $file->move('uploads/suppliers', $fileName);
        }

        // Prepare updated supplier data
        $newData = [
            'supplier_name' => $this->request->getPost('supplier_name'),
            'supplier_code' => $this->request->getPost('supplier_code'),
            'contact_person' => $this->request->getPost('contact_person'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone'),
            'alternate_phone' => $this->request->getPost('alternate_phone'),
            'address' => $this->request->getPost('address'),
            'city' => $this->request->getPost('city'),
            'state' => $this->request->getPost('state'),
            'postal_code' => $this->request->getPost('postal_code'),
            'country' => $this->request->getPost('country'),
            'bank_name' => $this->request->getPost('bank_name'),
            'account_number' => $this->request->getPost('account_number'),
            'ifsc_code' => $this->request->getPost('ifsc_code'),
            'payment_terms' => $this->request->getPost('payment_terms'),
            'attachments' => $fileName,
        ];

        // ✅ Track changes
        $changes = [];
        foreach ($newData as $key => $value) {
            if ($existingSupplier[$key] != $value) {
                $changes[$key] = [
                    'old' => $existingSupplier[$key],
                    'new' => $value
                ];
            }
        }

        if (!empty($changes)) {

            $existingChangeLog = json_decode($existingSupplier['change_log'] ?? '[]', true);
            if (!is_array($existingChangeLog)) {
                $existingChangeLog = [];
            }

            $existingChangeLog[] = [
                'updated_by' => $userId,
                'timestamp' => date('Y-m-d H:i:s'),
                'changes' => $changes
            ];

            $newData['change_log'] = json_encode($existingChangeLog);


            if ($this->supplierModel->update($id, $newData)) {
                return redirect()->to('supplier_list_view')->with('success', 'Supplier updated successfully.');
            } else {
                return redirect()->back()->with('error', 'Failed to update supplier.');
            }
        }
        return redirect()->back()->with('info', 'No changes detected.');
    }


    public function delete($id)
    {
        $session = session();
        $userId = $session->get('user_id');

        $supplier = $this->supplierModel->find($id);
        if (!$supplier) {
            return redirect()->to('supplier_list_view')->with('error', 'Supplier not found.');
        }
        $deletedBy = $session->get('admin_name') . ' (' . $userId . ')';

        $this->supplierModel->update($id, [
            'is_deleted' => 1,
            'deleted_by' => $deletedBy,
            'deleted_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to('supplier_list_view')->with('success', 'Supplier deleted successfully.');
    }


    public function deletedSuppliers()
    {
        $data['suppliers'] = $this->supplierModel->where('is_deleted', 1)->findAll();
        return view('suppliers_deleted', $data);
    }


    public function restoreSupplier($id)
    {

        $supplier = $this->supplierModel->find($id);
        if (!$supplier) {
            return redirect()->to('supplier_list_view')->with('error', 'Supplier not found.');
        }

        $this->supplierModel->update($id, [
            'is_deleted' => 0,
            'deleted_by' => null,
            'deleted_at' => null,
        ]);

        return redirect()->to('supplier_list_view')->with('success', 'Supplier restored successfully.');
    }
}
