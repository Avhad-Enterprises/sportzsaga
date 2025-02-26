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
                                <h4>Related Products</h4>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12 text-right blogs-imex">
                            <div class="dropdown">
                                <a class="btn btn-primary fw-bold" href="<?= base_url(); ?>addnew_related_product"
                                    role="button">
                                    Create Related Product
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Page Main Content Start -->
                <div class="card-box mb-30">
                    <div class="pd-20">
                        <h4 class="text-blue h4"></h4>
                    </div>
                    <div class="pb-20">
                        <table class="table hover data-table-export">
                            <thead>
                                <tr>
                                    <th class="table-plus">ID</th>
                                    <th>Main Product</th>
                                    <th>Related Products</th>
                                    <th>Selection Method</th>
                                    <th>Created</th>
                                    <th class="datatable-nosort">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($related_products as $product): ?>
                                    <tr class="product-row">
                                        <td><?= $product['id'] ?></td>
                                        <td>
                                            <a class="b_line"
                                                href="<?= base_url() ?>admin-products/edit_related_product/<?= $product['id'] ?>">
                                                <?= esc($product['product_title']) ?>
                                            </a>
                                        </td>
                                        <td>
                                            <?php
                                            $relatedIds = json_decode($product['related_product_ids'], true);
                                            if (is_array($relatedIds) && count($relatedIds) > 0) {
                                                // Fetch titles of related products
                                                $db = \Config\Database::connect();
                                                $builder = $db->table('products');
                                                $relatedProducts = $builder->select('product_title')
                                                    ->whereIn('product_id', $relatedIds)
                                                    ->get()
                                                    ->getResultArray();

                                                // Convert product titles to a numbered format
                                                $relatedTitles = array_column($relatedProducts, 'product_title');

                                                echo "<ol>";
                                                foreach ($relatedTitles as $title) {
                                                    echo "<li>" . esc($title) . "</li>";
                                                }
                                                echo "</ol>";
                                            } else {
                                                echo 'No related products';
                                            }
                                            ?>
                                        </td>
                                        <td><?= ucfirst($product['selection_method']) ?></td>
                                        <td><?php $date = new DateTime($product['created_at']);
                                            echo $date->format('d-F-Y h:i A'); ?>
                                        </td>
                                        <td>
                                            <a href="javascript:void(0);"
                                                onclick="confirmRelatedProductDelete(<?= $product['id'] ?>)"
                                                data-color="#e95959">
                                                <i class="icon-copy dw dw-delete-3"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
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

<script>
    function confirmRelatedProductDelete(productId) {
        if (confirm("Are you sure you want to delete this related product?")) {
            window.location.href = "<?= base_url('admin-products/deleterelatedproduct/') ?>" + productId;
        }
    }
</script>

</html>