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

        if ($session->get('admin_type') !== 'super_admin' && $session->get('admin_type') !== 'employee') {
            return redirect()->to('restricted')->with('error', 'Access denied');
        }

        $userId = $session->get('user_id');
        $accountType = $session->get('admin_type');

        if ($userId && $accountType) {
            $lastActivity = $session->get('last_activity');

            if ($lastActivity) {
                $currentTime = time();
                $elapsedTime = $currentTime - $lastActivity;

                if ($elapsedTime > 86400) {
                    $session->destroy();
                    return redirect()->to('admin')->with('error', 'Session expired. Please log in again.');
                }

                if ($elapsedTime > 86400) {
                    $session->set('auto_reload', true);
                }
            }

            $session->set('last_activity', time());
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        $session = session();
        $autoReload = $session->get('auto_reload');

        if ($autoReload) {
            $session->remove('auto_reload');

            echo "<script>
                alert('Your session has expired. Please log in again.');
                location.reload(); // Reload the page
            </script>";
            exit;
        }
    }
}
