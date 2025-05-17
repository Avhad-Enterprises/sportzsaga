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
                                <h4>Inventory Management</h4>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 d-flex justify-content-end align-items-center">
                            <a class="btn btn-primary fw-bold mr-1" href="<?= base_url('inventory/create') ?>"
                                role="button">
                                Add Inventory
                            </a>
                            <a class="btn btn-success fw-bold" href="<?= base_url('inventory_deleted') ?>"
                                role="button">
                                Logs
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Ensure jQuery is included before your script -->
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

                <!-- Your view with updated script -->
                <div class="card-box mb-30">
                    <div class="pd-20 d-flex justify-content-between align-items-center">
                        <h4 class="text-blue h4">Stock</h4>
                        <!-- Save button hidden by default with style -->
                        <button type="button" id="saveAllStocks" class="btn btn-dark mx-2" style="display: none;">Save</button>
                    </div>
                    <div class="pb-20">
                        <form id="inventoryForm">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" id="select-all" /></th>
                                        <th>Product ID</th>
                                        <th>Product Title</th>
                                        <th>Warehouse</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($stocks as $stock): ?>
                                        <?php foreach ($inventoryData as $product): ?>
                                            <tr>
                                                <td><input type="checkbox" class="select-product" /></td>
                                                <td><?= esc($product['product_id']) ?></td>
                                                <td><?= esc($product['product_title']) ?></td>
                                                <td>
                                                    <table class="table table-sm mb-0">
                                                        <tbody>
                                                            <?php foreach ($product['warehouses'] as $warehouse): ?>
                                                                <?php
                                                                $uniqueId = esc($product['product_id'] . '-' . $warehouse['id']);
                                                                ?>
                                                                <tr>
                                                                    <td><?= esc($warehouse['warehouse_name']) ?></td>
                                                                    <td><?= esc($warehouse['warehouse_location']) ?></td>
                                                                    <td>
                                                                        <input type="number"
                                                                            class="form-control form-control-sm stock-input"
                                                                            min="0"
                                                                            name="stock[<?= $uniqueId ?>]"
                                                                            value="<?= esc($warehouse['stock_quantity']) ?>"
                                                                            data-product-id="<?= esc($product['product_id']) ?>"
                                                                            data-warehouse-id="<?= esc($warehouse['id']) ?>" />
                                                                    </td>
                                                                </tr>
                                                            <?php endforeach; ?>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td><a href="<?= base_url('inventory/edit/' . esc($stock['id'])) ?>"><i class="fa-solid fa-pen-to-square"></i></a></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </form>

                    </div>
                </div>

                <script>
                    $(document).ready(function() {
                        console.log('jQuery loaded and script running');

                        // Function to show the Save button
                        function showSaveButton() {
                            $('#saveAllStocks').show();
                        }

                        // Show Save button when a stock input is clicked
                        $('.stock-input').on('click', function() {
                            console.log('Stock input clicked');
                            showSaveButton();
                        });

                        // Show Save button when a stock input value changes
                        $('.stock-input').on('input', function() {
                            console.log('Stock input changed:', $(this).val());
                            showSaveButton();
                        });

                        // Handle "Save All Stocks" button click
                        $('#saveAllStocks').on('click', function() {
                            console.log('Save All Stocks clicked');

                            let stockData = [];
                            $('.stock-input').each(function() {
                                let productId = $(this).data('product-id');
                                let warehouseId = $(this).data('warehouse-id');
                                let stockQuantity = parseInt($(this).val(), 10) || 0;

                                if (isNaN(stockQuantity) || stockQuantity < 0) {
                                    console.warn('Invalid stock quantity:', stockQuantity);
                                    return;
                                }

                                console.log('Collecting:', {
                                    productId,
                                    warehouseId,
                                    stockQuantity
                                });

                                stockData.push({
                                    product_id: parseInt(productId),
                                    warehouse_id: parseInt(warehouseId),
                                    stock_quantity: stockQuantity
                                });
                            });

                            if (stockData.length === 0) {
                                alert('No valid stock data to submit.');
                                return;
                            }

                            $.ajax({
                                url: '<?= base_url('inventory/bulk_update') ?>',
                                type: 'POST',
                                data: JSON.stringify({
                                    stocks: stockData
                                }),
                                contentType: 'application/json',
                                headers: {
                                    'X-CSRF-TOKEN': '<?= csrf_hash() ?>'
                                },
                                beforeSend: function() {
                                    $('#saveAllStocks').prop('disabled', true).text('Saving...');
                                },
                                success: function(response) {
                                    console.log('Success response:', response);
                                    if (response.status === 'success') {
                                        alert('Stock quantities updated successfully!');
                                        $('#saveAllStocks').hide(); // Hide button after successful save
                                        location.reload();
                                    } else {
                                        alert('Error: ' + response.message);
                                        console.log('Errors:', response.errors || 'None');
                                    }
                                },
                                error: function(xhr, status, error) {
                                    console.error('AJAX error:', xhr.responseText, status, error);
                                    alert('An error occurred while updating stocks: ' + xhr.responseText);
                                },
                                complete: function() {
                                    $('#saveAllStocks').prop('disabled', false).text('Save');
                                }
                            });
                        });

                        // Select all checkboxes
                        $('#select-all').on('change', function() {
                            $('.select-product').prop('checked', this.checked);
                        });
                    });
                </script>

            </div>

        </div>
    </div>

    <!-- Footer View Start -->
    <?= $this->include('footer_view') ?>
    <!-- Footer View End -->

</body>

</html>