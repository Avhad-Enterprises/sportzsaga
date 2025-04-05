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

                <!-- Inventory Form -->
                <form id="addInventoryForm" method="post" action="<?= base_url('inventory/store') ?>">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <div class="">
                            <i class="fa-solid fa-arrow-left" onclick="goBack()"></i>
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-8">
                            <div class="pd-20 card-box mb-30">
                                <h5 class="mb-30">Select Product <i class="fa-solid fa-star-of-life" style="color:rgb(223 0 0); font-size: 8px;"></i></h5>
                                <div class="form-group">
                                    <select id="product_id" name="product_id" class="form-control" required>
                                        <option value="">Select Product</option>
                                        <?php foreach ($products as $product): ?>
                                            <option value="<?= $product['product_id'] ?>">
                                                <?= $product['product_title'] ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="sku">SKU</label>
                                            <input type="text" id="sku" name="sku" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="inner_barcode">Barcode</label>
                                            <input type="text" id="inner_barcode" name="inner_barcode" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="length">Length</label>
                                            <input type="text" id="length" name="length" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="height">Height</label>
                                            <input type="text" id="height" name="height" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="breadth">Breadth</label>
                                            <input type="text" id="breadth" name="breadth" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="brand_name">Brand Name</label>
                                            <input type="text" id="brand_name" name="brand_name" class="form-control"
                                                placeholder="Brand Name" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="pd-20 card-box mb-30">
                                <h5 class="mb-30">Add Stock <i class="fa-solid fa-star-of-life" style="color:rgb(223 0 0); font-size: 8px;"></i></h5>

                                <!-- Rule Type Selection -->
                                <div class="form-group mb-3">
                                    <label for="stock_reduction_rule">Stock Reduction Rule Type</label>
                                    <select name="stock_reduction_rule" id="stock_reduction_rule" class="form-control" required>
                                        <option value="priority">Priority-Based (Use warehouse priority order)</option>
                                        <option value="proximity">Proximity-Based (Closest to customer pincode)</option>
                                        <option value="stock_level">Stock-Level-Based (Highest stock first)</option>
                                        <option value="hybrid">Hybrid (Proximity if stock > threshold, then priority)</option>
                                    </select>
                                    <small class="text-muted">Choose how stock should be reduced across warehouses.</small>
                                </div>

                                <!-- Hybrid Rule Threshold (Hidden unless Hybrid is selected) -->
                                <div id="hybrid_threshold" class="form-group mb-3" style="display: none;">
                                    <label for="stock_threshold">Stock Threshold for Proximity (Hybrid Rule)</label>
                                    <input type="number" name="stock_threshold" id="stock_threshold" class="form-control" min="0" value="50">
                                    <small class="text-muted">Minimum stock required in the closest warehouse to use proximity rule (e.g., 50 units).</small>
                                </div>

                                <!-- Fallback Warehouse (Hidden unless Proximity or Hybrid is selected) -->
                                <div id="fallback_warehouse" class="form-group mb-3" style="display: none;">
                                    <label for="fallback_warehouse_id">Fallback Warehouse (For UnsServiceable Pincodes)</label>
                                    <select name="fallback_warehouse_id" id="fallback_warehouse_id" class="form-control">
                                        <option value="">Select a Fallback Warehouse</option>
                                        <?php foreach ($warehouses as $warehouse): ?>
                                            <option value="<?= esc($warehouse['id']) ?>"><?= esc($warehouse['name']) ?> (<?= esc($warehouse['pincode']) ?>)</option>
                                        <?php endforeach; ?>
                                    </select>
                                    <small class="text-muted">Choose a warehouse to use if the customer’s pincode isn’t serviceable (required for Proximity and Hybrid rules).</small>
                                </div>

                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Warehouse Name</th>
                                            <th>Location</th>
                                            <th>Pincode</th>
                                            <th>Inventory Count</th>
                                            <th id="priority_header" style="display: none;">Stock Reduction Priority</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $warehouseCount = count($warehouses);
                                        foreach ($warehouses as $warehouse): ?>
                                            <tr>
                                                <td>
                                                    <?= esc($warehouse['name']) ?>
                                                    <input type="hidden" name="warehouse_ids[]" value="<?= esc($warehouse['id']) ?>">
                                                </td>
                                                <td><?= esc($warehouse['location']) ?></td>
                                                <td><?= esc($warehouse['pincode']) ?></td>
                                                <td>
                                                    <input type="number" name="inventory_counts[]" class="form-control inventory-count" required min="0">
                                                </td>
                                                <td class="priority_cell" style="display: none;">
                                                    <select name="stock_priorities[]" class="form-control stock-priority">
                                                        <option value="">No Priority</option>
                                                        <?php for ($i = 1; $i <= $warehouseCount; $i++): ?>
                                                            <option value="<?= $i ?>">Priority <?= $i ?></option>
                                                        <?php endfor; ?>
                                                    </select>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <div class="mt-3">
                                    <small class="text-muted">
                                        <strong>Priority Rules:</strong> Lower numbers (e.g., Priority 1) are used first. Shown only for Priority-Based and Hybrid rules (max <?= $warehouseCount ?> priorities).
                                        <br><strong>Proximity Rules:</strong> Uses warehouse pincode and customer pincode from order. Falls back to selected warehouse if pincode isn’t serviceable.
                                        <br><strong>Stock-Level Rules:</strong> Reduces from warehouse with highest stock first.
                                        <br><strong>Hybrid Rules:</strong> Uses proximity if stock exceeds threshold; otherwise, falls back to priority. Uses selected fallback warehouse if pincode isn’t serviceable.
                                    </small>
                                </div>
                            </div>

                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    const ruleSelect = document.getElementById('stock_reduction_rule');
                                    const hybridThreshold = document.getElementById('hybrid_threshold');
                                    const fallbackWarehouse = document.getElementById('fallback_warehouse');
                                    const priorityHeader = document.getElementById('priority_header');
                                    const priorityCells = document.querySelectorAll('.priority_cell');
                                    const priorities = document.querySelectorAll('.stock-priority');

                                    // Function to toggle UI elements based on rule
                                    function toggleRuleElements() {
                                        const rule = ruleSelect.value;
                                        const showPriority = rule === 'priority' || rule === 'hybrid';
                                        const showFallback = rule === 'proximity' || rule === 'hybrid';

                                        hybridThreshold.style.display = rule === 'hybrid' ? 'block' : 'none';
                                        priorityHeader.style.display = showPriority ? '' : 'none';
                                        priorityCells.forEach(cell => cell.style.display = showPriority ? '' : 'none');
                                        fallbackWarehouse.style.display = showFallback ? 'block' : 'none';

                                        // Reset priorities to "No Priority" when hidden
                                        if (!showPriority) {
                                            priorities.forEach(select => select.value = '');
                                        }
                                    }

                                    // Initial toggle
                                    toggleRuleElements();

                                    // Update on rule change
                                    ruleSelect.addEventListener('change', function() {
                                        toggleRuleElements();
                                    });

                                    // Validate unique priorities (for Priority-Based and Hybrid)
                                    priorities.forEach(select => {
                                        select.addEventListener('change', function() {
                                            const selectedValue = this.value;
                                            if (selectedValue !== '' && ['priority', 'hybrid'].includes(ruleSelect.value)) {
                                                priorities.forEach(otherSelect => {
                                                    if (otherSelect !== this && otherSelect.value === selectedValue) {
                                                        alert('Each warehouse must have a unique priority or "No Priority" for Priority-Based or Hybrid rules.');
                                                        this.value = '';
                                                    }
                                                });
                                            }
                                        });
                                    });
                                });
                            </script>

                            <div class="pd-20 card-box mb-30">
                                <h5 class="mb-30">Product Details</h5>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="supplier">Supplier</label>
                                            <input type="text" id="supplier" name="supplier" class="form-control"
                                                placeholder="Supplier Name">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="supplier_item_code">Supplier Item Code</label>
                                            <input type="text" id="supplier_item_code" name="supplier_item_code"
                                                class="form-control" placeholder="Supplier Item Code">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="base_unit">Base Unit of Measure</label>
                                            <input type="text" id="base_unit" name="base_unit" class="form-control"
                                                placeholder="Base Unit (e.g., kg, pieces)">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="layer">Layer</label>
                                            <input type="number" id="layer" name="layer" class="form-control"
                                                placeholder="Number of Layers in Pallet">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="pallet">Pallet</label>
                                            <input type="number" id="pallet" name="pallet" class="form-control"
                                                placeholder="Items in a Pallet">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="manufacturer">Manufacturer</label>
                                            <input type="text" id="manufacturer" name="manufacturer" class="form-control"
                                                placeholder="Manufacturer Name">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="manufacturer_location">Location of Manufacturer</label>
                                            <input type="text" id="manufacturer_location" name="manufacturer_location"
                                                class="form-control" placeholder="Manufacturer Location" >
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="pd-20 card-box mb-30">
                                <h5 class="mb-30">Pricing and Valuation</h5>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="single_unit_price">Single Unit Price</label>
                                            <input type="number" id="single_unit_price" name="single_unit_price" class="form-control"
                                                >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="case_price">Case Price</label>
                                            <input type="number" id="case_price" name="case_price" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="compare_at_price">Compare-at Price</label>
                                            <input type="number" id="compare_at_price" name="compare_at_price" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="pd-20 card-box mb-30">
                                <h5 class="mb-30">Lot and Batch Tracking</h5>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="batch_number">Batch Number</label>
                                            <input type="text" id="batch_number" name="batch_number" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="lot_number">Lot Number</label>
                                            <input type="text" id="lot_number" name="lot_number" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="manufacturing_date">Manufacturing Date <i class="fa-solid fa-star-of-life" style="color:rgb(223 0 0); font-size: 8px;"></i></label>
                                            <input type="date" id="manufacturing_date" name="manufacturing_date" class="form-control"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="expiration_date">Expiration Date <i class="fa-solid fa-star-of-life" style="color:rgb(223 0 0); font-size: 8px;"></i></label>
                                            <input type="date" id="expiration_date" name="expiration_date" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-4">
                            <div class="pd-20 card-box mb-30">
                                <h5 class="mb-30">Inventory Levels <i class="fa-solid fa-star-of-life" style="color:rgb(223 0 0); font-size: 8px;"></i></h5>
                                <div class="row">
                                    <div class="col-md">
                                        <div class="form-group">
                                            <label for="stock_quantity">Stock Quantity</label>
                                            <input type="number" id="stock_quantity" name="stock_quantity" class="form-control" readonly required>
                                        </div>
                                    </div>
                                    <div class="col-md">
                                        <div class="form-group">
                                            <label for="reorder_level">Reorder Level</label>
                                            <input type="number" id="reorder_level" name="reorder_level" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md">
                                        <div class="form-group">
                                            <label for="safety_stock">Safety Stock</label>
                                            <input type="number" id="safety_stock" name="safety_stock" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pd-20 card-box mb-30">
                                <h5 class="mb-30">Inventory Policies <i class="fa-solid fa-star-of-life" style="color:rgb(223 0 0); font-size: 8px;"></i></h5>
                                <div class="form-group">
                                    <label for="fifo_lifo">FIFO or LIFO</label>
                                    <select id="fifo_lifo" name="fifo_lifo" class="form-control">
                                        <option selected>Select Method</option>
                                        <option value="NA">None</option>
                                        <option value="FIFO">FIFO (First-In, First-Out)</option>
                                        <option value="LIFO">LIFO (Last-In, First-Out)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="pd-20 card-box mb-30">
                                <h5 class="mb-30">Compliance and Taxation</h5>
                                <div class="form-group">
                                    <label for="vat_gst">GST Details</label>
                                    <input type="text" id="vat_gst" name="vat_gst" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="state_gst">State-Wise GST</label>
                                    <input type="text" id="state_gst" name="state_gst" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="custom_duty">Customs Duty</label>
                                    <input type="text" id="custom_duty" name="custom_duty" class="form-control">
                                </div>
                            </div>
                            <div class="pd-20 card-box mb-30">
                                <h5 class="mb-30">Custom Attributes <i class="fa-solid fa-star-of-life" style="color:rgb(223 0 0); font-size: 8px;"></i></h5>
                                <div class="form-group">
                                    <label for="custom_labels">Custom Labels</label>
                                    <input type="text" id="custom_labels" name="custom_labels" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <?= $this->include('footer_view') ?>
    <script>
        function goBack() {
            window.history.back();
        }

        // Fetch product details via AJAX
        document.getElementById('product_id').addEventListener('change', function() {
            const productId = this.value;

            if (productId) {
                fetch(`<?= base_url('inventory/productDetails') ?>/${productId}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data) {
                            document.getElementById('sku').value = data.sku;
                            document.getElementById('inner_barcode').value = data.inner_barcode;
                            document.getElementById('length').value = data.length;
                            document.getElementById('height').value = data.height;
                            document.getElementById('breadth').value = data.breadth;
                        }
                    })
                    .catch(error => console.error('Error fetching product details:', error));
            } else {
                document.getElementById('sku').value = '';
                document.getElementById('inner_barcode').value = '';
                document.getElementById('length').value = '';
                document.getElementById('height').value = '';
                document.getElementById('breadth').value = '';
            }
        });
    </script>

    <script>
        function calculateTotalStock() {
            let total = 0;
            const inventoryCounts = document.querySelectorAll('.inventory-count');

            inventoryCounts.forEach(function(input) {
                const value = parseInt(input.value) || 0;
                total += value;
            });

            document.getElementById('stock_quantity').value = total;
        }

        document.querySelectorAll('.inventory-count').forEach(function(input) {
            input.addEventListener('input', calculateTotalStock);
        });

        calculateTotalStock();
    </script>

    <!-- Add Product Modal
    <div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="addProductModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addProductModalLabel">Add New Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addProductForm">
                        <div class="form-group">
                            <label for="product_title">Product Title</label>
                            <input type="text" id="product_title" name="product_title" class="form-control" required>
                        </div>
                        <div class="text-right">
                            <button type="button" class="btn btn-primary" id="saveProductButton">Save Product</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const saveProductButton = document.getElementById('saveProductButton');
            if (saveProductButton) {
                saveProductButton.addEventListener('click', function() {
                    const formElement = document.getElementById('addProductForm');
                    if (!formElement) {
                        console.error('Form element with ID "addProductForm" not found.');
                        return;
                    }

                    const formData = new FormData(formElement);

                    fetch('<?= base_url('product/storenewproduct') ?>', {
                            method: 'POST',
                            body: formData,
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                const productDropdown = document.getElementById('product_id');
                                const newOption = document.createElement('option');
                                newOption.value = data.product.product_id;
                                newOption.text = data.product.product_title;
                                productDropdown.appendChild(newOption);
                                productDropdown.value = data.product.product_id;
                                $('#addProductModal').modal('hide');
                                formElement.reset();
                            } else {
                                alert('Error adding product: ' + data.message);
                            }
                        })
                        .catch(error => console.error('Error:', error));
                });
            }
        });
    </script>-->

</body>

</html>