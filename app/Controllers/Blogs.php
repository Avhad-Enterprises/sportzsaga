<?php

namespace App\Controllers;

use App\Models\blogs_model;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
use App\Models\Controls_model;
use App\Models\TagModel;
use App\Models\Registerusers_model;
use Google\Cloud\Storage\StorageClient;
use App\Models\CategoryModel;

class Blogs extends BaseController
{
    public function __construct()
    {
        helper(['url', 'form']);
    }

    public function blogs()
    {
        $model = new blogs_model();
        $publicBlogCount = $model->countPublicBlogs();
        $publicBlogs = $model->where('is_deleted', 0)->getPublicBlogs();
        $privateBlogs = $model->getprivateBlogs();
        $pendingCommentsCount = $model->getPendingComments();
        $data = [
            'blogCount' => $publicBlogCount,
            'posts' => $publicBlogs,
            'privateBlogs' => $privateBlogs,
            'pendingComments' => $pendingCommentsCount,
        ];

        return view('blogs_view', $data);
    }

    public function deleteblog($blog_id)
    {
        $blogModel = new blogs_model();
        $session = session();
        $deletedBy = $session->get('admin_name') . ' (' . $session->get('user_id') . ')';

        // Check if the blog exists
        $blog = $blogModel->find($blog_id);
        if (!$blog) {
            return redirect()->to('admin_blogs')->with('error', 'Blog not found.');
        }

        // Prepare data for soft delete
        $data = [
            'is_deleted' => 1,
            'deleted_by' => $deletedBy,
            'deleted_at' => date('Y-m-d H:i:s'),
        ];

        // Update the blog instead of hard delete
        if ($blogModel->updateblog($blog_id, $data)) {
            return redirect()->to('admin_blogs')->with('success', 'Blog deleted successfully.');
        } else {
            return redirect()->to('admin_blogs')->with('error', 'Failed to delete blog.');
        }
    }


    public function restoreBlog($blog_id)
    {
        $blogModel = new blogs_model();

        // Check if the blog exists
        $blog = $blogModel->find($blog_id);
        if (!$blog) {
            return redirect()->to('admin_blogs')->with('error', 'Blog not found.');
        }

        // Prepare data for restoring
        $data = [
            'is_deleted' => 0,
            'deleted_by' => null,
            'deleted_at' => null,
        ];

        // Restore the blog
        if ($blogModel->updateblog($blog_id, $data)) {
            return redirect()->to('admin_blogs')->with('success', 'Blog restored successfully.');
        } else {
            return redirect()->to('admin_blogs')->with('error', 'Failed to restore blog.');
        }
    }


    public function bloglogs()
    {
        $model = new blogs_model();
        $data['blogs'] = $model->getAlllogblog();
        return view('blog_logs_view', $data);
    }



    public function addnewblog()
    {
        $model = new Blogs_model();
        $tagModel = new TagModel();       // Load the TagModel to fetch tags
        $userModel = new Registerusers_model();    // Load the UsersModel to fetch users
        $controlmodel = new Controls_model();
        $catmodel = new CategoryModel();
        $data['categories'] = $catmodel->getAllCategories();

        $data['image'] = $model->getallimages();
        $data['sheader'] = $controlmodel->getMenusecondaryLinks();

        // Fetch all tags
        $data['tags'] = $tagModel->findAll();

        // Fetch all users
        $data['users'] = $userModel->findAll();

        return view('addnew_blog_view', $data);
    }

    public function addCategory()
    {
        $categoryModel = new CategoryModel();

        $categoryName = $this->request->getPost('category_name');
        $categoryValue = $this->request->getPost('category_value');

        // Validate input
        if (!$categoryName || !$categoryValue) {
            return $this->response->setJSON(['success' => false, 'message' => 'Invalid input.']);
        }

        // Save to database
        $data = [
            'category_name' => $categoryName,
            'category_value' => $categoryValue,
        ];

        $insertId = $categoryModel->insert($data);

        if ($insertId) {
            return $this->response->setJSON(['success' => true, 'id' => $insertId, 'name' => $categoryName, 'value' => $categoryValue]);
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'Failed to add category.']);
        }
    }

    public function publishmyblog()
    {
        // Load the model
        $model = new Blogs_model();
        $db = db_connect();

        // Initialize Google Cloud Storage
        $storage = new StorageClient([
            'keyFilePath' => WRITEPATH . 'public/mkvgsc.json',
            'projectId' => 'peak-tide-441609-r1',
        ]);
        $bucketName = 'mkv_imagesbackend';
        $bucket = $storage->bucket($bucketName);

        // Handle blog-pc-image upload to Google Cloud Storage
        $newblogimg = $this->uploadImage($this->request->getFile('blog-pc-image'), 'blogs/main_images/', $bucket);

        // Handle blog-mobile-image upload to Google Cloud Storage
        $newblogmobileimg = $this->uploadImage($this->request->getFile('blog-mobile-image'), 'blogs/mobile_images/', $bucket);

        // Generate Meta URL from Title
        $metaUrl = $this->generateSlug($this->request->getPost('blog-title'));

        // Fetch the selected tags from the form
        $blogTags = $this->request->getPost('blog-tags');

        // Convert the array into a JSON string (if not empty)
        $blogTagsJson = !empty($blogTags) ? json_encode($blogTags) : json_encode([]);

        // Gather the rest of the form data
        $data = [
            'blog_title' => $this->request->getPost('blog-title'),
            'blog_description' => $this->request->getPost('blog-description'),
            'main_description' => $this->request->getPost('blog-main-content'),
            'blog_tags' => $blogTagsJson,
            'category' => $this->request->getPost('blog-category'),
            'blog_visibility' => $this->request->getPost('blog-visibility'),
            'author_name' => $this->request->getPost('blog-author-name'),
            'blog_metatitle' => $this->request->getPost('blog-meta-title'),
            'blog_metadescription' => $this->request->getPost('blog-meta-description'),
            'blog_metaurl' => $metaUrl,
            'blog_image' => $newblogimg,
            'blog_mobile_image' => $newblogmobileimg,
            'publish_date_and_time' => $this->request->getPost('publish_date_and_time'),
            'end_date_and_time' => $this->request->getPost('end_date_and_time'),
            'recurrence' => $this->request->getPost('recurrence'),
            'publish_for' => $this->request->getPost('publish_for'),
            'blog_quote' => $this->request->getPost('blog-quote'),
            'category' => $this->request->getPost('blog_category'),
        ];

        // Handle blog subsections
        $sectionTitles = $this->request->getPost('section_title');
        $sectionDescriptions = $this->request->getPost('section_description');
        $sectionImages = $this->request->getFiles('section_image');

        // Validate number of sections (Max 10)
        if (count($sectionTitles) > 10) {
            return redirect()->back()->with('error', 'You cannot add more than 10 sections.');
        }

        // Process and store subsections
        foreach ($sectionTitles as $index => $title) {
            $sectionIndex = $index + 1; // Column indexing starts from 1
            $sectionImage = isset($sectionImages['section_image'][$index]) ? $sectionImages['section_image'][$index] : null;

            // Upload section image if available
            $sectionImagePath = $this->uploadImage($sectionImage, 'blogs/sections/', $bucket);

            // Add section data dynamically to the main data array
            $data["section_title_$sectionIndex"] = $title;
            $data["section_description_$sectionIndex"] = $sectionDescriptions[$index] ?? null;
            $data["section_image_$sectionIndex"] = $sectionImagePath;
        }

        // Insert blog data into database
        $model->insertmyblogpost($data);

        // Redirect to success page
        return redirect()->to('admin_blogs')->with('success', 'Blog published successfully!');
    }

    private function uploadImage($image, $folder, $bucket)
    {
        if ($image && $image->isValid() && !$image->hasMoved()) {
            $fileName = $image->getRandomName();
            $filePath = $image->getTempName();
            $object = $bucket->upload(
                fopen($filePath, 'r'),
                [
                    'name' => $folder . $fileName,
                    'predefinedAcl' => 'publicRead',
                ]
            );
            return sprintf('https://storage.googleapis.com/%s/%s%s', $bucket->name(), $folder, $fileName);
        }
        return null;
    }

    private function generateSlug($title)
    {
        return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title), '-'));
    }

    public function editblogs($blog_id)
    {
        $model = new blogs_model();
        $tagModel = new TagModel();
        $data['posts'] = $model->getblogbyid($blog_id);
        $catmodel = new CategoryModel();
        $data['categories'] = $catmodel->getAllCategories();
        $data['tags'] = $tagModel->findAll();
        return view('edit_blog_view', $data);
    }

    public function editmyblog($blog_id)
    {
        $model = new blogs_model();
        $blog = $model->find($blog_id);
        $session = session();

        $title = $this->request->getPost('blog-title');
        $description = $this->request->getPost('blog-description');
        $mainContent = $this->request->getPost('blog-main-content');
        $visibility = $this->request->getPost('blog-visibility');
        $carousel = $this->request->getPost('blog-carousel');
        $updateimage = $this->request->getFile('blog-main-image');
        $updatemobileimage = $this->request->getFile('blog-mobile-image');

        $currentImage = $this->request->getPost('current-blog-image');
        $currentMobileImage = $this->request->getPost('current-blog-mobile-image');

        // Initialize Google Cloud Storage client
        $storage = new StorageClient([
            'keyFilePath' => WRITEPATH . 'public/mkvgsc.json',
            'projectId' => 'peak-tide-441609-r1',
        ]);
        $bucketName = 'mkv_imagesbackend';
        $bucket = $storage->bucket($bucketName);

        // Handle main image upload
        if ($updateimage->isValid() && !$updateimage->hasMoved()) {
            $updateimagename = $updateimage->getClientName();
            $filePath = $updateimage->getTempName();
            $object = $bucket->upload(
                fopen($filePath, 'r'),
                ['name' => 'blogs/main_images/' . $updateimagename, 'predefinedAcl' => 'publicRead']
            );
            $updateimagename = sprintf('https://storage.googleapis.com/%s/blogs/main_images/%s', $bucketName, $updateimagename);
        } else {
            $updateimagename = $currentImage;
        }

        // Handle mobile image upload
        if ($updatemobileimage->isValid() && !$updatemobileimage->hasMoved()) {
            $updatemobileimagename = $updatemobileimage->getClientName();
            $filePath = $updatemobileimage->getTempName();
            $object = $bucket->upload(
                fopen($filePath, 'r'),
                ['name' => 'blogs/mobile_images/' . $updatemobileimagename, 'predefinedAcl' => 'publicRead']
            );
            $updatemobileimagename = sprintf('https://storage.googleapis.com/%s/blogs/mobile_images/%s', $bucketName, $updatemobileimagename);
        } else {
            $updatemobileimagename = $currentMobileImage;
        }

        // Fetch selected tags
        $blogTags = $this->request->getPost('blog-tags');
        $blogTagsJson = !empty($blogTags) ? json_encode($blogTags) : json_encode([]);

        // Prepare data for update
        $blogData = [
            'blog_title' => $title,
            'blog_description' => $description,
            'main_description' => $mainContent,
            'blog_visibility' => $visibility,
            'is_default' => $carousel,
            'blog_image' => $updateimagename,
            'blog_mobile_image' => $updatemobileimagename,
            'blog_tags' => $blogTagsJson,
            'category' => $this->request->getPost('blog-category'),
            'author_name' => $this->request->getPost('blog-author-name'),
            'blog_metatitle' => $this->request->getPost('blog-meta-title'),
            'blog_metadescription' => $this->request->getPost('blog-meta-description'),
            'blog_metaurl' => $this->request->getPost('blog-meta-url'),
        ];

        // Handle section images
        for ($i = 1; $i <= 10; $i++) {
            $fileKey = 'section_image_' . $i;
            $file = $this->request->getFile($fileKey);
            $removeImage = $this->request->getPost('remove_image_' . $i);
            $currentImageKey = 'current_section_image_' . $i;
            $currentImage = $this->request->getPost($currentImageKey);

            if ($removeImage === '1') {
                $blogData[$fileKey] = null;
            } elseif ($file && $file->isValid() && !$file->hasMoved()) {
                $fileName = $file->getClientName();
                $filePath = $file->getTempName();
                $object = $bucket->upload(
                    fopen($filePath, 'r'),
                    ['name' => 'blogs/section_images/' . $fileName, 'predefinedAcl' => 'publicRead']
                );
                $blogData[$fileKey] = sprintf('https://storage.googleapis.com/%s/blogs/section_images/%s', $bucketName, $fileName);
            } else {
                $blogData[$fileKey] = $currentImage;
            }

            $sectionTitleKey = 'section_title_' . $i;
            $sectionDescriptionKey = 'section_description_' . $i;
            $blogData[$sectionTitleKey] = $this->request->getPost($sectionTitleKey);
            $blogData[$sectionDescriptionKey] = $this->request->getPost($sectionDescriptionKey);
        }

        // **CHANGE LOG FUNCTIONALITY**
        $changeLog = [];
        foreach ($blogData as $key => $value) {
            if ($value != $blog[$key]) {
                $changeLog[$key] = ['old' => $blog[$key], 'new' => $value];
            }
        }

        // If there are changes, log them
        if (!empty($changeLog)) {
            $newLogEntry = [
                'updated_by' => $session->get('admin_name') . ' (' . $session->get('user_id') . ')',
                'changes' => $changeLog,
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            // Retrieve existing change log and append new changes
            $existingChangeLog = json_decode($blog['change_log'], true);
            if (!is_array($existingChangeLog)) {
                $existingChangeLog = [];
            }

            $existingChangeLog[] = $newLogEntry; // Append new entry

            $blogData['change_log'] = json_encode($existingChangeLog); // Save updated change log
        }

        // **Update only if there are changes**
        if (!empty($changeLog)) {
            $model->updatablogsdata($blog_id, $blogData);
            return redirect()->to('admin_blogs')->with('success', 'Your blog has been updated successfully!');
        } else {
            return redirect()->to('admin_blogs')->with('info', 'No changes were made.');
        }
    }



    public function exporttoexcel()
    {
        // Load the model
        $model = new blogs_model();

        // Retrieve data from the model
        $data = $model->findAll();

        // Load the Spreadsheet class
        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set column headers
        $column = 'A';
        foreach ($data[0] as $key => $value) {
            $sheet->setCellValue($column . '1', $key);
            $column++;
        }

        // Populate data rows
        $row = 2;
        foreach ($data as $row_data) {
            $column = 'A';
            foreach ($row_data as $value) {
                $sheet->setCellValue($column . $row, $value);
                $column++;
            }
            $row++;
        }

        // Set headers
        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $filename = 'Blogs_data.xlsx';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
    }

    public function importfromexcel()
    {
        return view('import_blogs_view');
    }

    public function importexceldata()
    {
        // Load the model
        $model = new blogs_model();

        // Handle file upload
        $file = $this->request->getFile('excel_file');

        // Validate file
        if ($file->isValid() && $file->getExtension() === 'xlsx') {
            // Load the Excel file
            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($file->getPathname());

            // Get the first worksheet
            $worksheet = $spreadsheet->getActiveSheet();

            // Get the headers from the first row
            $headers = [];
            $headerRow = $worksheet->getRowIterator(1)->current();
            foreach ($headerRow->getCellIterator() as $cell) {
                $headers[] = $cell->getValue();
            }

            // Loop through rows starting from the second row and extract data
            $data = [];
            foreach ($worksheet->getRowIterator(2) as $row) {
                $rowData = [];
                $cellIterator = $row->getCellIterator();
                $cellIterator->setIterateOnlyExistingCells(false); // Loop through all cells, even if they are empty
                foreach ($cellIterator as $cell) {
                    $columnIndex = $cell->getColumn();
                    $headerIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($columnIndex) - 1;
                    $columnName = $headers[$headerIndex] ?? null;
                    if ($columnName !== null) {
                        $cellValue = $cell->getValue();
                        $rowData[$columnName] = $cellValue;
                    }
                }
                $data[] = $rowData;
            }

            // Process and insert data into the database
            $model->insertblogsexcwldata($data);

            // Provide feedback to user
            return redirect()->to('blogs');
        } else {
            echo 'Invalid file format. Please upload an Excel file.';
        }
    }

    public function AddNewTag()
    {
        $Model = new blogs_model();

        // Load session
        $session = session();
        $addedby = $session->get('admin_name') . '(' . $session->get('user_id') . ')';

        // Get AJAX request data
        $tagName = $this->request->getPost('tag_name');
        $tagValue = $this->request->getPost('tag_value');

        if (empty($tagName) || empty($tagValue)) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Tag Name and Value are required']);
        }

        // Insert into database
        $data = [
            'tag_name' => $tagName,
            'tag_value' => $tagValue,
            'type' => 'Blogs',
            'created_at' => date('Y-m-d H:i:s'),
            'added_by' => $addedby,
        ];

        if ($Model->InsertNewBlogTag($data)) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Tag added successfully']);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to add tag']);
        }
    }

    public function GetComments()
    {
        $Model = new blogs_model();
        $data['comments'] = $Model->GetComments();
        if (!empty($data['comments'])) {
            $blogid = $data['comments'][0]['blog_id'];
            $data['posts'] = $Model->getblogcommentbyid($blogid);
        } else {
            $data['posts'] = null;
        }
        return view('blog_comments', $data);
    }

    public function approved($id)
    {
        $Model = new blogs_model();

        // Insert into database
        $data = [
            'status' => 'approved',
        ];


        if ($Model->UpdateBlogCommentstatus($data)) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Tag added successfully']);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to add tag']);
        }
    }

    public function UpdateCommentStatus()
    {
        if ($this->request->isAJAX()) {
            $commentId = $this->request->getPost('comment_id');
            $newStatus = $this->request->getPost('status');

            if (!isset($commentId) || !in_array($newStatus, [0, 1, 2])) {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Invalid request.']);
            }

            $Model = new blogs_model();
            $update = $Model->UpdateCommentStatus($commentId, $newStatus);

            if ($update) {
                $message = ($newStatus == 1) ? 'Comment Approved!' : 'Comment Rejected!';
                return $this->response->setJSON(['status' => 'success', 'message' => $message]);
            } else {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to update status.']);
            }
        }

        return redirect()->back();
    }


    public function Blogs_logs($blogId)
    {
        $blogModel = new blogs_model();
        
        // Get the blog post details
        $post = $blogModel->find($blogId);
        
        if (!$post) {
            return redirect()->to('blogs')->with('error', 'Blog post not found');
        }
        
        // Get the change logs for this blog
        $updates = $blogModel->getBlogChangeLogs($blogId);
        
        $data = [
            'title' => 'Blog Update History',
            'post' => $post,
            'updates' => $updates
        ];
        
        // Return the view with the data
        return view('edit_blog_logs_view', $data);
    }
}
