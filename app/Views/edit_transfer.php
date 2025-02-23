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

                <div class="pd-20 card-box mb-30">
                    <form method="post" action="<?= base_url('transfer/update/' . $transfer['id']) ?>"
                        enctype="multipart/form-data">
                        <!-- Transfer Information -->
                        <div class="card mb-4">
                            <div class="card-header">Edit Transfer Information</div>
                            <div class="card-body row">
                                <?php if (in_array('giver', $allowedFields)): ?>
                                    <div class="col-md-6 form-group">
                                        <label for="giver">Giver (Sender)</label>
                                        <input type="text" name="giver" class="form-control" value="<?= $transfer['giver'] ?>" required>
                                    </div>
                                <?php endif; ?>

                                <?php if (in_array('receiver', $allowedFields)): ?>
                                    <div class="col-md-6 form-group">
                                        <label for="receiver">Receiver</label>
                                        <input type="text" name="receiver" class="form-control" value="<?= $transfer['receiver'] ?>" required>
                                    </div>
                                <?php endif; ?>

                                <?php if (in_array('transfer_order_number', $allowedFields)): ?>
                                    <div class="col-md-6 form-group">
                                        <label>Transfer Order Number</label>
                                        <input type="text" name="transfer_order_number" class="form-control"
                                            value="<?= $transfer['transfer_order_number'] ?>" required>
                                    </div>
                                <?php endif; ?>

                                <?php if (in_array('reference_number', $allowedFields)): ?>
                                    <div class="col-md-6 form-group">
                                        <label>Reference Number (POC)</label>
                                        <input type="text" name="reference_number" class="form-control"
                                            value="<?= $transfer['reference_number'] ?>" required>
                                    </div>
                                <?php endif; ?>

                                <?php if (in_array('date_of_transfer', $allowedFields)): ?>
                                    <div class="col-md-6 form-group">
                                        <label>Date of Transfer</label>
                                        <input type="date" name="date_of_transfer" class="form-control"
                                            value="<?= $transfer['date_of_transfer'] ?>" required>
                                    </div>
                                <?php endif; ?>

                                <?php if (in_array('digital_signature', $allowedFields)): ?>
                                    <div class="col-md-6 form-group">
                                        <label>Digital Signature</label>
                                        <input type="file" name="digital_signature" class="form-control" id="digital_signature"
                                            onchange="previewImage(this, 'signaturePreview')">
                                        <small>Current file: <?= $transfer['digital_signature'] ?></small>
                                        <div class="mt-2">
                                            <img id="signaturePreview" src="<?= ($transfer['digital_signature']) ?>"
                                                alt="Digital Signature Preview"
                                                style="max-width: 200px; display: <?= $transfer['digital_signature'] ? 'block' : 'none'; ?>;">
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>


                        <!-- Transport Details -->
                        <div class="card mb-4">
                            <div class="card-header">Edit Transport Details</div>
                            <div class="card-body row">
                                <?php if (in_array('mode_of_transport', $allowedFields)): ?>
                                    <div class="col-md-4 form-group">
                                        <label>Mode of Transport</label>
                                        <select name="mode_of_transport" class="form-control">
                                            <option <?= $transfer['mode_of_transport'] == 'Air' ? 'selected' : '' ?>>Air</option>
                                            <option <?= $transfer['mode_of_transport'] == 'Sea' ? 'selected' : '' ?>>Sea</option>
                                            <option <?= $transfer['mode_of_transport'] == 'Land' ? 'selected' : '' ?>>Land</option>
                                        </select>
                                    </div>
                                <?php endif; ?>

                                <?php if (in_array('type_of_transport', $allowedFields)): ?>
                                    <div class="col-md-4 form-group">
                                        <label>Type of Transport</label>
                                        <select name="type_of_transport" class="form-control">
                                            <option <?= $transfer['type_of_transport'] == 'Standard' ? 'selected' : '' ?>>Standard</option>
                                            <option <?= $transfer['type_of_transport'] == 'Premium' ? 'selected' : '' ?>>Premium</option>
                                        </select>
                                    </div>
                                <?php endif; ?>

                                <?php if (in_array('transport_party', $allowedFields)): ?>
                                    <div class="col-md-4 form-group">
                                        <label>Third Party / In-House</label>
                                        <select name="transport_party" class="form-control">
                                            <option <?= $transfer['transport_party'] == 'Third Party' ? 'selected' : '' ?>>Third Party</option>
                                            <option <?= $transfer['transport_party'] == 'In-House' ? 'selected' : '' ?>>In-House</option>
                                        </select>
                                    </div>
                                <?php endif; ?>

                                <?php if (in_array('company_name', $allowedFields)): ?>
                                    <div class="col-md-6 form-group">
                                        <label>Company Name</label>
                                        <input type="text" name="company_name" class="form-control"
                                            value="<?= $transfer['company_name'] ?>">
                                    </div>
                                <?php endif; ?>

                                <?php if (in_array('tracking_info', $allowedFields)): ?>
                                    <div class="col-md-6 form-group">
                                        <label>Tracking Information</label>
                                        <input type="text" name="tracking_info" class="form-control"
                                            value="<?= $transfer['tracking_info'] ?>">
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>


                        <!-- Inventory Details -->
                        <div class="card mb-4">
                            <div class="card-header">Edit Inventory Details</div>
                            <div class="card-body row">
                                <?php if (in_array('product_id', $allowedFields)): ?>
                                    <div class="col-md-4 form-group">
                                        <label>Product ID</label>
                                        <input type="text" name="product_id" class="form-control"
                                            value="<?= $transfer['product_id'] ?>">
                                    </div>
                                <?php endif; ?>

                                <?php if (in_array('product_name', $allowedFields)): ?>
                                    <div class="col-md-4 form-group">
                                        <label>Product Name</label>
                                        <select name="product_name" class="form-control" required>
                                            <option value="">Select Product</option>
                                            <?php foreach ($products as $product): ?>
                                                <option value="<?= $product['product_id'] ?>"
                                                    <?= $transfer['product_name'] == $product['product_id'] ? 'selected' : '' ?>>
                                                    <?= $product['product_title'] ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                <?php endif; ?>

                                <?php if (in_array('quantity_to_transfer', $allowedFields)): ?>
                                    <div class="col-md-4 form-group">
                                        <label>Quantity to Transfer</label>
                                        <input type="number" name="quantity_to_transfer" class="form-control"
                                            value="<?= $transfer['quantity_to_transfer'] ?>">
                                    </div>
                                <?php endif; ?>

                                <?php if (in_array('storage_location', $allowedFields)): ?>
                                    <div class="col-md-6 form-group">
                                        <label>Storage Location</label>
                                        <input type="text" name="storage_location" class="form-control"
                                            value="<?= $transfer['storage_location'] ?>">
                                    </div>
                                <?php endif; ?>

                                <?php if (in_array('destination_location', $allowedFields)): ?>
                                    <div class="col-md-6 form-group">
                                        <label>Destination Location</label>
                                        <input type="text" name="destination_location" class="form-control"
                                            value="<?= $transfer['destination_location'] ?>">
                                    </div>
                                <?php endif; ?>

                                <?php if (in_array('uom', $allowedFields)): ?>
                                    <div class="col-md-4 form-group">
                                        <label>UOM (Unit of Measure)</label>
                                        <select name="uom" class="form-control">
                                            <option <?= $transfer['uom'] == 'Pieces' ? 'selected' : '' ?>>Pieces</option>
                                            <option <?= $transfer['uom'] == 'Kilograms' ? 'selected' : '' ?>>Kilograms</option>
                                            <option <?= $transfer['uom'] == 'Boxes' ? 'selected' : '' ?>>Boxes</option>
                                        </select>
                                    </div>
                                <?php endif; ?>

                                <?php if (in_array('batch_number', $allowedFields)): ?>
                                    <div class="col-md-6 form-group">
                                        <label>Batch No.</label>
                                        <input type="number" name="batch_number" class="form-control"
                                            value="<?= $transfer['batch_number'] ?>">
                                    </div>
                                <?php endif; ?>

                                <?php if (in_array('lot_number', $allowedFields)): ?>
                                    <div class="col-md-6 form-group">
                                        <label>Lot No.</label>
                                        <input type="number" name="lot_number" class="form-control"
                                            value="<?= $transfer['lot_number'] ?>">
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>


                        <!-- Checks Upon Receiving -->
                        <?php if (isset($allowedFields['checks'])): ?>
                            <div class="card mb-4">
                                <div class="card-header">Edit Checks Upon Receiving</div>
                                <div class="card-body">
                                    <?php $checks = explode(',', $transfer['checks']); ?>
                                    <?php if (in_array('Quantity Matches', $allowedFields['checks'])): ?>
                                        <label><input type="checkbox" name="checks[]" value="Quantity Matches"
                                                <?= in_array('Quantity Matches', $checks) ? 'checked' : '' ?>> Quantity Matches</label><br>
                                    <?php endif; ?>
                                    <?php if (in_array('Quality Approved', $allowedFields['checks'])): ?>
                                        <label><input type="checkbox" name="checks[]" value="Quality Approved"
                                                <?= in_array('Quality Approved', $checks) ? 'checked' : '' ?>> Quality Approved</label><br>
                                    <?php endif; ?>
                                    <?php if (in_array('No Damages', $allowedFields['checks'])): ?>
                                        <label><input type="checkbox" name="checks[]" value="No Damages"
                                                <?= in_array('No Damages', $checks) ? 'checked' : '' ?>> No Damages</label><br>
                                    <?php endif; ?>
                                    <?php if (in_array('Documents Received', $allowedFields['checks'])): ?>
                                        <label><input type="checkbox" name="checks[]" value="Documents Received"
                                                <?= in_array('Documents Received', $checks) ? 'checked' : '' ?>> Documents Received</label>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>

                        <!-- Attachments -->
                        <?php if (isset($allowedFields['additional_documents'])): ?>
                            <div class="col-md-6 form-group">
                                <label>Additional Documents</label>
                                <input type="file" name="additional_documents" class="form-control"
                                    id="additional_documents" onchange="previewImage(this, 'documentPreview')">
                                <small>Current file: <?= $transfer['additional_documents'] ?></small>
                                <div class="mt-2">
                                    <img id="documentPreview"
                                        src="<?= base_url('uploads/' . $transfer['additional_documents']) ?>"
                                        alt="Document Preview"
                                        style="max-width: 200px; display: <?= $transfer['additional_documents'] ? 'block' : 'none'; ?>;">
                                </div>
                            </div>
                        <?php endif; ?>

                        <!-- Insurance -->
                        <?php if (isset($allowedFields['insurance'])): ?>
                            <div class="card mb-4">
                                <div class="card-header">Edit Insurance</div>
                                <div class="card-body">
                                    <input type="text" name="insurance" class="form-control"
                                        value="<?= $transfer['insurance'] ?>" placeholder="Insurance Details">
                                </div>
                            </div>
                        <?php endif; ?>


                        <!-- Submit -->
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Update Transfer</button>
                        </div>
                    </form>
                </div>

                <?= $this->include('footer_view') ?>

            </div>
        </div>
    </div>

</body>

<script>
    function previewImage(input, previewId) {
        const file = input.files[0];
        const preview = document.getElementById(previewId);

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = "block";
            };
            reader.readAsDataURL(file);
        } else {
            preview.src = "";
            preview.style.display = "none";
        }
    }
</script>

<script>
    function goBack() {
        window.history.back();
    }
</script>