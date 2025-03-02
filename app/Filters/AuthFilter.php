<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();
        $userId = $session->get('user_id');
        $accountType = $session->get('admin_type');

        if ($userId && $accountType) {
            $lastActivity = $session->get('last_activity');

            if ($lastActivity) {
                $currentTime = time();
                $elapsedTime = $currentTime - $lastActivity;

                // Check if 6 hour has passed (21600 Seconds)
                if ($elapsedTime > 21600) {
                    // Auto logout
                    $session->destroy();
                    return redirect()->to('admin')->with('error', 'Session expired. Please log in again.');
                }
            }

            // Update last activity time
            $session->set('last_activity', time());
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // No post-processing needed
    }
}
