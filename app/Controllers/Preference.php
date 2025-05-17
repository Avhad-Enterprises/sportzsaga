<?php

namespace App\Controllers;

use App\Models\footermodeldes;
use App\Models\SiteMetaModel;
use App\Models\SiteLogoModel;
use App\Models\RobotsTxtModel;
use App\Models\FooterPagesModel;
use App\Models\GanalyticsModel;
use App\Models\WarehouseModel;

class Preference extends BaseController
{
    public function index()
    {
        $siteMetaModel = new SiteMetaModel();
        $siteLogoModel = new SiteLogoModel();
        $robotsTxtModel = new RobotsTxtModel();
        $ganalyticsModel = new GanalyticsModel();
        $warehouseModel = new WarehouseModel();
        $data['robots_content'] = $robotsTxtModel->first();
        $data['logos'] = $siteLogoModel->first();
        $data['meta'] = $siteMetaModel->GetMetaFeilds();
        $analytics = $ganalyticsModel->first();
        $data['analytics'] = $analytics ? [$analytics] : [];
        $data['warehouses'] = $warehouseModel->findAll();
        return view('preferences_view', $data);
    }

    public function updateGtag($id)
    {
        $ganalyticsModel = new GanalyticsModel();
        $input = $this->request->getJSON(true);

        $session = session();

        $updatedBy = $session->get('admin_name') . '(' . $session->get('user_id') . ')';

        if (isset($input['google_analytics_id']) && !empty($input['google_analytics_id'])) {
            $ganalyticsModel->update($id, [
                'google_analytics_id' => $input['google_analytics_id'],
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => $updatedBy,
            ]);

            return $this->response->setJSON(['success' => true, 'message' => 'Google Analytics ID updated successfully.']);
        }

        return $this->response->setJSON(['success' => false, 'message' => 'Invalid input data.']);
    }
}
