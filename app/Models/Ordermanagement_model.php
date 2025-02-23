<?php

namespace App\Models;

use CodeIgniter\Model;

class Ordermanagement_model extends Model
{
    protected $table = 'order_management';
    protected $primaryKey = 'order_id';
    protected $allowedFields = [
        'order_id',
        'amz_order_id',
        'user_id',
        'seller_id',
        'product_name',
        'payment_method',
        'customer_address',
        'order_date',
        'customer',
        'channel',
        'total_amount',
        'payment_status',
        'payment_ref',
        'fulfillment_status',
        'item_count',
        'tags',
        'product_details',
        'delivery_method',
        'created_at',
        'updated_at',
        'order_number',
        'product_quantities',
        'customer_email',
        'customer_phone',
        'order_product_image',
        'product_size',
        'pincode',
        'email_send',
        'discount_type',
        'discount_value',
        'discount_amount',
        'discount_reason',
        'shipping_option',
        'is_international_order',
        'usd_total',
        'currency',
        'country',
        'state',
        'city',
        'received',
        'balance',
        'cgst',
        'sgst',
        'igst',
        'customer_gstin',
        'shipping_amount',
        'is_draft'
    ];

    public function getorders()
    {
        return $this->findAll();
    }

    public function GetallShipments()
    {
        $shipment = $this->db->table('order_shipment')->get()->getResultArray();
        return $shipment;
    }

    public function GetallOrders()
    {
        $shipment = $this->db->table('order_management')->get()->getResultArray();
        return $shipment;
    }

    public function InsertShipmentData($data)
    {
        return $this->db->table('order_shipment')->insertBatch($data);
    }

    public function InsertOrdersData($data)
    {
        return $this->db->table('order_management')->insertBatch($data);
    }

    public function getOrdercounts()
    {
        return $this->countAll();
    }

    public function addneworder($data)
    {
        // Get the highest current order number
        $builder = $this->db->table($this->table);
        $builder->select('MAX(CAST(SUBSTRING(order_management, 2) AS UNSIGNED)) AS max_order');
        $query = $builder->get();
        $result = $query->getRow();

        $nextOrderNumber = $result->max_order + 1;
        $formattedOrderNumber = '#' . str_pad($nextOrderNumber, 6, '0', STR_PAD_LEFT);

        // Add the formatted order number to the data
        $data['order_management'] = $formattedOrderNumber;

        // Insert the order
        return $this->insert($data);
    }

    public function checkAmazonOrderExists($orderNumber)
    {
        return $this->where('amz_order_id', $orderNumber)
                    ->where('channel', 'amazon')
                    ->first();
    }

    public function getOrderdetail($id)
    {
        return $this->where('order_id', $id)->first();
    }

    public function deleteorder($id)
    {
        return $this->where('order_id', $id)->delete();
    }

    public function getorderinfo($id)
    {
        return $this->where('user_id', $id)
            ->orderBy('order_date', 'DESC')
            ->findAll();
    }

    public function getTotalOrders($user_id)
    {
        return $this->where('user_id', $user_id)->countAllResults();
    }

    public function getordersbysellera($user_id)
    {
        $data = $this->db->table('order_management')->where('seller_id', $user_id)->get()->getResultArray();
        return $data;
    }

    public function createOrder($data)
    {
        $this->insert($data);
        return $this->insertID();
    }

    public function getLastOrderNumber()
    {
        return $this->orderBy('order_number', 'DESC')->first();
    }

    public function createOrderShipment($orderData, $productDetails)
    {
        $db = \Config\Database::connect();
        $shipmentTable = $db->table('order_shipment');
        $productsTable = $db->table('products');

        $sellerProducts = [];
        foreach ($productDetails as $product) {
            $sellerId = $product['seller_id'];
            $pickupLocation = $product['pickup_location'];
            if (!isset($sellerProducts[$sellerId])) {
                $sellerProducts[$sellerId] = [];
            }
            if (!isset($sellerProducts[$sellerId][$pickupLocation])) {
                $sellerProducts[$sellerId][$pickupLocation] = [];
            }
            $sellerProducts[$sellerId][$pickupLocation][] = $product;
        }

        $suffixCounter = 0;
        $suffixes = range('a', 'z');

        foreach ($sellerProducts as $sellerId => $pickupLocations) {
            foreach ($pickupLocations as $location => $products) {
                // Calculate dimensions and weight
                $maxLength = 0;
                $maxBreadth = 0;
                $maxHeight = 0;
                $totalWeight = 0;

                foreach ($products as $product) {
                    // Fetch product dimensions and weight from products table
                    $productInfo = $productsTable->select('length, breadth, height, weight')
                        ->where('product_id', $product['product_id'])
                        ->get()
                        ->getRowArray();

                    if ($productInfo) {
                        $maxLength = max($maxLength, $productInfo['length']);
                        $maxBreadth = max($maxBreadth, $productInfo['breadth']);
                        $maxHeight = max($maxHeight, $productInfo['height']);
                        $totalWeight += $productInfo['weight'] * $product['quantity'];
                    }
                }

                // Create unique order number with suffix
                $uniqueOrderNumber = $orderData['order_number'] . '-' . $suffixes[$suffixCounter];
                $suffixCounter++;

                $shipmentData = [
                    'order_shipment_id' => 'SHIP-' . uniqid(),
                    'order_id' => $orderData['order_id'],
                    'order_number' => $uniqueOrderNumber,
                    'seller_id' => $sellerId,
                    'pickup_location' => $location,
                    'order_date' => $orderData['created_at'],
                    'billing_customer_name' => $orderData['customer'],
                    'billing_address' => $orderData['customer_address'],
                    'billing_pincode' => $orderData['pincode'],
                    'billing_email' => $orderData['customer_email'],
                    'billing_phone' => $orderData['customer_phone'],
                    'total' => $orderData['total_amount'],
                    'shipping_is_billing' => true,
                    'payment_method' => $orderData['payment_method'],
                    'sub_total' => array_sum(array_map(function ($p) {
                        return $p['selling_price'] * $p['quantity'];
                    }, $products)),
                    'order_items' => json_encode($products, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES),
                    'length' => $maxLength,
                    'breadth' => $maxBreadth,
                    'height' => $maxHeight,
                    'weight' => $totalWeight,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ];

                $shipmentTable->insert($shipmentData);
            }
        }
    }

    public function updateOrderShipments($orderId, $orderNumber, $orderData, $productDetails)
    {
        $db = \Config\Database::connect();
        $shipmentTable = $db->table('order_shipment');
        $productsTable = $db->table('products');
    
        // Delete existing shipments for this order
        $shipmentTable->where('order_id', $orderId)->delete();
    
        // Group products by seller and pickup location
        $sellerProducts = [];
        foreach ($productDetails as $product) {
            $sellerId = $product['seller_id'];
            $pickupLocation = $product['pickup_location'];
            if (!isset($sellerProducts[$sellerId])) {
                $sellerProducts[$sellerId] = [];
            }
            if (!isset($sellerProducts[$sellerId][$pickupLocation])) {
                $sellerProducts[$sellerId][$pickupLocation] = [];
            }
            $sellerProducts[$sellerId][$pickupLocation][] = $product;
        }
    
        // Create new shipments
        $suffixCounter = 0;
        $suffixes = range('a', 'z');
        
        foreach ($sellerProducts as $sellerId => $pickupLocations) {
            foreach ($pickupLocations as $location => $products) {
                // Calculate dimensions and weight
                $maxLength = 0;
                $maxBreadth = 0;
                $maxHeight = 0;
                $totalWeight = 0;
    
                foreach ($products as $product) {
                    $productInfo = $productsTable->select('length, breadth, height, weight')
                        ->where('product_id', $product['product_id'])
                        ->get()
                        ->getRowArray();
    
                    if ($productInfo) {
                        $maxLength = max($maxLength, $productInfo['length']);
                        $maxBreadth = max($maxBreadth, $productInfo['breadth']);
                        $maxHeight = max($maxHeight, $productInfo['height']);
                        $totalWeight += $productInfo['weight'] * $product['quantity'];
                    }
                }
    
                // Create shipment with original order number plus suffix
                $uniqueOrderNumber = $orderNumber . '-' . $suffixes[$suffixCounter];
                $suffixCounter++;
    
                $shipmentData = [
                    'order_shipment_id' => 'SHIP-' . uniqid(),
                    'order_id' => $orderId,
                    'order_number' => $uniqueOrderNumber,
                    'seller_id' => $sellerId,
                    'pickup_location' => $location,
                    'order_date' => $orderData['updated_at'],
                    'billing_customer_name' => $orderData['customer'],
                    'billing_address' => $orderData['customer_address'],
                    'billing_pincode' => $orderData['pincode'],
                    'billing_email' => $orderData['customer_email'],
                    'billing_phone' => $orderData['customer_phone'],
                    'total' => $orderData['total_amount'],
                    'shipping_is_billing' => true,
                    'payment_method' => $orderData['payment_method'],
                    'sub_total' => array_sum(array_map(function ($p) {
                        return $p['selling_price'] * $p['quantity'];
                    }, $products)),
                    'order_items' => json_encode($products, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES),
                    'length' => $maxLength,
                    'breadth' => $maxBreadth,
                    'height' => $maxHeight,
                    'weight' => $totalWeight,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ];
    
                $shipmentTable->insert($shipmentData);
            }
        }
    }

    public function getordersbyseller($user_id)
    {
        return $this->where('FIND_IN_SET("' . $user_id . '", seller_id)')
            ->where('shipment_status', 'Pending')
            ->findAll();
    }

    public function getShipmentById($shipmentId)
    {
        return $this->db->table('order_shipment')
            ->where('order_shipment_id', $shipmentId)
            ->get()
            ->getRowArray();
    }

    public function getReturnShipmentById($returnShipmentId)
    {
        return $this->db->table('return_shipment')
            ->where('return_shipment_id', $returnShipmentId)
            ->get()
            ->getRowArray();
    }

    public function getcourierReturnShipmentById($returnShipmentId)
    {
        return $this->db->table('return_shipment')
            ->where('r_shipment_id', $returnShipmentId)
            ->get()
            ->getRowArray();
    }


    public function updateShipment($shipmentId, $data)
    {
        return $this->db->table('order_shipment')
            ->where('order_shipment_id', $shipmentId)
            ->update($data);
    }

    public function updateReturnShipment($returnShipmentId, $data)
    {
        return $this->db->table('return_shipment')
            ->where('r_shipment_id', $returnShipmentId)
            ->update($data);
    }

    public function updateShipmentDimensions($shipmentId, $dimensions)
    {
        return $this->db->table('order_shipment')
            ->where('order_shipment_id', $shipmentId)
            ->update($dimensions);
    }

    public function getShipmentsByOrderNumber($orderNumber)
    {
        return $this->db->table('order_shipment')
            ->like('order_number', $orderNumber, 'after') // 'after' ensures it checks the start of the field
            ->get()
            ->getResultArray();
    }

    public function getShipmentByAwb($awbCode)
    {
        return $this->db->table('order_shipment')
            ->where('tracking_id', $awbCode)
            ->get()
            ->getResultArray();
    }

    public function getOrdersWithCustomerInfo()
    {
        return $this->db->table('order_management')
            ->select('order_management.*, users.name as customer')
            ->join('users', 'users.user_id = order_management.user_id', 'left') // Adjust column names as per your database
            ->get()
            ->getResultArray();
    }


    public function getuserOrderData($userId)
    {
        try {
            $builder = $this->db->table($this->table);
            $order = $builder->select('*')
                           ->where('user_id', $userId)
                           ->orderBy('created_at', 'DESC')
                           ->limit(1)
                           ->get()
                           ->getRowArray();
                           
            if (!$order) {
                log_message('error', 'Order not found for user ID: ' . $userId);
                return [
                    'order_number' => 'N/A',
                    'fulfillment_status' => 'N/A',
                    'created_at' => 'N/A',
                    'delivery_date' => 'N/A',
                    'return_date' => 'N/A',
                    'total_amount' => 'N/A',
                    'tracking_id' => 'N/A',
                    'transaction_id' => 'N/A',
                    'product_name' => 'N/A'
                ];
            }
            
            return $order;
        } catch (\Exception $e) {
            log_message('error', 'Database error while fetching user order data: ' . $e->getMessage());
            return [
                'order_number' => 'N/A',
                'fulfillment_status' => 'N/A',
                'created_at' => 'N/A',
                'delivery_date' => 'N/A',
                'return_date' => 'N/A',
                'total_amount' => 'N/A',
                'tracking_id' => 'N/A',
                'transaction_id' => 'N/A',
                'product_name' => 'N/A'
            ];
        }
    }

    public function getlast5_ordersData($userId)
    {
        try {
            $builder = $this->db->table($this->table);
            $orders = $builder->select('order_number, transaction_id')
                           ->where('user_id', $userId)
                           ->orderBy('created_at', 'DESC')
                           ->limit(5)
                           ->get()
                           ->getResultArray();
                           
            if (!$orders) {
                log_message('error', 'No orders found for user ID: ' . $userId);
                return [
                    ['number' => 'N/A', 'transactions' => 'N/A'],
                    ['number' => 'N/A', 'transactions' => 'N/A'],
                    ['number' => 'N/A', 'transactions' => 'N/A'],
                    ['number' => 'N/A', 'transactions' => 'N/A'],
                    ['number' => 'N/A', 'transactions' => 'N/A']
                ];
            }
            
            $last5Orders = [];
            foreach ($orders as $order) {
                $last5Orders[] = [
                    'number' => $order['order_number'] ?? 'N/A',
                    'transactions' => $order['transaction_id'] ?? 'N/A'
                ];
            }
            
            return $last5Orders;
        } catch (\Exception $e) {
            log_message('error', 'Database error while fetching last 5 orders data: ' . $e->getMessage());
            return [
                ['number' => 'N/A', 'transactions' => 'N/A'],
                ['number' => 'N/A', 'transactions' => 'N/A'],
                ['number' => 'N/A', 'transactions' => 'N/A'],
                ['number' => 'N/A', 'transactions' => 'N/A'],
                ['number' => 'N/A', 'transactions' => 'N/A']
            ];
        }
    }
    
    public function getOrderTracking($orderNumber)
    {
        return $this->db->table('order_shipment')
            ->select('tracking_id, tracking_details, order_items, shipment_status')
            ->like('order_number', $orderNumber, 'after') // Match order_number without suffixes
            ->get()
            ->getResultArray();
    }
}
