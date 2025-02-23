<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <title>Restricted Access</title>
    <style>
        /* Styling code remains the same */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .container {
            background-color: rgb(90 90 90 / 80%);
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 10px;
            text-align: center;
            max-width: 400px;
            width: 100%;
        }

        h1 {
            color: #fff;
            font-size: 24px;
            margin-bottom: 20px;
        }

        p {
            color: #fff;
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .btn {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin-top: 10px;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #45a049;
        }

        .timer {
            color: #fff;
            font-size: 18px;
            margin-top: 20px;
        }
    </style>
</head>

<body style="background-image: url('<?= base_url() ?>images/resimage.webp') !important;">
    <div class="container">
        <h1>Restricted Access</h1>
        <p>Sorry, you do not have permission to access this page.</p>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Redirect with a slight delay (2 seconds)
            setTimeout(function() {
                window.location.href = '<?= base_url('admin') ?>';
            }, 2000); // Delay in milliseconds (2 seconds)
    
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
                "positionClass": "toast-bottom-right",
                "timeOut": "4000",
                "extendedTimeOut": "1000",
            };
    
            <?php if (session()->getFlashdata('success')) : ?>
                toastr.success('<?= session()->getFlashdata('success') ?>');
            <?php endif; ?>
            <?php if (session()->getFlashdata('error')) : ?>
                toastr.error('<?= session()->getFlashdata('error') ?>');
            <?php endif; ?>
    
            let countdown = 7;
            const timerElement = $('#timer');
    
            const interval = setInterval(function() {
                countdown--;
                timerElement.text(countdown);
                if (countdown <= 0) {
                    clearInterval(interval);
                }
            }, 1000);
        });
</script>
</body>

</html>