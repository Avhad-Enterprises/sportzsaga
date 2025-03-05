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
        $blogModel = new Products_model();
        $blogModel->deleteProduct($id);
        return redirect()->to('admin-products')->with('success', 'Product deleted successfully.');
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
        $data['tags'] = $tagModel->findAll();

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

        // Initialize Google Cloud Storage client
        $storage = new \Google\Cloud\Storage\StorageClient([
            'keyFilePath' => WRITEPATH . 'public/mkvgsc.json',
            'projectId' => 'peak-tide-441609-r1',
        ]);

        $bucketName = 'mkv_imagesbackend';
        $bucket = $storage->bucket($bucketName);

        // Get weight and weight unit
        $length = trim($this->request->getPost('length'));
        $breadth = trim($this->request->getPost('breadth'));
        $height = trim($this->request->getPost('height'));
        $weight = trim($this->request->getPost('weight'));

        // Handle primary product image
        $primaryImage = null;
        $primaryImageFile = $this->request->getFile('product-image');
        if ($primaryImageFile && $primaryImageFile->isValid() && !$primaryImageFile->hasMoved()) {
            $imageName = $primaryImageFile->getClientName();
            $imageTempPath = $primaryImageFile->getTempName();
            $object = $bucket->upload(
                fopen($imageTempPath, 'r'),
                [
                    'name' => 'products/' . $imageName,
                    'predefinedAcl' => 'publicRead',
                ]
            );
            $primaryImage = sprintf('https://storage.googleapis.com/%s/products/%s', $bucketName, $imageName);
        }

        // Handle additional images
        $additionalImages = [];
        $moreImages = $this->request->getFileMultiple('product_images');
        if ($moreImages) {
            foreach ($moreImages as $image) {
                if ($image->isValid() && !$image->hasMoved()) {
                    $imageName = $image->getClientName();
                    $imageTempPath = $image->getTempName();
                    $object = $bucket->upload(
                        fopen($imageTempPath, 'r'),
                        [
                            'name' => 'products/more_images/' . $imageName,
                            'predefinedAcl' => 'publicRead',
                        ]
                    );
                    $additionalImages[] = sprintf('https://storage.googleapis.com/%s/products/more_images/%s', $bucketName, $imageName);
                }
            }
        }

        // Prepare product URL
        $url = trim($this->request->getPost('url'));

        // Check if URL is already present
        if ($model->where('url', $url)->countAllResults() > 0) {
            return redirect()->back()->with('error', 'The URL is already in use. Please use a different URL.');
        }

        // Get form data
        $faqQuestions = $this->request->getPost('faq_question');
        $faqAnswers = $this->request->getPost('faq_answer');
        // $variantNames = $this->request->getPost('variant_name');
        // $variantPrices = $this->request->getPost('variant_price');
        // $productSkus = $this->request->getPost('product_sku');

        // Prepare FAQs as an associative array
        $faqs = [];
        if ($faqQuestions && $faqAnswers) {
            foreach ($faqQuestions as $index => $question) {
                if (!empty($question) && isset($faqAnswers[$index]) && !empty($faqAnswers[$index])) {
                    $faqs[] = [
                        'question' => $question,
                        'answer' => $faqAnswers[$index]
                    ];
                }
            }
        }

        // Prepare Bullet Points as a JSON-encoded array
        $bulletPoints = $this->request->getPost('product-bullet-points');
        $bulletPointsJson = null;
        if (!empty($bulletPoints)) {
            if (is_string($bulletPoints)) {
                $bulletPointsArray = array_filter(explode(',', $bulletPoints), 'trim');
                $bulletPointsJson = json_encode(array_values($bulletPointsArray));
            } elseif (is_array($bulletPoints)) {
                $bulletPointsJson = json_encode(array_filter($bulletPoints, 'trim'));
            }
        }

        // Prepare Variants as an associative array including SKU
        // $variants = [];
        // if ($variantNames && $variantPrices && $productSkus) {
        //     foreach ($variantNames as $index => $variant) {
        //         if (!empty($variant) && isset($variantPrices[$index]) && !empty($variantPrices[$index]) && isset($productSkus[$index]) && !empty($productSkus[$index])) {
        //             $variants[] = [
        //                 'name' => $variant,
        //                 'price' => $variantPrices[$index],
        //                 'sku' => $productSkus[$index] // Add SKU to the variant data
        //             ];
        //         }
        //     }
        // }

        // Prepare data for insertion
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
            'product_tags' => $this->request->getPost('product-tags'),
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
        ];

        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        // die();

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
        $relatedProductModel = new RelatedProductModel(); // Load related product model

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

        // ** Fetch related products both ways **
        $relatedProductIds = $relatedProductModel->RelatedProducts($id);

        // Fetch products where this product is in related_product_ids
        $relatedProductsForThis = $relatedProductModel->where("related_product_ids LIKE", "%$id%")->findAll();

        foreach ($relatedProductsForThis as $relatedRow) {
            $relatedProductIds[] = $relatedRow['product_id'];
        }

        // Remove duplicates
        $relatedProductIds = array_unique($relatedProductIds);

        if (!empty($relatedProductIds)) {
            $builder = \Config\Database::connect()->table('products');
            $data['related_products'] = $builder
                ->select('product_id, product_title, inventory, selling_price')
                ->whereIn('product_id', $relatedProductIds)
                ->get()
                ->getResultArray();
        } else {
            $data['related_products'] = [];
        }

        return view('edit_products_view', $data);
    }


    public function updateProduct($id)
    {
        $model = new Products_model();

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

        // Prepare product data for update
        $data = [
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
            'product_tags' => $this->request->getPost('product-tags'),
            'meta_tag_title' => $this->request->getPost('meta-tag'),
            'meta_tag_description' => $this->request->getPost('meta-description'),
            'label' => $this->request->getPost('product_label'),
            'gift_wrap' => $this->request->getPost('gift_wrap'),
            'product_variant' => $this->request->getPost('selected_variants'),
            'accessories' => $this->request->getPost('accessories-checked'),
            'accessories_includes' => $this->request->getPost('product-include'),
            'size' => $this->request->getPost('product-size'),
        ];

        // Handle the primary product image
        $image = $this->request->getFile('product-new-image');
        if ($image && $image->isValid() && !$image->hasMoved()) {
            $imageName = $image->getClientName();
            $imageTempPath = $image->getTempName();
            $object = $bucket->upload(
                fopen($imageTempPath, 'r'),
                [
                    'name' => 'products/' . $imageName,
                    'predefinedAcl' => 'publicRead',
                ]
            );
            $data['product_image'] = sprintf('https://storage.googleapis.com/%s/products/%s', $bucketName, $imageName);
        } else {
            $data['product_image'] = $existingProduct['product_image'];
        }

        // Fetch current images
        $existingImages = json_decode($existingProduct['more_images'], true) ?? [];
        $currentImages = $this->request->getPost('current_images') ?? [];
        $removedImages = json_decode($this->request->getPost('removed_images'), true) ?? [];
        $newImages = [];

        // Process uploaded additional images
        $uploadedFiles = $this->request->getFiles();
        if (!empty($uploadedFiles['additional_images'])) {
            foreach ($uploadedFiles['additional_images'] as $file) {
                if ($file->isValid() && !$file->hasMoved()) {
                    $imageName = $file->getClientName();
                    $imageTempPath = $file->getTempName();
                    $object = $bucket->upload(
                        fopen($imageTempPath, 'r'),
                        [
                            'name' => 'products/' . $imageName,
                            'predefinedAcl' => 'publicRead',
                        ]
                    );
                    $newImages[] = sprintf('https://storage.googleapis.com/%s/products/%s', $bucketName, $imageName);
                }
            }
        }

        // Update the `more_images` column by removing deleted images and adding new ones
        $finalImages = array_unique(array_merge(array_diff($existingImages, $removedImages), $currentImages, $newImages));
        $data['more_images'] = json_encode($finalImages);

        // Get the FAQ data from the form
        $faqQuestions = $this->request->getPost('faq_question');
        $faqAnswers = $this->request->getPost('faq_answer');

        // Check if FAQs are provided
        if (!empty($faqQuestions) && !empty($faqAnswers)) {
            $faqs = [];
            foreach ($faqQuestions as $index => $question) {
                $faqs[] = [
                    'question' => $question,
                    'answer' => $faqAnswers[$index]
                ];
            }

            // Store the FAQs as a JSON string
            $data['faqs'] = json_encode($faqs);
        }

        // Handle Bullet Points
        $bulletPoints = $this->request->getPost('product-bullet-points');
        $bulletPointsJson = null;
        if (!empty($bulletPoints)) {
            if (is_string($bulletPoints)) {
                $bulletPointsArray = array_filter(explode(',', $bulletPoints), 'trim');
                $bulletPointsJson = json_encode(array_values($bulletPointsArray));
            } elseif (is_array($bulletPoints)) {
                $bulletPointsJson = json_encode(array_filter($bulletPoints, 'trim'));
            }
        }
        $data['bullet_points'] = $bulletPointsJson;

        // Update the product in the database
        if ($model->updateproductdata($data, $id)) {
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

    public function collections()
    {
        $model = new Products_model();
        $data['collections'] = $model->getcollectionsdata();
        return view('collections_view', $data);
    }

    public function deletecollection($id)
    {
        $blogModel = new Products_model();
        $blogModel->deletecollections($id);
        return redirect()->to('collections')->with('success', 'Collection deleted successfully.');
    }

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

        $data['fields'] = ['product_title', 'product_tags', 'cost_price'];
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
        ];

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
        $data['fields'] = ['product_title', 'product_tags', 'cost_price'];

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
                $this->logger->info('New PC image uploaded: ' . $newImageName);
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
                $this->logger->info('New mobile image uploaded: ' . $newmobImageName);
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
                $this->logger->info('New Collout image uploaded: ' . $newColloutImageName);
            }

            // Handle selection method
            $selectMethod = $this->request->getPost('selectMethod');
            $conditions = json_decode($this->request->getPost('conditions'), true);
            $conditionType = $this->request->getPost('conditionType');
            $sortBy = $this->request->getPost('sortBy');

            $this->logger->info('Select Method: ' . $selectMethod);
            $this->logger->info('Conditions: ' . json_encode($conditions));
            $this->logger->info('Condition Type: ' . $conditionType);
            $this->logger->info('sortBy: ' . $sortBy);

            $productIds = [];
            if ($selectMethod === 'automated') {
                $productIds = $this->model->getProductsByConditions($conditions, $conditionType, $sortBy);
                $productIds = array_column($productIds, 'product_id');
            } elseif ($selectMethod === 'manual') {
                $productIds = $this->request->getPost('products') ?? [];
            }

            $this->logger->info('Product IDs: ' . json_encode($productIds));

            if (empty($productIds)) {
                throw new \Exception('No products selected.');
            }

            $publishDateTime = $this->request->getPost('publish_date_and_time');
            $endDateTime = $this->request->getPost('end_date_and_time');
            $recurrence = $this->request->getPost('recurrence');
            $publishFor = $this->request->getPost('publish_for');

            // Prepare data for update
            $data = [
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
            ];

            $this->logger->info('Updated collection data: ' . json_encode($data));

            // Update collection in database
            $this->model->updateCollection($collectionId, $data);

            $this->logger->info('Collection updated successfully.');

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

    public function save_pincodes()
    {
    }

    public function edit_pincode($id)
    {
    }

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
        $db = \Config\Database::connect();
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
}


