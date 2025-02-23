<!-- Head View Start -->
<?= $this->include('head_view') ?>
<!-- Head View End -->

<style>
    .VerifyotpCon{
        max-width: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 28px auto;
    }
</style>

<body class="login-page">
    <div class="login-header box-shadow">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div class="brand-logo">
                <a href="login.html">
                    <img src="<?= base_url(); ?>images/logo.png" alt="" />
                </a>
            </div>
        </div>
    </div>

    <div class="VerifyotpCon">
        <div class="pd-20 card-box mb-30">
            <h2>Verify OTP</h2>
            <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('error')) : ?>
                <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
            <?php endif; ?>

            <form action="<?= base_url(); ?>verifyOtp" method="post" class="needs-validation" novalidate>
                <div class="form-group">
                    <label for="otp">Enter OTP*</label>
                    <input type="text" class="form-control" id="otp" name="otp" placeholder="123456" minlength="6" maxlength="6" required>
                    <div class="invalid-feedback">Please enter the OTP sent to your email.</div>
                </div>

                <!-- Timer and Resend OTP Section -->
                <div class="form-group">
                    <p id="timer">You can resend OTP in <span id="countdown">30</span> seconds.</p>
                    <button type="button" id="resendOtpBtn" class="btn btn-secondary" disabled>Resend OTP</button>
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary btn-lg">Verify OTP</button>
                </div>
            </form>
        </div>
    </div>



    <!-- Footer View Start -->
    <?= $this->include('footer_view') ?>
    <!-- Footer View End -->
</body>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Timer setup
        let timerDuration = 30; // 30 seconds timer
        let countdownElement = document.getElementById("countdown");
        let resendOtpBtn = document.getElementById("resendOtpBtn");

        // Disable the "Resend OTP" button initially
        resendOtpBtn.disabled = true;

        // Countdown logic
        let countdown = timerDuration;
        let timer = setInterval(function() {
            countdown--;
            countdownElement.innerHTML = countdown;

            // When countdown reaches zero, enable the "Resend OTP" button
            if (countdown <= 0) {
                clearInterval(timer);
                resendOtpBtn.disabled = false;
                document.getElementById("timer").innerHTML = "Didn't receive the OTP? Click the button below to resend.";
            }
        }, 1000);

        // Resend OTP button functionality
        resendOtpBtn.addEventListener("click", function() {
            resendOtpBtn.disabled = true; // Disable button again after click
            countdown = timerDuration; // Reset the timer
            countdownElement.innerHTML = countdown; // Reset countdown display
            document.getElementById("timer").innerHTML = "You can resend OTP in <span id='countdown'>" + countdown + "</span> seconds.";
            resendOtp(); // Call resend OTP function

            // Start the timer again
            timer = setInterval(function() {
                countdown--;
                countdownElement.innerHTML = countdown;

                if (countdown <= 0) {
                    clearInterval(timer);
                    resendOtpBtn.disabled = false;
                    document.getElementById("timer").innerHTML = "Didn't receive the OTP? Click the button below to resend.";
                }
            }, 1000);
        });

        // Function to handle resend OTP via AJAX
        function resendOtp() {
            // Make an AJAX call to resend OTP
            fetch('<?= base_url(); ?>/resendOtp', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        email: '<?= session()->get('registration_data')['email'] ?>'
                    }),
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('OTP has been resent to your email.');
                    } else {
                        alert('Failed to resend OTP. Please try again later.');
                    }
                })
                .catch(error => {
                    console.error('Error resending OTP:', error);
                });
        }
    });
</script>


</html>