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
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">

                <div class="row pb-10">
                    <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
                        <div class="card-box height-100-p widget-style3">
                            <div class="d-flex flex-wrap">
                                <div class="widget-data">
                                    <div class="weight-700 font-24 text-dark"><?= $blogCount ?></div>
                                    <div class="font-14 text-secondary weight-500">
                                        Blogs <span>Live</span>
                                    </div>
                                </div>
                                <div class="widget-icon">
                                    <div class="icon" data-color="#00eccf">
                                        <i class="icon-copy ion-social-bitcoin"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
                        <div class="card-box height-100-p widget-style3">
                            <div class="d-flex flex-wrap">
                                <div class="widget-data">
                                    <div class="weight-700 font-24 text-dark"><?= $privateBlogs ?></div>
                                    <div class="font-14 text-secondary weight-500">
                                        Unleashed Blog
                                    </div>
                                </div>
                                <div class="widget-icon">
                                    <div class="icon" data-color="#ff5b5b">
                                        <span class="icon-copy ti-na"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
                        <div class="card-box height-100-p widget-style3">
                            <div class="d-flex flex-wrap">
                                <div class="widget-data">
                                    <div class="weight-700 font-24 text-dark">400+</div>
                                    <div class="font-14 text-secondary weight-500">
                                        Total Views
                                    </div>
                                </div>
                                <div class="widget-icon">
                                    <div class="icon">
                                        <i class="bi bi-eye-fill"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
                        <div class="card-box height-100-p widget-style3">
                            <div class="d-flex flex-wrap">
                                <div class="widget-data">
                                    <div class="weight-700 font-24 text-dark">83</div>
                                    <div class="font-14 text-secondary weight-500">Users IN Last 30 Minutes</div>
                                </div>
                                <div class="widget-icon">
                                    <div class="icon" data-color="#09cc06">
                                        <i class="bi bi-graph-up-arrow"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Blogs</h4>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12 text-right blogs-imex">
                            <div class="dropdown">
                                <a class="btn btn-primary fw-bold" href="<?= base_url(); ?>blogs/addnewblog" role="button">
                                    Add New
                                </a>
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
                <div class="card-box mb-30">
                    <div class="pd-20">
                        <h4 class="text-blue h4">Blogs Table</h4>
                    </div>
                    <div class="pb-20">
                        <table class="table hover data-table-export table-hover">
                            <thead>
                                <tr>
                                    <th class="table-plus">ID</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Visibility</th>
                                    <th>Tags</th>
                                    <th>Category</th>
                                    <th>Publish Date and Time</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($posts as $post) : ?>
                                    <tr>
                                        <td class="table-plus"><?= $post['blog_id'] ?></td>
                                        <td><a class="b_line" href="<?= base_url() ?>/blogs/editblogs/<?= $post['blog_id'] ?>"><?= $post['blog_title'] ?></a></td>
                                        <td class="truncate-text"><?= substr($post['blog_description'], 0, 35) . (strlen($post['blog_description']) > 50 ? '...' : '') ?></td>
                                        <td><?= $post['blog_visibility'] ?></td>
                                        <td>
                                            <?php
                                            $tags = json_decode($post['blog_tags'], true);

                                            if (!empty($tags) && is_array($tags)) :
                                                foreach ($tags as $tag) :
                                                    // ✅ Convert 'tag-name' to 'Tag Name'
                                                    $formattedTag = ucwords(str_replace('-', ' ', $tag));
                                            ?>
                                                    <span class="badge badge-pill" data-bgcolor="#e7ebf5" data-color="#265ed7"><?= esc($formattedTag) ?></span>
                                                <?php
                                                endforeach;
                                                else :
                                                ?>
                                                <span class="badge badge-pill" data-bgcolor="#e7ebf5" data-color="#265ed7">No Tags</span>
                                            <?php endif; ?>
                                        </td>
                                        <td><?= $post['category'] ?></td>
                                        <td><?php $date = new DateTime($post['publish_date_and_time']);
                                            echo $date->format('d-F-Y h:i A'); ?></td>
                                        <td>
                                            <a class="dropdown-item" href="javascript:void(0);" onclick="confirmbblogDelete(<?= $post['blog_id'] ?>)" data-color="#e95959"><i class="dw dw-delete-3"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer View Start -->
    <?= $this->include('footer_view') ?>
    <!-- Footer View End -->
</body>

</html>