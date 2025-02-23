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
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-10-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Customer Service</h4>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 text-right blogs-imex">
                            <div class="row">
                                <i class="fa-brands fa-facebook socialmes"></i>
                                <i class="fa-brands fa-twitter socialmes"></i>
                                <i class="fa-brands fa-instagram socialmes"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Page Main Content Start -->
                <div class="row">
                    <div class="col">

                        <div class="card-box mb-30">
                            <div class="pd-10">
                                <h6 class="text-blue h6">Recent Email's</h6>
                                <div class="name-avatar d-flex align-items-center pr-2">
                                    <div class="txt">
                                        <span class="badge badge-pill badge-sm" data-bgcolor="#e7ebf5" data-color="#265ed7">tags</span>
                                        <div class="font-14 weight-600">Where is my Product</div>
                                        <div class="font-12 weight-500" data-color="#b2b1b6">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit.......
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-box mb-30">
                            <div class="pd-10">
                                <h6 class="text-blue h6">Driphunter Agents</h6>
                                <div class="card-box height-100-p pd-10 min-height-200px">
                                    <div class="d-flex justify-content-between pb-10">
                                        <div class="h5 mb-0">Agents</div>
                                        <!-- <div class="dropdown">
                                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" data-color="#1b3133" href="#" role="button" data-toggle="dropdown">
                                                <i class="dw dw-more"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                <a class="dropdown-item" href="#"><i class="dw dw-eye"></i> View</a>
                                                <a class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Edit</a>
                                                <a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i> Delete</a>
                                            </div>
                                        </div> -->
                                    </div>
                                    <div class="user-list">
                                        <ul>
                                            <li class="d-flex align-items-center justify-content-between">
                                                <div class="name-avatar d-flex align-items-center pr-2">
                                                    <div class="avatar mr-2 flex-shrink-0">
                                                        <img src="<?= base_url(); ?>vendors/images/photo1.jpg" class="border-radius-100 box-shadow" width="50" height="50" alt="" />
                                                    </div>
                                                    <div class="txt">
                                                        <span class="badge badge-pill badge-sm" data-bgcolor="#e7ebf5" data-color="#265ed7">4.9</span>
                                                        <div class="font-14 weight-600">Dr. Neil Wagner</div>
                                                        <div class="font-12 weight-500" data-color="#b2b1b6">
                                                            Pediatrician
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="d-flex align-items-center justify-content-between">
                                                <div class="name-avatar d-flex align-items-center pr-2">
                                                    <div class="avatar mr-2 flex-shrink-0">
                                                        <img src="<?= base_url(); ?>vendors/images/photo2.jpg" class="border-radius-100 box-shadow" width="50" height="50" alt="" />
                                                    </div>
                                                    <div class="txt">
                                                        <span class="badge badge-pill badge-sm" data-bgcolor="#e7ebf5" data-color="#265ed7">4.9</span>
                                                        <div class="font-14 weight-600">Dr. Ren Delan</div>
                                                        <div class="font-12 weight-500" data-color="#b2b1b6">
                                                            Pediatrician
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="d-flex align-items-center justify-content-between">
                                                <div class="name-avatar d-flex align-items-center pr-2">
                                                    <div class="avatar mr-2 flex-shrink-0">
                                                        <img src="<?= base_url(); ?>vendors/images/photo3.jpg" class="border-radius-100 box-shadow" width="50" height="50" alt="" />
                                                    </div>
                                                    <div class="txt">
                                                        <span class="badge badge-pill badge-sm" data-bgcolor="#e7ebf5" data-color="#265ed7">4.9</span>
                                                        <div class="font-14 weight-600">Dr. Garrett Kincy</div>
                                                        <div class="font-12 weight-500" data-color="#b2b1b6">
                                                            Pediatrician
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="d-flex align-items-center justify-content-between">
                                                <div class="name-avatar d-flex align-items-center pr-2">
                                                    <div class="avatar mr-2 flex-shrink-0">
                                                        <img src="<?= base_url(); ?>vendors/images/photo4.jpg" class="border-radius-100 box-shadow" width="50" height="50" alt="" />
                                                    </div>
                                                    <div class="txt">
                                                        <span class="badge badge-pill badge-sm" data-bgcolor="#e7ebf5" data-color="#265ed7">4.9</span>
                                                        <div class="font-14 weight-600">Dr. Callie Reed</div>
                                                        <div class="font-12 weight-500" data-color="#b2b1b6">
                                                            Pediatrician
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="pb-20">
                            </div>
                        </div>


                    </div>
                    <div class="col col-6">

                        <!-- <div class="card-box mb-30">
                            <div class="pd-10">
                                <div class="row">
                                    <div class="col">
                                        <p>Press Enter to Seprate</p>
                                        <input type="text" value="tag-1, tag-2, tag-3" data-role="tagsinput" />
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Assign to</label>
                                            <select class="custom-select2 form-control" style="width: 100%; height: 38px">
                                                <optgroup label="Select Visibility">
                                                    <option selected>Select Agent</option>
                                                    <option value="">Aditya</option>
                                                    <option value="">Ram</option>
                                                    <option value="">Shyam</option>
                                                    <option value="">Ravi</option>
                                                    <option value="">Rajesh</option>
                                                    <option value="">Ramesh</option>
                                                </optgroup>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                        <div class="card-box mb-30">
                            <div class="pd-10">
                                <h6 class="text-blue h6">Email</h6>
                                <div class="title cdtitle">
                                    <h6>Where is my Product, Lorem ipsum dolor sit amet consectetur adipisicing elit.......</h6>
                                </div>
                                <div class="name-avatar d-flex align-items-center pr-2">
                                    <div class="avatar mr-2 flex-shrink-0">
                                        <img src="<?= base_url(); ?>vendors/images/photo1.jpg" class="border-radius-100 box-shadow" width="35" height="35" alt="" />
                                    </div>
                                    <div class="txt">
                                        <span class="badge badge-pill badge-sm" data-bgcolor="#e7ebf5" data-color="#265ed7">tags</span>
                                        <div class="font-14 weight-600">John Watts</div>
                                    </div>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex quidem velit adipisci quas corporis autem beatae aspernatur vel voluptate consequuntur, quia iste eligendi tempore est assumenda dolore quasi omnis fugit.
                                </p>
                                <p>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex quidem velit adipisci quas corporis autem beatae aspernatur vel voluptate consequuntur, quia iste eligendi tempore est assumenda dolore quasi omnis fugit.
                                </p>
                                <p>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex quidem velit adipisci quas corporis autem beatae aspernatur vel voluptate consequuntur, quia iste eligendi tempore est assumenda dolore quasi omnis fugit.
                                </p>
                            </div>
                            <div class="row btns">
                                <div class="col">
                                    <button type="button" class="btn btn-outline-success reply-btn">
                                        Reply
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col">
                        <div class="card-box mb-30">
                            <div class="pd-10">
                                <h6 class="text-blue h6">Customer Details</h6>
                                <div class="title cdtitle">
                                    <h6>John Watts</h6>
                                </div>
                                <div class="title cdtitle">
                                    <h6>+91 9568326585</h6>
                                </div>
                                <div class="title cdtitle">
                                    <h6>wattsjohn56@gmail.com</h6>
                                </div>
                                <p> <strong>Address: </strong>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur corporis itaque voluptates.
                                </p>
                            </div>
                            <div class="pb-20">
                            </div>
                        </div>
                        <div class="card-box mb-30">
                            <div class="pd-10">
                                <h6 class="text-blue h6">All Order Details</h6>
                                <p>Order ID :- 00002134</p>
                                <div class="name-avatar d-flex align-items-center pr-2">
                                    <div class="avatar mr-2 flex-shrink-0">
                                        <img src="<?= base_url(); ?>vendors/images/product-1.jpg" class="border-radius-100 box-shadow" width="50" height="50" alt="" />
                                    </div>
                                    <div class="txt">
                                        <span class="badge badge-pill badge-sm" data-bgcolor="#e7ebf5" data-color="#265ed7">5.1</span>
                                        <div class="font-14 weight-600">Captain America T-shirt</div>
                                        <div class="font-12 weight-500" data-color="#b2b1b6">
                                            Category
                                        </div>
                                        <div class="font-14 weight-600">
                                            &#8377;1999
                                        </div>
                                    </div>
                                </div>
                                <div class="name-avatar d-flex align-items-center pr-2">
                                    <div class="avatar mr-2 flex-shrink-0">
                                        <img src="<?= base_url(); ?>vendors/images/product-1.jpg" class="border-radius-100 box-shadow" width="50" height="50" alt="" />
                                    </div>
                                    <div class="txt">
                                        <span class="badge badge-pill badge-sm" data-bgcolor="#e7ebf5" data-color="#265ed7">5.1</span>
                                        <div class="font-14 weight-600">Captain America T-shirt</div>
                                        <div class="font-12 weight-500" data-color="#b2b1b6">
                                            Category
                                        </div>
                                        <div class="font-14 weight-600">
                                            &#8377;1999
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-box mb-30">
                            <div class="pd-10">
                                <h6 class="text-blue h6">Total Amount spent</h6>
                                <div class="font-18 weight-600">
                                    &#8377;3998
                                </div>
                            </div>
                        </div>
                        <div class="card-box mb-30">
                            <div class="pd-10">
                                <h6 class="text-blue h6">Payment Details</h6>
                                <div class="font-12 weight-500" data-color="#b2b1b6">
                                    Transaction ID :- TTCNI022000800594
                                </div>
                                <div class="font-14 weight-600">
                                    UPI/Card/or any other Online Mode
                                </div>
                                <div class="font-14 weight-600">
                                    COD
                                </div>
                            </div>
                        </div>
                        <div class="card-box mb-30">
                            <div class="pd-10">
                                <h6 class="text-blue h6">Tracking</h6>
                                <div class="font-12 weight-500" data-color="#b2b1b6">
                                    Tracking No. :- BALM123xxxxaaaaKOL
                                </div>
                                <h6 class="text-blue h6"><a href="">Link</a></h6>
                                <div class="container pd-0">
                                    <div class="timeline mb-30">
                                        <ul>
                                            <li>
                                                <div class="timeline-date">15 Jan 2020</div>
                                                <div class="timeline-desc card-box">
                                                    <p>
                                                        Lorem ipsum dolor sit amet, consectetur adipisicing
                                                        elit.
                                                    </p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="timeline-date">15 Jan 2020</div>
                                                <div class="timeline-desc card-box">
                                                    <p>
                                                        Lorem ipsum dolor sit amet, consectetur adipisicing
                                                        elit.
                                                    </p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="timeline-date">15 Jan 2020</div>
                                                <div class="timeline-desc card-box">
                                                    <p>
                                                        Lorem ipsum dolor sit amet, consectetur adipisicing
                                                        elit.
                                                    </p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="pb-20">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Page Main Content End -->
            </div>
        </div>
    </div>
    <!-- Footer View Start -->
    <?= $this->include('footer_view') ?>
    <!-- Footer View End -->

</body>

</html>