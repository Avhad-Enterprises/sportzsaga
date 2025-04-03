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
                    <form id="edit_company_form" method="post"
                        action="<?= base_url('company/update_company/' . $company['id']) ?>"
                        enctype="multipart/form-data">


                        <div class="d-flex justify-content-end">
                            <a href="<?= base_url() ?>company/company_logs/<?= $company['id'] ?>"
                                class="btn btn-outline-primary rounded-circle shadow-sm d-flex align-items-center justify-content-center"
                                style="width: 32px; height: 32px;"
                                data-toggle="tooltip"
                                data-placement="top"
                                title="View Company Logs">
                                <i class="fa-solid fa-ellipsis-vertical fa-sm"></i>
                            </a>
                        </div>
                        <!-- Company Name -->
                        <div class="form-group">
                            <label for="company_name">Company Name</label>
                            <input class="form-control" id="company_name" name="company_name" type="text"
                                placeholder="Enter company name" value="<?= $company['company_name'] ?>" required>
                            <div class="text-danger mt-1" id="catalog_name_error"></div>
                        </div>

                        <!-- Select Users -->
                        <div class="form-group">
                            <label for="user_ids">Select Users</label>
                            <select name="user_ids[]" id="user_ids" class="form-control select2" multiple required>
                                <?php foreach ($users as $user): ?>
                                    <option value="<?= $user['user_id']; ?>" <?= isset($company['user_ids']) && in_array($user['user_id'], explode(',', $company['user_ids'])) ? 'selected' : '' ?>>
                                        <?= $user['name']; ?> (<?= $user['email']; ?>)
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <div id="user-error" class="text-danger mt-2"></div>
                        </div>

                        <!-- Tags -->
                        <div class="form-group">
                            <p class="text-blue">Tags</p>
                            <div class="d-flex align-items-center mb-20">
                                <select id="product-tags" name="product-tags[]" multiple="multiple"
                                    class="form-control custom-dropdown me-2">
                                    <?php foreach ($tags as $tag): ?>
                                        <option value="<?= $tag['tag_name']; ?>" <?= in_array($tag['tag_name'], explode(',', $company['tags'])) ? 'selected' : '' ?>>
                                            <?= esc($tag['tag_name']); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <button type="button" class="btn btn-sm btn-primary" id="add-tag-btn"
                                    data-toggle="modal" data-target="#tagModal">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                            <small id="tag-error" class="text-danger"></small>
                        </div>

                        <!-- Address Fields -->
                        <div class="form-group">
                            <label for="street">Street</label>
                            <input type="text" class="form-control" id="street" name="street"
                                placeholder="Enter street address"
                                value="<?= isset(json_decode($company['address'], true)['street']) ? esc(json_decode($company['address'], true)['street']) : '' ?>"
                                required>
                            <div class="text-danger mt-1" id="street_error"></div>
                        </div>

                        <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" class="form-control" id="city" name="city" placeholder="Enter city"
                                value="<?= isset(json_decode($company['address'], true)['city']) ? esc(json_decode($company['address'], true)['city']) : '' ?>"
                                required>
                            <div class="text-danger mt-1" id="city_error"></div>
                        </div>

                        <div class="form-group">
                            <label for="state">State</label>
                            <input type="text" class="form-control" id="state" name="state" placeholder="Enter state"
                                value="<?= isset(json_decode($company['address'], true)['state']) ? esc(json_decode($company['address'], true)['state']) : '' ?>"
                                required>
                            <div class="text-danger mt-1" id="state_error"></div>
                        </div>

                        <div class="form-group">
                            <label for="country">Country</label>
                            <input type="text" class="form-control" id="country" name="country"
                                placeholder="Enter country"
                                value="<?= isset(json_decode($company['address'], true)['country']) ? esc(json_decode($company['address'], true)['country']) : '' ?>"
                                required>
                            <div class="text-danger mt-1" id="country_error"></div>
                        </div>

                        <div class="form-group">
                            <label for="postal_code">Postal Code</label>
                            <input type="text" class="form-control" id="postal_code" name="postal_code"
                                placeholder="Enter postal code"
                                value="<?= isset(json_decode($company['address'], true)['postal_code']) ? esc(json_decode($company['address'], true)['postal_code']) : '' ?>"
                                required>
                            <div class="text-danger mt-1" id="postal_code_error"></div>
                        </div>


                        <!-- Apply for Credit -->
                        <div class="form-group">
                            <label for="apply_for_credit">Do you want to apply for credit?</label>
                            <select class="form-control" id="apply_for_credit" name="apply_for_credit" required>
                                <option value="yes" <?= $company['apply_for_credit'] === 'yes' ? 'selected' : '' ?>>Yes
                                </option>
                                <option value="no" <?= $company['apply_for_credit'] === 'no' ? 'selected' : '' ?>>No
                                </option>
                            </select>
                            <div class="text-danger mt-1" id="apply_for_credit_error"></div>
                        </div>

                        <!-- Company Registration Number -->
                        <div class="form-group">
                            <label for="registration_number">Company Registration Number</label>
                            <input class="form-control" id="registration_number" name="registration_number" type="text"
                                placeholder="Enter registration number" value="<?= $company['registration_number'] ?>">
                            <div class="text-danger mt-1" id="registration_number_error"></div>
                        </div>


                        <!-- Principal Director or Proprietor -->
                        <!-- <div class="form-group">
                            <label for="principal_director">Are you the Principal Director or Proprietor?</label>
                            <input class="form-control" id="principal_director" name="principal_director" type="text"
                                placeholder="Enter your role" value="<?= $company['principal_director'] ?>">
                            <div class="text-danger mt-1" id="principal_director_error"></div>
                        </div>-->


                        <!-- Notes -->
                        <div class="form-group">
                            <label for="notes">Notes</label>
                            <textarea class="form-control" id="notes" name="notes" rows="4"
                                placeholder="Enter notes"><?= $company['notes'] ?></textarea>
                            <div class="text-danger mt-1" id="notes_error"></div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-lg">Update Company</button>
                    </form>
                </div>
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
            $(document).ready(function() {
                // When the Save Tag button is clicked
                $('#save-tag-btn').on('click', function(e) {
                    e.preventDefault(); // Prevent form submission

                    const tagName = $('#tag_name').val().trim(); // Get the tag name input
                    const errorElement = $('#tag-modal-error'); // Error message element

                    if (tagName !== "") {
                        // Send AJAX request to save the tag
                        $.ajax({
                            url: '<?= base_url('Tags/save') ?>', // Ensure the route is correct
                            type: 'POST',
                            data: {
                                tag_name: tagName,
                            },
                            success: function(response) {
                                if (response.success) {
                                    // Clear the modal inputs and close the modal
                                    errorElement.text(""); // Clear any error messages
                                    $('#tag_name').val(""); // Clear the input field
                                    $('#tagModal').modal('hide'); // Hide the modal

                                    // Optionally update the tags input field on the product page
                                    $('#product-tags').tagsinput('add', tagName); // Add the tag to the input

                                    alert(response.message); // Optional success alert
                                } else {
                                    // Display the error message from the backend
                                    errorElement.text(response.message);
                                }
                            },
                            error: function() {
                                errorElement.text("An error occurred. Please try again.");
                            }
                        });
                    } else {
                        errorElement.text("Tag name cannot be empty.");
                    }
                });
            });
        </script>

        <!-- Modal for Adding Tags -->
        <div class="modal fade" id="tagModal" tabindex="-1" role="dialog" aria-labelledby="tagModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="tagModalLabel">Add New Tag</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="tag-form">
                            <div class="form-group">
                                <label for="tag_name">Tag Name</label>
                                <input type="text" id="tag_name" class="form-control" name="tag_name"
                                    placeholder="Enter tag name" />
                            </div>
                            <small id="tag-modal-error" class="text-danger"></small>
                            <!-- Save Tag Button -->
                            <button type="button" id="save-tag-btn" class="btn btn-primary">Save Tag</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

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