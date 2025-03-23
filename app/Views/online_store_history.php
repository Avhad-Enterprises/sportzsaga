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

                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Online Store Logs</h4>
                            </div>
                        </div>
                    </div>
                </div>


                <!-------------------------------------------------------------------------------Carousel Form -------------------------------------------------------------------------------------->


                <div class="card-box mb-30">
                    <div class="pd-20">
                        <h4 class="text-blue h4">Carousels</h4>
                    </div>
                    <div class="pb-20">
                        <table class="table hover data-table-export table-hover">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Updated At</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($carousels)): ?>
                                    <?php foreach (array_reverse($carousels) as $carousel): ?>
                                        <tr>
                                            <td>
                                                <a href="<?= base_url('carousel/carousel_change_logs/' . $carousel['id']) ?>"
                                                    class="text-primary">
                                                    <?= esc(substr($carousel['title'], 0, 50)) . (strlen($carousel['title']) > 50 ? '...' : '') ?>
                                                </a>
                                            </td>
                                            <td>
                                                <?= isset($carousel['updated_at'])
                                                    ? esc(date('d/M/Y h:i A', strtotime($carousel['updated_at'])))
                                                    : 'N/A' ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="3" class="text-center">No deleted carousels found.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>

                        </table>
                    </div>
                </div>





                <!-------------------------------------------------------------------------------- Marque --------------------------------------------------------------------------------------------->


                <div class="card-box mb-30">
                    <div class="pd-20">
                        <h4 class="text-blue h4">Marquee Texts</h4>
                    </div>
                    <div class="pb-20">
                        <table class="table hover data-table-export table-hover">
                            <thead>
                                <tr>
                                    <th>Marquee Text</th>
                                    <th>Updated At</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($marquees)): ?>
                                    <?php foreach (array_reverse($marquees) as $marquee): ?>
                                        <tr>
                                            <td>
                                                <a href="<?= base_url('marquee/marquee_change_logs/' . $marquee['id']) ?>"
                                                    class="text-primary">
                                                    <?= esc(substr($marquee['marqueeText'], 0, 50)) . (strlen($marquee['marqueeText']) > 50 ? '...' : '') ?>
                                                </a>
                                            </td>
                                            <td>
                                                <?= isset($marquee['updated_at'])
                                                    ? esc(date('d/M/Y h:i A', strtotime($marquee['updated_at'])))
                                                    : 'N/A' ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="2" class="text-center">No updated marquee texts found.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>


                <!---------------------------------------------------------------------------- Home Collection --------------------------------------------------------------------------------------->


                <div class="card-box mb-30">
                    <div class="pd-20">
                        <h4 class="text-blue h4">Home Collections</h4>
                    </div>
                    <div class="pb-20">
                        <table class="table hover data-table-export table-hover">
                            <thead>
                                <tr>
                                    <th>Collection ID</th>
                                    <th>Updated At</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($home_collections)): ?>
                                    <?php foreach (array_reverse($home_collections) as $item): ?>
                                        <tr>
                                            <td>
                                                <a href="<?= base_url('home-collection/collection_change_logs/' . $item['id']) ?>"
                                                    class="text-primary">
                                                    <?= esc(substr($item['id'], 0, 50)) . (strlen($item['id']) > 50 ? '...' : '') ?>
                                                </a>
                                            </td>
                                            <td>
                                                <?= isset($item['updated_at'])
                                                    ? esc(date('d/M/Y h:i A', strtotime($item['updated_at'])))
                                                    : 'N/A' ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="2" class="text-center">No updated home collections found.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>



                <!-------------------------------------------------------------------------------Carousel2 Form -------------------------------------------------------------------------------------->


                <div class="card-box mb-30">
                    <div class="pd-20">
                        <h4 class="text-blue h4">Carousels 2</h4>
                    </div>
                    <div class="pb-20">
                        <table class="table hover data-table-export table-hover">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Updated At</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($home_carousel2)): ?>
                                    <?php foreach ($home_carousel2 as $home_carousel): ?>
                                        <tr>
                                            <td>
                                                <a href="<?= base_url('Carousel2/Carousel2_history/' . $home_carousel['id']) ?>" class="text-primary">
                                                    <?= esc(substr($home_carousel['title'], 0, 50)) . (strlen($home_carousel['title']) > 50 ? '...' : '') ?>
                                                </a>
                                            </td>
                                            <td>
                                                <?= isset($home_carousel['updated_at'])
                                                    ? esc(date('d/M/Y h:i A', strtotime($home_carousel['updated_at'])))
                                                    : 'N/A' ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="7" class="text-center">No deleted carousels found.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>


                <!-------------------------------------------------------------------------------logo Form -------------------------------------------------------------------------------------->

                <div class="card-box mb-30">
                    <div class="pd-20">
                        <h4 class="text-blue h4">Logo</h4>
                    </div>
                    <div class="pb-20">
                        <table class="table hover data-table-export table-hover">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Updated At</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($home_logos)): ?>
                                    <?php foreach ($home_logos as $home_logo): ?>
                                        <tr>
                                            <td>
                                                <a href="<?= base_url('logo/logo_history/' . $home_logo['id']) ?>" class="text-primary">
                                                    <?= esc(substr($home_logo['title'], 0, 50)) . (strlen($home_logo['title']) > 50 ? '...' : '') ?>
                                                </a>
                                            </td>
                                            <td>
                                                <?= isset($home_logo['updated_at'])
                                                    ? esc(date('d/M/Y h:i A', strtotime($home_logo['updated_at'])))
                                                    : 'N/A' ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="7" class="text-center">No deleted carousels found.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>


                <!-------------------------------------------------------------------------------image Form -------------------------------------------------------------------------------------->

                <div class="card-box mb-30">
                    <div class="pd-20">
                        <h4 class="text-blue h4">home_image</h4>
                    </div>
                    <div class="pb-20">
                        <table class="table hover data-table-export table-hover">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Updated At</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($home_images)): ?>
                                    <?php foreach ($home_images as $home_image): ?>
                                        <tr>
                                            <td>
                                                <a href="<?= base_url('image/image_history/' . $home_image['id']) ?>" class="text-primary">
                                                    <?= esc(substr($home_image['image_title1'], 0, 50)) . (strlen($home_image['image_title1']) > 50 ? '...' : '') ?>
                                                </a>
                                            </td>
                                            <td>
                                                <?= isset($home_image['updated_at'])
                                                    ? esc(date('d/M/Y h:i A', strtotime($home_image['updated_at'])))
                                                    : 'N/A' ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="7" class="text-center">No deleted carousels found.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>


                <!-------------------------------------------------------------------------------home blog Form -------------------------------------------------------------------------------------->

                <div class="card-box mb-30">
                    <div class="pd-20">
                        <h4 class="text-blue h4">Home Blog</h4>
                    </div>
                    <div class="pb-20">
                        <table class="table hover data-table-export table-hover">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Updated At</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($home_blogs)): ?>
                                    <?php foreach ($home_blogs as $home_blog): ?>
                                        <tr>
                                            <td>
                                                <a href="<?= base_url('home_blog/home_blog_history/' . $home_blog['id']) ?>" class="text-primary">
                                                    <?= esc(substr($home_blog['id'], 0, 50)) . (strlen($home_blog['id']) > 50 ? '...' : '') ?>
                                                </a>
                                            </td>
                                            <td>
                                                <?= isset($home_blog['updated_at'])
                                                    ? esc(date('d/M/Y h:i A', strtotime($home_blog['updated_at'])))
                                                    : 'N/A' ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="7" class="text-center">No deleted carousels found.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-------------------------------------------------------------------------------blog 1 Form -------------------------------------------------------------------------------------->

                <div class="card-box mb-30">
                    <div class="pd-20">
                        <h4 class="text-blue h4">Blog 1</h4>
                    </div>
                    <div class="pb-20">
                        <table class="table hover data-table-export table-hover">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Updated At</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($blog_settings)): ?>
                                    <?php foreach ($blog_settings as $blog_setting): ?>
                                        <tr>
                                            <td>
                                                <a href="<?= base_url('blog_setting/blog_setting_history/' . $blog_setting['id']) ?>" class="text-primary">
                                                    <?= esc(substr($blog_setting['blogs_title'], 0, 50)) . (strlen($blog_setting['blogs_title']) > 50 ? '...' : '') ?>
                                                </a>
                                            </td>
                                            <td>
                                                <?= isset($blog_setting['updated_at'])
                                                    ? esc(date('d/M/Y h:i A', strtotime($blog_setting['updated_at'])))
                                                    : 'N/A' ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="7" class="text-center">No deleted carousels found.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>


                <!-------------------------------------------------------------------------------blog 2 Form -------------------------------------------------------------------------------------->

                <div class="card-box mb-30">
                    <div class="pd-20">
                        <h4 class="text-blue h4">Blog 2</h4>
                    </div>
                    <div class="pb-20">
                        <table class="table hover data-table-export table-hover">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Updated At</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($onlinestore_blogs)): ?>
                                    <?php foreach ($onlinestore_blogs as $onlinestore_blog): ?>
                                        <tr>
                                            <td>
                                                <a href="<?= base_url('onlinestore_blog/onlinestore_blog_history/' . $onlinestore_blog['id']) ?>" class="text-primary">
                                                    <?= esc(substr($onlinestore_blog['blogs_name'], 0, 50)) . (strlen($onlinestore_blog['blogs_name']) > 50 ? '...' : '') ?>
                                                </a>
                                            </td>
                                            <td>
                                                <?= isset($onlinestore_blog['updated_at'])
                                                    ? esc(date('d/M/Y h:i A', strtotime($onlinestore_blog['updated_at'])))
                                                    : 'N/A' ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="7" class="text-center">No deleted carousels found.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-------------------------------------------------------------------------------single blog Form -------------------------------------------------------------------------------------->

                <div class="card-box mb-30">
                    <div class="pd-20">
                        <h4 class="text-blue h4">single blog</h4>
                    </div>
                    <div class="pb-20">
                        <table class="table hover data-table-export table-hover">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Updated At</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($singleblog_datas)): ?>
                                    <?php foreach ($singleblog_datas as $singleblog_data): ?>
                                        <tr>
                                            <td>
                                                <a href="<?= base_url('singleblog_data/singleblog_history/' . $singleblog_data['id']) ?>" class="text-primary">
                                                    <?= esc(substr($singleblog_data['page_title'], 0, 50)) . (strlen($singleblog_data['page_title']) > 50 ? '...' : '') ?>
                                                </a>
                                            </td>
                                            <td>
                                                <?= isset($singleblog_data['updated_at'])
                                                    ? esc(date('d/M/Y h:i A', strtotime($singleblog_data['updated_at'])))
                                                    : 'N/A' ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="7" class="text-center">No deleted carousels found.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-------------------------------------------------------------------------------collection Form -------------------------------------------------------------------------------------->

                <div class="card-box mb-30">
                    <div class="pd-20">
                        <h4 class="text-blue h4">collection </h4>
                    </div>
                    <div class="pb-20">
                        <table class="table hover data-table-export table-hover">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Updated At</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($os_collections)): ?>
                                    <?php foreach ($os_collections as $os_collection): ?>
                                        <tr>
                                            <td>
                                                <a href="<?= base_url('os_collection/os_collection_history/' . $os_collection['id']) ?>" class="text-primary">
                                                    <?= esc(substr($os_collection['title'], 0, 50)) . (strlen($os_collection['title']) > 50 ? '...' : '') ?>
                                                </a>
                                            </td>
                                            <td>
                                                <?= isset($os_collection['updated_at'])
                                                    ? esc(date('d/M/Y h:i A', strtotime($os_collection['updated_at'])))
                                                    : 'N/A' ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="7" class="text-center">No deleted carousels found.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>


                <!-------------------------------------------------------------------------------product Form -------------------------------------------------------------------------------------->

                <div class="card-box mb-30">
                    <div class="pd-20">
                        <h4 class="text-blue h4">product </h4>
                    </div>
                    <div class="pb-20">
                        <table class="table hover data-table-export table-hover">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Updated At</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($product_settings)): ?>
                                    <?php foreach ($product_settings as $product_setting): ?>
                                        <tr>
                                            <td>
                                                <a href="<?= base_url('product_setting/product_setting_history/' . $product_setting['id']) ?>" class="text-primary">
                                                    <?= esc(substr($product_setting['title'], 0, 50)) . (strlen($product_setting['title']) > 50 ? '...' : '') ?>
                                                </a>
                                            </td>
                                            <td>
                                                <?= isset($product_setting['updated_at'])
                                                    ? esc(date('d/M/Y h:i A', strtotime($product_setting['updated_at'])))
                                                    : 'N/A' ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="7" class="text-center">No deleted carousels found.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-------------------------------------------------------------------------------policy Form -------------------------------------------------------------------------------------->

                <div class="card-box mb-30">
                    <div class="pd-20">
                        <h4 class="text-blue h4">policy </h4>
                    </div>
                    <div class="pb-20">
                        <table class="table hover data-table-export table-hover">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Updated At</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($policies)): ?>
                                    <?php foreach ($policies as $policie): ?>
                                        <tr>
                                            <td>
                                                <a href="<?= base_url('policie/policie_history/' . $policie['id']) ?>" class="text-primary">
                                                    <?= esc(substr($policie['policy_name'], 0, 50)) . (strlen($policie['policy_name']) > 50 ? '...' : '') ?>
                                                </a>
                                            </td>
                                            <td>
                                                <?= isset($policie['updated_at'])
                                                    ? esc(date('d/M/Y h:i A', strtotime($policie['updated_at'])))
                                                    : 'N/A' ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="7" class="text-center">No deleted carousels found.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>


                <!-------------------------------------------------------------------------------Footer Form -------------------------------------------------------------------------------------->

                <div class="card-box mb-30">
                    <div class="pd-20">
                        <h4 class="text-blue h4">Footer </h4>
                    </div>
                    <div class="pb-20">
                        <table class="table hover data-table-export table-hover">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Updated At</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($footer_datas)): ?>
                                    <?php foreach ($footer_datas as $footer_data): ?>
                                        <tr>
                                            <td>
                                                <a href="<?= base_url('footer/footer_history/' . $footer_data['id']) ?>" class="text-primary">
                                                    <?= esc(substr($footer_data['footer_name'], 0, 50)) . (strlen($footer_data['footer_name']) > 50 ? '...' : '') ?>
                                                </a>
                                            </td>
                                            <td>
                                                <?= isset($footer_data['updated_at'])
                                                    ? esc(date('d/M/Y h:i A', strtotime($footer_data['updated_at'])))
                                                    : 'N/A' ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="7" class="text-center">No deleted carousels found.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-------------------------------------------------------------------------------Header Form -------------------------------------------------------------------------------------->

                <div class="card-box mb-30">
                    <div class="pd-20">
                        <h4 class="text-blue h4">Header </h4>
                    </div>
                    <div class="pb-20">
                        <table class="table hover data-table-export table-hover">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Updated At</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($header_pages)): ?>
                                    <?php foreach ($header_pages as $header_page): ?>
                                        <tr>
                                            <td>
                                                <a href="<?= base_url('header_page/header_page_history/' . $header_page['id']) ?>" class="text-primary">
                                                    <?= esc(substr($header_page['title'], 0, 50)) . (strlen($header_page['title']) > 50 ? '...' : '') ?>
                                                </a>
                                            </td>
                                            <td>
                                                <?= isset($header_page['updated_at'])
                                                    ? esc(date('d/M/Y h:i A', strtotime($header_page['updated_at'])))
                                                    : 'N/A' ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="7" class="text-center">No deleted carousels found.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-------------------------------------------------------------------------------email pop up Form -------------------------------------------------------------------------------------->

                <div class="card-box mb-30">
                    <div class="pd-20">
                        <h4 class="text-blue h4">Email pop up </h4>
                    </div>
                    <div class="pb-20">
                        <table class="table hover data-table-export table-hover">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Updated At</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($email_pop_ups)): ?>
                                    <?php foreach ($email_pop_ups as $email_pop_up): ?>
                                        <tr>
                                            <td>
                                                <a href="<?= base_url('email_pop_up/email_pop_up_history/' . $email_pop_up['id']) ?>" class="text-primary">
                                                    <?= esc(substr($email_pop_up['email_pop_up_mail_title'], 0, 50)) . (strlen($email_pop_up['email_pop_up_mail_title']) > 50 ? '...' : '') ?>
                                                </a>
                                            </td>
                                            <td>
                                                <?= isset($email_pop_up['updated_at'])
                                                    ? esc(date('d/M/Y h:i A', strtotime($email_pop_up['updated_at'])))
                                                    : 'N/A' ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="7" class="text-center">No deleted carousels found.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-------------------------------------------------------------------------------about Form -------------------------------------------------------------------------------------->

                <div class="card-box mb-30">
                    <div class="pd-20">
                        <h4 class="text-blue h4">About us </h4>
                    </div>
                    <div class="pb-20">
                        <table class="table hover data-table-export table-hover">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Updated At</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($aboutpages)): ?>
                                    <?php foreach ($aboutpages as $aboutpage): ?>
                                        <tr>
                                            <td>
                                                <a href="<?= base_url('aboutpage/aboutpage_history/' . $aboutpage['id']) ?>" class="text-primary">
                                                    <?= esc(substr($aboutpage['about_title'], 0, 50)) . (strlen($aboutpage['about_title']) > 50 ? '...' : '') ?>
                                                </a>
                                            </td>
                                            <td>
                                                <?= isset($aboutpage['updated_at'])
                                                    ? esc(date('d/M/Y h:i A', strtotime($aboutpage['updated_at'])))
                                                    : 'N/A' ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="7" class="text-center">No deleted carousels found.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-------------------------------------------------------------------------------about Form -------------------------------------------------------------------------------------->

                <div class="card-box mb-30">
                    <div class="pd-20">
                        <h4 class="text-blue h4">Contact </h4>
                    </div>
                    <div class="pb-20">
                        <table class="table hover data-table-export table-hover">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Updated At</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($contactpages)): ?>
                                    <?php foreach ($contactpages as $contactpage): ?>
                                        <tr>
                                            <td>
                                                <a href="<?= base_url('contactpage/contactpage_history/' . $contactpage['id']) ?>" class="text-primary">
                                                    <?= esc(substr($contactpage['contact_title'], 0, 50)) . (strlen($contactpage['contact_title']) > 50 ? '...' : '') ?>
                                                </a>
                                            </td>
                                            <td>
                                                <?= isset($contactpage['updated_at'])
                                                    ? esc(date('d/M/Y h:i A', strtotime($contactpage['updated_at'])))
                                                    : 'N/A' ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="7" class="text-center">No deleted carousels found.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-------------------------------------------------------------------------------Cart Form -------------------------------------------------------------------------------------->

                <div class="card-box mb-30">
                    <div class="pd-20">
                        <h4 class="text-blue h4">Cart </h4>
                    </div>
                    <div class="pb-20">
                        <table class="table hover data-table-export table-hover">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Updated At</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($cartpages)): ?>
                                    <?php foreach ($cartpages as $cartpage): ?>
                                        <tr>
                                            <td>
                                                <a href="<?= base_url('cartpage/cartpage_history/' . $cartpage['id']) ?>" class="text-primary">
                                                    <?= esc(substr($cartpage['cart_title'], 0, 50)) . (strlen($cartpage['cart_title']) > 50 ? '...' : '') ?>
                                                </a>
                                            </td>
                                            <td>
                                                <?= isset($cartpage['updated_at'])
                                                    ? esc(date('d/M/Y h:i A', strtotime($cartpage['updated_at'])))
                                                    : 'N/A' ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="7" class="text-center">No deleted carousels found.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>


                <!-------------------------------------------------------------------------------Checkout Form -------------------------------------------------------------------------------------->

                <div class="card-box mb-30">
                    <div class="pd-20">
                        <h4 class="text-blue h4">Checkout</h4>
                    </div>
                    <div class="pb-20">
                        <table class="table hover data-table-export table-hover">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Updated At</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($checkoutpages)): ?>
                                    <?php foreach ($checkoutpages as $checkoutpage): ?>
                                        <tr>
                                            <td>
                                                <a href="<?= base_url('checkoutpage/checkoutpage_history/' . $checkoutpage['id']) ?>" class="text-primary">
                                                    <?= esc(substr($checkoutpage['checkout_title'], 0, 50)) . (strlen($checkoutpage['checkout_title']) > 50 ? '...' : '') ?>
                                                </a>
                                            </td>
                                            <td>
                                                <?= isset($checkoutpage['updated_at'])
                                                    ? esc(date('d/M/Y h:i A', strtotime($checkoutpage['updated_at'])))
                                                    : 'N/A' ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="7" class="text-center">No deleted carousels found.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>


                <!-------------------------------------------------------------------------------tracking Form -------------------------------------------------------------------------------------->

                <div class="card-box mb-30">
                    <div class="pd-20">
                        <h4 class="text-blue h4">Tracking</h4>
                    </div>
                    <div class="pb-20">
                        <table class="table hover data-table-export table-hover">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Updated At</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($trackingpages)): ?>
                                    <?php foreach ($trackingpages as $trackingpage): ?>
                                        <tr>
                                            <td>
                                                <a href="<?= base_url('trackingpage/trackingpage_history/' . $trackingpage['id']) ?>" class="text-primary">
                                                    <?= esc(substr($trackingpage['tracking_title'], 0, 50)) . (strlen($trackingpage['tracking_title']) > 50 ? '...' : '') ?>
                                                </a>
                                            </td>
                                            <td>
                                                <?= isset($trackingpage['updated_at'])
                                                    ? esc(date('d/M/Y h:i A', strtotime($trackingpage['updated_at'])))
                                                    : 'N/A' ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="7" class="text-center">No deleted carousels found.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-------------------------------------------------------------------------------404 page Form -------------------------------------------------------------------------------------->

                <div class="card-box mb-30">
                    <div class="pd-20">
                        <h4 class="text-blue h4">404 page</h4>
                    </div>
                    <div class="pb-20">
                        <table class="table hover data-table-export table-hover">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Updated At</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($error_pages)): ?>
                                    <?php foreach ($error_pages as $error_page): ?>
                                        <tr>
                                            <td>
                                                <a href="<?= base_url('error_page/error_page_history/' . $error_page['id']) ?>" class="text-primary">
                                                    <?= esc(substr($error_page['error_head'], 0, 50)) . (strlen($error_page['error_head']) > 50 ? '...' : '') ?>
                                                </a>
                                            </td>
                                            <td>
                                                <?= isset($error_page['updated_at'])
                                                    ? esc(date('d/M/Y h:i A', strtotime($error_page['updated_at'])))
                                                    : 'N/A' ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="7" class="text-center">No deleted carousels found.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>


                  <!-------------------------------------------------------------------------------our team page Form -------------------------------------------------------------------------------------->

                  <div class="card-box mb-30">
                    <div class="pd-20">
                        <h4 class="text-blue h4">Our Team</h4>
                    </div>
                    <div class="pb-20">
                        <table class="table hover data-table-export table-hover">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Updated At</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($team_members)): ?>
                                    <?php foreach ($team_members as $team_member): ?>
                                        <tr>
                                            <td>
                                                <a href="<?= base_url('team_members/team_member_history/' . $team_member['id']) ?>" class="text-primary">
                                                    <?= esc(substr($team_member['member_name'], 0, 50)) . (strlen($team_member['member_name']) > 50 ? '...' : '') ?>
                                                </a>
                                            </td>
                                            <td>
                                                <?= isset($team_member['updated_at'])
                                                    ? esc(date('d/M/Y h:i A', strtotime($team_member['updated_at'])))
                                                    : 'N/A' ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="7" class="text-center">No deleted carousels found.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
        <!-- Footer View Start -->
        <?= $this->include('footer_view') ?>
        <!-- Footer View End -->

</body>

</html>