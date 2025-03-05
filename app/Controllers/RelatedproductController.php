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
        $db = \Config\Database::connect();

        // Fetch collections
        $builder = $db->table('collection');
        $data['collections'] = $builder->select('collection_id, collection_title')->get()->getResultArray();

        // Define fields for the conditions dropdown
        $data['fields'] = ['product_title', 'product_tags', 'cost_price', 'size']; // Add any other fields needed

        return view('addnew_related_product', $data);
    }

    public function fetchProducts()
    {
        $db = \Config\Database::connect();
        $collectionId = $this->request->getPost('collection_id');

        if (!$collectionId) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Invalid collection']);
        }

        // Fetch the product_ids list from the 'collections' table
        $builder = $db->table('collection');
        $builder->select('product_ids'); // Use the correct column name
        $collection = $builder->where('collection_id', $collectionId)->get()->getRowArray();

        if (!$collection || empty($collection['product_ids'])) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'No products found for this collection.']);
        }

        // Convert comma-separated product IDs into an array
        $productIds = explode(',', $collection['product_ids']);

        // Fetch product details for the given product IDs
        $productBuilder = $db->table('products');
        $productBuilder->select('product_id, product_title, product_image, selling_price, inventory');
        $productBuilder->whereIn('product_id', $productIds);
        $products = $productBuilder->get()->getResultArray();

        return $this->response->setJSON(['status' => 'success', 'products' => $products]);
    }


    public function saveRelatedProducts()
    {
        $collectionId = $this->request->getPost('collection_id');
        $selectMethod = $this->request->getPost('selectMethod');
        $conditionType = $this->request->getPost('conditionType');
        $conditions = $this->request->getPost('conditions');
        $sortBy = $this->request->getPost('sortBy');
        $productIds = [];

        // If collection is selected, set selection method to "collection" and ignore other methods
        if (!empty($collectionId)) {
            $selectMethod = 'collection';

            // Fetch all products linked to the selected collection
            $db = \Config\Database::connect();
            $builder = $db->table('collection');
            $builder->select('product_ids'); // Assuming 'products_ids' contains comma-separated product IDs
            $collection = $builder->where('collection_id', $collectionId)->get()->getRowArray();

            if ($collection && !empty($collection['product_ids'])) {
                $productIds = explode(',', $collection['product_ids']);
            }
        } else {
            // Automated or Manual selection
            if ($selectMethod === 'automated') {
                $productIds = $this->model->getProductsByConditions($conditions, $conditionType, $sortBy);
                $productIds = array_column($productIds, 'product_id'); // Extract only product IDs
            } else if ($selectMethod === 'manual') {
                $productIds = $this->request->getPost('products') ?? [];
            }
        }

        // Ensure at least some products are selected
        if (empty($productIds)) {
            return redirect()->to('relatedproduct_table_view')->with('error', 'No related products selected.');
        }

        // Prepare data for insertion
        $data = [
            'collection_ids' => $collectionId ?? null, // Store selected collection ID
            'related_product_ids' => json_encode($productIds), // Store related product IDs as JSON
            'selection_method' => $selectMethod, // Now "collection" is set automatically
            'condition_type' => $conditionType ?? null,
            'conditions' => json_encode($conditions ?? []),
            'sort_by' => $sortBy ?? null
        ];

        // Insert into the database
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
        $db = \Config\Database::connect();

        // Fetch the related product data
        $relatedProduct = $model->find($id);
        if (!$relatedProduct) {
            return redirect()->to('relatedproduct_table_view')->with('error', 'Related Product not found.');
        }

        // Decode conditions
        $relatedProduct['conditions'] = !empty($relatedProduct['conditions']) && is_string($relatedProduct['conditions'])
            ? json_decode($relatedProduct['conditions'], true)
            : [];

        // Decode related product IDs
        $relatedProduct['related_product_ids'] = !empty($relatedProduct['related_product_ids']) && is_string($relatedProduct['related_product_ids'])
            ? json_decode($relatedProduct['related_product_ids'], true)
            : [];

        // Fetch all products for dropdown
        $products = $productModel->findAll();

        // Fetch related products along with inventory and price
        $relatedProducts = [];
        if (!empty($relatedProduct['related_product_ids'])) {
            $builder = $db->table('products');
            $relatedProducts = $builder
                ->select('product_id, product_title, inventory, selling_price')
                ->whereIn('product_id', $relatedProduct['related_product_ids'])
                ->get()
                ->getResultArray();
        }

        // Fetch collections from the database
        $collections = $db->table('collection')
            ->select('collection_id, collection_title')
            ->get()
            ->getResultArray();

        $data = [
            'relatedProduct' => $relatedProduct,
            'relatedProducts' => $relatedProducts,
            'products' => $products,
            'collections' => $collections, // Pass collections to view
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

        $collectionId = $this->request->getPost('collection_id');
        $selectMethod = $this->request->getPost('selectMethod');
        $conditionType = $this->request->getPost('conditionType');
        $conditions = $this->request->getPost('conditions');
        $sortBy = $this->request->getPost('sortBy');
        $productIds = [];

        // If a collection is selected, set selection method to "collection" and ignore manual/automated methods
        if (!empty($collectionId)) {
            $selectMethod = 'collection';

            // Fetch all products linked to the selected collection
            $db = \Config\Database::connect();
            $builder = $db->table('collection'); // Ensure this is the correct table name
            $builder->select('product_ids'); // Assuming 'product_ids' contains comma-separated product IDs
            $collection = $builder->where('collection_id', $collectionId)->get()->getRowArray();

            if ($collection && !empty($collection['product_ids'])) {
                $productIds = explode(',', $collection['product_ids']);
            }
        } else {
            // Automated or Manual selection
            if ($selectMethod === 'automated') {
                $productIds = $productModel->getProductsByConditions($conditions, $conditionType, $sortBy);
                $productIds = array_column($productIds, 'product_id'); // Extract only product IDs
            } else if ($selectMethod === 'manual') {
                $productIds = $this->request->getPost('products') ?? [];
            }
        }

        // Ensure at least some products are selected
        if (empty($productIds)) {
            return redirect()->to('relatedproduct_table_view')->with('error', 'No related products selected.');
        }

        // Prepare data for updating
        $data = [
            'collection_ids' => $collectionId ?? null, // Store selected collection ID
            'related_product_ids' => json_encode($productIds), // Store related product IDs as JSON
            'selection_method' => $selectMethod, // Now "collection" is set automatically
            'condition_type' => $conditionType ?? null,
            'conditions' => json_encode($conditions ?? []),
            'sort_by' => $sortBy ?? null
        ];

        // Update the database
        $model->update($id, $data);

        return redirect()->to('relatedproduct_table_view')->with('success', 'Related products updated successfully.');
    }

    public function deleteProduct()
    {
        $db = \Config\Database::connect();
        $request = service('request');

        // Get product ID from the AJAX request
        $productId = $this->request->getPost('product_id'); // Use getPost() for normal form requests

        if (!$productId) {
            return redirect()->to('relatedproduct_table_view')->with('error', 'Product ID is missing.');
        }

        $relatedProductModel = new RelatedProductModel();

        // Fetch all records where product exists in related_product_ids
        $relatedProducts = $relatedProductModel->findAll();

        foreach ($relatedProducts as $relatedProduct) {
            $relatedIds = json_decode($relatedProduct['related_product_ids'], true);

            if (is_array($relatedIds) && in_array($productId, $relatedIds)) {
                // Remove the product from the array
                $updatedIds = array_diff($relatedIds, [$productId]);

                // Update the database with the new related products list
                $relatedProductModel->update($relatedProduct['id'], [
                    'related_product_ids' => json_encode(array_values($updatedIds))
                ]);

                return redirect()->to('relatedproduct_table_view')->with('success', 'Product removed successfully.');
            }
        }

        return redirect()->to('relatedproduct_table_view')->with('error', 'Product not found.');
    }


}
