<!-- Head View Start -->
<?= $this->include('head_view') ?>
<!-- Head View End -->
<style>
    .products-lists {
        display: flex;
        justify-content: space-between;
    }

    .add-product-btn {
        margin: 14px 0;
    }

    .close-btn {
        position: absolute;
        top: 10px;
        right: 10px;
        font-size: 20px;
        color: red;
        cursor: pointer;
    }

    .form-container {
        position: relative;
    }
</style>

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

                <form id="newcollectionsview" method="post" action="<?= base_url(); ?>ordermanagement/publishorder"
                    enctype="multipart/form-data" class="needs-validation" novalidate>

                    <input type="hidden" id="finalTotalPrice" name="final_total_price" value="0" />
                    <input type="hidden" id="finalShipmentCharges" name="final_shipment_charges" value="0" />
                    <input type="hidden" id="finalTotalDiscount" name="final_total_discount" value="0" />
                    <input type="hidden" id="cgst" name="cgst" value="0" />
                    <input type="hidden" id="sgst" name="sgst" value="0" />
                    <input type="hidden" id="igst" name="igst" value="0" />
                    <input type="hidden" id="finalTotalPrice" name="final_total" value="1250">



                    <div class="mb-3 d-flex justify-content-end">
                        <button type="submit" class="btn btn-dark btn-lg-4" style="margin-right: 10px;">
                            Publish
                        </button>
                        <button type="button" class="btn btn-dark btn-lg-4" id="draftFormBtn">
                            Save Draft
                        </button>
                    </div>


                    <div class="row">
                        <div class="col-md-9">
                            <div class="pd-20 card-box mb-30">
                                <div class="row d-flex p-3 justify-content-between">
                                    <p class="text-blue mb-30">Product's Info</p>

                                    <div class="form-group mb-3">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="internationalOrder"
                                                name="is_international_order">
                                            <label class="custom-control-label"
                                                for="internationalOrder"><strong>International Order</strong></label>
                                        </div>
                                    </div>
                                </div>

                                <!-- Button Group in Same Line with Gaps -->
                                <div class="form-group d-flex justify-content-start">
                                    <!-- Add Product Button -->
                                    <button type="button" class="btn btn-outline-secondary add-product-btn"
                                        data-toggle="modal" data-target="#productModal" style="margin-right: 10px;">
                                        Add Product
                                    </button>

                                    <!-- Apply Discount Button -->
                                    <button type="button" class="btn btn-outline-secondary add-product-btn"
                                        data-toggle="modal" data-target="#discountModal" style="margin-right: 10px;">
                                        Apply Discount
                                    </button>

                                    <!-- Add Shipment Charges Button -->
                                    <button type="button" class="btn btn-outline-secondary add-product-btn"
                                        data-toggle="modal" data-target="#shipmentModal">
                                        Add Shipment Charges
                                    </button>
                                </div>


                                <!-- Product Selection Modal -->
                                <div class="modal fade" id="productModal" tabindex="-1" role="dialog"
                                    aria-labelledby="productModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="productModalLabel">Select Products</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body" style="max-height: 400px; overflow-y: auto;">
                                                <div class="form-group">
                                                    <label for="productSearch">Search Products</label>
                                                    <input type="text" id="productSearch" class="form-control"
                                                        placeholder="Search products...">
                                                </div>
                                                <div class="form-group" id="modalProductList">
                                                    <?php foreach ($products as $index => $product): ?>
                                                        <div class="custom-control custom-checkbox product-item">
                                                            <input type="checkbox"
                                                                class="custom-control-input modal-product-checkbox"
                                                                id="modalProduct<?= $product['product_id'] ?>"
                                                                name="selected_products[]"
                                                                value="<?= $product['product_id'] ?>"
                                                                data-price="<?= $product['selling_price'] ?>"
                                                                data-image="<?= $product['product_image'] ?>">

                                                            <label class="custom-control-label products-lists"
                                                                for="modalProduct<?= $product['product_id'] ?>">
                                                                <img src="<?= $product['product_image'] ?>"
                                                                    alt="<?= $product['product_title'] ?>"
                                                                    style="width: 50px; height: auto; margin-right: 10px;">
                                                                <?= $product['product_title'] ?> -
                                                                ₹<?= $product['selling_price'] ?>

                                                                <div
                                                                    class="quantity-control d-inline-flex align-items-center">
                                                                    <button type="button"
                                                                        class="btn btn-outline-secondary qty-btn"
                                                                        id="decreaseQuantity<?= $product['product_id'] ?>">-</button>
                                                                    <input type="number"
                                                                        name="modal_quantity[<?= $product['product_id'] ?>]"
                                                                        value="1" min="1" class="form-control qty-input"
                                                                        id="quantity<?= $product['product_id'] ?>"
                                                                        style="width: 60px; text-align: center; margin: 0 5px;">
                                                                    <button type="button"
                                                                        class="btn btn-outline-secondary qty-btn"
                                                                        id="increaseQuantity<?= $product['product_id'] ?>">+</button>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label
                                                                        for="product_discount[<?= $product['product_id'] ?>]"
                                                                        class="discount-title">Add Discount (₹)</label>
                                                                    <input type="number"
                                                                        name="product_discount[<?= $product['product_id'] ?>]"
                                                                        value="0" min="0" step="0.01"
                                                                        placeholder="Discount ₹" class="discount-input">
                                                                </div>

                                                                <!-- Hidden fields to store discounted prices -->
                                                                <input type="hidden"
                                                                    name="discounted_price[<?= $product['product_id'] ?>]"
                                                                    id="discountedPrice<?= $product['product_id'] ?>"
                                                                    value="0">
                                                                <input type="hidden"
                                                                    name="discount_amount[<?= $product['product_id'] ?>]"
                                                                    id="discountAmount<?= $product['product_id'] ?>"
                                                                    value="0">
                                                            </label>
                                                        </div>
                                                    <?php endforeach; ?>

                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary"
                                                    id="confirmSelectionBtn">Add Selected Products</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Selected Products Table -->
                                <div class="form-group">
                                    <table class="table table-striped price-table">
                                        <thead>
                                            <tr>
                                                <th class="table-plus">ID</th>
                                                <th>Product Name</th>
                                                <th>Price/Unit</th>
                                                <th>Discount</th>
                                                <th>Quantity</th>
                                                <th>Original Price</th>
                                                <th>Discounted Price</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="productTableBody">
                                            <!-- Selected products will be dynamically added here -->
                                        </tbody>



                                    </table>
                                </div>

                                <!-- Discount Modal -->
                                <div class="modal fade" id="discountModal" tabindex="-1" role="dialog"
                                    aria-labelledby="discountModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="discountModalLabel">Apply Discount</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">


                                                <!-- Discount Code Options -->
                                                <div class="mb-3">
                                                    <label for="discountOption">Choose Discount Option:</label>
                                                    <select id="discountOption" class="form-control">
                                                        <option value="auto">Apply All Eligible Automatic Discounts
                                                        </option>
                                                        <option value="custom">Add Custom Order Discount</option>
                                                    </select>
                                                </div>

                                                <hr>

                                                <!-- Discount Type -->
                                                <label for="discountType">Discount Type:</label>
                                                <select id="discountType" class="form-control">
                                                    <option value="value">Value (₹)</option>
                                                    <option value="percentage">Percentage (%)</option>
                                                </select>

                                                <hr>

                                                <!-- Discount Amount -->
                                                <label for="discountAmount">Enter Discount:</label>
                                                <input type="number" id="discountAmount" class="form-control" min="0"
                                                    step="0.01">

                                                <hr>

                                                <!-- Discount Code -->
                                                <label for="discountCode">Enter Discount Code:</label>
                                                <input type="text" id="discountCode" class="form-control"
                                                    name="discount_code" placeholder="Enter code here">

                                                <hr>

                                                <label for="discountReason">Reason for Discount:</label>
                                                <textarea id="discountReason" class="form-control form-control-sm"
                                                    rows="3" name="discount_reason"
                                                    placeholder="Enter reason for the discount"></textarea>


                                                <hr>


                                            </div>
                                            <div class="modal-footer d-flex justify-content-end">
                                                <button type="button" class="btn btn-secondary me-2"
                                                    data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary" id="applyDiscount">Apply
                                                    Discount</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Shipment Modal -->

                                <div class="modal fade" id="shipmentModal" tabindex="-1" role="dialog"
                                    aria-labelledby="shipmentModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="shipmentModalLabel">Add Shipment Charges
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <label for="deliveryPartnerSelect">Select Delivery Partner:</label>
                                                <select id="deliveryPartnerSelect" class="form-control">
                                                    <option value="">-- Select a Delivery Partner --</option>
                                                    <?php foreach ($delivery_partner as $partner): ?>
                                                        <option value="<?= $partner['cost'] ?>"
                                                            data-pincode="<?= $partner['area_pincode'] ?>"
                                                            data-pickup="<?= $partner['pickup'] ?>"
                                                            data-delivery="<?= $partner['delivery'] ?>"
                                                            data-cod="<?= $partner['cod'] ?>">
                                                            <?= $partner['delivery_partner'] ?> - ₹<?= $partner['cost'] ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="gst">GST (%):</label>
                                                        <input type="number" id="gst" class="form-control" value="18">
                                                    </div>
                                                    <div class="col">
                                                        <label for="gstCharges">GST value (₹):</label>
                                                        <input type="number" readonly id="gstCharges"
                                                            class="form-control" value="0">
                                                    </div>
                                                </div>

                                                <label for="shipmentChargesModal">Final Shipment Charges (₹):</label>
                                                <input type="number" id="shipmentChargesModal" class="form-control"
                                                    min="0" step="0.01" value="0">
                                            </div>
                                            <div class="modal-footer d-flex justify-content-end">
                                                <button type="button" class="btn btn-secondary me-2"
                                                    data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary"
                                                    id="applyShipmentCharges">Apply Charges</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class=" pd-20 card-box mb-30">
                                <!-- Table for Price and Discount Info -->
                                <table class="table table-bordered table-striped">
                                    <thead class="thead-light">
                                        <tr>
                                            <th colspan="5" class="text-center"
                                                style="font-size: 16px; font-weight: bold;">Price Details</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th colspan="4" style="font-size: 14px;">Total Discount Applied</th>
                                            <td id="totalDiscountAppliedDisplay" class="text-right">₹0.00</td>
                                        </tr>
                                        <tr>
                                            <th colspan="4" style="font-size: 14px;">CGST (6%)</th>
                                            <td id="cgstDisplay" class="text-right">₹0.00</td>
                                        </tr>
                                        <tr>
                                            <th colspan="4" style="font-size: 14px;">SGST (6%)</th>
                                            <td id="sgstDisplay" class="text-right">₹0.00</td>
                                        </tr>
                                        <tr>
                                            <th colspan="4" style="font-size: 14px;">IGST (12%)</th>
                                            <td id="igstDisplay" class="text-right">₹0.00</td>
                                        </tr>

                                        <tr>
                                            <th colspan="4" style="font-size: 14px;">Shipment Charges</th>
                                            <td id="shipmentChargesDisplay" class="text-right">₹0.00</td>
                                        </tr>
                                        <tr>
                                            <th colspan="4" style="font-size: 14px;">Total</th>
                                            <td id="totalPrice" class="text-right">₹0.00</td>
                                        </tr>
                                    </tfoot>
                                </table>
                                <p id="saved"></p>
                            </div>



                            <div class="pd-20 card-box mb-30">
                                <p class="text-blue mb-30">Payment</p>
                                <div class="row">
                                    <div class="col-md" style="display: none;" id="international-currency">
                                        <div class="form-group">
                                            <label for="currency">Currency</label>
                                            <select class="form-control" name="currency"
                                                style="width: 100%; height: 50px;" id="currency" required>
                                                <option value="inr" selected>INR</option>
                                                <option value="usd">USD</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Payment Method Section -->
                                    <div class="col-md">
                                        <div class="form-group">
                                            <label for="paymentMethodSelect">Select Payment Mode</label>
                                            <div class="input-group">
                                                <select class="form-control rounded" name="payment-method"
                                                    style="width: 100%; height: 50px;" id="paymentMethodSelect">
                                                    <option value="cash">Cash</option>
                                                    <option value="link">Gateway</option>
                                                    <option value="bank">Net Banking / UPI</option>
                                                </select>
                                                <input class="form-control"
                                                    style="width: 100%; height: 50px; display:none" placeholder="Ref No"
                                                    type="text" id="ref_no" name="ref_no">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Payment Status Section -->
                                    <div class="col-md">
                                        <div class="form-group">
                                            <label for="paymentStatusSelect">Payment Status</label>
                                            <select class="form-control" name="payment-status"
                                                style="width: 100%; height: 50px;" id="paymentStatusSelect" required>
                                                <option value="Pending" selected>Pending</option>
                                                <option value="Paid">Prepaid</option>
                                                <option value="partial_cod">Partial COD</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Please select payment status.
                                            </div>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="pd-20 card-box mb-30">
                                <p class="text-blue mb-30 d-flex justify-content-between align-items-center">
                                    Select/Add Customer
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                        data-target="#addCustomerModal">
                                        <i class="fas fa-plus"></i> <!-- Plus icon -->
                                    </button>
                                </p>


                                <div class="form-group">
                                    <label for="CustomerSelect">Select</label>
                                    <select class="custom-select2 form-control" name="order-customer-name"
                                        style="width: 100%; height: 38px" id="CustomerSelect" required>
                                        <option value="">Select</option>
                                        <?php foreach ($users as $user): ?>
                                            <option value="<?= $user['user_id'] ?>"><?= $user['name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">Select Customer</div>
                                    <div class="valid-feedback">Looks good!</div>
                                </div>

                                <div class="form-group">

                                    <label for="order-customer-phone">Phone No.</label>
                                    <input class="form-control" type="text" name="order-customer-phone"
                                        id="orderCustomerPhone">

                                    <label for="order-customer-email">E-Mail</label>
                                    <input class="form-control" type="text" name="order-customer-email"
                                        id="orderCustomerEmail">

                                    <label for="Pincode">Pincode</label>
                                    <input class="form-control" type="number" name="pincode" id="orderCustomerPincode">

                                    <label for="customer-city">City</label>
                                    <input class="form-control" type="text" name="order-city" id="orderCustomerCity">

                                    <label for="customer-state">State</label>
                                    <input class="form-control" type="text" name="order-state" id="orderCustomerState">

                                    <div style="display: none;" id="international-country">
                                        <label for="country">Country</label>
                                        <input class="form-control" type="text" name="country"
                                            id="orderCustomerCountry">
                                    </div>

                                    <label for="address_information">Address</label>
                                    <textarea class="form-control" name="address_information"
                                        id="orderCustomerAddress"></textarea>


                                    <label for="order-customergstin">GSTIN</label>
                                    <input type="text" class="form-control" id="orderCustomergstin"
                                        name="order-customergstin">

                                </div>


                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
        <!-- Page Main Content End -->

        <!-- Modal -->
        <div class="modal fade" id="addCustomerModal" tabindex="-1" role="dialog"
            aria-labelledby="addCustomerModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addCustomerModalLabel">Add New Customer</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="addCustomerForm" method="post" action="<?= base_url('addnewcustomer') ?>">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="customerName">Name</label>
                                <input type="text" class="form-control" id="customerName" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="customerPhone">Phone Number</label>
                                <input type="text" class="form-control" id="customerPhone" name="phone_no" required>
                            </div>
                            <div class="form-group">
                                <label for="customerEmail">Email</label>
                                <input type="email" class="form-control" id="customerEmail" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="customerPassword">Pincode</label>
                                <input type="number" class="form-control" id="pincode" name="pincode" required>
                            </div>
                            <div class="form-group">
                                <label for="customerAddress">Address</label>
                                <textarea class="form-control" id="customerAddress" name="customer-address" rows="3"
                                    required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="customergstin">GSTIN</label>
                                <input type="text" class="form-control" id="customergstin" name="customergstin">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save Customer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <script src="https://checkout.razorpay.com/v1/checkout.js"></script>

        <!-- Razorpay Modal -->
        <div class="modal fade" id="razorpayModal" tabindex="-1" role="dialog" aria-labelledby="razorpayModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="razorpayModalLabel">Complete Payment</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Processing payment...</p>
                        <div id="razorpay-checkout-form"></div>
                    </div>
                </div>
            </div>
        </div>

</body>
<!-- Footer View Start -->
<?= $this->include('footer_view') ?>
<!-- Footer View End -->


<script>
    document.addEventListener('DOMContentLoaded', () => {
        const confirmSelectionBtn = document.getElementById('confirmSelectionBtn');
        const paymentStatusSelect = document.getElementById('paymentStatusSelect');
        const productTableBody = document.getElementById('productTableBody');
        const cgstDisplay = document.getElementById('cgstDisplay');
        const sgstDisplay = document.getElementById('sgstDisplay');
        const igstDisplay = document.getElementById('igstDisplay');
        const totalPriceEl = document.getElementById('totalPrice');
        const CustomerState = document.getElementById('orderCustomerState');
        const shipmentChargesDisplay = document.getElementById('shipmentChargesDisplay');
        const applyDiscountBtn = document.getElementById('applyDiscount');
        const discountAmountInput = document.getElementById('discountAmount');
        const discountCodeInput = document.getElementById('discountCode');
        const shipmentChargesModalInput = document.getElementById('shipmentChargesModal');
        const applyShipmentChargesBtn = document.getElementById('applyShipmentCharges');
        const discountOptionSelect = document.getElementById('discountOption'); // Discount option selector
        const customDiscountSection = document.getElementById('customDiscountSection'); // Custom discount section
        const shipmentModal = document.getElementById('shipmentModal'); // Shipment modal
        const discountTypeSelect = document.getElementById('discountType');  // Discount type (percentage/fixed)
        const partialCodId = 'partial_cod_row'; // Unique ID for the Partial COD row
        const partialCodAmount = 300; // Fixed Partial COD amount
        const paymentMethodSelect = document.getElementById("paymentMethodSelect");
        const refNoInput = document.getElementById("ref_no");

        const INTERNATIONAL_SHIPPING_SURCHARGE = 1000; // ₹1000 per product
        const USD_EXCHANGE_RATE = 0.012; // Example rate: 1 INR = 0.012 USD
        const internationalCheckbox = document.getElementById('internationalOrder');
        const Internationalcountry = document.getElementById('international-country');
        const Internationalcurrency = document.getElementById('international-currency');


        let selectedProducts = [];
        let totalDiscount = 0; // Variable to store the total discount applied
        let totalDiscountApplied = false; // Flag to track if total discount is applied
        let shipmentCharges = 0; // Variable for shipment charges
        let discountAppliedAt = null;

        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('newcollectionsview');
            const paymentMethodSelect = document.getElementById('paymentMethodSelect');
            const razorpayModal = new bootstrap.Modal(document.getElementById('razorpayModal'), {
                backdrop: 'static',
                keyboard: false
            });

            form.addEventListener('submit', function (e) {
                e.preventDefault();

                const selectedProducts = document.querySelectorAll('input[name="selected_products[]"]:checked');
                const customer = document.querySelector('[name="order-customer-name"]').value;

                if (!customer) {
                    alert('Please select a customer.');
                    return false;
                }

                if (selectedProducts.length === 0) {
                    alert('Please select at least one product.');
                    return false;
                }

                const paymentMethod = paymentMethodSelect.value;
                if (paymentMethod === 'link') {
                    // Show modal (optional UI)
                    razorpayModal.show();

                    // Create order via backend to get Razorpay Order ID
                    const formData = new FormData(form);
                    fetch('<?= base_url('ordermanagement/publishorder') ?>', {
                        method: 'POST',
                        body: formData
                    })
                        .then(res => res.json())
                        .then(data => {
                            if (data.status === 'success') {
                                // Proceed with Razorpay Payment
                                const razorpayOptions = {
                                    key: "<?= 'rzp_test_HNDDo4TA783qRj' ?>",
                                    amount: data.amount, // Amount in paisa
                                    currency: "INR",
                                    name: "Order Payment",
                                    description: "Payment for Order #" + data.order_id,
                                    order_id: data.razorpay_order_id,
                                    handler: function (response) {
                                        // Add Razorpay response to form before submitting
                                        const rzpFields = {
                                            rzp_payment_id: response.razorpay_payment_id,
                                            rzp_order_id: response.razorpay_order_id,
                                            rzp_signature: response.razorpay_signature
                                        };
                                        for (const key in rzpFields) {
                                            const input = document.createElement('input');
                                            input.type = 'hidden';
                                            input.name = key;
                                            input.value = rzpFields[key];
                                            form.appendChild(input);
                                        }

                                        razorpayModal.hide();
                                        form.submit();
                                    },
                                    prefill: {
                                        name: document.getElementById('orderCustomerPhone').value || "Customer",
                                        email: document.getElementById('orderCustomerEmail').value || "email@example.com",
                                        contact: document.getElementById('orderCustomerPhone').value || "9999999999"
                                    },
                                    theme: {
                                        color: "#3399cc"
                                    }
                                };
                                const rzp = new Razorpay(razorpayOptions);
                                rzp.open();
                            } else {
                                razorpayModal.hide();
                                alert('Failed to initialize Razorpay payment. Please try again.');
                            }
                        })
                        .catch(err => {
                            razorpayModal.hide();
                            alert('Something went wrong: ' + err.message);
                        });

                } else {
                    // For other payment methods, proceed with normal submit
                    form.submit();
                }
            });
        });


        // Initialize on page load
        if (paymentMethodSelect.value !== "cash") {
            refNoInput.style.display = "block";
            refNoInput.required = true;
        }

        function addOrUpdatePartialCodRow() {
            const partialCodId = 'partial_cod_row';
            const existingRow = document.getElementById(partialCodId);
            const isInternational = internationalCheckbox.checked;

            if (!existingRow) {
                const newRow = document.createElement('tr');
                newRow.id = partialCodId;
                newRow.innerHTML = `
                    <td>#</td>
                    <td>Partial COD</td>
                    <td>${(isInternational ? `₹1300 / $${(1300 * USD_EXCHANGE_RATE)}` : '₹300')}</td>
                    <td>₹0</td>
                    <td>1</td>
                    <td><span style="text-decoration: line-through; color: red;"> ${(isInternational ? `₹1300.00 / $${(1300 * USD_EXCHANGE_RATE)}` : '₹300.00')}</span></td>
                    <td><span style="font-weight: bold; color: green;"> ${(isInternational ? `₹1300.00 / $${(1300 * USD_EXCHANGE_RATE)}` : '₹300.00')}</span></td>
                    <td>
                        <button type="button" class="btn btn-danger btn-sm remove-product-btn" data-product-id="partial_cod">Remove</button>
                    </td>
                `;
                productTableBody.appendChild(newRow);
            }
        }

        /**
         * Removes the Partial COD row from the product table.
         */
        function removePartialCodRow() {
            const partialCodRow = document.getElementById('partial_cod_row');
            if (partialCodRow) {
                partialCodRow.remove();
            }
        }

        /**
         * Updates the total price in the summary section, including the Partial COD amount.
         */
        // Function to update the final total amount
        function updateFinalTotal() {
            let totalDiscountedPrice = 0;
            let productLevelDiscount = 0;

            const isInternational = internationalCheckbox.checked;
            const finalTotalPriceInput = document.getElementById('finalTotalPrice');

            // Calculate total from selected products
            selectedProducts.forEach(product => {
                let productPrice = product.price;
                if (isInternational) {
                    productPrice += INTERNATIONAL_SHIPPING_SURCHARGE;
                }
                const discountedPrice = productPrice - product.discount;
                totalDiscountedPrice += discountedPrice * product.quantity;
                productLevelDiscount += product.discount * product.quantity;
            });

            // Add shipment charges
            totalDiscountedPrice += shipmentCharges;

            // Apply the appropriate discount
            if (discountAppliedAt === 'invoice') {
                totalDiscountedPrice -= totalDiscount; // Apply invoice-level discount
            }

            // Add Partial COD amount if applicable
            if (document.getElementById('partial_cod_row')) {
                totalDiscountedPrice += partialCodAmount;
                if (isInternational) {
                    totalDiscountedPrice += INTERNATIONAL_SHIPPING_SURCHARGE;
                }
            }

            // Update final total
            finalTotalPriceInput.value = totalDiscountedPrice.toFixed(2);
            totalPriceEl.innerHTML = `
                <span style="text-decoration: line-through; color: red; margin-right: 10px;">₹${(totalDiscountedPrice + (discountAppliedAt === 'invoice' ? totalDiscount : productLevelDiscount)).toFixed(2)}</span>
                <span style="font-weight: bold; color: green;">₹${totalDiscountedPrice.toFixed(2)}  ${(isInternational ? `  /   $${(totalDiscountedPrice * USD_EXCHANGE_RATE).toFixed(2)}` : '')}</span>
            `;

            // Update discount information in the footer
            updateDiscountFooter(productLevelDiscount, totalDiscount, discountAppliedAt === 'invoice' ? 'Invoice Level' : 'Product Level');
        }




        function calculateGST(totalDiscountedPrice) {
            let cgst = 0, sgst = 0, igst = 0;
            const isInternational = internationalCheckbox.checked;


            if (isInternational) {
                if (CustomerState.value === 'Maharashtra') {
                    cgst = 0;
                    sgst = 0;
                    cgstDisplay.textContent = `Not Applicable`;
                    sgstDisplay.textContent = `Not Applicable`;
                    igstDisplay.textContent = `Not Applicable`;
                    document.getElementById('cgst').value = 0;
                    document.getElementById('sgst').value = 0;
                    document.getElementById('igst').value = 0;
                } else {
                    igst = 0;
                    igstDisplay.textContent = `Not Applicable`;
                    cgstDisplay.textContent = `Not Applicable`;
                    sgstDisplay.textContent = `Not Applicable`;
                    document.getElementById('cgst').value = 0;
                    document.getElementById('sgst').value = 0;
                    document.getElementById('igst').value = 0;
                }
            }
            else {
                if (CustomerState.value === 'Maharashtra') {
                    cgst = totalDiscountedPrice - (totalDiscountedPrice / 1.06);
                    sgst = totalDiscountedPrice - (totalDiscountedPrice / 1.06);
                    cgstDisplay.textContent = `₹${cgst.toFixed(2)}`;
                    sgstDisplay.textContent = `₹${sgst.toFixed(2)}`;
                    igstDisplay.textContent = `₹0.00`;
                    document.getElementById('cgst').value = cgst.toFixed(2);
                    document.getElementById('sgst').value = sgst.toFixed(2);
                    document.getElementById('igst').value = igst.toFixed(2);
                } else {
                    igst = totalDiscountedPrice - (totalDiscountedPrice / 1.12);
                    igstDisplay.textContent = `₹${igst.toFixed(2)}`;
                    cgstDisplay.textContent = `₹0.00`;
                    sgstDisplay.textContent = `₹0.00`;
                    document.getElementById('cgst').value = cgst.toFixed(2);
                    document.getElementById('sgst').value = sgst.toFixed(2);
                    document.getElementById('igst').value = igst.toFixed(2);
                }
            }

            return cgst + sgst + igst; // Return the total GST amount
        }

        CustomerState.addEventListener('change', () => {
            updateProductTable(); // Recalculate table and GST when the state changes
        });


        // Function to sync modal checkboxes with selected products
        const syncCheckboxes = () => {
            const modalCheckboxes = document.querySelectorAll('.modal-product-checkbox');
            modalCheckboxes.forEach(checkbox => {
                const productId = checkbox.value;
                checkbox.checked = selectedProducts.some(product => product.id === productId);
            });
        };

        // Function to enable or disable fields based on discount option
        function toggleDiscountFields() {
            if (discountOptionSelect.value === 'auto') {
                // Apply all eligible automatic discount: disable discount code and reason, enable only discount amount and discount type
                discountCodeInput.disabled = true;
                discountAmountInput.disabled = false;
                discountAmountInput.required = false; // Make sure discount amount is required
                discountCodeInput.required = false;
                customDiscountSection.style.display = 'none'; // Hide custom discount section
            } else if (discountOptionSelect.value === 'custom') {
                // Add custom order discount: disable discount amount and show discount code
                discountCodeInput.disabled = false;
                discountAmountInput.disabled = true;
                discountAmountInput.required = false;
                customDiscountSection.style.display = 'block'; // Show custom discount section
            }
        }

        internationalCheckbox.addEventListener('change', updateProductTable);

        // Update the product table based on selected products
        function updateProductTable() {
            productTableBody.innerHTML = ''; // Clear existing table rows
            let totalDiscountedPrice = 0;
            let discountOnProduct = 0;
            const isInternational = internationalCheckbox.checked;
            Internationalcurrency.style.display = isInternational ? '' : 'none';
            Internationalcountry.style.display = isInternational ? '' : 'none';

            selectedProducts.forEach(product => {
                let productPrice = product.price;
                if (isInternational) {
                    productPrice += INTERNATIONAL_SHIPPING_SURCHARGE;
                }
                const discountedPrice = productPrice - product.discount;
                const subtotal = discountedPrice * product.quantity;
                const productQuantity = product.quantity;
                const productDiscount = product.discount;

                totalDiscountedPrice += subtotal;

                discountOnProduct += productDiscount * productQuantity;


                const productRow = document.createElement('tr');
                productRow.innerHTML = `
                    <td>${product.id}</td>
                    <td>${product.name}</td>
                    <td>₹${productPrice} ${(isInternational ? ` / $${(productPrice * USD_EXCHANGE_RATE)}` : '')}</td>
                    <td>₹${productDiscount} ${(isInternational ? ` / $${(productDiscount * USD_EXCHANGE_RATE)}` : '')}</td>
                    <td>${productQuantity}</td>
                    <td><span style="text-decoration: line-through; color: red;">&#8377;${(productPrice * productQuantity).toFixed(2)} ${(isInternational ? ` / $${(productPrice * productQuantity * USD_EXCHANGE_RATE)}` : '')}</span></td>
                    <td><span style="font-weight: bold; color: green;">&#8377;${subtotal.toFixed(2)} ${(isInternational ? ` / $${(subtotal * USD_EXCHANGE_RATE)}` : '')}</span></td>
                    <td>
                        <button type="button" class="btn btn-danger btn-sm remove-product-btn" data-product-id="${product.id}">Remove</button>
                    </td>
                `;
                productTableBody.appendChild(productRow);
            });



            const gstAmount = calculateGST(totalDiscountedPrice);
            const Total = totalDiscountedPrice + discountOnProduct + totalDiscount + shipmentCharges;
            const finalTotal = totalDiscountedPrice + shipmentCharges;
            /*
            // Apply total discount if set
            if (discountAppliedAt === 'invoice') {
                totalDiscountedPrice -= totalDiscount; // Apply invoice discount
            }
            totalPriceEl.innerHTML = `
                <span style="text-decoration: line-through; color: red; margin-right: 10px;">&#8377;${Total.toFixed(2)}</span>
                <span style="font-weight: bold; color: green;">&#8377;${finalTotal.toFixed(2)}</span>
            `;
            */

            if (paymentStatusSelect.value === 'partial_cod') {
                addOrUpdatePartialCodRow();
            }

            // Update the final total
            updateFinalTotal();


            shipmentChargesDisplay.textContent = `₹${shipmentCharges.toFixed(2)}`;

            // Update the discount information in the table footer
            updateDiscountFooter(discountOnProduct, totalDiscount, discountAppliedAt === 'invoice' ? 'Invoice Level' : 'Product Level');

            // Update hidden fields with the final calculated values
            //document.getElementById('finalTotalPrice').value = totalDiscountedPrice.toFixed(2);
            document.getElementById('finalShipmentCharges').value = shipmentCharges.toFixed(2);
            document.getElementById('finalTotalDiscount').value = totalDiscount.toFixed(2);
            if (Total != finalTotal) {
                document.getElementById('saved').innerHTML = `You saved <span style="font-weight: bold; color: green;">${(isInternational ? `$${((Total - finalTotal) * USD_EXCHANGE_RATE).toFixed(2)}` : `₹${(Total - finalTotal).toFixed(2)}`)} </span>`;
            }
        }

        paymentStatusSelect.addEventListener('change', () => {
            if (paymentStatusSelect.value === 'partial_cod') {
                addOrUpdatePartialCodRow();
            } else {
                removePartialCodRow();
            }
            updateFinalTotal();
        });


        // Update the discount details in the <tfoot>
        function updateDiscountFooter(discountOnProduct, totalDiscount, discountType) {
            const discountOnProductEl = document.getElementById('discountOnProductDisplay');
            const totalDiscountAppliedEl = document.getElementById('totalDiscountAppliedDisplay');

            //discountOnProductEl.textContent = `₹${discountOnProduct.toFixed(2)}`;
            totalDiscountAppliedEl.textContent = `₹${(discountType === 'Invoice Level' ? totalDiscount : discountOnProduct).toFixed(2)} (${discountType})`;
        }

        // Function to manage exclusive discount application
        function applyDiscount(type) {
            if (type === 'invoice') {
                totalDiscount = parseFloat(discountAmountInput.value) || 0;
                discountAppliedAt = 'invoice';
                selectedProducts.forEach(product => (product.discount = 0)); // Reset product-level discounts

            } else if (type === 'product') {
                totalDiscount = 0; // Reset invoice-level discount
                discountAppliedAt = 'product';
            }
            updateProductTable();
        }

        // Handle discount option change
        discountOptionSelect.addEventListener('change', () => {
            toggleDiscountFields();
        });

        document.addEventListener('DOMContentLoaded', () => {
            const productTableBody = document.getElementById('productTableBody');

            function updateHiddenFields(productId, discountedPrice, discountAmount) {
                document.getElementById(`discountedPrice${productId}`).value = discountedPrice;
                document.getElementById(`discountAmount${productId}`).value = discountAmount;
            }

            // Example: Updating discount fields dynamically
            productTableBody.addEventListener('change', function (event) {
                const target = event.target;
                if (event.target.name.startsWith('product_discount')) {
                    applyDiscount('product');
                }
                if (target.name.startsWith('product_discount')) {
                    const productId = target.name.match(/\d+/)[0];
                    const productPrice = parseFloat(target.closest('.product-item').querySelector('.modal-product-checkbox').dataset.price);
                    const discount = parseFloat(target.value) || 0;

                    const discountedPrice = Math.max(0, productPrice - discount);
                    updateHiddenFields(productId, discountedPrice, discount);
                }
            });
        });

        // Handle product selection
        confirmSelectionBtn.addEventListener('click', () => {
            const selectedCheckboxes = document.querySelectorAll('.modal-product-checkbox:checked');
            selectedProducts = []; // Clear previously selected products
            if (discountAppliedAt === 'invoice') {
                totalDiscount = 0; // Apply invoice discount
                applyDiscount('product');
            }
            selectedCheckboxes.forEach(checkbox => {
                const productId = checkbox.value;
                const productName = checkbox.nextElementSibling.childNodes[2].nodeValue.trim();
                const productPrice = parseFloat(checkbox.dataset.price);
                const productQuantity = parseInt(document.querySelector(`input[name="modal_quantity[${productId}]"]`).value, 10);
                const productDiscount = parseFloat(document.querySelector(`input[name="product_discount[${productId}]"]`).value) || 0;

                // Add product to the selectedProducts array
                selectedProducts.push({
                    id: productId,
                    name: productName,
                    price: productPrice,
                    quantity: productQuantity,
                    discount: productDiscount
                });
            });

            updateProductTable(); // Update table after selection
            syncCheckboxes(); // Sync checkboxes
            $('#productModal').modal('hide');
        });

        // Initialize Select2 for Delivery Partner with z-index fix
        $('#deliveryPartnerSelect').select2({
            placeholder: "Search by delivery partner name or pincode",
            allowClear: true,
            width: '100%', // Ensure full width
            dropdownParent: $('#shipmentModal'), // Attach dropdown to modal for proper z-index
            escapeMarkup: (markup) => markup, // Allow custom HTML rendering
            templateResult: formatDeliveryPartner, // Custom display for dropdown
            templateSelection: formatDeliveryPartnerSelection, // Custom display for selected item
            matcher: function (params, data) {
                if ($.trim(params.term) === '') {
                    return data;
                }

                const term = params.term.toLowerCase();
                const text = data.text ? data.text.toLowerCase() : '';
                const pincode = $(data.element).data('pincode') ? $(data.element).data('pincode').toString() : '';

                // Match if search term is in name or pincode
                if (text.includes(term) || pincode.includes(term)) {
                    return data;
                }

                return null; // Exclude unmatched items
            }
        });

        // Function to calculate GST and update values
        function calculateAndUpdateGST() {
            const baseAmount = parseFloat($('#deliveryPartnerSelect').val()) || 0;
            const gstPercentage = parseFloat($('#gst').val()) || 18;

            // Calculate GST amount
            const gstAmount = (baseAmount * gstPercentage) / 100;

            // Calculate final amount including GST
            const finalAmount = baseAmount + gstAmount;

            // Update the GST charges input
            $('#gstCharges').val(gstAmount.toFixed(2));

            // Update the final shipment charges
            $('#shipmentChargesModal').val(finalAmount.toFixed(2));
        }

        // Event Listener for Delivery Partner Selection
        $('#deliveryPartnerSelect').on('select2:select', function (e) {
            const selectedOption = e.params.data.element;
            const selectedCost = $(selectedOption).val();
            const pickup = ($(selectedOption.element).data('pickup') || '').toLowerCase();
            const delivery = ($(selectedOption.element).data('delivery') || '').toLowerCase();
            const cod = ($(selectedOption.element).data('cod') || '').toLowerCase();

            $('#shipmentChargesModal').val(selectedCost);
            calculateAndUpdateGST();
            /*
            // Validate Pickup, Delivery, and COD status
            if ((pickup || '').toLowerCase() === 'y' &&  (delivery || '').toLowerCase() === 'y' && (cod || '').toLowerCase() === 'y') {
                $('#shipmentChargesModal').val(selectedCost); // Set the cost in the shipment charges input
            } else {
                alert("The selected delivery partner does not support Pickup, Delivery, and COD.");
                $('#deliveryPartnerSelect').val('').trigger('change'); // Reset selection
            }
            */
        });

        // Event Listener to clear shipment charges when dropdown is cleared
        $('#deliveryPartnerSelect').on('select2:clear', function () {
            $('#gstCharges').val('0');
            $('#shipmentChargesModal').val('0');
        });

        // Event Listener for GST percentage changes
        $('#gst').on('input', function () {
            calculateAndUpdateGST();
        });

        // Format the dropdown display with additional details
        function formatDeliveryPartner(partner) {
            if (!partner.id) return partner.text; // Show placeholder text for empty selection

            const pincode = $(partner.element).data('pincode');
            const pickup = ($(partner.element).data('pickup') || '').toLowerCase() === 'y' ? 'Yes' : 'No';
            const delivery = ($(partner.element).data('delivery') || '').toLowerCase() === 'y' ? 'Yes' : 'No';
            const cod = ($(partner.element).data('cod') || '').toLowerCase() === 'y' ? 'Yes' : 'No';


            return `
                <div>
                    <strong>${partner.text}</strong>
                    <div><small>Pincode: ${pincode}</small></div>
                    <div><small>Pickup: ${pickup}, Delivery: ${delivery}, COD: ${cod}</small></div>
                </div>
            `;
        }

        // Format the selected item display
        function formatDeliveryPartnerSelection(partner) {
            return partner.text || partner.placeholder;
        }

        // Apply shipment charges from the modal
        applyShipmentChargesBtn.addEventListener('click', () => {
            shipmentCharges = parseFloat(shipmentChargesModalInput.value) || 0;
            updateProductTable(); // Recalculate total price with shipment charges
            syncCheckboxes(); // Sync checkboxes
            $('#shipmentModal').modal('hide'); // Close the modal
        });

        // Remove product from the table
        productTableBody.addEventListener('click', function (e) {
            if (e.target.classList.contains('remove-product-btn')) {
                const productId = e.target.getAttribute('data-product-id');

                if (productId === 'partial_cod') {
                    // Reset payment status if Partial COD is removed
                    paymentStatusSelect.value = 'Pending';
                    removePartialCodRow();
                } else {
                    // Remove the selected product
                    selectedProducts = selectedProducts.filter(product => product.id !== productId);
                }
                updateProductTable();
                syncCheckboxes();
            }
        });

        $(document).ready(function () {
            // Handle customer selection
            $('#CustomerSelect').change(function () {
                var userId = $(this).val();

                if (userId) {
                    $.ajax({
                        url: "<?= base_url('getCustomerDetails') ?>",
                        type: "GET",
                        data: { user_id: userId },
                        dataType: "json",
                        success: function (data) {
                            if (data) {
                                $('#orderCustomerPhone').val(data.phone_no);
                                $('#orderCustomerEmail').val(data.email);
                                $('#orderCustomerPincode').val(data.pincode);
                                $('#orderCustomerCity').val(data.city);
                                $('#orderCustomerState').val(data.state);
                                $('#orderCustomerAddress').val(data.address_information);
                                $('#orderCustomergstin').val(data.seller_gst_number);
                                updateProductTable(); // Recalculate total after removing a product
                                syncCheckboxes();
                                if (data.pincode) {
                                    fetchCityStateByPincode(data.pincode);
                                }
                            } else {
                                clearCustomerFields();
                            }
                        },
                        error: function () {
                            console.error('An error occurred while fetching customer details.');
                            clearCustomerFields();
                        }
                    });
                } else {
                    clearCustomerFields();
                }
            });

            // Handle pincode input for autofetch city and state
            $('#orderCustomerPincode').on('input', function () {
                const pincode = $(this).val();
                if (pincode.length === 6) {
                    fetchCityStateByPincode(pincode);
                } else {

                }
            });

            function fetchCityStateByPincode(pincode) {
                $.ajax({
                    url: `<?= base_url('getCityStateByPincode/') ?>${pincode}`,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        if (data.city && data.state) {
                            $('#orderCustomerCity').val(data.city);
                            $('#orderCustomerState').val(data.state);
                            updateProductTable();
                            syncCheckboxes();
                        } else {

                            alert('City and State not found for the given Pincode.');
                        }
                    },
                    error: function () {
                        console.error('Error fetching city and state for the pincode.');

                    }
                });
            }

            function clearCustomerFields() {
                $('#orderCustomerPhone').val('');
                $('#orderCustomerEmail').val('');
                $('#orderCustomerPincode').val('');
                $('#orderCustomerCity').val('');
                $('#orderCustomerState').val('');
                $('#orderCustomerAddress').val('');
                $('#orderCustomergstin').val('');
            }
        });


        // Apply total discount for custom option
        applyDiscountBtn.addEventListener('click', () => {
            const discountCode = discountCodeInput.value.trim();
            const discountType = discountOptionSelect.value;
            if (discountType === 'auto' || discountType === 'custom') {
                applyDiscount('invoice');
            }

            if (discountOptionSelect.value === 'custom') {
                // Validate the discount code via AJAX request
                if (discountCode === "") {
                    alert("Please enter a discount code.");
                    return;
                }

                fetch('<?= base_url('discount/applyDiscount') ?>', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: 'discountCode=' + encodeURIComponent(discountCode)
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === 'success') {
                            // Get the discount amount from the response
                            let discountValue = parseFloat(data.discountAmount) || 0;
                            let discountType = discountTypeSelect.value;
                            const isInternational = internationalCheckbox.checked;

                            let remainingTotal = selectedProducts.reduce((sum, product) => {
                                let priceAfterDiscount = product.price - product.discount;
                                if (isInternational) {
                                    priceAfterDiscount += INTERNATIONAL_SHIPPING_SURCHARGE;
                                }
                                return sum + priceAfterDiscount * product.quantity;
                            }, 0);

                            if (discountType === 'percentage') {
                                // Apply the discount as a percentage of the remaining total
                                totalDiscount = (remainingTotal * discountValue) / 100;
                            } else {
                                // Apply the discount as a fixed value
                                totalDiscount = discountValue;
                            }

                            totalDiscountApplied = true;
                            alert(`Custom discount applied: ₹${totalDiscount}`);
                            updateProductTable();
                        } else {
                            alert(data.message);
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            } else if (discountOptionSelect.value === 'auto') {
                // Apply automatic discount (no need for code validation)
                let discountValue = parseFloat(discountAmountInput.value) || 0;
                let discountType = discountTypeSelect.value;
                const isInternational = internationalCheckbox.checked;

                // If discount is percentage, calculate based on the remaining amount after product discount
                let remainingTotal = selectedProducts.reduce((sum, product) => {
                    let priceAfterDiscount = product.price - product.discount;
                    if (isInternational) {
                        priceAfterDiscount += INTERNATIONAL_SHIPPING_SURCHARGE;
                    }
                    return sum + priceAfterDiscount * product.quantity;
                }, 0);

                if (discountType === 'percentage') {
                    // Apply the discount as a percentage
                    totalDiscount = (remainingTotal * discountValue) / 100;
                } else {
                    // Apply the discount as a fixed value
                    totalDiscount = discountValue;
                }

                totalDiscountApplied = true;
                alert(`Automatic discount applied: ₹${totalDiscount}`);
                updateProductTable();
            }
        });

        toggleDiscountFields();
        syncCheckboxes();
    });
</script>

<script>
    $(document).ready(function () {
        let duplicateCount = 1;

        // Detect if the page is refreshed
        const isPageReloaded = (performance.navigation.type === 1);

        // Check URL parameters
        const urlParams = new URLSearchParams(window.location.search);
        const duplicateNumber = urlParams.get('duplicate');

        // Logic for the first form
        if (!duplicateNumber) {
            if (isPageReloaded) {
                // If the first form is refreshed, clear all session data
                sessionStorage.clear();
            }
        }

        // When the Duplicate button is clicked
        $('#duplicateFormBtn').click(function () {
            // Save current form data
            var formData = $('#newcollectionsview').serializeArray();
            var tableData = $('#productTableBody').html();
            var discountOnProduct = $('#discountOnProductDisplay').text();
            var totalDiscountApplied = $('#totalDiscountAppliedDisplay').text();
            var shipmentCharges = $('#shipmentChargesDisplay').text();
            var totalPrice = $('#totalPrice').text();

            // Store form data and summary data
            sessionStorage.setItem('originalFormData', JSON.stringify(formData));
            sessionStorage.setItem('originalTableData', tableData);
            sessionStorage.setItem('originalDiscountOnProduct', discountOnProduct);
            sessionStorage.setItem('originalTotalDiscountApplied', totalDiscountApplied);
            sessionStorage.setItem('originalShipmentCharges', shipmentCharges);
            sessionStorage.setItem('originalTotalPrice', totalPrice);

            // Store duplicated form data
            sessionStorage.setItem('duplicatedFormData', JSON.stringify(formData));
            sessionStorage.setItem('duplicatedTableData', tableData);
            sessionStorage.setItem('duplicatedDiscountOnProduct', discountOnProduct);
            sessionStorage.setItem('duplicatedTotalDiscountApplied', totalDiscountApplied);
            sessionStorage.setItem('duplicatedShipmentCharges', shipmentCharges);
            sessionStorage.setItem('duplicatedTotalPrice', totalPrice);
            sessionStorage.setItem('duplicateCount', duplicateCount + 1);

            // Redirect to the same route
            window.location.href = window.location.href + "?duplicate=" + duplicateCount;
        });

        // On page load, check if original or duplicated data is present
        if (duplicateNumber) {
            // Load duplicated form
            duplicateCount = parseInt(duplicateNumber);
            loadFormData('duplicated');
            addDuplicateTitle(duplicateNumber);
            addBackToFirstFormButton();
        } else if (sessionStorage.getItem('originalFormData')) {
            // Load original form data (if returning from a duplicate)
            loadFormData('original');
        }

        // Function to load form data
        function loadFormData(type) {
            var formData = JSON.parse(sessionStorage.getItem(type + 'FormData'));
            var tableData = sessionStorage.getItem(type + 'TableData');
            var discountOnProduct = sessionStorage.getItem(type + 'DiscountOnProduct');
            var totalDiscountApplied = sessionStorage.getItem(type + 'TotalDiscountApplied');
            var shipmentCharges = sessionStorage.getItem(type + 'ShipmentCharges');
            var totalPrice = sessionStorage.getItem(type + 'TotalPrice');

            // Restore form fields
            formData.forEach(function (item) {
                var element = $('[name="' + item.name + '"]');
                if (element.attr('type') === 'checkbox' || element.attr('type') === 'radio') {
                    element.prop('checked', element.val() === item.value);
                } else {
                    element.val(item.value);
                }
            });

            // Restore table and summary data
            $('#productTableBody').html(tableData);
            $('#discountOnProductDisplay').text(discountOnProduct);
            $('#totalDiscountAppliedDisplay').text(totalDiscountApplied);
            $('#shipmentChargesDisplay').text(shipmentCharges);
            $('#totalPrice').text(totalPrice);
        }

        // Function to add a "Back to First Form" button
        function addBackToFirstFormButton() {
            var backButton = $('<button class="btn btn-light" id="backToFirstFormBtn">Back to First Form</button>');
            backButton.css({ margin: '20px 0', display: 'block' });
            $('#newcollectionsview').before(backButton);

            // On click, load the original form data
            backButton.click(function () {
                // Clear duplicate data
                sessionStorage.removeItem('duplicatedFormData');
                sessionStorage.removeItem('duplicatedTableData');
                sessionStorage.removeItem('duplicatedDiscountOnProduct');
                sessionStorage.removeItem('duplicatedTotalDiscountApplied');
                sessionStorage.removeItem('duplicatedShipmentCharges');
                sessionStorage.removeItem('duplicatedTotalPrice');

                // Reload the page to show the original form
                window.location.href = window.location.origin + window.location.pathname;
            });
        }

        // Function to add a title for the duplicated form
        function addDuplicateTitle(duplicateNumber) {
            var title = $('<h3 class="form-title">Form Duplicate #' + duplicateNumber + '</h3>');
            title.css({ margin: '10px 0', color: '#333' });
            $('#newcollectionsview').before(title);
        }
    });
</script>

<script>
    // Decrease quantity button functionality
    document.querySelectorAll('.qty-btn').forEach(function (button) {
        button.addEventListener('click', function () {
            var quantityInput = this.closest('.quantity-control').querySelector('.qty-input');
            var currentQuantity = parseInt(quantityInput.value);

            if (this.id.includes('decrease') && currentQuantity > 1) {
                quantityInput.value = currentQuantity - 1;
            } else if (this.id.includes('increase')) {
                quantityInput.value = currentQuantity + 1;
            }
        });
    });
    
</script>

<style>
    /* Make quantity controls and discount input align in the same row */
    .quantity-control {
        display: inline-flex;
        align-items: center;
    }

    /* Remove border from plus and minus icons */
    .qty-btn {
        width: 30px;
        height: 30px;
        font-size: 18px;
        padding: 0;
        display: inline-block;
        border: none;
        /* Remove border */
        background-color: transparent;
        /* Make background transparent */
        color: #000;
        /* Set the color of the icon */
        cursor: pointer;
        /* Change cursor to pointer to indicate it's clickable */
    }

    /* Optional: Hover effect to indicate interactivity */
    .qty-btn:hover {
        background-color: #f0f0f0;
        /* Light background on hover */
    }


    .qty-input {
        width: 60px;
        height: 30px;
        text-align: center;
        margin: 0 5px;
    }

    .discount-input {
        width: 80px;
        height: 30px;
        font-size: 14px;
        margin-left: 5px;
        text-align: center;
    }

    /* Optional: Ensure the labels align well */
    .custom-control-label {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }

    /* Optional: Add a bit of spacing between items */
    .product-item {
        margin-bottom: 15px;
    }
</style>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const pincodeInput = document.getElementById('pincode');
        const customerCityInput = document.createElement('input');
        const customerStateInput = document.createElement('input');

        // Add City and State fields dynamically
        const form = pincodeInput.closest('form');
        const pincodeGroup = pincodeInput.closest('.form-group');

        // Add City field
        const cityGroup = document.createElement('div');
        cityGroup.classList.add('form-group');
        cityGroup.innerHTML = `
            <label for="customerCity">City</label>
            <input type="text" class="form-control" id="customerCity" name="city" readonly required>
        `;
        pincodeGroup.after(cityGroup);

        // Add State field
        const stateGroup = document.createElement('div');
        stateGroup.classList.add('form-group');
        stateGroup.innerHTML = `
            <label for="customerState">State</label>
            <input type="text" class="form-control" id="customerState" name="state" readonly required>
        `;
        cityGroup.after(stateGroup);

        pincodeInput.addEventListener('input', function () {
            const pincode = pincodeInput.value;

            if (pincode.length === 6) {
                // Make an AJAX call to fetch city and state
                fetch(`<?= base_url('getCityStateByPincode/') ?>${pincode}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.city && data.state) {
                            document.getElementById('customerCity').value = data.city;
                            document.getElementById('customerState').value = data.state;
                        } else {
                            document.getElementById('customerCity').value = '';
                            document.getElementById('customerState').value = '';
                            alert('City and State not found for the given Pincode.');
                        }
                    })
                    .catch(error => {
                        console.error('Error fetching city/state:', error);
                        document.getElementById('customerCity').value = '';
                        document.getElementById('customerState').value = '';
                    });
            } else {
                document.getElementById('customerCity').value = '';
                document.getElementById('customerState').value = '';
            }
        });
    });
</script>


<!--------------------------------------------------------------------------------- For Net Banking ---------------------------------------------------------------------------------------------->

<script>
    document.getElementById('newcollectionsview').addEventListener('submit', function (e) {
        e.preventDefault(); // Stop form from submitting by default

        const paymentMethod = document.getElementById('paymentMethodSelect').value;

        if (paymentMethod === 'bank') {
            const amount = parseFloat(document.getElementById('finalTotalPrice').value || 0) * 100; // in paisa

            const razorpayOptions = {
                key: "rzp_test_HNDDo4TA783qRj", // Your Razorpay test/live key
                amount: amount.toFixed(0),
                currency: "INR",
                name: "Spotzsaaga Enterprises",
                description: "Order Payment",
                image: "https://storage.googleapis.com/mkv_imagesbackend/blogs/main_images/sagalogo.png",
                handler: function (response) {
                    // Add Razorpay fields to the form
                    const form = document.getElementById('newcollectionsview');
                    const fields = {
                        rzp_payment_id: response.razorpay_payment_id,
                        rzp_order_id: response.razorpay_order_id || '',
                        rzp_signature: response.razorpay_signature || ''
                    };
                    for (const key in fields) {
                        const input = document.createElement('input');
                        input.type = 'hidden';
                        input.name = key;
                        input.value = fields[key];
                        form.appendChild(input);
                    }

                    // Submit the form after payment success
                    form.submit();
                },
                prefill: {
                    name: document.getElementById('orderCustomerPhone').value || "Customer",
                    email: document.getElementById('orderCustomerEmail').value || "test@example.com",
                    contact: document.getElementById('orderCustomerPhone').value || "9999999999"
                },
                theme: {
                    color: "#3399cc"
                },
                modal: {
                    ondismiss: function () {
                        alert("Payment cancelled.");
                    }
                }
            };

            const rzp = new Razorpay(razorpayOptions);
            rzp.open();
        } else {
            // If not bank payment, allow normal form submission
            this.submit();
        }
    });

</script>


</html>