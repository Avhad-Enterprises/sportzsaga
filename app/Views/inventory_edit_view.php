<!-- Head View Start -->
<?= $this->include('head_view') ?>
<!-- Head View End -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<style>
    /* Real-time effects */
    .save-btn {
        opacity: 0;
        display: none;
        transition: opacity 0.3s ease, transform 0.2s ease;
    }

    .save-btn.visible {
        display: inline-block;
        opacity: 1;
    }

    .save-btn:hover {
        transform: scale(1.05);
    }

    .save-btn:active {
        transform: scale(0.95);
    }

    .save-btn.saving {
        cursor: not-allowed;
        opacity: 0.7;
    }

    .save-btn.success {
        background-color: #28a745 !important;
        transition: background-color 0.3s ease;
    }

    .form-control:focus,
    .form-control.changed {
        border-color: #007bff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }

    .spinner {
        display: none;
    }

    .condition-row {
        margin-bottom: 10px;
    }

    .condition-row select,
    .condition-row input {
        margin-right: 5px;
    }
</style>

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

                <!-- Inventory Form -->
                <?php foreach ($inventory as $inventory): ?>
                    <form id="addInventoryForm" method="post" action="<?= base_url('inventory/update/' . esc($inventory['id'])) ?>">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <div>
                                <i class="fa-solid fa-arrow-left" onclick="goBack()" style="cursor: pointer;" title="Go Back"></i>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary save-btn" id="saveInventory">
                                    <span class="button-text">Save</span>
                                    <span class="spinner"><i class="fas fa-spinner fa-spin"></i></span>
                                </button>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-8">
                                <!-- Product Details -->
                                <div class="pd-20 card-box mb-30">
                                    <h5 class="mb-30">Product Details <i class="fa-solid fa-star-of-life" style="color: rgb(223, 0, 0); font-size: 6px;"></i></h5>
                                    <?php if (!empty($products)): ?>
                                        <?php $product = $products[0]; ?>
                                        <div class="form-group">
                                            <label for="product_title">Product</label>
                                            <input type="text" name="product_title" id="product_title" value="<?= esc($product['product_title']) ?>" class="form-control" readonly>
                                            <input type="hidden" name="product_id" value="<?= esc($product['product_id']) ?>">
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="sku">SKU</label>
                                                    <input type="text" id="sku" name="sku" class="form-control" value="<?= esc($product['sku']) ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="inner_barcode">Barcode</label>
                                                    <input type="text" id="inner_barcode" name="inner_barcode" value="<?= esc($product['barcode']) ?>" class="form-control" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="length">Length</label>
                                                    <input type="text" id="length" name="length" value="<?= esc($product['length']) ?>" class="form-control" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="height">Height</label>
                                                    <input type="text" id="height" name="height" value="<?= esc($product['height']) ?>" class="form-control" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="breadth">Breadth</label>
                                                    <input type="text" id="breadth" name="breadth" value="<?= esc($product['breadth']) ?>" class="form-control" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="expiration_date">Expiration Date</label>
                                                    <input type="date" id="expiration_date" name="expiration_date" class="form-control" value="<?= esc($product['expiry_date'] ?? '') ?>" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    <?php else: ?>
                                        <p>No product data available.</p>
                                    <?php endif; ?>
                                </div>

                                <!-- Inventory Conditions -->
                                <div class="pd-20 card-box mb-30">
                                    <h5 class="mb-30">Inventory Conditions</h5>
                                    <div class="clearfix row">
                                        <div class="pull-left col-md-4">
                                            <p class="text-blue">Select</p>
                                        </div>
                                        <div class="col-md-8 row">
                                            <div class="custom-control col custom-radio mb-5">
                                                <input type="radio" id="customRadio4" name="selectMethod" class="custom-control-input" value="automated" <?= isset($inventory['selectMethod']) && $inventory['selectMethod'] === 'automated' ? 'checked' : '' ?>>
                                                <label class="custom-control-label" for="customRadio4">Automated</label>
                                            </div>
                                            <div class="custom-control col custom-radio mb-5">
                                                <input type="radio" id="customRadio5" name="selectMethod" class="custom-control-input" value="manual" <?= !isset($inventory['selectMethod']) || (isset($inventory['selectMethod']) && $inventory['selectMethod'] === 'manual') ? 'checked' : '' ?>>
                                                <label class="custom-control-label" for="customRadio5">Manual</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Manual Stock Reduction Rules -->
                                <div class="pd-20 card-box mb-30" id="manual_section" style="display: block;">
                                    <h5 class="mb-30">Add Stock <i class="fa-solid fa-star-of-life" style="color: rgb(223, 0, 0); font-size: 8px;"></i></h5>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Warehouse Name</th>
                                                <th>Location</th>
                                                <th>Pincode</th>
                                                <th>Inventory Count</th>
                                                <th>Stock Reduction Priority</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($inventoryData as $data): ?>
                                                <tr>
                                                    <td>
                                                        <?= esc($data['warehouse_name']) ?>
                                                        <input type="hidden" name="warehouse_ids[]" value="<?= esc($data['warehouse_id']) ?>">
                                                    </td>
                                                    <td><?= esc($data['warehouse_location']) ?></td>
                                                    <td><?= esc($data['warehouse_pincode']) ?></td>
                                                    <td>
                                                        <input type="number" name="inventory_counts[]" class="form-control inventory-count" required min="0"
                                                            value="<?= esc($data['stock_quantity']) ?>" data-original-value="<?= esc($data['stock_quantity']) ?>">
                                                    </td>
                                                    <td>
                                                        <select name="stock_priorities[]" class="form-control stock-priority">
                                                            <option value="">No Priority</option>
                                                            <?php for ($i = 1; $i <= count($inventoryData); $i++): ?>
                                                                <option value="<?= $i ?>" <?= isset($data['stock_priority']) && $data['stock_priority'] == $i ? 'selected' : '' ?>>Priority <?= $i ?></option>
                                                            <?php endfor; ?>
                                                        </select>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                    <div class="mt-3">
                                        <small class="text-muted">
                                            <strong>Priority Rules:</strong> Lower numbers (e.g., Priority 1) are used first.
                                        </small>
                                    </div>
                                </div>

                                <!-- Automated Stock Reduction Rules -->
                                <div class="pd-20 card-box mb-30" id="automated_section" style="display: none;">
                                    <div class="d-flex justify-content-between mb-3">
                                        <h5>Automated Stock Reduction Rules</h5>
                                        <button type="button" class="btn btn-dark" id="addConditionBtn"><i class="fa-solid fa-plus"></i></button>
                                    </div>
                                    <div id="condition_builder">
                                        <!-- Dynamic rules will be added here -->
                                    </div>
                                    <table class="table table-bordered" id="warehouse_table">
                                        <thead>
                                            <tr>
                                                <th>Warehouse Name</th>
                                                <th>Location</th>
                                                <th>Pincode</th>
                                                <th>Inventory Count</th>
                                                <th>Stock Reduction Priority</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($inventoryData as $data): ?>
                                                <tr data-warehouse-id="<?= esc($data['warehouse_id']) ?>"
                                                    data-stock-quantity="<?= esc($data['stock_quantity']) ?>"
                                                    data-expiry-date="<?= esc($data['expiry_date'] ?? '') ?>"
                                                    data-batch-number="<?= esc($data['batch_number'] ?? '') ?>"
                                                    data-stock-reserved="<?= esc($data['stock_reserved'] ?? '0') ?>"
                                                    data-pincode="<?= esc($data['warehouse_pincode']) ?>">
                                                    <td>
                                                        <?= esc($data['warehouse_name']) ?>
                                                        <input type="hidden" name="warehouse_ids[]" value="<?= esc($data['warehouse_id']) ?>">
                                                    </td>
                                                    <td><?= esc($data['warehouse_location']) ?></td>
                                                    <td><?= esc($data['warehouse_pincode']) ?></td>
                                                    <td>
                                                        <input type="number" name="inventory_counts[]" class="form-control inventory-count" required min="0"
                                                            value="<?= esc($data['stock_quantity']) ?>" data-original-value="<?= esc($data['stock_quantity']) ?>">
                                                    </td>
                                                    <td>
                                                        <input type="number" name="stock_priorities[]" class="form-control stock-priority" readonly
                                                            value="<?= esc($data['stock_priority'] ?? '') ?>">
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                    <div class="mt-3">
                                        <small class="text-muted">
                                            <strong>Automated Rules:</strong> Priorities are set based on the selected rule.<br>
                                            <strong>Priority-Based:</strong> Sort by Expiry Date, Stock Quantity, Batch Number, or Stock Reserved.<br>
                                            <strong>Proximity-Based:</strong> Sort by pincode proximity, with fallback warehouse.<br>
                                            <strong>Stock-Level-Based:</strong> Sort by stock quantity (highest first).
                                        </small>
                                    </div>
                                </div>

                                <!-- Additional Product Details -->
                                <div class="pd-20 card-box mb-30">
                                    <h5 class="mb-30">Product Details</h5>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="supplier">Supplier</label>
                                                <input type="text" id="supplier" name="supplier" class="form-control"
                                                    value="<?= esc($inventory['supplier'] ?? '') ?>" placeholder="Supplier Name">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="supplier_item_code">Supplier Item Code</label>
                                                <input type="text" id="supplier_item_code" name="supplier_item_code"
                                                    class="form-control" value="<?= esc($inventory['supplier_item_code'] ?? '') ?>" placeholder="Supplier Item Code">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="base_unit">Base Unit of Measure</label>
                                                <input type="text" id="base_unit" name="base_unit" class="form-control"
                                                    value="<?= esc($inventory['base_unit'] ?? '') ?>" placeholder="e.g., kg, pieces">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="layer">Layer</label>
                                                <input type="number" id="layer" name="layer" class="form-control"
                                                    value="<?= esc($inventory['layer'] ?? '') ?>" placeholder="Number of Layers in Pallet">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="pallet">Pallet</label>
                                                <input type="number" id="pallet" name="pallet" class="form-control"
                                                    value="<?= esc($inventory['pallet'] ?? '') ?>" placeholder="Items in a Pallet">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="manufacturer">Manufacturer</label>
                                                <input type="text" id="manufacturer" name="manufacturer" class="form-control"
                                                    value="<?= esc($inventory['manufacturer'] ?? '') ?>" placeholder="Manufacturer Name">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="manufacturer_location">Location of Manufacturer</label>
                                                <input type="text" id="manufacturer_location" name="manufacturer_location"
                                                    class="form-control" value="<?= esc($inventory['manufacturer_location'] ?? '') ?>" placeholder="Manufacturer Location">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Lot and Batch Tracking -->
                                <div class="pd-20 card-box mb-30">
                                    <h5 class="mb-30">Lot and Batch Tracking</h5>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="batch_number">Batch Number</label>
                                                <input type="text" id="batch_number" name="batch_number" class="form-control"
                                                    value="<?= esc($inventory['batch_number'] ?? '') ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="lot_number">Lot Number</label>
                                                <input type="text" id="lot_number" name="lot_number" class="form-control"
                                                    value="<?= esc($inventory['lot_number'] ?? '') ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="manufacturing_date">Manufacturing Date <i class="fa-solid fa-star-of-life" style="color: rgb(223, 0, 0); font-size: 8px;"></i></label>
                                                <input type="date" id="manufacturing_date" name="manufacturing_date" class="form-control"
                                                    value="<?= esc($inventory['manufacturing_date'] ?? '') ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <!-- Inventory Levels -->
                                <div class="pd-20 card-box mb-30">
                                    <h5 class="mb-30">Inventory Levels <i class="fa-solid fa-star-of-life" style="color: rgb(223, 0, 0); font-size: 8px;"></i></h5>
                                    <div class="row">
                                        <div class="col-md">
                                            <div class="form-group">
                                                <label for="stock_quantity">Stock Quantity</label>
                                                <input type="number" id="stock_quantity" name="stock_quantity" class="form-control" readonly
                                                    value="<?= esc(array_sum(array_column($inventoryData, 'stock_quantity'))) ?>">
                                            </div>
                                        </div>
                                        <div class="col-md">
                                            <div class="form-group">
                                                <label for="reorder_level">Reorder Level</label>
                                                <input type="number" id="reorder_level" name="reorder_level" class="form-control" required
                                                    value="<?= esc($inventory['reorder_level'] ?? '') ?>">
                                            </div>
                                        </div>
                                        <div class="col-md">
                                            <div class="form-group">
                                                <label for="safety_stock">Reserved/Safety Stock</label>
                                                <input type="number" id="safety_stock" name="safety_stock" class="form-control" required
                                                    value="<?= esc($inventory['safety_stock'] ?? '') ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Inventory Policies -->
                                <div class="pd-20 card-box mb-30">
                                    <h5 class="mb-30">Inventory Policies <i class="fa-solid fa-star-of-life" style="color: rgb(223, 0, 0); font-size: 8px;"></i></h5>
                                    <div class="form-group">
                                        <label for="fifo_lifo">FIFO or LIFO</label>
                                        <select id="fifo_lifo" name="fifo_lifo" class="form-control">
                                            <option value="NA" <?= ($inventory['fifo_lifo'] ?? 'NA') === 'NA' ? 'selected' : '' ?>>None</option>
                                            <option value="FIFO" <?= ($inventory['fifo_lifo'] ?? '') === 'FIFO' ? 'selected' : '' ?>>FIFO (First-In, First-Out)</option>
                                            <option value="LIFO" <?= ($inventory['fifo_lifo'] ?? '') === 'LIFO' ? 'selected' : '' ?>>LIFO (Last-In, First-Out)</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                <?php endforeach; ?>

            </div>
        </div>
    </div>


    <!-- Footer View End -->
    <?= $this->include('footer_view') ?>
    <!-- Footer View End -->

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Save button effects
            function showSaveButton() {
                $('#saveInventory').addClass('visible');
            }

            function hideSaveButton() {
                $('#saveInventory').removeClass('visible');
            }

            $('.form-control').each(function() {
                $(this).data('original-value', $(this).val());
            });

            $('.form-control').on('click', function() {
                showSaveButton();
            });

            $('.form-control').on('input', function() {
                let originalValue = $(this).data('original-value');
                let currentValue = $(this).val();
                $(this).toggleClass('changed', originalValue !== currentValue);
                showSaveButton();
            });

            $('.form-control').on('blur', function() {
                let originalValue = $(this).data('original-value');
                let currentValue = $(this).val();
                if (originalValue === currentValue) {
                    $(this).removeClass('changed');
                }
            });

            // Form submission
            $('#addInventoryForm').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    url: $(this).attr('action'),
                    type: 'POST',
                    data: $(this).serialize(),
                    beforeSend: function() {
                        $('#saveInventory').addClass('saving').prop('disabled', true);
                        $('#saveInventory .button-text').hide();
                        $('#saveInventory .spinner').show();
                    },
                    success: function(response) {
                        if (response.status === 'success') {
                            $('#saveInventory').addClass('success').removeClass('saving');
                            $('#saveInventory .button-text').text('Saved!').show();
                            $('#saveInventory .spinner').hide();
                            setTimeout(function() {
                                hideSaveButton();
                                $('#saveInventory').removeClass('success').prop('disabled', false);
                                $('#saveInventory .button-text').text('Save');
                                alert('Inventory updated successfully!');
                                window.location.href = '<?= base_url('inventory') ?>';
                            }, 1000);
                        } else {
                            $('#saveInventory').removeClass('saving').prop('disabled', false);
                            $('#saveInventory .button-text').show();
                            $('#saveInventory .spinner').hide();
                            alert('Error: ' + (response.message || 'Update failed'));
                        }
                    },
                    error: function(xhr) {
                        $('#saveInventory').removeClass('saving').prop('disabled', false);
                        $('#saveInventory .button-text').show();
                        $('#saveInventory .spinner').hide();
                        alert('An error occurred: ' + xhr.responseText);
                    }
                });
            });

            // Toggle sections
            const automatedSection = document.getElementById('automated_section');
            const manualSection = document.getElementById('manual_section');
            const selectMethodRadios = document.querySelectorAll('input[name="selectMethod"]');

            selectMethodRadios.forEach(radio => {
                radio.addEventListener('change', function() {
                    automatedSection.style.display = this.value === 'automated' ? 'block' : 'none';
                    manualSection.style.display = this.value === 'manual' ? 'block' : 'none';
                    if (this.value === 'automated') {
                        updatePriorities();
                    }
                    calculateTotalStock();
                });
            });

            const selectedMethod = document.querySelector('input[name="selectMethod"]:checked')?.value || 'manual';
            automatedSection.style.display = selectedMethod === 'automated' ? 'block' : 'none';
            manualSection.style.display = selectedMethod === 'manual' ? 'block' : 'none';

            // Stock quantity calculation
            function calculateTotalStock() {
                let total = 0;
                const activeSection = document.querySelector('input[name="selectMethod"]:checked').value === 'automated' ? '#automated_section' : '#manual_section';
                const inventoryCounts = document.querySelectorAll(`${activeSection} .inventory-count`);
                inventoryCounts.forEach(function(input) {
                    const value = parseInt(input.value) || 0;
                    total += value;
                    input.closest('tr').dataset.stockQuantity = value;
                });
                const stockQuantityInput = document.getElementById('stock_quantity');
                if (stockQuantityInput) {
                    stockQuantityInput.value = total;
                }
            }

            document.querySelectorAll('.inventory-count').forEach(function(input) {
                input.addEventListener('input', function() {
                    calculateTotalStock();
                    if (document.querySelector('input[name="selectMethod"]:checked').value === 'automated') {
                        updatePriorities();
                    }
                });
            });

            calculateTotalStock();

            // Manual section: Ensure unique priorities
            document.querySelectorAll('#manual_section .stock-priority').forEach(function(select) {
                select.addEventListener('change', function() {
                    const selectedValues = Array.from(document.querySelectorAll('#manual_section .stock-priority'))
                        .map(s => s.value)
                        .filter(v => v && v !== '');
                    const currentValue = this.value;
                    if (currentValue && selectedValues.filter(v => v === currentValue).length > 1) {
                        alert('Each priority can only be selected once.');
                        this.value = '';
                    }
                    showSaveButton();
                });
            });

            // Automated section: Dynamic rule-based stock reduction
            const conditionBuilder = document.getElementById('condition_builder');
            let conditionIndex = 0;

            function addConditionRow(ruleType = 'priority', fallbackId = '', option = '', customDate = '') {
                const newRow = document.createElement('div');
                newRow.className = 'form-group mb-3 condition-row';
                newRow.dataset.index = conditionIndex;
                newRow.innerHTML = `
                    <div class="mb-2">
                        <label>Stock Reduction Rule Type</label>
                        <select name="conditions[${conditionIndex}][rule_type]" class="form-control condition-rule-type">
                            <option value="priority" ${ruleType === 'priority' ? 'selected' : ''}>Priority-Based</option>
                            <option value="proximity" ${ruleType === 'proximity' ? 'selected' : ''}>Proximity-Based</option>
                            <option value="stock_level" ${ruleType === 'stock_level' ? 'selected' : ''}>Stock-Level-Based</option>
                        </select>
                    </div>
                    <div class="fallback-warehouse mb-2" style="display: ${ruleType === 'proximity' ? 'block' : 'none'};">
                        <label>Fallback Warehouse</label>
                        <select name="conditions[${conditionIndex}][fallback_warehouse_id]" class="form-control condition-fallback">
                            <option value="">Select a Fallback Warehouse</option>
                            ${Array.from(document.querySelectorAll('#warehouse_table tbody tr')).map(tr => {
                                const id = tr.dataset.warehouseId;
                                const name = tr.querySelector('td:first-child').textContent.trim();
                                const pincode = tr.dataset.pincode;
                                return `<option value="${id}" ${fallbackId === id ? 'selected' : ''}>${name} (${pincode})</option>`;
                            }).join('')}
                        </select>
                    </div>
                    <div class="priority-options" style="display: ${ruleType === 'priority' ? 'block' : 'none'};">
                        <div class="row align-items-center">
                            <div class="col-md-10">
                                <label>Priority Option</label>
                                <select name="conditions[${conditionIndex}][option]" class="form-control condition-option">
                                    <option value="" disabled ${!option ? 'selected' : ''}>Select Option</option>
                                    <optgroup label="Stock Quantity">
                                        <option value="stock_quantity_high_to_low" ${option === 'stock_quantity_high_to_low' ? 'selected' : ''}>Stock Quantity (High to Low)</option>
                                        <option value="stock_quantity_low_to_high" ${option === 'stock_quantity_low_to_high' ? 'selected' : ''}>Stock Quantity (Low to High)</option>
                                    </optgroup>
                                    <optgroup label="Expiry Date">
                                        <option value="expiry_date_30_days" ${option === 'expiry_date_30_days' ? 'selected' : ''}>Within 30 Days</option>
                                        <option value="expiry_date_3_months" ${option === 'expiry_date_3_months' ? 'selected' : ''}>Within 3 Months</option>
                                        <option value="expiry_date_6_months" ${option === 'expiry_date_6_months' ? 'selected' : ''}>Within 6 Months</option>
                                        <option value="expiry_date_9_months" ${option === 'expiry_date_9_months' ? 'selected' : ''}>Within 9 Months</option>
                                        <option value="expiry_date_12_months" ${option === 'expiry_date_12_months' ? 'selected' : ''}>Within 12 Months</option>
                                        <option value="expiry_date_custom" ${option === 'expiry_date_custom' ? 'selected' : ''}>Custom</option>
                                    </optgroup>
                                    <optgroup label="Stock Reserved">
                                        <option value="stock_reserved" ${option === 'stock_reserved' ? 'selected' : ''}>Prioritize Reserved Stock</option>
                                    </optgroup>
                                    <optgroup label="Batch Number">
                                        <option value="batch_number" ${option === 'batch_number' ? 'selected' : ''}>Batch Number (Ascending)</option>
                                    </optgroup>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-light remove-condition"><i class="fa-solid fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="custom-date mt-2" style="display: ${option === 'expiry_date_custom' ? 'block' : 'none'};">
                            <label>Custom Expiry Date</label>
                            <input type="date" name="conditions[${conditionIndex}][custom_date]" class="form-control custom-date-input"
                                value="${customDate}">
                        </div>
                    </div>
                `;
                conditionBuilder.appendChild(newRow);
                conditionIndex++;
            }

            document.getElementById('addConditionBtn').addEventListener('click', function() {
                addConditionRow();
                showSaveButton();
                updatePriorities();
            });

            conditionBuilder.addEventListener('click', function(e) {
                if (e.target.closest('.remove-condition')) {
                    e.target.closest('.condition-row').remove();
                    showSaveButton();
                    updatePriorities();
                }
            });

            conditionBuilder.addEventListener('change', function(e) {
                const row = e.target.closest('.condition-row');
                if (!row) return;

                if (e.target.classList.contains('condition-rule-type')) {
                    const ruleType = e.target.value;
                    row.querySelector('.fallback-warehouse').style.display = ruleType === 'proximity' ? 'block' : 'none';
                    row.querySelector('.priority-options').style.display = ruleType === 'priority' ? 'block' : 'none';
                    if (ruleType !== 'priority') {
                        row.querySelector('.condition-option').value = '';
                        row.querySelector('.custom-date').style.display = 'none';
                    }
                    showSaveButton();
                    updatePriorities();
                }

                if (e.target.classList.contains('condition-option')) {
                    const option = e.target.value;
                    const customDateDiv = row.querySelector('.custom-date');
                    customDateDiv.style.display = option === 'expiry_date_custom' ? 'block' : 'none';

                    // Validate Stock Reserved
                    if (option === 'stock_reserved') {
                        const safetyStock = document.getElementById('safety_stock').value;
                        if (!safetyStock || parseFloat(safetyStock) <= 0) {
                            alert('Please add a value to Reserved/Safety Stock before selecting this option.');
                            e.target.value = '';
                            showSaveButton();
                            updatePriorities();
                            return;
                        }
                    }

                    // Validate unique options
                    const selectedOptions = Array.from(document.querySelectorAll('.condition-option')).map(select => select.value);
                    if (option && selectedOptions.filter(o => o === option).length > 1) {
                        alert('Each option can only be selected once.');
                        e.target.value = '';
                        customDateDiv.style.display = 'none';
                    }

                    showSaveButton();
                    updatePriorities();
                }

                if (e.target.classList.contains('custom-date-input')) {
                    showSaveButton();
                    updatePriorities();
                }
            });

            function updatePriorities() {
                const rules = Array.from(document.querySelectorAll('.condition-row')).map(row => ({
                    ruleType: row.querySelector('.condition-rule-type').value,
                    fallbackWarehouseId: row.querySelector('.condition-fallback')?.value || '',
                    option: row.querySelector('.condition-option')?.value || '',
                    customDate: row.querySelector('.custom-date-input')?.value || ''
                })).filter(rule => rule.ruleType);

                const warehouses = Array.from(document.querySelectorAll('#warehouse_table tbody tr')).map(tr => ({
                    warehouseId: tr.dataset.warehouseId,
                    stockQuantity: parseFloat(tr.dataset.stockQuantity) || 0,
                    expiryDate: tr.dataset.expiryDate || '9999-12-31',
                    batchNumber: tr.dataset.batchNumber || '',
                    stockReserved: parseFloat(tr.dataset.stockReserved) || 0,
                    pincode: tr.dataset.pincode || '',
                    element: tr
                }));

                if (warehouses.length === 0) {
                    return;
                }

                // Reset priorities
                warehouses.forEach(w => {
                    w.element.querySelector('.stock-priority').value = '';
                });

                if (rules.length === 0) {
                    return;
                }

                // Current date for expiry calculations
                const today = new Date('2025-04-16');

                // Apply rules sequentially
                rules.forEach((rule, ruleIndex) => {
                    let sortedWarehouses = [...warehouses];

                    if (rule.ruleType === 'stock_level') {
                        sortedWarehouses.sort((a, b) => b.stockQuantity - a.stockQuantity); // High to low
                    } else if (rule.ruleType === 'proximity') {
                        sortedWarehouses.sort((a, b) => {
                            if (a.warehouseId === rule.fallbackWarehouseId) return -1;
                            if (b.warehouseId === rule.fallbackWarehouseId) return 1;
                            return a.pincode.localeCompare(b.pincode);
                        });
                    } else if (rule.ruleType === 'priority' && rule.option) {
                        if (rule.option.startsWith('stock_quantity')) {
                            const isHighToLow = rule.option === 'stock_quantity_high_to_low';
                            sortedWarehouses.sort((a, b) => {
                                const aValue = parseFloat(a.stockQuantity) || 0;
                                const bValue = parseFloat(b.stockQuantity) || 0;
                                return isHighToLow ? bValue - aValue : aValue - bValue;
                            });
                        } else if (rule.option.startsWith('expiry_date')) {
                            let thresholdDate;
                            if (rule.option === 'expiry_date_30_days') {
                                thresholdDate = new Date(today);
                                thresholdDate.setDate(today.getDate() + 30);
                            } else if (rule.option === 'expiry_date_3_months') {
                                thresholdDate = new Date(today);
                                thresholdDate.setMonth(today.getMonth() + 3);
                            } else if (rule.option === 'expiry_date_6_months') {
                                thresholdDate = new Date(today);
                                thresholdDate.setMonth(today.getMonth() + 6);
                            } else if (rule.option === 'expiry_date_9_months') {
                                thresholdDate = new Date(today);
                                thresholdDate.setMonth(today.getMonth() + 9);
                            } else if (rule.option === 'expiry_date_12_months') {
                                thresholdDate = new Date(today);
                                thresholdDate.setMonth(today.getMonth() + 12);
                            } else if (rule.option === 'expiry_date_custom' && rule.customDate) {
                                thresholdDate = new Date(rule.customDate);
                            } else {
                                return; // Skip invalid expiry rule
                            }

                            sortedWarehouses.sort((a, b) => {
                                const aDate = new Date(a.expiryDate).getTime();
                                const bDate = new Date(b.expiryDate).getTime();
                                const thresholdTime = thresholdDate.getTime();
                                // Prioritize within threshold, then by date
                                const aWithin = aDate <= thresholdTime ? -1 : 1;
                                const bWithin = bDate <= thresholdTime ? -1 : 1;
                                if (aWithin !== bWithin) return aWithin - bWithin;
                                return aDate - bDate;
                            });
                        } else if (rule.option === 'stock_reserved') {
                            sortedWarehouses.sort((a, b) => {
                                const aValue = parseFloat(a.stockReserved) || 0;
                                const bValue = parseFloat(b.stockReserved) || 0;
                                if (aValue > 0 && bValue > 0) return bValue - aValue;
                                if (aValue > 0) return -1;
                                if (bValue > 0) return 1;
                                return b.stockQuantity - a.stockQuantity; // Fallback to regular stock
                            });
                        } else if (rule.option === 'batch_number') {
                            sortedWarehouses.sort((a, b) => a.batchNumber.localeCompare(b.batchNumber));
                        }
                    }

                    // Assign priorities
                    sortedWarehouses.forEach((warehouse, index) => {
                        const priorityInput = warehouse.element.querySelector('.stock-priority');
                        if (!priorityInput.value) {
                            priorityInput.value = (ruleIndex * warehouses.length + index + 1);
                        }
                    });
                });
            }

            // Load saved conditions
            const savedConditions = <?= json_encode($inventory['conditions'] ?? []) ?>;
            savedConditions.forEach(condition => {
                addConditionRow(
                    condition.rule_type || 'priority',
                    condition.fallback_warehouse_id || '',
                    condition.option || '',
                    condition.custom_date || ''
                );
            });
            if (savedConditions.length === 0 && selectedMethod === 'automated') {
                addConditionRow();
            }

            // Trigger initial updates
            if (selectedMethod === 'automated') {
                updatePriorities();
            }
            calculateTotalStock();
        });
    </script>

</body>

</html>