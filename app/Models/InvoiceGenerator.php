<?php
namespace App\Models;

use CodeIgniter\Model;

class InvoiceGenerator extends Model
{
    private $orderModel;
    private $productsModel;
    private $userModel;

    public function __construct(Ordermanagement_model $orderModel, Products_model $productsModel, Registerusers_model $userModel)
    {
        $this->orderModel = $orderModel;
        $this->productsModel = $productsModel;
        $this->userModel = $userModel;
    }

    public function generateInvoice($orderId)
    {
        log_message('info', 'Fetching order for invoice generation. Order ID: ' . $orderId);
    
        $order = $this->orderModel->find($orderId);
        if (!$order) {
            log_message('error', 'Order not found for ID: ' . $orderId);
            return null;
        }
    
        log_message('info', 'Order found. Decoding product details.');
    
        // Safely decode product details, handle null or invalid JSON
        $productDetails = json_decode($order['product_details'], true);
        if (json_last_error() !== JSON_ERROR_NONE || !is_array($productDetails)) {
            log_message('error', 'Invalid or empty product_details JSON for order ID: ' . $orderId);
            $productDetails = []; // Default to an empty array
        }
    
        // Prepare invoice data
        $invoiceData = [
            'customer_name' => $order['customer'] ?? 'N/A',
            'customer_address' => $order['customer_address'] ?? 'N/A',
            'order_number' => $order['order_number'] ?? 'N/A',
            'customer_gst' => $order['customer_gstin'] ?? 0,
            'order_date' => $order['order_date'] ?? 'N/A',
            'pincode' => $order['pincode'] ?? 'N/A',
            'is_draft' => $order['is_draft'] ?? 1,
            'payment_status' => $order['payment_status'] ?? 'N/A',
            'payment_method' => $order['payment_method'] ?? 'N/A',
            'payment_ref' => $order['payment_ref'] ?? 0,
            'subtotal' => $order['total_amount_before_discount'] ?? 0,
            'discount_amount' => $order['discount_amount'] ?? 0,
            'shipping_amount' => $order['shipping_amount'] ?? 0,
            'gst_type' => isset($order['igst']) && $order['igst'] > 0 ? 'IGST' : 'CGST_SGST',
            'cgst' => $order['cgst'] ?? 0,
            'sgst' => $order['sgst'] ?? 0,
            'igst' => $order['igst'] ?? 0,
            'total' => $order['total_amount'] ?? 0,
            'products' => $this->handleNullProductDetails($productDetails)
        ];

        //print_r($invoiceData);exit();
    
        log_message('info', 'Invoice data prepared. Generating PDF.');
    
        // Generate PDF invoice
        try {
            $pdf = $this->createPdfInvoice($invoiceData);
            log_message('info', 'PDF generated successfully for order ID: ' . $orderId);
            return $pdf;
        } catch (\Exception $e) {
            log_message('error', 'Error generating PDF: ' . $e->getMessage());
            return null;
        }
    }
  
    
    public function generateInvoiceforemail($orderId)
    {
        log_message('info', 'Fetching order for invoice generation. Order ID: ' . $orderId);
    
        $order = $this->orderModel->find($orderId);
        if (!$order) {
            log_message('error', 'Order not found for ID: ' . $orderId);
            return null;
        }
    
        log_message('info', 'Order found. Decoding product details.');
    
        // Safely decode product details, handle null or invalid JSON
        $productDetails = json_decode($order['product_details'], true);
        if (json_last_error() !== JSON_ERROR_NONE || !is_array($productDetails)) {
            log_message('error', 'Invalid or empty product_details JSON for order ID: ' . $orderId);
            $productDetails = []; // Default to an empty array
        }
    
        // Prepare invoice data
        $invoiceData = [
            'customer_name' => $order['customer'] ?? 'N/A',
            'customer_address' => $order['customer_address'] ?? 'N/A',
            'order_number' => $order['order_number'] ?? 'N/A',
            'customer_gst' => $order['customer_gstin'] ?? 0,
            'order_date' => $order['order_date'] ?? 'N/A',
            'pincode' => $order['pincode'] ?? 'N/A',
            'is_draft' => $order['is_draft'] ?? 0,
            'payment_status' => $order['payment_status'] ?? 'N/A',
            'payment_method' => $order['payment_method'] ?? 'N/A',
            'payment_ref' => $order['payment_ref'] ?? 0,
            'subtotal' => $order['total_amount_before_discount'] ?? 0,
            'discount_amount' => $order['discount_amount'] ?? 0,
            'shipping_amount' => $order['shipping_amount'] ?? 0,
            'gst_type' => isset($order['igst']) && $order['igst'] > 0 ? 'IGST' : 'CGST_SGST',
            'cgst' => $order['cgst'] ?? 0,
            'sgst' => $order['sgst'] ?? 0,
            'igst' => $order['igst'] ?? 0,
            'total' => $order['total_amount'] ?? 0,
            'products' => $this->handleNullProductDetails($productDetails)
        ];

        //print_r($invoiceData);exit();
    
        log_message('info', 'Invoice data prepared. Generating PDF.');
    
        // Generate PDF invoice
        try {
            $pdf = $this->createPdfInvoice($invoiceData);
            log_message('info', 'PDF generated successfully for order ID: ' . $orderId);
            return $pdf;
        } catch (\Exception $e) {
            log_message('error', 'Error generating PDF: ' . $e->getMessage());
            return null;
        }
    }

    private function createPdfInvoice($data)
    {
        log_message('info', 'Starting PDF invoice generation for Order ID: ' . $data['order_number']);
    
        // Load TCPDF library
        $pdf = new \TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    
        try {
            // Document Properties
            $pdf->SetCreator('SPORTZSAGA ENTERPRISE');
            $pdf->SetTitle('Tax Invoice');
            $pdf->setPrintHeader(false);
            $pdf->setPrintFooter(false);
            $pdf->SetMargins(10, 10, 10);
            $pdf->AddPage();
    
            // HTML Structure with Adjustments
            $html = '
            <style>
                h1, h3 {
                    margin: 0;
                    color:rgb(0, 0, 0);
                }
                h2 {
                    margin: 0;
                    font-family: sans-serif;
                    color: #7A5CFA;
                }
                table {
                    width: 100%;
                    font-family: sans-serif;
                    font-size: 10pt;
                    border-collapse: collapse;
                }
                td {
                    padding: 8px; /* Added padding */
                    text-align: left;
                    line-height: 1.5;
                }
                th {
                    background-color: #7A5CFA;
                    color: white;
                    font-weight: bold;
                    font-size: 10pt;
                    padding: 8px; /* Added padding */
                    text-align: center;
                    line-height: 0.7;
                }
                .summary-title {
                    font-weight: bold;
                }
                .spacing {
                    margin-top: 10px;
                    margin-bottom: 10px;
                }
                .total {
                    font-weight: bold;
                    font-size: 11pt;
                }
                .text-left {                    
                    text-align: left;
                }
                .text-right {
                    text-align: right;
                }
                .text-center {
                    text-align: center;
                }
                .stamp {
                    text-align: center;
                    margin-top: 20px;
                }
                .stamp p{                   
                    line-height: 0.7;
                }
                .currency {
                    font-family: "dejavusans", sans-serif;
                }
            </style>
    
            <!-- Header Section -->
            <table>
                <tr>
                    <td style="width: 60%;">
                        <h1>SPORTZSAGA ENTERPRISE</h1><br>
                        <t>Phone: 8591426598</t><br>
                        <t>Email: sportsaaga@gmail.com</t><br>
                        <t>GSTIN: 27FXLPM5458K1ZN</t><br>
                        <t>State: 27-Maharashtra</t>
                    </td>
                    <td style="width: 40%; text-align: right;">
                    <br><br><br>
                        <img src="https://storage.googleapis.com/mkv_imagesbackend/blogs/main_images/sagalogo.png" width="70px" />
                    </td>
                </tr>
            </table>
            <hr>
    
            <!-- Invoice Title -->
            <h2 style="text-align: center;" class="spacing">Tax Invoice</h2>
    
            <!-- Bill To, Ship To, Invoice Details -->
            <table>
                <tr>
                    <td style="width: 33%;">
                        <h3>Bill To</h3>
                        <p><strong>' . $data['customer_name'] . '</strong></p>
                        <table>
                            <tr>
                                <td>' . $data['customer_address'] . '</td>
                            </tr>
                            <tr>
                                <td>Pincode: ' . $data['pincode'] . '</td>
                            </tr>                        
                                ' . ($data['customer_gst'] == '' ? '' : '<tr><td>GSTIN: ' . $data['customer_gst'] . '</td></tr>' ) . '                                
                        </table>
                    </td>
                    <td style="width: 33%;">
                        <h3>Ship To</h3>
                        <p><strong>' . $data['customer_name'] . '</strong></p>
                        <table>
                            <tr>
                                <td>' . $data['customer_address'] . '</td>
                            </tr>
                            <tr>
                                <td>Pincode: ' . $data['pincode'] . '</td>
                            </tr>
                        </table>
                    </td>
                    <td class="text-right" style="width: 33%; text-right;">
                        <h3>Invoice Details</h3>
                        <p>Invoice No: <strong>' . $data['order_number'] . '</strong><br>
                        Date: ' . date('d-m-Y', strtotime($data['order_date'])) . '<br>
                        Place of Supply: Maharashtra<br>
                        '.($data['is_draft'] == 0 ? '' :'Draft Copy').'</p>
                    </td>
                </tr>
            </table>
    
            <!-- Spacer -->
            <div class="spacing"></div>
    
            <!-- Item Table -->
            <table>
                <thead>
                    <tr class="spacing" >
                        <th style="width: 5%;"><br><br>#<br></th>
                        <th style="width: 35%;"><br><br>Item Name<br></th>
                        <th style="width: 10%;"><br><br>HSN/SAC<br></th>
                        <th style="width: 10%;"><br><br>Quantity<br></th>
                        <th style="width: 15%;" class="text-right"><br><br>Unit Price<br></th>
                        <th style="width: 10%;" class="text-right"><br><br>Discount<br></th>
                        <th style="width: 15%;" class="text-right"><br><br>Subtotal<br></th>
                    </tr>
                </thead>
                <tbody>';
    
            // Add Product Rows
            $counter = 1;
            $subtotal = 0;
            foreach ($data['products'] as $product) {
                $amount = ($product['selling_price'] - ($product['product_discount']/$product['quantity'])) * $product['quantity'];
                $subtotal += $amount;
    
                $html .= '
                    <tr>
                        <td class="text-center" style="width: 5%;">' . $counter++ . '</td>
                        <td class="text-left" style="width: 35%;"><strong>' . $product['product_title'] . '</strong></td>
                        <td class="text-center" style="width: 10%;">' . ($product['hsn'] ?? 'N/A') . '</td>
                        <td class="text-center" style="width: 10%;">' . $product['quantity'] . '</td>
                        <td class="currency text-right" style="width: 15%;">₹' . number_format($product['selling_price'], 2) . '</td>
                        <td class="currency text-right" style="width: 10%;">₹' . number_format($product['product_discount'], 2) . '</td>
                        <td class="currency text-right" style="width: 15%;">₹' . number_format($amount, 2) . '</td>
                    </tr>';
            }

            if ($data['payment_status'] == "partial_cod"){
                $html .= '
                    <tr>
                        <td class="text-center" style="width: 5%;">' . $counter++ . '</td>
                        <td class="text-left" style="width: 35%;"><strong>Partial COD</strong></td>
                        <td class="text-center" style="width: 10%;">N/A</td>
                        <td class="text-center" style="width: 10%;">1</td>
                        <td class="currency text-right" style="width: 15%;">₹300</td>
                        <td class="currency text-right" style="width: 10%;">₹0</td>
                        <td class="currency text-right" style="width: 15%;">₹300</td>
                    </tr>';
            }

    
            $html .= '
                </tbody>
            </table>
            <hr>
            <!-- Spacer -->
            <div class="spacing"></div>
    
            <!-- Summary Section -->
            <table>
                <tr>
                    <td style="width: 60%; border: none;">
                        <p><strong>Invoice Amount in Words<br></strong> ' . ucfirst($this->convertNumberToWords($data['total'])) . '</p>
                        <p><strong>Terms And Conditions<br></strong> Thanks for doing business with us</p>
                        <table>
                            <tr>
                                <td><strong>Payment Status :</strong></td>
                                <td>' . ($data['payment_status'] == "Paid" ? 'PREPAID' : 'PENDING') . '</td>
                            </tr>
                            <tr>
                                <td><strong>Payment Method :</strong></td>
                                <td>' . ($data['payment_method'] === 'cash' ? 'Cash' : 
                                        ($data['payment_method'] === 'link' ? 'Gateway' : 
                                        ($data['payment_method'] === 'bank' ? 'Net Banking / UPI' : ''))) . '</td>
                            </tr>
                            '.(
                                $data['payment_ref'] == '' ? '' :
                                '<tr>
                                    <td><strong>Ref No :</strong></td>
                                    <td>' . $data['payment_ref'] . '</td>
                                </tr>'
                            ).'
                        </table>
                    </td>
                    <td style="width: 40%;">
                        <table><br>
                            <tr><td class="summary-title">Subtotal</td><td class="currency text-right">₹' . number_format($subtotal, 2) . '</td></tr>
                            <tr><td class="summary-title">Discount</td><td class="currency text-right">₹' . number_format($data['discount_amount'], 2) . '</td></tr>
                            ' . ($data['igst'] == 0 ? 
                                '<tr><td class="summary-title">CGST(6%)</td><td class="currency text-right">₹' . number_format($data['cgst'], 2) . '</td></tr>
                                 <tr><td class="summary-title">SGST(6%)</td><td class="currency text-right">₹' . number_format($data['sgst'], 2) . '</td></tr>' 
                            :   '<tr><td class="summary-title">IGST(12%)</td><td class="currency text-right">₹' . number_format($data['igst'], 2) . '</td></tr>') . '
                            <tr><td class="summary-title">Shipping Charge</td><td class="currency text-right">₹' . number_format($data['shipping_amount'], 2) . '</td></tr>
                            <tr><th class="summary-title spacing text-left total"><br><br>Total<br></th><th class="currency text-right total"><br><br>₹' . number_format($data['total'], 2) . '<br></th></tr>
                            

                            <tr><td class="summary-title text-left ">Received</td><td class="currency text-right ">₹' . ($data['payment_status'] == "Paid" ? number_format(0, 2) : ($data['payment_status'] == "partial_cod" ? number_format(($data['total'] * 0.3), 2) : number_format($data['total'], 2)) ) . '</td></tr>
                            <tr><td class="summary-title text-left ">Balance</td><td class="currency text-right ">₹' . ($data['payment_status'] == "Paid" ? number_format($data['total'], 2) : ($data['payment_status'] == "partial_cod" ? number_format(($data['total'] * 0.7), 2) : number_format(0, 2) ) ) . '</td></tr>
                            ' . ($data['discount_amount'] == 0 ? '' : '<tr><td class="summary-title text-left "><strong>You Saved</strong></td><td class="currency text-right total"><strong>₹' . number_format($data['discount_amount'], 2) . '</strong></td></tr>') . '
                            
                            <hr>
                            <p class="text-center">For SPORTZSAGA ENTERPRISE</p>
                            <table>
                                <tr>
                                    <td style="width: 30%; border: none;">
                                    </td>
                                    <td style="width: 70%;">
                                    
                                    <img src="https://storage.googleapis.com/mkv_imagesbackend/links/stamp.png" width="60px" />
                                    </td>
                                </tr>
                            </table>
                            <p class="text-center"><strong>SPORTZSAGA ENTERPRISE</strong></p>
                        </table>
                    </td>
                </tr>
            </table>
    
            <!-- Footer -->
            <table class="stamp">
                <tr>
                    <td style="width: 60%; border: none;">
                    </td>
                    <td style="width: 40%;">
                        
                    </td>
                </tr>
            </table>';
    
            // Write HTML to PDF
            $pdf->SetFont('dejavusans', '', 10); // Ensure '₹' displays correctly
            $pdf->writeHTML($html, true, false, true, false, '');
    
            log_message('info', 'PDF invoice successfully generated for Order ID: ' . $data['order_number']);
            return $pdf;
    
        } catch (\Exception $e) {
            log_message('error', 'Error generating PDF: ' . $e->getMessage());
            return null;
        }
    }
    
    
    
    private function convertNumberToWords($number)
    {
        $f = new \NumberFormatter("en", \NumberFormatter::SPELLOUT);
        return $f->format($number) . ' rupees only';
    }
    
    

    private function handleNullProductDetails($productDetails)
    {
        $processedDetails = [];
        foreach ($productDetails as $product) {
            $processedDetails[] = [
                'product_title' => $product['product_title'] ?? 'N/A',
                'hsn' => $product['hsn'] ?? 'N/A',
                'quantity' => $product['quantity'] ?? 1,
                'selling_price' => $product['selling_price'] ?? 0,
                'product_discount' => $product['discount'] ?? 0,
                'subtotal' => $product['subtotal'] ?? 0
            ];
        }
        return $processedDetails;
    }
    
}