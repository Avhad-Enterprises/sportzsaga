<!-- Head View Start -->
<?= $this->include('head_view') ?>
<!-- Head View End -->

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

    <div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 col-lg-7">
                    <img src="<?= base_url(); ?>vendors/images/login-page-img.png" alt="" />
                </div>
                <div class="col-md-6 col-lg-5">
                    <div class="login-box bg-white box-shadow border-radius-10">
                        <div class="login-title">
                            <h2 class="text-center text-primary">Login To Dashboard</h2>
                        </div>
                        <form action="<?= base_url(); ?>adminloginsession" method="post" id="loginForm">
                            <div class="input-group custom">
                                <input type="text" class="form-control form-control-lg" name="email" id="email" placeholder="Email ID" required />
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                                </div>
                            </div>
                            <div class="input-group custom">
                                <input type="password" class="form-control form-control-lg" name="password" id="password" placeholder="Password" required />
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                                </div>
                            </div>
                            <?php if (session()->getFlashdata('msg')) : ?>
                                <div class="invalid-pass-feedback" id="error-message" style="display: block;"><?= session()->getFlashdata('msg'); ?></div>
                            <?php endif; ?>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="input-group mb-0">
                                        <input class="btn btn-primary btn-lg btn-block" type="submit" value="Sign In">
                                    </div>
                                </div>
                            </div>
                        </form>

                        <!-- Forgot Password Link -->
                        <div class="text-center mt-3">
                            <a href="javascript:void(0);" id="forgotPasswordLink" class="text-primary">Forgot Password?</a>
                        </div>

                        <!-- Forgot Password Form -->
                        <form action="<?= base_url(); ?>sendPasswordReset" method="post" id="forgotPasswordForm" style="display:none;">
                            <div class="input-group custom">
                                <input type="email" class="form-control form-control-lg" name="reset_email" id="reset_email" placeholder="Enter your email" required />
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="icon-copy dw dw-email"></i></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="input-group mb-0">
                                        <input class="btn btn-warning btn-lg btn-block" type="submit" value="Send Reset Link">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer View Start -->
    <?= $this->include('footer_view') ?>
    <!-- Footer View End -->

    <script>
        document.getElementById('forgotPasswordLink').addEventListener('click', function() {
            document.getElementById('loginForm').style.display = 'none';
            document.getElementById('forgotPasswordForm').style.display = 'block';
        });
    </script>
</body>