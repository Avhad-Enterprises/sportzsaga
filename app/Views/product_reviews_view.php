<!-- Head View Start -->
<?= $this->include('head_view') ?>
<!-- Head View End -->

<div id="loader-wrapper" class="hidden">
    <div class="loader-overlay">
        <div class="loadingspinner">
            <div id="square1"></div>
            <div id="square2"></div>
            <div id="square3"></div>
            <div id="square4"></div>
            <div id="square5"></div>
        </div>
        <div class="loader-text"></div>
    </div>
</div>

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

    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">

                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <a href="<?= base_url('admin-products') ?>">
                                    <i class="fa-solid fa-arrow-left"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-box mb-30">
                    <div class="pd-20">
                        <h4 class="text-blue h4">Product Reviews</h4>
                    </div>
                    <div class="pb-20">
                        <table class="table hover data-table-export table-hover">
                            <thead>
                                <tr>
                                    <th class="table-plus">ID</th>
                                    <th>User</th>
                                    <th>E-Mail</th>
                                    <th>Product</th>
                                    <th>DateTime</th>
                                    <th>Approved By</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($productreviews as $productreview) : ?>
                                    <tr>
                                        <td><?= $productreview['id'] ?></td>
                                        <td><?= esc($user_details['name']) ?></td>
                                        <td><?= esc($user_details['email']) ?></td>
                                        <td><?= esc($product_details['product_title']) ?></td>
                                        <td><?= date('d M Y, h:i A', strtotime($productreview['created_at'])) ?></td>
                                        <td><?= !empty($approved_by_details['name']) ? esc($approved_by_details['name']) : '-' ?></td>
                                        <td>
                                            <?php
                                            $statusLabels = [
                                                0 => ['label' => 'Pending', 'color' => 'badge-warning'],
                                                1 => ['label' => 'Approved', 'color' => 'badge-success'],
                                                2 => ['label' => 'Rejected', 'color' => 'badge-danger'],
                                            ];

                                            $status = $productreview['status'];
                                            $badge = $statusLabels[$status] ?? ['label' => 'Unknown', 'color' => 'badge-secondary'];
                                            ?>

                                            <span class="badge <?= esc($badge['color']) ?>">
                                                <?= esc($badge['label']) ?>
                                            </span>
                                        </td>
                                        <td>
                                            <?php if ($productreview['status'] == 1): ?>
                                                <i class="fa-regular fa-circle-check" style="color: #2ead00;"></i>
                                            <?php else: ?>
                                                <i class="fa-solid fa-circle-xmark mx-2 reject-review"
                                                    data-id="<?= $productreview['id'] ?>" style="color: #bd0000; font-size: 20px; cursor: pointer;"></i>

                                                <i class="fa-solid fa-circle-check approve-review"
                                                    data-id="<?= $productreview['id'] ?>" style="color: #008000; font-size: 20px; cursor: pointer;"></i>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer View Start -->
    <?= $this->include('footer_view') ?>
    <!-- Footer View End -->

</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        $(".approve-review, .reject-review").click(function() {
            let reviewId = $(this).data("id");
            let newStatus = $(this).hasClass("approve-review") ? 1 : 2;

            $("#loader-wrapper").fadeIn();

            $.ajax({
                url: "<?= base_url('products/reviews/update_status') ?>",
                type: "POST",
                data: {
                    review_id: reviewId,
                    status: newStatus,
                    "<?= csrf_token() ?>": "<?= csrf_hash() ?>"
                },
                dataType: "json",
                success: function(response) {
                    $("#loader-wrapper").fadeOut();

                    if (response.status === "success") {
                        showToast(response.message, "success");
                        reloadTable();
                    } else {
                        showToast(response.message, "error");
                    }
                },
                error: function() {
                    $("#loader-wrapper").fadeOut();
                    showToast("Something went wrong. Please try again!", "error");
                }
            });
        });

        function reloadTable() {
            location.reload();
        }
    });

    // ✅ Toast Notification Function
    function showToast(message, type) {
        let backgroundColor = type === "success" ? "#282828" : "linear-gradient(to right, #FF5F6D, #FFC371)";

        Toastify({
            text: message,
            duration: 5000,
            close: true,
            gravity: "bottom",
            position: "right",
            stopOnFocus: true,
            style: {
                background: backgroundColor,
            },
            onClick: function() {}
        }).showToast();
    }
</script>

</html>