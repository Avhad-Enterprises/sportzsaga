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
                <div class="pd-20 card-box mb-30">
                    <div class="clearfix">
                        <div class="pull-left">
                            <h4 class="text-blue h4">Invite</h4>
                            <p class="mb-30">Invite Employee</p>
                        </div>
                    </div>
                    <form id="inviteForm" method="post" action="<?= base_url('sendinvitedata') ?>" class="validation">
                        <!-- Toggle for Employee/Seller -->
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Invite Type</label>
                            <div class="col-sm-6 col-md-6">
                                <select class="form-control validate-required " name="invite_type" id="inviteType">
                                    <option value="" selected>Select Invite Type</option>
                                    <option value="employee">Employee</option>
                                    <option value="seller">Seller</option>
                                </select>
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please select an invite type.</div>
                            </div>
                        </div>
                    
                        <!-- Employee Fields -->
                        <div id="employeeFields" style="display: none;">
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Enter Name</label>
                                <div class="col-sm-6 col-md-6">
                                    <input class="form-control validate-required " name="name" type="text" placeholder="Johnny Brown" />
                                </div>
                            </div>
                    
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Enter Email</label>
                                <div class="col-sm-6 col-md-6">
                                    <input class="form-control validate-required " name="invite_email" type="email" placeholder="johnnybrown43@gmail.com" />
                                </div>
                            </div>
                    
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Select Department</label>
                                <div class="col-sm-6 col-md-6">
                                    <select class="custom-select2 form-control validate-required " name="department" style="width: 100%; height: 38px">
                                        <option value="" selected>Select Department</option>
                                        <optgroup label="Departments">
                                            <option value="marketing-department">Marketing Department</option>
                                            <option value="software-department">Software Department</option>
                                            <option value="business-research-and-development-department">Business Research and Development Department</option>
                                            <option value="finance-manager-department">Finance Manager Department</option>
                                            <option value="e-commerce-department">E-commerce Department</option>
                                            <option value="design-department">Design Department</option>
                                            <option value="hr-and-legal-department">HR and Legal Department</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                    
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Select Job Title</label>
                                <div class="col-sm-6 col-md-6">
                                    <select class="custom-select2 form-control validate-required " name="job_title" style="width: 100%; height: 38px">
                                        <option value="" selected>Select Job Title</option>
                                        <optgroup label="Departments">
                                            <option value="manager">Manager</option>
                                            <option value="developer">Developer</option>
                                            <option value="analyst">Analyst</option>
                                            <option value="designer">Designer</option>
                                            <option value="hr_specialist">HR Specialist</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                    
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Select Roles or Permissions</label>
                                <div class="col-sm-6 col-md-6">
                                    <select class="custom-select2 form-control validate-required " name="roles" style="width: 100%; height: 38px">
                                        <option value="" selected>Select Role</option>
                                        <option value="admin">Admin</option>
                                        <option value="editor">Editor</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    
                        <!-- Seller Fields -->
                        <div id="sellerFields" style="display: none;">
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Enter Brand Name</label>
                                <div class="col-sm-6 col-md-6">
                                    <input class="form-control validate-required " name="brand_name" type="text" placeholder="Brand Name" />
                                </div>
                            </div>
                    
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Enter Seller Name</label>
                                <div class="col-sm-6 col-md-6">
                                    <input class="form-control validate-required " name="seller_name" type="text" placeholder="Seller Name" />
                                </div>
                            </div>
                    
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Enter Seller Email</label>
                                <div class="col-sm-6 col-md-6">
                                    <input class="form-control validate-required " name="email" type="email" placeholder="seller@example.com" />
                                </div>
                            </div>
                        </div>
                    
                        <div class="form-group row">
                            <div class="col-sm-12 col-md-10">
                                <button type="submit" class="btn btn-lg btn-primary validate-required ">Send Invite</button>
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
        
        
        <script>
            // Initialize the form validator
            new FormValidator('#inviteForm', {
                onSuccess: (form) => {
                    console.log('Form is valid. Submitting...');
                    form.submit();
                },
            });
        </script>
        
        
</body>

</html>