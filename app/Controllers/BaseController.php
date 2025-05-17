<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

abstract class BaseController extends Controller
{
    protected $session;

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Call parent constructor
        parent::initController($request, $response, $logger);

        // Initialize session
        $this->session = session();

        // Call the login check method
        $this->checkLogin();
    }

    /**
     * Check if the user is logged in and if the session has expired.
     * Redirect to the login page if not logged in or session expired.
     */
    public function checkLogin()
    {
        // Set the session timeout duration in seconds (e.g., 2 hours)
        $sessionTimeout = 86400; // 2 hours

        // Check if the user is logged in
        if (!$this->session->get('user_id') && !$this->session->get('admin_logged_in')) {
            // If not logged in, redirect to login page
            return redirect()->to('admin'); // Replace with your actual login route
        }

        // Check if the session has expired
        $lastActivity = $this->session->get('last_activity_time');
        if ($lastActivity) {
            $currentTime = time();
            if (($currentTime - $lastActivity) > $sessionTimeout) {
                // If the session has expired, destroy the session and redirect to login
                $this->session->destroy();
                return redirect()->to('admin'); // Redirect to login page
            }
        }

        // Update the last activity time to track the session
        $this->session->set('last_activity_time', time());
    }
}
