<?php

namespace App\Models;

use CodeIgniter\Model;

class GanalyticsModel extends Model
{
    protected $table = 'ganalytics';
    protected $primaryKey = 'id';

    protected $allowedFields = ['google_analytics_id', 'google_analytics_property_id', 'updated_at', 'updated_by'];

    protected $useTimestamps = false;

    public function getGoogleAnalyticsId()
    {
        $result = $this->select('google_analytics_property_id')->first();
        return $result['google_analytics_property_id'] ?? null;
    }
}
