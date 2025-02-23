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
        .details-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        .details-table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
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
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">
            <img src="https://storage.googleapis.com/mkv_imagesbackend/blogs/main_images/sagalogo.png" alt="SportzSaga Logo" />
            <h2>Shipment Confirmation</h2>
        </div>
        <div class="email-body">
            <p>Hi <span class="highlight"><?= esc($name) ?></span>,</p>
            <p>Great news—your order is on its way!</p>

            <table class="details-table">
                <tbody>
                    <tr>
                        <th>Order Number</th>
                        <td><?= substr($shipment['order_number'], 0, 6); ?></td>
                    </tr>
                    <tr>
                        <th>Tracking (Waybill) ID</th>
                        <td><?= esc($awbNo) ?></td>
                    </tr>
                    <tr>
                        <th>Courier Name</th>
                        <td>BlueDart</td>
                    </tr>
                    <tr>
                        <th>Tracking Link</th>
                        <td><a href="https://www.bluedart.com/tracking?awb=<?= esc($awbNo) ?>">Click here to track your order</a></td>
                    </tr>
                </tbody>
            </table>

            <p>Track your shipment in real time using the link above.</p>
            <p>If you have any questions, we’re here to help—just reply to this email or reach us at <a href="mailto:sportsaaga@gmail.com">sportsaaga@gmail.com</a>.</p>
            <p>Thank you for shopping with <strong>SportzSaga</strong>! We hope you love your purchase.</p>
        </div>
        <div class="email-footer">
            <p>Cheers,<br>The SportzSaga Team</p>
        </div>
    </div>
</body>
</html>
