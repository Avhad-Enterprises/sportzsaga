<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\PurchaseOrderModel;
use App\Models\Products_model;
use App\Models\WarehouseModel;
use App\Models\SupplierModel;
use App\Models\PermissionsModel;
use Google\Cloud\Storage\StorageClient;

class PurchaseOrderController extends Controller
{

    protected $permissionsModel;
    protected $purchaseOrderModel;
    protected $supplierModel;

    public function __construct()
    {
        $this->permissionsModel = new PermissionsModel();
        $this->purchaseOrderModel = new PurchaseOrderModel();
        $this->supplierModel = new SupplierModel();
    }

    public function display()
    {
        $session = session();
        $userId = $session->get('user_id');

        // Fetch user permissions for Purchase Orders
        $db = \Config\Database::connect();
        $permissions = $db->table('user_permissions')
            ->select('action')
            ->where('user_id', $userId)
            ->where('table_name', 'purchase_orders')
            ->get()
            ->getResultArray();

        // Extract actions the user is allowed to perform
        $allowedActions = array_column($permissions, 'action');

        // Fetch purchase orders
        $data['purchase_orders'] = $this->purchaseOrderModel->where('is_deleted', 0)->findAll();

        // Pass permissions to the view
        $data['allowedActions'] = $allowedActions;

        return view('po_list_view', $data);
    }


    public function index()
    {
        // Load Product, Warehouse, and Supplier models
        $productModel = new Products_model();
        $warehouseModel = new WarehouseModel();
        $supplierModel = new SupplierModel();

        // Fetch all products, warehouses, and suppliers
        $products = $productModel->findAll();
        $warehouses = $warehouseModel->findAll();
        $suppliers = $supplierModel->findAll();

        // Pass data to the view
        return view('po_form_view', [
            'products' => $products,
            'warehouses' => $warehouses,
            'suppliers' => $suppliers
        ]);
    }


    public function save()
    {
        $session = session();
        $userId = $session->get('user_id'); // Get the logged-in user ID

        // Google Cloud Storage Setup
        $storage = new \Google\Cloud\Storage\StorageClient([
            'keyFilePath' => WRITEPATH . 'public/mkvgsc.json',
            'projectId' => 'peak-tide-441609-r1',
        ]);
        $bucketName = 'mkv_imagesbackend';
        $bucket = $storage->bucket($bucketName);

        // Handle file upload to Google Cloud
        $filePath = null;
        $file = $this->request->getFile('attachments');

        if ($file && $file->isValid() && !$file->hasMoved()) {
            try {
                $fileName = 'attachments/' . uniqid() . '_' . $file->getClientName();
                $bucket->upload(
                    fopen($file->getTempName(), 'r'),
                    [
                        'name' => $fileName,
                        'predefinedAcl' => 'publicRead',
                    ]
                );
                $filePath = sprintf('https://storage.googleapis.com/%s/%s', $bucket->name(), $fileName);
            } catch (\Exception $e) {
                return redirect()->back()->withInput()->with('error', 'File upload failed: ' . $e->getMessage());
            }
        }

        // Retrieve the product name if only the product ID is provided
        $productId = $this->request->getPost('product_id');
        $productName = $this->request->getPost('product_name');

        if ($productId && !$productName) {
            $productModel = new Products_model();
            $product = $productModel->find($productId);
            $productName = $product ? $product['product_name'] : null;
        }

        // Prepare data for database
        $data = [
            'po_number' => $this->request->getPost('po_number'),
            'order_date' => $this->request->getPost('order_date'),
            'supplier_name' => $this->request->getPost('supplier_name'),
            'supplier_contact_person' => $this->request->getPost('supplier_contact_person'),
            'supplier_email' => $this->request->getPost('supplier_email'),
            'supplier_phone' => $this->request->getPost('supplier_phone'),
            'supplier_address' => $this->request->getPost('supplier_address'),
            'product_name' => $productName,
            'product_sku' => $this->request->getPost('product_sku'),
            'quantity' => $this->request->getPost('quantity'),
            'unit_price' => $this->request->getPost('unit_price'),
            'total_price' => $this->request->getPost('total_price'),
            'warehouse_name' => $this->request->getPost('warehouse_name'),
            'warehouse_location' => $this->request->getPost('warehouse_location'),
            'expected_delivery_date' => $this->request->getPost('expected_delivery_date'),
            'shipping_address' => $this->request->getPost('shipping_address'),
            'shipping_method' => $this->request->getPost('shipping_method'),
            'shipping_cost' => $this->request->getPost('shipping_cost'),
            'payment_terms' => $this->request->getPost('payment_terms'),
            'order_status' => $this->request->getPost('order_status'),
            'approved_by' => $this->request->getPost('approved_by'),
            'approval_date' => $this->request->getPost('approval_date'),
            'remarks' => $this->request->getPost('remarks'),
            'attachments' => $filePath,
            'tax' => $this->request->getPost('tax'),
            'discount' => $this->request->getPost('discount'),
            'added_by' => $userId, // Track who added the Purchase Order
            'added_at' => date('Y-m-d H:i:s') // Store the timestamp
        ];

        // Save the data to the database
        $purchaseOrderModel = new PurchaseOrderModel();
        if (!$purchaseOrderModel->insert($data)) {
            return redirect()->back()->withInput()->with('error', 'Failed to save the purchase order.');
        }

        return redirect()->to('po_list_view')->with('success', 'Purchase Order added successfully.');
    }



    public function edit($id)
    {
        $session = session();
        $userId = $session->get('user_id');
        $purchaseOrderModel = new PurchaseOrderModel();
        $productModel = new Products_model();
        $warehouseModel = new WarehouseModel();
        $supplierModel = new SupplierModel();

        // Fetch the purchase order by ID
        $purchaseOrder = $purchaseOrderModel->find($id);

        if (!$purchaseOrder) {
            return redirect()->to('purchase_orders')->with('error', 'Purchase Order not found.');
        }

        // Fetch user permissions for Purchase Orders
        $db = \Config\Database::connect();
        $permissions = $db->table('user_permissions')
            ->select('column_name')
            ->where('user_id', $userId)
            ->where('table_name', 'purchase_orders')
            ->where('action', 'edit')
            ->get()
            ->getResultArray();

        // Extract the allowed columns the user can edit
        $allowedFields = array_column($permissions, 'column_name');

        // Fetch related data for dropdowns
        $products = $productModel->findAll();
        $warehouses = $warehouseModel->findAll();
        $suppliers = $supplierModel->findAll();

        // Pass data to the view
        return view('po_edit_view', [
            'purchaseOrder' => $purchaseOrder,
            'products' => $products,
            'warehouses' => $warehouses,
            'suppliers' => $suppliers,
            'allowedFields' => $allowedFields
        ]);
    }

    public function update($id)
    {
        $session = session();

        $purchaseOrderModel = new PurchaseOrderModel();

        // Get existing data
        $existingOrder = $purchaseOrderModel->find($id);
        if (!$existingOrder) {
            return redirect()->to('/purchase-order/index')->with('error', 'Purchase order not found.');
        }

        // Google Cloud Storage Setup
        $storage = new \Google\Cloud\Storage\StorageClient([
            'keyFilePath' => WRITEPATH . 'public/mkvgsc.json',
            'projectId' => 'peak-tide-441609-r1',
        ]);
        $bucketName = 'mkv_imagesbackend';
        $bucket = $storage->bucket($bucketName);

        // Handle file upload for attachments
        $filePath = $existingOrder['attachments']; // Default to existing file
        $file = $this->request->getFile('attachments');

        if ($file && $file->isValid() && !$file->hasMoved()) {
            try {
                $fileName = 'attachments/' . uniqid() . '_' . $file->getClientName();
                $bucket->upload(
                    fopen($file->getTempName(), 'r'),
                    [
                        'name' => $fileName,
                        'predefinedAcl' => 'publicRead',
                    ]
                );
                $filePath = sprintf('https://storage.googleapis.com/%s/%s', $bucket->name(), $fileName);
            } catch (\Exception $e) {
                return redirect()->back()->withInput()->with('error', 'File upload failed: ' . $e->getMessage());
            }
        }

        // Prepare updated data
        $newData = [
            'po_number' => $this->request->getPost('po_number'),
            'order_date' => $this->request->getPost('order_date'),
            'supplier_name' => $this->request->getPost('supplier_name'),
            'expected_delivery_date' => $this->request->getPost('expected_delivery_date'),
            'payment_terms' => $this->request->getPost('payment_terms'),
            'order_status' => $this->request->getPost('order_status'),
            'approved_by' => $this->request->getPost('approved_by'),
            'approval_date' => $this->request->getPost('approval_date'),
            'product_name' => $this->request->getPost('product_name'),
            'quantity' => $this->request->getPost('quantity'),
            'unit_price' => $this->request->getPost('unit_price'),
            'total_price' => $this->request->getPost('quantity') * $this->request->getPost('unit_price'),
            'warehouse_name' => $this->request->getPost('warehouse_name'),
            'shipping_address' => $this->request->getPost('shipping_address'),
            'shipping_method' => $this->request->getPost('shipping_method'),
            'shipping_cost' => $this->request->getPost('shipping_cost'),
            'remarks' => $this->request->getPost('remarks'),
            'tax' => $this->request->getPost('tax'),
            'discount' => $this->request->getPost('discount'),
            'attachments' => $filePath, // Keep previous file if no new file is uploaded
            'updated_by' => $session->get('admin_name') . '(' . $session->get('user_id') . ')',
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        // ✅ Track changes
        $changes = [];
        foreach ($newData as $key => $value) {
            if ($existingOrder[$key] != $value) {
                $changes[$key] = [
                    'old' => $existingOrder[$key],
                    'new' => $value
                ];
            }
        }

        if (!empty($changes)) {
            // Retrieve existing change log
            $existingChangeLog = json_decode($existingOrder['change_log'] ?? '[]', true);
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
        }

        // Log data before update
        log_message('info', 'Updating Purchase Order: ' . json_encode($newData));

        // Update the purchase order
        if (!$purchaseOrderModel->update($id, $newData)) {
            log_message('error', 'Database update failed: ' . json_encode($purchaseOrderModel->errors()));
            return redirect()->back()->withInput()->with('error', 'Failed to update the purchase order.');
        }

        log_message('info', 'Purchase Order updated successfully: ID = ' . $id);
        return redirect()->to('po_list_view')->with('success', 'Purchase order updated successfully.');
    }


    public function exportpo()
    {
        // Load the Purchase Order Model
        $purchaseOrderModel = new PurchaseOrderModel();

        // Retrieve data from the model
        $data = $purchaseOrderModel->getpoData();

        // Check if data is available
        if (empty($data)) {
            return redirect()->back()->with('error', 'No data available for export.');
        }

        // Set CSV headers
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="PurchaseOrders.csv"');
        header('Pragma: no-cache');
        header('Expires: 0');

        // Open PHP output stream as file
        $output = fopen('php://output', 'w');

        // Write column headers dynamically
        fputcsv($output, array_keys($data[0]));

        // Write data rows
        foreach ($data as $row) {
            fputcsv($output, $row);
        }

        fclose($output);
        exit();
    }


    public function importCSV()
    {
        $purchaseOrderModel = new PurchaseOrderModel();

        if ($file = $this->request->getFile('csv_file')) {
            // ✅ Ensure the file is a valid CSV file
            if (!$file->isValid() || $file->getClientMimeType() !== 'text/csv') {
                return redirect()->back()->with('error', 'Invalid file format. Please upload a CSV file.');
            }

            // Get temporary file path
            $filePath = $file->getTempName();
            log_message('debug', 'CSV File Path: ' . $filePath);

            $csv = array_map('str_getcsv', file($filePath, FILE_SKIP_EMPTY_LINES | FILE_IGNORE_NEW_LINES));
            array_walk($csv, function (&$row) {
                $row = array_map('utf8_encode', $row);
            });

            log_message('debug', 'CSV Content: ' . json_encode($csv));

            // ✅ Check if CSV has a header row
            if (empty($csv) || count($csv) < 2) {
                return redirect()->back()->with('error', 'CSV file is empty or improperly formatted.');
            }

            // ✅ Extract and validate header row
            $header = array_shift($csv); // Remove and store header row

            // ✅ Define expected columns (from `protected $allowedFields`)
            $expectedColumns = [
                "po_number",
                "order_date",
                "supplier_name",
                "product_name",
                "quantity",
                "unit_price",
                "total_price",
                "warehouse_name",
                "expected_delivery_date",
                "shipping_address",
                "shipping_method",
                "shipping_cost",
                "payment_terms",
                "order_status",
                "approved_by",
                "approval_date",
                "remarks",
                "attachments",
                "tax",
                "discount"
            ];

            // ✅ Map CSV headers to database fields
            $headerMap = array_flip($header); // Convert headers into associative array

            // ✅ Check if required fields exist in CSV
            foreach ($expectedColumns as $col) {
                if (!isset($headerMap[$col])) {
                    log_message('error', "Missing required column in CSV: $col");
                    return redirect()->back()->with('error', "Missing required column: $col");
                }
            }

            // ✅ Process each row in the CSV
            foreach ($csv as $row) {
                // ✅ Skip empty rows
                if (empty($row) || count($row) < count($expectedColumns)) {
                    log_message('error', 'Invalid CSV row: ' . json_encode($row));
                    continue;
                }

                // ✅ Map CSV row to database fields using header map
                $data = [];
                foreach ($expectedColumns as $col) {
                    $index = $headerMap[$col];
                    $data[$col] = isset($row[$index]) ? trim($row[$index]) : null;
                }

                // ✅ Convert dates into correct format
                if (!empty($data['order_date'])) {
                    $data['order_date'] = date('Y-m-d', strtotime($data['order_date']));
                }
                if (!empty($data['expected_delivery_date'])) {
                    $data['expected_delivery_date'] = date('Y-m-d', strtotime($data['expected_delivery_date']));
                }
                if (!empty($data['approval_date'])) {
                    $data['approval_date'] = date('Y-m-d', strtotime($data['approval_date']));
                }

                // ✅ Validate required fields before inserting
                if (
                    empty($data['po_number']) || empty($data['order_date']) || empty($data['supplier_name']) ||
                    empty($data['product_name']) || empty($data['quantity']) || empty($data['unit_price']) ||
                    empty($data['total_price']) || empty($data['warehouse_name']) || empty($data['shipping_address']) ||
                    empty($data['shipping_method']) || empty($data['shipping_cost']) || empty($data['payment_terms']) ||
                    empty($data['order_status']) || empty($data['approved_by']) || empty($data['tax'])
                ) {
                    log_message('error', 'Missing required fields in row: ' . json_encode($row));
                    continue; // Skip this row
                }

                // ✅ Insert into the database
                $result = $purchaseOrderModel->insert($data);
                if (!$result) {
                    log_message('error', 'Database Insert Error: ' . json_encode($purchaseOrderModel->errors()));
                }
            }

            return redirect()->back()->with('success', 'Purchase Orders imported successfully.');
        }

        return redirect()->back()->with('error', 'Error importing the file.');
    }

    public function delete($id)
    {
        $session = session();
        $userId = $session->get('user_id'); // Get logged-in user ID
        $purchaseOrderModel = new PurchaseOrderModel();

        // Fetch the purchase order details
        $order = $purchaseOrderModel->find($id);
        if (!$order) {
            return redirect()->to('/purchase-order/index')->with('error', 'Purchase order not found.');
        }

        // Save the admin name and ID
        $deletedBy = $session->get('admin_name') . ' (' . $userId . ')';

        // Google Cloud Storage Setup
        $storage = new \Google\Cloud\Storage\StorageClient([
            'keyFilePath' => WRITEPATH . 'public/mkvgsc.json',
            'projectId' => 'peak-tide-441609-r1',
        ]);
        $bucketName = 'mkv_imagesbackend';
        $bucket = $storage->bucket($bucketName);

        // Delete the attachment from Google Cloud Storage if it exists
        if (!empty($order['attachments'])) {
            try {
                // Extract file name from the URL
                $filePath = parse_url($order['attachments'], PHP_URL_PATH);
                $fileName = ltrim(str_replace("/{$bucketName}/", '', $filePath), '/');

                // Check if the file exists in the bucket before deleting
                $object = $bucket->object($fileName);
                if ($object->exists()) {
                    $object->delete();
                }
            } catch (\Exception $e) {
                log_message('error', 'Failed to delete attachment from Google Cloud: ' . $e->getMessage());
            }
        }

        // Perform soft deletion by updating fields instead of deleting
        $purchaseOrderModel->update($id, [
            'is_deleted' => 1, // Mark as deleted
            'deleted_by' => $deletedBy, // Track who deleted
            'deleted_at' => date('Y-m-d H:i:s'), // Record timestamp
        ]);

        return redirect()->to('po_list_view')->with('success', 'Purchase order deleted successfully.');
    }

    public function deleted()
    {
        $purchaseOrderModel = new PurchaseOrderModel();
        $data['purchaseOrders'] = $purchaseOrderModel->where('is_deleted', 1)->findAll();

        return view('purchaseorder_deleted', $data); // Load deleted purchase orders view
    }

    public function restore($id)
    {
        $purchaseOrderModel = new PurchaseOrderModel();

        // Fetch the deleted purchase order
        $order = $purchaseOrderModel->find($id);
        if (!$order) {
            return redirect()->to('purchase-order/deleted')->with('error', 'Purchase order not found.');
        }

        // Restore the purchase order by clearing deletion fields
        $purchaseOrderModel->update($id, [
            'is_deleted' => 0,
            'deleted_by' => null,
            'deleted_at' => null,
        ]);

        return redirect()->to('po_list_view')->with('success', 'Purchase order restored successfully.');
    }

    public function order_change_logs($id = null)
    {
        $db = \Config\Database::connect();

        if ($id === null) {
            return view('edit_purchase_order_logs_view', ['updates' => []]); // No purchase order ID provided
        }

        // Fetch purchase order details
        $query = $db->table('purchase_orders')->select('change_log')->where('id', $id)->get();
        $row = $query->getRow();

        if ($row) {
            $decodedData = json_decode($row->change_log, true);

            if (!is_array($decodedData)) {
                return view('edit_purchase_order_logs_view', ['updates' => []]); // Return empty if decoding fails
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

            return view('edit_purchase_order_logs_view', ['updates' => $updates]);
        }

        return view('edit_purchase_order_logs_view', ['updates' => []]); // No logs found
    }

    public function getOrderChangeLogs()
    {
        $db = \Config\Database::connect();
        $query = $db->table('purchase_orders')->select('change_log')->get();
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
