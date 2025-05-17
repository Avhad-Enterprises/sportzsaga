<!-- Head View Start -->
<?= $this->include('head_view') ?>
<!-- Head View End -->


<body>

    <!-- Header View Start -->
    <?= $this->include('header_view') ?>
    <!-- Header View End -->

    <div class="right-sidebar">
        <div class="sidebar-title">
            <h3 class="weight-600 font-16 text-blue">
                Layout Settings
                <span class="btn-block font-weight-400 font-12">User Interface Settings</span>
            </h3>
            <div class="close-sidebar" data-toggle="right-sidebar-close">
                <i class="icon-copy ion-close-round"></i>
            </div>
        </div>
        <div class="right-sidebar-body customscroll">
            <div class="right-sidebar-body-content">
                <h4 class="weight-600 font-18 pb-10">Header Background</h4>
                <div class="sidebar-btn-group pb-30 mb-10">
                    <a href="javascript:void(0);" class="btn btn-outline-primary header-white active">White</a>
                    <a href="javascript:void(0);" class="btn btn-outline-primary header-dark">Dark</a>
                </div>

                <h4 class="weight-600 font-18 pb-10">Sidebar Background</h4>
                <div class="sidebar-btn-group pb-30 mb-10">
                    <a href="javascript:void(0);" class="btn btn-outline-primary sidebar-light">White</a>
                    <a href="javascript:void(0);" class="btn btn-outline-primary sidebar-dark active">Dark</a>
                </div>

                <h4 class="weight-600 font-18 pb-10">Menu Dropdown Icon</h4>
                <div class="sidebar-radio-group pb-10 mb-10">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebaricon-1" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-1" checked="" />
                        <label class="custom-control-label" for="sidebaricon-1"><i class="fa fa-angle-down"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebaricon-2" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-2" />
                        <label class="custom-control-label" for="sidebaricon-2"><i class="ion-plus-round"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebaricon-3" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-3" />
                        <label class="custom-control-label" for="sidebaricon-3"><i class="fa fa-angle-double-right"></i></label>
                    </div>
                </div>

                <h4 class="weight-600 font-18 pb-10">Menu List Icon</h4>
                <div class="sidebar-radio-group pb-30 mb-10">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-1" name="menu-list-icon" class="custom-control-input" value="icon-list-style-1" checked="" />
                        <label class="custom-control-label" for="sidebariconlist-1"><i class="ion-minus-round"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-2" name="menu-list-icon" class="custom-control-input" value="icon-list-style-2" />
                        <label class="custom-control-label" for="sidebariconlist-2"><i class="fa fa-circle-o" aria-hidden="true"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-3" name="menu-list-icon" class="custom-control-input" value="icon-list-style-3" />
                        <label class="custom-control-label" for="sidebariconlist-3"><i class="dw dw-check"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-4" name="menu-list-icon" class="custom-control-input" value="icon-list-style-4" checked="" />
                        <label class="custom-control-label" for="sidebariconlist-4"><i class="icon-copy dw dw-next-2"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-5" name="menu-list-icon" class="custom-control-input" value="icon-list-style-5" />
                        <label class="custom-control-label" for="sidebariconlist-5"><i class="dw dw-fast-forward-1"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-6" name="menu-list-icon" class="custom-control-input" value="icon-list-style-6" />
                        <label class="custom-control-label" for="sidebariconlist-6"><i class="dw dw-next"></i></label>
                    </div>
                </div>

                <div class="reset-options pt-30 text-center">
                    <button class="btn btn-danger" id="reset-settings">
                        Reset Settings
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Header View Start -->
    <?= $this->include('left_view') ?>
    <!-- Header View End -->

    <div class="mobile-menu-overlay"></div>

    <!-- Page Main Content Start -->

    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 mb-2">
                            <div class="title">
                                <h4>Profile</h4>
                            </div>
                        </div>
                        <!-- <div class="col-md-6 col-sm-12 text-right blogs-imex mb-10">
                            <a href="<?= base_url(); ?>profile/create_task" class="bg-light-blue btn text-blue weight-500">
                                <i class="ion-plus-round"></i>
                                Assign task
                            </a>
                        </div> -->
                    </div>
                </div>
                <?php foreach ($userData as $user) : ?>
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-30">
                            <div class="pd-20 card-box height-100-p">
                                <div class="profile-photo">
                                    <a href="modal" data-toggle="modal" data-target="#modal" class="edit-avatar"><i class="fa fa-pencil"></i></a>
                                    <img src="<?= !empty($user['profile_img']) ? $user['profile_img'] : 'https://storage.googleapis.com/mkv_imagesbackend/imaages/usericon.jpg'; ?>" alt="" class="avatar-photo" />
                                    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Upload Profile Picture</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body text-center">
                                                    <div class="img-container mb-3">
                                                        <img id="image-preview" src="<?= esc($user['profile_img']) ?>" alt="Profile Picture"
                                                            class="img-fluid rounded-circle" style="max-width: 160px; max-height: 160px;" />
                                                    </div>

                                                    <form id="profile-picture-form" action="<?= base_url('profile/uploadProfilePicture'); ?>" method="POST"
                                                        enctype="multipart/form-data" class="mb-3">
                                                        <input type="file" id="profile-picture" name="profile-picture" class="btn btn-primary mb-2" accept="image/*" />
                                                        <div id="error-message" style="color: red; font-size: 14px; margin-top: 5px;"></div>
                                                        <small class="d-block">Formats: JPG, PNG, JPEG, (WEBP), Recommended Size: 300 x 300 px.</small>
                                                        <button type="submit" id="upload-btn" class="btn btn-success mt-2" disabled>Upload</button>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h5 class="text-center h5 mb-0"><?= $user['name']; ?></h5>
                                <p class="text-center text-muted font-14">
                                    <?= ucfirst(str_replace('_', ' ', strtolower($user['account_type']))); ?>
                                </p>
                                <div class="profile-info">
                                    <h5 class="mb-20 h5 text-blue">Contact Information</h5>
                                    <ul>
                                        <li>
                                            <span>Email Address:</span>
                                            <?= $user['email']; ?>
                                        </li>
                                        <li>
                                            <span>Phone Number:</span>
                                            <?= $user['phone_no']; ?>
                                        </li>
                                        <li>
                                            <span>Country:</span>
                                            <?= $user['state']; ?>
                                        </li>
                                        <li>
                                            <span>Address:</span>
                                            <?= $user['address_one']; ?>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 mb-30">
                            <div class="card-box height-100-p overflow-hidden">
                                <div class="profile-tab height-100-p">
                                    <div class="tab height-100-p">
                                        <ul class="nav nav-tabs customtab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-toggle="tab" href="#setting" role="tab">Settings</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#mystore" role="tab">Store</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#myrazorpay" role="tab">Razorpay</a>
                                            </li>
                                        </ul>

                                        <div class="tab-content">
                                            <!-- Setting Tab start -->
                                            <div class="tab-pane fade show active" id="timeline" role="tabpanel">
                                                <div class="profile-setting">
                                                    <?php foreach ($userData as $user) : ?>
                                                        <form method="post" action="<?= base_url('update_profile/' . $user['user_id']) ?>">
                                                            <ul class="profile-edit-list row">
                                                                <li class="weight-500 col-md-6">
                                                                    <h4 class="text-blue h5 mb-20">
                                                                        Edit Your Personal Settings
                                                                    </h4>
                                                                    <div class="d-flex justify-content-end">
                                                                        <a href="<?= base_url() ?>update_profile/profile_logs/<?= $user['user_id'] ?>"
                                                                            class="btn btn-outline-primary rounded-circle shadow-sm d-flex align-items-center justify-content-center"
                                                                            style="width: 32px; height: 32px;"
                                                                            data-toggle="tooltip"
                                                                            data-placement="top"
                                                                            title="View profile Logs">
                                                                            <i class="fa-solid fa-ellipsis-vertical fa-sm"></i>
                                                                        </a>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Full Name</label>
                                                                        <input class="form-control form-control-lg" name="name" value="<?= set_value('name', $user['name']) ?>" type="text" />
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Email</label>
                                                                        <input class="form-control form-control-lg" name="email" value="<?= set_value('email', $user['email']) ?>" type="email" />
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Date of Birth</label>
                                                                        <input class="form-control form-control-lg date-picker" name="dob" value="<?= set_value('dob', $user['dob']) ?>" type="text" />
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Gender</label>
                                                                        <div class="d-flex">
                                                                            <div class="custom-control custom-radio mb-5 mr-20">
                                                                                <input type="radio" id="male" name="gender" value="male" class="custom-control-input" <?= set_radio('gender', 'male', $user['gender'] == 'male') ?> />
                                                                                <label class="custom-control-label weight-400" for="male">Male</label>
                                                                            </div>
                                                                            <div class="custom-control custom-radio mb-5">
                                                                                <input type="radio" id="female" name="gender" value="female" class="custom-control-input" <?= set_radio('gender', 'female', $user['gender'] == 'female') ?> />
                                                                                <label class="custom-control-label weight-400" for="female">Female</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Country</label>
                                                                        <input class="form-control form-control-lg" name="country" value="<?= set_value('country', $user['country']) ?>" type="text" />
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>State/Province/Region</label>
                                                                        <input class="form-control form-control-lg" name="state" value="<?= set_value('state', $user['state']) ?>" type="text" />
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Pincode Code</label>
                                                                        <input class="form-control form-control-lg" name="pincode" value="<?= set_value('pincode', $user['pincode']) ?>" type="text" />
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Phone Number</label>
                                                                        <input class="form-control form-control-lg" name="phone_no" value="<?= set_value('phone_no', $user['phone_no']) ?>" type="text" />
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Flat, House no., Building, Company, Apartment</label>
                                                                        <input type="text" class="form-control" name="address_information_linef" value="<?= set_value('address_one', $user['address_one']) ?>">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Area, Street, Sector, Village</label>
                                                                        <input type="text" class="form-control" name="address_information_linesec" value="<?= set_value('address_two', $user['address_two']) ?>">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Landmark</label>
                                                                        <input type="text" class="form-control" name="landmark" value="<?= set_value('landmark', $user['landmark']) ?>">
                                                                    </div>
                                                                    <div class="form-group mb-0">
                                                                        <input type="submit" class="btn btn-primary" value="Update Information" />
                                                                    </div>
                                                                </li>
                                                                <li class="weight-500 col-md-6">
                                                                    <div class="row">
                                                                        <h4 class="text-blue col-9 h5 mb-20">
                                                                            Manage Pickup Location
                                                                        </h4>
                                                                        <a class="bg-light-blue col-3 btn text-blue weight-500" data-toggle="modal" data-target="#addLocationModal">
                                                                            <i class="ion-plus-round"></i>
                                                                            Add
                                                                        </a>
                                                                    </div>
                                                                    <div id="pickup_location_container">
                                                                        <table class="table dataTable hover">
                                                                            <?php foreach ($warehouse_locations as $location) : ?>
                                                                                <tr>
                                                                                    <td>
                                                                                        <a href="javascript:void(0);" class="edit-location" data-id="<?= $location['id'] ?>">
                                                                                            <?= $location['pickup_location'] ?>
                                                                                        </a>
                                                                                    </td>
                                                                                    <td>
                                                                                        <a class=" delete-location"
                                                                                            data-id="<?= $location['id'] ?>"
                                                                                            data-name="<?= $location['pickup_location'] ?>">
                                                                                            <i class="icon-copy dw dw-delete-3"></i>
                                                                                        </a>
                                                                                    </td>
                                                                                </tr>
                                                                            <?php endforeach; ?>
                                                                        </table>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </form>
                                                    <?php endforeach; ?>
                                                    <!-- Add Location Modal -->
                                                    <div class="modal fade" id="addLocationModal" tabindex="-1" role="dialog" aria-labelledby="addLocationModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="addLocationModalLabel">Add New Location</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form id="addLocationForm">
                                                                    <div class="modal-body">
                                                                        <div class="form-group">
                                                                            <label for="pickup_location">Pickup Location Name</label>
                                                                            <input type="text" class="form-control" name="pickup_location" required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="contact_person_name">Contact Person Name</label>
                                                                            <input type="text" class="form-control" name="contact_person_name" required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="address1">Address 1</label>
                                                                            <input type="text" class="form-control" name="address1" required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="address2">Address 2</label>
                                                                            <input type="text" class="form-control" name="address2">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="pincode">Pincode</label>
                                                                            <input type="text" class="form-control" name="pincode" required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="city">City</label>
                                                                            <input type="text" class="form-control" name="city" required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="state">State</label>
                                                                            <input type="text" class="form-control" name="state" required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="country">Country</label>
                                                                            <input type="text" class="form-control" name="country" required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="phone">Phone</label>
                                                                            <input type="text" class="form-control" name="phone" required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="phone2">Alternate Phone</label>
                                                                            <input type="text" class="form-control" name="phone2">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="email">Email</label>
                                                                            <input type="email" class="form-control" name="email" required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="origin_area">Origin Area</label>
                                                                            <input type="text" class="form-control" name="origin_area" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-primary">Add Location</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Edit Location Modal -->
                                                    <div class="modal fade" id="editLocationModal" tabindex="-1" role="dialog" aria-labelledby="editLocationModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="editLocationModalLabel">Edit Location</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form id="editLocationForm">
                                                                    <div class="modal-body">
                                                                        <!-- Fields will be populated dynamically using JavaScript -->
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="tab-pane fade show" id="mystore" role="tabpanel">
                                                <div class="pd-20">
                                                    <div class="StoreSetting">
                                                        <form method="post" action="<?= base_url('profile/update_store') ?>">
                                                            <ul class="profile-edit-list row">
                                                                <li class="weight-500 col-md-6">
                                                                    <h4 class="text-blue h5 mb-20">
                                                                        Edit Your Store Details
                                                                    </h4>

                                                                    <!-- Shipping Threshold -->
                                                                    <div class="form-group">
                                                                        <label for="shipping_threshold">Shipping Threshold</label>
                                                                        <input class="form-control form-control-lg" name="shipping_threshold" value="<?= set_value('shipping_threshold', $Storeconfig['shipping_threshold']) ?>" type="number" />
                                                                    </div>

                                                                    <!-- Shipping Charges Below Threshold -->
                                                                    <div class="form-group">
                                                                        <label for="shipping_charges_below_threshold">Shipping Charges Below Threshold</label>
                                                                        <input class="form-control form-control-lg" name="shipping_charges_below_threshold" value="<?= set_value('shipping_charges_below_threshold', $Storeconfig['shipping_charges_below_threshold']) ?>" type="number" />
                                                                    </div>

                                                                    <!-- GST Rate -->
                                                                    <div class="form-group">
                                                                        <label for="gst_rate">GST Rate</label>
                                                                        <input class="form-control form-control-lg" name="gst_rate" value="<?= set_value('gst_rate', $Storeconfig['gst_rate']) ?>" type="number" step="0.01" />
                                                                    </div>

                                                                    <!-- Partial COD Threshold -->
                                                                    <div class="form-group">
                                                                        <label for="partial_cod_threshold">Partial COD Threshold</label>
                                                                        <input class="form-control form-control-lg" name="partial_cod_threshold" value="<?= set_value('partial_cod_threshold', $Storeconfig['partial_cod_threshold']) ?>" type="number" />
                                                                    </div>

                                                                    <!-- Partial COD Below Threshold -->
                                                                    <div class="form-group">
                                                                        <label for="partial_cod_below_threshold">Partial COD Below Threshold</label>
                                                                        <input class="form-control form-control-lg" name="partial_cod_below_threshold" value="<?= set_value('partial_cod_below_threshold', $Storeconfig['partial_cod_below_threshold']) ?>" type="number" />
                                                                    </div>

                                                                    <!-- Partial COD Above Threshold -->
                                                                    <div class="form-group">
                                                                        <label for="partial_cod_above_threshold">Partial COD Above Threshold</label>
                                                                        <input class="form-control form-control-lg" name="partial_cod_above_threshold" value="<?= set_value('partial_cod_above_threshold', $Storeconfig['partial_cod_above_threshold']) ?>" type="number" />
                                                                    </div>

                                                                    <div class="form-group mb-0">
                                                                        <input type="submit" class="btn btn-dark" value="Update" />
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </form>


                                                    </div>
                                                </div>
                                            </div>

                                            <div class="tab-pane fade show" id="myrazorpay" role="tabpanel">
                                                <div class="pd-20">
                                                    <div class="StoreSetting">
                                                        <form method="post" action="<?= base_url('profile/update_razorpay_config') ?>" enctype="multipart/form-data">
                                                            <ul class="profile-edit-list row">
                                                                <li class="weight-500 col-md-6">
                                                                    <h4 class="text-blue h5 mb-20">Edit Razorpay Configuration</h4>

                                                                    <!-- Razorpay Currency -->
                                                                    <div class="form-group">
                                                                        <label for="razorpay_currency">Razorpay Currency</label>
                                                                        <input class="form-control form-control-lg" name="razorpay_currency" value="<?= set_value('razorpay_currency', $RazorpayConfig['razorpay_currency']) ?>" type="text" />
                                                                    </div>

                                                                    <!-- Razorpay Name -->
                                                                    <div class="form-group">
                                                                        <label for="razorpay_name">Razorpay Name</label>
                                                                        <input class="form-control form-control-lg" name="razorpay_name" value="<?= set_value('razorpay_name', $RazorpayConfig['razorpay_name']) ?>" type="text" />
                                                                    </div>

                                                                    <!-- Razorpay Description -->
                                                                    <div class="form-group">
                                                                        <label for="razorpay_description">Razorpay Description</label>
                                                                        <input class="form-control form-control-lg" name="razorpay_description" value="<?= set_value('razorpay_description', $RazorpayConfig['razorpay_description']) ?>" type="text" />
                                                                    </div>

                                                                    <!-- Razorpay Image -->
                                                                    <div class="form-group">
                                                                        <label for="razorpay_image">Razorpay Image URL</label>
                                                                        <input class="form-control form-control-lg" name="razorpay_image" type="file" id="razorpay_image" onchange="previewImage(event)" />

                                                                        <!-- Hidden Input for Current Image URL -->
                                                                        <input type="hidden" name="razorpay_image_current" value="<?= set_value('razorpay_image', $RazorpayConfig['razorpay_image']) ?>">

                                                                        <!-- Image Preview -->
                                                                        <div id="image-preview-container" style="margin-top: 10px;">
                                                                            <img id="razorpay_image_preview" src="<?= set_value('razorpay_image', $RazorpayConfig['razorpay_image']) ?>" class="p-2" alt="Razorpay Image" style="max-width: 150px; <?= $RazorpayConfig['razorpay_image'] ? 'display:block;' : 'display:none;' ?>" />
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group mb-0">
                                                                        <input type="submit" class="btn btn-dark m-2" value="Update" />
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php foreach ($tasks as $task) : ?>
                        <div class="modal fade" id="taskModal<?= $task['task_id'] ?>" tabindex="-1" aria-labelledby="taskModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="taskModalLabel">Task Details</h5>
                                    </div>
                                    <div class="modal-body">
                                        <p><strong>Task Name:</strong> <?= $task['task_name'] ?></p>
                                        <p><strong>Description:</strong> <?= $task['description'] ?></p>
                                        <p><strong>Assigned To:</strong><?= $task['assigned_to_name'] ?></p>
                                        <p><strong>Due Date:</strong> <?= $task['due_date'] ?></p>
                                        <p><strong>Assign Date:</strong> <?= $date->format('d-F-Y h:i A') ?></p>
                                        <p><strong>Priority:</strong> <?= $task['priority_level'] ?></p>
                                        <p><strong>Status:</strong> <span class="<?= ($task['status'] == 'completed') ? 'text-success' : 'text-danger' ?>"><?= ucfirst($task['status']) ?></span></p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </div>
        </div>
        <!-- Page Main Content End -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Get all task names
                const taskNames = document.querySelectorAll('.task-name');

                taskNames.forEach(taskName => {
                    taskName.addEventListener('click', function() {
                        // Get task details from data attributes
                        const taskName = this.dataset.taskName;
                        const taskDescription = this.dataset.taskDescription;
                        const taskDueDate = this.dataset.taskDueDate;
                        const taskTime = this.dataset.taskTime;

                        // Set task details in the modal
                        document.getElementById('modalTaskName').innerText = taskName;
                        document.getElementById('modalTaskDescription').innerText = taskDescription;
                        document.getElementById('modalTaskDueDate').innerText = taskDueDate;
                        document.getElementById('modalTaskTime').innerText = taskTime;

                        // Show the modal
                        $('#taskDetailsModal').modal('show');
                    });
                });
            });
        </script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <!-- JavaScript -->
        <script>
            // Add Location Form Submission
            document.getElementById('addLocationForm').addEventListener('submit', function(e) {
                e.preventDefault();

                // Disable submit button to prevent double submission
                const submitButton = this.querySelector('button[type="submit"]');
                if (submitButton) submitButton.disabled = true;

                const formData = new FormData(this);

                // Log form data for debugging
                console.log('Form data being sent:');
                for (let pair of formData.entries()) {
                    console.log(pair[0] + ': ' + pair[1]);
                }

                fetch('<?= base_url('warehouse/addLocation') ?>', {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(response => {
                        if (!response.ok) {
                            return response.json().then(err => {
                                throw new Error(err.message || 'Server error');
                            });
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data.success) {
                            alert(data.message);
                            $('#addLocationModal').modal('hide');
                            this.reset(); // Reset form
                            location.reload();
                        } else {
                            alert(data.message || 'Failed to add location');
                            if (submitButton) submitButton.disabled = false;
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('An error occurred while adding the location: ' + error.message);
                        if (submitButton) submitButton.disabled = false;
                    });
            });

            // Edit Location - Open Modal with Data
            document.querySelectorAll('.edit-location').forEach(link => {
                link.addEventListener('click', function() {
                    const locationId = this.getAttribute('data-id');

                    fetch(`<?= base_url('warehouse/getLocation/') ?>${locationId}`, {
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest'
                            }
                        })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Failed to fetch location data');
                            }
                            return response.json();
                        })
                        .then(data => {
                            if (!data || !data.id) {
                                throw new Error('Invalid location data received');
                            }

                            const modalBody = document.querySelector('#editLocationModal .modal-body');
                            modalBody.innerHTML = `
                    <input type="hidden" name="id" value="${data.id}">
                    <div class="form-group">
                        <label for="pickup_location">Pickup Location Name</label>
                        <input type="text" class="form-control" name="pickup_location" value="${data.pickup_location || ''}" required>
                    </div>
                    <div class="form-group">
                        <label for="contact_person_name">Contact Person Name</label>
                        <input type="text" class="form-control" name="contact_person_name" value="${data.contact_person_name || ''}" required>
                    </div>
                    <div class="form-group">
                        <label for="address1">Address 1</label>
                        <input type="text" class="form-control" name="address1" value="${data.address1 || ''}" required>
                    </div>
                    <div class="form-group">
                        <label for="address2">Address 2</label>
                        <input type="text" class="form-control" name="address2" value="${data.address2 || ''}">
                    </div>
                    <div class="form-group">
                        <label for="pincode">Pincode</label>
                        <input type="text" class="form-control" name="pincode" value="${data.pincode || ''}" required>
                    </div>
                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" class="form-control" name="city" value="${data.city || ''}" required>
                    </div>
                    <div class="form-group">
                        <label for="state">State</label>
                        <input type="text" class="form-control" name="state" value="${data.state || ''}" required>
                    </div>
                    <div class="form-group">
                        <label for="country">Country</label>
                        <input type="text" class="form-control" name="country" value="${data.country || ''}" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" name="phone" value="${data.phone || ''}" required>
                    </div>
                    <div class="form-group">
                        <label for="phone2">Alternate Phone</label>
                        <input type="text" class="form-control" name="phone2" value="${data.phone2 || ''}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" value="${data.email || ''}" required>
                    </div>
                    <div class="form-group">
                        <label for="origin_area">Origin Area</label>
                        <input type="text" class="form-control" name="origin_area" value="${data.OriginArea || ''}" required>
                    </div>
                `;

                            $('#editLocationModal').modal('show');
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            alert('Failed to load location data: ' + error.message);
                        });
                });
            });

            // Edit Location Form Submission
            // Edit Location Form Submission
            document.getElementById('editLocationForm').addEventListener('submit', function(e) {
                e.preventDefault();

                // Disable form submission button to prevent double submission
                const submitButton = this.querySelector('button[type="submit"]');
                if (submitButton) submitButton.disabled = true;

                const formData = new FormData(this);

                // Log the form data for debugging
                console.log('Form data being sent:');
                for (let pair of formData.entries()) {
                    console.log(pair[0] + ': ' + pair[1]);
                }

                fetch('<?= base_url('warehouse/editLocation') ?>', {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(response => {
                        if (!response.ok) {
                            return response.json().then(err => {
                                throw new Error(err.message || 'Server error');
                            });
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data.success) {
                            alert(data.message);
                            location.reload();
                        } else {
                            alert(data.message || 'Failed to update location');
                            if (submitButton) submitButton.disabled = false;
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('An error occurred while updating the location: ' + error.message);
                        if (submitButton) submitButton.disabled = false;
                    });
            });

            // Confirm Delete
            // Delete confirmation modal HTML
            const deleteModalHTML = `
    <div class="modal fade" id="deleteLocationModal" tabindex="-1" role="dialog" aria-labelledby="deleteLocationModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteLocationModalLabel">Confirm Delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this location? This action cannot be undone.</p>
                    <p class="text-danger font-weight-bold">Location: <span id="deleteLocationName"></span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Delete Location</button>
                </div>
            </div>
        </div>
    </div>
    `;

            // Add the modal HTML to the document body
            document.body.insertAdjacentHTML('beforeend', deleteModalHTML);

            // Store the location ID for deletion
            let locationToDelete = null;

            // Function to show delete confirmation modal
            function showDeleteConfirmation(locationId, locationName) {
                locationToDelete = locationId;
                document.getElementById('deleteLocationName').textContent = locationName;
                $('#deleteLocationModal').modal('show');
            }

            // Delete Location click handler
            document.querySelectorAll('.delete-location').forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const locationId = this.getAttribute('data-id');
                    const locationName = this.getAttribute('data-name');
                    showDeleteConfirmation(locationId, locationName);
                });
            });

            // Confirm delete button click handler
            document.getElementById('confirmDeleteBtn').addEventListener('click', function() {
                if (!locationToDelete) {
                    alert('No location selected for deletion');
                    return;
                }

                // Disable the delete button to prevent double submission
                this.disabled = true;
                this.textContent = 'Deleting...';

                fetch(`<?= base_url('warehouse/deleteLocation/') ?>${locationToDelete}`, {
                        method: 'POST',
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(response => {
                        if (!response.ok) {
                            return response.json().then(err => {
                                throw new Error(err.message || 'Server error');
                            });
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data.success) {
                            alert(data.message);
                            $('#deleteLocationModal').modal('hide');
                            // Reload the page to update the location list
                            location.reload();
                        } else {
                            throw new Error(data.message || 'Failed to delete location');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('An error occurred while deleting the location: ' + error.message);
                        // Re-enable the delete button
                        this.disabled = false;
                        this.textContent = 'Delete Location';
                    })
                    .finally(() => {
                        locationToDelete = null;
                    });
            });
        </script>

        <script>
            document.getElementById('profile-picture').addEventListener('change', function(event) {
                var file = event.target.files[0];
                var errorMessage = document.getElementById('error-message');
                var uploadButton = document.getElementById('upload-btn');

                if (file) {
                    var img = new Image();
                    img.src = URL.createObjectURL(file);

                    img.onload = function() {
                        var width = this.width;
                        var height = this.height;
                        var fileSize = file.size / 1024 / 1024; // Convert size to MB

                        if (width !== 300 || height !== 300) {
                            errorMessage.textContent = "Error: Image must be exactly 300 x 300 pixels.";
                            uploadButton.disabled = true;
                        } else if (fileSize > 1) {
                            errorMessage.textContent = "Error: File size must be under 1MB.";
                            uploadButton.disabled = true;
                        } else {
                            errorMessage.textContent = "";
                            uploadButton.disabled = false;
                        }
                    };
                }
            });
        </script>

        <!-- JavaScript to Preview Image -->
        <script>
            // Preview image before upload
            function previewImage(event) {
                const preview = document.getElementById('razorpay_image_preview');
                const file = event.target.files[0];
                const reader = new FileReader();

                reader.onload = function() {
                    preview.src = reader.result;
                    preview.style.display = 'block';
                };

                if (file) {
                    reader.readAsDataURL(file);
                }
            }
        </script>

</body>

<!-- Footer View Start -->
<?= $this->include('footer_view') ?>
<!-- Footer View End -->

</html>