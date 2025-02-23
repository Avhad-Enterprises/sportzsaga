<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        
        .img-drip-logo{
            max-width: 200px;
        }

        .img-logo{
            display: flex;
            justify-content: center;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            margin: 0;
        }

        .content {
            margin-bottom: 20px;
        }

        .content p {
            margin: 0 0 10px;
        }

        .footer {
            text-align: center;
            font-size: 0.9em;
            color: #666;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            margin: 20px 0;
            font-size: 1em;
            color: #f9f9f9;
            background-color: #fc6736;
            text-decoration: none;
            border-radius: 5px;
        }

        .button:hover {
            background-color: #ff3f00;
        }

        .product-list {
            margin-top: 20px;
        }

        .product-list img {
            max-width: 50px;
            max-height: auto;
            margin-right: 10px;
            vertical-align: middle;
        }

        .product-item {
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Order Confirmation</h1>
        </div>
        <div class="img-drip-logo">
            <img src="<?= base_url() ?>images/logo.png" class="img-logo" alt="driphunter-logo">
        </div>
        <div class="content">
            <p>Dear <?php echo esc($customer_name); ?>,</p>
            <p>Thank you for your order! Here are the details:</p>
            <p><strong>Order Number:</strong> <?php echo esc($order_number); ?></p>
            <p><strong>Total Amount:</strong> &#8377;<?php echo esc($total_amount); ?></p>
            <div class="product-list">
                <strong>Products:</strong>
                <?php foreach ($product_details as $product) : ?>
                    <div class="product-item">
                        <img src="<?= base_url('uploads/' . esc($product['product_image'])) ?>" alt="<?= esc($product['product_title']) ?>">
                        <?= esc($product['product_title']) ?> - &#8377;<?= esc($product['selling_price']) ?> x <?= esc($product['quantity']) ?>
                    </div>
                <?php endforeach; ?>
            </div>
            <p>Please complete your payment by clicking the button below:</p>
            <a href="<?php echo esc($payment_link); ?>" class="button">Pay Now</a>
        </div>
        <div class="footer">
            <p>If you have any questions, feel free to contact our support team.</p>
            <p>Thank you for shopping with us!</p>
        </div>
    </div>
</body>

</html>