<?php

namespace App\Models;

use CodeIgniter\Model;

class Brands_model extends Model
{
    protected $table = 'brands';
    protected $primaryKey = 'brand_id';
    protected $allowedFields = ['brand_name', 'vendor','city','country', 'logo','is_inactive','is_deleted','insert_datetime', 'update_datetime', 'updated_by'];

    public function getBrands()
    {
        return $this->findAll();
    }

    public function getbrandbyid($brand_id)
    {
        return $this->where('brand_id', $brand_id)->findAll();
    }

    public function publishnewbrand($data)
    {
        return $this->db->table('brands')->insert($data);
    }

    public function deletebrand($brand_id)
    {
        return $this->db->table('brands')->where('brand_id', $brand_id)->delete();
    }

    public function updatetedbrand($brand_id, $data)
    {
        return $this->db->table('brands')->where('brand_id', $brand_id)->update($data);
    }

    public function getcategory()
    {
        $cate = $this->db->table('category')->get()->getResultArray();
        return $cate;
    }

    public function deletecat($cat_id)
    {
        return $this->db->table('category')->delete(['cat_id' => $cat_id]);
    }

    public function publishcategory($data)
    {
        return $this->db->table('category')->insert($data);
    }

    public function updatetedcategory($cat_id)
    {
        $catedit = $this->db->table('category')->where('cat_id', $cat_id)->get()->getResultArray();
        return $catedit;
    }

    public function updatecategory($cat_id, $data)
    {
        return $this->db->table('category')->where('cat_id', $cat_id)->update($data);
    }
}