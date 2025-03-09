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


                <!-------------------------------------------------------------------------------Carousel Form -------------------------------------------------------------------------------------->


                <div class="card-box mb-30">
                    <div class="pd-20">
                        <h4 class="text-blue h4">Deleted Carousels</h4>
                    </div>
                    <div class="pb-20">
                        <table class="table hover data-table-export table-hover">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Selection Type</th>
                                    <th>Added By</th>
                                    <th>Deleted At</th>
                                    <th>Deleted By</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($carousels)): ?>
                                    <?php foreach ($carousels as $carousel): ?>
                                        <tr>
                                            <td><?= esc(substr($carousel['title'], 0, 50)) . (strlen($carousel['title']) > 50 ? '...' : '') ?>
                                            </td>
                                            <td><?= esc(substr($carousel['description'], 0, 20)) . (strlen($carousel['description']) > 20 ? '...' : '') ?>
                                            </td>
                                            <td><?= esc($carousel['selection_type']) ?></td>
                                            <td><?= esc($carousel['added_by_name'] ?? 'N/A') ?></td> <!-- Show Added By Name -->
                                            <td>
                                                <?= isset($carousel['deleted_at'])
                                                    ? esc(date('d/M/Y h:i A', strtotime($carousel['deleted_at'])))
                                                    : 'N/A' ?>
                                            </td>

                                            <td><?= esc($carousel['deleted_by_name'] ?? 'N/A') ?></td>
                                            <!-- Show Deleted By Name -->
                                            <td>
                                                <a class="dropdown-item" href="javascript:void(0);"
                                                    onclick="confirmCarouselRestore(<?= esc($carousel['id']) ?>)">
                                                    <i class="bi bi-recycle text-success" style="font-size: 22px;"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="7" class="text-center">No deleted carousels found.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>


                <!--------------------------------------------------------------------------------------------- Header Pages --------------------------------------------------------------------------------->

                <div class="card-box mb-30">
                    <div class="pd-20">
                        <h4 class="text-blue h4">Deleted Header Pages</h4>
                    </div>
                    <div class="pb-20">
                        <table class="table hover data-table-export table-hover">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Link</th>
                                    <th>Subtype</th>
                                    <th>Specific Item</th>
                                    <th>Added By</th>
                                    <th>Deleted At</th>
                                    <th>Deleted By</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($pages)): ?>
                                <?php foreach ($pages as $page): ?>
                                <tr>
                                    <td>
                                        <?= esc($page['title']) ?>
                                    </td>
                                    <td>
                                        <?= esc($page['link']) ?>
                                    </td>
                                    <td>
                                        <?= esc($page['subtype']) ?>
                                    </td>
                                    <td>
                                        <?= esc($page['specific_item']) ?>
                                    </td>
                                    <td>
                                        <?= esc($page['added_by_name'] ?? 'N/A') ?>
                                    </td> <!-- Show Added By Name -->
                                            <td>
                                                <?= isset($page['deleted_at'])
                                                    ? esc(date('d/M/Y h:i A', strtotime($page['deleted_at'])))
                                                    : 'N/A' ?>
                                            </td>

                                            <td><?= esc($page['deleted_by_name'] ?? 'N/A') ?></td> <!-- Show Deleted By Name -->
                                            <td>
                                                <a class="dropdown-item" href="javascript:void(0);"
                                                    onclick="confirmRestore(<?= esc($page['id']) ?>)">
                                                    <i class="bi bi-recycle text-success" style="font-size: 22px;"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="8" class="text-center">No deleted pages found.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>




                <!---------------------------------------------------------------------------------------- Marquee Text ----------------------------------------------------------------------------->

                <div class="card-box mb-30">
                    <div class="pd-20">
                        <h4 class="text-blue h4">Deleted Marquee Texts</h4>
                    </div>
                    <div class="pb-20">
                        <table class="table hover data-table-export table-hover">
                            <thead>
                                <tr>
                                    <th>Marquee Text</th>
                                    <th>Marquee Link</th>
                                    <th>Added By</th>
                                    <th>Deleted At</th>
                                    <th>Deleted By</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($marquees)): ?>
                                <?php foreach ($marquees as $marquee): ?>
                                <tr>
                                    <td>
                                        <?= esc(substr($marquee['marqueeText'], 0, 50)) . (strlen($marquee['marqueeText']) > 50 ? '...' : '') ?>
                                    </td>
                                    <td>
                                        <?= esc($marquee['marqueeText_link'] ?? 'N/A') ?>
                                    </td>
                                    <td>
                                        <?= esc($marquee['added_by_name'] ?? 'N/A') ?>
                                    </td> <!-- Show Added By Name -->
                                            <td>
                                                <?= isset($marquee['deleted_at'])
                                                    ? esc(date('d/M/Y h:i A', strtotime($marquee['deleted_at'])))
                                                    : 'N/A' ?>
                                            </td>
                                            <td><?= esc($marquee['deleted_by_name'] ?? 'N/A') ?></td>
                                            <!-- Show Deleted By Name -->
                                            <td>
                                                <a class="dropdown-item" href="javascript:void(0);"
                                                    onclick="confirmMarqueeRestore(<?= esc($marquee['id']) ?>)">
                                                    <i class="bi bi-recycle text-success" style="font-size: 22px;"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="6" class="text-center">No deleted marquee texts found.</td>
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
