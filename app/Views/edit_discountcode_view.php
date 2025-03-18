<style>
    .error-message {
        color: red;
        font-size: 0.875em;
        margin-top: 0.25em;
    }

    /* Custom Checkbox Styling */
    .custom-checkbox-group {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }

    .custom-checkbox-group .form-label {
        margin-right: 10px;
        font-size: 14px;
    }

    .custom-checkbox {
        width: 16px;
        height: 16px;
        appearance: none;
        background-color: #f0f0f0;
        border: 2px solid #ccc;
        border-radius: 4px;
        position: relative;
        cursor: pointer;
        margin-right: 5px;
    }

    .custom-checkbox:checked {
        background-color: #007bff;
        border-color: #007bff;
    }

    .custom-checkbox:checked::after {
        content: "";
        position: absolute;
        top: 2px;
        left: 4px;
        width: 6px;
        height: 10px;
        border: solid white;
        border-width: 0 2px 2px 0;
        transform: rotate(45deg);
    }
</style>

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
                <!-- Discount Code Edit Form Start -->
                <div class="pd-20 card-box mb-30">
                    <div class="clearfix">
                        <div class="pull-left">
                            <h4 class="text-blue h4">Discount Codes</h4>
                            <p class="mb-30">Edit Discount Code</p>
                        </div>
                    </div>

                    <form id="newdiscountcodeform" action="<?= base_url('update/' . $discountcode['id']) ?>" method="post">
                        <div class="row">
                            <!-- Left Side -->
                            <div class="col-md-8">
                                <div class="pd-20 card-box mb-30">
                                    <h4 class="text-blue h5">Edit Discount Code</h4>

                                    <!-- Title -->
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input class="form-control" name="title" type="text"
                                            value="<?= $discountcode['title'] ?>" required>
                                        <div id="title-error" class="error-message"></div>
                                    </div>

                                    <!-- Type of Code -->
                                    <div class="form-group">
                                        <label>Type of Code</label>
                                        <select class="form-control" name="typeOfCode" id="typeOfCode" required>
                                            <option value="" disabled>Select type of Discount code</option>
                                            <option value="numeric" <?= ($discountcode['typeOfCode'] === 'numeric') ? 'selected' : '' ?>>Numeric</option>
                                            <option value="alphabetic" <?= ($discountcode['typeOfCode'] === 'alphabetic') ? 'selected' : '' ?>>Alphabetic</option>
                                            <option value="alphanumeric"
                                                <?= ($discountcode['typeOfCode'] === 'alphanumeric') ? 'selected' : '' ?>>
                                                Alphanumeric</option>
                                        </select>
                                        <div id="typeOfCode-error" class="error-message"></div>
                                    </div>

                                    <!-- Prefix & Suffix -->
                                    <div class="form-group">
                                        <label>Prefix</label>
                                        <input class="form-control" name="prefix" type="text"
                                            value="<?= $discountcode['prefix'] ?>">
                                        <div id="prefix-error" class="error-message"></div>
                                    </div>

                                    <div class="form-group">
                                        <label>Suffix</label>
                                        <input class="form-control" type="text" name="suffix"
                                            value="<?= $discountcode['suffix'] ?>">
                                        <div id="suffix-error" class="error-message"></div>
                                    </div>

                                    <!-- Generated Code -->
                                    <div class="form-group">
                                        <label>Generated Code</label>
                                        <div class="input-group">
                                            <input class="form-control" name="code" type="text" id="generatedCode"
                                                value="<?= $discountcode['code'] ?>" readonly>
                                            <div class="input-group-append">
                                                <span class="input-group-text" style="cursor: pointer;"
                                                    onclick="generateCode()">
                                                    <i class="fas fa-sync-alt"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div id="code-error" class="error-message"></div>
                                    </div>

                                    <!-- Number of Codes -->
                                    <div class="form-group">
                                        <label>Number of Codes</label>
                                        <input class="form-control" name="numberOfCodes" type="number"
                                            value="<?= $discountcode['numberOfCodes'] ?>">
                                        <div id="numberOfCodes-error" class="error-message"></div>
                                    </div>

                                    <!-- Start & End Date -->
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Start Date</label>
                                            <input type="date" class="form-control" name="startDate" id="date1"
                                                value="<?= $discountcode['startDate'] ?>">
                                            <div id="startDate-error" class="error-message text-danger"></div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>End Date</label>
                                            <input type="date" class="form-control" name="endDate" id="date2"
                                                value="<?= $discountcode['endDate'] ?>">
                                            <div id="endDate-error" class="error-message text-danger"></div>
                                        </div>
                                    </div>

                                    <!-- Discount Status -->
                                    <div class="form-group">
                                        <label>Discount Status</label>
                                        <input id="discountstatus" class="form-control" name="discountstatus"
                                            value="<?= $discountcode['discountstatus'] ?>" readonly>
                                        <div id="discountstatus-error" class="error-message"></div>
                                    </div>

                                    <!-- Discount Type & Value -->
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="discount_type">Discount Type</label>
                                            <select id="discount_type" class="form-control" name="discount_type">
                                                <option value="value" <?= ($discountcode['discount_type'] == 'value') ? 'selected' : '' ?>>Discount Value</option>
                                                <option value="percentage"
                                                    <?= ($discountcode['discount_type'] == 'percentage') ? 'selected' : '' ?>>Discount Percentage</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Discount Value</label>
                                            <input class="form-control" type="number" step="0.01" name="discountValue"
                                                value="<?= $discountcode['discountValue'] ?>">
                                            <div id="discountValue-error" class="error-message"></div>
                                        </div>
                                    </div>

                                    <!-- Customer Eligibility -->
                                    <div class="form-group">
                                        <label>Customer Eligibility</label>
                                        <select class="form-control" name="customerEligibility">
                                            <option value="New" <?= $discountcode['customerEligibility'] == 'New' ? 'selected' : '' ?>>New Customers Only</option>
                                            <option value="Returning"
                                                <?= $discountcode['customerEligibility'] == 'Returning' ? 'selected' : '' ?>>Returning Customers Only</option>
                                            <option value="All" <?= $discountcode['customerEligibility'] == 'All' ? 'selected' : '' ?>>All Customers</option>
                                            <option value="VIP" <?= $discountcode['customerEligibility'] == 'VIP' ? 'selected' : '' ?>>VIP Customers</option>
                                        </select>
                                        <div id="customerEligibility-error" class="error-message"></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Right Side -->
                            <div class="col-md-4">
                                <!-- Minimum Purchase Requirement -->
                                <div class="pd-20 card-box mb-30">
                                    <label>Minimum Purchase Requirement</label>
                                    <input class="form-control" type="number" step="0.01"
                                        name="minimumPurchaseRequirement"
                                        value="<?= $discountcode['minimumPurchaseRequirement'] ?>">
                                    <div id="minimumPurchaseRequirement-error" class="error-message"></div>
                                </div>

                                <!-- Maximum Discount Uses -->
                                <div class="pd-20 card-box mb-30">
                                    <label>Maximum Discount Uses</label>
                                    <input class="form-control" name="maximumDiscountUses" type="number"
                                        value="<?= $discountcode['maximumDiscountUses'] ?>">
                                    <div id="maximumDiscountUses-error" class="error-message"></div>
                                </div>

                                <!-- Limit Per Customer -->
                                <div class="pd-20 card-box mb-30">
                                    <label>Limit Per Customer</label>
                                    <input class="form-control" name="limitPerCustomer" type="number"
                                        value="<?= $discountcode['limitPerCustomer'] ?>">
                                    <div id="limitPerCustomer-error" class="error-message"></div>
                                </div>

                                <!-- Exclusion Rules -->
                                <div class="pd-20 card-box mb-30">
                                    <label>Exclusion Rules</label>
                                    <textarea class="form-control"
                                        name="exclusion_rules"><?= $discountcode['exclusion_rules'] ?></textarea>
                                    <div id="exclusion-rules-error" class="error-message"></div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <button class="btn btn-primary btn-lg" type="submit">Save Changes</button>
                        </div>
                    </form>
                </div>
                <!-- Discount Code Edit Form End -->
            </div>
        </div>
    </div>





    <script>
        // Function to generate the discount code based on user inputs
        function generateCode() {
            const typeOfCode = document.getElementById('typeOfCode').value;
            const codeLength = parseInt(document.getElementById('codeLength').value);
            const prefix = document.querySelector('input[name="prefix"]').value || '';
            const suffix = document.querySelector('input[name="suffix"]').value || '';
            const generatedCodeField = document.getElementById('generatedCode');

            let generatedCode = '';
            let totalLength = prefix.length + suffix.length;

            if (totalLength > codeLength) {
                alert('The combined length of prefix and suffix cannot exceed the total code length.');
                return;
            }

            function generateRandomDigits(length) {
                let result = '';
                const characters = '0123456789';
                for (let i = 0; i < length; i++) {
                    result += characters.charAt(Math.floor(Math.random() * characters.length));
                }
                return result;
            }

            function generateRandomAlphabetic(length) {
                let result = '';
                const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                for (let i = 0; i < length; i++) {
                    result += characters.charAt(Math.floor(Math.random() * characters.length));
                }
                return result;
            }

            function generateRandomAlphanumeric(length) {
                let result = '';
                const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
                for (let i = 0; i < length; i++) {
                    result += characters.charAt(Math.floor(Math.random() * characters.length));
                }
                return result;
            }

            let randomCodeLength = codeLength - totalLength;
            if (randomCodeLength < 1) {
                alert('The total length of the code (prefix + random code + suffix) must equal the specified code length.');
                return;
            }

            if (typeOfCode === 'numeric') {
                generatedCode = generateRandomDigits(randomCodeLength);
            } else if (typeOfCode === 'alphabetic') {
                generatedCode = generateRandomAlphabetic(randomCodeLength);
            } else if (typeOfCode === 'alphanumeric') {
                generatedCode = generateRandomAlphanumeric(randomCodeLength);
            }

            generatedCode = prefix.toUpperCase() + generatedCode + suffix.toUpperCase();
            generatedCodeField.value = generatedCode;
        }

        document.addEventListener('DOMContentLoaded', () => {
            const form = document.getElementById('editDiscountCodeForm');
            form.addEventListener('submit', (e) => {
                const generatedCodeField = document.getElementById('generatedCode');
                if (!generatedCodeField.value) {
                    alert('Please generate a code before saving.');
                    e.preventDefault();
                }
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const date1 = document.getElementById('date1');
            const date2 = document.getElementById('date2');
            const startDateError = document.getElementById('startDate-error');
            const endDateError = document.getElementById('endDate-error');

            const today = new Date().toISOString().split('T')[0];
            date1.setAttribute('min', today);

            date1.addEventListener('change', function() {
                const startDate = new Date(date1.value);
                const endDate = new Date(date2.value);

                startDateError.textContent = '';
                endDateError.textContent = '';

                if (date2.value && endDate <= startDate) {
                    endDateError.textContent = 'End date must be after the start date.';
                    date2.value = '';
                }
            });

            date2.addEventListener('change', function() {
                const startDate = new Date(date1.value);
                const endDate = new Date(date2.value);

                endDateError.textContent = '';

                if (endDate <= startDate) {
                    endDateError.textContent = 'End date must be after the start date.';
                    date2.value = '';
                }
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const startDateInput = document.getElementById("date1");
            const endDateInput = document.getElementById("date2");
            const discountStatusInput = document.getElementById("discountstatus");

            function updateDiscountStatus() {
                const startDate = new Date(startDateInput.value);
                const endDate = new Date(endDateInput.value);
                const today = new Date();

                if (startDate <= today && today <= endDate) {
                    discountStatusInput.value = "Active";
                    discountStatusInput.classList.remove("text-danger");
                    discountStatusInput.classList.add("text-success");
                } else {
                    discountStatusInput.value = "Inactive";
                    discountStatusInput.classList.remove("text-success");
                    discountStatusInput.classList.add("text-danger");
                }
            }

            startDateInput.addEventListener("change", updateDiscountStatus);
            endDateInput.addEventListener("change", updateDiscountStatus);

            // Update status on page load
            updateDiscountStatus();
        });
    </script>


    <?= $this->include('footer_view') ?>
    <!-- Footer View End -->

</body>

</html>