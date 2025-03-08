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

                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Online Store Logs</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-box mb-30">
                    <div class="pd-20">
                        <h4 class="text-blue h4">Deleted Logos</h4>
                    </div>
                    <div class="pb-20">
                        <table class="table hover data-table-export table-hover">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Logo</th>
                                    <th>Visibility</th>
                                    <th>Created_at</th>
                                    <th>Updated_at</th>
                                    <th>Is deleted</th>
                                    <th>Added_by</th>
                                    <th>Deleted At</th>
                                    <th>Deleted By</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php if (!empty($logos)): ?>
                                    <?php foreach ($logos as $logo): ?>
                                        <tr>
                                            <td><?= esc(substr($logo['title'], 0, 50)) . (strlen($logo['title']) > 50 ? '...' : '') ?>
                                            </td>
                                            <td><?= esc(substr($logo['logo'], 0, 20)) . (strlen($logo['logo']) > 20 ? '...' : '') ?>
                                            </td>
                                            <td><?= esc($logo['visibility']) ?></td>
                                            <td><?= esc($logo['created_at']) ?></td>
                                            <td><?= esc($logo['updated_at']) ?></td>
                                            <td><?= esc($logo['is_deleted']) ?></td>
                                            <td><?= esc($logo['added_by']) ?></td>
                                            <td><?= esc($logo['deleted_at']) ?></td>
                                            <td><?= esc($logo['deleted_by']) ?></td>
                                            <td>
                                                <a class="dropdown-item" href="javascript:void(0);"
                                                    onclick="confirmlogoRestore(<?= esc($logo['id']) ?>)">
                                                    <i class="bi bi-recycle text-success" style="font-size: 22px;"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="10" class="text-center">No deleted logo found.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>

                        </table>
                    </div>
                </div>

                <div class="card-box mb-30">
                    <div class="pd-20">
                        <h4 class="text-blue h4">Deleted blogs</h4>
                    </div>
                    <div class="pb-20">
                        <table class="table hover data-table-export table-hover">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Content type</th>
                                    <th>Blogs</th>
                                    <th>Tags</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Updated By</th>
                                    <th>Added By</th>
                                    <th>Is deleted</th>
                                    <th>Deleted At</th>
                                    <th>Deleted By</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>


                            <tbody>
                                <?php if (!empty($blogs)): ?>
                                    <?php foreach ($blogs as $blog): ?>
                                        <tr>
                                            <td><?= esc(substr($blog['blogs_name'], 0, 50)) . (strlen($blog['blogs_name']) > 50 ? '...' : '') ?>
                                            </td>
                                            <td><?= esc(substr($blog['blogs_description'], 0, 20)) . (strlen($blog['blogs_description']) > 20 ? '...' : '') ?>
                                            </td>
                                            <td><?= esc($blog['content_type']) ?></td>
                                            <td><?= esc($blog['blogs']) ?></td>
                                            <td><?= esc($blog['tags']) ?></td>
                                            <td><?= esc($blog['created_at']) ?></td>
                                            <td><?= esc($blog['updated_at']) ?></td>
                                            <td><?= esc($blog['updated_by']) ?></td>
                                            <td><?= esc($blog['added_by']) ?></td>
                                            <td><?= esc($blog['is_deleted']) ?></td>
                                            <td><?= esc($blog['deleted_at']) ?></td>
                                            <td><?= esc($blog['deleted_by']) ?></td>
                                            <td>
                                                <a class="dropdown-item" href="javascript:void(0);"
                                                    onclick="confirmblogsRestore(<?= esc($blog['id']) ?>)">
                                                    <i class="bi bi-recycle text-success" style="font-size: 22px;"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="12" class="text-center">No deleted blog found.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>

                        </table>
                    </div>
                </div>

                <div class="card-box mb-30">
                    <div class="pd-20">
                        <h4 class="text-blue h4">Deleted Members</h4>
                    </div>
                    <div class="pb-20">
                        <table class="table hover data-table-export table-hover">
                            <thead>
                                <tr>
                                    <th>Member Name</th>
                                    <th>Member Occupation</th>
                                    <th>Member Email</th>
                                    <th>Member Linkedin</th>
                                    <th>Order</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Is Deleted</th>
                                    <th>Deleted By</th>
                                    <th>Deleted At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($members)): ?>
                                    <?php foreach ($members as $member): ?>
                                        <tr>
                                            <td><?= esc(substr($member['member_name'], 0, 50)) . (strlen($member['member_name']) > 50 ? '...' : '') ?>
                                            </td>
                                            <td><?= esc(substr($member['member_occupation'], 0, 20)) . (strlen($member['member_occupation']) > 20 ? '...' : '') ?>
                                            </td>
                                            <td><?= esc($member['member_email']) ?></td>
                                            <td><?= esc($member['member_linkedin']) ?></td>
                                            <td><?= esc($member['order']) ?></td>
                                            <td><?= esc($member['created_at']) ?></td>
                                            <td><?= esc($member['updated_at']) ?></td>
                                            <td><?= esc($member['is_deleted']) ?></td>
                                            <td><?= esc($member['deleted_by']) ?></td>
                                            <td><?= esc($member['deleted_at']) ?></td>
                                            <td>
                                                <a class="dropdown-item" href="javascript:void(0);"
                                                    onclick="memberRestore(<?= esc($member['id']) ?>)">
                                                    <i class="bi bi-recycle text-success" style="font-size: 22px;"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="11" class="text-center">No deleted Member found.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card-box mb-30">
                    <div class="pd-20">
                        <h4 class="text-blue h4">Deleted policies</h4>
                    </div>
                    <div class="pb-20">
                        <table class="table hover data-table-export table-hover">
                            <thead>
                                <tr>
                                    <th>Policy Name</th>
                                    <th>Policy Description</th>
                                    <th>Policy Link</th>
                                    <th>Is Deleted</th>
                                    <th>Deleted By</th>
                                    <th>Deleted At</th>
                                    <th>Added By</th>
                                    <th>Updated By</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($policies)): ?>
                                    <?php foreach ($policies as $policie): ?>
                                        <tr>
                                            <td><?= esc(substr($policie['policy_name'], 0, 50)) . (strlen($policie['policy_name']) > 50 ? '...' : '') ?>
                                            </td>
                                            <td><?= esc(substr($policie['policy_description'], 0, 20)) . (strlen($policie['policy_description']) > 20 ? '...' : '') ?>
                                            </td>
                                            <td><?= esc($policie['policy_link']) ?></td>
                                            <td><?= esc($policie['is_deleted']) ?></td>
                                            <td><?= esc($policie['deleted_by']) ?></td>
                                            <td><?= esc($policie['deleted_at']) ?></td>
                                            <td><?= esc($policie['added_by']) ?></td>
                                            <td><?= esc($policie['updated_by']) ?></td>
                                            <td><?= esc($policie['created_at']) ?></td>
                                            <td><?= esc($policie['updated_at']) ?></td>
                                            <td>
                                                <a class="dropdown-item" href="javascript:void(0);"
                                                    onclick="policyRestore(<?= esc($policie['id']) ?>)">
                                                    <i class="bi bi-recycle text-success" style="font-size: 22px;"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="11" class="text-center">No deleted policies found.</td>
                                    </tr>
                                <?php endif; ?>
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

</html>