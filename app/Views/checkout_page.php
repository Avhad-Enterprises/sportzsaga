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

    <div class="page-header">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="title">
                    <h1>Checkout</h1>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 text-right blogs-imex">                
                <div class="col d-flex justify-content-end">
                    <img src="https://storage.googleapis.com/mkv_imagesbackend/blogs/main_images/sagalogo.png" width="70px" />
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 ">
            <div class="pd-20 card-box mb-30">
                <h6>Customer Details</h6>
                <hr>
                <form>
                    <div class="form-group">                    
                        <label for="customerName">Name</label>
                            <input type="text" class="form-control" Value="<?= $order['customer'] ?>" id="customerName" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="customerEmail">Email</label>
                        <input type="text" class="form-control" Value="<?= $order['customer_email'] ?>" id="customerEmail" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="customerPhone">Phone</label>
                        <input type="text" class="form-control"  Value="<?= $order['customer_phone'] ?>" id="customerPhone" name="phone" required>
                    </div>
                    <div class="form-group">
                        <label for="customerPin">Pincode</label>
                        <input type="text" class="form-control"  Value="<?= $order['pincode'] ?>" id="customerPin" name="pincode" required>
                    </div>
                    <div class="form-group">
                        <label for="customerAddress">Address</label>
                        <textarea class="form-control" id="customerAddress" name="address" rows="3"
                                    required><?= $order['customer_address'] ?></textarea>
                    </div>                    
                </form>               
            </div>
        </div>
        <div class="col-md-8">
            <div class="pd-20 card-box mb-30 ">
                <h4>Order Summary</h4>
                <br>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>Price/Unit</th>
                            <th>Discount</th>
                            <th>Quantity</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($products as $product): ?>
                            <tr>
                                <td><strong><?= $product['product_title'] ?></strong></td>
                                <td>₹<?= $product['selling_price'] ?><?= $order['is_international_order'] == 1 ? ' / $' : '' ?> <?= $order['is_international_order'] == 1 ? ($product['selling_price'] * 0.012) : '' ?></td>
                                <td>₹<?= ($product['discount']/$product['quantity']) ?><?= $order['is_international_order'] == 1 ? ' / $' : '' ?> <?= $order['is_international_order'] == 1 ? (($product['discount']/$product['quantity']) * 0.012) : '' ?></td>
                                <td><?= $product['quantity'] ?></td>
                                <td>₹<?= $product['discounted_price'] ?><?= $order['is_international_order'] == 1 ? ' / $' : '' ?> <?= $order['is_international_order'] == 1 ? ($product['discounted_price'] * 0.012) : '' ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <hr>
                <div class="row">
                    <div class="col-6">
                    </div>

                    <div class="col-6">                       
                        <div class="pd-20 card">
                            <div class="row">
                                <div class="col text-left">
                                    <p>Discount:</p>
                                    <p>Shipping charges:</p>
                                    <p><strong>Total Amount:</strong></p>
                                    <?php if ($order['payment_status'] === 'partial_cod'): ?>
                                        <p>Partial COD Amount: </p>
                                    <?php endif; ?>
                                </div>
                                <div class="col text-right">
                                    <p> ₹<?= $order['discount_amount'] ?><?= $order['is_international_order'] == 1 ? ' / $' : '' ?> <?= $order['is_international_order'] == 1 ? ($order['discount_amount'] * 0.012) : '' ?></p>
                                    <p> ₹<?= $order['shipping_amount'] ?><?= $order['is_international_order'] == 1 ? ' / $' : '' ?> <?= $order['is_international_order'] == 1 ? ($order['shipping_amount'] * 0.012) : '' ?></p>
                                    <p><strong> <?= $order['currency'] === 'INR' ? '₹' : '$' ?><?= $total_amount ?> </strong></p>
                                    <?php if ($order['payment_status'] === 'partial_cod'): ?>
                                        <p> <?= $order['currency'] === 'INR' ? '₹' : '$' ?><?= $partial_cod_amount ?></p>
                                    <?php endif; ?>
                                </div>

                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="pd-20 card-box mb-30">
        <h5>Payment</h5>
        <hr>
        <div class="row">
            <div class="col-3">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link btn active" id="v-pills-razorpay-tab" data-toggle="pill" data-target="#v-pills-razorpay" type="button" role="tab" aria-controls="v-pills-razorpay" aria-selected="true">RazorPay</a>
                <a class="nav-link btn" id="v-pills-cashfree-tab" data-toggle="pill" data-target="#v-pills-cashfree" type="button" role="tab" aria-controls="v-pills-cashfree" aria-selected="false">Cashfree</a>
                </div>
            </div>
            <div class="col-9">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-razorpay" role="tabpanel" aria-labelledby="v-pills-razorpay-tab" >
                        <img style="height:300px" src="https://www.ecommerce-nation.com/wp-content/uploads/2019/02/razorpay.webp">
                        <div class="text-right" >
                            <a class="btn btn-primary" id="payButton">Pay <?= $order['currency'] === 'INR' ? '₹' : '$' ?><?= ($order['payment_status'] === 'partial_cod' ? $partial_cod_amount : $total_amount) ?></a>
                        </div> 
                    </div>
                    <div class="tab-pane fade" id="v-pills-cashfree" role="tabpanel" aria-labelledby="v-pills-cashfree-tab"  >
                        <img style="height:300px"  src="https://img-cdn.thepublive.com/fit-in/1280x960/filters:format(webp)/entrackr/media/post_attachments/wp-content/uploads/2024/01/Cashfree-image.jpg">
                        <div class="text-right" >
                            <a class="btn btn-primary" >Comming Soon...</a>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script>
        document.getElementById('payButton').addEventListener('click', function () {
            const paymentStatus = "<?= $order['payment_status'] ?>";
            const amountToPay = paymentStatus === 'partial_cod'
                ? <?= $partial_cod_amount ?> * 100
                : <?= $total_amount ?> * 100;
                
            const customerDetails = {
                name: document.getElementById('customerName').value,
                email: document.getElementById('customerEmail').value,
                phone: document.getElementById('customerPhone').value,
                pincode: document.getElementById('customerPin').value,
                address: document.getElementById('customerAddress').value,
            };

            const options = {
                key: 'rzp_test_HNDDo4TA783qRj', // Replace with your Razorpay Key
                amount: amountToPay.toFixed(0),
                currency: "<?= $order['currency'] ?>",
                name: "Spotzsaaga Enterprises",
                description: "Order Payment",
                image: "https://storage.googleapis.com/mkv_imagesbackend/blogs/main_images/sagalogo.png",
                handler: function (response) {
                    alert("Payment successful! Transaction ID: " + response.razorpay_payment_id);

                    // Update payment status and reference
                    fetch('<?= base_url("ordermanagement/updatePaymentStatus") ?>', {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json' },
                        body: JSON.stringify({
                            order_id: <?= $order['order_id'] ?>,
                            payment_ref: response.razorpay_payment_id,
                            payment_status: paymentStatus === 'partial_cod' ? 'partial_cod' : 'Paid',
                            customer_details: customerDetails,
                        }),
                    })
                        .then(res => res.json())
                        .then(data => {
                            if (data.status === 'success') {
                                window.location.href = "<?= base_url('ordermanagement') ?>";
                            } else {
                                alert('Failed to update payment status.');
                            }
                        })
                        .catch(err => console.error(err));
                },
                modal: {
                    ondismiss: function () {
                        alert("Payment canceled by user.");
                    },
                },
            };

            const razorpay = new Razorpay(options);
            razorpay.open();
        });
    </script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
</body>
<!-- Footer View Start -->
<?= $this->include('footer_view') ?>
<!-- Footer View End -->
</html>
