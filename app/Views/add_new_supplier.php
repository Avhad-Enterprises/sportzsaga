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
                        <!-- Back Button -->
                        <button type="button" class="btn btn-secondary mr-3" onclick="goBack()">
                            <i class="fa fa-arrow-left"></i> Back
                        </button>
                        <h4 class="h4 mb-0">Add New Supplier</h4>
                    </div>
                </div>

                <!-- Inventory Edit Form -->
                <div class="pd-20 card-box mb-30">
                    <form id="supplierForm" method="post" action="suppliers/save" enctype="multipart/form-data">
                        <!-- Supplier Information -->
                        <h5>Supplier Information</h5>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="supplier_name">Supplier Name</label>
                                <input type="text" id="supplier_name" name="supplier_name" class="form-control"
                                    placeholder="Supplier Name" required>
                            </div>
                            <div class="col-sm-6">
                                <label for="supplier_code">Supplier Code</label>
                                <input type="text" id="supplier_code" name="supplier_code" class="form-control"
                                    placeholder="Supplier Code (Optional)">
                            </div>
                        </div>

                        <!-- Contact Information -->
                        <h5>Contact Information</h5>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="contact_person">Contact Person</label>
                                <input type="text" id="contact_person" name="contact_person" class="form-control"
                                    placeholder="Contact Person" required>
                            </div>
                            <div class="col-sm-6">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" class="form-control"
                                    placeholder="Email Address" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="phone">Phone Number</label>
                                <input type="text" id="phone" name="phone" class="form-control"
                                    placeholder="Phone Number" required>
                            </div>
                            <div class="col-sm-6">
                                <label for="alternate_phone">Alternate Phone (Optional)</label>
                                <input type="text" id="alternate_phone" name="alternate_phone" class="form-control"
                                    placeholder="Alternate Phone Number">
                            </div>
                        </div>

                        <!-- Address Details -->
                        <h5>Address Details</h5>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="address">Office Address</label>
                                <textarea id="address" name="address" class="form-control" rows="2"
                                    placeholder="Office Address" required></textarea>
                            </div>
                            <div class="col-sm-6">
                                <label for="city">City</label>
                                <input type="text" id="city" name="city" class="form-control" placeholder="City"
                                    required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="state">State</label>
                                <input type="text" id="state" name="state" class="form-control"
                                    placeholder="State/Province" required>
                            </div>
                            <div class="col-sm-6">
                                <label for="postal_code">Postal Code</label>
                                <input type="text" id="postal_code" name="postal_code" class="form-control"
                                    placeholder="Postal Code" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="country">Country</label>
                                <input type="text" id="country" name="country" class="form-control"
                                    placeholder="Country" required>
                            </div>
                        </div>

                        <!-- Banking Details -->
                        <h5>Banking and Payment Information</h5>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="bank_name">Bank Name</label>
                                <input type="text" id="bank_name" name="bank_name" class="form-control"
                                    placeholder="Bank Name">
                            </div>
                            <div class="col-sm-6">
                                <label for="account_number">Account Number</label>
                                <input type="text" id="account_number" name="account_number" class="form-control"
                                    placeholder="Account Number">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="ifsc_code">IFSC Code</label>
                                <input type="text" id="ifsc_code" name="ifsc_code" class="form-control"
                                    placeholder="IFSC/SWIFT Code">
                            </div>
                            <div class="col-sm-6">
                                <label for="payment_terms">Payment Terms</label>
                                <input type="text" id="payment_terms" name="payment_terms" class="form-control"
                                    placeholder="Payment Terms (e.g., Net 30)">
                            </div>
                        </div>

                        <!-- Additional Information -->
                        <h5>Additional Information</h5>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <label for="attachments">Upload Documents</label>
                                <input type="file" id="attachments" name="attachments[]" class="form-control" multiple>
                            </div>
                        </div>

                        <!-- Form Submit -->
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Save Supplier</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    
    <!-- Footer View Start -->
    <?= $this->include('footer_view') ?>
    <!-- Footer View End -->

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap 4 JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Optional Popper.js for Bootstrap -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>


    <script>
        function goBack() {
            window.history.back();
        }
    </script>

    <script>
        function selectWarehouse(warehouseId, warehouseName, location) {
            document.getElementById('warehouse_id').value = warehouseId;
            document.getElementById('storage_location').value = `${warehouseName} - ${location}`;
            $('#warehouseModal').modal('hide'); // Close the modal
        }
    </script>

</body>

</html>