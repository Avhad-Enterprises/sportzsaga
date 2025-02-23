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
                'width' => $product['width'] ?? '',
                'height' => $product['height'] ?? '',
                'breadth' => $product['breadth'] ?? '',
                'outer_barcode' => $product['outer_barcode'] ?? '',
            ]);
        }

        return $this->response->setJSON(['error' => 'Product not found']);
    }



    public function store()
    {
        $inventoryModel = new InventoryModel();

        // Collecting data from the form
        $productId = $this->request->getPost('product_id');
        $warehouseIds = $this->request->getPost('warehouse_ids');
        $inventoryCounts = $this->request->getPost('inventory_counts');
        $storageLocations = $this->request->getPost('storage_locations');
        $sku = $this->request->getPost('sku');
        $innerBarcode = $this->request->getPost('inner_barcode');
        $outerBarcode = $this->request->getPost('outer_barcode');
        $length = $this->request->getPost('length');
        $width = $this->request->getPost('width');
        $height = $this->request->getPost('height');
        $breadth = $this->request->getPost('breadth');
        $category = $this->request->getPost('category');
        $brandName = $this->request->getPost('brand_name');
        $supplier = $this->request->getPost('supplier');
        $supplierItemCode = $this->request->getPost('supplier_item_code');
        $baseUnit = $this->request->getPost('base_unit');
        $layer = $this->request->getPost('layer');
        $pallet = $this->request->getPost('pallet');
        $manufacturer = $this->request->getPost('manufacturer');
        $manufacturerLocation = $this->request->getPost('manufacturer_location');
        $stockQuantity = $this->request->getPost('stock_quantity');
        $reorderLevel = $this->request->getPost('reorder_level');
        $safetyStock = $this->request->getPost('safety_stock');
        $singleUnitPrice = $this->request->getPost('single_unit_price');
        $casePrice = $this->request->getPost('case_price');
        $compareAtPrice = $this->request->getPost('compare_at_price');
        $batchNumber = $this->request->getPost('batch_number');
        $lotNumber = $this->request->getPost('lot_number');
        $manufacturingDate = $this->request->getPost('manufacturing_date');
        $expirationDate = $this->request->getPost('expiration_date');
        $vatGst = $this->request->getPost('vat_gst');
        $stateGst = $this->request->getPost('state_gst');
        $customDuty = $this->request->getPost('custom_duty');
        $origin = $this->request->getPost('origin');
        $customLabels = $this->request->getPost('custom_labels');
        $fifoLifo = $this->request->getPost('fifo_lifo');
        $stockRotation = $this->request->getPost('stock_rotation');

        // Validation check
        if (!$productId || empty($warehouseIds) || empty($inventoryCounts)) {
            return redirect()->back()->with('error', 'Please fill out all required fields.');
        }

        // Loop through warehouses and save data for each
        foreach ($warehouseIds as $index => $warehouseId) {
            $data = [
                'product_id' => $productId,
                'warehouse_id' => $warehouseId,
                'inventory_count' => $inventoryCounts[$index],
                'storage_location' => $storageLocations[$index] ?? null,
                'sku' => $sku,
                'inner_barcode' => $innerBarcode,
                'outer_barcode' => $outerBarcode,
                'length' => $length,
                'width' => $width,
                'height' => $height,
                'breadth' => $breadth,
                'category' => $category,
                'brand_name' => $brandName,
                'supplier' => $supplier,
                'supplier_item_code' => $supplierItemCode,
                'base_unit' => $baseUnit,
                'layer' => $layer,
                'pallet' => $pallet,
                'manufacturer' => $manufacturer,
                'manufacturer_location' => $manufacturerLocation,
                'stock_quantity' => $stockQuantity,
                'reorder_level' => $reorderLevel,
                'safety_stock' => $safetyStock,
                'single_unit_price' => $singleUnitPrice,
                'case_price' => $casePrice,
                'compare_at_price' => $compareAtPrice,
                'batch_number' => $batchNumber,
                'lot_number' => $lotNumber,
                'manufacturing_date' => $manufacturingDate,
                'expiration_date' => $expirationDate,
                'vat_gst' => $vatGst,
                'state_gst' => $stateGst,
                'custom_duty' => $customDuty,
                'origin' => $origin,
                'custom_labels' => $customLabels,
                'fifo_lifo' => $fifoLifo,
                'stock_rotation' => $stockRotation,
            ];

            $inventoryModel->insert($data);
        }

        return redirect()->to('inventory_list_view')->with('success', 'Inventory saved successfully.');
    }


    public function inventoryList()
    {
        $db = \Config\Database::connect();
        $session = session();
        $userId = $session->get('user_id');

        // Check user permissions for delete, import, and export actions
        $permissions = $db->table('user_permissions')
            ->select('action')
            ->where('user_id', $userId)
            ->where('table_name', 'inventory')
            ->get()
            ->getResultArray();

        $userPermissions = array_column($permissions, 'action');

        // Fetch inventory data
        $query = $db->table('inventory i')
            ->select('i.id, p.product_id, p.product_title, i.sku, i.stock_quantity, i.category, i.supplier, w.name as warehouse_name, w.location as warehouse_location')
            ->join('products p', 'p.product_id = i.product_id', 'inner')
            ->join('warehouses w', 'w.id = i.warehouse_id', 'inner')
            ->get();

        $data['inventoryData'] = $query->getResultArray();
        $data['canDelete'] = in_array('delete', $userPermissions);
        $data['canImport'] = in_array('import', $userPermissions);
        $data['canExport'] = in_array('export', $userPermissions);

        return view('inventory_list_view', $data);
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
        $db = db_connect();
        $session = session();
        $userId = $session->get('user_id');

        // Fetch the inventory data by ID
        $inventory = $inventoryModel->find($id);

        if (!$inventory) {
            return redirect()->to(base_url('inventory'))->with('error', 'Inventory record not found.');
        }

        // Fetch user permissions for inventory fields
        $permissions = $db->table('user_permissions')
            ->select('column_name')
            ->where('user_id', $userId)
            ->where('table_name', 'inventory')
            ->where('action', 'edit')
            ->get()
            ->getResultArray();

        $allowedFields = array_column($permissions, 'column_name');

        // Fetch products and warehouses for dropdowns
        $products = $productModel->findAll();
        $warehouses = $warehouseModel->findAll();

        // Pass data to the edit view
        $data = [
            'inventory' => $inventory,
            'products' => $products,
            'warehouses' => $warehouses,
            'allowedFields' => array_flip($allowedFields), // Use array_flip for quick checks in the view
        ];

        return view('inventory_edit_view', $data);
    }


    public function update($id)
    {
        $inventoryModel = new InventoryModel();

        // Collect form data
        $data = [
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
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        // Update the record
        $updated = $inventoryModel->update($id, $data);

        if ($updated) {
            return redirect()->to(base_url('inventory_list_view'))->with('success', 'Inventory updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to update inventory.');
        }
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
        $transferModel = new InventoryModel();

        $transferModel->delete($id);

        return redirect()->to('inventory_list_view')->with('success', 'Inventory record deleted successfully!');
    }
}
