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
                <div class="pd-20 card-box mb-30">
                    <div class="clearfix">
                        <div class="pull-left">
                            <h4 class="text-blue h4">Edit Company</h4>
                            <p class="mb-30">Update the company details below</p>
                        </div>
                    </div>
                    <form id="edit_customer_segment_form" method="post"
                        action="<?= base_url('customer_segment/updatesegment/' . $segment['segment_id']) ?>"
                        enctype="multipart/form-data">


                        <div class="d-flex justify-content-end">
                            <a href="<?= base_url() ?>customersegment/customersegment_logs/<?= $segment['segment_id'] ?>"
                                class="btn btn-outline-primary rounded-circle shadow-sm d-flex align-items-center justify-content-center"
                                style="width: 32px; height: 32px;"
                                data-toggle="tooltip"
                                data-placement="top"
                                title="View Customer Segment Logs">
                                <i class="fa-solid fa-ellipsis-vertical fa-sm"></i>
                            </a>
                        </div>

                        <!-- Segment Name -->
                        <div class="form-group">
                            <label for="segment_name">Segment Name</label>
                            <input class="form-control" id="segment_name" name="segment_name" type="text"
                                placeholder="Enter the name of the segment (e.g., High-Spenders)"
                                value="<?= $segment['segment_name'] ?>" required>
                            <div class="text-danger mt-1" id="segment_name_error"></div>
                        </div>

                        <!-- Segment Description -->
                        <div class="form-group">
                            <label for="segment_description">Segment Description</label>
                            <textarea class="form-control" id="segment_description" name="segment_description" rows="4"
                                placeholder="Provide a brief description of the segment's purpose"
                                required><?= $segment['segment_description'] ?></textarea>
                            <div class="text-danger mt-1" id="segment_description_error"></div>
                        </div>

                        <!-- Segment Type -->
                        <div class="form-group">
                            <label for="segment_type">Segment Type</label>
                            <select class="form-control" id="segment_type" name="segment_type" required>
                                <option value="static" <?= $segment['segment_type'] === 'static' ? 'selected' : '' ?>>
                                    Static (Manual Selection)</option>
                                <option value="dynamic" <?= $segment['segment_type'] === 'dynamic' ? 'selected' : '' ?>>
                                    Dynamic (Based on Criteria)</option>
                            </select>
                            <div class="text-danger mt-1" id="segment_type_error"></div>
                        </div>

                        <!-- Created By -->
                        <div class="form-group">
                            <label for="created_by">Created By</label>
                            <input type="text" class="form-control" id="created_by" name="created_by" readonly
                                value="<?= $segment['created_by'] ?>">
                        </div>
                </div>
                <div class="pd-20 card-box mb-30">
                    <h4>Select Filters</h4>
                    <div class="form-group">
                        <label for="filter_selection">Filters</label>
                        <select id="filter_selection" class="form-control select2">
                            <option value="">Select</option>
                            <?php
                            // Available filters
                            $availableFilters = [
                                'age' => 'Age Range',
                                'gender' => 'Gender',
                                'location' => 'Location',
                                'language' => 'Preferred Language',
                                'purchase_value' => 'Total Purchase Value',
                                'orders' => 'Number of Orders',
                            ];

                            // Ensure filters are decoded
                            $filters = json_decode($segment['filters'], true);

                            foreach ($availableFilters as $key => $label) {
                                $selected = isset($filters[$key]) ? 'selected' : '';
                                echo "<option value=\"$key\" $selected>$label</option>";
                            }
                            ?>
                        </select>
                        <small class="form-text text-muted">Select one or more filters to customize the segment.</small>
                    </div>
                </div>

                <!-- Filter Fields -->
                <div id="filters_section" class="pd-20 card-box mb-30">
                    <h4>Filters</h4>
                    <?php $filters = json_decode($segment['filters'], true); ?>

                    <!-- Age Filter -->
                    <div class="form-group filter-group" data-filter="age"
                        style="display: <?= isset($filters['age']) ? 'block' : 'none' ?>;">
                        <label>Age Range</label>
                        <div class="d-flex">
                            <input class="form-control me-2" name="age_min" type="number" placeholder="Min Age"
                                value="<?= $filters['age']['min'] ?? '' ?>">
                            <input class="form-control" name="age_max" type="number" placeholder="Max Age"
                                value="<?= $filters['age']['max'] ?? '' ?>">
                        </div>
                    </div>

                    <!-- Gender Filter -->
                    <div class="form-group filter-group" data-filter="gender"
                        style="display: <?= isset($filters['gender']) ? 'block' : 'none' ?>;">
                        <label>Gender</label>
                        <select class="form-control" name="gender">
                            <option value="">All</option>
                            <option value="male" <?= isset($filters['gender']) && $filters['gender'] === 'male' ? 'selected' : '' ?>>Male</option>
                            <option value="female" <?= isset($filters['gender']) && $filters['gender'] === 'female' ? 'selected' : '' ?>>Female</option>
                            <option value="non_binary" <?= isset($filters['gender']) && $filters['gender'] === 'non_binary' ? 'selected' : '' ?>>Non-binary</option>
                            <option value="other" <?= isset($filters['gender']) && $filters['gender'] === 'other' ? 'selected' : '' ?>>Other</option>
                        </select>
                    </div>

                    <!-- Location Filter -->
                    <div class="form-group filter-group" data-filter="location"
                        style="display: <?= isset($filters['location']) ? 'block' : 'none' ?>;">
                        <label>Location</label>
                        <div class="row">
                            <div class="col-md-3">
                                <input class="form-control" name="country" type="text" placeholder="Country"
                                    value="<?= $filters['location']['country'] ?? '' ?>">
                            </div>
                            <div class="col-md-3">
                                <input class="form-control" name="state" type="text" placeholder="State"
                                    value="<?= $filters['location']['state'] ?? '' ?>">
                            </div>
                            <div class="col-md-3">
                                <input class="form-control" name="city" type="text" placeholder="City"
                                    value="<?= $filters['location']['city'] ?? '' ?>">
                            </div>
                            <div class="col-md-3">
                                <input class="form-control" name="postal_code" type="text" placeholder="Postal Code"
                                    value="<?= $filters['location']['postal_code'] ?? '' ?>">
                            </div>
                        </div>
                    </div>

                    <!-- Language Filter -->
                    <div class="form-group filter-group" data-filter="language"
                        style="display: <?= isset($filters['language']) ? 'block' : 'none' ?>;">
                        <label>Preferred Language</label>
                        <input class="form-control" name="language" type="text" placeholder="Enter preferred language"
                            value="<?= $filters['language'] ?? '' ?>">
                    </div>

                    <!-- Total Purchase Value -->
                    <div class="form-group filter-group" data-filter="purchase_value"
                        style="display: <?= isset($filters['purchase_value']) ? 'block' : 'none' ?>;">
                        <label>Total Purchase Value</label>
                        <div class="d-flex">
                            <input class="form-control me-2" name="purchase_min" type="number" placeholder="Min Value"
                                value="<?= $filters['purchase_value']['purchase_min'] ?? '' ?>">
                            <input class="form-control" name="purchase_max" type="number" placeholder="Max Value"
                                value="<?= $filters['purchase_value']['purchase_max'] ?? '' ?>">
                        </div>
                    </div>

                    <!-- Number of Orders -->
                    <div class="form-group filter-group" data-filter="orders"
                        style="display: <?= isset($filters['orders']) ? 'block' : 'none' ?>;">
                        <label>Number of Orders</label>
                        <input class="form-control" name="orders_min" type="number" placeholder="Min Orders"
                            value="<?= $filters['orders']['orders_min'] ?? '' ?>">
                    </div>
                </div>

                <!-- Filtered Users -->
                <div class="pd-20 card-box mb-30">
                    <h4>Filtered Users</h4>
                    <div class="form-group">
                        <label for="filtered_users">Filtered Users</label>
                        <select id="filtered_users" name="filtered_users[]" class="form-control select2" multiple>
                            <?php $filteredUsers = explode(',', $segment['filtered_users']); ?>
                            <?php foreach ($users as $user): ?>
                                <option value="<?= $user['user_id'] ?>" <?= in_array($user['user_id'], $filteredUsers) ? 'selected' : '' ?>>
                                    <?= $user['name'] ?> (<?= $user['email'] ?>)
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <!-- Buttons -->
                <div class="text-center">
                    <button type="button" id="apply_filters" class="btn btn-secondary btn-lg">Apply
                        Filters</button>
                    <button type="submit" class="btn btn-primary btn-lg">Update Segment</button>
                </div>
                </form>
            </div>
        </div>
        <!-- Page Main Content End -->

        <!-- Footer View Start -->
        <?= $this->include('footer_view') ?>
        <!-- Footer View End -->

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
                const form = document.getElementById('edit_customer_segment_form');

                if (!form) {
                    alert('Form not found.');
                    return;
                }

                const formData = new FormData(form);

                // Ensure at least one filter is applied
                const hasFilters = [...formData.entries()].some(([key, value]) => key !== 'filtered_users' && value.trim() !== '');
                if (!hasFilters) {
                    alert('Please provide values for at least one filter.');
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



</body>