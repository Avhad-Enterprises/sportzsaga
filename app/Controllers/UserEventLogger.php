<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserEventModel;

class UserEventLogger extends BaseController
{
    public function logUserEvents()
    {
        $eventModel = new UserEventModel();
        $data = $this->request->getJSON(true);

        if (isset($data['events']) && is_array($data['events'])) {
            foreach ($data['events'] as $event) {
                $eventData = [
                    'name' => $event['name'],
                    'visitor_id' => $event['visitor_id'],
                    'session_id' => $event['session_id'],
                    'event_type' => $event['event_type'],
                    'event_data' => json_encode($event['event_data']),
                    'timestamp' => $event['timestamp']
                ];

                $eventModel->insert($eventData);
            }
            return $this->response->setJSON(['status' => 'success']);
        } else {
            return $this->response->setJSON(['status' => 'error']);
        }
    }
    public function getUserEventsdata()
    {
        $eventModel = new UserEventModel();
        $data['events'] = $eventModel->getuserevents();
        return view('userevents_view', $data);
    }

    public function viewdata($id)
    {
        $model = new UserEventModel();
        $data['event'] = $model->geteventdata($id);
        return view ('event_data_view', $data);
    }
}
