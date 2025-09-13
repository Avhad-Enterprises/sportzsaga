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
        $sessionTimeout = 86400;

        if (!$this->session->get('user_id') && !$this->session->get('admin_logged_in')) {
            return redirect()->to('admin');
        }

        $lastActivity = $this->session->get('last_activity_time');
        if ($lastActivity) {
            $currentTime = time();
            if (($currentTime - $lastActivity) > $sessionTimeout) {
                $this->session->destroy();
                return redirect()->to('admin');
            }
        }

        $this->session->set('last_activity_time', time());
    }
}
