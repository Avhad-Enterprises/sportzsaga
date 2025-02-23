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
                <!-- Gift Card Edit Form Start -->
                <form id="giftcardform" method="post"
                    action="<?= base_url('giftcard/updateGiftCard/' . $giftCard['gift_card_id']) ?>"
                    enctype="multipart/form-data" class="needs-validation" novalidate>
                    <div class="row">
                        <!-- First Column Start (col-md-6) -->
                        <div class="col-md-6">
                            <div class="pd-20 card-box mb-30">
                                <p class="text-blue mb-30">Gift Card Details</p>

                                <div class="form-group">
                                    <label for="gift_card_code">Gift Card Code</label>
                                    <input type="text" class="form-control" id="gift_card_code" name="gift_card_code"
                                        value="<?= $giftCard['gift_card_code'] ?>" required readonly>
                                </div>

                                <div class="form-group">
                                    <label for="issued_by">Issued By</label>
                                    <input type="text" class="form-control" id="issued_by" name="issued_by"
                                        value="<?= htmlspecialchars($giftCard['issued_by'], ENT_QUOTES, 'UTF-8'); ?>"
                                        required readonly>

                                    <?php $session = session(); ?>
                                    <input type="hidden" id="issued_by_id" name="issued_by_id"
                                        value="<?= esc($giftCard['issued_by_id'] ?? $session->get('user_id')); ?>">
                                </div>

                                <div class="form-group">
                                    <label for="issued_to">Issued To (Customer Email or Name)</label>
                                    <select class="form-control" id="issued_to" name="issued_to" required>
                                        <option value="">Select Customer</option>
                                        <?php if (!empty($users)): ?>
                                            <?php foreach ($users as $user): ?>
                                                <option value="<?= htmlspecialchars($user['email'], ENT_QUOTES, 'UTF-8'); ?>"
                                                    data-user-id="<?= isset($user['user_id']) ? htmlspecialchars($user['user_id'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                                    <?= ($giftCard['issued_to'] == $user['email']) ? 'selected' : ''; ?>>
                                                    <?= htmlspecialchars($user['name'], ENT_QUOTES, 'UTF-8'); ?> |
                                                    <?= htmlspecialchars($user['email'], ENT_QUOTES, 'UTF-8'); ?>
                                                </option>

                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <option value="">No customers available</option>
                                        <?php endif; ?>
                                    </select>

                                    <!-- Hidden field to store the user ID of the selected customer -->
                                    <input type="hidden" id="issued_to_id" name="issued_to_id"
                                        value="<?= esc($giftCard['issued_to_id'] ?? ''); ?>">
                                </div>

                                <script>
                                    // JavaScript to update hidden field when a customer is selected
                                    document.getElementById('issued_to').addEventListener('change', function() {
                                        var selectedOption = this.options[this.selectedIndex];
                                        var issuedToIdInput = document.getElementById('issued_to_id');

                                        if (selectedOption && selectedOption.dataset.userId) {
                                            issuedToIdInput.value = selectedOption.getAttribute('data-user-id');
                                        } else {
                                            issuedToIdInput.value = ''; // Ensure it's cleared if no selection
                                        }
                                    });
                                </script>


                                <div class="form-group">
                                    <label for="creation_date">Creation Date</label>
                                    <input type="date" class="form-control" id="creation_date" name="creation_date"
                                        value="<?= $giftCard['creation_date'] ?>" required>
                                </div>

                                <div class="form-group">
                                    <label for="expiration_date">Expiration Date</label>
                                    <input type="date" class="form-control" id="expiration_date" name="expiration_date"
                                        value="<?= $giftCard['expiration_date'] ?>" required>
                                </div>
                            </div>
                        </div>
                        <!-- First Column End -->

                        <!-- Second Column Start (col-md-6) -->
                        <div class="col-md-6">
                            <div class="pd-20 card-box mb-30">
                                <p class="text-blue mb-30">More Gift Card Details</p>

                                <div class="form-group">
                                    <label for="initial_value">Initial Value</label>
                                    <input type="number" class="form-control" id="initial_value" name="initial_value"
                                        value="<?= $giftCard['initial_value'] ?>" required>
                                </div>

                                <!-- Hidden Balance Field -->
                                <input type="hidden" id="balance" name="balance" value="<?= $giftCard['balance'] ?>">

                                <script>
                                    document.getElementById('initial_value').addEventListener('input', function() {
                                        document.getElementById('balance').value = this.value;
                                    });
                                </script>

                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control" id="status" name="status" required>
                                        <option value="">Select Status</option>
                                        <option value="active" <?= ($giftCard['status'] == 'active') ? 'selected' : ''; ?>>
                                            Active</option>
                                        <option value="expired" <?= ($giftCard['status'] == 'expired') ? 'selected' : ''; ?>>Expired</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="security_features">Security Features (PIN or Security Code)</label>
                                    <input type="text" class="form-control" id="security_features"
                                        name="security_features" value="<?= $giftCard['security_features'] ?>">
                                </div>


                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit">Update Gift Card</button>
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

</body>