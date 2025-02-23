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
                <!-- Default Basic Forms Start -->

                <div class="">
                <div class="clearfix mb-3">
                    <div class="pull-left d-flex align-items-center">
                        <!-- Back Button -->
                        <button type="button" class="btn btn-secondary mr-3" onclick="goBack()">
                            <i class="fa fa-arrow-left"></i> <!-- Back Arrow Icon -->
                        </button>
                        <h4 class="h4 mb-0">Add New Brand.</h4>
                    </div>
                </div>

                </div>

                <form id="editsripspotform" method="post" action="<?= base_url(); ?>brands/publishbrand" enctype="multipart/form-data" class="needs-validation" novalidate>

                    <div class="row">

                        <div class="col-md-6">
                            <div class="pd-20 card-box mb-30">
                                <p class="text-blue mb-30">Enter Name and Location</p>
                                <div class="form-group">
                                    <label>Brand Name</label>
                                    <input class="form-control" name="brand-name" type="text" placeholder="Name Of The Celebrity" maxlength="55" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        This feild can't be Empty
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Vendor Name</label>
                                    <input class="form-control" name="vendor" type="text" placeholder="Name Of The Vendor" maxlength="155" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        This feild can't be Empty
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>City</label>
                                    <input class="form-control" name="city" type="text" placeholder="city" maxlength="55" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        This feild can't be Empty
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Country</label>
                                    <input class="form-control" name="country" type="text" placeholder="Country" maxlength="55" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        This feild can't be Empty
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <button value="submit" class="btn btn-primary btn-lg">
                                    Publish
                                </button>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="pd-20 card-box mb-30">
                                <p class="text-blue mb-30">Upload Logo</p>
                                <div class="form-group">
                                    <label>Logo</label>
                                    <input type="file" name="logo" class="form-control-file form-control height-auto" onchange="previewLogo(event)" required>
                                    <small>Formats: JPG, PNG, JPEG, (WEBP), Recommended Size: 240 x 120 px.</small>
                                    <img id="logo-image-preview" src="#" alt="Image Preview">
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        This feild can't be Empty
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    
                </form>

            </div>
        </div>
        <!-- Page Main Content End -->

        <!-- Footer View Start -->
        <?= $this->include('footer_view') ?>
        <!-- Footer View End -->

          <!-- Footer View End -->
    <script>
        function goBack() {
            // Redirects to the previous page in browser history
            window.history.back();
        }
    </script>

</body>

</html>