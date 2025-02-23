<?php

namespace App\Controllers;

use App\Models\Cart_model;
use App\Models\Products_model;
use App\Models\Registerusers_model;
use App\Models\Footer_model;

class AbandonedOrderController extends BaseController
{
    protected $Cart_model;
    protected $Products_model;
    protected $Registerusers_model;

    public function __construct()
    {
        $this->Cart_model = new Cart_model();
        $this->Products_model = new Products_model();
        $this->Registerusers_model = new Registerusers_model();
    }

    // Display Abandoned Orders
    public function index()
    {
        $cartItems = $this->Cart_model->select('session_id')->distinct()->findAll();

        $uniqueSessionItems = [];

        foreach ($cartItems as $item) {
            $cartDetails = $this->Cart_model->where('session_id', $item['session_id'])->first();

            if ($cartDetails) {
                $product = $this->Products_model->find($cartDetails['product_id']);
                if ($product) {
                    $cartDetails['product_name'] = $product['product_title'];
                    $cartDetails['product_image'] = $product['product_image'];
                } else {
                    $cartDetails['product_name'] = 'Unknown Product';
                    $cartDetails['product_image'] = '';
                }

                $uniqueSessionItems[] = $cartDetails;
            }
        }

        $data['cart'] = $uniqueSessionItems;
        return view('abandoned_view', $data);
    }

    // Send Email to a Single User
    public function sendEmail($id = null)
    {
        $registerUsersModel = new Registerusers_model();
        $cartModel = new Cart_model();
        $email = null;
    
        if ($id) {
            // Check if the user exists and get their email
            $user = $registerUsersModel->where('user_id', $id)->first();
            if ($user && isset($user['email'])) {
                $email = $user['email'];
            }
    
            // If no email is found, check if it's a session-based cart
            if (!$email) {
                $cart = $cartModel->where('session_id', $id)->first();
                if ($cart && isset($cart['email'])) {
                    $email = $cart['email'];
                }
            }
        }
    
        if ($email) {
            $emailService = \Config\Services::email();
            $emailService->setFrom('avhadenterprisespc7@gmail.com', 'Admin');
            $emailService->setTo($email);
            $emailService->setSubject('Cart Reminder');
    
            // Generate the personalized cart URL
            $cartUrl = base_url("cart/edit_cart_view/{$id}");
    
            // Email message
            $message = "
                <p>Hello!</p>
                <p>You have items in your cart. Come back and complete your purchase!</p>
                <p><a href='{$cartUrl}' target='_blank'>Click here to view your cart.</a></p>
                <p>Thank you!</p>
            ";
    
            $emailService->setMessage($message);
            $emailService->setMailType('html');
    
            // Send the email
            if ($emailService->send()) {
                return redirect()->back()->with('success', 'Email sent successfully!');
            } else {
                return redirect()->back()->with('error', 'Failed to send the email.');
            }
        }
    
        return redirect()->back()->with('error', 'No email found for the given user or session.');
    }
    
    // Send Email to Multiple Selected Users
    public function sendEmailMultiple()
    {
        $userIds = $this->request->getPost('user_ids');
        log_message('debug', 'User IDs: ' . json_encode($userIds));

        if (!empty($userIds)) {
            $emailSentCount = 0;
            $emailFailedCount = 0;

            foreach ($userIds as $userId) {
                $emailSent = $this->sendEmailToUserOrSession($userId);

                if ($emailSent) {
                    $emailSentCount++;
                } else {
                    $emailFailedCount++;
                }
            }

            if ($emailSentCount > 0) {
                return redirect()->back()->with('success', "{$emailSentCount} emails sent successfully!" .
                    ($emailFailedCount > 0 ? " {$emailFailedCount} emails failed to send." : ""));
            } else {
                return redirect()->back()->with('error', 'No emails were sent. Please check the user selection.');
            }
        }

        return redirect()->back()->with('error', 'No users selected.');
    }

    // Helper function to send email to a specific user or session
    private function sendEmailToUserOrSession($userIdOrSessionId)
    {
        // First, check if it's a user_id or session_id, and fetch the user accordingly
        $user = $this->Registerusers_model->where('user_id', $userIdOrSessionId)->first();
    
        if (!$user) {
            // If not found by user_id, try session_id
            $user = $this->Cart_model->where('session_id', $userIdOrSessionId)->first();
        }
    
        // If the user or session exists, and email is available
        if ($user && isset($user['email']) && filter_var($user['email'], FILTER_VALIDATE_EMAIL)) {
            $emailService = \Config\Services::email();
            $emailService->setFrom('avhadenterprisespc7@gmail.com', 'Admin');
            $emailService->setTo($user['email']);
            $emailService->setSubject('Cart Reminder');
    
            // Generate the edit cart view link dynamically
            $cartUrl = base_url("cart/edit_cart_view/{$userIdOrSessionId}");
            
            $message = "
                <p>Hello!</p>
                <p>You have items in your cart. Come back and complete your purchase!</p>
                <p><a href='{$cartUrl}' target='_blank'>Click here to view your cart.</a></p>
                <p>Thank you!</p>
            ";
    
            $emailService->setMessage($message);
            $emailService->setMailType('html');
    
            // Log before sending the email
            log_message('debug', "Sending email to: " . $user['email']);
    
            // Send the email
            if ($emailService->send()) {
                return true;
            } else {
                log_message('error', 'Failed to send email to user or session: ' . $user['email']);
                return false;
            }
        }
    
        log_message('error', 'Invalid email for user/session: ' . $userIdOrSessionId);
        return false;
    }
    
    // Send Custom Email to Multiple Recipients
    public function sendCustomEmail()
    {
        $recipients = $this->request->getPost('email_recipients');
        $subject = $this->request->getPost('email_subject');
        $body = $this->request->getPost('email_body');

        if (!empty($recipients)) {
            $userIds = explode(',', $recipients);
            $emailSentCount = 0;
            $emailFailedCount = 0;

            foreach ($userIds as $userId) {
                $userId = trim($userId);

                $user = $this->Registerusers_model->where('user_id', $userId)->first();
                if (!$user) {
                    $user = $this->Cart_model->where('session_id', $userId)->first();
                }

                if ($user && isset($user['email']) && filter_var($user['email'], FILTER_VALIDATE_EMAIL)) {
                    $emailService = \Config\Services::email();

                    $emailService->setFrom('avhadenterprisespc7@gmail.com', 'Admin');
                    $emailService->setTo($user['email']);
                    $emailService->setSubject($subject);
                    $emailService->setMessage($body);
                    $emailService->setMailType('html');

                    if ($emailService->send()) {
                        $emailSentCount++;
                    } else {
                        $emailFailedCount++;
                    }
                } else {
                    $emailFailedCount++;
                }
            }

            if ($emailSentCount > 0) {
                return redirect()->back()->with(
                    'success',
                    "{$emailSentCount} emails sent successfully!" .
                    ($emailFailedCount > 0 ? " {$emailFailedCount} emails failed to send." : "")
                );
            } else {
                return redirect()->back()->with('error', 'No emails were sent. Please check the user selection.');
            }
        }

        return redirect()->back()->with('error', 'No recipients selected.');
    }


    public function edit_cart($id)
    {
        $cartModel = new Cart_model();
        $userModel = new Registerusers_model();
        $footerModel = new Footer_model(); // Assuming you have a model for footer links
        
        // Fetch user by ID
        $customer = $userModel->find($id);
    
        // Fetch cart items using the pre-defined model method
        $cartItems = $cartModel->getCartItemsByUserOrSession($id);
    
        // Calculate cart count
        $cartCount = count($cartItems);
    
        // Fetch footer links
        $footerLinks = $footerModel->getFooterLinks(); // Replace with actual method to fetch footer links
    
        // If no registered user found but session-based cart exists
        if (!$customer && !empty($cartItems)) {
            // Use cart table data to create a "guest" customer profile
            $customer = [
                'id' => $id, // Use session_id as fallback
                'name' => $cartItems[0]['fullName'] ?? 'Guest',
                'phone_no' => $cartItems[0]['phone'] ?? '',
                'email' => $cartItems[0]['email'] ?? '',
                'address_information' => trim(($cartItems[0]['address1'] ?? '') . ' ' . ($cartItems[0]['address2'] ?? '')),
                'pincode' => $cartItems[0]['pincode'] ?? '',
            ];
        }
    
        // If no customer or cart data is found, redirect back with an error
        if (!$customer && empty($cartItems)) {
            return redirect()->back()->with('error', 'Customer or cart data not found.');
        }
    
        // Prepare data for the view
        $data = [
            'customer' => $customer,
            'cartItems' => $cartItems,
            'cartCount' => $cartCount, // Pass cart count to the view
            'footerLinks' => $footerLinks, // Pass footer links to the view
        ];
    
        return view('edit_cart_view', $data);
    }
       
    public function update_cart($id)
    {
        $cartModel = new Cart_model();
        $userModel = new Registerusers_model();

        // Update user or session details
        $customerData = [
            'name' => $this->request->getPost('name'),
            'phone_no' => $this->request->getPost('phone_no'),
            'email' => $this->request->getPost('email'),
            'address_information' => $this->request->getPost('address_information'),
            'pincode' => $this->request->getPost('pincode'),
        ];

        // Check if the ID corresponds to a registered user
        if ($userModel->find($id)) {
            $userModel->update($id, $customerData); // Update registered user details
        } else {
            // If no registered user, update session-based cart data
            $cartModel->where('session_id', $id)->set($customerData)->update();
        }

        // Update cart items
        $cartItems = $this->request->getPost();
        if (isset($cartItems['product_title']) && is_array($cartItems['product_title'])) {
            foreach ($cartItems['product_title'] as $index => $title) {
                $cartData = [
                    'product_title' => $title,
                    'brand' => $cartItems['brand'][$index],
                    'size' => $cartItems['product_size'][$index],
                    'quantity' => $cartItems['product_qty'][$index],
                    'selling_price' => $cartItems['selling_price'][$index],
                    'cost_price' => $cartItems['cost_price'][$index],
                ];

                // Update cart item by product ID
                $cartModel->where('id', $cartItems['cart_id'][$index])->set($cartData)->update();
            }
        }

        return redirect()->to('cart')->with('success', 'Cart updated successfully!');
    }


    
    


}
