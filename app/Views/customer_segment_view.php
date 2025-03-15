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
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">

                <!-- Page Header Start -->
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Customer Segments</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item active" aria-current="page">Customer Segments</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="col-md-6 col-sm-12 text-right blogs-imex">
                            <div class="dropdown">
                                <a class="btn btn-primary fw-bold" href="<?= base_url(); ?>add_new_customersegment"
                                    role="button">
                                    Add New
                                </a>
                            </div>
                            <div class="dropdown">
                                <a class="btn btn-primary fw-bold" href="<?= base_url(); ?>customer_segments/import"
                                    role="button">
                                    Import
                                </a>
                            </div>
                            <div class="dropdown">
                                <a class="btn btn-primary fw-bold" href="<?= base_url(); ?>customer_segments/export"
                                    role="button">
                                    Export to Excel
                                </a>
                            </div>
                            <div class="dropdown">
                                <a class="btn btn-primary fw-bold" href="<?= base_url(); ?>customersegment_logs_view"
                                    role="button">
                                    Logs
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Page Header End -->

                <!-- Page Content Start -->
                <div class="card-box mb-30">
                    <div class="pd-20">
                        <h4 class="text-blue h4">Registered Customer Segments</h4>
                    </div>
                    <div class="pb-20">
                        <table id="datatable-responsive" class="table hover multiple-select-row data-table-export"
                            cellspacing="0">
                            <thead>
                                <tr>
                                    <th class="table-plus datatable-nosort">ID</th>
                                    <th>Segment Name</th>
                                    <th>Type</th>
                                    <th>Created By</th>
                                    <th>Filters</th>
                                    <th>Filtered Users</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($segments as $segment): ?>
                                    <tr>
                                        <td class="table-plus"><?= $segment['segment_id'] ?></td>
                                        <td><?= $segment['segment_name'] ?></td>
                                        <td><?= ucfirst($segment['segment_type']) ?></td>
                                        <td><?= $segment['created_by'] ?></td>
                                        <td>
                                            <?php if (!empty($segment['filters'])): ?>
                                                <ul>
                                                    <?php
                                                    // Decode the filters JSON
                                                    $filters = json_decode($segment['filters'], true);
                                                    foreach ($filters as $key => $value):
                                                    ?>
                                                        <li>
                                                            <strong><?= ucfirst($key) ?>:</strong>
                                                            <?php
                                                            if (is_array($value)) {
                                                                echo implode(', ', $value);
                                                            } else {
                                                                echo htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
                                                            }
                                                            ?>
                                                        </li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            <?php else: ?>
                                                <span>No Filters Applied</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($segment['filtered_users']) {
                                                $userIds = explode(',', $segment['filtered_users']);
                                                $userModel = new \App\Models\Registerusers_model();
                                                $users = $userModel->whereIn('user_id', $userIds)->findAll();

                                                foreach ($users as $user) {
                                                    echo '<span>' . esc($user['name']) . ' (' . esc($user['email']) . ')</span><br>';
                                                }
                                            } else {
                                                echo 'No Users';
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                                    href="#" role="button" data-toggle="dropdown">
                                                    <i class="dw dw-more"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                    <a class="dropdown-item"
                                                        href="<?= base_url(); ?>customer_segments/editsegment/<?= $segment['segment_id'] ?>"><i
                                                            class="dw dw-edit2"></i> Edit</a>
                                                    <a class="dropdown-item" href="javascript:void(0);"
                                                        onclick="customersegmentDelete(<?= $segment['segment_id'] ?>)">
                                                        <i class="dw dw-delete-3"></i> Delete
                                                    </a>

                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Page Content End -->
            </div>
        </div>
    </div>

    <script>
        function confirmSegmentDelete(segmentId) {
            if (confirm("Are you sure you want to delete this segment?")) {
                $.ajax({
                    url: "<?= base_url('customer_segment/deletesegment/') ?>" + segmentId, // Update the correct URL
                    type: "POST",
                    dataType: "json",
                    success: function(response) {
                        if (response.status === "success") {
                            alert(response.message);
                            location.reload(); // Reload the page to reflect changes
                        } else {
                            alert(response.message);
                        }
                    },
                    error: function() {
                        alert("Error deleting segment. Please try again.");
                    }
                });
            }
        }
    </script>


</body>
<!-- Footer View Start -->
<?= $this->include('footer_view') ?>
<!-- Footer View End -->

</html>