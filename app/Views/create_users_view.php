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
                        <input type="radio" id="sidebaricon-1" name="menu-dropdown-icon" class="custom-control-input"
                            value="icon-style-1" checked="" />
                        <label class="custom-control-label" for="sidebaricon-1"><i class="fa fa-angle-down"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebaricon-2" name="menu-dropdown-icon" class="custom-control-input"
                            value="icon-style-2" />
                        <label class="custom-control-label" for="sidebaricon-2"><i class="ion-plus-round"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebaricon-3" name="menu-dropdown-icon" class="custom-control-input"
                            value="icon-style-3" />
                        <label class="custom-control-label" for="sidebaricon-3"><i
                                class="fa fa-angle-double-right"></i></label>
                    </div>
                </div>

                <h4 class="weight-600 font-18 pb-10">Menu List Icon</h4>
                <div class="sidebar-radio-group pb-30 mb-10">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-1" name="menu-list-icon" class="custom-control-input"
                            value="icon-list-style-1" checked="" />
                        <label class="custom-control-label" for="sidebariconlist-1"><i
                                class="ion-minus-round"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-2" name="menu-list-icon" class="custom-control-input"
                            value="icon-list-style-2" />
                        <label class="custom-control-label" for="sidebariconlist-2"><i class="fa fa-circle-o"
                                aria-hidden="true"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-3" name="menu-list-icon" class="custom-control-input"
                            value="icon-list-style-3" />
                        <label class="custom-control-label" for="sidebariconlist-3"><i class="dw dw-check"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-4" name="menu-list-icon" class="custom-control-input"
                            value="icon-list-style-4" checked="" />
                        <label class="custom-control-label" for="sidebariconlist-4"><i
                                class="icon-copy dw dw-next-2"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-5" name="menu-list-icon" class="custom-control-input"
                            value="icon-list-style-5" />
                        <label class="custom-control-label" for="sidebariconlist-5"><i
                                class="dw dw-fast-forward-1"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-6" name="menu-list-icon" class="custom-control-input"
                            value="icon-list-style-6" />
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
                <!-- Default Basic Forms Start -->
                <div class="">
                    <div class="clearfix">
                        <div class="pull-left">
                            <h1 class="h2">Add New</h1>
                        </div>
                    </div>
                </div>
                <form id="adduserview" method="post" action="<?= base_url(); ?>registeredusers/publish_new_user"
                    enctype="multipart/form-data" class="needs-validation" novalidate>

                    <div class="mb-3 d-flex justify-content-end">
                            <!-- Back Button -->
                        <button type="button" class="btn btn-secondary mr-3" onclick="goBack()">
                            <i class="fa fa-arrow-left"></i> <!-- Back Arrow Icon -->
                        </button>
                        <button type="submit" class="btn btn-dark btn-lg-4" style="margin-right: 10px;">
                            Add
                        </button>
                    </div>

                    <div class="row">
                        <!-- Personal Information -->
                        <div class="col-md-8 d-flex align-items-stretch">
                            <div class="card-box pd-20 mb-30 w-100">
                            <h5 class="section-title mb-4">Personal Information</h5>

                                <div class="form-group">
                                    <label for="profile_image">Upload Profile Image</label>
                                    <input type="file" name="profile_img" id="profile_img" class="form-control-file"
                                        accept="image/*" onchange="previewProfileImage(event)" required>
                                    <div class="invalid-feedback">Profile image is required.</div>
                                    <div id="profile_image_preview" class="mt-3 text-center">
                                        <!-- Preview will appear here -->
                                    </div>
                                    <small class="text-muted d-block mt-2">Allowed formats: JPG, PNG. Max size: 2MB.</small>
                                </div>

                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="user_name" class="form-control"
                                        placeholder="Enter Customer Name" required>
                                    <div class="invalid-feedback">Name is required.</div>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="user_email" class="form-control"
                                        placeholder="Enter Customer Email" required>
                                    <div class="invalid-feedback">Email is required.</div>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" name="user_phone" class="form-control"
                                        placeholder="Enter Customer Phone" required>
                                    <div class="invalid-feedback">Phone is required.</div>
                                </div>
                                <div class="form-group">
                                    <label for="gender">Gender</label>
                                    <select class="form-control" name="user_gender" required>
                                        <option value="">Select Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Other">Other</option>
                                    </select>
                                    <div class="invalid-feedback">Gender is required.</div>
                                </div>
                                <div class="form-group">
                                    <label for="dob">Date of Birth</label>
                                    <input type="date" name="user_dob" class="form-control" required>
                                    <div class="invalid-feedback">Date of Birth is required.</div>
                                </div>
                                <div class="form-group">
                                    <label for="tags">Tags</label>
                                    <input type="text" name="user_tags" class="form-control" placeholder="Tags">
                                </div>
                            </div>
                        </div>

                        <!-- Address Details -->
                        <div class="col-md-4 d-flex align-items-stretch">
                            <div class="card-box pd-20 mb-30 w-100">
                                <h5 class="section-title">Address Details</h5>
                                <div class="form-group">
                                    <label for="address1">Address Line 1</label>
                                    <input type="text" name="user_address1" class="form-control"
                                        placeholder="Enter Address Line 1" required>
                                    <div class="invalid-feedback">Address Line 1 is required.</div>
                                </div>
                                <div class="form-group">
                                    <label for="address2">Address Line 2</label>
                                    <input type="text" name="user_address2" class="form-control"
                                        placeholder="Enter Address Line 2">
                                </div>
                                <div class="form-group">
                                    <label for="country">Country</label>
                                    <input type="text" name="user_country" class="form-control"
                                        placeholder="Enter Country" required>
                                    <div class="invalid-feedback">Country is required.</div>
                                </div>
                                <div class="form-group">
                                    <label for="state">State</label>
                                    <input type="text" name="user_state" class="form-control" placeholder="Enter State"
                                        required>
                                    <div class="invalid-feedback">State is required.</div>
                                </div>
                                <div class="form-group">
                                    <label for="city">City</label>
                                    <input type="text" name="user_city" class="form-control" placeholder="Enter City"
                                        required>
                                    <div class="invalid-feedback">City is required.</div>
                                </div>
                                <div class="form-group">
                                    <label for="pincode">Pincode</label>
                                    <input type="text" name="user_pincode" class="form-control"
                                        placeholder="Enter Pincode" required>
                                    <div class="invalid-feedback">Pincode is required.</div>
                                </div>
                                <div class="form-group">
                                    <label for="location">Location</label>
                                    <input type="text" name="user_location" class="form-control"
                                        placeholder="Enter Location" required>
                                    <div class="invalid-feedback">Location is required.</div>
                                </div>
                                <div class="form-group">
                                    <label for="landmark">Landmark</label>
                                    <input type="text" name="user_landmark" class="form-control"
                                        placeholder="Enter Landmark">
                                </div>
                            </div>
                        </div>
                    </div>




                    <!-- Order & Activity Details -->
                    <!--  <div class="col-12">
                            <div class="card-box pd-20 mb-30">
                                <h4 class="section-title">Order & Activity Details</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text" name="user_username" class="form-control"
                                                placeholder="Enter Username" required>
                                            <div class="invalid-feedback">Username is required.</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="amount_spent">Amount Spent</label>
                                            <input type="text" name="user_amount_spent" class="form-control"
                                                placeholder="Enter Amount Spent">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="total_orders">Total Orders</label>
                                            <input type="number" name="user_total_orders" class="form-control"
                                                placeholder="Enter Total Orders">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="last_order_placed">Last Order Placed</label>
                                            <input type="date" name="user_last_order_placed" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="timeline">Timeline</label>
                                            <input type="text" name="user_timeline" class="form-control"
                                                placeholder="Timeline Details">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tags">Tags</label>
                                            <input type="text" name="user_tags" class="form-control" placeholder="Tags">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="notes">Notes</label>
                                            <textarea name="user_notes" class="form-control" rows="3"
                                                placeholder="Enter Notes"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="lifetime_value">Lifetime Value</label>
                                            <input type="text" name="user_lifetime_value" class="form-control"
                                                placeholder="Lifetime Value">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="total_spend">Total Spend</label>
                                            <input type="text" name="user_total_spend" class="form-control"
                                                placeholder="Total Spend">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="support_tickets">Support Tickets</label>
                                            <input type="text" name="user_support_tickets" class="form-control"
                                                placeholder="Support Tickets">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </form>
            </div>
        </div>
        <!-- Page Main Content End -->


</body>
<!-- Footer View Start -->
<?= $this->include('footer_view') ?>
<!-- Footer View End -->

    <script>
        function goBack() {
            // Redirects to the previous page in browser history
            window.history.back();
        }
    </script>

</html>