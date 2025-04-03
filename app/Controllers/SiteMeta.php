<?php

namespace App\Controllers;

use App\Models\SiteMetaModel;

class SiteMeta extends BaseController
{
    protected $siteMetaModel;

    public function __construct()
    {
        $this->siteMetaModel = new SiteMetaModel();
        helper(['form', 'url']);
    }

    public function edit($id)
    {
        $meta = $this->siteMetaModel->find($id);
        if (!$meta) {
            return redirect()->back()->with('error', 'Meta information not found.');
        }
        $data['meta'] = $meta;
        return view('site_edit_form', $data);
    }

    public function update($id)
    {
        $session = session();
        $meta = $this->siteMetaModel->find($id);
        if (!$meta) {
            return redirect()->to('online_store/preferences')->with('error', 'Meta record not found.');
        }

        $updatedBy = $session->get('admin_name') . '(' . $session->get('user_id') . ')';

        $this->siteMetaModel->update($id, [
            'meta_title' => $this->request->getPost('meta_title'),
            'meta_description' => $this->request->getPost('meta_description'),
            'updated_by' => $updatedBy,
        ]);

        return redirect()->to('online_store/preferences')->with('success', 'Meta Titles updated successfully.');
    }
}
