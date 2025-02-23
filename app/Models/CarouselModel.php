<?php

namespace App\Models;

use CodeIgniter\Model;

class CarouselModel extends Model
{
    protected $table = 'carousel_images';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'car_title',
        'image_path',
        'image_path_mobile',
        'alt_text',
        'car_campaign_id',
        'carousel_link',
        'created_at',
        'visibility',
        'order'
    ];

    public function getcarouselcontent()
    {
        return $this->orderBy('order', 'ASC')->where('visibility', 1)->findAll();
    }

    public function getallcarimages()
    {
        return $this->orderBy('order', 'ASC')->findAll();
    }

    public function carouselupdate($id, $data)
    {
        return $this->update($id, $data);
    }
    
    public function deleteCarouselById($id)
    {
        return $this->db->table('carousel_images')->where('id', $id)->delete();
    }

    public function findallpublicdeals()
    {
        $deals = $this->db->table('deals')->orderBy('deal_order', 'ASC')->where('visibility', 1)->get()->getResultArray();
        return $deals;
    }

    public function findalldeals()
    {
        $deals = $this->db->table('deals')->orderBy('deal_order', 'ASC')->get()->getResultArray();
        return $deals;
    }
    
    public function insertnewdeal($data)
    {
        return $this->db->table('deals')->insert($data);
    }

    public function updatedeals($id, $data)
    {
        return $this->db->table('deals')->where('id', $id)->set($data)->update();
    }

    public function updatedealsposition($id, $position)
    {
        return $this->db->table('deals')->where('id', $id)->set(['deal_order' => $position])->update();
    }
    
    public function deleteDealById($id)
    {
        return $this->db->table('deals')->where('id', $id)->delete();
    }

    public function findbrandteasres()
    {
        $brandteasers = $this->db->table('brand_teasers')->orderBy('order', 'ASC')->get()->getResultArray();
        return $brandteasers;
    }

    public function findpublicbrandteasres()
    {
        $brandteasers = $this->db->table('brand_teasers')->orderBy('order', 'ASC')->where('visibility', 1)->get()->getResultArray();
        return $brandteasers;
    }

    public function inserbrandteaser($data)
    {
        return $this->db->table('brand_teasers')->insert($data);
    }

    public function updatebrandteasers($video_id, $data)
    {
        return $this->db->table('brand_teasers')->where('id', $video_id)->set($data)->update();
    }

    public function updateteaserposition($id, $position)
    {
        return $this->db->table('brand_teasers')->where('id', $id)->set(['order' => $position])->update();
    }
    
    public function deleteTeaserById($id)
    {
        return $this->db->table('brand_teasers')->where('id', $id)->delete();
    }

    public function getallcatpills()
    {
        return $this->db->table('category_pills')->orderBy('pills_order', 'ASC')->get()->getResultArray();
    }

    public function findthiscat($id)
    {
        return $this->db->table('category_pills')->where('id', $id)->get()->getResultArray();
    }

    public function addpilldata($data)
    {
        return $this->db->table('category_pills')->insert($data);
    }

    public function updatepilldata($categoryId, $data)
    {
        return $this->db->table('category_pills')->where('id', $categoryId)->set($data)->update();
    }

    public function updatepillorder($id, $order)
    {
        return $this->db->table('category_pills')->where('id', $id)->set(['pills_order' => $order])->update();
    }

    public function findbrandpromos()
    {
        $brandpromos = $this->db->table('brand_promo')->get()->getResultArray();
        return $brandpromos;
    }

    public function getbrandimage($brandid)
    {
        return $this->db->table('brands')->where('brand_id', $brandid)->select('logo')->get()->getRowArray();
    }

    public function findbrandbanner()
    {
        $brandpromo = $this->db->table('brand_promo')->where('is_default', 1)->get()->getResultArray();
        return $brandpromo;
    }

    public function findproductsgrid()
    {
        $products = $this->db->table('product_grid')->get()->getResultArray();
        return $products;
    }

    public function productgridinsert($data)
    {
        return $this->db->table('product_grid')->insert($data);
    }

    public function productgridata()
    {
        return $this->db->table('product_grid')->get()->getResultArray();
    }

    public function getcollectiondata($id)
    {
        return $this->db->table('collection_products')->where('collection_id', $id)->limit(6)->get()->getResultArray();
    }
    
    public function insercategorytrio($data)
    {
        return $this->db->table('category_trio')->insert($data);
    }
    
    public function updateCategoryTrio($categoryId, $data)
    {
        return $this->db->table('category_trio')->update($data, ['id' => $categoryId]);
    }

    public function getcategorytrio()
    {
        $catrio = $this->db->table('category_trio')->orderBy('trio_order', 'ASC')->where('trio_visibility', 1)->get()->getResultArray();
        return $catrio;
    }

    public function showcategorytrio()
    {
        return $this->db->table('category_trio')->orderBy('trio_order', 'ASC')->get()->getResultArray();
    }

    public function updateTrioOrder($id, $index)
    {
        return $this->db->table('category_trio')->where('id', $id)->update(['trio_order' => $index]);
    }

    public function deleteCategoryById($id)
    {
        return $this->db->table('category_trio')->where('id', $id)->delete();
    }
}
