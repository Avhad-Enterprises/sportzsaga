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
        $data = [
            'tier_value' => $this->request->getPost('tier_value'),
            'tier_name    ' => $this->request->getPost('tier_name'),
            'tier_link' => $this->request->getPost('tier_link'),
        ];
        $model->addTier1data($data);
        return redirect()->to('tiers');
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
        $data = [
            'tier_name' => $this->request->getPost('tier_name'),
            'tier_value' => $this->request->getPost('tier_value'),
            'tier_link' => $this->request->getPost('tier_link'),
        ];
        $model->updatetier1data($id, $data);
        return redirect()->to('tiers')->with('status', 'Tier updated successfully!');
    }


    public function deleteTier($tierId)
    {
        // Load the model
        $tierModel = new \App\Models\tiersmodel(); // Use the correct namespace for your model    
        // Sanitize and validate the $tierId
        $tierId = intval($tierId);    
        // Perform the deletion in the database
        $isDeleted = $tierModel->deleteTierById($tierId);
        return redirect()->to('tier_1_form_view')->with('success', 'tier 1 deleted successfully.');
        
    }
    


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

    public function publish_tier_2($id)
    {
        $model = new tiersmodel();
        $id = $this->request->uri->getSegment(3);
        $data = [
            'tier_1_id' => $this->request->getPost('tier_1_id'),
            'tier_value' => $this->request->getPost('tier_value'),
            'tier_name	' => $this->request->getPost('tier_name'),
            'tier_2_link' => $this->request->getPost('tier_link'),
        ];
        $model->addTier2data($data);
        return redirect()->to('tiers/add_tier_2/' . $id);
    }
    
    public function edit_tier_2($id)
    {
        $model = new tiersmodel();
        $data['tier_2'] = $model->gettier2byid($id);
        return view('tier_2_edit_view', $data);
    }
    
    public function update_tier_2($id)
    {
        $model = new tiersmodel();
        $tier1id = $this->request->getPost('tier_1_id');
        $data = [
            'tier_1_id' => $this->request->getPost('tier_1_id'),
            'tier_name' => $this->request->getPost('tier_name'),
            'tier_value' => $this->request->getPost('tier_value'),
            'tier_2_link' => $this->request->getPost('tier_link'),
        ];
        $model->updatetier2data($id, $data);
        return redirect()->to('tiers/add_tier_2/' . $tier1id)->with('status', 'Tier 2 updated successfully!');
    }

    public function deleteTier2($tierId)
    {
        // Load the model
        $tierModel = new \App\Models\tiersmodel(); 
        $tierId = intval($tierId);    
        $isDeleted = $tierModel->deleteTierById2($tierId);
        return redirect()->to('tier_2_form_view')->with('success', 'tier 2 deleted successfully.');
    }
    

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

    public function publish_tier_3($id)
    {
        $model = new tiersmodel();
        $id = $this->request->uri->getSegment(3);
        $data = [
            'tier_2_id' => $this->request->getPost('tier_2_id'),
            'tier_value' => $this->request->getPost('tier_value'),
            'tier_name' => $this->request->getPost('tier_name'),
            'tier_3_link' => $this->request->getPost('tier_link'),
        ];
        $model->addTier3data($data);
        return redirect()->to('tiers/add_tier_3/' . $id);
    }
    
    public function edit_tier_3($id)
    {
        $model = new tiersmodel();
        $data['tier_3'] = $model->gettier3byid($id);
        return view('tier_3_edit_view', $data);
    }
    
    public function update_tier_3($id)
    {
        $model = new tiersmodel();
        $tier2id = $this->request->getPost('tier_2_id');
        $data = [
            'tier_2_id' => $this->request->getPost('tier_2_id'),
            'tier_name' => $this->request->getPost('tier_name'),
            'tier_value' => $this->request->getPost('tier_value'),
            'tier_3_link' => $this->request->getPost('tier_link'),
        ];
        $model->updatetier3data($id, $data);
        return redirect()->to('tiers/add_tier_3/' . $tier2id)->with('status', 'Tier 2 updated successfully!');
    }

    public function deleteTier3($tierId)
    {
        // Load the model
        $tierModel = new \App\Models\tiersmodel(); // Use the correct namespace for your model    
        $tierId = intval($tierId);    
        $isDeleted = $tierModel->deleteTierById3($tierId);
        return redirect()->to('tier_3_form_view')->with('success', 'tier 3 deleted successfully.');
    }

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

    public function publish_tier_4($id)
    {
        $model = new tiersmodel();
        $data = [
            'tier_3_id' => $this->request->getPost('tier_3_id'),
            'tier_value' => $this->request->getPost('tier_value'),
            'tier_name' => $this->request->getPost('tier_name'),
            'tier_4_link' => $this->request->getPost('tier_link'),
        ];
        $model->addTier4data($data);
        return redirect()->to('tiers/add_tier_4/' . $id);
    }
    
    public function edit_tier_4($id)
    {
        $model = new tiersmodel();
        $data['tier_4'] = $model->gettier4byid($id);
        return view('tier_4_edit_view', $data);
    }
    
    public function update_tier_4($id)
    {
        $model = new tiersmodel();
        $tier3id = $this->request->getPost('tier_3_id');
        $data = [
            'tier_3_id' => $this->request->getPost('tier_3_id'),
            'tier_name' => $this->request->getPost('tier_name'),
            'tier_value' => $this->request->getPost('tier_value'),
            'tier_4_link' => $this->request->getPost('tier_link'),
        ];
        $model->updatetier4data($id, $data);
        return redirect()->to('tiers/add_tier_4/' . $tier3id)->with('status', 'Tier 2 updated successfully!');
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
