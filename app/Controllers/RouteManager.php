<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class RouteManager extends BaseController
{
    public function index()
    {
        // Define the path to the Routes.php file
        $routesFilePath = APPPATH . 'Config/Routes.php';

        // Check if the file exists
        if (!file_exists($routesFilePath)) {
            return view('route_manager', ['error' => 'Routes file not found.']);
        }

        // Read the content of the file
        $routesContent = file_get_contents($routesFilePath);

        // Pass the content to the view
        return view('route_manager', ['routesContent' => $routesContent]);
    }

    public function update()
    {
        // Define the path to the Routes.php file
        $routesFilePath = APPPATH . 'Config/Routes.php';

        // Get the updated content from the form submission
        $updatedContent = $this->request->getPost('routesContent');

        // Write the updated content back to the file
        if (file_put_contents($routesFilePath, $updatedContent)) {
            return redirect()->to('route-manager')->with('success', 'Routes updated successfully.');
        } else {
            return redirect()->to('route-manager')->with('error', 'Failed to update routes.');
        }
    }
}
