<?php
namespace App\Models;

use CodeIgniter\Model;

class CustomInvoiceModel extends Model
{
    protected $table = 'invoice_generation';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'invoice_number', 'invoice_date', 'due_date',
        'company_name', 'company_address', 'company_phone', 'company_email', 'company_gst',
        'client_name', 'client_company', 'client_address', 'client_phone', 'client_email', 'client_gst',
        'subtotal', 'gst_percentage', 'gst_amount', 'discount_percentage', 'discount_amount', 'total_amount',
        'payment_terms', 'bank_account', 'ifsc_code', 'upi_id', 'notes'
    ];
    
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    
    public function insertInvoice($data, $items)
    {
        $db = \Config\Database::connect();
        
        try {
            $db->transStart();
            
            // Insert main invoice data
            $this->insert($data);
            $invoiceId = $this->insertID();
            
            // Insert invoice items
            $itemModel = new InvoiceItemModel();
            foreach ($items as $item) {
                $item['invoice_id'] = $invoiceId;
                $itemModel->insert($item);
            }
            
            $db->transComplete();
            
            return $invoiceId;
        } catch (\Exception $e) {
            log_message('error', 'Error creating invoice: ' . $e->getMessage());
            return false;
        }
    }

    public function getInvoiceWithItems($id)
    {
        $invoice = $this->find($id);
        if ($invoice) {
            $itemModel = new InvoiceItemModel();
            $invoice['items'] = $itemModel->where('invoice_id', $id)->findAll();
        }
        return $invoice;
    }

    public function generateInvoiceNumber()
    {
        $prefix = 'INV';
        $year = date('Y');
        $month = date('m');
        
        $lastInvoice = $this->orderBy('id', 'DESC')->first();
        
        if ($lastInvoice) {
            $lastNumber = intval(substr($lastInvoice['invoice_number'], -4));
            $newNumber = str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);
        } else {
            $newNumber = '0001';
        }
        
        return $prefix . $year . $month . $newNumber;
    }
}

class InvoiceItemModel extends Model
{
    protected $table = 'invoice_items';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'invoice_id', 'description', 'hsn_code', 'quantity', 'unit_price', 'total_price'
    ];
}