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
                            <h4 class="h4 mb-0">Add New Purchase Order</h4>
                        </div>
                    </div>

                </div>
                <div class="pd-20 card-box mb-30">
                    <form id="addpurchaseorderform" method="post" action="<?= base_url('purchase_orders/save') ?>"
                        enctype="multipart/form-data">
                        <div class="form-group row">
                            <!-- Purchase Order Number -->
                            <div class="col-sm-6">
                                <label for="po_number">Purchase Order Number</label>
                                <input class="form-control" id="po_number" name="po_number" type="text"
                                    placeholder="PO Number" required>
                                <div class="text-danger mt-1" id="po_number_error"></div>
                            </div>

                            <!-- Order Date -->
                            <div class="col-sm-6">
                                <label for="order_date">Order Date</label>
                                <input class="form-control" id="order_date" name="order_date" type="date" required>
                                <div class="text-danger mt-1" id="order_date_error"></div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <!-- Supplier -->
                            <div class="col-sm-6">
                                <label for="supplier_name">Supplier</label>
                                <select class="form-control" id="supplier_name" name="supplier_name" required>
                                    <option value="">Select Supplier</option>
                                    <?php foreach ($suppliers as $supplier): ?>
                                        <option value="<?= esc($supplier['supplier_name']); ?>">
                                            <?= esc($supplier['supplier_name']); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="text-danger mt-1" id="supplier_name_error"></div>
                            </div>

                            <!-- Expected Delivery Date -->
                            <div class="col-sm-6">
                                <label for="expected_delivery_date">Expected Delivery Date</label>
                                <input class="form-control" id="expected_delivery_date" name="expected_delivery_date"
                                    type="date" required>
                                <div class="text-danger mt-1" id="expected_delivery_date_error"></div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <!-- Payment Terms -->
                            <div class="col-sm-6">
                                <label for="payment_terms">Payment Terms</label>
                                <select class="form-control" id="payment_terms" name="payment_terms" required>
                                    <option value="COD">COD</option>
                                    <option value="Online">Online</option>
                                </select>
                                <div class="text-danger mt-1" id="payment_terms_error"></div>
                            </div>

                            <!-- Order Status -->
                            <div class="col-sm-6">
                                <label for="order_status">Order Status</label>
                                <select class="form-control" id="order_status" name="order_status" required>
                                    <option value="Pending">Pending</option>
                                    <option value="Approved">Approved</option>
                                    <option value="Dispatched">Dispatched</option>
                                    <option value="Received">Received</option>
                                </select>
                                <div class="text-danger mt-1" id="order_status_error"></div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <!-- Approved By -->
                            <div class="col-sm-6">
                                <label for="approved_by">Approved By</label>
                                <input class="form-control" id="approved_by" name="approved_by" type="text"
                                    placeholder="Approver Name" required>
                                <div class="text-danger mt-1" id="approved_by_error"></div>
                            </div>

                            <!-- Approval Date -->
                            <div class="col-sm-6">
                                <label for="approval_date">Approval Date</label>
                                <input class="form-control" id="approval_date" name="approval_date" type="date">
                                <div class="text-danger mt-1" id="approval_date_error"></div>
                            </div>
                        </div>

                        <h5 class="mt-4">Product/Item Details</h5>
                        <div class="form-group row">
                            <!-- Product Name -->
                            <div class="col-sm-6">
                                <label for="product_name">Product Name</label>
                                <select class="form-control" id="product_name" name="product_name" required>
                                    <option value="">Select Product</option>
                                    <?php foreach ($products as $product): ?>
                                        <option value="<?= $product['product_id']; ?>">
                                            <?= esc($product['product_title']); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="text-danger mt-1" id="product_name_error"></div>
                            </div>


                            <!-- Quantity -->
                            <div class="col-sm-6">
                                <label for="quantity">Quantity</label>
                                <input class="form-control" id="quantity" name="quantity" type="number"
                                    placeholder="Quantity" required>
                                <div class="text-danger mt-1" id="quantity_error"></div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <!-- Unit Price -->
                            <div class="col-sm-6">
                                <label for="unit_price">Unit Price</label>
                                <input class="form-control" id="unit_price" name="unit_price" type="number"
                                    placeholder="Unit Price" step="0.01" required>
                                <div class="text-danger mt-1" id="unit_price_error"></div>
                            </div>

                            <!-- Total Price -->
                            <div class="col-sm-6">
                                <label for="total_price">Total Price</label>
                                <input class="form-control" id="total_price" name="total_price" type="number"
                                    placeholder="Total Price" readonly>
                                <div class="text-danger mt-1" id="total_price_error"></div>
                            </div>
                        </div>

                        <!-- Warehouse -->
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <label for="warehouse_name">Warehouse</label>
                                <select class="form-control" id="warehouse_name" name="warehouse_name" required>
                                    <option value="">Select Warehouse</option>
                                    <?php foreach ($warehouses as $warehouse): ?>
                                        <option value="<?= $warehouse['id']; ?>">
                                            <?= esc($warehouse['name']); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="text-danger mt-1" id="warehouse_name_error"></div>
                            </div>
                        </div>

                        <h5 class="mt-4">Shipping Information</h5>
                        <div class="form-group row">
                            <!-- Shipping Address -->
                            <div class="col-sm-6">
                                <label for="shipping_address">Shipping Address</label>
                                <input class="form-control" id="shipping_address" name="shipping_address" type="text"
                                    placeholder="Shipping Address" required>
                                <div class="text-danger mt-1" id="shipping_address_error"></div>
                            </div>

                            <!-- Shipping Method -->
                            <div class="col-sm-6">
                                <label for="shipping_method">Shipping Method</label>
                                <select class="form-control" id="shipping_method" name="shipping_method" required>
                                    <option value="Ground">Ground</option>
                                    <option value="Air">Air</option>
                                    <option value="Freight">Freight</option>
                                </select>
                                <div class="text-danger mt-1" id="shipping_method_error"></div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <!-- Shipping Cost -->
                            <div class="col-sm-6">
                                <label for="shipping_cost">Shipping Cost</label>
                                <input class="form-control" id="shipping_cost" name="shipping_cost" type="number"
                                    placeholder="Shipping Cost" step="0.01" required>
                                <div class="text-danger mt-1" id="shipping_cost_error"></div>
                            </div>
                        </div>

                        <h5 class="mt-4">Additional Details</h5>
                        <div class="form-group row">
                            <!-- Remarks/Notes -->
                            <div class="col-sm-12">
                                <label for="remarks">Remarks/Notes</label>
                                <textarea class="form-control" id="remarks" name="remarks" rows="4"
                                    placeholder="Additional Instructions"></textarea>
                                <div class="text-danger mt-1" id="remarks_error"></div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <!-- Attachments -->
                            <div class="col-sm-12">
                                <label for="attachments">Attachments</label>

                                <?php if (!empty($purchaseOrder['attachments'])): ?>
                                    <p>Current File:</p>

                                    <?php
                                    // Get the file URL
                                    $fileUrl = $purchaseOrder['attachments'];
                                    $fileExtension = pathinfo($fileUrl, PATHINFO_EXTENSION);
                                    $imageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

                                    // If the existing file is an image, show preview
                                    if (in_array(strtolower($fileExtension), $imageExtensions)): ?>
                                        <div id="existingPreview">
                                            <img src="<?= $fileUrl; ?>" alt="Current Attachment"
                                                style="max-width: 200px; height: auto; border: 1px solid #ccc; padding: 5px;">
                                        </div>
                                    <?php else: ?>
                                        <!-- If it's not an image, show a download link -->
                                        <p><a href="<?= $fileUrl; ?>" target="_blank"><?= basename($fileUrl); ?></a></p>
                                    <?php endif; ?>
                                <?php endif; ?>

                                <!-- Upload new file -->
                                <input class="form-control" id="attachments" name="attachments" type="file"
                                    accept="image/*">
                                <div class="text-danger mt-1" id="attachments_error"></div>

                                <!-- New image preview -->
                                <div id="newImagePreview" style="margin-top: 10px; display: none;">
                                    <p>New Image Preview:</p>
                                    <img id="previewImage" src="" alt="Preview"
                                        style="max-width: 200px; height: auto; border: 1px solid #ccc; padding: 5px;">
                                </div>
                            </div>
                        </div>


                        <h5 class="mt-4">Cost Summary</h5>
                        <div class="form-group row">
                            <!-- Tax -->
                            <div class="col-sm-6">
                                <label for="tax">Tax</label>
                                <input class="form-control" id="tax" name="tax" type="number" placeholder="Tax Amount"
                                    step="0.01" required>
                                <div class="text-danger mt-1" id="tax_error"></div>
                            </div>

                            <!-- Discount -->
                            <div class="col-sm-6">
                                <label for="discount">Discount</label>
                                <input class="form-control" id="discount" name="discount" type="number"
                                    placeholder="Discount Amount" step="0.01">
                                <div class="text-danger mt-1" id="discount_error"></div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary btn-lg">Submit Order</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- Page Main Content End -->

    <!-- Footer View Start -->
    <?= $this->include('footer_view') ?>
    <!-- Footer View End -->
</body>

<script>
    function goBack() {
        window.history.back();
    }

    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('addpurchaseorderform');

        form.addEventListener('submit', function(event) {
            let valid = true;

            // Clear previous errors
            clearErrors();

            // Validation for all fields
            const fields = [
                'po_number', 'order_date', 'supplier_name', 'expected_delivery_date', 'payment_terms',
                'order_status', 'approved_by', 'product_name', 'quantity', 'unit_price', 'total_price',
                'warehouse_name', 'shipping_address', 'shipping_method', 'shipping_cost', 'remarks', 'attachments', 'tax', 'discount'
            ];

            fields.forEach(field => {
                const element = document.getElementById(field);
                if (!element.value.trim()) {
                    showError(field, `${field.replace('_', ' ').toUpperCase()} is required.`);
                    valid = false;
                }
            });

            // Prevent form submission if validation fails
            if (!valid) {
                event.preventDefault();
            }
        });

        // Utility functions
        function showError(fieldId, message) {
            const errorElement = document.getElementById(`${fieldId}_error`);
            errorElement.textContent = message;
        }

        function clearErrors() {
            document.querySelectorAll('.text-danger').forEach(error => {
                error.textContent = '';
            });
        }
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get the elements for Quantity, Unit Price, and Total Price
        const quantityInput = document.getElementById('quantity');
        const unitPriceInput = document.getElementById('unit_price');
        const totalPriceInput = document.getElementById('total_price');

        // Function to calculate Total Price
        function calculateTotalPrice() {
            // Get values of Quantity and Unit Price
            const quantity = parseFloat(quantityInput.value) || 0;
            const unitPrice = parseFloat(unitPriceInput.value) || 0;

            // Calculate the Total Price
            const totalPrice = quantity * unitPrice;

            // Set the Total Price input field value
            totalPriceInput.value = totalPrice.toFixed(2); // Display with 2 decimal places
        }

        // Add event listeners to Quantity and Unit Price to trigger recalculation
        quantityInput.addEventListener('input', calculateTotalPrice);
        unitPriceInput.addEventListener('input', calculateTotalPrice);
    });
</script>

<script>
    document.getElementById("attachments").addEventListener("change", function(event) {
        const file = event.target.files[0];

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById("previewImage").src = e.target.result;
                document.getElementById("newImagePreview").style.display = "block";

                // Hide the old image if a new one is selected
                const existingPreview = document.getElementById("existingPreview");
                if (existingPreview) {
                    existingPreview.style.display = "none";
                }
            };
            reader.readAsDataURL(file);
        }
    });
</script>