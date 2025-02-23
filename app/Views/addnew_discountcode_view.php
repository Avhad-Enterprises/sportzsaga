<style>
    .error-message {
        color: red;
        font-size: 0.875em;
        margin-top: 0.25em;
    }

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
        width: 20px;
        height: 20px;
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
                <!-- Default Basic Forms Start -->
                <div class="pd-20 card-box mb-30">
                    <div class="clearfix">
                        <div class="pull-left">
                            <h4 class="text-blue h4">Discount Code</h4>
                            <p class="mb-30">Add New Discount Code</p>
                        </div>
                    </div>
                </div>

                <form id="newdiscountcodeform" action="<?= site_url('publishDiscountCode'); ?>" method="post">

                    <div class="row">
                        <!-- Larger Left Card Box -->
                        <div class="col-md-8">
                            <div class="pd-20 card-box mb-30">
                                <h4 class="text-blue h5">Create New Discount Code</h4>
                                <div class="form-group">
                                    <label>Title</label>
                                    <input class="form-control" name="title" type="text" placeholder="Johnny Brown">
                                    <div id="title-error" class="error-message"></div>
                                </div>
                                <div class="form-group">
                                    <label>Type of Code</label>
                                    <select class="form-control" name="typeOfCode" id="typeOfCode">
                                        <option value="" disabled selected>Select type of Discount code</option>
                                        <option value="numeric">Numeric</option>
                                        <option value="alphabetic">Alphabetic</option>
                                        <option value="alphanumeric">Alphanumeric</option>
                                    </select>
                                    <div id="typeOfCode-error" class="error-message"></div>
                                </div>

                                <!-- Code Length -->
                                <div class="form-group">
                                    <label>Code Length (including Prefix and Suffix)</label>
                                    <input type="number" class="form-control" name="codeLength" id="codeLength" min="4"
                                        max="16" value="10">
                                    <div id="codeLength-error" class="error-message"></div>
                                </div>

                                <!-- Prefix -->
                                <div class="form-group">
                                    <label>Prefix</label>
                                    <input class="form-control" name="prefix" type="text" id="prefix"
                                        placeholder="Enter Discount code prefix">
                                    <div id="prefix-error" class="error-message"></div>
                                </div>

                                <!-- Suffix -->
                                <div class="form-group">
                                    <label>Sufix</label>
                                    <input class="form-control" type="text" name="suffix" id="suffix"
                                        placeholder="Enter Discount code suffix">
                                    <div id="suffix-error" class="error-message"></div>
                                </div>

                                <div class="form-group">
                                    <label>Generated Code</label>
                                    <div class="input-group">
                                        <!-- Generated Code Field -->
                                        <input class="form-control" name="code" type="text" id="generatedCode" readonly>

                                        <!-- Generate Code Icon -->
                                        <div class="input-group-append">
                                            <span class="input-group-text" style="cursor: pointer;"
                                                onclick="generateCode()">
                                                <i class="fas fa-sync-alt"></i> <!-- Font Awesome icon for "refresh" -->
                                            </span>
                                        </div>
                                    </div>
                                    <div id="code-error" class="error-message"></div>
                                </div>



                                <div class="form-group">
                                    <label>Number of Codes to Generate</label>
                                    <input class="form-control" name="numberOfCodes" type="number">
                                    <div id="numberOfCodes-error" class="error-message"></div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Start Date</label>
                                        <input type="date" class="form-control" name="startDate" id="date1">
                                        <div id="startDate-error" class="error-message text-danger"></div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>End Date</label>
                                        <input type="date" class="form-control" name="endDate" id="date2">
                                        <div id="endDate-error" class="error-message text-danger"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Discount Status</label>
                                    <input id="discountstatus" class="form-control" name="discountstatus" disabled>
                                    <div id="discountstatus-error" class="error-message"></div>
                                </div>


                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="discount_type">Discount Type</label>
                                        <select id="discount_type" class="form-control" name="discount_type"
                                            onchange="toggleDiscountField()">
                                            <option value="value">Discount Value</option>
                                            <option value="percentage">Discount Percentage</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Discount Value</label>
                                        <input class="form-control" type="number" step="0.01" name="discountValue"
                                            placeholder="Enter the Discount Value">
                                        <div id="discountValue-error" class="error-message"></div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Customer Eligibility</label>
                                        <select class="form-control" name="customerEligibility"
                                            id="customerEligibility">
                                            <option value="" disabled selected>Select customer eligibility</option>
                                            <option value="New">New Customers Only</option>
                                            <option value="Returning">Returning Customers Only</option>
                                            <option value="All">All Customers</option>
                                            <option value="VIP">VIP Customers</option>
                                        </select>
                                        <div id="customerEligibility-error" class="error-message"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">

                            <!-- Card Box for Minimum Purchase Requirement -->
                            <div class="pd-20 card-box mb-30">

                                <div class="form-group">
                                    <label>Minimum Purchase Requirement</label>
                                    <input class="form-control" type="number" step="0.01"
                                        name="minimumPurchaseRequirement"
                                        placeholder="Enter Minimum Purchase requirement">
                                    <div id="minimumPurchaseRequirement-error" class="error-message"></div>
                                </div>
                            </div>

                            <!-- Card Box for Maximum Discount Uses -->
                            <div class="pd-20 card-box mb-30">
                                <label>Maximum Discount Uses</label>
                                <div class="form-check">
                                    <input type="radio" id="limitTotalUsesOption" class="form-check-input"
                                        name="discountLimitOption" value="totalUses">
                                    <label for="limitTotalUsesOption" class="form-check-label">Limit number of times
                                        each code can be used in total</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" id="limitPerCustomerOption" class="form-check-input"
                                        name="discountLimitOption" value="perCustomer">
                                    <label for="limitPerCustomerOption" class="form-check-label">Limit one use per
                                        customer</label>
                                </div>
                            </div>

                            <!-- Card Box for Additional Options -->
                            <div class="pd-20 card-box mb-30">
                                <h4 class="text-blue h5">Additional Options</h4>
                                <div class="form-group">
                                    <label>Exclusion Rules</label>
                                    <textarea id="exclusion-rules" class="form-control" name="exclusion_rules"
                                        placeholder="Enter rules or criteria here"></textarea>
                                    <div id="exclusion-rules-error" class="error-message"></div>
                                </div>

                            </div>
                        </div>



                        <div class="mb-3">
                            <button class="btn btn-primary btn-lg" type="submit">
                                Publish Discount
                            </button>
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
        // Function to generate the discount code based on user inputs
        function generateCode() {
            const typeOfCode = document.getElementById('typeOfCode').value; // Get the selected type of code
            const codeLength = parseInt(document.getElementById('codeLength').value); // Get the code length
            const prefix = document.querySelector('input[name="prefix"]').value || ''; // Get the prefix
            const suffix = document.querySelector('input[name="suffix"]').value || ''; // Get the suffix
            const generatedCodeField = document.getElementById('generatedCode');

            let generatedCode = '';
            let totalLength = prefix.length + suffix.length;

            // Validate the total length (prefix + generated code + suffix should match code length)
            if (totalLength > codeLength) {
                alert('The combined length of prefix and suffix cannot exceed the total code length.');
                return; // Prevent further code generation
            }

            // Function to generate random numeric code
            function generateRandomDigits(length) {
                let result = '';
                const characters = '0123456789';
                for (let i = 0; i < length; i++) {
                    result += characters.charAt(Math.floor(Math.random() * characters.length));
                }
                return result;
            }

            // Function to generate random alphanumeric code
            function generateRandomAlphanumeric(length) {
                const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
                let result = '';
                for (let i = 0; i < length; i++) {
                    const randomIndex = Math.floor(Math.random() * characters.length);
                    result += characters[randomIndex];
                }
                return result;
            }

            // Function to generate random alphabetic code
            function generateRandomAlphabetic(length) {
                const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                let result = '';
                for (let i = 0; i < length; i++) {
                    const randomIndex = Math.floor(Math.random() * characters.length);
                    result += characters[randomIndex];
                }
                return result;
            }

            // Function to generate random code based on type
            let randomCodeLength = codeLength - totalLength; // Calculate remaining length after prefix and suffix

            if (randomCodeLength < 1) {
                alert('The total length of the code (prefix + random code + suffix) must equal the specified code length.');
                return; // Prevent code generation if remaining length is less than 1
            }

            // Generate the appropriate code based on selected type
            if (typeOfCode === 'numeric') {
                generatedCode = generateRandomDigits(randomCodeLength);
            } else if (typeOfCode === 'alphabetic') {
                generatedCode = generateRandomAlphabetic(randomCodeLength);
            } else if (typeOfCode === 'alphanumeric') {
                generatedCode = generateRandomAlphanumeric(randomCodeLength);
            }

            // Format the code with prefix and suffix
            generatedCode = prefix.toUpperCase() + generatedCode + suffix.toUpperCase();

            // Set the value of the generated code field
            generatedCodeField.value = generatedCode;
        }


        document.addEventListener('DOMContentLoaded', () => {
            const form = document.getElementById('newdiscountcodeform');
            form.addEventListener('submit', (e) => {
                // Optional: Validate required fields before submission
                const generatedCodeField = document.getElementById('generatedCode');
                if (!generatedCodeField.value) {
                    alert('Please generate a code before saving.');
                    e.preventDefault(); // Prevent submission if no code is generated
                    return;
                }

                // Allow form submission
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const date1 = document.getElementById('date1'); // Start Date
            const date2 = document.getElementById('date2'); // End Date
            const startDateError = document.getElementById('startDate-error'); // Start Date Error
            const endDateError = document.getElementById('endDate-error'); // End Date Error

            // Set the minimum start date to today
            const today = new Date().toISOString().split('T')[0];
            date1.setAttribute('min', today); // Ensuring the start date is not before today

            // Add event listeners for date validation

            // For the Start Date Change
            date1.addEventListener('change', function() {
                const startDate = new Date(date1.value); // Get the start date
                const endDate = new Date(date2.value); // Get the end date

                // Clear previous errors
                startDateError.textContent = '';
                endDateError.textContent = '';

                // Validate if end date is already filled
                if (date2.value && endDate <= startDate) {
                    endDateError.textContent = 'End date must be after the start date.';
                    date2.value = ''; // Reset invalid end date
                }
            });

            // For the End Date Change
            date2.addEventListener('change', function() {
                const startDate = new Date(date1.value); // Get the start date
                const endDate = new Date(date2.value); // Get the end date

                // Clear previous error
                endDateError.textContent = '';

                // Validate if the end date is after the start date
                if (endDate <= startDate) {
                    endDateError.textContent = 'End date must be after the start date.';
                    date2.value = ''; // Reset invalid end date
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
        });
    </script>


</body>