<?php

namespace App\Controllers;

use App\Models\brands_model;

class Brands extends BaseController
{
    public function index(): string
    {
        $model = new brands_model();
        $data['brands'] = $model->getBrands();
        return view('brand_view', $data);
    }

    public function publishbrand()
    {
        $model = new brands_model();

        $image = $this->request->getFile('logo');

        if ($image->isValid() && !$image->hasMoved()) {
            $logoename = $image->getRandomName();
            $image->move('uploads/', $logoename);
        }

        $data = [
            'brand_name' => $this->request->getPost('brand-name'),
            'vendor' => $this->request->getPost('vendor'),
            'city' => $this->request->getPost('city'),
            'country' => $this->request->getPost('country'),
            'logo' => $logoename
        ];

        $model->publishnewbrand($data);

        return redirect()->to('brands');
    }

    public function addbrand()
    {
        return view('add_brand_view');
    }

    public function editbrand($brand_id)
    {
        $model = new brands_model();
        $data['brands'] = $model->getbrandbyid($brand_id);
        return view('edit_brand_view', $data);
    }

    public function deletebrand($brand_id)
    {
        $model = new brands_model();
        $model->deletebrand($brand_id);
        return redirect()->to('brands')->with('success', 'Brand deleted successfully.');
        ;
    }

    public function updatetedbrand($brand_id)
    {
        $model = new brands_model();

        $updateimage = $this->request->getFile('logo');
        $updatelogoename = null;

        if ($updateimage->isValid() && !$updateimage->hasMoved()) {
            // Process new image upload
            $updatelogoename = $updateimage->getClientName();
            $updateimage->move('uploads/', $updatelogoename);
        } else {
            // No new image uploaded, retain the existing image
            $existingBrand = $model->find($brand_id);
            if ($existingBrand) {
                $updatelogoename = $existingBrand['logo'];
            }
        }

        $data = [
            'brand_name' => $this->request->getPost('brand-name'),
            'vendor' => $this->request->getPost('vendor'),
            'city' => $this->request->getPost('city'),
            'country' => $this->request->getPost('country'),
            'logo' => $updatelogoename
        ];

        $model->updatetedbrand($brand_id, $data);

        return redirect()->to('brands')->with('success', 'Brand updated successfully.');
        ;
    }
}
