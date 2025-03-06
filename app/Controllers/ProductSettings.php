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
        $selectedProducts = $this->request->getPost('products') ?: []; // Array of selected product IDs, default to empty array
        $selectedBundles = $this->request->getPost('bundles') ?: []; // Array of selected bundle IDs, default to empty array

        // Convert arrays to comma-separated strings
        $productIdsCsv = implode(',', $selectedProducts);
        $bundleIdsCsv = implode(',', $selectedBundles);

        // Prepare data for update
        $data = [
            'title' => $title,
            'Description' => $description,
            'product_id' => $productIdsCsv,
            'bundle_id' => $bundleIdsCsv,
            'added_by' => 1, // Replace with logged-in user ID if available (e.g., session()->get('user_id'))
        ];

        // Update or Insert logic (assuming ID 1 exists; adjust as needed)
        $existingRecord = $productSettingModel->find(1); // Check if record with ID 1 exists
        if ($existingRecord) {
            $updateStatus = $productSettingModel->update(1, $data);
        } else {
            $updateStatus = $productSettingModel->insert($data); // Insert if no record exists
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
