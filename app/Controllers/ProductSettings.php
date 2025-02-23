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
        $title = $this->request->getPost('title');
        $Description = $this->request->getPost('Description');
        $selectedProducts = $this->request->getPost('products');  // Array of selected product IDs
        $productIdsCsv = implode(',', $selectedProducts);  // Convert array to CSV format
        $selectedBundle = $this->request->getPost('bundles');
        $selectedBundle = implode(',', $selectedBundle);

        $data = [
            'title' => $title,
            'product_id' => $productIdsCsv,
            'Description' => $Description,
            'bundle_id' => $selectedBundle,
            'added_by' => 1,  // Example: Replace with logged-in user ID
        ];

        // Update existing settings
        $productSettingModel->update(1, $data);
        $message = 'Settings updated successfully!';

        return redirect()->to('/product-settings')->with('success', $message);
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
