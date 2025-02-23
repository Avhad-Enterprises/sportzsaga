<?php

namespace App\Models;

use CodeIgniter\Model;

class PurchaseOrderModel extends Model
{
    protected $table = 'purchase_orders';              // Name of the database table
    protected $primaryKey = 'id';                      // Primary key for the table
    protected $allowedFields = [
        'po_number',
        'order_date',
        'supplier_name',
        
        'product_name',
       
        'quantity',
        'unit_price',
        'total_price',
        'warehouse_name',
    
        'expected_delivery_date',
        'shipping_address',
        'shipping_method',
        'shipping_cost',
        'payment_terms',
        'order_status',
        'approved_by',
        'approval_date',
        'remarks',
        'attachments',
        'tax',
        'discount'
    ];                                                  // Fields that can be inserted/updated
    protected $useTimestamps = true;                    // Automatically manage created_at and updated_at timestamps
    protected $createdField = 'created_at';             // Custom field for creation timestamp
    protected $updatedField = 'updated_at';             // Custom field for update timestamp

    // Optional: If you want to automatically validate some fields
    protected $validationRules = [
        'po_number' => 'required|is_unique[purchase_orders.po_number]',      // PO Number is required and unique
        'order_date' => 'required|valid_date[Y-m-d]',                         // Order Date should be a valid date
        'supplier_name' => 'required',                                          // Supplier Name is required
        'quantity' => 'required|integer|greater_than[0]',                       // Quantity should be a positive integer
        'unit_price' => 'required|decimal',                                    // Unit price should be a valid decimal
        'payment_terms' => 'required',                                          // Payment Terms is required
        'order_status' => 'required|in_list[Pending,Approved,Dispatched,Received,Cancelled]', // Order Status from predefined options
        'shipping_method' => 'required',                                        // Shipping Method is required
        'shipping_cost' => 'required|decimal',                                  // Shipping Cost is required
        'remarks' => 'permit_empty|string',                                     // Remarks (optional)
    ];

    // Optional: Custom validation error messages
    protected $validationMessages = [
        'po_number' => [
            'required' => 'The PO Number is required.',
            'is_unique' => 'The PO Number must be unique.'
        ],
        'order_date' => [
            'required' => 'The Order Date is required.',
            'valid_date' => 'The Order Date must be a valid date.'
        ],
        // Add custom error messages for other fields as needed
    ];

    // Method to get the total cost of an order (calculated field)
    public function getOrderTotal($orderId)
    {
        return $this->selectSum('total_price')
                    ->where('id', $orderId)
                    ->first();
    }

    // Method to get all products in a purchase order (assuming a relation to a products table)
    public function getOrderProducts($orderId)
    {
        return $this->table('purchase_order_products')
                    ->where('purchase_order_id', $orderId)
                    ->findAll();
    }

    // Method to get suppliers (if you have a suppliers table)
    public function getSuppliers()
    {
        return $this->db->table('suppliers')
                        ->select('id, name')
                        ->get()
                        ->getResultArray();
    }

    public function getpoData()
    {
        return $this->findAll();
    }
}
