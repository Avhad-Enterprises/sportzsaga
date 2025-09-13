<?php

namespace App\Controllers;

use App\Models\Products_model;
use App\Models\RelatedProductModel;
use CodeIgniter\Controller;

class RelatedproductController extends BaseController
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

        $builder = $db->table('collection');
        $data['collections'] = $builder->select('collection_id, collection_title')->get()->getResultArray();

        $data['fields'] = ['product_title', 'product_tags', 'cost_price', 'size'];
        return view('addnew_related_product', $data);
    }


    public function fetchProducts()
    {
        $db = \Config\Database::connect();
        $collectionId = $this->request->getPost('collection_id');

        if (!$collectionId) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Invalid collection']);
        }

        $builder = $db->table('collection');
        $builder->select('product_ids');
        $collection = $builder->where('collection_id', $collectionId)->get()->getRowArray();

        if (!$collection || empty($collection['product_ids'])) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'No products found for this collection.']);
        }

        $productIds = explode(',', $collection['product_ids']);

        $productBuilder = $db->table('products');
        $productBuilder->select('product_id, product_title, product_image, selling_price, inventory');
        $productBuilder->whereIn('product_id', $productIds);
        $products = $productBuilder->get()->getResultArray();

        return $this->response->setJSON(['status' => 'success', 'products' => $products]);
    }



    public function saveRelatedProducts()
    {
        $session = session();
        $userId = $session->get('user_id');

        if (!$userId) {
            return redirect()->to('relatedproduct_table_view')->with('error', 'User session expired. Please log in again.');
        }

        $collectionId = $this->request->getPost('collection_id');
        $selectMethod = $this->request->getPost('selectMethod');
        $conditionType = $this->request->getPost('conditionType');
        $conditions = $this->request->getPost('conditions');
        $sortBy = $this->request->getPost('sortBy');
        $productIds = [];

        if (!empty($collectionId)) {
            $selectMethod = 'collection';

            $db = \Config\Database::connect();
            $builder = $db->table('collection');
            $builder->select('product_ids');
            $collection = $builder->where('collection_id', $collectionId)->get()->getRowArray();

            if ($collection && !empty($collection['product_ids'])) {
                $productIds = explode(',', $collection['product_ids']);
            }
        } else {

            if ($selectMethod === 'automated') {
                $productIds = $this->model->getProductsByConditions($conditions, $conditionType, $sortBy);
                $productIds = array_column($productIds, 'product_id');
            } else if ($selectMethod === 'manual') {
                $productIds = $this->request->getPost('products') ?? [];
            }
        }

        if (empty($productIds)) {
            return redirect()->to('relatedproduct_table_view')->with('error', 'No related products selected.');
        }

        $data = [
            'collection_ids' => $collectionId ?? null,
            'related_product_ids' => json_encode($productIds),
            'selection_method' => $selectMethod,
            'condition_type' => $conditionType ?? null,
            'conditions' => json_encode($conditions ?? []),
            'sort_by' => $sortBy ?? null,
            'added_by' => $userId,
            'created_at' => date('Y-m-d H:i:s')
        ];

        $relatedProductModel = new RelatedProductModel();
        $relatedProductModel->insert($data);

        return redirect()->to('relatedproduct_table_view')->with('success', 'Related products saved successfully.');
    }



    public function getDistinctFieldValues()
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



    public function getConditions($collectionId)
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



    public function getProductsByConditions()
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

        $relatedProduct = $model->find($id);
        if (!$relatedProduct) {
            return redirect()->to('relatedproduct_table_view')->with('error', 'Related Product not found.');
        }

        $relatedProduct['conditions'] = !empty($relatedProduct['conditions']) && is_string($relatedProduct['conditions'])
            ? json_decode($relatedProduct['conditions'], true)
            : [];

        $relatedProduct['related_product_ids'] = !empty($relatedProduct['related_product_ids']) && is_string($relatedProduct['related_product_ids'])
            ? json_decode($relatedProduct['related_product_ids'], true)
            : [];

        $products = $productModel->findAll();

        $relatedProducts = [];
        if (!empty($relatedProduct['related_product_ids'])) {
            $builder = $db->table('products');
            $relatedProducts = $builder
                ->select('product_id, product_title, inventory, selling_price')
                ->whereIn('product_id', $relatedProduct['related_product_ids'])
                ->get()
                ->getResultArray();
        }

        $collections = $db->table('collection')
            ->select('collection_id, collection_title')
            ->get()
            ->getResultArray();

        $data = [
            'relatedProduct' => $relatedProduct,
            'relatedProducts' => $relatedProducts,
            'products' => $products,
            'collections' => $collections,
        ];

        $data['fields'] = ['product_title', 'product_tags', 'cost_price', 'size'];

        return view('edit_related_product', $data);
    }



    public function updateRelatedProduct($id)
    {
        $session = session();


        $model = new RelatedProductModel();
        $productModel = new Products_model();

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

        if (!empty($collectionId)) {
            $selectMethod = 'collection';

            $db = \Config\Database::connect();
            $builder = $db->table('collection');
            $builder->select('product_ids');
            $collection = $builder->where('collection_id', $collectionId)->get()->getRowArray();

            if ($collection && !empty($collection['product_ids'])) {
                $productIds = explode(',', $collection['product_ids']);
            }
        } else {

            if ($selectMethod === 'automated') {
                $productIds = $productModel->getProductsByConditions($conditions, $conditionType, $sortBy);
                $productIds = array_column($productIds, 'product_id');
            } elseif ($selectMethod === 'manual') {
                $productIds = $this->request->getPost('products') ?? [];
            }
        }

        if (empty($productIds)) {
            return redirect()->to('relatedproduct_table_view')->with('error', 'No related products selected.');
        }

        $newData = [
            'collection_ids' => $collectionId ?? null,
            'related_product_ids' => json_encode($productIds),
            'selection_method' => $selectMethod,
            'condition_type' => $conditionType ?? null,
            'conditions' => json_encode($conditions ?? []),
            'sort_by' => $sortBy ?? null,
            'updated_by' => $session->get('admin_name') . '(' . $session->get('user_id') . ')',
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        $changes = [];
        foreach ($newData as $key => $value) {
            if ($relatedProduct[$key] != $value) {
                $changes[$key] = [
                    'old' => $relatedProduct[$key],
                    'new' => $value
                ];
            }
        }

        if (!empty($changes)) {

            $existingChangeLog = json_decode($relatedProduct['change_log'] ?? '[]', true);
            if (!is_array($existingChangeLog)) {
                $existingChangeLog = [];
            }

            $existingChangeLog[] = [
                'updated_by' => $session->get('admin_name') . ' (' . $session->get('user_id') . ')',
                'timestamp' => date('Y-m-d H:i:s'),
                'changes' => $changes
            ];

            $newData['change_log'] = json_encode($existingChangeLog);

            if ($model->update($id, $newData)) {
                return redirect()->to('relatedproduct_table_view')->with('success', 'Related products updated successfully.');
            } else {
                return redirect()->back()->with('error', 'Failed to update related products.');
            }
        }

        return redirect()->back()->with('info', 'No changes detected.');
    }



    public function deleteProduct()
    {
        $session = session();
        $userId = $session->get('user_id');
        $relatedProductModel = new RelatedProductModel();

        $productId = $this->request->getPost('product_id');

        if (!$productId) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Product ID is missing.']);
        }

        $relatedProduct = $relatedProductModel->where('id', $productId)->first();
        if (!$relatedProduct) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Product not found.']);
        }

        $deletedBy = $session->get('admin_name') . ' (' . $userId . ')';

        $relatedProductModel->update($productId, [
            'is_deleted' => 1,
            'deleted_by' => $deletedBy,
            'deleted_at' => date('Y-m-d H:i:s'),
        ]);

        return $this->response->setJSON(['status' => 'success', 'message' => 'Product marked as deleted.']);
    }



    public function deletedRelatedProducts()
    {
        $relatedProductModel = new RelatedProductModel();
        $data['related_products'] = $relatedProductModel->where('is_deleted', 1)->findAll();
        return view('relatedproduct_deleted', $data);
    }


    public function restoreProduct($id)
    {
        $relatedProductModel = new RelatedProductModel();
        $product = $relatedProductModel->find($id);
        if (!$product) {
            return redirect()->to('relatedproduct_table_view')->with('error', 'Product not found.');
        }
        $relatedProductModel->update($id, [
            'is_deleted' => 0,
            'deleted_by' => null,
            'deleted_at' => null,
        ]);
        return redirect()->to('relatedproduct_table_view')->with('success', 'Product restored successfully.');
    }


    public function related_product_change_logs($id = null)
    {
        $db = \Config\Database::connect();

        if ($id === null) {
            return view('edit_relatedproduct_logs_view', ['updates' => []]);
        }
        $query = $db->table('related_products')->select('change_log')->where('id', $id)->get();
        $row = $query->getRow();
        if ($row) {
            $decodedData = json_decode($row->change_log, true);

            if (!is_array($decodedData)) {
                return view('edit_relatedproduct_logs_view', ['updates' => []]);
            }
            $updates = [];
            foreach ($decodedData as $key => $log) {
                if (is_numeric($key) && isset($log['timestamp'])) {
                    $updates[] = [
                        'updated_by' => $log['updated_by'] ?? 'Unknown',
                        'updated_at' => $log['timestamp'],
                        'changes' => $log['changes'] ?? [],
                    ];
                }
            }
            return view('edit_relatedproduct_logs_view', ['updates' => $updates]);
        }
        return view('edit_relatedproduct_logs_view', ['updates' => []]);
    }


    public function getrelatedProductChangeLogs()
    {
        $db = \Config\Database::connect();
        $query = $db->table('related_products')->select('change_log')->get();
        $row = $query->getRow();

        if ($row) {
            $decodedData = json_decode($row->change_log, true);

            if (!is_array($decodedData)) {
                return [];
            }
            $updates = [];
            foreach ($decodedData as $key => $log) {
                if (is_numeric($key) && isset($log['updated_at'])) {
                    $updates[] = $log;
                }
            }
            return $updates;
        }
        return [];
    }
}
