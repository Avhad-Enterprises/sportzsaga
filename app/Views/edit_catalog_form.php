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
                        <h4 class="h4 mb-0">Edit Catalog</h4>
                    </div>
                </div>

                <div class="pd-20 card-box mb-30">
                    <form method="post" action="<?= base_url('catalog/update/' . $catalog['id']) ?>">

                        <div class="d-flex justify-content-end">
                            <a href="<?= base_url() ?>catalog/catalog_logs/<?= $catalog['id'] ?>"
                                class="btn btn-outline-primary px-3 py-2 rounded-circle shadow-sm" data-toggle="tooltip"
                                data-placement="top" title="View Catalog Logs">
                                <i class="fa-solid fa-ellipsis-vertical fa-lg"></i>
                            </a>
                        </div>

                        <!-- Catalog Name -->
                        <div class="form-group">
                            <label for="catalog_name">Catalog Name</label>
                            <input class="form-control" id="catalog_name" name="catalog_name" type="text"
                                placeholder="Enter catalog name" value="<?= esc($catalog['catalog_name']) ?>" required>
                            <div class="text-danger mt-1" id="catalog_name_error"></div>
                        </div>

                        <!-- Overall Adjustment -->
                        <div class="form-group">
                            <label for="overall_adjustment">Overall Adjustment</label>
                            <select name="overall_adjustment" class="form-control" id="overall_adjustment" required>
                                <option value="">Select Adjustment</option>
                                <option value="increase" <?= $catalog['overall_adjustment'] === 'increase' ? 'selected' : '' ?>>Increase</option>
                                <option value="decrease" <?= $catalog['overall_adjustment'] === 'decrease' ? 'selected' : '' ?>>Decrease</option>
                            </select>
                        </div>

                        <!-- Discount Type -->
                        <div class="form-group">
                            <label for="discount_type">Discount Type</label>
                            <select name="discount_type" class="form-control" id="discount_type" required>
                                <option value="percent" <?= $catalog['discount_type'] === 'percent' ? 'selected' : '' ?>>
                                    Percentage</option>
                                <option value="value" <?= $catalog['discount_type'] === 'value' ? 'selected' : '' ?>>Value
                                </option>
                            </select>
                        </div>

                        <!-- Discount Value -->
                        <div class="form-group">
                            <label for="discount_value">Discount Value</label>
                            <input type="number" id="discount_value" name="discount_value" class="form-control"
                                placeholder="Enter discount value" value="<?= esc($catalog['discount_value']) ?>"
                                required>
                            <div class="text-danger mt-1" id="discount_value_error"></div>
                        </div>

                        <!-- Product Rules and Pricing Table Section -->
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
                                    <?php
                                    $productRules = json_decode($catalog['product_rules'], true) ?? [];
                                    foreach ($productRules as $index => $rule):
                                        ?>
                                        <tr>
                                            <td>
                                                <select class="form-control select2 product-select"
                                                    name="product_rules[<?= $index ?>][product_id]" required>
                                                    <option value="">Select Product</option>
                                                    <?php foreach ($products as $product): ?>
                                                        <option value="<?= $product['product_id']; ?>"
                                                            <?= $rule['product_id'] == $product['product_id'] ? 'selected' : '' ?>>
                                                            <?= $product['product_title']; ?> - Cost:
                                                            <?= $product['cost_price']; ?>, Selling:
                                                            <?= $product['selling_price']; ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </td>
                                            <td><input type="number" name="product_rules[<?= $index ?>][increment]"
                                                    class="form-control" value="<?= $rule['increment'] ?>" required></td>
                                            <td><input type="number" name="product_rules[<?= $index ?>][minimum]"
                                                    class="form-control" value="<?= $rule['minimum'] ?>" required></td>
                                            <td><input type="number" name="product_rules[<?= $index ?>][maximum]"
                                                    class="form-control" value="<?= $rule['maximum'] ?>" required></td>
                                            <td><input type="number" name="product_rules[<?= $index ?>][quantity]"
                                                    class="form-control" value="<?= $rule['quantity'] ?>" required></td>
                                            <td><input type="number" step="0.01" name="product_rules[<?= $index ?>][price]"
                                                    class="form-control" value="<?= $rule['price'] ?>" required></td>
                                            <td><button type="button"
                                                    class="btn btn-danger remove-product-row">Delete</button></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <button type="button" id="addProductRuleRow" class="btn btn-primary">Add Product
                                Rule</button>
                        </div>

                        <!-- Status -->
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control" required>
                                <option value="active" <?= $catalog['status'] === 'active' ? 'selected' : '' ?>>Active
                                </option>
                                <option value="inactive" <?= $catalog['status'] === 'inactive' ? 'selected' : '' ?>>
                                    Inactive</option>
                            </select>
                        </div>

                        <!-- Selling Price -->
                        <?php if (isset($allowedFields['selling_price'])): ?>
                            <div class="form-group">
                                <label>Selling Prices</label>
                                <ul class="list-group">
                                    <?php
                                    $sellingPrices = json_decode($catalog['selling_price'], true);
                                    $selectedProductIds = explode(',', $catalog['products']); // Get selected product IDs from the catalog
                                    foreach ($products as $product):
                                        if (in_array($product['product_id'], $selectedProductIds)): // Check if the product is selected
                                            ?>
                                            <li class="list-group-item">
                                                <?= $product['product_title']; ?>:
                                                <strong><?= $sellingPrices[$product['product_id']] ?? 'N/A'; ?></strong>
                                            </li>
                                            <?php
                                        endif;
                                    endforeach;
                                    ?>
                                </ul>
                            </div>
                        <?php endif; ?>

                        <!-- Publish For -->
                        <div class="form-group">
                            <label for="publish_for">Publish For</label>
                            <select name="publish_for[]" id="publish_for" class="form-control select2" multiple>
                                <?php
                                // Convert comma-separated values from DB to an array
                                $selectedUsers = explode(',', $catalog['publish_for'] ?? '');
                                ?>
                                <?php foreach ($users as $user): ?>
                                    <option value="<?= $user['user_id']; ?>" <?= in_array($user['user_id'], $selectedUsers) ? 'selected' : '' ?>>
                                        <?= $user['name']; ?> (<?= $user['email']; ?>)
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
                                <?php
                                // Convert comma-separated values from DB to an array
                                $selectedCompanies = explode(',', $catalog['select_company'] ?? '');
                                ?>
                                <?php foreach ($companies as $company): ?>
                                    <option value="<?= $company['id']; ?>" <?= in_array($company['id'], $selectedCompanies) ? 'selected' : '' ?>>
                                        <?= $company['company_name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <!-- Select Customer Segment -->
                        <div class="form-group">
                            <label for="select_customer_segment">Select Customer Segment</label>
                            <select name="select_customer_segment[]" id="select_customer_segment"
                                class="form-control select2" multiple>
                                <option value="">Select Customer Segment</option>
                                <?php
                                // Convert comma-separated values from DB to an array
                                $selectedSegments = explode(',', $catalog['select_customer_segment'] ?? '');
                                ?>
                                <?php foreach ($customer_segments as $segment): ?>
                                    <option value="<?= $segment['segment_id']; ?>" <?= in_array($segment['segment_id'], $selectedSegments) ? 'selected' : '' ?>>
                                        <?= $segment['segment_name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>



                        <button type="submit" class="btn btn-primary btn-lg">Update Catalog</button>
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
        $(document).ready(function () {
            $('#selected_products').select2({
                placeholder: "Select products",
                allowClear: true
            });
        });

        function goBack() {
            window.history.back();
        }
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
            const overallAdjustment = document.getElementById('overall_adjustment');
            const discountTypeLabel = document.getElementById('discount_type_label');
            const discountValueLabel = document.getElementById('discount_value_label');

            // Function to update labels dynamically
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

            // Attach event listener for dynamic changes
            overallAdjustment.addEventListener('change', updateLabels);

            // Initialize labels based on pre-selected values
            updateLabels();
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const productRulesTable = document.querySelector('#productRulesTable tbody');
            const addProductRuleButton = document.getElementById('addProductRuleRow');
            let productRuleCount = <?= count($productRules) ?>;

            if (addProductRuleButton && productRulesTable) {
                addProductRuleButton.addEventListener('click', () => {
                    const newRow = document.createElement('tr');
                    newRow.innerHTML = `
                <td>
                    <select class="form-control select2 product-select" name="product_rules[${productRuleCount}][product_id]" required>
                        <option value="">Select Product</option>
                        <?php foreach ($products as $product): ?>
                                                <option value="<?= $product['product_id']; ?>"><?= $product['product_title']; ?> - Cost: <?= $product['cost_price']; ?>, Selling: <?= $product['selling_price']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
                <td><input type="number" name="product_rules[${productRuleCount}][increment]" class="form-control" required></td>
                <td><input type="number" name="product_rules[${productRuleCount}][minimum]" class="form-control" required></td>
                <td><input type="number" name="product_rules[${productRuleCount}][maximum]" class="form-control" required></td>
                <td><input type="number" name="product_rules[${productRuleCount}][quantity]" class="form-control" required></td>
                <td><input type="number" step="0.01" name="product_rules[${productRuleCount}][price]" class="form-control" required></td>
                <td><button type="button" class="btn btn-danger remove-product-row">Delete</button></td>
            `;
                    productRulesTable.appendChild(newRow);
                    productRuleCount++;
                });

                productRulesTable.addEventListener('click', (e) => {
                    if (e.target.classList.contains('remove-product-row')) {
                        e.target.closest('tr').remove();
                    }
                });
            }
        });
    </script>



</body>