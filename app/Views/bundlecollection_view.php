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
                <!-- Add layout settings here as needed -->
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
                                <h4>Product-Collection</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Product-Collection
                                    </li>
                                </ol>
                            </nav>
                        </div>
                        <div class="col-md-6 col-sm-12 text-right blogs-imex">
                            <div class="dropdown">
                                <a class="btn btn-primary fw-bold" href="<?= base_url(); ?>bundlecollection_create"
                                    role="button">
                                    Add New
                                </a>
                            </div>
                            <div class="dropdown">
                                <!-- Import Button (conditional) -->
                                <?php if ($canImport): ?>
                                    <a class="btn btn-primary fw-bold" href="<?= base_url(); ?>productcollections/import" role="button">
                                        Import
                                    </a>
                                <?php endif; ?>
                            </div>

                            <div class="dropdown">
                                <!-- Export Button (conditional) -->
                                <?php if ($canExport): ?>
                                    <a class="btn btn-primary fw-bold" href="<?= base_url(); ?>productcollections/exporttoexcel" role="button">
                                        Export To Excel
                                    </a>
                                <?php endif; ?>
                            </div>

                            <!-- Logs Button (conditional) -->
                            <?php if ($canLogs): ?>
                                <div class="dropdown">
                                    <a class="btn btn-success fw-bold" href="<?= base_url('bundlecollection/deletedcollection') ?>" role="button">
                                        Logs
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <!-- Page Main Content Start -->
                <div class="card-box mb-30">
                    <div class="pd-20">
                        <h4 class="text-blue h4">Registered Product-Collection</h4>
                    </div>
                    <div class="pb-20">
                        <table id="datatable-responsive" class="table hover multiple-select-row data-table-export"
                            cellspacing="0">
                            <thead>
                                <tr>
                                    <th class="table-plus datatable-nosort">ID</th>
                                    <th>Title</th>
                                    <th>Products</th>

                                    <th>Price</th>
                                    <th>Discount</th>
                                    <th>Discount Type</th> <!-- New Column Added -->
                                    <th class="datatable-nosort">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($product_collections as $bundle): ?>
                                    <tr>
                                        <td><?= esc($bundle['bundle_id']) ?></td>
                                        <td><?= esc($bundle['bundle_name']) ?></td>
                                        <td>
                                            <?php
                                            // Loop through the products array
                                            if (!empty($bundle['product_titles'])):
                                                foreach ($bundle['product_titles'] as $product):
                                            ?>
                                                    <?= esc($product) ?><br>
                                                <?php endforeach; ?>

                                            <?php endif; ?>
                                        </td>



                                        <td><?= esc($bundle['selling_price']) ?></td>
                                        <td>
                                            <?= $bundle['discount_type'] === 'percent'
                                                ? (isset($bundle['discount_percent_input']) ? esc($bundle['discount_percent_input']) . '%' : 'N/A')
                                                : (isset($bundle['discount_value_input']) ? '$' . esc($bundle['discount_value_input']) : 'N/A') ?>
                                        </td>

                                        <td><?= ucfirst(esc($bundle['discount_type'])) ?></td>
                                        <td>
                                            <div class="dropdown">
                                                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                    <i class="dw dw-more"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                    <a class="dropdown-item" href="<?= base_url('BundleController/editproductcollection/' . $bundle['bundle_id']); ?>">
                                                        <i class="dw dw-edit2"></i> Edit
                                                    </a>
                                                    <?php if ($canDelete): ?>
                                                        <a class="dropdown-item" href="<?= base_url('BundleController/deleteproductcollection/' . $bundle['bundle_id']); ?>">
                                                            <i class="dw dw-delete-3"></i> Delete
                                                        </a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
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

</body>

<!-- Footer View Start -->
<?= $this->include('footer_view') ?>
<!-- Footer View End -->

<script>
    function confirmBundleDelete(bundleId) {
        // Show confirmation dialog
        if (confirm('Are you sure you want to delete this bundle?')) {
            // If confirmed, redirect to the delete route with the bundle ID
            window.location.href = '<?= base_url("BundleController/delete/") ?>' + bundleId;
        }
    }
</script>

</html>