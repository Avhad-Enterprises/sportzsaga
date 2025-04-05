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

    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">

                <div class="d-flex justify-content-center flex-column">
                    <div class="row">
                        <div class="col-10">
                            <div class="pd-20 card-box mb-30 d-flex align-content-between justify-content-between">
                                <div class="">
                                    <div class="user-info d-flex align-content-center">
                                        <span class="user-icon" style="border-radius: 50%; overflow: hidden; display: inline-block;">
                                            <img src="<?= session('profile_picture') ?? 'default.png'; ?>" alt="Profile Picture" style="width: 40px; height: 40px; object-fit: cover;" />
                                        </span>
                                        <span class="user-name" style="border-radius: 5px; padding: 5px 10px; background-color: #f5f5f5; margin: 0 12px;"><?= session('admin_name') ?? 'User'; ?></span>
                                    </div>
                                </div>
                                <!-- Sample Text at the end of the card -->
                                <div class="sample-text" style="border-radius: 5px; font-size: 14px; background-color: #f5f5f5;  color: #333; padding: 5px 10px; font-weight: 700;">
                                    <p><?= ucfirst(session('admin_type') ?? 'User'); ?> (SportzSaga)</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Sidebar with buttons -->
                        <div class="col-md-2 col-sm-12">
                            <div class="pd-20 card-box mb-30">
                                <div class="d-flex flex-column">
                                    <button type="button" class="btn btn-outline-secondary custom-btn mb-1 fw-bold" id="btn1">Footer Pages</button>
                                    <button type="button" class="btn btn-outline-secondary custom-btn mb-1 fw-bold" id="btn2">Tecnical SEO</button>
                                    <button type="button" class="btn btn-outline-secondary custom-btn mb-1 fw-bold" id="btn3">Logo and Favicon</button>
                                    <button type="button" class="btn btn-outline-secondary custom-btn mb-1 fw-bold" id="btn4">Robots.txt</button>
                                    <button type="button" class="btn btn-outline-secondary custom-btn mb-1 fw-bold" id="btn5">Warehouse</button>
                                </div>
                            </div>
                        </div>

                        <!-- Content Area -->
                        <div class="col-md-8 col-sm-12" id="contentArea">
                            <div class="pd-20 card-box mb-30">

                                <div class="content" id="content1">
                                    <h4>Footer Pages</h4>

                                </div>

                                <div class="content" id="content2" style="display:none;">
                                    <h4>Tecnical Seo</h4>

                                </div>

                                <div class="content" id="content3" style="display:none; padding: 20px;">
                                    <h4>Upload Logos and Favicon</h4>

                                </div>


                                <div class="content" id="content4" style="display:none;">
                                    <h4 class="mb-30">Robots.txt</h4>


                                </div>

                            </div>
                        </div>
                    </div>

                    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

                    <script>
                        $(document).ready(function() {

                            $('.custom-btn').click(function() {

                                $('.custom-btn').removeClass('btn-secondary').addClass('btn-outline-secondary');

                                $(this).removeClass('btn-outline-secondary').addClass('btn-secondary');

                                $('.content').hide();
                                $('#content' + this.id.slice(-1)).show();
                            });

                            $('#btn1').click();
                        });
                    </script>

                </div>

            </div>
        </div>
    </div>

    <!-- Footer View Start -->
    <?= $this->include('footer_view') ?>
    <!-- Footer View End -->
</body>

</html>