<?php

namespace App\Models;

use CodeIgniter\Model;

class tiersmodel extends Model
{
    protected $table = 'tier_1';
    protected $primaryKey = 'tier_1_id';
    protected $allowedFields = ['tier_value', 'tier_name', 'tier_link','updated_by','change_log','deleted_at','is_deleted','deleted_at','deleted_by','updated_at','added_by'];

    public function getAllTiers()
    {
        return $this->where('is_deleted', 0)->findAll();
    }

    public function gettierbyid($id)
    {
        return $this->where('tier_1_id', $id)->findAll();
    }

    public function gesttier1data($tier1id)
    {
        return $this->where('tier_1_id', $tier1id)->findAll();
    }

    public function updatetier1data($id, $data)
    {
        return $this->db->table('tier_1')->where('tier_1_id', $id)->update($data);
    }

    public function getAllTier2($id)
    {
        $tier_2 = $this->db->table('tier_2')->where('tier_1_id', $id)->where('is_deleted' ,0)->get()->getResultArray();
        return $tier_2;
    }

    public function gettiersbyid($id)
    {
        $tier_2 = $this->db->table('tier_2')->where('tier_2_id', $id)->get()->getResultArray();
        return $tier_2;
    }

    public function gettiertbyid($id)
    {
        $tier_2 = $this->db->table('tier_3')->where('tier_3_id', $id)->get()->getResultArray();
        return $tier_2;
    }

    public function gettiersfbyid($id)
    {
        $tier_2 = $this->db->table('tier_4')->where('tier_4_id', $id)->get()->getResultArray();
        return $tier_2;
    }

    public function gettier1()
    {
        return $this->findAll();
    }

    public function getTier2()
    {
        $tier = $this->db->table('tier_2')->get()->getResultArray();
        return $tier;
    }

    public function gettier3()
    {
        $tier = $this->db->table('tier_3')->get()->getResultArray();
        return $tier;
    }

    public function gettier4()
    {
        $tier = $this->db->table('tier_4')->get()->getResultArray();
        return $tier;
    }

    public function findallTier1data($id)
    {
        $tier_2 = $this->db->table('tier_2')->where('tier_1_id', $id)->get()->getResultArray();
        return $tier_2;
    }

    public function addTier1data($data)
    {
        return $this->db->table('tier_1')->insert($data);
    }

    public function addTier2data($data)
    {
        return $this->db->table('tier_2')->insert($data);
    }

    public function gettier2byid($id)
    {
        $tier2data = $this->db->table('tier_2')->where('tier_2_id', $id)->get()->getResultArray();
        return $tier2data;
    }

    public function gesttier2data($id)
    {
        return $this->db->table('tier_2')->where('tier_2_id', $id)->get()->getResultArray();
    }

    public function updatetier2data($id, $data)
    {
        return $this->db->table('tier_2')->where('tier_2_id', $id)->update($data);
    }

    public function addTier3data($data)
    {
        return $this->db->table('tier_3')->insert($data);
    }

    public function addTier4data($data)
    {
        return $this->db->table('tier_4')->insert($data);
    }

    public function getAllTier3($id)
    {
        $tier_3 = $this->db->table('tier_3')->where('tier_2_id', $id)->where('is_deleted' ,0)->get()->getResultArray();
        return $tier_3;
    }

    public function gesttier3data($id)
    {
        return $this->db->table('tier_3')->where('tier_3_id', $id)->get()->getResultArray();
    }

    public function gettier3byid($id)
    {
        $tier2data = $this->db->table('tier_3')->where('tier_3_id', $id)->get()->getResultArray();
        return $tier2data;
    }

    public function updatetier3data($id, $data)
    {
        return $this->db->table('tier_3')->where('tier_3_id', $id)->update($data);
    }

    public function getAllTier4($id)
    {
        $tier_4 = $this->db->table('tier_4')->where('tier_3_id', $id)->get()->getResultArray();
        return $tier_4;
    }

    public function gesttier4data($id)
    {
        return $this->db->table('tier_4')->where('tier_4_id', $id)->get()->getResultArray();
    }

    public function gettier4byid($id)
    {
        $tier4data = $this->db->table('tier_4')->where('tier_4_id', $id)->get()->getResultArray();
        return $tier4data;
    }

    public function updatetier4data($id, $data)
    {
        return $this->db->table('tier_4')->where('tier_4_id', $id)->update($data);
    }

    public function getTier2ByTier1($tier_1_id)
    {
        return $this->db->table('tier_2')
            ->where('tier_1_id', $tier_1_id)
            ->get()->getResultArray();
    }

    public function getTier3ByTier2($tier_2_id)
    {
        return $this->db->table('tier_3')
            ->where('tier_2_id', $tier_2_id)
            ->get()->getResultArray();
    }

    public function getTier4ByTier3($tier_3_id)
    {
        return $this->db->table('tier_4')
            ->where('tier_3_id', $tier_3_id)
            ->get()->getResultArray();
    }

    public function deleteTierById($tierId)
    {
        return $this->where('tier_1_id', $tierId)->delete();
    }

    public function deleteTierById2($tierId)
    {
        return $this->db->table('tier_2')->delete(['tier_2_id' => $tierId]);
    }

    public function deleteTierById3($tierId)
    {
        return $this->db->table('tier_3')->delete(['tier_3_id' => $tierId]);
    }
}
