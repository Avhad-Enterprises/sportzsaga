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
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Social Media Links</h4>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 text-right blogs-imex">
                            <div class="dropdown">
                                <a href="#" class="btn btn-primary fw-bold" data-toggle="modal" data-target="#Medium-modal" type="button">
                                    Add New
                                </a>
                                <div class="modal fade" id="Medium-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myLargeModalLabel">
                                                    Add New Social Media Link
                                                </h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                    ×
                                                </button>
                                            </div>
                                            <div class="modal-body text-left"> <!-- Ensures content is left-aligned -->
                                                <?= form_open('homecontrol/save_social_media_links') ?>
                                                <div class="form-group">
                                                    <label for="platformname">Platform Name</label>
                                                    <input type="text" class="form-control" id="platform_name" name="platform_name">
                                                </div>
                                                <div class="form-group">
                                                    <label for="link">Link</label>
                                                    <input type="text" class="form-control" id="platform_link" name="platform_link">
                                                </div>
                                                <div class="form-group">
                                                    <label for="icon">Add Icon (Fontawesome)
                                                        <a href="https://fontawesome.com/search" target="_blank">Click Here to Search Icons</a>
                                                    </label>
                                                    <input type="text" class="form-control" id="platform_icon_class" name="platform_icon_class" oninput="extractClass()">
                                                    <input type="hidden" class="form-control" id="platform_icon" name="platform_icon">
                                                </div>
                                                <button type="submit" class="btn btn-primary">Save</button>
                                                <?= form_close() ?>
                                            </div>
                                            <div class="modal-footer justify-content-left"> <!-- Aligns buttons to the left -->
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                    Close
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Page Main Content Start -->
                <div class="card-box mb-30">
                    <div class="pd-20">
                        <h4 class="text-blue h4">Control</h4>
                    </div>
                    <div class="pb-20">
                        <table id="datatable-responsive" class="table data-table-export table-hover" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Platform</th>
                                    <th>Link</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($socialMediaLinks as $link) : ?>
                                    <tr>
                                        <td><?= $link['id'] ?></td>
                                        <td><?= $link['platform'] ?></td>
                                        <td><?= $link['link'] ?></td>
                                        <td>
                                            <button 
                                                class="btn btn-primary btn-sm" 
                                                data-toggle="modal" 
                                                data-target="#Edit-modal" 
                                                onclick="populateEditModal('<?= $link['id'] ?>', '<?= $link['platform'] ?>', '<?= $link['link'] ?>', '<?= $link['icon'] ?>')">
                                                Edit
                                            </button>
                                             <button 
                                                class="btn btn-danger btn-sm" 
                                                onclick="confirmSocialMediaDelete('<?= $link['id'] ?>')">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Edit Modal -->
                <div class="modal fade" id="Edit-modal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="editModalLabel">
                                    Edit Social Media Link
                                </h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                    ×
                                </button>
                            </div>
                            <div class="modal-body text-left"> <!-- Ensures content is left-aligned -->
                                <?= form_open('homecontrol/update_social_media_link') ?>
                                <input type="hidden" id="edit_id" name="id"> <!-- Hidden field to store ID -->
                                <div class="form-group">
                                    <label for="platform_name">Platform Name</label>
                                    <input type="text" class="form-control" id="edit_platform_name" name="platform_name">
                                </div>
                                <div class="form-group">
                                    <label for="link">Link</label>
                                    <input type="text" class="form-control" id="edit_platform_link" name="platform_link">
                                </div>
                                <div class="form-group">
                                    <label for="icon">Add Icon (Fontawesome)
                                        <a href="https://fontawesome.com/search" target="_blank">Click Here to Search Icons</a>
                                    </label>
                                    <input type="text" class="form-control" id="edit_platform_icon_class" name="platform_icon_class" oninput="extractEditClass()">
                                    <input type="hidden" class="form-control" id="edit_platform_icon" name="platform_icon">
                                </div>
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                                <?= form_close() ?>
                            </div>
                            <div class="modal-footer justify-content-left"> <!-- Aligns buttons to the left -->
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                    Close
                                </button>
                            </div>
                        </div>
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
<script>
    function extractClass() {
        var fullInput = document.getElementById('platform_icon_class').value;
        var classPattern = /class="([^"]+)"/;
        var match = fullInput.match(classPattern);

        if (match) {
            var className = match[1]; // Extracted class names
            document.getElementById('platform_icon').value = className;
        } else {
            document.getElementById('platform_icon').value = ''; // Clear the hidden input if no match
        }
    }
</script>
<script>
function extractEditClass() {
    var fullInput = document.getElementById('edit_platform_icon_class').value;
    var classPattern = /class="([^"]+)"/;
    var match = fullInput.match(classPattern);

    if (match) {
        var className = match[1]; // Extracted class names
        document.getElementById('edit_platform_icon').value = className;
    } else {
        document.getElementById('edit_platform_icon').value = ''; // Clear the hidden input if no match
    }
}

// Function to populate edit modal fields
function populateEditModal(id, platform, link, icon) {
    document.getElementById('edit_id').value = id;
    document.getElementById('edit_platform_name').value = platform;
    document.getElementById('edit_platform_link').value = link;
    document.getElementById('edit_platform_icon_class').value = '<i class="' + icon + '"></i>';
    document.getElementById('edit_platform_icon').value = icon;
}
</script>

</html>