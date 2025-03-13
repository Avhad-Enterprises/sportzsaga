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
    
            // Fetch existing record
            $existingData = $model->find($id);
    
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
                // If no new image, retain the existing one
                $imagePath = $existingData ? $existingData['email_pop_up_image'] : '';
            }
    
            // Prepare new data
            $data = [
                'email_pop_up_image' => $imagePath,
                'email_pop_up_mail_title' => $request->getPost('email_pop_up_mail_title'),
                'email_pop_up_mail_text' => $request->getPost('email_pop_up_mail_text'),
                'email_pop_up_mail_linktext' => $request->getPost('email_pop_up_mail_linktext'),
                'email_pop_up_description' => $request->getPost('email_pop_up_description'),
            ];
    
            if ($existingData) {
                // Prepare change log
                $oldData = [
                    'email_pop_up_image' => $existingData['email_pop_up_image'],
                    'email_pop_up_mail_title' => $existingData['email_pop_up_mail_title'],
                    'email_pop_up_mail_text' => $existingData['email_pop_up_mail_text'],
                    'email_pop_up_mail_linktext' => $existingData['email_pop_up_mail_linktext'],
                    'email_pop_up_description' => $existingData['email_pop_up_description'],
                ];
    
                // Fetch and decode existing change log
                $existingChangeLog = !empty($existingData['change_log']) ? json_decode($existingData['change_log'], true) : [];
                if (!is_array($existingChangeLog)) {
                    $existingChangeLog = [];
                }
    
                // Append new change entry
                $newChange = [
                    'old' => $oldData,
                    'new' => $data,
                    'timestamp' => date('Y-m-d H:i:s'),
                ];
    
                $existingChangeLog[] = $newChange;
                $data['change_log'] = json_encode($existingChangeLog);
    
                // Update existing record
                $updateStatus = $model->update($id, $data);
            } else {
                // Insert new record with ID = 1
                $data['id'] = $id;
                $data['change_log'] = json_encode([
                    [
                        'old' => null,
                        'new' => $data,
                        'timestamp' => date('Y-m-d H:i:s'),
                    ]
                ]);
    
                $updateStatus = $model->insert($data);
            }
    
            // Prepare JSON response
            if ($updateStatus !== false) {
                return $this->response->setJSON(['status' => 'success', 'message' => 'Data saved successfully!']);
            } else {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to save data.']);
            }
        }
    
        return $this->response->setJSON(['status' => 'error', 'message' => 'Invalid request.']);
    }
    
}
