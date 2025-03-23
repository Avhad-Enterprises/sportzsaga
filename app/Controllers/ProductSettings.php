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
        $session = session();

        // Fetch user details from session
        $userId = $session->get('user_id');
        $userName = $session->get('admin_name') ?? $session->get('user_name'); // Try both session keys

        // Use dynamic user information
        $updatedBy = !empty($userName) ? "$userName ($userId)" : "User ID ($userId)";

        // Log session variables for debugging (remove in production)
        log_message('debug', 'User ID: ' . $userId);
        log_message('debug', 'User Name: ' . $userName);

        // Get form data
        $title = $this->request->getPost('productpagetitle');
        $description = $this->request->getPost('Description');
        $selectedProducts = $this->request->getPost('products') ?: [];
        $selectedBundles = $this->request->getPost('bundles') ?: [];

        $productIdsCsv = implode(',', $selectedProducts);
        $bundleIdsCsv = implode(',', $selectedBundles);

        // Check if record with ID = 1 exists
        $existingRecord = $productSettingModel->find(1);

        if ($existingRecord) {
            $changes = [];

            if ($existingRecord['title'] !== $title) {
                $changes['title'] = ['old' => $existingRecord['title'], 'new' => $title];
            }
            if ($existingRecord['Description'] !== $description) {
                $changes['Description'] = ['old' => $existingRecord['Description'], 'new' => $description];
            }
            if ($existingRecord['product_id'] !== $productIdsCsv) {
                $changes['product_id'] = ['old' => $existingRecord['product_id'], 'new' => $productIdsCsv];
            }
            if ($existingRecord['bundle_id'] !== $bundleIdsCsv) {
                $changes['bundle_id'] = ['old' => $existingRecord['bundle_id'], 'new' => $bundleIdsCsv];
            }

            if (!empty($changes)) {
                $existingChangeLog = !empty($existingRecord['change_log']) ? json_decode($existingRecord['change_log'], true) : [];
                if (!is_array($existingChangeLog)) {
                    $existingChangeLog = [];
                }

                $newChange = [
                    'updated_by' => $updatedBy,
                    'timestamp' => date('Y-m-d H:i:s'),
                    'changes' => $changes,
                ];

                $existingChangeLog[] = $newChange;

                $updateData = [
                    'title' => $title,
                    'Description' => $description,
                    'product_id' => $productIdsCsv,
                    'bundle_id' => $bundleIdsCsv,
                    'change_log' => json_encode($existingChangeLog),
                ];

                $productSettingModel->update(1, $updateData);

                return $this->response->setJSON([
                    'success' => true,
                    'message' => 'Settings updated successfully!',
                ]);
            } else {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'No changes detected.',
                ]);
            }
        } else {
            $insertData = [
                'id' => 1,
                'title' => $title,
                'Description' => $description,
                'product_id' => $productIdsCsv,
                'bundle_id' => $bundleIdsCsv,
                'change_log' => json_encode([
                    [
                        'updated_by' => $updatedBy,
                        'timestamp' => date('Y-m-d H:i:s'),
                        'changes' => [
                            'title' => ['old' => null, 'new' => $title],
                            'Description' => ['old' => null, 'new' => $description],
                            'product_id' => ['old' => null, 'new' => $productIdsCsv],
                            'bundle_id' => ['old' => null, 'new' => $bundleIdsCsv],
                        ],
                    ]
                ]),
            ];

            $productSettingModel->insert($insertData);

            return $this->response->setJSON([
                'success' => true,
                'message' => 'Settings saved successfully!',
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
