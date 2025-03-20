<?php

namespace App\Controllers;

use App\Models\TransferModel;
use App\Models\Products_model;
use App\Models\PermissionsModel;
use CodeIgniter\Controller;

class TransferController extends Controller
{

    protected $permissionsModel;

    public function __construct()
    {
        $this->permissionsModel = new PermissionsModel();
    }
    public function create()
    {
        // Load the required models
        $productModel = new Products_model(); // Ensure this is your Product Model

        // Fetch all products
        $products = $productModel->findAll();

        // Pass products to the view
        $data = [
            'products' => $products
        ];
        return view('add_new_transfer', $data);
    }

    public function index()
    {
        $transferModel = new TransferModel();
        $db = db_connect();
        $session = session();
        $userId = $session->get('user_id');

        // Fetch only active (non-deleted) transfer records
        $transfers = $transferModel->where('is_deleted', 0)->findAll();

        // Fetch user's permissions for transfers
        $permissions = $db->table('user_permissions')
            ->select('action')
            ->where('user_id', $userId)
            ->where('table_name', 'transfer_inventory')
            ->get()
            ->getResultArray();

        $allowedActions = array_column($permissions, 'action');

        // Pass data to the view
        $data = [
            'transferData' => $transfers,
            'canDelete' => in_array('delete', $allowedActions), // Check if the user can delete
        ];

        return view('transfer_inventory_view', $data);
    }


    public function store()
    {
        $transferModel = new TransferModel();
        $session = session();
        $userId = $session->get('user_id'); // Get logged-in user ID

        // Initialize Google Cloud Storage client
        $storage = new \Google\Cloud\Storage\StorageClient([
            'keyFilePath' => WRITEPATH . 'public/mkvgsc.json', // Path to service account key
            'projectId' => 'peak-tide-441609-r1', // Replace with your project ID
        ]);

        $bucketName = 'mkv_imagesbackend';
        $bucket = $storage->bucket($bucketName);

        // Prepare file uploads
        $uploadedImages = [];
        $fileFields = ['digital_signature', 'additional_documents'];

        foreach ($fileFields as $field) {
            $file = $this->request->getFile($field);

            if ($file && $file->isValid() && !$file->hasMoved()) {
                $fileName = 'transfers/' . uniqid() . '_' . $file->getClientName();
                $fileTempPath = $file->getTempName();

                // Upload to Google Cloud Storage
                $object = $bucket->upload(
                    fopen($fileTempPath, 'r'),
                    [
                        'name' => $fileName, // Adjust folder structure as needed
                        'predefinedAcl' => 'publicRead',
                    ]
                );

                $uploadedImages[$field] = sprintf('https://storage.googleapis.com/%s/%s', $bucketName, $fileName);
            } else {
                $uploadedImages[$field] = null;
            }
        }

        // Collect form data
        $data = [
            'giver' => $this->request->getPost('giver'),
            'receiver' => $this->request->getPost('receiver'),
            'transfer_order_number' => $this->request->getPost('transfer_order_number'),
            'reference_number' => $this->request->getPost('reference_number'),
            'date_of_transfer' => $this->request->getPost('date_of_transfer'),
            'mode_of_transport' => $this->request->getPost('mode_of_transport'),
            'type_of_transport' => $this->request->getPost('type_of_transport'),
            'transport_party' => $this->request->getPost('transport_party'),
            'company_name' => $this->request->getPost('company_name'),
            'tracking_info' => $this->request->getPost('tracking_info'),
            'product_id' => $this->request->getPost('product_id'),
            'product_name' => $this->request->getPost('product_name'),
            'quantity_to_transfer' => $this->request->getPost('quantity_to_transfer'),
            'storage_location' => $this->request->getPost('storage_location'),
            'destination_location' => $this->request->getPost('destination_location'),
            'uom' => $this->request->getPost('uom'),
            'batch_number' => $this->request->getPost('batch_number'),
            'lot_number' => $this->request->getPost('lot_number'),
            'insurance' => $this->request->getPost('insurance'),
            'checks' => is_array($this->request->getPost('checks')) ? implode(',', $this->request->getPost('checks')) : null,
            'digital_signature' => $uploadedImages['digital_signature'], // Link from Google Cloud Storage
            'additional_documents' => $uploadedImages['additional_documents'], // Link from Google Cloud Storage
            'added_by' => $userId, // Save the user who added the entry
            'added_at' => date('Y-m-d H:i:s') // Timestamp when added
        ];

        // Insert data into the database
        if ($transferModel->insert($data)) {
            return redirect()->to('transfer_inventory_view')->with('success', 'Transfer Inventory saved successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to save Transfer Inventory.');
        }
    }

    public function edit($id)
    {
        $transferModel = new TransferModel();
        $productModel = new Products_model(); // For fetching products
        $db = db_connect();
        $session = session();
        $userId = $session->get('user_id');

        // Fetch the transfer record
        $transfer = $transferModel->find($id);

        if (!$transfer) {
            return redirect()->to('/transfer')->with('error', 'Transfer record not found.');
        }

        // Fetch user permissions for the "transfer" table
        $permissions = $db->table('user_permissions')
            ->select('column_name')
            ->where('user_id', $userId)
            ->where('table_name', 'transfer_inventory')
            ->where('action', 'edit')
            ->get()
            ->getResultArray();

        $allowedFields = array_column($permissions, 'column_name');

        // Fetch all products for the dropdown
        $products = $productModel->findAll();

        // Pass data to the view
        $data = [
            'transfer' => $transfer,
            'products' => $products,
            'allowedFields' => $allowedFields, // Pass the allowed fields to the view
        ];

        return view('edit_transfer', $data);
    }


    public function update($id)
    {
        $transferModel = new TransferModel();
        $session = session();


        // Fetch existing transfer data
        $transfer = $transferModel->find($id);

        if (!$transfer) {
            return redirect()->to('transfer_inventory_view')->with('error', 'Transfer record not found.');
        }

        // Prepare data for update
        $newData = [
            'giver' => $this->request->getPost('giver'),
            'receiver' => $this->request->getPost('receiver'),
            'transfer_order_number' => $this->request->getPost('transfer_order_number'),
            'reference_number' => $this->request->getPost('reference_number'),
            'date_of_transfer' => $this->request->getPost('date_of_transfer'),
            'mode_of_transport' => $this->request->getPost('mode_of_transport'),
            'type_of_transport' => $this->request->getPost('type_of_transport'),
            'transport_party' => $this->request->getPost('transport_party'),
            'company_name' => $this->request->getPost('company_name'),
            'tracking_info' => $this->request->getPost('tracking_info'),
            'product_id' => $this->request->getPost('product_id'),
            'product_name' => $this->request->getPost('product_name'),
            'quantity_to_transfer' => $this->request->getPost('quantity_to_transfer'),
            'storage_location' => $this->request->getPost('storage_location'),
            'destination_location' => $this->request->getPost('destination_location'),
            'uom' => $this->request->getPost('uom'),
            'insurance' => $this->request->getPost('insurance'),
            'updated_by' => $session->get('admin_name') . '(' . $session->get('user_id') . ')',
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        // Handle file uploads for digital_signature and additional_documents
        if ($file = $this->request->getFile('digital_signature')) {
            if ($file->isValid() && !$file->hasMoved()) {
                $newName = $file->getRandomName();
                $file->move(WRITEPATH . 'uploads/', $newName);
                $newData['digital_signature'] = $newName;
            }
        }

        if ($file = $this->request->getFile('additional_documents')) {
            if ($file->isValid() && !$file->hasMoved()) {
                $newName = $file->getRandomName();
                $file->move(WRITEPATH . 'uploads/', $newName);
                $newData['additional_documents'] = $newName;
            }
        }

        // ✅ Track changes
        $changes = [];
        foreach ($newData as $key => $value) {
            if ($transfer[$key] != $value) {
                $changes[$key] = [
                    'old' => $transfer[$key],
                    'new' => $value
                ];
            }
        }

        if (!empty($changes)) {
            // Retrieve existing change log
            $existingChangeLog = json_decode($transfer['change_log'] ?? '[]', true);
            if (!is_array($existingChangeLog)) {
                $existingChangeLog = [];
            }

            // Append new change log entry
            $existingChangeLog[] = [
                'updated_by' => $session->get('admin_name') . ' (' . $session->get('user_id') . ')',
                'timestamp' => date('Y-m-d H:i:s'),
                'changes' => $changes
            ];

            // Store changes in JSON format
            $newData['change_log'] = json_encode($existingChangeLog);

            // Update the transfer data
            if ($transferModel->update($id, $newData)) {
                return redirect()->to('transfer_inventory_view')->with('success', 'Transfer record updated successfully.');
            } else {
                return redirect()->back()->with('error', 'Failed to update transfer record.');
            }
        }

        return redirect()->back()->with('info', 'No changes detected.');
    }


    public function delete($id)
    {
        $session = session();
        $userId = $session->get('user_id'); // Get logged-in user ID
        $transferModel = new TransferModel();

        // Fetch existing transfer entry
        $transfer = $transferModel->find($id);
        if (!$transfer) {
            return redirect()->to('transfer_inventory_view')->with('error', 'Transfer record not found.');
        }

        // Save the admin name and ID
        $deletedBy = $session->get('admin_name') . ' (' . $userId . ')';

        // Perform soft deletion by updating fields
        $transferModel->update($id, [
            'is_deleted' => 1, // Mark as deleted
            'deleted_by' => $deletedBy, // Track who deleted
            'deleted_at' => date('Y-m-d H:i:s'), // Record timestamp
        ]);

        return redirect()->to('transfer_inventory_view')->with('success', 'Transfer record deleted successfully.');
    }
    public function deleted()
    {
        $transferModel = new TransferModel();
        $data['transfers'] = $transferModel->where('is_deleted', 1)->findAll();

        return view('transfer_deleted', $data); // Load deleted transfers view
    }
    public function restore($id)
    {
        $transferModel = new TransferModel();

        // Fetch transfer record
        $transfer = $transferModel->find($id);
        if (!$transfer) {
            return redirect()->to('transfer/deleted')->with('error', 'Transfer record not found.');
        }

        // Restore the transfer record by clearing deletion fields
        $transferModel->update($id, [
            'is_deleted' => 0,
            'deleted_by' => null,
            'deleted_at' => null,
        ]);

        return redirect()->to('transfer_inventory_view')->with('success', 'Transfer record restored successfully.');
    }



    public function transfer_change_logs($id = null)
    {
        $db = \Config\Database::connect();

        if ($id === null) {
            return view('edit_transfer_logs_view', ['updates' => []]); // No transfer ID provided
        }

        // Fetch transfer details
        $query = $db->table('transfer_inventory')->select('change_log')->where('id', $id)->get();
        $row = $query->getRow();

        if ($row) {
            $decodedData = json_decode($row->change_log, true);

            if (!is_array($decodedData)) {
                return view('edit_transfer_logs_view', ['updates' => []]); // Return empty if decoding fails
            }

            $updates = [];

            foreach ($decodedData as $key => $log) {
                if (is_numeric($key) && isset($log['timestamp'])) {
                    $updates[] = [
                        'updated_by' => $log['updated_by'] ?? 'Unknown',
                        'updated_at' => $log['timestamp'],
                        'changes' => $log['changes'] ?? [],
                    ];
                }
            }

            return view('edit_transfer_logs_view', ['updates' => $updates]);
        }

        return view('edit_transfer_logs_view', ['updates' => []]); // No logs found
    }


    public function getTransferChangeLogs()
    {
        $db = \Config\Database::connect();
        $query = $db->table('transfer_inventory')->select('change_log')->get();
        $row = $query->getRow();

        if ($row) {
            $decodedData = json_decode($row->change_log, true);

            if (!is_array($decodedData)) {
                return []; // Return empty array if decoding fails
            }

            $updates = [];

            foreach ($decodedData as $key => $log) {
                if (is_numeric($key) && isset($log['updated_at'])) {
                    $updates[] = $log;
                }
            }

            return $updates;
        }
        return [];
    }

}
