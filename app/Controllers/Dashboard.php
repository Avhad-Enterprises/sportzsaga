<?php

namespace App\Controllers;

use App\Models\blogs_model;
use App\Models\Products_model;
use App\Models\Ordermanagement_model;
use Config\Admin as AdminConfig;
use App\Models\Registerusers_model;
use CodeIgniter\Config\Services;
use App\Models\invitationmodel;
use App\Models\UserLoginsModel;
use Google\Cloud\Storage\StorageClient;

class Dashboard extends BaseController
{
    protected $session;

    public function __construct()
    {
        $config = new AdminConfig();
        $this->session = Services::session($config);
    }

    public function index(): string
    {
        return view('admin_loginview');
    }

    public function adminLoginSession()
    {
        $session = session();
        $userModel = new Registerusers_model();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $user = $userModel->where('email', $email)->first();

        if ($user) {
            if (in_array($user['account_type'], ['employee', 'seller', 'super_admin', 'super_admin_view'])) {
                if (password_verify($password, $user['password'])) {

                    // Initialize Google Cloud Storage
                    $storage = new \Google\Cloud\Storage\StorageClient([
                        'keyFilePath' => WRITEPATH . 'public/mkvgsc.json',
                        'projectId' => 'peak-tide-441609-r1',
                    ]);

                    $bucketName = 'mkv_imagesbackend';
                    $bucket = $storage->bucket($bucketName);

                    // Check if the profile image exists in Google Cloud Storage
                    $profileImage = $user['profile_img'] ?? 'default.png';
                    $profileImagePath = 'profile-pictures/' . $profileImage;

                    $profileImageUrl = 'https://via.placeholder.com/150';
                    if ($bucket->object($profileImagePath)->exists()) {
                        $profileImageUrl = sprintf(
                            'https://storage.googleapis.com/%s/%s',
                            $bucketName,
                            $profileImagePath
                        );
                    }

                    // Initialize the session data array
                    $ses_data = [
                        'user_id' => $user['user_id'],
                        'admin_name' => $user['name'],
                        'admin_email' => $user['email'],
                        'admin_type' => $user['account_type'],
                        'admin_logged_in' => TRUE,
                        'profile_picture' => $profileImage
                    ];

                    // Additional session data for specific account types
                    if ($user['account_type'] == 'seller') {
                        $ses_data['seller_id'] = $user['user_id'];
                    } elseif ($user['account_type'] == 'employee') {
                        // Record login time and user's name for employee
                        $loginModel = new UserLoginsModel();
                        $loginModel->insert([
                            'user_id' => $user['user_id'],
                            'user_name' => $user['name'],
                            'login_time' => date('Y-m-d H:i:s')
                        ]);
                    }

                    // Set session and extend its expiration
                    $session->set($ses_data);
                    session()->markAsTempdata('admin_logged_in', 86400);

                    return redirect()->to('dashboard');
                } else {
                    $session->setFlashdata('msg', 'Wrong Password');
                    return redirect()->to('admin');
                }
            } else {
                return redirect()->to('restricted');
            }
        } else {
            $session->setFlashdata('msg', 'Email not Found');
            return redirect()->to('admin');
        }
    }


    public function restricted()
    {
        return view('restricted');
    }

    public function admindashboard()
    {
        $model = new blogs_model();
        $productsmodel = new Products_model();
        $ordermodel = new Ordermanagement_model();

        // Get the count of public blogs
        $publicBlogCount = $model->countPublicBlogs();

        // Get the list of public blogs
        $publicBlogs = $model->getPublicBlogs();

        // Pass the count and blogs to the view
        $privateBlogs = $model->getprivateBlogs();

        // Get Products and Order Management
        $publicproducts = $productsmodel->getPublicProducts();
        $data['products'] = $productsmodel->getproductsdata();

        // Get the order management
        $ordercounts = $ordermodel->getOrdercounts();

        // Pass the count and blogs to the view
        $data = [
            'blogCount' => $publicBlogCount,
            'posts' => $publicBlogs,
            'privateBlogs' => $privateBlogs,
            'products' => $data['products'],
            'publicproducts' => $publicproducts,
            'ordercounts' => $ordercounts
        ];
        return view('dashboard_view', $data);
    }

    public function adminsignup()
    {
        $token = $this->request->getGet('token');
        if (empty($token)) {
            return redirect()->to('/restricted')->with('error', 'Invalid registration link.');
        }

        $model = new InvitationModel();
        $invitation = $model->where('token', $token)->first();

        if (!$invitation || $invitation['status'] != 'pending' || strtotime($invitation['token_expiry']) < time()) {
            return redirect()->to('/restricted')->with('error', 'Invalid or expired registration link.');
        }

        // Pass the token to the view
        return view('register_view', ['token' => $token]);
    }

    public function adminRegister()
    {
        $createdAt = date('Y-m-d H:i:s');
        $token = $this->request->getPost('token');

        if (empty($token)) {
            return redirect()->to('/restricted')->with('error', 'Invalid registration attempt.');
        }

        $model = new invitationmodel();
        $invitation = $model->where('token', $token)
            ->where('token_expiry >=', date('Y-m-d H:i:s'))
            ->first();

        if (!$invitation) {
            return redirect()->to('/restricted')->with('error', 'Invalid or expired registration link.');
        }

        $email = $this->request->getPost('emailaddress');

        $userModel = new Registerusers_model();
        $existingUser = $userModel->where('email', $email)->first();

        if ($existingUser) {
            return redirect()->back()->with('error', 'Email is already registered. Please use a different email.');
        }

        $password = $this->request->getPost('confirmPassword');
        $encryptedPassword = password_hash($password, PASSWORD_DEFAULT);

        $data = [
            'name' => $this->request->getPost('fullname'),
            'email' => $email,
            'phone_no' => $this->request->getPost('phone'),
            'password' => $encryptedPassword,
            'dob' => $this->request->getPost('dob'),
            'country' => $this->request->getPost('country'),
            'gender' => $this->request->getPost('gender'),
            'state' => $this->request->getPost('state'),
            'city' => $this->request->getPost('city'),
            'account_type' => 'employee',
            'created_at' => $createdAt,
        ];

        $otp = rand(100000, 999999);

        $this->sendOtpEmail($data['email'], $otp);

        session()->set('otp', $otp);
        session()->set('registration_data', $data);

        return redirect()->to('/verify-otp')->with('success', 'OTP sent to your email address.');
    }

    private function sendOtpEmail($recipientEmail, $otp)
    {
        $email = \Config\Services::email();

        $email->setTo($recipientEmail);
        $email->setSubject('Your OTP Code');
        $email->setMessage("Your OTP code is: $otp");

        if (!$email->send()) {
            log_message('error', 'Failed to send OTP email: ' . $email->printDebugger(['headers']));
        }
    }

    public function verifyOtp()
    {
        $enteredOtp = $this->request->getPost('otp');
        $sessionOtp = session()->get('otp');
        $registrationData = session()->get('registration_data');

        if ($enteredOtp == $sessionOtp) {
            $userModel = new Registerusers_model();
            $userModel->insert($registrationData);

            $invitationModel = new InvitationModel();
            $invitationModel->where('email', $registrationData['email'])
                ->set('status', 'accepted')
                ->update();

            session()->remove(['otp', 'registration_data']);

            session()->set('name', $registrationData['name']);
            session()->set('created_at', $registrationData['created_at']);

            return redirect()->to('/admin')->with('success', 'User registered successfully. Please enter your email and password to log in.');
        } else {
            return redirect()->to('/verify-otp')->with('error', 'Invalid OTP. Please try again.');
        }
    }

    public function resendOtp()
    {
        // Get the email from the request
        $email = $this->request->getJSON()->email;

        // Generate new OTP
        $otp = rand(100000, 999999);

        // Send OTP to the user's email
        $this->sendOtpEmail($email, $otp);

        // Update OTP in session
        session()->set('otp', $otp);

        // Return a JSON response
        return $this->response->setJSON(['success' => true]);
    }

    public function verifyOtpView()
    {
        return view('verify_otp_view');
    }

    public function adminlogout()
    {
        $session = session();
        $userId = $session->get('user_id');
        $accountType = $session->get('admin_type');

        if ($userId && $accountType == 'employee') {
            // Record logout time
            $loginModel = new UserLoginsModel();
            $loginModel->where('user_id', $userId)
                ->orderBy('login_time', 'DESC')
                ->set(['logout_time' => date('Y-m-d H:i:s')])
                ->limit(1)
                ->update();
        }

        $session->destroy(); // Destroy all session data
        return redirect()->to('admin')->with('success', 'Logged out successfully.');
    }

    public function profile()
    {
        $userModel = new Registerusers_model();
        $db = \Config\Database::connect();
        $warehouseTable = $db->table('seller_warehouse_location');
        $userId = session('user_id');
        $userName = session('admin_name');
        $seller_id = session('user_id');
        $data['userData'] = $userModel->getuserdetail($userId);
        $data['seller_id'] = $seller_id;
        $data['tasks'] = $userModel->getTasksForUser($userId, $userName);
        // Fetch warehouse locations for the seller
        $data['warehouse_locations'] = $warehouseTable->where('seller_id', $seller_id)->get()->getResultArray();
        //$data['warehouse_locations'] = $warehouseTable->get()->getResultArray();

        return view('profile_view', $data);
    }

    public function addLocation()
    {
        header('Content-Type: application/json');

        if ($this->request->isAJAX()) {
            try {
                $db = \Config\Database::connect();
                $warehouseTable = $db->table('seller_warehouse_location');

                // Validate required fields
                $requiredFields = [
                    'pickup_location',
                    'contact_person_name',
                    'address1',
                    'pincode',
                    'city',
                    'state',
                    'country',
                    'phone',
                    'email',
                    'origin_area'
                ];

                foreach ($requiredFields as $field) {
                    if (empty($this->request->getPost($field))) {
                        return $this->response->setJSON([
                            'success' => false,
                            'message' => ucfirst(str_replace('_', ' ', $field)) . ' is required'
                        ]);
                    }
                }

                // Validate email format
                if (!filter_var($this->request->getPost('email'), FILTER_VALIDATE_EMAIL)) {
                    return $this->response->setJSON([
                        'success' => false,
                        'message' => 'Invalid email format'
                    ]);
                }

                $data = [
                    'pickup_location' => $this->request->getPost('pickup_location'),
                    'seller_id' => session('user_id'),
                    'contact_person_name' => $this->request->getPost('contact_person_name'),
                    'address1' => $this->request->getPost('address1'),
                    'address2' => $this->request->getPost('address2'),
                    'pincode' => $this->request->getPost('pincode'),
                    'city' => $this->request->getPost('city'),
                    'state' => $this->request->getPost('state'),
                    'country' => $this->request->getPost('country'),
                    'phone' => $this->request->getPost('phone'),
                    'phone2' => $this->request->getPost('phone2'),
                    'email' => $this->request->getPost('email'),
                    'OriginArea' => $this->request->getPost('origin_area'),
                ];

                // Remove any empty values
                $data = array_filter($data, function ($value) {
                    return ($value !== null && $value !== '');
                });

                if ($warehouseTable->insert($data)) {
                    return $this->response->setJSON([
                        'success' => true,
                        'message' => 'Location added successfully'
                    ]);
                } else {
                    return $this->response->setJSON([
                        'success' => false,
                        'message' => 'Failed to add location'
                    ]);
                }
            } catch (\Exception $e) {
                log_message('error', 'Add Location Error: ' . $e->getMessage());
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Error adding location: ' . $e->getMessage()
                ]);
            }
        }

        return $this->response->setJSON([
            'success' => false,
            'message' => 'Invalid request method'
        ]);
    }

    public function getLocation($id)
    {
        $db = \Config\Database::connect();
        $warehouseTable = $db->table('seller_warehouse_location');
        $location = $warehouseTable->where('id', $id)->get()->getRowArray();

        if ($location) {
            return $this->response->setJSON($location);
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'Location not found']);
        }
    }

    public function editLocation()
    {
        header('Content-Type: application/json');

        if ($this->request->isAJAX()) {
            try {
                $db = \Config\Database::connect();
                $warehouseTable = $db->table('seller_warehouse_location');
                $id = $this->request->getPost('id');

                // Validate required fields
                if (!$id) {
                    return $this->response->setJSON([
                        'success' => false,
                        'message' => 'Location ID is required'
                    ]);
                }

                // Validate that the location exists
                $existingLocation = $warehouseTable->where('id', $id)->get()->getRowArray();
                if (!$existingLocation) {
                    return $this->response->setJSON([
                        'success' => false,
                        'message' => 'Location not found'
                    ]);
                }

                $data = [
                    'pickup_location' => $this->request->getPost('pickup_location'),
                    'contact_person_name' => $this->request->getPost('contact_person_name'),
                    'address1' => $this->request->getPost('address1'),
                    'address2' => $this->request->getPost('address2'),
                    'pincode' => $this->request->getPost('pincode'),
                    'city' => $this->request->getPost('city'),
                    'state' => $this->request->getPost('state'),
                    'country' => $this->request->getPost('country'),
                    'phone' => $this->request->getPost('phone'),
                    'phone2' => $this->request->getPost('phone2'),
                    'email' => $this->request->getPost('email'),
                    'OriginArea' => $this->request->getPost('origin_area'),
                ];

                // Remove any empty values to prevent overwriting with empty strings
                $data = array_filter($data, function ($value) {
                    return ($value !== null && $value !== '');
                });

                $result = $warehouseTable->where('id', $id)->update($data);

                if ($result) {
                    return $this->response->setJSON([
                        'success' => true,
                        'message' => 'Location updated successfully'
                    ]);
                } else {
                    return $this->response->setJSON([
                        'success' => false,
                        'message' => 'No changes were made to the location'
                    ]);
                }
            } catch (\Exception $e) {
                log_message('error', 'Edit Location Error: ' . $e->getMessage());
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Error updating location: ' . $e->getMessage()
                ]);
            }
        }

        return $this->response->setJSON([
            'success' => false,
            'message' => 'Invalid request method'
        ]);
    }

    public function deleteLocation($id)
    {
        if ($this->request->isAJAX()) {
            $db = \Config\Database::connect();
            $warehouseTable = $db->table('seller_warehouse_location');
            $warehouseTable->where('id', $id)->delete();

            return $this->response->setJSON(['success' => true, 'message' => 'Location deleted successfully']);
        }
    }

    public function updateTaskStatus($taskId, $status)
    {
        $adminModel = new Registerusers_model();
        $adminModel->updateTaskStatus($taskId, $status);

        return redirect()->to('profile');
    }

    public function create_task()
    {
        $userModel = new Registerusers_model();
        $data['employee'] = $userModel->getallempolyee();
        return view('create_task', $data);
    }

    public function getTaskNotifications()
    {
        $taskModel = new Registerusers_model();
        $tasks = $taskModel->getTasksForNotification();
        $data['tasks'] = $tasks;
        return view('header_view', $data);
    }

    public function addtasks()
    {
        $session = session();
        $taskModel = new Registerusers_model();

        $taskName = $this->request->getPost('task-name');
        $taskDescription = $this->request->getPost('task-description');
        $assignedTo = $this->request->getPost('employee-name');
        $dueDate = $this->request->getPost('due-date');
        $url = $this->request->getPost('url');
        $prioritylevel = $this->request->getPost('priority-level');
        $assignedBy = $session->get('admin_name');
        $file = $this->request->getFile('task-file');
        $taskFile = null;

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move('uploads/', $newName);
            $taskFile = $newName;
        }

        // Fetch assigned person's email from the database
        $assignedUser = $taskModel->find($assignedTo);
        $assignedEmail = $assignedUser['email'];

        $data = [
            'task_name' => $taskName,
            'description' => $taskDescription,
            'assigned_to' => $assignedTo,
            'assigned_by' => $assignedBy,
            'due_date' => $dueDate,
            'task_file' => $taskFile,
            'priority_level' => $prioritylevel,
            'url' => $url,
        ];

        $taskModel->insertask($data);

        // Send email to the assigned person
        $this->sendTaskEmail($assignedEmail, $data);

        return redirect()->to('profile');
    }

    private function sendTaskEmail($to, $taskData)
    {
        $email = \Config\Services::email();
        $email->setFrom('info@driphunter.in', 'Driphunter');
        $email->setTo($to);
        $email->setSubject('New Task Assigned: ' . $taskData['task_name']);

        $message = view('task_notification', $taskData);

        $email->setMessage($message);

        if ($email->send()) {
            return true;
        } else {
            return false;
        }
    }

    public function uploadProfilePicture()
    {
        helper(['form', 'url']);

        $session = session();
        $userId = $session->get('user_id');

        try {
            // Check if a file was uploaded
            $file = $this->request->getFile('profile-picture');
            if (!$file || !$file->isValid()) {
                throw new \Exception('No valid file uploaded.');
            }

            // Initialize Google Cloud Storage
            $storage = new StorageClient([
                'keyFilePath' => WRITEPATH . 'public/mkvgsc.json',
                'projectId' => 'peak-tide-441609-r1',
            ]);
            $bucketName = 'mkv_imagesbackend';
            $bucket = $storage->bucket($bucketName);


            // Define a new name for the file
            $newName = $file->getRandomName();
            $filePath = $file->getTempName();
            $storagePath = 'profile-pictures/' . $newName;

            // Upload the file to Google Cloud Storage
            $bucket->upload(
                fopen($filePath, 'r'),
                [
                    'name' => $storagePath,
                    'predefinedAcl' => 'publicRead', // Make the file publicly accessible
                ]
            );

            // Generate a public URL for the uploaded file
            $publicUrl = sprintf('https://storage.googleapis.com/%s/%s', $bucketName, $storagePath);

            // Update the user's profile picture path in the database
            $userModel = new Registerusers_model();
            $userModel->update($userId, ['profile_img' => $publicUrl]);

            // Redirect to the profile page with a success message
            return redirect()->to('profile')->with('success', 'Profile picture updated successfully.');
        } catch (\Exception $e) {
            // Log the error for debugging purposes
            log_message('error', 'Error uploading profile picture: ' . $e->getMessage());

            // Redirect with an error message
            return redirect()->to('profile')->with('error', 'Failed to upload the profile picture. Please try again.');
        }
    }


    public function seller_register()
    {
        return view('seller_register_view');
    }

    public function becomeaseller()
    {
        return view('becomeaseller_view');
    }
}
