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

    <!-- Page Main Content Start -->
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <!-- Default Basic Forms Start -->

                <div class="">
                    <div class="clearfix mb-3">
                        <div class="pull-left d-flex align-items-center">
                            <!-- Back Button -->
                            <button type="button" class="btn btn-secondary mr-3" onclick="goBack()">
                                <i class="fa fa-arrow-left"></i> <!-- Back Arrow Icon -->
                            </button>
                            <h4 class="h4 mb-0">Add Related Product</h4>
                        </div>
                    </div>
                </div>

                <form id="relatedProductsForm" method="post"
                    action="<?= base_url('admin-products/saveRelatedProducts') ?>">
                    <!-- Add this hidden input inside the form -->
                    <input type="hidden" name="related_product_ids" id="related_product_ids">

                    <div class="row">
                        <div class="col-md-8">
                            <div class="pd-20 card-box mb-30">
                                <p class="text-blue mb-30">Product Information</p>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="collection">Collection</label>
                                        <select class="form-control" id="collection" name="collection_id"
                                            onchange="fetchProducts(this.value)">
                                            <option value="">Select a collection</option>
                                            <?php foreach ($collections as $collection): ?>
                                                <option value="<?= $collection['collection_id'] ?>">
                                                    <?= $collection['collection_title'] ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <!-- Product Display Section -->
                                <div class="col-md-12">
                                    <div id="product-list" class="row"></div> <!-- Products will be displayed here -->
                                </div>
                            </div>

                            <div class="pd-20 card-box mb-30">
                                <div class="clearfix row">
                                    <div class="pull-left col-md-4">
                                        <p class="text-blue">Select Products</p>
                                    </div>
                                    <div class="col-md-8 row">
                                        <div id="Automated" class="custom-control col custom-radio mb-5">
                                            <input type="radio" id="customRadio4" name="selectMethod"
                                                class="custom-control-input" value="automated">
                                            <label class="custom-control-label" for="customRadio4">Automated</label>
                                        </div>
                                        <div id="Manual" class="custom-control col custom-radio mb-5">
                                            <input type="radio" id="customRadio5" name="selectMethod"
                                                class="custom-control-input" value="manual">
                                            <label class="custom-control-label" for="customRadio5">Manual</label>
                                        </div>
                                    </div>
                                </div>

                                <div id="automatedSection" style="display: none;">
                                    <div id="collectionForm">
                                        <div id="conditionsContainer">
                                            <div class="card card-body">
                                                <div class="form-group row">
                                                    <label class="col-5">
                                                        <h3>Include</h3> products which satisfies:
                                                    </label>
                                                    <div class="custom-control col custom-radio">
                                                        <input type="radio" id="allConditions" name="conditionType"
                                                            value="all" class="custom-control-input" checked>
                                                        <label class="custom-control-label" for="allConditions">All
                                                            Conditions</label>
                                                    </div>
                                                    <div class="custom-control col custom-radio">
                                                        <input type="radio" id="anyCondition" name="conditionType"
                                                            value="any" class="custom-control-input">
                                                        <label class="custom-control-label" for="anyCondition">Any
                                                            Condition</label>
                                                    </div>
                                                </div>
                                                <div id="conditionsList"></div>
                                                <div class="form-row" style=" justify-content: space-between;">
                                                    <div class="col-3">
                                                        <button type="button" class="btn col-12 mt-2 btn-secondary"
                                                            id="addCondition">Add Condition</button>
                                                    </div>
                                                    <div class="col-7">
                                                        <input type="text" class="form-control mt-2" name="sortbystatus"
                                                            id="sortbystatus" readonly>
                                                    </div>
                                                    <div class="col-2 d-flex justify-content-end form-row text-right">
                                                        <div id="loader" class="mt-2" style="display: none;">
                                                            <div class="spinner-border" role="status">
                                                                <span class="sr-only">Loading...</span>
                                                            </div>
                                                            <!-- You can replace this with a spinner or any other loading indicator -->
                                                        </div>
                                                        <i class="icon-copy mt-2 btn btn-dark refresh fa fa-refresh"
                                                            aria-hidden="true"></i>
                                                    </div>
                                                    <div id="loader" class="mt-2" style="display: none;">
                                                        <div class="spinner-border" role="status">
                                                            <span class="sr-only">Loading...</span>
                                                        </div>
                                                        <!-- You can replace this with a spinner or any other loading indicator -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="productsContainer" class="mt-4">
                                        <div class="row">
                                            <div class="col-4">
                                                <strong>Selected Products</strong>
                                            </div>
                                            <div class="col">
                                                <div class="form-group text-right">
                                                    <label for="sortProductsAutomated">Sort Products:</label>
                                                    <select class="selectpicker" id="sortProductsAutomated">
                                                        <option value="manually">Manually</option>
                                                        <option value="titleAZ">Product title A-Z</option>
                                                        <option value="titleZA">Product title Z-A</option>
                                                        <option value="priceHigh">Highest price</option>
                                                        <option value="priceLow">Lowest price</option>
                                                        <option value="newest">Newest</option>
                                                        <option value="oldest">Oldest</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div style="overflow-y: auto; max-height: 582px; scrollbar-width: thin;">
                                            <table class="table" id="productsTable">
                                                <thead>
                                                    <tr>
                                                        <th>Product Title</th>
                                                        <th>Cost Price</th>
                                                        <th>Product Image</th>
                                                    </tr>
                                                </thead>
                                                <tbody></tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div id="manualSection" style="display: none;">
                                    <div class="form-group">
                                        <label class="" for="searchProducts">Search Products here:</label>
                                        <input type="text" id="searchProducts" class="form-control"
                                            placeholder="Search products...">
                                    </div>
                                </div>

                                <div class="form-group" id="productsTableSection" style="display: none;">
                                    <label>Products</label>
                                    <div id="loader" style="display: none;">
                                        <p>Loading...</p>
                                    </div>
                                    <div id="productsContainer"
                                        style=" overflow-y: auto; max-height: 582px; scrollbar-width: thin;"
                                        class="mt-4">
                                        <table class="table" id="productstable">
                                            <thead>
                                                <tr>
                                                    <th class=" dt-body-center" id="selectAllHeader"
                                                        style="display: none;">
                                                        <div class="dt-checkbox">
                                                            <input type="checkbox" id="select_all">
                                                            <span class="dt-checkbox-label"></span>
                                                        </div>
                                                    </th>
                                                    <th>Product Title</th>
                                                    <th>Cost Price</th>
                                                    <th>Product Image</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- Products will be loaded here by jQuery -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div id="selectedProductscontainer" style="display: none;" class="pd-20 card-box mb-30">
                                    <p class="text-blue mb-30">Selected Products</p>
                                    <input type="hidden" name="sortBy">
                                    <div class="form-group">
                                        <label for="sortProducts">Sort Products:</label>
                                        <select class="selectpicker" id="sortProducts">
                                            <option value="manually">Manually</option>
                                            <option value="titleAZ">Product title A-Z</option>
                                            <option value="titleZA">Product title Z-A</option>
                                            <option value="priceHigh">Highest price</option>
                                            <option value="priceLow">Lowest price</option>
                                            <option value="newest">Newest</option>
                                            <option value="oldest">Oldest</option>
                                        </select>
                                    </div>
                                    <div id="selectedProducts"
                                        style=" overflow-y: auto; max-height: 652px; scrollbar-width: thin;"
                                        class=" list-group list-group-flush"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <button value="submit" class="btn btn-primary btn-lg">
                            Publish
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


<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.full.min.js"></script>


<script>
    $(document).ready(function () {
        let conditionCount = 0;
        const baseUrl = '<?= base_url() ?>';

        function addCondition(defaultField = '') {
            let conditionHtml = `
            <div class="condition-row mb-3" data-index="${conditionCount}">
                <div class="form-row">
                    <div class="col-3">
                        <select class="form-control condition-field" name="conditions[${conditionCount}][field]">
                            <option value="">Select Field</option>
                            <?php foreach ($fields as $field): ?>
                                <option value="<?= $field ?>" ${defaultField === '<?= $field ?>' ? 'selected' : ''}><?= ucfirst(str_replace('_', ' ', $field)) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-3">
                        <select class="form-control condition-operator" name="conditions[${conditionCount}][operator]">
                            <option value="">Select Operator</option>
                        </select>
                    </div>
                    <div class="col-5 position-relative">
                        <select class="form-control condition-value" name="conditions[${conditionCount}][value]">
                            <option value="">Select Value</option>
                        </select>
                    </div>
                    <div class="">
                        <i class="icon-copy btn btn-danger remove-condition ion-trash-b"></i>
                    </div>
                </div>
            </div>
        `;
            $('#conditionsList').append(conditionHtml);
            initializeSelect2(conditionCount);
            conditionCount++;
            console.log('New condition added');

            // Trigger change event to load operators and values
            $(`.condition-row[data-index="${conditionCount - 1}"] .condition-field`).trigger('change');
        }

        function initializeSelect2(index) {
            $(`.condition-row[data-index="${index}"] .condition-value`).select2({
                tags: true,
                createTag: function (params) {
                    return {
                        id: params.term,
                        text: params.term,
                        newOption: true
                    }
                },
                language: {
                    noResults: function () {
                        return "Type to add a custom value";
                    }
                },
                theme: "bootstrap",
                width: 'resolve', // This allows the Select2 to use the full width of its container
                dropdownAutoWidth: true, // This allows the dropdown to adjust its width based on content
                containerCssClass: 'custom-select2-container', // Add this line
                dropdownCssClass: 'custom-select2-dropdown' // Add this line
            });
        }

        function reinitializeAllSelect2() {
            $('.condition-value').each(function (index) {
                $(this).select2('destroy'); // Destroy existing Select2
                initializeSelect2(index); // Reinitialize
            });
        }

        $(window).on('load', function () {
            reinitializeAllSelect2();
        });

        $('#addCondition').click(function () {
            let lastField = $('.condition-field').last().val();
            addCondition(lastField);
            updateProductTable();
        });


        // Event listener for removing a condition
        $(document).on('click', '.remove-condition', function () {
            $(this).closest('.condition-row').remove();
            console.log('Condition removed, updating product table');
            updateProductTable();
        });

        $(document).on('change', '.condition-field', function () {
            let row = $(this).closest('.condition-row');
            let field = $(this).val();
            let operatorSelect = row.find('.condition-operator');
            let valueSelect = row.find('.condition-value');

            operatorSelect.empty().append('<option value="">Select Operator</option>');
            valueSelect.empty().append('<option value="">Select Value</option');

            if (field) {
                // Set operators based on field type
                if (field === 'product_title') {
                    operatorSelect.append(`
                    <option value="starts_with">Starts with</option>
                    <option value="ends_with">Ends with</option>
                    <option value="contains">Contains</option>
                    <option value="is_equal_to">Is equal to</option>
                    <option value="does_not_contain">Does not contain</option>
                    <option value="is_not_equal_to">Is not equal to</option>
                `);
                } else if (field === 'cost_price') {
                    operatorSelect.append(`
                    <option value="is_equal_to">Is equal to</option>
                    <option value="is_greater_than">Is greater than</option>
                    <option value="is_less_than">Is less than</option>
                    <option value="is_not_equal_to">Is not equal to</option>
                    <option value="is_between">Is between</option>
                    <option value="is_not_between">Is not between</option>
                `);
                } else if (field === 'product_tags') {
                    operatorSelect.append(`
                    <option value="is_equal_to">Is equal to</option>
                    <option value="contains">Contains</option>
                    <option value="does_not_contain">Does not contain</option>
                    <option value="is_not_equal_to">Is not equal to</option>
                `);
                } else if (field === 'size') {
                    operatorSelect.append(`
                    <option value="is_equal_to">Is equal to</option>
                    <option value="contains">Contains</option>
                    <option value="does_not_contain">Does not contain</option>
                    <option value="is_not_equal_to">Is not equal to</option>
                `);
                } else {
                    operatorSelect.append(`
                    <option value="is_equal_to">Is equal to</option>
                    <option value="contains">Contains</option>
                `);
                }

                // Load values for the selected field
                $.get(`${baseUrl}admin-products/getDistinctFieldValues?field=${field}`, function (data) {
                    data.forEach(function (item) {
                        if (field === 'cost_price') {
                            if (field === 'cost_price') {
                                // Add default value options for cost_price                        
                                valueSelect.append(`
                                <option value="500-1000">500-1000</option>
                                <option value="5-10">5-10</option>
                            `);
                                valueSelect.append(`<option value="${item[field]}">${item[field]}</option>`);
                            } else {
                                valueSelect.append(`<option value="${item[field]}">${item[field]}</option>`);
                            }
                        } else {
                            valueSelect.append(`<option value="${item[field]}">${item[field]}</option>`);
                        }
                    });
                    valueSelect.trigger('change');
                });

                // Select first operator by default
                operatorSelect.val(operatorSelect.find('option:eq(1)').val()).trigger('change');
            }
        });

        $(document).on('change', '.condition-operator', function () {
            let row = $(this).closest('.condition-row');
            let operator = $(this).val();
            let valueSelect = row.find('.condition-value');

            if (['starts_with', 'ends_with', 'contains', 'does_not_contain'].includes(operator)) {
                valueSelect.val(null).trigger('change');
                valueSelect.select2('open');
            } else {
                // Select first value by default for other operators
                valueSelect.val(valueSelect.find('option:eq(1)').val()).trigger('change');
            }
        });

        $(document).on('select2:open', '.condition-value', function () {
            let row = $(this).closest('.condition-row');
            let operator = row.find('.condition-operator').val();

            if (['starts_with', 'ends_with', 'contains', 'does_not_contain'].includes(operator)) {
                setTimeout(() => {
                    $('.select2-search__field').attr('placeholder', 'Type to add a custom value');
                }, 0);
            }
        });

        $(document).on('select2:select', '.condition-value', function (e) {
            updateProductTable();
        });

        $(document).on('change', '.condition-value, input[name="conditionType"]', updateProductTable);

        function updateProductTable() {
            let conditions = [];
            $('.condition-row').each(function () {
                let field = $(this).find('.condition-field').val();
                let operator = $(this).find('.condition-operator').val();
                let value = $(this).find('.condition-value').val();

                if (field && operator && value) {
                    conditions.push({
                        field,
                        operator,
                        value
                    });
                }
            });

            let conditionType = $('input[name="conditionType"]:checked').val();

            if (conditions.length > 0) {
                $.ajax({
                    url: `${baseUrl}admin-products/getProductsByConditions`,
                    type: 'POST',
                    data: {
                        conditions: JSON.stringify(conditions),
                        conditionType: conditionType
                    },
                    dataType: 'json',
                    success: function (response) {
                        if (response.error) {
                            console.error('Error:', response.error);
                            alert('An error occurred while fetching products. Please check the console for details.');
                        } else {
                            let tableBody = $('#productsTable tbody');
                            tableBody.empty();
                            response.products.forEach(function (product) {
                                tableBody.append(`
                                <tr class="selected-product-item" draggable="true">
                                    <td>${product.product_title}</td>
                                    <td>${product.cost_price}</td>
                                   <td>
                                        <img src="${product.product_image}" 
                                            alt="${product.product_title}" 
                                            width="50" 
                                            height="50" 
                                            style="border-radius: 5px; object-fit: cover;">
                                    </td>
                                </tr>
                            `);
                            });
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error('AJAX Error:', status, error);
                        alert('An error occurred while fetching products. Please check the console for details.');
                    }
                });
            }
        }

        // Initialize the first condition and product table on page load
        $(document).ready(function () {
            console.log('Page loaded, initializing first condition and product table');
            addCondition();
            updateProductTable();
        });

        // Load existing conditions if editing
        <?php if (isset($collection_id)): ?>
            $.get(`${baseUrl}admin-products/getConditions/${collection_id}`, function (data) {
                if (data.conditions) {
                    data.conditions.forEach(function (condition) {
                        addCondition();
                        let row = $('.condition-row').last();
                        row.find('.condition-field').val(condition.field).trigger('change');
                        setTimeout(function () {
                            row.find('.condition-operator').val(condition.operator);
                            row.find('.condition-value').val(condition.value);
                        }, 500); // Wait for options to load
                    });
                }
                if (data.conditionType) {
                    $(`input[name="conditionType"][value="${data.conditionType}"]`).prop('checked', true);
                }
                updateProductTable();
            });
        <?php endif; ?>

        $('#newcollectionsview').submit(function (e) {
            e.preventDefault();
            let formData = new FormData(this);

            // Add conditions to formData
            let conditions = [];
            $('.condition-row').each(function () {
                let condition = {
                    field: $(this).find('.condition-field').val(),
                    operator: $(this).find('.condition-operator').val(),
                    value: $(this).find('.condition-value').val()
                };
                if (condition.field && condition.operator && condition.value) {
                    conditions.push(condition);
                }
            });
            formData.append('conditions', JSON.stringify(conditions));
            formData.append('conditionType', $('input[name="conditionType"]:checked').val());

            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function (response) {
                    if (response.success) {
                        alert('Collection saved successfully!');
                        window.location.href = `${baseUrl}admin-products/editcollections/${response.collection_id}`;
                    } else {
                        alert('Error: ' + (response.error || 'Unknown error occurred'));
                    }
                },
                error: function (xhr, status, error) {
                    console.error('AJAX Error:', status, error);
                    alert('An error occurred while saving the collection. Please check the console for details.');
                }
            });
        });
    });

    $(document).ready(function () {
        let selectedProducts = [];
        let automatedProducts = [];
        let sortableInstance = null;
        let sortableTableInstance = null;
        const baseUrl = '<?= base_url() ?>';


        // Initialize sortable for manual sorting in selectedProducts
        function initSortable() {
            const selectedProductsElement = document.getElementById('selectedProducts');
            if (selectedProductsElement) {
                if (sortableInstance) {
                    try {
                        sortableInstance.destroy();
                    } catch (error) {
                        console.warn('Error destroying sortable instance:', error);
                    }
                }
                sortableInstance = new Sortable(selectedProductsElement, {
                    animation: 150,
                    onEnd: function () {
                        updateProductOrder('manual');
                    }
                });
            } else {
                console.warn('Selected products element not found');
            }
        }

        // Initialize sortable for automated sorting in productsTable
        function initSortableTable() {
            const productsTableBody = document.getElementById('productsTable')?.getElementsByTagName('tbody')[0];
            if (productsTableBody) {
                if (sortableTableInstance) {
                    try {
                        sortableTableInstance.destroy();
                    } catch (error) {
                        console.warn('Error destroying sortable table instance:', error);
                    }
                }
                sortableTableInstance = new Sortable(productsTableBody, {
                    animation: 150,
                    onEnd: function () {
                        updateProductOrder('automated');
                    }
                });
            } else {
                console.warn('Products table body not found');
            }
        }

        // Update product order and sortby input
        function updateProductOrder(section) {
            const sortbyInput = document.querySelector('input[name="sortBy"]');
            const sortbystatus = document.querySelector('input[name="sortbystatus"]');
            let productIds;

            if (section === 'manual') {
                productIds = $('#selectedProducts .selected-product-item').map(function () {
                    return $(this).data('id');
                }).get();
            } else if (section === 'automated') {
                productIds = $('#productsTable tbody tr').map(function () {
                    return $(this).data('id');
                }).get();
            }

            if (productIds && productIds.length > 0) {
                sortbyInput.value = JSON.stringify(productIds);
                sortbystatus.value = "Products Updated";
                console.log(`New order for ${section}:`, productIds);
            } else {
                console.log(`No products found for ${section}`);
                sortbystatus.value = "Sort Order is not Updated, Please refresh the List";
            }
        }


        // Sort products based on selected option
        function sortProducts(container, items, sortBy) {
            if (!container || !items || items.length === 0) {
                console.warn('Invalid container or items for sorting');
                return;
            }

            items.sort(function (a, b) {
                const aData = $(a).data();
                const bData = $(b).data();

                if (!aData || !bData) {
                    console.warn('Invalid product data:', aData, bData);
                    return 0;
                }

                switch (sortBy) {
                    case 'titleAZ':
                        return (aData.title || '').localeCompare(bData.title || '');
                    case 'titleZA':
                        return (bData.title || '').localeCompare(aData.title || '');
                    case 'priceHigh':
                        return (parseFloat(bData.price) || 0) - (parseFloat(aData.price) || 0);
                    case 'priceLow':
                        return (parseFloat(aData.price) || 0) - (parseFloat(bData.price) || 0);
                    case 'newest':
                        return new Date(bData.created || 0) - new Date(aData.created || 0);
                    case 'oldest':
                        return new Date(aData.created || 0) - new Date(bData.created || 0);
                    default:
                        return 0;
                }
            });

            container.empty();
            $.each(items, function (_, item) {
                container.append(item);
            });
        }

        // Handle sorting for manual section
        $('#sortProducts').change(function () {
            const sortBy = $(this).val();
            const $container = $('#selectedProducts');
            const $items = $container.children('.selected-product-item').get();

            if (sortBy === 'manually') {
                initSortable();
            } else {
                if (sortableInstance) {
                    try {
                        sortableInstance.destroy();
                    } catch (error) {
                        console.warn('Error destroying sortable instance:', error);
                    }
                    sortableInstance = null;
                }
                sortProducts($container, $items, sortBy);
            }

            updateProductOrder('manual');
        });


        // Handle sorting for automated section
        $('#sortProductsAutomated').change(function () {
            const sortBy = $(this).val();
            const $container = $('#productsTable tbody');
            const $items = $container.children('tr').get();

            if (sortBy === 'manually') {
                initSortableTable();
            } else {
                if (sortableTableInstance) {
                    try {
                        sortableTableInstance.destroy();
                    } catch (error) {
                        console.warn('Error destroying sortable table instance:', error);
                    }
                    sortableTableInstance = null;
                }
                sortProducts($container, $items, sortBy);
            }

            updateProductOrder('automated');
        });

        // Function to add product to selection (Manual section)
        function addProductToSelection(productId, title, price, image, created) {
            if (!selectedProducts.some(product => product.id === productId)) {
                selectedProducts.push({
                    id: productId,
                    title: title,
                    price: price,
                    image: image,
                    created: created
                });
                updateSelectedProductsView();
            }
        }

        // Function to remove product from selection (Manual section)
        function removeProductFromSelection(productId) {
            selectedProducts = selectedProducts.filter(product => product.id !== productId);
            updateSelectedProductsView();
        }

        // Function to update the selected products view (Manual section)
        function updateSelectedProductsView() {
            const $selectedProductsContainer = $('#selectedProducts');
            $selectedProductsContainer.empty();

            selectedProducts.forEach(product => {
                $selectedProductsContainer.append(`
                <div class="list-group-item selected-product-item" data-id="${product.id}" data-title="${product.title}" data-price="${product.price}" data-created="${product.created}">
                    <div class="row" style="display: flex; align-items: center;">
                        <img class="border-radius-100 shadow" src="${product.image}" alt="${product.title}" width="30" height="30">
                        <p class="col p-3" style="font-weight: 700; font-size: small; padding: 5px; margin: auto;">${product.title}</p>
                        <i class="icon-copy btn ion-trash-b remove-product" data-id="${product.id}"></i>
                    </div>
                </div>
            `);
            });

            initSortable();
            updateProductOrder('manual');
        }

        // Handle product checkbox change (Manual section)
        $(document).on('change', '.product-checkbox', function () {
            const $row = $(this).closest('tr');
            const productId = $(this).val();
            const productTitle = $row.find('td:nth-child(2)').text();
            const productPrice = parseFloat($row.find('td:nth-child(3)').text());
            const productImage = $row.find('td:nth-child(4) img').attr('src');
            const productCreated = $row.data('created');

            if ($(this).is(':checked')) {
                addProductToSelection(productId, productTitle, productPrice, productImage, productCreated);
            } else {
                removeProductFromSelection(productId);
            }

            $('#selectedProductscontainer').show();
        });

        // Handle product removal (Manual section)
        $(document).on('click', '.remove-product', function () {
            const productId = $(this).data('id');
            $(`#productstable input[value="${productId}"]`).prop('checked', false);
            removeProductFromSelection(productId);
        });

        // Function to show loader
        function showLoader() {
            $('#loader').show();
            $('#productsTable tbody').hide();
        }

        // Function to hide loader
        function hideLoader() {
            $('#loader').hide();
            $('#productsTable tbody').show();
        }


        $(document).on('click', '.refresh', updateProductTable);

        // Function to update product table (Automated section)
        function updateProductTable() {
            showLoader(); // Show loader before making the AJAX call

            let conditions = [];
            $('.condition-row').each(function () {
                let condition = {
                    field: $(this).find('.condition-field').val(),
                    operator: $(this).find('.condition-operator').val(),
                    value: $(this).find('.condition-value').val()
                };
                if (condition.field && condition.operator && condition.value) {
                    conditions.push(condition);
                }
            });

            let conditionType = $('input[name="conditionType"]:checked').val();

            console.log('Updating product table with conditions:', conditions);
            console.log('Condition type:', conditionType);

            if (conditions.length > 0) {
                $.ajax({
                    url: `${baseUrl}getProductsByConditions`,
                    type: 'POST',
                    data: {
                        conditions: JSON.stringify(conditions),
                        conditionType: conditionType,
                        sortBy: $('#sortProductsAutomated').val()
                    },
                    dataType: 'json',
                    success: function (response) {
                        console.log('Server response:', response);
                        let tableBody = $('#productsTable tbody');
                        tableBody.empty();

                        if (response.error) {
                            console.error('Server Error:', response.error);
                            tableBody.append('<tr><td colspan="3">An error occurred while fetching products. Please try again.</td></tr>');
                        } else if (response.products && Array.isArray(response.products) && response.products.length > 0) {
                            console.log('Products found:', response.products.length);
                            automatedProducts = response.products;
                            automatedProducts.forEach(function (product) {
                                tableBody.append(`
                                <tr class="selected-product-item" data-id="${product.product_id}" data-title="${product.product_title}" data-price="${product.cost_price}" data-created="${product.created_at}">
                                    <td>${product.product_title}</td>
                                    <td>${product.cost_price}</td>
                                   <td>
                                        <img src="${product.product_image}" 
                                            alt="${product.product_title}" 
                                            width="50" 
                                            height="50" 
                                            style="border-radius: 5px; object-fit: cover;">
                                    </td>
                                </tr>
                            `);
                            });
                            initSortableTable();
                            updateProductOrder('automated');
                        } else {
                            console.log('No products found or invalid response format');
                            tableBody.append('<tr><td colspan="3">No products found for the given conditions. Try adjusting your filters.</td></tr>');
                        }
                        hideLoader(); // Hide loader after processing the response
                    },
                    error: function (xhr, status, error) {
                        console.error('AJAX Error:', status, error);
                        let tableBody = $('#productsTable tbody');
                        tableBody.empty();
                        tableBody.append('<tr><td colspan="3">An error occurred while fetching products. Please try again later.</td></tr>');
                        hideLoader(); // Hide loader in case of error
                    }
                });
            } else {
                console.log('No conditions specified, fetching all products');
                fetchAllProducts();
            }
        }

        // Function to fetch all products when no conditions are specified
        function fetchAllProducts() {
            showLoader();

            $.ajax({
                url: `${baseUrl}getAllProducts`,
                type: 'GET',
                dataType: 'json',
                success: function (response) {
                    console.log('All products response:', response);
                    let tableBody = $('#productsTable tbody');
                    tableBody.empty();

                    if (response.products && Array.isArray(response.products) && response.products.length > 0) {
                        console.log('All products found:', response.products.length);
                        automatedProducts = response.products;
                        automatedProducts.forEach(function (product) {
                            tableBody.append(`
                            <tr class="selected-product-item" data-id="${product.product_id}" data-title="${product.product_title}" data-price="${product.cost_price}" data-created="${product.created_at}">
                                <td>${product.product_title}</td>
                                <td>${product.cost_price}</td>
                                <td>
                                    <img src="${product.product_image}" 
                                        alt="${product.product_title}" 
                                        width="50" 
                                        height="50" 
                                        style="border-radius: 5px; object-fit: cover;">
                                </td>
                            </tr>
                        `);
                        });
                        initSortableTable();
                        updateProductOrder('automated');
                    } else {
                        console.log('No products found in the database');
                        tableBody.append('<tr><td colspan="3">No products found in the database.</td></tr>');
                    }
                    hideLoader(); // Hide loader after processing the response
                },
                error: function (xhr, status, error) {
                    console.error('AJAX Error when fetching all products:', status, error);
                    let tableBody = $('#productsTable tbody');
                    tableBody.empty();
                    tableBody.append('<tr><td colspan="3">An error occurred while fetching products. Please try again later.</td></tr>');
                    hideLoader(); // Hide loader in case of error
                }
            });
        }

        $('input[name="selectMethod"]').change(function () {
            if ($(this).val() === 'automated') {
                $('#automatedSection').show();
                $('#manualSection').hide();
                updateProductTable(); // Load products for automated section
            } else {
                $('#automatedSection').hide();
                $('#manualSection').show();
                // Load products for manual section if needed
            }
        });


        // Initialize sortable on page load
        initSortable();
        initSortableTable();

        // Event listeners for condition changes
        $(document).on('change', '.condition-field, .condition-operator, .condition-value, input[name="conditionType"]', function () {
            console.log('Condition changed, updating product table');
            updateProductTable();
        });
        // Initialize sortby input with current product order on page load
        function initializeSortbyInput() {
            const sortbyInput = document.querySelector('input[name="sortBy"]');
            const selectedMethod = $('input[name="selectMethod"]:checked').val();

            if (selectedMethod === 'manual') {
                const manualProductIds = $('#selectedProducts .selected-product-item').map(function () {
                    return $(this).data('id');
                }).get();
                sortbyInput.value = JSON.stringify(manualProductIds);
            } else if (selectedMethod === 'automated') {
                const automatedProductIds = $('#productsTable tbody tr').map(function () {
                    return $(this).data('id');
                }).get();
                sortbyInput.value = JSON.stringify(automatedProductIds);
            }
        }

        // Call initializeSortbyInput on page load and when switching between manual and automated
        initializeSortbyInput();
        $('input[name="selectMethod"]:checked').change();
    });
</script>


<script>
    $(document).ready(function () {
        var baseUrl = '<?= base_url() ?>';
        var selectedTags = [];
        var selectedProducts = [];

        // Toggle between automated and manual method
        $('input[name="selectMethod"]').change(function () {
            var method = $(this).val();
            if (method === 'automated') {
                $('#automatedSection').show();
                $('#manualSection').hide();
                $('#selectAllHeader').hide();
                $('#Manual').hide();
                $('#productsTableSection').hide();
                $('#selectedProductscontainer').hide();
                selectedProducts = [];
                updateSelectedProductsView();
            } else if (method === 'manual') {
                $('#automatedSection').hide();
                $('#Automated').hide();
                $('#manualSection').show();
                $('#selectAllHeader').show();
                loadAllProducts();
            }
        });

        $('#product_tags').change(function () {
            var selectedTag = $(this).val();
            if (selectedTag && !selectedTags.some(tag => tag.value === selectedTag)) {
                selectedTags.push({
                    value: selectedTag,
                    operator: selectedTags.length > 0 ? 'AND' : ''
                });
                updateSelectedTags();
                updateProductTable();
                $(this).val('');
                $('#addTagButton').show();
                $('#productsTableSection').show();
            }
        });

        $('#addTagButton').click(function () {
            var operatorHtml = `
            <select class="badge badge-pill tag-operator">
                <option selected value="AND">AND</option>
                <option value="OR">OR</option>
            </select>
        `;
            var tagSelectorHtml = createTagSelector();
            $('#selectedTags').append(operatorHtml + tagSelectorHtml);
        });

        function createTagSelector() {
            var options = $('#product_tags option').filter(function () {
                return !selectedTags.some(tag => tag.value === $(this).val());
            }).clone();

            var select = $('<select>', {
                class: 'custom-select2 form-control new-tag-selector',
                style: 'width: 100%; height: 38px'
            });
            //select.append($('<option>', { value: '', text: 'Select' }));
            select.append(options);

            return select[0].outerHTML;
        }

        $(document).on('change', '.new-tag-selector', function () {
            var selectedTag = $(this).val();
            var operator = $(this).prev('.tag-operator').val();
            if (selectedTag && !selectedTags.some(tag => tag.value === selectedTag)) {
                selectedTags.push({
                    value: selectedTag,
                    operator: operator
                });
                updateSelectedTags();
                updateProductTable();
                $(this).closest('.tag-group').remove();
                $('#addTagButton').show();
            }
        });

        function updateSelectedTags() {
            var tagsHtml = selectedTags.map((tag, index) =>
                `<span class="selected-tag badge badge-pill">
                ${index > 0 ? tag.operator + ' ' : ''}
                <span class="selected-tag p-2 badge-pill" style="background: #265ed742;">${tag.value}
                <i class="icon-copy fa fa-close remove-tag" data-index="${index}" aria-hidden="true"></i>
                </span>
            </span>`
            ).join('');
            $('#selectedTags').html(tagsHtml);
        }

        $(document).on('click', '.remove-tag', function () {
            var index = $(this).data('index');
            selectedTags.splice(index, 1);
            updateSelectedTags();
            updateProductTable();
            if (selectedTags.length === 0) {
                $('#addTagButton').hide();
                $('#productsTableSection').hide();
            }
        });

        $(document).on('change', '.tag-operator', function () {
            var index = $(this).closest('.selected-tag').index();
            selectedTags[index].operator = $(this).val();
            updateProductTable();
        });

        // Load all products function
        function loadAllProducts() {
            var loader = $('#loader');
            var productsTableBody = $('#productstable tbody');

            loader.show();

            $.ajax({
                url: baseUrl + 'getAllProducts',
                method: 'GET',
                dataType: 'json',
                success: function (response) {
                    productsTableBody.empty();
                    $.each(response, function (index, product) {
                        productsTableBody.append(`
                        <tr>
                            <td class=" dt-body-center">
                                <div class="dt-checkbox">
                                    <input type="checkbox" class="product-checkbox" name="products[]" value="${product.product_id}">
                                    <span class="dt-checkbox-label"></span>
                                </div>                                
                            </td>
                            <td>${product.product_title}</td>
                            <td>${product.cost_price}</td>
                            <td>
                                <img src="${product.product_image}" 
                                    alt="${product.product_title}" 
                                    width="50" 
                                    height="50" 
                                    style="border-radius: 5px; object-fit: cover;">
                            </td>
                        </tr>
                    `);
                    });
                },
                complete: function () {
                    loader.hide();
                }
            });
        }

        $('#searchProducts').on('input', function () {
            var searchTerm = $(this).val().toLowerCase();
            $('#productstable tbody tr').each(function () {
                var title = $(this).find('td:nth-child(2)').text().toLowerCase();
                $(this).toggle(title.includes(searchTerm));
                $('#productsTableSection').show();
            });
        });

        // Handle individual checkbox change
        $(document).on('change', '.product-checkbox', function () {
            var productId = $(this).val();
            var productTitle = $(this).closest('tr').find('td:nth-child(2)').text();
            var productPrice = $(this).closest('tr').find('td:nth-child(3)').text();
            var productImage = $(this).closest('tr').find('td:nth-child(4) img').attr('src');

            if ($(this).is(':checked')) {
                addProductToSelection(productId, productTitle, productPrice, productImage);
            } else {
                removeProductFromSelection(productId);
            }

            $('#selectedProductscontainer').show();
            updateSelectedProductsView();
        });

        // Function to add product to selectedProducts
        function addProductToSelection(productId, title, price, image) {
            if (!selectedProducts.some(product => product.id === productId)) {
                selectedProducts.push({
                    id: productId,
                    title: title,
                    price: price,
                    image: image
                });
            }
        }

        // Function to remove product from selectedProducts
        function removeProductFromSelection(productId) {
            selectedProducts = selectedProducts.filter(product => product.id !== productId);
        }

        // Function to update the selected products view
        function updateSelectedProductsView() {
            var selectedProductsHtml = selectedProducts.map(product =>
                `<div class="list-group-item selected-product-item" data-id="${product.id}" data-title="${product.title}" data-price="${product.price}" data-created="${product.created}">
                <div class="row" style="display: flex; align-items: center;">
                    <img class="border-radius-100 shadow" src="${product.image}" alt="${product.title}" style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover;">
                    <p class="col p-3" style="font-weight: 700; font-size: small; padding: 5px; margin: auto;">${product.title}</p>
                    <i class="icon-copy btn ion-trash-b remove-product" data-id="${product.id}"></i>
                </div>
            </div>`
            ).join('');

            $('#selectedProducts').html(selectedProductsHtml);
        }

        // Remove selected products individually when clicking the remove button
        $(document).on('click', '.remove-product', function () {
            var productId = $(this).data('id');
            selectedProducts = selectedProducts.filter(product => product.id !== productId);

            // Uncheck the corresponding checkbox in the products table
            $(`#productstable input[value="${productId}"]`).prop('checked', false);

            updateSelectedProductsView();
        });

        // Handle 'select all' checkbox change
        $('#select_all').change(function () {
            var isChecked = $(this).prop('checked');
            var visibleCheckboxes = $('#productstable tbody tr:visible .product-checkbox');

            visibleCheckboxes.prop('checked', isChecked);

            visibleCheckboxes.each(function () {
                var productId = $(this).val();
                var productTitle = $(this).closest('tr').find('td:nth-child(2)').text();
                var productPrice = $(this).closest('tr').find('td:nth-child(3)').text();
                var productImage = $(this).closest('tr').find('td:nth-child(4) img').attr('src');

                if (isChecked) {
                    addProductToSelection(productId, productTitle, productPrice, productImage);
                } else {
                    removeProductFromSelection(productId);
                }
            });

            updateSelectedProductsView();
        });

        // Handle product removal when clicking the remove button
        $(document).on('click', '.remove-product', function () {
            var productId = $(this).data('id');

            $(`#productstable input[value="${productId}"]`).prop('checked', false);

            removeProductFromSelection(productId);

            updateSelectedProductsView();
        });
    });
</script>

<script>
    function goBack() {

        window.history.back();
    }
</script>

<script>
    function fetchProducts(collectionId) {
        let productList = document.getElementById('product-list');
        productList.innerHTML = ''; // Clear previous products

        if (!collectionId) return;

        fetch('<?= base_url('RelatedproductController/fetchProducts') ?>', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: new URLSearchParams({ collection_id: collectionId })
        })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success' && data.products.length > 0) {
                    data.products.forEach(product => {
                        let productCard = `
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <img src="${product.product_image}" class="card-img-top" alt="${product.product_title}" style="width: 100px; height: 100px; object-fit: cover; margin: auto;">
                            <div class="card-body">
                                <h6 class="card-title">${product.product_title}</h6>
                                <p class="card-text">Price: ₹${product.selling_price}</p>
                                <p class="card-text">Inventory: ${product.inventory}</p>
                            </div>
                        </div>
                    </div>
                `;
                        productList.innerHTML += productCard;
                    });
                } else {
                    productList.innerHTML = '<div class="col-md-12"><p>No products found for this collection.</p></div>';
                }
            })
            .catch(error => console.error('Error fetching products:', error));
    }
</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const collectionDropdown = document.getElementById("collection");
        const automatedRadio = document.getElementById("customRadio4");
        const manualRadio = document.getElementById("customRadio5");

        function disableSelectionMethods() {
            automatedRadio.disabled = true;
            manualRadio.disabled = true;
            automatedRadio.checked = false;
            manualRadio.checked = false;
        }

        function enableSelectionMethods() {
            automatedRadio.disabled = false;
            manualRadio.disabled = false;
        }

        function disableCollection() {
            collectionDropdown.disabled = true;
            collectionDropdown.value = ""; // Reset the collection selection
        }

        function enableCollection() {
            collectionDropdown.disabled = false;
        }

        // When collection is selected
        collectionDropdown.addEventListener("change", function () {
            if (this.value) {
                disableSelectionMethods(); // Disable Automated & Manual
            } else {
                enableSelectionMethods(); // Enable them if no collection selected
            }
        });

        // When Automated or Manual is selected
        automatedRadio.addEventListener("change", function () {
            if (this.checked) {
                disableCollection();
            }
        });

        manualRadio.addEventListener("change", function () {
            if (this.checked) {
                disableCollection();
            }
        });

        // Ensure correct state on page load (for edit mode)
        if (collectionDropdown.value) {
            disableSelectionMethods();
        }
    });    
</script>