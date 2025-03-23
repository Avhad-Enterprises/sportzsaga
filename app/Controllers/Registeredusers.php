<?php

namespace App\Controllers;

use App\Models\Registerusers_model;
use App\Models\invitationmodel;
use App\Models\UserLoginsModel;
use App\Models\Ordermanagement_model;
use App\Models\Cart_model;
use App\Models\Products_model;
use App\Models\Footer_model;
use App\Models\SocialMediaLinks_model;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Google\Cloud\Storage\StorageClient;
use App\Models\loyalitypointsvalues;
use App\Models\referralpointsconfigmodel;
use App\Models\referralmodel;

class Registeredusers extends BaseController
{
    public function index(): string
    {
        $model = new Registerusers_model();
        $data['users'] = $model->getusers();
        return view('registered_users_view', $data);
    }

    public function add_new_user()
    {
        return view('create_users_view');
    }

    public function publish_new_user()
    {
        $userModel = new Registerusers_model();

        // Initialize Google Cloud Storage
        $storage = new \Google\Cloud\Storage\StorageClient([
            'keyFilePath' => WRITEPATH . 'public/mkvgsc.json', // Adjust the path to your key file
            'projectId' => 'peak-tide-441609-r1',
        ]);
        $bucketName = 'mkv_imagesbackend';
        $bucket = $storage->bucket($bucketName);

        // Handle Profile Image Upload
        $profileImage = $this->request->getFile('profile_img');
        $profileImagePath = '';

        if ($profileImage && $profileImage->isValid() && !$profileImage->hasMoved()) {
            // Generate a unique file name
            $profileImageName = $profileImage->getRandomName();

            // Upload the file to Google Cloud Storage
            $gcsObject = $bucket->upload(
                fopen($profileImage->getTempName(), 'r'),
                ['name' => 'profile-images/' . $profileImageName]
            );

            if ($gcsObject) {
                // Generate the public URL for the uploaded image
                $profileImagePath = sprintf(
                    'https://storage.googleapis.com/%s/profile-images/%s',
                    $bucketName,
                    $profileImageName
                );
            }
        }

        // Prepare data for insertion
        $data = [
            // Personal Information
            'name' => $this->request->getPost('user_name'),
            'email' => $this->request->getPost('user_email'),
            'phone_no' => $this->request->getPost('user_phone'),
            'gender' => $this->request->getPost('user_gender'),
            'dob' => $this->request->getPost('user_dob'),
            'tags' => $this->request->getPost('user_tags'),

            // Address Details
            'address_information' => trim($this->request->getPost('user_address1') . ' ' . $this->request->getPost('user_address2')),
            'country' => $this->request->getPost('user_country'),
            'state' => $this->request->getPost('user_state'),
            'city' => $this->request->getPost('user_city'),
            'pincode' => $this->request->getPost('user_pincode'),
            'location' => $this->request->getPost('user_location'),
            'landmark' => $this->request->getPost('user_landmark'),

            // Profile Image
            'profile_img' => $profileImagePath,

            // Account Type
            'account_type' => 'customer',
        ];

        // Insert user data into the database
        if ($userModel->insert($data)) {
            return redirect()->to('registeredusers')->with('success', 'User added successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to add user. Please try again.');
        }
    }


    public function deleteuser($id)
    {
        $model = new Registerusers_model();
        $model->deleteusermodel($id);
        return redirect()->to('/registeredusers')->with('success', 'User deleted successfully.');
    }

    public function edituser($id)
    {
        $model = new Registerusers_model();
        $orderModel = new Ordermanagement_model();
        $cartModel = new Cart_model();
        $productModel = new Products_model();

        // Load referral points configuration
        $referralPointsModel = new ReferralPointsConfigModel();
        $data['referralConfig'] = $referralPointsModel->getReferralPointsConfig();

        $modelloyality = new loyalitypointsvalues();
        $loyaltyPoint = $modelloyality->getLoyaltyPointValue();
        $data['loyalty_point_value'] = $loyaltyPoint ? $loyaltyPoint['loyalty_point_value'] : 0;

        // Fetch user details
        $data['users'] = $model->editusermodel($id);

        // Fetch the last order of the user
        $data['last_order'] = $orderModel
            ->where('user_id', $id)
            ->orderBy('order_date', 'DESC')
            ->first();

        // Fetch the total number of orders for the user
        $data['total_orders'] = $orderModel->getTotalOrders($id);

        // Fetch average order value
        $data['average_order_value'] = $orderModel
            ->where('user_id', $id)
            ->selectAvg('total_amount')
            ->first();
        $data['average_order_value'] = $data['average_order_value']['total_amount'] ?? 'N/A';

        // Calculate total amount spent by the user
        $result = $orderModel
            ->where('user_id', $id)
            ->selectSum('total_amount')
            ->first();
        $data['amount_spent'] = $result['total_amount'] ?? 0;

        // Fetch order information
        $data['orders'] = $orderModel->getorderinfo($id);

        // Fetch cart abandonment data with product details
        $cartItems = $cartModel->where('user_id', $id)->findAll();
        $cartAbandonmentData = [];

        // Google Cloud Storage setup
        $storage = new \Google\Cloud\Storage\StorageClient([
            'keyFilePath' => WRITEPATH . 'public/mkvgsc.json',
            'projectId' => 'peak-tide-441609-r1',
        ]);
        $bucketName = 'mkv_imagesbackend';
        $bucket = $storage->bucket($bucketName);

        foreach ($cartItems as $cartItem) {
            $product = $productModel->find($cartItem['product_id']);
            if ($product) {
                $productImagePath = $product['product_image'] ?? '';

                // Check if product image is stored in Google Cloud Storage
                if (!empty($productImagePath)) {
                    if (strpos($productImagePath, 'https://') === false) {
                        // Assume it's stored in GCS (convert to full public URL)
                        $productImagePath = sprintf(
                            'https://storage.googleapis.com/%s/%s',
                            $bucketName,
                            $productImagePath
                        );
                    }
                } else {
                    // Set default placeholder image if product image is missing
                    $productImagePath = base_url('assets/images/default-product.jpg');
                }

                $cartAbandonmentData[] = [
                    'product_name' => $product['product_title'],
                    'quantity' => $cartItem['quantity'],
                    'added_on' => $cartItem['created_at'],
                    'product_price' => $product['cost_price'],
                    'product_image' => $productImagePath, // Corrected Image Path
                ];
            }
        }

        $data['cart_abandonment'] = $cartAbandonmentData;

        // Update the user's cart abandonment record in the database
        $model->update($id, ['cart_abandonment_record' => json_encode($cartAbandonmentData)]);

        return view('edit_user_view', $data);
    }

    public function importfromexcel()
    {
        return view('import_users_view');
    }

    public function importUsersFromExcel()
    {
        // Load the model
        $model = new Registerusers_model();

        // Handle file upload
        $file = $this->request->getFile('users_excel_file');

        // Validate file
        if ($file->isValid() && $file->getExtension() === 'xlsx') {
            // Load the Excel file
            $spreadsheet = IOFactory::load($file->getPathname());

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
                $cellIterator = $row->getCellIterator();
                $cellIterator->setIterateOnlyExistingCells(false); // Loop through all cells, even if they are empty
                foreach ($cellIterator as $cell) {
                    $columnIndex = $cell->getColumn();
                    $headerIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($columnIndex) - 1;
                    $columnName = $headers[$headerIndex] ?? null;
                    if ($columnName !== null) {
                        $cellValue = $cell->getValue();
                        $rowData[$columnName] = $cellValue;
                    }
                }
                $data[] = $rowData;
            }

            // Process and insert data into the database
            $model->insertUsersExcelData($data);

            // Provide feedback to the user
            return redirect()->to('registeredusers')->with('success', 'Users imported successfully.');
        } else {
            return redirect()->back()->with('error', 'Invalid file format. Please upload a valid Excel file.');
        }
    }

    public function user_details($id)
    {
        $model = new Registerusers_model();
        $footerModel = new Footer_model();
        $socialMediaModel = new SocialMediaLinks_model();
        $cartModel = new Cart_model();

        // Fetch user details
        $data['users'] = $model->getuserdetails($id);

        // Fetch footer links
        $data['footerLinks'] = $footerModel->getfooterdata();

        // Fetch social media links
        $data['socialMediaLinks'] = $socialMediaModel->findAll();

        // Fetch cart items with product details
        $data['cartItems'] = $cartModel->getCartItems($id);

        // Define platform fee and shipping fee
        $data['platformFee'] = 50.00;
        $data['shippingFee'] = 20.00;

        // Pass data to the view
        return view('user_details_view', $data);
    }


    public function view_all_orders($user_id)
    {
        $orderModel = new Ordermanagement_model();

        // Fetch all orders for the given user ID
        $data['orders'] = $orderModel->where('user_id', $user_id)->findAll();

        // Pass the user ID to the view for context
        $data['user_id'] = $user_id;

        return view('view_all_orders', $data);
    }

    public function updateuserdata($id)
    {
        $model = new Registerusers_model();
        $session = session();


        // Fetch existing user data
        $existingRecord = $model->find($id);
        if (!$existingRecord) {
            return redirect()->to('/registeredusers')->with('error', 'User not found.');
        }

        // Get new data from request
        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        $phone_no = $this->request->getPost('phoneno');
        $guestconpassval = $this->request->getPost('confirmpassword');

        // Track changes only if there are modifications
        $changes = [];

        if ($existingRecord['name'] !== $name) {
            $changes['name'] = ['old' => $existingRecord['name'], 'new' => $name];
        }
        if ($existingRecord['email'] !== $email) {
            $changes['email'] = ['old' => $existingRecord['email'], 'new' => $email];
        }
        if ($existingRecord['phone_no'] !== $phone_no) {
            $changes['phone_no'] = ['old' => $existingRecord['phone_no'], 'new' => $phone_no];
        }
        if (!empty($guestconpassval) && $existingRecord['password'] !== $guestconpassval) {
            $changes['password'] = ['old' => '********', 'new' => '********']; // Mask passwords for security
        }

        // Proceed only if there are actual changes
        if (!empty($changes)) {
            // Fetch and decode existing change log
            $existingChangeLog = !empty($existingRecord['change_log']) ? json_decode($existingRecord['change_log'], true) : [];

            // Ensure it's an array
            if (!is_array($existingChangeLog)) {
                $existingChangeLog = [];
            }

            // Append new change entry
            $newChange = [
                'changes' => $changes,
                'updated_by' => $session->get('admin_name') . ' (' . $session->get('user_id') . ')',
                'timestamp' => date('Y-m-d H:i:s'),
            ];

            $existingChangeLog[] = $newChange; // Append to change log

            // Prepare update data
            $updateData = [
                'name' => $name,
                'email' => $email,
                'phone_no' => $phone_no,
                'change_log' => json_encode($existingChangeLog),
            ];

            if (!empty($guestconpassval)) {
                $updateData['password'] = $guestconpassval;
            }

            // Update record
            $model->update($id, $updateData);

            return redirect()->to('/registeredusers')->with('success', 'User updated successfully.');
        } else {
            return redirect()->to('/registeredusers')->with('info', 'No changes detected.');
        }
    }


    public function employee()
    {
        $model = new Registerusers_model();
        $data['inviets'] = $model->getinvites();
        $data['employes'] = $model->getemployee();
        return view('employee_view', $data);
    }

    public function editempolyee($id)
    {
        $model = new Registerusers_model();
        $data['employes'] = $model->editempolyee($id);
        return view('edit_employee_view', $data);
    }

    public function update_profile($user_id)
    {
        $userModel = new Registerusers_model();
        $session = session();

        // Fetch current user data
        $currentUser = $userModel->find($user_id);

        // Get the POST data
        $data = [
            'name' => $this->request->getPost('name'),
            'employee_role' => $this->request->getPost('employee_role'),
            'email' => $this->request->getPost('email'),
            'dob' => $this->request->getPost('dob'),
            'gender' => $this->request->getPost('gender'),
            'country' => $this->request->getPost('country'),
            'state' => $this->request->getPost('state'),
            'pincode' => $this->request->getPost('pincode'),
            'phone_no' => $this->request->getPost('phone_no'),
            'address_one' => $this->request->getPost('address_information_linef'),
            'address_two' => $this->request->getPost('address_information_linesec'),
            'landmark' => $this->request->getPost('landmark'),
        ];

        // **CHANGE LOG FUNCTIONALITY**
        $changeLog = [];
        foreach ($data as $key => $value) {
            if ($value != $currentUser[$key]) {
                $changeLog[$key] = ['old' => $currentUser[$key], 'new' => $value];
            }
        }

        // If there are changes, log them
        if (!empty($changeLog)) {
            $newLogEntry = [
                'updated_by' => $session->get('admin_name') . ' (' . $session->get('user_id') . ')',
                'changes' => $changeLog,
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            // Retrieve existing change log and append new changes
            $existingChangeLog = json_decode($currentUser['change_log'], true);
            if (!is_array($existingChangeLog)) {
                $existingChangeLog = [];
            }

            $existingChangeLog[] = $newLogEntry; // Append new entry

            $data['change_log'] = json_encode($existingChangeLog); // Save updated change log
        }

        // **Update only if there are changes**
        if (!empty($changeLog)) {
            $userModel->updateusermodel($user_id, $data);
            return redirect()->to('profile')->with('success', 'Profile updated successfully.');
        } else {
            return redirect()->to('profile')->with('info', 'No changes were made.');
        }
    }

    public function updateempolyee($id)
    {
        $model = new Registerusers_model();
        $session = session();
        $userId = $session->get('user_id'); // Get user ID from session

        // Fetch existing employee data
        $existingRecord = $model->find($id);
        if (!$existingRecord) {
            return redirect()->to('employee')->with('error', 'Employee not found.');
        }

        // Get new data from request
        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        $phone_no = $this->request->getPost('phoneno');
        $guestconpassval = $this->request->getPost('confirmpassword');

        // Track changes only if there are modifications
        $changes = [];

        if ($existingRecord['name'] !== $name) {
            $changes['name'] = ['old' => $existingRecord['name'], 'new' => $name];
        }
        if ($existingRecord['email'] !== $email) {
            $changes['email'] = ['old' => $existingRecord['email'], 'new' => $email];
        }
        if ($existingRecord['phone_no'] !== $phone_no) {
            $changes['phone_no'] = ['old' => $existingRecord['phone_no'], 'new' => $phone_no];
        }
        if (!empty($guestconpassval) && $existingRecord['password'] !== $guestconpassval) {
            $changes['password'] = ['old' => '********', 'new' => '********']; // Mask passwords for security
        }

        // Proceed only if there are actual changes
        if (!empty($changes)) {
            // Fetch and decode existing change log
            $existingChangeLog = !empty($existingRecord['change_log']) ? json_decode($existingRecord['change_log'], true) : [];

            // Ensure it's an array
            if (!is_array($existingChangeLog)) {
                $existingChangeLog = [];
            }

            // Append new change entry
            $newChange = [
                'changes' => $changes,
                'updated_by' => $session->get('admin_name') . ' (' . $session->get('user_id') . ')',
                'timestamp' => date('Y-m-d H:i:s'),
            ];

            $existingChangeLog[] = $newChange; // Append to change log

            // Prepare update data
            $updateData = [
                'name' => $name,
                'email' => $email,
                'phone_no' => $phone_no,
                'change_log' => json_encode($existingChangeLog),
            ];

            if (!empty($guestconpassval)) {
                $updateData['password'] = $guestconpassval;
            }

            // Update record
            $model->update($id, $updateData);

            return redirect()->to('employee')->with('success', 'Employee updated successfully.');
        } else {
            return redirect()->to('employee')->with('info', 'No changes detected.');
        }
    }


    public function sellers()
    {
        $model = new Registerusers_model();
        $data['sellers'] = $model->getsellers();
        return view('sellers_view', $data);
    }

    public function editseller($id)
    {
        $model = new Registerusers_model();
        $data['sellers'] = $model->editseller($id);
        return view('edit_seller_view', $data);
    }

    public function updateseller($id)
    {
        $model = new Registerusers_model();

        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        $phone_no = $this->request->getPost('phoneno');
        $guestconpassval = $this->request->getPost('confirmpassword');

        $data = [
            'name' => $name,
            'email' => $email,
            'phone_no' => $phone_no,
            'password' => $guestconpassval
        ];

        $model->updateseller($id, $data);

        return redirect()->to('sellers')->with('success', 'Seller updated successfully.');
    }

    public function sendinvite()
    {
        return view('invite_form');
    }

    public function sendInviteData()
    {
        $inviteType = $this->request->getPost('invite_type');

        $data = [];
        $model = new invitationmodel();

        if ($inviteType == 'employee') {
            $token = bin2hex(random_bytes(16));
            $expiresAt = date('Y-m-d H:i:s', strtotime('+6 hours'));

            $data = [
                'name' => $this->request->getPost('name'),
                'email' => $this->request->getPost('invite_email'),
                'department' => $this->request->getPost('department'),
                'job_title' => $this->request->getPost('job_title'),
                'roles' => $this->request->getPost('roles'),
                'token' => $token,
                'token_expiry' => $expiresAt,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];

            //print_r($data); exit();

            $this->sendInvitationEmail($data['email'], $data['name'], $data, 'employee');
        } elseif ($inviteType == 'seller') {
            $data = [
                'brand_name' => $this->request->getPost('brand_name'),
                'seller_name' => $this->request->getPost('seller_name'),
                'email' => $this->request->getPost('invite_email'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];

            $this->sendInvitationEmail($data['email'], $data['seller_name'], $data, 'seller');
        }

        $model->insert($data);

        return redirect()->to('employee')->with('success', 'Invitation sent successfully.');
    }

    private function sendInvitationEmail($email, $name, $data, $type)
    {
        $emailService = \Config\Services::email();
        $emailService->setFrom('sportsaaga@gmail.com', 'Team Sportzsaga');
        $emailService->setTo($email);

        if ($type == 'employee') {
            $emailService->setSubject('You are invited!');
            $template = view('invitation_email', [
                'name' => $name,
                'registration_link' => base_url('adminsignup?token=' . $data['token']),
                'department' => $data['department'],
                'job_title' => $data['job_title'],
                'roles' => $data['roles']
            ]);
        } else if ($type == 'seller') {
            $emailService->setSubject('You are invited as a Seller!');
            $template = view('seller_invitation_email', [
                'name' => $name,
                'registration_link' => base_url('seller_register'),
                'brand_name' => $data['brand_name']
            ]);
        }

        $emailService->setMessage($template);

        if (!$emailService->send()) {
            log_message('error', 'Failed to send invitation email to ' . $email);
        }
    }

    public function logs()
    {
        $model = new UserLoginsModel();
        $data['log'] = $model->getuserslogs();
        return view('employee_logs_view', $data);
    }

    public function exportuserstoexcel()
    {
        // Load the model
        $model = new Registerusers_model();

        // Retrieve data from the model
        $data = $model->findAll();

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
        $filename = 'Customers_data.xlsx';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
    }

    public function sendPasswordReset()
    {
        $model = new Registerusers_model();

        $email = $this->request->getPost('reset_email');

        $user = $model->where('email', $email)->first();

        if (!$user) {
            return redirect()->back()->with('msg', 'Email not found!');
        }

        $token = bin2hex(random_bytes(32));
        $model->update($user['user_id'], ['reset_token' => $token]);

        $resetLink = base_url("resetPassword/$token");

        $emailService = \Config\Services::email();
        $emailService->setTo($email);
        $emailService->setSubject('Password Reset');
        $emailService->setMessage("Click the link to reset your password: <a href='$resetLink'>$resetLink</a>");
        $emailService->send();

        return redirect()->back()->with('msg', 'Reset link sent to your email.');
    }

    public function resetPassword($token)
    {
        $model = new Registerusers_model();

        $user = $model->where('reset_token', $token)->first();

        if (!$user) {
            return redirect()->to('/')->with('msg', 'Invalid token.');
        }

        return view('reset_password', ['token' => $token]);
    }

    public function updatePassword($token)
    {
        $model = new Registerusers_model();

        $newPassword = $this->request->getPost('new_password');
        $confirmPassword = $this->request->getPost('confirm_password');

        if ($newPassword !== $confirmPassword) {
            return redirect()->back()->with('msg', 'Passwords do not match!');
        }

        $user = $model->where('reset_token', $token)->first();

        if (!$user) {
            return redirect()->to('/')->with('msg', 'Invalid token.');
        }

        $model->update($user['user_id'], [
            'password' => password_hash($newPassword, PASSWORD_DEFAULT),
            'reset_token' => null
        ]);

        return redirect()->to('/admin')->with('msg', 'Password updated successfully. You can now log in with your new password.');
    }

    public function loyality_points_history($id)
    {
        $model = new loyalitypointsvalues();
        $data['pointshistory'] = $model->getPointsHistory($id);
        $data['userid'] = $id;
        return view('loyalty_points_history_view', $data);
    }

    public function referral_history($id)
    {
        $model = new referralmodel();
        $data['referralHistory'] = $model->getReferralHistory($id);
        $data['userid'] = $id;
        return view('referral_history_view', $data);
    }

    public function updateRefpoints()
    {
        $request = $this->request->getPost();
        $model = new referralpointsconfigmodel();

        $adminUserId = session()->get('user_id');

        $data = [
            'points_for_referrer' => (int) $request['points_for_referrer'],
            'points_for_referred' => (int) $request['points_for_referred'],
            'updated_by' => $adminUserId,
        ];

        if ($model->updateReferralPointsConfig($data)) {
            return redirect()->back()->with('success', 'Referral points updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to update referral points.');
        }
    }

    public function SetLoyaltyPointValue()
    {
        $model = new loyalitypointsvalues();
        $data['loyalty_point'] = $model->GetLoyalityPointData();
        return view('points_form_view', $data);
    }


    public function customer_change_logs($id = null)
    {
        $db = \Config\Database::connect();

        if ($id === null) {
            return view('edit_user_logs_view', ['updates' => []]); // No user ID provided
        }

        // Fetch user details
        $query = $db->table('users')->select('change_log')->where('user_id', $id)->get();
        $row = $query->getRow();

        if ($row) {
            $decodedData = json_decode($row->change_log, true);

            if (!is_array($decodedData)) {
                return view('edit_user_logs_view', ['updates' => []]); // Return empty if decoding fails
            }

            $updates = [];

            foreach ($decodedData as $key => $log) {
                // Extract updates only if they have a timestamp
                if (isset($log['timestamp'])) {
                    $updates[] = [
                        'updated_by' => $log['updated_by'] ?? 'Unknown',
                        'updated_at' => $log['timestamp'],
                        'changes'    => $log['changes'] ?? [],
                    ];
                }
            }

            // Sort updates by `updated_at` (latest first)
            usort($updates, function ($a, $b) {
                return strtotime($b['updated_at']) - strtotime($a['updated_at']);
            });

            return view('edit_user_logs_view', ['updates' => $updates]);
        }

        return view('edit_user_logs_view', ['updates' => []]); // No logs found
    }

    public function employee_change_logs($id = null)
    {
        $db = \Config\Database::connect();

        if ($id === null) {
            return view('edit_employee_logs_view', ['updates' => []]); // No user ID provided
        }

        // Fetch user details
        $query = $db->table('users')->select('change_log')->where('user_id', $id)->get();
        $row = $query->getRow();

        if ($row) {
            $decodedData = json_decode($row->change_log, true);

            if (!is_array($decodedData)) {
                return view('edit_employee_logs_view', ['updates' => []]); // Return empty if decoding fails
            }

            $updates = [];

            foreach ($decodedData as $key => $log) {
                // Extract updates only if they have a timestamp
                if (isset($log['timestamp'])) {
                    $updates[] = [
                        'updated_by' => $log['updated_by'] ?? 'Unknown',
                        'updated_at' => $log['timestamp'],
                        'changes'    => $log['changes'] ?? [],
                    ];
                }
            }

            // Sort updates by `updated_at` (latest first)
            usort($updates, function ($a, $b) {
                return strtotime($b['updated_at']) - strtotime($a['updated_at']);
            });

            return view('edit_employee_logs_view', ['updates' => $updates]);
        }

        return view('edit_employee_logs_view', ['updates' => []]); // No logs found
    }


    public function profile_change_logs($userId)
    {
        $model = new Registerusers_model();
        $changeLogJson = $model->getChangeLog($userId);

        $updates = [];

        if (!empty($changeLogJson)) {
            // Decode JSON into an associative array
            $changeLogArray = json_decode($changeLogJson, true);

            if (is_array($changeLogArray)) {
                // Convert nested change logs into a sequential array
                foreach ($changeLogArray as $key => $log) {
                    if (is_array($log) && isset($log['updated_at'], $log['updated_by'])) {
                        $updates[] = $log;
                    }
                }

                // Sort updates by `updated_at` (latest first)
                usort($updates, function ($a, $b) {
                    return strtotime($b['updated_at']) - strtotime($a['updated_at']);
                });
            }
        }

        return view('profile_change_logs_view', ['updates' => $updates]);
    }
}
