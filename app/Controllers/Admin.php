<?php namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\Database\Config;

class Admin extends BaseController
{
    public function addFieldAjax()
    {
        $title = $this->request->getPost('title');
        if ($title) {
            $field_name = strtolower(str_replace(' ', '_', $title)); // Format field name
            $db = Config::connect();
            $sql = "ALTER TABLE products ADD $field_name VARCHAR(255) NULL";

            try {
                $db->query($sql);
                return $this->response->setJSON([
                    'success' => true,
                    'field_label' => $title,
                    'field_name' => $field_name
                ]);
            } catch (\Exception $e) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => "Error adding column '$field_name': " . $e->getMessage()
                ]);
            }
        } else {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Invalid field title'
            ]);
        }
    }
}
