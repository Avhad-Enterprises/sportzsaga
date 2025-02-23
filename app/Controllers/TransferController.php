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

        // Fetch all transfer records
        $transfers = $transferModel->findAll();

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
                $fileName = $file->getClientName();
                $fileTempPath = $file->getTempName();

                // Upload to Google Cloud Storage
                $object = $bucket->upload(
                    fopen($fileTempPath, 'r'),
                    [
                        'name' => 'transfers/' . $fileName, // Adjust folder structure as needed
                        'predefinedAcl' => 'publicRead',
                    ]
                );

                $uploadedImages[$field] = sprintf('https://storage.googleapis.com/%s/transfers/%s', $bucketName, $fileName);
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
            'checks' => implode(',', $this->request->getPost('checks')),
            'digital_signature' => $uploadedImages['digital_signature'], // Link from Google Cloud Storage
            'additional_documents' => $uploadedImages['additional_documents'], // Link from Google Cloud Storage
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

        // Prepare data for update
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
            'insurance' => $this->request->getPost('insurance'),
        ];

        // Handle file uploads for digital_signature and additional_documents
        if ($file = $this->request->getFile('digital_signature')) {
            if ($file->isValid() && !$file->hasMoved()) {
                $newName = $file->getRandomName();
                $file->move(WRITEPATH . 'uploads/', $newName);
                $data['digital_signature'] = $newName;
            }
        }

        if ($file = $this->request->getFile('additional_documents')) {
            if ($file->isValid() && !$file->hasMoved()) {
                $newName = $file->getRandomName();
                $file->move(WRITEPATH . 'uploads/', $newName);
                $data['additional_documents'] = $newName;
            }
        }

        // Update transfer record
        $transferModel->update($id, $data);

        return redirect()->to('transfer_inventory_view')->with('success', 'Transfer record updated successfully!');
    }


    public function delete($id)
    {
        $transferModel = new TransferModel();

        $transferModel->delete($id);

        return redirect()->to('transfer_inventory_view')->with('success', 'Transfer record deleted successfully!');
    }
}
