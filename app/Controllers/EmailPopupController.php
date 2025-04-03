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
            // Retrieve user details from session
            $session = session();
            $userId = strval($session->get('user_id'));
            $userName = $session->get('admin_name') ?? $session->get('user_name');
            $updatedBy = !empty($userName) ? "$userName ($userId)" : "User ID ($userId)";

            // Initialize Google Cloud Storage
            $storage = new StorageClient([
                'keyFilePath' => WRITEPATH . 'public/mkvgsc.json',
                'projectId' => 'peak-tide-441609-r1',
            ]);
            $bucket = $storage->bucket('sportzsaga_imgs');

            // Fetch existing record
            $existingData = $model->find($id);

            // Handle Image Upload (Google Cloud Storage)
            $imageFile = $request->getFile('email_pop_up_image');
            if ($imageFile && $imageFile->isValid() && !$imageFile->hasMoved()) {
                try {
                    $imageName = 'email_popup/' . uniqid() . '_' . $imageFile->getClientName();
                    $bucket->upload(fopen($imageFile->getTempName(), 'r'), [
                        'name' => $imageName,
                        'predefinedAcl' => 'publicRead',
                    ]);

                    $imagePath = sprintf('https://storage.googleapis.com/%s/%s', $bucket->name(), $imageName);
                    log_message('info', 'Image uploaded successfully: ' . $imagePath);
                } catch (\Exception $e) {
                    log_message('error', 'Error uploading image: ' . $e->getMessage());
                    return $this->response->setJSON(['status' => 'error', 'message' => 'Image upload failed.']);
                }
            } else {
                $imagePath = $existingData ? $existingData['email_pop_up_image'] : '';
            }

            // Prepare new data
            $data = [
                'email_pop_up_image' => $imagePath,
                'email_pop_up_mail_title' => trim($request->getPost('email_pop_up_mail_title')),
                'email_pop_up_mail_text' => trim($request->getPost('email_pop_up_mail_text')),
                'email_pop_up_mail_linktext' => trim($request->getPost('email_pop_up_mail_linktext')),
                'email_pop_up_description' => trim($request->getPost('email_pop_up_description')),
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
                    $existingChangeLog = json_decode($existingData['change_log'] ?? '[]', true);
                    if (!is_array($existingChangeLog)) {
                        $existingChangeLog = [];
                    }

                    // Append only changed fields to change log
                    $existingChangeLog[] = [
                        'updated_by' => $updatedBy,
                        'timestamp' => date('Y-m-d H:i:s'),
                        'changes' => $changedFields,
                    ];

                    $data['change_log'] = json_encode($existingChangeLog, JSON_UNESCAPED_SLASHES);

                    // Update existing record
                    if ($model->update($id, $data)) {
                        return $this->response->setJSON(['status' => 'success', 'message' => 'Data updated successfully!']);
                    } else {
                        return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to update data.']);
                    }
                }

                return $this->response->setJSON(['status' => 'info', 'message' => 'No changes detected.']);
            }

            // Insert new record if not found
            $data['id'] = $id;
            $data['change_log'] = json_encode([[
                'updated_by' => $updatedBy,
                'timestamp' => date('Y-m-d H:i:s'),
                'changes' => $data,
            ]], JSON_UNESCAPED_SLASHES);

            if ($model->insert($data)) {
                return $this->response->setJSON(['status' => 'success', 'message' => 'Data inserted successfully!']);
            } else {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to insert data.']);
            }
        }

        return $this->response->setJSON(['status' => 'error', 'message' => 'Invalid request.']);
    }
}
