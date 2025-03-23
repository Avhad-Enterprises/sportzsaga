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
                <!-- Page Header -->
                <div class="clearfix mb-3">
                    <div class="pull-left d-flex align-items-center">
                        <!-- Back Button -->
                        <button type="button" class="btn btn-secondary mr-3" onclick="goBack()">
                            <i class="fa fa-arrow-left"></i> Back
                        </button>
                        <h4 class="h4 mb-0">Edit Inventory</h4>
                    </div>
                </div>

                <!-- Inventory Edit Form -->
                <div class="pd-20 card-box mb-30">
                    <form method="post" action="<?= base_url('inventory/update/' . $inventory['id']) ?>">

                        <div class="d-flex justify-content-end">
                            <a href="<?= base_url() ?>inventory/inventory_logs/<?= $inventory['id'] ?>"
                                class="btn btn-outline-secondary px-3 py-2 rounded-circle shadow-sm"
                                data-toggle="tooltip" data-placement="top" title="View Inventory Logs">
                                <i class="fa-solid fa-ellipsis-vertical fa-lg"></i>
                            </a>
                        </div>
                        
                        <!-- Basic Information -->
                        <div class="card mb-3">
                            <div class="card-header">Basic Information</div>
                            <div class="card-body row">
                                <?php if (isset($allowedFields['product_id'])): ?>
                                    <div class="col-md-6 form-group">
                                        <label for="product_id">Product Name</label>
                                        <select id="product_id" name="product_id" class="form-control" required>
                                            <?php foreach ($products as $product): ?>
                                                <option value="<?= $product['product_id'] ?>"
                                                    <?= ($product['product_id'] == $inventory['product_id']) ? 'selected' : '' ?>>
                                                    <?= $product['product_title'] ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="card mb-3">
                            <div class="card-header">Warehouse Details</div>
                            <div class="card-body row">
                                <?php if (isset($allowedFields['warehouse_id'])): ?>
                                    <div class="col-md-4 form-group">
                                        <label for="warehouse_id">Warehouse ID</label>
                                        <div class="input-group">
                                            <input type="text" name="warehouse_id" id="warehouse_id" class="form-control"
                                                value="<?= $inventory['warehouse_id'] ?>" readonly>
                                            <div class="input-group-append">
                                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#warehouseModal">Select Warehouse</button>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <!-- Inventory Count -->
                                <?php if (isset($allowedFields['inventory_count'])): ?>
                                    <div class="col-md-4 form-group">
                                        <label for="inventory_count">Inventory Count</label>
                                        <input type="number" name="inventory_count" id="inventory_count"
                                            class="form-control" value="<?= $inventory['inventory_count'] ?>">
                                    </div>
                                <?php endif; ?>
                                <!-- Storage Location -->
                                <?php if (isset($allowedFields['storage_location'])): ?>
                                    <div class="col-md-4 form-group">
                                        <label for="storage_location">Storage Location</label>
                                        <input type="text" name="storage_location" id="storage_location"
                                            class="form-control" value="<?= $inventory['storage_location'] ?>">
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <?php if (!empty($warehouses)): ?>
                            <div class="modal fade" id="warehouseModal" tabindex="-1" role="dialog"
                                aria-labelledby="warehouseModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary text-white">
                                            <h5 class="modal-title" id="warehouseModalLabel">Select Warehouse</h5>
                                            <button type="button" class="close text-white" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Table to Display Warehouses -->
                                            <div class="table-responsive">
                                                <table class="table table-striped table-hover table-bordered"
                                                    id="warehouseTable">
                                                    <thead class="thead-dark">
                                                        <tr>
                                                            <th class="text-center">Warehouse ID</th>
                                                            <th class="text-center">Warehouse Name</th>
                                                            <th class="text-center">Location</th>
                                                            <th class="text-center">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <!-- Warehouses fetched dynamically -->
                                                        <?php foreach ($warehouses as $warehouse): ?>
                                                            <tr>
                                                                <td class="text-center">
                                                                    <?= htmlspecialchars($warehouse['id']) ?>
                                                                </td>
                                                                <td><?= htmlspecialchars($warehouse['name']) ?></td>
                                                                <td><?= htmlspecialchars($warehouse['location']) ?></td>
                                                                <td class="text-center">
                                                                    <button type="button" class="btn btn-sm btn-success"
                                                                        onclick="selectWarehouse('<?= htmlspecialchars($warehouse['id']) ?>', '<?= htmlspecialchars($warehouse['name']) ?>', '<?= htmlspecialchars($warehouse['location']) ?>')">
                                                                        Select
                                                                    </button>
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
                        <?php else: ?>
                            <p class="text-danger">You do not have access to any warehouses.</p>
                        <?php endif; ?>


                        <!-- Product Details -->
                        <div class="card mb-3">
                            <div class="card-header">Product Details</div>
                            <div class="card-body row">
                                <?php if (isset($allowedFields['sku'])): ?>
                                    <div class="col-md-4 form-group">
                                        <label>SKU</label>
                                        <input type="text" name="sku" class="form-control" value="<?= $inventory['sku'] ?>">
                                    </div>
                                <?php endif; ?>
                                <?php if (isset($allowedFields['inner_barcode'])): ?>
                                    <div class="col-md-4 form-group">
                                        <label>Inner Barcode</label>
                                        <input type="text" name="inner_barcode" class="form-control"
                                            value="<?= $inventory['inner_barcode'] ?>">
                                    </div>
                                <?php endif; ?>
                                <?php if (isset($allowedFields['outer_barcode'])): ?>
                                    <div class="col-md-4 form-group">
                                        <label>Outer Barcode</label>
                                        <input type="text" name="outer_barcode" class="form-control"
                                            value="<?= $inventory['outer_barcode'] ?>">
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <!-- Dimensions -->
                        <div class="card mb-3">
                            <div class="card-header">Dimensions</div>
                            <div class="card-body row">
                                <?php if (isset($allowedFields['length'])): ?>
                                    <div class="col-md-3 form-group">
                                        <label>Length</label>
                                        <input type="text" name="length" class="form-control"
                                            value="<?= $inventory['length'] ?>">
                                    </div>
                                <?php endif; ?>
                                <?php if (isset($allowedFields['width'])): ?>
                                    <div class="col-md-3 form-group">
                                        <label>Width</label>
                                        <input type="text" name="width" class="form-control"
                                            value="<?= $inventory['width'] ?>">
                                    </div>
                                <?php endif; ?>
                                <?php if (isset($allowedFields['height'])): ?>
                                    <div class="col-md-3 form-group">
                                        <label>Height</label>
                                        <input type="text" name="height" class="form-control"
                                            value="<?= $inventory['height'] ?>">
                                    </div>
                                <?php endif; ?>
                                <?php if (isset($allowedFields['breadth'])): ?>
                                    <div class="col-md-3 form-group">
                                        <label>Breadth</label>
                                        <input type="text" name="breadth" class="form-control"
                                            value="<?= $inventory['breadth'] ?>">
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php if (
                            isset($allowedFields['single_unit_price']) ||
                            isset($allowedFields['case_price']) ||
                            isset($allowedFields['compare_at_price'])
                        ): ?>
                            <div class="card mb-3">
                                <div class="card-header">Pricing</div>
                                <div class="card-body row">
                                    <?php if (isset($allowedFields['single_unit_price'])): ?>
                                        <div class="col-md-4 form-group">
                                            <label>Single Unit Price</label>
                                            <input type="number" name="single_unit_price" class="form-control"
                                                value="<?= $inventory['single_unit_price'] ?>">
                                        </div>
                                    <?php endif; ?>

                                    <?php if (isset($allowedFields['case_price'])): ?>
                                        <div class="col-md-4 form-group">
                                            <label>Case Price</label>
                                            <input type="number" name="case_price" class="form-control"
                                                value="<?= $inventory['case_price'] ?>">
                                        </div>
                                    <?php endif; ?>

                                    <?php if (isset($allowedFields['compare_at_price'])): ?>
                                        <div class="col-md-4 form-group">
                                            <label>Compare-at Price</label>
                                            <input type="number" name="compare_at_price" class="form-control"
                                                value="<?= $inventory['compare_at_price'] ?>">
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>


                        <!-- Submit Button -->
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Update Inventory</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap 4 JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Optional Popper.js for Bootstrap -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>


    <script>
        function goBack() {
            window.history.back();
        }
    </script>

    <script>
        function selectWarehouse(warehouseId, warehouseName, location) {
            document.getElementById('warehouse_id').value = warehouseId;
            document.getElementById('storage_location').value = `${warehouseName} - ${location}`;
            $('#warehouseModal').modal('hide'); // Close the modal
        }
    </script>

</body>

</html>