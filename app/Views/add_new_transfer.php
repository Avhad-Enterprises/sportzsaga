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
                            <i class="fa fa-arrow-left"></i> Back
                        </button>
                        <h4 class="h4 mb-0">Add Inventory</h4>


                    </div>
                </div>

                <!-- Inventory Form -->
                <div class="pd-20 card-box mb-30">
                    <form method="post" action="<?= base_url('transfer/store') ?>" enctype="multipart/form-data">
                        <!-- Transfer Information -->
                        <div class="card mb-4">
                            <div class="card-header">Transfer Information</div>
                            <div class="card-body row">
                                <div class="col-md-6 form-group">
                                    <label for="giver">Giver (Sender)</label>
                                    <input type="text" name="giver" class="form-control" required>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="receiver">Receiver</label>
                                    <input type="text" name="receiver" class="form-control" required>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Transfer Order Number</label>
                                    <input type="text" name="transfer_order_number" class="form-control" required>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Reference Number (POC)</label>
                                    <input type="text" name="reference_number" class="form-control" required>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Date of Transfer</label>
                                    <input type="date" name="date_of_transfer" class="form-control" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 form-group">
                            <label>Digital Signature</label>

                            <!-- Existing Signature Preview (Fetched from Backend) -->
                            <?php if (!empty($transfer['digital_signature'])): ?>
                                <div>
                                    <p>Current Digital Signature:</p>
                                    <img id="existingSignature"
                                        src="<?= base_url('uploads/signatures/' . $transfer['digital_signature']) ?>"
                                        alt="Digital Signature"
                                        style="max-width: 200px; height: auto; border: 1px solid #ccc; padding: 5px;">
                                </div>
                            <?php endif; ?>

                            <!-- Upload New Signature -->
                            <input type="file" name="digital_signature" class="form-control" id="digitalSignatureInput"
                                accept="image/*" required>

                            <!-- Preview New Upload -->
                            <div id="newSignaturePreview" style="margin-top: 10px; display: none;">
                                <p>New Digital Signature Preview:</p>
                                <img id="previewImage" src="" alt="Preview"
                                    style="max-width: 200px; height: auto; border: 1px solid #ccc; padding: 5px;">
                            </div>
                        </div>

                        <!-- Transport Details -->
                        <div class="card mb-4">
                            <div class="card-header">Transport Details</div>
                            <div class="card-body row">
                                <div class="col-md-4 form-group">
                                    <label>Mode of Transport</label>
                                    <select name="mode_of_transport" class="form-control">
                                        <option>Air</option>
                                        <option>Sea</option>
                                        <option>Land</option>
                                    </select>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label>Type of Transport</label>
                                    <select name="type_of_transport" class="form-control">
                                        <option>Standard</option>
                                        <option>Premium</option>
                                    </select>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label>Third Party / In-House</label>
                                    <select name="transport_party" class="form-control">
                                        <option>Third Party</option>
                                        <option>In-House</option>
                                    </select>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Company Name</label>
                                    <input type="text" name="company_name" class="form-control">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Tracking Information</label>
                                    <input type="text" name="tracking_info" class="form-control">
                                </div>
                            </div>
                        </div>

                        <!-- Inventory Details -->
                        <div class="card mb-4">
                            <div class="card-header">Inventory Details</div>
                            <div class="card-body row">
                                <div class="col-md-4 form-group">
                                    <label>Product ID</label>
                                    <input type="text" name="product_id" class="form-control">
                                </div>
                                <div class="col-md-4 form-group">
                                    <label>Product Name</label>
                                    <select name="product_name" class="form-control" required>
                                        <option value="">Select Product</option>
                                        <?php foreach ($products as $product): ?>
                                            <option value="<?= $product['product_id'] ?>"><?= $product['product_title'] ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="col-md-4 form-group">
                                    <label>Quantity to Transfer</label>
                                    <input type="number" name="quantity_to_transfer" class="form-control">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Storage Location</label>
                                    <input type="text" name="storage_location" class="form-control">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Destination Location</label>
                                    <input type="text" name="destination_location" class="form-control">
                                </div>
                                <div class="col-md-4 form-group">
                                    <label>UOM (Unit of Measure)</label>
                                    <select name="uom" class="form-control">
                                        <option>Pieces</option>
                                        <option>Kilograms</option>
                                        <option>Boxes</option>
                                    </select>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Batch no.</label>
                                    <input type="number" name="batch_number" class="form-control">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Lot No.</label>
                                    <input type="number" name="lot_number" class="form-control">
                                </div>
                            </div>
                        </div>

                        <!-- Checks Upon Receiving -->
                        <div class="card mb-4">
                            <div class="card-header">Checks Upon Receiving</div>
                            <div class="card-body">
                                <label><input type="checkbox" name="checks[]" value="Quantity Matches"> Quantity
                                    Matches</label><br>
                                <label><input type="checkbox" name="checks[]" value="Quality Approved"> Quality
                                    Approved</label><br>
                                <label><input type="checkbox" name="checks[]" value="No Damages"> No
                                    Damages</label><br>
                                <label><input type="checkbox" name="checks[]" value="Documents Received"> Documents
                                    Received</label>
                            </div>
                        </div>

                        <!-- Attachments -->
                        <div class="card mb-4">
                            <div class="card-header">Attachments</div>
                            <div class="card-body">
                                <label>Additional Documents</label>
                                <input type="file" name="additional_documents" class="form-control">
                            </div>
                        </div>

                        <!-- Insurance -->
                        <div class="card mb-4">
                            <div class="card-header">Insurance</div>
                            <div class="card-body">
                                <input type="text" name="insurance" class="form-control"
                                    placeholder="Insurance Details">
                            </div>
                        </div>

                        <!-- Submit -->
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Save Transfer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
    <script>
        $(document).ready(function() {
            $("#product_name").autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: "<?= base_url('products/search') ?>", // Route for fetching products
                        type: "GET",
                        dataType: "json",
                        data: {
                            term: request.term
                        },
                        success: function(data) {
                            response(data);
                        }
                    });
                },
                minLength: 1,
                select: function(event, ui) {
                    $("#product_name").val(ui.item.label);
                    $("#product_id").val(ui.item.value); // Set the hidden field with the product ID
                    return false;
                }
            });
        });
    </script>

    <script>
        document.getElementById("digitalSignatureInput").addEventListener("change", function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById("previewImage").src = e.target.result;
                    document.getElementById("newSignaturePreview").style.display = "block";
                };
                reader.readAsDataURL(file);
            }
        });
    </script>

    </script>
    <?= $this->include('footer_view') ?>
    </div>
</body>