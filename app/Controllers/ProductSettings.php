<?php

namespace App\Controllers;

use App\Models\ProductSettingModel;
use App\Models\BundleModel;

class ProductSettings extends BaseController
{
    public function index()
    {
        $productSettingModel = new ProductSettingModel();
        $bundleModel = new BundleModel();

        // Fetch the product setting for ID = 1
        $productSettings = $productSettingModel->find(1); // Fetch the single record with ID = 1

        // Fetch product and bundle data (assuming you already have these models set up)
        $products = $this->getProducts(); // Replace with your product fetch logic
        $bundles = $bundleModel->findAll(); // Fetch all bundles


        return view('product_settings', [
            'productSettings' => $productSettings,
            'products' => $products,
            'bundles' => $bundles,
        ]);
    }

    public function save()
{
    $productSettingModel = new ProductSettingModel();

    // Get form data
    $title = $this->request->getPost('productpagetitle');
    $description = $this->request->getPost('Description');
    $selectedProducts = $this->request->getPost('products') ?: []; // Array of selected product IDs
    $selectedBundles = $this->request->getPost('bundles') ?: []; // Array of selected bundle IDs

    // Convert arrays to comma-separated strings
    $productIdsCsv = implode(',', $selectedProducts);
    $bundleIdsCsv = implode(',', $selectedBundles);

    // Prepare data for update
    $data = [
        'title' => $title,
        'Description' => $description,
        'product_id' => $productIdsCsv,
        'bundle_id' => $bundleIdsCsv,
        'added_by' => 1, // Replace with logged-in user ID if available
    ];

    // Check if record with ID = 1 exists
    $existingRecord = $productSettingModel->find(1);

    if ($existingRecord) {
        // Prepare change log
        $oldData = [
            'title' => $existingRecord['title'],
            'Description' => $existingRecord['Description'],
            'product_id' => $existingRecord['product_id'],
            'bundle_id' => $existingRecord['bundle_id'],
            'added_by' => $existingRecord['added_by'],
        ];

        // Fetch and decode existing change log
        $existingChangeLog = !empty($existingRecord['change_log']) ? json_decode($existingRecord['change_log'], true) : [];
        if (!is_array($existingChangeLog)) {
            $existingChangeLog = [];
        }

        // Append new change entry
        $newChange = [
            'old' => $oldData,
            'new' => $data,
            'timestamp' => date('Y-m-d H:i:s'),
        ];

        $existingChangeLog[] = $newChange; // Append to change log
        $data['change_log'] = json_encode($existingChangeLog);

        // Update existing record
        $updateStatus = $productSettingModel->update(1, $data);
    } else {
        // First-time insert with ID = 1
        $data['id'] = 1;
        $data['change_log'] = json_encode([
            [
                'old' => null,
                'new' => $data,
                'timestamp' => date('Y-m-d H:i:s'),
            ]
        ]);

        $updateStatus = $productSettingModel->insert($data);
    }

    // Prepare JSON response
    if ($updateStatus !== false) {
        return $this->response->setJSON([
            'success' => true,
            'message' => 'Settings saved successfully!'
        ]);
    } else {
        return $this->response->setJSON([
            'success' => false,
            'message' => 'Failed to save settings. Please try again.'
        ]);
    }
}


    private function getProducts()
    {
        // Replace this method with your product fetch logic
        return [
            ['product_id' => 1, 'product_title' => 'Product 1'],
            ['product_id' => 2, 'product_title' => 'Product 2'],
            ['product_id' => 3, 'product_title' => 'Product 3'],
        ];
    }
}
