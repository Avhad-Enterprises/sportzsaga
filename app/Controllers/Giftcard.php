<?php

namespace App\Controllers;

use App\Models\GiftModel;
use App\Models\Registerusers_model;

class Giftcard extends BaseController
{
    public function giftcard_view()
    {
        $giftCardModel = new GiftModel();
        $data['giftcards'] = $giftCardModel->getAllGiftCards();
        return view('giftcard_view', $data);
    }

    public function view()
    {
        $model = new Registerusers_model();
        $data['users'] = $model->showusers();

        // Start session if not already started
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (isset($_SESSION['user_id'])) {
            $userModel = new Registerusers_model();
            $user = $userModel->getUserById($_SESSION['user_id']);

            $data['name'] = $user['name'] ?? 'Guest';
            $data['user_id'] = $user['user_id'] ?? null;
        } else {
            $data['name'] = 'Guest';
            $data['user_id'] = null;
        }

        return view('addnew_giftcard_view', $data);
    }

    public function publishGiftCard()
    {
        $giftCardModel = new GiftModel();

        $security_code = password_hash($this->request->getPost('security_features'), PASSWORD_BCRYPT);

        $gift_card_data = [
            'gift_card_code' => $this->request->getPost('gift_card_code'),
            'creation_date' => $this->request->getPost('creation_date'),
            'expiration_date' => $this->request->getPost('expiration_date'),
            'initial_value' => $this->request->getPost('initial_value'),
            'balance' => $this->request->getPost('balance'),
            'issued_by' => $this->request->getPost('issued_by'), // Issuer name
            'issued_by_id' => $this->request->getPost('issued_by_id'), // Issuer ID
            'issued_to' => $this->request->getPost('issued_to'), // Recipient email
            'issued_to_id' => $this->request->getPost('issued_to_id'), // Recipient ID
            'status' => $this->request->getPost('status'),
            'security_features' => $security_code,
            'restrictions' => $this->request->getPost('restrictions'),
        ];

        //print_r($gift_card_data); exit();

        $gift_card_id = $giftCardModel->insert($gift_card_data);

        if ($gift_card_id) {

            $issued_to = $this->request->getPost('issued_to');
            $gift_card_code = $this->request->getPost('gift_card_code');
            $creation_date = $this->request->getPost('creation_date');
            $expiration_date = $this->request->getPost('expiration_date');
            $restrictions = $this->request->getPost('restrictions');
            $security_features = $this->request->getPost('security_features');

            $userModel = new \App\Models\Registerusers_model();
            $user = $userModel->where('email', $issued_to)->first();
            $username = $user ? $user['username'] : 'Customer';

            $email = \Config\Services::email();
            $email->setTo($issued_to);
            $email->setFrom('avhadenterprisespc7@gmail.com', 'Anuj Avhad');
            $email->setSubject('Your Gift Card Has Been Generated');

            $emailMessage = "
                <!DOCTYPE html>
                <html lang='en'>
                <head>
                    <meta charset='UTF-8'>
                    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                    <title>Your Gift Card</title>
                    <style>
                        body {
                            font-family: Arial, sans-serif;
                            margin: 0;
                            padding: 0;
                            background-color: #f7f7f7; /* Light background for contrast */
                        }
                        .card {
                            max-width: 600px;
                            margin: 40px auto;
                            background-image: url('https://images.pexels.com/photos/157879/gift-jeans-fashion-pack-157879.jpeg?cs=srgb&dl=pexels-pixabay-157879.jpg&fm=jpg'); /* Set your gift card background image URL here */
                            background-size: cover;
                            background-repeat: no-repeat;
                            background-position: center;
                            border-radius: 10px;
                            padding: 20px;
                            color: #fff; /* Default text color set to white */
                            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
                        }
                        h1 {
                            font-size: 24px;
                            margin-bottom: 10px;
                            text-align: center;
                            color: #fff; /* Header text color set to white */
                        }
                        p {
                            line-height: 1.6;
                            margin: 10px 0;
                            text-align: center;
                            color: #fff; /* Paragraph text color set to white */
                        }
                        .highlight {
                            font-weight: bold;
                            color: #fff; /* Gold color for highlights */
                        }
                        .footer {
                            margin-top: 20px;
                            font-size: 12px;
                            text-align: center;
                            color: #fff; /* Footer text color set to white */
                        }
                    </style>
                </head>
                <body>
                    <div class='card'>
                        <h1>Gift Card Notification</h1>
                        <p>Dear $username,</p>
                        <p>Your gift card has been successfully generated!</p>
                        <p class='highlight'>Gift Card Code: $gift_card_code</p>
                        <p>Creation Date: <span class='highlight'>$creation_date</span></p>
                        <p>Valid Until: <span class='highlight'>$expiration_date</span></p>
                        <p>Terms and Conditions: <span class='highlight'>$restrictions</span></p>
                        <p>PIN Code: <span class='highlight'>$security_features</span></p>
                        <p>Thank you for choosing us!</p>
                        <div class='footer'>
                            <p>&copy; " . date('Y') . " Your Company Name. All rights reserved.</p>
                        </div>
                    </div>
                </body>
                </html>
                ";

            $email->setMessage($emailMessage);
            $email->setMailType('html');


            if ($email->send()) {
                return redirect()->to('giftcard_view')->with('success', 'Gift card created successfully and email sent!');
            } else {
                // If email fails, get the error details
                $emailError = $email->printDebugger(['headers']);
                log_message('error', 'Email failed to send. Error: ' . print_r($emailError, true));
                return redirect()->to('giftcard_view')->with('warning', 'Gift card created but email failed to send. Error: ' . $emailError);
            }
        }
    }

    public function deleteGiftCard($gift_card_id)
    {
        $giftCardModel = new GiftModel();
        if ($giftCardModel->delete($gift_card_id)) {

            session()->setFlashdata('success', 'Gift card deleted successfully.');
        }
        return redirect()->to(base_url('giftcard_view'));
    }

    public function editgiftcard($gift_card_id)
    {
        $model = new GiftModel();
        $userModel = new Registerusers_model(); // Assuming this is your users model

        // Fetch the gift card details
        $giftCard = $model->find($gift_card_id);
        if (!$giftCard) {
            return redirect()->to(base_url('giftcard_view'))->with('error', 'Gift card not found.');
        }

        // Fetch all users from the database to populate the dropdown
        $users = $userModel->showusers(); // Ensure this method retrieves all users

        $data = [
            'giftCard' => $giftCard,
            'users' => $users, // Pass users to the view
        ];

        return view('edit_giftcard_view', $data);
    }


    public function updateGiftCard($gift_card_id)
    {
        $model = new GiftModel();

        // Fetch the existing gift card data before updating
        $existingGiftCard = $model->find($gift_card_id);
        if (!$existingGiftCard) {
            return redirect()->to(base_url('giftcard_view'))->with('error', 'Gift card not found.');
        }

        // Get form data
        $initial_value = $this->request->getPost('initial_value');
        $balance = ($existingGiftCard['initial_value'] != $initial_value) ? $initial_value : $existingGiftCard['balance'];

        // Retrieve the security code from the request
        $new_security_code = $this->request->getPost('security_features');

        // Check if a new security code is entered
        if (!empty($new_security_code) && !password_verify($new_security_code, $existingGiftCard['security_features'])) {
            $hashed_security_code = password_hash($new_security_code, PASSWORD_BCRYPT);
        } else {
            $hashed_security_code = $existingGiftCard['security_features'];
        }

        // Prepare updated data
        $data = [
            'gift_card_code' => $this->request->getPost('gift_card_code') ?? $existingGiftCard['gift_card_code'],
            'initial_value' => $initial_value,
            'balance' => $balance, // Update balance only if the initial value changes
            'issued_by' => $this->request->getPost('issued_by') ?? $existingGiftCard['issued_by'],
            'issued_by_id' => $this->request->getPost('issued_by_id') ?? $existingGiftCard['issued_by_id'],
            'issued_to' => $this->request->getPost('issued_to') ?? $existingGiftCard['issued_to'],
            'issued_to_id' => $this->request->getPost('issued_to_id') ?? $existingGiftCard['issued_to_id'],
            'status' => $this->request->getPost('status') ?? $existingGiftCard['status'],
            'security_features' => $hashed_security_code, // Save hashed security code
            'restrictions' => $this->request->getPost('restrictions') ?? $existingGiftCard['restrictions'],
            'creation_date' => $this->request->getPost('creation_date') ?? $existingGiftCard['creation_date'],
            'expiration_date' => $this->request->getPost('expiration_date') ?? $existingGiftCard['expiration_date'],
        ];
        // Only update if data is changed
        $model->update($gift_card_id, $data);

        return redirect()->to(base_url('giftcard_view'))->with('success', 'Gift card updated successfully.');
    }

    public function submitGiftCardForm()
    {
        $issuedTo = $this->request->getPost('issued_to');

        // Debugging: check the value of $issuedTo
        if (empty($issuedTo)) {
            return redirect()->to('giftcard_view')->with('error', 'No customer selected.');
        }

        // Proceed if $issuedTo is not empty
        $email = \Config\Services::email();
        $email->setTo($issuedTo);
        $email->setSubject('Your Gift Card Has Been Generated');
        $email->setMessage('Dear Customer, your gift card has been successfully generated. Thank you for choosing us!');

        if ($email->send()) {
            return redirect()->to('giftcard_view')->with('success', 'Gift card generated and email sent successfully.');
        } else {
            // Debugging: get the email sending error
            $emailError = $email->printDebugger(['headers']);
            return redirect()->to('giftcard_view')->with('error', 'Failed to send email. Error: ' . $emailError);
        }
    }
}
