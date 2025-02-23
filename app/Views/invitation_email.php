<!DOCTYPE html>
<html>
<head>
    <style>
        .email-container {
            font-family: Arial, sans-serif;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .email-header {
            font-size: 24px;
            color: #333;
        }
        .email-body {
            margin-top: 10px;
        }
        .email-footer {
            margin-top: 20px;
            font-size: 12px;
            color: #888;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">Invitation to Register</div>
        <div class="email-body">
            <p>Hello <?= esc($name) ?>,</p>
            <p>You are invited to register on the Driphunter admin panel. Please click the link below to register:</p>
            <p><a href="<?= esc($registration_link) ?>">Register Here</a></p>
            <p>Details:</p>
            <ul>
                <li><strong>Department:</strong> <?= esc($department) ?></li>
                <li><strong>Job Title:</strong> <?= esc($job_title) ?></li>
                <li><strong>Roles:</strong> <?= esc($roles) ?></li>
            </ul>
        </div>
        <div class="email-footer">
            <p>Regards,<br>The Driphunter Team</p>
        </div>
    </div>
</body>
</html>
