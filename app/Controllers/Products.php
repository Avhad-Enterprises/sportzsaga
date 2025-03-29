<?php


namespace App\Controllers;

use CodeIgniter\Database\Config;
use App\Models\Products_model;
use App\Models\brands_model;
use App\Models\tiersmodel;
use App\Models\Footer_model;
use App\Models\CollectionProducts_model;
use App\Models\SocialMediaLinks_model;
use App\Models\Cart_model;
use App\Models\PincodeModel;
use App\Models\TagModel;
use App\Models\Registerusers_model;
use App\Models\RelatedProductModel;
use Google\Cloud\Storage\StorageClient;

class Products extends BaseController
{
    public function index(): string
    {
        $session = session();
        $model = new Products_model();
        $data['pendingreviews'] = $model->CountpendingReviews();

        if ($session->get('admin_type') == 'seller') {
            $seller_id = $session->get('user_id');
            $data['products'] = $model->fetproductsbyseller($seller_id);
        } else {
            $data['products'] = $model->getproductsdata();
        }

        return view('products_view', $data);
    }

    protected $model;
    protected $logger;

    public function __construct()
    {
        $this->model = new Products_model();
        $this->logger = service('logger');
    }

    public function deleteproduct($id)
    {
        $session = session();
        $userId = $session->get('user_id'); // Get logged-in user ID
        $productModel = new Products_model();

        // Find the product by ID
        $product = $productModel->find($id);

        if (!$product) {
            return redirect()->to('admin-products')->with('error', 'Product not found.');
        }

        // Get the current admin details from the session
        $deletedBy = $session->get('admin_name') . '(' . $userId . ')';

        // Perform soft deletion by updating specific fields
        $productModel->update($id, [
            'is_deleted' => 1, // Mark as deleted
            'deleted_by' => $deletedBy, // Track who deleted
            'deleted_at' => date('Y-m-d H:i:s'), // Record timestamp
        ]);

        return redirect()->to('admin-products')->with('success', 'Product deleted successfully.');
    }

    public function deletedproducts()
    {
        $productModel = new Products_model();

        // Fetch all products marked as deleted
        $data['products'] = $productModel->where('is_deleted', 1)->findAll();

        // Return the view with deleted products
        return view('product_deleted', $data);
    }

    public function restoreproduct($id)
    {
        $productModel = new Products_model();

        // Find the product by ID
        $product = $productModel->find($id);

        if (!$product) {
            return redirect()->to('admin-products/deleted')->with('error', 'Product not found.');
        }

        // Restore the product by clearing deletion fields
        $productModel->update($id, [
            'is_deleted' => 0,
            'deleted_by' => null,
            'deleted_at' => null,
        ]);

        return redirect()->to('admin-products')->with('success', 'Product restored successfully.');
    }


    public function exporttoexcel()
    {
        // Load the model
        $model = new Products_model();

        // Retrieve data from the model
        $data = $model->findAll();

        // Load the Spreadsheet class
        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set column headers
        $column = 'A';
        foreach ($data[0] as $key => $value) {
            $sheet->setCellValue($column . '1', $key);
            $column++;
        }

        // Populate data rows
        $row = 2;
        foreach ($data as $row_data) {
            $column = 'A';
            foreach ($row_data as $value) {
                $sheet->setCellValue($column . $row, $value);
                $column++;
            }
            $row++;
        }

        // Set headers
        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $filename = 'Products_data.xlsx';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
    }

    public function importfromexcel()
    {
        return view('import_products_view');
    }

    public function importexceldata()
    {
        // Load the model
        $model = new Products_model();

        // Handle file upload
        $file = $this->request->getFile('product_excel_file');

        // Validate file
        if ($file->isValid() && $file->getExtension() === 'xlsx') {

            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($file->getPathname());

            $worksheet = $spreadsheet->getActiveSheet();

            $headers = [];
            $headerRow = $worksheet->getRowIterator(1)->current();
            foreach ($headerRow->getCellIterator() as $cell) {
                $headers[] = $cell->getValue();
            }

            $data = [];
            $existingSlugs = [];

            foreach ($worksheet->getRowIterator(3) as $row) {
                $rowData = [];
                $cellIterator = $row->getCellIterator();
                $cellIterator->setIterateOnlyExistingCells(false);
                $bulletPoints = [];

                foreach ($cellIterator as $cell) {
                    $columnIndex = $cell->getColumn();
                    $headerIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($columnIndex) - 1;
                    $columnName = $headers[$headerIndex] ?? null;

                    if ($columnName !== null) {
                        $cellValue = $cell->getValue();

                        if (in_array($columnName, ['cost_price', 'selling_price', 'compare_at_price'])) {
                            $cellValue = preg_replace('/[^0-9.]/', '', $cellValue);
                        }

                        $columnNumber = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($columnIndex);
                        if ($columnNumber >= 22 && $columnNumber <= 26) {
                            if (!empty($cellValue)) {
                                $bulletPoints[] = trim($cellValue);
                            }
                        } else {
                            $rowData[$columnName] = $cellValue;
                        }
                    }
                }

                if (empty($rowData['product_title'])) {
                    continue;
                }

                $rowData['product_status'] = $rowData['product_status'] ?? 'inactive';
                $rowData['sales_channel'] = $rowData['sales_channel'] ?? 'online store';

                if (isset($rowData['product_title'])) {
                    $rowData['url'] = $this->generateSlug($rowData['product_title'], $model, $existingSlugs);
                    $rowData['meta_tag_title'] = $this->generateMetaTagTitle($rowData['product_title']);
                }
                if (isset($rowData['product_description'])) {
                    $rowData['meta_tag_description'] = $this->generateMetaTagDescription($rowData['product_description']);
                }

                // Store bullet points as JSON if there are any non-empty values
                if (!empty($bulletPoints)) {
                    $rowData['bullet_points'] = json_encode(array_filter($bulletPoints, 'trim'));
                } else {
                    $rowData['bullet_points'] = null;
                }

                // Add the generated URL to the batch tracking
                $existingSlugs[] = $rowData['url'];

                $data[] = $rowData;
            }

            // Insert all products at once
            $model->insertProductsExcelData($data);

            return redirect()->to('admin-products')->with('success', 'Bulk Products Added successfully.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Error.');
        }
    }

    private function generateSlug($title, $model, &$existingSlugs = [])
    {
        // Basic slug generation
        $slug = strtolower(trim($title));
        $slug = preg_replace('/\s*-\s*/', '-', $slug);
        $slug = preg_replace('/[^a-z0-9-]+/', '-', $slug);
        $slug = preg_replace('/-+/', '-', $slug);
        $slug = rtrim($slug, '-');

        // Check for duplicates within the current batch
        $baseSlug = $slug;
        $suffix = 1;

        // First, check if this slug exists in the current batch
        while (in_array($slug, $existingSlugs)) {
            $slug = $baseSlug . '_' . $suffix;
            $suffix++;
        }

        // Then, check if this slug exists in the database
        while ($model->where('url', $slug)->countAllResults() > 0) {
            $slug = $baseSlug . '_' . $suffix;
            $suffix++;
        }

        // Add the final slug to the existingSlugs array for tracking
        $existingSlugs[] = $slug;

        return $slug;
    }

    private function generateMetaTagTitle($title)
    {
        return ucwords($title);
    }

    private function generateMetaTagDescription($description)
    {
        return substr($description, 0, 160);
    }

    public function addnewproducts()
    {
        $tiersmodel = new tiersmodel();
        $brandModel = new brands_model();
        $model = new Products_model();
        $tagModel = new TagModel();
        $userModel = new Registerusers_model();

        // Get all the required data
        $data['tiers'] = $tiersmodel->getAllTiers();
        $data['brands'] = $brandModel->getBrands();
        $data['collections'] = $model->getcollectionsdata();
        $data['users'] = $userModel->findAll();

        // Fetch all tags
        $data['tags'] = $tagModel->where('tag_name', 'Products')->findAll();

        // Fetch All Products
        $allProducts = $model->getproductsdata();
        $data['all_products'] = $allProducts;

        return view('addnew_products_view', $data);
    }
    

    public function check_sku()
    {
        $sku = $this->request->getPost('sku');

        $productModel = new Products_model();

        // Check if SKU exists in the database
        $exists = $productModel->where('sku', $sku)->countAllResults() > 0;

        return $this->response->setJSON(['exists' => $exists]);
    }

    public function publishProduct()
    {
        $model = new Products_model();
        $session = session();
        $userId = $session->get('user_id'); // Get logged-in user ID

        // Initialize Google Cloud Storage client
        $storage = new \Google\Cloud\Storage\StorageClient([
            'keyFilePath' => WRITEPATH . 'public/mkvgsc.json',
            'projectId' => 'peak-tide-441609-r1',
        ]);

        $bucketName = 'mkv_imagesbackend';
        $bucket = $storage->bucket($bucketName);

        // Get dimensions & weight
        $length = trim($this->request->getPost('length'));
        $breadth = trim($this->request->getPost('breadth'));
        $height = trim($this->request->getPost('height'));
        $weight = trim($this->request->getPost('weight'));

        // Handle primary product image
        $primaryImage = null;
        $primaryImageFile = $this->request->getFile('product-image');
        if ($primaryImageFile && $primaryImageFile->isValid() && !$primaryImageFile->hasMoved()) {
            $imageName = 'products/' . uniqid() . '_' . $primaryImageFile->getClientName();
            $imageTempPath = $primaryImageFile->getTempName();
            $bucket->upload(
                fopen($imageTempPath, 'r'),
                [
                    'name' => $imageName,
                    'predefinedAcl' => 'publicRead',
                ]
            );
            $primaryImage = sprintf('https://storage.googleapis.com/%s/%s', $bucketName, $imageName);
        }

        // Handle additional images
        $additionalImages = [];
        $moreImages = $this->request->getFileMultiple('product_images');
        if ($moreImages) {
            foreach ($moreImages as $image) {
                if ($image->isValid() && !$image->hasMoved()) {
                    $imageName = 'products/more_images/' . uniqid() . '_' . $image->getClientName();
                    $imageTempPath = $image->getTempName();
                    $bucket->upload(
                        fopen($imageTempPath, 'r'),
                        [
                            'name' => $imageName,
                            'predefinedAcl' => 'publicRead',
                        ]
                    );
                    $additionalImages[] = sprintf('https://storage.googleapis.com/%s/%s', $bucketName, $imageName);
                }
            }
        }

        // Prepare product URL & Check for duplicates
        $url = trim($this->request->getPost('url'));
        if ($model->where('url', $url)->countAllResults() > 0) {
            return redirect()->back()->with('error', 'The URL is already in use. Please use a different URL.');
        }

        // Prepare FAQs
        $faqQuestions = $this->request->getPost('faq_question');
        $faqAnswers = $this->request->getPost('faq_answer');
        $faqs = [];
        if ($faqQuestions && $faqAnswers) {
            foreach ($faqQuestions as $index => $question) {
                if (!empty($question) && isset($faqAnswers[$index]) && !empty($faqAnswers[$index])) {
                    $faqs[] = ['question' => $question, 'answer' => $faqAnswers[$index]];
                }
            }
        }

        // Prepare Bullet Points as JSON
        $bulletPoints = $this->request->getPost('product-bullet-points');
        $bulletPointsJson = !empty($bulletPoints) ? json_encode(array_filter(explode(',', $bulletPoints))) : null;

        // Fetch selected tags & convert to JSON
        $productsTags = $this->request->getPost('product-tags');
        $productsTagsJson = !empty($productsTags) ? json_encode($productsTags) : json_encode([]);

        // Prepare product data for insertion
        $data = [
            'product_title' => trim($this->request->getPost('product-name')),
            'amz_product_id' => trim($this->request->getPost('amz_product_id')),
            'secondary_title' => trim($this->request->getPost('second-name')),
            'product_description' => trim($this->request->getPost('product-description')),
            'short_description' => trim($this->request->getPost('product-short-description')),
            'product_status' => trim($this->request->getPost('product-status')),
            'cost_price' => trim($this->request->getPost('cost-price')),
            'selling_price' => trim($this->request->getPost('selling-price')),
            'compare_at_price' => trim($this->request->getPost('compare-at-price')),
            'sku' => trim($this->request->getPost('sku')),
            'barcode' => trim($this->request->getPost('barcode')),
            'inventory' => trim($this->request->getPost('total_inventory')),
            'length' => $length,
            'breadth' => $breadth,
            'height' => $height,
            'weight' => $weight,
            'product_image' => $primaryImage,
            'tier_1' => trim($this->request->getPost('tier-1')),
            'tier_2' => trim($this->request->getPost('tier-2')),
            'tier_3' => trim($this->request->getPost('tier-3')),
            'tier_4' => trim($this->request->getPost('tier-4')),
            'url' => trim($this->request->getPost('url')),
            'delist' => trim($this->request->getPost('delist')),
            'product_tags' => $productsTagsJson,
            'meta_tag_title' => trim($this->request->getPost('meta-tag')),
            'meta_tag_description' => trim($this->request->getPost('meta-description')),
            'gift_wrap' => trim($this->request->getPost('gift_wrap')),
            'label' => trim($this->request->getPost('product-label')),
            'label_color' => trim($this->request->getPost('label_color')),
            'more_images' => json_encode($additionalImages),
            'publish_date_and_time' => $this->request->getPost('publish_date_and_time'),
            'end_date_and_time' => $this->request->getPost('end_date_and_time'),
            'recurrence' => $this->request->getPost('recurrence'),
            'publish_for' => $this->request->getPost('publish_for'),
            'sales_channel' => $this->request->getPost('sales-channel'),
            'faqs' => json_encode($faqs),
            'product_variant' => $this->request->getPost('selected_variants'),
            'accessories' => $this->request->getPost('accessories-checked'),
            'accessories_includes' => $this->request->getPost('product-include'),
            'size' => $this->request->getPost('product-size'),
            'bullet_points' => $bulletPointsJson,
            'added_by' => $userId, // Store the user who added it
            'created_at' => date('Y-m-d H:i:s') // Store creation timestamp
        ];

        // Insert the new product into the database
        if ($model->addNewProduct($data)) {
            return redirect()->to('admin-products')->with('success', 'Product added successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to add product.');
        }
    }


    public function editproduct($id)
    {
        $model = new Products_model();
        $tiersmodel = new tiersmodel();
        $tagModel = new TagModel();

        // Fetch all tags
        $data['tags'] = $tagModel->where('tag_name', 'Products')->findAll();

        // Fetch product details
        $data['products'] = $model->editproductmodel($id);

        if (empty($data['products'])) {
            return redirect()->to('admin_products')->with('error', 'Product not found.');
        }

        // Fetch tiers
        $tier1id = $data['products'][0]['tier_1'];
        $tier2id = $data['products'][0]['tier_2'];
        $tier3id = $data['products'][0]['tier_3'];
        $tier4id = $data['products'][0]['tier_4'];

        $data['tier_1'] = $tiersmodel->gettierbyid($tier1id);
        $data['tier_2'] = $tiersmodel->gettiersbyid($tier2id);
        $data['tier_3'] = $tiersmodel->gettiertbyid($tier3id);
        $data['tier_4'] = $tiersmodel->gettiersfbyid($tier4id);

        // Fetch all tiers
        $data['tiers'] = $tiersmodel->getAllTiers();

        // Fetch pre-selected tiers for the product
        $data['selected_tiers'] = [
            'tier_1' => $data['products'][0]['tier_1'] ?? null,
            'tier_2' => $data['products'][0]['tier_2'] ?? null,
            'tier_3' => $data['products'][0]['tier_3'] ?? null,
            'tier_4' => $data['products'][0]['tier_4'] ?? null,
        ];

        // Fetch all products for dropdown
        $data['all_products'] = $model->getAllProducts();

        // Fetch bullet points (if available)
        if (!empty($data['products'][0])) {
            $product = $data['products'][0];
            $data['bullet_points'] = $product['bullet_points'] ?? '';
        } else {
            $data['bullet_points'] = '';
        }

        return view('edit_products_view', $data);
    }


    public function updateProduct($id)
    {
        $model = new Products_model();
        $session = session();
        $userId = $session->get('user_id'); // Get logged-in user ID

        // Fetch the existing product
        $existingProduct = $model->find($id);

        if (!$existingProduct) {
            return redirect()->to('admin-products')->with('error', 'Product not found.');
        }

        // Initialize Google Cloud Storage client
        $storage = new \Google\Cloud\Storage\StorageClient([
            'keyFilePath' => WRITEPATH . 'public/mkvgsc.json',
            'projectId' => 'peak-tide-441609-r1',
        ]);

        $bucketName = 'mkv_imagesbackend';
        $bucket = $storage->bucket($bucketName);

        // Prepare weight information
        $length = $this->request->getPost('length_num');
        $breadth = $this->request->getPost('breadth_num');
        $height = $this->request->getPost('height_num');
        $weight = $this->request->getPost('weight_num');

        // Check if URL is already present for another product
        $url = $this->request->getPost('url');
        if ($model->where('url', $url)->where('product_id !=', $id)->countAllResults() > 0) {
            return redirect()->back()->with('error', 'The URL is already in use. Please use a different URL.');
        }

        // Fetch the selected tags from the form
        $productsTags = $this->request->getPost('product-tags');
        $productsTagsJson = !empty($productsTags) ? json_encode($productsTags) : json_encode([]);

        // Prepare product data for update
        $newData = [
            'product_title' => $this->request->getPost('product-name'),
            'amz_product_id' => trim($this->request->getPost('amz_product_id')),
            'secondary_title' => $this->request->getPost('second-name'),
            'barcode' => $this->request->getPost('barcode'),
            'product_description' => $this->request->getPost('product-description'),
            'short_description' => $this->request->getPost('product-short-description'),
            'product_status' => $this->request->getPost('product-status'),
            'cost_price' => $this->request->getPost('cost-price'),
            'selling_price' => $this->request->getPost('selling-price'),
            'compare_at_price' => $this->request->getPost('compare-at-price'),
            'sku' => $this->request->getPost('sku'),
            'inventory' => $this->request->getPost('total_inventory'),
            'length' => $length,
            'breadth' => $breadth,
            'height' => $height,
            'weight' => $weight,
            'sales_channel' => $this->request->getPost('sales-channel'),
            'tier_1' => $this->request->getPost('tier-1'),
            'tier_2' => $this->request->getPost('tier-2'),
            'tier_3' => $this->request->getPost('tier-3'),
            'tier_4' => $this->request->getPost('tier-4'),
            'url' => $this->request->getPost('url'),
            'product_tags' => $productsTagsJson,
            'meta_tag_title' => $this->request->getPost('meta-tag'),
            'meta_tag_description' => $this->request->getPost('meta-description'),
            'label' => $this->request->getPost('product_label'),
            'gift_wrap' => $this->request->getPost('gift_wrap'),
            'product_variant' => $this->request->getPost('selected_variants'),
            'accessories' => $this->request->getPost('accessories-checked'),
            'accessories_includes' => $this->request->getPost('product-include'),
            'size' => $this->request->getPost('product-size'),
            'updated_by' => $session->get('admin_name') . ' (' . $session->get('user_id') . ')',
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        // ✅ Handle product image upload
        $image = $this->request->getFile('product-new-image');
        if ($image && $image->isValid() && !$image->hasMoved()) {
            $imageName = 'products/' . uniqid() . '_' . $image->getClientName();
            $bucket->upload(fopen($image->getTempName(), 'r'), [
                'name' => $imageName,
                'predefinedAcl' => 'publicRead',
            ]);
            $newData['product_image'] = sprintf('https://storage.googleapis.com/%s/%s', $bucketName, $imageName);
        } else {
            $newData['product_image'] = $existingProduct['product_image'];
        }

        // ✅ Track changes
        $changes = [];
        foreach ($newData as $key => $value) {
            if ($existingProduct[$key] != $value) {
                $changes[$key] = [
                    'old' => $existingProduct[$key],
                    'new' => $value
                ];
            }
        }

        if (!empty($changes)) {
            // Retrieve existing change log
            $existingChangeLog = json_decode($existingProduct['change_log'] ?? '[]', true);
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

        // ✅ Handle Bullet Points
        $bulletPoints = $this->request->getPost('product-bullet-points');
        if (!empty($bulletPoints)) {
            $bulletPointsJson = is_array($bulletPoints) ? json_encode(array_filter($bulletPoints)) : json_encode(array_filter(explode(',', $bulletPoints)));
            $newData['bullet_points'] = $bulletPointsJson;
        }

        // ✅ Handle FAQs
        $faqQuestions = $this->request->getPost('faq_question');
        $faqAnswers = $this->request->getPost('faq_answer');
        if (!empty($faqQuestions) && !empty($faqAnswers)) {
            $faqs = [];
            foreach ($faqQuestions as $index => $question) {
                $faqs[] = [
                    'question' => $question,
                    'answer' => $faqAnswers[$index]
                ];
            }
            $newData['faqs'] = json_encode($faqs);
        }

        // ✅ Handle additional images
        $existingImages = json_decode($existingProduct['more_images'], true) ?? [];
        $currentImages = $this->request->getPost('current_images') ?? [];
        $removedImages = json_decode($this->request->getPost('removed_images'), true) ?? [];
        $newImages = [];

        $uploadedFiles = $this->request->getFiles();
        if (!empty($uploadedFiles['additional_images'])) {
            foreach ($uploadedFiles['additional_images'] as $file) {
                if ($file->isValid() && !$file->hasMoved()) {
                    $imageName = 'products/' . uniqid() . '_' . $file->getClientName();
                    $bucket->upload(fopen($file->getTempName(), 'r'), [
                        'name' => $imageName,
                        'predefinedAcl' => 'publicRead',
                    ]);
                    $newImages[] = sprintf('https://storage.googleapis.com/%s/%s', $bucketName, $imageName);
                }
            }
        }

        // Update `more_images` column
        $finalImages = array_unique(array_merge(array_diff($existingImages, $removedImages), $currentImages, $newImages));
        $newData['more_images'] = json_encode($finalImages);

        // Update the product in the database
        if ($model->update($id, $newData)) {
            return redirect()->to('admin-products')->with('success', 'Product updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to update product.');
        }
    }


    public function viewproduct($slug)
    {
        $model = new Products_model();
        $socialMediaModel = new SocialMediaLinks_model();
        $footerModel = new Footer_model();
        $tiersmodel = new tiersmodel();
        $cartCount = $this->getCartCount();

        $data['cartCount'] = $cartCount;

        // Fetch the product by slug
        $product = $model->getProductBySlug($slug);

        if (empty($product)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data['products'] = $product;

        // Fetch Tier 1 data
        $tier1id = $data['products']['tier_1'];
        $data['tier1id'] = $tiersmodel->gesttier1data($tier1id);
        $tier2id = $data['products']['tier_2'];
        $data['tier2id'] = $tiersmodel->gesttier2data($tier2id);
        $tier3id = $data['products']['tier_3'];
        $data['tier3id'] = $tiersmodel->gesttier3data($tier3id);
        $tier4id = $data['products']['tier_4'];
        $data['tier4id'] = $tiersmodel->gesttier4data($tier4id);
        $data['footerLinks'] = $footerModel->getfooterdata();
        $data['socialMediaLinks'] = $socialMediaModel->findAll();
        $data['meta_title'] = $product['meta_tag_title'] ?? 'Default Title';
        $data['meta_description'] = $product['meta_tag_description'] ?? 'Default Description';
        return view('view_products_view', $data);
    }






























    //  <!------------------------------------------------------------- Collections --------------------------------------------------------------------

    public function collections()
    {
        $model = new Products_model();
        $data['collections'] = $model->getcollectionsdata();
        return view('collections_view', $data);
    }

    public function deletecollection($id)
    {
        $session = session();
        $userId = $session->get('user_id'); // Get logged-in user ID

        // Retrieve the collection details
        $collection = $this->model->getCollectionById($id);

        if (!$collection) {
            return redirect()->to('collection')->with('error', 'Collection not found.');
        }

        // Save the admin name and ID
        $deletedBy = $session->get('admin_name') . ' (' . $userId . ')';

        // Perform soft deletion by updating fields
        $this->model->updateCollection($id, [
            'is_deleted' => 1, // Mark as deleted
            'deleted_by' => $deletedBy, // Track who deleted
            'deleted_at' => date('Y-m-d H:i:s'), // Record timestamp
        ]);

        return redirect()->to('collections')->with('success', 'Collection deleted successfully.');
    }

    public function deletedcollections()
    {
        $data['collection'] = $this->model->getDeletedCollections();
        return view('collection_deleted', $data);
    }


    public function restorecollection($id)
    {
        $db = \Config\Database::connect(); // Connect to the database

        // Check if the collection exists
        $collection = $db->table('collection')->where('collection_id', $id)->get()->getRowArray();

        if (!$collection) {
            return redirect()->to('collections/deleted')->with('error', 'Collection not found.');
        }

        // Restore the collection by updating the `is_deleted` field
        $updated = $db->table('collection')->where('collection_id', $id)->update([
            'is_deleted' => 0,
            'deleted_by' => null,
            'deleted_at' => null,
        ]);

        if ($updated) {
            return redirect()->to('collections')->with('success', 'Collection restored successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to restore collection.');
        }
    }

    public function collection_change_logs($id = null)
    {
        $db = \Config\Database::connect();

        if ($id === null) {
            return view('edit_collection_logs_view', ['updates' => []]); // No bundle ID provided
        }

        // Fetch bundle details
        $query = $db->table('collection')->select('change_log')->where('collection_id', $id)->get();
        $row = $query->getRow();

        if ($row) {
            $decodedData = json_decode($row->change_log, true);

            if (!is_array($decodedData)) {
                return view('edit_collection_logs_view', ['updates' => []]); // Return empty if decoding fails
            }

            $updates = [];

            foreach ($decodedData as $key => $log) {
                // Extract only numeric keys (0, 1, 2, ...)
                if (is_numeric($key) && isset($log['timestamp'])) {
                    $updates[] = [
                        'updated_by' => $log['updated_by'] ?? 'Unknown',
                        'updated_at' => $log['timestamp'], // Fix: Use 'timestamp' instead of 'updated_at'
                        'changes' => $log['changes'] ?? [],
                    ];
                }
            }

            return view('edit_collection_logs_view', ['updates' => $updates]);
        }

        return view('edit_collection_logs_view', ['updates' => []]); // No logs found
    }


    public function getcollectionChangeLogs()
    {
        $db = \Config\Database::connect();
        $query = $db->table('collection')->select('change_log')->get();
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
















    //------------------------------------------------------------------------------------- Tags -----------------------------------------------------------------------------------

    public function addtags($id)
    {
        $model = new Products_model();
        $data['collections'] = $model->editcollectionmodel($id);
        $data['tags'] = $model->select('product_tags')->distinct()->findAll();
        return view('add_tags_view', $data);
    }

    public function publishtags($id)
    {
        $model = new Products_model();

        $data = [
            'product_tags' => $this->request->getPost('tag'),
        ];

        $model->updatecolldata($data, $id);
        return redirect()->to('collections');
    }

    public function addnewcollection()
    {
        $model = new Products_model();
        $userModel = new Registerusers_model();

        // Fetch all users
        $data['users'] = $userModel->findAll();

        $data['fields'] = ['product_title', 'product_tags', 'selling_price'];
        return view('addnew_collections_view', $data);
    }

    public function getDistinctFieldValues() //
    {
        $model = new Products_model();
        $field = $this->request->getGet('field');
        $values = $model->getDistinctFieldValues($field);
        return $this->response->setJSON($values);
    }

    public function saveConditions()
    {
        $model = new Products_model();
        $conditions = $this->request->getPost('conditions');
        $collectionId = $this->request->getPost('collection_id');
        $result = $model->saveConditions($collectionId, $conditions);
        return $this->response->setJSON(['success' => $result]);
    }

    public function getConditions($collectionId) //
    {
        $model = new Products_model();
        $conditions = $model->getConditions($collectionId);
        return $this->response->setJSON($conditions);
    }

    public function getProductDates()
    {
        $productIds = $this->request->getGet('ids');
        $model = new Products_model();
        $dates = $model->getProductCreationDates($productIds);
        return $this->response->setJSON($dates);
    }

    public function getAllProducts()
    {
        $model = new Products_model();
        $products = $model->findAll();
        return $this->response->setJSON($products);
    }

    public function getProductsByConditions() //
    {
        try {
            $conditions = json_decode($this->request->getPost('conditions'), true);
            $conditionType = $this->request->getPost('conditionType');
            $sortBy = $this->request->getPost('sortBy');

            if (empty($conditions)) {
                throw new \Exception('No conditions provided');
            }

            $products = $this->model->getProductsByConditions($conditions, $conditionType, $sortBy);

            if (empty($products)) {
                return $this->response->setJSON(['products' => [], 'message' => 'No products found']);
            }

            return $this->response->setJSON(['products' => $products]);
        } catch (\Exception $e) {
            return $this->response->setJSON(['error' => $e->getMessage()])->setStatusCode(500);
        }
    }

    public function publishCollection()
    {
        $this->logger->info('publishCollection method called');

        $session = session();
        $userId = $session->get('user_id'); // Get logged-in user ID

        $storage = new StorageClient([
            'keyFilePath' => WRITEPATH . 'public/mkvgsc.json',
            'projectId' => 'peak-tide-441609-r1',
        ]);
        $bucketName = 'mkv_imagesbackend';
        $bucket = $storage->bucket($bucketName);

        // Handling PC and Mobile images
        $newImageName = null;
        $newmobImageName = null;

        $image = $this->request->getFile('collection-pc-image');
        if ($image && $image->isValid() && !$image->hasMoved()) {
            $imageName = $image->getClientName();
            $imageTempPath = $image->getTempName();
            $bucket->upload(
                fopen($imageTempPath, 'r'),
                [
                    'name' => 'collections/pc/' . $imageName,
                    'predefinedAcl' => 'publicRead',
                ]
            );
            $newImageName = sprintf('https://storage.googleapis.com/%s/collections/pc/%s', $bucketName, $imageName);
            $this->logger->info('PC Image uploaded: ' . $newImageName);
        }

        $mobImage = $this->request->getFile('collection-mob-image');
        if ($mobImage && $mobImage->isValid() && !$mobImage->hasMoved()) {
            $mobImageName = $mobImage->getClientName();
            $mobImageTempPath = $mobImage->getTempName();
            $bucket->upload(
                fopen($mobImageTempPath, 'r'),
                [
                    'name' => 'collections/mobile/' . $mobImageName,
                    'predefinedAcl' => 'publicRead',
                ]
            );
            $newmobImageName = sprintf('https://storage.googleapis.com/%s/collections/mobile/%s', $bucketName, $mobImageName);
            $this->logger->info('Mobile Image uploaded: ' . $newmobImageName);
        }

        // Handling Collouts
        $colloutTitle = $this->request->getPost('collout_title');
        $colloutImage = $this->request->getFile('collout_image');
        $colloutLink = $this->request->getPost('collout_link');

        $colloutImageName = null;
        if ($colloutImage && $colloutImage->isValid() && !$colloutImage->hasMoved()) {
            $colloutImgName = $colloutImage->getClientName();
            $colloutImgTempPath = $colloutImage->getTempName();
            $bucket->upload(
                fopen($colloutImgTempPath, 'r'),
                [
                    'name' => 'collections/collouts/' . $colloutImgName,
                    'predefinedAcl' => 'publicRead',
                ]
            );
            $colloutImageName = sprintf('https://storage.googleapis.com/%s/collections/collouts/%s', $bucketName, $colloutImgName);
            $this->logger->info('Collout Image uploaded: ' . $colloutImageName);
        }

        // Collecting and logging other data
        $selectMethod = $this->request->getPost('selectMethod');
        $conditions = json_decode($this->request->getPost('conditions'), true);
        $conditionType = $this->request->getPost('conditionType');
        $sortBy = $this->request->getPost('sortBy');

        // Retrieve product IDs based on the selection method
        if ($selectMethod === 'automated') {
            $productIds = $this->model->getProductsByConditions($conditions, $conditionType, $sortBy);
            $productIds = array_column($productIds, 'product_id');
        } else if ($selectMethod === 'manual') {
            $productIds = $this->request->getPost('products') ?? [];
        }

        $this->logger->info('Product IDs: ' . json_encode($productIds));

        if (empty($productIds)) {
            throw new \Exception('No products selected.');
        }

        // Preparing collection data
        $data = [
            'collection_title' => $this->request->getPost('collection-name'),
            'product_ids' => implode(',', $productIds),
            'sort_method' => $sortBy,
            'select_method' => $selectMethod,
            'collection_conditions' => json_encode([
                'conditions' => $conditions,
                'conditionType' => $conditionType
            ]),
            'collection_description' => $this->request->getPost('collection-description'),
            'url' => $this->request->getPost('collection-url'),
            'collection_pc_image' => $newImageName,
            'collection_mob_image' => $newmobImageName,
            'collection_type' => $this->request->getPost('collection_type'),
            'meta_tag_title' => $this->request->getPost('collection-meta-title'),
            'coll_meta_tag_description' => $this->request->getPost('collection-meta-description'),
            'collection_visibility' => $this->request->getPost('visibility'),
            'publish_date_and_time' => $this->request->getPost('publish_date_and_time'),
            'end_date_and_time' => $this->request->getPost('end_date_and_time'),
            'recurrence' => $this->request->getPost('recurrence'),
            'publish_for' => $this->request->getPost('publish_for'),
            'collout_title' => $colloutTitle,
            'collout_image' => $colloutImageName,
            'collout_link' => $colloutLink,
            'added_by' => $userId, // ✅ Store User ID who created the collection
            'created_at' => date('Y-m-d H:i:s') // ✅ Save Timestamp
        ];

        // Insert the data and return response
        $collectionId = $this->model->addNewCollectiondata($data);
        return $this->response->setJSON(['success' => true, 'collection_id' => $collectionId]);
    }


    public function getSelectedProducts($collectionId)
    {
        $productModel = new Products_model();

        // Fetch collection by collectionId
        $collection = $productModel->getCollection($collectionId);

        // Ensure the collection exists and has 'product_ids'
        if (!$collection || empty($collection['product_ids'])) {
            return $this->response->setJSON(['error' => 'Collection not found or no products associated']);
        }

        // Split the product_ids string into an array
        $productIds = explode(',', $collection['product_ids']);

        // Fetch the products by the product IDs
        $selectedProducts = $productModel->getProductsByIds($productIds);

        // Return the selected products as JSON
        return $this->response->setJSON(['products' => $selectedProducts]);
    }

    public function getProductsByIds()
    {
        $productModel = new Products_model();

        // Get the POST data and decode it (assuming it's sent as JSON)
        $productIds = $this->request->getPost('productIds');

        // Check if productIds is an array and not empty
        if (!is_array($productIds) || empty($productIds)) {
            return $this->response->setJSON(['error' => 'Invalid product IDs']);
        }

        // Get products by IDs from the model
        $selectedProducts = $productModel->getProductsByIds($productIds);

        // Return the selected products as a JSON response
        return $this->response->setJSON(['products' => $selectedProducts]);
    }

    public function editCollection($id)
    {
        $model = new Products_model();
        $data['collection'] = $model->getCollection($id);

        // Ensure the collection_conditions are passed correctly
        $data['collection']['collection_conditions'] = json_decode($data['collection']['collection_conditions'], true);

        // Decode the sort order
        $sortOrder = json_decode($data['collection']['sort_method'], true) ?: [];

        // Get condition type (assuming it's stored in the collection data)
        $conditionType = $data['collection']['condition_type'] ?? 'all';

        // Get all products that match the conditions
        $matchingProducts = $model->geteditProductsByConditions(
            $data['collection']['collection_conditions'],
            $conditionType,
            null // We'll handle sorting manually
        );

        // Sort the products according to the saved order
        $sortedProducts = $this->sortProductsByOrder($matchingProducts, $sortOrder);

        // Get new matching products that aren't in the sort order
        $newMatchingProducts = $this->getNewMatchingProducts($matchingProducts, $sortOrder);

        // Combine sorted products with new matching products
        $finalProductList = array_merge($sortedProducts, $newMatchingProducts);

        $data['products'] = $finalProductList;
        $data['sortOrder'] = $sortOrder; // Pass the sort order to the view

        // Define the available fields
        $data['fields'] = ['product_title', 'product_tags', 'selling_price'];

        // Load users for the publish_for dropdown
        $usersModel = new Registerusers_model();
        $data['users'] = $usersModel->getAllUsers();

        return view('edit_collections_view', $data);
    }

    private function sortProductsByOrder($products, $sortOrder)
    {
        // Create a map of products indexed by their IDs
        $productMap = array_column($products, null, 'product_id');

        $sortedProducts = [];

        // First, add products in the order specified by $sortOrder
        foreach ($sortOrder as $productId) {
            if (isset($productMap[$productId])) {
                $sortedProducts[] = $productMap[$productId];
                unset($productMap[$productId]);
            }
        }

        // Then, add any remaining products that weren't in $sortOrder
        foreach ($productMap as $product) {
            $sortedProducts[] = $product;
        }

        return $sortedProducts;
    }

    private function getNewMatchingProducts($matchingProducts, $sortOrder)
    {
        return array_filter($matchingProducts, function ($product) use ($sortOrder) {
            return !in_array($product['product_id'], $sortOrder);
        });
    }

    public function updateCollection($collectionId)
    {
        $this->logger->info('updateCollection method called for collection ID: ' . $collectionId);

        try {
            $session = session();
            $userId = $session->get('user_id'); // Get logged-in user ID

            // Retrieve the collection
            $collection = $this->model->getCollectionById($collectionId);
            if (!$collection) {
                throw new \Exception('Collection not found.');
            }

            // Initialize Google Cloud Storage
            $storage = new StorageClient([
                'keyFilePath' => WRITEPATH . 'public/mkvgsc.json',
                'projectId' => 'peak-tide-441609-r1',
            ]);
            $bucketName = 'mkv_imagesbackend';
            $bucket = $storage->bucket($bucketName);

            // Handle images
            $newImageName = $collection['collection_pc_image'];
            $newmobImageName = $collection['collection_mob_image'];
            $newColloutImageName = $collection['collout_image'] ?? '';

            $image = $this->request->getFile('collection-pc-image');
            if ($image && $image->isValid() && !$image->hasMoved()) {
                $imageName = $image->getClientName();
                $imageTempPath = $image->getTempName();
                $bucket->upload(
                    fopen($imageTempPath, 'r'),
                    [
                        'name' => 'collections/pc/' . $imageName,
                        'predefinedAcl' => 'publicRead',
                    ]
                );
                $newImageName = sprintf('https://storage.googleapis.com/%s/collections/pc/%s', $bucketName, $imageName);
            }

            $mobImage = $this->request->getFile('collection-mob-image');
            if ($mobImage && $mobImage->isValid() && !$mobImage->hasMoved()) {
                $mobImageName = $mobImage->getClientName();
                $mobImageTempPath = $mobImage->getTempName();
                $bucket->upload(
                    fopen($mobImageTempPath, 'r'),
                    [
                        'name' => 'collections/mobile/' . $mobImageName,
                        'predefinedAcl' => 'publicRead',
                    ]
                );
                $newmobImageName = sprintf('https://storage.googleapis.com/%s/collections/mobile/%s', $bucketName, $mobImageName);
            }

            $colloutImage = $this->request->getFile('collout_image');
            if ($colloutImage && $colloutImage->isValid() && !$colloutImage->hasMoved()) {
                $colloutImgName = $colloutImage->getClientName();
                $colloutImgTempPath = $colloutImage->getTempName();
                $bucket->upload(
                    fopen($colloutImgTempPath, 'r'),
                    [
                        'name' => 'collections/collouts/' . $colloutImgName,
                        'predefinedAcl' => 'publicRead',
                    ]
                );
                $newColloutImageName = sprintf('https://storage.googleapis.com/%s/collections/collouts/%s', $bucketName, $colloutImgName);
            }

            // Handle selection method
            $selectMethod = $this->request->getPost('selectMethod');
            $conditions = json_decode($this->request->getPost('conditions'), true);
            $conditionType = $this->request->getPost('conditionType');
            $sortBy = $this->request->getPost('sortBy');

            $productIds = [];
            if ($selectMethod === 'automated') {
                $productIds = $this->model->getProductsByConditions($conditions, $conditionType, $sortBy);
                $productIds = array_column($productIds, 'product_id');
            } elseif ($selectMethod === 'manual') {
                $productIds = $this->request->getPost('products') ?? [];
            }

            if (empty($productIds)) {
                throw new \Exception('No products selected.');
            }

            $publishDateTime = $this->request->getPost('publish_date_and_time');
            $endDateTime = $this->request->getPost('end_date_and_time');
            $recurrence = $this->request->getPost('recurrence');
            $publishFor = $this->request->getPost('publish_for');

            // Prepare data for update
            $newData = [
                'collection_title' => $this->request->getPost('collection-name'),
                'product_ids' => implode(',', $productIds),
                'sort_method' => $sortBy,
                'select_method' => $selectMethod,
                'collection_conditions' => json_encode([
                    'conditions' => $conditions,
                    'conditionType' => $conditionType,
                ]),
                'collection_description' => $this->request->getPost('collection-description'),
                'url' => $this->request->getPost('collection-url'),
                'collection_pc_image' => $newImageName,
                'collection_mob_image' => $newmobImageName,
                'collection_type' => $this->request->getPost('collection_type'),
                'meta_tag_title' => $this->request->getPost('collection-meta-title'),
                'coll_meta_tag_description' => $this->request->getPost('collection-meta-description'),
                'collection_visibility' => $this->request->getPost('visibility'),

                // Additional Fields
                'collout_title' => $this->request->getPost('collout_title'),
                'collout_image' => $newColloutImageName,
                'collout_link' => $this->request->getPost('collout_link'),

                'publish_date_and_time' => $publishDateTime,
                'end_date_and_time' => $endDateTime,
                'recurrence' => $recurrence,
                'publish_for' => $publishFor,
                'updated_by' => $userId, // ✅ Save User ID Who Updated
                'updated_at' => date('Y-m-d H:i:s'), // ✅ Save Update Timestamp
            ];

            // ✅ Track changes in `change_log`
            $changes = [];
            foreach ($newData as $key => $value) {
                if ($collection[$key] != $value) {
                    $changes[$key] = [
                        'old' => $collection[$key],
                        'new' => $value
                    ];
                }
            }

            if (!empty($changes)) {
                // Retrieve existing change log
                $existingChangeLog = json_decode($collection['change_log'] ?? '[]', true);
                if (!is_array($existingChangeLog)) {
                    $existingChangeLog = [];
                }

                // Append new change log entry
                $existingChangeLog[] = [
                    'updated_by' => $userId,
                    'timestamp' => date('Y-m-d H:i:s'),
                    'changes' => $changes
                ];

                // Store changes in JSON format
                $newData['change_log'] = json_encode($existingChangeLog);
            }

            // ✅ Update collection in database
            $this->model->updateCollection($collectionId, $newData);

            return $this->response->setJSON(['success' => true, 'message' => 'Collection updated successfully']);
        } catch (\Exception $e) {
            $this->logger->error('Error in updateCollection: ' . $e->getMessage());
            return $this->response->setJSON(['error' => $e->getMessage()])->setStatusCode(500);
        }
    }


    private function getPaginatedFilteredProducts($productIds, $perPage, $page, $collectionId, $filters)
    {
        $productModel = new Products_model();

        // Apply filters to all product IDs first
        $filteredProductIds = $this->applyFilters($productIds, $filters);

        $totalProducts = count($filteredProductIds);  // Total filtered products
        $offset = ($page - 1) * $perPage;
        $paginatedProductIds = array_slice($filteredProductIds, $offset, $perPage);  // Paginate filtered products

        // Fetch products for the current page
        $products = $productModel->findProductsByIds($paginatedProductIds);

        // Ensure the products are in the same order as the paginated IDs
        $sortedProducts = [];
        foreach ($paginatedProductIds as $id) {
            if (isset($products[$id])) {
                $sortedProducts[] = $products[$id];
            }
        }

        // Create pagination
        $pager = service('pager');
        $pager->setPath("public/products/collectionview/$collectionId");
        $pager->makeLinks($page, $perPage, $totalProducts, 'default_full');

        return [
            'products' => $sortedProducts,
            'pager' => $pager
        ];
    }

    private function applyFilters($productIds, $filters)
    {
        $productModel = new Products_model();

        // Start with a query that selects products matching the product IDs
        $builder = $productModel->whereIn('product_id', $productIds);

        // Apply gender filter
        if (!empty($filters['gender'])) {
            $builder->where('gender', $filters['gender']);
        }

        // Apply category filter (multiple categories allowed)
        if (!empty($filters['category'])) {
            $builder->whereIn('product_category', $filters['category']);
        }

        // Apply brand filter (multiple brands allowed)
        if (!empty($filters['brand'])) {
            $builder->whereIn('brand', $filters['brand']);
        }

        // Apply color filter (multiple colors allowed)
        if (!empty($filters['color'])) {
            $builder->whereIn('color', $filters['color']);
        }

        // Apply price filter
        if (!empty($filters['price'])) {
            foreach ($filters['price'] as $priceRange) {
                switch ($priceRange) {
                    case 'Less than ₹500':
                        $builder->orWhere('price <', 500);
                        break;
                    case '₹501 - ₹1000':
                        $builder->orWhere('price >=', 501)->where('price <=', 1000);
                        break;
                    case '₹1001 - ₹2000':
                        $builder->orWhere('price >=', 1001)->where('price <=', 2000);
                        break;
                    case 'More than ₹2000':
                        $builder->orWhere('price >', 2000);
                        break;
                }
            }
        }

        // Fetch the filtered product IDs
        $filteredProducts = $builder->get()->getResultArray();
        return array_column($filteredProducts, 'product_id');  // Return filtered product IDs
    }

    public function collectionview($id, $page = 1)
    {
        $productModel = new Products_model();
        $footerModel = new Footer_model();
        $socialMediaModel = new SocialMediaLinks_model();

        // Fetch the collection data
        $collection = $productModel->getcollection($id);

        if (!$collection) {
            return redirect()->to('collections')->with('error', 'Collection not found');
        }

        // Check if 'product_ids' exists in the collection data
        if (!isset($collection['product_ids']) || empty($collection['product_ids'])) {
            $data['products'] = [];
            $data['pager'] = null;
        } else {
            // Get all product IDs from the collection
            $productIds = explode(',', $collection['product_ids']);

            // Set up pagination
            $perPage = 16;
            $page = $this->request->getVar('page') ?? $page;

            // Get filter inputs from the request
            $filters = [
                'gender' => $this->request->getVar('gender'),
                'category' => $this->request->getVar('category'),
                'brand' => $this->request->getVar('brand'),
                'price' => $this->request->getVar('price'),
                'color' => $this->request->getVar('color')
            ];

            // Apply filters to all products within the collection and then paginate them
            $result = $this->getPaginatedFilteredProducts($productIds, $perPage, $page, $id, $filters);

            $data['products'] = $result['products'];
            $data['pager'] = $result['pager'];
        }

        $data['footerLinks'] = $footerModel->getfooterdata();
        $data['collections'] = $collection;
        $data['socialMediaLinks'] = $socialMediaModel->findAll();
        $data['collectionId'] = $id;

        $data['filtergenders'] = $productModel->select('gender')->distinct()->where('gender !=', '')->where('gender IS NOT NULL')->findAll();
        $data['filterCategories'] = $productModel->select('product_category')->distinct()->where('product_category !=', '')->where('product_category IS NOT NULL')->findAll();
        $data['filterbrands'] = $productModel->select('brand')->distinct()->where('brand !=', '')->where('brand IS NOT NULL')->findAll();
        $data['filtercolors'] = $productModel->select('color')->distinct()->where('color !=', '')->where('color IS NOT NULL')->findAll();

        if ($this->request->isAJAX()) {
            return $this->response->setJSON([
                'products' => view('product_grid', $data),
                'pagination' => $data['pager']->links()
            ]);
        }

        return view('view_collections_view', $data);
    }

    public function addproducts($val)
    {
        $model = new Products_model();
        $val = $this->request->uri->getSegment(3);
        $data['selprodid'] = $val;
        //print_r($data); exit();
        $data['collprod'] = $model->editcollectionprod($val);
        return view('collection_prod_sec', $data);
    }

    public function deleteprod($id)
    {
        $model = new Products_model();
        $model->deletecollectionproduct($id);
        return redirect()->to('collections' . $id);
    }

    public function add_products($collid)
    {
        $model = new Products_model();
        $data['collection'] = $collid;
        $data['tags'] = $model->select('product_tags')->distinct()->findAll();
        return view('add_products', $data);
    }

    public function getProductsByTag()
    {
        $tag = $this->request->getPost('tag');
        $model = new Products_model();

        // Fetch products by tag
        $products = $model->where('product_tags', $tag)->findAll();

        return $this->response->setJSON($products);
    }

    public function addProductToCollection($collection_id)
    {
        $model = new Products_model();
        $collectionProductsModel = new CollectionProducts_model();
        $selectedProductIds = $this->request->getPost('products');

        if (!empty($selectedProductIds)) {
            foreach ($selectedProductIds as $product_id) {
                // Fetch product details
                $product = $model->find($product_id);

                if ($product) {
                    // Prepare data for insertion
                    $data = [
                        'collection_id' => $collection_id,
                        'product_id' => $product_id,
                        'product_title' => $product['product_title'],
                        'brand' => $product['brand'],
                        'cost_price' => $product['cost_price'],
                        'selling_price' => $product['selling_price'],
                        'product_image' => $product['product_image']
                    ];

                    // Insert data into collection_products table
                    $collectionProductsModel->insert($data);
                }
            }

            return redirect()->to('addproducts/' . $collection_id)->with('message', 'Products added to collection successfully.');
        } else {
            return redirect()->back()->with('error', 'No products selected.');
        }
    }















    // ---------------------------------------------------------------- Inventory -----------------------------------------------------------------------------------------------------
    public function inventory()
    {
        $session = session();
        $model = new Products_model();

        if ($session->get('admin_type') == 'seller') {
            $seller_id = $session->get('user_id');
            $data['inventory'] = $model->fetproductsbyseller($seller_id);
        } else {
            $data['inventory'] = $model->getinventorydata();
        }

        return view('inventory_view', $data);
    }

    public function editinventory($id)
    {
        $model = new Products_model();
        $data['inventory'] = $model->editinventorymodel($id);
        return view('edit_inventory_view', $data);
    }

    public function updateinventory($product_id)
    {
        // Get the POST data
        $input = $this->request->getJSON(true); // Use JSON format

        if ($input && isset($input['inventory'])) {
            $inventory = ['inventory' => $input['inventory']];  // Wrap in an associative array

            // Update inventory in the database
            $model = new Products_model();
            $model->updateinventorydata($product_id, $inventory);

            // Return a success response
            return $this->response->setJSON(['success' => true]);
        }

        // Return a failure response
        return $this->response->setJSON(['success' => false]);
    }

    public function getCartCount()
    {
        $session = session();
        $cartModel = new Cart_model();

        if ($session->has('user_id')) {
            $user_id = $session->get('user_id');
            $cartItemCount = $cartModel->getCartItemCount($user_id);
        } else {
            $cart = $session->get('cart');

            if (!empty($cart)) {
                $cartItemCount = array_sum(array_column($cart, 'quantity'));
            } else {
                $cartItemCount = 0;
            }
        }

        return $cartItemCount;
    }

    public function pincode_mapping()
    {
        $model = new PincodeModel();
        $data['pincodes'] = $model->getPincodedata();
        return view('pincode_map_view', $data);
    }

    public function importpinfromexcel()
    {
        return view('import_pincode_view');
    }

    public function download_pincode_file()
    {
        $filePath = ROOTPATH . 'uploads/excel/Pincodes.xlsx';

        if (file_exists($filePath)) {
            return $this->response->download($filePath, null);
        } else {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('File not found');
        }
    }

    public function import_pincode_data()
    {
        // Load the model for pincode mapping
        $model = new PincodeModel();

        // Handle file upload
        $file = $this->request->getFile('pincode_excel_file');

        // Validate file
        if ($file->isValid() && $file->getExtension() === 'xlsx') {
            // Load the Excel file
            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($file->getPathname());

            // Get the first worksheet
            $worksheet = $spreadsheet->getActiveSheet();

            // Get the headers from the first row
            $headers = [];
            $headerRow = $worksheet->getRowIterator(1)->current();
            foreach ($headerRow->getCellIterator() as $cell) {
                $headers[] = $cell->getValue();
            }

            // Loop through rows starting from the second row and extract data
            $data = [];
            foreach ($worksheet->getRowIterator(2) as $row) {
                $rowData = [];
                $cellIterator = $row->getCellIterator();
                $cellIterator->setIterateOnlyExistingCells(false); // Loop through all cells, even if they are empty
                foreach ($cellIterator as $cell) {
                    $columnIndex = $cell->getColumn();
                    $headerIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($columnIndex) - 1;
                    $columnName = $headers[$headerIndex] ?? null;
                    if ($columnName !== null) {
                        $cellValue = $cell->getValue();
                        $rowData[$columnName] = $cellValue;
                    }
                }
                $data[] = $rowData;
            }

            // Process and insert data into the database
            $model->insertPincodeExcelData($data);

            // Provide feedback to user
            return redirect()->to('pincode-mapping')->with('message', 'Pincode data imported successfully.');
        } else {
            return redirect()->to('pincode-mapping')->with('error', 'Invalid file format. Please upload an Excel file.');
        }
    }

    public function exportpintoexcel()
    {
        // Load the model
        $model = new PincodeModel();

        // Retrieve data from the model
        $data = $model->findAll();

        // Load the Spreadsheet class
        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set column headers
        $column = 'A';
        if (!empty($data)) {
            foreach ($data[0] as $key => $value) {
                $sheet->setCellValue($column . '1', $key);
                $column++;
            }

            // Populate data rows
            $row = 2;
            foreach ($data as $row_data) {
                $column = 'A';
                foreach ($row_data as $value) {
                    $sheet->setCellValue($column . $row, $value);
                    $column++;
                }
                $row++;
            }
        }

        // Set headers for download
        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $filename = 'Pincode_mapping_data.xlsx';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
    }

    public function add_pincodes()
    {
        return view('add_pincodes_view');
    }

    public function save_pincodes() {}

    public function edit_pincode($id) {}

    public function delete_pincode($id)
    {
        $model = new PincodeModel();
        $model->delete($id);
        return redirect()->to('pincode-mapping')->with('success', 'Pincode Deleted Successfully.');
    }

    public function products_preview($slug)
    {
        $productsmodel = new Products_model();
        $data['products'] = $productsmodel->getProductBySlug($slug);
        return view('products_preview_view', $data);
    }

    public function checkUrl()
    {
        $db = db_connect();
        $input = json_decode($this->request->getBody(), true);

        if (isset($input['url'])) {
            $url = $input['url'];
            $exists = $db->table('products')
                ->where('url', $url)
                ->countAllResults() > 0;

            return $this->response->setJSON(['exists' => $exists]);
        }

        return $this->response->setJSON(['error' => 'Invalid input']);
    }

    public function AddNewProductTags()
    {
        $Model = new Products_model();

        // Load session
        $session = session();
        $addedby = $session->get('admin_name') . '(' . $session->get('user_id') . ')';

        // Get AJAX request data
        $productName = $this->request->getPost('product_name');
        $productValue = $this->request->getPost('product_value');

        if (empty($productName) || empty($productValue)) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Product Name and Value are required']);
        }

        // Insert into database
        $data = [
            'tag_name' => $productName,
            'tag_value' => $productValue,
            'type' => 'Products',
            'created_at' => date('Y-m-d H:i:s'),
            'added_by' => $addedby,
        ];

        if ($Model->InsertNewProductTags($data)) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Product added successfully']);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to add product']);
        }
    }

    public function productReviews()
    {
        $Model = new Products_model();
        $reviews = $Model->GetallProductReviews();

        foreach ($reviews as &$review) {
            $review['user_details'] = $Model->GetUserDetails($review['user_id']);
            $review['approved_by_details'] = $Model->GetUserDetails($review['approved_by']);
            $review['product_details'] = $Model->GetProductDetails($review['product_id']);
        }

        $data['productreviews'] = $reviews;

        return view('product_reviews_view', $data);
    }


    public function UpdateReviewStatus()
    {
        if ($this->request->isAJAX()) {
            $session = session();
            $userId = $session->get('user_id');

            $reviewId = $this->request->getPost('review_id');
            $newStatus = $this->request->getPost('status');

            if (!isset($reviewId) || !in_array($newStatus, [0, 1, 2])) {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Invalid request.']);
            }

            $Model = new Products_model();
            $updateData = [
                'status' => $newStatus,
                'approved_by' => ($newStatus == 1) ? $userId : null,
                'approved_at' => ($newStatus == 1) ? date('Y-m-d H:i:s') : null,
            ];

            $update = $Model->UpdateReviewStatus($reviewId, $updateData);

            if ($update) {
                $message = ($newStatus == 1) ? 'Review Approved!' : 'Review Rejected!';
                return $this->response->setJSON(['status' => 'success', 'message' => $message]);
            } else {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to update status.']);
            }
        }

        return redirect()->back();
    }

    public function product_logs($product_id)
    {
        $productModel = new Products_model();
        $updates = $productModel->getProductLogs($product_id);
        return view('product_change_logs_view', ['updates' => $updates]);
    }
}
