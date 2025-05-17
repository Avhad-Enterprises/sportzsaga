<!-- Head View Start -->
<?= $this->include('head_view') ?>
<!-- Head View End -->


<body>

    <!-- Header View Start -->
    <?= $this->include('header_view') ?>
    <!-- Header View End -->

    <div class="right-sidebar">
        <div class="sidebar-title">
            <h3 class="weight-600 font-16 text-blue">
                Layout Settings
                <span class="btn-block font-weight-400 font-12">User Interface Settings</span>
            </h3>
            <div class="close-sidebar" data-toggle="right-sidebar-close">
                <i class="icon-copy ion-close-round"></i>
            </div>
        </div>
        <div class="right-sidebar-body customscroll">
            <div class="right-sidebar-body-content">
                <h4 class="weight-600 font-18 pb-10">Header Background</h4>
                <div class="sidebar-btn-group pb-30 mb-10">
                    <a href="javascript:void(0);" class="btn btn-outline-primary header-white active">White</a>
                    <a href="javascript:void(0);" class="btn btn-outline-primary header-dark">Dark</a>
                </div>

                <h4 class="weight-600 font-18 pb-10">Sidebar Background</h4>
                <div class="sidebar-btn-group pb-30 mb-10">
                    <a href="javascript:void(0);" class="btn btn-outline-primary sidebar-light">White</a>
                    <a href="javascript:void(0);" class="btn btn-outline-primary sidebar-dark active">Dark</a>
                </div>

                <h4 class="weight-600 font-18 pb-10">Menu Dropdown Icon</h4>
                <div class="sidebar-radio-group pb-10 mb-10">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebaricon-1" name="menu-dropdown-icon" class="custom-control-input"
                            value="icon-style-1" checked="" />
                        <label class="custom-control-label" for="sidebaricon-1"><i class="fa fa-angle-down"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebaricon-2" name="menu-dropdown-icon" class="custom-control-input"
                            value="icon-style-2" />
                        <label class="custom-control-label" for="sidebaricon-2"><i class="ion-plus-round"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebaricon-3" name="menu-dropdown-icon" class="custom-control-input"
                            value="icon-style-3" />
                        <label class="custom-control-label" for="sidebaricon-3"><i
                                class="fa fa-angle-double-right"></i></label>
                    </div>
                </div>

                <h4 class="weight-600 font-18 pb-10">Menu List Icon</h4>
                <div class="sidebar-radio-group pb-30 mb-10">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-1" name="menu-list-icon" class="custom-control-input"
                            value="icon-list-style-1" checked="" />
                        <label class="custom-control-label" for="sidebariconlist-1"><i
                                class="ion-minus-round"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-2" name="menu-list-icon" class="custom-control-input"
                            value="icon-list-style-2" />
                        <label class="custom-control-label" for="sidebariconlist-2"><i class="fa fa-circle-o"
                                aria-hidden="true"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-3" name="menu-list-icon" class="custom-control-input"
                            value="icon-list-style-3" />
                        <label class="custom-control-label" for="sidebariconlist-3"><i class="dw dw-check"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-4" name="menu-list-icon" class="custom-control-input"
                            value="icon-list-style-4" checked="" />
                        <label class="custom-control-label" for="sidebariconlist-4"><i
                                class="icon-copy dw dw-next-2"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-5" name="menu-list-icon" class="custom-control-input"
                            value="icon-list-style-5" />
                        <label class="custom-control-label" for="sidebariconlist-5"><i
                                class="dw dw-fast-forward-1"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-6" name="menu-list-icon" class="custom-control-input"
                            value="icon-list-style-6" />
                        <label class="custom-control-label" for="sidebariconlist-6"><i class="dw dw-next"></i></label>
                    </div>
                </div>

                <div class="reset-options pt-30 text-center">
                    <button class="btn btn-danger" id="reset-settings">
                        Reset Settings
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Header View Start -->
    <?= $this->include('left_view') ?>
    <!-- Header View End -->

    <div class="mobile-menu-overlay"></div>

    <!-- Page Main Content Start -->
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <!-- Default Basic Forms Start -->

                <script>
                    // Function to show error messages below input fields
                    function showError(inputElement, message) {
                        let errorMessage = document.createElement('div');
                        errorMessage.classList.add('error-message');
                        errorMessage.style.color = 'red';
                        errorMessage.style.fontSize = '12px';
                        errorMessage.textContent = message;

                        // Remove existing error messages if any
                        let existingError = inputElement.parentElement.querySelector('.error-message');
                        if (existingError) {
                            existingError.remove();
                        }

                        // Append new error message below the input field
                        inputElement.parentElement.appendChild(errorMessage);
                    }

                    // Clear error messages
                    function clearErrors() {
                        let errorMessages = document.querySelectorAll('.error-message');
                        errorMessages.forEach(function(message) {
                            message.remove();
                        });
                    }

                    // Function to show image preview
                    function previewImage(inputElement, previewId) {
                        let file = inputElement.files[0];
                        let reader = new FileReader();

                        reader.onload = function(e) {
                            let img = document.createElement('img');
                            img.src = e.target.result;
                            img.width = 100; // You can adjust the size here
                            img.style.marginTop = '10px';

                            let previewContainer = document.getElementById(previewId);
                            previewContainer.innerHTML = ''; // Clear previous preview
                            previewContainer.appendChild(img);
                        };

                        if (file) {
                            reader.readAsDataURL(file);
                        }
                    }

                    // Function to validate image size and dimensions
                    function validateImage(file, maxSize, minWidth, minHeight, inputElement) {
                        return new Promise((resolve, reject) => {
                            // Check file size (max size in KB)
                            if (file.size > maxSize * 1024) {
                                showError(inputElement, `File size should be under ${maxSize}KB.`);
                                return reject('File size exceeds limit.');
                            }

                            // Create an image element to check dimensions
                            let img = new Image();
                            img.onload = function() {
                                if (img.width < minWidth || img.height < minHeight) {
                                    showError(inputElement, `Image dimensions should be at least ${minWidth}x${minHeight}px.`);
                                    return reject('Image dimensions are incorrect.');
                                }
                                resolve();
                            };

                            // Read the file as data URL to trigger the onload event
                            img.src = URL.createObjectURL(file);
                        });
                    }

                    // Validate on form submit
                    document.querySelector('form').addEventListener('submit', async function(e) {
                        let isValid = true;
                        clearErrors(); // Clear previous error messages

                        // Validate Navbar Logo
                        let navbarLogo = document.querySelector('input[name="navbar_logo"]').files[0];
                        if (navbarLogo) {
                            try {
                                await validateImage(navbarLogo, 200, 72, 39, document.querySelector('input[name="navbar_logo"]'));
                            } catch (error) {
                                isValid = false;
                            }
                        }

                        // Validate Navbar Logo (Mobile)
                        let navbarLogoMobile = document.querySelector('input[name="navbar_logo_mobile"]').files[0];
                        if (navbarLogoMobile) {
                            try {
                                await validateImage(navbarLogoMobile, 200, 59, 29, document.querySelector('input[name="navbar_logo_mobile"]'));
                            } catch (error) {
                                isValid = false;
                            }
                        }

                        // Validate Footer Logo
                        let footerLogo = document.querySelector('input[name="footer_logo"]').files[0];
                        if (footerLogo) {
                            try {
                                await validateImage(footerLogo, 200, 180, 77, document.querySelector('input[name="footer_logo"]'));
                            } catch (error) {
                                isValid = false;
                            }
                        }

                        // Validate Favicon
                        let favicon = document.querySelector('input[name="favicon"]').files[0];
                        if (favicon) {
                            try {
                                await validateImage(favicon, 200, 32, 32, document.querySelector('input[name="favicon"]'));
                            } catch (error) {
                                isValid = false;
                            }
                        }

                        // If validation fails, prevent form submission
                        if (!isValid) {
                            e.preventDefault();
                        }
                    });
                </script>

                <form action="<?= base_url('setting/update-logo') ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="pd-20 card-box mb-30">
                                <div class="form-group">
                                    <label for="navbar_logo">Navbar Logo:</label>
                                    <input type="file" class="form-control" name="navbar_logo" onchange="previewImage(this, 'navbar_logo_preview')">
                                    <small>Formats: JPG, PNG, JPEG, (WEBP), Recommended Size: 72x39 px</small>
                                    <div id="navbar_logo_preview"></div>
                                    <?php if (isset($logos['navbar_logo'])): ?>
                                        <img src="<?= $logos['navbar_logo']; ?>" alt="Navbar Logo" width="100" style="margin-top: 10px;">
                                    <?php endif; ?>
                                </div>

                                <div class="form-group">
                                    <label for="favicon">Favicon:</label>
                                    <input type="file" class="form-control" name="favicon" onchange="previewImage(this, 'favicon_preview')">
                                    <small>Formats: JPG, PNG, JPEG, (WEBP), Recommended Size: 32x32 px</small>
                                    <div id="favicon_preview"></div>
                                    <?php if (isset($logos['favicon'])): ?>
                                        <img src="<?= $logos['favicon']; ?>" alt="Favicon" width="30" style="margin-top: 10px;">
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary btn-lg">Publish</button>
                    </div>
                </form>

                <!-- Default Basic Forms End -->
            </div>
        </div>
    </div>

    <!-- Page Main Content End -->
</body>

<!-- Footer View Start -->
<?= $this->include('footer_view') ?>
<!-- Footer View End -->

</html>