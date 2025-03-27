<?php

namespace App\Models;

use CodeIgniter\Model;

class Registerusers_model extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'user_id';
    protected $allowedFields = [
        'user_id',
        'name',
        'profile_img',
        'employee_role',
        'gender',
        'pincode',
        'country',
        'dob',
        'state',
        'city',
        'location',
        'username',
        'email',
        'sub_name',
        'subscribe_email',
        'password',
        'phone_no',
        'amount_spent',
        'marketing',
        'total_orders',
        'last_order_placed',
        'timeline',
        'tags',
        'notes',
        'account_type',
        'account_status',
        'registration_date',
        'last_login',
        'address_information',
        'order_history',
        'lifetime_value',
        'average_order_value',
        'total_spend',
        'customer_segment',
        'loyalty_program_status',
        'reward_points',
        'credit_balance',
        'marketing_preferences',
        'communication_preferences',
        'wish_list_items',
        'cart_abandonment_record',
        'return_history',
        'feedback_and_ratings',
        'dispute_records',
        'support_tickets',
        'custom_attributes',
        'subscription_status',
        'gdpr_compliance_status',
        'payment_methods',
        'tax_exemptions',
        'browsing_history',
        'customer_notes',
        'customer_groups',
        'risk_profile',
        'created_at',
        'updated_at',
        'your_last_login',
        'last_logout',
        'otp',
        'otp_expiration',
        'seller_application_status',
        'seller_gst_number',
        'reset_token',
        'reset_token_expiry',
        'updated_by',
        'change_log',
        'is_deleted',
        'deleted_by',
        'deleted_at',
        'added_by',
        'agent_status',
        'address_information'
    ];
    protected $useTimestamps = true;

    public function getusers()
    {
        return $this->where('account_type', 'customer')->findAll();
    }

    public function insertUsersExcelData($data)
    {
        return $this->db->table($this->table)->insertBatch($data);
    }

    public function insertuserdata($data)
    {
        return $this->insert($data);
    }

    public function getRegisteredUserData($userId)
    {
        return $this->where('user_id', $userId)->first();
    }

    public function createGuestCustomer($data)
    {
        $this->insert($data);
        return $this->insertID();
    }

    public function insertuser($data)
    {
        return $this->insert($data);
    }

    public function getsubscribe($data)
    {
        return $this->db->table('subscribed_user')->insert($data);
    }

    public function getallusers()
    {
        return $this->findAll();
    }

    public function deleteusermodel($id)
    {
        return $this->where('user_id', $id)->delete();
    }

    public function editusermodel($userId)
    {
        return $this->where('user_id', $userId)->findAll();
    }

    public function getuserdetails($id)
    {
        return $this->where('user_id', $id)->findAll();
    }

    public function getuserdetail($userId)
    {
        return $this->where('user_id', $userId)->findAll();
    }

    public function updateusermodel($userId, $data)
    {
        // Update the user data
        return $this->db->table('users')->where('user_id', $userId)->update($data);
    }

    public function updateUserData($userId, $data)
    {
        return $this->update($userId, $data);
    }

    public function updateUserAddress($userId, $data)
    {
        return $this->db->table('users')->where('user_id', $userId)->update($data);
    }

    public function getUserData($id)
    {
        return $this->where('user_id', $id)->findAll();
    }

    public function getinvites()
    {
        $invite = $this->db->table('invitations')->get()->getResultArray();
        return $invite;
    }

    public function getemployee()
    {
        return $this->where('account_type', 'employee')->findAll();
    }

    public function getallempolyee()
    {
        return $this->where('account_type', 'employee')->findAll();
    }

    public function editempolyee($id)
    {
        return $this->where('user_id', $id)->findAll();
    }

    public function updateempolyee($id, $data)
    {
        return $this->db->table('users')->where('user_id', $id)->update($data);
    }

    public function getsellers()
    {
        return $this->where('account_type', 'seller')->where('seller_application_status', 'approved')->findAll();
    }

    public function editseller($id)
    {
        return $this->where('user_id', $id)->findAll();
    }

    public function updateseller($id, $data)
    {
        return $this->db->table('users')->where('user_id', $id)->update($data);
    }

    public function insertask($data)
    {
        return $this->db->table('tasks')->insert($data);
    }

    public function gettasksdata($id)
    {
        $tasks = $this->db->table('tasks')->where('assigned_to', $id)->get()->getResultArray();
        return $tasks;
    }

    public function getTasksForUser($userId, $assignedByName)
    {
        return $this->db->table('tasks')
            ->select('tasks.*, users.name as assigned_to_name')
            ->join('users', 'tasks.assigned_to = users.user_id')
            ->where('tasks.assigned_by', $assignedByName)
            ->orWhere('tasks.assigned_to', $userId)
            ->get()
            ->getResultArray();
    }

    public function showusers()
    {
        return $this->select('name, email, user_id')->where('account_type', 'customer')->findAll();
    }

    public function updateTaskStatus($taskId, $status)
    {
        $this->db->table('tasks')
            ->where('task_id', $taskId)
            ->update(['status' => $status]);
    }

    public function getTasksForNotification()
    {
        return $this->db->table('tasks')
            ->select('task_id, assigned_by, task_name, description')
            ->where('status', 'pending')
            ->get()
            ->getResultArray();
    }

    public function sellerdashboard($id)
    {
        return $this->where('user_id', $id)->findAll();
    }

    public function getSelleraplications()
    {
        $sellers = $this->db->table('users')
            ->where('account_type', 'seller')
            ->where('seller_application_status', 'pending')
            ->get()
            ->getResultArray();
        return $sellers;
    }

    public function getSellerById($id)
    {
        $editseller = $this->db->table('users')->where('user_id', $id)->get()->getResultArray();
        return $editseller;
    }

    public function AddSellerData($data)
    {
        return $this->db->table('users')->insert($data);
    }

    public function generateResetToken($email)
    {
        $token = bin2hex(random_bytes(50)); // Generate a random reset token
        $expiry = date('Y-m-d H:i:s', strtotime('+1 hour')); // Set token expiry time (1 hour from now)

        // Store the token and expiry in the database
        return $this->db->table('users')->set([
            'reset_token' => $token,
            'reset_token_expiry' => $expiry
        ])->where('email', $email)->update();
    }

    // Add this method to verify the reset token
    public function verifyResetToken($token)
    {
        return $this->where('reset_token', $token)
            ->where('reset_token_expiry >', date('Y-m-d H:i:s')) // Check if token is still valid
            ->first();
    }

    // Add this method to update the password
    public function updatePassword($userId, $newPassword)
    {
        // Hash the new password
        $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);

        // Update password and clear reset token fields
        return $this->update($userId, [
            'password' => $hashedPassword,
            'reset_token' => null,  // Clear the reset token
            'reset_token_expiry' => null  // Clear the token expiry
        ]);
    }

    // Add this method to your Registerusers_model
    public function findOrCreateCustomer($data)
    {
        // Try to find customer by phone or email
        $existingCustomer = $this->where('phone_no', $data['phone_no'])
            ->orWhere('email', $data['email'])
            ->first();

        if ($existingCustomer) {
            return $existingCustomer['user_id'];
        }

        // Create new customer if not found
        $customerData = [
            'name' => $data['name'],
            'phone_no' => $data['phone_no'],
            'email' => $data['email'],
            'pincode' => $data['pincode'],
            'city' => $data['city'],
            'state' => $data['state'],
            'password' => password_hash('Sportzsaaga@12345', PASSWORD_DEFAULT),
            'address_information' => $data['address_information'],
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $this->insert($customerData);
        return $this->getInsertID();
    }

    public function getUserById($userId)
    {
        return $this->db->table('users') // Replace 'users' with your table name
            ->select('name')            // Select only the required fields
            ->where('user_id', $userId)      // Assuming 'id' is the primary key
            ->get()
            ->getRowArray();
    }



    public function getChangeLogs()
    {
        $db = \Config\Database::connect();
        $query = $db->table('users')->select('change_log')->get();
        $row = $query->getRow();

        if ($row) {
            $decodedData = json_decode($row->change_log, true);

            if (!is_array($decodedData)) {
                return []; // Return empty array if decoding fails
            }

            $updates = [];

            // Extract only the indexed updates (0, 1, 2, ...)
            foreach ($decodedData as $key => $log) {
                if (is_numeric($key) && isset($log['updated_at'])) {
                    $updates[] = $log;
                }
            }

            return $updates;
        }
        return [];
    }


    public function getEmployeeChangeLogs()
    {
        $db = \Config\Database::connect();
        $query = $db->table('users')->select('change_log')->get();
        $row = $query->getRow();

        if ($row) {
            $decodedData = json_decode($row->change_log, true);

            if (!is_array($decodedData)) {
                return []; // Return empty array if decoding fails
            }

            $updates = [];

            // Extract only the indexed updates (0, 1, 2, ...)
            foreach ($decodedData as $key => $log) {
                if (is_numeric($key) && isset($log['updated_at'])) {
                    $updates[] = $log;
                }
            }

            return $updates;
        }
        return [];
    }


    public function getChangeLog($userId)
    {
        return $this->select('change_log')->where('user_id', $userId)->get()->getRowArray()['change_log'] ?? null;
    }
}
