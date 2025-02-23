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

                <!-- Gift Card Form Start -->
                <form id="giftcardform" method="post" action="<?= base_url('giftcard/publishGiftCard') ?>"
                    enctype="multipart/form-data" class="needs-validation" novalidate>
                    <div class="row">
                        <!-- First Column Start (col-md-6) -->
                        <div class="col-md-6">
                            <div class="pd-20 card-box mb-30">
                                <p class="text-blue mb-30">Gift Card Details</p>

                                <div class="form-group">
                                    <label for="gift_card_code">Gift Card Code</label>
                                    <input type="text" class="form-control" id="gift_card_code" name="gift_card_code"
                                        required readonly>
                                </div>

                                <div class="form-group">
                                    <label for="issued_by">Issued By</label>
                                    <input type="text" class="form-control" id="issued_by" name="issued_by" readonly
                                        value="<?= htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?>" required>
                                    <?php $session = session(); ?>

                                    <input type="hidden" id="issued_by_id" name="issued_by_id"
                                        value="<?= esc($session->get('user_id')) ?>">

                                </div>

                                <div class="form-group">
                                    <label for="issued_to">Issued To (Customer Email or Name)</label>
                                    <select class="form-control" id="issued_to" name="issued_to" required>
                                        <option value="">Select Customer</option>
                                        <?php if (!empty($users)): ?>
                                            <?php foreach ($users as $user): ?>
                                                <option value="<?= htmlspecialchars($user['email'], ENT_QUOTES, 'UTF-8'); ?>"
                                                    data-user-id="<?= isset($user['user_id']) ? htmlspecialchars($user['user_id'], ENT_QUOTES, 'UTF-8') : ''; ?>">
                                                    <?= htmlspecialchars($user['name'], ENT_QUOTES, 'UTF-8'); ?> |
                                                    <?= htmlspecialchars($user['email'], ENT_QUOTES, 'UTF-8'); ?>
                                                </option>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <option value="">No customers available</option>
                                        <?php endif; ?>
                                    </select>

                                    <?php foreach ($users as $user): ?>
                                        <!-- Hidden field to store the user ID of the selected customer -->
                                        <input type="hidden" id="issued_to_id" name="issued_to_id" value="<?= $user['user_id'] ?>">
                                    <?php endforeach; ?>

                                </div>

                                <div class="form-group">
                                    <label for="creation_date">Creation Date</label>
                                    <input type="date" class="form-control" id="creation_date" name="creation_date"
                                        required>
                                </div>

                                <div class="form-group">
                                    <label for="expiration_date">Expiration Date</label>
                                    <input type="date" class="form-control" id="expiration_date" name="expiration_date"
                                        required>
                                </div>
                            </div>
                        </div>


                        <!-- Second Column Start (col-md-6) -->
                        <div class="col-md-6">
                            <div class="pd-20 card-box mb-30">
                                <p class="text-blue mb-30">More Details</p>

                                <div class="form-group">
                                    <label for="initial_value">Initial Value</label>
                                    <select class="form-control" id="initial_value" name="initial_value" required>
                                        <option value="">Select Status</option>
                                        <option value="500">500</option>
                                        <option value="1000">1000</option>
                                        <option value="2000">2000</option>
                                        <option value="3000">3000</option>
                                        <option value="4000">4000</option>
                                        <option value="5000">5000</option>
                                    </select>
                                </div>

                                <!-- Hidden Balance Field -->
                                <input type="hidden" id="balance" name="balance">

                                <script>
                                    document.getElementById('initial_value').addEventListener('change', function() {
                                        document.getElementById('balance').value = this.value;
                                    });
                                </script>

                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control" id="status" name="status" required>
                                        <option value="">Select Status</option>
                                        <option value="active">Active</option>
                                        <option value="expired">Expired</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="security_features">Security Features (Security Code)</label>
                                    <input type="password" class="form-control" id="security_features"
                                        name="security_features" maxlength="6" pattern="\d{6}">
                                </div>


                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit">Add Gift Card</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Footer View Start -->
    <?= $this->include('footer_view') ?>
    <!-- Footer View End -->

    <script>
        // Set the creation date to the current date
        window.onload = function() {
            const creationDateInput = document.getElementById('creation_date');
            const today = new Date().toISOString().split('T')[0]; // Get today's date in 'YYYY-MM-DD' format
            creationDateInput.value = today; // Set the current date as the default value
        };
    </script>

    <script>
        // Function to generate a random alphanumeric code with dashes
        function generateGiftCardCode(length) {
            const chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
            let result = '';
            for (let i = 0; i < length; i++) {
                const randomIndex = Math.floor(Math.random() * chars.length);
                result += chars[randomIndex];

                // Insert a dash after every 4 characters, except for the last group
                if ((i + 1) % 4 === 0 && i + 1 < length) {
                    result += '-';
                }
            }
            return result;
        }

        // Set the generated code to the gift card code input field on page load
        window.onload = function() {
            const giftCardCodeInput = document.getElementById('gift_card_code');
            giftCardCodeInput.value = generateGiftCardCode(16); // Generate a 16-character code
        }

        // Form validation for Bootstrap 4
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                var forms = document.getElementsByClassName('needs-validation');
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>

    <script>
        // Form validation for Bootstrap 4
        (function() {
            'use strict'
            window.addEventListener('load', function() {
                var forms = document.getElementsByClassName('needs-validation')
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault()
                            event.stopPropagation()
                        }
                        form.classList.add('was-validated')
                    }, false)
                })
            }, false)
        })();
    </script>


    <script>
        const creationDateInput = document.getElementById('creation_date');
        const expirationDateInput = document.getElementById('expiration_date');

        // Add an event listener to validate expiration date
        expirationDateInput.addEventListener('input', () => {
            const creationDate = new Date(creationDateInput.value);
            const expirationDate = new Date(expirationDateInput.value);

            if (creationDateInput.value && expirationDate <= creationDate) {
                expirationDateInput.setCustomValidity('Expiration date must be after the creation date.');
            } else {
                expirationDateInput.setCustomValidity('');
            }
        });

        // Optional: Add similar validation for creation date changes
        creationDateInput.addEventListener('input', () => {
            const creationDate = new Date(creationDateInput.value);
            const expirationDate = new Date(expirationDateInput.value);

            if (expirationDateInput.value && expirationDate <= creationDate) {
                expirationDateInput.setCustomValidity('Expiration date must be after the creation date.');
            } else {
                expirationDateInput.setCustomValidity('');
            }
        });
    </script>


    <script>
        document.getElementById('issued_to').addEventListener('change', function() {
            var selectedOption = this.options[this.selectedIndex];
            var userId = selectedOption.getAttribute('data-user-id');

            document.getElementById('issued_to_id').value = userId;

            console.log("Issued To ID Set:", userId); // Debugging
        });
    </script>
</body>