<!-- Head View Start -->
<?= $this->include('head_view') ?>
<!-- Head View End -->


<body class="dashboard-container">

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
	<!-- Left View Start -->
	<?= $this->include('left_view') ?>
	<!-- Left View Start -->

	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="xs-pd-20-10 pd-ltr-20">
			<div class="title pb-20">
				<h2 class="h3 mb-0">Sportzsaga Overview</h2>
			</div>
			<div class="card-box pd-20 height-100-p mb-30">
				<div class="row align-items-center">
					<div class="col-md-4">
						<img src="<?= base_url(); ?>vendors/images/banner-img.png" alt="" />
					</div>
					<div class="col-md-8">
						<h4 class="font-20 weight-500 mb-10 text-capitalize">
							Welcome back
							<div class="weight-600 font-30 text-blue"><?= session('admin_name') ?? 'User'; ?>!</div>
						</h4>
					</div>
				</div>
			</div>

			<!-- <div class="row pb-10">
				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">
						<div class="d-flex flex-wrap">
							<div class="widget-data">
								<div class="weight-700 font-24 text-dark"><?= $publicproducts ?></div>
								<div class="font-14 text-secondary weight-500">
									Products
								</div>
							</div>
							<div class="widget-icon">
								<div class="icon" data-color="#00eccf">
									<i class="fa-solid fa-cart-shopping"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">
						<div class="d-flex flex-wrap">
							<div class="widget-data">
								<div class="weight-700 font-24 text-dark"><?= $ordercounts ?></div>
								<div class="font-14 text-secondary weight-500">
									Orders
								</div>
							</div>
							<div class="widget-icon">
								<div class="icon" data-color="#ff5b5b">
									<span><i class="fa-solid fa-cart-arrow-down"></i></span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">
						<div class="d-flex flex-wrap">
							<div class="widget-data">
								<div class="weight-700 font-24 text-dark">400+</div>
								<div class="font-14 text-secondary weight-500">
									Orders Fulfilled
								</div>
							</div>
							<div class="widget-icon">
								<div class="icon">
									<i class="fa-solid fa-truck-fast"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">
						<div class="d-flex flex-wrap">
							<div class="widget-data">
								<div class="weight-700 font-24 text-dark"><?= $blogCount ?></div>
								<div class="font-14 text-secondary weight-500">Blogs</div>
							</div>
							<div class="widget-icon">
								<div class="icon" data-color="#09cc06">
									<i class="fa-solid fa-newspaper"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row pb-10">
				<div class="col-md-8 mb-20">
					<div class="card-box height-100-p pd-20">
						<div class="d-flex flex-wrap justify-content-between align-items-center pb-0 pb-md-3">
							<div class="h5 mb-md-0">Hospital Activities</div>
							<div class="form-group mb-md-0">
								<select class="form-control form-control-sm selectpicker">
									<option value="">Last Week</option>
									<option value="">Last Month</option>
									<option value="">Last 6 Month</option>
									<option value="">Last 1 year</option>
								</select>
							</div>
						</div>
						<div id="activities-chart"></div>
					</div>
				</div>
				<div class="col-md-4 mb-20">
					<div class="card-box min-height-200px pd-20 mb-20" data-bgcolor="#455a64">
						<div class="d-flex justify-content-between pb-20 text-white">
							<div class="icon h1 text-white">
								<i class="bi bi-graph-up-arrow"></i>
							</div>
							<div class="font-14 text-right">
								<div><i class="fa-solid fa-arrow-trend-up"></i> 2.69%</div>
							</div>
						</div>
						<div class="d-flex justify-content-between align-items-end">
							<div class="text-white">
								<div class="font-14">New Users</div>
								<div class="font-24 weight-500">1865</div>
							</div>
							<div class="max-width-150">
								<div id="appointment-chart"></div>
							</div>
						</div>
					</div>
					<div class="card-box min-height-200px pd-20" data-bgcolor="#265ed7">
						<div class="d-flex justify-content-between pb-20 text-white">
							<div class="icon h1 text-white">
								<i class="bi bi-graph-up-arrow"></i>
							</div>
							<div class="font-14 text-right">
								<div><i class="fa-solid fa-arrow-trend-up"></i> 3.69%</div>
								<div class="font-12">Users In Last 30 Minutes</div>
							</div>
						</div>
						<div class="d-flex justify-content-between align-items-end">
							<div class="text-white">
								<div class="font-14">Users</div>
								<div class="font-24 weight-500">250</div>
							</div>
							<div class="max-width-150">
								<div id="surgery-chart"></div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-4 col-md-6 mb-20">
					<div class="card-box height-100-p pd-20 min-height-200px">
						<div class="d-flex justify-content-between pb-10">
							<div class="h5 mb-0">Top Doctors</div>
							<div class="dropdown">
								<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" data-color="#1b3133" href="#" role="button" data-toggle="dropdown">
									<i class="dw dw-more"></i>
								</a>
								<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
									<a class="dropdown-item" href="#"><i class="dw dw-eye"></i> View</a>
									<a class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Edit</a>
									<a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i> Delete</a>
								</div>
							</div>
						</div>
						<div class="user-list">
							<ul>
								<li class="d-flex align-items-center justify-content-between">
									<div class="name-avatar d-flex align-items-center pr-2">
										<div class="avatar mr-2 flex-shrink-0">
											<img src="vendors/images/photo1.jpg" class="border-radius-100 box-shadow" width="50" height="50" alt="" />
										</div>
										<div class="txt">
											<span class="badge badge-pill badge-sm" data-bgcolor="#e7ebf5" data-color="#265ed7">4.9</span>
											<div class="font-14 weight-600">Dr. Neil Wagner</div>
											<div class="font-12 weight-500" data-color="#b2b1b6">
												Pediatrician
											</div>
										</div>
									</div>
									<div class="cta flex-shrink-0">
										<a href="#" class="btn btn-sm btn-outline-primary">Schedule</a>
									</div>
								</li>
								<li class="d-flex align-items-center justify-content-between">
									<div class="name-avatar d-flex align-items-center pr-2">
										<div class="avatar mr-2 flex-shrink-0">
											<img src="vendors/images/photo2.jpg" class="border-radius-100 box-shadow" width="50" height="50" alt="" />
										</div>
										<div class="txt">
											<span class="badge badge-pill badge-sm" data-bgcolor="#e7ebf5" data-color="#265ed7">4.9</span>
											<div class="font-14 weight-600">Dr. Ren Delan</div>
											<div class="font-12 weight-500" data-color="#b2b1b6">
												Pediatrician
											</div>
										</div>
									</div>
									<div class="cta flex-shrink-0">
										<a href="#" class="btn btn-sm btn-outline-primary">Schedule</a>
									</div>
								</li>
								<li class="d-flex align-items-center justify-content-between">
									<div class="name-avatar d-flex align-items-center pr-2">
										<div class="avatar mr-2 flex-shrink-0">
											<img src="vendors/images/photo3.jpg" class="border-radius-100 box-shadow" width="50" height="50" alt="" />
										</div>
										<div class="txt">
											<span class="badge badge-pill badge-sm" data-bgcolor="#e7ebf5" data-color="#265ed7">4.9</span>
											<div class="font-14 weight-600">Dr. Garrett Kincy</div>
											<div class="font-12 weight-500" data-color="#b2b1b6">
												Pediatrician
											</div>
										</div>
									</div>
									<div class="cta flex-shrink-0">
										<a href="#" class="btn btn-sm btn-outline-primary">Schedule</a>
									</div>
								</li>
								<li class="d-flex align-items-center justify-content-between">
									<div class="name-avatar d-flex align-items-center pr-2">
										<div class="avatar mr-2 flex-shrink-0">
											<img src="vendors/images/photo4.jpg" class="border-radius-100 box-shadow" width="50" height="50" alt="" />
										</div>
										<div class="txt">
											<span class="badge badge-pill badge-sm" data-bgcolor="#e7ebf5" data-color="#265ed7">4.9</span>
											<div class="font-14 weight-600">Dr. Callie Reed</div>
											<div class="font-12 weight-500" data-color="#b2b1b6">
												Pediatrician
											</div>
										</div>
									</div>
									<div class="cta flex-shrink-0">
										<a href="#" class="btn btn-sm btn-outline-primary">Schedule</a>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 mb-20">
					<div class="card-box height-100-p pd-20 min-height-200px">
						<div class="d-flex justify-content-between">
							<div class="h5 mb-0">Diseases Report</div>
							<div class="dropdown">
								<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" data-color="#1b3133" href="#" role="button" data-toggle="dropdown">
									<i class="dw dw-more"></i>
								</a>
								<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
									<a class="dropdown-item" href="#"><i class="dw dw-eye"></i> View</a>
									<a class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Edit</a>
									<a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i> Delete</a>
								</div>
							</div>
						</div>

						<div id="diseases-chart"></div>
					</div>
				</div>
				<div class="col-lg-4 col-md-12 mb-20">
					<div class="card-box height-100-p pd-20 min-height-200px">
						<div class="max-width-300 mx-auto">
							<img src="vendors/images/upgrade.svg" alt="" />
						</div>
						<div class="text-center">
							<div class="h5 mb-1">Upgrade to Pro</div>
							<div class="font-14 weight-500 max-width-200 mx-auto pb-20" data-color="#a6a6a7">
								You can enjoy all our features by upgrading to pro.
							</div>
							<a href="#" class="btn btn-primary btn-lg">Upgrade</a>
						</div>
					</div>
				</div>
			</div>

			<div class="card-box pb-10">
				<div class="h5 pd-20 mb-0">Recent Blogs</div>
				<table class="data-table table nowrap">
					<thead>
						<tr>
							<th class="table-plus">Title</th>
							<th>Description</th>
							<th>Tags</th>
							<th>Category</th>
							<th>Publish</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($posts as $post) : ?>
							<tr>
								<td><?= $post['blog_title'] ?></td>
								<td class="truncate-text"><?= substr($post['blog_description'], 0, 25) . (strlen($post['blog_description']) > 25 ? '...' : '') ?></td>
								<td>
									<span class="badge badge-pill" data-bgcolor="#e7ebf5" data-color="#265ed7"><?= $post['blog_tags'] ?></span>
								</td>
								<td><?= $post['category'] ?></td>
								<td><?= $post['publish_date_and_time'] ?></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>

			<div class="card-box card-box-products pb-10">
				<div class="h5 pd-20 mb-0">Recent Products</div>
				<table class="data-table table nowrap">
					<thead>
						<tr>
							<th class="table-plus">Title</th>
							<th>Price</th>
							<th>Tags</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($products as $product) : ?>
							<tr>
								<td class="table-plus">
									<div class="name-avatar d-flex align-items-center">
										<div class="avatar mr-2 flex-shrink-0">
											<img src="<?= base_url('uploads/' . ($product['product_image'])) ?>" class="border-radius-100 shadow" width="40" height="40" alt="" />
										</div>
										<div class="txt">
											<div class="weight-600"><?= $product['product_title'] ?></div>
										</div>
									</div>
								</td>
								<td><?= $product['cost_price'] ?></td>
								<td>
									<span class="badge badge-pill" data-bgcolor="#e7ebf5" data-color="#265ed7"><?= $product['product_tags'] ?></span>
								</td>
								<td><?= $product['product_status'] ?></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>

			<div class="title pb-20 pt-20">
				<h2 class="h3 mb-0">Quick Start</h2>
			</div>

			<div class="row">
				<div class="col-md-4 mb-20">
					<a href="#" class="card-box d-block mx-auto pd-20 text-secondary">
						<div class="img pb-30">
							<img src="vendors/images/medicine-bro.svg" alt="" />
						</div>
						<div class="content">
							<h3 class="h4">Services</h3>
							<p class="max-width-200">
								We provide superior health care in a compassionate maner
							</p>
						</div>
					</a>
				</div>
				<div class="col-md-4 mb-20">
					<a href="#" class="card-box d-block mx-auto pd-20 text-secondary">
						<div class="img pb-30">
							<img src="vendors/images/remedy-amico.svg" alt="" />
						</div>
						<div class="content">
							<h3 class="h4">Medications</h3>
							<p class="max-width-200">
								Look for prescription and over-the-counter drug information.
							</p>
						</div>
					</a>
				</div>
				<div class="col-md-4 mb-20">
					<a href="#" class="card-box d-block mx-auto pd-20 text-secondary">
						<div class="img pb-30">
							<img src="vendors/images/paper-map-cuate.svg" alt="" />
						</div>
						<div class="content">
							<h3 class="h4">Locations</h3>
							<p class="max-width-200">
								Convenient locations when and where you need them.
							</p>
						</div>
					</a>
				</div>
			</div> -->
		</div>
	</div>

	<!-- Footer View Start -->
	<?= $this->include('footer_view') ?>
	<!-- Footer View End -->

</body>

</html>