<?php

namespace App\Models;

use CodeIgniter\Model;

class Controls_model extends Model
{
    protected $table = 'section_controls';
    protected $primaryKey = 'id';
    protected $allowedFields = ['section_name', 'is_visible'];

    public function getSections()
    {
        return $this->findAll();
    }

    public function findSection($id)
    {
        return $this->where('id', $id)->findAll();
    }

    public function updatevisible($id, $data)
    {
        return $this->db->table($this->table)->where('id', $id)->update($data);
    }

    public function getMenuLinks()
    {
        return $this->db->table('menu_links')->get()->getResultArray();
    }

    public function getMenusecondaryLinks()
    {
        return $this->db->table('navbar_links')->get()->getResultArray();
    }

    public function addmenudata($data)
    {
        return $this->db->table('menu_links')->insert($data);
    }

    public function getsecMenuLinks()
    {
        return $this->db->table('navbar_links')->get()->getResultArray();
    }

    public function addsecmenudata($data)
    {
        return $this->db->table('navbar_links')->insert($data);
    }
}
