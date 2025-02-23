<?php

namespace App\Controllers;

use App\Models\EmailPopupModel;
use CodeIgniter\RESTful\ResourceController;
use Google\Cloud\Storage\StorageClient;

class EmailPopupController extends ResourceController
{
    public function save()
    {
        $request = service('request');
        $model = new EmailPopupModel();
        $id = 1; // Always update ID 1


        if ($request->isAJAX()) {
            // Initialize Google Cloud Storage
            $storage = new StorageClient([
                'keyFilePath' => WRITEPATH . 'public/mkvgsc.json',
                'projectId' => 'peak-tide-441609-r1',
            ]);


            $bucketName = 'sportzsaga_imgs';
            $bucket = $storage->bucket($bucketName);


            // Check if a new image is uploaded
            $imageFile = $request->getFile('email_pop_up_image');
            if ($imageFile && $imageFile->isValid() && !$imageFile->hasMoved()) {
                $imageName = 'email_popup/' . uniqid() . '_' . $imageFile->getClientName();
                $object = $bucket->upload(
                    fopen($imageFile->getTempName(), 'r'),
                    [
                        'name' => $imageName,
                        'predefinedAcl' => 'publicRead',
                    ]
                );


                $imagePath = sprintf('https://storage.googleapis.com/%s/%s', $bucket->name(), $imageName);
            } else {
                // If no new image, fetch the existing image from the database
                $existingData = $model->find($id);
                $imagePath = $existingData ? $existingData['email_pop_up_image'] : '';
            }


            // Prepare data for update
            $data = [
                'id' => $id,
                'email_pop_up_image' => $imagePath,
                'email_pop_up_mail_title' => $request->getPost('email_pop_up_mail_title'),
                'email_pop_up_mail_text' => $request->getPost('email_pop_up_mail_text'),
                'email_pop_up_mail_linktext' => $request->getPost('email_pop_up_mail_linktext'),
                'email_pop_up_description' => $request->getPost('email_pop_up_description'),
            ];


            // Save data to the database
            if ($model->save($data)) {
                return $this->response->setJSON(['status' => 'success', 'message' => 'Data saved successfully!']);
            } else {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to save data.']);
            }
        }


        return $this->response->setJSON(['status' => 'error', 'message' => 'Invalid request.']);
    }
}
