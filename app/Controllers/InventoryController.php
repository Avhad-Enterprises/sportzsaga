<?php

namespace App\Controllers;

use App\Models\InventoryModel;
use App\Models\Products_model;
use App\Models\WarehouseModel;
use App\Models\PermissionsModel;

class InventoryController extends BaseController
{
    protected $permissionsModel;

    public function __construct()
    {
        $this->permissionsModel = new PermissionsModel();
    }

    public function create()
    {
        $productModel = new Products_model();
        $warehouseModel = new WarehouseModel();

        // Fetch all products and warehouses
        $products = $productModel->findAll();
        $warehouses = $warehouseModel->findAll();

        // Prepare data for the view
        $data = [
            'products' => $products,
            'warehouses' => $warehouses,
        ];

        return view('inventory_form_view', $data);
    }

    public function productDetails($productId)
    {
        $productModel = new Products_model();

        // Fetch product details
        $product = $productModel->find($productId);

        if ($product) {
            return $this->response->setJSON([
                'sku' => $product['sku'] ?? '',
                'inner_barcode' => $product['barcode'] ?? '',
                'length' => $product['length'] ?? '',
                'height' => $product['height'] ?? '',
                'breadth' => $product['breadth'] ?? '',
            ]);
        }

        return $this->response->setJSON(['error' => 'Product not found']);
    }

    public function store()
    {
        $inventoryModel = new InventoryModel();
        $session = session();

        $userId = $session->get('user_id');
        $adminName = $session->get('admin_name');
        $addedBy = "{$adminName} ({$userId})";

        $productId = $this->request->getPost('product_id');
        $warehouseIds = $this->request->getPost('warehouse_ids');
        $inventoryCounts = $this->request->getPost('inventory_counts');
        $stockReductionRule = $this->request->getPost('stock_reduction_rule');
        $stockThreshold = $this->request->getPost('stock_threshold');
        $stockPriorities = $this->request->getPost('stock_priorities') ?? [];
        $fallbackWarehouseId = $this->request->getPost('fallback_warehouse_id');

        if (!$productId || empty($warehouseIds) || empty($inventoryCounts)) {
            return redirect()->back()->with('error', 'Please fill out all required fields.');
        }

        // Validate fallback warehouse for proximity/hybrid rules
        if (in_array($stockReductionRule, ['proximity', 'hybrid']) && empty($fallbackWarehouseId)) {
            return redirect()->back()->with('error', 'Please select a fallback warehouse for Proximity or Hybrid rules.');
        }

        // Common data for all warehouses
        $commonData = array_filter([
            'product_id' => $productId,
            'sku' => $this->request->getPost('sku'),
            'inner_barcode' => $this->request->getPost('inner_barcode'),
            'outer_barcode' => $this->request->getPost('outer_barcode'),
            'length' => $this->request->getPost('length'),
            'width' => $this->request->getPost('width'),
            'height' => $this->request->getPost('height'),
            'breadth' => $this->request->getPost('breadth'),
            'category' => $this->request->getPost('category'),
            'brand_name' => $this->request->getPost('brand_name'),
            'supplier' => $this->request->getPost('supplier'),
            'supplier_item_code' => $this->request->getPost('supplier_item_code'),
            'base_unit' => $this->request->getPost('base_unit'),
            'layer' => $this->request->getPost('layer'),
            'pallet' => $this->request->getPost('pallet'),
            'manufacturer' => $this->request->getPost('manufacturer'),
            'manufacturer_location' => $this->request->getPost('manufacturer_location'),
            'stock_quantity' => $this->request->getPost('stock_quantity'),
            'reorder_level' => $this->request->getPost('reorder_level'),
            'safety_stock' => $this->request->getPost('safety_stock'),
            'single_unit_price' => $this->request->getPost('single_unit_price'),
            'case_price' => $this->request->getPost('case_price'),
            'compare_at_price' => $this->request->getPost('compare_at_price'),
            'batch_number' => $this->request->getPost('batch_number'),
            'lot_number' => $this->request->getPost('lot_number'),
            'manufacturing_date' => $this->request->getPost('manufacturing_date'),
            'expiration_date' => $this->request->getPost('expiration_date'),
            'vat_gst' => $this->request->getPost('vat_gst'),
            'state_gst' => $this->request->getPost('state_gst'),
            'custom_duty' => $this->request->getPost('custom_duty'),
            'origin' => $this->request->getPost('origin'),
            'custom_labels' => $this->request->getPost('custom_labels'),
            'fifo_lifo' => $this->request->getPost('fifo_lifo'),
            'stock_rotation' => $this->request->getPost('stock_rotation'),
            'stock_reduction_rule' => $stockReductionRule,
            'stock_threshold' => $stockReductionRule === 'hybrid' ? (int) $stockThreshold : null,
            'fallback_warehouse_id' => in_array($stockReductionRule, ['proximity', 'hybrid']) ? (int) $fallbackWarehouseId : null,
            'added_by' => $addedBy,
            'created_at' => date('Y-m-d H:i:s'),
        ], fn($value) => $value !== null && $value !== '');

        $storageLocations = $this->request->getPost('storage_locations') ?? [];
        foreach ($warehouseIds as $index => $warehouseId) {
            $data = array_merge($commonData, [
                'warehouse_id' => $warehouseId,
                'inventory_count' => (int) $inventoryCounts[$index],
                'storage_location' => $storageLocations[$index] ?? null,
                'priority' => !empty($stockPriorities[$index]) ? (int) $stockPriorities[$index] : null,
            ]);

            $existingInventory = $inventoryModel->where('product_id', $productId)
                ->where('warehouse_id', $warehouseId)
                ->first();

            if ($existingInventory) {
                $data['stock_quantity'] = $existingInventory['stock_quantity'] + $data['inventory_count'];
                $inventoryModel->update($existingInventory['id'], $data);
            } else {
                $data['stock_quantity'] = $data['inventory_count'];
                $inventoryModel->insert($data);
            }
        }

        return redirect()->to('inventory_list_view')->with('success', 'Inventory saved successfully.');
    }

    public function inventoryList()
    {
        $productModel = new Products_model();
        $warehouseModel = new WarehouseModel();
        $inventoryModel = new InventoryModel();

        $products = $productModel->findAll();
        $inventoryData = [];

        $stocks = $inventoryModel->GetAllStockData();

        foreach ($products as $product) {
            $warehouses = $warehouseModel->findAll();
            $productWarehouses = [];

            foreach ($warehouses as $warehouse) {
                // Fetch stock for this product in this warehouse
                $stockRow = $inventoryModel
                    ->where('product_id', $product['product_id'])
                    ->where('warehouse_id', $warehouse['id'])
                    ->first();

                $productWarehouses[] = [
                    'id' => $warehouse['id'] ?? 0,
                    'warehouse_name' => $warehouse['name'],
                    'warehouse_location' => $warehouse['address'],
                    'stock_quantity' => $stockRow['stock_quantity'] ?? 0,
                ];
            }

            $inventoryData[] = [
                'product_id' => $product['product_id'],
                'product_title' => $product['product_title'],
                'warehouses' => $productWarehouses
            ];
        }

        // echo '<pre>';
        // print_r($inventoryData);
        // echo '</pre>';
        // die();

        return view('inventory_list_view', [
            'stocks' => $stocks,
            'inventoryData' => $inventoryData,
            'canDelete' => true
        ]);
    }

    public function bulk_update()
    {
        $this->response->setHeader('Content-Type', 'application/json');

        // Try getJSON first
        $json = $this->request->getJSON(true); // true to return as array
        $stocks = $json['stocks'] ?? null;

        // Fallback to raw input if getJSON fails
        if (empty($stocks)) {
            $rawInput = file_get_contents('php://input');
            $decoded = json_decode($rawInput, true);
            $stocks = $decoded['stocks'] ?? [];
        }

        if (empty($stocks)) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'No stock data provided. Raw input: ' . json_encode($rawInput)
            ]);
        }

        $inventoryModel = new InventoryModel();
        $successCount = 0;
        $errors = [];

        foreach ($stocks as $stock) {
            $productId = $stock['product_id'] ?? null;
            $warehouseId = $stock['warehouse_id'] ?? null;
            $stockQuantity = $stock['stock_quantity'] ?? null;

            // Validate input
            if (!is_numeric($productId) || !is_numeric($warehouseId) || !is_numeric($stockQuantity) || $stockQuantity < 0) {
                $errors[] = "Invalid data for product_id: $productId, warehouse_id: $warehouseId, stock_quantity: $stockQuantity";
                continue;
            }

            try {
                // Check if record exists
                $existing = $inventoryModel
                    ->where('product_id', $productId)
                    ->where('warehouse_id', $warehouseId)
                    ->first();

                if ($existing) {
                    // Update existing record
                    $inventoryModel->update($existing['id'], [
                        'stock_quantity' => (int)$stockQuantity // Cast to integer
                    ]);
                } else {
                    // Insert new record
                    $inventoryModel->insert([
                        'product_id' => (int)$productId,
                        'warehouse_id' => (int)$warehouseId,
                        'stock_quantity' => (int)$stockQuantity
                    ]);
                }
                $successCount++;
            } catch (\Exception $e) {
                $errors[] = "Error for product_id: $productId, warehouse_id: $warehouseId - " . $e->getMessage();
            }
        }

        if ($successCount > 0 && empty($errors)) {
            return $this->response->setJSON([
                'status' => 'success',
                'message' => "Successfully updated $successCount stock records."
            ]);
        } elseif ($successCount > 0) {
            return $this->response->setJSON([
                'status' => 'partial_success',
                'message' => "Updated $successCount records with " . count($errors) . " errors.",
                'errors' => $errors
            ]);
        } else {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'No records updated.',
                'errors' => $errors
            ]);
        }
    }

    public function exportCSV()
    {
        $inventoryModel = new InventoryModel();
        $data = $inventoryModel->findAll();

        header('Content-Type: text/csv');
        header('Content-Disposition: attachment;filename="inventory_full_export.csv"');

        $file = fopen('php://output', 'w');

        // CSV Headers (ALL FIELDS)
        fputcsv($file, [
            'ID',
            'Product ID',
            'Warehouse ID',
            'Inventory Count',
            'Storage Location',
            'SKU',
            'Inner Barcode',
            'Outer Barcode',
            'Length',
            'Width',
            'Height',
            'Breadth',
            'Category',
            'Brand Name',
            'Supplier',
            'Supplier Item Code',
            'Base Unit',
            'Layer',
            'Pallet',
            'Manufacturer',
            'Manufacturer Location',
            'Stock Quantity',
            'Reorder Level',
            'Safety Stock',
            'Single Unit Price',
            'Case Price',
            'Compare-at Price',
            'Batch Number',
            'Lot Number',
            'Manufacturing Date',
            'Expiration Date',
            'VAT/GST',
            'State GST',
            'Customs Duty',
            'Origin',
            'Custom Labels',
            'FIFO/LIFO',
            'Stock Rotation Policy',
            'Created At'
        ]);

        // Add data to CSV
        foreach ($data as $row) {
            fputcsv($file, [
                $row['id'],
                $row['product_id'],
                $row['warehouse_id'],
                $row['inventory_count'],
                $row['storage_location'],
                $row['sku'],
                $row['inner_barcode'],
                $row['outer_barcode'],
                $row['length'],
                $row['width'],
                $row['height'],
                $row['breadth'],
                $row['category'],
                $row['brand_name'],
                $row['supplier'],
                $row['supplier_item_code'],
                $row['base_unit'],
                $row['layer'],
                $row['pallet'],
                $row['manufacturer'],
                $row['manufacturer_location'],
                $row['stock_quantity'],
                $row['reorder_level'],
                $row['safety_stock'],
                $row['single_unit_price'],
                $row['case_price'],
                $row['compare_at_price'],
                $row['batch_number'],
                $row['lot_number'],
                $row['manufacturing_date'],
                $row['expiration_date'],
                $row['vat_gst'],
                $row['state_gst'],
                $row['custom_duty'],
                $row['origin'],
                $row['custom_labels'],
                $row['fifo_lifo'],
                $row['stock_rotation'],
                $row['created_at']
            ]);
        }

        fclose($file);
        exit;
    }

    public function importCSV()
    {
        $inventoryModel = new InventoryModel();

        if ($file = $this->request->getFile('csv_file')) {
            if ($file->isValid() && !$file->hasMoved()) {
                $filePath = $file->getTempName();
                $csv = array_map('str_getcsv', file($filePath));

                // Remove CSV Header Row
                array_shift($csv);

                // Import each row into database
                foreach ($csv as $row) {
                    $data = [
                        'product_id' => $row[1],
                        'warehouse_id' => $row[2],
                        'inventory_count' => $row[3],
                        'storage_location' => $row[4],
                        'sku' => $row[5],
                        'inner_barcode' => $row[6],
                        'outer_barcode' => $row[7],
                        'length' => $row[8],
                        'width' => $row[9],
                        'height' => $row[10],
                        'breadth' => $row[11],
                        'category' => $row[12],
                        'brand_name' => $row[13],
                        'supplier' => $row[14],
                        'supplier_item_code' => $row[15],
                        'base_unit' => $row[16],
                        'layer' => $row[17],
                        'pallet' => $row[18],
                        'manufacturer' => $row[19],
                        'manufacturer_location' => $row[20],
                        'stock_quantity' => $row[21],
                        'reorder_level' => $row[22],
                        'safety_stock' => $row[23],
                        'single_unit_price' => $row[24],
                        'case_price' => $row[25],
                        'compare_at_price' => $row[26],
                        'batch_number' => $row[27],
                        'lot_number' => $row[28],
                        'manufacturing_date' => $row[29],
                        'expiration_date' => $row[30],
                        'vat_gst' => $row[31],
                        'state_gst' => $row[32],
                        'custom_duty' => $row[33],
                        'origin' => $row[34],
                        'custom_labels' => $row[35],
                        'fifo_lifo' => $row[36],
                        'stock_rotation' => $row[37],
                        'created_at' => date('Y-m-d H:i:s'),
                    ];

                    $inventoryModel->insert($data);
                }

                return redirect()->back()->with('success', 'Inventory imported successfully.');
            }
        }

        return redirect()->back()->with('error', 'Error importing the file.');
    }

    public function edit($id)
    {
        $inventoryModel = new InventoryModel();
        $productModel = new Products_model();
        $warehouseModel = new WarehouseModel();
        $session = session();

        // Fetch the inventory data by ID
        $inventory = $inventoryModel->findStockDataId($id);

        // Check if inventory data exists
        if ($inventory) {
            $productId = $inventory[0]['product_id'];
            $products = $inventoryModel->GetProductdatabyid($productId);
        } else {
            echo "Inventory data not found.";
        }

        $warehouses = $warehouseModel->findAll();
        $inventoryData = [];

        // Fetch stock data for the product in each warehouse
        foreach ($warehouses as $warehouse) {
            // Fetch stock for this product in the warehouse
            $stockRow = $inventoryModel
                ->where('product_id', $productId)
                ->where('warehouse_id', $warehouse['id'])
                ->first();

            $inventoryData[] = [
                'warehouse_id' => $warehouse['id'],
                'warehouse_name' => $warehouse['name'],
                'warehouse_location' => $warehouse['address'],
                'warehouse_pincode' => $warehouse['pincode'],
                'stock_quantity' => $stockRow['stock_quantity'] ?? 0,
            ];
        }

        // Pass data to the edit view
        $data = [
            'inventory' => $inventory,
            'products' => $products,
            'warehouses' => $warehouses,
            'inventoryData' => $inventoryData
        ];

        return view('inventory_edit_view', $data);
    }


    public function update($id)
    {
        $inventoryModel = new InventoryModel();
        $session = session();

        $adminName = $session->get('admin_name'); // Get admin name

        // Fetch existing inventory data
        $inventory = $inventoryModel->find($id);

        if (!$inventory) {
            return redirect()->to('inventory_list_view')->with('error', 'Inventory record not found.');
        }

        // New data collected from form
        $newData = [
            'product_id' => $this->request->getPost('product_id'),
            'warehouse_id' => $this->request->getPost('warehouse_id'),
            'inventory_count' => $this->request->getPost('inventory_count'),
            'sku' => $this->request->getPost('sku'),
            'inner_barcode' => $this->request->getPost('inner_barcode'),
            'outer_barcode' => $this->request->getPost('outer_barcode'),
            'length' => $this->request->getPost('length'),
            'width' => $this->request->getPost('width'),
            'height' => $this->request->getPost('height'),
            'breadth' => $this->request->getPost('breadth'),
            'category' => $this->request->getPost('category'),
            'brand_name' => $this->request->getPost('brand_name'),
            'supplier' => $this->request->getPost('supplier'),
            'supplier_item_code' => $this->request->getPost('supplier_item_code'),
            'base_unit' => $this->request->getPost('base_unit'),
            'layer' => $this->request->getPost('layer'),
            'pallet' => $this->request->getPost('pallet'),
            'manufacturer' => $this->request->getPost('manufacturer'),
            'manufacturer_location' => $this->request->getPost('manufacturer_location'),
            'stock_quantity' => $this->request->getPost('stock_quantity'),
            'reorder_level' => $this->request->getPost('reorder_level'),
            'safety_stock' => $this->request->getPost('safety_stock'),
            'single_unit_price' => $this->request->getPost('single_unit_price'),
            'case_price' => $this->request->getPost('case_price'),
            'compare_at_price' => $this->request->getPost('compare_at_price'),
            'batch_number' => $this->request->getPost('batch_number'),
            'lot_number' => $this->request->getPost('lot_number'),
            'manufacturing_date' => $this->request->getPost('manufacturing_date'),
            'expiration_date' => $this->request->getPost('expiration_date'),
            'vat_gst' => $this->request->getPost('vat_gst'),
            'state_gst' => $this->request->getPost('state_gst'),
            'custom_duty' => $this->request->getPost('custom_duty'),
            'origin' => $this->request->getPost('origin'),
            'custom_labels' => $this->request->getPost('custom_labels'),
            'fifo_lifo' => $this->request->getPost('fifo_lifo'),
            'stock_rotation' => $this->request->getPost('stock_rotation'),
            'updated_by' => $session->get('admin_name') . '(' . $session->get('user_id') . ')',
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        // ✅ Track changes
        $changes = [];
        foreach ($newData as $key => $value) {
            if ($inventory[$key] != $value) {
                $changes[$key] = [
                    'old' => $inventory[$key],
                    'new' => $value
                ];
            }
        }

        if (!empty($changes)) {
            // Retrieve existing change log
            $existingChangeLog = json_decode($inventory['change_log'] ?? '[]', true);
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

            // ✅ Update the inventory data
            if ($inventoryModel->update($id, $newData)) {
                return redirect()->to('inventory_list_view')->with('success', 'Inventory updated successfully.');
            } else {
                return redirect()->back()->with('error', 'Failed to update inventory.');
            }
        }

        return redirect()->back()->with('info', 'No changes detected.');
    }


    public function fetchWarehouses()
    {
        $warehouseModel = new WarehouseModel();
        $warehouses = $warehouseModel->findAll();

        return $this->response->setJSON($warehouses);
    }
    public function storenewproduct()
    {
        $productModel = new Products_model();

        $data = [
            'product_title' => $this->request->getPost('product_title'),

        ];

        if ($productId = $productModel->insert($data)) {
            return $this->response->setJSON([
                'success' => true,
                'product' => [
                    'product_id' => $productId,
                    'product_title' => $data['product_title'],
                ],
            ]);
        } else {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Failed to add product.',
            ]);
        }
    }


    public function delete($id)
    {
        $session = session();
        $userId = $session->get('user_id'); // Get logged-in user ID
        $inventoryModel = new InventoryModel();

        // Fetch existing inventory record
        $inventory = $inventoryModel->find($id);
        if (!$inventory) {
            return redirect()->to('inventory_list_view')->with('error', 'Inventory record not found.');
        }

        // Save the admin name and ID
        $deletedBy = $session->get('admin_name') . ' (' . $userId . ')';

        // Perform soft deletion by updating fields
        $inventoryModel->update($id, [
            'is_deleted' => 1,
            'deleted_by' => $deletedBy,
            'deleted_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to('inventory_list_view')->with('success', 'Inventory record marked as deleted.');
    }

    public function restore($id)
    {
        $inventoryModel = new InventoryModel();

        // Fetch inventory record
        $inventory = $inventoryModel->find($id);
        if (!$inventory) {
            return redirect()->to('inventory/deleted')->with('error', 'Inventory record not found.');
        }

        // Restore the inventory record by clearing deletion fields
        $inventoryModel->update($id, [
            'is_deleted' => 0,
            'deleted_by' => null,
            'deleted_at' => null,
        ]);

        return redirect()->to('inventory_list_view')->with('success', 'Inventory record restored successfully.');
    }

    public function deletedInventory()
    {
        $inventoryModel = new InventoryModel();
        $data['inventory'] = $inventoryModel->where('is_deleted', 1)->findAll();

        return view('inventory_deleted', $data);
    }






    public function inventory_change_logs($id = null)
    {
        $db = \Config\Database::connect();

        if ($id === null) {
            return view('edit_inventory_logs_view', ['updates' => []]); // No inventory ID provided
        }

        // Fetch inventory details
        $query = $db->table('inventory')->select('change_log')->where('id', $id)->get();
        $row = $query->getRow();

        if ($row) {
            $decodedData = json_decode($row->change_log, true);

            if (!is_array($decodedData)) {
                return view('edit_inventory_logs_view', ['updates' => []]); // Return empty if decoding fails
            }

            $updates = [];

            foreach ($decodedData as $key => $log) {
                // Extract only numeric keys (0, 1, 2, ...)
                if (is_numeric($key) && isset($log['timestamp'])) {
                    $updates[] = [
                        'updated_by' => $log['updated_by'] ?? 'Unknown',
                        'updated_at' => $log['timestamp'],
                        'changes' => $log['changes'] ?? [],
                    ];
                }
            }

            return view('edit_inventory_logs_view', ['updates' => $updates]);
        }

        return view('edit_inventory_logs_view', ['updates' => []]); // No logs found
    }

    public function getInventoryChangeLogs()
    {
        $db = \Config\Database::connect();
        $query = $db->table('inventory')->select('change_log')->get();
        $row = $query->getRow();

        if ($row) {
            $decodedData = json_decode($row->change_log, true);

            if (!is_array($decodedData)) {
                return []; // Return empty array if decoding fails
            }

            $updates = [];

            // Extract only the indexed updates (0, 1, 2, ...)
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
