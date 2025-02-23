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
                        <button type="button" class="btn btn-secondary mr-3" onclick="goBack()">
                            <i class="fa fa-arrow-left"></i>
                        </button>
                        <h4 class="h4 mb-0">Add Customer Segment</h4>
                    </div>
                </div>

                <!-- Segment Details -->
                <div class="pd-20 card-box mb-30">
                    <form id="customer_segment_form" method="post"
                        action="<?= base_url('customer_segment/savesegmentdata') ?>" enctype="multipart/form-data">
                        <!-- Segment Name -->
                        <div class="form-group">
                            <label for="segment_name">Segment Name</label>
                            <input class="form-control" id="segment_name" name="segment_name" type="text"
                                placeholder="Enter the name of the segment (e.g., High-Spenders)"
                                value="<?= old('segment_name') ?>" required>
                            <div class="text-danger mt-1" id="segment_name_error"></div>
                        </div>

                        <!-- Segment Description -->
                        <div class="form-group">
                            <label for="segment_description">Segment Description</label>
                            <textarea class="form-control" id="segment_description" name="segment_description" rows="4"
                                placeholder="Provide a brief description of the segment's purpose"
                                required><?= old('segment_description') ?></textarea>
                            <div class="text-danger mt-1" id="segment_description_error"></div>
                        </div>

                        <!-- Segment Type -->
                        <div class="form-group">
                            <label for="segment_type">Segment Type</label>
                            <select class="form-control" id="segment_type" name="segment_type" required>
                                <option value="static" <?= old('segment_type') === 'static' ? 'selected' : '' ?>>Static
                                    (Manual Selection)</option>
                                <option value="dynamic" <?= old('segment_type') === 'dynamic' ? 'selected' : '' ?>>Dynamic
                                    (Based on Criteria)</option>
                            </select>
                            <div class="text-danger mt-1" id="segment_type_error"></div>
                        </div>

                        <!-- Created By -->
                        <div class="form-group">
                            <label for="created_by">Created By</label>
                            <input type="text" class="form-control" id="created_by" name="created_by" readonly required>
                        </div>

                        <script>
                            const loggedInUser = "<?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?>";
                            document.getElementById('created_by').value = loggedInUser;
                        </script>
                </div>
                <!-- Filters Dropdown -->
                <div class="pd-20 card-box mb-30">
                    <h4>Select Filters</h4>
                    <div class="form-group">
                        <label for="filter_selection">Filters</label>
                        <select id="filter_selection" class="form-control select2">
                            <option value="">Select</option>
                            <option value="age">Age Range</option>
                            <option value="gender">Gender</option>
                            <option value="location">Location</option>
                            <option value="language">Preferred Language</option>
                            <option value="purchase_value">Total Purchase Value</option>
                            <option value="orders">Number of Orders</option>
                        </select>
                        <small class="form-text text-muted">Select one or more filters to customize the
                            segment.</small>
                    </div>
                </div>

                <!-- Filter Fields -->
                <div id="filters_section" class="pd-20 card-box mb-30">
                    <h4>Filters</h4>

                    <!-- Age Filter -->
                    <div class="form-group filter-group" data-filter="age" style="display: none;">
                        <label>Age Range</label>
                        <div class="d-flex">
                            <input class="form-control me-2" name="age_min" type="number" placeholder="Min Age">
                            <input class="form-control" name="age_max" type="number" placeholder="Max Age">
                        </div>
                    </div>

                    <!-- Gender Filter -->
                    <div class="form-group filter-group" data-filter="gender" style="display: none;">
                        <label>Gender</label>
                        <select class="form-control" name="gender">
                            <option value="">All</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="non_binary">Non-binary</option>
                            <option value="other">Other</option>
                        </select>
                    </div>

                    <!-- Location Filter -->
                    <div class="form-group filter-group" data-filter="location" style="display: none;">
                        <label>Location</label>
                        <div class="row">
                            <div class="col-md-3">
                                <input class="form-control" name="country" type="text" placeholder="Country">
                            </div>
                            <div class="col-md-3">
                                <input class="form-control" name="state" type="text" placeholder="State">
                            </div>
                            <div class="col-md-3">
                                <input class="form-control" name="city" type="text" placeholder="City">
                            </div>
                            <div class="col-md-3">
                                <input class="form-control" name="postal_code" type="text" placeholder="Postal Code">
                            </div>
                        </div>
                    </div>

                    <!-- Language Filter -->
                    <div class="form-group filter-group" data-filter="language" style="display: none;">
                        <label>Preferred Language</label>
                        <input class="form-control" name="language" type="text" placeholder="Enter preferred language">
                    </div>

                    <!-- Total Purchase Value -->
                    <div class="form-group filter-group" data-filter="purchase_value" style="display: none;">
                        <label>Total Purchase Value</label>
                        <div class="d-flex">
                            <input class="form-control me-2" name="purchase_min" type="number" placeholder="Min Value">
                            <input class="form-control" name="purchase_max" type="number" placeholder="Max Value">
                        </div>
                    </div>

                    <!-- Number of Orders -->
                    <div class="form-group filter-group" data-filter="orders" style="display: none;">
                        <label>Number of Orders</label>
                        <div class="d-flex">
                            <input class="form-control" name="orders_min" type="number" placeholder="Min Orders">
                            <input class="form-control" name="orders_max" type="number" placeholder="Max Orders">
                        </div>
                    </div>
                </div>

                <!-- Filtered Users -->
                <div class="pd-20 card-box mb-30">
                    <h4>Filtered Users</h4>
                    <div class="form-group">
                        <label for="filtered_users">Filtered Users</label>
                        <select id="filtered_users" name="filtered_users[]" class="form-control select2">
                            <!-- Dynamically populated based on filters -->
                        </select>
                    </div>
                </div>

                <!-- Buttons -->
                <div class="text-center">
                    <button type="button" id="apply_filters" class="btn btn-secondary btn-lg">Apply
                        Filters</button>
                    <button type="submit" class="btn btn-primary btn-lg">Save Segment</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Main Content End -->

    <!-- Footer View Start -->
    <?= $this->include('footer_view') ?>
    <!-- Footer View End -->


    <script>
        document.getElementById('filter_selection').addEventListener('change', (event) => {
            const selectedFilters = Array.from(event.target.selectedOptions).map(option => option.value);
            document.querySelectorAll('.filter-group').forEach(group => {
                const filterType = group.dataset.filter;
                if (selectedFilters.includes(filterType)) {
                    group.style.display = 'block';
                } else {
                    group.style.display = 'none';
                }
            });
        });

        // Handle Apply Filters Button
        document.getElementById('apply_filters').addEventListener('click', () => {
            const form = document.getElementById('customer_segment_form');
            const formData = new FormData(form);

            // Check if at least one filter has a value
            const hasFilters = [...formData.entries()].some(([key, value]) => value.trim() !== '');
            if (!hasFilters) {
                alert('Please select at least one filter to apply.');
                return;
            }

            fetch('<?= base_url("customer_segment/apply_filters") ?>', {
                    method: 'POST',
                    body: formData,
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`Server responded with status ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    const filteredUsers = document.getElementById('filtered_users');
                    filteredUsers.innerHTML = '';
                    data.forEach(user => {
                        const option = document.createElement('option');
                        option.value = user.user_id;
                        option.textContent = `${user.name} (${user.email})`;
                        filteredUsers.appendChild(option);
                    });
                })
                .catch(error => {
                    console.error('Error fetching filtered users:', error);
                    alert('An error occurred while applying filters. Please try again.');
                });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#user_ids').select2({
                placeholder: "Select users",
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

    <!-- Include jQuery and Select2 JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#product-tags').select2({
                placeholder: 'Select Tags', // Optional: placeholder for the dropdown
                allowClear: true // Optional: allow clearing the selection
            });
        });
    </script>

</body>