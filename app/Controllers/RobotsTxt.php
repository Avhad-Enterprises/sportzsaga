<?php

namespace App\Controllers;

use App\Models\RobotsTxtModel;
use CodeIgniter\Controller;
use App\Models\footermodeldes;

class RobotsTxt extends BaseController
{
    protected $robotsTxtModel;

    public function __construct()
    {
        $this->robotsTxtModel = new RobotsTxtModel();
        helper(['form', 'url']);
    }

    public function update()
    {
        $session = session();
        $userId = $session->get('admin_name') . '(' . $session->get('user_id') . ')';

        $newContent = $this->request->getPost('robots_content');

        $robots = $this->robotsTxtModel->first();

        if ($robots) {

            $this->robotsTxtModel->update($robots['id'], [
                'content' => $newContent,
                'updated_by' => $userId
            ]);
        } else {

            $this->robotsTxtModel->insert([
                'content' => $newContent,
                'updated_by' => $userId
            ]);
        }

        return redirect()->to('online_store/preferences')->with('success', 'robots.txt file updated successfully.');
    }
}
