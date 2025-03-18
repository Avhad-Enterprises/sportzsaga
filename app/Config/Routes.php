<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->group('', ['filter' => 'super_admin'], function ($routes) {
   $routes->get('registeredusers/exportuserstoexcel', 'Registeredusers::exportuserstoexcel');
   $routes->get('route-manager', 'RouteManager::index');
   $routes->post('route-manager/update', 'RouteManager::update');
});

$routes->group('', ['filter' => 'employee'], function ($routes) { });

$routes->group('', ['filter' => 'seller'], function ($routes) { });

$routes->group('dashboard', ['filter' => 'superAdminViewOrEmployee'], function ($routes) {
   $routes->get('admin_blogs', 'Blogs::blogs');
});

$routes->group('', ['filter' => 'super_admin_or_employee'], function ($routes) {

   // registeredusers Controller
   $routes->get('registeredusers', 'Registeredusers');
   $routes->get('registeredusers/add_new_user', 'Registeredusers::add_new_user');
   $routes->get('registeredusers/importfromexcel', 'Registeredusers::importfromexcel');
   $routes->post('registeredusers/importusersfromexcel', 'Registeredusers::importusersfromexcel');
   $routes->post('registeredusers/publish_new_user', 'Registeredusers::publish_new_user');
   $routes->get('registeredusers/deleteuser/(:num)', 'Registeredusers::deleteuser/$1');
   $routes->get('employee/logs', 'Registeredusers::logs');
   $routes->get('employee', 'Registeredusers::employee');
   $routes->get('employee/editempolyee/(:num)', 'Registeredusers::editempolyee/$1');
   $routes->post('employee/updateempolyee/(:num)', 'Registeredusers::updateempolyee/$1');
   $routes->get('sellers', 'Registeredusers::sellers');
   $routes->get('sellers/editsellers/(:num)', 'Registeredusers::editseller/$1');
   $routes->post('sellers/updateseller/(:num)', 'Registeredusers::updateseller/$1');
   $routes->post('update_profile/(:num)', 'Registeredusers::update_profile/$1');
   $routes->get('users/view_all_orders/(:num)', 'Registeredusers::view_all_orders/$1');
   $routes->get('edit/user/(:num)', 'Registeredusers::user_details/$1');

   // Loyality Points
   $routes->get('registeredusers/loyality_points_history/(:num)', 'Registeredusers::loyality_points_history/$1');
   $routes->get('registeredusers/referral-history/(:num)', 'Registeredusers::referral_history/$1');
   $routes->post('registeredusers/updateRefpoints', 'Registeredusers::updateRefpoints');
   $routes->get('registeredusers/SetLoyaltyPointValue', 'Registeredusers::SetLoyaltyPointValue');

   // Users
   $routes->get('registeredusers/edituser/(:num)', 'Registeredusers::edituser/$1');
   $routes->post('registeredusers/updateuserdata/(:num)', 'Registeredusers::updateuserdata/$1');

   // Blogs
   $routes->get('admin_blogs', 'Blogs::blogs');
   $routes->get('blogs/exporttoexcel', 'Blogs::exporttoexcel');
   $routes->get('blogs/importfromexcel', 'Blogs::importfromexcel');
   $routes->post('blogs/importexceldata', 'Blogs::importexceldata');

   $routes->get('blogs/deleteblog/(:num)', 'Blogs::deleteblog/$1');
   $routes->get('blog_logs_view', 'Blogs::bloglogs');
   $routes->get('blogs/restore/(:num)', 'Blogs::restoreBlog/$1');

   $routes->get('blogs/editblog/(:num)', 'Blogs::editblog/$1');
   $routes->post('blogs/updateblogdata/(:num)', 'Blogs::updateblogdata/$1');
   $routes->get('blogs/addnewblog', 'Blogs::addnewblog');
   $routes->post('blogs/publishmyblog', 'Blogs::publishmyblog');
   $routes->get('blogs/editblogs/(:num)', 'Blogs::editblogs/$1');
   $routes->post('blogs/editmyblog/(:num)', 'Blogs::editmyblog/$1');
   $routes->post('blogs/add-category', 'Blogs::addCategory');
   $routes->post('blogs/add_new_tag', 'Blogs::AddNewTag');
   $routes->get('blogs/comments', 'Blogs::GetComments');
   $routes->post('blogs/comments/update_status', 'Blogs::UpdateCommentStatus');

   // Empolyee's Login/signup Controller;
   $routes->get('sendinvite', 'Registeredusers::sendinvite');
   $routes->post('sendinvitedata', 'Registeredusers::sendinvitedata');

   // Footer
   $routes->get('footer', 'Footercontrol::footer');
   $routes->get('footer/editfooterdata/(:num)', 'Footercontrol::editfooterdata/$1');
   $routes->post('footer/updatefooter/(:num)', 'Footercontrol::updatefooter/$1');

   // instagram Controller
   $routes->get('socialmedia', 'InstagramController');
   $routes->get('instagram', 'InstagramController::instagram');
   $routes->get('instagram/schedulenewpost', 'InstagramController::schedulenewpost');
   $routes->get('instagram/addnewpost', 'InstagramController::addnewpost');
   $routes->match(['get', 'post'], 'instagram/postToInstagram', 'InstagramController::postToInstagram');
   $routes->post('instagram/schedulePost', 'InstagramController::schedulePost');
   $routes->post('instagram/refreshScheduledPosts', 'InstagramController::refreshScheduledPosts');
   $routes->post('instagram/scheduleAllPosts', 'InstagramController::scheduleAllPosts');

   // Tiers Controller
   $routes->get('tiers', 'Tiers::tiers');

   $routes->get('tiers/new_tier_1', 'Tiers::new_tier_1');
   $routes->post('tiers/publish_tier_1', 'Tiers::publish_tier_1');
   $routes->get('tiers/edit_tier_1/(:num)', 'Tiers::edit_tier_1/$1');
   $routes->post('tiers/update_tier_1/(:num)', 'Tiers::update_tier_1/$1');
   $routes->get('tiers/deleteTier/(:num)', 'Tiers::deleteTier/$1');
   $routes->get('tier1_deleted', 'Tiers::deletedTiers'); // View deleted tiers
   $routes->get('tier/restore/(:num)', 'Tiers::restoreTier/$1'); // Restore deleted tier


   $routes->get('tiers/add_tier_2/(:num)', 'Tiers::add_tier_2/$1');
   $routes->get('tiers/get_tier_2/(:num)', 'Tiers::get_tier_2/$1');
   $routes->get('tiers/new_tier_2/(:num)', 'Tiers::new_tier_2/$1');
   $routes->post('tiers/publish_tier_2/(:num)', 'Tiers::publish_tier_2/$1');
   $routes->get('tiers/edit_tier_2/(:num)', 'Tiers::edit_tier_2/$1');
   $routes->post('tiers/update_tier_2/(:num)', 'Tiers::update_tier_2/$1');
   $routes->get('tiers/deleteTier2/(:num)', 'Tiers::deleteTier2/$1');
   $routes->get('tier2_deleted', 'Tiers::deletedTiers2');
   $routes->get('tiers/restore_tier_2/(:num)', 'Tiers::restoreTier2/$1');


   $routes->get('tiers/add_tier_3/(:num)', 'Tiers::add_tier_3/$1');
   $routes->get('tiers/new_tier_3/(:num)', 'Tiers::new_tier_3/$1');
   $routes->post('tiers/publish_tier_3/(:num)', 'Tiers::publish_tier_3/$1');
   $routes->get('tiers/edit_tier_3/(:num)', 'Tiers::edit_tier_3/$1');
   $routes->post('tiers/update_tier_3/(:num)', 'Tiers::update_tier_3/$1');
   $routes->get('tiers/deleteTier3/(:num)', 'Tiers::deleteTier3/$1');
   $routes->get('tier3_deleted', 'Tiers::deletedTiers3');
   $routes->get('tiers/restore_tier_3/(:num)', 'Tiers::restoreTier3/$1');


   $routes->get('tiers/add_tier_4/(:num)', 'Tiers::add_tier_4/$1');
   $routes->get('tiers/new_tier_4/(:num)', 'Tiers::new_tier_4/$1');
   $routes->post('tiers/publish_tier_4/(:num)', 'Tiers::publish_tier_4/$1');
   $routes->get('tiers/edit_tier_4/(:num)', 'Tiers::edit_tier_4/$1');
   $routes->post('tiers/update_tier_4/(:num)', 'Tiers::update_tier_4/$1');
   $routes->get('tier4_deleted', 'Tiers::deletedTiers4');
   $routes->get('tiers/restore_tier_4/(:num)', 'Tiers::restoreTier4/$1');

   // Tier 2 in Add Products Page
   $routes->post('tiers/get_tier2', 'Tiers::get_tier2');
   $routes->post('tiers/get_tier3', 'Tiers::get_tier3');
   $routes->post('tiers/get_tier4', 'Tiers::get_tier4');

   // discount code controller
   $routes->get('discountcode', 'Home::discountcodegenerator');
   $routes->get('discountcodegenerator', 'Home::discountcodegenerator');
   $routes->get('addnewdiscountcode', 'Home::addnewdiscountcode');
   $routes->get('discount_code_view', 'Home::viewtable');
   $routes->post('publishDiscountCode', 'Home::publishDiscountCode');
   $routes->post('update/(:num)', 'Home::update/$1');
   $routes->get('view/(:num)', 'Home::view/$1');
   $routes->get('exporttoexcel', 'Home::exportdiscountcode');
   $routes->get('importfromexcel', 'Home::importfromexcel');
   $routes->get('edit_discountcode_view/(:num)', 'Home::edit/$1');
   $routes->get('delete/(:num)', 'Home::delete/$1'); // Soft delete a discount code
   $routes->get('discountcodes_deleted', 'Home::deletedDiscountCodes'); // View deleted discount codes
   $routes->get('discountcode/restore/(:num)', 'Home::restoreDiscountCode/$1'); // Restore a deleted discount code

   // Online Store
   $routes->get('online_store', 'Store::index');
   $routes->get('online_store/edit', 'Store::edit_onlinestore');

   // Carousel
   $routes->post('online_store/add_new_carousel', 'Store::addcarousel');
   $routes->post('online_store/update_carousel/(:num)', 'Store::update_carousel/$1');
   $routes->post('online_store/update_about', 'Store::update_about');
   $routes->post('online_store/update_contact', 'Store::update_contact');
   $routes->post('online_store/update_search', 'Store::update_search');
   $routes->post('online_store/update_wishlist', 'Store::update_wishlist');
   $routes->post('online_store/update_cart', 'Store::update_cart');
   $routes->post('online_store/update_checkout', 'Store::update_checkout');
   $routes->post('online_store/update_tracking', 'Store::update_tracking');
   $routes->post('online_store/update_404', 'Store::update_404');
   $routes->post('online_store/add_members', 'Store::add_members');
   $routes->post('online_store/edit_members', 'Store::edit_members');
   $routes->post('online_store/update_members_order', 'Store::update_member_order');
   $routes->get('online_store/deletemember/(:num)', 'Store::deletemember/$1');
   $routes->post('admin/update-footer', 'Store::updateFooter');
   $routes->get('online_store/delete_carousel/(:num)', 'Store::delete_carousel/$1');

   // Route for adding or updating a policy
   $routes->post('policy/save', 'Store::add_policy');
   $routes->get('online_store/delete_policy/(:num)', 'Store::delete_policy/$1');
   $routes->get('online_store/restore-policy/(:num)', 'Store::Restorepolicy/$1');

   // Define route for updating a policy
   $routes->post('store/edit', 'Store::edit_policy');

   $routes->post('product-settings/save', 'ProductSettings::save');

   // Setting View
   $routes->get('setting', 'Setting::index');

   //Company
   $routes->get('add_new_company', 'CatalogController::displayCompany');
   $routes->post('company/save_company', 'CatalogController::save_company');
   $routes->get('company_view', 'CatalogController::viewcompanylist');
   $routes->get('companies/edit_company/(:num)', 'CatalogController::editcompany/$1');
   $routes->post('company/update_company/(:num)', 'CatalogController::update_company/$1');
   $routes->get('companies/deletecompany/(:num)', 'CatalogController::deleteCompany/$1');
   $routes->get('restorecompany/(:num)', 'CatalogController::restoreCompany/$1');
   $routes->get('company_logs_view', 'CatalogController::companylogs');
   $routes->post('company/importCSV', 'CatalogController::importCSV');
   $routes->get('company/exportCSV', 'CatalogController::exportCSV');

   //related products
   $routes->get('addnew_related_product', 'RelatedproductController::index');
   $routes->get('admin-products/getDistinctFieldValues', 'RelatedproductController::getDistinctFieldValues');
   $routes->post('admin-products/getProductsByConditions', 'RelatedproductController::getProductsByConditions');
   $routes->get('admin-products/getSelectedProducts/(:num)', 'RelatedproductController::getSelectedProducts/$1');
   $routes->post('admin-products/getProductsByIds', 'RelatedproductController::getProductsByIds');
   $routes->get('admin-products/getConditions/(:num)', 'RelatedproductController::getConditions/$1');
   $routes->get('getAllProducts', 'RelatedproductController::getAllProducts');
   $routes->post('admin-products/getFilteredProducts/(:num)', 'RelatedproductController::getFilteredProducts/$1');
   $routes->post('admin-products/saveRelatedProducts', 'RelatedproductController::saveRelatedProducts');
   $routes->post('getProductsByTags', 'RelatedproductController::getProductsByTags');
   $routes->get('relatedproduct_table_view', 'RelatedproductController::tableview');
   $routes->get('admin-products/deleterelatedproduct/(:num)', 'RelatedproductController::deleteRelatedProduct/$1');
   $routes->get('admin-products/edit_related_product/(:num)', 'RelatedproductController::editRelatedProduct/$1');
   $routes->post('admin-products/updaterelatedproduct/(:num)', 'RelatedproductController::updateRelatedProduct/$1');
   $routes->post('RelatedproductController/fetchProducts', 'RelatedproductController::fetchProducts'); // Fetch products dynamically
   $routes->post('relatedproduct/deleteProduct', 'RelatedproductController::deleteProduct');
   $routes->get('relatedproduct_deleted', 'RelatedproductController::deletedRelatedProducts'); // View deleted catalogs
   $routes->get('relatedproduct/restore/(:num)', 'RelatedproductController::restoreProduct/$1'); // Restore a deleted catalog

});


// Admin Dashboard Controller;
$routes->get('admin', 'Dashboard');
$routes->get('dashboard', 'Dashboard::admindashboard', ['filter' => 'auth']);
$routes->get('adminsignup', 'Dashboard::adminsignup');
$routes->post('adminRegister', 'Dashboard::adminRegister');
$routes->get('verify-otp', 'Dashboard::verifyOtpView');
$routes->post('resendOtp', 'Dashboard::resendOtp');
$routes->post('verifyOtp', 'Dashboard::verifyOtp');
$routes->post('adminloginsession', 'Dashboard::adminloginsession');
$routes->get('validateemail', 'Dashboard::validateemail');
$routes->get('adminlogout', 'Dashboard::adminlogout');
$routes->get('restricted', 'Dashboard::restricted');
$routes->get('profile', 'Dashboard::profile');
$routes->post('profile/addtasks', 'Dashboard::addtasks');
$routes->get('profile/updateTaskStatus/(:num)/(:any)', 'Dashboard::updateTaskStatus/$1/$2');
$routes->get('profile/create_task', 'Dashboard::create_task');
$routes->post('profile/uploadProfilePicture', 'Dashboard::uploadProfilePicture');
$routes->get('download-file', 'Home::download_file');
$routes->get('download-user-file', 'Home::download_user_file');
$routes->get('back-to-home', 'Home::back_to_home');
$routes->post('updatePassword/(:any)', 'Registeredusers::updatePassword/$1');
$routes->post('sendPasswordReset', 'Registeredusers::sendPasswordReset');
$routes->get('resetPassword/(:any)', 'Registeredusers::resetPassword/$1');
$routes->post('warehouse/addLocation', 'Dashboard::addLocation');
$routes->get('warehouse/getLocation/(:any)', 'Dashboard::getLocation/$1');
$routes->post('warehouse/editLocation', 'Dashboard::editLocation');
$routes->post('warehouse/deleteLocation/(:any)', 'Dashboard::deleteLocation/$1');

//cusomer sevice Controller
$routes->get('customer_email_view/(:num)', 'Customerservice::customerEmailView/$1');
$routes->get('view_attachment/(:any)', 'Customerservice::view_attachment/$1');
$routes->get('fetchEmails', 'Customerservice::fetchEmails');
$routes->get('process_new_emails', 'Customerservice::processNewEmails');
$routes->get('statics', 'Customerservice::statics');
$routes->get('email', 'GmailController::Complaints');
$routes->post('send_reply', 'Customerservice::sendReply');
$routes->post('downloadAttachment/(:segment)', 'Customerservice::downloadAttachment/$1');
$routes->get('downloadAttachment/(:segment)', 'Customerservice::downloadAttachment/$1');
$routes->get('getAttachmentPreview/(:segment)', 'Customerservice::getAttachmentPreview/$1');
$routes->post('get_conversation_updates', 'Customerservice::getConversationUpdates');
$routes->get('getAgents', 'Customerservice::getAgents');
$routes->post('updateAssignedAgent', 'Customerservice::updateAssignedAgent');
$routes->get('getMacros', 'Customerservice::getMacros');
$routes->get('getMacroContent', 'Customerservice::getMacroContent');
$routes->post('sendReply', 'Customerservice::sendReply');
$routes->post('checkNewMessages', 'Customerservice::checkNewMessages');
$routes->get('getCSTags', 'Customerservice::getCSTags');
$routes->post('saveMacro', 'Customerservice::saveMacro');
$routes->post('createTicket', 'Customerservice::createTicket');
$routes->post('closeTicket', 'Customerservice::closeTicket');
$routes->post('openTicket', 'Customerservice::openTicket');
$routes->post('updateStatus', 'Customerservice::updateStatus');
$routes->post('updateTags', 'Customerservice::updateTags');
$routes->post('createView', 'Customerservice::createView');
$routes->get('applyView/(:num)', 'Customerservice::applyView/$1');
$routes->post('updateView', 'Customerservice::updateView');
$routes->post('deleteView', 'Customerservice::deleteView');
$routes->get('contact_us_data', 'Customerservice::ContactUsData');

// Genrate Controller
$routes->get('generate_report', 'GenerateController::index');
$routes->post('gettablecolumns', 'GenerateController::gettablecolumns');
$routes->post('generate_report/generate_excel_report', 'GenerateController::generate_excel_report');

// brand Controller
$routes->get('brand', 'brands::brand');

// Vendors Controller
$routes->get('vendors', 'brands::vendors');

// Products Controller
$routes->get('admin-products', 'Products');
$routes->get('admin-products/deleteproduct/(:num)', 'Products::deleteproduct/$1');
$routes->get('admin-products/editproduct/(:num)', 'Products::editproduct/$1');
$routes->post('admin_products/updateproduct/(:num)', 'Products::updateproduct/$1');
$routes->get('admin-products/addnewproducts', 'Products::addnewproducts');
$routes->post('admin-products/publishproduct', 'Products::publishproduct');
$routes->get('admin-products/exporttoexcel', 'Products::exporttoexcel');
$routes->get('admin-products/importfromexcel', 'Products::importfromexcel');
$routes->post('admin-products/importexceldata', 'Products::importexceldata');
$routes->post('admin-products/check_sku', 'Products::check_sku');
$routes->get('admin-products/(:segment)', 'Products::products_preview/$1');
$routes->post('check-url', 'Products::checkUrl');
$routes->post('products/AddNewProductTags', 'Products::AddNewProductTags');
$routes->get('product_reviews', 'Products::productReviews');
$routes->post('products/reviews/update_status', 'Products::UpdateReviewStatus');
$routes->get('product_deleted', 'Products::deletedproducts'); // View deleted products
$routes->get('products/restoreproduct/(:num)', 'Products::restoreproduct/$1'); // Restore product

// Pincode Mapping Controller
$routes->get('pincode-mapping', 'Products::pincode_mapping');
$routes->get('add-pincodes', 'Products::add_pincodes');
$routes->get('importpinfromexcel', 'Products::importpinfromexcel');
$routes->get('download-pincode-file', 'Products::download_pincode_file');
$routes->post('import_pincode_data', 'Products::import_pincode_data');
$routes->get('pincode-mapping/exportpintoexcel', 'Products::exportpintoexcel');
$routes->get('delete-pincode/(:num)', 'Products::delete_pincode/$1');

//$routes->get('products/viewproduct/(:num)', 'Products::viewproduct/$1');
$routes->get('excel/exporttoexcel', 'Excel');

// Collections Controller
$routes->get('collections', 'Products::collections');
$routes->get('collections/deletecollection/(:num)', 'Products::deletecollection/$1');
$routes->get('editcollections/(:num)', 'Products::editCollection/$1');
$routes->get('getConditions/(:num)', 'Products::getConditions/$1');
$routes->post('updateCollection/(:num)', 'Products::updateCollection/$1');
$routes->get('addnewcollection', 'Products::addnewcollection');
$routes->post('getProductsByTags', 'Products::getProductsByTags');
$routes->post('publishcollection', 'Products::publishcollection');
//$routes->post('products/getAllProducts', 'Products::getallproducts');
$routes->get('getAllProducts', 'Products::getAllProducts');
$routes->get('collectionview/(:num)', 'Products::collectionview/$1');
$routes->get('collectionview/(:num)/(:num)', 'Products::collectionview/$1/$2');
$routes->post('getFilteredProducts/(:num)', 'Products::getFilteredProducts/$1');
$routes->post('saveSortOrder', 'Products::saveSortOrder');
$routes->get('getDistinctFieldValues', 'Products::getDistinctFieldValues');
$routes->post('getProductsByConditions', 'Products::getProductsByConditions');
$routes->get('getSelectedProducts/(:num)', 'Products::getSelectedProducts/$1');
$routes->post('getProductsByIds', 'Products::getProductsByIds');
$routes->get('collections/(:any)', 'Products::collectionview/$1');
$routes->get('collections/(:any)', 'Products::collectionview/$1');
$routes->get('collection_deleted', 'Products::deletedcollections');
$routes->get('restorecollection/(:num)', 'Products::restorecollection/$1');





//$routes->get('products/collectionview/(:num)', 'Products::collectionview/$1');

// Order Management
$routes->get('ordermanagement', 'Ordermanagement');
$routes->get('ordermanagement/deleteorder/(:num)', 'Ordermanagement::deleteorder/$1');
$routes->get('ordermanagement/getOrderDetails/(:num)', 'Ordermanagement::getOrderDetails/$1');
$routes->get('ordermanagement/editorder/(:num)', 'Ordermanagement::editorder/$1');
$routes->get('ordermanagement/generateInvoice/(:num)', 'Ordermanagement::generateInvoice/$1');
$routes->post('ordermanagement/updateorder/(:num)', 'Ordermanagement::updateorder/$1');
$routes->get('ordermanagement/addneworder', 'Ordermanagement::addneworder');
$routes->post('ordermanagement/publishorder', 'Ordermanagement::publishorder');
$routes->post('ordermanagement/savedraftorder', 'Ordermanagement::savedraftorder');
$routes->get('ordermanagement/checkout/(:num)', 'Ordermanagement::checkout/$1');
$routes->post('ordermanagement/updatePaymentStatus', 'Ordermanagement::updatePaymentStatus');
$routes->get('ordermanagement/exportOrdertoexcel', 'Ordermanagement::exportOrdertoexcel');
$routes->get('ordermanagement/importOrders', 'Ordermanagement::importOrders');
$routes->post('ordermanagement/importOrdersData', 'Ordermanagement::importOrdersData');
$routes->post('addnewcustomer', 'Ordermanagement::addnewcustomer');
$routes->get('getCustomerDetails', 'Ordermanagement::getCustomerDetails');
$routes->get('getCityStateByPincode/(:num)', 'Ordermanagement::getCityStateByPincode/$1');
$routes->post('orders/import', 'Ordermanagement::import');
$routes->get('orders/export', 'Ordermanagement::export');

// Bluedart Management
$routes->get('bluedart_management', 'Ordermanagement::bluedart_management');
$routes->post('bluedart_management/generateWaybill', 'Ordermanagement::generateWaybill');
$routes->post('bluedart_management/saveChanges', 'Ordermanagement::saveChanges');
$routes->post('bluedart_management/cancelBluedartRequest', 'Ordermanagement::cancelBluedartRequest');
$routes->get('bluedart_management/viewLabel/(:segment)', 'Ordermanagement::viewLabel/$1');
$routes->post('bluedart_management/preparePrintLabels', 'Ordermanagement::preparePrintLabels');
$routes->post('bluedart_management/updateTrackingActivity', 'Ordermanagement::updateTrackingActivity');
$routes->post('bluedart_management/Bluedart_track', 'Ordermanagement::Bluedart_track');
$routes->post('bluedart_management/filterBluedartShipments', 'Ordermanagement::filterBluedartShipments');
$routes->get('bluedart_management/exportShiptoexcel', 'Ordermanagement::exportShiptoexcel');
$routes->get('bluedart_management/importShipmentfromexcel', 'Ordermanagement::importShipmentfromexcel');
$routes->post('bluedart_management/importShipmentData', 'Ordermanagement::importShipmentdata');
$routes->get('download-shipment-file', 'Ordermanagement::download_shipment_file');
$routes->get('update-tracking', 'Ordermanagement::updateTrackingDetails');

// Place Order/Add To Cart
$routes->get('cart', 'Ordermanagement::cart');
$routes->post('add_to_cart/(:num)', 'Ordermanagement::add_to_cart/$1');
$routes->post('cart/remove', 'Ordermanagement::remove_from_cart');
$routes->post('cart/place_order', 'Ordermanagement::place_order');
$routes->post('cart/update', 'Ordermanagement::updateCart');
$routes->post('cart/update_quantity', 'Ordermanagement::update_quantity');

// Userevents Controller
$routes->post('log-user-events', 'UserEventLogger::logUserEvents');
$routes->get('getUserEventsdata', 'UserEventLogger::getUserEventsdata');
$routes->get('getUserEventsdata/viewdata/(:num)', 'UserEventLogger::viewdata/$1');

//cusomer sevice Controller
$routes->get('customer_email_view/(:num)', 'Customerservice::customerEmailView/$1');
$routes->get('view_attachment/(:any)', 'Customerservice::view_attachment/$1');
$routes->get('fetchEmails', 'Customerservice::fetchEmails');
$routes->get('process_new_emails', 'Customerservice::processNewEmails');
$routes->get('statics', 'Customerservice::statics');
$routes->get('fetchConversations', 'Customerservice::fetchConversations');
$routes->get('conversation_view/(:any)/(:any)', 'Customerservice::customerConversationView/$1/$2');

//Abandoned view
$routes->get('abandoned_view', 'AbandonedOrderController::index');
$routes->get('abandoned-orders/send-email/(:num)', 'AbandonedOrderController::sendEmail/$1');
$routes->post('update_email', 'Ordermanagement::update_email');
$routes->post('send-email-multiple', 'AbandonedOrderController::sendEmailMultiple');
$routes->post(' send-custom-email', 'AbandonedOrderController::sendCustomEmail');
$routes->get('cart_view_session', 'AbandonedOrderController::viewCartBySession');
$routes->get('cart/edit_cart/(:segment)', 'AbandonedOrderController::edit_cart/$1');
$routes->post('cart/update_cart/(:segment)', 'AbandonedOrderController::update_cart/$1');
$routes->get('cart/edit_cart_view/(:any)', 'AbandonedOrderController::edit_cart/$1');

//Bundle Creation
$routes->get('bundle_create', 'BundleController::index');
$routes->post('bundlecontroller/create', 'BundleController::create');
$routes->get('bundle_view', 'BundleController::view');
$routes->get('BundleController/edit/(:num)', 'BundleController::edit/$1');
$routes->post('bundle/update/(:num)', 'BundleController::update/$1');
$routes->get('BundleController/delete/(:num)', 'BundleController::delete/$1');
$routes->get('bundle_deleted', 'BundleController::deleted');
$routes->get('restore/(:num)', 'BundleController::restore/$1');


$routes->get('bundlecollection_view', 'BundleController::viewcollection');
$routes->get('bundlecollection_create', 'BundleController::indexcollection');
$routes->post('bundlecontroller/createcollection', 'BundleController::createcollection');
$routes->get('BundleController/editproductcollection/(:num)', 'BundleController::editproductcollection/$1');
$routes->post('bundle/updateproductcollection/(:num)', 'BundleController::updateproductcollection/$1');
$routes->get('BundleController/deleteproductcollection/(:num)', 'BundleController::deleteproductcollection/$1');
$routes->get('bundlecollection/deletedcollection', 'BundleController::deletedcollection'); // View all deleted projects
$routes->get('bundlecollection/restorecollection/(:num)', 'BundleController::restorecollection/$1'); // Restore a specific project

//catlogs
$routes->get('catalog_form', 'CatalogController::create');
$routes->get('catalog/create', 'CatalogController::create');
$routes->post('catalog/store', 'CatalogController::store');
$routes->get('catalog_view', 'CatalogController::index');
$routes->get('edit_catalog_form/(:num)', 'CatalogController::edit/$1');
$routes->post('catalog/update/(:num)', 'CatalogController::update/$1');
$routes->get('catalog/delete/(:num)', 'CatalogController::delete/$1');
$routes->post('catalog/checkDuplicateUsers', 'CatalogController::checkDuplicateUsers');
$routes->get('catalog_deleted', 'CatalogController::deletedCatalogs'); // View deleted catalogs
$routes->get('catalog/restore/(:num)', 'CatalogController::restoreCatalog/$1'); // Restore a deleted catalog


//Customer Segment
$routes->get('add_new_customersegment', 'CatalogController::add_new');
$routes->post('customer_segment/apply_filters', 'CatalogController::apply_filters');
$routes->post('customer_segment/savesegmentdata', 'CatalogController::savesegmentdata');
$routes->get('customer_segment_view', 'CatalogController::viewcustomersegment');
$routes->get('customer_segments/editsegment/(:num)', 'CatalogController::editsegment/$1');
$routes->post('customer_segment/updatesegment/(:num)', 'CatalogController::updatesegment/$1');
$routes->get('customer_segment/deletesegment/(:num)', 'CatalogController::deletesegment/$1');
$routes->get('customer_segment/restore/(:num)', 'CatalogController::restoresegment/$1');
$routes->get('customersegment_logs_view', 'CatalogController::customersegmentlogs');

//inventory
$routes->get('inventory/create', 'InventoryController::create');
$routes->post('inventory/store', 'InventoryController::store');
$routes->get('inventory_list_view', 'InventoryController::inventoryList');
$routes->get('inventory/edit/(:num)', 'InventoryController::edit/$1');
$routes->post('inventory/update/(:num)', 'InventoryController::update/$1');
$routes->get('inventory/productDetails/(:num)', 'InventoryController::productDetails/$1');
$routes->get('inventory/export', 'InventoryController::exportCSV');
$routes->post('inventory/import', 'InventoryController::importCSV');
$routes->get('warehouses/fetch', 'InventoryController::fetchWarehouses');
$routes->post('product/storenewproduct', 'InventoryController::storenewproduct');
$routes->get('inventory/delete/(:num)', 'InventoryController::delete/$1'); // Soft delete
$routes->get('inventory_deleted', 'InventoryController::deletedInventory'); // View deleted records
$routes->get('inventory/restore/(:num)', 'InventoryController::restore/$1'); // Restore deleted record


//purchase order
$routes->get('purchase-order/index', 'PurchaseOrderController::index');
$routes->post('purchase_orders/save', 'PurchaseOrderController::save');
$routes->get('po_list_view', 'PurchaseOrderController::display');
$routes->get('purchase-order/edit/(:num)', 'PurchaseOrderController::edit/$1');
$routes->post('purchase_orders/update/(:num)', 'PurchaseOrderController::update/$1');
$routes->get('po/exportpo', 'PurchaseOrderController::exportpo');
$routes->get('purchaseorder/import', 'PurchaseOrderController::importCSV');
$routes->post('purchaseorder/import', 'PurchaseOrderController::importCSV');
$routes->get('purchase-order/delete/(:num)', 'PurchaseOrderController::delete/$1');
$routes->get('purchaseorder_deleted', 'PurchaseOrderController::deleted');
$routes->get('purchase-order/restore/(:num)', 'PurchaseOrderController::restore/$1');


//user access control
$routes->get('permissions/fetchUsers', 'PermissionsController::fetchUsers');
$routes->get('permissions/fetchTables', 'PermissionsController::fetchTables');
$routes->get('permissions/fetchColumns/(:any)', 'PermissionsController::fetchColumns/$1');
$routes->post('permissions/savePermissions', 'PermissionsController::savePermissions');
$routes->get('permissions_view', 'PermissionsController::viewPermissionsPage');
$routes->post('permissions/deletePermissions', 'PermissionsController::deletePermissions');

//suppliers
$routes->get('supplier_list_view', 'SupplierController::index');
$routes->get('suppliers/create', 'SupplierController::create');
$routes->post('suppliers/suppliers/save', 'SupplierController::save');
$routes->get('suppliers/edit/(:num)', 'SupplierController::edit/$1');
$routes->post('suppliers/update/(:num)', 'SupplierController::update/$1');
$routes->get('suppliers/delete/(:num)', 'SupplierController::delete/$1');
$routes->get('suppliers_deleted', 'SupplierController::deletedSuppliers');
$routes->get('suppliers/restore/(:num)', 'SupplierController::restoreSupplier/$1');


//Tags
$routes->post('Tags/save', 'Tags::save');

//Draft order
$routes->get('draft_orders_view', 'Ordermanagement::draftOrders');

//shipments
$routes->get('shipment_view', 'Ordermanagement::shipmentview');

//Giftcard
$routes->get('giftcard_view', 'Giftcard::giftcard_view');
$routes->get('addnew_giftcard_view', 'Giftcard::view');
$routes->post('giftcard/publishGiftCard', 'Giftcard::publishGiftCard');
$routes->get('giftcard/delete_gift_card/(:num)', 'Giftcard::deleteGiftCard/$1');
$routes->get('giftcard/edit_giftcard_view/(:num)', 'Giftcard::editgiftcard/$1');
$routes->post('giftcard/updateGiftCard/(:num)', 'Giftcard::updateGiftCard/$1');
$routes->get('delete/(:num)', 'Giftcard::deleteGiftCard/$1'); // Soft delete a gift card
$routes->get('giftcard_deleted', 'Giftcard::deletedGiftCards'); // View deleted gift cards
$routes->get('bundlecollection/restoreGiftCard/(:num)', 'Giftcard::restoreGiftCard/$1'); // Restore a deleted gift card

//Transfer
$routes->get('transfer/create', 'TransferController::create');
$routes->get('transfer_inventory_view', 'TransferController::index');
$routes->post('transfer/store', 'TransferController::store');
$routes->get('transfer/edit/(:num)', 'TransferController::edit/$1');
$routes->post('transfer/update/(:num)', 'TransferController::update/$1');
$routes->get('transfer/delete/(:num)', 'TransferController::delete/$1');
$routes->get('transfer_deleted', 'TransferController::deleted'); // View deleted transfers
$routes->get('transfer/restore/(:num)', 'TransferController::restore/$1'); // Restore a transfer



//Header Pages
$routes->post('header/add_new_page', 'HeaderController::add_new_page');
$routes->post('header/update_page/(:num)', 'HeaderController::update_page/$1');
$routes->get('header/get_items/(:segment)', 'HeaderController::get_items/$1');
$routes->delete('header/delete_page/(:num)', 'HeaderController::delete_page/$1');

//All blog
$routes->post('admin/blog_settings/save', 'BlogSettingsController::save');

//singleblog 
$routes->post('admin/single_blog/store', 'SingleBlogController::store');

//online store collection
$routes->post('admin/collection/saveCollection', 'BlogSettingsController::saveCollection');

//Home page
$routes->post('home/saveLogo', 'Store::saveLogo');
$routes->get('online_store/delete-all-logo/(:num)', 'Store::deleteLogo/$1');
$routes->get('online_store/delete-all-logos/(:num)', 'Store::restoreLogo/$1');
$routes->post('home/editLogo', 'Store::editLogo');

//home collection
$routes->post('collection/saveCollection', 'Store::saveCollection');

//home product
$routes->post('product/saveProduct', 'Store::saveProduct');

//Blogs product
$routes->post('blog/saveBlog', 'Store::saveBlog');

//carasoule
$routes->post('carousel2/add', 'Store::add');
$routes->post('carousel2/update_carsecond/(:num)', 'Store::update_carsecond/$1');
$routes->get('carousel2/delete/(:num)', 'Store::delete/$1');
$routes->post('home-image/save-home-image', 'Store::SaveHomeImage');
$routes->get('/unauthorized', 'PermissionsController::unauthorized');

//New
$routes->post('marquee-bottom-text/save', 'Store::saveBottomText');
$routes->post('save-email-popup', 'EmailPopupController::save');
$routes->post('marquee-text/save-marquee', 'Store::saveMarqueeText');
$routes->get('marquee-text/GetMarqueeText/(:num)', 'Store::GetMarqueeText/$1');
$routes->delete('marquee-text/delete-marquee/(:num)', 'Store::delete_marquee/$1');
$routes->post('marquee-text/UpdateMarquee/(:num)', 'Store::UpdateMarquee/$1');

//Homeproductsection 
$routes->get('online_store/fetch_products', 'Store::fetch_products');
$routes->get('online_store/fetch_collections', 'Store::fetch_collections');
$routes->post('online_store/add_new_product', 'Store::add_new_product');
$routes->post('online_store/update_product/(:num)', 'Store::update_product/$1');
$routes->get('online_store/delete_product/(:num)', 'Store::delete_product/$1');

//home imageF
$routes->post('home-image/save', 'Store::save');
$routes->post('Store/saveBlogs', 'Store::saveBlogs');
$routes->post('update-blog/(:num)', 'Store::updateBlog/$1');
$routes->get('online_store/delete-all-blogs/(:num)', 'Store::deleteBlog/$1');
$routes->get('online_store/restore-all-blogs/(:num)', 'Store::RestoreBlog/$1');

//logs 
$routes->get('online_store/online_store_logs', 'Store::online_store_logs');

$routes->get('online_store/restore-all-members/(:num)', 'Store::Restoremember/$1');
$routes->post('online_store/save', 'Store::save');


//logs
$routes->get('online_store/online_store_logs', 'Store::online_store_logs');
$routes->get('online_store/deleted_carousels', 'Store::online_store_logs');
$routes->get('online_store/restore_carousel/(:num)', 'Store::restore_carousel/$1');


//logs header page
$routes->get('online_store/delete_page/(:num)', 'Store::delete_page/$1');
$routes->get('online_store/deleted_pages', 'Store::online_store_logs');
$routes->get('online_store/restore_page/(:num)', 'Store::restore_page/$1');

//Marquee
$routes->get('online_store/delete_marquee/(:num)', 'Store::delete_marquee/$1');
$routes->get('online_store/restore_marquee/(:num)', 'Store::restore_marquee/$1');




















