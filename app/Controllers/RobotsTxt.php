<?php

namespace App\Controllers;

use App\Models\RobotsTxtModel;
use CodeIgniter\Controller;
use App\Models\footermodeldes;

class RobotsTxt extends Controller
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

        file_put_contents(WRITEPATH . 'robots.txt', $newContent);

        return redirect()->to('online_store/preferences')->with('success', 'robots.txt file updated successfully.');
    }

    public function update_footer_description()
    {
        $footerModel = new FooterModelDes();
        $session = session();

        $footerContent = $this->request->getPost('footer_content');

        $updateData = [
            'content' => $footerContent,
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => $session->get('admin_name') . '(' . $session->get('user_id') . ')',
        ];

        if ($footerModel->updateFooterContent($updateData)) {
            return redirect()->back()->with('success', 'Footer description updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to update footer description.');
        }
    }
}
