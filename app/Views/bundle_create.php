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
                            <h4 class="text-blue h4">Add New Bundle</h4>
                            <p class="mb-30">Create a New Bundle with Products</p>
                        </div>
                    </div>

                    <form id="addbundleform" method="post" action="<?= base_url() ?>bundlecontroller/create"
                        enctype="multipart/form-data" >
                        <div class="form-group row">
                            <div class="col-sm">
                                <label for="bundle_name">Bundle Name</label>
                                <input class="form-control" name="bundle_name" type="text" placeholder="Bundle Name">
                               
                            </div>
                            <div class="col-sm">
                                <label for="bundle_price">Bundle Price</label>
                                <input class="form-control" name="bundle_price" type="number" placeholder="Bundle Price">
                               
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Discount Type</label>
                            <div class="col-sm-10">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="discount_type"
                                        id="discount_percent" value="percent" checked>
                                    <label class="form-check-label" for="discount_percent">Percentage</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="discount_type"
                                        id="discount_value" value="value">
                                    <label class="form-check-label" for="discount_value">Fixed Value</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row" id="percent-group">
                            <div class="col-sm">
                                <label for="discount_percent_input">Discount Percentage</label>
                                <input class="form-control" name="discount_percent_input" type="number" placeholder="Discount Percentage" min="0" max="100">                          
                            </div>
                        </div>

                        <div class="form-group row" id="value-group" style="display: none;">
                            <div class="col-sm">
                                <label for="discount_value_input">Discount Value</label>
                                <input class="form-control" name="discount_value_input" type="number"
                                    placeholder="Discount Value">                               
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-sm">
                                <label for="start_date">Start Date</label>
                                <input class="form-control" type="datetime-local" name="start_date" >
                              
                            </div>
                            <div class="col-sm">
                                <label for="end_date">End Date</label>
                                <input class="form-control" type="datetime-local" name="end_date" >                             
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm">
                                <label for="status">Status</label>
                                <select class="form-control" name="status" >
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>                             
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm">
                                <label for="badge_image">Badge Image</label>
                                <input class="form-control" type="file" name="badge_image" id="badge_image" accept="image/*">
                               
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm">
                                <label for="badge_image_preview">Badge Image Preview</label>
                                <img id="badge_image_preview" src="#" alt="Badge Image" style="display:none; width: 100px; height: auto;">
                            </div>
                        </div>

                        <script>
                            // Show image preview when a file is selected
                            document.getElementById('badge_image').addEventListener('change', function(event) {
                                var reader = new FileReader();
                                reader.onload = function() {
                                    var output = document.getElementById('badge_image_preview');
                                    output.src = reader.result;
                                    output.style.display = 'block'; // Show the preview
                                };
                                reader.readAsDataURL(event.target.files[0]);
                            });
                        </script>



                        <div class="form-group row">
                            <div class="col-sm">
                                <label for="selected_products">Select Products</label>
                                <select class="form-control select2" name="selected_products[]" id="selected_products" multiple required>
                                    <?php foreach ($products as $product): ?>
                                        <option value="<?= $product['product_id']; ?>" data-price="<?= $product['cost_price']; ?>">
                                            <?= $product['product_title']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>                            
                            </div>
                        </div>

                        <div class="form-group">
                            <button value="submit" class="btn btn-primary btn-lg">
                                Create Bundle
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
    // Initialize select2 plugin for the product selection dropdown
    $(document).ready(function () {
        // Applying select2 for the product selection dropdown
        $('.select2').select2({
            placeholder: 'Search and select products',
            allowClear: true
        });
    });

</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
    const percentGroup = document.getElementById('percent-group');
    const valueGroup = document.getElementById('value-group');
    const discountTypeInputs = document.querySelectorAll('input[name="discount_type"]');

    discountTypeInputs.forEach(input => {
        input.addEventListener('change', function () {
            if (this.value === 'percent') {
                percentGroup.style.display = 'block';
                valueGroup.style.display = 'none';
            } else {
                percentGroup.style.display = 'none';
                valueGroup.style.display = 'block';
            }
        });
    });
});

</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('addbundleform');

        form.addEventListener('submit', function (event) {
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
            if (badgeImage.files.length > 0) {
                if (!validateFile(badgeImage, ['image/jpeg', 'image/png', 'image/webp'], 'Badge Image must be in JPG, PNG, or WEBP format.') ||
                    !validateImageDimensions(badgeImage, 1320, 720, 'Badge Image dimensions must be 1320x720 pixels.') ||
                    !validateFileSize(badgeImage, 200, 'Badge Image size must not exceed 200KB.')) {
                    valid = false;
                }
            }

            // Validate Selected Products
            const selectedProducts = form.querySelector('[name="selected_products[]"]');
            if (!validateMultiSelect(selectedProducts, 'Please select at least one product.')) valid = false;

            // Prevent form submission if any field is invalid
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

        function validateImageDimensions(field, requiredWidth, requiredHeight, errorMessage) {
            const file = field.files[0];
            const fileReader = new FileReader();

            fileReader.onload = function (e) {
                const img = new Image();
                img.onload = function () {
                    if (img.width !== requiredWidth || img.height !== requiredHeight) {
                        showError(field, errorMessage);
                        field.value = ''; // Reset the file input
                        return false;
                    }
                };
                img.src = e.target.result;
            };

            fileReader.readAsDataURL(file);
            return true;
        }

        function validateFileSize(field, maxSizeKB, errorMessage) {
            const file = field.files[0];
            const fileSizeInKB = file.size / 1024;
            if (fileSizeInKB > maxSizeKB) {
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
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const selectedProducts = document.getElementById('selected_products');
        const bundlePriceField = document.querySelector('input[name="bundle_price"]');

        // Make bundle price read-only
        bundlePriceField.readOnly = true;

        // Function to calculate the total price
        const calculateTotalPrice = () => {
            let totalPrice = 0;

            // Get all selected options
            Array.from(selectedProducts.selectedOptions).forEach(option => {
                const productPrice = parseFloat(option.getAttribute('data-price')) || 0;
                totalPrice += productPrice;
            });

            // Update the bundle price field
            bundlePriceField.value = totalPrice.toFixed(2);
        };

        // Event listener for standard dropdown change
        selectedProducts.addEventListener('change', calculateTotalPrice);

        // Ensure calculation works with Select2
        $('.select2').on('change', calculateTotalPrice);

        // Initialize price calculation on page load
        calculateTotalPrice();
    });
</script>

</html>