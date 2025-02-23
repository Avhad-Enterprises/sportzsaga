<?php
namespace App\Controllers;

use App\Models\CustomInvoiceModel;
use App\Models\InvoiceItemModel;

class CustomInvoice extends BaseController
{
    public function index()
    {
        $model = new CustomInvoiceModel();
        $data['invoice_number'] = $model->generateInvoiceNumber();
        return view('invoice/create_invoice', $data);
    }
    
    public function create()
    {
        $model = new CustomInvoiceModel();
        
        // Prepare main invoice data
        $invoiceData = [
            'invoice_number' => $this->request->getPost('invoice_number'),
            'invoice_date' => $this->request->getPost('invoice_date'),
            'due_date' => $this->request->getPost('due_date'),
            'company_name' => $this->request->getPost('company_name'),
            'company_address' => $this->request->getPost('company_address'),
            'company_phone' => $this->request->getPost('company_phone'),
            'company_email' => $this->request->getPost('company_email'),
            'company_gst' => $this->request->getPost('company_gst'),
            'client_name' => $this->request->getPost('client_name'),
            'client_company' => $this->request->getPost('client_company'),
            'client_address' => $this->request->getPost('client_address'),
            'client_phone' => $this->request->getPost('client_phone'),
            'client_email' => $this->request->getPost('client_email'),
            'client_gst' => $this->request->getPost('client_gst'),
            'subtotal' => $this->request->getPost('subtotal'),
            'gst_percentage' => $this->request->getPost('gst_percentage'),
            'gst_amount' => $this->request->getPost('gst_amount'),
            'discount_percentage' => $this->request->getPost('discount_percentage'),
            'discount_amount' => $this->request->getPost('discount_amount'),
            'total_amount' => $this->request->getPost('total_amount'),
            'payment_terms' => $this->request->getPost('payment_terms'),
            'bank_account' => $this->request->getPost('bank_account'),
            'ifsc_code' => $this->request->getPost('ifsc_code'),
            'upi_id' => $this->request->getPost('upi_id'),
            'notes' => $this->request->getPost('notes')
        ];
        
        // Prepare items data
        $items = [];
        $descriptions = $this->request->getPost('item_description');
        $hsnCodes = $this->request->getPost('item_hsn');
        $quantities = $this->request->getPost('item_quantity');
        $prices = $this->request->getPost('item_price');
        $totals = $this->request->getPost('item_total');
        
        foreach ($descriptions as $key => $description) {
            $items[] = [
                'description' => $description,
                'hsn_code' => $hsnCodes[$key],
                'quantity' => $quantities[$key],
                'unit_price' => $prices[$key],
                'total_price' => $totals[$key]
            ];
        }
        
        // Save invoice and items
        $invoiceId = $model->insertInvoice($invoiceData, $items);
        
        if ($invoiceId) {
            return $this->response->setJSON([
                'status' => 'success',
                'invoice_id' => $invoiceId,
                'message' => 'Invoice created successfully'
            ]);
        } else {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Error creating invoice'
            ]);
        }
    }
    
    public function generatePdf($invoiceId)
    {
        $model = new CustomInvoiceModel();
        $invoice = $model->getInvoiceWithItems($invoiceId);
        
        if (!$invoice) {
            return $this->response->setJSON(['error' => 'Invoice not found']);
        }
        
        // Create PDF using TCPDF
        $pdf = new \TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        
        // Set document properties
        $pdf->SetCreator('Your Company');
        $pdf->SetAuthor('Your Company');
        $pdf->SetTitle('Invoice #' . $invoice['invoice_number']);
        
        // Remove default header/footer
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        
        // Add a page
        $pdf->AddPage();
        
        // Add content to PDF
        $html = view('invoice/pdf_template', ['invoice' => $invoice]);
        $pdf->writeHTML($html, true, false, true, false, '');
        
        // Output PDF
        header('Content-Type: application/pdf');
        header('Content-Disposition: inline; filename="invoice-' . $invoice['invoice_number'] . '.pdf"');
        echo $pdf->Output('invoice-' . $invoice['invoice_number'] . '.pdf', 'S');
        exit;
    }
}