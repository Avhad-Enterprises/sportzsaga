<?php

namespace App\Controllers;

use App\Models\Products_model;
use App\Models\RelatedProductModel;
use CodeIgniter\Controller;

class RelatedproductController extends Controller
{
    protected $permissionsModel;
    protected $model;
    protected $logger;


    public function __construct()
    {
        $this->model = new Products_model();
        $this->logger = service('logger');
    }
    public function index()
    {
        $productModel = new Products_model();
        $relatedProductModel = new RelatedProductModel();

        // Fetch all product IDs that exist in related_products table
        $relatedProductRecords = $relatedProductModel->findAll();
        $relatedProductIds = [];

        foreach ($relatedProductRecords as $record) {
            // Add `product_id` to the list
            if (!empty($record['product_id'])) {
                $relatedProductIds[] = $record['product_id'];
            }

            // Add `related_product_ids` (decoded) to the list
            if (!empty($record['related_product_ids'])) {
                $relatedIds = json_decode($record['related_product_ids'], true);
                if (is_array($relatedIds)) {
                    $relatedProductIds = array_merge($relatedProductIds, $relatedIds);
                }
            }
        }

        // Remove duplicates and ensure array is not empty
        $relatedProductIds = array_unique(array_filter($relatedProductIds));

        // Fetch only products that are NOT in `related_products` table
        $builder = \Config\Database::connect()->table('products');
        $builder->select('product_id, product_title, sku, product_tags, inventory, selling_price, cost_price');

        if (!empty($relatedProductIds)) {
            // Only apply `whereNotIn()` if $relatedProductIds is NOT empty
            $builder->whereNotIn('product_id', $relatedProductIds);
        }

        $data['products'] = $builder->get()->getResultArray();

        $data['fields'] = ['product_title', 'product_tags', 'cost_price', 'size'];

        return view('addnew_related_product', $data);
    }


    public function saveRelatedProducts()
    {
        $productId = $this->request->getPost('product_id');

        if (empty($productId)) {
            return redirect()->to('relatedproduct_table_view')->with('error', 'Product ID is required.');
        }

        // Fetch product details from the database using the selected product_id
        $productModel = new Products_model();
        $product = $productModel->where('product_id', $productId)->first();

        if (!$product) {
            return redirect()->to('relatedproduct_table_view')->with('error', 'Selected product not found.');
        }

        // Determine selection method
        $selectMethod = $this->request->getPost('selectMethod');
        $conditionType = $this->request->getPost('conditionType');
        $conditions = $this->request->getPost('conditions');
        $sortBy = $this->request->getPost('sortBy');
        $productIds = [];

        if ($selectMethod === 'automated') {
            // Fetch products based on filter conditions
            $productIds = $this->model->getProductsByConditions($conditions, $conditionType, $sortBy);
            $productIds = array_column($productIds, 'product_id'); // Extract only product IDs
        } else if ($selectMethod === 'manual') {
            // Get manually selected products from the form
            $productIds = $this->request->getPost('products') ?? [];
        }

        // Ensure at least some products are selected
        if (empty($productIds)) {
            return redirect()->to('relatedproduct_table_view')->with('error', 'No related products selected.');
        }

        $data = [
            'product_id' => $productId,
            'sku' => $product['sku'],
            'product_tag' => $product['product_tags'],
            'inventory' => $product['inventory'],
            'selling_price' => $product['selling_price'],
            'cost_price' => $product['cost_price'],
            'selection_method' => $selectMethod,
            'condition_type' => $conditionType,
            'conditions' => json_encode($conditions),
            'related_product_ids' => json_encode($productIds), // Store as JSON
            'sort_by' => $sortBy
        ];

        $relatedProductModel = new RelatedProductModel();
        $relatedProductModel->insert($data);

        return redirect()->to('relatedproduct_table_view')->with('success', 'Related products saved successfully.');
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

    public function getAllProducts() //
    {
        $model = new Products_model();
        $products = $model->findAll();
        return $this->response->setJSON($products);
    }

    public function getProductsByConditions()
    {
        try {
            $conditions = json_decode($this->request->getPost('conditions'), true);
            $conditionType = $this->request->getPost('conditionType');
            $sortBy = $this->request->getPost('sortBy');

            if (empty($conditions)) {
                throw new \Exception('No conditions provided');
            }

            // Fetch all product IDs already used in `related_products`
            $relatedProductModel = new RelatedProductModel();
            $relatedProductRecords = $relatedProductModel->findAll();
            $relatedProductIds = [];

            foreach ($relatedProductRecords as $record) {
                $relatedProductIds[] = $record['product_id'];

                if (!empty($record['related_product_ids'])) {
                    $relatedIds = json_decode($record['related_product_ids'], true);
                    if (is_array($relatedIds)) {
                        $relatedProductIds = array_merge($relatedProductIds, $relatedIds);
                    }
                }
            }

            // Remove duplicates and ensure array is not empty
            $relatedProductIds = array_unique(array_filter($relatedProductIds));

            // Fetch products from model **WITHOUT** passing `relatedProductIds` to model
            $products = $this->model->getProductsByConditions($conditions, $conditionType, $sortBy);

            // **Only apply filtering if `$relatedProductIds` has values**
            if (!empty($relatedProductIds)) {
                $products = array_filter($products, function ($product) use ($relatedProductIds) {
                    return !in_array($product['product_id'], $relatedProductIds);
                });
            }

            if (empty($products)) {
                return $this->response->setJSON(['products' => [], 'message' => 'No products found']);
            }

            return $this->response->setJSON(['products' => array_values($products)]);
        } catch (\Exception $e) {
            return $this->response->setJSON(['error' => $e->getMessage()])->setStatusCode(500);
        }
    }


    public function tableview()
    {
        $model = new RelatedProductModel();
        $data['related_products'] = $model->getAllRelatedProducts();

        return view('relatedproduct_table_view', $data);
    }

    public function deleteRelatedProduct($id)
    {
        $model = new RelatedProductModel();

        if ($model->delete($id)) {
            return redirect()->to('relatedproduct_table_view')->with('success', 'Related product deleted successfully.');
        } else {
            return redirect()->to('relatedproduct_table_view')->with('error', 'Failed to delete related product.');
        }
    }

    public function editRelatedProduct($id)
    {
        $model = new RelatedProductModel();
        $productModel = new Products_model();

        // Fetch the related product data
        $relatedProduct = $model->find($id);
        if (!$relatedProduct) {
            return redirect()->to('relatedproduct_table_view')->with('error', 'Related Product not found.');
        }

        // Ensure `conditions` is decoded properly
        if (!empty($relatedProduct['conditions']) && is_string($relatedProduct['conditions'])) {
            $relatedProduct['conditions'] = json_decode($relatedProduct['conditions'], true);
        } else {
            $relatedProduct['conditions'] = [];
        }

        // Ensure `related_product_ids` is decoded properly
        if (!empty($relatedProduct['related_product_ids']) && is_string($relatedProduct['related_product_ids'])) {
            $relatedProduct['related_product_ids'] = json_decode($relatedProduct['related_product_ids'], true);
        } else {
            $relatedProduct['related_product_ids'] = [];
        }

        // Fetch all products for dropdown
        $products = $productModel->findAll();

        // Fetch related products along with inventory and price
        $relatedProducts = [];
        if (!empty($relatedProduct['related_product_ids'])) {
            $builder = \Config\Database::connect()->table('products');
            $relatedProducts = $builder
                ->select('product_id, product_title, inventory, selling_price')
                ->whereIn('product_id', $relatedProduct['related_product_ids'])
                ->get()
                ->getResultArray();
        }

        $data = [
            'relatedProduct' => $relatedProduct,
            'relatedProducts' => $relatedProducts,
            'products' => $products
        ];

        // Define the available fields
        $data['fields'] = ['product_title', 'product_tags', 'cost_price', 'size'];

        return view('edit_related_product', $data);
    }




    public function updateRelatedProduct($id)
    {
        $model = new RelatedProductModel();
        $productModel = new Products_model();

        // Ensure the related product exists
        $relatedProduct = $model->find($id);
        if (!$relatedProduct) {
            return redirect()->to('relatedproduct_table_view')->with('error', 'Related Product not found.');
        }

        $productId = $this->request->getPost('product_id');

        if (empty($productId)) {
            return redirect()->to('relatedproduct_table_view')->with('error', 'Product ID is required.');
        }

        // Fetch product details from the database using the selected product_id
        $product = $productModel->where('product_id', $productId)->first();

        if (!$product) {
            return redirect()->to('relatedproduct_table_view')->with('error', 'Selected product not found.');
        }

        // Determine selection method
        $selectMethod = $this->request->getPost('selectMethod');
        $conditionType = $this->request->getPost('conditionType');
        $conditions = $this->request->getPost('conditions');
        $sortBy = $this->request->getPost('sortBy');
        $productIds = [];

        if ($selectMethod === 'automated') {
            // Fetch products based on filter conditions
            $productIds = $productModel->geteditProductsByConditions($conditions, $conditionType, $sortBy);
            $productIds = array_column($productIds, 'product_id'); // Extract only product IDs
        } else if ($selectMethod === 'manual') {
            // Get manually selected products from the form
            $productIds = $this->request->getPost('products') ?? [];
        }

        // Ensure at least some products are selected
        if (empty($productIds)) {
            return redirect()->to('relatedproduct_table_view')->with('error', 'No related products selected.');
        }

        $data = [
            'product_id' => $productId,
            'sku' => $product['sku'],
            'product_tag' => $product['product_tags'],
            'inventory' => $product['inventory'],
            'selling_price' => $product['selling_price'],
            'cost_price' => $product['cost_price'],
            'selection_method' => $selectMethod,
            'condition_type' => $conditionType,
            'conditions' => json_encode($conditions),
            'related_product_ids' => json_encode($productIds), // Store as JSON
            'sort_by' => $sortBy
        ];

        $model->update($id, $data);

        return redirect()->to('relatedproduct_table_view')->with('success', 'Related products updated successfully.');
    }

    public function deleteProduct()
    {
        $db = \Config\Database::connect();
        $request = service('request');

        // Get product ID from the AJAX request
        $productId = $request->getJSON()->product_id;

        if (!$productId) {
            return $this->response->setJSON(['success' => false, 'message' => 'Product ID is missing']);
        }

        $relatedProductModel = new RelatedProductModel();

        // Fetch the record containing related product IDs
        $relatedProduct = $relatedProductModel->where('related_product_ids LIKE', "%$productId%")->first();

        if ($relatedProduct) {
            $relatedIds = json_decode($relatedProduct['related_product_ids'], true);

            // Remove the product from the array
            $updatedIds = array_diff($relatedIds, [$productId]);

            // Update the database with the new related products list
            $relatedProductModel->update($relatedProduct['id'], [
                'related_product_ids' => json_encode(array_values($updatedIds))
            ]);

            return $this->response->setJSON(['success' => true]);
        }

        return $this->response->setJSON(['success' => false, 'message' => 'Product not found']);
    }

}
