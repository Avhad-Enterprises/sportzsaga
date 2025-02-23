<!-- Head View Start -->
<?= $this->include('head_view') ?>
<!-- Head View End -->

<body class="login-page">
    <div class="login-header box-shadow mb-30">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div class="brand-logo">
                <a href="login.html">
                    <img src="<?= base_url(); ?>images/logo.png" alt="" />
                </a>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-md-8">
            <div class="pd-ltr-20 xs-pd-20-10">
                <div class="">
                    <div class="pd-20 card-box mb-30">
                        <form action="<?= base_url(); ?>adminRegister" method="post" class="needs-validation" novalidate>
                            <input type="hidden" name="employee" value="employee">
                            <input type="hidden" name="token" value="<?= $token ?>">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <label for="fullname">Full Name*</label>
                                        <input class="form-control" id="fullname" name="fullname" placeholder="Johnny Brown" required>
                                        <div class="invalid-feedback">Please provide a full name.</div>
                                    </div>
                                    <div class="col">
                                        <label for="emailaddress">E-Mail Address*</label>
                                        <input type="email" class="form-control" id="emailaddress" name="emailaddress" placeholder="example@gmail.com" required>
                                        <div class="invalid-feedback">Please provide a valid email address.</div>
                                    </div>
                                    <div class="col">
                                        <label for="phone">Mobile No*</label>
                                        <input class="form-control" id="phone" name="phone" placeholder="+91 1234567890" required>
                                        <div class="invalid-feedback">Please provide a mobile number.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <label for="password">Password*</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="*********" required>
                                        <div class="invalid-feedback">Please provide a password.</div>
                                    </div>
                                    <div class="col">
                                        <label for="confirmPassword">Confirm Password*</label>
                                        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="*********" required>
                                        <div class="invalid-feedback">Please confirm your password.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <label for="state">State*</label>
                                        <input class="form-control" id="state" name="state" placeholder="Your State" required>
                                        <div class="invalid-feedback">Please provide a state.</div>
                                    </div>
                                    <div class="col">
                                        <label for="city">City*</label>
                                        <input class="form-control" id="city" name="city" placeholder="Your City" required>
                                        <div class="invalid-feedback">Please provide a city.</div>
                                    </div>
                                    <div class="col">
                                        <label for="country">Country*</label>
                                        <input class="form-control" id="country" name="country" placeholder="Your Country" required>
                                        <div class="invalid-feedback">Please provide a country.</div>
                                    </div>
                                    <div class="col">
                                        <label for="dob">Date of Birth*</label>
                                        <input type="date" class="form-control" id="dob" name="dob" required>
                                        <div class="invalid-feedback">Please provide a date of birth.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <label class="col-form-label">Gender*</label>
                                        <div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" id="male" name="gender" class="form-check-input" value="male" required />
                                                <label class="form-check-label" for="male">Male</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" id="female" name="gender" class="form-check-input" value="female" required />
                                                <label class="form-check-label" for="female">Female</label>
                                            </div>
                                        </div>
                                        <div class="invalid-feedback">Please select a gender.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-check mt-4">
                                    <input type="checkbox" class="form-check-input" id="customCheck1" />
                                    <label class="form-check-label" for="customCheck1">I have read and agreed to the terms of services and privacy policy</label>
                                    <div class="invalid-feedback">You must agree before submitting.</div>
                                    <a href="#"><u>Click here</u></a>
                                </div>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="col">
            <div class="RegisterImg">
                <img src="<?= base_url() ?>uploads/register-img-new.png" alt="">
            </div>
        </div> -->

    </div>


    <!-- Footer View Start -->
    <?= $this->include('footer_view') ?>
    <!-- Footer View End -->
</body>

</html>