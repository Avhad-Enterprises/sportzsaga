<!DOCTYPE html>
<html>
<head>
    <style>
        .email-container {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 0 auto;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }        
        .email-header {
            background-color: #f4f4f4;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .email-header h2 {
            margin: 10px;
            font-size: 24px;
            color: #333;
            flex: 1; /* Allow text to take available space */
        }
        .email-header img {
            max-width: 80px; /* Adjust logo size */
            max-height: 80px;
            margin-left: 20px; /* Add spacing between text and image */
        }
        .email-body {
            padding: 20px;
        }
        .email-footer {
            background-color: #f9f9f9;
            text-align: center;
            padding: 15px;
            font-size: 12px;
            color: #888;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        .total-section {
            margin-top: 20px;
            text-align: right;
        }
        .total-section p {
            margin: 5px 0;
            font-size: 16px;
        }
        .highlight {
            font-weight: bold;
            color: #333;
        }
        a {
            color: #007BFF;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        .msg-4355544535731068269 .m_-4355544535731068269email-header {
            background-color: #f4f4f4;
            padding: 20px;
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">
            <img src="https://storage.googleapis.com/mkv_imagesbackend/blogs/main_images/sagalogo.png" alt="SportzSaga Logo" />
            <h2>Order Confirmation</h2>
        </div>
        <div class="email-body">
            <p>Hi <span class="highlight"><?= esc($name) ?></span>,</p>
            <p>Thank you for choosing <strong>SportzSaga</strong>!</p>
            <p>We’re thrilled to let you know that your order has been successfully placed. Here’s a quick summary of your purchase:</p>

            <p><strong>Order Number:</strong> <span class="highlight"><?= esc($order_data['order_number']) ?></span></p>
            <p><strong>Order Date:</strong> <span class="highlight"><?= esc($order_data['created_at']) ?></span></p>

            <table>
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Discount</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($product_details as $product): ?>
                        <tr>
                            <td><?= esc($product['product_title']) ?></td>
                            <td><?= esc($product['quantity']) ?></td>
                            <td>₹<?= esc($product['selling_price']) ?></td>
                            <td>₹<?= esc($product['discount']) ?></td>
                            <td>₹<?= esc($product['discounted_price']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                    <?php if($order_data['payment_status'] === "partial_cod"): ?>
                        <tr>
                            <td>Partial COD</td>
                            <td>1</td>
                            <td>₹300</td>
                            <td>₹0</td>
                            <td>₹300</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>

            <div class="total-section">
                <p><strong>Shipping Amount:</strong> ₹<?= esc($order_data['shipping_amount']) ?></p>
                <p><strong>Total Discount:</strong> ₹<?= esc($order_data['discount_amount']) ?></p>
                <p><strong>Final Total:</strong> <span class="highlight">₹<?= esc($order_data['total_amount']) ?></span></p>
            </div>
            
            <?php if($order_data['payment_method'] === "link"): ?>
                <p>Here is Payment Link : <?= "https://avhadenterprises.com/admin/sportzsaga/ordermanagement/checkout/".$order_data['order_id']?></p>
            <?php endif; ?>

            <p>Your order is now being processed, and we’ll update you as it moves through each stage. Have questions? Just hit reply or contact us at <a href="mailto:sportsaaga@gmail.com">sportsaaga@gmail.com</a>.</p>
            <p>We can’t wait for you to enjoy your new gear!</p>
        </div>
        <div class="email-footer">
            <p>Best Regards,<br>Team SportzSaga</p>
        </div>
    </div>
</body>
</html>
