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
        $publicBlogs = $model->getPublicBlogs();
        $privateBlogs = $model->getprivateBlogs();
        $data = [
            'blogCount' => $publicBlogCount,
            'posts' => $publicBlogs,
            'privateBlogs' => $privateBlogs,
        ];

        return view('blogs_view', $data);
    }

    public function deleteblog($blog_id)
    {
        $blogModel = new blogs_model();
        $blogModel->deletePost($blog_id);
        return redirect()->to('blogs')->with('success', 'Blog deleted successfully.');
    }

    public function addnewblog()
    {
        $model = new Blogs_model();
        $tagModel = new TagModel();       // Load the TagModel to fetch tags
        $userModel = new Registerusers_model();    // Load the UsersModel to fetch users
        $controlmodel = new Controls_model();

        $data['image'] = $model->getallimages();
        $data['sheader'] = $controlmodel->getMenusecondaryLinks();

        // Fetch all tags
        $data['tags'] = $tagModel->findAll();  // Fetch all tags from the tags table

        // Fetch all users
        $data['users'] = $userModel->findAll(); // Fetch all users from the users table

        return view('addnew_blog_view', $data);
    }

    public function publishmyblog()
    {
        // Load the model
        $model = new Blogs_model();

        // Initialize Google Cloud Storage
        $storage = new StorageClient([
            'keyFilePath' => WRITEPATH . 'public/mkvgsc.json',
            'projectId' => 'peak-tide-441609-r1',
        ]);
        $bucketName = 'mkv_imagesbackend';
        $bucket = $storage->bucket($bucketName);

        // Handle blog-main-image upload to Google Cloud Storage
        $blogimage = $this->request->getFile('blog-main-image');
        if ($blogimage && $blogimage->isValid() && !$blogimage->hasMoved()) {
            $fileName = $blogimage->getRandomName();
            $filePath = $blogimage->getTempName();
            $object = $bucket->upload(
                fopen($filePath, 'r'),
                [
                    'name' => 'blogs/main_images/' . $fileName,
                    'predefinedAcl' => 'publicRead',
                ]
            );
            $newblogimg = sprintf('https://storage.googleapis.com/%s/blogs/main_images/%s', $bucketName, $fileName);
        } else {
            $newblogimg = null;
        }

        // Handle blog-mobile-image upload to Google Cloud Storage
        $blogmobileimage = $this->request->getFile('blog-mobile-image');
        if ($blogmobileimage && $blogmobileimage->isValid() && !$blogmobileimage->hasMoved()) {
            $fileName = $blogmobileimage->getRandomName();
            $filePath = $blogmobileimage->getTempName();
            $object = $bucket->upload(
                fopen($filePath, 'r'),
                [
                    'name' => 'blogs/mobile_images/' . $fileName,
                    'predefinedAcl' => 'publicRead',
                ]
            );
            $newblogmobileimg = sprintf('https://storage.googleapis.com/%s/blogs/mobile_images/%s', $bucketName, $fileName);
        } else {
            $newblogmobileimg = null;
        }

        // Gather the rest of the form data
        $data = [
            'blog_title' => $this->request->getPost('blog-title'),
            'blog_description' => $this->request->getPost('blog-description'),
            'main_description' => $this->request->getPost('blog-main-content'),
            'product_tags' => implode(',', $this->request->getPost('product-tags')),
            'category' => $this->request->getPost('blog-category'),
            'blog_visibility' => $this->request->getPost('blog-visibility'),
            'is_default' => $this->request->getPost('blog-carousel'),
            'author_name' => $this->request->getPost('blog-author-name'),
            'blog_metatitle' => $this->request->getPost('blog-meta-title'),
            'blog_metadescription' => $this->request->getPost('blog-meta-description'),
            'blog_metaurl' => $this->request->getPost('blog-meta-url'),
            'blog_image' => $newblogimg,
            'blog_mobile_image' => $newblogmobileimg,
            'publish_date_and_time' => $this->request->getPost('publish_date_and_time'),
            'end_date_and_time' => $this->request->getPost('end_date_and_time'),
            'recurrence' => $this->request->getPost('recurrence'),
            'publish_for' => $this->request->getPost('publish_for'),
            'blog_quote' => $this->request->getPost('blog-quote'),
        ];

        // Handle blog subsections
        $sectionTitles = $this->request->getPost('section_title');
        $sectionDescriptions = $this->request->getPost('section_description');
        $sectionImages = $this->request->getFiles('section_image');

        // Validate the number of sections
        if (count($sectionTitles) > 10) {
            return redirect()->back()->with('error', 'You cannot add more than 10 sections.');
        }

        // Prepare the section data
        foreach ($sectionTitles as $index => $title) {
            $sectionIndex = $index + 1; // Database column indexes start from 1
            $sectionImage = $sectionImages['section_image'][$index] ?? null;
            if ($sectionImage && $sectionImage->isValid() && !$sectionImage->hasMoved()) {
                $fileName = $sectionImage->getRandomName();
                $filePath = $sectionImage->getTempName();
                $object = $bucket->upload(
                    fopen($filePath, 'r'),
                    [
                        'name' => 'blogs/sections/' . $fileName,
                        'predefinedAcl' => 'publicRead',
                    ]
                );
                $sectionImagePath = sprintf('https://storage.googleapis.com/%s/blogs/sections/%s', $bucketName, $fileName);
            } else {
                $sectionImagePath = null;
            }

            // Add each section data to the main data array
            $data["section_title_$sectionIndex"] = $title;
            $data["section_description_$sectionIndex"] = $sectionDescriptions[$index] ?? null;
            $data["section_image_$sectionIndex"] = $sectionImagePath;
        }

        // Insert main blog data
        $model->insertmyblogpost($data);

        // Redirect to a success page or display a success message
        return redirect()->to('admin_blogs')->with('success', 'Blog published successfully!');
    }



    public function editblogs($blog_id)
    {
        $model = new blogs_model();
        $data['posts'] = $model->getblogbyid($blog_id);
        return view('edit_blog_view', $data);
    }

   

    public function editmyblog($blog_id)
    {
        $model = new blogs_model();
        $blog = $model->find($blog_id);
    
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
            'keyFilePath' => WRITEPATH . 'public/mkvgsc.json', // Path to your Google Cloud credentials file
            'projectId' => 'peak-tide-441609-r1', // Your project ID
        ]);
        $bucketName = 'mkv_imagesbackend'; // Your Google Cloud bucket name
        $bucket = $storage->bucket($bucketName);
    
        // Handle main image upload
        if ($updateimage->isValid() && !$updateimage->hasMoved()) {
            $updateimagename = $updateimage->getClientName();
            $filePath = $updateimage->getTempName();
            // Upload to Google Cloud Storage
            $object = $bucket->upload(
                fopen($filePath, 'r'),
                [
                    'name' => 'blogs/main_images/' . $updateimagename,
                    'predefinedAcl' => 'publicRead', // Public access
                ]
            );
            $updateimagename = sprintf('https://storage.googleapis.com/%s/blogs/main_images/%s', $bucketName, $updateimagename);
        } else {
            $updateimagename = $currentImage;
        }
    
        // Handle mobile image upload
        if ($updatemobileimage->isValid() && !$updatemobileimage->hasMoved()) {
            $updatemobileimagename = $updatemobileimage->getClientName();
            $filePath = $updatemobileimage->getTempName();
            // Upload to Google Cloud Storage
            $object = $bucket->upload(
                fopen($filePath, 'r'),
                [
                    'name' => 'blogs/mobile_images/' . $updatemobileimagename,
                    'predefinedAcl' => 'publicRead', // Public access
                ]
            );
            $updatemobileimagename = sprintf('https://storage.googleapis.com/%s/blogs/mobile_images/%s', $bucketName, $updatemobileimagename);
        } else {
            $updatemobileimagename = $currentMobileImage;
        }
    
        // Handle additional images (section images)
        $blogData = [
            'blog_title' => $title,
            'blog_description' => $description,
            'main_description' => $mainContent,
            'blog_visibility' => $visibility,
            'is_default' => $carousel,
            'blog_image' => $updateimagename,
            'blog_mobile_image' => $updatemobileimagename,
            'blog_tags' => $this->request->getPost('blog-tags'),
            'category' => $this->request->getPost('blog-category'),
            'author_name' => $this->request->getPost('blog-author-name'),
            'blog_metatitle' => $this->request->getPost('blog-meta-title'),
            'blog_metadescription' => $this->request->getPost('blog-meta-description'),
            'blog_metaurl' => $this->request->getPost('blog-meta-url'),
        ];
    
        // Handle section images upload
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
                // Upload to Google Cloud Storage
                $object = $bucket->upload(
                    fopen($filePath, 'r'),
                    [
                        'name' => 'blogs/section_images/' . $fileName,
                        'predefinedAcl' => 'publicRead', // Public access
                    ]
                );
                $blogData[$fileKey] = sprintf('https://storage.googleapis.com/%s/blogs/section_images/%s', $bucketName, $fileName);
            } else {
                $blogData[$fileKey] = $currentImage;
            }
    
            // Section title and description
            $sectionTitleKey = 'section_title_' . $i;
            $sectionDescriptionKey = 'section_description_' . $i;
            $blogData[$sectionTitleKey] = $this->request->getPost($sectionTitleKey);
            $blogData[$sectionDescriptionKey] = $this->request->getPost($sectionDescriptionKey);
        }
    
        // Update the blog data in the database
        $model->updatablogsdata($blog_id, $blogData);
    
        return redirect()->to('admin_blogs')->with('success', 'Your blog has been updated successfully!');
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
}
