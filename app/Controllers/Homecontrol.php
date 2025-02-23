<?php

namespace App\Controllers;

use App\Models\Controls_model;
use App\Models\SocialMediaLinks_model;
use App\Models\CarouselModel;
use App\Models\brands_model;
use App\Models\Products_model;


class Homecontrol extends BaseController
{
    public function sections()
    {
        $model = new Controls_model();
        $data['sections'] = $model->getSections();
        return view('control_home_view', $data);
        //return view('dripspot_view', $data);
    }

    public function toggleSection($id)
    {
        $model = new Controls_model();
        $section = $model->find($id);

        if ($section) {
            $section['is_visible'] = !$section['is_visible'];
            $model->save($section);
            return $this->response->setJSON(['status' => 'success']);
        }

        return $this->response->setJSON(['status' => 'error', 'message' => 'Section not found']);
    }

    public function editcontrol($id)
    {
        $model = new Controls_model();
        $toogle = $this->request->getPost('tooglesection');

        $data = [
            'is_visible' => $toogle
        ];

        if ($model->updatevisible($id, $data)) {
            return redirect()->to('homecontrol');
        }

        return redirect()->to('homecontrol')->with('error', 'Failed to update visibility');
    }

    public function socialmedia()
    {
        $model = new SocialMediaLinks_model();
        $socialMediaLinks = $model->findAll();
        return view('control_socialmedia_view', ['socialMediaLinks' => $socialMediaLinks]);
    }

    public function save_social_media_links()
    {
        // Load model
        $model = new SocialMediaLinks_model();

        // Prepare data
        $data = [
            'platform' => $this->request->getPost('platform_name'),
            'link' => $this->request->getPost('platform_link'),
            'icon' => $this->request->getPost('platform_icon')
        ];
        
        $model->save($data);

        // Redirect or show success message
        return redirect()->to('homecontrol/socialmedia')->with('success', 'Social media links updated successfully.');
    }
    
    public function update_social_media_link()
    {
        // Load model
        $model = new SocialMediaLinks_model();
    
        // Prepare data
        $data = [
            'id' => $this->request->getPost('id'),
            'platform' => $this->request->getPost('platform_name'),
            'link' => $this->request->getPost('platform_link'),
            'icon' => $this->request->getPost('platform_icon')
        ];
        
        $model->save($data); // Use save() method for both insert and update
    
        // Redirect or show success message
        return redirect()->to('homecontrol/socialmedia')->with('success', 'Social media link updated successfully.');
    }
    
    public function delete_social_media_link($id)
    {
        // Load the model
        $model = new SocialMediaLinks_model();
    
        // Delete the social media link by ID
        if ($model->delete($id)) {
            // Redirect with success message
            return redirect()->to('homecontrol/socialmedia')->with('success', 'Social media link deleted successfully.');
        } else {
            // Redirect with error message
            return redirect()->to('homecontrol/socialmedia')->with('error', 'Failed to delete the social media link.');
        }
    }

    public function header()
    {
        $model = new Controls_model();
        $data['header'] = $model->getMenuLinks();
        $data['sheader'] = $model->getMenusecondaryLinks();

        return view('header_menu_view', $data);
    }

    public function addnewmenu()
    {
        return view('add_menu_view');
    }

    public function publishnewmenu()
    {
        $model = new Controls_model();
        $data = [
            'label' => $this->request->getPost('label'),
            'url' => $this->request->getPost('url'),
            'class' => 'filter'
        ];
        $model->addmenudata($data);
        return redirect()->to('header')->with('success', 'Data added successfully.');
    }

    public function addsecmenu()
    {
        return view('add_secmenu_view');
    }

    public function publishsecmenu()
    {
        $model = new Controls_model();
        $data = [
            'label' => $this->request->getPost('label'),
            'class' => $this->request->getPost('class'),
            'data_filter' => $this->request->getPost('data_filter'),
            'is_active' => true,
        ];
        $model->addsecmenudata($data);
        return redirect()->to('header');
    }
    
    public function user_control()
    {
        $model = new MenuPermissionsModel();
        $data['menuPermissions'] = $model->findAll();
        return view('user_control_view', $data);
    }

    public function drip_home_edit()
    {
        $model = new CarouselModel();
        $homecarouselmodel = new CarouselModel();
        $data['categorytrio'] = $model->showcategorytrio();
        $data['carousel_images'] = $model->orderBy('order', 'ASC')->findAll();
        $data['images'] = $model->orderBy('order', 'ASC')->findAll();
        $data['deals'] = $model->findalldeals();
        $data['brand_teasers'] = $model->findbrandteasres();
        $data['videos'] = $model->findbrandteasres();
        $data['pills'] = $model->getallcatpills();
        $data['brandpromo'] = $model->findbrandpromos();
        $data['productgrid'] = $model->findproductsgrid();
        $data['brandpromos'] = $homecarouselmodel->findbrandbanner();
        $data['brandpromo'] = $homecarouselmodel->findbrandpromos();
        $brandid = $data['brandpromo']['1']['brand_image'];
        $data['brand'] = $homecarouselmodel->getbrandimage($brandid);
        $data['productgrid'] = $homecarouselmodel->productgridata();
        $collectionid = $data['productgrid']['0']['collection_id'];
        $data['collection'] = $homecarouselmodel->getcollectiondata($collectionid);
        return view('drip_home_edit_view', $data);
    }
    
    //public function category_trio()
    //{
    //    $model = new CarouselModel();
    //    $data['categorytrio'] = $model->showcategorytrio();
    //    return view('add_category_trio_view', $data);
    //}

    public function delete_trio()
    {
        $id = $this->request->getPost('id');

        if ($id) {
            $model = new CarouselModel();

            if ($model->deleteCategoryById($id)) {
                return $this->response->setJSON(['success' => true, 'message' => 'Category deleted successfully']);
            } else {
                return $this->response->setJSON(['success' => false, 'message' => 'Failed to delete category']);
            }
        }

        return $this->response->setJSON(['success' => false, 'message' => 'No ID provided']);
    }

    public function update_trio()
    {
        $model = new CarouselModel();
    
        $categoryId = $this->request->getPost('category_id');
    
        // Handle file upload
        $imageFile = $this->request->getFile('category_image');
        $imagePath = null;
    
        if ($imageFile && $imageFile->isValid() && !$imageFile->hasMoved()) {
            $newImageName = $imageFile->getRandomName();
            $imageFile->move('uploads/', $newImageName);
            $imagePath = $newImageName;
        } else {
            if ($categoryId) {
                $imagePath = $this->request->getPost('category_pre_image');
            } else {
                return redirect()->back()->withInput()->with('error', 'Image upload failed.');
            }
        }
    
        $data = [
            'category_name' => $this->request->getPost('category_name'),
            'category_title' => $this->request->getPost('category_title'),
            'alt_text' => $this->request->getPost('cat_alt_text'),
            'category_image' => $imagePath,
            'trio_visibility' => $this->request->getPost('trio_visibility'),
            'link' => $this->request->getPost('category_link'),
            'trio_order' => 0
        ];
    
        if ($categoryId) {
            $model->updateCategoryTrio($categoryId, $data);
            return redirect()->to('drip_home_edit')->with('success', 'Category updated successfully.');
        } else {
            $model->insercategorytrio($data);
            return redirect()->to('drip_home_edit')->with('success', 'Category added successfully.');
        }
    }

    public function update_trio_order()
    {
        $order = $this->request->getPost('order');
        if ($order) {
            $order = json_decode($order, true);
            $model = new CarouselModel();

            $success = true;
            $message = '';

            foreach ($order as $position => $id) {
                if (!$model->updateTrioOrder($id, $position + 1)) {
                    $success = false;
                    $message = 'Failed to update at least one item.';
                    break;
                }
            }

            if ($success) {
                return $this->response->setJSON(['success' => true, 'message' => 'Order updated successfully']);
            } else {
                return $this->response->setJSON(['success' => false, 'message' => $message]);
            }
        }
        return $this->response->setJSON(['success' => false, 'message' => 'No order data received']);
    }

    public function save()
    {
        $model = new CarouselModel();
        $id = $this->request->getPost('id');
        $files = $this->request->getFiles();

        $alt_text = $this->request->getPost('alt_text');
        $visibility = $this->request->getPost('visibility');
        $carousel_title = $this->request->getPost('carousel_title');
        $carousel_link = $this->request->getPost('carousel_link');
        $car_campaign_id = $this->request->getPost('car_campaign_id');

        $data = [
            'alt_text' => $alt_text,
            'visibility' => $visibility,
            'car_title' => $carousel_title,
            'carousel_link' => $carousel_link,
            'car_campaign_id' => $car_campaign_id
        ];

        // Handle desktop images
        if (isset($files['image'])) {
            foreach ($files['image'] as $file) {
                if ($file->isValid()) {
                    $imagePath = $file->getRandomName();
                    $file->move('uploads/', $imagePath);

                    $data['image_path'] = $imagePath;
                }
            }
        }

        // Handle mobile images
        if (isset($files['mobile_image'])) {
            foreach ($files['mobile_image'] as $file) {
                if ($file->isValid()) {
                    $mobileImagePath = $file->getRandomName();
                    $file->move('uploads/', $mobileImagePath);

                    $data['image_path_mobile'] = $mobileImagePath;
                }
            }
        }

        // Insert or update data
        if ($id) {
            $model->update($id, $data);
        } else {
            $model->insert($data);
        }

        return redirect()->to('drip_home_edit');
    }

    public function update_carousel()
    {
        $carouselModel = new CarouselModel();
        $imageId = $this->request->getPost('image_id');

        $updateData = [];

        // Handle desktop image upload
        if ($imageFile = $this->request->getFile('new_image')) {
            if ($imageFile->isValid() && !$imageFile->hasMoved()) {
                $newImageName = $imageFile->getRandomName();
                $imageFile->move('uploads/', $newImageName);
                $updateData['image_path'] = $newImageName;
            }
        }

        // Handle mobile image upload
        if ($mobileImageFile = $this->request->getFile('mobile_image')) {
            if ($mobileImageFile->isValid() && !$mobileImageFile->hasMoved()) {
                $newMobileImageName = $mobileImageFile->getRandomName();
                $mobileImageFile->move('uploads/', $newMobileImageName);
                $updateData['image_path_mobile'] = $newMobileImageName;
            }
        }

        // Other form fields
        $altText = $this->request->getPost('alt_text');
        $carCampaignId = $this->request->getPost('car_campaign_id');
        $carouselLink = $this->request->getPost('carousel_link');
        $visibility = $this->request->getPost('visibility');
        $carousel_title = $this->request->getPost('carousel_title');

        $updateData['alt_text'] = $altText;
        $updateData['car_campaign_id'] = $carCampaignId;
        $updateData['carousel_link'] = $carouselLink;
        $updateData['visibility'] = $visibility;
        $updateData['car_title'] = $carousel_title;

        $carouselModel->update($imageId, $updateData);

        return redirect()->to('drip_home_edit')->with('success', 'Image updated successfully');
    }
    
    public function delete_image()
    {
        $id = $this->request->getPost('id');
    
        if ($id) {
            $model = new CarouselModel();
    
            if ($model->deleteCarouselById($id)) {
                return $this->response->setJSON(['success' => true, 'message' => 'Carousel image deleted successfully']);
            } else {
                return $this->response->setJSON(['success' => false, 'message' => 'Failed to delete carousel image']);
            }
        }
    
        return $this->response->setJSON(['success' => false, 'message' => 'No ID provided']);
    }

    public function update_order()
    {
        $carouselModel = new CarouselModel();
        $order = $this->request->getPost('order');
        $orderArray = json_decode($order, true);
        $db = \Config\Database::connect();
        $builder = $db->table('carousel_images');
        foreach ($orderArray as $index => $id) {
            $builder->where('id', $id)->update(['order' => $index + 1]);
        }
        return $this->response->setJSON(['status' => 'success', 'message' => 'Order updated successfully']);
    }

    public function edit_carousel()
    {
        $model = new CarouselModel();
        $data['images'] = $model->getallcarimages();
        return view('carousel_form', $data);
    }

    public function edit_deals()
    {
        $model = new CarouselModel();
        $data['deals'] = $model->findalldeals();
        return view('deal_add_view', $data);
    }

    public function save_deal()
    {
        $model = new CarouselModel();
        $id = $this->request->getPost('id');
        $deal_title = $this->request->getPost('carousel_title');
        $deal_link = $this->request->getPost('deal_link');
        $alt_text = $this->request->getPost('alt_text');
        $start_date = $this->request->getPost('start_date');
        $end_date = $this->request->getPost('end_date');
        $visibility = $this->request->getPost('visibility');
        $deal_campaign_id = $this->request->getPost('car_campaign_id');

        $data = [
            'deal_title' => $deal_title,
            'deal_link' => $deal_link,
            'alt_text' => $alt_text,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'visibility' => $visibility,
            'deal_campaign_id' => $deal_campaign_id,
        ];

        $desktop_images = $this->request->getFiles('image');
        if ($desktop_images && $desktop_images['image']) {
            foreach ($desktop_images['image'] as $file) {
                if ($file->isValid()) {
                    $imagePath = $file->getRandomName();
                    $file->move('uploads/', $imagePath);
                    $data['image_path'] = $imagePath;
                }
            }
        }

        $mobile_images = $this->request->getFiles('mobile_image');
        if ($mobile_images && $mobile_images['mobile_image']) {
            foreach ($mobile_images['mobile_image'] as $file) {
                if ($file->isValid()) {
                    $mobileImagePath = $file->getRandomName();
                    $file->move('uploads/', $mobileImagePath);
                    $data['image_path_mobile'] = $mobileImagePath;
                }
            }
        }

        if ($id) {
            $model->updatedeal($id, $data);
        } else {
            $model->insertnewdeal($data);
        }

        return redirect()->to('drip_home_edit');
    }
    
    public function delete_deal()
    {
        $id = $this->request->getPost('id');
    
        if ($id) {
            $model = new CarouselModel();
    
            if ($model->deleteDealById($id)) {
                return $this->response->setJSON(['success' => true, 'message' => 'Deal deleted successfully']);
            } else {
                return $this->response->setJSON(['success' => false, 'message' => 'Failed to delete deal']);
            }
        }
    
        return $this->response->setJSON(['success' => false, 'message' => 'No ID provided']);
    }

    public function update_deal($id)
    {
        $model = new CarouselModel();
        $deal_title = $this->request->getPost('carousel_title');
        $deal_link = $this->request->getPost('deal_link');
        $alt_text = $this->request->getPost('alt_text');
        $start_date = $this->request->getPost('start_date');
        $end_date = $this->request->getPost('end_date');
        $visibility = $this->request->getPost('visibility');
        $deal_campaign_id = $this->request->getPost('campaign_id');
        $data = [
            'deal_title' => $deal_title,
            'deal_link' => $deal_link,
            'alt_text' => $alt_text,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'visibility' => $visibility,
            'deal_campaign_id' => $deal_campaign_id,
        ];
        $desktop_images = $this->request->getFiles('new_image');
        if ($desktop_images && $desktop_images['new_image']) {
            foreach ($desktop_images['new_image'] as $file) {
                if ($file->isValid()) {
                    $imagePath = $file->getRandomName();
                    $file->move('uploads/', $imagePath);
                    $data['image_path'] = $imagePath;
                }
            }
        }
        $mobile_images = $this->request->getFiles('mobile_image');
        if ($mobile_images && $mobile_images['mobile_image']) {
            foreach ($mobile_images['mobile_image'] as $file) {
                if ($file->isValid()) {
                    $mobileImagePath = $file->getRandomName();
                    $file->move('uploads/', $mobileImagePath);
                    $data['image_path_mobile'] = $mobileImagePath;
                }
            }
        }
        $model->updatedeals($id, $data);
        return redirect()->to('drip_home_edit');
    }

    public function update_deal_order()
    {
        $order = $this->request->getPost('order');
        if ($order) {
            $order = json_decode($order, true);
            $model = new CarouselModel();

            foreach ($order as $position => $id) {
                $model->updatedealsposition($id, ['order' => $position + 1]);
            }

            return $this->response->setJSON(['success' => true]);
        }
        return $this->response->setJSON(['success' => false]);
    }

    public function edit_brand_teaser()
    {
        $model = new CarouselModel();
        $data['brand_teasers'] = $model->findbrandteasres();
        $data['videos'] = $model->findbrandteasres();
        return view('brand_teaser_add_view', $data);
    }

    public function save_brand_teaser()
    {
        $model = new CarouselModel();
        $files = $this->request->getFiles();
        $product_url = $this->request->getPost('product_link');
        $alt_text = $this->request->getPost('alt_text');
        $visibility = $this->request->getPost('visibility');
        $teaser_campaign_id = $this->request->getPost('teaser_campaign_id');

        $data = [
            'teaser_campaign_id' => $teaser_campaign_id,
            'alt_text' => $alt_text,
            'visibility' => $visibility,
            'product_link' => $product_url,
        ];

        if ($files['video']) {
            foreach ($files['video'] as $file) {
                if ($file->isValid()) {
                    $videoPath = $file->getRandomName();
                    $file->move('uploads/videos/', $videoPath);

                    $data['video_path'] = $videoPath;

                    $model->insertbrandteaser($data);
                }
            }
        } else {
            $model->insertbrandteaser($data);
        }

        return redirect()->to('drip_home_edit');
    }

    public function update_video()
    {
        $model = new CarouselModel();

        $video_id = $this->request->getPost('video_id');
        $product_url = $this->request->getPost('product_link');
        $alt_text = $this->request->getPost('alt_text');
        $visibility = $this->request->getPost('visibility');
        $teaser_campaign_id = $this->request->getPost('teaser_campaign_id');

        $data = [
            'product_link' => $product_url,
            'alt_text' => $alt_text,
            'visibility' => $visibility,
            'teaser_campaign_id' => $teaser_campaign_id,
        ];

        $file = $this->request->getFile('new_video');
        if ($file->isValid() && !$file->hasMoved()) {
            $videoPath = $file->getRandomName();
            $file->move('uploads/videos/', $videoPath);

            $data['video_path'] = $videoPath;
        }

        if ($video_id) {
            $model->updatebrandteasers($video_id, $data);
        }

        return redirect()->to('drip_home_edit')->with('message', 'Video updated successfully');
    }
    
    public function delete_teaser()
    {
        $id = $this->request->getPost('id');
    
        if ($id) {
            $model = new CarouselModel();
    
            if ($model->deleteTeaserById($id)) {
                return $this->response->setJSON(['success' => true, 'message' => 'Teaser video deleted successfully']);
            } else {
                return $this->response->setJSON(['success' => false, 'message' => 'Failed to delete teaser video']);
            }
        }
    
        return $this->response->setJSON(['success' => false, 'message' => 'No ID provided']);
    }

    public function update_teaser_order()
    {
        $order = $this->request->getPost('order');
        if ($order) {
            $order = json_decode($order, true);
            $model = new CarouselModel();

            foreach ($order as $position => $id) {
                $model->updateteaserposition($id, ['order' => $position + 1]);
            }

            return $this->response->setJSON(['success' => true]);
        }
        return $this->response->setJSON(['success' => false]);
    }

    public function add_new_pill()
    {
        $model = new CarouselModel();
        $data['pills'] = $model->getallcatpills();
        return view('add_new_pill_view', $data);
    }

    public function get_category($id)
    {
        $categoryModel = new CarouselModel();
        $category = $categoryModel->findthiscat($id);

        return $this->response->setJSON($category);
    }

    public function reorder_pills()
    {
        $categoryModel = new CarouselModel();
        $order = $this->request->getJSON()->order;

        foreach ($order as $position => $id) {
            $categoryModel->updatepillorder($id, ['pills_order' => $position + 1]);
        }

        return $this->response->setJSON(['status' => 'success']);
    }

    public function add_pill()
    {
        $categoryModel = new CarouselModel();

        $data = [
            'category_name' => $this->request->getPost('category_name'),
            'category_link' => $this->request->getPost('category_link')
        ];

        $categoryId = $this->request->getPost('category_id');

        // If there's an ID, update the category; otherwise, insert a new one
        if (!empty($categoryId)) {
            // Update existing category
            $categoryModel->updatepilldata($categoryId, $data);
        } else {
            // Add new category
            $categoryModel->addpilldata($data);
        }

        return redirect()->to('add/add_new_pill');
    }

    public function add_promo()
    {
        $brandModel = new brands_model();
        $data['brands'] = $brandModel->getBrands();
        return view('add_promo_view', $data);
    }

    public function save_promo()
    {
        $model = new CarouselModel();
        // Validate and retrieve the form data
        $collectionName = $this->request->getPost('collection_name');
        $brandImage = $this->request->getPost('brand-name');
        $description = $this->request->getPost('coll_description');
        $startingPrice = $this->request->getPost('starting_price');
        $link = $this->request->getPost('product_link_1');

        // Handle banner image upload
        $bannerImage = $this->request->getFile('banner_image');
        if ($bannerImage && $bannerImage->isValid()) {
            $bannerImageName = $bannerImage->getRandomName();
            $bannerImage->move('uploads/', $bannerImageName);
        }

        // Handle product images upload
        $productImages = [];
        for ($i = 1; $i <= 4; $i++) {
            $productImage = $this->request->getFile('product_image_' . $i);
            if ($productImage && $productImage->isValid()) {
                $imageName = $productImage->getRandomName();
                $productImage->move('uploads/', $imageName);
                $productImages[] = $imageName;
            } else {
                $productImages[] = null;
            }
        }

        $data = [
            'collection_name'   => $collectionName,
            'main_image'        => isset($bannerImageName) ? $bannerImageName : null,
            'brand_image'       => $brandImage,
            'description'       => $description,
            'starting_price'    => $startingPrice,
            'link'              => $link,
            'product_image_1'   => $productImages[0] ?? null,
            'product_link_1'    => $this->request->getPost('product_link_1'),
            'product_image_2'   => $productImages[1] ?? null,
            'product_link_2'    => $this->request->getPost('product_link_2'),
            'product_image_3'   => $productImages[2] ?? null,
            'product_link_3'    => $this->request->getPost('product_link_3'),
            'product_image_4'   => $productImages[3] ?? null,
            'product_link_4'    => $this->request->getPost('product_link_4'),
        ];
        
        $model->addproductpromodata($data);

        return redirect()->to('drip_home_edit')->with('success', 'Promo successfully added');
    }

    public function add_product_grid()
    {
        $productModel = new Products_model();
        $data['collections'] = $productModel->getcollectionsdata();
        $data['products'] = $productModel->getproductsdata();
        return view('add_product_grid_view', $data);
    }

    public function publish_productgrid()
    {
        // Load the model
        $productGridModel = new CarouselModel();

        // Process file upload
        $file = $this->request->getFile('grid_banner_image');
        $newName = $file->getRandomName();
        $file->move('uploads/', $newName);

        // Get data from the form
        $data = [
            'name' => $this->request->getPost('title'),
            'banner_image' => $newName,
            'banner_text' => $this->request->getPost('baner_text'),
            'banner_link' => $this->request->getPost('banner_link'),
            'collection_id' => $this->request->getPost('selection-type') === 'collection' ? $this->request->getPost('collection_id') : null,
            'product_id' => $this->request->getPost('selection-type') === 'product' ? json_encode($this->request->getPost('products')) : null,
        ];

        // Insert data into the database
        $productGridModel->productgridinsert($data);

        // Redirect with a success message
        return redirect()->to(base_url('drip_home_edit'))->with('message', 'Product grid added successfully!');
    }
}
