<?php

namespace App\Controllers;

use App\Models\Footer_model;

class Footercontrol extends BaseController
{
    public function footer()
    {
        $footer = new Footer_model();
        $data['footer'] = $footer->getfooterdata();
        return view('footer_section', $data);
    }

    public function editfooterdata($id)
    {
        $footer = new Footer_model();
        $data['footer'] = $footer->geteditfooterdata($id);
        return view('edit_footer', $data);
    }

    public function updatefooter($id)
    {
        $model = new Footer_model();

        $footertitle = $this->request->getPost('footer-title');
        $footerdescription = $this->request->getPost('footer-main-content');
        $newfooterimg = $this->request->getFile('footerimage');

        if ($newfooterimg->isValid() && !$newfooterimg->hasMoved()) {
            $newfooterimage = $newfooterimg->getClientName();
            $newfooterimg->move('uploads/', $newfooterimage);
        }

        $data = [
            'title' => $footertitle,
            'description' => $footerdescription,
            'image' => $newfooterimage
        ];

        //print_r($data); exit();

        $model->updatefooterdata($id, $data);

        return redirect()->to('/footer');
    }
}
