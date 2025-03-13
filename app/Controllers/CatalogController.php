<?php

namespace App\Controllers;

use App\Models\CatalogModel;
use App\Models\Products_model;
use App\Models\PermissionsModel;
use App\Models\Registerusers_model;
use App\Models\TagModel;
use App\Models\CompanyModel;
use App\Models\CustomerSegmentModel;
use CodeIgniter\Controller;

class CatalogController extends Controller
{
    protected $permissionsModel;

    public function __construct()
    {
        $this->permissionsModel = new PermissionsModel();
    }

    public function create()
    {
        $productModel = new Products_model();
        $userModel = new Registerusers_model();
        $companyModel = new CompanyModel();
        $segmentModel = new CustomerSegmentModel();

        $data['products'] = $productModel->findAll();
        $data['users'] = $userModel->findAll();
        $data['companies'] = $companyModel->findAll();
        $data['customer_segments'] = $segmentModel->findAll();

        return view('catalog_form', $data);
    }

    public function store()
    {
        $catalogModel = new CatalogModel();
        $productModel = new \App\Models\ProductModel();
        $companyModel = new \App\Models\CompanyModel();
        $segmentModel = new \App\Models\CustomerSegmentModel();

        if ($this->request->getMethod() === 'post') {
            // Basic catalog data
            $catalogData = [
                'catalog_name' => $this->request->getPost('catalog_name') ?? '',
                'discount_type' => $this->request->getPost('discount_type') ?? '',
                'discount_value' => (float) ($this->request->getPost('discount_value') ?? 0),
                'overall_adjustment' => $this->request->getPost('overall_adjustment') ?? '',
                'status' => $this->request->getPost('status') ?? 'inactive',
            ];

            // Handle arrays
            $publishFor = $this->request->getPost('publish_for') ?? [];
            $selectcompany = $this->request->getPost('select_company') ?? [];
            $selectcustomersegment = $this->request->getPost('select_customer_segment') ?? [];

            // Process product rules
            $productRules = $this->request->getPost('product_rules') ?? [];
            $processedProductRules = [];
            $selectedProducts = [];
            $quantityRules = [
                'increment' => 0,
                'minimum' => 0,
                'maximum' => 0
            ];

            if (is_array($productRules)) {
                foreach ($productRules as $rule) {
                    if (isset($rule['product_id'])) {
                        // Add to processed product rules array
                        $processedProductRules[] = [
                            'product_id' => $rule['product_id'],
                            'increment' => (int) ($rule['increment'] ?? 0),
                            'minimum' => (int) ($rule['minimum'] ?? 0),
                            'maximum' => (int) ($rule['maximum'] ?? 0),
                            'quantity' => (int) ($rule['quantity'] ?? 0),
                            'price' => (float) ($rule['price'] ?? 0)
                        ];

                        // Add to selected products array
                        $selectedProducts[] = $rule['product_id'];

                        // Update quantity rules with the last entry's values
                        // You might want to modify this logic if you need different behavior
                        $quantityRules = [
                            'increment' => (int) ($rule['increment'] ?? 0),
                            'minimum' => (int) ($rule['minimum'] ?? 0),
                            'maximum' => (int) ($rule['maximum'] ?? 0)
                        ];
                    }
                }
            }

            // Process volume pricing
            $volumePricing = $this->request->getPost('volume_pricing') ?? [];
            $processedVolumePricing = [];

            if (is_array($volumePricing)) {
                foreach ($volumePricing as $row) {
                    if (isset($row['quantity'], $row['price'])) {
                        $processedVolumePricing[] = [
                            'quantity' => (int) $row['quantity'],
                            'price' => (float) $row['price'],
                        ];
                    }
                }
            }

            // Calculate selling prices
            $updatedSellingPrices = [];
            if (!empty($selectedProducts)) {
                $products = $productModel->whereIn('product_id', $selectedProducts)->findAll();

                foreach ($products as $product) {
                    $currentSellingPrice = (float) ($product['selling_price'] ?? 0);
                    $calculatedSellingPrice = $currentSellingPrice;

                    if ($catalogData['overall_adjustment'] === 'decrease') {
                        if ($catalogData['discount_type'] === 'percent') {
                            $calculatedSellingPrice -= ($currentSellingPrice * $catalogData['discount_value']) / 100;
                        } else {
                            $calculatedSellingPrice -= $catalogData['discount_value'];
                        }
                    } elseif ($catalogData['overall_adjustment'] === 'increase') {
                        if ($catalogData['discount_type'] === 'percent') {
                            $calculatedSellingPrice += ($currentSellingPrice * $catalogData['discount_value']) / 100;
                        } else {
                            $calculatedSellingPrice += $catalogData['discount_value'];
                        }
                    }

                    $calculatedSellingPrice = max(0, $calculatedSellingPrice);
                    $updatedSellingPrices[$product['product_id']] = $calculatedSellingPrice;
                }
            }

            // Prepare final catalog data
            $catalogData['products'] = implode(',', $selectedProducts);
            $catalogData['publish_for'] = implode(',', $publishFor);
            $catalogData['selling_price'] = json_encode($updatedSellingPrices);
            $catalogData['product_rules'] = json_encode($processedProductRules);
            $catalogData['quantity_rules'] = json_encode($quantityRules);
            $catalogData['volume_pricing'] = json_encode($processedVolumePricing);
            $catalogData['select_customer_segment'] = implode(',', $selectcustomersegment);
            $catalogData['select_company'] = implode(',', $selectcompany);

            try {
                // Validate required fields
                if (empty($catalogData['catalog_name'])) {
                    return redirect()->back()->with('error', 'Catalog name is required.');
                }

                // Log the final data being inserted
                log_message('debug', 'Final Catalog Data: ' . print_r($catalogData, true));

                // Attempt to insert
                if ($catalogModel->insert($catalogData)) {
                    return redirect()->to('catalog_view')->with('success', 'Catalog created successfully.');
                } else {
                    log_message('error', 'Validation Errors: ' . print_r($catalogModel->errors(), true));
                    return redirect()->back()->with('error', 'Failed to create catalog: ' . implode(', ', $catalogModel->errors()));
                }
            } catch (\Exception $e) {
                log_message('error', 'Database Error: ' . $e->getMessage());
                return redirect()->back()->with('error', 'Database error occurred: ' . $e->getMessage());
            }
        }

        return redirect()->back()->with('error', 'Invalid request method.');
    }


    public function index()
    {
        $catalogModel = new CatalogModel();
        $productModel = new Products_model();
        $session = session();
        $userId = $session->get('user_id');
        $db = db_connect();

        // Fetch all catalogs
        $catalogs = $catalogModel->findAll();

        // Fetch product names for each catalog
        foreach ($catalogs as &$catalog) {
            $productIds = explode(',', $catalog['products']);
            if (!empty($productIds)) {
                $catalog['product_title'] = $productModel->whereIn('product_id', $productIds)->findAll();
            } else {
                $catalog['product_title'] = [];
            }

            // Check if the user has delete permission for this catalog
            $hasDeletePermission = $db->table('user_permissions')
                ->where('user_id', $userId)
                ->where('table_name', 'catalogs')
                ->where('action', 'delete')
                ->countAllResults() > 0;

            $catalog['canDelete'] = $hasDeletePermission;
        }

        // Pass catalogs data to the view
        $data['catalogs'] = $catalogs;

        return view('catalog_view', $data);
    }


    public function edit($id)
    {
        $catalogModel = new CatalogModel();
        $productModel = new Products_model(); // Assuming you have a ProductModel to interact with the products table
        $userModel = new Registerusers_model(); // Assuming you have a UserModel to interact with the users table
        $companyModel = new CompanyModel();
        $segmentModel = new CustomerSegmentModel();

        $session = session();
        $userId = $session->get('user_id');

        // Fetch the catalog by ID
        $data['catalog'] = $catalogModel->find($id);

        // Handle non-existent catalog
        if (!$data['catalog']) {
            return redirect()->to('/catalog')->with('error', 'Catalog not found.');
        }

        // Fetch all products
        $data['products'] = $productModel->findAll();

        // Fetch all users for the "Publish For" dropdown
        $data['users'] = $userModel->findAll(); // Ensure you have a UserModel defined

        // Fetch user permissions for the catalog table
        $db = db_connect();
        $permissions = $db->table('user_permissions')
            ->select('column_name')
            ->where('user_id', $userId)
            ->where('table_name', 'catalogs')
            ->where('action', 'edit')
            ->get()
            ->getResultArray();

        // Prepare allowed fields
        $allowedFields = array_column($permissions, 'column_name');
        $data['allowedFields'] = array_flip($allowedFields); // Flip for quick checks in the view
        $data['companies'] = $companyModel->findAll(); // Fixed: Removed extra space
        $data['customer_segments'] = $segmentModel->findAll(); // Fixed: Removed extra space

        // Pass catalog, products, users, and allowed fields to the edit view
        return view('edit_catalog_form', $data);
    }



    public function update($id)
    {
        $catalogModel = new CatalogModel();
        $productModel = new \App\Models\ProductModel();

        if ($this->request->getMethod() === 'post') {
            // Basic catalog data
            $catalogData = [
                'catalog_name' => $this->request->getPost('catalog_name') ?? '',
                'discount_type' => $this->request->getPost('discount_type') ?? '',
                'discount_value' => (float) ($this->request->getPost('discount_value') ?? 0),
                'overall_adjustment' => $this->request->getPost('overall_adjustment') ?? '',
                'status' => $this->request->getPost('status') ?? 'inactive',
            ];

            // Handle arrays
            $publishFor = $this->request->getPost('publish_for') ?? [];
            $selectcompany = $this->request->getPost('select_company') ?? [];
            $selectcustomersegment = $this->request->getPost('select_customer_segment') ?? [];

            // Process product rules
            $productRules = $this->request->getPost('product_rules') ?? [];
            $processedProductRules = [];
            $selectedProducts = [];
            $quantityRules = [
                'increment' => 0,
                'minimum' => 0,
                'maximum' => 0
            ];

            if (is_array($productRules)) {
                foreach ($productRules as $rule) {
                    if (isset($rule['product_id'])) {
                        // Add to processed product rules array
                        $processedProductRules[] = [
                            'product_id' => $rule['product_id'],
                            'increment' => (int) ($rule['increment'] ?? 0),
                            'minimum' => (int) ($rule['minimum'] ?? 0),
                            'maximum' => (int) ($rule['maximum'] ?? 0),
                            'quantity' => (int) ($rule['quantity'] ?? 0),
                            'price' => (float) ($rule['price'] ?? 0)
                        ];

                        // Add to selected products array
                        $selectedProducts[] = $rule['product_id'];

                        // Update quantity rules with the last entry's values
                        $quantityRules = [
                            'increment' => (int) ($rule['increment'] ?? 0),
                            'minimum' => (int) ($rule['minimum'] ?? 0),
                            'maximum' => (int) ($rule['maximum'] ?? 0)
                        ];
                    }
                }
            }

            // Process volume pricing
            $volumePricing = $this->request->getPost('volume_pricing') ?? [];
            $processedVolumePricing = [];

            if (is_array($volumePricing)) {
                foreach ($volumePricing as $row) {
                    if (isset($row['quantity'], $row['price'])) {
                        $processedVolumePricing[] = [
                            'quantity' => (int) $row['quantity'],
                            'price' => (float) $row['price'],
                        ];
                    }
                }
            }

            // Calculate selling prices
            $updatedSellingPrices = [];
            if (!empty($selectedProducts)) {
                $products = $productModel->whereIn('product_id', $selectedProducts)->findAll();

                foreach ($products as $product) {
                    $currentSellingPrice = (float) ($product['selling_price'] ?? 0);
                    $calculatedSellingPrice = $currentSellingPrice;

                    if ($catalogData['overall_adjustment'] === 'decrease') {
                        if ($catalogData['discount_type'] === 'percent') {
                            $calculatedSellingPrice -= ($currentSellingPrice * $catalogData['discount_value']) / 100;
                        } else {
                            $calculatedSellingPrice -= $catalogData['discount_value'];
                        }
                    } elseif ($catalogData['overall_adjustment'] === 'increase') {
                        if ($catalogData['discount_type'] === 'percent') {
                            $calculatedSellingPrice += ($currentSellingPrice * $catalogData['discount_value']) / 100;
                        } else {
                            $calculatedSellingPrice += $catalogData['discount_value'];
                        }
                    }

                    $calculatedSellingPrice = max(0, $calculatedSellingPrice);
                    $updatedSellingPrices[$product['product_id']] = $calculatedSellingPrice;
                }
            }

            // Prepare final catalog data
            $catalogData['products'] = implode(',', $selectedProducts);
            $catalogData['publish_for'] = implode(',', $publishFor);
            $catalogData['selling_price'] = json_encode($updatedSellingPrices);
            $catalogData['product_rules'] = json_encode($processedProductRules);
            $catalogData['quantity_rules'] = json_encode($quantityRules);
            $catalogData['volume_pricing'] = json_encode($processedVolumePricing);
            $catalogData['select_customer_segment'] = implode(',', $selectcustomersegment);
            $catalogData['select_company'] = implode(',', $selectcompany);

            try {
                // Validate required fields
                if (empty($catalogData['catalog_name'])) {
                    return redirect()->back()->with('error', 'Catalog name is required.');
                }

                // Log the final data being updated
                log_message('debug', 'Updating Catalog ID ' . $id . ' with Data: ' . print_r($catalogData, true));

                // Attempt to update
                if ($catalogModel->update($id, $catalogData)) {
                    return redirect()->to('catalog_view')->with('success', 'Catalog updated successfully.');
                } else {
                    log_message('error', 'Validation Errors: ' . print_r($catalogModel->errors(), true));
                    return redirect()->back()->with('error', 'Failed to update catalog: ' . implode(', ', $catalogModel->errors()));
                }
            } catch (\Exception $e) {
                log_message('error', 'Database Error: ' . $e->getMessage());
                return redirect()->back()->with('error', 'Database error occurred: ' . $e->getMessage());
            }
        }

        return redirect()->back()->with('error', 'Invalid request method.');
    }


    public function delete($id)
    {
        $catalogModel = new CatalogModel();

        // Delete the catalog by ID
        if ($catalogModel->delete($id)) {
            return redirect()->to('catalog_view')->with('success', 'Catalog deleted successfully.');
        } else {
            return redirect()->to('catalog_view')->with('error', 'Failed to delete catalog.');
        }
    }








    //---------------------------------------------------------------Company------------------------------------------------------------------------------------------->

    public function displayCompany()
    {
        $productModel = new Products_model();
        $userModel = new Registerusers_model(); // Assuming you have a Users_model to fetch user data
        $tagmodel = new TagModel();

        $data['products'] = $productModel->findAll();
        $data['users'] = $userModel->findAll();
        $data['tags'] = $tagmodel->findAll(); // Fetch all users from the `users` table

        return view('add_new_company', $data);
    }


    public function save_company()
    {
        $companyModel = new CompanyModel(); // Initialize your model


        $companyName = $this->request->getPost('company_name');
        $userIds = $this->request->getPost('user_ids'); // Array of selected user IDs
        $tags = $this->request->getPost('product-tags'); // Array of tags
        $address = $this->request->getPost('address');
        $notes = $this->request->getPost('notes');
        $applyForCredit = $this->request->getPost('apply_for_credit');
        $registrationNumber = $this->request->getPost('registration_number');
        $principalDirector = $this->request->getPost('principal_director');



        // Prepare the address field as a JSON object
        $address = [
            'street' => $this->request->getPost('street'),
            'city' => $this->request->getPost('city'),
            'state' => $this->request->getPost('state'),
            'country' => $this->request->getPost('country'),
            'postal_code' => $this->request->getPost('postal_code'),
        ];

        // Prepare data for insertion
        $data = [
            'company_name' => $companyName,
            'user_ids' => implode(',', $userIds), // Convert array to comma-separated string
            'tags' => !empty($tags) ? implode(',', $tags) : null, // Handle tags if provided
            'address' => json_encode($address), // Store as JSON
            'notes' => $notes,
            'apply_for_credit' => $applyForCredit,
            'registration_number' => $registrationNumber,
            'principal_director' => $principalDirector,
        ];

        // Insert the data into the database
        if ($companyModel->insert($data)) {
            return redirect()->to('company_view')->with('success', 'Company added successfully.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Failed to save company. Please try again.');
        }
    }

    public function viewcompanylist()
    {
        $companyModel = new CompanyModel();
        $data['companies'] = $companyModel->where('is_deleted', 0)->findAll();
        return view('company_view', $data);
    }

    public function editcompany($id)
    {
        $catalogModel = new CompanyModel();
        $productModel = new Products_model();
        $registerUserModel = new Registerusers_model();
        $tagModel = new TagModel();

        $data['users'] = $registerUserModel->findAll();
        $data['tags'] = $tagModel->findAll();
        $data['company'] = $catalogModel->find($id);
        $data['products'] = $productModel->findAll();

        return view('edit_company', $data);
    }

    public function update_company($id)
    {
        $model = new CompanyModel();
        $session = session();
        $updatedBy = $session->get('admin_name') . ' (' . $session->get('user_id') . ')';

        // Fetch existing company data
        $existingCompany = $model->find($id);
        if (!$existingCompany) {
            return redirect()->to('company_view')->with('error', 'Company not found.');
        }

        // Retrieve and process address fields
        $address = [
            'street' => $this->request->getPost('street'),
            'city' => $this->request->getPost('city'),
            'state' => $this->request->getPost('state'),
            'country' => $this->request->getPost('country'),
            'postal_code' => $this->request->getPost('postal_code'),
        ];
        $encodedAddress = json_encode($address);

        // Prepare updated fields
        $newData = [
            'company_name' => $this->request->getPost('company_name'),
            'user_ids' => !empty($this->request->getPost('user_ids')) ? implode(',', $this->request->getPost('user_ids')) : '',
            'tags' => !empty($this->request->getPost('product-tags')) ? implode(',', $this->request->getPost('product-tags')) : '',
            'address' => $encodedAddress,
            'notes' => $this->request->getPost('notes'),
            'apply_for_credit' => $this->request->getPost('apply_for_credit'),
            'registration_number' => $this->request->getPost('registration_number'),
            'principal_director' => $this->request->getPost('principal_director'),
            'updated_by' => $updatedBy,
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        // Track changes
        $changes = [];
        foreach ($newData as $key => $value) {
            if ($existingCompany[$key] != $value) {
                $changes[$key] = [
                    'old' => $existingCompany[$key],
                    'new' => $value
                ];
            }
        }

        // If no changes, avoid unnecessary update
        if (empty($changes)) {
            return redirect()->to('company_view')->with('info', 'No changes detected.');
        }

        // Fetch existing change log
        $changeLog = !empty($existingCompany['change_log']) ? json_decode($existingCompany['change_log'], true) : [];
        if (!is_array($changeLog)) {
            $changeLog = [];
        }

        // Append new change entry
        $changeLog[] = [
            'changes' => $changes,
            'updated_by' => $updatedBy,

        ];

        // Update data including change log
        $newData['change_log'] = json_encode($changeLog);
        $model->update($id, $newData);

        return redirect()->to('company_view')->with('success', 'Updated successfully!');
    }

    public function deleteCompany($id)
    {
        $companyModel = new CompanyModel();
        $session = session();
        $deletedBy = $session->get('admin_name') . ' (' . $session->get('user_id') . ')';

        // Prepare data for soft delete
        $data = [
            'is_deleted' => 1,
            'deleted_by' => $deletedBy,
            'deleted_at' => date('Y-m-d H:i:s'),
        ];

        if ($companyModel->updateCompanyStatus($id, $data)) {
            return redirect()->to('company_view')->with('success', 'Deleted successfully!');
        } else {
            return redirect()->to('company_view')->with('error', 'Failed to delete.');
        }
    }

    public function restoreCompany($id)
    {
        $companyModel = new CompanyModel();

        // Prepare data for restoring
        $data = [
            'is_deleted' => 0,
            'deleted_by' => null,
            'deleted_at' => null,
        ];

        if ($companyModel->updateCompanyStatus($id, $data)) {
            return redirect()->to('company_view')->with('success', 'Restored successfully!');
        } else {
            return redirect()->to('company_view')->with('error', 'Failed to restore.');
        }
    }

    public function companylogs()
    {
        $model = new CompanyModel();
        $data['companies'] = $model->getAlllogscompany();
        return view('company_logs_view', $data);
    }

    public function importCSV()
    {
        $companyModel = new CompanyModel();

        if ($file = $this->request->getFile('csv_file')) {
            if ($file->isValid() && !$file->hasMoved()) {
                $filePath = $file->getTempName();
                $csvFile = fopen($filePath, 'r');

                // ✅ Read the first row as headers (optional, to ensure correct mapping)
                $headers = fgetcsv($csvFile);

                // ✅ Prepare an array to store data before batch insert
                $insertData = [];

                while (($row = fgetcsv($csvFile)) !== false) {
                    // ✅ Ensure the row has at least 12 columns to avoid errors
                    if (count($row) < 12) {
                        log_message('error', 'Skipping invalid row: ' . json_encode($row));
                        continue;
                    }

                    $data = [
                        'company_name' => $row[0] ?? null,
                        'user_ids' => !empty($row[1]) ? implode(',', explode('|', $row[1])) : null,
                        'tags' => !empty($row[2]) ? implode(',', explode('|', $row[2])) : null,
                        'notes' => $row[3] ?? null,
                        'apply_for_credit' => $row[4] ?? null,
                        'registration_number' => $row[5] ?? null,
                        'principal_director' => $row[6] ?? null,
                        'created_at' => date('Y-m-d H:i:s'),
                    ];

                    // ✅ Prepare address JSON safely
                    $address = [
                        'street' => $row[7] ?? null,
                        'city' => $row[8] ?? null,
                        'state' => $row[9] ?? null,
                        'country' => $row[10] ?? null,
                        'postal_code' => $row[11] ?? null,
                    ];
                    $data['address'] = json_encode($address);

                    // ✅ Store the row in an array for batch insert
                    $insertData[] = $data;
                }

                fclose($csvFile);

                // ✅ Insert into database using batch insert
                if (!empty($insertData)) {
                    $companyModel->insertBatchCompanies($insertData);
                    return redirect()->back()->with('success', 'Companies imported successfully.');
                } else {
                    return redirect()->back()->with('error', 'No valid data found in the CSV file.');
                }
            }
        }

        return redirect()->back()->with('error', 'Error importing the file.');
    }

    public function exportCSV()
    {
        $companyModel = new CompanyModel();
        $companies = $companyModel->findAll(); // Fetch all companies

        // Define the CSV file name
        $filename = 'companies_export_' . date('Y-m-d') . '.csv';

        // Set headers for CSV download
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: text/csv; charset=UTF-8");

        // Open PHP output stream
        $file = fopen('php://output', 'w');

        // Define CSV headers
        $header = [
            'Company Name',
            'User IDs',
            'Tags',
            'Address',
            'Notes',
            'Apply for Credit',
            'Registration Number',
            'Principal Director'
        ];
        fputcsv($file, $header); // Add headers to CSV

        // Loop through companies and add rows
        foreach ($companies as $company) {
            fputcsv($file, [
                $company['company_name'],
                $company['user_ids'],
                $company['tags'],
                $company['address'],
                $company['notes'],
                $company['apply_for_credit'],
                $company['registration_number'],
                $company['principal_director']
            ]);
        }

        fclose($file); // Close file stream
        exit();
    }





















    //---------------------------------------------------------------Customer Segment------------------------------------------------------------------------------------------->
    public function add_new()
    {
        $model = new Registerusers_model();
        $data['users'] = $model->showusers();

        // Start session if not already started
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Check if the session contains a logged-in user identifier (e.g., user_id)
        if (isset($_SESSION['user_id'])) {
            // Fetch the user's name from the database
            $userModel = new Registerusers_model();
            $user = $userModel->getUserById($_SESSION['user_id']);

            // Check if user data was found
            $data['name'] = $user['name'] ?? 'Guest';
        } else {
            $data['name'] = 'Guest';
        }
        return view('add_new_customersegment', $data);
    }

    public function apply_filters()
    {
        $filters = $this->request->getPost();
        $userModel = new Registerusers_model();

        try {
            $query = $userModel->select('user_id, name, email');

            if (!empty($filters['age_min']) || !empty($filters['age_max'])) {
                $currentDate = date('Y-m-d');

                if (!empty($filters['age_min'])) {
                    $minDob = date('Y-m-d', strtotime($currentDate . ' - ' . $filters['age_min'] . ' years'));
                    $query->where('dob <=', $minDob);
                }

                if (!empty($filters['age_max'])) {
                    $maxDob = date('Y-m-d', strtotime($currentDate . ' - ' . $filters['age_max'] . ' years'));
                    $query->where('dob >=', $maxDob);
                }
            }

            if (!empty($filters['gender'])) {
                $query->where('gender', $filters['gender']);
            }
            if (!empty($filters['country'])) {
                $query->where('country', $filters['country']);
            }
            if (!empty($filters['state'])) {
                $query->where('state', $filters['state']);
            }
            if (!empty($filters['city'])) {
                $query->where('city', $filters['city']);
            }
            if (!empty($filters['pincode'])) {
                $query->where('pincode', $filters['pincode']);
            }
            if (!empty($filters['purchase_min'])) {
                $query->where('total_spend >=', $filters['purchase_min']);
            }
            if (!empty($filters['purchase_max'])) {
                $query->where('total_spend <=', $filters['purchase_max']);
            }
            if (!empty($filters['orders_min'])) {
                $query->where('total_orders >=', $filters['orders_min']);
            }
            if (!empty($filters['orders_max'])) {
                $query->where('total_orders <=', $filters['orders_max']);
            }

            $users = $query->findAll();
            return $this->response->setJSON($users);
        } catch (\Exception $e) {
            return $this->response->setStatusCode(500)->setJSON(['error' => $e->getMessage()]);
        }
    }

    public function savesegmentdata()
    {
        // Initialize the model
        $segmentModel = new CustomerSegmentModel();
        $userModel = new Registerusers_model();

        // Retrieve form data
        $segmentName = $this->request->getPost('segment_name');
        $segmentDescription = $this->request->getPost('segment_description');
        $segmentType = $this->request->getPost('segment_type');
        $createdBy = $this->request->getPost('created_by');
        $filters = $this->request->getPost();

        // Extract specific filter values
        $filterData = [];
        if (!empty($filters['age_min']) || !empty($filters['age_max'])) {
            $filterData['age'] = [
                'min' => $filters['age_min'] ?? null,
                'max' => $filters['age_max'] ?? null,
            ];
        }
        if (!empty($filters['gender'])) {
            $filterData['gender'] = $filters['gender'];
        }
        if (!empty($filters['country']) || !empty($filters['state']) || !empty($filters['city']) || !empty($filters['postal_code'])) {
            $filterData['location'] = [
                'country' => $filters['country'] ?? null,
                'state' => $filters['state'] ?? null,
                'city' => $filters['city'] ?? null,
                'postal_code' => $filters['postal_code'] ?? null,
            ];
        }
        if (!empty($filters['language'])) {
            $filterData['language'] = $filters['language'];
        }
        if (!empty($filters['purchase_min']) || !empty($filters['purchase_max'])) {
            $filterData['purchase_value'] = [
                'min' => $filters['purchase_min'] ?? null,
                'max' => $filters['purchase_max'] ?? null,
            ];
        }
        if (!empty($filters['orders_min']) || !empty($filters['orders_max'])) {
            $filterData['orders'] = [
                'min' => $filters['orders_min'] ?? null,
                'max' => $filters['orders_max'] ?? null,
            ];
        }

        // Fetch filtered users based on filters
        $query = $userModel->select('user_id');
        if (!empty($filterData['age']['min'])) {
            $query->where('DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(), dob)), "%Y") + 0 >=', $filterData['age']['min']);
        }
        if (!empty($filterData['age']['max'])) {
            $query->where('DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(), dob)), "%Y") + 0 <=', $filterData['age']['max']);
        }
        if (!empty($filterData['gender'])) {
            $query->where('gender', $filterData['gender']);
        }
        if (!empty($filterData['location']['country'])) {
            $query->where('country', $filterData['location']['country']);
        }
        if (!empty($filterData['location']['state'])) {
            $query->where('state', $filterData['location']['state']);
        }
        if (!empty($filterData['location']['city'])) {
            $query->where('city', $filterData['location']['city']);
        }
        if (!empty($filterData['location']['pincode'])) {
            $query->where('pincode', $filterData['location']['pincode']);
        }
        if (!empty($filterData['language'])) {
            $query->where('preferred_language', $filterData['language']);
        }
        if (!empty($filterData['purchase_value']['min'])) {
            $query->where('total_spend >=', $filterData['purchase_value']['min']);
        }
        if (!empty($filterData['purchase_value']['max'])) {
            $query->where('total_spend <=', $filterData['purchase_value']['max']);
        }
        if (!empty($filterData['orders']['min'])) {
            $query->where('total_orders >=', $filterData['orders']['min']);
        }
        if (!empty($filterData['orders']['max'])) {
            $query->where('total_orders <=', $filterData['orders']['max']);
        }

        $filteredUsers = $query->findAll();

        // Prepare filtered user IDs
        $filteredUserIds = array_column($filteredUsers, 'user_id');

        // Prepare data for insertion
        $data = [
            'segment_name' => $segmentName,
            'segment_description' => $segmentDescription,
            'segment_type' => $segmentType,
            'created_by' => $createdBy,
            'filters' => !empty($filterData) ? json_encode($filterData) : null,
            'filtered_users' => !empty($filteredUserIds) ? implode(',', $filteredUserIds) : null,
        ];

        // Insert into the database
        if ($segmentModel->insert($data)) {
            return redirect()->to('customer_segment_view')->with('success', 'Customer segment created successfully.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Failed to save customer segment.');
        }
    }

    public function viewcustomersegment()
    {
        $companyModel = new CustomerSegmentModel();
        $data['segments'] = $companyModel->findAll();
        return view('customer_segment_view', $data);
    }

    public function editsegment($id)
    {
        $segmentModel = new CustomerSegmentModel();
        $userModel = new Registerusers_model();

        // Fetch the customer segment by ID
        $segment = $segmentModel->find($id);
        if (!$segment) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Segment not found");
        }

        // Fetch all users for the dropdown
        $users = $userModel->findAll();

        // Pass data to the view
        return view('edit_customersegment', [
            'segment' => $segment,
            'users' => $users,
        ]);
    }

    public function updatesegment($id)
    {
        // Initialize the models
        $segmentModel = new CustomerSegmentModel();
        $userModel = new Registerusers_model();

        // Retrieve existing segment
        $existingSegment = $segmentModel->find($id);
        if (!$existingSegment) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Segment not found');
        }

        // Retrieve form data
        $segmentName = $this->request->getPost('segment_name');
        $segmentDescription = $this->request->getPost('segment_description');
        $segmentType = $this->request->getPost('segment_type');
        $createdBy = $this->request->getPost('created_by');
        $filters = $this->request->getPost();

        // Extract specific filter values
        $filterData = [];
        if (!empty($filters['age_min']) || !empty($filters['age_max'])) {
            $filterData['age'] = [
                'min' => $filters['age_min'] ?? null,
                'max' => $filters['age_max'] ?? null,
            ];
        }
        if (!empty($filters['gender'])) {
            $filterData['gender'] = $filters['gender'];
        }
        if (!empty($filters['country']) || !empty($filters['state']) || !empty($filters['city']) || !empty($filters['postal_code'])) {
            $filterData['location'] = [
                'country' => $filters['country'] ?? null,
                'state' => $filters['state'] ?? null,
                'city' => $filters['city'] ?? null,
                'postal_code' => $filters['postal_code'] ?? null,
            ];
        }
        if (!empty($filters['language'])) {
            $filterData['language'] = $filters['language'];
        }
        if (!empty($filters['purchase_min']) || !empty($filters['purchase_max'])) {
            $filterData['purchase_value'] = [
                'min' => $filters['purchase_min'] ?? null,
                'max' => $filters['purchase_max'] ?? null,
            ];
        }
        if (!empty($filters['orders_min']) || !empty($filters['orders_max'])) {
            $filterData['orders'] = [
                'min' => $filters['orders_min'] ?? null,
                'max' => $filters['orders_max'] ?? null,
            ];
        }

        // Fetch filtered users based on filters
        $query = $userModel->select('user_id');
        if (!empty($filterData['age']['min'])) {
            $query->where('DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(), dob)), "%Y") + 0 >=', $filterData['age']['min']);
        }
        if (!empty($filterData['age']['max'])) {
            $query->where('DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(), dob)), "%Y") + 0 <=', $filterData['age']['max']);
        }
        if (!empty($filterData['gender'])) {
            $query->where('gender', $filterData['gender']);
        }
        if (!empty($filterData['location']['country'])) {
            $query->where('country', $filterData['location']['country']);
        }
        if (!empty($filterData['location']['state'])) {
            $query->where('state', $filterData['location']['state']);
        }
        if (!empty($filterData['location']['city'])) {
            $query->where('city', $filterData['location']['city']);
        }
        if (!empty($filterData['location']['pincode'])) {
            $query->where('pincode', $filterData['location']['pincode']);
        }
        if (!empty($filterData['language'])) {
            $query->where('preferred_language', $filterData['language']);
        }
        if (!empty($filterData['purchase_value']['min'])) {
            $query->where('total_spend >=', $filterData['purchase_value']['min']);
        }
        if (!empty($filterData['purchase_value']['max'])) {
            $query->where('total_spend <=', $filterData['purchase_value']['max']);
        }
        if (!empty($filterData['orders']['min'])) {
            $query->where('total_orders >=', $filterData['orders']['min']);
        }
        if (!empty($filterData['orders']['max'])) {
            $query->where('total_orders <=', $filterData['orders']['max']);
        }

        $filteredUsers = $query->findAll();

        // Prepare filtered user IDs
        $filteredUserIds = array_column($filteredUsers, 'user_id');

        // Prepare data for update
        $data = [
            'segment_name' => $segmentName,
            'segment_description' => $segmentDescription,
            'segment_type' => $segmentType,
            'created_by' => $createdBy,
            'filters' => !empty($filterData) ? json_encode($filterData) : null,
            'filtered_users' => !empty($filteredUserIds) ? implode(',', $filteredUserIds) : null,
        ];

        // Update the database
        if ($segmentModel->update($id, $data)) {
            return redirect()->to('customer_segment_view')->with('success', 'Customer segment updated successfully.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Failed to update customer segment.');
        }
    }

    public function deletesegment($segment_id)
    {
        $segmentModel = new CustomerSegmentModel(); // Load the Segment Model

        // Check if the segment exists
        $segment = $segmentModel->find($segment_id);
        if (!$segment) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Segment not found.']);
        }

        // Delete the segment
        if ($segmentModel->delete($segment_id)) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Segment deleted successfully.']);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to delete segment.']);
        }
    }
}
