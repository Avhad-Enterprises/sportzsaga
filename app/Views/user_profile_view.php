<!-- Story Section -->
<?= $this->include('index_head_view') ?>
<!-- Story Section End -->

<body class="homepage-body-container">

  <!-- Story Section -->
  <?= $this->include('navbar_view') ?>
  <!-- Story Section End -->

  <div class="container">

    <div class="container-fluid main-container">
      <div class="container-fluid ">

        <div class="row ">

          <div class="col-md-3">
            <div class="dropdown">
              <?php foreach ($users as $user) : ?>
                <div class="user-info">
                  <img src="<?= base_url('uploads/' . $user['profile_img']) ?>" alt="User Icon" width="50" height="50">
                  <div>
                    <p class="mb-0"><?= $user['name'] ?></p>
                    <p class="mb-0"><?= $user['phone_no'] ?></p>
                  </div>
                </div>
              <?php endforeach; ?>
              <a class="dropdown-item" href="#" id="profile-btn">
                <i class="fa-solid fa-user"></i>
                My Profile
              </a>
              <a class="dropdown-item" href="#" id="orders-btn">
                <i class="fa-solid fa-cart-shopping"></i>
                My Orders
              </a>
              <a class="dropdown-item" href="#" id="addresses-btn">
                <i class="fa-solid fa-location-dot"></i>
                My Addresses
              </a>
              <a class="dropdown-item" href="<?= base_url() ?>userlogout">
                <i class="fa-solid fa-right-from-bracket"></i>
                Log Out
              </a>
            </div>
          </div>


          <div class="col-md-9">
            <div id="profile-section" class="content-section active">
              <div class="heading">
                <p class="h2">Personal Information</p>
              </div>

              <?php foreach ($users as $user) : ?>
                <form action="<?= base_url('userprofile/edit') ?>" method="post" enctype="multipart/form-data">

                  <input type="hidden" name="user_id" value="<?= $user['user_id'] ?>">
                  <input type="hidden" name="existing_profile_img" value="<?= $user['profile_img'] ?>">

                  <div class="upload-container">
                    <div class="upload-heading">Your Profile Picture</div>
                    <label class="upload-field">
                      <img src="<?= base_url('uploads/' . $user['profile_img']) ?>" alt="Upload Icon">
                      <div class="upload-field-text">Upload your<br> photo</div>
                      <input type="file" name="profile_img" accept="image/*">
                    </label>
                  </div>

                  <div class="form-container">
                    <div class="form-group">
                      <label class="form-label" for="fullName">Full Name</label>
                      <input type="text" class="user-form-control" id="fullName" name="name" value="<?= $user['name'] ?>" placeholder="Please Enter your full name">
                    </div>
                    <div class="form-group">
                      <label class="form-label" for="email">Email</label>
                      <input type="email" class="user-form-control" id="email" name="email" value="<?= $user['email'] ?>" placeholder="Please Enter your email">
                    </div>
                  </div>

                  <div class="form-container">
                    <div class="form-group">
                      <label class="form-label" for="phoneNumber">Phone Number</label>
                      <input type="tel" class="user-form-control" id="phoneNumber" name="phoneNumber" value="<?= $user['phone_no'] ?>" placeholder="Please Enter your phone number">
                    </div>
                    <div class="form-group">
                      <label class="form-label" for="currentPassword">Current Password</label>
                      <div class="d-flex align-items-center">
                        <input type="password" class="user-form-control" id="currentPassword" name="currentPassword" value="<?= $user['password'] ?>" readonly>
                      </div>
                    </div>
                  </div>

                  <div class="verify-text">
                    <button type="button" class="verify-button">Verify</button> your email and phone number
                  </div>

                  <div class="gender-container">
                    <div class="gender-label">Gender</div>
                    <div class="radio-container">
                      <input type="radio" id="male_<?= $user['user_id']; ?>" name="gender_<?= $user['user_id']; ?>" class="radio-input" value="male" <?= ($user['gender'] == 'male') ? 'checked' : ''; ?>>
                      <label for="male_<?= $user['user_id']; ?>" class="radio-label">Male</label>

                      <input type="radio" id="female_<?= $user['user_id']; ?>" name="gender_<?= $user['user_id']; ?>" class="radio-input" value="female" <?= ($user['gender'] == 'female') ? 'checked' : ''; ?>>
                      <label for="female_<?= $user['user_id']; ?>" class="radio-label">Female</label>

                      <input type="radio" id="other_<?= $user['user_id']; ?>" name="gender_<?= $user['user_id']; ?>" class="radio-input" value="other" <?= ($user['gender'] == 'other') ? 'checked' : ''; ?>>
                      <label for="other_<?= $user['user_id']; ?>" class="radio-label">Other</label>
                    </div>
                  </div>

                  <div class="buttons-container d-flex justify-content-end">
                    <a href="">
                        <button type="button" class="update-button-forgot">
                        <i class="fa-solid fa-lock" style="color: #ffffff;"></i> Forgot Password
                        </button>
                    </a>
                    <button type="submit" class="update-button">
                      <i class="fa-solid fa-pen-to-square"></i> Update
                    </button>
                  </div>

                </form>
              <?php endforeach; ?>

              <div class="row">
                <?php foreach ($users as $user) : ?>
                  <form id="disable-form-<?= $user['user_id']; ?>" method="post" action="<?= site_url('userprofile/disable_account'); ?>">
                    <!-- Hidden input to store the user_id and account_status -->
                    <input type="hidden" name="user_id" value="<?= $user['user_id']; ?>">
                    <input type="hidden" name="account_status" value="disabled">

                    <button type="button" class="btn btn-danger disable-btn" data-user-id="<?= $user['user_id']; ?>">Disable Account</button>
                  </form>
                <?php endforeach; ?>
              </div>

            </div>

            <div id="orders-section" class="content-section">
              <!-- My Orders content goes here -->
              <div class="heading">
                <p class="h2">Orders & Returns</p>
              </div>
              <div class="d-grid gap-2 d-md-block">
                <button class="btn odbutton" id="previous-orders-btn" type="button">Previous Orders</button>
                <button class="btn odbutton" id="returns-btn" type="button">Returns</button>
              </div>
              <div class="ordercontent" id="ordercontent">
                <div id="previous-orders-content">
                  <!-- Content for previous orders -->
                  <div class="container">
                    <div class="d-flex justify-content-end align-items-center">
                      <p class="mb-0 me-2">Sort by</p>
                      <div class="dropdown">
                        <a class="btn btn-light dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                          aria-expanded="false">
                          Most Recent
                        </a>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="#">Action</a></li>
                          <li><a class="dropdown-item" href="#">Another action</a></li>
                          <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>

                  <div class="container mt-4">
                    <!-- Row 1 -->
                    <div class="row mb-4">
                      <div class="col">
                        <div class="card mb-3" style="max-width: 540px;">
                          <div class="row g-0">
                            <div class="col-md-4">
                              <img src="./images/Rectangle 6864.png" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8">
                              <div class="card-body">
                                <h5 class="card-title">Card tit</h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in
                                  to additional content. This content is a little bit longer.</p>
                                <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small>
                                </p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- Row 2 -->
                    <div class="row mb-4">
                      <div class="col">
                        <div class="card mb-3" style="max-width: 540px;">
                          <div class="row g-0">
                            <div class="col-md-4">
                              <img src="./images/Rectangle 6864 (1).png" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8">
                              <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in
                                  to additional content. This content is a little bit longer.</p>
                                <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small>
                                </p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div id="returns-content">
                  <div class="container">
                    <div class="d-flex justify-content-end align-items-center">
                      <p class="mb-0 me-2">Sort by</p>
                      <div class="dropdown">
                        <a class="btn btn-light dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                          aria-expanded="false">
                          Most Recent
                        </a>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="#">Action</a></li>
                          <li><a class="dropdown-item" href="#">Another action</a></li>
                          <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>


                  <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                      <div class="col-md-4">
                        <img src="./images/Rectangle 6864 (2).png" class="img-fluid rounded-start" alt="...">
                      </div>
                      <div class="col-md-8">
                        <div class="card-body">
                          <h5 class="card-title">Refund Credited</h5>
                          <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                            additional content. This content is a little bit longer.</p>
                          <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>

            <div id="addresses-section" class="content-section">
              <!-- My Addresses content goes here -->
              <div class="heading">
                <p class="h2">Address Details</p>
              </div>

              <?php foreach ($users as $user) : ?>
                <form class="row g-3 d-flex justify-content-start" method="post" action="<?= base_url('userprofile/update_address'); ?>">
                  <input type="hidden" name="user_id" value="<?= $user['user_id']; ?>">

                  <div class="col-md-12">
                    <label class="form-label" for="fullName">Full Address </label>
                    <input type="text" class="user-form-control add" name="addressinformation" value="<?= $user['address_information'] ?>" id="fullName"
                      placeholder="*House / Flat no / Building / Apartment">
                  </div>

                  <div class="col-md-6">
                    <label for="Landmark">landmark*</label>
                    <input type="text" class="user-form-control add" name="landmark" value="<?= $user['landmark'] ?>" id="inputAddress2"
                      placeholder="*Landmark (Optional)">
                  </div>

                  <div class="col-md-6">
                    <label for="inputAddress2">Pincode*</label>
                    <input type="text" class="user-form-control add" name="pincode" value="<?= $user['pincode'] ?>" id="inputZip" placeholder="Pincode">
                  </div>

                  <div class="col-md-6">
                    <label for="city">City*</label>
                    <input type="text" class="user-form-control add" name="city" value="<?= $user['city'] ?>" id="inputCity" placeholder="City">
                  </div>

                  <div class="col-md-6">
                    <label for="state">State*</label>
                    <input type="text" class="user-form-control add" name="state" value="<?= $user['state'] ?>" id="inputCity" placeholder="State">
                  </div>

                  <div class="col-md-6">
                    <label for="country">Country*</label>
                    <input type="text" class="user-form-control add" name="country" value="<?= $user['country'] ?>" id="inputCountry" placeholder="Country">
                  </div>

                  <div class="col-md-6">

                  </div>

                  <div class="Address-container">
                    <div class="address-label">Save Address as</div>
                    <div class="radio-container">
                      <input type="radio" id="Home_<?= $user['user_id']; ?>" name="add_<?= $user['user_id']; ?>" class="radio-input"
                        value="home" <?= ($user['save_address_type'] == 'home') ? 'checked' : ''; ?>>
                      <label for="Home_<?= $user['user_id']; ?>" class="radio-label">Home</label>

                      <input type="radio" id="Office_<?= $user['user_id']; ?>" name="add_<?= $user['user_id']; ?>" class="radio-input"
                        value="office" <?= ($user['save_address_type'] == 'office') ? 'checked' : ''; ?>>
                      <label for="Office_<?= $user['user_id']; ?>" class="radio-label">Office</label>

                      <input type="radio" id="Other_<?= $user['user_id']; ?>" name="add_<?= $user['user_id']; ?>" class="radio-input"
                        value="other" <?= ($user['save_address_type'] == 'other') ? 'checked' : ''; ?>>
                      <label for="Other_<?= $user['user_id']; ?>" class="radio-label">Others</label>
                    </div>
                  </div>

                  <div class="col-md-6">

                  </div>

                  <div class="buttons-container d-flex justify-content-end">
                    <button type="submit" class="edit-button"
                      style="background-color: #EDF2F6; height: 52px; width: 96px; color: #2E2E2E; border: none;">
                      <i class="fa-solid fa-pen-to-square"></i>
                      Save
                    </button>
                  </div>
                </form>
              <?php endforeach; ?>

            </div>
          </div>
        </div>

      </div>
    </div>

    <!-- Story Section -->
    <?= $this->include('instagram_view') ?>
    <!-- Story Section End -->

  </div>

  <!-- Story Section -->
  <?= $this->include('footer') ?>
  <!-- Story Section End -->

  <!-- Add this script at the end of your body -->
  <script>
    $(document).ready(function() {
      // Toastr options
      toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-bottom-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "4000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
      };
      <?php if (session()->getFlashdata('success')) : ?>
        toastr.success('<?= session()->getFlashdata('success') ?>', null, {
          className: 'toast-custom'
        });
      <?php endif; ?>
      <?php if (session()->getFlashdata('error')) : ?>
        toastr.error('<?= session()->getFlashdata('error') ?>', null, {
          className: 'toast-custom'
        });
      <?php endif; ?>
    });
  </script>
</body>

<!-- Index Footer Section -->
<?= $this->include('index_footer_view') ?>
<!-- Index Footer End -->

</html>