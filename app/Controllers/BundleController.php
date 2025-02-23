<?php

namespace App\Controllers;

use App\Models\BundleModel;
use App\Models\Products_model;
use App\Models\CollectionProducts_model;
use App\Models\ProductCollectionModel;
use App\Models\PermissionsModel;
use CodeIgniter\Controller;
use Google\Cloud\Storage\StorageClient;

class BundleController extends Controller
{

    // Declare the model as a property
    protected $bundleModel;
    protected $collectionProductsModel;
    protected $permissionsModel;

    public function __construct()
    {
        // Instantiate the model
        $this->bundleModel = new BundleModel();
        $this->collectionProductsModel = new CollectionProducts_model();
        $this->permissionsModel = new PermissionsModel();
    }

    public function index()
    {
        // Load products for dropdown
        $productModel = new Products_model();
        $data['products'] = $productModel->findAll(); // Fetch all products from the products table

        return view('bundle_create', $data);
    }

    public function create()
    {
        $bundleModel = new BundleModel();
        $validation = \Config\Services::validation();

        // Form Validation
        $validation->setRules([
            'bundle_name' => 'required|max_length[255]',
            'bundle_price' => 'required|numeric',
            'discount_type' => 'required|in_list[percent,value]', // Validate discount type
            'discount_percent_input' => 'permit_empty|numeric|greater_than_equal_to[0]|less_than_equal_to[100]',
            'discount_value_input' => 'permit_empty|numeric|greater_than_equal_to[0]',
            'selected_products' => 'required',  // Ensure at least one product is selected
            'badge_image' => 'permit_empty|is_image[badge_image]|max_size[badge_image,2048]' // Add validation for the badge image
        ]);

        if ($this->request->getMethod() === 'post' && $validation->withRequest($this->request)->run()) {
            // Handle badge image upload to Google Cloud Storage
            $badgeImage = $this->request->getFile('badge_image');
            if ($badgeImage && $badgeImage->isValid() && !$badgeImage->hasMoved()) {
                $fileName = $badgeImage->getRandomName();
                $filePath = $badgeImage->getTempName();
                $storage = new StorageClient([
                    'keyFilePath' => WRITEPATH . 'public/mkvgsc.json',
                    'projectId' => 'peak-tide-441609-r1',
                ]);
                $bucketName = 'mkv_imagesbackend';
                $bucket = $storage->bucket($bucketName);

                // Upload the badge image to Google Cloud Storage
                $object = $bucket->upload(
                    fopen($filePath, 'r'),
                    [
                        'name' => 'bundles/badge_images/' . $fileName,
                        'predefinedAcl' => 'publicRead',
                    ]
                );

                // Generate URL to access the uploaded image
                $badgeImageUrl = sprintf('https://storage.googleapis.com/%s/bundles/badge_images/%s', $bucketName, $fileName);
            } else {
                $badgeImageUrl = null;  // If no image is uploaded, set it to null
            }

            // Determine discount value based on selected type
            $discountType = $this->request->getPost('discount_type');
            $discountValue = null;

            if ($discountType === 'percent') {
                $discountValue = $this->request->getPost('discount_percent_input');
            } elseif ($discountType === 'value') {
                $discountValue = $this->request->getPost('discount_value_input');
            }

            // Gather bundle data
            $bundleData = [
                'bundle_name' => $this->request->getPost('bundle_name'),
                'bundle_price' => $this->request->getPost('bundle_price'),
                'discount_type' => $discountType,
                'discount_value' => $discountValue,
                'start_date' => $this->request->getPost('start_date'),
                'end_date' => $this->request->getPost('end_date'),
                'status' => $this->request->getPost('status'),
                'selected_products' => implode(',', $this->request->getPost('selected_products')), // Convert array to comma-separated string
                'badge_image' => $badgeImageUrl // Store the badge image URL
            ];

            // Insert the bundle data
            if ($bundleModel->insert($bundleData)) {
                return redirect()->to('bundle_view')->with('success', 'Bundle created successfully.');
            } else {
                return redirect()->back()->with('error', 'Failed to create bundle.');
            }
        } else {
            return redirect()->back()->with('error', $validation->getErrors());
        }
    }


    public function view()
    {
        $bundleModel = new \App\Models\BundleModel();
        $permissionsModel = new \App\Models\PermissionsModel();

        $userId = session()->get('user_id');

        // Fetch bundles with associated products
        $bundles = $bundleModel->getBundlesWithProducts();

        // Check user permissions
        $canDelete = $permissionsModel->hasPermission($userId, 'bundles', 'delete');
        $canImport = $permissionsModel->hasPermission($userId, 'bundles', 'import');
        $canExport = $permissionsModel->hasPermission($userId, 'bundles', 'export');
        $canLogs = $permissionsModel->hasPermission($userId, 'bundles', 'logs'); // Check for "logs" permission

        // Pass data and permissions to the view
        return view('bundle_view', [
            'bundles' => $bundles,
            'canDelete' => $canDelete,
            'canImport' => $canImport,
            'canExport' => $canExport,
            'canLogs' => $canLogs, // Pass the logs permission to the view
        ]);
    }


    // Load the Edit Bundle Form
    public function edit($id)
    {
        $userId = session()->get('user_id');

        // Check if the user has 'edit' permission for bundles
        if (!$this->permissionsModel->hasPermission($userId, 'bundles', 'edit')) {
            return redirect()->to('/unauthorized')->with('error', 'You do not have the necessary permissions to edit this bundle.');
        }

        // Fetch user permissions for columns
        $db = db_connect();
        $permissions = $db->table('user_permissions')
            ->select('column_name')
            ->where('user_id', $userId)
            ->where('table_name', 'bundles')
            ->where('action', 'edit')
            ->get()
            ->getResultArray();

        $allowedColumns = array_column($permissions, 'column_name');

        // Fetch bundle data by ID
        $bundle = $this->bundleModel->find($id);

        if (!$bundle) {
            return redirect()->to('bundle_view')->with('error', 'Bundle not found.');
        }

        // Fetch all available products for selection
        $productModel = new Products_model();
        $products = $productModel->findAll();

        $selectedProducts = isset($bundle['selected_products']) ? $bundle['selected_products'] : [];

        // Pass data to the view
        return view('edit_bundle_view', [
            'bundle' => $bundle,
            'products' => $products,
            'selectedProducts' => $selectedProducts,
            'allowedColumns' => array_flip($allowedColumns),
        ]);
    }

    public function update($id)
    {
        $bundleModel = new BundleModel();

        // Fetch existing bundle data
        $bundle = $bundleModel->find($id);

        if (!$bundle) {
            return redirect()->to('bundle_view')->with('error', 'Bundle not found.');
        }

        // Initialize Google Cloud Storage client
        $storage = new StorageClient([
            'keyFilePath' => WRITEPATH . 'public/mkvgsc.json',
            'projectId' => 'peak-tide-441609-r1',
        ]);
        $bucketName = 'mkv_imagesbackend';
        $bucket = $storage->bucket($bucketName);

        // ✅ Handle badge image upload (if provided)
        $badgeImage = $this->request->getFile('badge_image');
        if ($badgeImage && $badgeImage->isValid() && !$badgeImage->hasMoved()) {
            $oldBadgeImageUrl = $bundle['badge_image'];

            // ✅ Ensure old badge image deletion works correctly
            if (!empty($oldBadgeImageUrl)) {
                $parsedUrl = parse_url($oldBadgeImageUrl);
                if (isset($parsedUrl['path'])) {
                    $oldImagePath = ltrim($parsedUrl['path'], '/');
                    $object = $bucket->object($oldImagePath);
                    if ($object->exists()) {
                        $object->delete();
                    }
                }
            }

            // ✅ Upload the new badge image
            $fileName = $badgeImage->getRandomName();
            $filePath = $badgeImage->getTempName();

            $object = $bucket->upload(
                fopen($filePath, 'r'),
                [
                    'name' => "bundles/badge_images/{$fileName}",
                    'predefinedAcl' => 'publicRead',
                ]
            );

            // ✅ Generate Correct URL for Uploaded Image
            $badgeImageUrl = "https://storage.googleapis.com/{$bucketName}/bundles/badge_images/{$fileName}";
        } else {
            // ✅ If no new badge image is uploaded, keep the existing one
            $badgeImageUrl = $bundle['badge_image'];
        }

        // ✅ Use a single discount input field for both percentage & fixed value
        $discountType = $this->request->getPost('discount_type');
        $discountValue = $this->request->getPost('discount_input'); // Single input field

        // Prepare updated bundle data
        $bundleData = [
            'bundle_name' => $this->request->getPost('bundle_name'),
            'bundle_price' => $this->request->getPost('bundle_price'),
            'discount_type' => $discountType,
            'discount_value' => $discountValue, // ✅ Store only one input field value
            'start_date' => $this->request->getPost('start_date'),
            'end_date' => $this->request->getPost('end_date'),
            'status' => $this->request->getPost('status'),
            'selected_products' => implode(',', (array) $this->request->getPost('selected_products')),
            'badge_image' => $badgeImageUrl
        ];

        // Update the bundle data
        if ($bundleModel->update($id, $bundleData)) {
            return redirect()->to('bundle_view')->with('success', 'Bundle updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to update bundle.');
        }
    }

    public function delete($id)
    {
        $userId = session()->get('user_id');

        // Check if the user has 'delete' permission for bundles
        if (!$this->permissionsModel->hasPermission($userId, 'bundles', 'delete')) {
            return redirect()->to('/unauthorized')->with('error', 'You do not have the necessary permissions to delete this bundle.');
        }

        // Find the bundle by ID
        $bundle = $this->bundleModel->find($id);

        if (!$bundle) {
            // Handle case where the bundle doesn't exist
            return redirect()->to('bundle_view')->with('error', 'Bundle not found.');
        }

        // Get the current admin details from the session
        $session = session();
        $deletedBy = $session->get('admin_name') . '(' . $session->get('user_id') . ')';

        // Perform soft deletion by updating specific fields
        $this->bundleModel->update($id, [
            'is_deleted' => 1, // Mark the bundle as deleted
            'deleted_by' => $deletedBy, // Log who deleted it
            'deleted_at' => date('Y-m-d H:i:s'), // Record deletion timestamp
        ]);

        // Redirect to the bundles view with success message
        return redirect()->to('bundle_view')->with('success', 'Bundle deleted successfully.');
    }


    public function deleted()
    {
        // Fetch all bundles marked as deleted
        $data['bundles'] = $this->bundleModel->where('is_deleted', 1)->findAll();

        // Return the view with deleted bundles
        return view('bundle_deleted', $data);
    }

    public function restore($id)
    {
        // Find the bundle by ID
        $bundle = $this->bundleModel->find($id);

        if (!$bundle) {
            // Redirect if the bundle does not exist
            return redirect()->to('bundle/deleted')->with('error', 'Bundle not found.');
        }

        // Restore the bundle by clearing deletion fields
        $this->bundleModel->update($id, [
            'is_deleted' => 0, // Mark as not deleted
            'deleted_by' => null, // Clear who deleted it
            'deleted_at' => null, // Clear deletion timestamp
        ]);

        // Redirect to the bundles view with success message
        return redirect()->to('bundle_view')->with('success', 'Bundle restored successfully.');
    }




    //productcollectionview
    public function viewcollection()
    {
        $productCollectionModel = new \App\Models\ProductCollectionModel();
        $productModel = new \App\Models\Products_model();
        $collectionProductModel = new \App\Models\CollectionProducts_model();
        $userId = session()->get('user_id'); // Get the logged-in user's ID

        $db = db_connect();

        // Check user permissions
        $canDelete = $db->table('user_permissions')
            ->where('user_id', $userId)
            ->where('table_name', 'product_collections')
            ->where('action', 'delete')
            ->countAllResults() > 0;

        $canImport = $db->table('user_permissions')
            ->where('user_id', $userId)
            ->where('table_name', 'product_collections')
            ->where('action', 'import')
            ->countAllResults() > 0;

        $canExport = $db->table('user_permissions')
            ->where('user_id', $userId)
            ->where('table_name', 'product_collections')
            ->where('action', 'export')
            ->countAllResults() > 0;

        // Check if the user has the "logs" permission
        $canLogs = $db->table('user_permissions')
            ->where('user_id', $userId)
            ->where('table_name', 'product_collections')
            ->where('action', 'logs')
            ->countAllResults() > 0;

        // Fetch only the product collections where 'is_deleted' is 0
        $product_collections = $productCollectionModel->where('is_deleted', 0)->findAll();

        foreach ($product_collections as &$bundle) {
            // Fetch product titles for the selected products
            $productIds = explode(',', $bundle['selected_products']);
            $productTitles = [];
            foreach ($productIds as $productId) {
                $product = $productModel->find($productId);
                if ($product) {
                    $productTitles[] = $product['product_title'];
                }
            }
            $bundle['product_titles'] = $productTitles;

            // Check if selected_collections exists and is not null before processing
            $collectionTitles = [];
            if (isset($bundle['selected_collections']) && !empty($bundle['selected_collections'])) {
                $collectionIds = explode(',', $bundle['selected_collections']);
                foreach ($collectionIds as $collectionId) {
                    $collectionTitle = $collectionProductModel->getCollectionTitle($collectionId);
                    if ($collectionTitle) {
                        $collectionTitles[] = $collectionTitle;
                    }
                }
            }
            $bundle['collection_titles'] = $collectionTitles;
        }

        // Pass the data and permissions to the view
        return view('bundlecollection_view', [
            'product_collections' => $product_collections,
            'canDelete' => $canDelete,
            'canImport' => $canImport,
            'canExport' => $canExport,
            'canLogs' => $canLogs,  // Pass the logs permission to the view
        ]);
    }




    public function indexcollection()
    {
        $productModel = new Products_model();
        $data['products'] = $productModel->findAll();

        $db = \Config\Database::connect();
        $data['collection'] = $db->table('collection')
            ->select('collection_id, collection_title')
            ->get()
            ->getResultArray();

        return view('bundlecollection_create', $data);
    }

    public function createcollection()
    {
        // Get data from the form
        $bundle_name = $this->request->getPost('bundle_name');
        $selling_price = $this->request->getPost('selling_price');
        $discount_type = $this->request->getPost('discount_type');
        $discount_percent_input = $this->request->getPost('discount_percent_input');
        $discount_value_input = $this->request->getPost('discount_value_input');
        $status = $this->request->getPost('status');
        $selected_products = $this->request->getPost('selected_products');
        $selected_collection = $this->request->getPost('selected_collection');
        $quantity = $this->request->getPost('quantity');


        $bundleData = [
            'bundle_name' => $bundle_name,
            'selling_price' => $selling_price,
            'discount_type' => $discount_type,
            'discount_percent_input' => ($discount_type === 'percent') ? $discount_percent_input : null,
            'discount_value_input' => ($discount_type === 'value') ? $discount_value_input : null,
            'status' => $status,
            'quantity' => $quantity,
            'selected_products' => is_array($selected_products) ? implode(',', $selected_products) : $selected_products,
            'selected_collection' => is_array($selected_collection) ? implode(',', $selected_collection) : $selected_collection,

        ];

        $productCollectionModel = new \App\Models\ProductCollectionModel();

        if ($productCollectionModel->save($bundleData)) {
            return redirect()->to('bundlecollection_view')->with('success', 'Bundle created successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to create bundle');
        }
    }

    public function updateproductcollection($id)
    {
        $bundleModel = new ProductCollectionModel();
        $validation = \Config\Services::validation();

        $validation->setRules([
            'bundle_name' => 'required|max_length[255]',
            'selling_price' => 'required|numeric',
            'discount_type' => 'required|in_list[percent,value]',
            'discount_percent_input' => 'permit_empty|numeric|greater_than_equal_to[0]|less_than_equal_to[100]',
            'discount_value_input' => 'permit_empty|numeric|greater_than_equal_to[0]',
            'selected_products' => 'required',
            'quantity' => 'required|integer|greater_than[0]',
        ]);

        if ($this->request->getMethod() === 'post' && $validation->withRequest($this->request)->run()) {

            $bundle = $bundleModel->find($id);

            if (!$bundle) {
                return redirect()->to('bundlecollection_view')->with('error', 'Bundle not found.');
            }

            $discountType = $this->request->getPost('discount_type');
            $discountValue = null;

            if ($discountType === 'percent') {
                $discountValue = $this->request->getPost('discount_percent_input');
            } elseif ($discountType === 'value') {
                $discountValue = $this->request->getPost('discount_value_input');
            }

            // Ensure that selected_products and selected_collection are arrays before imploding
            $selectedProducts = $this->request->getPost('selected_products');
            $selectedCollection = $this->request->getPost('selected_collection');

            $bundleData = [
                'bundle_name' => $this->request->getPost('bundle_name'),
                'selling_price' => $this->request->getPost('selling_price'),
                'discount_type' => $discountType,
                'discount_value' => $discountValue,
                'quantity' => $this->request->getPost('quantity'),
                'selected_products' => is_array($selectedProducts) ? implode(',', $selectedProducts) : $selectedProducts,
                'selected_collection' => is_array($selectedCollection) ? implode(',', $selectedCollection) : $selectedCollection,
            ];

            if ($bundleModel->update($id, $bundleData)) {
                return redirect()->to('bundlecollection_view')->with('success', 'Bundle updated successfully.');
            } else {
                return redirect()->back()->withInput()->with('error', 'Failed to update bundle.');
            }
        } else {
            return redirect()->back()->withInput()->with('error', $validation->getErrors());
        }
    }

    public function editProductCollection($bundleId)
    {
        $productCollectionModel = new ProductCollectionModel();
        $db = db_connect();

        $bundle = $productCollectionModel->find($bundleId);
        if (!$bundle) {
            return redirect()->back()->with('error', 'Bundle not found!');
        }

        // Fetch product and collection data
        $products = $db->table('products')->select('product_id, product_title, cost_price')->get()->getResultArray();
        $collections = $db->table('collection')->select('collection_id, collection_title')->get()->getResultArray();

        $selectedProducts = !empty($bundle['selected_products']) ? explode(',', $bundle['selected_products']) : [];
        $selectedCollections = !empty($bundle['selected_collection']) ? explode(',', $bundle['selected_collection']) : [];

        $data = [
            'bundle' => $bundle,
            'products' => $products,
            'collections' => $collections,
            'selectedProducts' => $selectedProducts,
            'selectedCollection' => $selectedCollections,
        ];

        return view('edit_bundlecollection_view', $data);
    }

    public function deleteproductcollection($id)
    {
        $productCollectionModel = new \App\Models\ProductCollectionModel();
        $session = session();

        // Log the delete request
        log_message('debug', 'Delete Request for Bundle ID: ' . $id);

        // Check if the bundle exists
        $bundle = $productCollectionModel->find($id);
        if (!$bundle) {
            log_message('error', 'No bundle found with ID: ' . $id);
            return redirect()->to('bundlecollection_view')->with('error', 'Bundle not found.');
        }

        // Get the current user info from session for tracking deletion
        $deletedBy = $session->get('admin_name') . '(' . $session->get('user_id') . ')';

        // Soft delete the bundle (update the necessary fields)
        $data = [
            'is_deleted' => 1,
            'deleted_by' => $deletedBy,
            'deleted_at' => date('Y-m-d H:i:s')
        ];

        if ($productCollectionModel->update($id, $data)) {
            log_message('debug', 'Bundle with ID ' . $id . ' soft deleted successfully.');
            return redirect()->to('bundlecollection_view')->with('success', 'Bundle deleted successfully.');
        } else {
            log_message('error', 'Failed to soft delete bundle with ID: ' . $id);
            return redirect()->back()->with('error', 'Failed to delete bundle.');
        }
    }

    public function deletedcollection()
    {
        // Initialize the model
        $productCollectionModel = new \App\Models\ProductCollectionModel();

        // Fetch all product collections marked as deleted
        $data['product_collections'] = $productCollectionModel->where('is_deleted', 1)->findAll();

        // Return the view with the deleted product collections
        return view('productcollection_deleted', $data);
    }


    public function restorecollection($id)
    {
        // Initialize the model inside the method
        $productCollectionModel = new ProductCollectionModel();

        // Find the product collection by ID
        $bundle = $productCollectionModel->find($id);

        if (!$bundle) {
            // Redirect if the bundle does not exist
            return redirect()->to('bundlecollection/deleted')->with('error', 'Bundle not found.');
        }

        // Restore the bundle by clearing deletion fields
        $productCollectionModel->update($id, [
            'is_deleted' => 0,
            'deleted_by' => null,
            'deleted_at' => null,
        ]);

        return redirect()->to('bundlecollection_view')->with('success', 'Product collection restored successfully.');
    }
}
