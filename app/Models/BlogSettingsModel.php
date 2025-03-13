<?php

namespace App\Models;

use CodeIgniter\Model;

class BlogSettingsModel extends Model
{
    protected $table = 'blog_settings'; // Table name
    protected $primaryKey = 'id'; // Primary key

    // Allowed fields for insert/update
    protected $allowedFields = [
        'blogs_title',
        'blogs',
        'popular_tags',
        'popular_posts',
        'meta_title',
        'change_log'
    ];

    // Enable timestamps
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    // Fetch all settings
    public function getSettings()
    {
        return $this->first(); // Fetch the first (or only) row
    }

    // Save or update settings
    public function saveSettings($data)
    {
        $settings = $this->getSettings();
        
        if ($settings) {
            // Update existing settings
            return $this->update($settings['id'], $data);
        } else {
            // Insert new settings
            return $this->insert($data);
        }
    }
}
