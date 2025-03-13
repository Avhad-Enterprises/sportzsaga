<?php

namespace App\Models;

use CodeIgniter\Model;

class onlinestoremodal extends Model
{
    protected $table = 'carousels';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'description', 'selection_type', 'product_id', 'collection_id', 'image', 'image_mobile', 'visibility', 'created_at', 'updated_at', 'added_by', 'is_deleted', 'deleted_at', 'deleted_by', 'change_log', 'updated_by'];
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
        return $this->db->table('carousels')->where('is_deleted', 0)->get()->getResultArray();
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
        $this->db->table('cartpage')->where('id', 1)->update($data);
        log_message('info', 'SQL Query: ' . $this->db->getLastQuery());
        return $this->db->affectedRows() > 0;
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
    $db = $this->db->table('error_page');

    // Fetch current record
    $oldData = $db->where('id', 1)->get()->getRowArray();
    if (!$oldData) {
        return false; // No record found
    }

    // Check for changes
    $changes = [];
    foreach ($data as $key => $value) {
        if (isset($oldData[$key]) && $oldData[$key] !== $value) {
            $changes['previous'][$key] = $oldData[$key];
            $changes['updated'][$key] = $value;
        }
    }

    if (!empty($changes)) {
        $changes['timestamp'] = date('Y-m-d H:i:s'); // Add timestamp

        // Decode existing change_log JSON
        $existingLog = json_decode($oldData['change_log'], true);
        if (!is_array($existingLog)) {
            $existingLog = []; // Initialize if null or invalid
        }

        // Append new log entry
        $existingLog[] = $changes;

        // Convert back to JSON and update data array
        $data['change_log'] = json_encode($existingLog, JSON_PRETTY_PRINT);
    }

    // Update the table
    return $db->where('id', 1)->update($data);
}


    public function getAllMembers()
    {
        return $this->db->table('team_members')->where('is_deleted', 0)->orderBy('order', 'ASC')->get()->getResultArray();
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
        return $this->db->table('policies')->where('is_deleted', 0)->get()->getResultArray();
    }

    public function restorepolicies()
    {
        return $this->db->table('policies')->where('is_deleted', 1)->get()->getResultArray();
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
        return $this->db->table('home_logo')->where('is_deleted', 0)->get()->getResultArray();
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
        return $this->db->table('header_pages')->where('is_deleted', 0)->get()->getResultArray();
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
        return $this->db->table('marquee_texts')->where('is_deleted', 0)->get()->getResultArray();
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
        return $this->db->table('products_section')->where('is_deleted', 0)->where('visibility', 1)->get()->getResultArray();
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

    public function deleteProductData($id, $data)
    {
        return $this->db->table('products_section')
            ->where('id', $id)
            ->update($data);
    }

    public function getAllonlineblogs()
    {
        return $this->db->table('onlinestore_blogs')->where('is_deleted', 0)->get()->getResultArray();
    }

    public function RestoreRelBlog($id, $data)
    {
        return $this->db->table('onlinestore_blogs')->where('id', $id)->update($data);
    }


    public function getAlllogblogs()
    {
        return $this->db->table('onlinestore_blogs')->where('is_deleted', 1)->get()->getResultArray();
    }


    public function getAlllogsmembers()
    {
        return $this->db->table('team_members')->where('is_deleted', 1)->get()->getResultArray();
    }
    public function getDeletedMarqueeTexts()
    {
        return $this->db->table('marquee_texts')
            ->select('marquee_texts.id, marquee_texts.marqueeText, marquee_texts.marqueeText_link, 
                       marquee_texts.deleted_at, 
                       u1.name as deleted_by_name, 
                       u2.name as added_by_name')
            ->join('users as u1', 'u1.user_id = marquee_texts.deleted_by', 'left') // Fetch deleted_by name
            ->join('users as u2', 'u2.user_id = marquee_texts.added_by', 'left') // Fetch added_by name
            ->where('marquee_texts.is_deleted', 1)
            ->get()
            ->getResultArray();
    }


    public function getcarouselTexts()
    {
        return $this->db->table('carousels')
            ->select('carousels.id, carousels.title, carousels.description, carousels.selection_type, 
                       carousels.deleted_at, 
                       u1.name as deleted_by_name, 
                       u2.name as added_by_name')
            ->join('users as u1', 'u1.user_id = carousels.deleted_by', 'left') // Fetch deleted_by name
            ->join('users as u2', 'u2.user_id = carousels.added_by', 'left') // Fetch added_by name
            ->where('carousels.is_deleted', 1)
            ->get()
            ->getResultArray();
    }

    public function getDeletedHeaderPages()
    {
        return $this->db->table('header_pages')
            ->select('header_pages.id, header_pages.title, header_pages.link, header_pages.subtype, header_pages.specific_item, 
                   header_pages.deleted_at, 
                   u1.name as deleted_by_name, 
                   u2.name as added_by_name')
            ->join('users as u1', 'u1.user_id = header_pages.deleted_by', 'left') // Fetch deleted_by name
            ->join('users as u2', 'u2.user_id = header_pages.added_by', 'left') // Fetch added_by name
            ->where('header_pages.is_deleted', 1)
            ->get()
            ->getResultArray();
    }
}
