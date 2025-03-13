<?php

namespace App\Models;

use CodeIgniter\Model;

class SingleBlogModel extends Model
{
    protected $table = 'singleblog_data';  // Adjusted to match your table name
    protected $primaryKey = 'id';      // Primary key
    protected $allowedFields = ['page_title', 'related_blogs', 'tags', 'popular_posts', 'created_at', 'updated_at', 'change_log'];

    /**
     * Fetch settings by ID.
     * @param int $id
     * @return array|null
     */
    public function getSettings(int $id)
    {
        return $this->find($id);
    }

    /**
     * Save or update settings.
     * @param array $data
     * @return bool
     */
    public function saveSettings(array $data): bool
    {
        if (isset($data['id']) && $this->find($data['id'])) {
            return $this->update($data['id'], $data); // Update existing row
        }
        return $this->insert($data); // Insert new row
    }
}
