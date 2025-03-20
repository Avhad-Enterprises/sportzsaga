<?php

namespace App\Models;

use CodeIgniter\Model;

class Blogs_model extends Model
{
    protected $table = 'blogs';
    protected $primaryKey = 'blog_id';
    protected $allowedFields = [
        'blog_id',
        'blog_title',
        'blog_description',
        'main_description',
        'blog_visibility',
        'blog_tags',
        'blog_comments',
        'blog_image',
        'blog_metatitle',
        'blog_metadescription',
        'blog_metaurl',
        'category',
        'author_name',
        'section_title_1',
        'section_title_2',
        'section_description_1',
        'section_description_2',
        'section_image_1',
        'section_image_2',
        'section_title_3',
        'section_description_3',
        'section_image_3',
        'section_title_4',
        'section_description_4',
        'section_image_4',
        'section_title_5',
        'section_description_5',
        'section_image_5',
        'section_title_6',
        'section_description_6',
        'section_image_6',
        'section_title_7',
        'section_description_7',
        'section_image_7',
        'section_title_8',
        'section_description_8',
        'section_image_8',
        'section_title_9',
        'section_description_9',
        'section_image_9',
        'section_title_10',
        'section_description_10',
        'section_image_10',
        'blog_mobile_image',
        'publish_date_and_time',
        'end_date_and_time',
        'publish_for',
        'created_at',
        'updated_at',
        'is_deleted',
        'deleted_by',
        'deleted_at',
        'change_log'
    ];

    // Enable pagination
    protected $useTimestamps = false;

    public function getblogs()
    {
        return $this->findAll();
    }

    public function getposts($limit = 8)
    {
        return $this->where('blog_visibility', 'active')->orderBy('publish_date_and_time', 'DESC')->findAll($limit);
    }

    public function getallimages()
    {
        return $this->findAll();
    }

    public function getprivateBlogs()
    {
        return $this->where('blog_visibility', 'draft')->countAllResults();
    }

    public function countPublicBlogs()
    {
        return $this->where('blog_visibility', 'active')->countAllResults();
    }

    public function getPublicBlogs()
    {
        return $this->where('blog_visibility', 'active')->findAll();
    }

    public function getStory($id)
    {
        $storiesedit = $this->db->table('stories')->where('story_id', $id)->get()->getResultArray();
        return $storiesedit;
    }

    public function getsubsection($blog_id)
    {
        return $this->db->table('blog_subsection')->where('blog_id', $blog_id)->get()->getResultArray();
    }


    public function getcarousel()
    {
        $carousel = $this->db->table('blogs')->where('is_default', 1)->get()->getResultArray();
        return $carousel;
    }

    public function insertblogcomment($blog_id, $data)
    {
        return $this->db->table('blogs')->where('blog_id', $blog_id)->update($data);
    }

    public function getblog($blog_id)
    {
        return $this->where('blog_id', $blog_id)->findAll();
    }

    public function getAllpostsData()
    {
        return $this->where('blog_visibility', 'active')->orderBy('publish_date_and_time', 'DESC')->findAll();
    }

    public function getAllBlogData($limit = 6)
    {
        return $this->orderBy('publish_date_and_time', 'DESC')->findAll($limit);
    }

    public function getAllBlogsData($limit = 6)
    {
        return $this->where('blog_visibility', 'active')->orderBy('publish_date_and_time', 'DESC')->findAll($limit);
    }

    public function getdripspotsdata()
    {
        // Assuming 'created_at' is the timestamp column
        return $this->db->table('dripspot')->orderBy('insert_datetime', 'DESC')->get()->getResultArray();
    }

    public function getdripspots()
    {
        //return $this->db->table('dripspot')->get()->getResultArray();
        $carousel = $this->db->table('dripspot')->where('is_default', 1)->get()->getResultArray();
        return $carousel;
    }

    public function editblogsubsec($blogId)
    {
        $data = $this->db->table('blog_subsection')->where('blog_id', $blogId)->get()->getResultArray();
        return $data;
    }

    public function editblogsubsection($blogId)
    {
        $editdata = $this->db->table('blog_subsection')->where('sec_id', $blogId)->get()->getResultArray();
        return $editdata;
    }

    public function updateblogsubsection($blogId, $data)
    {
        return $this->db->table('blog_subsection')->where('sec_id', $blogId)->update($data);
    }

    public function deleteblogsubsection($blogId)
    {
        return $this->db->table('blog_subsection')->where('sec_id', $blogId)->delete();
    }

    public function getsubsectiondata($blogId)
    {
        $subdata = $this->db->table('blog_subsection')->where('blog_id', $blogId)->get()->getResultArray();
        return $subdata;
    }

    public function insertblogsubsection($data)
    {
        return $this->db->table('blog_subsection')->insertBatch($data);
    }

    public function deletePost($blog_id)
    {
        return $this->where('blog_id', $blog_id)->delete();
    }

    public function insertmyblogpost($data)
    {
        // Insert data into the database table
        return $this->insert($data);
    }

    public function updatablogsdata($blog_id, $data)
    {
        return $this->db->table('blogs')->where('blog_id', $blog_id)->update($data);
    }

    public function getblogbyid($blog_id)
    {
        return $this->where('blog_id', $blog_id)->findAll();
    }

    public function insertblogsexcwldata($data)
    {
        return $this->insertBatch($data);
    }

    public function insertstoryexcwldata($data)
    {
        return $this->db->table('stories')->insertBatch($data);
    }

    public function insertdripexcwldata($data)
    {
        return $this->db->table('dripspot')->insertBatch($data);
    }

    public function getstorymodel()
    {
        $story = $this->db->table('stories')->get()->getResultArray();
        return $story;
    }

    public function showstorymodel($id)
    {
        $show = $this->db->table('stories')->where('story_id', $id)->get()->getResultArray();
        return $show;
    }

    public function getstorydata()
    {
        $story = $this->db->table('stories')->get()->getResultArray();
        return $story;
    }

    public function deletestory($id)
    {
        return $this->db->table('stories')->delete(['story_id' => $id]);
    }

    public function getstorybyid($id)
    {
        $storiesedit = $this->db->table('stories')->where('story_id', $id)->get()->getResultArray();
        return $storiesedit;
    }

    public function showstorydata($id)
    {
        $storiesedit = $this->db->table('stories')->where('story_id', $id)->get()->getResultArray();
        return $storiesedit;
    }

    public function showstories($id)
    {
        $showstory = $this->db->table('stories')->where('story_id', $id)->get()->getResultArray();
        return $showstory;
    }

    public function getstories()
    {
        return $this->db->table('stories')->where('visibility', 'active')->where('end_date >', date('Y-m-d H:i:s'))->get()->getResultArray();
    }

    public function updatenewstory($id, $data)
    {
        return $this->db->table('stories')->where('story_id', $id)->update($data);
    }

    public function addnewstory($data)
    {
        return $this->db->table('stories')->insert($data);
    }

    public function getdripspotmodel()
    {
        $dripspot = $this->db->table('dripspot')->get()->getResultArray();
        return $dripspot;
    }

    public function publishnewdripspot($data)
    {
        return $this->db->table('dripspot')->insert($data);
    }

    public function getdripspotdata()
    {
        $dripspot = $this->db->table('dripspot')->get()->getResultArray();
        return $dripspot;
    }

    public function addnewdripspotdata($data)
    {
        return $this->db->table('dripspot_celebrity_brand')->insert($data);
    }

    public function editdripsubsec($id)
    {
        $dripsubsection = $this->db->table('dripspot_celebrity_brand')->where('dripspot_id', $id)->get()->getResultArray();
        return $dripsubsection;
    }

    public function deletedripsubmod($id)
    {
        return $this->db->table('dripspot_celebrity_brand')->delete(['cel_brand_id' => $id]);
    }

    public function gestcelebs($Id)
    {
        $subdata = $this->db->table('dripspot_celebrity_brand')->where('dripspot_id', $Id)->get()->getResultArray();
        return $subdata;
    }

    public function updateDripSpotdata($Id, $data)
    {
        return $this->db->table('dripspot_celebrity_brand')->where('cel_brand_id', $Id)->update($data);
    }

    public function getdripspotsubdata($id)
    {
        $subdata = $this->db->table('dripspot_celebrity_brand')->where('cel_brand_id', $id)->get()->getResultArray();
        return $subdata;
    }

    public function deletedripmod($id)
    {
        return $this->db->table('dripspot')->delete(['id' => $id]);
    }

    public function getdripspotbyid($id)
    {
        $dripspotedit = $this->db->table('dripspot')->where('id', $id)->get()->getResultArray();
        return $dripspotedit;
    }

    public function updatenewdripspot($id, $data)
    {
        return $this->db->table('dripspot')->where('id', $id)->update($data);
    }

    public function dripvisionmodel()
    {
        $dripspot = $this->db->table('dripvision')->get()->getResultArray();
        return $dripspot;
    }

    public function getdripvisiodata()
    {
        $dripvision = $this->db->table('dripvision')->get()->getResultArray();
        return $dripvision;
    }

    public function insertvisionexcwldata($data)
    {
        return $this->db->table('dripvision')->insertBatch($data);
    }

    public function publishdripvision($data)
    {
        return $this->db->table('dripvision')->insert($data);
    }

    public function getdripvisionbyid($id)
    {
        $subdata = $this->db->table('dripvision')->where('id', $id)->get()->getResultArray();
        return $subdata;
    }

    public function updatedripvisiondata($id, $data)
    {
        return $this->db->table('dripvision')->where('id', $id)->update($data);
    }

    public function deletedripvision($id)
    {
        return $this->db->table('dripvision')->delete(['id' => $id]);
    }

    public function InsertNewBlogTag($data)
    {
        return $this->db->table('tags')->insert($data);
    }

    public function GetComments()
    {
        return $this->db->table('blog_comments')->get()->getResultArray();
    }

    public function getblogcommentbyid($blog_id)
    {
        return $this->where('blog_id', $blog_id)->first();
    }

    public function UpdateCommentStatus($commentId, $newStatus)
    {
        return $this->db->table('blog_comments')
            ->where('id', $commentId)
            ->update(['status' => $newStatus]);
    }

    public function getPendingComments()
    {
        return $this->db->table('blog_comments')->where('user_status', 0)->countAllResults();
    }



    public function updateblog($blog_id, $data)
    {
        return $this->db->table('blogs')->where('blog_id', $blog_id)->update($data);
    }

    public function getAlllogblog()
    {
        return $this->db->table('blogs')->where('is_deleted', 1)->get()->getResultArray();
    }
}
