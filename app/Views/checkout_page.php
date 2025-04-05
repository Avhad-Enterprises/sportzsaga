<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Checkout | Spotzsaaga</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f8f9fa;
        }

        .checkout-container {
            max-width: 960px;
            margin: auto;
            padding: 2rem;
            background: white;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.05);
            border-radius: 10px;
        }

        .section-title {
            font-weight: 600;
            border-bottom: 2px solid #007bff;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

    <div class="container my-5 checkout-container">
        <div class="row">
            <div class="col-md-6">
                <h4 class="section-title">Customer Details</h4>
                <form>
                    <div class="mb-3">
                        <label>Name</label>
                        <input type="text" class="form-control" value="<?= $order['customer'] ?>" >
                    </div>
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" class="form-control" value="<?= $order['customer_email'] ?>" >
                    </div>
                    <div class="mb-3">
                        <label>Phone</label>
                        <input type="text" class="form-control" value="<?= $order['customer_phone'] ?>" >
                    </div>
                    <div class="mb-3">
                        <label>Pincode</label>
                        <input type="text" class="form-control" value="<?= $order['pincode'] ?>" >
                    </div>
                    <div class="mb-3">
                        <label>Address</label>
                        <textarea class="form-control" rows="3" ><?= $order['customer_address'] ?></textarea>
                    </div>
                </form>
            </div>

            <div class="col-md-6">
                <h4 class="section-title">Order Summary</h4>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>Qty</th>
                            <th>Price</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($products as $product): ?>
                            <tr>
                                <td><?= $product['product_title'] ?></td>
                                <td><?= $product['quantity'] ?></td>
                                <td>₹<?= $product['selling_price'] ?></td>
                                <td>₹<?= $product['discounted_price'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="3">Discount</th>
                            <td>₹<?= $order['discount_amount'] ?></td>
                        </tr>
                        <tr>
                            <th colspan="3">Shipping</th>
                            <td>₹<?= $order['shipping_amount'] ?></td>
                        </tr>
                        <tr>
                            <th colspan="3">Total</th>
                            <td><strong>₹<?= $total_amount ?></strong></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

        <hr class="my-4">

        <h4 class="section-title">Payment</h4>
        <div class="text-center">
            <img src="https://www.ecommerce-nation.com/wp-content/uploads/2019/02/razorpay.webp" height="200">
            <br><br>
            <button id="payButton" class="btn btn-success btn-lg">
                Pay ₹<?= ($order['payment_status'] === 'partial_cod' ? $partial_cod_amount : $total_amount) ?>
            </button>
        </div>
    </div>

    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        document.getElementById('payButton').addEventListener('click', function () {
            const amountToPay = <?= $order['payment_status'] === 'partial_cod' ? $partial_cod_amount : $total_amount ?> * 100;

            const options = {
                key: 'rzp_test_HNDDo4TA783qRj',
                amount: amountToPay.toFixed(0),
                currency: "<?= $order['currency'] ?>",
                name: "Spotzsaaga Enterprises",
                description: "Order Payment",
                image: "https://storage.googleapis.com/mkv_imagesbackend/blogs/main_images/sagalogo.png",
                handler: function (response) {
                    fetch('<?= base_url("ordermanagement/updatePaymentStatus") ?>', {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json' },
                        body: JSON.stringify({
                            order_id: <?= $order['order_id'] ?>,
                            payment_ref: response.razorpay_payment_id,
                            payment_status: "Paid",
                            customer_details: {
                                name: "<?= $order['customer'] ?>",
                                email: "<?= $order['customer_email'] ?>",
                                phone: "<?= $order['customer_phone'] ?>",
                                address: "<?= $order['customer_address'] ?>",
                                pincode: "<?= $order['pincode'] ?>",
                            }
                        })
                    }).then(res => res.json()).then(data => {
                        if (data.status === 'success') {
                            window.location.href = "<?= base_url('thank-you') ?>";
                        } else {
                            alert("Payment update failed.");
                        }
                    }).catch(err => console.error(err));
                },
                modal: {
                    ondismiss: function () {
                        alert("Payment was cancelled.");
                    }
                }
            };

            const razorpay = new Razorpay(options);
            razorpay.open();
        });
    </script>
</body>

</html>