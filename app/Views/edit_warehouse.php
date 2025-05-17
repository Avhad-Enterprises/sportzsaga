<!-- Head View Start -->
<?= $this->include('head_view') ?>
<!-- Head View End -->

<style>
    .serp-preview {
        border: 1px solid #e0e0e0;
        padding: 10px;
        background-color: #f8f9fa;
        font-family: Arial, sans-serif;
    }

    .serp-url {
        color: #1a0dab;
        font-size: 14px;
        text-decoration: none;
    }

    .serp-title {
        color: #1a0dab;
        font-size: 18px;
        margin: 5px 0;
    }

    .serp-description {
        color: #4d5156;
        font-size: 13px;
        line-height: 1.4;
    }
</style>

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

                <form action="<?= base_url('warehouse/update/' . $warehouse['id']) ?>" method="post">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <div>
                            <i class="fa-solid fa-arrow-left" onclick="goBack()"></i>
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="pd-20 card-box mb-30">
                                <h5 class="mb-30">Edit Warehouse</h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="warehouse_name">Warehouse Name</label>
                                            <input type="text" id="warehouse_name" name="warehouse_name" class="form-control" value="<?= esc($warehouse['name']) ?>" placeholder="e.g. Central Warehouse" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="manager">Warehouse Manager</label>
                                            <input type="text" id="manager" name="manager" class="form-control" value="<?= esc($warehouse['manager']) ?>" placeholder="e.g. John Doe">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="storage_capacity">Storage Capacity (Units)</label>
                                            <input type="number" id="storage_capacity" name="storage_capacity" class="form-control" value="<?= esc($warehouse['storage_capacity']) ?>" placeholder="Total Units" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="floor_area">Floor Area (sq. meters)</label>
                                            <input type="number" id="floor_area" name="floor_area" class="form-control" value="<?= esc($warehouse['floor_area']) ?>" placeholder="Area in m²">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="pallet_capacity">Pallet Capacity</label>
                                            <input type="number" id="pallet_capacity" name="pallet_capacity" class="form-control" value="<?= esc($warehouse['pallet_capacity']) ?>" placeholder="Pallet Count">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="pincode">Pincode</label>
                                            <input type="text" id="pincode" name="pincode" class="form-control" value="<?= esc($warehouse['pincode']) ?>" placeholder="Postal Code">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <textarea id="address" name="address" class="form-control" rows="3" placeholder="Enter full address (e.g., Building, Street, City, State, Country)"><?= esc($warehouse['address']) ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="pd-20 card-box mb-30">
                                <h5 class="mb-30">Status</h5>
                                <div class="form-group">
                                    <select id="status" name="status" class="form-control" required>
                                        <option value="active" <?= $warehouse['status'] === 'active' ? 'selected' : '' ?>>Active</option>
                                        <option value="inactive" <?= $warehouse['status'] === 'inactive' ? 'selected' : '' ?>>Inactive</option>
                                    </select>
                                </div>
                            </div>

                            <div class="pd-20 card-box mb-30">
                                <h5 class="mb-30">Contact</h5>
                                <div class="form-group">
                                    <label for="contact_number">Contact Number</label>
                                    <input type="tel" id="contact_number" name="contact_number" class="form-control" value="<?= esc($warehouse['contact_number']) ?>" placeholder="e.g. +91-XXXXXXXXXX" required>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email Address</label>
                                    <input type="email" id="email" name="email" class="form-control" value="<?= esc($warehouse['email']) ?>" placeholder="e.g. email@example.com" required>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <?php
                                        // Split opening hours into 'from' and 'to'
                                        $hours = explode(' to ', $warehouse['opening_hours'], 2);
                                        $from = $hours[0] ?? '';
                                        $to = $hours[1] ?? '';
                                        ?>
                                        <div class="form-group">
                                            <label for="opening_hours_from">Opening Hours (From)</label>
                                            <input type="time" id="opening_hours_from" name="opening_hours_from" class="form-control" value="<?= esc($from) ?>" required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="opening_hours_to">Opening Hours (To)</label>
                                            <input type="time" id="opening_hours_to" name="opening_hours_to" class="form-control" value="<?= esc($to) ?>" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- Page Main Content End -->

    <!-- Footer View Start -->
    <?= $this->include('footer_view') ?>
    <!-- Footer View End -->

</body>

</html>