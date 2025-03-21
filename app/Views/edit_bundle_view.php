<!-- Head View Start -->
<?= $this->include('head_view') ?>
<!-- Head View End -->


<body>

    <?php
    // Convert selected_products string into an array (if it is a comma-separated list)
    $selectedProducts = explode(',', $bundle['selected_products']);
    ?>

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

    <!-- Page Main Content Start -->
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <!-- Default Basic Forms Start -->
                <div class="pd-20 card-box mb-30">
                    <div class="clearfix">
                        <div class="pull-left">
                            <h4 class="text-blue h4">Edit Bundle</h4>
                            <p class="mb-30">Update Bundle Details</p>
                        </div>
                    </div>

                    <!-- Assuming `$bundle` contains existing data for the bundle -->
                    <form id="editbundleform" method="post"
                        action="<?= base_url('bundle/update/' . $bundle['bundle_id']) ?>" enctype="multipart/form-data">

                        <div class="d-flex justify-content-end">
                            <a href="<?= base_url('bundle/bundle_logs/' . $bundle['bundle_id']) ?>"
                                class="btn btn-outline-primary px-3 py-2 rounded-circle shadow-sm" data-toggle="tooltip"
                                data-placement="top" title="View Bundle Logs">
                                <i class="fa-solid fa-ellipsis-vertical fa-lg"></i>
                            </a>
                        </div>

                        <div class="form-group row">
                            <?php if (isset($allowedColumns['bundle_name'])): ?>
                                <div class="col-sm">
                                    <label for="bundle_name">Bundle Name</label>
                                    <input class="form-control" name="bundle_name" type="text"
                                        value="<?= $bundle['bundle_name'] ?>" placeholder="Bundle Name">
                                </div>
                            <?php endif; ?>
                            <?php if (isset($allowedColumns['bundle_price'])): ?>
                                <div class="col-sm">
                                    <label for="bundle_price">Bundle Price</label>
                                    <input class="form-control" name="bundle_price" type="number"
                                        value="<?= $bundle['bundle_price'] ?>" placeholder="Bundle Price">
                                </div>
                            <?php endif; ?>
                        </div>

                        <?php if (isset($allowedColumns['discount_value'])): ?>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Discount Type</label>
                                <div class="col-sm-10">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="discount_type"
                                            id="discount_percent" value="percent" <?= ($bundle['discount_type'] == 'percent') ? 'checked' : '' ?>>
                                        <label class="form-check-label" for="discount_percent">Percentage</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="discount_type"
                                            id="discount_value" value="value" <?= ($bundle['discount_type'] == 'value') ? 'checked' : '' ?>>
                                        <label class="form-check-label" for="discount_value">Fixed Value</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm">
                                    <label for="discount_input">Discount Value</label>
                                    <input class="form-control" name="discount_input" id="discount_input" type="number"
                                        value="<?= isset($bundle['discount_value']) ? $bundle['discount_value'] : 0 ?>"
                                        placeholder="Enter Discount Value">
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if (isset($allowedColumns['start_date']) || isset($allowedColumns['end_date'])): ?>
                            <div class="form-group row">
                                <?php if (isset($allowedColumns['start_date'])): ?>
                                    <div class="col-sm">
                                        <label for="start_date">Start Date</label>
                                        <input class="form-control" type="datetime-local" name="start_date"
                                            value="<?= date('Y-m-d\TH:i', strtotime($bundle['start_date'])) ?>">
                                    </div>
                                <?php endif; ?>
                                <?php if (isset($allowedColumns['end_date'])): ?>
                                    <div class="col-sm">
                                        <label for="end_date">End Date</label>
                                        <input class="form-control" type="datetime-local" name="end_date"
                                            value="<?= date('Y-m-d\TH:i', strtotime($bundle['end_date'])) ?>">
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>

                        <div class="form-group row">
                            <?php if (isset($allowedColumns['status'])): ?>
                                <div class="col-sm">
                                    <label for="status">Status</label>
                                    <select class="form-control" name="status" required>
                                        <option value="active" <?= $bundle['status'] == 'active' ? 'selected' : '' ?>>Active
                                        </option>
                                        <option value="inactive" <?= $bundle['status'] == 'inactive' ? 'selected' : '' ?>>
                                            Inactive</option>
                                    </select>
                                </div>
                            <?php endif; ?>
                        </div>

                        <?php if (isset($allowedColumns['badge_image'])): ?>
                            <div class="form-group row">
                                <div class="col-sm">
                                    <label for="badge_image">Badge Image</label>
                                    <input type="file" class="form-control" name="badge_image" accept="image/*">

                                    <?php if (!empty($bundle['badge_image'])): ?>
                                        <small class="form-text text-muted">
                                            <strong>Current Badge Image:</strong>
                                            <img src="<?= $bundle['badge_image'] ?>" alt="Current Badge Image"
                                                class="img-thumbnail" width="150">
                                        </small>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>


                        <?php if (isset($allowedColumns['selected_products'])): ?>
                            <div class="form-group row">
                                <div class="col-sm">
                                    <label for="selected_products">Select Products</label>
                                    <select class="form-control select2" name="selected_products[]" id="selected_products"
                                        multiple required>
                                        <?php foreach ($products as $product): ?>
                                            <option value="<?= $product['product_id'] ?>"
                                                data-price="<?= $product['cost_price']; ?>" <?= in_array($product['product_id'], $selectedProducts) ? 'selected' : '' ?>>
                                                <?= $product['product_title'] ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        <?php endif; ?>


                        <div class="form-group">
                            <button value="submit" class="btn btn-primary btn-lg">
                                Update Bundle
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Page Main Content End -->

        <!-- Footer View Start -->
        <?= $this->include('footer_view') ?>
        <!-- Footer View End -->

</body>

<script>
    // Initialize select2 plugin
    $(document).ready(function() {
        $('.select2').select2({
            placeholder: 'Search and select products',
            allowClear: true
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const discountInput = document.getElementById('discount_input');
        const discountTypeInputs = document.querySelectorAll('input[name="discount_type"]');

        function updateDiscountPlaceholder() {
            const selectedType = document.querySelector('input[name="discount_type"]:checked').value;

            if (selectedType === 'percent') {
                discountInput.placeholder = "Enter Discount Percentage";
                discountInput.max = 100; // Set maximum value for percentage
            } else {
                discountInput.placeholder = "Enter Discount Value";
                discountInput.removeAttribute("max"); // Remove limit for fixed value
            }
        }

        // Ensure placeholder updates when radio button changes
        discountTypeInputs.forEach(input => {
            input.addEventListener('change', updateDiscountPlaceholder);
        });

        // Run once on page load to set correct placeholder
        updateDiscountPlaceholder();
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('editbundleform');

        form.addEventListener('submit', function(event) {
            let valid = true;

            // Clear previous error messages
            clearErrorMessages(form);

            // Validate Bundle Name
            const bundleName = form.querySelector('[name="bundle_name"]');
            if (!validateNotEmpty(bundleName, 'Bundle Name is required.')) valid = false;

            // Validate Bundle Price
            const bundlePrice = form.querySelector('[name="bundle_price"]');
            if (!validateNumber(bundlePrice, 'Bundle Price must be a positive number.')) valid = false;

            // Validate Discount Type
            const discountType = form.querySelector('input[name="discount_type"]:checked');
            if (!discountType) {
                showError(form.querySelector('input[name="discount_type"]').closest('.form-group'), 'Please select a discount type.');
                valid = false;
            } else if (discountType.value === 'percent') {
                const discountPercentInput = form.querySelector('[name="discount_percent_input"]');
                if (!validateNumberRange(discountPercentInput, 0, 100, 'Discount Percentage must be between 0 and 100.')) valid = false;
            } else {
                const discountValueInput = form.querySelector('[name="discount_value_input"]');
                if (!validateNumber(discountValueInput, 'Discount Value must be a positive number.')) valid = false;
            }

            // Validate Start and End Dates
            const startDate = form.querySelector('[name="start_date"]');
            const endDate = form.querySelector('[name="end_date"]');
            if (!validateNotEmpty(startDate, 'Start Date is required.')) valid = false;
            if (!validateNotEmpty(endDate, 'End Date is required.')) valid = false;
            if (startDate.value && endDate.value && new Date(startDate.value) >= new Date(endDate.value)) {
                showError(endDate, 'End Date must be later than Start Date.');
                valid = false;
            }

            // Validate Status
            const status = form.querySelector('[name="status"]');
            if (!validateDropdown(status, 'Please select a status.')) valid = false;

            // Validate Badge Image
            const badgeImage = form.querySelector('[name="badge_image"]');
            if (badgeImage.files.length > 0 && !validateFile(badgeImage, ['image/jpeg', 'image/png', 'image/webp'], 'Badge Image must be in JPG, PNG, or WEBP format.')) valid = false;

            // Validate Selected Products
            const selectedProducts = form.querySelector('[name="selected_products[]"]');
            if (!validateMultiSelect(selectedProducts, 'Please select at least one product.')) valid = false;

            // Prevent form submission if invalid
            if (!valid) {
                event.preventDefault();
            }
        });

        // Helper Functions

        function validateNotEmpty(field, errorMessage) {
            if (!field.value.trim()) {
                showError(field, errorMessage);
                return false;
            }
            return true;
        }

        function validateNumber(field, errorMessage) {
            if (!field.value.trim() || isNaN(field.value) || parseFloat(field.value) <= 0) {
                showError(field, errorMessage);
                return false;
            }
            return true;
        }

        function validateNumberRange(field, min, max, errorMessage) {
            const value = parseFloat(field.value);
            if (isNaN(value) || value < min || value > max) {
                showError(field, errorMessage);
                return false;
            }
            return true;
        }

        function validateDropdown(field, errorMessage) {
            if (!field.value.trim()) {
                showError(field, errorMessage);
                return false;
            }
            return true;
        }

        function validateFile(field, allowedTypes, errorMessage) {
            const file = field.files[0];
            if (!allowedTypes.includes(file.type)) {
                showError(field, errorMessage);
                return false;
            }
            return true;
        }

        function validateMultiSelect(field, errorMessage) {
            if (!field.value || field.selectedOptions.length === 0) {
                showError(field, errorMessage);
                return false;
            }
            return true;
        }

        function showError(field, message) {
            const errorElement = document.createElement('div');
            errorElement.className = 'text-danger mt-1';
            errorElement.textContent = message;
            if (!field.nextElementSibling || !field.nextElementSibling.classList.contains('text-danger')) {
                field.parentNode.appendChild(errorElement);
            }
        }

        function clearErrorMessages(form) {
            form.querySelectorAll('.text-danger').forEach(error => error.remove());
        }
    });

    $(document).ready(function() {
        $('.select2').select2({
            placeholder: 'Search and select products',
            allowClear: true
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const selectedProducts = document.getElementById('selected_products');
        const bundlePriceField = document.querySelector('input[name="bundle_price"]');

        if (!selectedProducts || !bundlePriceField) {
            console.error("Error: Elements not found! Check your form.");
            return;
        }

        // Make the bundle price read-only
        bundlePriceField.readOnly = true;

        // Function to calculate the total bundle price
        function calculateTotalPrice() {
            let totalPrice = 0;

            // Get all selected product options
            Array.from(selectedProducts.selectedOptions).forEach(option => {
                const productPrice = parseFloat(option.getAttribute('data-price')) || 0;
                totalPrice += productPrice;
            });

            // Update the bundle price field
            bundlePriceField.value = totalPrice.toFixed(2);

            console.log("Updated Bundle Price:", totalPrice);
        }

        // Event listener for when products are selected/removed
        selectedProducts.addEventListener('change', calculateTotalPrice);

        // Ensure calculation works with Select2
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: 'Search and select products',
                allowClear: true
            }).on('change', calculateTotalPrice);
        });

        // Initialize the total price calculation when the page loads
        calculateTotalPrice();
    });
</script>


</html>