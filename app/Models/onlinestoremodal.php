<?php

namespace App\Models;

use CodeIgniter\Model;

class onlinestoremodal extends Model
{
    protected $table = 'carousels';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'description', 'selection_type', 'product_id', 'collection_id', 'image', 'image_mobile', 'visibility', 'created_at', 'updated_at'];
    protected $useTimestamps = true;

    public function getabout()
    {
        return $this->db->table('aboutpage')->where('id', 1)->get()->getRowArray();
    }

    public function getcontact()
    {
        return $this->db->table('contactpage')->where('id', 1)->get()->getRowArray();
    }

    public function getproduct_setting()
    {
        return $this->db->table('product_setting')->where('id', 1)->get()->getRowArray();
    }

    public function getsearch()
    {
        return $this->db->table('searchpage')->where('id', 1)->get()->getRowArray();
    }

    public function getwishlistpage()
    {
        return $this->db->table('wishlistpage')->where('id', 1)->get()->getRowArray();
    }

    public function getcartpage()
    {
        return $this->db->table('cartpage')->where('id', 1)->get()->getRowArray();
    }
    public function geterror_page()
    {
        return $this->db->table('error_page')->where('id', 1)->get()->getRowArray();
    }

    public function getcheckoutpage()
    {
        return $this->db->table('checkoutpage')->where('id', 1)->get()->getRowArray();
    }

    public function gettrackingpage()
    {
        return $this->db->table('trackingpage')->where('id', 1)->get()->getRowArray();
    }

    public function GetallCarouselData()
    {
        return $this->db->table('carousels')->get()->getResultArray();
    }

    public function GetallBlogsData()
    {
        return $this->db->table('blogs')->where('blog_visibility', 'active')->get()->getResultArray();
    }

    public function GetallProductsData()
    {
        return $this->db->table('products')->where('product_status', 'active')->get()->getResultArray();
    }
    public function GetallCollectionsData()
    {
        return $this->db->table('collection')->where('collection_visibility', 'visibile')->get()->getResultArray();
    }

    public function updateContact($data)
    {
        return $this->db->table('contactpage')->where('id', 1)->update($data);
    }

    public function updateSearch($data)
    {
        return $this->db->table('searchpage')->where('id', 1)->update($data);
    }

    public function updateWishlist($data)
    {
        return $this->db->table('wishlistpage')->where('id', 1)->update($data);
    }

    public function updateCart($data)
    {
        return $this->db->table('cartpage')->where('id', 1)->update($data);
    }

    public function updateCheckout($data)
    {
        return $this->db->table('checkoutpage')->where('id', 1)->update($data);
    }

    public function updateTracking($data)
    {
        return $this->db->table('trackingpage')->where('id', 1)->update($data);
    }
    public function update404($data)
    {
        return $this->db->table('error_page')->where('id', 1)->update($data);
    }

    public function getAllMembers()
    {
        return $this->db->table('team_members')->orderBy('order', 'ASC')->get()->getResultArray();
    }

    public function updateAbout($data)
    {
        return $this->db->table('aboutpage')->where('id', 1)->update($data);
    }

    public function getAllProducts()
    {
        return $this->db->table('products')->get()->getResultArray();
    }

    public function getAllBundle()
    {
        return $this->db->table('bundles')->get()->getResultArray();
    }

    public function homeimage()
    {
        return $this->db->table('home_image')->get()->getResultArray();
    }

    public function getAllpolicies()
    {
        return $this->db->table('policies')->get()->getResultArray();
    }

    public function getAllfooter()
    {
        return $this->db->table('footer_data')->where('id', 1)->get()->getRowArray();
    }

    public function getTags()
    {
        return $this->db->table('tags')->get()->getResultArray();
    }

    public function getsingleblogs()
    {
        return $this->db->table('singleblog_data')->where('id', 3)->get()->getRowArray();
    }

    public function getoscollection()
    {
        return $this->db->table('os_collections')->where('id', 1)->get()->getRowArray();
    }

    public function getoslogo()
    {
        return $this->db->table('home_logo')->get()->getResultArray();
    }

    public function getAllAvailableCollections()
    {
        return $this->db->table('collection')
            ->select('collection_id, collection_title')
            ->get()
            ->getResultArray();
    }

    public function getHomeCollectionIds()
    {
        $result = $this->db->table('home_collection')
            ->select('collection_id')
            ->where('id', 1)
            ->get()
            ->getRowArray();

        return $result['collection_id'] ?? '';
    }

    public function gethomecollection()
    {
        return $this->db->table('home_collection')->where('id', 1)->get()->getRowArray();
    }

    public function getAllAvailableProducts()
    {
        return $this->db->table('products') // Replace 'products' with your actual table name
            ->select('product_id, product_title') // Fetch only necessary field
            ->get()
            ->getResultArray(); // Return the result as an array
    }

    public function getHomeBlogIds()
    {
        $row = $this->db->table('home_blog')->where('id', 1)->get()->getRowArray();
        return $row ? explode(',', $row['blog_id']) : []; // Return an array of saved blog IDs
    }

    public function getAllCarousel2()
    {
        return $this->db->table('home_carousel2')->get()->getResultArray();
    }

    public function getImagedata()
    {
        return $this->db->table('home_image')->get()->getResultArray();
    }

    public function getproduct()
    {
        return $this->db->table('products')->select('product_id, product_title')->get()->getResultArray();
    }

    public function getallblogs()
    {
        return $this->db->table('blog_settings')->where('id', 1)->get()->getRowArray();
    }

    public function getpages()
    {
        return $this->db->table('header_pages')->get()->getResultArray();
    }


    public function GetAllCollections()
    {
        return $this->db->table('collection')->where('collection_visibility', 'visibile')->get()->getResultArray();
    }

    public function InsertHeaderFirstData($data)
    {
        return $this->db->table('header_first')->insert($data);
    }

    public function getAllmarqueeText()
    {
        return $this->db->table('marquee_texts')->get()->getResultArray();
    }

    public function getAllmarqueebottomText()
    {
        return $this->db->table('marqueebottomtext')->where('id', 1)->get()->getRowArray();
    }

    public function getAllEmail_POP_UP()
    {
        return $this->db->table('email_pop_up')->where('id', 1)->get()->getRowArray();
    }

    public function Getproductsection()
    {
        return $this->db->table('products_section')->get()->getResultArray();
    }

    public function GetProductsData()
    {
        return $this->db->table('products')->get()->getResultArray();
    }

    public function InsertProductCarData($data)
    {
        return $this->db->table('products_section')->insert($data);
    }

    public function GetProdctsBycollectionid($id)
    {
        return $this->db->table('collection')->where('collection_id', $id)->get()->getRowArray();
    }

    public function updateProductData($id, $data)
    {
        return $this->db->table('products_section')
            ->where('id', $id)
            ->update($data);
    }

    public function getAllonlineblogs()
    {
        return $this->db->table('onlinestore_blogs')->get()->getResultArray();
    }
}
