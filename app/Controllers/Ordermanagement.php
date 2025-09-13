<?php


namespace App\Controllers;

use App\Models\Ordermanagement_model;
use App\Models\Products_model;
use App\Models\Registerusers_model;
use App\Models\discountcode;
use Picqer\Barcode\BarcodeGeneratorPNG;
use App\Models\Footer_model;
use App\Models\SocialMediaLinks_model;
use App\Models\InvoiceGenerator;
use App\Models\Cart_model;
use App\Models\PincodeModel;
use setasign\Fpdi\Fpdi;

class Ordermanagement extends BaseController
{
    public function index(): string
    {
        $session = session();
        $model = new Ordermanagement_model();
        $pincodeModel = new PincodeModel();
        $userModel = new Registerusers_model();


        if ($session->get('admin_type') == 'seller') {
            $seller_id = $session->get('user_id');
            $orders = $model->getordersbyseller($seller_id);
        } else {
            $orders = $model->getorders();
        }


        foreach ($orders as &$order) {
            $pincode = $order['pincode'];


            $vendors = $pincodeModel->where('area_pincode', $pincode)
                ->where('pickup', 'Y')
                ->where('delivery', 'Y')
                ->where('cod', 'Y')
                ->findAll();

            foreach ($vendors as &$vendor) {
                $vendorDetails = $pincodeModel->where('delivery_partner', $vendor['delivery_partner'])
                    ->where('area_pincode', $pincode)
                    ->first();
                $vendor['cost'] = $vendorDetails['cost'] ?? 0;
                $vendor['discount'] = $vendorDetails['discount'] ?? 0;
            }


            $order['vendors'] = $vendors;

            if (!empty($order['user_id'])) {
                $customer = $userModel->find($order['user_id']);
                $order['customer'] = $customer ? $customer['name'] : 'No Name';
            }
        }

        $data['orders'] = $orders;

        return view('ordermanagement_view', $data);
    }




    public function deleteorder($id)
    {
        $model = new Ordermanagement_model();
        $model->deleteorder($id);
        return redirect()->to('ordermanagement')->with('success', 'Order deleted successfully.');
    }

    public function addneworder()
    {
        $usermodel = new Registerusers_model();
        $model = new Products_model();
        $pincodeModel = new PincodeModel();
        $data['users'] = $usermodel->getallusers();
        $data['products'] = $model->getallproducts();
        $data['delivery_partner'] = $pincodeModel->findAll();
        return view('add_order_view', $data);
    }

    public function addnewcustomer()
    {
        $model = new Registerusers_model();
        $password = 'Sportzsaaga@12345';
        $name = $this->request->getPost('name');
        $phone_no = $this->request->getPost('phone_no');
        $email = $this->request->getPost('email');
        $pincode = $this->request->getPost('pincode');
        $city = $this->request->getPost('city');
        $state = $this->request->getPost('state');
        $full_address = $this->request->getPost('customer-address');
        $Customergstin = $this->request->getPost('customergstin');


        $data = [
            'name' => $name,
            'phone_no' => $phone_no,
            'email' => $email,
            'pincode' => $pincode,
            'city' => $city,
            'state' => $state,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'address_information' => $full_address,
            'seller_gst_number' => $Customergstin,
        ];

        if ($model->insert($data)) {
            return redirect()->to('ordermanagement/addneworder')->with('success', 'Customer added successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to add customer.');
        }
    }

    public function getCityStateByPincode($pincode)
    {

        $apiUrl = "https://api.postalpincode.in/pincode/{$pincode}";
        $response = file_get_contents($apiUrl);
        $data = json_decode($response, true);

        if (!empty($data) && $data[0]['Status'] === 'Success') {
            return $this->response->setJSON([
                'city' => $data[0]['PostOffice'][0]['District'],
                'state' => $data[0]['PostOffice'][0]['State']
            ]);
        } else {
            return $this->response->setJSON([]);
        }
    }

    public function generateInvoice($orderId)
    {
        $orderModel = new Ordermanagement_model();
        $productsModel = new Products_model();
        $userModel = new Registerusers_model();

        $invoiceGenerator = new InvoiceGenerator($orderModel, $productsModel, $userModel);
        $pdf = $invoiceGenerator->generateInvoice($orderId);

        if ($pdf) {
            header('Content-Type: application/pdf');
            header('Content-Disposition: inline; filename="order-invoice-' . $orderId . '.pdf"');
            header('Cache-Control: private, max-age=0, must-revalidate');
            header('Pragma: public');

            echo $pdf->Output('order-invoice-' . $orderId . '.pdf', 'S');
            exit;
        } else {
            header('Content-Type: application/json');
            echo json_encode(['error' => 'Order not found']);
            exit;
        }
    }


    public function getCustomerDetails()
    {
        $user_id = $this->request->getVar('user_id');
        $model = new Registerusers_model();
        $customer = $model->find($user_id);

        if ($customer) {
            return $this->response->setJSON($customer);
        } else {
            return $this->response->setJSON([]);
        }
    }

    public function publishorder()
    {
        $orderModel = new Ordermanagement_model();
        $productsModel = new Products_model();
        $userModel = new Registerusers_model();
        $email = \Config\Services::email();

        $rzp_payment_id = $this->request->getPost('rzp_payment_id');
        $rzp_order_id = $this->request->getPost('rzp_order_id');
        $rzp_signature = $this->request->getPost('rzp_signature');

        $customer_id = $this->request->getPost('order-customer-name');
        $pincode = $this->request->getPost('pincode');
        $city = $this->request->getPost('order-city');
        $state = $this->request->getPost('order-state');
        $customer_address = $this->request->getPost('address_information');
        $customer_gst = $this->request->getPost('order-customergstin');
        $payment_method = $this->request->getPost('payment-method');
        $payment_status = $this->request->getPost('payment-status');
        $payment_ref = $this->request->getPost('ref_no');


        if ($payment_method === 'bank' && $rzp_payment_id) {
            $payment_status = 'Paid';
            $payment_ref = $rzp_payment_id;
        }

        $selected_products = $this->request->getPost('selected_products');
        $quantities = $this->request->getPost('modal_quantity');
        $discount_type = $this->request->getPost('discount_type');
        $discount_value = $this->request->getPost('discount_value');
        $discount_reason = $this->request->getPost('discount_reason');
        $discount_values = $this->request->getPost('product_discount');
        $product_values = $this->request->getPost('product_price');
        $total_discount_amount = floatval($this->request->getPost('final_total_discount'));
        $shipping_option = $this->request->getPost('shipping_option');
        $shipping_amount = floatval($this->request->getPost('final_shipment_charges'));
        $order_tags = $this->request->getPost('order-tags');
        $customer_email = $this->request->getPost('order-customer-email');
        $customer_phone = $this->request->getPost('order-customer-phone');
        $cgst = $this->request->getPost('cgst');
        $sgst = $this->request->getPost('sgst');
        $igst = $this->request->getPost('igst');
        $customergstin = $this->request->getPost('order-customergstin');
        $is_international = $this->request->getPost('is_international_order') === 'on';
        $usd_total = 0;
        $currency = strtoupper($this->request->getPost('currency'));
        $country = strtoupper($this->request->getPost('country'));

        $customer = $userModel->where('user_id', $customer_id)->first();
        if (!$customer) {
            session()->setFlashdata('error', 'Customer not found.');
            return redirect()->back()->withInput();
        }

        if (!$selected_products) {
            return redirect()->back()->with('status', 'error')
                ->with('message', 'Products not found.');
        }

        if ($payment_method === 'link') {
            $orderId = $this->savedraftorder();

            if (is_numeric($orderId)) {
                $order_data = $orderModel->getOrderdetail($orderId);
                $product_details = json_decode($order_data['product_details'], true);

                $this->sendOrderConfirmationEmail($customer_email ?? $customer['email'], $customer['name'], $order_data, $product_details, $orderId);
                session()->setFlashdata('success', 'Order Placed successfully, Payment link is sent to ' . $customer['name'] . ' via Email.');
                return redirect()->to(base_url('ordermanagement'));
            } else {
                return redirect()->back()->with('error', 'Failed to save order draft.');
            }
        }

        $total_amount_before_discount = 0;
        $total_discount = 0;

        $product_titles = [];
        $product_details = [];
        $product_shipment_details = [];
        $seller_ids = [];

        foreach ($selected_products as $product_id) {
            $product = $productsModel->find($product_id);
            if (!$product) {
                session()->setFlashdata('error', "Product ID {$product_id} not found.");
                return redirect()->back()->withInput();
            }

            $quantity = isset($quantities[$product_id]) ? intval($quantities[$product_id]) : 1;

            $product_titles[] = $product['product_title'] . ' x ' . $quantity;
            $seller_ids[] = $product['seller_id'];
            $product_price = $product['selling_price'];
            if ($is_international) {
                $product_price += 1000;
            }
            $subtotal = $product_price * $quantity;
            $product_discount = isset($discount_values[$product_id]) ? floatval($discount_values[$product_id]) : 0;
            $discounted_price = max(0, $product_price - $product_discount);

            if ($total_discount_amount > 0) {
                $product_discount = 0;
            }

            $total_amount_before_discount += $subtotal;
            if ($payment_status === "partial_cod") {
                $total_amount_before_discount += ($is_international ? 1300 : 300);
            }
            $total_discount += $product_discount * $quantity;

            $product_details[] = [
                'product_id' => $product_id,
                'product_title' => $product['product_title'],
                'product_image' => $product['product_image'],
                'selling_price' => $product_price,
                'quantity' => $quantity,
                'subtotal' => $subtotal,
                'discount' => $product_discount * $quantity,
                'discounted_price' => $discounted_price * $quantity,
                'sku' => $product['sku'] ?? '',
                'hsn' => $product['hsn'] ?? ''
            ];

            $product_shipment_details[] = [
                'product_id' => $product_id,
                'product_title' => $product['product_title'],
                'product_image' => $product['product_image'],
                'selling_price' => $product['selling_price'],
                'seller_id' => $product['seller_id'],
                'quantity' => $quantity,
                'discount' => $product_discount * $quantity,
                'discounted_price' => $discounted_price * $quantity,
                'pickup_location' => $product['pickup_location'] ?? '',
                'sku' => $product['sku'] ?? '',
                'hsn' => $product['hsn'] ?? ''
            ];
        }

        $total_discount += $total_discount_amount;
        $final_total_amount = $this->request->getPost('final_total_price');

        $product_titles_str = json_encode($product_titles);
        $concatenated_seller_id = implode(', ', array_unique($seller_ids));

        if ($is_international) {
            $usd_total = $final_total_amount * 0.012;
            $cgst = 0;
            $sgst = 0;
            $igst = 0;
        }

        $order_data = [
            'order_number' => $this->generateOrderNumber($orderModel),
            'user_id' => $customer_id,
            'seller_id' => $concatenated_seller_id,
            'product_name' => $product_titles_str,
            'order_product_image' => implode(',', array_column($product_details, 'product_image')),
            'product_quantities' => implode(', ', array_map(fn($d) => $d['product_title'] . ' x ' . $d['quantity'], $product_details)),
            'payment_method' => $payment_method,
            'payment_ref' => $payment_ref,
            'product_details' => json_encode($product_details, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES),
            'customer_address' => $customer_address,
            'order_date' => date('Y-m-d H:i:s'),
            'customer' => $customer['name'],
            'customer_email' => $customer_email ?? $customer['email'],
            'customer_phone' => $customer_phone ?? $customer['phone_no'],
            'pincode' => $pincode,
            'channel' => 'pickup',
            'total_amount_before_discount' => $total_amount_before_discount,
            'total_discount' => $total_discount,
            'total_amount' => $final_total_amount,
            'received' => $payment_status === "partial_cod" ? $final_total_amount * 0.3 : ($payment_status === "Paid" ? $final_total_amount : 0),
            'balance' => $payment_status === "partial_cod" ? $final_total_amount * 0.7 : ($payment_status === "Paid" ? 0 : $final_total_amount),
            'discount_type' => $discount_type,
            'discount_value' => $discount_value,
            'discount_amount' => $total_discount,
            'discount_reason' => $discount_reason,
            'shipping_option' => $shipping_option,
            'shipping_amount' => $shipping_amount,
            'is_draft' => 0,
            'item_count' => count($selected_products),
            'tags' => $order_tags,
            'delivery_method' => $shipping_option,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'payment_status' => $payment_status,
            'fulfillment_status' => 'Pending',
            'is_international_order' => $is_international ? 1 : 0,
            'usd_total' => $is_international ? $usd_total : 0,
            'currency' => $is_international ? $currency : 'INR',
            'country' => $is_international ? $country : 'INDIA',
            'state' => $state,
            'city' => $city,
            'cgst' => $cgst ?? 0,
            'sgst' => $sgst ?? 0,
            'igst' => $igst ?? 0,
            'customer_gstin' => $customergstin ?? 0,
            'order_date' => date('Y-m-d H:i:s'),
        ];

        if ($orderModel->insert($order_data)) {
            $order_id = $orderModel->getInsertID();
            $order_data['order_id'] = $order_id;

            $orderModel->createOrderShipment($order_data, $product_shipment_details);

            $this->sendOrderConfirmationEmail($customer_email ?? $customer['email'], $customer['name'], $order_data, $product_details, $order_id);

            session()->setFlashdata('success', 'Order published successfully.');
            return redirect()->to(base_url('ordermanagement'));
        } else {
            session()->setFlashdata('error', 'Failed to publish the order.');
            return redirect()->back()->withInput();
        }
    }

    public function checkout($order_id)
    {
        $orderModel = new Ordermanagement_model();
        $userModel = new Registerusers_model();

        $order = $orderModel->find($order_id);
        if (!$order || $order['is_draft'] != 1) {
            return redirect()->to(base_url('404'))->with('error', 'Invalid or non-draft order.');
        }

        $customer = $userModel->find($order['user_id']);
        if (!$customer) {
            return redirect()->to(base_url('404'))->with('error', 'Customer not found.');
        }

        $data = [
            'order' => $order,
            'customer' => $customer,
            'products' => json_decode($order['product_details'], true),
            'total_amount' => ($order['currency'] === 'INR' ? $order['total_amount'] : $order['usd_total']),
            'partial_cod_amount' => ($order['currency'] === 'INR' ? $order['total_amount'] : $order['usd_total']) * 0.3,
        ];

        return view('checkout_page', $data);
    }

    public function updatePaymentStatus()
    {
        $orderModel = new Ordermanagement_model();

        $data = $this->request->getJSON(true);

        $order = $orderModel->find($data['order_id']);
        if (!$order) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Order not found.']);
        }

        $updateData = [
            'payment_ref' => $data['payment_ref'],
            'payment_status' => $data['payment_status'],
            'received' => $data['payment_status'] === "partial_cod" ? $order['total_amount'] * 0.3 : ($data['payment_status'] === "Paid" ? $order['total_amount'] : 0),
            'balance' => $data['payment_status'] === "partial_cod" ? $order['total_amount'] * 0.7 : ($data['payment_status'] === "Paid" ? 0 : $order['total_amount']),
            'customer' => $data['customer_details']['name'],
            'customer_email' => $data['customer_details']['email'],
            'customer_phone' => $data['customer_details']['phone'],
            'pincode' => $data['customer_details']['pincode'],
            'customer_address' => $data['customer_details']['address'],
        ];

        if ($data['payment_status'] === 'Paid') {
            $updateData['is_draft'] = 0;
        }

        if ($orderModel->update($data['order_id'], $updateData)) {
            return $this->response->setJSON(['status' => 'success']);
        }

        return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to update payment status.']);
    }



    public function savedraftorder()
    {


        $this->response->setContentType('application/json');

        $orderModel = new Ordermanagement_model();
        $productsModel = new Products_model();
        $userModel = new Registerusers_model();
        $email = \Config\Services::email();

        $customer_id = $this->request->getPost('order-customer-name');
        $pincode = $this->request->getPost('pincode');
        $city = $this->request->getPost('order-city');
        $state = $this->request->getPost('order-state');
        $customer_address = $this->request->getPost('address_information');
        $customer_gst = $this->request->getPost('order-customergstin');
        $payment_method = $this->request->getPost('payment-method');
        $payment_status = $this->request->getPost('payment-status');
        $payment_ref = $this->request->getPost('ref_no');
        $selected_products = $this->request->getPost('selected_products');
        $quantities = $this->request->getPost('modal_quantity');
        $discount_type = $this->request->getPost('discount_type');
        $discount_value = $this->request->getPost('discount_value');
        $discount_reason = $this->request->getPost('discount_reason');
        $discount_values = $this->request->getPost('product_discount');
        $product_values = $this->request->getPost('product_price');
        $total_discount_amount = floatval($this->request->getPost('final_total_discount'));
        $shipping_option = $this->request->getPost('shipping_option');
        $shipping_amount = floatval($this->request->getPost('final_shipment_charges'));
        $order_tags = $this->request->getPost('order-tags');
        $customer_email = $this->request->getPost('order-customer-email');
        $customer_phone = $this->request->getPost('order-customer-phone');
        $cgst = $this->request->getPost('cgst');
        $sgst = $this->request->getPost('sgst');
        $igst = $this->request->getPost('igst');
        $customergstin = $this->request->getPost('order-customergstin');
        $is_international = $this->request->getPost('is_international_order') === 'on';
        $usd_total = 0;
        $currency = strtoupper($this->request->getPost('currency'));
        $country = strtoupper($this->request->getPost('country'));


        $customer = $userModel->find($customer_id);
        if (!$customer) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Customer not found.'
            ]);
        }
        if (!$selected_products) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Products not found.'
            ]);
        }


        $total_amount_before_discount = 0;
        $total_discount = 0;

        $product_titles = [];
        $product_details = [];
        $product_shipment_details = [];
        $product_quantities = [];
        $product_sizes = [];
        $seller_ids = [];

        foreach ($selected_products as $product_id) {
            $product = $productsModel->find($product_id);
            if (!$product) {
                session()->setFlashdata('error', "Product ID {$product_id} not found.");
                return redirect()->back()->withInput();
            }

            $quantity = isset($quantities[$product_id]) ? intval($quantities[$product_id]) : 1;

            $product_titles[] = $product['product_title'] . ' x ' . $quantity;
            $seller_ids[] = $product['seller_id'];
            $product_price = isset($product_values[$product_id]) ? floatval($product_values[$product_id]) : $product['selling_price'];

            if ($is_international) {
                $product_price += 1000;
            }
            $subtotal = $product_price * $quantity;

            $product_discount = isset($discount_values[$product_id]) ? floatval($discount_values[$product_id]) : 0;
            $discounted_price = max(0, $product_price - $product_discount);

            if ($total_discount_amount > 0) {
                $product_discount = 0;
            }

            $total_amount_before_discount += $subtotal;
            if ($payment_status === "partial_cod") {
                $total_amount_before_discount += 300;
            }
            $total_discount += $product_discount * $quantity;


            $product_details[] = [
                'product_id' => $product_id,
                'product_title' => $product['product_title'],
                'product_image' => $product['product_image'],
                'selling_price' => $product_price,
                'quantity' => $quantity,
                'subtotal' => $subtotal,
                'discount' => $product_discount * $quantity,
                'discounted_price' => $discounted_price * $quantity,
                'sku' => $product['sku'] ?? '',
                'hsn' => $product['hsn'] ?? ''
            ];

            $product_shipment_details[] = [
                'product_id' => $product_id,
                'product_title' => $product['product_title'],
                'product_image' => $product['product_image'],
                'selling_price' => $product['selling_price'],
                'seller_id' => $product['seller_id'],
                'quantity' => $quantity,
                'discount' => $product_discount * $quantity,
                'discounted_price' => $discounted_price * $quantity,
                'pickup_location' => $product['pickup_location'] ?? '',
                'sku' => $product['sku'] ?? '',
                'hsn' => $product['hsn'] ?? ''
            ];
        }


        $total_discount += $total_discount_amount;

        $final_total_amount = $this->request->getPost('final_total_price');

        $product_titles_str = json_encode($product_titles);
        $concatenated_seller_id = implode(', ', array_unique($seller_ids));

        if ($is_international) {

            $usd_total = $final_total_amount * 0.012;


            $cgst = 0;
            $sgst = 0;
            $igst = 0;
        }

        $order_data = [
            'order_number' => $this->generateOrderNumber($orderModel),
            'user_id' => $customer_id,
            'seller_id' => $concatenated_seller_id,
            'product_name' => $product_titles_str,
            'order_product_image' => implode(',', array_column($product_details, 'product_image')),
            'product_quantities' => implode(', ', array_map(fn($d) => $d['product_title'] . ' x ' . $d['quantity'], $product_details)),
            'payment_method' => $payment_method,
            'payment_ref' => $payment_ref,
            'product_details' => json_encode($product_details, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES),
            'customer_address' => $customer_address,
            'order_date' => date('Y-m-d H:i:s'),
            'customer' => $customer['name'],
            'customer_email' => $customer_email ?? $customer['email'],
            'customer_phone' => $customer_phone ?? $customer['phone_no'],
            'pincode' => $pincode,
            'channel' => 'pickup',
            'total_amount_before_discount' => $total_amount_before_discount,
            'total_discount' => $total_discount,
            'total_amount' => $final_total_amount,
            'discount_type' => $discount_type,
            'discount_value' => $discount_value,
            'discount_amount' => $total_discount,
            'discount_reason' => $discount_reason,
            'shipping_option' => $shipping_option,
            'is_draft' => 1,
            'shipping_amount' => $shipping_amount,
            'item_count' => count($selected_products),
            'tags' => $order_tags,
            'delivery_method' => $shipping_option,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'payment_status' => $payment_status,
            'fulfillment_status' => 'Pending',
            'is_international_order' => $is_international ? 1 : 0,
            'usd_total' => $is_international ? $usd_total : 0,
            'currency' => $is_international ? $currency : 'INR',
            'country' => $is_international ? $country : 'INDIA',
            'state' => $state,
            'city' => $city,
            'cgst' => $cgst ?? 0,
            'sgst' => $sgst ?? 0,
            'igst' => $igst ?? 0,
            'customer_gstin' => $customergstin ?? 0,
            'order_date' => date('Y-m-d H:i:s'),
        ];

        log_message('debug', 'Data received for draft: ' . json_encode($this->request->getPost(), JSON_PRETTY_PRINT));

        try {

            $insertId = $orderModel->insert($order_data);

            if ($insertId) {
                log_message('info', 'Draft saved successfully for user ID: ' . $customer_id);

                if ($this->request->isAJAX()) {
                    return $this->response->setJSON([
                        'status' => 'success',
                        'message' => 'Order Drafted successfully.',
                        'redirect' => base_url('ordermanagement')
                    ]);
                }
                return $insertId;
            }

            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Failed to save the order draft.'
            ]);
        } catch (\Exception $e) {
            log_message('error', 'Exception occurred: ' . $e->getMessage());

            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'An unexpected error occurred.'
            ]);
        }
    }


    private function generateOrderNumber($orderModel)
    {
        $lastOrder = $orderModel->orderBy('order_number', 'DESC')->first();
        $lastOrderNumber = isset($lastOrder['order_number']) ? intval(substr($lastOrder['order_number'], 1)) : 100000;
        return '#' . str_pad($lastOrderNumber + 1, 6, '0', STR_PAD_LEFT);
    }


    public function getOrderDetails($id)
    {

        $orderModel = new Ordermanagement_model();

        try {

            $order = $orderModel->find($id);


            if (!$order) {
                return $this->response->setStatusCode(404)->setJSON([
                    'status' => 'error',
                    'message' => 'Order not found.',
                ]);
            }

            if (!empty($order['product_details'])) {
                $order['product_details'] = json_decode($order['product_details'], true);
            } else {
                $order['product_details'] = [];
            }

            return $this->response->setStatusCode(200)->setJSON([
                'status' => 'success',
                'order' => $order,
            ]);
        } catch (\Exception $e) {

            return $this->response->setStatusCode(500)->setJSON([
                'status' => 'error',
                'message' => 'An error occurred while fetching order details.',
                'error' => $e->getMessage(),
            ]);
        }
    }

    public function editorder($id)
    {
        $orderModel = new Ordermanagement_model();
        $productsModel = new Products_model();
        $userModel = new Registerusers_model();
        $pincodeModel = new PincodeModel();

        $order = $orderModel->getOrderdetail($id);
        if (!$order) {
            session()->setFlashdata('error', 'Order not found.');
            return redirect()->back();
        }
        $order['product_details'] = json_decode($order['product_details'], true);

        $products = $productsModel->findAll();
        $totalDiscountSum = 0;
        foreach ($products as $product) {
            $existingProduct = null;
            foreach ($order['product_details'] as $orderProduct) {
                if ($orderProduct['product_id'] == $product['product_id']) {
                    $existingProduct = $orderProduct;
                    break;
                }
            }

            $savedQuantity = $existingProduct['quantity'] ?? 1;
            $savedDiscount = $existingProduct['discount'] ?? 0;
            $totalDiscountForProduct = $savedDiscount;

            $totalDiscountSum += $totalDiscountForProduct;
        }

        $users = $userModel->findAll();
        $delivery_partner = $pincodeModel->findAll();

        $data = [
            'order' => $order,
            'products' => $products,
            'delivery_partner' => $delivery_partner,
            'users' => $users,
            'refirnediscount' => $totalDiscountSum
        ];

        return view('edit_order_view', $data);
    }


    public function updateorder($id)
    {
        $orderModel = new Ordermanagement_model();
        $productsModel = new Products_model();
        $userModel = new Registerusers_model();

        $existingOrder = $orderModel->find($id);
        if (!$existingOrder) {
            session()->setFlashdata('error', 'Order not found.');
            return redirect()->back();
        }

        $customer_id = $this->request->getPost('order-customer-name');
        $pincode = $this->request->getPost('pincode');
        $city = $this->request->getPost('order-city');
        $state = $this->request->getPost('order-state');
        $customer_address = $this->request->getPost('address_information');
        $payment_method = $this->request->getPost('payment-method');
        $payment_status = $this->request->getPost('payment-status');
        $payment_ref = $this->request->getPost('ref_no');
        $selected_products = $this->request->getPost('selected_products');
        $quantities = $this->request->getPost('modal_quantity');
        $discount_type = $this->request->getPost('discount_type');
        $discount_value = $this->request->getPost('discount_value');
        $discount_reason = $this->request->getPost('discount_reason');
        $discount_values = $this->request->getPost('product_discount');
        $product_values = $this->request->getPost('product_price');
        $total_discount_amount = floatval($this->request->getPost('final_total_discount'));
        $shipping_option = $this->request->getPost('shipping_option');
        $shipping_amount = floatval($this->request->getPost('final_shipment_charges'));
        $order_tags = $this->request->getPost('order-tags');
        $customer_email = $this->request->getPost('order-customer-email');
        $customer_phone = $this->request->getPost('order-customer-phone');
        $cgst = $this->request->getPost('cgst');
        $sgst = $this->request->getPost('sgst');
        $igst = $this->request->getPost('igst');
        $customergstin = $this->request->getPost('order-customergstin');
        $is_international = $this->request->getPost('is_international_order') === 'on';
        $usd_total = 0;
        $previous_total_amount = $this->request->getPost('previous_total_amount');
        $currency = strtoupper($this->request->getPost('currency'));
        $country = strtoupper($this->request->getPost('country'));


        $customer = $userModel->find($customer_id);
        if (!$customer) {
            session()->setFlashdata('error', 'Customer not found.');
            return redirect()->back()->withInput();
        }

        if (!$selected_products) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Products not found.'
            ]);
        }

        $total_amount_before_discount = 0;
        $total_discount = 0;
        $product_titles = [];
        $product_details = [];
        $product_shipment_details = [];
        $seller_ids = [];

        foreach ($selected_products as $product_id) {
            $product = $productsModel->find($product_id);
            if (!$product) {
                session()->setFlashdata('error', "Product ID {$product_id} not found.");
                return redirect()->back()->withInput();
            }

            $quantity = isset($quantities[$product_id]) ? intval($quantities[$product_id]) : 1;
            $product_titles[] = $product['product_title'] . ' x ' . $quantity;
            $seller_ids[] = $product['seller_id'];
            $product_price = isset($product_values[$product_id]) ? floatval($product_values[$product_id]) : 0;

            if ($is_international) {
                $product_price += 1000;
            }
            $subtotal = $product_price * $quantity;

            $product_discount = isset($discount_values[$product_id]) ? floatval($discount_values[$product_id]) : 0;
            $discounted_price = max(0, $product_price - $product_discount);

            if ($total_discount_amount > 0) {
                $product_discount = 0;
            }
            $total_amount_before_discount += $subtotal;
            $total_discount += $product_discount * $quantity;

            $product_details[] = [
                'product_id' => $product_id,
                'product_title' => $product['product_title'],
                'product_image' => $product['product_image'],
                'selling_price' => $product_price,
                'quantity' => $quantity,
                'subtotal' => $subtotal,
                'discount' => $product_discount * $quantity,
                'discounted_price' => $discounted_price * $quantity,
                'sku' => $product['sku'] ?? '',
                'hsn' => $product['hsn'] ?? ''
            ];

            $product_shipment_details[] = [
                'product_id' => $product_id,
                'product_title' => $product['product_title'],
                'product_image' => $product['product_image'],
                'selling_price' => $product['selling_price'],
                'seller_id' => $product['seller_id'],
                'quantity' => $quantity,
                'discount' => $product_discount * $quantity,
                'discounted_price' => $discounted_price * $quantity,
                'pickup_location' => $product['pickup_location'] ?? '',
                'sku' => $product['sku'] ?? '',
                'hsn' => $product['hsn'] ?? ''
            ];
        }

        $total_discount += $total_discount_amount;

        $final_total_amount = $this->request->getPost('final_total_price');

        $product_titles_str = json_encode($product_titles);
        $concatenated_seller_id = implode(', ', array_unique($seller_ids));


        if ($is_international) {

            $usd_total = $final_total_amount * 0.012;

            $cgst = 0;
            $sgst = 0;
            $igst = 0;
        }


        if ($payment_method === 'link') {
            $orderId = $this->savedraftorder();
            if (is_numeric($orderId)) {
                $order_data = $orderModel->getOrderdetail($orderId);
                $product_details = json_decode($order_data['product_details'], true);

                $this->sendOrderConfirmationEmail($customer_email ?? $customer['email'], $customer['name'], $order_data, $product_details, $orderId);
                session()->setFlashdata('success', 'Order Placed successfully, Payment link is sent to ' . $customer['name'] . ' via Email.');
                return redirect()->to(base_url('ordermanagement'));
            } else {
                return redirect()->back()->with('error', 'Failed to save order draft.');
            }
        }

        // Prepare order update data
        $order_data = [
            'user_id' => $customer_id,
            'seller_id' => $concatenated_seller_id,
            'product_name' => $product_titles_str,
            'order_product_image' => implode(',', array_column($product_details, 'product_image')),
            'product_quantities' => implode(', ', array_map(fn($d) => $d['product_title'] . ' x ' . $d['quantity'], $product_details)),
            'payment_method' => $payment_method,
            'product_details' => json_encode($product_details, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES),
            'customer_address' => $customer_address,
            'customer' => $customer['name'],
            'customer_email' => $customer_email ?? $customer['email'],
            'customer_phone' => $customer_phone ?? $customer['phone_no'],
            'pincode' => $pincode,
            'total_amount_before_discount' => $total_amount_before_discount,
            'total_discount' => $total_discount,
            'total_amount' => $final_total_amount,
            'received' => $payment_status === "partial_cod" ? $final_total_amount * 0.3 : ($payment_status === "Paid" ? $final_total_amount : 0),
            'balance' => $payment_status === "partial_cod" ? $final_total_amount * 0.7 : ($payment_status === "Paid" ? 0 : $final_total_amount),
            'discount_type' => $discount_type,
            'discount_value' => $discount_value,
            'discount_amount' => $total_discount,
            'discount_reason' => $discount_reason,
            'shipping_option' => $shipping_option,
            'shipping_amount' => $shipping_amount,
            'item_count' => count($selected_products),
            'tags' => $order_tags,
            'delivery_method' => $shipping_option,
            'updated_at' => date('Y-m-d H:i:s'),
            'payment_status' => $payment_status,
            'payment_ref' => $payment_ref,
            'is_international_order' => $is_international ? 1 : 0,
            'usd_total' => $is_international ? $usd_total : 0,
            'currency' => $is_international ? $currency : 'INR',
            'country' => $is_international ? $country : 'INDIA',
            'state' => $state,
            'city' => $city,
            'cgst' => $cgst ?? 0,
            'sgst' => $sgst ?? 0,
            'igst' => $igst ?? 0,
            'customer_gstin' => $customergstin ?? 0
        ];

        $db = \Config\Database::connect();
        $db->transStart();

        try {
            if ($orderModel->update($id, $order_data)) {
                $orderModel->updateOrderShipments($id, $existingOrder['order_number'], $order_data, $product_shipment_details);

                $db->transCommit();
                session()->setFlashdata('success', 'Order updated successfully.');
                return redirect()->to(base_url('ordermanagement'));
            } else {
                throw new \Exception('Failed to update order.');
            }
        } catch (\Exception $e) {
            $db->transRollback();
            session()->setFlashdata('error', 'Failed to update the order: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }




    public function import()
    {
        $file = $this->request->getFile('import_file');
        if (!$file->isValid() || $file->hasMoved()) {
            return redirect()->back()->with('error', 'Invalid file upload.');
        }

        $filePath = $file->getTempName();
        $fileData = file($filePath, FILE_IGNORE_NEW_LINES);

        array_shift($fileData);

        $orderModel = new Ordermanagement_model();
        $productsModel = new Products_model();
        $userModel = new Registerusers_model();

        $errors = [];
        $successCount = 0;
        $groupedOrders = [];
        foreach ($fileData as $line) {
            $orderDetails = explode("\t", $line);
            $orderNumber = $orderDetails[0] ?? '';
            if (!isset($groupedOrders[$orderNumber])) {
                $groupedOrders[$orderNumber] = [];
            }
            $groupedOrders[$orderNumber][] = $orderDetails;
        }

        foreach ($groupedOrders as $orderNumber => $orderLines) {

            if ($orderModel->checkAmazonOrderExists($orderNumber)) {
                $errors[] = "Order number '$orderNumber' already exists in the database.";
                continue;
            }


            $firstLine = $orderLines[0];

            $order_num = $this->generateOrderNumber($orderModel);

            // Prepare customer data
            $customerData = [
                'name' => $firstLine[8] ?? '', // buyer-name
                'phone_no' => $firstLine[9] ?? '', // buyer-phone-number
                'email' => $firstLine[7] ?? '', // buyer-email
                'pincode' => $firstLine[23] ?? '', // ship-postal-code
                'city' => $firstLine[21] ?? '', // ship-city
                'state' => $firstLine[22] ?? '', // ship-state
                'address_information' => trim($firstLine[18] . ' ' . ($firstLine[19] ?? '') . ' ' . ($firstLine[20] ?? '')), // Combined address
            ];

            // Find or create customer
            $customer_id = $userModel->findOrCreateCustomer($customerData);


            $total_amount_before_discount = 0;
            $total_discount = 0;
            $product_details = [];
            $product_shipment_details = [];
            $product_titles = [];
            $seller_ids = [];

            // Process each product in the order
            foreach ($orderLines as $line) {
                $sku = $line[10] ?? ''; // SKU is in 11th column
                $quantity = intval($line[13] ?? 1); // quantity-purchased is in 14th column
                $product_name = $line[12] ?? ''; // product-name is in 13th column
                $amz_product_id = $line[1] ?? ''; // product-name is in 13th column

                // Find product in database
                $product = $productsModel->where('sku', $sku)->first();

                if (!$product) {
                    // Create new draft product
                    $newProductId = $productsModel->createDraftProduct([
                        'product_title' => $product_name,
                        'amz_product_id' => $amz_product_id, // Using SKU as Amazon product ID
                        'sku' => $sku
                    ]);

                    // Fetch the newly created product
                    $product = $productsModel->find($newProductId);
                }

                if ($product) {
                    $product_price = $product['selling_price'];
                    $subtotal = $product_price * $quantity;
                    $total_amount_before_discount += $subtotal;

                    $product_titles[] = $product['product_title'] . ' x ' . $quantity;
                    $seller_ids[] = $product['seller_id'];

                    // Product details for order
                    $product_details[] = [
                        'product_id' => $product['product_id'],
                        'product_title' => $product['product_title'],
                        'product_image' => $product['product_image'],
                        'selling_price' => $product_price,
                        'quantity' => $quantity,
                        'subtotal' => $subtotal,
                        'discount' => 0,
                        'discounted_price' => $subtotal,
                        'sku' => $product['sku'] ?? '',
                        'hsn' => $product['hsn'] ?? ''
                    ];

                    // Shipment details
                    $product_shipment_details[] = [
                        'product_id' => $product['product_id'],
                        'product_title' => $product['product_title'],
                        'product_image' => $product['product_image'],
                        'selling_price' => $product_price,
                        'seller_id' => $product['seller_id'],
                        'quantity' => $quantity,
                        'discount' => 0,
                        'discounted_price' => $subtotal,
                        'pickup_location' => $product['pickup_location'] ?? '',
                        'sku' => $product['sku'] ?? '',
                        'hsn' => $product['hsn'] ?? ''
                    ];
                }
            }

            // Parse dates
            $order_date = date('Y-m-d H:i:s', strtotime($firstLine[2])); // purchase-date
            $payment_date = date('Y-m-d H:i:s', strtotime($firstLine[3])); // payments-date
            $delivery_date = date('Y-m-d H:i:s', strtotime($firstLine[5])); // promise-date

            // Calculate shipping state for GST
            $shipping_state = strtoupper($firstLine[22] ?? ''); // ship-state
            $is_igst = ($shipping_state != 'MAHARASHTRA'); // Assuming your business is in UP

            // Calculate taxes (example rates - adjust as needed)
            $tax_rate = 0.12; // 12% GST
            $tax_amount = $total_amount_before_discount * $tax_rate;

            if ($is_igst) {
                $igst = $tax_amount;
                $cgst = 0;
                $sgst = 0;
            } else {
                $igst = 0;
                $cgst = $tax_amount / 2;
                $sgst = $tax_amount / 2;
            }

            $shipping_amount = 0;
            $final_total_amount = $total_amount_before_discount + $tax_amount + $shipping_amount;

            // Prepare order data matching your publishorder() structure
            $orderData = [
                'order_number' => $order_num,
                'amz_order_id' => $orderNumber,
                'user_id' => $customer_id, // Add the customer ID here
                'seller_id' => implode(', ', array_unique($seller_ids)),
                'product_name' => json_encode($product_titles),
                'order_product_image' => implode(',', array_column($product_details, 'product_image')),
                'product_quantities' => implode(', ', array_map(fn($d) => $d['product_title'] . ' x ' . $d['quantity'], $product_details)),
                'payment_method' => 'amazon',
                'payment_ref' => $orderNumber,
                'product_details' => json_encode($product_details, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES),
                'customer_address' => trim($firstLine[18] . ' ' . ($firstLine[19] ?? '') . ' ' . ($firstLine[20] ?? '')), // Combining address fields
                'order_date' => $order_date,
                'customer' => $firstLine[8] ?? '', // buyer-name
                'customer_email' => $firstLine[7] ?? '', // buyer-email
                'customer_phone' => $firstLine[9] ?? '', // buyer-phone-number
                'pincode' => $firstLine[23] ?? '', // ship-postal-code
                'channel' => 'amazon',
                'total_amount_before_discount' => $total_amount_before_discount,
                'total_discount' => $total_discount,
                'total_amount' => $final_total_amount,
                'received' => $final_total_amount, // Assuming paid orders
                'balance' => 0,
                'discount_type' => null,
                'discount_value' => 0,
                'discount_amount' => 0,
                'discount_reason' => null,
                'shipping_option' => $firstLine[16] ?? 'Standard', // ship-service-level
                'shipping_amount' => $shipping_amount,
                'is_draft' => 0,
                'item_count' => count($product_details),
                'tags' => null,
                'delivery_method' => $firstLine[16] ?? 'Standard',
                'created_at' => $order_date,
                'updated_at' => date('Y-m-d H:i:s'),
                'payment_status' => 'Paid',
                'fulfillment_status' => 'Pending',
                'is_international_order' => (strtoupper($firstLine[24] ?? 'IN') !== 'IN') ? 1 : 0,
                'currency' => 'INR',
                'country' => strtoupper($firstLine[24] ?? 'IN'),
                'state' => $firstLine[22] ?? '', // ship-state
                'city' => $firstLine[21] ?? '', // ship-city
                'cgst' => $cgst,
                'sgst' => $sgst,
                'igst' => $igst,
                'customer_gstin' => '', // Not provided in Amazon data
            ];

            // Insert order
            try {
                if ($orderModel->insert($orderData)) {
                    $order_id = $orderModel->getInsertID();
                    $orderData['order_id'] = $order_id;

                    // Create order shipments
                    $orderModel->createOrderShipment($orderData, $product_shipment_details);
                    $successCount++;
                }
            } catch (\Exception $e) {
                $errors[] = "Error processing order $orderNumber: " . $e->getMessage();
            }
        }

        // Prepare response for the view
        if (!empty($errors)) {
            // Store errors in flash data for modal display
            session()->setFlashdata('order_errors', $errors);
        }

        // Set success message if any orders were processed
        if ($successCount > 0) {
            session()->setFlashdata('success', "$successCount orders imported successfully.");
        }

        return redirect()->back()->with('success', 'Amazon orders imported successfully.');
    }

    public function export()
    {
        $orderModel = new Ordermanagement_model();

        // Retrieve only non-deleted orders
        $orders = $orderModel->where('is_deleted', 0)->findAll();

        // Define the field mapping for export in the same order as the import logic
        $fieldMapping = [
            'order_number',
            'item_count',
            'order_date',
            'payment_date',
            'created_at',
            'delivery_date',
            'days_past_promise',
            'customer_email',
            'customer',
            'customer_phone',
            'product_sku',
            'item_count',
            'product_name',
            'product_quantities',
            'quantity_shipped',
            'quantity_to_ship',
            'shipping_option',
            'recipient_name',
            'customer_address',
            'customer_address_line2',
            'customer_address_line3',
            'customer_city',
            'customer_state',
            'pincode',
            'country',
            'purchase_order_number',
            'fulfilled_by',
            'buyer_company_name',
            'verge_of_cancellation',
            'verge_of_late_shipment',
            'channel',
        ];

        // Define the file name
        $fileName = 'orders_' . date('YmdHis') . '.txt';

        // Set headers for file download
        header('Content-Type: text/plain');
        header('Content-Disposition: attachment; filename="' . $fileName . '"');

        // Add data rows
        $output = '';

        foreach ($orders as $order) {
            $row = [];
            foreach ($fieldMapping as $field) {
                $row[] = $order[$field] ?? ''; // Use empty string if the field is missing
            }
            $output .= implode("\t", $row) . PHP_EOL; // Use tab as the delimiter
        }

        // Output the file content
        echo $output;
        exit;
    }






    //<!---------------------------------------------------------------------------------------------- Blue Dart --------------------------------------------------------------------------->

    public function bluedart_management()
    {
        $this->logger->info('Entering BlueDart management method');

        $session = session();
        $db = \Config\Database::connect();
        $shipmentTable = $db->table('order_shipment');
        $warehouseTable = $db->table('seller_warehouse_location');

        try {
            if ($session->get('admin_type') == 'seller') {
                $seller_id = $session->get('user_id');
                $data['shipments'] = $shipmentTable->where('FIND_IN_SET("' . $seller_id . '", seller_id)')
                    ->where('shipment_status', 'Pending')
                    ->get()->getResultArray();

                foreach ($data['shipments'] as &$shipment) {
                    if (isset($shipment['no_of_packages']) && $shipment['no_of_packages'] > 1) {
                        // Ensure each field is a string before decoding
                        $shipment['length'] = is_string($shipment['length']) ? json_decode($shipment['length'], true) : $shipment['length'];
                        $shipment['breadth'] = is_string($shipment['breadth']) ? json_decode($shipment['breadth'], true) : $shipment['breadth'];
                        $shipment['height'] = is_string($shipment['height']) ? json_decode($shipment['height'], true) : $shipment['height'];
                        $shipment['weight'] = is_string($shipment['weight']) ? json_decode($shipment['weight'], true) : $shipment['weight'];
                    }
                }

                $this->logger->info('Fetched pending shipments for seller ID: ' . $seller_id);

                // Fetch warehouse locations for the seller
                $data['warehouse_locations'] = $warehouseTable->where('seller_id', $seller_id)->get()->getResultArray();
            } else {
                $data['shipments'] = $shipmentTable->where('shipment_status', 'Pending')
                    ->get()->getResultArray();

                foreach ($data['shipments'] as &$shipment) {
                    if (isset($shipment['no_of_packages']) && $shipment['no_of_packages'] > 1) {
                        // Ensure each field is a string before decoding
                        $shipment['length'] = is_string($shipment['length']) ? json_decode($shipment['length'], true) : $shipment['length'];
                        $shipment['breadth'] = is_string($shipment['breadth']) ? json_decode($shipment['breadth'], true) : $shipment['breadth'];
                        $shipment['height'] = is_string($shipment['height']) ? json_decode($shipment['height'], true) : $shipment['height'];
                        $shipment['weight'] = is_string($shipment['weight']) ? json_decode($shipment['weight'], true) : $shipment['weight'];
                    }
                }

                $this->logger->info('Fetched all pending shipments');

                // Fetch all warehouse locations
                $data['warehouse_locations'] = $warehouseTable->get()->getResultArray();
            }
        } catch (\Exception $e) {
            $this->logger->error('Error in BlueDart: ' . $e->getMessage());
            return view('error_view', ['message' => 'An error occurred while fetching BlueDart data.']);
        }

        $bluedartOrders = $shipmentTable->where('shipping_platform', 'BlueDart')
            ->where('tracking_id !=', '')
            ->where('shipment_status !=', 'cancelled')
            ->get()->getResultArray();

        $data['bluedart_orders'] = $bluedartOrders;

        $this->logger->info('Fetched BlueDart orders: ' . count($bluedartOrders));

        $this->logger->info('Rendering BlueDart view');
        return view('bluedart_view', $data);
    }


    public function generateToken()
    {
        $this->logger->info('Attempting to generate BlueDart token');

        $url = 'https://apigateway-sandbox.bluedart.com/in/transportation/token/v1/login';

        $headers = [
            'accept: application/json',
            'ClientID: Jjc1Ar2lirffacgkKLLYOTrz9vgQqX9d',
            'clientSecret: c6nPOP9cfh27lRlA'
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if (curl_errno($ch)) {
            $this->logger->error('Error fetching token: ' . curl_error($ch));
            curl_close($ch);
            return null;
        }
        curl_close($ch);

        $response = json_decode($result, true);

        $this->logger->info('Token API Response: ' . json_encode($response));
        $this->logger->info('Token API HTTP Code: ' . $httpCode);

        if (isset($response['JWTToken'])) {
            $this->logger->info('Token generated successfully');
            return $response['JWTToken'];
        }

        $this->logger->error('Failed to generate token. Full response: ' . json_encode($response));
        return null;
    }

    public function generateWaybill()
    {
        $this->logger->info('Attempting to generate BlueDart waybill for selected shipments');

        $orderShipmentIds = $this->request->getPost('order_shipment_ids');

        $token = $this->generateToken();

        if (!$token) {
            $this->logger->error('Failed to generate token');
            return $this->response->setJSON(['status' => 'error', 'message' => 'Unable to fetch token']);
        }

        $db = \Config\Database::connect();
        $shipmentTable = $db->table('order_shipment');
        $productsTable = $db->table('products');
        $usersTable = $db->table('users');
        $warehouseTable = $db->table('seller_warehouse_location');

        $results = [];

        foreach ($orderShipmentIds as $shipmentId) {
            $this->logger->info("Processing shipment ID: $shipmentId");
            $shipment = $shipmentTable->where('order_shipment_id', $shipmentId)->get()->getRowArray();

            if (!$shipment) {
                $this->logger->error("Shipment ID $shipmentId not found");
                $results[$shipmentId] = ['status' => 'error', 'message' => 'Shipment not found'];
                continue;
            }

            // Ensure no_of_packages is a valid integer
            $no_of_packages = (int) $shipment['no_of_packages'];

            // Decode dimension arrays
            $dimensions = $shipment['no_of_packages'] > 1
                ? $weights = json_decode($shipment['weight'], true) ?: []
                : $weights = $shipment['weight'] ?: 0;

            $dimensions = $shipment['no_of_packages'] > 1
                ? array_map(function ($length, $breadth, $height) {
                    return [
                        "Length" => $length,
                        "Breadth" => $breadth,
                        "Height" => $height,
                        "Count" => 1, // Each entry represents one package
                    ];
                }, json_decode($shipment['length'], true), json_decode($shipment['breadth'], true), json_decode($shipment['height'], true))
                : [
                    [
                        "Length" => $shipment['length'],
                        "Breadth" => $shipment['breadth'],
                        "Height" => $shipment['height'],
                        "Count" => 1, // Single package
                    ]
                ];

            // Validate dimensions count against no_of_packages
            if (count($dimensions) !== $no_of_packages) {
                $this->logger->warning("Mismatch: Dimensions count (" . count($dimensions) . ") and no_of_packages ($no_of_packages).");
            }

            // Calculate ActualWeight
            $actualWeight = $no_of_packages > 1
                ? array_sum($weights) // Sum weights for multi-package
                : $shipment['weight']; // Single-package weight


            $orderItems = json_decode($shipment['order_items'], true);
            $seller = $usersTable->where('seller_id', $shipment['seller_id'])->get()->getRowArray();
            $warehouse = $warehouseTable->where('seller_id', $shipment['seller_id'])
                ->where('pickup_location', $shipment['pickup_location'])
                ->get()->getRowArray();

            $shipperPincode = $warehouse['pincode'];
            $consigneePincode = $shipment['billing_pincode'];
            $gstRates = $this->calculateGST($shipperPincode, $consigneePincode, $shipment['total']);

            $itemDetails = [];
            foreach ($orderItems as $item) {
                $productInfo = $productsTable->where('product_id', $item['product_id'])->get()->getRowArray();
                $itemDetails[] = [
                    "CGSTAmount" => $gstRates['CGST'],
                    "SGSTAmount" => $gstRates['SGST'],
                    "IGSTAmount" => $gstRates['IGST'],
                    "InvoiceNumber" => $shipment['order_number'],
                    "ItemID" => $item['product_id'],
                    "ItemName" => $item['product_title'],
                    "ItemValue" => $item['selling_price'],
                    "Itemquantity" => $item['quantity'],
                    "ProductDesc1" => $item['product_title'],
                    "SKUNumber" => $productInfo['sku'] ?? '',
                    "SellerGSTNNumber" => $seller['seller_gst_number'] ?? '',
                    "SellerName" => $seller['name'],
                    "TaxableAmount" => $item['selling_price'] * $item['quantity'],
                    "TotalValue" => ($item['selling_price'] * $item['quantity']),
                    "countryOfOrigin" => "IN",
                    "docType" => "INV"
                ];
            }

            $payload = [
                "Request" => [
                    "Consignee" => [
                        "ConsigneeAddress1" => $shipment['billing_address'],
                        "ConsigneeAddress2" => $shipment['billing_address2'],
                        "ConsigneeAddress3" => $shipment['billing_address3'],
                        "ConsigneeEmailID" => $shipment['billing_email'],
                        "ConsigneeMobile" => $shipment['billing_phone'],
                        "ConsigneeName" => $shipment['billing_customer_name'],
                        "ConsigneePincode" => $shipment['billing_pincode'],
                        "ConsigneeTelephone" => $shipment['billing_telephone'] ?? '',
                    ],
                    "Returnadds" => [
                        "ReturnAddress1" => $warehouse['address1'],
                        "ReturnAddress2" => $warehouse['address2'],
                        "ReturnAddress3" => $warehouse['city'] . ', ' . $warehouse['state'],
                        "ReturnContact" => $warehouse['contact_person_name'],
                        "ReturnEmailID" => $warehouse['email'],
                        "ReturnMobile" => $warehouse['phone'],
                        "ReturnPincode" => $warehouse['pincode'],
                        "ReturnTelephone" => $warehouse['phone2'] ?? '',
                    ],
                    "Services" => [
                        "ActualWeight" => $actualWeight,
                        "CollectableAmount" => $shipment['SubProductCode'] == 'C' ? $shipment['collectable_amount'] : 0,
                        "Commodity" => [
                            "CommodityDetail1" => "5011100014",
                            "CommodityDetail2" => "5011100014",
                            "CommodityDetail3" => "5011100014"
                        ],
                        "CreditReferenceNo" => $shipment['order_number'],
                        "CurrencyCode" => "INR",
                        "DeclaredValue" => ($item['selling_price'] * $item['quantity']),
                        "Dimensions" => $dimensions,
                        "ItemCount" => count($orderItems),
                        "IsDedicatedDeliveryNetwork" => false,
                        "IsForcePickup" => false,
                        "IsPartialPickup" => false,
                        "IsReversePickup" => false,
                        "PDFOutputNotRequired" => false,
                        "OTPBasedDelivery" => "0",
                        "PickupDate" => "/Date(" . strtotime($shipment['PickupDate']) * 1000 . ")/",
                        "PickupTime" => "1800",
                        "PieceCount" => count($dimensions), // Use the total number of packages
                        "ProductCode" => $shipment['ProductCode'],
                        "ProductType" => $shipment['ProductType'],
                        "RegisterPickup" => true,
                        "SpecialInstruction" => $shipment['SpecialInstruction'] ?? '',
                        "SubProductCode" => $shipment['SubProductCode'],
                        "TotalCashPaytoCustomer" => 0,
                        "itemdtl" => $itemDetails
                    ],
                    "Shipper" => [
                        "CustomerAddress1" => $warehouse['address1'],
                        "CustomerAddress2" => $warehouse['address2'] ?? '',
                        "CustomerAddress3" => $warehouse['city'] . ', ' . $warehouse['state'],
                        "CustomerEmailID" => $warehouse['email'],
                        "CustomerGSTNumber" => $seller['seller_gst_number'] ?? '',
                        "CustomerMobile" => $warehouse['phone'],
                        "CustomerCode" => "469081",
                        "CustomerName" => $warehouse['contact_person_name'],
                        "CustomerPincode" => $warehouse['pincode'],
                        "CustomerTelephone" => $warehouse['phone2'] ?? '',
                        "OriginArea" => $warehouse['OriginArea'] ?? '',
                        "IsToPayCustomer" => false,
                        "Sender" => $warehouse['contact_person_name'],
                    ],
                ],
                "Profile" => [
                    "LoginID" => $seller['bluedart_login_id'],
                    "LicenceKey" => $seller['bluedart_shipping_licenceKey'],
                    "Api_type" => "S"
                ]
            ];

            $this->logger->info("Payload for shipment ID $shipmentId: " . json_encode($payload));

            try {
                $url = 'https://apigateway-sandbox.bluedart.com/in/transportation/waybill/v1/GenerateWayBill';

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_HTTPHEADER, [
                    'accept: application/json',
                    'Content-Type: application/json',
                    'JWTToken: ' . $token
                ]);
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));

                $result = curl_exec($ch);
                $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

                if (curl_errno($ch)) {
                    throw new \Exception(curl_error($ch));
                }
                curl_close($ch);

                $response = json_decode($result, true);

                $this->logger->info("API Response for shipment ID $shipmentId: " . json_encode($response));
                $this->logger->info("API HTTP Code for shipment ID $shipmentId: $httpCode");

                if (isset($response['GenerateWayBillResult']['AWBNo'])) {
                    $awbNo = $response['GenerateWayBillResult']['AWBNo'];

                    if (isset($response['GenerateWayBillResult']['AWBPrintContent'])) {
                        $this->logger->info("Converting AWBPrintContent to PDF for AWB: $awbNo");

                        // Convert byte array to binary string
                        $pdfBinary = '';
                        foreach ($response['GenerateWayBillResult']['AWBPrintContent'] as $byte) {
                            $pdfBinary .= chr($byte);
                        }

                        // Create directory if it doesn't exist
                        $uploadDir = FCPATH . 'uploads/bluedart_labels/';
                        if (!is_dir($uploadDir)) {
                            $this->logger->info("Creating directory: $uploadDir");
                            mkdir($uploadDir, 0777, true);
                        }

                        // Save PDF locally
                        $pdfFileName = $awbNo . '_label.pdf';
                        $pdfPath = $uploadDir . $pdfFileName;

                        try {
                            if (file_put_contents($pdfPath, $pdfBinary) !== false) {
                                $this->logger->info("PDF file saved successfully: $pdfPath");

                                // Update database
                                $updateData = [
                                    'tracking_id' => $awbNo,
                                    'shipment_status' => 'Fulfilled',
                                    'shipping_platform' => 'BlueDart',
                                    'label' => $pdfFileName
                                ];
                                $this->logger->info("Attempting to update order_shipment table for shipment ID $shipmentId with data: " . json_encode($updateData));

                                try {
                                    $shipmentTable->update($updateData, ['order_shipment_id' => $shipmentId]);
                                    $this->logger->info("Database updated successfully for shipment ID $shipmentId");

                                    // Send shipment confirmation email
                                    $this->sendShipmentConfirmationEmail(
                                        $shipment['billing_email'],
                                        $shipment['billing_customer_name'],
                                        $awbNo,
                                        $shipment,
                                        $dimensions
                                    );

                                    $results[$shipmentId] = [
                                        'status' => 'success',
                                        'awbNo' => $awbNo,
                                        'pdfFileName' => $pdfFileName,
                                        'response' => $response
                                    ];
                                } catch (\Exception $dbException) {
                                    $this->logger->error("Database update failed for shipment ID $shipmentId: " . $dbException->getMessage());
                                    $results[$shipmentId] = [
                                        'status' => 'error',
                                        'message' => 'Database update failed: ' . $dbException->getMessage()
                                    ];
                                }
                            } else {
                                throw new \Exception('Failed to save PDF file');
                            }
                        } catch (\Exception $e) {
                            $this->logger->error("Failed to save PDF for AWB $awbNo: " . $e->getMessage());
                            $results[$shipmentId] = [
                                'status' => 'error',
                                'message' => 'Failed to save PDF: ' . $e->getMessage()
                            ];
                        }
                    } else {
                        $this->logger->error("AWBPrintContent not found in response for AWB: $awbNo");
                        $results[$shipmentId] = [
                            'status' => 'error',
                            'message' => 'AWBPrintContent not found in response'
                        ];
                    }
                }
            } catch (\Exception $e) {
                $this->logger->error("Failed to generate waybill for shipment ID: $shipmentId | Error: " . $e->getMessage());
                $results[$shipmentId] = ['status' => 'error', 'message' => $e->getMessage(), 'response' => $response ?? null];
            }
        }

        $successCount = count(array_filter($results, function ($r) {
            return $r['status'] === 'success';
        }));
        $failCount = count($results) - $successCount;

        if ($failCount == 0) {
            $status = 'success';
            $message = "Successfully generated $successCount waybill(s)";
        } elseif ($successCount == 0) {
            $status = 'error';
            $message = "Failed to generate all $failCount waybill(s)";
        } else {
            $status = 'partial';
            $message = "Generated $successCount waybill(s), failed $failCount";
        }

        $this->logger->info("Waybill generation process completed. Status: $status, Message: $message");

        return $this->response->setJSON([
            'status' => $status,
            'message' => $message,
            'details' => $results
        ]);
    }


    private function calculateGST($shipperPincode, $consigneePincode, $subTotal)
    {
        // Implement your GST calculation logic here
        // This is a placeholder implementation
        if (substr($shipperPincode, 0, 2) == substr($consigneePincode, 0, 2)) {
            // Intra-state GST
            $cgst = $subTotal - ($subTotal / 1.06);
            $sgst = $subTotal - ($subTotal / 1.06);
            $igst = 0;
            $igstRate = 0;
        } else {
            // Inter-state GST
            $cgst = 0;
            $sgst = 0;
            $igst = $subTotal - ($subTotal / 1.12);
            $igstRate = 12;
        }

        return [
            'CGST' => $cgst,
            'SGST' => $sgst,
            'IGST' => $igst,
            'IGSTRate' => $igstRate
        ];
    }

    public function saveChanges()
    {
        $this->logger->info('Saving changes for BlueDart shipments');

        $db = \Config\Database::connect();
        $shipmentTable = $db->table('order_shipment');

        $data = $this->request->getPost();

        foreach ($data['shipments'] as $shipmentId => $shipmentData) {
            $updateData = [
                'pickup_location' => $shipmentData['pickup_location'],
                'ProductCode' => $shipmentData['ProductCode'],
                'SubProductCode' => $shipmentData['SubProductCode'],
                'billing_address' => $shipmentData['billing_address'],
                'billing_pincode' => $shipmentData['billing_pincode'],
                'PickupDate' => $shipmentData['PickupDate'],
                'ProductType' => $shipmentData['ProductType'],
                'collectable_amount' => isset($shipmentData['collectable_amount']) ? $shipmentData['collectable_amount'] : 0,
                'no_of_packages' => $shipmentData['no_of_packages'] ?? 1, // Default to 1 for single-package
            ];

            // Handle single-package or multi-package dimensions
            if ($updateData['no_of_packages'] > 1) {
                $dimensions = [
                    'length' => json_encode($shipmentData['length'] ?? []),
                    'breadth' => json_encode($shipmentData['breadth'] ?? []),
                    'height' => json_encode($shipmentData['height'] ?? []),
                    'weight' => json_encode($shipmentData['weight'] ?? []),
                ];
            } else {
                $dimensions = [
                    'length' => $shipmentData['length'] ?? 0,
                    'breadth' => $shipmentData['breadth'] ?? 0,
                    'height' => $shipmentData['height'] ?? 0,
                    'weight' => $shipmentData['weight'] ?? 0,
                ];
            }

            $updateData = array_merge($updateData, $dimensions);

            // Update the database
            $shipmentTable->where('order_shipment_id', $shipmentId)->update($updateData);
            $this->logger->info("Updated shipment ID: $shipmentId with data: " . json_encode($updateData));
        }

        return $this->response->setJSON(['status' => 'success', 'message' => 'Changes saved successfully']);
    }








    public function filterBluedartShipments()
    {
        $this->logger->info('Filtering BlueDart shipments');

        $status = $this->request->getPost('status');
        $this->logger->info('Requested status filter: ' . $status);

        $db = \Config\Database::connect();
        $shipmentTable = $db->table('order_shipment');

        try {
            $query = $shipmentTable->where('shipping_platform', 'BlueDart');

            if ($status !== 'All') {
                $query->where('shipment_status', $status);
            } else {
                $query->where('shipment_status !=', 'pending');
            }

            $orders = $query->get()->getResultArray();
            $this->logger->info('Retrieved ' . count($orders) . ' orders for status: ' . $status);

            return $this->response->setJSON([
                'status' => 'success',
                'data' => $orders
            ]);
        } catch (\Exception $e) {
            $this->logger->error('Error filtering shipments: ' . $e->getMessage());
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Error retrieving shipments'
            ]);
        }
    }


    // Add new method to handle PDF viewing
    public function viewLabel($filename)
    {
        $pdfPath = FCPATH . 'uploads/bluedart_labels/' . $filename;

        if (file_exists($pdfPath)) {
            header('Content-Type: application/pdf');
            header('Content-Disposition: inline; filename="' . $filename . '"');
            readfile($pdfPath);
            exit;
        } else {
            return $this->response->setStatusCode(404)->setBody('PDF not found');
        }
    }



    public function preparePrintLabels()
    {
        log_message('info', 'preparePrintLabels method called');

        // Check if it's an AJAX request
        if (!$this->request->isAJAX()) {
            log_message('error', 'Invalid request: Not an AJAX call');
            return $this->response->setJSON(['status' => 'error', 'message' => 'Invalid request']);
        }

        // Get the tracking IDs from the POST data
        $trackingIds = $this->request->getPost('tracking_ids');
        if (empty($trackingIds)) {
            log_message('error', 'No tracking IDs provided');
            return $this->response->setJSON(['status' => 'error', 'message' => 'No tracking IDs provided']);
        }

        log_message('info', 'Preparing labels for tracking IDs: ' . implode(', ', $trackingIds));

        try {
            // Initialize FPDI
            $pdf = new Fpdi();

            $mergedPages = 0;

            // Merge PDFs
            foreach ($trackingIds as $trackingId) {
                $labelPath = FCPATH . 'uploads/bluedart_labels/' . $trackingId . '_label.pdf';
                if (file_exists($labelPath)) {
                    log_message('info', 'Adding label for tracking ID: ' . $trackingId);
                    $pageCount = $pdf->setSourceFile($labelPath);
                    for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
                        $templateId = $pdf->importPage($pageNo);
                        $size = $pdf->getTemplateSize($templateId);
                        $pdf->AddPage($size['orientation'], [$size['width'], $size['height']]);
                        $pdf->useTemplate($templateId);
                        $mergedPages++;
                    }
                } else {
                    log_message('error', 'Label file not found for tracking ID: ' . $trackingId . ' at path: ' . $labelPath);
                }
            }

            if ($mergedPages == 0) {
                log_message('error', 'No valid labels found to merge');
                return $this->response->setJSON(['status' => 'error', 'message' => 'No valid labels found to merge']);
            }

            log_message('info', 'Merged PDF created with ' . $mergedPages . ' pages');

            // Output PDF
            $pdfContent = $pdf->Output('S');
            return $this->response
                ->setContentType('application/pdf')
                ->setHeader('Content-Disposition', 'attachment; filename="merged_labels.pdf"')
                ->setBody($pdfContent);
        } catch (\Exception $e) {
            log_message('error', 'Error in preparePrintLabels: ' . $e->getMessage());
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'An error occurred while preparing the labels: ' . $e->getMessage()
            ]);
        }
    }




    public function cancelBluedartRequest()
    {
        $this->logger->info('Attempting to cancel BlueDart request');

        $session = session();
        $db = \Config\Database::connect();
        $usersTable = $db->table('users');



        $user_id = $session->get('user_id');
        $seller = $usersTable->where('user_id', $user_id)->get()->getRowArray();
        if (!$seller) {
            $this->logger->error('Failed to fetch seller data');
            return $this->response->setJSON(['status' => 'error', 'message' => 'Seller not registered']);
        } else {
            $this->logger->info('seller verified ' . $seller['seller_id']);
        }




        $trackingIds = $this->request->getPost('tracking_ids');
        $token = $this->generateToken();

        if (!$token) {
            $this->logger->error('Failed to generate token for cancellation');
            return $this->response->setJSON(['status' => 'error', 'message' => 'Unable to fetch token']);
        }

        $db = \Config\Database::connect();
        $shipmentTable = $db->table('order_shipment');

        $results = [];

        foreach ($trackingIds as $trackingId) {
            $this->logger->info("Attempting to cancel waybill: $trackingId");

            $payload = [
                "Request" => [
                    "AWBNo" => $trackingId
                ],
                "Profile" => [

                    "LoginID" => $seller['bluedart_login_id'],
                    "LicenceKey" => $seller['bluedart_shipping_licenceKey'],


                    //"LoginID" => "BOM16100",
                    //"LicenceKey" => "ivrh1ppfeiqukinsntpufekj66sqq3fs",
                    "Api_type" => "S"
                ]
            ];

            try {
                $url = 'https://apigateway-sandbox.bluedart.com/in/transportation/waybill/v1/CancelWaybill';

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_HTTPHEADER, [
                    'accept: application/json',
                    'Content-Type: application/json',
                    'JWTToken: ' . $token
                ]);
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));

                $result = curl_exec($ch);
                $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

                if (curl_errno($ch)) {
                    throw new \Exception(curl_error($ch));
                }
                curl_close($ch);

                $response = json_decode($result, true);

                $this->logger->info("Cancel API Response for tracking ID $trackingId: " . json_encode($response));
                $this->logger->info("Cancel API HTTP Code for tracking ID $trackingId: $httpCode");

                // Updated condition to correctly check for successful cancellation
                if (
                    isset($response['CancelWaybillResult']['Status'][0]['StatusCode'])
                    && $response['CancelWaybillResult']['Status'][0]['StatusCode'] === 'Valid'
                ) {
                    $shipmentTable->update([
                        'shipment_status' => 'cancelled'
                    ], ['tracking_id' => $trackingId]);

                    $this->logger->info("Waybill cancelled successfully for tracking ID: $trackingId");
                    $results[$trackingId] = ['status' => 'success', 'message' => 'Cancelled successfully'];
                } else {
                    $errorMessage = isset($response['CancelWaybillResult']['Status'][0]['StatusInformation'])
                        ? $response['CancelWaybillResult']['Status'][0]['StatusInformation']
                        : 'Cancellation failed or unexpected response';
                    throw new \Exception($errorMessage);
                }
            } catch (\Exception $e) {
                $this->logger->error("Failed to cancel waybill for tracking ID: $trackingId | Error: " . $e->getMessage());
                $results[$trackingId] = ['status' => 'error', 'message' => $e->getMessage()];
            }
        }

        $successCount = count(array_filter($results, function ($r) {
            return $r['status'] === 'success';
        }));
        $failCount = count($results) - $successCount;

        if ($failCount == 0) {
            $status = 'success';
            $message = "Successfully cancelled $successCount waybill(s)";
        } elseif ($successCount == 0) {
            $status = 'error';
            $message = "Failed to cancel all $failCount waybill(s)";
        } else {
            $status = 'partial';
            $message = "Cancelled $successCount waybill(s), failed $failCount";
        }

        return $this->response->setJSON([
            'status' => $status,
            'message' => $message,
            'details' => $results
        ]);
    }




    public function Bluedart_track()
    {
        $this->logger->info('Entering BlueDart track method');
        $orderModel = new Ordermanagement_model();

        $trackType = $this->request->getPost('track_type');
        $trackValue = $this->request->getPost('track_value');

        $db = \Config\Database::connect();
        $shipmentTable = $db->table('order_shipment');
        $session = session();

        try {
            if ($trackType === 'order') {
                $this->logger->info('Tracking by order number: ' . $trackValue);
                $shipments = $orderModel->getShipmentsByOrderNumber($trackValue);
            } else {
                $this->logger->info('Tracking by AWB number: ' . $trackValue);
                $shipments = $orderModel->getShipmentByAwb($trackValue);
            }

            if (empty($shipments)) {
                $this->logger->info('No shipments found for the given ' . $trackType);
                return $this->response->setJSON([
                    'status' => 'success',
                    'data' => []
                ]);
            }

            $trackingResults = [];
            foreach ($shipments as $shipment) {
                $trackingDetails = $this->getBlueDartTrackingDetails($shipment['tracking_id']);

                // Decode the JSON-encoded order_items
                $orderItems = json_decode($shipment['order_items'], true);

                $trackingResult = [
                    'order_number' => $shipment['order_number'],
                    'order_id' => $shipment['order_shipment_id'],
                    'tracking_id' => $shipment['tracking_id'],
                    'shipment_status' => $shipment['shipment_status'],
                    'delivered_date' => $shipment['delivered_date'],
                    'products' => $orderItems,
                    'tracking_details' => []
                ];

                if (isset($trackingDetails['Status']) && $trackingDetails['Status'] === 'Incorrect Waybill number or No Information') {
                    $trackingResult['tracking_details'] = [
                        [
                            'Scan' => $trackingDetails['Status'],
                            'ScanDate' => date('Y-m-d'),
                            'ScanTime' => date('H:i:s'),
                            'ScannedLocation' => 'N/A'
                        ]
                    ];
                } elseif (isset($trackingDetails['Scans']['ScanDetail'])) {
                    $trackingResult['tracking_details'] = $trackingDetails['Scans']['ScanDetail'];
                }

                $trackingResults[] = $trackingResult;
            }

            $this->logger->info('Tracking results fetched successfully');
            return $this->response->setJSON([
                'status' => 'success',
                'data' => $trackingResults
            ]);
        } catch (\Exception $e) {
            $this->logger->error('Error in BlueDart tracking: ' . $e->getMessage());
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'An error occurred while tracking the shipment.'
            ]);
        }
    }

    private function getBlueDartTrackingDetails($awbNumber)
    {
        $this->logger->info('Fetching BlueDart tracking details for AWB: ' . $awbNumber);
        $token = $this->generateToken();

        $apiUrl = 'https://apigateway-sandbox.bluedart.com/in/transportation/tracking/v1/shipment';
        $queryParams = http_build_query([
            'handler' => 'tnt',
            'loginid' => 'BOM36463', // Replace with your actual login ID
            'numbers' => $awbNumber,
            'format' => 'xml',
            'lickey' => 'uulhqsfjunpfhrshilnlmoshtegtrlou', // Replace with your actual license key
            'scan' => '1',
            'action' => 'custawbquery',
            'verno' => '1',
            'awb' => 'awb'
        ]);

        $url = $apiUrl . '?' . $queryParams;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'JWTToken: ' . $token
        ]);

        $response = curl_exec($ch);
        curl_close($ch);

        if ($response === false) {
            $this->logger->error('Error fetching BlueDart tracking details: ' . curl_error($ch));
            return [];
        }

        $xml = simplexml_load_string($response);
        $json = json_encode($xml);
        $trackingData = json_decode($json, true);

        $this->logger->info('BlueDart tracking details fetched successfully');
        return $trackingData['Shipment'] ?? [];
    }

    public function exportShiptoexcel()
    {
        // Load the model
        $model = new Ordermanagement_model();

        // Retrieve data from the model
        $data = $model->GetallShipments();

        // Load the Spreadsheet class
        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set column headers
        $column = 'A';
        foreach ($data[0] as $key => $value) {
            $sheet->setCellValue($column . '1', $key);
            $column++;
        }

        // Populate data rows
        $row = 2;
        foreach ($data as $row_data) {
            $column = 'A';
            foreach ($row_data as $value) {
                $sheet->setCellValue($column . $row, $value);
                $column++;
            }
            $row++;
        }

        // Set headers
        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $filename = 'Shipment_data.xlsx';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
    }

    public function importShipmentfromexcel()
    {
        return view('import_shipment_excel');
    }

    public function download_shipment_file()
    {
        $filePath = FCPATH . 'uploads/excel/SportzSaga_shipment_bulkTemplete.xlsx';

        if (file_exists($filePath)) {
            return $this->response->download($filePath, null);
        } else {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('File not found');
        }
    }

    public function importShipmentdata()
    {
        // Load the model
        $model = new Ordermanagement_model();

        // Handle file upload
        $file = $this->request->getFile('shipment_excel_file');

        // Validate file
        if ($file->isValid() && $file->getExtension() === 'xlsx') {
            // Load the Excel file
            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($file->getPathname());

            // Get the first worksheet
            $worksheet = $spreadsheet->getActiveSheet();

            // Get the headers from the first row
            $headers = [];
            $headerRow = $worksheet->getRowIterator(1)->current();
            foreach ($headerRow->getCellIterator() as $cell) {
                $headers[] = $cell->getValue();
            }

            // Loop through rows starting from the second row and extract data
            $data = [];
            foreach ($worksheet->getRowIterator(3) as $row) {
                $rowData = [];
                $orderItems = [];

                // Generate a 6-digit random code with a prefix '#'
                $order_id = '#' . str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);
                $rowData['order_number'] = $order_id;

                $cellIterator = $row->getCellIterator();
                $cellIterator->setIterateOnlyExistingCells(false); // Loop through all cells, even if they are empty

                foreach ($cellIterator as $cell) {
                    $columnIndex = $cell->getColumn();
                    $headerIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($columnIndex) - 1;

                    // Check if header exists for this index
                    if (isset($headers[$headerIndex])) {
                        $columnName = $headers[$headerIndex];

                        // Store relevant column data in orderItems array
                        if (in_array($columnName, ['product_id', 'product_title', 'selling_price', 'quantity', 'sku', 'hsn', 'product_size'])) {
                            $orderItems[$columnName] = $cell->getValue();
                        } else {
                            $rowData[$columnName] = $cell->getValue();
                        }
                    }
                }

                // JSON encode orderItems array for storage in database
                $rowData['order_items'] = json_encode([$orderItems]);
                $data[] = $rowData;
            }

            // Process and insert data into the database
            $model->InsertShipmentData($data);

            // Provide feedback to user
            return redirect()->to('bluedart_management');
        } else {
            echo 'Invalid file format. Please upload an Excel file.';
        }
    }




    //shipments
    public function shipmentview(): string
    {
        $session = session();
        $model = new Ordermanagement_model();
        $pincodeModel = new PincodeModel(); // Your pincode_mapping table model
        $userModel = new Registerusers_model(); // Assuming you have a UserModel for fetching user info

        // Check the admin type
        if ($session->get('admin_type') == 'seller') {
            $seller_id = $session->get('user_id');
            $orders = $model->getordersbyseller($seller_id);
        } else {
            $orders = $model->getorders();
        }

        // For each order, fetch vendors based on the pincode with specific conditions
        foreach ($orders as &$order) {
            $pincode = $order['pincode']; // Ensure 'pincode' exists in the order data

            // Fetch vendors where pickup, delivery, and cod are 'Y'
            $vendors = $pincodeModel->where('area_pincode', $pincode)
                ->where('pickup', 'Y')  // Filter for 'Y' in pickup
                ->where('delivery', 'Y') // Filter for 'Y' in delivery
                ->where('cod', 'Y')     // Filter for 'Y' in cod
                ->findAll();

            // Attach the vendors to each order
            foreach ($vendors as &$vendor) {
                // Fetch the delivery cost and discount for the vendor
                $vendorDetails = $pincodeModel->where('delivery_partner', $vendor['delivery_partner'])
                    ->where('area_pincode', $pincode)
                    ->first();
                $vendor['cost'] = $vendorDetails['cost'] ?? 0; // Default cost to 0 if not set
                $vendor['discount'] = $vendorDetails['discount'] ?? 0; // Default discount to 0 if not set
            }


            $order['vendors'] = $vendors; // Attach the vendors to each order

            // Fetch customer information (user name or user ID)
            if (!empty($order['user_id'])) {
                $customer = $userModel->find($order['user_id']); // Fetch the user by user_id
                $order['customer'] = $customer ? $customer['name'] : 'No Name'; // Add the customer's name to the order
            }
        }

        $data['orders'] = $orders;

        return view('shipment_view', $data);
    }

    /////////////////////////////Email////////////////////////////////////////

    private function sendOrderConfirmationEmail($email, $name, $order_data, $product_details, $orderId)
    {
        try {
            // Generate PDF invoice
            $orderModel = new Ordermanagement_model();
            $productsModel = new Products_model();
            $userModel = new Registerusers_model();

            $invoiceGenerator = new InvoiceGenerator($orderModel, $productsModel, $userModel);
            $pdf = $invoiceGenerator->generateInvoiceforemail($orderId);

            if (!$pdf) {
                log_message('error', 'Failed to generate invoice PDF for order ID: ' . $orderId);
                throw new \Exception('Invoice generation failed');
            }

            // Create a temporary file to store the PDF
            $tempFilePath = WRITEPATH . 'temp/invoice-' . $orderId . '.pdf';

            // Ensure the temp directory exists
            if (!is_dir(WRITEPATH . 'temp')) {
                mkdir(WRITEPATH . 'temp', 0777, true);
            }

            // Save PDF to temporary file
            $pdf->Output($tempFilePath, 'F');

            // Initialize email service
            $emailService = \Config\Services::email();

            // Configure email settings
            $emailService->setFrom('sportsaaga@gmail.com', 'Team SportzSaga');
            $emailService->setTo($email);
            $emailService->setSubject('Hi ' . $name . ', Your Order ' . $order_data['order_number'] . ' is Confirmed! 🎉');

            // Attach PDF from temporary file
            $emailService->attach($tempFilePath, 'application/pdf', 'order-invoice-' . $order_data['order_number'] . '.pdf');

            // Render email template
            $template = view('order_confirmation_email', [
                'name' => $name,
                'order_data' => $order_data,
                'product_details' => $product_details,
            ]);

            $emailService->setMessage($template);

            // Send email
            $emailSent = $emailService->send();

            // Delete temporary file
            if (file_exists($tempFilePath)) {
                unlink($tempFilePath);
            }

            if (!$emailSent) {
                log_message('error', 'Failed to send order confirmation email to ' . $email);
                throw new \Exception('Email sending failed');
            }

            log_message('info', 'Successfully sent order confirmation email with invoice to ' . $email);
        } catch (\Exception $e) {
            // Clean up temporary file if it exists
            if (isset($tempFilePath) && file_exists($tempFilePath)) {
                unlink($tempFilePath);
            }

            log_message('error', 'Error in sendOrderConfirmationEmail: ' . $e->getMessage());
            throw $e;
        }
    }

    public function generateInvoiceforemail($orderId)
    {
        $orderModel = new Ordermanagement_model();
        $productsModel = new Products_model();
        $userModel = new Registerusers_model();

        $invoiceGenerator = new InvoiceGenerator($orderModel, $productsModel, $userModel);
        $pdf = $invoiceGenerator->generateInvoiceforemail($orderId);

        if ($pdf) {
            // Check if this is a direct browser request
            if (isset($_SERVER['HTTP_ACCEPT']) && strpos($_SERVER['HTTP_ACCEPT'], 'application/pdf') !== false) {
                // Output directly to browser
                header('Content-Type: application/pdf');
                header('Content-Disposition: inline; filename="order-invoice-' . $orderId . '.pdf"');
                header('Cache-Control: private, max-age=0, must-revalidate');
                header('Pragma: public');
                echo $pdf->Output('order-invoice-' . $orderId . '.pdf', 'S');
                exit;
            } else {
                // Return the PDF object for programmatic use
                return $pdf;
            }
        } else {
            // Handle error case
            if (isset($_SERVER['HTTP_ACCEPT']) && strpos($_SERVER['HTTP_ACCEPT'], 'application/pdf') !== false) {
                // Browser request
                header('Content-Type: application/json');
                echo json_encode(['error' => 'Order not found']);
                exit;
            } else {
                // Programmatic request
                return null;
            }
        }
    }

    private function sendShipmentConfirmationEmail($email, $name, $awbNo, $shipment, $dimensions)
    {
        $emailService = \Config\Services::email();
        $emailService->setFrom('sportsaaga@gmail.com', 'Team SportzSaga');
        $emailService->setTo($email);
        //$emailService->setSubject('Your Shipment has been Created - AWB No: ' . $awbNo);
        $emailService->setSubject($name . ', Your Order ' . substr($shipment['order_number'], 0, 6) . ' is On Its Way! 🚚');

        $template = view('shipment_confirmation_email', [
            'name' => $name,
            'awbNo' => $awbNo,
            'shipment' => $shipment,
            'dimensions' => $dimensions
        ]);

        $emailService->setMessage($template);
        log_message('info', 'sent shipment confirmation email to ' . $email);
        if (!$emailService->send()) {
            log_message('error', 'Failed to send shipment confirmation email to ' . $email);
        }
    }



    ////////////////////////WhatsApp////////////////////////////////////////////////////////////////////////
    private function sendWhatsAppMessage($recipient, $templateData, $templateName = 'order_confirmation_sagaweb')
    {
        $url = 'https://api.dotpe.in/api/comm/public/enterprise/v1/wa/send';
        $apiKey = getenv('DOTPE_API_KEY');



        $payload = [
            'template' => [
                'name' => $templateName,
                'language' => getenv('DOTPE_LANGUAGE'),
            ],
            'source' => 'crm',
            'wabaNumber' => getenv('DOTPE_WABA_NUMBER'),
            'recipients' => ['91' . $recipient],
            'params' => [
                'body' => $templateData,
            ],
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Dotpe-Api-Key: ' . $apiKey,
            'Content-Type: application/json',
        ]);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if (curl_errno($ch)) {
            throw new \Exception('cURL error: ' . curl_error($ch));
        }

        curl_close($ch);

        if ($httpCode !== 200) {
            throw new \Exception("Failed to send WhatsApp message. HTTP Code: $httpCode, Response: $response");
        }

        return json_decode($response, true);
    }






    private function sendOrderConfirmationWhatsApp($recipient, $name, $orderData, $productDetails)
    {
        $url = 'https://api.dotpe.in/api/comm/public/enterprise/v1/wa/send';
        $apiKey = getenv('DOTPE_API_KEY');

        // Add country code (91) to the recipient if missing
        if (preg_match('/^\d{10}$/', $recipient)) {
            $recipient = '91' . $recipient;
        }

        // Build the list of ordered items as a string
        $orderedItems = array_map(function ($product) {
            return $product['product_title'] . " (Qty: " . $product['quantity'] . ")";
        }, $productDetails);
        $itemsOrderedStr = implode("\n ", $orderedItems);

        // Template parameters matching {{1}}, {{2}}, {{3}}
        $templateParams = [
            (string) $orderData['order_number'], // Order ID as string
            (string) $itemsOrderedStr,          // Items Ordered as string
            (string) $orderData['total_amount'] // Total Amount as string
        ];

        // Payload for DotPe API
        $payload = [
            'template' => [
                'name' => 'delivery_track_ds', // Ensure this matches the DotPe template name
                'language' => 'en'              // Language code for the template
            ],
            'source' => 'crm',
            'wabaNumber' => getenv('DOTPE_WABA_NUMBER'),
            'recipients' => [$recipient], // Include the recipient's number with country code
            'params' => [
                'body' => $templateParams // Pass the template parameters
            ]
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Dotpe-Api-Key: ' . $apiKey,
            'Content-Type: application/json',
        ]);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if (curl_errno($ch)) {
            throw new \Exception('cURL error: ' . curl_error($ch));
        }

        curl_close($ch);

        if ($httpCode !== 200) {
            throw new \Exception("Failed to send WhatsApp message. HTTP Code: $httpCode, Response: $response");
        }

        return json_decode($response, true);
    }



    public function draftOrders()
    {
        $orderModel = new Ordermanagement_model();

        // Fetch orders with payment_status = 'pending'
        $data['orders'] = $orderModel->where('payment_status', 'pending')->findAll();

        return view('draft_orders_view', $data);
    }


    public function updateTrackingDetails()
    {
        $this->logger->info('Starting tracking details update process');

        $db = \Config\Database::connect();
        $shipmentTable = $db->table('order_shipment');

        // Fetch all shipments where shipping_platform = 'BlueDart' and not delivered or returned
        $shipments = $shipmentTable->where('shipping_platform', 'BlueDart')
            ->whereNotIn('shipment_status', ['returned', 'delivered'])
            ->get()
            ->getResultArray();

        if (empty($shipments)) {
            $this->logger->info('No active BlueDart shipments found for tracking updates.');
            return $this->response->setJSON([
                'status' => 'no_updates'
            ]);
        }

        $updatedShipments = [];

        foreach ($shipments as $shipment) {
            $trackingId = $shipment['tracking_id'];
            $existingTrackingData = json_decode($shipment['tracking_details'], true) ?? [];

            // Fetch new tracking details from BlueDart API
            $trackingDetails = $this->getBlueDartTrackingDetails($trackingId);

            if (isset($trackingDetails['Status']) && $trackingDetails['Status'] === 'Incorrect Waybill number or No Information') {
                $newTrackingData = [
                    [
                        'Scan' => $trackingDetails['Status'],
                        'ScanDate' => date('Y-m-d'),
                        'ScanTime' => date('H:i:s'),
                        'ScannedLocation' => 'N/A'
                    ]
                ];
            } elseif (isset($trackingDetails['Scans']['ScanDetail'])) {
                $newTrackingData = $trackingDetails['Scans']['ScanDetail'];
            } else {
                $newTrackingData = [];
            }

            // Determine shipment status based on ScanType occurrences
            $shipmentStatus = null;
            foreach ($newTrackingData as $scan) {
                if ($scan['ScanType'] === 'DL') {
                    $shipmentStatus = 'delivered';
                    break;
                } elseif ($scan['ScanType'] === 'RTO') {
                    $shipmentStatus = 'returned';
                    break;
                }
            }

            // Compare and update only if new data is available
            if ($existingTrackingData != $newTrackingData || $shipmentStatus !== null) {
                $updateData = ['tracking_details' => json_encode($newTrackingData)];

                if ($shipmentStatus !== null) {
                    $updateData['shipment_status'] = $shipmentStatus;
                }

                $shipmentTable->where('tracking_id', $trackingId)->update($updateData);

                $this->logger->info("Tracking details updated for Tracking ID: {$trackingId}");
                $updatedShipments[$trackingId] = $newTrackingData;
            }
        }

        return $this->response->setJSON([
            'status' => 'success',
            'updated_shipments' => $updatedShipments
        ]);
    }


    public function applyDiscount()
    {
        $discountCode = $this->request->getPost('discountCode');

        $model = new discountcode();
        $discount = $model->where('code', $discountCode)->where('discountstatus', 1)->first();

        if ($discount) {
            return $this->response->setJSON([
                'status' => 'success',
                'discountAmount' => $discount['discountValue'] // or 'percent' depending on how you store it
            ]);
        }

        return $this->response->setJSON([
            'status' => 'error',
            'message' => 'Invalid or inactive discount code.'
        ]);
    }
}
