<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 50px;
        }

        .error-box {
            padding: 20px;
            border: 1px solid #ff0000;
            background: #ffe6e6;
            display: inline-block;
        }

        h2 {
            color: #ff0000;
        }
    </style>
</head>

<body>
    <div class="error-box">
        <h2>Oops! An Error Occurred</h2>
        <p><?= esc($error) ?></p>
        <a href="<?= base_url() ?>">Go Back to Home</a>
    </div>
</body>

</html>