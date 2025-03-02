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
        $data['products'] = $productModel->findAll();
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

        // Fetch all products for dropdown
        $products = $productModel->findAll();

        // Decode JSON fields
        $relatedProduct['conditions'] = json_decode($relatedProduct['conditions'], true);
        $relatedProduct['related_product_ids'] = json_decode($relatedProduct['related_product_ids'], true);

        $data = [
            'relatedProduct' => $relatedProduct,
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
}
