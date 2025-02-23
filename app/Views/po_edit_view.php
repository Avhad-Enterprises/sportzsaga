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
                <div class="clearfix mb-3">
                    <div class="pull-left d-flex align-items-center">
                        <!-- Back Button -->
                        <button type="button" class="btn btn-secondary mr-3" onclick="goBack()">
                            <i class="fa fa-arrow-left"></i> Back
                        </button>
                        <h4 class="h4 mb-0">Edit Purchase Order</h4>
                    </div>
                </div>

                <div class="pd-20 card-box mb-30">
                    <form id="editPurchaseOrderForm" method="post"
                        action="<?= base_url('purchase_orders/update/' . $purchaseOrder['id']) ?>"
                        enctype="multipart/form-data">

                        <!-- Purchase Order Details -->
                        <div class="form-group row">
                            <?php if (in_array('po_number', $allowedFields)): ?>
                                <div class="col-sm-6">
                                    <label for="po_number">Purchase Order Number</label>
                                    <input class="form-control" id="po_number" name="po_number" type="text"
                                        value="<?= esc($purchaseOrder['po_number']); ?>" required>
                                </div>
                            <?php endif; ?>

                            <?php if (in_array('order_date', $allowedFields)): ?>
                                <div class="col-sm-6">
                                    <label for="order_date">Order Date</label>
                                    <input class="form-control" id="order_date" name="order_date" type="date"
                                        value="<?= esc($purchaseOrder['order_date']); ?>" required>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="form-group row">
                            <?php if (in_array('supplier_name', $allowedFields)): ?>
                                <div class="col-sm-6">
                                    <label for="supplier_name">Supplier</label>
                                    <select class="form-control" id="supplier_name" name="supplier_name" required>
                                        <option value="">Select Supplier</option>
                                        <?php foreach ($suppliers as $supplier): ?>
                                            <option value="<?= esc($supplier['supplier_name']); ?>"
                                                <?= ($purchaseOrder['supplier_name'] == $supplier['supplier_name']) ? 'selected' : ''; ?>>
                                                <?= esc($supplier['supplier_name']); ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            <?php endif; ?>

                            <?php if (in_array('expected_delivery_date', $allowedFields)): ?>
                                <div class="col-sm-6">
                                    <label for="expected_delivery_date">Expected Delivery Date</label>
                                    <input class="form-control" id="expected_delivery_date" name="expected_delivery_date"
                                        type="date" value="<?= esc($purchaseOrder['expected_delivery_date']); ?>" required>
                                </div>
                            <?php endif; ?>
                        </div>


                        <div class="form-group row">
                            <?php if (in_array('payment_terms', $allowedFields)): ?>
                                <div class="col-sm-6">
                                    <label for="payment_terms">Payment Terms</label>
                                    <select class="form-control" id="payment_terms" name="payment_terms" required>
                                        <option value="COD" <?= ($purchaseOrder['payment_terms'] == 'COD') ? 'selected' : ''; ?>>COD</option>
                                        <option value="Online" <?= ($purchaseOrder['payment_terms'] == 'Online') ? 'selected' : ''; ?>>Online</option>
                                    </select>
                                </div>
                            <?php endif; ?>

                            <?php if (in_array('order_status', $allowedFields)): ?>
                                <div class="col-sm-6">
                                    <label for="order_status">Order Status</label>
                                    <select class="form-control" id="order_status" name="order_status" required>
                                        <option value="Pending" <?= ($purchaseOrder['order_status'] == 'Pending') ? 'selected' : ''; ?>>Pending</option>
                                        <option value="Approved" <?= ($purchaseOrder['order_status'] == 'Approved') ? 'selected' : ''; ?>>Approved</option>
                                        <option value="Dispatched" <?= ($purchaseOrder['order_status'] == 'Dispatched') ? 'selected' : ''; ?>>Dispatched</option>
                                        <option value="Received" <?= ($purchaseOrder['order_status'] == 'Received') ? 'selected' : ''; ?>>Received</option>
                                    </select>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="form-group row">
                            <?php if (in_array('approved_by', $allowedFields)): ?>
                                <div class="col-sm-6">
                                    <label for="approved_by">Approved By</label>
                                    <input class="form-control" id="approved_by" name="approved_by" type="text"
                                        value="<?= esc($purchaseOrder['approved_by']); ?>" required>
                                </div>
                            <?php endif; ?>

                            <?php if (in_array('approval_date', $allowedFields)): ?>
                                <div class="col-sm-6">
                                    <label for="approval_date">Approval Date</label>
                                    <input class="form-control" id="approval_date" name="approval_date" type="date"
                                        value="<?= esc($purchaseOrder['approval_date']); ?>">
                                </div>
                            <?php endif; ?>
                        </div>

                        <h5>Product/Item Details</h5>
                        <div class="form-group row">
                            <?php if (in_array('product_name', $allowedFields)): ?>
                                <div class="col-sm-6">
                                    <label for="product_name">Product Name</label>
                                    <select class="form-control" id="product_name" name="product_name" required>
                                        <option value="">Select Product</option>
                                        <?php foreach ($products as $product): ?>
                                            <option value="<?= esc($product['product_title']); ?>"
                                                <?= ($product['product_title'] == $purchaseOrder['product_name']) ? 'selected' : ''; ?>>
                                                <?= esc($product['product_title']); ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            <?php endif; ?>

                            <?php if (in_array('quantity', $allowedFields)): ?>
                                <div class="col-sm-6">
                                    <label for="quantity">Quantity</label>
                                    <input class="form-control" id="quantity" name="quantity" type="number"
                                        value="<?= esc($purchaseOrder['quantity']); ?>" required>
                                </div>
                            <?php endif; ?>
                        </div>


                        <div class="form-group row">
                            <?php if (in_array('unit_price', $allowedFields)): ?>
                                <div class="col-sm-6">
                                    <label for="unit_price">Unit Price</label>
                                    <input class="form-control" id="unit_price" name="unit_price" type="number"
                                        value="<?= esc($purchaseOrder['unit_price']); ?>" required>
                                </div>
                            <?php endif; ?>

                            <?php if (in_array('total_price', $allowedFields)): ?>
                                <div class="col-sm-6">
                                    <label for="total_price">Total Price</label>
                                    <input class="form-control" id="total_price" name="total_price" type="number"
                                        value="<?= esc($purchaseOrder['total_price']); ?>" readonly>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="form-group row">
                            <?php if (in_array('warehouse_name', $allowedFields)): ?>
                                <div class="col-sm-12">
                                    <label for="warehouse_name">Warehouse</label>
                                    <select class="form-control" id="warehouse_name" name="warehouse_name" required>
                                        <option value="">Select Warehouse</option>
                                        <?php foreach ($warehouses as $warehouse): ?>
                                            <option value="<?= esc($warehouse['id']); ?>"
                                                <?= ($warehouse['id'] == $purchaseOrder['warehouse_name']) ? 'selected' : ''; ?>>
                                                <?= esc($warehouse['name']); ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            <?php endif; ?>
                        </div>

                        <h5>Shipping Information</h5>
                        <div class="form-group row">
                            <?php if (in_array('shipping_address', $allowedFields)): ?>
                                <div class="col-sm-6">
                                    <label for="shipping_address">Shipping Address</label>
                                    <input class="form-control" id="shipping_address" name="shipping_address" type="text"
                                        value="<?= esc($purchaseOrder['shipping_address']); ?>" required>
                                </div>
                            <?php endif; ?>

                            <?php if (in_array('shipping_method', $allowedFields)): ?>
                                <div class="col-sm-6">
                                    <label for="shipping_method">Shipping Method</label>
                                    <select class="form-control" id="shipping_method" name="shipping_method" required>
                                        <option value="Ground" <?= ($purchaseOrder['shipping_method'] == 'Ground') ? 'selected' : ''; ?>>Ground</option>
                                        <option value="Air" <?= ($purchaseOrder['shipping_method'] == 'Air') ? 'selected' : ''; ?>>Air</option>
                                        <option value="Freight" <?= ($purchaseOrder['shipping_method'] == 'Freight') ? 'selected' : ''; ?>>Freight</option>
                                    </select>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="form-group row">
                            <?php if (in_array('shipping_cost', $allowedFields)): ?>
                                <div class="col-sm-6">
                                    <label for="shipping_cost">Shipping Cost</label>
                                    <input class="form-control" id="shipping_cost" name="shipping_cost" type="number"
                                        value="<?= esc($purchaseOrder['shipping_cost']); ?>" required>
                                </div>
                            <?php endif; ?>

                            <?php if (in_array('tax', $allowedFields)): ?>
                                <div class="col-sm-6">
                                    <label for="tax">Tax</label>
                                    <input class="form-control" id="tax" name="tax" type="number"
                                        value="<?= esc($purchaseOrder['tax']); ?>" required>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="form-group row">
                            <?php if (in_array('discount', $allowedFields)): ?>
                                <div class="col-sm-6">
                                    <label for="discount">Discount</label>
                                    <input class="form-control" id="discount" name="discount" type="number"
                                        value="<?= esc($purchaseOrder['discount']); ?>">
                                </div>
                            <?php endif; ?>
                        </div>

                        <h5>Additional Details</h5>
                        <div class="form-group row">
                            <?php if (in_array('remarks', $allowedFields)): ?>
                                <div class="col-sm-12">
                                    <label for="remarks">Remarks/Notes</label>
                                    <textarea class="form-control" id="remarks" name="remarks"
                                        rows="4"><?= esc($purchaseOrder['remarks']); ?></textarea>
                                </div>
                            <?php endif; ?>
                        </div>

                        <?php if (in_array('attachments', $allowedFields)): ?>
                            <div class="col-sm-12">
                                <label for="attachments">Attachments</label>

                                <?php if (!empty($purchaseOrder['attachments'])): ?>
                                    <p>Current File:</p>

                                    <?php
                                    // Determine the file type
                                    $fileUrl = $purchaseOrder['attachments'];
                                    $fileExtension = pathinfo($fileUrl, PATHINFO_EXTENSION);
                                    $imageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

                                    // If it's an image, show the preview
                                    if (in_array(strtolower($fileExtension), $imageExtensions)): ?>
                                        <img src="<?= $fileUrl; ?>" alt="Attachment Preview"
                                            style="max-width: 200px; height: auto; border: 1px solid #ccc; padding: 5px;">
                                    <?php else: ?>
                                        <!-- If it's not an image, provide a downloadable link -->
                                        <p><a href="<?= $fileUrl; ?>" target="_blank"><?= basename($fileUrl); ?></a></p>
                                    <?php endif; ?>
                                <?php endif; ?>

                                <!-- Upload new file -->
                                <input class="form-control" id="attachments" name="attachments" type="file">
                            </div>
                        <?php endif; ?>

                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Update Order</button>
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

    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>