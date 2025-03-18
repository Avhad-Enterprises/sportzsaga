<!-- Head View Start -->
<?= $this->include('head_view') ?>
<!-- Head View End -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">

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
                                <h4>Products Table</h4>
                            </div>
                        </div>

                        <?php
                        $session = \Config\Services::session();
                        $userType = $session->get('admin_type');
                        ?>

                        <?php if ($userType === 'super_admin_view'): ?>
                            <div class="col-md-6 col-sm-12 text-right blogs-imex">
                                <div class="dropdown">
                                    <a class="btn btn-primary fw-bold"
                                        href="<?= base_url(); ?>admin-products/addnewproducts" role="button">
                                        Add New
                                    </a>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if ($userType !== 'super_admin_view'): ?>
                            <div class="col-md-6 col-sm-12 text-right blogs-imex">
                                <div class="dropdown">
                                    <a class="btn btn-primary fw-bold"
                                        href="<?= base_url(); ?>admin-products/addnewproducts" role="button">
                                        Add New
                                    </a>
                                </div>
                                <div class="dropdown">
                                    <a class="btn btn-primary fw-bold"
                                        href="<?= base_url(); ?>admin-products/importfromexcel" role="button">
                                        Import
                                    </a>
                                </div>
                                <div class="dropdown">
                                    <a class="btn btn-primary fw-bold" href="<?= base_url(); ?>excel/exporttoexcel"
                                        role="button">
                                        Export To Excel
                                    </a>
                                </div>
                                <div class="dropdown">
                                    <a class="btn btn-primary fw-bold position-relative"
                                        href="<?= base_url(); ?>product_reviews" role="button">
                                        <i class="fa-solid fa-star-half-stroke"></i>
                                        <?php if (!empty($pendingreviews) && $pendingreviews > 0): ?>
                                            <span class="badge bg-warning text-dark "><?= esc($pendingreviews) ?></span>
                                        <?php endif; ?>
                                    </a>
                                </div>
                                <div>
                                    <a class="btn btn-success fw-bold" href="<?= base_url('product_deleted') ?>"
                                        role="button">
                                        Logs
                                    </a>
                                </div>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>

                <div class="card-box mb-30">
                    <div class="pd-20">
                        <h4 class="text-blue h4">Products</h4>
                    </div>
                    <div class="pb-20">
                        <?php if ($userType !== 'super_admin_view'): ?>
                            <table class="table hover data-table-export table-hover">
                                <thead>
                                    <tr>
                                        <th class="table-plus">Product ID</th>
                                        <th class="table-plus">Product Image</th>
                                        <th>Product Title</th>
                                        <th>Product Status</th>
                                        <th>Cost Price</th>
                                        <th>Product Tags</th>
                                        <th class="datatable-nosort">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($products as $product): ?>
                                        <tr class="product-row">
                                            <td><?= $product['product_id'] ?></td>
                                            <td class="table-plus">
                                                <div class="name-avatar d-flex align-items-center">
                                                    <div class="avatar mr-2 flex-shrink-0">
                                                        <img src="<?= $product['product_image'] ?>"
                                                            class="border-radius-100 shadow" width="40" height="40" alt="" />
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="product-title-container">
                                                    <a class="b_line"
                                                        href="<?= base_url(); ?>admin-products/editproduct/<?= $product['product_id'] ?>">
                                                        <?= $product['product_title'] ?>
                                                    </a>
                                                    <span class="view-icon">
                                                        <a target="_blank"
                                                            href="<?= base_url(); ?>admin-products/<?= $product['url'] ?>">
                                                            <i class="fa-solid fa-eye"></i>
                                                        </a>
                                                    </span>
                                                </div>
                                            </td>
                                            <td>
                                                <?php if ($product['product_status'] === 'active'): ?>
                                                    <span class="badge badge-pill" data-bgcolor="#5CAD5C"
                                                        data-color="#ffffff"><?= $product['product_status'] ?></span>
                                                <?php else: ?>
                                                    <span class="badge badge-pill" data-bgcolor="#EC8887"
                                                        data-color="#ffffff"><?= $product['product_status'] ?></span>
                                                <?php endif; ?>
                                            </td>
                                            <td><?= $product['cost_price'] ?></td>
                                            <td>
                                                <?php
                                                $tags = json_decode($product['product_tags'], true);

                                                if (!empty($tags) && is_array($tags)):
                                                    foreach ($tags as $tag):
                                                        $formattedTag = ucwords(str_replace('-', ' ', $tag));
                                                        ?>
                                                        <span class="badge badge-pill" data-bgcolor="#e7ebf5"
                                                            data-color="#265ed7"><?= esc($formattedTag) ?></span>
                                                        <?php
                                                    endforeach;
                                                else:
                                                    ?>
                                                    <span class="badge badge-pill" data-bgcolor="#e7ebf5" data-color="#265ed7">No
                                                        Tags</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <a href="javascript:void(0);"
                                                    onclick="confirmProductDelete(<?= $product['product_id'] ?>)"
                                                    data-color="#e95959">
                                                    <i class="icon-copy dw dw-delete-3"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php endif; ?>
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