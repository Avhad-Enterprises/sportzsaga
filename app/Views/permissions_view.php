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

    <?php
    $tableSectionMapping = [
        'users' => 'Customers',
        'products' => 'Product Management',
        'order_management' => 'Order Management',
        'blogs' => 'Blog Management',
        'pincode_mapping' => 'Pincode Mapping',
        'order_shipment' => 'BlueDart Management',
        'suppliers' => 'Supplier ',
        'bundles' => 'Bundle',
        'product_collections' => 'Bundle Lines Management',
        'tier_1' => 'Tier 1',
        'tier_2' => 'Tier 2',
        'tier_3' => 'Tier 3',
        'tier_4' => 'Tier 4',
        'collection' => 'Collections Management',
        'catalogs' => 'Catalog Management',
        'inventory' => 'Inventory ',
        'transfer_inventory' => 'Transfere',
        'purchase_orders' => 'Purchase Order',
    ];
    ?>

    <div class="main-container">
        <div class="container mt-4">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h5>Manage Permissions</h5>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <!-- User Dropdown -->
                        <div class="col-md-6">
                            <label for="user">Select User</label>
                            <select id="user" class="form-control select2">
                                <option value="">Select User</option>
                                <!-- Dynamically populated -->
                            </select>
                        </div>

                        <!-- Section Dropdown -->
                        <div class="col-md-6">
                            <label for="sections">Select Section</label>
                            <select id="sections" class="form-control select2">
                                <option value="">Select Section</option>
                                <!-- Dynamically populated -->
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <h6 class="text-primary">Field Permissions</h6>
                            <div id="fields-container" class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead class="bg-light">
                                        <tr>
                                            <th>Field</th>
                                            <th>
                                                <input type="checkbox" id="select-all-view" class="select-all" data-action="view"> View
                                            </th>
                                            <th>
                                                <input type="checkbox" id="select-all-edit" class="select-all" data-action="edit"> Edit
                                            </th>                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td colspan="6" class="text-muted">Select a user and section to view fields.</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-4">
                            <button id="save-permissions" class="btn btn-success btn-block">Save Permissions</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer View Start -->
        <?= $this->include('footer_view') ?>
        <!-- Footer View End -->

        <!-- Include necessary JS libraries -->
        <script>
            $(document).ready(function () {
                // Initialize Select2 for dropdowns
                $('#user, #sections').select2({
                    placeholder: 'Select an option',
                    allowClear: true,
                });

                fetchUsers(); // Populate user dropdown
                fetchSections(); // Populate section dropdown

                // Fetch fields when a section is selected
                $('#sections').change(function () {
                    const userId = $('#user').val();
                    const tableName = $(this).val();
                    if (userId && tableName) {
                        fetchFields(userId, tableName);
                    } else {
                        clearFields();
                    }
                });

                // Save permissions
                $('#save-permissions').on('click', function () {
                    const userId = $('#user').val();
                    const permissions = [];

                    // Collect field-based permissions
                    $('#fields-container .field-checkbox:checked').each(function () {
                        permissions.push({
                            table: $(this).data('table'),
                            column: $(this).data('column') || '*',
                            action: $(this).data('action'),
                        });
                    });

                    // Collect delete, import, export permissions
                    $('#fields-container .delete-checkbox:checked, #fields-container .import-checkbox:checked, #fields-container .export-checkbox:checked, #fields-container .logs-checkbox:checked').each(function () {
                        permissions.push({
                            table: $(this).data('table'),
                            column: '*',
                            action: $(this).data('action'),
                        });
                    });

                    if (userId && permissions.length) {
                        $.post('permissions/savePermissions', { user_id: userId, permissions }, function (response) {
                            alert(response.message);
                        }, 'json');
                    } else {
                        alert('Please select a user, section, and at least one permission.');
                    }
                });

                // Fetch users
                function fetchUsers() {
                    $.get('permissions/fetchUsers', function (data) {
                        if (data.length) {
                            let userOptions = '<option value="">Select User</option>';
                            data.forEach(user => {
                                userOptions += `<option value="${user.user_id}">${user.email}</option>`;
                            });
                            $('#user').html(userOptions);
                        } else {
                            alert('No users found.');
                        }
                    }).fail(function () {
                        alert('Error fetching users.');
                    });
                }

                // Fetch sections
                function fetchSections() {
                    const tableSectionMapping = {

                        'users': 'Customers',
                        'products': 'Product Management',
                        'order_management': 'Order Management',
                        'blogs': 'Blog Management',
                        'pincode_mapping': 'Pincode Mapping',
                        'order_shipment': 'BlueDart Management',
                        'suppliers': 'Supplier ',
                        'bundles': 'Bundle',
                        'product_collections': 'Bundle Lines Management',
                        'tier_1': 'Tier 1',
                        'tier_2': 'Tier 2',
                        'tier_3': 'Tier 3',
                        'tier_4': 'Tier 4',
                        'collection': 'Collections Management',
                        'catalogs': 'Catalog Management',
                        'inventory': 'Inventory',
                        'transfer_inventory': 'Transfere',
                        'purchase_orders': 'Purchase Order',
                    };
                    let sectionOptions = '<option value="">Select Section</option>';
                    Object.keys(tableSectionMapping).forEach(table => {
                        sectionOptions += `<option value="${table}">${tableSectionMapping[table]}</option>`;
                    });
                    $('#sections').html(sectionOptions);
                }

                // Fetch fields
                function fetchFields(userId, tableName) {
                    $.get(`permissions/fetchColumns/${tableName}`, function (data) {
                        if (data.length) {
                            let fieldsHtml = '';
                            data.forEach(field => {
                                fieldsHtml += `
                        <tr>
                            <td>${field.column_name}</td>
                            <td><input type="checkbox" class="field-checkbox" data-table="${tableName}" data-column="${field.column_name}" data-action="view"></td>
                            <td><input type="checkbox" class="field-checkbox" data-table="${tableName}" data-column="${field.column_name}" data-action="edit"></td>
                        </tr>`;
                            });

                            // Add delete, import, and export checkboxes at the end
                            fieldsHtml += ` 
                                <tr>
                                    <td colspan="3" class="text-center font-weight-bold text-primary">Actions</td>
                                </tr>
                                <tr>
                                    <td>Delete</td>
                                    <td colspan="2"><input type="checkbox" class="delete-checkbox" data-table="${tableName}" data-action="delete"></td>
                                </tr>
                                <tr>
                                    <td>Import</td>
                                    <td colspan="2"><input type="checkbox" class="import-checkbox" data-table="${tableName}" data-action="import"></td>
                                </tr>
                                <tr>
                                    <td>Export</td>
                                    <td colspan="2"><input type="checkbox" class="export-checkbox" data-table="${tableName}" data-action="export"></td>
                                </tr>
                                <tr>
                                    <td>Logs</td>
                                    <td colspan="2"><input type="checkbox" class="logs-checkbox" data-table="${tableName}" data-action="logs"></td>
                                </tr>`;

                            $('#fields-container tbody').html(fieldsHtml);
                        } else {
                            clearFields();
                            alert('No fields found for the selected section.');
                        }
                    }).fail(function () {
                        alert('Error fetching fields.');
                    });
                }

                // Clear fields container
                function clearFields() {
                    $('#fields-container tbody').html(`
                    <tr>
                        <td colspan="6" class="text-muted">Select a user and section to view fields.</td>
                    </tr>`);
                        }

                        // Select All functionality
                        $(document).on('change', '.select-all', function () {
                            const action = $(this).data('action');
                            const isChecked = $(this).is(':checked');
                            // Check/uncheck all fields for that action
                            $(`.field-checkbox[data-action="${action}"]`).prop('checked', isChecked);
                        });
                });
        </script>

        <!-- Include Select2 CSS and JS -->
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        <style>
            .table {
                background: #f9f9f9;
                border-radius: 8px;
                border: 1px solid #ddd;
            }

            .table th,
            .table td {
                text-align: center;
                vertical-align: middle;
            }

            .select-all {
                cursor: pointer;
            }
        </style>
    </div>
</body>
