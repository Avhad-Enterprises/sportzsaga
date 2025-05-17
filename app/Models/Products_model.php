<?php

namespace App\Models;


use CodeIgniter\Model;

class Products_model extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'product_id';
    protected $allowedFields = [
        'product_id',
        'amz_product_id',
        'seller_id',
        'product_title',
        'product_description',
        'short_description',
        'product_status',
        'cost_price',
        'selling_price',
        'compare_at_price',
        'sku',
        'hsn_no',
        'barcode',
        'inventory',
        'weight',
        'length',
        'breadth',
        'height',
        'pickup_location',
        'product_tags',
        'sales_channel',
        'product_image',
        'more_images',
        'gift_wrap',
        'label',
        'label_color',
        'material',
        'related_products',
        'tier_1',
        'tier_2',
        'tier_3',
        'tier_4',
        'secondary_title',
        'featured_blog',
        'bundles',
        'limited_edition',
        'preorder_tag',
        'preorder_date',
        'delist',
        'url',
        'meta_tag_title',
        'meta_tag_description',
        'meta_tag_image',
        'publish_date_and_time',
        'end_date_and_time',
        'recurrence',
        'publish_for',
        'updated_by',
        'change_log',
        'deleted_at',
        'is_deleted',
        'deleted_at',
        'deleted_by',
        'updated_at',
        'added_by',
        'expiry_date',
    ];

    public function getproductsdata()
    {
        return $this->db->table('products')->where('is_deleted', 0)->get()->getResultArray();
    }

    public function getPublicProducts()
    {
        return $this->where('product_status', 'active')->countAllResults();
    }

    public function getProductBySlug($slug)
    {
        $project = $this->db->table('products')->where('url', $slug)->get()->getResultArray();
        return $project;
    }

    public function insertProductsExcelData($data)
    {
        return $this->db->table('products')->insertBatch($data);
    }

    public function createDraftProduct($data)
    {
        $productData = [
            'product_title' => $data['product_title'],
            'amz_product_id' => $data['amz_product_id'],
            'sku' => $data['sku'],
            'product_status' => 'inactive',
            'sales_channel' => 'amazon',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $this->insert($productData);
        return $this->getInsertID();
    }

    public function getproduct($product_id)
    {
        return $this->where('product_id', $product_id)->findAll();
    }

    public function editinventorymodel($product_id)
    {
        return $this->where('product_id', $product_id)->findAll();
    }

    public function updateproductdata($data, $id)
    {
        return $this->db->table('products')->where('product_id', $id)->update($data);
    }

    public function updateinventorydata($product_id, $data)
    {
        // Update the inventory for the product in the 'products' table
        return $this->db->table('products')
            ->where('product_id', $product_id)
            ->update($data);  // Pass $data as an associative array
    }

    public function getallproducts()
    {
        return $this->db->table('products')->get()->getResultArray();
    }

    public function deleteproduct($product_id)
    {
        return $this->where('product_id', $product_id)->delete();
    }

    public function addnewproduct($data)
    {
        return $this->db->table('products')->insert($data);
    }

    public function editproductmodel($product_id)
    {
        $productedit = $this->db->table('products')->where('product_id', $product_id)->get()->getResultArray();
        return $productedit;
    }

    public function getTierNameById($tierTable, $tierId)
    {
        return $this->db->table($tierTable)
            ->select('tier_name')
            ->where('id', $tierId)
            ->get()
            ->getRowArray()['tier_name'] ?? null;
    }

    public function getCollectionBySlug($slug)
    {
        return $this->db->table('collection')
            ->where('url', $slug)
            ->get()
            ->getRowArray();
    }

    public function getcollectionsdata()
    {
        return $this->db->table('collection')
            ->where('is_deleted', 0) // ✅ Move 'where' before 'get'
            ->get()
            ->getResultArray();
    }

    public function getDeletedCollections()
    {
        return $this->db->table('collection')
            ->where('is_deleted', 1) // ✅ Correct placement of where()
            ->get() // ✅ Execute query first
            ->getResultArray(); // ✅ Fetch results properly
    }


    public function deletecollections($id)
    {
        return $this->db->table('collection')->delete(['collection_id' => $id]);
    }

    public function editcollectionmodel($id)
    {
        $collectionedit = $this->db->table('collection')->where('collection_id', $id)->get()->getResultArray();
        return $collectionedit;
    }

    public function updateCollection($id, $data)
    {
        return $this->db->table('collection')
            ->where('collection_id', $id)
            ->update($data);
    }

    public function getCollection($id) //
    {
        return $this->db->table('collection')
            ->where('collection_id', $id)
            ->get()
            ->getRowArray();
    }

    public function getDistinctFields()
    {
        return $this->db->getFieldNames($this->table);
    }

    public function getProductsByIds($ids)
    {
        return $this->db->table($this->table)
            ->whereIn('product_id', $ids)
            ->get()
            ->getResultArray();
    }

    public function updateCollectionData($id, $data)
    {
        return $this->db->table('collection')
            ->where('collection_id', $id)
            ->update($data);
    }

    public function deletecollectionproduct($id)
    {
        return $this->db->table('collection_products')->where('id', $id)->delete();
    }


    public function getinventorydata()
    {
        return $this->findAll();
    }


    public function editcollectionprod($id)
    {
        $data = $this->db->table('collection_products')->where('collection_id', $id)->get()->getResultArray();
        return $data;
    }

    public function fetproductsbyseller($id)
    {
        $data = $this->db->table('products')->where('seller_id', $id)->get()->getResultArray();
        return $data;
    }

    public function getProductsForCollection($collectionId, $page = 1, $perPage = 20)
    {
        $collection = $this->db->table('collection')
            ->where('collection_id', $collectionId)
            ->get()
            ->getRowArray();

        $productIds = explode(',', $collection['product_ids']);
        $sortMethod = $collection['sort_method'];

        $builder = $this->db->table($this->table)
            ->whereIn('product_id', $productIds);

        switch ($sortMethod) {
            case 'titleAZ':
                $builder->orderBy('product_title', 'ASC');
                break;
            case 'titleZA':
                $builder->orderBy('product_title', 'DESC');
                break;
            case 'priceHigh':
                $builder->orderBy('selling_price', 'DESC');
                break;
            case 'priceLow':
                $builder->orderBy('selling_price', 'ASC');
                break;
            case 'newest':
                $builder->orderBy('created_at', 'DESC');
                break;
            case 'oldest':
                $builder->orderBy('created_at', 'ASC');
                break;
            case 'manually':
                $orderCase = "CASE ";
                foreach ($productIds as $index => $id) {
                    $orderCase .= "WHEN product_id = $id THEN $index ";
                }
                $orderCase .= "END";
                $builder->orderBy($orderCase);
                break;
        }

        return $builder->get($perPage, ($page - 1) * $perPage)
            ->getResultArray();
    }

    public function getProductCreationDates($productIds)
    {
        $builder = $this->db->table($this->table);
        $builder->select('product_id, created_at');
        $builder->whereIn('product_id', $productIds);
        $query = $builder->get();
        $results = $query->getResultArray();

        $dates = array();
        foreach ($results as $row) {
            $dates[$row['product_id']] = $row['created_at'];
        }

        return $dates;
    }

    public function getDistinctFieldValues($field) //
    {
        return $this->db->table($this->table)
            ->select($field)
            ->distinct()
            ->get()
            ->getResultArray();
    }

    public function saveConditions($collectionId, $conditions)
    {
        $data = [
            'collection_id' => $collectionId,
            'conditions' => json_encode($conditions),
        ];

        $existing = $this->db->table('collection')
            ->where('collection_id', $collectionId)
            ->get()
            ->getRow();

        if ($existing) {
            return $this->db->table('collection')
                ->where('collection_id', $collectionId)
                ->update($data);
        } else {
            return $this->db->table('collection')
                ->insert($data);
        }
    }

    public function findProductsByIds($ids)
    {
        $builder = $this->db->table($this->table);
        $builder->whereIn('product_id', $ids);
        $query = $builder->get();

        $products = [];
        foreach ($query->getResultArray() as $row) {
            $products[$row['product_id']] = $row;
        }

        return $products;
    }

    public function getPaginatedProductsForCollection($productIds, $perPage, $page)
    {
        // Create a subquery to get the position of each product in the original order
        $subquery = $this->db->table('(SELECT @row := 0) r, (VALUES ' .
            implode(',', array_map(function ($id, $index) {
                return "($id, @row := @row + 1)";
            }, $productIds, array_keys($productIds))) .
            ') AS t (id, position)');

        $builder = $this->db->table($this->table);
        $builder->select('products.*, t.position')
            ->join("({$subquery->getCompiledSelect()}) AS t", 't.id = products.product_id', 'inner')
            ->whereIn('products.product_id', $productIds)
            ->orderBy('t.position', 'ASC');

        $total = $builder->countAllResults(false);

        $offset = ($page - 1) * $perPage;
        $products = $builder->get($perPage, $offset)->getResultArray();

        // Create a Pager instance
        $pager = service('pager');
        $pager->setPath('collections/view/' . $this->request->uri->getSegment(3));
        $pager = $pager->makeLinks($page, $perPage, $total, 'default_full');

        return [
            'products' => $products,
            'pager' => $pager
        ];
    }

    public function getConditions($collectionId)
    {
        $conditions = $this->db->table('collection')
            ->where('collection_id', $collectionId)
            ->get()
            ->getRow();

        return $conditions ? json_decode($conditions->conditions, true) : [];
    }

    public function getProductsByConditions($conditions, $conditionType, $sortBy = null) //
    {
        $builder = $this->db->table($this->table);

        foreach ($conditions as $index => $condition) {
            $field = $condition['field'];
            $operator = $condition['operator'];
            $value = $condition['value'];

            $method = ($index === 0 || $conditionType === 'all') ? 'where' : 'orWhere';

            switch ($operator) {
                case 'starts_with':
                    $builder->$method("$field LIKE", "$value%");
                    break;
                case 'ends_with':
                    $builder->$method("$field LIKE", "%$value");
                    break;
                case 'contains':
                    $builder->$method("$field LIKE", "%$value%");
                    break;
                case 'does_not_contain':
                    $builder->$method("$field NOT LIKE", "%$value%");
                    break;
                case 'is_equal_to':
                    $builder->$method($field, $value);
                    break;
                case 'is_not_equal_to':
                    $builder->$method("$field !=", $value);
                    break;
                case 'is_greater_than':
                    $builder->$method("$field >", $value);
                    break;
                case 'is_less_than':
                    $builder->$method("$field <", $value);
                    break;
                case 'is_between':
                    if (is_array($value) && count($value) === 2) {
                        $builder->$method("$field >=", $value[0]);
                        $builder->$method("$field <=", $value[1]);
                    }
                    break;
                case 'is_not_between':
                    if (is_array($value) && count($value) === 2) {
                        $builder->$method("$field <", $value[0]);
                        $builder->$method("$field >", $value[1]);
                    }
                    break;
                case 'is_empty':
                    $builder->$method("($field IS NULL OR $field = '')", null, false);
                    break;
                case 'is_not_empty':
                    $builder->$method("($field IS NOT NULL AND $field != '')", null, false);
                    break;
            }
        }

        switch ($sortBy) {
            case 'titleAZ':
                $builder->orderBy('product_title', 'ASC');
                break;
            case 'titleZA':
                $builder->orderBy('product_title', 'DESC');
                break;
            case 'priceHigh':
                $builder->orderBy('selling_price', 'DESC');
                break;
            case 'priceLow':
                $builder->orderBy('selling_price', 'ASC');
                break;
            case 'newest':
                $builder->orderBy('created_at', 'DESC');
                break;
            case 'oldest':
                $builder->orderBy('created_at', 'ASC');
                break;
        }

        $result = $builder->get()->getResultArray();

        if (empty($result)) {
            return [];
        }

        return $result;
    }

    public function geteditProductsByConditions($conditions, $conditionType, $sortBy = null)
    {
        $builder = $this->db->table($this->table);

        if (!is_array($conditions)) {
            // Handle the case where $conditions is not an array
            return [];
        }

        foreach ($conditions as $index => $condition) {
            if (!is_array($condition) || !isset($condition['field']) || !isset($condition['operator']) || !isset($condition['value'])) {
                // Skip this condition if it's not properly formatted
                continue;
            }

            $field = $condition['field'];
            $operator = $condition['operator'];
            $value = $condition['value'];

            $method = ($index === 0 || $conditionType === 'all') ? 'where' : 'orWhere';

            switch ($operator) {
                case 'starts_with':
                    $builder->$method("$field LIKE", "$value%");
                    break;
                case 'ends_with':
                    $builder->$method("$field LIKE", "%$value");
                    break;
                case 'contains':
                    $builder->$method("$field LIKE", "%$value%");
                    break;
                case 'does_not_contain':
                    $builder->$method("$field NOT LIKE", "%$value%");
                    break;
                case 'is_equal_to':
                    $builder->$method($field, $value);
                    break;
                case 'is_not_equal_to':
                    $builder->$method("$field !=", $value);
                    break;
                case 'is_greater_than':
                    $builder->$method("$field >", $value);
                    break;
                case 'is_less_than':
                    $builder->$method("$field <", $value);
                    break;
                case 'is_between':
                    if (is_array($value) && count($value) === 2) {
                        $builder->$method("$field >=", $value[0]);
                        $builder->$method("$field <=", $value[1]);
                    }
                    break;
                case 'is_not_between':
                    if (is_array($value) && count($value) === 2) {
                        $builder->$method("$field <", $value[0]);
                        $builder->$method("$field >", $value[1]);
                    }
                    break;
                case 'is_empty':
                    $builder->$method("($field IS NULL OR $field = '')", null, false);
                    break;
                case 'is_not_empty':
                    $builder->$method("($field IS NOT NULL AND $field != '')", null, false);
                    break;
            }
        }

        switch ($sortBy) {
            case 'titleAZ':
                $builder->orderBy('product_title', 'ASC');
                break;
            case 'titleZA':
                $builder->orderBy('product_title', 'DESC');
                break;
            case 'priceHigh':
                $builder->orderBy('selling_price', 'DESC');
                break;
            case 'priceLow':
                $builder->orderBy('selling_price', 'ASC');
                break;
            case 'newest':
                $builder->orderBy('created_at', 'DESC');
                break;
            case 'oldest':
                $builder->orderBy('created_at', 'ASC');
                break;
        }

        $result = $builder->get()->getResultArray();

        return $result ?: [];
    }

    public function getProductsByTags($tags)
    {
        $builder = $this->db->table($this->table);
        foreach ($tags as $index => $tag) {
            if ($index === 0) {
                $builder->like('product_tags', $tag['value']);
            } else {
                if ($tag['operator'] === 'AND') {
                    $builder->like('product_tags', $tag['value']);
                } else {
                    $builder->orLike('product_tags', $tag['value']);
                }
            }
        }
        return $builder->get()->getResultArray();
    }

    public function getDistinctTags()
    {
        $builder = $this->db->table($this->table);
        $builder->select('product_tags');
        $builder->distinct();
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function addNewCollectiondata($data)
    {
        $builder = $this->db->table('collection');
        $builder->insert($data);
        return $this->db->insertID();
    }

    public function getCollectionById($collectionId)
    {
        return $this->db->table('collection')->where('collection_id', $collectionId)->get()->getRowArray();
    }

    public function InsertNewProductTags($data)
    {
        return $this->db->table('tags')->insert($data);
    }

    public function GetallProductReviews()
    {
        return $this->db->table('product_reviews')->get()->getResultArray();
    }

    public function GetUserDetails($id)
    {
        if ($id) {
            return $this->db->table('users')->where('user_id', $id)->get()->getRowArray();
        }
        return null;
    }

    public function GetProductDetails($id)
    {
        if ($id) {
            return $this->db->table('products')->where('product_id', $id)->get()->getRowArray();
        }
        return null;
    }

    public function UpdateReviewStatus($reviewId, $updateData)
    {
        return $this->db->table('product_reviews')
            ->where('id', $reviewId)
            ->update($updateData);
    }

    public function CountpendingReviews()
    {
        return $this->db->table('product_reviews')
            ->where('status', 0)
            ->countAllResults();
    }


    public function getProductLogs($product_id)
    {
        $this->select('change_log');
        $this->where('product_id', $product_id);
        $query = $this->get();

        if ($query->getNumRows() > 0) {
            $row = $query->getRowArray();

            // Decode JSON safely
            $decoded_logs = json_decode($row['change_log'], true);

            if (json_last_error() !== JSON_ERROR_NONE) {
                log_message('error', 'JSON Decode Error: ' . json_last_error_msg());
                return []; // Return empty array to prevent breaking the view
            }

            if (is_array($decoded_logs) && !empty($decoded_logs)) {
                // Sort the logs in descending order based on timestamp
                usort($decoded_logs, function ($a, $b) {
                    return strtotime($b['timestamp']) - strtotime($a['timestamp']);
                });

                return $decoded_logs; // Return the sorted array
            }
        }

        return []; // Return an empty array if no logs exist
    }
}
