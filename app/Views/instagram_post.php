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
                <div class="pd-20 card-box mb-30">
                    <div class="clearfix">
                        <div class="pull-left">
                            <h4 class="text-blue h4">Add New Post</h4>
                            <p class="mb-30">Blog Post</p>
                        </div>
                    </div>
                    <form action="<?= site_url('instagram/postToInstagram')?>" enctype="multipart/form-data" method="post">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Example file input</label>
                                    <input type="file" id="media" class="form-control-file form-control height-auto" name="media" required onchange="previewMedia()">
                                    <img class="card-img" style="display: none;" id="media_preview_image" alt="Media Preview (Image)">
                                    <video class="card-img" style="display: none;" id="media_preview_video" controls alt="Media Preview (Video)"></video>                                  
                                </div>                               
                                <div class="form-group">
                                    <label>CAPTION</label>
                                    <textarea class="form-control"placeholder="Enter Caption" id="caption" type="text" name="caption" required></textarea>
                                </div>                                
                        <!--    <div class="form-group">
                                    <label>TAG_USER</label>
                                    <input data-role="tagsinput" placeholder="add tags" id="tags" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>LOCATION</label>
                                    <input type="text" id="location" class="form-control">
                                </div> -->
                            </div>
                            <div class="col-md-6 col-sm-12">
                                
                                <div class="form-group">
                                    <label>PUBLISH_TO</label>
                                    <!-- <div class="custom-control custom-radio">
                                        <input type="radio" id="AD" value="AD" name="PUBLISH_TO" class="custom-control-input">
                                        <label class="custom-control-label" for="AD">AD</label>
                                    </div> -->
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="FEED" value="FEED" name="PUBLISH_TO" class="custom-control-input">
                                        <label class="custom-control-label" for="FEED">FEED</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="STORIES" value="STORIES" name="PUBLISH_TO" class="custom-control-input">
                                        <label class="custom-control-label" for="STORIES">STORIES</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>MEDIA_TYPE</label>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="IMAGE" value="IMAGE" name="MEDIA_TYPE" class="custom-control-input">
                                        <label class="custom-control-label" for="IMAGE">IMAGE</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="REELS" value="REELS" name="MEDIA_TYPE" class="custom-control-input">
                                        <label class="custom-control-label" for="REELS">REELS</label>
                                    </div>
                                    <!-- <div class="custom-control custom-radio">
                                        <input type="radio" id="CAROUSEL_ALBUM" value="CAROUSEL_ALBUM" name="MEDIA_TYPE" class="custom-control-input">
                                        <label class="custom-control-label" for="CAROUSEL_ALBUM">CAROUSEL_ALBUM</label>
                                    </div> -->
                                </div>                                
                                
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary col-md-12 col-sm-12">PUBLISH</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- Page Main Content End -->


        <!-- Footer View Start -->
        <?= $this->include('footer_view') ?>
        <!-- Footer View End -->

</body>




</html>