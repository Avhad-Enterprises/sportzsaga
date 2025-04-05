<?php

namespace App\Controllers;

use App\Models\SiteLogoModel;
use Google\Cloud\Storage\StorageClient;

class SiteLogo extends BaseController
{
    protected $siteLogoModel;

    public function __construct()
    {
        $this->siteLogoModel = new SiteLogoModel();
        helper(['form', 'url']);
    }

    public function edit()
    {
        $data['logos'] = $this->siteLogoModel->first();
        return view('site_logo_edit', $data);
    }

    public function update()
    {
        $session = session();
        $data = [];

        $uploadedFiles = [
            'website_logo' => $this->request->getFile('website_logo'),
            'navbar_logo' => $this->request->getFile('navbar_logo'),
            'navbar_logo_mobile' => $this->request->getFile('navbar_logo_mobile'),
            'footer_logo' => $this->request->getFile('footer_logo'),
            'favicon' => $this->request->getFile('favicon'),
        ];

        $storage = new StorageClient([
            'keyFilePath' => WRITEPATH . 'public/mkvgsc.json',
            'projectId' => 'peak-tide-441609-r1',
        ]);

        $bucketName = 'mkv_imagesbackend';
        $bucket = $storage->bucket($bucketName);

        foreach ($uploadedFiles as $key => $file) {
            if ($file && $file->isValid()) {
                $newFileName = uniqid() . '_' . $file->getName();

                $object = $bucket->upload(
                    fopen($file->getTempName(), 'r'),
                    [
                        'name' => $key . '/' . $newFileName,
                        'predefinedAcl' => 'publicRead',
                    ]
                );

                $fileUrl = sprintf('https://storage.googleapis.com/%s/%s', $bucket->name(), $key . '/' . $newFileName);
                $data[$key] = $fileUrl;
            }
        }

        $existingLogos = $this->siteLogoModel->first();
        $data['updated_by'] = $session->get('admin_name') . '(' . $session->get('user_id') . ')';

        if ($existingLogos) {
            $this->siteLogoModel->update($existingLogos['id'], $data);
        } else {
            $this->siteLogoModel->insert($data);
        }

        return redirect()->to('online_store/preferences')->with('success', 'Logo and Favicon updated successfully.');
    }
}
