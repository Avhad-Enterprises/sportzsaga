<?php

namespace App\Controllers;

use App\Models\tiersmodel;

class Tiers extends BaseController
{
    public function tiers()
    {
        $model = new tiersmodel();
        $data['tiers'] = $model->getAllTiers();
        return view('tiers_list_view', $data);
    }

    public function new_tier_1()
    {
        return view('tier_1_form_view');
    }

    public function publish_tier_1()
    {
        $model = new tiersmodel();
        $session = session();
        $userId = $session->get('user_id'); // Get logged-in user ID

        // Prepare data for insertion
        $data = [
            'tier_value' => $this->request->getPost('tier_value'),
            'tier_name' => $this->request->getPost('tier_name'), // Removed unnecessary space
            'tier_link' => $this->request->getPost('tier_link'),
            'added_by' => $userId, // Store the ID of the user who added the record
            'created_at' => date('Y-m-d H:i:s') // Store creation timestamp
        ];

        // Insert the data
        if ($model->insert($data)) {
            return redirect()->to('tiers')->with('success', 'Tier 1 published successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to publish Tier 1.');
        }
    }

    public function edit_tier_1($id)
    {
        $model = new tiersmodel();
        $data['tier_1'] = $model->gettierbyid($id);
        return view('tier_1_edit_view', $data);
    }

    public function update_tier_1($id)
    {
        $model = new tiersmodel();
        $session = session();


        // Fetch existing tier data
        $tier = $model->find($id);

        if (!$tier) {
            return redirect()->to('tiers')->with('error', 'Tier not found.');
        }

        // Prepare updated tier data
        $newData = [
            'tier_name' => $this->request->getPost('tier_name'),
            'tier_value' => $this->request->getPost('tier_value'),
            'tier_link' => $this->request->getPost('tier_link'),
            'updated_by' => $session->get('admin_name') . '(' . $session->get('user_id') . ')',
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        // ✅ Track changes
        $changes = [];
        foreach ($newData as $key => $value) {
            if ($tier[$key] != $value) {
                $changes[$key] = [
                    'old' => $tier[$key],
                    'new' => $value
                ];
            }
        }

        if (!empty($changes)) {
            // Retrieve existing change log
            $existingChangeLog = json_decode($tier['change_log'] ?? '[]', true);
            if (!is_array($existingChangeLog)) {
                $existingChangeLog = [];
            }

            // Append new change log entry
            $existingChangeLog[] = [
                'updated_by' => $session->get('admin_name') . ' (' . $session->get('user_id') . ')',
                'timestamp' => date('Y-m-d H:i:s'),
                'changes' => $changes
            ];

            // Store changes in JSON format
            $newData['change_log'] = json_encode($existingChangeLog);
        }

        // Update the tier data
        if ($model->update($id, $newData)) {
            return redirect()->to('tiers')->with('status', 'Tier updated successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to update tier.');
        }
    }


    public function deleteTier($tierId)
    {
        $session = session();
        $userId = $session->get('user_id'); // Get logged-in user ID
        $tierModel = new \App\Models\tiersmodel();

        // Fetch existing tier data
        $tier = $tierModel->find($tierId);
        if (!$tier) {
            return redirect()->to('tiers_list_view')->with('error', 'Tier 1 not found.');
        }

        // Save the admin name and ID
        $deletedBy = $session->get('admin_name') . ' (' . $userId . ')';

        // Perform soft deletion by updating fields
        $tierModel->update($tierId, [
            'is_deleted' => 1, // Mark as deleted
            'deleted_by' => $deletedBy, // Track who deleted
            'deleted_at' => date('Y-m-d H:i:s'), // Record timestamp
        ]);

        return redirect()->to('tiers_list_view')->with('success', 'Tier 1 deleted successfully.');
    }


    public function deletedTiers()
    {
        $tierModel = new \App\Models\tiersmodel();
        $data['tiers'] = $tierModel->where('is_deleted', 1)->findAll();

        return view('tier1_deleted', $data); // Load deleted tiers view
    }


    public function restoreTier($tierId)
    {
        $tierModel = new \App\Models\tiersmodel();

        // Fetch tier record
        $tier = $tierModel->find($tierId);
        if (!$tier) {
            return redirect()->to('tiers_list_view')->with('error', 'Tier 1 not found.');
        }

        // Restore the tier by clearing deletion fields
        $tierModel->update($tierId, [
            'is_deleted' => 0,
            'deleted_by' => null,
            'deleted_at' => null,
        ]);

        return redirect()->to('tiers_list_view')->with('success', 'Tier 1 restored successfully.');
    }

    public function tier_change_logs($id = null)
    {
        $db = \Config\Database::connect();

        if ($id === null) {
            return view('edit_tier1_logs_view', ['updates' => []]); // No Tier ID provided
        }

        // Fetch Tier details
        $query = $db->table('tier_1')->select('change_log')->where('tier_1_id', $id)->get();
        $row = $query->getRow();

        if ($row) {
            $decodedData = json_decode($row->change_log, true);

            if (!is_array($decodedData)) {
                return view('edit_tier1_logs_view', ['updates' => []]); // Return empty if decoding fails
            }

            $updates = [];

            foreach ($decodedData as $key => $log) {
                if (is_numeric($key) && isset($log['timestamp'])) {
                    $updates[] = [
                        'updated_by' => $log['updated_by'] ?? 'Unknown',
                        'updated_at' => $log['timestamp'],
                        'changes' => $log['changes'] ?? [],
                    ];
                }
            }

            return view('edit_tier1_logs_view', ['updates' => $updates]);
        }

        return view('edit_tier1_logs_view', ['updates' => []]); // No logs found
    }
    public function getTierChangeLogs()
    {
        $db = \Config\Database::connect();
        $query = $db->table('tier_1')->select('change_log')->get();
        $row = $query->getRow();

        if ($row) {
            $decodedData = json_decode($row->change_log, true);

            if (!is_array($decodedData)) {
                return []; // Return empty array if decoding fails
            }

            $updates = [];

            foreach ($decodedData as $key => $log) {
                if (is_numeric($key) && isset($log['updated_at'])) {
                    $updates[] = $log;
                }
            }

            return $updates;
        }
        return [];
    }












    //<!------------------------------------------------------------------------- Tier 2 ----------------------------------------------------------------------------------------------------->
    public function add_tier_2($id)
    {
        $model = new tiersmodel();
        $data['tier_2'] = $model->getAllTier2($id);
        $id = $this->request->uri->getSegment(3);
        $data['tier1id'] = $id;
        return view('tier_2_list_view', $data);
    }

    public function new_tier_2($id)
    {
        $data['tier1id'] = $id;
        return view('tier_2_form_view', $data);
    }

    public function publish_tier_2()
    {
        $model = new tiersmodel();
        $session = session();
        $userId = $session->get('user_id'); // Get logged-in user ID
        $id = $this->request->uri->getSegment(3);

        // Prepare data for insertion
        $data = [
            'tier_1_id' => $this->request->getPost('tier_1_id'),
            'tier_value' => $this->request->getPost('tier_value'),
            'tier_name' => $this->request->getPost('tier_name'), // Fixed key name
            'tier_2_link' => $this->request->getPost('tier_link'),
            'added_by' => $userId, // Store the ID of the user who added the record
            'created_at' => date('Y-m-d H:i:s') // Store creation timestamp
        ];

        // Insert the data
        if ($model->addTier2data($data)) {
            return redirect()->to('tiers/add_tier_2/' . $id)->with('success', 'Tier 2 published successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to publish Tier 2.');
        }
    }

    public function edit_tier_2($id)
    {
        $model = new tiersmodel();
        $data['tier_2'] = $model->gettier2byid($id);
        return view('tier_2_edit_view', $data);
    }

    public function update_tier_2($id)
    {
        $db = \Config\Database::connect();
        $session = session();


        // Fetch existing tier data
        $tier = $db->table('tier_2')->where('tier_2_id', $id)->get()->getRowArray();
        if (!$tier) {
            return redirect()->to('tiers/add_tier_2')->with('error', 'Tier 2 not found.');
        }

        // Prepare updated tier data
        $newData = [
            'tier_1_id' => $this->request->getPost('tier_1_id'),
            'tier_name' => $this->request->getPost('tier_name'),
            'tier_value' => $this->request->getPost('tier_value'),
            'tier_2_link' => $this->request->getPost('tier_link'),
            'updated_by' => $session->get('admin_name') . '(' . $session->get('user_id') . ')',
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        // ✅ Track changes
        $changes = [];
        foreach ($newData as $key => $value) {
            if ($tier[$key] != $value) {
                $changes[$key] = [
                    'old' => $tier[$key],
                    'new' => $value
                ];
            }
        }

        if (!empty($changes)) {
            // Retrieve existing change log
            $existingChangeLog = json_decode($tier['change_log'] ?? '[]', true);
            if (!is_array($existingChangeLog)) {
                $existingChangeLog = [];
            }

            // Append new change log entry
            $existingChangeLog[] = [
                'updated_by' => $session->get('admin_name') . ' (' . $session->get('user_id') . ')',
                'timestamp' => date('Y-m-d H:i:s'),
                'changes' => $changes
            ];

            // Store changes in JSON format
            $newData['change_log'] = json_encode($existingChangeLog);
        }

        // Update the tier data
        $updated = $db->table('tier_2')->where('tier_2_id', $id)->update($newData);

        if ($updated) {
            return redirect()->to('tier_2_list_view' . $this->request->getPost('tier_2_id'))->with('status', 'Tier 2 updated successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to update Tier 2.');
        }
    }

    public function deleteTier2($tierId)
    {
        $session = session();
        $userId = $session->get('user_id'); // Get logged-in user ID
        $db = \Config\Database::connect();

        // Fetch existing tier data
        $tier = $db->table('tier_2')->where('tier_2_id', $tierId)->get()->getRowArray();
        if (!$tier) {
            return redirect()->to('tier/tier_2_list_view')->with('error', 'Tier 2 not found.');
        }

        // Save the admin name and ID
        $deletedBy = $session->get('admin_name') . ' (' . $userId . ')';

        // Perform soft deletion by updating fields
        $db->table('tier_2')->where('tier_2_id', $tierId)->update([
            'is_deleted' => 1, // Mark as deleted
            'deleted_by' => $deletedBy, // Track who deleted
            'deleted_at' => date('Y-m-d H:i:s'), // Record timestamp
        ]);

        return redirect()->to('tier/tier_2_list_view')->with('success', 'Tier 2 deleted successfully.');
    }

    public function deletedTiers2()
    {
        $db = \Config\Database::connect();
        $data['tiers2'] = $db->table('tier_2')->where('is_deleted', 1)->get()->getResultArray();

        return view('tier2_deleted', $data); // Load deleted tiers view
    }

    public function restoreTier2($tierId)
    {
        $db = \Config\Database::connect();

        // Fetch tier record
        $tier = $db->table('tier_2')->where('tier_2_id', $tierId)->get()->getRowArray();
        if (!$tier) {
            return redirect()->to('tier_2_list_view')->with('error', 'Tier 2 not found.');
        }

        // Restore the tier by clearing deletion fields
        $db->table('tier_2')->where('tier_2_id', $tierId)->update([
            'is_deleted' => 0,
            'deleted_by' => null,
            'deleted_at' => null,
        ]);

        return redirect()->to('tier_2_list_view')->with('success', 'Tier 2 restored successfully.');
    }


    public function tier2_change_logs($id = null)
    {
        $db = \Config\Database::connect();

        if ($id === null) {
            return view('edit_tier2_logs_view', ['updates' => []]); // No Tier ID provided
        }

        // Fetch Tier details
        $query = $db->table('tier_2')->select('change_log')->where('tier_2_id', $id)->get();
        $row = $query->getRow();

        if ($row) {
            $decodedData = json_decode($row->change_log, true);

            if (!is_array($decodedData)) {
                return view('edit_tier2_logs_view', ['updates' => []]); // Return empty if decoding fails
            }

            $updates = [];

            foreach ($decodedData as $key => $log) {
                if (is_numeric($key) && isset($log['timestamp'])) {
                    $updates[] = [
                        'updated_by' => $log['updated_by'] ?? 'Unknown',
                        'updated_at' => $log['timestamp'],
                        'changes' => $log['changes'] ?? [],
                    ];
                }
            }

            return view('edit_tier2_logs_view', ['updates' => $updates]);
        }

        return view('edit_tier2_logs_view', ['updates' => []]); // No logs found
    }
    public function getTier2ChangeLogs()
    {
        $db = \Config\Database::connect();
        $query = $db->table('tier_2')->select('change_log')->get();
        $row = $query->getRow();

        if ($row) {
            $decodedData = json_decode($row->change_log, true);

            if (!is_array($decodedData)) {
                return []; // Return empty array if decoding fails
            }

            $updates = [];

            foreach ($decodedData as $key => $log) {
                if (is_numeric($key) && isset($log['updated_at'])) {
                    $updates[] = $log;
                }
            }

            return $updates;
        }
        return [];
    }











    // ------------------------------------------------------------------------- Tier 3 ---------------------------------------------------------------------------------------------------
    public function add_tier_3($id)
    {
        $model = new tiersmodel();
        $data['tier_3'] = $model->getAllTier3($id);
        $id = $this->request->uri->getSegment(3);
        $data['tier2id'] = $id;
        return view('tier_3_list_view', $data);
    }

    public function new_tier_3($id)
    {
        $data['tier2id'] = $id;
        return view('tier_3_form_view', $data);
    }

    public function publish_tier_3()
    {
        $db = \Config\Database::connect();
        $session = session();
        $userId = $session->get('user_id'); // Get logged-in user ID
        $id = $this->request->uri->getSegment(3);

        // Prepare data for insertion
        $data = [
            'tier_2_id' => $this->request->getPost('tier_2_id'),
            'tier_value' => $this->request->getPost('tier_value'),
            'tier_name' => $this->request->getPost('tier_name'),
            'tier_3_link' => $this->request->getPost('tier_link'),
            'added_by' => $userId, // Store user who added
            'created_at' => date('Y-m-d H:i:s') // Store timestamp
        ];

        // Insert into tier_3 table
        if ($db->table('tier_3')->insert($data)) {
            return redirect()->to('tiers/add_tier_3/' . $id)->with('success', 'Tier 3 published successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to publish Tier 3.');
        }
    }

    public function edit_tier_3($id)
    {
        $model = new tiersmodel();
        $data['tier_3'] = $model->gettier3byid($id);
        return view('tier_3_edit_view', $data);
    }

    public function update_tier_3($id)
    {
        $db = \Config\Database::connect();
        $session = session();


        // Fetch existing tier data
        $tier = $db->table('tier_3')->where('tier_3_id', $id)->get()->getRowArray();
        if (!$tier) {
            return redirect()->to('tiers/add_tier_3')->with('error', 'Tier 3 not found.');
        }

        // Prepare updated tier data
        $newData = [
            'tier_2_id' => $this->request->getPost('tier_2_id'),
            'tier_name' => $this->request->getPost('tier_name'),
            'tier_value' => $this->request->getPost('tier_value'),
            'tier_3_link' => $this->request->getPost('tier_link'),
            'updated_by' => $session->get('admin_name') . '(' . $session->get('user_id') . ')',
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        // ✅ Track changes
        $changes = [];
        foreach ($newData as $key => $value) {
            if ($tier[$key] != $value) {
                $changes[$key] = [
                    'old' => $tier[$key],
                    'new' => $value
                ];
            }
        }

        if (!empty($changes)) {
            // Retrieve existing change log
            $existingChangeLog = json_decode($tier['change_log'] ?? '[]', true);
            if (!is_array($existingChangeLog)) {
                $existingChangeLog = [];
            }

            // Append new change log entry
            $existingChangeLog[] = [
                'updated_by' => $session->get('admin_name') . ' (' . $session->get('user_id') . ')',
                'timestamp' => date('Y-m-d H:i:s'),
                'changes' => $changes
            ];

            // Store changes in JSON format
            $newData['change_log'] = json_encode($existingChangeLog);
        }

        // Update the tier data
        $updated = $db->table('tier_3')->where('tier_3_id', $id)->update($newData);

        if ($updated) {
            return redirect()->to('tiers/add_tier_3/' . $this->request->getPost('tier_2_id'))->with('status', 'Tier 3 updated successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to update Tier 3.');
        }
    }


    public function deleteTier3($tierId)
    {
        $db = \Config\Database::connect();
        $session = session();
        $userId = $session->get('user_id'); // Get logged-in user ID

        // Fetch existing tier data
        $tier = $db->table('tier_3')->where('tier_3_id', $tierId)->get()->getRowArray();
        if (!$tier) {
            return redirect()->to('tier_3_list_view')->with('error', 'Tier 3 not found.');
        }

        // Save the admin name and ID
        $deletedBy = $session->get('admin_name') . ' (' . $userId . ')';

        // Perform soft deletion by updating fields
        $db->table('tier_3')->where('tier_3_id', $tierId)->update([
            'is_deleted' => 1, // Mark as deleted
            'deleted_by' => $deletedBy, // Track who deleted
            'deleted_at' => date('Y-m-d H:i:s'), // Record timestamp
        ]);

        return redirect()->to('tier_3_list_view')->with('success', 'Tier 3 deleted successfully.');
    }

    public function deletedTiers3()
    {
        $db = \Config\Database::connect();
        $data['tiers3'] = $db->table('tier_3')->where('is_deleted', 1)->get()->getResultArray();

        return view('tier3_deleted', $data); // Load deleted tiers view
    }

    public function restoreTier3($tierId)
    {
        $db = \Config\Database::connect();

        // Fetch tier record
        $tier = $db->table('tier_3')->where('tier_3_id', $tierId)->get()->getRowArray();
        if (!$tier) {
            return redirect()->to('tier_3_list_view')->with('error', 'Tier 3 not found.');
        }

        // Restore the tier by clearing deletion fields
        $db->table('tier_3')->where('tier_3_id', $tierId)->update([
            'is_deleted' => 0,
            'deleted_by' => null,
            'deleted_at' => null,
        ]);

        return redirect()->to('tier_3_list_view')->with('success', 'Tier 3 restored successfully.');
    }



    public function tier3_change_logs($id = null)
    {
        $db = \Config\Database::connect();

        if ($id === null) {
            return view('edit_tier3_logs_view', ['updates' => []]); // No Tier ID provided
        }

        // Fetch Tier details
        $query = $db->table('tier_3')->select('change_log')->where('tier_3_id', $id)->get();
        $row = $query->getRow();

        if ($row) {
            $decodedData = json_decode($row->change_log, true);

            if (!is_array($decodedData)) {
                return view('edit_tier3_logs_view', ['updates' => []]); // Return empty if decoding fails
            }

            $updates = [];

            foreach ($decodedData as $key => $log) {
                if (is_numeric($key) && isset($log['timestamp'])) {
                    $updates[] = [
                        'updated_by' => $log['updated_by'] ?? 'Unknown',
                        'updated_at' => $log['timestamp'],
                        'changes' => $log['changes'] ?? [],
                    ];
                }
            }

            return view('edit_tier3_logs_view', ['updates' => $updates]);
        }

        return view('edit_tier3_logs_view', ['updates' => []]); // No logs found
    }
    public function getTier3ChangeLogs()
    {
        $db = \Config\Database::connect();
        $query = $db->table('tier_3')->select('change_log')->get();
        $row = $query->getRow();

        if ($row) {
            $decodedData = json_decode($row->change_log, true);

            if (!is_array($decodedData)) {
                return []; // Return empty array if decoding fails
            }

            $updates = [];

            foreach ($decodedData as $key => $log) {
                if (is_numeric($key) && isset($log['updated_at'])) {
                    $updates[] = $log;
                }
            }

            return $updates;
        }
        return [];
    }















    //-------------------------------------------------------------------------------- Tier 4 ------------------------------------------------------------------------------------------>
    public function add_tier_4($id)
    {
        $model = new tiersmodel();
        $data['tier_4'] = $model->getAllTier4($id);
        $id = $this->request->uri->getSegment(3);
        $data['tier3id'] = $id;
        return view('tier_4_list_view', $data);
    }

    public function new_tier_4($id)
    {
        $data['tier3id'] = $id;
        return view('tier_4_form_view', $data);
    }

    public function publish_tier_4()
    {
        $db = \Config\Database::connect();
        $session = session();
        $userId = $session->get('user_id'); // Get logged-in user ID

        // Prepare data for insertion
        $data = [
            'tier_3_id' => $this->request->getPost('tier_3_id'),
            'tier_value' => $this->request->getPost('tier_value'),
            'tier_name' => $this->request->getPost('tier_name'),
            'tier_4_link' => $this->request->getPost('tier_link'),
            'added_by' => $userId, // Store the user who added it
            'created_at' => date('Y-m-d H:i:s') // Store creation timestamp
        ];

        // Insert data into database
        $inserted = $db->table('tier_4')->insert($data);

        if ($inserted) {
            return redirect()->to('tiers/add_tier_4/' . $this->request->getPost('tier_3_id'))
                ->with('success', 'Tier 4 published successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to publish Tier 4.');
        }
    }


    public function edit_tier_4($id)
    {
        $model = new tiersmodel();
        $data['tier_4'] = $model->gettier4byid($id);
        return view('tier_4_edit_view', $data);
    }

    public function update_tier_4($id)
    {
        $db = \Config\Database::connect();
        $session = session();
        $userId = $session->get('user_id'); // Get logged-in user ID

        // Fetch existing tier data
        $tier = $db->table('tier_4')->where('tier_4_id', $id)->get()->getRowArray();
        if (!$tier) {
            return redirect()->to('tiers/add_tier_4')->with('error', 'Tier 4 not found.');
        }

        // Prepare updated tier data
        $newData = [
            'tier_3_id' => $this->request->getPost('tier_3_id'),
            'tier_name' => $this->request->getPost('tier_name'),
            'tier_value' => $this->request->getPost('tier_value'),
            'tier_4_link' => $this->request->getPost('tier_link'),
            'updated_by' => $session->get('admin_name') . '(' . $session->get('user_id') . ')',
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        // ✅ Track changes
        $changes = [];
        foreach ($newData as $key => $value) {
            if ($tier[$key] != $value) {
                $changes[$key] = [
                    'old' => $tier[$key],
                    'new' => $value
                ];
            }
        }

        if (!empty($changes)) {
            // Retrieve existing change log
            $existingChangeLog = json_decode($tier['change_log'] ?? '[]', true);
            if (!is_array($existingChangeLog)) {
                $existingChangeLog = [];
            }

            // Append new change log entry
            $existingChangeLog[] = [
                'updated_by' => $session->get('admin_name') . ' (' . $session->get('user_id') . ')',
                'timestamp' => date('Y-m-d H:i:s'),
                'changes' => $changes
            ];

            // Store changes in JSON format
            $newData['change_log'] = json_encode($existingChangeLog);
        }

        // Update the tier data
        $updated = $db->table('tier_4')->where('tier_4_id', $id)->update($newData);

        if ($updated) {
            return redirect()->to('tiers/add_tier_4/' . $this->request->getPost('tier_3_id'))
                ->with('success', 'Tier 4 updated successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to update Tier 4.');
        }
    }

    public function deleteTier4($tierId)
    {
        $db = \Config\Database::connect();
        $session = session();
        $userId = $session->get('user_id'); // Get logged-in user ID

        // Fetch existing tier data
        $tier = $db->table('tier_4')->where('tier_4_id', $tierId)->get()->getRowArray();
        if (!$tier) {
            return redirect()->to('tiers_list_view')->with('error', 'Tier 4 not found.');
        }

        // Save the admin name and ID
        $deletedBy = $session->get('admin_name') . ' (' . $userId . ')';

        // Perform soft deletion by updating fields
        $db->table('tier_4')->where('tier_4_id', $tierId)->update([
            'is_deleted' => 1, // Mark as deleted
            'deleted_by' => $deletedBy, // Track who deleted
            'deleted_at' => date('Y-m-d H:i:s'), // Record timestamp
        ]);

        return redirect()->to('tiers_list_view')->with('success', 'Tier 4 deleted successfully.');
    }

    public function deletedTiers4()
    {
        $db = \Config\Database::connect();
        $data['tiers4'] = $db->table('tier_4')->where('is_deleted', 1)->get()->getResultArray();

        return view('tier4_deleted', $data); // Load deleted tiers view
    }

    public function restoreTier4($tierId)
    {
        $db = \Config\Database::connect();

        // Fetch tier record
        $tier = $db->table('tier_4')->where('tier_4_id', $tierId)->get()->getRowArray();
        if (!$tier) {
            return redirect()->to('tiers_list_view')->with('error', 'Tier 4 not found.');
        }

        // Restore the tier by clearing deletion fields
        $db->table('tier_4')->where('tier_4_id', $tierId)->update([
            'is_deleted' => 0,
            'deleted_by' => null,
            'deleted_at' => null,
        ]);

        return redirect()->to('tiers_list_view')->with('success', 'Tier 4 restored successfully.');
    }

    public function tier4_change_logs($id = null)
    {
        $db = \Config\Database::connect();

        if ($id === null) {
            return view('edit_tier4_logs_view', ['updates' => []]); // No Tier ID provided
        }

        // Fetch Tier 4 details
        $query = $db->table('tier_4')->select('change_log')->where('tier_4_id', $id)->get();
        $row = $query->getRow();

        if ($row) {
            $decodedData = json_decode($row->change_log, true);

            if (!is_array($decodedData)) {
                return view('edit_tier4_logs_view', ['updates' => []]); // Return empty if decoding fails
            }

            $updates = [];

            foreach ($decodedData as $key => $log) {
                if (is_numeric($key) && isset($log['timestamp'])) {
                    $updates[] = [
                        'updated_by' => $log['updated_by'] ?? 'Unknown',
                        'updated_at' => $log['timestamp'],
                        'changes' => $log['changes'] ?? [],
                    ];
                }
            }

            return view('edit_tier4_logs_view', ['updates' => $updates]);
        }

        return view('edit_tier4_logs_view', ['updates' => []]); // No logs found
    }

    public function getTier4ChangeLogs()
    {
        $db = \Config\Database::connect();
        $query = $db->table('tier_4')->select('change_log')->get();
        $row = $query->getRow();

        if ($row) {
            $decodedData = json_decode($row->change_log, true);

            if (!is_array($decodedData)) {
                return []; // Return empty array if decoding fails
            }

            $updates = [];

            foreach ($decodedData as $key => $log) {
                if (is_numeric($key) && isset($log['updated_at'])) {
                    $updates[] = $log;
                }
            }

            return $updates;
        }
        return [];
    }


    public function get_tier2()
    {
        $tiersmodel = new tiersmodel();

        $tier_1_id = $this->request->getPost('tier_1_id');

        if ($tier_1_id) {
            $tier2Data = $tiersmodel->getTier2ByTier1($tier_1_id);

            // Return the data in JSON format
            echo json_encode($tier2Data);
        } else {
            echo json_encode([]);
        }
    }

    public function get_tier3()
    {
        $tiersmodel = new tiersmodel();

        $tier_2_id = $this->request->getPost('tier_2_id');

        if ($tier_2_id) {
            $tier3Data = $tiersmodel->getTier3ByTier2($tier_2_id);

            // Return the data in JSON format
            echo json_encode($tier3Data);
        } else {
            echo json_encode([]);
        }
    }

    public function get_tier4()
    {
        $tiersmodel = new tiersmodel();

        $tier_3_id = $this->request->getPost('tier_3_id');

        if ($tier_3_id) {
            $tier4Data = $tiersmodel->getTier4ByTier3($tier_3_id);

            // Return the data in JSON format
            echo json_encode($tier4Data);
        } else {
            echo json_encode([]);
        }
    }
}
