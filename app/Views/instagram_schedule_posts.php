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

                <div class="card-box mb-30">
                    <div class="pd-20 card-box mb-30">
                        <div class="clearfix">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="pull-left">
                                        <h4 class="text-blue h4">Schedule New Post</h4>
                                        <p class="mb-30">Blog Post</p>
                                    </div>
                                </div>


                                    <div class="modal fade" id="loading-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content" style="height: auto;">
                                                <div class="pd-20 card-box">
                                                    <h5 class="h5 mb-20">Saving data...</h5>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-info progress-bar-striped progress-bar-animated" role="progressbar" style="width: 75%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                     
                                

                               

                                <div class="col-md-6 col-sm-12 text-right blogs-imex">
                                    <div class="dropdown">
                                        <a class="btn btn-primary fw-bold" href="" onclick="ScheduleAllPost()" role="button">Save Schedule post</a>
                                    </div>
                                    <div class="dropdown">
                                        <a class="btn btn-primary fw-bold" href="<?= base_url(); ?>blogs/importfromexcel" role="button">
                                            Import
                                        </a>
                                    </div>
                                    <div class="dropdown">
                                        <a class="btn btn-primary fw-bold" href="<?= base_url(); ?>blogs/exporttoexcel" role="button">
                                            Export To Excel
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion" id="accordionExample">
                            <div class="card" id="postCard1">
                                <div class="card-header" id="headingOne">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Schedule post #1
                                        </button>
                                        <button class="btn btn-primary" onclick="removePostForm(1)">REMOVE</button>
                                    </h2>
                                </div>
                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <form id="form1" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Example file input</label>
                                                        <input type="file" id="media1" class="form-control-file form-control height-auto" name="media[]" required onchange="previewMedia(1)">
                                                        <img class="card-img max-height-200px" style="display: none;" id="media_preview_image1" alt="Media Preview (Image)">
                                                        <video class="card-img max-height-200px" style="display: none;" id="media_preview_video1" controls alt="Media Preview (Video)"></video>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>CAPTION</label>
                                                        <textarea class="form-control" placeholder="Enter Caption" id="caption1" type="text" name="caption[]" required></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>PUBLISH AT</label>
                                                        <input type="datetime-local" id="Publish_at1" name="Publish_at[]" class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>PUBLISH TO</label>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" id="FEED1" value="FEED" name="PUBLISH_TO[1]" class="custom-control-input">
                                                            <label class="custom-control-label" for="FEED1">FEED</label>
                                                        </div>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" id="STORIES1" value="STORIES" name="PUBLISH_TO[1]" class="custom-control-input">
                                                            <label class="custom-control-label" for="STORIES1">STORIES</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>MEDIA TYPE</label>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" id="IMAGE1" value="IMAGE" name="MEDIA_TYPE[1]" class="custom-control-input">
                                                            <label class="custom-control-label" for="IMAGE1">IMAGE</label>
                                                        </div>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" id="REELS1" value="REELS" name="MEDIA_TYPE[1]" class="custom-control-input">
                                                            <label class="custom-control-label" for="REELS1">REELS</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <button class="btn btn-primary" onclick="addNewPostForm()">ADD NEW</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Main Content End -->


        <!-- Footer View Start -->
        <?= $this->include('footer_view') ?>
        <!-- Footer View End -->

</body>




</html>