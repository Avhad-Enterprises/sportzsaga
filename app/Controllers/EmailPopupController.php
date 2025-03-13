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
            // Retrieve user ID from session
            $session = session();
            $userId = $session->get('user_id');

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

            // Track only changed fields
            $changedFields = [];
            if ($existingData) {
                foreach ($data as $key => $newValue) {
                    $oldValue = $existingData[$key] ?? null;
                    if ($newValue !== $oldValue) {
                        $changedFields[$key] = [
                            'old' => $oldValue,
                            'new' => $newValue,
                        ];
                    }
                }

                if (!empty($changedFields)) {
                    // Fetch and decode existing change log
                    $existingChangeLog = !empty($existingData['change_log']) ? json_decode($existingData['change_log'], true) : [];
                    if (!is_array($existingChangeLog)) {
                        $existingChangeLog = [];
                    }

                    // Append only changed fields to change log
                    $newChange = [
                        'changes' => $changedFields,
                        'updated_by' => $userId,
                        'timestamp' => date('Y-m-d H:i:s'),
                    ];
                    $existingChangeLog[] = $newChange;

                    // Store updated change log
                    $data['change_log'] = json_encode($existingChangeLog);
                } else {
                    return $this->response->setJSON(['status' => 'info', 'message' => 'No changes detected.']);
                }

                // Update existing record
                $updateStatus = $model->update($id, $data);
            } else {
                // Insert new record with ID = 1
                $data['id'] = $id;
                $data['change_log'] = json_encode([
                    [
                        'changes' => $data,
                        'updated_by' => $userId,
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
