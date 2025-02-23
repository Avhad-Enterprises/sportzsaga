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
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="row">
                    <div class="col-md-4 mb-20">
                        <div class="card-box min-height-200px pd-20 mb-20" data-bgcolor="#455a64">
                            <div class="d-flex justify-content-between pb-20 text-white">
                                <div class="icon h1 text-white">
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                </div>
                                <div class="font-14 text-right">
                                    <div><i class="fa-solid fa-pager" style="color: #ffffff;"></i> 2 Menus</div>
                                    <div class="font-12">Currently</div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-end">
                                <div class="text-white">
                                    <div class="font-14">Menu
                                        <a href="<?= base_url(); ?>header">
                                            <i class="fa-regular fa-eye" style="color: #ffffff;"></i></span>
                                        </a>
                                    </div>
                                    <div class="font-24 weight-500">Header</div>
                                </div>
                                <div class="max-width-150">
                                    <div id="appointment-chart"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-20">
                        <div class="card-box min-height-200px pd-20" data-bgcolor="#265ed7">
                            <div class="d-flex justify-content-between pb-20 text-white">
                                <div class="icon h1 text-white">
                                    <i class="fa-solid fa-list" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-end">
                                <div class="text-white">
                                    <div class="font-14">6 Pages
                                        <a href="<?= base_url(); ?>footer">
                                            <span><i class="fa-regular fa-eye" style="color: #ffffff;"></i></span>
                                        </a>
                                    </div>
                                    <div class="font-24 weight-500">Footer</div>
                                </div>
                                <div class="max-width-150">
                                    <div id="surgery-chart"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-20">
                        <div class="card-box min-height-200px pd-20 mb-20" data-bgcolor="#455a64">
                            <div class="d-flex justify-content-between pb-20 text-white">
                                <div class="icon h1 text-white">
                                    <i class="fa-brands fa-square-threads" aria-hidden="true"></i>
                                </div>
                                <div class="font-14 text-right">
                                    <div>
                                        <i class="fa-brands fa-instagram"></i>
                                        <i class="fa-brands fa-square-facebook"></i>
                                        <i class="fa-brands fa-square-x-twitter"></i>
                                    </div>
                                    <div class="font-12">Available Now</div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-end">
                                <div class="text-white">
                                    <div class="font-14 socialmedit"><a href="<?= base_url(); ?>homecontrol/socialmedia">Edit</a></div>
                                    <div class="font-24 weight-500">Social Media</div>
                                </div>
                                <div class="max-width-150">
                                    <div id="appointment-chart"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4 mb-20">
                        <div class="card-box min-height-200px pd-20" data-bgcolor="#265ed7">
                            <div class="d-flex justify-content-between pb-20 text-white">
                                <div class="icon h1 text-white">
                                    <i class="fa-solid fa-globe" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-end">
                                <div class="text-white">
                                    <div class="font-14">
                                        <a href="<?= base_url(); ?>drip_home_edit">
                                            <span><i class="fa-regular fa-eye" style="color: #ffffff;"></i></span>
                                        </a>
                                    </div>
                                    <div class="font-24 weight-500">Homepage</div>
                                </div>
                                <div class="max-width-150">
                                    <div id="surgery-chart"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <?php if (session()->get('admin_type') === 'super_admin') : ?>
                        <div class="col-md-4 mb-20">
                            <div class="card-box min-height-200px pd-20 mb-20" data-bgcolor="#455a64">
                                <div class="d-flex justify-content-between pb-20 text-white">
                                    <div class="icon h1 text-white">
                                        <i class="fa-solid fa-gears" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-end">
                                    <div class="text-white">
                                        <div class="font-14 socialmedit"><a href="<?= base_url(); ?>route-manager">Edit</a></div>
                                        <div class="font-24 weight-500">Manage Routes</div>
                                    </div>
                                    <div class="max-width-150">
                                        <div id="appointment-chart"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>


                <!-- Page Main Content Start -->
                <div class="card-box mb-30">
                    <div class="pd-20">
                        <h4 class="text-blue h4">Control</h4>
                    </div>
                    <div class="pb-20">
                        <table id="datatable-responsive" class="table table-hover" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Section Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($sections as $section) : ?>
                                    <tr>
                                        <td><?= $section['id'] ?></td>
                                        <td><?= $section['section_name'] ?></td>
                                        <td>
                                            <div class="dropdown">
                                                <a class="btn btn-outline-light" href="#" data-toggle="modal" data-target="#modal-<?= $section['id'] ?>" role="button">
                                                    <?php if ($section['is_visible'] == '1') : ?>
                                                        <i class="fa-solid fa-eye secvisible" style="color: #008000;"></i>
                                                    <?php else : ?>
                                                        <i class="fa-solid fa-eye-slash secvisible" style="color: #FF0000;"></i>
                                                    <?php endif; ?>
                                                </a>
                                                <div class="modal fade" id="modal-<?= $section['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalLabel-<?= $section['id'] ?>" aria-hidden="true">
                                                    <div class="modal-dialog modal-sm modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="modalLabel-<?= $section['id'] ?>">Edit Visibility</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                            </div>
                                                            <form action="<?= base_url('homecontrol/editcontrol/' . $section['id']); ?>" method="post">
                                                                <div class="modal-body">
                                                                    <label class="toggle-switch">
                                                                        <select name="tooglesection" id="tooglesection-<?= $section['id'] ?>">
                                                                            <option value="1" <?= $section['is_visible'] == '1' ? 'selected' : '' ?>>Public</option>
                                                                            <option value="0" <?= $section['is_visible'] == '0' ? 'selected' : '' ?>>Private</option>
                                                                        </select>
                                                                    </label>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                                    <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                    </div>
                </div>
                <!-- Page Main Content End -->
            </div>
        </div>
    </div>
    <!-- Footer View Start -->
    <?= $this->include('footer_view') ?>
    <!-- Footer View End -->

</body>

</html>