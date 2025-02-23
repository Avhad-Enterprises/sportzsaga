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


                    <div class="mb-3 d-flex justify-content-end">
                        <button type="submit" class="btn btn-dark btn-lg-4" style="margin-right: 10px;">
                            Publish
                        </button>
                        <button type="button" class="btn btn-dark btn-lg-4" id="duplicateFormBtn">
                            Duplicate Form
                        </button>
                    </div>


                    <div class="row">
                        <div class="col-md-9">
                            <div class="pd-20 card-box mb-30">
                                <p class="text-blue mb-30">Product's Info</p>

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
                                                        <div class="custom-control custom-checkbox product-item"
                                                            style="<?= $index >= 5 ? 'display:none;' : '' ?>">
                                                            <input type="checkbox"
                                                                class="custom-control-input modal-product-checkbox"
                                                                id="modalProduct<?= $product['product_id'] ?>"
                                                                name="selected_products[]"
                                                                value="<?= $product['product_id'] ?>"
                                                                data-price="<?= $product['selling_price'] ?>"
                                                                data-image="<?= $product['product_image'] ?>">

                                                            <label class="custom-control-label products-lists"
                                                                for="modalProduct<?= $product['product_id'] ?>">
                                                                <img src="<?= base_url('uploads/' . ($product['product_image'])) ?>"
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
                                                                        class="discount-title">Add Discount</label>
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
                                                <label for="discountAmount">Enter Discount Amount (₹):</label>
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
                                                <label for="shipmentChargesModal">Enter Shipment Charges (₹):</label>
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
                                            <th colspan="4" style="font-size: 14px;">Discount on Products</th>
                                            <td id="discountOnProductDisplay" class="text-right">₹0.00</td>
                                        </tr>
                                        <tr>
                                            <th colspan="4" style="font-size: 14px;">Total Discount Applied</th>
                                            <td id="totalDiscountAppliedDisplay" class="text-right">₹0.00</td>
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
                            </div>



                            <div class="pd-20 card-box mb-30">
                                <p class="text-blue mb-30">Payment</p>
                                <div class="row">
                                    <!-- Payment Method Section -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="paymentMethodSelect">Select Payment Option</label>
                                            <select class="custom-select2 form-control" name="payment-method"
                                                style="width: 100%; height: 50px;" id="paymentMethodSelect" required>
                                                <option value="link">Send Invoice</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Please Select Payment Method
                                            </div>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Payment Status Section -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="paymentStatusSelect">Payment Status</label>
                                            <select class="custom-select2 form-control" name="payment-status"
                                                style="width: 100%; height: 50px;" id="paymentStatusSelect" required>
                                                <option value="Pending" selected>Pending</option>
                                                <option value="Paid">Paid</option>
                                                <option value="Failed">Failed</option>
                                                <option value="Refunded">Refunded</option>
                                                <option value="Partially-Refunded">Partially Refunded</option>
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
                                    <label for="paymentMethodSelect">Select</label>
                                    <select class="custom-select2 form-control" name="order-customer-name"
                                        style="width: 100%; height: 38px" id="CustomerSelect" required>
                                        <option value="">Select</option>
                                        <?php foreach ($users as $user): ?>
                                            <option value="<?= $user['user_id'] ?>"><?= $user['name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">Payment</div>
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

                                    <label for="customer-address">Address</label>
                                    <textarea class="form-control" name="address_information"
                                        id="orderCustomerAddress"></textarea>
                                </div>


                            </div>

                            <div class="pd-20 card-box mb-30" style="display: none;">
                                <p class="text-blue mb-30">Overview</p>
                                <p><strong>Customer Name:</strong> <span id="displayCustomerName"></span></p>
                                <p><strong>Customer Email:</strong> <span id="displayCustomerEmail"></span></p>
                                <p><strong>Customer Phone:</strong> <span id="displayCustomerPhone"></span></p>
                                <p><strong>Customer Address:</strong> <span id="displayCustomerAddress"></span></p>
                                <p><strong>Products and their Value:</strong>
                                <ul id="displayProducts"></ul>
                                </p>
                                <p><strong>Payment Method:</strong> <span id="displayPaymentMethod"></span></p>
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
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save Customer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


</body>
<!-- Footer View Start -->
<?= $this->include('footer_view') ?>
<!-- Footer View End -->

<script>
    $(document).ready(function () {
        $('#CustomerSelect').change(function () {
            var userId = $(this).val();

            if (userId) {
                $.ajax({
                    url: "<?= base_url('getCustomerDetails') ?>",
                    type: "GET",
                    data: {
                        user_id: userId
                    },
                    dataType: "json",
                    success: function (data) {
                        if (data) {
                            $('#orderCustomerPhone').val(data.phone_no);
                            $('#orderCustomerEmail').val(data.email);
                            $('#orderCustomerPincode').val(data.pincode);
                            $('#orderCustomerAddress').val(data.address_information);
                        } else {
                            $('#orderCustomerPhone').val('');
                            $('#orderCustomerEmail').val('');
                            $('#orderCustomerPincode').val('');
                            $('#orderCustomerAddress').val('');
                        }
                    },
                    error: function () {
                        console.error('An error occurred while fetching customer details.');
                    }
                });
            } else {
                $('#orderCustomerPhone').val('');
                $('#orderCustomerEmail').val('');
                $('#orderCustomerPincode').val('');
                $('#orderCustomerAddress').val('');
            }
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const confirmSelectionBtn = document.getElementById('confirmSelectionBtn');
        const productTableBody = document.getElementById('productTableBody');
        const totalPriceEl = document.getElementById('totalPrice');
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

        let selectedProducts = [];
        let totalDiscount = 0; // Variable to store the total discount applied
        let totalDiscountApplied = false; // Flag to track if total discount is applied
        let shipmentCharges = 0; // Variable for shipment charges

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

        // Update the product table based on selected products
        function updateProductTable() {
            productTableBody.innerHTML = ''; // Clear existing table rows
            let totalPrice = 0;
            let originalTotalPrice = 0; // Track the original total price before discount
            let discountOnProduct = 0; // Track the discount applied on products

            selectedProducts.forEach(product => {
                const productId = product.id;
                const productName = product.name;
                const productPrice = product.price;
                const productQuantity = product.quantity;
                const productDiscount = product.discount;

                // Calculate discounted price for the product
                const priceAfterDiscount = productPrice - productDiscount;
                const subtotal = priceAfterDiscount * productQuantity; // Product subtotal after discount

                totalPrice += subtotal; // Add to the total price
                originalTotalPrice += productPrice * productQuantity; // Original price without discount

                // Add the product discount to the total product discount
                discountOnProduct += productDiscount * productQuantity;

                // Create and append table row
                const productRow = document.createElement('tr');
                productRow.innerHTML = `
                <td>${productId}</td>
                <td>${productName}</td>
                <td>${productQuantity}</td>
                <td>
                    <span style="text-decoration: line-through; color: red;">&#8377;${(productPrice * productQuantity).toFixed(2)}</span>
                </td>
                <td>
                    <span style="font-weight: bold; color: green;">&#8377;${(priceAfterDiscount * productQuantity).toFixed(2)}</span>
                </td>
                <td>
                    <button type="button" class="btn btn-danger btn-sm remove-product-btn" data-product-id="${productId}">Remove</button>
                </td>
            `;
                productTableBody.appendChild(productRow);
            });

            // Add shipment charges to the original total price before discount
            originalTotalPrice += shipmentCharges;

            // Apply the total discount to the sum (including shipment charges)
            let finalTotalPrice = originalTotalPrice - discountOnProduct;

            // Apply total discount if set
            if (totalDiscount > 0) {
                finalTotalPrice -= totalDiscount;
            }

            // Update the total price display
            totalPriceEl.innerHTML = `
            <span style="text-decoration: line-through; color: red; margin-right: 10px;">&#8377;${originalTotalPrice.toFixed(2)}</span>
            <span style="font-weight: bold; color: green;">&#8377;${finalTotalPrice.toFixed(2)}</span>
        `;

            shipmentChargesDisplay.textContent = `₹${shipmentCharges.toFixed(2)}`;

            // Update the discount information in the table footer
            updateDiscountFooter(discountOnProduct, totalDiscount);

            // Update hidden fields with the final calculated values
            document.getElementById('finalTotalPrice').value = finalTotalPrice.toFixed(2);
            document.getElementById('finalShipmentCharges').value = shipmentCharges.toFixed(2);
            document.getElementById('finalTotalDiscount').value = totalDiscount.toFixed(2);
        }

        // Update the discount details in the <tfoot>
        function updateDiscountFooter(discountOnProduct, totalDiscount) {
            const discountOnProductEl = document.getElementById('discountOnProductDisplay');
            const totalDiscountAppliedEl = document.getElementById('totalDiscountAppliedDisplay');

            discountOnProductEl.textContent = `₹${discountOnProduct.toFixed(2)}`;
            totalDiscountAppliedEl.textContent = `₹${totalDiscount.toFixed(2)}`;
        }

        // Handle discount option change
        discountOptionSelect.addEventListener('change', () => {
            toggleDiscountFields();
        });

        // Handle product selection
        confirmSelectionBtn.addEventListener('click', () => {
            const selectedCheckboxes = document.querySelectorAll('.modal-product-checkbox:checked');
            selectedProducts = []; // Clear previously selected products

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
                selectedProducts = selectedProducts.filter(product => product.id !== productId); // Remove the product from selectedProducts array
                updateProductTable(); // Recalculate total after removing a product
                syncCheckboxes(); // Sync checkboxes
            }
        });

        // Apply total discount for custom option
        applyDiscountBtn.addEventListener('click', () => {
            const discountCode = discountCodeInput.value.trim();

            if (discountOptionSelect.value === 'custom') {
                // Validate the discount code via AJAX request
                if (discountCode === "") {
                    alert("Please enter a discount code.");
                    return;
                }

                fetch('http://localhost/driphunter/discount/applyDiscount', {
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

                            let remainingTotal = selectedProducts.reduce((sum, product) => {
                                const priceAfterDiscount = product.price - product.discount;
                                return sum + priceAfterDiscount * product.quantity;
                            }, 0);

                            if (discountType === 'percentage') {
                                // Apply the discount as a percentage of the remaining total
                                totalDiscount = (remainingTotal * discountValue) / 100;
                            } else {
                                // Apply the discount as a fixed value
                                totalDiscount = discountValue;
                            }

                            totalDiscountApplied = true; // Mark that the total discount has been applied
                            alert(`Custom discount applied: ₹${totalDiscount}`);
                            updateProductTable(); // Recalculate total price with the discount applied
                        } else {
                            alert(data.message); // Show error message if discount code is invalid
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            } else if (discountOptionSelect.value === 'auto') {
                // Apply automatic discount (no need for code validation)
                let discountValue = parseFloat(discountAmountInput.value) || 0;
                let discountType = discountTypeSelect.value;

                // If discount is percentage, calculate based on the remaining amount after product discount
                let remainingTotal = selectedProducts.reduce((sum, product) => {
                    const priceAfterDiscount = product.price - product.discount;
                    return sum + priceAfterDiscount * product.quantity;
                }, 0);

                if (discountType === 'percentage') {
                    // Apply the discount as a percentage
                    totalDiscount = (remainingTotal * discountValue) / 100;
                } else {
                    // Apply the discount as a fixed value
                    totalDiscount = discountValue;
                }

                totalDiscountApplied = true; // Mark that the discount is applied
                alert(`Automatic discount applied: ₹${totalDiscount}`);
                updateProductTable(); // Recalculate total price with the discount applied
            }
        });

        // Initial setup: call toggleDiscountFields when the page loads to ensure correct initial state
        toggleDiscountFields();
        syncCheckboxes(); // Ensure checkboxes are in sync on page load
    });
</script>

<script>
    $(document).ready(function () {
        let duplicateCount = 1; // Counter for duplicate forms

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
            sessionStorage.setItem('originalFormData', JSON.stringify(formData)); // Original form backup
            sessionStorage.setItem('originalTableData', tableData); // Original table backup
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
            sessionStorage.setItem('duplicateCount', duplicateCount + 1); // Increment counter

            // Redirect to the same route
            window.location.href = window.location.href + "?duplicate=" + duplicateCount; // Pass duplicate count in query
        });

        // On page load, check if original or duplicated data is present
        if (duplicateNumber) {
            // Load duplicated form
            duplicateCount = parseInt(duplicateNumber); // Update duplicate count
            loadFormData('duplicated');
            addDuplicateTitle(duplicateNumber); // Add duplicate title
            addBackToFirstFormButton(); // Add a "Back to First Form" button
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
    document.addEventListener('DOMContentLoaded', () => {
        const productTableBody = document.getElementById('productTableBody');

        function updateHiddenFields(productId, discountedPrice, discountAmount) {
            document.getElementById(`discountedPrice${productId}`).value = discountedPrice;
            document.getElementById(`discountAmount${productId}`).value = discountAmount;
        }

        // Example: Updating discount fields dynamically
        productTableBody.addEventListener('change', function (event) {
            const target = event.target;
            if (target.name.startsWith('product_discount')) {
                const productId = target.name.match(/\d+/)[0];
                const productPrice = parseFloat(target.closest('.product-item').querySelector('.modal-product-checkbox').dataset.price);
                const discount = parseFloat(target.value) || 0;

                const discountedPrice = Math.max(0, productPrice - discount);
                updateHiddenFields(productId, discountedPrice, discount);
            }
        });
    });

</script>



</html>