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
        $data['suppliers'] = $supplierModel->findAll();

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
        $files = $this->request->getFiles();
        $fileNames = [];

        // Handle multiple file uploads
        if ($files && isset($files['attachments'])) {
            foreach ($files['attachments'] as $file) {
                if ($file->isValid() && !$file->hasMoved()) {
                    $fileName = $file->getRandomName();
                    $file->move('uploads/suppliers', $fileName); // Save file to the directory
                    $fileNames[] = $fileName; // Collect file names
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
            'attachments' => json_encode($fileNames), // Store file names as JSON
        ];

        log_message('debug', 'Data to Save: ' . json_encode($data));

        // Save data
        if (!$this->supplierModel->save($data)) {
            return redirect()->back()->withInput()->with('error', 'Failed to save supplier data.');
        }

        return redirect()->to('supplier_list_view')->with('success', 'Supplier added successfully.');
    }

    public function edit($id)
    {
        $session = session();
        $userId = $session->get('user_id');

        // Fetch supplier data by ID
        $supplier = $this->supplierModel->find($id);

        if (!$supplier) {
            return redirect()->to('/suppliers')->with('error', 'Supplier not found.');
        }

        // Fetch permissions for the current user
        $db = \Config\Database::connect();
        $permissions = $db->table('user_permissions')
            ->select('column_name')
            ->where('user_id', $userId)
            ->where('table_name', 'suppliers')
            ->where('action', 'edit')
            ->get()
            ->getResultArray();

        // Extract allowed fields
        $allowedFields = array_column($permissions, 'column_name');

        // Pass supplier and permissions data to the view
        return view('supplier_edit_view', [
            'supplier' => $supplier,
            'allowedFields' => array_flip($allowedFields) // Use array_flip for quick checks
        ]);
    }


    public function update($id)
    {
        $file = $this->request->getFile('attachments');
        $fileName = $this->request->getPost('existing_attachment');

        // Handle file upload
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $fileName = $file->getRandomName();
            $file->move('uploads/suppliers', $fileName);
        }

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
            'remarks' => $this->request->getPost('remarks'),
            'attachments' => $fileName,
            'status' => $this->request->getPost('status'),
        ];

        $this->supplierModel->update($id, $data);
        return redirect()->to('supplier_list_view')->with('success', 'Supplier updated successfully');
    }

    public function delete($id)
    {
        $this->supplierModel->delete($id);

        return redirect()->to('supplier_list_view')->with('success', 'Supplier deleted successfully');
    }
}
