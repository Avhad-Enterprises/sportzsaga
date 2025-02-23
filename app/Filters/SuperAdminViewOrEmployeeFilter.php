<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class SuperAdminViewOrEmployeeFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();

        // Check if the user is either 'super_admin_view' or 'employee'
        if ($session->get('admin_type') !== 'super_admin_view' && $session->get('admin_type') !== 'employee') {
            // Redirect to the restricted page with an error message if access is denied
            return redirect()->to('restricted')->with('error', 'Access denied');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do nothing
    }
}
