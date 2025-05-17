<?php

namespace App\Controllers;

use App\Models\WarehouseModel;
use App\Models\settingmodel;
use App\Models\FooterPagesModel;
use App\Models\SiteMetaModel;
use App\Models\SiteLogoModel;
use App\Models\RobotsTxtModel;
use App\Models\Registerusers_model;
use App\Models\Products_model;
use App\Models\PermissionsModel;

class WarehouseController extends BaseController
{

    protected $permissionsModel;

    public function __construct()
    {
        $this->permissionsModel = new PermissionsModel();
    }

    public function Createwarehouse()
    {
        return view('add_warehouse');
    }

    public function store()
    {
        $warehouseModel = new WarehouseModel();

        // Get input values from the form
        $name = $this->request->getPost('warehouse_name');
        $pincode = $this->request->getPost('pincode');
        $manager = $this->request->getPost('manager');
        $storage_capacity = $this->request->getPost('storage_capacity');
        $floor_area = $this->request->getPost('floor_area');
        $pallet_capacity = $this->request->getPost('pallet_capacity');

        // Merge address lines into a single address
        $address = $this->request->getPost('address') . ' ' . $this->request->getPost('address2');

        // Combine opening hours (from and to)
        $opening_hours = $this->request->getPost('opening_hours_from') . ' to ' . $this->request->getPost('opening_hours_to');

        // Prepare data to be saved
        $data = [
            'name' => $name,
            'pincode' => $pincode,
            'manager' => $manager,
            'storage_capacity' => $storage_capacity,
            'floor_area' => $floor_area,
            'pallet_capacity' => $pallet_capacity,
            'address' => $address,  // Store merged address
            'status' => $this->request->getPost('status'),
            'contact_number' => $this->request->getPost('contact_number'),
            'email' => $this->request->getPost('email'),
            'opening_hours' => $opening_hours,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        // Save warehouse data
        $warehouseModel->save($data);

        return redirect()->back()->with('success', 'Warehouse added successfully!');
    }

    public function editwarehouse($id)
    {
        $warehouseModel = new WarehouseModel();
        $warehouse = $warehouseModel->find($id);

        if (!$warehouse) {
            return redirect()->back()->with('error', 'Warehouse not found.');
        }

        // Load the edit warehouse view and pass the warehouse data
        return view('edit_warehouse', ['warehouse' => $warehouse]);
    }

    public function updatewarehouse($id)
    {
        $warehouseModel = new WarehouseModel();

        // Verify the warehouse exists
        $warehouse = $warehouseModel->find($id);
        if (!$warehouse) {
            return redirect()->back()->with('error', 'Warehouse not found.');
        }

        // Get input values from the form
        $name = $this->request->getPost('warehouse_name');
        $pincode = $this->request->getPost('pincode');
        $manager = $this->request->getPost('manager');
        $storage_capacity = $this->request->getPost('storage_capacity');
        $floor_area = $this->request->getPost('floor_area');
        $pallet_capacity = $this->request->getPost('pallet_capacity');

        // Use the single address field directly
        $address = $this->request->getPost('address');

        // Combine opening hours (from and to)
        $opening_hours = $this->request->getPost('opening_hours_from') . ' to ' . $this->request->getPost('opening_hours_to');

        // Prepare data to be updated
        $data = [
            'name' => $name,
            'pincode' => $pincode,
            'manager' => $manager,
            'storage_capacity' => $storage_capacity,
            'floor_area' => $floor_area,
            'pallet_capacity' => $pallet_capacity,
            'address' => $address,
            'status' => $this->request->getPost('status'),
            'contact_number' => $this->request->getPost('contact_number'),
            'email' => $this->request->getPost('email'),
            'opening_hours' => $opening_hours,
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        // Update warehouse data
        if ($warehouseModel->update($id, $data)) {
            return redirect()->to('online_store/preferences')->with('success', 'Warehouse updated successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to update warehouse.');
        }
    }

    public function delete($id)
    {
        $warehouseModel = new WarehouseModel();

        // Check if the warehouse exists
        $warehouse = $warehouseModel->find($id);

        if (!$warehouse) {
            return redirect()->back()->with('error', 'Warehouse not found.');
        }

        // Delete the warehouse
        try {
            $warehouseModel->delete($id);
            return redirect()->back()->with('success', 'Warehouse deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete the warehouse.');
        }
    }

    public function saveMultiInventory()
    {
        $productId = $this->request->getPost('product_id');
        $inventoryData = $this->request->getPost('warehouse_inventory');

        if (!$productId || empty($inventoryData)) {
            return $this->response->setJSON(['success' => false, 'error' => 'Invalid input data.']);
        }

        $model = new Products_model(); // Create a model for inventory if not already present

        // Save inventory data
        foreach ($inventoryData as $warehouseId => $inventoryCount) {
            $data = [
                'product_id' => $productId,
                'warehouse_id' => $warehouseId,
                'inventory_count' => $inventoryCount,
            ];

            $existingRecord = $model->where('product_id', $productId)
                ->where('warehouse_id', $warehouseId)
                ->first();

            if ($existingRecord) {
                // Update existing record
                $model->update($existingRecord['id'], $data);
            } else {
                // Insert new record
                $model->insert($data);
            }
        }

        return $this->response->setJSON(['success' => true]);
    }
}
