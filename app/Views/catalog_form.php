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

    <!-- Main Content Start -->
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="clearfix mb-3">
                    <div class="pull-left d-flex align-items-center">
                        <button type="button" class="btn btn-secondary mr-3" onclick="goBack()">
                            <i class="fa fa-arrow-left"></i>
                        </button>
                        <h4 class="h4 mb-0">Add New Catalog</h4>
                    </div>
                </div>

                <div class="pd-20 card-box mb-30">
                    <form id="addcatalogForm" method="post" action="<?= base_url('catalog/store') ?>"
                        enctype="multipart/form-data">

                        <!-- Catalog Name -->
                        <div class="form-group">
                            <label for="catalog_name">Catalog Name</label>
                            <input class="form-control" id="catalog_name" name="catalog_name" type="text"
                                placeholder="Enter catalog name" value="<?= old('catalog_name') ?>" required>
                            <div class="text-danger mt-1" id="catalog_name_error"></div>
                        </div>

                        <!-- Overall Adjustment -->
                        <div class="form-group">
                            <label for="overall_adjustment">Overall Adjustment</label>
                            <select name="overall_adjustment" class="form-control" id="overall_adjustment" required>
                                <option value="">Select Adjustment</option>
                                <option value="increase" <?= old('overall_adjustment') === 'increase' ? 'selected' : '' ?>>
                                    Increase</option>
                                <option value="decrease" <?= old('overall_adjustment') === 'decrease' ? 'selected' : '' ?>>
                                    Decrease</option>
                            </select>
                        </div>

                        <!-- Discount Type -->
                        <div class="form-group">
                            <label id="discount_type_label" for="discount_type">Discount Type</label>
                            <select name="discount_type" class="form-control" id="discount_type" required>
                                <option value="percent" <?= old('discount_type') === 'percent' ? 'selected' : '' ?>>
                                    Percentage</option>
                                <option value="value" <?= old('discount_type') === 'value' ? 'selected' : '' ?>>Value
                                </option>
                            </select>
                        </div>

                        <!-- Discount Value -->
                        <div class="form-group">
                            <label id="discount_value_label" for="discount_value">Discount Value</label>
                            <input type="number" id="discount_value" name="discount_value" class="form-control"
                                placeholder="Enter discount value" value="<?= old('discount_value') ?>" required>
                            <div class="text-danger mt-1" id="discount_value_error"></div>
                        </div>

                        <!-- Quantity Rules and Pricing Table Section -->
                        <div class="form-group">
                            <label>Product Rules and Pricing</label>
                            <table class="table table-bordered" id="productRulesTable">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Increment</th>
                                        <th>Minimum</th>
                                        <th>Maximum</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <select class="form-control select2 product-select"
                                                name="product_rules[0][product_id]" required>
                                                <option value="">Select Product</option>
                                                <?php foreach ($products as $product): ?>
                                                    <option value="<?= $product['product_id']; ?>"
                                                        data-price="<?= $product['cost_price']; ?>"
                                                        data-selling-price="<?= $product['selling_price']; ?>">
                                                        <?= $product['product_title']; ?> - Cost:
                                                        <?= $product['cost_price']; ?>,
                                                        Selling: <?= $product['selling_price']; ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="number" name="product_rules[0][increment]" class="form-control"
                                                placeholder="Increment" required>
                                        </td>
                                        <td>
                                            <input type="number" name="product_rules[0][minimum]" class="form-control"
                                                placeholder="Minimum" required>
                                        </td>
                                        <td>
                                            <input type="number" name="product_rules[0][maximum]" class="form-control"
                                                placeholder="Maximum" required>
                                        </td>
                                        <td>
                                            <input type="number" name="product_rules[0][quantity]" class="form-control"
                                                placeholder="Quantity" required>
                                        </td>
                                        <td>
                                            <input type="number" step="0.01" name="product_rules[0][price]"
                                                class="form-control" placeholder="Price (£)" required>
                                        </td>
                                        <td>
                                            <button type="button"
                                                class="btn btn-danger remove-product-row">Delete</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <button type="button" id="addProductRuleRow" class="btn btn-primary">Add Product
                                Rule</button>
                        </div>

                        <!-- Status -->
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control" required>
                                <option value="active" <?= old('status') === 'active' ? 'selected' : '' ?>>Active</option>
                                <option value="inactive" <?= old('status') === 'inactive' ? 'selected' : '' ?>>Inactive
                                </option>
                            </select>
                        </div>

                        <!-- Publish For -->
                        <div class="form-group">
                            <label for="publish_for">Publish For</label>
                            <select name="publish_for[]" id="publish_for" class="form-control select2" multiple>
                                <?php foreach ($users as $user): ?>
                                    <option value="<?= $user['user_id']; ?>"><?= $user['name']; ?> (<?= $user['email']; ?>)
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <div id="user-error" class="text-danger mt-2"></div> <!-- Error message display -->
                        </div>

                        <!-- Select Company -->
                        <div class="form-group">
                            <label for="select_company">Select Company</label>
                            <select name="select_company[]" id="select_company" class="form-control select2" multiple>
                                <option value="">Select Company</option>
                                <?php foreach ($companies as $company): ?>
                                    <option value="<?= $company['id']; ?>"><?= $company['company_name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <!-- Select Customer Segment -->
                        <div class="form-group">
                            <label for="select_customer_segment">Select Customer Segment</label>
                            <select name="select_customer_segment[]" id="select_customer_segment"
                                class="form-control select2" multiple>
                                <option value="">Select Customer Segment</option>
                                <?php foreach ($customer_segments as $segment): ?>
                                    <option value="<?= $segment['segment_id']; ?>"><?= $segment['segment_name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <!-- Selling Price -->
                        <div class="form-group">
                            <label for="selling_price">Selling Price</label>
                            <input type="text" id="selling_price" name="selling_price" class="form-control"
                                placeholder="Calculated automatically" readonly>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg">Save Catalog</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- Main Content End -->

    <!-- Footer View Start -->
    <?= $this->include('footer_view') ?>
    <!-- Footer View End -->


    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const overallAdjustmentSelect = document.getElementById('overall_adjustment');
            const discountTypeSelect = document.getElementById('discount_type');
            const discountValueInput = document.getElementById('discount_value');
            const selectedProductsSelect = document.getElementById('selected_products');
            const sellingPriceInput = document.getElementById('selling_price');

            // Update Selling Price on input changes
            const updateSellingPrice = () => {
                const selectedOptions = Array.from(selectedProductsSelect.selectedOptions);
                const overallAdjustment = overallAdjustmentSelect.value;
                const discountType = discountTypeSelect.value;
                const discountValue = parseFloat(discountValueInput.value) || 0;
                let totalSellingPrice = 0;

                selectedOptions.forEach(option => {
                    const costPrice = parseFloat(option.getAttribute('data-price'));
                    let adjustedPrice = costPrice;

                    if (overallAdjustment === 'decrease' && discountType === 'percent') {
                        adjustedPrice -= (costPrice * discountValue) / 100;
                    } else if (overallAdjustment === 'decrease' && discountType === 'value') {
                        adjustedPrice -= discountValue;
                    } else if (overallAdjustment === 'increase' && discountType === 'percent') {
                        adjustedPrice += (costPrice * discountValue) / 100;
                    } else if (overallAdjustment === 'increase' && discountType === 'value') {
                        adjustedPrice += discountValue;
                    }

                    adjustedPrice = Math.max(0, adjustedPrice); // Ensure non-negative selling price
                    totalSellingPrice += adjustedPrice;
                });

                sellingPriceInput.value = totalSellingPrice.toFixed(2);
            };

            // Event listeners for updates
            overallAdjustmentSelect.addEventListener('change', updateSellingPrice);
            discountTypeSelect.addEventListener('change', updateSellingPrice);
            discountValueInput.addEventListener('input', updateSellingPrice);
            selectedProductsSelect.addEventListener('change', updateSellingPrice);
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Existing volume pricing code
            const tableBody = document.querySelector('#volumePricingTable tbody');
            const addRowButton = document.getElementById('addVolumePricingRow');

            let rowCount = 1;

            if (addRowButton) {
                addRowButton.addEventListener('click', () => {
                    const newRow = document.createElement('tr');
                    newRow.innerHTML = `
                <td>
                    <input type="number" name="volume_pricing[${rowCount}][quantity]" class="form-control" placeholder="Quantity" required>
                </td>
                <td>
                    <input type="number" step="0.01" name="volume_pricing[${rowCount}][price]" class="form-control" placeholder="Price (£)" required>
                </td>
                <td>
                    <button type="button" class="btn btn-danger remove-row">Delete</button>
                </td>
            `;
                    tableBody.appendChild(newRow);
                    rowCount++;
                });
            }

            if (tableBody) {
                tableBody.addEventListener('click', (e) => {
                    if (e.target.classList.contains('remove-row')) {
                        e.target.closest('tr').remove();
                    }
                });
            }

            // New product rules table code
            const productRulesTable = document.querySelector('#productRulesTable tbody');
            const addProductRuleButton = document.getElementById('addProductRuleRow');
            let productRuleCount = 1;

            // Debug logs
            console.log('Product Rules Table:', productRulesTable);
            console.log('Add Product Rule Button:', addProductRuleButton);

            if (addProductRuleButton && productRulesTable) {
                addProductRuleButton.addEventListener('click', () => {
                    console.log('Add Product Rule button clicked');

                    // Get the first product select element
                    const originalSelect = document.querySelector('.product-select');
                    if (!originalSelect) {
                        console.error('No product-select element found');
                        return;
                    }

                    const newRow = document.createElement('tr');
                    const productSelectHtml = originalSelect.cloneNode(true);
                    productSelectHtml.name = `product_rules[${productRuleCount}][product_id]`;
                    productSelectHtml.value = ''; // Reset the selected value

                    newRow.innerHTML = `
                <td></td>
                <td>
                    <input type="number" name="product_rules[${productRuleCount}][increment]" class="form-control" placeholder="Increment" required>
                </td>
                <td>
                    <input type="number" name="product_rules[${productRuleCount}][minimum]" class="form-control" placeholder="Minimum" required>
                </td>
                <td>
                    <input type="number" name="product_rules[${productRuleCount}][maximum]" class="form-control" placeholder="Maximum" required>
                </td>
                <td>
                    <input type="number" name="product_rules[${productRuleCount}][quantity]" class="form-control" placeholder="Quantity" required>
                </td>
                <td>
                    <input type="number" step="0.01" name="product_rules[${productRuleCount}][price]" class="form-control" placeholder="Price (£)" required>
                </td>
                <td>
                    <button type="button" class="btn btn-danger remove-product-row">Delete</button>
                </td>
            `;

                    // Insert the select element into the first td
                    const firstTd = newRow.querySelector('td');
                    firstTd.appendChild(productSelectHtml);

                    productRulesTable.appendChild(newRow);

                    // Initialize Select2 on the new select element
                    try {
                        $(productSelectHtml).select2();
                    } catch (error) {
                        console.error('Error initializing Select2:', error);
                    }

                    productRuleCount++;
                });

                productRulesTable.addEventListener('click', (e) => {
                    if (e.target.classList.contains('remove-product-row')) {
                        const row = e.target.closest('tr');
                        if (row) {
                            // Destroy Select2 instance before removing the row
                            const select = row.querySelector('.product-select');
                            if (select) {
                                try {
                                    $(select).select2('destroy');
                                } catch (error) {
                                    console.error('Error destroying Select2:', error);
                                }
                            }
                            row.remove();
                        }
                    }
                });
            } else {
                console.error('Required elements not found:', {
                    productRulesTable: !!productRulesTable,
                    addProductRuleButton: !!addProductRuleButton
                });
            }
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const overallAdjustment = document.getElementById('overall_adjustment');
            const discountTypeLabel = document.getElementById('discount_type_label');
            const discountValueLabel = document.getElementById('discount_value_label');

            // Function to update labels based on adjustment selection
            function updateLabels() {
                if (overallAdjustment.value === 'increase') {
                    discountTypeLabel.textContent = 'Increment By';
                    discountValueLabel.textContent = 'Increment Value';
                } else if (overallAdjustment.value === 'decrease') {
                    discountTypeLabel.textContent = 'Discount Type';
                    discountValueLabel.textContent = 'Discount Value';
                } else {
                    discountTypeLabel.textContent = 'Discount Type';
                    discountValueLabel.textContent = 'Discount Value';
                }
            }

            // Attach event listener to the overall adjustment dropdown
            overallAdjustment.addEventListener('change', updateLabels);

            // Initial label update based on pre-selected value (if any)
            updateLabels();
        });
    </script>

    <script>
        $(document).ready(function () {
            $('#publish_for').select2({
                placeholder: "Select users",
                allowClear: true
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $('#selected_products').select2({
                placeholder: "Select products",
                allowClear: true
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $('#select_company').select2({
                placeholder: "Select company",
                allowClear: true
            });
        });
    </script>


    <script>
        $(document).ready(function () {
            $('#select_customer_segment').select2({
                placeholder: "Select customer segment",
                allowClear: true
            });
        });
    </script>


    <script>
        function goBack() {
            // Redirects to the previous page in browser history
            window.history.back();
        }
    </script>

</body>