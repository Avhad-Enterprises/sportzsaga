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
    <?= $this->include('os_left_view') ?>
    <!-- Header View End -->

    <div class="mobile-menu-overlay"></div>
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <!-- Page Main Content Start -->

                <div class="d-flex justify-content-between align-content-baseline">
                    <div class="form-group col-md-4">
                        <label for="web_section">Section</label>
                        <select name="web_section" id="web_section" class="form-control">
                            <option value="home">Home</option>
                            <option value="blogs">All Blogs</option>
                            <option value="singleblog">Single Blog</option>
                            <option value="collection">Collection</option>
                            <option value="about">About</option>
                            <option value="contact">Contact</option>
                            <option value="search">Search</option>
                            <option value="cart">Cart Page</option>
                            <option value="order">User Orders</option>
                            <option value="checkout">User Checkout Page</option>
                            <option value="tracking">User Tracking Page</option>
                            <option value="404">404 Page</option>
                            <option value="product">Product</option>
                            <option value="otherpages">Other pages</option>
                            <option value="Footer">Footer</option>
                            <option value="header">Header</option>
                            <option value="Email_POP_UP">Email POP UP</option>
                        </select>
                    </div>

                    <div id="web-home" class="web-section" style="display: none;">
                        <button type="button" id="updatehomepage" class="btn m-4 btn-primary">Update Home page</button>
                    </div>
                    <div id="web-blogs" class="web-section" style="display: none;">
                        <button type="button" id="updateblogpage" class="btn m-4 btn-primary">Update Blogs page</button>
                    </div>
                    <div id="web-about" class="web-section" style="display: none;">
                        <button type="button" id="updateaboutpage" class="btn m-4 btn-primary">Update About
                            page</button>
                    </div>
                    <div id="web-contact" class="web-section" style="display: none;">
                        <button type="button" id="updatecontactpage" class="btn m-4 btn-primary">Update Contact
                            page</button>
                    </div>
                    <div id="web-search" class="web-section" style="display: none;">
                        <button type="button" id="updatesearchpage" class="btn m-4 btn-primary">Update Search
                            page</button>
                    </div>
                    <div id="web-wishlist" class="web-section" style="display: none;">
                        <button type="button" id="updatewishlistpage" class="btn m-4 btn-primary">Update Wishlist
                            page</button>
                    </div>
                    <div id="web-cart" class="web-section" style="display: none;">
                        <button type="button" id="updatecartpage" class="btn m-4 btn-primary">Update Cart page</button>
                    </div>
                    <div id="web-checkout" class="web-section" style="display: none;">
                        <button type="button" id="updatecheckout" class="btn m-4 btn-primary">Update Checkout
                            page</button>
                    </div>
                    <div id="web-tracking" class="web-section" style="display: none;">
                        <button type="button" id="updatetracking" class="btn m-4 btn-primary">Update Tracking
                            page</button>
                    </div>
                    <div id="web-404" class="web-section" style="display: none;">
                        <button type="button" id="update404" class="btn m-4 btn-primary">Update 404 page</button>
                    </div>
                    <div id="web-header" class="web-section" style="display: none;">
                        <button type="submit" id="updateheader" class="btn m-4 btn-primary">Update Header</button>
                    </div>
                    <div id="web-singleblog" class="web-section" style="display: none;">
                        <button type="submit" id="updatesingleblog" class="btn m-4 btn-primary">Update Single Blog
                            page</button>
                    </div>
                    <div id="web-collection" class="web-section" style="display: none;">
                        <button type="submit" id="updatecollection" class="btn m-4 btn-primary">Update Collection
                            page</button>
                    </div>
                    <div id="web-product" class="web-section" style="display: none;">
                        <button type="submit" id="updateproductpage" class="btn m-4 btn-primary">Update Product
                            page</button>
                    </div>
                    <div id="web-Email_POP_UP" class="web-section" style="display: none;">
                        <button type="submit" id="updateEmail_POP_UPpage" class="btn m-4 btn-primary">Update Email POP
                            UP page</button>
                    </div>
                </div>

                <div class="d-flex justify-content-center my-3">
                    <button type="button" id="showDesktop" class="btn btn-primary mx-2">Desktop View</button>
                    <button type="button" id="showMobile" class="btn btn-secondary mx-2">Mobile View</button>
                </div>

                <div id="web-home" class="web-section">
                    <div class="OnlinStorePreMain"
                        style="width: 100%; max-width: 1200px; height: 85vh; margin: auto; background: #f4f4f4; display: flex; justify-content: center; align-items: center; position: relative; overflow: hidden;">

                        <!-- Desktop View (Large Size, Visible by Default) -->
                        <div class="preview desktop-view" style="width: 100%; height: 85vh; display: block;">
                            <p class="preview-title"
                                style="position: absolute; top: 10px; left: 50%; transform: translateX(-50%); font-size: 18px; font-weight: bold;">
                                Desktop View</p>
                            <iframe src="http://localhost/sportz_saga/" frameborder="0" class="preview-iframe"
                                style="width: 100%; height: 100%; border: none;"></iframe>
                        </div>

                        <!-- Mobile View (Smaller Size, Hidden by Default) -->
                        <div class="preview mobile-view"
                            style="width: 375px; height: 667px; display: none; border: 10px solid #000; border-radius: 20px; background: white; position: relative;">
                            <p class="preview-title"
                                style="position: absolute; top: -20px; left: 50%; transform: translateX(-50%); font-size: 16px; font-weight: bold;">
                                Mobile View</p>
                            <iframe src="http://localhost/sportz_saga/" frameborder="0" class="preview-iframe"
                                style="width: 100%; height: 100%; border: none;"></iframe>
                        </div>

                    </div>
                </div>
                <!-- Search Page -->
                <div id="web-search" class="web-section" style="display: none;">
                    <div class="OnlinStorePreMain"
                        style="width: 100%; max-width: 1200px; height: 85vh; margin: auto; background: #f4f4f4; display: flex; justify-content: center; align-items: center; position: relative; overflow: hidden;">

                        <!-- Desktop View (Large Size, Visible by Default) -->
                        <div class="preview desktop-view" style="width: 100%; height: 85vh; display: block;">
                            <p class="preview-title"
                                style="position: absolute; top: 10px; left: 50%; transform: translateX(-50%); font-size: 18px; font-weight: bold;">
                                Desktop View</p>
                            <iframe src="http://localhost/sportz_saga/" frameborder="0" class="preview-iframe"
                                style="width: 100%; height: 100%; border: none;"></iframe>
                        </div>

                        <!-- Mobile View (Smaller Size, Hidden by Default) -->
                        <div class="preview mobile-view"
                            style="width: 375px; height: 667px; display: none; border: 10px solid #000; border-radius: 20px; background: white; position: relative;">
                            <p class="preview-title"
                                style="position: absolute; top: -20px; left: 50%; transform: translateX(-50%); font-size: 16px; font-weight: bold;">
                                Mobile View</p>
                            <iframe src="http://localhost/sportz_saga/" frameborder="0" class="preview-iframe"
                                style="width: 100%; height: 100%; border: none;"></iframe>
                        </div>
                    </div>
                </div>

                <!-- Blogs Page -->
                <div id="web-blogs" class="web-section" style="display: none;">
                    <div class="OnlinStorePreMain"
                        style="width: 100%; max-width: 1200px; height: 85vh; margin: auto; background: #f4f4f4; display: flex; justify-content: center; align-items: center; position: relative; overflow: hidden;">

                        <!-- Desktop View (Large Size, Visible by Default) -->
                        <div class="preview desktop-view" style="width: 100%; height: 85vh; display: block;">
                            <p class="preview-title"
                                style="position: absolute; top: 10px; left: 50%; transform: translateX(-50%); font-size: 18px; font-weight: bold;">
                                Desktop View</p>
                            <iframe src="http://localhost/sportz_saga/allblogs" frameborder="0" class="preview-iframe"
                                style="width: 100%; height: 100%; border: none;"></iframe>
                        </div>

                        <!-- Mobile View (Smaller Size, Hidden by Default) -->
                        <div class="preview mobile-view"
                            style="width: 375px; height: 667px; display: none; border: 10px solid #000; border-radius: 20px; background: white; position: relative;">
                            <p class="preview-title"
                                style="position: absolute; top: -20px; left: 50%; transform: translateX(-50%); font-size: 16px; font-weight: bold;">
                                Mobile View</p>
                            <iframe src="http://localhost/sportz_saga/allblogs" frameborder="0" class="preview-iframe"
                                style="width: 100%; height: 100%; border: none;"></iframe>
                        </div>
                    </div>
                </div>
                <!-- Single Blog Page -->
                <div id="web-singleblog" class="web-section" style="display: none;">
                    <div class="OnlinStorePreMain"
                        style="width: 100%; max-width: 1200px; height: 85vh; margin: auto; background: #f4f4f4; display: flex; justify-content: center; align-items: center; position: relative; overflow: hidden;">

                        <!-- Desktop View (Large Size, Visible by Default) -->
                        <div class="preview desktop-view" style="width: 100%; height: 85vh; display: block;">
                            <p class="preview-title"
                                style="position: absolute; top: 10px; left: 50%; transform: translateX(-50%); font-size: 18px; font-weight: bold;">
                                Desktop View</p>
                            <iframe
                                src="http://localhost/sportz_saga/blog_detail/the-power-of-digital-marketing-unlocking-business-potential-in-the-digital-age2"
                                frameborder="0" class="preview-iframe"
                                style="width: 100%; height: 100%; border: none;"></iframe>
                        </div>

                        <!-- Mobile View (Smaller Size, Hidden by Default) -->
                        <div class="preview mobile-view"
                            style="width: 375px; height: 667px; display: none; border: 10px solid #000; border-radius: 20px; background: white; position: relative;">
                            <p class="preview-title"
                                style="position: absolute; top: -20px; left: 50%; transform: translateX(-50%); font-size: 16px; font-weight: bold;">
                                Mobile View</p>
                            <iframe
                                src="http://localhost/sportz_saga/blog_detail/the-power-of-digital-marketing-unlocking-business-potential-in-the-digital-age2"
                                frameborder="0" class="preview-iframe"
                                style="width: 100%; height: 100%; border: none;"></iframe>
                        </div>

                    </div>
                </div>

                <!-- Collection Page -->
                <div id="web-collection" class="web-section" style="display: none;">
                    <div class="OnlinStorePreMain"
                        style="width: 100%; max-width: 1200px; height: 85vh; margin: auto; background: #f4f4f4; display: flex; justify-content: center; align-items: center; position: relative; overflow: hidden;">

                        <!-- Desktop View -->
                        <div class="preview desktop-view" style="width: 100%; height: 85vh; display: block;">
                            <p class="preview-title"
                                style="position: absolute; top: 10px; left: 50%; transform: translateX(-50%); font-size: 18px; font-weight: bold;">
                                Desktop View</p>
                            <iframe src="http://localhost/sportz_saga/collection/siscaa-black-carrom-board#"
                                frameborder="0" class="preview-iframe"
                                style="width: 100%; height: 100%; border: none;"></iframe>
                        </div>

                        <!-- Mobile View -->
                        <div class="preview mobile-view"
                            style="width: 375px; height: 667px; display: none; border: 10px solid #000; border-radius: 20px; background: white; position: relative;">
                            <p class="preview-title"
                                style="position: absolute; top: -20px; left: 50%; transform: translateX(-50%); font-size: 16px; font-weight: bold;">
                                Mobile View</p>
                            <iframe src="http://localhost/sportz_saga/collection/siscaa-black-carrom-board#"
                                frameborder="0" class="preview-iframe"
                                style="width: 100%; height: 100%; border: none;"></iframe>
                        </div>

                    </div>
                </div>

                <!-- About Page -->
                <div id="web-about" class="web-section" style="display: none;">
                    <div class="OnlinStorePreMain"
                        style="width: 100%; max-width: 1200px; height: 85vh; margin: auto; background: #f4f4f4; display: flex; justify-content: center; align-items: center; position: relative; overflow: hidden;">

                        <!-- Desktop View -->
                        <div class="preview desktop-view" style="width: 100%; height: 85vh; display: block;">
                            <p class="preview-title"
                                style="position: absolute; top: 10px; left: 50%; transform: translateX(-50%); font-size: 18px; font-weight: bold;">
                                Desktop View</p>
                            <iframe src="http://localhost/sportz_saga/about" frameborder="0" class="preview-iframe"
                                style="width: 100%; height: 100%; border: none;"></iframe>
                        </div>

                        <!-- Mobile View -->
                        <div class="preview mobile-view"
                            style="width: 375px; height: 667px; display: none; border: 10px solid #000; border-radius: 20px; background: white; position: relative;">
                            <p class="preview-title"
                                style="position: absolute; top: -20px; left: 50%; transform: translateX(-50%); font-size: 16px; font-weight: bold;">
                                Mobile View</p>
                            <iframe src="http://localhost/sportz_saga/about" frameborder="0" class="preview-iframe"
                                style="width: 100%; height: 100%; border: none;"></iframe>
                        </div>

                    </div>
                </div>

                <!-- Contact Page -->
                <div id="web-contact" class="web-section" style="display: none;">
                    <div class="OnlinStorePreMain"
                        style="width: 100%; max-width: 1200px; height: 85vh; margin: auto; background: #f4f4f4; display: flex; justify-content: center; align-items: center; position: relative; overflow: hidden;">

                        <!-- Desktop View (Large Size, Visible by Default) -->
                        <div class="preview desktop-view" style="width: 100%; height: 85vh; display: block;">
                            <p class="preview-title"
                                style="position: absolute; top: 10px; left: 50%; transform: translateX(-50%); font-size: 18px; font-weight: bold;">
                                Desktop View</p>
                            <iframe src="http://localhost/sportz_saga/contact" frameborder="0" class="preview-iframe"
                                style="width: 100%; height: 100%; border: none;"></iframe>
                        </div>

                        <!-- Mobile View (Smaller Size, Hidden by Default) -->
                        <div class="preview mobile-view"
                            style="width: 375px; height: 667px; display: none; border: 10px solid #000; border-radius: 20px; background: white; position: relative;">
                            <p class="preview-title"
                                style="position: absolute; top: -20px; left: 50%; transform: translateX(-50%); font-size: 16px; font-weight: bold;">
                                Mobile View</p>
                            <iframe src="http://localhost/sportz_saga/contact" frameborder="0" class="preview-iframe"
                                style="width: 100%; height: 100%; border: none;"></iframe>
                        </div>

                    </div>
                </div>

                <!-- Wishlist Page -->
                <div id="web-wishlist" class="web-section" style="display: none;">
                    <div class="OnlinStorePreMain"
                        style="width: 100%; max-width: 1200px; height: 85vh; margin: auto; background: #f4f4f4; display: flex; justify-content: center; align-items: center; position: relative; overflow: hidden;">

                        <!-- Desktop View -->
                        <div class="preview desktop-view" style="width: 100%; height: 85vh; display: block;">
                            <p class="preview-title"
                                style="position: absolute; top: 10px; left: 50%; transform: translateX(-50%); font-size: 18px; font-weight: bold;">
                                Desktop View</p>
                            <iframe src="http://localhost/sportz_saga/wishlist" frameborder="0" class="preview-iframe"
                                style="width: 100%; height: 100%; border: none;"></iframe>
                        </div>

                        <!-- Mobile View -->
                        <div class="preview mobile-view"
                            style="width: 375px; height: 667px; display: none; border: 10px solid #000; border-radius: 20px; background: white; position: relative;">
                            <p class="preview-title"
                                style="position: absolute; top: -20px; left: 50%; transform: translateX(-50%); font-size: 16px; font-weight: bold;">
                                Mobile View</p>
                            <iframe src="http://localhost/sportz_saga/wishlist" frameborder="0" class="preview-iframe"
                                style="width: 100%; height: 100%; border: none;"></iframe>
                        </div>

                    </div>
                </div>

                <!-- Marquee Page -->
                <div id="web-marquee" class="web-section" style="display: none;">
                    <div class="OnlinStorePreMain"
                        style="width: 100%; max-width: 1200px; height: 85vh; margin: auto; background: #f4f4f4; display: flex; justify-content: center; align-items: center; position: relative; overflow: hidden;">

                        <!-- Desktop View -->
                        <div class="preview desktop-view" style="width: 100%; height: 85vh; display: block;">
                            <p class="preview-title"
                                style="position: absolute; top: 10px; left: 50%; transform: translateX(-50%); font-size: 18px; font-weight: bold;">
                                Desktop View</p>
                            <iframe src="http://localhost/sportz_saga/" frameborder="0" class="preview-iframe"
                                style="width: 100%; height: 100%; border: none;"></iframe>
                        </div>

                        <!-- Mobile View -->
                        <div class="preview mobile-view"
                            style="width: 375px; height: 667px; display: none; border: 10px solid #000; border-radius: 20px; background: white; position: relative;">
                            <p class="preview-title"
                                style="position: absolute; top: -20px; left: 50%; transform: translateX(-50%); font-size: 16px; font-weight: bold;">
                                Mobile View</p>
                            <iframe src="http://localhost/sportz_saga/" frameborder="0" class="preview-iframe"
                                style="width: 100%; height: 100%; border: none;"></iframe>
                        </div>

                    </div>
                </div>

                <!-- Cart Page -->
                <div id="web-cart" class="web-section" style="display: none;">
                    <div class="OnlinStorePreMain"
                        style="width: 100%; max-width: 1200px; height: 85vh; margin: auto; background: #f4f4f4; display: flex; justify-content: center; align-items: center; position: relative; overflow: hidden;">

                        <!-- Desktop View -->
                        <div class="preview desktop-view" style="width: 100%; height: 85vh; display: block;">
                            <p class="preview-title"
                                style="position: absolute; top: 10px; left: 50%; transform: translateX(-50%); font-size: 18px; font-weight: bold;">
                                Desktop View</p>
                            <iframe src="http://localhost/sportz_saga/cart" frameborder="0" class="preview-iframe"
                                style="width: 100%; height: 100%; border: none;"></iframe>
                        </div>

                        <!-- Mobile View -->
                        <div class="preview mobile-view"
                            style="width: 375px; height: 667px; display: none; border: 10px solid #000; border-radius: 20px; background: white; position: relative;">
                            <p class="preview-title"
                                style="position: absolute; top: -20px; left: 50%; transform: translateX(-50%); font-size: 16px; font-weight: bold;">
                                Mobile View</p>
                            <iframe src="http://localhost/sportz_saga/cart" frameborder="0" class="preview-iframe"
                                style="width: 100%; height: 100%; border: none;"></iframe>
                        </div>

                    </div>
                </div>

                <!-- Checkout Page -->
                <div id="web-checkout" class="web-section" style="display: none;">
                    <div class="OnlinStorePreMain"
                        style="width: 100%; max-width: 1200px; height: 85vh; margin: auto; background: #f4f4f4; display: flex; justify-content: center; align-items: center; position: relative; overflow: hidden;">

                        <!-- Desktop View -->
                        <div class="preview desktop-view" style="width: 100%; height: 85vh; display: block;">
                            <p class="preview-title"
                                style="position: absolute; top: 10px; left: 50%; transform: translateX(-50%); font-size: 18px; font-weight: bold;">
                                Desktop View</p>
                            <iframe src="http://localhost/sportz_saga/checkout" frameborder="0" class="preview-iframe"
                                style="width: 100%; height: 100%; border: none;"></iframe>
                        </div>

                        <!-- Mobile View -->
                        <div class="preview mobile-view"
                            style="width: 375px; height: 667px; display: none; border: 10px solid #000; border-radius: 20px; background: white; position: relative;">
                            <p class="preview-title"
                                style="position: absolute; top: -20px; left: 50%; transform: translateX(-50%); font-size: 16px; font-weight: bold;">
                                Mobile View</p>
                            <iframe src="http://localhost/sportz_saga/checkout" frameborder="0" class="preview-iframe"
                                style="width: 100%; height: 100%; border: none;"></iframe>
                        </div>

                    </div>
                </div>

                <!-- Tracking Page -->
                <div id="web-tracking" class="web-section" style="display: none;">
                    <div class="OnlinStorePreMain"
                        style="width: 100%; max-width: 1200px; height: 85vh; margin: auto; background: #f4f4f4; display: flex; justify-content: center; align-items: center; position: relative; overflow: hidden;">

                        <!-- Desktop View -->
                        <div class="preview desktop-view" style="width: 100%; height: 85vh; display: block;">
                            <p class="preview-title"
                                style="position: absolute; top: 10px; left: 50%; transform: translateX(-50%); font-size: 18px; font-weight: bold;">
                                Desktop View</p>
                            <iframe src="http://localhost/sportz_saga/tracking" frameborder="0" class="preview-iframe"
                                style="width: 100%; height: 100%; border: none;"></iframe>
                        </div>

                        <!-- Mobile View -->
                        <div class="preview mobile-view"
                            style="width: 375px; height: 667px; display: none; border: 10px solid #000; border-radius: 20px; background: white; position: relative;">
                            <p class="preview-title"
                                style="position: absolute; top: -20px; left: 50%; transform: translateX(-50%); font-size: 16px; font-weight: bold;">
                                Mobile View</p>
                            <iframe src="http://localhost/sportz_saga/tracking" frameborder="0" class="preview-iframe"
                                style="width: 100%; height: 100%; border: none;"></iframe>
                        </div>

                    </div>
                </div>

                <!-- 404 Page -->
                <div id="web-404" class="web-section" style="display: none;">
                    <div class="OnlinStorePreMain"
                        style="width: 100%; max-width: 1200px; height: 85vh; margin: auto; background: #f4f4f4; display: flex; justify-content: center; align-items: center; position: relative; overflow: hidden;">

                        <!-- Desktop View -->
                        <div class="preview desktop-view" style="width: 100%; height: 85vh; display: block;">
                            <p class="preview-title"
                                style="position: absolute; top: 10px; left: 50%; transform: translateX(-50%); font-size: 18px; font-weight: bold;">
                                Desktop View</p>
                            <iframe src="http://localhost/sportz_saga/404" frameborder="0" class="preview-iframe"
                                style="width: 100%; height: 100%; border: none;"></iframe>
                        </div>

                        <!-- Mobile View -->
                        <div class="preview mobile-view"
                            style="width: 375px; height: 667px; display: none; border: 10px solid #000; border-radius: 20px; background: white; position: relative;">
                            <p class="preview-title"
                                style="position: absolute; top: -20px; left: 50%; transform: translateX(-50%); font-size: 16px; font-weight: bold;">
                                Mobile View</p>
                            <iframe src="http://localhost/sportz_saga/404" frameborder="0" class="preview-iframe"
                                style="width: 100%; height: 100%; border: none;"></iframe>
                        </div>

                    </div>
                </div>

                <!-- Header Page -->
                <div id="web-header" class="web-section" style="display: none;">
                    <div class="OnlinStorePreMain"
                        style="width: 100%; max-width: 1200px; height: 85vh; margin: auto; background: #f4f4f4; display: flex; justify-content: center; align-items: center; position: relative; overflow: hidden;">

                        <!-- Desktop View -->
                        <div class="preview desktop-view" style="width: 100%; height: 85vh; display: block;">
                            <p class="preview-title"
                                style="position: absolute; top: 10px; left: 50%; transform: translateX(-50%); font-size: 18px; font-weight: bold;">
                                Desktop View</p>
                            <iframe src="http://localhost/sportz_saga/collection/siscaa-black-carrom-board#"
                                frameborder="0" class="preview-iframe"
                                style="width: 100%; height: 100%; border: none;"></iframe>
                        </div>

                        <!-- Mobile View -->
                        <div class="preview mobile-view"
                            style="width: 375px; height: 667px; display: none; border: 10px solid #000; border-radius: 20px; background: white; position: relative;">
                            <p class="preview-title"
                                style="position: absolute; top: -20px; left: 50%; transform: translateX(-50%); font-size: 16px; font-weight: bold;">
                                Mobile View</p>
                            <iframe src="http://localhost/sportz_saga/collection/siscaa-black-carrom-board#"
                                frameborder="0" class="preview-iframe"
                                style="width: 100%; height: 100%; border: none;"></iframe>
                        </div>
                    </div>
                </div>
                <!-- Product Page -->
                <div id="web-product" class="web-section" style="display: none;">
                    <div class="OnlinStorePreMain"
                        style="width: 100%; max-width: 1200px; height: 85vh; margin: auto; background: #f4f4f4; display: flex; justify-content: center; align-items: center; position: relative; overflow: hidden;">

                        <!-- Desktop View -->
                        <div class="preview desktop-view" style="width: 100%; height: 85vh; display: block;">
                            <p class="preview-title"
                                style="position: absolute; top: 10px; left: 50%; transform: translateX(-50%); font-size: 18px; font-weight: bold;">
                                Desktop View</p>
                            <iframe src="http://localhost/sportz_saga/product/siscaa-easy-fold-floor-stand"
                                frameborder="0" class="preview-iframe"
                                style="width: 100%; height: 100%; border: none;"></iframe>
                        </div>

                        <!-- Mobile View -->
                        <div class="preview mobile-view"
                            style="width: 375px; height: 667px; display: none; border: 10px solid #000; border-radius: 20px; background: white; position: relative;">
                            <p class="preview-title"
                                style="position: absolute; top: -20px; left: 50%; transform: translateX(-50%); font-size: 16px; font-weight: bold;">
                                Mobile View</p>
                            <iframe src="http://localhost/sportz_saga/product/siscaa-easy-fold-floor-stand"
                                frameborder="0" class="preview-iframe"
                                style="width: 100%; height: 100%; border: none;"></iframe>
                        </div>

                    </div>
                </div>

                <!-- Footer Page -->
                <div id="web-Footer" class="web-section" style="display: none;">
                    <div class="OnlinStorePreMain"
                        style="width: 100%; max-width: 1200px; height: 85vh; margin: auto; background: #f4f4f4; display: flex; justify-content: center; align-items: center; position: relative; overflow: hidden;">

                        <!-- Desktop View -->
                        <div class="preview desktop-view" style="width: 100%; height: 85vh; display: block;">
                            <p class="preview-title"
                                style="position: absolute; top: 10px; left: 50%; transform: translateX(-50%); font-size: 18px; font-weight: bold;">
                                Desktop View</p>
                            <iframe src="http://localhost/sportz_saga/" frameborder="0" class="preview-iframe"
                                style="width: 100%; height: 100%; border: none;"></iframe>
                        </div>

                        <!-- Mobile View -->
                        <div class="preview mobile-view"
                            style="width: 375px; height: 667px; display: none; border: 10px solid #000; border-radius: 20px; background: white; position: relative;">
                            <p class="preview-title"
                                style="position: absolute; top: -20px; left: 50%; transform: translateX(-50%); font-size: 16px; font-weight: bold;">
                                Mobile View</p>
                            <iframe src="http://localhost/sportz_saga/" frameborder="0" class="preview-iframe"
                                style="width: 100%; height: 100%; border: none;"></iframe>
                        </div>

                    </div>
                </div>

                <!-- Other Pages -->
                <div id="web-otherpages" class="web-section" style="display: none;">
                    <div class="OnlinStorePreMain"
                        style="width: 100%; max-width: 1200px; height: 85vh; margin: auto; background: #f4f4f4; display: flex; justify-content: center; align-items: center; position: relative; overflow: hidden;">

                        <!-- Desktop View -->
                        <div class="preview desktop-view" style="width: 100%; height: 85vh; display: block;">
                            <p class="preview-title"
                                style="position: absolute; top: 10px; left: 50%; transform: translateX(-50%); font-size: 18px; font-weight: bold;">
                                Desktop View</p>
                            <iframe src="http://localhost/sportz_saga/page/privacy-policy" frameborder="0"
                                class="preview-iframe" style="width: 100%; height: 100%; border: none;"></iframe>
                        </div>

                        <!-- Mobile View -->
                        <div class="preview mobile-view"
                            style="width: 375px; height: 667px; display: none; border: 10px solid #000; border-radius: 20px; background: white; position: relative;">
                            <p class="preview-title"
                                style="position: absolute; top: -20px; left: 50%; transform: translateX(-50%); font-size: 16px; font-weight: bold;">
                                Mobile View</p>
                            <iframe src="http://localhost/sportz_saga/page/privacy-policy" frameborder="0"
                                class="preview-iframe" style="width: 100%; height: 100%; border: none;"></iframe>
                        </div>

                    </div>
                </div>

                <!-- Email Pop-Up Page -->
                <div id="web-Email_POP_UP" class="web-section" style="display: none;">
                    <div class="OnlinStorePreMain"
                        style="width: 100%; max-width: 1200px; height: 85vh; margin: auto; background: #f4f4f4; display: flex; justify-content: center; align-items: center; position: relative; overflow: hidden;">

                        <!-- Desktop View -->
                        <div class="preview desktop-view" style="width: 100%; height: 85vh; display: block;">
                            <p class="preview-title"
                                style="position: absolute; top: 10px; left: 50%; transform: translateX(-50%); font-size: 18px; font-weight: bold;">
                                Desktop View</p>
                            <iframe src="http://localhost/sportz_saga/" frameborder="0" class="preview-iframe"
                                style="width: 100%; height: 100%; border: none;"></iframe>
                        </div>

                        <!-- Mobile View -->
                        <div class="preview mobile-view"
                            style="width: 375px; height: 667px; display: none; border: 10px solid #000; border-radius: 20px; background: white; position: relative;">
                            <p class="preview-title"
                                style="position: absolute; top: -20px; left: 50%; transform: translateX(-50%); font-size: 16px; font-weight: bold;">
                                Mobile View</p>
                            <iframe src="http://localhost/sportz_saga/" frameborder="0" class="preview-iframe"
                                style="width: 100%; height: 100%; border: none;"></iframe>
                        </div>

                    </div>
                </div>

                <!-- Page Main Content End -->
            </div>
        </div>
    </div>


    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let desktopViews = document.querySelectorAll(".desktop-view");
            let mobileViews = document.querySelectorAll(".mobile-view");
            let showDesktopBtn = document.getElementById("showDesktop");
            let showMobileBtn = document.getElementById("showMobile");

            // Show Desktop View by default
            showDesktopBtn.classList.add("btn-primary");
            showMobileBtn.classList.add("btn-secondary");

            showDesktopBtn.addEventListener("click", function () {
                desktopViews.forEach(view => view.style.display = "block");
                mobileViews.forEach(view => view.style.display = "none");
                showDesktopBtn.classList.add("btn-primary");
                showMobileBtn.classList.remove("btn-primary");
                showMobileBtn.classList.add("btn-secondary");
            });

            showMobileBtn.addEventListener("click", function () {
                desktopViews.forEach(view => view.style.display = "none");
                mobileViews.forEach(view => view.style.display = "block");
                showMobileBtn.classList.add("btn-primary");
                showDesktopBtn.classList.remove("btn-primary");
                showDesktopBtn.classList.add("btn-secondary");
            });
        });
    </script>

    <!-- Footer View Start -->
    <?= $this->include('footer_view') ?>
    <!-- Footer View End -->


    <script>
        $(document).ready(function () {
            // Hide both fields initially
            $('#ShowProductField, #ShowCollectionField').hide();

            // Show the appropriate field when the user selects a value
            $('#select_link').on('change', function () {
                let selectedValue = $(this).val();

                if (selectedValue === 'product') {
                    $('#ShowProductField').fadeIn();
                    $('#ShowCollectionField').hide();
                } else if (selectedValue === 'collection') {
                    $('#ShowCollectionField').fadeIn();
                    $('#ShowProductField').hide();
                } else {
                    // Hide both if nothing is selected
                    $('#ShowProductField, #ShowCollectionField').hide();
                }
            });
        });
    </script>

    <!----------------------------------------------------------------------------------------ALL blog------------------------------------------------------------------------------------------------->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Initialize sortable for blogs
            new Sortable(document.getElementById('blogs-list'), {
                animation: 150,
                ghostClass: 'sortable-ghost',
                onEnd: function () {
                    console.log("Blogs reordered");
                }
            });

            // Initialize sortable for tags
            new Sortable(document.getElementById('tags-list'), {
                animation: 150,
                ghostClass: 'sortable-ghost',
                onEnd: function () {
                    console.log("Tags reordered");
                }
            });

            // Initialize sortable for posts
            new Sortable(document.getElementById('posts-list'), {
                animation: 150,
                ghostClass: 'sortable-ghost',
                onEnd: function () {
                    console.log("Posts reordered");
                }
            });
        });
    </script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        function showToast(message, type) {
            alert(`${type.toUpperCase()}: ${message}`);
        }
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {

            function updateSelections(listId, inputId, checkboxClass) {
                const selectedItems = new Set(); // Ensure unique selections
                const listContainer = document.getElementById(listId);
                listContainer.innerHTML = ''; // Clear previous selections

                document.querySelectorAll(`.${checkboxClass}:checked`).forEach(checkbox => {
                    const title = checkbox.getAttribute('data-title');
                    const id = checkbox.getAttribute('data-id');

                    if (!selectedItems.has(id)) { // Prevent duplicates
                        selectedItems.add(id);

                        // Ensure item does not exist in the list already
                        if (!document.querySelector(`#${listId} [data-id="${id}"]`)) {
                            const listItem = document.createElement('li');
                            listItem.classList.add('sortable-item', 'p-2', 'mb-2', 'bg-light', 'rounded', 'border', 'd-flex', 'justify-content-between', 'align-items-center');
                            listItem.setAttribute('data-id', id);

                            const itemTitle = document.createElement('span');
                            itemTitle.textContent = title;
                            listItem.appendChild(itemTitle);

                            const deleteButton = document.createElement('button');
                            deleteButton.textContent = 'Delete';
                            deleteButton.classList.add('btn', 'btn-danger', 'btn-sm');
                            deleteButton.addEventListener('click', () => {
                                checkbox.checked = false; // Uncheck
                                listContainer.removeChild(listItem); // Remove from UI
                                updateSelections(listId, inputId, checkboxClass);
                            });

                            listItem.appendChild(deleteButton);
                            listContainer.appendChild(listItem);
                        }
                    }
                });

                // Save selected blog IDs in the hidden input field
                document.getElementById(inputId).value = Array.from(selectedItems).join(',');
            }


            let sortableInstances = {};

            function initializeSortable(listId, inputId) {
                if (!sortableInstances[listId]) { // Check if already initialized
                    sortableInstances[listId] = new Sortable(document.getElementById(listId), {
                        animation: 150,
                        ghostClass: 'sortable-ghost',
                        onEnd: function () {
                            const orderedIds = Array.from(document.getElementById(listId).children).map(item => item.dataset.id);
                            document.getElementById(inputId).value = orderedIds.join(',');
                        }
                    });
                }
            }

            // Initialize sortable on page load
            initializeSortable('blogsList', 'blogs_input');
            initializeSortable('tagsList', 'tags_input');
            initializeSortable('popularPostsList', 'popular_posts_input');

            // Update selections on page load
            updateSelections('blogsList', 'blogs_input', 'blog-checkbox');
            updateSelections('tagsList', 'tags_input', 'tag-checkbox');
            updateSelections('popularPostsList', 'popular_posts_input', 'popular-post-checkbox');

            document.addEventListener('change', function (event) {
                if (event.target.classList.contains('blog-checkbox')) {
                    updateSelections('blogsList', 'blogs_input', 'blog-checkbox');
                }
            });



            document.querySelectorAll('.tag-checkbox').forEach(checkbox => {
                checkbox.addEventListener('change', () => updateSelections('tagsList', 'tags_input', 'tag-checkbox'));
            });

            document.querySelectorAll('.popular-post-checkbox').forEach(checkbox => {
                checkbox.addEventListener('change', () => updateSelections('popularPostsList', 'popular_posts_input', 'popular-post-checkbox'));
            });

            // Function to show toast messages
            function showToast(message, type) {
                alert(`${type.toUpperCase()}: ${message}`);
            }

            // Form submission with correct hidden input values
            const updateBlogBtn = document.getElementById("updateblogpage");
            updateBlogBtn.addEventListener("click", function (e) {
                e.preventDefault();

                const formData = new FormData();

                // Get selected values from hidden inputs
                formData.append("blogs", document.getElementById("blogs_input").value);
                formData.append("popular_tags", document.getElementById("tags_input").value);
                formData.append("popular_posts", document.getElementById("popular_posts_input").value);

                // Other form fields
                formData.append("blogs_title", document.getElementById("blogs_title").value);
                formData.append("meta_title", document.getElementById("meta_title").value);

                fetch("<?= base_url('admin/blog_settings/save') ?>", {
                    method: "POST",
                    body: formData,
                })
                    .then((response) => response.json())
                    .then((data) => {
                        if (data.success) {
                            showToast(data.message, "success");
                        } else {
                            showToast(data.message, "error");
                        }
                    })
                    .catch((error) => {
                        console.error("Error:", error);
                        showToast("An error occurred. Please try again.", "error");
                    });
            });
        });
    </script>










    <!----------------------------------------------------------------------------------------------Single blog------------------------------------------------------------------------------------------->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Initialize sortable lists
            initializeSortable('relatedBlogsList', 'related_blogs_input');
            initializeSortable('tagsListsingle', 'tags_input_single');
            initializeSortable('popularPostsListsingle', 'popular_posts_input_single');

            // Load existing selections from backend
            loadExistingSelections('related_blogs_input', 'relatedBlogsList', 'related-blog-checkbox');
            loadExistingSelections('tags_input_single', 'tagsListsingle', 'tag1-checkbox'); // Fixed class name
            loadExistingSelections('popular_posts_input_single', 'popularPostsListsingle', 'popular-post-checkbox');

            // Event listeners for checkbox changes
            document.addEventListener('change', function (event) {
                if (event.target.classList.contains('related-blog-checkbox')) {
                    updateSelections('relatedBlogsList', 'related_blogs_input', 'related-blog-checkbox');
                }
                if (event.target.classList.contains('tag1-checkbox')) {  // Fixed class name
                    updateSelections('tagsListsingle', 'tags_input_single', 'tag1-checkbox');
                }
                if (event.target.classList.contains('popular-post-checkbox')) {
                    updateSelections('popularPostsListsingle', 'popular_posts_input_single', 'popular-post-checkbox');
                }
            });

            // AJAX Form Submission
            document.getElementById('updatesingleblog').addEventListener('click', function () {
                const form = document.getElementById('singleblog-form');
                const formData = new FormData(form);

                fetch('<?= base_url('admin/single_blog/store') ?>', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                    },
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert('Data saved successfully!');
                        } else {
                            alert(data.message || 'Failed to save data.');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('An error occurred while saving the data.');
                    });
            });
        });

        /**
         * Updates the list of selected checkboxes and hidden input field.
         */
        function updateSelections(listId, inputId, checkboxClass) {
            const selectedItems = new Set();
            const listContainer = document.getElementById(listId);
            listContainer.innerHTML = '';

            document.querySelectorAll(`.${checkboxClass}:checked`).forEach(checkbox => {
                const title = checkbox.getAttribute('data-title');
                const id = checkbox.getAttribute('data-id');

                if (!selectedItems.has(id)) {
                    selectedItems.add(id);

                    if (!document.querySelector(`#${listId} [data-id="${id}"]`)) {
                        const listItem = document.createElement('li');
                        listItem.classList.add('sortable-item', 'p-2', 'mb-2', 'bg-light', 'rounded', 'border', 'd-flex', 'justify-content-between', 'align-items-center');
                        listItem.setAttribute('data-id', id);

                        const itemTitle = document.createElement('span');
                        itemTitle.textContent = title;
                        listItem.appendChild(itemTitle);

                        const deleteButton = document.createElement('button');
                        deleteButton.textContent = 'Delete';
                        deleteButton.classList.add('btn', 'btn-danger', 'btn-sm');
                        deleteButton.addEventListener('click', () => {
                            checkbox.checked = false;
                            listContainer.removeChild(listItem);
                            updateHiddenInput(inputId);
                        });

                        listItem.appendChild(deleteButton);
                        listContainer.appendChild(listItem);
                    }
                }
            });

            updateHiddenInput(inputId);
        }

        /**
         * Loads the previously selected values from the hidden input field and displays them.
         */
        function loadExistingSelections(inputId, listId, checkboxClass) {
            const listContainer = document.getElementById(listId);
            const inputElement = document.getElementById(inputId);
            if (!inputElement) return;

            const selectedValues = inputElement.value.split(',').filter(id => id.trim() !== '');

            document.querySelectorAll(`.${checkboxClass}`).forEach(checkbox => {
                const id = checkbox.getAttribute('data-id');
                const title = checkbox.getAttribute('data-title');

                if (selectedValues.includes(id)) {
                    checkbox.checked = true;

                    if (!document.querySelector(`#${listId} [data-id="${id}"]`)) {
                        const listItem = document.createElement('li');
                        listItem.classList.add('sortable-item', 'p-2', 'mb-2', 'bg-light', 'rounded', 'border', 'd-flex', 'justify-content-between', 'align-items-center');
                        listItem.setAttribute('data-id', id);

                        const itemTitle = document.createElement('span');
                        itemTitle.textContent = title;
                        listItem.appendChild(itemTitle);

                        const deleteButton = document.createElement('button');
                        deleteButton.textContent = 'Delete';
                        deleteButton.classList.add('btn', 'btn-danger', 'btn-sm');
                        deleteButton.addEventListener('click', function () {
                            checkbox.checked = false;
                            listContainer.removeChild(listItem);
                            updateHiddenInput(inputId);
                        });

                        listItem.appendChild(deleteButton);
                        listContainer.appendChild(listItem);
                    }
                }
            });

            updateHiddenInput(inputId);
        }

        /**
         * Updates the hidden input field based on the selected items.
         */
        function updateHiddenInput(inputId) {
            const inputElement = document.getElementById(inputId);
            const listContainer = inputElement.previousElementSibling; // Get the associated list
            const selectedIds = Array.from(listContainer.children).map(item => item.getAttribute('data-id'));
            inputElement.value = selectedIds.join(',');
        }

        /**
         * Initializes sortable functionality for drag-and-drop.
         */
        function initializeSortable(listId, inputId) {
            new Sortable(document.getElementById(listId), {
                animation: 150,
                onEnd: function () {
                    const orderedIds = Array.from(document.getElementById(listId).children).map(item => item.dataset.id);
                    document.getElementById(inputId).value = orderedIds.join(',');
                }
            });
        }

    </script>



    <!---------------------------------------------------------------------------------------Collection------------------------------------------------------------------------------------------>
    <script>
        // Function to handle checkbox changes
        function updateSelections(listId, inputId, checkboxClass) {
            const selectedItems = [];
            const listContainer = document.getElementById(listId);

            // Clear the list container
            listContainer.innerHTML = '';

            // Iterate through checkboxes
            document.querySelectorAll(`.${checkboxClass}`).forEach(checkbox => {
                if (checkbox.checked) {
                    const title = checkbox.getAttribute('data-title');
                    const id = checkbox.getAttribute('data-id');

                    // Create the list item
                    const listItem = document.createElement('li');
                    listItem.classList.add('sortable-item', 'p-2', 'mb-2', 'bg-light', 'rounded', 'border', 'd-flex', 'justify-content-between', 'align-items-center');
                    listItem.setAttribute('data-id', id);

                    // Add the item title
                    const itemTitle = document.createElement('span');
                    itemTitle.textContent = title;
                    listItem.appendChild(itemTitle);

                    // Add the delete button
                    const deleteButton = document.createElement('button');
                    deleteButton.textContent = 'Delete';
                    deleteButton.classList.add('btn', 'btn-danger', 'btn-sm');
                    deleteButton.addEventListener('click', () => {
                        // Uncheck the checkbox
                        checkbox.checked = false;

                        // Remove the item from the list
                        listContainer.removeChild(listItem);

                        // Update the hidden input value
                        updateSelections(listId, inputId, checkboxClass);
                    });

                    listItem.appendChild(deleteButton);

                    // Append the list item to the list container
                    listContainer.appendChild(listItem);

                    // Add ID to the selected items array
                    selectedItems.push(id);
                }
            });

            // Update hidden input value
            document.getElementById(inputId).value = selectedItems.join(',');
        }

        // Initialize sortable for drag-and-drop
        function initializeSortable(listId, inputId) {
            new Sortable(document.getElementById(listId), {
                animation: 150,
                onEnd: function () {
                    const orderedIds = Array.from(document.getElementById(listId).children).map(item => item.dataset.id);
                    document.getElementById(inputId).value = orderedIds.join(',');
                }
            });
        }

        document.addEventListener('DOMContentLoaded', () => {
            // Initialize sortable list for favorite blogs
            initializeSortable('favBlogsList', 'fav_blogs_input');

            // Initialize selections on page load
            updateSelections('favBlogsList', 'fav_blogs_input', 'fav-blog-checkbox');

            // Event listeners for checkbox changes
            document.querySelectorAll('.fav-blog-checkbox').forEach(checkbox => {
                checkbox.addEventListener('change', () => updateSelections('favBlogsList', 'fav_blogs_input', 'fav-blog-checkbox'));
            });

            // Event listeners for removing items from the list
            document.querySelectorAll('.remove-item').forEach(button => {
                button.addEventListener('click', function () {
                    const itemId = this.getAttribute('data-id');
                    const listItem = this.closest('.sortable-item');

                    // Uncheck the corresponding checkbox
                    const checkbox = document.querySelector(`#fav_product_${itemId}`);
                    if (checkbox) checkbox.checked = false;

                    // Remove item from the list
                    listItem.remove();

                    // Update hidden input value
                    updateSelections('favBlogsList', 'fav_blogs_input', 'fav-blog-checkbox');
                });
            });

            // AJAX Form Submission for Collection
            document.getElementById('updatecollection').addEventListener('click', function () {
                // Gather form data
                const form = document.getElementById('collection-form');
                const formData = new FormData(form);

                // AJAX request to save the data
                fetch('<?= base_url('admin/collection/saveCollection') ?>', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                    },
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert('Collection data saved successfully!');
                        } else {
                            alert(data.message || 'Failed to save collection data.');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('An error occurred while saving the collection data.');
                    });
            });
        });

    </script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Function to handle image preview
            function previewImage(inputElement, previewElementId) {
                const file = inputElement.files[0]; // Get the selected file
                const previewElement = document.getElementById(previewElementId);

                if (file) {
                    const reader = new FileReader();

                    // Load the file and set it as the `src` of the img tag
                    reader.onload = function (e) {
                        previewElement.src = e.target.result;
                        previewElement.style.display = 'block'; // Show the image preview
                    };

                    reader.readAsDataURL(file);
                }
            }

            // Event listeners for image inputs
            document.getElementById('image1').addEventListener('change', function () {
                previewImage(this, 'image1-preview');
            });

            document.getElementById('image2').addEventListener('change', function () {
                previewImage(this, 'image2-preview');
            });
        });

    </script>




    <!------------------------------------------------------------------------------Home page logo---------------------------------------------------------------------------->

    <script>
        // Save Logo
        $('#homeLogoForm').on('submit', function (e) {
            e.preventDefault(); // Prevent default form submission
            var formData = new FormData(this);
            $.ajax({
                url: "<?= base_url('home/saveLogo') ?>", // Adjusted for CodeIgniter 4
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    if (response.status === 'success') {
                        alert(response.message); // Show success message
                        location.reload(); // Reload the page
                    } else {
                        alert(response.message); // Show error message
                    }
                },
                error: function () {
                    alert('Error saving logo.');
                }
            });
        });

        function updateLogo(logoId) {
            var formData = new FormData($('#editLogoForm-' + logoId)[0]); // Collect form data

            $.ajax({
                url: "<?= base_url('home/editLogo') ?>",
                type: 'POST',
                data: formData,
                processData: false, // Prevent jQuery from converting to query string
                contentType: false, // Ensure form data is sent correctly
                success: function (response) {
                    if (response.status === 'success') {
                        alert(response.message);
                        location.reload();
                    } else {
                        alert(response.message);
                    }
                },
                error: function () {
                    alert('Error updating logo.');
                }
            });
        }

        // Toggle Edit Form
        function toggleEditForm(logoId) {
            $('#editForm-' + logoId).toggle(); // Toggle visibility of the edit form
        }

        function deleteLogo(logoId) {
            if (confirm('Are you sure you want to delete this logo?')) {
                $.ajax({
                    url: "<?= base_url('home/deleteLogo') ?>", // ✅ Correct URL
                    type: 'POST',
                    data: {
                        logo_id: logoId,
                        "<?= csrf_token() ?>": "<?= csrf_hash() ?>" // ✅ CSRF token (if enabled)
                    },
                    dataType: 'json',
                    success: function (response) {
                        if (response.status === 'success') {
                            alert(response.message);
                            location.reload();
                        } else {
                            alert(response.message);
                        }
                    },
                    error: function () {
                        alert('Error deleting logo.');
                    }
                });
            }
        }
    </script>


    <!-- JavaScript to Handle Toggle Edit Form and Preview -->
    <script>
        function toggleEditFormLogo(logoId) {
            const editForm = document.getElementById(`editForm_${logoId}`);
            const chevronIcon = document.getElementById(`chevron-${logoId}`);

            if (editForm.style.display === "none" || editForm.style.display === "") {
                // Show the form
                editForm.style.display = "block";
                chevronIcon.classList.remove("fa-chevron-down");
                chevronIcon.classList.add("fa-chevron-up");
            } else {
                // Hide the form
                editForm.style.display = "none";
                chevronIcon.classList.remove("fa-chevron-up");
                chevronIcon.classList.add("fa-chevron-down");
            }
        }

        // Toggle Add Form
        document.getElementById("togglelogoFormButton").addEventListener("click", function () {
            const addForm = document.getElementById("logoAddForm");
            if (addForm.style.display === "none") {
                addForm.style.display = "block";
            } else {
                addForm.style.display = "none";
            }
        });

        // Function to Preview Image on Selection
        function previewLogo(event, logoId) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    document.getElementById(`previewLogo-${logoId}`).src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        }
    </script>




    <!------------------------------------------------------------------------------Home page Collection---------------------------------------------------------------------------->
    <script>
        // Function to handle checkbox changes
        function updateSelections(listId, inputId, checkboxClass) {
            const selectedItems = new Set(); // Use Set to prevent duplicates
            const listContainer = document.getElementById(listId);

            // Clear existing list
            listContainer.innerHTML = '';

            document.querySelectorAll(`.${checkboxClass}`).forEach(checkbox => {
                if (checkbox.checked) {
                    const title = checkbox.getAttribute('data-title');
                    const id = checkbox.getAttribute('data-id');

                    // Prevent duplicate entries
                    if (!selectedItems.has(id)) {
                        selectedItems.add(id);

                        // Create list item
                        const listItem = document.createElement('li');
                        listItem.classList.add('sortable-item', 'p-2', 'mb-2', 'bg-light', 'rounded', 'border', 'd-flex', 'justify-content-between', 'align-items-center');
                        listItem.setAttribute('data-id', id);

                        // Add title
                        const itemTitle = document.createElement('span');
                        itemTitle.textContent = title;
                        listItem.appendChild(itemTitle);

                        // Add delete button
                        const deleteButton = document.createElement('button');
                        deleteButton.textContent = 'Delete';
                        deleteButton.classList.add('btn', 'btn-danger', 'btn-sm');
                        deleteButton.addEventListener('click', () => {
                            checkbox.checked = false;
                            listContainer.removeChild(listItem);
                            updateSelections(listId, inputId, checkboxClass);
                        });

                        listItem.appendChild(deleteButton);

                        // Append to list
                        listContainer.appendChild(listItem);
                    }
                }
            });

            // Update hidden input value
            document.getElementById(inputId).value = Array.from(selectedItems).join(',');
        }

        // Initialize sortable for drag-and-drop
        function initializeSortable(listId, inputId) {
            new Sortable(document.getElementById(listId), {
                animation: 150,
                onEnd: function () {
                    const orderedIds = Array.from(document.getElementById(listId).children).map(item => item.dataset.id);
                    document.getElementById(inputId).value = orderedIds.join(',');
                }
            });
        }

        document.addEventListener('DOMContentLoaded', () => {
            // Initialize sortable list for favorite collections
            initializeSortable('favCollectionsList', 'fav_collection_input');

            // Initialize selections on page load
            updateSelections('favCollectionsList', 'fav_collection_input', 'collection-checkbox');

            // Event listeners for checkbox changes
            document.querySelectorAll('.collection-checkbox').forEach(checkbox => {
                checkbox.addEventListener('change', () => updateSelections('favCollectionsList', 'fav_collection_input', 'collection-checkbox'));
            });

            // AJAX Form Submission for Collections
            document.getElementById('updatehomepage').addEventListener('click', function () {
                // Gather form data
                const formData = new FormData();
                formData.append('fav_collection', document.getElementById('fav_collection_input').value);

                // AJAX request to save the data
                fetch('<?= base_url('collection/saveCollection') ?>', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                    },
                })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error(`HTTP error! Status: ${response.status}`);
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data.success) {
                            alert('Collection data saved successfully!');
                        } else {
                            alert(data.message || 'Failed to save collection data.');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('An error occurred while saving the collection data.');
                    });
            });
        });
    </script>



    <script>
        $(document).ready(function () {
            // Open the collection form when "Add Collection" is clicked
            $('#openCollectionForm').click(function (e) {
                e.preventDefault(); // Prevent default navigation
                $('#collectionAddForm').show(); // Show the collection form
            });
        });
    </script>




    <!------------------------------------------------------------------------------Home page Product---------------------------------------------------------------------------->

    <script>
        // Function to handle checkbox changes
        function updateSelections(listId, inputId, checkboxClass) {
            const selectedItems = new Set(); // Use Set to prevent duplicates
            const listContainer = document.getElementById(listId);

            // Clear existing list
            listContainer.innerHTML = '';

            document.querySelectorAll(`.${checkboxClass}`).forEach(checkbox => {
                if (checkbox.checked) {
                    const title = checkbox.getAttribute('data-title');
                    const id = checkbox.getAttribute('data-id');

                    // Prevent duplicate entries
                    if (!selectedItems.has(id)) {
                        selectedItems.add(id);

                        // Create list item
                        const listItem = document.createElement('li');
                        listItem.classList.add('sortable-item', 'p-2', 'mb-2', 'bg-light', 'rounded', 'border', 'd-flex', 'justify-content-between', 'align-items-center');
                        listItem.setAttribute('data-id', id);

                        // Add title
                        const itemTitle = document.createElement('span');
                        itemTitle.textContent = title;
                        listItem.appendChild(itemTitle);

                        // Add delete button
                        const deleteButton = document.createElement('button');
                        deleteButton.textContent = 'Delete';
                        deleteButton.classList.add('btn', 'btn-danger', 'btn-sm');
                        deleteButton.addEventListener('click', () => {
                            checkbox.checked = false;
                            listContainer.removeChild(listItem);
                            updateSelections(listId, inputId, checkboxClass);
                        });

                        listItem.appendChild(deleteButton);

                        // Append to list
                        listContainer.appendChild(listItem);
                    }
                }
            });

            // Update hidden input value
            document.getElementById(inputId).value = Array.from(selectedItems).join(',');
        }


        // Initialize sortable for drag-and-drop
        function initializeSortable(listId, inputId) {
            new Sortable(document.getElementById(listId), {
                animation: 150,
                onEnd: function () {
                    const orderedIds = Array.from(document.getElementById(listId).children).map(item => item.dataset.id);
                    document.getElementById(inputId).value = orderedIds.join(',');
                }
            });
        }

        document.addEventListener('DOMContentLoaded', () => {
            // Initialize sortable list for favorite products
            initializeSortable('favProductsList', 'fav_product_input');

            // Initialize selections on page load
            updateSelections('favProductsList', 'fav_product_input', 'product-checkbox');

            // Event listeners for checkbox changes
            document.querySelectorAll('.product-checkbox').forEach(checkbox => {
                checkbox.addEventListener('change', () => updateSelections('favProductsList', 'fav_product_input', 'product-checkbox'));
            });

            // AJAX Form Submission for Products
            document.getElementById('updatehomepage').addEventListener('click', function () {
                // Gather form data
                const formData = new FormData();
                formData.append('fav_product', document.getElementById('fav_product_input').value);

                // AJAX request to save the data
                fetch('<?= base_url('product/saveProduct') ?>', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                    },
                })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error(`HTTP error! Status: ${response.status}`);
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data.success) {
                            alert('Product data saved successfully!');
                        } else {
                            alert(data.message || 'Failed to save product data.');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('An error occurred while saving the product data.');
                    });
            });
        });
    </script>




    <!------------------------------------------------------------------------------Home page Blogs---------------------------------------------------------------------------->
    <script>
        function updateSelections(listId, inputId, checkboxClass) {
            const selectedItems = [];
            const listContainer = document.getElementById(listId);

            // Clear the list container before adding new selections
            listContainer.innerHTML = '';

            // Iterate through checkboxes
            document.querySelectorAll(`.${checkboxClass}:checked`).forEach(checkbox => {
                const title = checkbox.getAttribute('data-title');
                const id = checkbox.getAttribute('data-id');

                // Check if the item is already in the list
                if (!selectedItems.includes(id)) {
                    selectedItems.push(id);

                    // Create the list item
                    const listItem = document.createElement('li');
                    listItem.classList.add('sortable-item', 'p-2', 'mb-2', 'bg-light', 'rounded', 'border', 'd-flex', 'justify-content-between', 'align-items-center');
                    listItem.setAttribute('data-id', id);

                    // Add the item title
                    const itemTitle = document.createElement('span');
                    itemTitle.textContent = title;
                    listItem.appendChild(itemTitle);

                    // Add the delete button
                    const deleteButton = document.createElement('button');
                    deleteButton.textContent = 'Delete';
                    deleteButton.classList.add('btn', 'btn-danger', 'btn-sm');
                    deleteButton.addEventListener('click', () => {
                        // Uncheck the checkbox
                        checkbox.checked = false;

                        // Remove the item from the list
                        listContainer.removeChild(listItem);

                        // Update the hidden input value
                        updateSelections(listId, inputId, checkboxClass);
                    });

                    listItem.appendChild(deleteButton);

                    // Append the list item to the list container
                    listContainer.appendChild(listItem);
                }
            });

            // Update hidden input value
            document.getElementById(inputId).value = selectedItems.join(',');
        }


        let sortableInitialized = false;
        function initializeSortable(listId, inputId) {
            if (!sortableInitialized) {
                new Sortable(document.getElementById(listId), {
                    animation: 150,
                    onEnd: function () {
                        const orderedIds = Array.from(document.getElementById(listId).children).map(item => item.dataset.id);
                        document.getElementById(inputId).value = orderedIds.join(',');
                    }
                });
                sortableInitialized = true;
            }
        }


        document.addEventListener('DOMContentLoaded', () => {
            // Initialize sortable list for favorite blogs
            initializeSortable('favBlogsList', 'fav_blog_input');

            // Initialize selections on page load
            updateSelections('favBlogsList', 'fav_blog_input', 'blog-checkbox');

            // Event listeners for checkbox changes
            document.querySelectorAll('.blog-checkbox').forEach(checkbox => {
                checkbox.addEventListener('change', () => updateSelections('favBlogsList', 'fav_blog_input', 'blog-checkbox'));
            });

            // AJAX Form Submission for Blogs
            document.getElementById('updatehomepage').addEventListener('click', function () {
                // Gather form data
                const formData = new FormData();
                formData.append('fav_blog', document.getElementById('fav_blog_input').value);

                // AJAX request to save the data
                fetch('<?= base_url('blog/saveBlog') ?>', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                    },
                })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error(`HTTP error! Status: ${response.status}`);
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data.success) {
                            alert('Blog data saved successfully!');
                        } else {
                            alert(data.message || 'Failed to save blog data.');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('An error occurred while saving the blog data.');
                    });
            });
        });
    </script>


    <script>
        document.getElementById('togglecarousel2FormButton').addEventListener('click', function () {
            const form = document.getElementById('carousel2AddForm');
            form.style.display = form.style.display === 'none' ? 'block' : 'none';
        });
    </script>



    <!---------------------------------------------------------------------------------------Header pages---------------------------------------------------------------->

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            console.log("JavaScript Loaded - Ready to execute!");

            let fieldCounter = 0;
            let selectedPages = {};

            // ✅ Toggle Add Page Form
            const toggleAddPageButton = document.getElementById("togglepageFormButton");
            const pageAddForm = document.getElementById("pageAddForm");

            if (toggleAddPageButton && pageAddForm) {
                toggleAddPageButton.addEventListener("click", function () {
                    pageAddForm.style.display = (pageAddForm.style.display === "none" || pageAddForm.style.display === "") ?
                        "block" : "none";
                });
            } else {
                console.error("Error: Add Page Form elements not found.");
            }

            // ✅ Handle Page Type Selection
            const togglePageTypeDropdown = document.getElementById("togglePageTypeDropdown");
            const pageTypeCheckboxDropdown = document.getElementById("pageTypeCheckboxDropdown");
            const selectedPageTypesContainer = document.getElementById("selectedPageTypesContainer");
            const selectedPageTypes = document.getElementById("selectedPageTypes");

            togglePageTypeDropdown.addEventListener("click", function () {
                pageTypeCheckboxDropdown.style.display = (pageTypeCheckboxDropdown.style.display === "none" || pageTypeCheckboxDropdown.style.display === "") ?
                    "block" : "none";
            });

            document.querySelectorAll(".page-type-checkbox").forEach(checkbox => {
                checkbox.addEventListener("change", function () {
                    const value = this.value;
                    if (this.checked) {
                        selectedPages[value] = value;
                    } else {
                        delete selectedPages[value];
                    }
                    updateSelectedPagesDisplay();
                });
            });

            function updateSelectedPagesDisplay() {
                selectedPageTypesContainer.innerHTML = "";
                selectedPageTypes.value = Object.keys(selectedPages).join(',');

                Object.keys(selectedPages).forEach(page => {
                    const itemDiv = document.createElement("div");
                    itemDiv.classList.add("selected-item");
                    itemDiv.innerHTML = `${selectedPages[page]} <button data-value="${page}">&times;</button>`;

                    itemDiv.querySelector("button").addEventListener("click", function () {
                        const value = this.getAttribute("data-value");
                        delete selectedPages[value];
                        document.querySelector(`.page-type-checkbox[value="${value}"]`).checked = false;
                        updateSelectedPagesDisplay();
                    });

                    selectedPageTypesContainer.appendChild(itemDiv);
                });

                checkPageTypeSelection();
            }

            const toggleSubtypeButton = document.getElementById("toggleSubtypeButton");
            const subtypeFieldContainer = document.getElementById("subtypeFieldContainer");

            function checkPageTypeSelection() {
                if (Object.keys(selectedPages).length > 0) {
                    toggleSubtypeButton.disabled = true;
                    subtypeFieldContainer.innerHTML = "";
                } else {
                    toggleSubtypeButton.disabled = false;
                }
            }

            if (toggleSubtypeButton) {
                toggleSubtypeButton.addEventListener("click", function () {
                    if (Object.keys(selectedPages).length > 0) {
                        console.warn("Toggle button is disabled because Page Type is selected.");
                        return;
                    }

                    fieldCounter++;

                    const newFieldSet = document.createElement("div");
                    newFieldSet.classList.add("subtype-field-set");
                    newFieldSet.innerHTML = `
            <div class="form-group">
                <label for="subtype_${fieldCounter}">Select Subtype</label>
                <select name="subtype[]" id="subtype_${fieldCounter}" class="form-control subtype-select">
                    <option value="" disabled selected>Select Subtype</option>
                    <option value="collection">Collection</option>
                    <option value="blogs">Blogs</option>
                    <option value="product">Product</option>                      
                </select>
            </div>
            <div class="form-group specific-item-field" id="specificItemField_${fieldCounter}" style="display: none;">
                <label>Select Specific Items</label>
                <div id="specificItemDropdown_${fieldCounter}" class="dropdown-container">
                    <button type="button" id="toggleDropdown_${fieldCounter}" class="form-control">
                        Select Items ▼
                    </button>
                    <div id="checkboxDropdown_${fieldCounter}" class="dropdown-content" style="display: none;">
                    </div>
                </div>
                <div id="selectedItemsContainer_${fieldCounter}" class="selected-items-container"></div>
                <input type="hidden" name="specific_item[${fieldCounter}][]" id="selectedSpecificItems_${fieldCounter}">
            </div>
        `;

                    subtypeFieldContainer.appendChild(newFieldSet);

                    const newSubtypeSelect = document.getElementById(`subtype_${fieldCounter}`);
                    const newSpecificItemField = document.getElementById(`specificItemField_${fieldCounter}`);
                    const newCheckboxDropdown = document.getElementById(`checkboxDropdown_${fieldCounter}`);
                    const newToggleDropdown = document.getElementById(`toggleDropdown_${fieldCounter}`);
                    const newSelectedItemsContainer = document.getElementById(`selectedItemsContainer_${fieldCounter}`);
                    const newSelectedSpecificItems = document.getElementById(`selectedSpecificItems_${fieldCounter}`);

                    let selectedItems = {};

                    newToggleDropdown.addEventListener("click", function () {
                        newCheckboxDropdown.style.display = (newCheckboxDropdown.style.display === "none" || newCheckboxDropdown.style.display === "") ?
                            "block" : "none";
                    });

                    newSubtypeSelect.addEventListener("change", function () {
                        const selectedValue = newSubtypeSelect.value;
                        if (!selectedValue) return;

                        console.log(`Fetching items for subtype: ${selectedValue}`);

                        fetch(`<?= base_url('header/get_items/') ?>${encodeURIComponent(selectedValue)}`)
                            .then(response => response.json())
                            .then(data => {
                                newCheckboxDropdown.innerHTML = "";

                                if (data.error) {
                                    console.error("Backend Error:", data.error);
                                    newCheckboxDropdown.innerHTML += `<div class="error-message">${data.error}</div>`;
                                } else {
                                    data.forEach(item => {
                                        const checkboxId = `checkbox_${fieldCounter}_${item.id}`;
                                        const checkboxItem = `
                                <label for="${checkboxId}" class="checkbox-label">
                                    <input type="checkbox" id="${checkboxId}" value="${item.id}" data-name="${item.name}" class="specific-item-checkbox">
                                    ${item.name}
                                </label>`;
                                        newCheckboxDropdown.innerHTML += checkboxItem;
                                    });

                                    document.querySelectorAll(`#checkboxDropdown_${fieldCounter} .specific-item-checkbox`).forEach(checkbox => {
                                        checkbox.addEventListener("change", function () {
                                            if (this.checked) {
                                                selectedItems[this.value] = this.getAttribute("data-name");
                                            } else {
                                                delete selectedItems[this.value];
                                            }
                                            updateSelectedItemsDisplay();
                                        });
                                    });
                                }

                                newSpecificItemField.style.display = "block";
                            })
                            .catch(error => console.error("Error fetching data:", error));
                    });

                    function updateSelectedItemsDisplay() {
                        newSelectedItemsContainer.innerHTML = "";
                        let selectedItemValues = Object.keys(selectedItems).join(',');
                        newSelectedSpecificItems.value = selectedItemValues;

                        Object.keys(selectedItems).forEach(id => {
                            const itemDiv = document.createElement("div");
                            itemDiv.classList.add("selected-item");
                            itemDiv.innerHTML = `${selectedItems[id]} <button data-id="${id}">&times;</button>`;

                            itemDiv.querySelector("button").addEventListener("click", function () {
                                delete selectedItems[this.getAttribute("data-id")];
                                updateSelectedItemsDisplay();
                            });

                            newSelectedItemsContainer.appendChild(itemDiv);
                        });
                    }
                });
            }
            const apiBaseUrl = "<?= base_url('header/delete_page/') ?>";

            window.deletePage = function (pageId) {
                if (!confirm("Are you sure you want to delete this page?")) return;

                fetch(`${apiBaseUrl}${pageId}`, {
                    method: "DELETE",
                    headers: {
                        "Content-Type": "application/json"
                    }
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert("Page deleted successfully!");
                            location.reload();
                        } else {
                            alert("Failed to delete the page.");
                        }
                    })
                    .catch(error => {
                        console.error("Error deleting page:", error);
                        alert("An error occurred. Please try again.");
                    });
            };

        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            console.log("JavaScript Loaded - Ready to execute!");

            let selectedPages = {};
            let fieldCounter = <?= isset($subtypes) && is_array($subtypes) ? count($subtypes) : 0 ?>;
            let itemDataMap = {}; // ✅ Store item ID-to-Title mapping

            document.querySelectorAll(".page-type-checkbox").forEach(checkbox => {
                checkbox.addEventListener("change", function () {
                    const value = this.value;
                    selectedPages[value] = this.checked ? value : delete selectedPages[value];
                    updateSelectedPagesDisplay();
                });
            });

            function updateSelectedPagesDisplay() {
                const selectedPageTypesContainer = document.getElementById("selectedPageTypesContainer");
                selectedPageTypesContainer.innerHTML = "";
                Object.keys(selectedPages).forEach(page => {
                    const itemDiv = document.createElement("div");
                    itemDiv.classList.add("selected-item");
                    itemDiv.innerHTML = `${selectedPages[page]} <button data-value="${page}">&times;</button>`;
                    selectedPageTypesContainer.appendChild(itemDiv);
                });
            }

            // **Handle Subtype Change**
            document.querySelectorAll(".subtype-select").forEach(select => {
                select.addEventListener("change", function () {
                    const fieldId = this.id.split("_")[1];
                    fetchSubtypeItems(fieldId, this.value);
                });
            });

            function fetchSubtypeItems(fieldId, subtype) {

                fetch(`<?= base_url('header/get_items/') ?>${encodeURIComponent(subtype)}`)
                    .then(response => response.json())
                    .then(data => {
                        const checkboxDropdown = document.getElementById(`checkboxDropdown_${fieldId}`);
                        checkboxDropdown.innerHTML = ""; // ✅ Clear previous items

                        data.forEach(item => {
                            itemDataMap[item.id] = item.name; // ✅ Store ID-Title mapping

                            if (!document.querySelector(`#checkboxDropdown_${fieldId} input[value="${item.id}"]`)) {
                                checkboxDropdown.innerHTML += `
                        <label>
                            <input type="checkbox" value="${item.id}" class="specific-item-checkbox">
                            ${item.name} <!-- ✅ Display Name Instead of ID -->
                        </label>`;
                            }
                        });

                        attachCheckboxListeners(fieldId);
                    })
                    .catch(error => console.error("Error fetching data:", error));
            }

            function attachCheckboxListeners(fieldId) {
                document.querySelectorAll(`#checkboxDropdown_${fieldId} .specific-item-checkbox`).forEach(checkbox => {
                    checkbox.addEventListener("change", function () {
                        updateSelectedItems(fieldId);
                    });
                });
            }

            function updateSelectedItems(fieldId) {
                let selectedItems = [];
                document.querySelectorAll(`#checkboxDropdown_${fieldId} .specific-item-checkbox:checked`).forEach(checkbox => {
                    selectedItems.push(checkbox.value);
                });

                document.getElementById(`selectedSpecificItems_${fieldId}`).value = selectedItems.join(',');
                updateSelectedItemsDisplay(fieldId);
            }

            function updateSelectedItemsDisplay(fieldId) {
                let selectedContainer = document.getElementById(`selectedItemsContainer_${fieldId}`);
                selectedContainer.innerHTML = ""; // ✅ Clear previous items

                document.querySelectorAll(`#checkboxDropdown_${fieldId} .specific-item-checkbox:checked`).forEach(checkbox => {
                    let itemId = checkbox.value;
                    let itemName = itemDataMap[itemId] || itemId; // ✅ Get Name Instead of ID

                    if (!selectedContainer.querySelector(`.selected-item[data-id="${itemId}"]`)) {
                        selectedContainer.innerHTML += `
                <div class="selected-item" data-id="${itemId}">
                    ${itemName} <!-- ✅ Display Name Instead of ID -->
                    <button type="button" class="remove-item-btn" data-id="${itemId}">&times;</button>
                </div>`;
                    }
                });

                attachRemoveButtons(fieldId);
            }

            function attachRemoveButtons(fieldId) {
                document.querySelectorAll(`#selectedItemsContainer_${fieldId} .remove-item-btn`).forEach(button => {
                    button.addEventListener("click", function () {
                        const itemId = this.dataset.id;
                        document.querySelector(`#checkboxDropdown_${fieldId} .specific-item-checkbox[value="${itemId}"]`).checked = false;
                        updateSelectedItems(fieldId);
                    });
                });
            }

            // ✅ Convert Already Selected Items from IDs to Titles
            document.querySelectorAll(".selected-items-container .selected-item").forEach(item => {
                let itemId = item.dataset.id;
                if (itemDataMap[itemId]) {
                    item.innerHTML = `
                ${itemDataMap[itemId]} <!-- ✅ Replace ID with Name -->
                <button type="button" class="remove-item-btn" data-id="${itemId}">&times;</button>`;
                }
            });
        });
    </script>


    <script>
        function toggleEditFormPage(pageId) {
            const editForm = document.getElementById(`editForm_${pageId}`);
            const chevronIcon = document.getElementById(`chevron-${pageId}`);

            if (editForm.style.display === "none" || editForm.style.display === "") {
                // Show the form
                editForm.style.display = "block";
                // Change icon to up arrow (toggle)
                chevronIcon.classList.remove("fa-chevron-down");
                chevronIcon.classList.add("fa-chevron-up");
            } else {
                // Hide the form
                editForm.style.display = "none";
                // Change icon to down arrow (toggle)
                chevronIcon.classList.remove("fa-chevron-up");
                chevronIcon.classList.add("fa-chevron-down");
            }
        }
    </script>

    <script>
        function previewImage(event, previewId) {
            var reader = new FileReader();
            reader.onload = function () {
                var output = document.getElementById(previewId);
                output.src = reader.result;
                output.style.display = "block"; // Show image when selected
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>




<!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------>

    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>

    <script>
        document.getElementById("web_section").addEventListener("change", function () {
            const selectedSection = this.value; // Get selected value
            const sections = document.querySelectorAll(".web-section"); // Select all sections

            sections.forEach(section => {
                if (section.id === `web-${selectedSection}`) {
                    section.style.display = "block"; // Show the selected section
                } else {
                    section.style.display = "none"; // Hide other sections
                }
            });
        });
    </script>

    <script>
        document.querySelectorAll('.element-select').forEach(select => {
            select.addEventListener('change', function () {
                let wrapper = this.closest('.form-group').nextElementSibling;

                wrapper.querySelector('.product-wrapper').style.display = 'none';
                wrapper.querySelector('.collection-wrapper').style.display = 'none';
                wrapper.querySelector('.blog-wrapper').style.display = 'none';

                wrapper.querySelector('.' + this.value + '-wrapper').style.display = 'block';
            });
        });
    </script>



    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Configuration for Quill editor
            const quillConfig = {
                theme: 'snow',
                placeholder: 'Write something here...',
                modules: {
                    toolbar: [
                        ['bold', 'italic', 'underline', 'strike'], // Text styling
                        [{
                            list: 'ordered'
                        }, {
                            list: 'bullet'
                        }], // Lists
                        ['link'], // Links and Images
                        [{
                            align: []
                        }], // Alignment
                        ['clean'], // Clear formatting
                    ],
                },
            };

            // Initialize Quill editors
            document.querySelectorAll('.quill-editor').forEach((editorElement) => {
                const targetInputId = editorElement.getAttribute('data-target');
                const targetInput = document.getElementById(targetInputId);

                if (targetInput) {
                    // Create Quill instance
                    const quill = new Quill(editorElement, quillConfig);

                    // Sync Quill content to hidden input
                    quill.on('text-change', function () {
                        targetInput.value = quill.root.innerHTML;
                    });

                    // If there's initial content, load it into the editor
                    if (targetInput.value.trim() !== '') {
                        quill.root.innerHTML = targetInput.value;
                    }
                } else {
                    console.error(`No hidden input found with ID "${targetInputId}" for this editor.`);
                }
            });

            document.querySelectorAll('.file-preview').forEach((fileInput) => {
                fileInput.addEventListener('change', function (event) {
                    const input = event.target;
                    const previewContainerId = input.id + '_preview';
                    const previewContainer = document.getElementById(previewContainerId);

                    if (!previewContainer) {
                        console.error(`No preview container found for input ID "${input.id}".`);
                        return;
                    }

                    // Clear previous preview
                    previewContainer.innerHTML = '';

                    // Validate if a file is selected
                    if (input.files && input.files[0]) {
                        const file = input.files[0];

                        // Validate file type (image preview)
                        if (!file.type.startsWith('image/')) {
                            previewContainer.innerHTML = '<p class="text-danger">Please select a valid image file.</p>';
                            return;
                        }

                        // Create an image element for preview
                        const img = document.createElement('img');
                        img.classList.add('img-fluid', 'img-thumbnail');
                        img.style.maxWidth = '200px';
                        img.style.marginTop = '10px';

                        // Set image source using FileReader
                        const reader = new FileReader();
                        reader.onload = function (e) {
                            img.src = e.target.result;
                        };
                        reader.readAsDataURL(file);

                        // Append the image to the preview container
                        previewContainer.appendChild(img);
                    }
                });
            });

            function collectIconData() {
                const iconSections = document.querySelectorAll('.iconsubsection');
                const icons = [];

                iconSections.forEach((section, index) => {
                    if (index < 5) { // Ensure only up to 5 icons are processed
                        const iconData = {
                            icon: section.querySelector('img')?.src || '',
                            icon_title: section.querySelector('input[name="icon_title[]"]').value,
                            icon_description: section.querySelector('input[name="icon_description[]"]').value
                        };
                        icons.push(iconData);
                    }
                });

                return icons;
            }

            function collectInfoData() {
                return {
                    info_data1: {
                        count: document.getElementById('datacount1').value,
                        title: document.getElementById('datatitle1').value,
                        description: document.getElementById('datadescription1').value
                    },
                    info_data2: {
                        count: document.getElementById('datacount2').value,
                        title: document.getElementById('datatitle2').value,
                        description: document.getElementById('datadescription2').value
                    },
                    info_data3: {
                        count: document.getElementById('datacount3').value,
                        title: document.getElementById('datatitle3').value,
                        description: document.getElementById('datadescription3').value
                    }
                };
            }



            const updateaboutBtn = document.getElementById("updateaboutpage");
            const updatecontactBtn = document.getElementById("updatecontactpage");
            const updatesearchBtn = document.getElementById("updatesearchpage");
            const updatewishlistBtn = document.getElementById("updatewishlistpage");
            const updatecartBtn = document.getElementById("updatecartpage");
            const updatecheckoutBtn = document.getElementById("updatecheckout");
            const updatetrackingBtn = document.getElementById("updatetracking");
            const update404Btn = document.getElementById("update404");


            //////////////////////////////////////////////////////////////////////////////////////////////

            const container = document.getElementById("blogsboxcontainer");
            const blogCheckboxes = document.querySelectorAll(".blog-checkbox");

            // Prepopulate blogsBoxContainer with existing selected blogs
            blogCheckboxes.forEach((checkbox) => {
                if (checkbox.checked) {
                    addBlogBox(checkbox.dataset.id, checkbox.dataset.title);
                }
            });

            // Handle checkbox selection
            blogCheckboxes.forEach((checkbox) => {
                checkbox.addEventListener("change", function () {
                    const blogId = this.dataset.id;
                    const blogTitle = this.dataset.title;

                    if (this.checked) {
                        addBlogBox(blogId, blogTitle);
                    } else {
                        const existingBox = document.getElementById(`blogsBox-${blogId}`);
                        if (existingBox) existingBox.remove();
                    }
                });
            });

            // Add blog box
            function addBlogBox(blogId, blogTitle) {
                const blogBox = document.createElement("div");
                blogBox.className = "blogsBox";
                blogBox.id = `blogsBox-${blogId}`;
                blogBox.dataset.id = blogId;
                blogBox.innerHTML = `
            <div class="CarouselHeader">
                <div class="handle">☰</div>
                <b>${blogTitle} </b>
                <div class="actions">
                    <a href="javascript:void(0);" class="remove-blog" style="color: red; padding: 0;">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                </div>
            </div>
        `;

                // Remove blog on click
                blogBox.querySelector(".remove-blog").addEventListener("click", function () {
                    blogBox.remove();
                    document.getElementById(`blog_${blogId}`).checked = false;
                });

                container.appendChild(blogBox);
            }


            // Initialize drag-and-drop sorting
            Sortable.create(container, {
                handle: ".handle",
                animation: 150,
            });

            //////////////////////////////////////////////////////////////////////////////////////////////


            const r_product_container = document.getElementById("r_productsboxcontainer");
            const r_productCheckboxes = document.querySelectorAll(".r_product-checkbox");

            // Prepopulate r_productContainer with existing selected r_product
            r_productCheckboxes.forEach((checkbox) => {
                if (checkbox.checked) {
                    addr_productBox(checkbox.dataset.id, checkbox.dataset.title);
                }
            });

            // Handle checkbox selection
            r_productCheckboxes.forEach((checkbox) => {
                checkbox.addEventListener("change", function () {
                    const r_productId = this.dataset.id;
                    const r_productTitle = this.dataset.title;

                    if (this.checked) {
                        addr_productBox(r_productId, r_productTitle);
                    } else {
                        const existingBox = document.getElementById(`r_productsBox-${r_productId}`);
                        if (existingBox) existingBox.remove();
                    }
                });
            });

            // Add r_product box
            function addr_productBox(r_productId, r_productTitle) {
                const r_productBox = document.createElement("div");
                r_productBox.className = "r_productsBox";
                r_productBox.id = `r_productsBox-${r_productId}`;
                r_productBox.dataset.id = r_productId;
                r_productBox.innerHTML = `
            <div class="CarouselHeader">
                <div class="handle">☰</div>
                <b>${r_productTitle} </b>
                <div class="actions">
                    <a href="javascript:void(0);" class="remove-r_product" style="color: red; padding: 0;">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                </div>
            </div>
        `;

                // Remove r_product on click
                r_productBox.querySelector(".remove-r_product").addEventListener("click", function () {
                    r_productBox.remove();
                    document.getElementById(`r_product_${r_productId}`).checked = false;
                });

                r_product_container.appendChild(r_productBox);
            }


            // Initialize drag-and-drop sorting
            Sortable.create(r_product_container, {
                handle: ".handle",
                animation: 150,
            });

            //////////////////////////////////////////////////////////////////////////////////////////////


            const t_product_container = document.getElementById("t_productsboxcontainer");
            const t_productCheckboxes = document.querySelectorAll(".t_product-checkbox");

            // Prepopulate t_productContainer with existing selected t_product
            t_productCheckboxes.forEach((checkbox) => {
                if (checkbox.checked) {
                    addt_productBox(checkbox.dataset.id, checkbox.dataset.title);
                }
            });

            // Handle checkbox selection
            t_productCheckboxes.forEach((checkbox) => {
                checkbox.addEventListener("change", function () {
                    const t_productId = this.dataset.id;
                    const t_productTitle = this.dataset.title;

                    if (this.checked) {
                        addt_productBox(t_productId, t_productTitle);
                    } else {
                        const existingBox = document.getElementById(`t_productsBox-${t_productId}`);
                        if (existingBox) existingBox.remove();
                    }
                });
            });

            // Add t_product box
            function addt_productBox(t_productId, t_productTitle) {
                const t_productBox = document.createElement("div");
                t_productBox.className = "t_productsBox";
                t_productBox.id = `t_productsBox-${t_productId}`;
                t_productBox.dataset.id = t_productId;
                t_productBox.innerHTML = `
            <div class="CarouselHeader">
                <div class="handle">☰</div>
                <b>${t_productTitle} </b>
                <div class="actions">
                    <a href="javascript:void(0);" class="remove-t_product" style="color: red; padding: 0;">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                </div>
            </div>
        `;

                // Remove t_product on click
                t_productBox.querySelector(".remove-t_product").addEventListener("click", function () {
                    t_productBox.remove();
                    document.getElementById(`t_product_${t_productId}`).checked = false;
                });

                t_product_container.appendChild(t_productBox);
            }


            // Initialize drag-and-drop sorting
            Sortable.create(t_product_container, {
                handle: ".handle",
                animation: 150,
            });

            //////////////////////////////////////////////////////////////////////////////////////////////


            const m_product_container = document.getElementById("m_productsboxcontainer");
            const m_productCheckboxes = document.querySelectorAll(".m_product-checkbox");

            // Prepopulate m_productContainer with existing selected m_product
            m_productCheckboxes.forEach((checkbox) => {
                if (checkbox.checked) {
                    addm_productBox(checkbox.dataset.id, checkbox.dataset.title);
                }
            });

            // Handle checkbox selection
            m_productCheckboxes.forEach((checkbox) => {
                checkbox.addEventListener("change", function () {
                    const m_productId = this.dataset.id;
                    const m_productTitle = this.dataset.title;

                    if (this.checked) {
                        addm_productBox(m_productId, m_productTitle);
                    } else {
                        const existingBox = document.getElementById(`m_productsBox-${m_productId}`);
                        if (existingBox) existingBox.remove();
                    }
                });
            });

            // Add m_product box
            function addm_productBox(m_productId, m_productTitle) {
                const m_productBox = document.createElement("div");
                m_productBox.className = "m_productsBox";
                m_productBox.id = `m_productsBox-${m_productId}`;
                m_productBox.dataset.id = m_productId;
                m_productBox.innerHTML = `
            <div class="CarouselHeader">
                <div class="handle">☰</div>
                <b>${m_productTitle} </b>
                <div class="actions">
                    <a href="javascript:void(0);" class="remove-m_product" style="color: red; padding: 0;">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                </div>
            </div>
        `;

                // Remove m_product on click
                m_productBox.querySelector(".remove-m_product").addEventListener("click", function () {
                    m_productBox.remove();
                    document.getElementById(`m_product_${m_productId}`).checked = false;
                });

                m_product_container.appendChild(m_productBox);
            }


            // Initialize drag-and-drop sorting
            Sortable.create(m_product_container, {
                handle: ".handle",
                animation: 150,
            });


            //////////////////////////////////////////////////////////////////////////////////////////////


            const s_blog_container = document.getElementById("s_blogsboxcontainer");
            const s_blogCheckboxes = document.querySelectorAll(".s_blog-checkbox");

            // Prepopulate s_blogContainer with existing selected s_blog
            s_blogCheckboxes.forEach((checkbox) => {
                if (checkbox.checked) {
                    adds_blogBox(checkbox.dataset.id, checkbox.dataset.title);
                }
            });

            // Handle checkbox selection
            s_blogCheckboxes.forEach((checkbox) => {
                checkbox.addEventListener("change", function () {
                    const s_blogId = this.dataset.id;
                    const s_blogTitle = this.dataset.title;

                    if (this.checked) {
                        adds_blogBox(s_blogId, s_blogTitle);
                    } else {
                        const existingBox = document.getElementById(`s_blogsBox-${s_blogId}`);
                        if (existingBox) existingBox.remove();
                    }
                });
            });

            // Add s_blog box
            function adds_blogBox(s_blogId, s_blogTitle) {
                const s_blogBox = document.createElement("div");
                s_blogBox.className = "s_blogsBox";
                s_blogBox.id = `s_blogsBox-${s_blogId}`;
                s_blogBox.dataset.id = s_blogId;
                s_blogBox.innerHTML = `
            <div class="CarouselHeader">
                <div class="handle">☰</div>
                <b>${s_blogTitle} </b>
                <div class="actions">
                    <a href="javascript:void(0);" class="remove-s_blog" style="color: red; padding: 0;">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                </div>
            </div>
        `;

                // Remove s_blog on click
                s_blogBox.querySelector(".remove-s_blog").addEventListener("click", function () {
                    s_blogBox.remove();
                    document.getElementById(`s_blog_${s_blogId}`).checked = false;
                });

                s_blog_container.appendChild(s_blogBox);
            }


            // Initialize drag-and-drop sorting
            Sortable.create(s_blog_container, {
                handle: ".handle",
                animation: 150,
            });


            //////////////////////////////////////////////////////////////////////////////////////////////


            const cm_product_container = document.getElementById("cm_productsboxcontainer");
            const cm_productCheckboxes = document.querySelectorAll(".cm_product-checkbox");

            // Prepopulate cm_productContainer with existing selected cm_product
            cm_productCheckboxes.forEach((checkbox) => {
                if (checkbox.checked) {
                    addcm_productBox(checkbox.dataset.id, checkbox.dataset.title);
                }
            });

            // Handle checkbox selection
            cm_productCheckboxes.forEach((checkbox) => {
                checkbox.addEventListener("change", function () {
                    const cm_productId = this.dataset.id;
                    const cm_productTitle = this.dataset.title;

                    if (this.checked) {
                        addcm_productBox(cm_productId, cm_productTitle);
                    } else {
                        const existingBox = document.getElementById(`cm_productsBox-${cm_productId}`);
                        if (existingBox) existingBox.remove();
                    }
                });
            });

            // Add cm_product box
            function addcm_productBox(cm_productId, cm_productTitle) {
                const cm_productBox = document.createElement("div");
                cm_productBox.className = "cm_productsBox";
                cm_productBox.id = `cm_productsBox-${cm_productId}`;
                cm_productBox.dataset.id = cm_productId;
                cm_productBox.innerHTML = `
            <div class="CarouselHeader">
                <div class="handle">☰</div>
                <b>${cm_productTitle} </b>
                <div class="actions">
                    <a href="javascript:void(0);" class="remove-cm_product" style="color: red; padding: 0;">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                </div>
            </div>
        `;

                // Remove cm_product on click
                cm_productBox.querySelector(".remove-cm_product").addEventListener("click", function () {
                    cm_productBox.remove();
                    document.getElementById(`cm_product_${cm_productId}`).checked = false;
                });

                cm_product_container.appendChild(cm_productBox);
            }


            // Initialize drag-and-drop sorting
            Sortable.create(cm_product_container, {
                handle: ".handle",
                animation: 150,
            });

            //////////////////////////////////////////////////////////////////////////////////////////////


            const error_product_container = document.getElementById("error_productsboxcontainer");
            const error_productCheckboxes = document.querySelectorAll(".error_product-checkbox");

            // Prepopulate error_productContainer with existing selected error_product
            error_productCheckboxes.forEach((checkbox) => {
                if (checkbox.checked) {
                    adderror_productBox(checkbox.dataset.id, checkbox.dataset.title);
                }
            });

            // Handle checkbox selection
            error_productCheckboxes.forEach((checkbox) => {
                checkbox.addEventListener("change", function () {
                    const error_productId = this.dataset.id;
                    const error_productTitle = this.dataset.title;

                    if (this.checked) {
                        adderror_productBox(error_productId, error_productTitle);
                    } else {
                        const existingBox = document.getElementById(`error_productsBox-${error_productId}`);
                        if (existingBox) existingBox.remove();
                    }
                });
            });

            // Add error_product box
            function adderror_productBox(error_productId, error_productTitle) {
                const error_productBox = document.createElement("div");
                error_productBox.className = "error_productsBox";
                error_productBox.id = `error_productsBox-${error_productId}`;
                error_productBox.dataset.id = error_productId;
                error_productBox.innerHTML = `
            <div class="CarouselHeader">
                <div class="handle">☰</div>
                <b>${error_productTitle} </b>
                <div class="actions">
                    <a href="javascript:void(0);" class="remove-error_product" style="color: red; padding: 0;">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                </div>
            </div>
        `;

                // Remove error_product on click
                error_productBox.querySelector(".remove-error_product").addEventListener("click", function () {
                    error_productBox.remove();
                    document.getElementById(`error_product_${error_productId}`).checked = false;
                });

                error_product_container.appendChild(error_productBox);
            }


            // Initialize drag-and-drop sorting
            Sortable.create(error_product_container, {
                handle: ".handle",
                animation: 150,
            });

            //////////////////////////////////////////////////////////////////////////////////////////////   



            function displayError(inputElement, message) {
                // Check if the input element is in the DOM
                if (inputElement.length > 0 && inputElement[0].parentNode) {
                    const errorDiv = document.createElement("div");
                    errorDiv.textContent = message;
                    errorDiv.style.color = "red";
                    errorDiv.classList.add("error-message");
                    inputElement[0].parentNode.appendChild(errorDiv);
                } else {
                    console.error("Error: Input element not found in the DOM.");
                }
            }

            function validateForm() {
                let isValid = true;

                // Clear previous validation states
                $('.is-invalid').removeClass('is-invalid');
                $('.error-message').remove();

                // Get form fields
                const about_title = $('input[name="about_title"]');
                const about_description = $('input[name="about_description"]');
                const about_bg = $('input[name="about_bg"]');
                const icon = $('input[name="icon[]"]');
                const icon_title = $('input[name="icon_title[]"]');
                const icon_description = $('input[name="icon_description[]"]');
                const datacount1 = $('input[name="datacount1"]');
                const datatitle1 = $('input[name="datatitle1"]');
                const datadescription1 = $('input[name="datadescription1"]');
                const datacount2 = $('input[name="datacount2"]');
                const datatitle2 = $('input[name="datatitle2"]');
                const datadescription2 = $('input[name="datadescription2"]');
                const datacount3 = $('input[name="datacount3"]');
                const datatitle3 = $('input[name="datatitle3"]');
                const datadescription3 = $('input[name="datadescription3"]');
                const team_title = $('input[name="team_title"]');
                const subscribe_title = $('input[name="subscribe_title"]');
                const subscribe_subtitle = $('input[name="subscribe_subtitle"]');
                const subscribe_placeholder = $('input[name="subscribe_placeholder"]');
                const subscribe_btn = $('input[name="subscribe_btn"]');
                const blogs_title = $('input[name="blogs_title"]');

                if (about_title.val().trim() === '') {
                    displayError(about_title, 'Title cannot be empty.');
                    isValid = false;
                }



                return isValid;
            }


            // Update form submission
            updateaboutBtn.addEventListener("click", function (e) {
                e.preventDefault();

                const formData = new FormData();

                // Basic text fields
                formData.append("about_title", document.getElementById("about_title").value);
                formData.append("about_description", document.getElementById("about_description").value);

                // File upload handling
                const bgFile = document.getElementById("about_bg").files[0];
                if (bgFile) {
                    formData.append("about_bg", bgFile);
                }

                // Handle icon files and data
                const icons = collectIconData();
                document.querySelectorAll('.iconsubsection').forEach((section, index) => {
                    const file = section.querySelector('input[type="file"]').files[0];
                    if (file) {
                        formData.append(`icon${index + 1}_file`, file);
                    }
                });
                formData.append("icons_data", JSON.stringify(icons));

                // Info data
                const infoData = collectInfoData();
                formData.append("info_data", JSON.stringify(infoData));

                // Other fields
                formData.append("why_title", document.getElementById("why_title").value);
                formData.append("team_title", document.getElementById("team_title").value);
                formData.append("subscribe_title", document.getElementById("subscribe_title").value);
                formData.append("subscribe_subtitle", document.getElementById("subscribe_subtitle").value);
                formData.append("subscribe_placeholder", document.getElementById("subscribe_placeholder").value);
                formData.append("subscribe_btn", document.getElementById("subscribe_btn").value);
                formData.append("blogs_title", document.getElementById("blogs_title").value);

                // Blogs data
                const orderedBlogs = Array.from(document.getElementById("blogsboxcontainer").children)
                    .map((child) => child.dataset.id);
                formData.append("blogs", orderedBlogs.join(","));

                // Submit form
                updateaboutBtn.disabled = true;
                updateaboutBtn.innerHTML = "Updating...";

                fetch('<?= base_url('online_store/update_about') ?>', {
                    method: "POST",
                    body: formData,
                    headers: {
                        "X-Requested-With": "XMLHttpRequest"
                    }
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            showToast("About page updated successfully!", "success");
                        } else {
                            showToast(data.message || "Failed to update about page.", "error");
                        }
                    })
                    .catch(error => {
                        console.error("Error:", error);
                        showToast("An error occurred. Please try again.", "error");
                    })
                    .finally(() => {
                        updateaboutBtn.disabled = false;
                        updateaboutBtn.innerHTML = "Update";
                    });
            });




            // Update form submission

            updatecontactBtn.addEventListener("click", function (e) {
                e.preventDefault();

                const formData = new FormData();

                // Append form fields to FormData
                const fields = [
                    "contact_title",
                    "contact_description",
                    "quote",
                    "quote_author",
                    "contact_info_title",
                    "contact_info_description",
                    "address_title",
                    "address",
                    "phone_title",
                    "phone",
                    "info_title",
                    "info",
                    "help_title",
                    "help_details",
                    "git_title",
                    "git_description",
                    "contact_subscribe_title",
                    "contact_subscribe_subtitle",
                    "contact_subscribe_placeholder",
                    "contact_subscribe_btn",
                ];

                fields.forEach((fieldId) => {
                    const element = document.getElementById(fieldId);
                    if (element) {
                        formData.append(fieldId, element.value || "");
                    }
                });

                // Handle file input
                const bgFile = document.getElementById("contact_bg")?.files[0];
                if (bgFile) {
                    formData.append("contact_bg", bgFile);
                }

                // Submit form via AJAX
                updatecontactBtn.disabled = true;
                updatecontactBtn.innerHTML = "Updating...";

                fetch("<?= base_url('online_store/update_contact') ?>", {
                    method: "POST",
                    body: formData,
                    headers: {
                        "X-Requested-With": "XMLHttpRequest",
                    },
                })
                    .then((response) => response.json())
                    .then((data) => {
                        if (data.success) {
                            showToast("Contact page updated successfully!", "success");
                        } else {
                            showToast(data.message || "Failed to update Contact page.", "error");
                        }
                    })
                    .catch((error) => {
                        console.error("Error:", error);
                        showToast("An error occurred. Please try again.", "error");
                    })
                    .finally(() => {
                        updatecontactBtn.disabled = false;
                        updatecontactBtn.innerHTML = "Update";
                    });
            });



            // Update form submission
            updatesearchBtn.addEventListener("click", function (e) {
                e.preventDefault();

                const formData = new FormData();

                // Basic text fields
                formData.append("search_placeholder", document.getElementById("search_placeholder").value);
                formData.append("sec1_title", document.getElementById("sec1_title").value);
                formData.append("sec2_title", document.getElementById("sec2_title").value);
                formData.append("sec3_title", document.getElementById("sec3_title").value);
                formData.append("sec4_title", document.getElementById("sec4_title").value);

                // r_product data
                const orderedr_products = Array.from(document.getElementById("r_productsboxcontainer").children)
                    .map((child) => child.dataset.id);
                formData.append("r_products", orderedr_products.join(","));

                // t_product data
                const orderedt_products = Array.from(document.getElementById("t_productsboxcontainer").children)
                    .map((child) => child.dataset.id);
                formData.append("t_products", orderedt_products.join(","));

                // m_product data
                const orderedm_products = Array.from(document.getElementById("m_productsboxcontainer").children)
                    .map((child) => child.dataset.id);
                formData.append("m_products", orderedm_products.join(","));

                // Blogs data
                const ordereds_blogs = Array.from(document.getElementById("s_blogsboxcontainer").children)
                    .map((child) => child.dataset.id);
                formData.append("s_blogs", ordereds_blogs.join(","));

                // Submit form
                updatesearchBtn.disabled = true;
                updatesearchBtn.innerHTML = "Updating...";

                fetch('<?= base_url('online_store/update_search') ?>', {
                    method: "POST",
                    body: formData,
                    headers: {
                        "X-Requested-With": "XMLHttpRequest"
                    }
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            showToast("About page updated successfully!", "success");

                        } else {
                            showToast(data.message || "Failed to update about page.", "error");
                        }
                    })
                    .catch(error => {
                        console.error("Error:", error);
                        showToast("An error occurred. Please try again.", "error");
                    })
                    .finally(() => {
                        updatesearchBtn.disabled = false;
                        updatesearchBtn.innerHTML = "Update";
                    });
            });

            // Update form submission
            updatewishlistBtn.addEventListener("click", function (e) {
                e.preventDefault();

                const formData = new FormData();

                // Basic text fields
                formData.append("wishlist_title", document.getElementById("wishlist_title").value);


                // Submit form
                updatewishlistBtn.disabled = true;
                updatewishlistBtn.innerHTML = "Updating...";

                fetch('<?= base_url('online_store/update_wishlist') ?>', {
                    method: "POST",
                    body: formData,
                    headers: {
                        "X-Requested-With": "XMLHttpRequest"
                    }
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            showToast("wishlist page updated successfully!", "success");

                        } else {
                            showToast(data.message || "Failed to update wishlist page.", "error");
                        }
                    })
                    .catch(error => {
                        console.error("Error:", error);
                        showToast("An error occurred. Please try again.", "error");
                    })
                    .finally(() => {
                        updatewishlistBtn.disabled = false;
                        updatewishlistBtn.innerHTML = "Update";
                    });
            });


            // Update form submission
            updatecartBtn.addEventListener("click", function (e) {
                e.preventDefault();

                const formData = new FormData();

                // Basic text fields
                formData.append("cart_title", document.getElementById("cart_title").value);
                formData.append("offer_title", document.getElementById("offer_title").value);
                formData.append("offer_subtitle", document.getElementById("offer_subtitle").value);
                formData.append("shipping_title", document.getElementById("shipping_title").value);
                formData.append("shipping_subtitle", document.getElementById("shipping_subtitle").value);
                formData.append("shipping_description", document.getElementById("shipping_description").value);
                formData.append("discount_info", document.getElementById("discount_info").value);
                formData.append("note_info", document.getElementById("note_info").value);
                formData.append("more_title", document.getElementById("more_title").value);

                const bgFile = document.getElementById("offer_bg")?.files[0];
                if (bgFile) {
                    formData.append("offer_bg", bgFile);
                }

                // cm_product data
                const orderedcm_products = Array.from(document.getElementById("cm_productsboxcontainer").children)
                    .map((child) => child.dataset.id);
                formData.append("cm_products", orderedcm_products.join(","));


                // Submit form
                updatecartBtn.disabled = true;
                updatecartBtn.innerHTML = "Updating...";

                fetch('<?= base_url('online_store/update_cart') ?>', {
                    method: "POST",
                    body: formData,
                    headers: {
                        "X-Requested-With": "XMLHttpRequest"
                    }
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            showToast("cart page updated successfully!", "success");

                        } else {
                            showToast(data.message || "Failed to update cart page.", "error");
                        }
                    })
                    .catch(error => {
                        console.error("Error:", error);
                        showToast("An error occurred. Please try again.", "error");
                    })
                    .finally(() => {
                        updatecartBtn.disabled = false;
                        updatecartBtn.innerHTML = "Update";
                    });
            });

            // Update form submission
            updatecheckoutBtn.addEventListener("click", function (e) {
                e.preventDefault();

                const formData = new FormData();

                // Basic text fields
                formData.append("checkout_title", document.getElementById("checkout_title").value);
                formData.append("comment_info", document.getElementById("comment_info").value);
                formData.append("promocode_info", document.getElementById("promocode_info").value);


                // Submit form
                updatecheckoutBtn.disabled = true;
                updatecheckoutBtn.innerHTML = "Updating...";

                fetch('<?= base_url('online_store/update_checkout') ?>', {
                    method: "POST",
                    body: formData,
                    headers: {
                        "X-Requested-With": "XMLHttpRequest"
                    }
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            showToast("checkout page updated successfully!", "success");

                        } else {
                            showToast(data.message || "Failed to update checkout page.", "error");
                        }
                    })
                    .catch(error => {
                        console.error("Error:", error);
                        showToast("An error occurred. Please try again.", "error");
                    })
                    .finally(() => {
                        updatecheckoutBtn.disabled = false;
                        updatecheckoutBtn.innerHTML = "Update";
                    });
            });


            // Update form submission
            updatetrackingBtn.addEventListener("click", function (e) {
                e.preventDefault();

                const formData = new FormData();

                // Basic text fields
                formData.append("tracking_title", document.getElementById("tracking_title").value);
                formData.append("bnr_title", document.getElementById("bnr_title").value);
                formData.append("bnr_subtitle", document.getElementById("bnr_subtitle").value);
                formData.append("bnr_link", document.getElementById("bnr_link").value);
                formData.append("bnr_btntext", document.getElementById("bnr_btntext").value);
                formData.append("textinfo", document.getElementById("textinfo").value);
                formData.append("tbtntext", document.getElementById("tbtntext").value);

                // Add view type and sort order
                const viewType = document.getElementById("viewType").value;
                formData.append("view_type", viewType);

                // Add sort order if applicable (for 'all' and 'carousel' view types)
                if (viewType === 'all' || viewType === 'carousel') {
                    const sortOrder = document.querySelector('select[name="sort"]').value;
                    formData.append("sort_order", sortOrder);
                }

                // Handle selected posts for 'single' and 'carousel' view types
                if (viewType === 'single' || viewType === 'carousel') {
                    const selectedPosts = [];
                    const checkboxes = document.querySelectorAll('.post-checkbox:checked');

                    checkboxes.forEach(checkbox => {
                        selectedPosts.push(checkbox.id);
                    });

                    // Add selected posts as comma-separated string
                    formData.append("selected_posts", selectedPosts.join(','));
                }

                const bnr_bg = document.getElementById("bnr_bg")?.files[0];
                if (bnr_bg) {
                    formData.append("bnr_bg", bnr_bg);
                }
                const mobbnr_bg = document.getElementById("mobbnr_bg")?.files[0];
                if (mobbnr_bg) {
                    formData.append("mobbnr_bg", mobbnr_bg);
                }

                // Submit form
                updatetrackingBtn.disabled = true;
                updatetrackingBtn.innerHTML = "Updating...";

                fetch('<?= base_url('online_store/update_tracking') ?>', {
                    method: "POST",
                    body: formData,
                    headers: {
                        "X-Requested-With": "XMLHttpRequest"
                    }
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            showToast("tracking page updated successfully!", "success");

                        } else {
                            showToast(data.message || "Failed to update tracking page.", "error");
                        }
                    })
                    .catch(error => {
                        console.error("Error:", error);
                        showToast("An error occurred. Please try again.", "error");
                    })
                    .finally(() => {
                        updatetrackingBtn.disabled = false;
                        updatetrackingBtn.innerHTML = "Update";
                    });
            });


            // Update form submission
            update404Btn.addEventListener("click", function (e) {
                e.preventDefault();

                const formData = new FormData();

                // Basic text fields
                formData.append("error_head", document.getElementById("error_head").value);
                formData.append("error_title", document.getElementById("error_title").value);
                formData.append("error_description", document.getElementById("error_description").value);
                formData.append("errorbnr_title", document.getElementById("errorbnr_title").value);
                formData.append("errorbnr_subtitle", document.getElementById("errorbnr_subtitle").value);
                formData.append("errorbnr_link", document.getElementById("errorbnr_link").value);
                formData.append("errorbnr_btntext", document.getElementById("errorbnr_btntext").value);
                formData.append("errormore_title", document.getElementById("errormore_title").value);

                formData.append("element1", document.getElementById("element1").value);
                formData.append("element2", document.getElementById("element2").value);
                formData.append("element3", document.getElementById("element3").value);
                formData.append("element4", document.getElementById("element4").value);
                formData.append("element5", document.getElementById("element5").value);
                formData.append("element6", document.getElementById("element6").value);


                formData.append("element_id1", document.querySelector('#' + document.getElementById('element1').value).value);
                formData.append("element_id2", document.querySelector('#' + document.getElementById('element2').value).value);
                formData.append("element_id3", document.querySelector('#' + document.getElementById('element3').value).value);
                formData.append("element_id4", document.querySelector('#' + document.getElementById('element4').value).value);
                formData.append("element_id5", document.querySelector('#' + document.getElementById('element5').value).value);
                formData.append("element_id6", document.querySelector('#' + document.getElementById('element6').value).value);

                const errorbnr_bg = document.getElementById("errorbnr_bg")?.files[0];
                if (errorbnr_bg) {
                    formData.append("errorbnr_bg", errorbnr_bg);
                }


                const point_bg1 = document.getElementById("point_bg1")?.files[0];
                const point_bg2 = document.getElementById("point_bg2")?.files[0];
                const point_bg3 = document.getElementById("point_bg3")?.files[0];
                const point_bg4 = document.getElementById("point_bg4")?.files[0];
                const point_bg5 = document.getElementById("point_bg5")?.files[0];
                const point_bg6 = document.getElementById("point_bg6")?.files[0];

                if (point_bg1) {
                    formData.append("point_bg1", point_bg1);
                }
                if (point_bg2) {
                    formData.append("point_bg2", point_bg2);
                }
                if (point_bg3) {
                    formData.append("point_bg3", point_bg3);
                }
                if (point_bg4) {
                    formData.append("point_bg4", point_bg4);
                }
                if (point_bg5) {
                    formData.append("point_bg5", point_bg5);
                }
                if (point_bg6) {
                    formData.append("point_bg6", point_bg6);
                }

                // error_product data
                const orderederror_products = Array.from(document.getElementById("error_productsboxcontainer").children)
                    .map((child) => child.dataset.id);
                formData.append("error_products", orderederror_products.join(","));

                // Submit form
                update404Btn.disabled = true;
                update404Btn.innerHTML = "Updating...";

                fetch('<?= base_url('online_store/update_404') ?>', {
                    method: "POST",
                    body: formData,
                    headers: {
                        "X-Requested-With": "XMLHttpRequest"
                    }
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            showToast("404 page updated successfully!", "success");

                        } else {
                            showToast(data.message || "Failed to update 404 page.", "error");
                        }
                    })
                    .catch(error => {
                        console.error("Error:", error);
                        showToast("An error occurred. Please try again.", "error");
                    })
                    .finally(() => {
                        update404Btn.disabled = false;
                        update404Btn.innerHTML = "Update";
                    });
            });

            function showToast(message, type = "info") {
                const toast = document.createElement("div");
                toast.className = `toast toast-${type} position-fixed top-0 end-0 m-4`;
                toast.innerHTML = `
            <div class="toast-header">
                <strong class="me-auto">${type.toUpperCase()}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
            </div>
            <div class="toast-body">${message}</div>
        `;
                document.body.appendChild(toast);
                new bootstrap.Toast(toast).show();
            }

        });
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const maxSubsections = 5; // Maximum allowed subsections
            const iconsContainer = document.querySelector('.icons');
            const addIconBtn = document.querySelector('.addicon');

            // Function to create a new subsection
            function createSubsection() {
                const subsectionHTML = `
            <div class="iconsubsection">
                <div class="form-group">
                    <div class="d-flex justify-content-between align-items-baseline">
                        <label for="icon">Icon</label>
                        <a class="btn removeicon btn-danger mb-3 text-right">X</a>
                    </div>
                    <input type="file" name="icon[]" id="icon" class="form-control file-preview" accept="image/*">
                    <small>Recommended size 104x104</small>
                    <div id="icon_preview" class="preview-container mt-2"></div>
                </div>
                <div class="form-group">
                    <label for="icon_title">Icon Title</label>
                    <input type="text" name="icon_title[]" id="icon_title" class="form-control" value="">
                </div>
                <div class="form-group">
                    <label for="icon_description">Icon Description</label>
                    <input type="text" name="icon_description[]" id="icon_description" class="form-control" value="">
                </div>
                <hr>
            </div>`;
                return subsectionHTML;
            }

            // Add new subsection
            addIconBtn.addEventListener('click', function (e) {
                e.preventDefault();
                const currentSubsections = document.querySelectorAll('.iconsubsection').length;

                if (currentSubsections < maxSubsections) {
                    // Add new subsection
                    const newSubsection = document.createElement('div');
                    newSubsection.innerHTML = createSubsection();
                    addIconBtn.before(newSubsection);

                    // Reinitialize file preview functionality for new inputs
                    reinitializeFilePreview();
                } else {
                    alert('You can only add up to 5 subsections.');
                }
            });

            // Remove subsection
            iconsContainer.addEventListener('click', function (e) {
                if (e.target.classList.contains('removeicon')) {
                    e.preventDefault();
                    const subsection = e.target.closest('.iconsubsection');
                    if (subsection) {
                        subsection.remove();
                    }
                }
            });

            // Reinitialize file preview functionality for new inputs
            function reinitializeFilePreview() {
                document.querySelectorAll('.file-preview').forEach((fileInput) => {
                    fileInput.removeEventListener('change', handleFilePreview); // Remove previous listeners
                    fileInput.addEventListener('change', handleFilePreview); // Add new listener
                });
            }

            // File preview handler
            function handleFilePreview(event) {
                const input = event.target;
                const previewContainer = input.nextElementSibling.nextElementSibling;

                if (previewContainer) {
                    previewContainer.innerHTML = '';

                    if (input.files && input.files[0]) {
                        const file = input.files[0];
                        if (!file.type.startsWith('image/')) {
                            previewContainer.innerHTML = '<p class="text-danger">Please select a valid image file.</p>';
                            return;
                        }

                        const reader = new FileReader();
                        reader.onload = function (e) {
                            const img = document.createElement('img');
                            img.src = e.target.result;
                            img.classList.add('img-fluid', 'img-thumbnail');
                            img.style.maxWidth = '200px';
                            previewContainer.appendChild(img);
                        };
                        reader.readAsDataURL(file);
                    }
                }
            }

            // Initialize file preview functionality for existing inputs
            reinitializeFilePreview();
        });
    </script>

    <script>
        function toggleEditFormMember(id) {
            const editForm = document.getElementById(`editmemberForm-${id}`);
            const chevron = document.getElementById(`chevron-${id}`);
            if (editForm.style.display === "none") {
                editForm.style.display = "block";
                chevron.classList.replace("fa-chevron-down", "fa-chevron-up");
            } else {
                editForm.style.display = "none";
                chevron.classList.replace("fa-chevron-up", "fa-chevron-down");
            }
        }

        document.addEventListener("DOMContentLoaded", function () {

            document.getElementById("toggleteamsFormButton").addEventListener("click", function () {
                const form = document.getElementById("AddteamsForm");
                form.style.display = form.style.display === "none" ? "block" : "none";
            });

            // Image preview functionality
            const imgInput = document.getElementById('member_pic');
            const newImgPreview = document.getElementById('preview_member_pic');

            imgInput.addEventListener('change', function () {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        newImgPreview.src = e.target.result;
                        newImgPreview.style.display = 'block';
                    };
                    reader.readAsDataURL(file);
                }
            });


            // Image preview functionality for edit forms
            document.querySelectorAll("input[type='file'][id^='member_pic']").forEach((imgInput) => {
                const form = imgInput.closest("form");
                if (!form) return;

                const formId = form.id;
                const memberId = formId.split('-')[1];
                const previewImg = document.getElementById(`preview_member_pic_${memberId}`);

                if (previewImg) {
                    // Show existing image
                    const currentSrc = previewImg.getAttribute('src');
                    if (currentSrc) {
                        previewImg.style.display = 'block';
                    }

                    // Handle new image preview
                    imgInput.addEventListener("change", function () {
                        const file = this.files[0];
                        if (file) {
                            const reader = new FileReader();
                            reader.onload = function (e) {
                                previewImg.src = e.target.result;
                                previewImg.style.display = 'block';
                            };
                            reader.readAsDataURL(file);
                        }
                    });
                }
            });




            const updateBtn = document.getElementById("updateteamsBtn");
            const addBtn = document.getElementById("addteamsBtn");
            const addteamsform = document.getElementById('addteamsform');
            //const editForms = document.querySelectorAll("[id^='editmemberForm-']");


            // For the add form
            const addImgInput = document.getElementById('member_pic');
            if (addImgInput) {
                addImgInput.addEventListener('change', async function () {
                    await validateImageInput(this);
                });
            }

            // For all edit forms
            document.querySelectorAll("input[type='file'][id^='member_pic']").forEach((imgInput) => {
                imgInput.addEventListener('change', async function () {
                    await validateImageInput(this);
                });
            });

            // Image validation function that uses displayError
            function validateImageInput(inputElement) {
                // Remove any existing error messages
                const existingErrors = inputElement.parentElement.querySelectorAll('.error-message');
                existingErrors.forEach(error => error.remove());

                const file = inputElement.files[0];
                const validImageTypes = ['image/jpeg', 'image/png', 'image/gif'];

                if (!file) {
                    displayError($(inputElement), 'Please select an image.');
                    return false;
                }

                if (!validImageTypes.includes(file.type)) {
                    displayError($(inputElement), 'Please select a valid image file (JPEG, PNG, or GIF).');
                    return false;
                }

                if (file.size > 400 * 1024) {
                    displayError($(inputElement), 'Image size should be under 400KB.');
                    return false;
                }

                const img = new Image();
                img.src = URL.createObjectURL(file);

                return new Promise((resolve) => {
                    img.onload = function () {
                        URL.revokeObjectURL(this.src);
                        resolve(true);
                    };

                    img.onerror = function () {
                        displayError($(inputElement), 'Invalid image file');
                        URL.revokeObjectURL(this.src);
                        resolve(false);
                    };
                });
            }

            function isValidEmail(email) {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return emailRegex.test(email);
            }

            function displayError(inputElement, message) {
                if (!inputElement || !inputElement[0]) return;

                const errorDiv = document.createElement("div");
                errorDiv.textContent = message;
                errorDiv.style.color = "red";
                errorDiv.classList.add("error-message");
                inputElement[0].parentElement.appendChild(errorDiv);
            }

            function validateForm(form) {
                let isValid = true;

                // Clear previous validation states
                form.querySelectorAll('.error-message').forEach(el => el.remove());

                // Get form fields
                const member_name = form.querySelector('input[name="member_name"]');
                const member_occupation = form.querySelector('input[name="member_occupation"]');
                const member_email = form.querySelector('input[name="member_email"]');
                const member_linkedin = form.querySelector('input[name="member_linkedin"]');

                if (!member_name.value.trim()) {
                    displayError($(member_name), 'Name cannot be empty.');
                    isValid = false;
                }

                if (!member_occupation.value.trim()) {
                    displayError($(member_occupation), 'Occupation is required.');
                    isValid = false;
                }

                if (!member_email.value.trim()) {
                    displayError($(member_email), 'Email is required.');
                    isValid = false;
                } else if (!isValidEmail(member_email.value.trim())) {
                    displayError($(member_email), 'Please enter a valid email address.');
                    isValid = false;
                }

                if (!member_linkedin.value.trim()) {
                    displayError($(member_linkedin), 'LinkedIn URL is required.');
                    isValid = false;
                }

                return isValid;
            }

            addBtn.addEventListener("click", function (e) {
                e.preventDefault();
                //const orderedIds = Array.from(container.children).map((child) => child.dataset.id);
                const formData = new FormData(addteamsform);

                if (validateaddForm()) {

                    addBtn.disabled = true;
                    addBtn.innerHTML = "Updating...";

                    fetch("<?= base_url('online_store/add_members') ?>", {
                        method: "POST",
                        body: formData,
                        headers: {
                            "X-Requested-With": "XMLHttpRequest"
                        },
                    })
                        .then((response) => response.json())
                        .then((data) => {
                            if (data.success) {
                                showToast("Member Added successfully!", "success");
                                location.reload();
                            } else {
                                showToast(data.message || "Failed to Add Member.", "error");
                            }
                        })
                        .catch((error) => {
                            console.error("Error:", error);
                            showToast("An error occurred. Please try again.", "error");
                        })
                        .finally(() => {
                            addBtn.disabled = false;
                            addBtn.innerHTML = "Update";
                        });
                }
            });


            // Iterate over all edit buttons and add click event listener
            const editForms = document.querySelectorAll("[id^='edit_memberForm-']");

            editForms.forEach((form) => {
                const editBtn = form.querySelector("#editmembersBtn");

                editBtn.addEventListener("click", function (e) {
                    e.preventDefault();

                    if (validateForm(form)) {
                        const formData = new FormData(form);

                        editBtn.disabled = true;
                        editBtn.innerHTML = "Updating...";

                        fetch("<?= base_url('online_store/edit_members') ?>", {
                            method: "POST",
                            body: formData,
                            headers: {
                                "X-Requested-With": "XMLHttpRequest"
                            },
                        })
                            .then((response) => response.json())
                            .then((data) => {
                                if (data.success) {
                                    showToast("Member updated successfully!", "success");
                                } else {
                                    showToast(data.message || "Failed to update Member.", "error");
                                }
                            })
                            .catch((error) => {
                                console.error("Error:", error);
                                showToast("An error occurred. Please try again.", "error");
                            })
                            .finally(() => {
                                editBtn.disabled = false;
                                editBtn.innerHTML = "Update";
                            });
                    }
                });
            });



            const container = document.getElementById("membersBoxContainer");

            if (container) {
                // Initialize Sortable
                Sortable.create(container, {
                    handle: ".handle",
                    animation: 150,
                    onEnd: function (evt) {
                        // Get the new order of IDs
                        const orderedIds = Array.from(container.children).map((child) => child.dataset.id);

                        updateAwardOrder(orderedIds);
                    },
                });
            }

            function updateAwardOrder(orderedIds) {
                fetch("<?= base_url('online_store/update_members_order') ?>", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-Requested-With": "XMLHttpRequest",
                    },
                    body: JSON.stringify({
                        order: orderedIds
                    }),
                })
                    .then((response) => {
                        if (!response.ok) {
                            throw new Error(`HTTP error! status: ${response.status}`);
                        }
                        return response.json();
                    })
                    .then((data) => {
                        if (data.success) {
                            showToast("member order updated successfully!", "success");
                        } else {
                            showToast(data.message || "Failed to update Member order. Please try again.", "error");
                        }
                    })
                    .catch((error) => {
                        console.error("Error:", error);
                        showToast("An error occurred. Please try again.", "error");
                    });
            }

            function showToast(message, type = "info") {
                const toast = document.createElement("div");
                toast.className = `toast toast-${type} position-fixed top-0 end-0 m-4`;
                toast.innerHTML = `
            <div class="toast-header">
                <strong class="me-auto">${type.toUpperCase()}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
            </div>
            <div class="toast-body">${message}</div>
        `;
                document.body.appendChild(toast);
                new bootstrap.Toast(toast).show();
            }

        });
    </script>
    <script>
        $(document).ready(function () {
            $("#addFooterdata").submit(function (event) {
                event.preventDefault(); // Prevent default form submission

                var formData = new FormData(this);

                // AJAX request
                $.ajax({
                    url: '<?= base_url("admin/update-footer") ?>', // API Endpoint
                    type: "POST",
                    data: formData,
                    contentType: false, // Prevent jQuery from setting content-type
                    processData: false, // Prevent automatic data processing
                    dataType: "json", // Expect JSON response
                    success: function (response) {
                        if (response.status === 'success') {
                            alert(response.message);
                            location.reload();
                        } else {
                            alert(response.message);
                        }
                    },
                    error: function () {
                        alert('An error occurred while updating the footer.');
                    }
                });
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const policyPlusButton = document.getElementById('policyplus');
            const addPolicyForm = document.getElementById('AddNewPolicyForm');
            const editPolicyForm = document.getElementById('EditPolicyForm');

            // Handle the add button click to toggle the Add Policy form
            policyPlusButton.addEventListener('click', function () {
                if (addPolicyForm.style.display === 'none' || addPolicyForm.style.display === '') {
                    addPolicyForm.style.display = 'block'; // Show the Add Policy form
                    editPolicyForm.style.display = 'none'; // Hide the Edit Policy form
                } else {
                    addPolicyForm.style.display = 'none'; // Hide the Add Policy form
                }
            });

            // Handle form submission for Add form
            $('#addpolicy').on('submit', function (e) {
                e.preventDefault();

                const formData = {
                    policy_name: $('#addpolicy #policy_name').val(),
                    policy_description: $('#addpolicy #policy_description').val(),
                    policy_link: $('#addpolicy #policy_link').val(),
                };

                $.ajax({
                    url: '<?= base_url("policy/save") ?>', // The route for adding policy
                    type: 'POST',
                    data: formData,
                    dataType: 'json',
                    success: function (response) {
                        if (response.success) {
                            alert(response.message);
                            location.reload(); // Refresh to reflect changes
                        } else {
                            alert(response.message);
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error('AJAX Error:', error);
                        alert('An error occurred. Please try again.');
                    },
                });
            });

            const baseUrl = "<?= base_url() ?>";

            $('form[id^="editNewPolicyForm"]').on('submit', function (e) {
                e.preventDefault();

                const policyId = $(this).attr('id').split('-')[1];

                // Update hidden input with the Quill editor content
                const quillEditor = $(this).find('.quill-editor');
                const hiddenInput = $(this).find('input[name="policy_description"]');
                hiddenInput.val(quillEditor.find('.ql-editor').html()); // Ensure Quill content is captured

                const formData = new FormData(this);
                formData.append('policy_id', policyId);

                $.ajax({
                    url: baseUrl + 'store/edit',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    dataType: 'json',
                    success: function (response) {
                        if (response.success) {
                            alert(response.message);
                            location.reload(); // Refresh the page to show updated data
                        } else {
                            alert(response.message);
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error('AJAX Error:', error);
                        alert('An error occurred. Please try again.');
                    }
                });
            });


        });
    </script>

    <script>
        var base_url = "<?= base_url() ?>"; // This will output the base URL from your PHP environment
    </script>

    <script>
        function toggleEditFormPolicy(policyId) {
            const editForm = document.getElementById(`editPolicyForm-${policyId}`);
            const chevron = document.getElementById(`chevron-${policyId}`);

            if (editForm.style.display === 'none' || editForm.style.display === '') {
                editForm.style.display = 'block';
                chevron.classList.remove('fa-chevron-down');
                chevron.classList.add('fa-chevron-up');
            } else {
                editForm.style.display = 'none';
                chevron.classList.remove('fa-chevron-up');
                chevron.classList.add('fa-chevron-down');
            }
        }
    </script>

    <script>
        function deletePolicy(policyId) {
            // Confirm the deletion
            if (confirm("Are you sure you want to delete this policy?")) {
                // Perform the AJAX request to delete the policy
                $.ajax({
                    url: '<?= base_url('store/delete_policy') ?>', // The correct URL for deleting a policy
                    type: 'POST',
                    data: {
                        policy_id: policyId
                    },
                    success: function (response) {
                        if (response.success) {
                            // Remove the policy from the DOM if deletion is successful
                            $('#policyBox-' + policyId).remove();
                            alert("Policy deleted successfully.");
                        } else {
                            alert("Failed to delete the policy.");
                        }
                    },
                    error: function () {
                        alert("An error occurred while deleting the policy.");
                    }
                });
            }
        }
    </script>


    <script>
        // Automatically generate the link based on policy name input
        document.getElementById('policy_name').addEventListener('input', function () {
            var policyName = this.value;
            var generatedLink = policyName.trim().toLowerCase().replace(/\s+/g, '-');
            document.getElementById('policy_link').value = generatedLink;
        });
    </script>

    <!--chaitanya product-->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Elements for products
            const showProductBtn = document.getElementById("showProductBtn");
            const productCheckboxContainer = document.getElementById("productCheckboxContainer");
            const selectedProductsContainer = document.getElementById("selectedProducts");


            // Elements for bundles
            const showBundleBtn = document.getElementById("showbundletBtn");
            const bundleCheckboxContainer = document.getElementById("bundleCheckboxContainer");
            const selectedBundlesContainer = document.getElementById("selectedbundle");


            const updateproductpage = document.getElementById("updateproductpage");


            // Show/Hide product list
            showProductBtn.addEventListener("click", function () {
                const isVisible = productCheckboxContainer.style.display === "block";
                productCheckboxContainer.style.display = isVisible ? "none" : "block";
            });


            // Show/Hide bundle list
            showBundleBtn.addEventListener("click", function () {
                const isVisible = bundleCheckboxContainer.style.display === "block";
                bundleCheckboxContainer.style.display = isVisible ? "none" : "block";
            });


            // Add/remove selected products dynamically
            productCheckboxContainer.addEventListener("change", function (e) {
                handleSelection(e, "product-checkbox", selectedProductsContainer);
            });


            // Add/remove selected bundles dynamically
            bundleCheckboxContainer.addEventListener("change", function (e) {
                handleSelection(e, "bundle-checkbox", selectedBundlesContainer);
            });


            // Enable drag-and-drop sorting for products and bundles
            new Sortable(selectedProductsContainer, {
                animation: 150,
                ghostClass: "sortable-ghost",
            });


            new Sortable(selectedBundlesContainer, {
                animation: 150,
                ghostClass: "sortable-ghost",
            });


            // Function to add selected items on page load
            function loadPreviouslySelectedItems() {
                document.querySelectorAll(".product-checkbox:checked").forEach(checkbox => {
                    addSelectedItem(checkbox, selectedProductsContainer, "selected-product");
                });


                document.querySelectorAll(".bundle-checkbox:checked").forEach(checkbox => {
                    addSelectedItem(checkbox, selectedBundlesContainer, "selected-bundle");
                });
            }


            // Function to add item to selection list
            function addSelectedItem(checkbox, container, itemClass) {
                const itemId = checkbox.value;
                const itemTitle = checkbox.dataset.title;


                const existingItem = container.querySelector(`[data-id="${itemId}"]`);
                if (!existingItem) {
                    const itemElement = document.createElement("div");
                    itemElement.className = itemClass;
                    itemElement.setAttribute("data-id", itemId);
                    itemElement.innerHTML = `
                        <span>${itemTitle}</span>
                        <button class="btn btn-danger btn-sm remove-item-btn" type="button">
                            <i class="fas fa-trash"></i>
                        </button>
                    `;
                    container.appendChild(itemElement);


                    // Add delete functionality
                    itemElement.querySelector(".remove-item-btn").addEventListener("click", function () {
                        itemElement.remove();
                        checkbox.checked = false; // Uncheck the checkbox
                    });
                }
            }


            // Handle save button click event
            updateproductpage.addEventListener("click", function (e) {
                e.preventDefault(); // Prevent form submission


                const formData = new FormData();


                // Get form fields
                formData.append("title", document.getElementById("title").value);
                formData.append("Description", document.getElementById("Description").value);


                // Get selected products
                const selectedProducts = Array.from(document.querySelectorAll(".selected-product"))
                    .map(product => product.getAttribute("data-id"));
                selectedProducts.forEach(productId => formData.append("products[]", productId));


                // Get selected bundles
                const selectedBundles = Array.from(document.querySelectorAll(".selected-bundle"))
                    .map(bundle => bundle.getAttribute("data-id"));
                selectedBundles.forEach(bundleId => formData.append("bundles[]", bundleId));


                // Disable the button and update its text
                updateproductpage.disabled = true;
                updateproductpage.innerHTML = "Saving...";


                // Send the AJAX request
                fetch('<?= base_url('product-settings/save') ?>', {
                    method: "POST",
                    body: formData,
                    headers: {
                        "X-Requested-With": "XMLHttpRequest"
                    }
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            showToast("Settings saved successfully!", "success");
                        } else {
                            showToast(data.message || "Failed to save settings.", "error");
                        }
                    })
                    .catch(error => {
                        console.error("Error:", error);
                        showToast("An error occurred. Please try again.", "error");
                    })
                    .finally(() => {
                        updateproductpage.disabled = false;
                        updateproductpage.innerHTML = "Update Product Page";
                    });
            });


            // Function to handle selection logic (both products and bundles)
            function handleSelection(e, checkboxClass, container) {
                if (e.target.classList.contains(checkboxClass)) {
                    addSelectedItem(e.target, container, checkboxClass.includes("product") ? "selected-product" : "selected-bundle");
                }
            }


            // Function to show toast notifications
            function showToast(message, type = "info") {
                const toast = document.createElement("div");
                toast.className = `toast toast-${type} position-fixed top-0 end-0 m-4`;
                toast.innerHTML = `
                    <div class="toast-header">
                        <strong class="me-auto">${type.toUpperCase()}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
                    </div>
                    <div class="toast-body">${message}</div>
                `;
                document.body.appendChild(toast);
                new bootstrap.Toast(toast).show();
            }


            // Load previously selected items on page load
            loadPreviouslySelectedItems();
        });
    </script>


    <script>
        // Initialize the FormValidator
        new FormValidator('#carouselForm', {
            onSuccess: (form) => {
                // Show the loader
                document.getElementById('loaderOverlay').style.display = 'flex';

                // Submit the form programmatically
                form.submit();
            },
        });
    </script>

    <script>
        // Initialize the FormValidator
        new FormValidator('#carouselEditForm', {
            onSuccess: (form) => {
                // Show the loader
                document.getElementById('loaderOverlay').style.display = 'flex';

                // Submit the form programmatically
                form.submit();
            },
        });
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const viewTypeSelect = document.getElementById('viewType');
            const sortSelectContainer = document.getElementById('sortSelectContainer');
            const postSelectContainer = document.getElementById('postSelectContainer');
            const postCheckboxes = document.querySelectorAll('.post-checkbox');
            const postDropdown = document.getElementById('postDropdown');
            let selectedPosts = new Set();

            // Function to update container visibility based on view type
            function updateContainers(viewType) {
                switch (viewType) {
                    case 'all':
                        sortSelectContainer.style.display = 'block';
                        postSelectContainer.style.display = 'none';
                        break;
                    case 'single':
                        sortSelectContainer.style.display = 'none';
                        postSelectContainer.style.display = 'block';
                        // Convert checkboxes to radio-like behavior
                        postCheckboxes.forEach(checkbox => {
                            checkbox.type = 'radio';
                            checkbox.name = 'single-post';
                        });
                        break;
                    case 'carousel':
                        sortSelectContainer.style.display = 'block';
                        postSelectContainer.style.display = 'block';
                        // Restore checkbox behavior
                        postCheckboxes.forEach(checkbox => {
                            checkbox.type = 'checkbox';
                            checkbox.name = '';
                        });
                        break;
                }
            }

            // Function to update dropdown button text
            function updateDropdownText() {
                if (viewTypeSelect.value === 'single') {
                    const selectedPost = document.querySelector('.post-checkbox:checked');
                    if (selectedPost) {
                        const caption = selectedPost.nextElementSibling.querySelector('.custom-control-label').innerText;
                        postDropdown.textContent = caption.length > 30 ? caption.substring(0, 30) + '...' : caption;
                    } else {
                        postDropdown.textContent = 'Select Post';
                    }
                } else {
                    const selectedCount = document.querySelectorAll('.post-checkbox:checked').length;
                    postDropdown.textContent = selectedCount ? `${selectedCount} Posts Selected` : 'Select Posts';
                }
            }

            // Handle view type changes
            viewTypeSelect.addEventListener('change', function () {
                updateContainers(this.value);
                // Reset selections when view type changes
                postCheckboxes.forEach(checkbox => checkbox.checked = false);
                selectedPosts.clear();
                updateDropdownText();
            });

            // Handle post selection
            document.querySelector('.dropdown-menu').addEventListener('change', function (e) {
                if (e.target.classList.contains('post-checkbox')) {
                    if (viewTypeSelect.value === 'single') {
                        // For single view, uncheck all other checkboxes
                        postCheckboxes.forEach(checkbox => {
                            if (checkbox !== e.target) checkbox.checked = false;
                        });
                        selectedPosts.clear();
                        if (e.target.checked) selectedPosts.add(e.target.id);
                    } else {
                        // For carousel view, manage multiple selections
                        if (e.target.checked) {
                            selectedPosts.add(e.target.id);
                        } else {
                            selectedPosts.delete(e.target.id);
                        }
                    }
                    updateDropdownText();
                    updatePreview();
                }
            });

            // Function to update preview
            function updatePreview() {
                const previewContainer = document.querySelector('.post-preview');
                let previewContent = '<h6>Post Preview</h6>';

                selectedPosts.forEach(postId => {
                    const post = document.getElementById(postId);
                    const postContainer = post.closest('.custom-control');
                    const image = postContainer.querySelector('img');
                    const caption = postContainer.querySelector('.custom-control-label');

                    previewContent += `
                <div class="preview-item mb-3">
                    <img src="${image.src}" style="width: 100px; height: 100px; object-fit: cover;" class="mb-2">
                    <p class="small">${caption.innerText}</p>
                </div>
            `;
                });

                previewContainer.innerHTML = previewContent;
            }

            // Initialize the view
            updateContainers(viewTypeSelect.value);
            updateDropdownText();
        });
    </script>

    <script>
        $(document).ready(function () {
            $('#updateEmail_POP_UPpage').click(function (e) {
                e.preventDefault();


                var formData = new FormData();
                var imageFile = $('#Email_POP_UP_Image')[0].files[0];


                if (imageFile) {
                    formData.append('email_pop_up_image', imageFile);
                }


                formData.append('email_pop_up_mail_title', $('#Email_POP_UP_mail_Title').val());
                formData.append('email_pop_up_mail_text', $('#Email_POP_UP_mail_text').val());
                formData.append('email_pop_up_mail_linktext', $('#Email_POP_UP_mail_linktext').val());
                formData.append('email_pop_up_description', $('#Email_POP_UP_description').val());


                $.ajax({
                    url: "<?= base_url('save-email-popup') ?>", // For views with PHP
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function (response) {
                        alert(response.message);
                    },
                    error: function (xhr, status, error) {
                        alert('An error occurred: ' + xhr.status + ' ' + error);
                    }
                });


            });
        });
    </script>


    <script>
        document.getElementById('Email_POP_UP_Image').addEventListener('change', function (event) {
            let file = event.target.files[0];


            if (file) {
                let reader = new FileReader();
                reader.onload = function (e) {
                    let preview = document.getElementById('previewImage');
                    preview.src = e.target.result;
                    preview.style.display = "block"; // Show the preview
                };
                reader.readAsDataURL(file);
            }
        });
    </script>

    <!--marquee chaitanya-->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Toggle form visibility on button click
            document.getElementById("toggleTextFormButton").addEventListener("click", function () {
                var form = document.getElementById("addmarqueeText");
                form.style.display = (form.style.display === "none" || form.style.display === "") ? "block" : "none";
            });

            // Handle form submission with AJAX
            document.getElementById("addmarqueeText").addEventListener("submit", function (e) {
                e.preventDefault(); // Prevent form from submitting traditionally

                let formData = new FormData(this);

                fetch("<?= site_url('marquee-text/save-marquee') ?>", {
                    method: "POST",
                    body: formData,
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === "success") {
                            alert(data.message); // Show success message
                            document.getElementById("addmarqueeText").reset(); // Reset form
                            document.getElementById("addmarqueeText").style.display = "none"; // Hide the form
                        } else {
                            alert(data.message); // Show error message
                        }
                    })
                    .catch(error => {
                        console.error("Error:", error);
                        alert("An error occurred while saving data.");
                    });
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Toggle edit form visibility
            document.querySelectorAll(".actions button").forEach((button) => {
                button.addEventListener("click", function () {
                    const editForm = this.closest(".textBox").querySelector(".edit-form");
                    const chevron = this.querySelector("#chevron");

                    if (editForm.style.display === "none" || editForm.style.display === "") {
                        editForm.style.display = "block";
                        chevron.classList.remove("fa-chevron-down");
                        chevron.classList.add("fa-chevron-up");
                    } else {
                        editForm.style.display = "none";
                        chevron.classList.remove("fa-chevron-up");
                        chevron.classList.add("fa-chevron-down");
                    }
                });
            });

            // Fetch and populate the text for editing
            function fetchMarqueeText(textId) {
                fetch(`<?= site_url('marquee-text/GetMarqueeText') ?>/${textId}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === "success") {
                            const form = document.querySelector(`#textBox[data-id="${textId}"] .edit-form form`);
                            form.querySelector("input[name='marqueeText']").value = data.text.marqueeText;
                            form.querySelector("input[name='marqueeText_link']").value = data.text.marqueeText_link;
                            form.querySelector("select[name='text_visibility']").value = data.text.text_visibility;
                        } else {
                            alert("Error fetching text.");
                        }
                    })
                    .catch(error => {
                        console.error("Error:", error);
                        alert("An error occurred while fetching data.");
                    });
            }

            // Handle delete button
            document.querySelectorAll(".actions a").forEach((deleteButton) => {
                deleteButton.addEventListener("click", function () {
                    const textBox = this.closest(".textBox");
                    const textId = textBox.getAttribute("data-id");

                    if (confirm("Are you sure you want to delete this text?")) {
                        fetch(`<?= site_url('marquee-text/delete-marquee') ?>/${textId}`, {
                            method: "DELETE"
                        })
                            .then(response => response.json())
                            .then(data => {
                                if (data.status === "success") {
                                    textBox.remove(); // Remove the text box from the UI
                                    alert(data.message);
                                } else {
                                    alert(data.message);
                                }
                            })
                            .catch(error => {
                                console.error("Error:", error);
                                alert("An error occurred while deleting data.");
                            });
                    }
                });
            });
        });
    </script>


    <script>
        document.querySelectorAll("[id^='edittextForm-']").forEach(form => {
            form.addEventListener("submit", function (e) {
                e.preventDefault(); // Prevent default form submission

                let formData = new FormData(this);
                let recordId = this.id.split('-')[1]; // Extract the record ID from the form's ID

                fetch(`<?= site_url('marquee-text/UpdateMarquee/') ?>${recordId}`, {
                    method: "POST",
                    body: formData
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === "success") {
                            alert(data.message); // Display success message
                            // Optionally, you can refresh the page or update the UI to reflect changes
                        } else {
                            alert(data.message); // Display error message
                        }
                    })
                    .catch(error => {
                        console.error("Error:", error);
                        alert("An error occurred while updating the text.");
                    });
            });
        });
    </script>


    <script>
        $(document).ready(function () {
            $("#addmarqueebottomText").on("submit", function (e) {
                e.preventDefault();

                $.ajax({
                    url: "<?= site_url('marquee-bottom-text/save'); ?>",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (response) {
                        if (response.status === "success") {
                            alert(response.message);
                            location.reload();
                        } else {
                            alert(response.message);
                        }
                    },
                    error: function () {
                        alert("An error occurred while saving the data.");
                    }
                });
            });
        });
    </script>

    <!---------------------------------------------------------------------------------- Home page Product Section ----------------------------------------------------------------------->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Get elements

            const toggleButton = document.getElementById("toggleProductFormButton");
            const formContainer = document.getElementById("productAddForm");
            const productList = document.getElementById("productList");
            const collectionList = document.getElementById("collectionList");

            // ✅ Toggle Form Visibility
            toggleButton.addEventListener("click", function () {
                formContainer.style.display = formContainer.style.display === "none" || formContainer.style.display === "" ? "block" : "none";
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $('#ShowProduct, #ShowCollection').hide();

            // Toggle visibility of Product & Collection fields based on selection
            $('#select_type').on('change', function () {
                let selectedValue = $(this).val();

                if (selectedValue === 'product') {
                    $('#ShowProduct').fadeIn();
                    $('#ShowCollection').hide();
                } else if (selectedValue === 'collection') {
                    $('#ShowCollection').fadeIn();
                    $('#ShowProduct').hide();
                } else {
                    $('#ShowProduct, #ShowCollection').hide();
                }
            });

            // Function to update selected items display
            function updateSelectedDisplay(selectElement, displayElement, hiddenInput) {
                displayElement.html('');
                let selectedValues = [];

                $(selectElement).find(':selected').each(function () {
                    let selectedItem = $(this).text();
                    selectedValues.push($(this).val());

                    let badge = $('<div class="badge badge-primary p-2 m-1"></div>').text(selectedItem);
                    displayElement.append(badge);
                });

                hiddenInput.val(selectedValues.join(',')); // Store selected values
            }

            // Attach event listeners to Product and Collection select elements
            $('#selected_product').on('change', function () {
                updateSelectedDisplay(this, $('#selected_products_display'), $('#selected_products_hidden'));
            });

            $('#selected_collection').on('change', function () {
                updateSelectedDisplay(this, $('#selected_collections_display'), $('#selected_collections_hidden'));
            });

            // Append hidden input fields to store selected values for submission
            $('#productForm').append('<input type="hidden" id="selected_products_hidden" name="selected_products">');
            $('#productForm').append('<input type="hidden" id="selected_collections_hidden" name="selected_collections">');
        });
    </script>

    <script>
        function toggleEditFormProduct(productId) {
            let editForm = document.getElementById(`editForm-${productId}`);
            let chevronIcon = document.getElementById(`chevron-${productId}`);

            if (editForm.style.display === "none" || editForm.style.display === "") {
                editForm.style.display = "block";
                chevronIcon.classList.remove("fa-chevron-down");
                chevronIcon.classList.add("fa-chevron-up");
            } else {
                editForm.style.display = "none";
                chevronIcon.classList.remove("fa-chevron-up");
                chevronIcon.classList.add("fa-chevron-down");
            }
        }
    </script>

    <script>
        function deleteProduct(productId) {
            if (!confirm("Are you sure you want to delete this product?")) {
                return;
            }

            fetch(`<?= base_url('online_store/delete_product/') ?>${productId}`, {
                method: "POST",
                headers: {
                    "X-Requested-With": "XMLHttpRequest", // Ensure AJAX request
                    "Content-Type": "application/json"
                }
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert("Product deleted successfully!");
                        document.getElementById(`productBox-${productId}`).remove(); // Remove from UI
                    } else {
                        alert("Failed to delete product: " + data.message);
                    }
                })
                .catch(error => {
                    console.error("Error:", error);
                    alert("An error occurred while deleting the product.");
                });
        }
    </script>




    <!-------------------------------------------------------------------------------- carousel 2 --------------------------------------------------------------------------------------->

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.querySelectorAll(".select_link").forEach(selectField => {
                let id = selectField.id.split("_")[2];
                let productField = document.getElementById("ShowProductField_" + id);
                let collectionField = document.getElementById("ShowCollectionField_" + id);

                if (!selectField || !productField || !collectionField) {
                    console.error("Element not found: ", { selectField, productField, collectionField });
                    return;
                }

                function updateFields(value) {
                    if (value === 'product') {
                        productField.style.display = 'block';
                        collectionField.style.display = 'none';
                    } else if (value === 'collection') {
                        productField.style.display = 'none';
                        collectionField.style.display = 'block';
                    } else {
                        productField.style.display = 'none';
                        collectionField.style.display = 'none';
                    }
                }

                // Initializing
                updateFields(selectField.value);

                // On change event
                selectField.addEventListener('change', function () {
                    updateFields(this.value);
                });
            });
        });
    </script>


    <!------------------------------------------------------------------------------- Home Page Image -------------------------------------------------------------------------------->

    <!-- JavaScript -->
    <script>
        function toggleFields(index) {
            let selection = document.getElementById('select_link' + index).value;
            document.getElementById('ShowProductField' + index).style.display = selection === 'product' ? 'block' : 'none';
            document.getElementById('ShowCollectionField' + index).style.display = selection === 'collection' ? 'block' : 'none';
        }

        // Function to update preview section
        function updatePreview(type) {
            let selectElement = document.getElementById(type === 'product' ? 'selected_product1' : 'selected_collection1');
            let previewElement = document.getElementById(type === 'product' ? 'productPreview' : 'collectionPreview');

            let selectedItems = Array.from(selectElement.selectedOptions).map(option => option.text);
            previewElement.innerHTML = selectedItems.length ? `<small class="text-muted">Selected: ${selectedItems.join(', ')}</small>` : '';
        }
    </script>

</body>