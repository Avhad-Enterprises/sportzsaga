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
                        <input type="radio" id="sidebaricon-1" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-1" checked="" />
                        <label class="custom-control-label" for="sidebaricon-1"><i class="fa fa-angle-down"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebaricon-2" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-2" />
                        <label class="custom-control-label" for="sidebaricon-2"><i class="ion-plus-round"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebaricon-3" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-3" />
                        <label class="custom-control-label" for="sidebaricon-3"><i class="fa fa-angle-double-right"></i></label>
                    </div>
                </div>

                <h4 class="weight-600 font-18 pb-10">Menu List Icon</h4>
                <div class="sidebar-radio-group pb-30 mb-10">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-1" name="menu-list-icon" class="custom-control-input" value="icon-list-style-1" checked="" />
                        <label class="custom-control-label" for="sidebariconlist-1"><i class="ion-minus-round"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-2" name="menu-list-icon" class="custom-control-input" value="icon-list-style-2" />
                        <label class="custom-control-label" for="sidebariconlist-2"><i class="fa fa-circle-o" aria-hidden="true"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-3" name="menu-list-icon" class="custom-control-input" value="icon-list-style-3" />
                        <label class="custom-control-label" for="sidebariconlist-3"><i class="dw dw-check"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-4" name="menu-list-icon" class="custom-control-input" value="icon-list-style-4" checked="" />
                        <label class="custom-control-label" for="sidebariconlist-4"><i class="icon-copy dw dw-next-2"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-5" name="menu-list-icon" class="custom-control-input" value="icon-list-style-5" />
                        <label class="custom-control-label" for="sidebariconlist-5"><i class="dw dw-fast-forward-1"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-6" name="menu-list-icon" class="custom-control-input" value="icon-list-style-6" />
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
                <div class="">
                    <div class="clearfix">
                        <div class="pull-left">
                            <h4 class=" h4">Add New Pincode</h4>
                        </div>
                    </div>
                </div>

                <form action="<?= base_url() ?>admin-products/publish-pincode" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="pd-20 card-box mb-30">  
                                <p class="text-blue">Details</p>

                            </div>

                        </div>

                        <div class="col-sm">
                            <div class="pd-20 card-box mb-30">
                                <p class="text-blue">Publishing</p>

                            </div>
                        </div>

                    </div>

                    <div class="mb-3">
                        <button value="submit" class="btn btn-primary btn-lg">
                            Publish
                        </button>
                    </div>

                </form>

            </div>
        </div>
        <!-- Page Main Content End -->

</body>

<script>
    let addedCount = 0;

    document.getElementById('add-image').addEventListener('click', function() {

        const hiddenSections = document.querySelectorAll('#image-container .d-none');

        if (hiddenSections.length > 0) {
            const nextSection = hiddenSections[0];
            nextSection.classList.remove('d-none');

            addedCount++;
            if (addedCount % 2 === 0 || addedCount % 3 === 0) {
                moveAddButton();
            }
        }
    });

    function moveAddButton() {
        const addButton = document.getElementById('add-image');
        const allSections = Array.from(document.querySelectorAll('#image-container .form-group'));

        let targetIndex = Math.floor(addedCount / 2) - 1;

        if (targetIndex >= 0 && targetIndex < allSections.length) {
            const targetSection = allSections[targetIndex];

            if (targetSection) {
                targetSection.parentNode.insertBefore(addButton, targetSection.nextSibling);
            }
        }
    }
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // Tier-1 Change Event
        $('#tier-1').on('change', function() {
            var tier1ID = $(this).val();
            if (tier1ID) {
                $('#tier2-loader').show();
                $('#tier-2').attr('disabled', true);

                // AJAX Request to Fetch Tier-2 Data
                $.ajax({
                    url: '<?= base_url('tiers/get_tier2') ?>',
                    type: 'POST',
                    data: {
                        tier_1_id: tier1ID
                    },
                    dataType: 'json',
                    success: function(response) {
                        $('#tier2-loader').hide();
                        $('#tier-2').attr('disabled', false);
                        $('#tier-2').html('<option value="">Select</option>');
                        $.each(response, function(key, value) {
                            $('#tier-2').append('<option value="' + value.tier_2_id + '">' + value.tier_name + '</option>');
                        });
                    },
                    error: function() {
                        alert('Error fetching Tier-2 data. Please try again.');
                        $('#tier2-loader').hide();
                    }
                });
            } else {
                $('#tier-2').html('<option value="">Select</option>');
                $('#tier-2').attr('disabled', true);
                $('#tier-3').html('<option value="">Select</option>');
                $('#tier-3').attr('disabled', true);
            }
        });

        // Tier-2 Change Event
        $('#tier-2').on('change', function() {
            var tier2ID = $(this).val();
            if (tier2ID) {
                $('#tier2-loader').show();
                $('#tier-3').attr('disabled', true);

                // AJAX Request to Fetch Tier-3 Data
                $.ajax({
                    url: '<?= base_url('tiers/get_tier3') ?>',
                    type: 'POST',
                    data: {
                        tier_2_id: tier2ID
                    },
                    dataType: 'json',
                    success: function(response) {
                        $('#tier2-loader').hide();
                        $('#tier-3').attr('disabled', false);
                        $('#tier-3').html('<option value="">Select</option>');
                        $.each(response, function(key, value) {
                            $('#tier-3').append('<option value="' + value.tier_3_id + '">' + value.tier_name + '</option>');
                        });
                    },
                    error: function() {
                        alert('Error fetching Tier-3 data. Please try again.');
                        $('#tier2-loader').hide();
                    }
                });
            } else {
                $('#tier-3').html('<option value="">Select</option>');
                $('#tier-3').attr('disabled', true);
            }
        });

        // Tier-3 Change Event
        $('#tier-3').on('change', function() {
            var tier3ID = $(this).val();
            if (tier3ID) {
                $('#tier4-loader').show();
                $('#tier-4').attr('disabled', true);

                // AJAX Request to Fetch Tier-4 Data
                $.ajax({
                    url: '<?= base_url('tiers/get_tier4') ?>',
                    type: 'POST',
                    data: {
                        tier_3_id: tier3ID
                    },
                    dataType: 'json',
                    success: function(response) {
                        $('#tier4-loader').hide();
                        $('#tier-4').attr('disabled', false);
                        $('#tier-4').html('<option value="">Select</option>');
                        $.each(response, function(key, value) {
                            $('#tier-4').append('<option value="' + value.tier_4_id + '">' + value.tier_name + '</option>');
                        });
                    },
                    error: function() {
                        alert('Error fetching Tier-4 data. Please try again.');
                        $('#tier4-loader').hide();
                    }
                });
            } else {
                $('#tier-4').html('<option value="">Select</option>');
                $('#tier-4').attr('disabled', true);
            }
        });
    });
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('input[name="sku"]').on('blur', function() {
            var sku = $(this).val();
            if (sku) {
                $.ajax({
                    url: '<?= base_url("admin-products/check_sku") ?>',
                    type: 'POST',
                    data: {
                        sku: sku
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.exists) {
                            // SKU already exists
                            $('#sku-error').text('SKU is already in use').show();
                            $('input[name="sku"]').addClass('is-invalid').removeClass('is-valid');
                        } else {
                            // SKU is available
                            $('#sku-error').text('SKU is available').show();
                            $('input[name="sku"]').addClass('is-valid').removeClass('is-invalid');
                        }
                    },
                    error: function() {
                        $('#sku-error').text('Error checking SKU').show();
                    }
                });
            } else {
                $('#sku-error').text('SKU cannot be empty').show();
                $('input[name="sku"]').removeClass('is-valid').removeClass('is-invalid');
            }
        });
    });
</script>

<!-- Footer View Start -->
<?= $this->include('footer_view') ?>
<!-- Footer View End -->

</html>