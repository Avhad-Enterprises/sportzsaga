<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class SuperAdminOrEmployeeFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();

        // Check if user is super_admin or employee
        if ($session->get('admin_type') !== 'super_admin' && $session->get('admin_type') !== 'employee') {
            // Redirect to login page or show access denied page
            return redirect()->to('restricted')->with('error', 'Access denied');
        }

        // Check for session expiration
        $userId = $session->get('user_id');
        $accountType = $session->get('admin_type');

        if ($userId && $accountType) {
            $lastActivity = $session->get('last_activity');

            if ($lastActivity) {
                $currentTime = time();
                $elapsedTime = $currentTime - $lastActivity;

                // Check if 5 minutes (300 seconds) have passed
                if ($elapsedTime > 300) {
                    // Auto logout after 5 minutes of inactivity
                    $session->destroy();
                    return redirect()->to('admin')->with('error', 'Session expired. Please log in again.');
                }

                // Optionally, check if 5 minutes passed and trigger auto-reload
                if ($elapsedTime > 240) { // 4 minutes, just before the 5 minutes
                    $session->set('auto_reload', true);
                }
            }

            // Update last activity time
            $session->set('last_activity', time());
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        $session = session();
        $autoReload = $session->get('auto_reload');

        if ($autoReload) {
            // Clear the auto_reload session variable after processing
            $session->remove('auto_reload');

            // Trigger reload with a message
            echo "<script>
                alert('Your session has expired. Please log in again.');
                location.reload(); // Reload the page
            </script>";
            exit;
        }
    }
}
