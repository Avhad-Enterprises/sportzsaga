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
                                <h4>BlueDart</h4>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 text-right blogs-imex">
                            <div style="display: none" class="dropdown">
                                <a class="btn btn-primary fw-bold" href="<?= base_url(); ?>ordermanagement/addneworder" role="button">
                                    Create Order
                                </a>
                            </div>
                            <div class="dropdown">
                                <a class="btn btn-primary fw-bold" href="<?= base_url(); ?>bluedart_management/importShipmentfromexcel" role="button">
                                    Import
                                </a>
                            </div>
                            <div class="dropdown">
                                <a class="btn btn-primary fw-bold" href="<?= base_url(); ?>bluedart_management/exportShiptoexcel" role="button">
                                    Export To Excel
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Page Main Content Start -->

                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item p-1">
                        <a class="nav-link btn-primary border border-secondary active" id="pills-manage-tab" data-toggle="pill" href="#pills-manage" role="tab" aria-controls="pills-manage" aria-selected="true">Shipments</a>
                    </li>
                    <li class="nav-item p-1">
                        <a class="nav-link btn-primary border border-secondary" id="pills-order-tab" data-toggle="pill" href="#pills-order" role="tab" aria-controls="pills-order" aria-selected="false">Labels</a>
                    </li>
                    <li class="nav-item p-1">
                        <a class="nav-link btn-primary border border-secondary" id="pills-trackbluedart-tab" data-toggle="pill" href="#pills-trackbluedart" role="tab" aria-controls="pills-trackbluedart" aria-selected="false">Track Order</a>
                    </li>
                    <li style="display: none" class="nav-item p-1">
                        <a class="nav-link btn-primary border border-secondary" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-manage" role="tabpanel" aria-labelledby="pills-manage-tab">
                        <div class="card-box mb-30">
                            <div class="pd-20 row">
                                <div class="col-3">
                                    <h4 class="text-blue h4">Manage Shipments</h4>
                                </div>
                                <div class="col d-flex justify-content-end">
                                    <button type="button" class="btn btn-primary mr-3" id="createSelectedShipments">
                                        Create Shipment
                                        <span id="loader" class="loader" style="display: none;"></span>
                                    </button>
                                    
                                    <button type="button" class="btn btn-success mr-2" id="saveChanges">
                                        Save
                                        <span id="saveLoader" class="loader" style="display: none;"></span>
                                    </button>
                                </div>
                            </div>
                            <div class="pb-20">
                                <table id="manage-table" class="table dataTable hover max-width nowrap data-table-export">
                                    <thead>
                                        <tr>
                                            <th class="dt-body-center">
                                                <div class="dt-checkbox">
                                                    <input type="checkbox" name="select_all" value="1" id="select-all-Bluedartrequest">
                                                    <span class="dt-checkbox-label"></span>
                                                </div>
                                            </th>
                                            <th class="table-plus">Order No.</th>
                                            <th>Order Date</th>
                                            <th>Customer details</th>
                                            <th>Product Details</th>
                                            <th>Payment</th>
                                            <th>Pickup Location</th>
                                            <th>Invoice Ammount</th>
                                            <th style="min-width: 230px">Select Package</th>
                                            <th>Length (cm)</th>
                                            <th>Breadth (cm)</th>
                                            <th>Height (cm)</th>
                                            <th>Weight (kg)</th>
                                            <th>Product Code</th>
                                            <th>Sub Product Code</th>
                                            <th>Billing Address</th>
                                            <th>Billing Pincode</th>
                                            <th>Pickup Date</th>
                                            <th>Product Type</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($shipments as $shipment) : ?>
                                            <tr>
                                                <td class="dt-body-center" tabindex="0">
                                                    <div class="dt-checkbox">
                                                        <input type="checkbox" class="Bluedartrequest-ordercheckbox" name="selected_shipments[]" value="<?= $shipment['order_shipment_id'] ?>">
                                                        <span class="dt-checkbox-label"> </span>
                                                    </div>
                                                </td>
                                                <td><?= $shipment['order_number'] ?></td>
                                                <td><?php $date = new DateTime($shipment['order_date']);
                                                    echo $date->format('d-F-Y h:i A'); ?></td>
                                                <td><a class="b_line" href=""><?= $shipment['billing_customer_name'] ?></a></td>
                                                <td>
                                                    <?php
                                                    $order_items = json_decode($shipment['order_items'], true);
                                                    $total_quantity = array_sum(array_column($order_items, 'quantity'));
                                                    ?>
                                                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <?= $total_quantity ?> Item(s)
                                                    </button>
                                                    <div id="product-details-<?= $shipment['order_shipment_id'] ?>" class="dropdown-menu">
                                                        <?php foreach ($order_items as $item): ?>
                                                            <div class="dropdown-item" style="display: flex; align-items: center;">
                                                                <?php if (!empty($item['product_image'])): ?>
                                                                    <img class="border-radius-100 shadow" src="<?= base_url('uploads/' . $item['product_image']) ?>" width="30" height="30" alt="<?= $item['product_title'] ?>">
                                                                <?php endif; ?>
                                                                <p style="font-weight: 700; font-size: small; padding: 5px; margin: auto 10px; ">
                                                                    <?= $item['product_title'] ?>
                                                                </p>
                                                                <div style="margin-left: auto; display: flex; gap: 10px;">
                                                                    <p>Qty: <?= $item['quantity'] ?></p>
                                                                </div>
                                                            </div>
                                                        <?php endforeach; ?>
                                                    </div>
                                                </td>
                                                <td><?= $shipment['payment_method'] ?></td>
                                                <td>
                                                    <select name="pickup_location[<?= $shipment['order_shipment_id'] ?>]" class="form-control bulk-edit" data-field="pickup_location">
                                                        <?php foreach ($warehouse_locations as $location): ?>
                                                            <option value="<?= $location['pickup_location'] ?>" <?= ($shipment['pickup_location'] == $location['pickup_location']) ? 'selected' : '' ?>>
                                                                <?= $location['pickup_location'] ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </td>
                                                <td>₹<?= $shipment['total'] ?> <input type="hidden" value="<?= $shipment['total'] ?>" name="total[<?= $shipment['order_shipment_id'] ?>]"></td>
                                                <td style="min-width: 230px">
                                                    <div class="input-group">
                                                        <select class="form-control package-type-dropdown rounded" name="package_type[<?= $shipment['order_shipment_id'] ?>]" data-shipment-id="<?= $shipment['order_shipment_id'] ?>">
                                                            <option value="single" <?= ($shipment['no_of_packages'] <= 1) ? 'selected' : '' ?>>Single-Package</option>
                                                            <option value="multi" <?= ($shipment['no_of_packages'] > 1) ? 'selected' : '' ?>>Multi-Package</option>
                                                        </select>
                                                        <input type="number" 
                                                            class="form-control num-packages" 
                                                            name="num_packages[<?= $shipment['order_shipment_id'] ?>]" 
                                                            placeholder="No. of Packages" 
                                                            min="1" 
                                                            value="<?= $shipment['no_of_packages'] > 1 ? $shipment['no_of_packages'] : '' ?>" 
                                                            style="<?= $shipment['no_of_packages'] > 1 ? '' : 'display: none;' ?>" 
                                                            data-shipment-id="<?= $shipment['order_shipment_id'] ?>">
                                                    </div>
                                                </td>
                                                <td id="dimensions-length-<?= $shipment['order_shipment_id'] ?>">
                                                    <?php 
                                                    // Ensure $shipment['length'] is an array
                                                    $lengths = is_array($shipment['length']) ? $shipment['length'] : json_decode($shipment['length'], true);

                                                    if ($shipment['no_of_packages'] > 1 && is_array($lengths)):
                                                        foreach ($lengths as $index => $length): ?>
                                                            <input type="number" 
                                                                class="form-control dimension-input" 
                                                                name="length[<?= $shipment['order_shipment_id'] ?>][]" 
                                                                value="<?= $length ?>" 
                                                                placeholder="Length (cm)" 
                                                                min="0" 
                                                                step="0.1" 
                                                                style="margin-bottom: 5px;">
                                                        <?php endforeach; 
                                                    else: ?>
                                                        <input type="number" 
                                                            class="form-control dimension-input" 
                                                            name="length[<?= $shipment['order_shipment_id'] ?>]" 
                                                            value="<?= $shipment['length'] ?>" 
                                                            placeholder="Length (cm)" 
                                                            min="0" 
                                                            step="0.1">
                                                    <?php endif; ?>
                                                </td>
                                                <td id="dimensions-breadth-<?= $shipment['order_shipment_id'] ?>">
                                                    <?php
                                                    // Ensure $breadths is correctly processed
                                                    $breadths = is_array($shipment['breadth']) ? $shipment['breadth'] : json_decode($shipment['breadth'], true);

                                                    if ($shipment['no_of_packages'] > 1 && is_array($breadths)):
                                                        foreach ($breadths as $index => $breadth): ?>
                                                            <input type="number" 
                                                                class="form-control dimension-input" 
                                                                name="breadth[<?= $shipment['order_shipment_id'] ?>][]" 
                                                                value="<?= $breadth ?>" 
                                                                placeholder="Breadth (cm)" 
                                                                min="0" 
                                                                step="0.1" 
                                                                style="margin-bottom: 5px;">
                                                        <?php endforeach; 
                                                    else: ?>
                                                        <input type="number" 
                                                            class="form-control dimension-input" 
                                                            name="breadth[<?= $shipment['order_shipment_id'] ?>]" 
                                                            value="<?= $shipment['breadth'] ?>" 
                                                            placeholder="Breadth (cm)" 
                                                            min="0" 
                                                            step="0.1">
                                                    <?php endif; ?>
                                                </td>

                                                <td id="dimensions-height-<?= $shipment['order_shipment_id'] ?>">
                                                    <?php
                                                    // Ensure $heights is correctly processed
                                                    $heights = is_array($shipment['height']) ? $shipment['height'] : json_decode($shipment['height'], true);

                                                    if ($shipment['no_of_packages'] > 1 && is_array($heights)):
                                                        foreach ($heights as $index => $height): ?>
                                                            <input type="number" 
                                                                class="form-control dimension-input" 
                                                                name="height[<?= $shipment['order_shipment_id'] ?>][]" 
                                                                value="<?= $height ?>" 
                                                                placeholder="Height (cm)" 
                                                                min="0" 
                                                                step="0.1" 
                                                                style="margin-bottom: 5px;">
                                                        <?php endforeach; 
                                                    else: ?>
                                                        <input type="number" 
                                                            class="form-control dimension-input" 
                                                            name="height[<?= $shipment['order_shipment_id'] ?>]" 
                                                            value="<?= $shipment['height'] ?>" 
                                                            placeholder="Height (cm)" 
                                                            min="0" 
                                                            step="0.1">
                                                    <?php endif; ?>
                                                </td>

                                                <td id="dimensions-weight-<?= $shipment['order_shipment_id'] ?>">
                                                    <?php
                                                    // Ensure $weights is correctly processed
                                                    $weights = is_array($shipment['weight']) ? $shipment['weight'] : json_decode($shipment['weight'], true);

                                                    if ($shipment['no_of_packages'] > 1 && is_array($weights)):
                                                        foreach ($weights as $index => $weight): ?>
                                                            <input type="number" 
                                                                class="form-control dimension-input" 
                                                                name="weight[<?= $shipment['order_shipment_id'] ?>][]" 
                                                                value="<?= $weight ?>" 
                                                                placeholder="Weight (kg)" 
                                                                min="0" 
                                                                step="0.1" 
                                                                style="margin-bottom: 5px;">
                                                        <?php endforeach; 
                                                    else: ?>
                                                        <input type="number" 
                                                            class="form-control dimension-input" 
                                                            name="weight[<?= $shipment['order_shipment_id'] ?>]" 
                                                            value="<?= $shipment['weight'] ?>" 
                                                            placeholder="Weight (kg)" 
                                                            min="0" 
                                                            step="0.1">
                                                    <?php endif; ?>
                                                </td>


                                                <td>
                                                    <select name="ProductCode[<?= $shipment['order_shipment_id'] ?>]" class="form-control bulk-edit" data-field="ProductCode">
                                                        
                                                        <option value="E" <?= ($shipment['ProductCode'] == 'E') ? 'selected' : '' ?>>Ground</option>
                                                        <option value="A" <?= ($shipment['ProductCode'] == 'A') ? 'selected' : '' ?>>Air</option>
                                                    </select>
                                                </td>
                                                <td style="min-width: 230px">
                                                    <div class="input-group">
                                                        <select class="form-control payment-method-dropdown rounded" name="SubProductCode[<?= $shipment['order_shipment_id'] ?>]" data-field="SubProductCode" data-shipment-id="<?= $shipment['order_shipment_id'] ?>">
                                                            <option value="P" <?= ($shipment['SubProductCode'] === 'P') ? 'selected' : '' ?>>Prepaid</option>
                                                            <option value="C" <?= ($shipment['SubProductCode'] === 'C') ? 'selected' : '' ?>>COD</option>
                                                        </select>

                                                        <input type="number" 
                                                            class="form-control collectable-amount" 
                                                            name="collectable_amount[<?= $shipment['order_shipment_id'] ?>]" 
                                                            placeholder="Collectable Amount" 
                                                             
                                                            value="<?= $shipment['SubProductCode'] === 'C' ? $shipment['collectable_amount'] : '' ?>" 
                                                            style="<?= $shipment['SubProductCode'] === 'C' ? '' : 'display: none;' ?>" 
                                                            data-shipment-id="<?= $shipment['order_shipment_id'] ?>">
                                                    </div>
                                                </td>
                                                <td style="max-width: 435px;"><input type="text" style="width: max-content;" class="form-control" name="billing_address[<?= $shipment['order_shipment_id'] ?>]" value="<?= $shipment['billing_address'] ?? '' ?>"></td>
                                                <td><input type="text" class="form-control" name="billing_pincode[<?= $shipment['order_shipment_id'] ?>]" value="<?= $shipment['billing_pincode'] ?? '' ?>"></td>
                                                <td>
                                                    <input type="datetime-local" class="form-control bulk-edit" name="PickupDate[<?= $shipment['order_shipment_id'] ?>]" value="<?= $shipment['PickupDate'] ?? '' ?>" data-field="PickupDate">
                                                </td>
                                                <td>
                                                    <select name="ProductType[<?= $shipment['order_shipment_id'] ?>]" class="form-control bulk-edit" data-field="ProductType">
                                                        <option value="1" <?= ($shipment['ProductType'] == '1') ? 'selected' : '' ?>>Parcel</option>
                                                        <option value="2" <?= ($shipment['ProductType'] == '2') ? 'selected' : '' ?>>Document</option>
                                                    </select>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-order" role="tabpanel" aria-labelledby="pills-order-tab">
                        <div class="modal fade" id="pdfModal" tabindex="-1" role="dialog">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Shipping Label</h5>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <iframe id="pdfFrame" width="100%" height="600px" frameborder="0"></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-box mb-30">
                            <div class="pd-20 row">
                                <div class="col">
                                    <h4 class="text-blue h4">Shipment Orders</h4>
                                    <div class="col-5 p-0">
                                        <select id="shipmentStatusFilter" class="form-control">
                                            <option value="Fulfilled" selected>Fulfilled Shipments</option>
                                            <option value="All">All Shipments</option>
                                            <option value="cancelled">Cancelled Shipments</option>
                                            <option value="delivered">Delivered Shipments</option>
                                            <option value="returned">Returned Shipments</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col d-flex justify-content-end">
                                    <button id="printSelectedLabels" class="btn btn-success mb-3 mr-2">
                                        Print
                                    </button>
                                    <button id="cancelBluedartRequests" class="btn btn-danger mb-3 mr-2">
                                        Cancel Shipment
                                        <span id="cancelBluedartloader" class="loader" style="display: none;"></span>
                                    </button>
                                </div>
                            </div>
                            <div class="pb-20">
                                <table class="table dataTable hover max-width nowrap data-table-export shipment-data-table-export">
                                    <thead>
                                        <tr>
                                            <th class="dt-body-center">
                                                <div class="dt-checkbox">
                                                    <input type="checkbox" name="select_all_id" value="1" id="select-all-Bluedartshipment">
                                                    <span class="dt-checkbox-label"></span>
                                                </div>
                                            </th>
                                            <th>Order No.</th>
                                            <th>Tracking ID</th>
                                            <th>Customer Name</th>
                                            <th>Invoice Ammount</th>
                                            <th>Payment Method</th>
                                            <th>Payment Method</th>
                                            <th>Status</th>
                                            <th>Created At</th>
                                            <th>Products</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($bluedart_orders as $order) : ?>
                                            <tr>
                                                <td class="dt-body-center" tabindex="0">
                                                    <div class="dt-checkbox">
                                                        <input type="checkbox" class="Bluedartshipment-ordercheckbox" name="selected_shipments_id[]" value="<?= $order['tracking_id'] ?>">
                                                        <span class="dt-checkbox-label"> </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="#" class="view-pdf" data-pdf="<?= $order['label'] ?>"><?= $order['order_number'] ?></a>
                                                </td>
                                                <td><?= $order['tracking_id'] ?></td>
                                                <td><?= $order['billing_customer_name'] ?></td>
                                                <td>₹<?= $order['total'] ?></td>
                                                <td><?= $order['payment_method'] ?></td>
                                                <td><?= $order['tracking_activity'] ?></td>
                                                <td><?= $order['shipment_status'] ?></td>
                                                <td><?= $order['created_at'] ?></td>
                                                <td>
                                                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <?= count(json_decode($order['order_items'], true)) ?> Item(s)
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <?php foreach (json_decode($order['order_items'], true) as $product): ?>
                                                            <div class="dropdown-item" style="display: flex; align-items: center;">
                                                                <p style="font-weight: 700; font-size: small; padding: 5px; margin: auto 10px;">
                                                                    <?= $product['product_title'] ?>
                                                                </p>
                                                                <div style="margin-left: auto; display: flex; gap: 10px;">
                                                                    <p>SKU: <?= $product['sku'] ?></p>
                                                                    <p>Qty: <?= $product['quantity'] ?></p>
                                                                </div>
                                                            </div>
                                                        <?php endforeach; ?>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-trackbluedart" role="tabpanel" aria-labelledby="pills-trackbluedart-tab">
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="pd-20 card-box">
                                    <h5 class="h4 text-blue mb-20">Track By:</h5>
                                    <div class="tab">
                                        <ul class="nav nav-pills" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link text-blue active" data-toggle="tab" href="#order" role="tab" aria-selected="true">Order No.</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link text-blue" data-toggle="tab" href="#awb" role="tab" aria-selected="false">AWB No.</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane fade active show" id="order" role="tabpanel">
                                                <div class="pd-20">
                                                    <div class="form-group row">
                                                        <label class="col-3 col-form-label">Enter Order No.</label>
                                                        <div class="col-6">
                                                            <input class="form-control" name="bluedartorder" type="text" placeholder="Enter Order Number" id="bluedartorderInput">
                                                        </div>
                                                        <div class="col-3">
                                                            <button type="button" id="bluedarttrackByOrder" class="btn btn-secondary">
                                                                Search
                                                                <span id="trackloader" class="loader" style="display: none;"></span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="awb" role="tabpanel">
                                                <div class="pd-20">
                                                    <div class="form-group row">
                                                        <label class="col-3 col-form-label">Enter AWB No.</label>
                                                        <div class="col-6">
                                                            <input class="form-control" name="bluedartawb" type="text" placeholder="Enter AWB Number" id="bluedartawbInput">
                                                        </div>
                                                        <div class="col-3">
                                                            <button type="button" id="bluedarttrackByAwb" class="btn btn-secondary">
                                                                Search
                                                                <span id="trackloader2" class="loader" style="display: none;"></span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="BluedarttrackingResults" class="row">
                            <!-- Tracking results will be dynamically inserted here -->
                        </div>

                    </div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">

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


<style>
    .loader {
        border: 3px solid #f3f3f3;
        border-radius: 50%;
        border-top: 3px solid #3498db;
        width: 20px;
        height: 20px;
        -webkit-animation: spin 2s linear infinite;
        animation: spin 2s linear infinite;
        display: inline-block;
        margin-left: 10px;
        vertical-align: middle;
    }

    @-webkit-keyframes spin {
        0% {
            -webkit-transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(360deg);
        }
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }
</style>


<script>
    $(document).ready(function() {
        // Existing initialization code...


    });
</script>



<script>
    $(document).ready(function() {

        function updateTrackingActivity(tracking_id) {
            $.ajax({
                url: '<?= base_url('bluedart_management/updateTrackingActivity') ?>',
                type: 'POST',
                data: {
                    tracking_id: tracking_id,
                    '<?= csrf_token() ?>': '<?= csrf_hash() ?>'
                },
                success: function(response) {
                    if (response.status === 'success') {
                        const cell = $(`tr:contains("${tracking_id}")`).find('td:last');
                        cell.text(response.tracking_activity);
                    } else {
                        console.error('Failed to update tracking:', response.message);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX error:', status, error);
                }
            });
        }

        // Add auto-refresh functionality
        setInterval(function() {
            $('.shipment-data-table-export tbody tr').each(function() {
                const tracking_id = $(this).find('td:eq(2)').text(); // Adjust index based on your table structure
                if (tracking_id) {
                    updateTrackingActivity(tracking_id);
                }
            });
        }, 300000); // Refresh every 5 minutes


        $('#bluedarttrackByOrder, #bluedarttrackByAwb').on('click', function() {
            var trackType = $(this).attr('id') === 'bluedarttrackByOrder' ? 'order' : 'awb';
            var trackValue = trackType === 'order' ? $('#bluedartorderInput').val() : $('#bluedartawbInput').val();

            // Validation for Order No. input
            if (trackType === 'order' && trackValue.length < 7) {
                alert('Please enter at least 7 digits for the Order Number.');
                return;
            }

            if (!trackValue) {
                alert('Please enter a ' + (trackType === 'order' ? 'order number' : 'AWB number'));
                return;
            }

            $('#trackloader, #trackloader2').show();

            $.ajax({
                url: '<?= base_url('bluedart_management/Bluedart_track') ?>',
                type: 'POST',
                data: {
                    track_type: trackType,
                    track_value: trackValue
                },
                dataType: 'json',
                success: function(response) {
                    $('#trackloader, #trackloader2').hide();
                    if (response.status === 'success') {
                        if (response.data.length > 0) {
                            displayBlueDartTrackingResults(response.data);
                        } else {
                            $('#BluedarttrackingResults').html('<div class="alert mt-3 ml-3 alert-warning">No shipment found for the given ' + (trackType === 'order' ? 'order number' : 'AWB number') + '.</div>');
                        }
                    } else {
                        $('#BluedarttrackingResults').html('<div class="alert mt-3 ml-3 alert-danger">Error: ' + response.message + '</div>');
                    }
                },
                error: function() {
                    $('#trackloader, #trackloader2').hide();
                    $('#BluedarttrackingResults').html('<div class="alert mt-3 ml-3 alert-danger">An error occurred while tracking the shipment.</div>');
                }
            });
        });

        function displayBlueDartTrackingResults(data) {
            var resultsHtml = '';
            data.forEach(function(shipment) {
                resultsHtml += `
            <div class="row p-3 w-100">
                <div class="col-sm-5">
                    <div class="pd-20 card-box mb-30">
                        <h5>Order number: ${shipment.order_number}</h5>
                        <p style="font-weight: 700;" class="mt-3 mb-0"> Item(s) :</p>
                        <div class="card p-3">
                            <div id="bluedart-product-details-${shipment.order_id}">
                                ${generateBlueDartProductsHtml(shipment.products)}
                            </div>
                        </div>
                        <p style="font-weight: 700; font-size: medium;" class="mt-3 mb-0" >Delivery Date: ${shipment.delivered_date || 'N/A'}</p>
                        <p style="font-weight: 700; font-size: medium;">
                            Delivery Status: ${shipment.shipment_status || 'N/A'}
                        </p>
                        <p style="font-weight: 700; font-size: medium;" class="mt-3 mb-0">AWB Number: ${shipment.tracking_id || 'N/A'}</p>
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="container pd-0">
                        <div class="timeline mb-30">
                            <ul>
                                ${generateBlueDartTrackingActivitiesHtml(shipment.tracking_details)}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            `;
            });
            $('#BluedarttrackingResults').html(resultsHtml);
        }

        function generateBlueDartProductsHtml(products) {
            return products.map(function(product) {
                return `
                    <div class="row p-3" style="display: flex; align-items: center;">
                        <img class="border-radius-100 shadow" src="<?= base_url('uploads/') ?>${product.product_image}" width="30" height="30" alt="${product.product_title}">
                        <a class="col p-1" style="font-weight: 700; font-size: small; padding: 5px; margin: auto 10px;">
                            ${product.product_title}
                        </a>
                        <div class="col-3 p-0" style="margin-left: auto;font-size: 14px;display: flex;gap: 10px;flex-direction: column;align-items: flex-end;">
                            <a >Qty: ${product.quantity}</a>
                        </div>
                    </div>
            `;
            }).join('');
        }

        function generateBlueDartTrackingActivitiesHtml(activities) {
            if (!Array.isArray(activities) || activities.length === 0) {
                return '<li>No tracking information available</li>';
            }
            return activities.map(function(activity) {
                return `
                <li>
                    <div class="timeline-date">
                        ${activity.ScanDate} ${activity.ScanTime}
                    </div>
                    <div class="timeline-desc card-box">
                        <div class="pd-20">
                            <h4 style=" font-size: 15px;" class="mb-10 h4">${activity.ScannedLocation}</h4>
                            <p style=" font-size: 12px;">${activity.Scan}</p>
                        </div>
                    </div>
                </li>
            `;
            }).join('');
        }
    });
</script>





<script>
    $.fn.dataTable.ext.errMode = 'none';

    $(document).ready(function() {


        // Initialize DataTable
        const dataTable = $('.shipment-data-table-export').DataTable({
            responsive: true,
            columnDefs: [{
                targets: 0,
                orderable: false,
                className: 'dt-body-center'
            }],
            order: [
                [7, 'desc']
            ] // Order by Created At column by default
        });

        function validateShipmentActions() {
            let allFulfilled = true;
            $('input[name="selected_shipments_id[]"]:checked').each(function() {
                const status = $(this).closest('tr').find('td:eq(6)').text().trim();
                if (status !== 'Fulfilled') {
                    allFulfilled = false;
                    return false;
                }
            });

            $('#printSelectedLabels, #cancelBluedartRequests').prop('disabled', !allFulfilled);
        }

        $('#select-all-Bluedartshipment').on('change', function() {
            $('.Bluedartshipment-ordercheckbox').prop('checked', this.checked);
            validateShipmentActions();
        });

        $(document).on('change', '.Bluedartshipment-ordercheckbox', function() {
            validateShipmentActions();
            const allChecked = $('.Bluedartshipment-ordercheckbox:checked').length === $('.Bluedartshipment-ordercheckbox').length;
            $('#select-all-Bluedartshipment').prop('checked', allChecked);
        });

        function updateTableData(orders) {
            console.log('Updating table with orders:', orders);

            // Clear existing table data
            dataTable.clear();

            // Add new rows
            orders.forEach(order => {
                try {
                    const orderItems = JSON.parse(order.order_items);
                    const itemsHtml = generateItemsDropdown(orderItems);

                    dataTable.row.add([
                        `<div class="dt-checkbox">
                        <input type="checkbox" class="Bluedartshipment-ordercheckbox" name="selected_shipments_id[]" value="${order.tracking_id}">
                        <span class="dt-checkbox-label"></span>
                    </div>`,
                        `<a href="#" class="view-pdf" data-pdf="${order.label}">${order.order_number}</a>`,
                        order.tracking_id,
                        order.billing_customer_name,
                        '₹' + order.total,
                        order.payment_method,
                        order.shipment_status,
                        order.created_at,
                        itemsHtml
                    ]);
                } catch (error) {
                    console.error('Error processing order:', error, order);
                }
            });

            // Redraw the table
            dataTable.draw();

            // Reinitialize PDF viewer functionality
            initializePdfViewer();

            // Reset checkboxes and validation
            $('#select-all-Bluedartshipment').prop('checked', false);
            validateShipmentActions();

            console.log('Table update completed');
        }

        function generateItemsDropdown(orderItems) {
            return `
            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                ${orderItems.length} Item(s)
            </button>
            <div class="dropdown-menu">
                ${orderItems.map(product => `
                    <div class="dropdown-item" style="display: flex; align-items: center;">
                        <p style="font-weight: 700; font-size: small; padding: 5px; margin: auto 10px;">
                            ${product.product_title}
                        </p>
                        <div style="margin-left: auto; display: flex; gap: 10px;">
                            <p>SKU: ${product.sku}</p>
                            <p>Qty: ${product.quantity}</p>
                        </div>
                    </div>
                `).join('')}
            </div>
        `;
        }

        function initializePdfViewer() {
            $('.view-pdf').off('click').on('click', function(e) {
                e.preventDefault();
                var pdfFile = $(this).data('pdf');
                $('#pdfFrame').attr('src', '<?= base_url('uploads/bluedart_labels') ?>/' + pdfFile);
                $('#pdfModal').modal('show');
            });
        }

        $('#shipmentStatusFilter').on('change', function() {
            const selectedStatus = $(this).val();
            console.log('Filtering by status:', selectedStatus);

            $.ajax({
                url: '<?= base_url('bluedart_management/filterBluedartShipments') ?>',
                type: 'POST',
                data: {
                    status: selectedStatus,
                    '<?= csrf_token() ?>': '<?= csrf_hash() ?>' // Add CSRF token for CodeIgniter 4
                },
                dataType: 'json',
                beforeSend: function() {
                    console.log('Sending filter request...');
                },
                success: function(response) {
                    console.log('Filter response received:', response);
                    if (response.status === 'success') {
                        updateTableData(response.data);
                    } else {
                        console.error('Filter error:', response.message);
                        alert('Error filtering shipments: ' + response.message);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX error:', status, error);
                    console.error('Response:', xhr.responseText);
                    alert('Error filtering shipments. Please try again.');
                }
            });
        });

        // Initial validation
        validateShipmentActions();


        $('#select-all-Bluedartrequest').on('change', function() {
            $('.Bluedartrequest-ordercheckbox').prop('checked', this.checked);
            updateCreateButtonState();
        });


        // PDF viewer functionality
        $('.view-pdf').on('click', function(e) {
            e.preventDefault();
            var pdfFile = $(this).data('pdf');
            $('#pdfFrame').attr('src', '<?= base_url('uploads/bluedart_labels') ?>/' + pdfFile);
            $('#pdfModal').modal('show');
        });

        $('#printSelectedLabels').on('click', function() {
            var selectedIds = $('input[name="selected_shipments_id[]"]:checked').map(function() {
                return this.value;
            }).get();

            if (selectedIds.length === 0) {
                alert('Please select at least one shipment to print.');
                return;
            }

            console.log('Selected tracking IDs:', selectedIds);

            $.ajax({
                url: '<?= base_url('bluedart_management/preparePrintLabels') ?>',
                type: 'POST',
                data: {
                    tracking_ids: selectedIds
                },
                xhrFields: {
                    responseType: 'blob' // Set the response type to blob
                },
                success: function(response, status, xhr) {
                    var filename = "";
                    var disposition = xhr.getResponseHeader('Content-Disposition');
                    if (disposition && disposition.indexOf('attachment') !== -1) {
                        var filenameRegex = /filename[^;=\n]*=((['"]).*?\2|[^;\n]*)/;
                        var matches = filenameRegex.exec(disposition);
                        if (matches != null && matches[1]) filename = matches[1].replace(/['"]/g, '');
                    }

                    var blob = new Blob([response], {
                        type: 'application/pdf'
                    });
                    var downloadUrl = URL.createObjectURL(blob);
                    var a = document.createElement("a");
                    a.href = downloadUrl;
                    a.download = filename || "merged_labels.pdf";
                    document.body.appendChild(a);
                    a.click();
                    setTimeout(function() {
                        document.body.removeChild(a);
                        window.URL.revokeObjectURL(downloadUrl);
                    }, 0);
                },
                error: function(xhr, status, error) {
                    console.error('AJAX error:', status, error);
                    alert('Error preparing labels for printing. Please try again.');
                }
            });
        });

        $('#cancelBluedartRequests').on('click', function() {
            console.log('Cancel BlueDart Requests button clicked');
            var selectedTrackingIds = $('input[name="selected_shipments_id[]"]:checked').map(function() {
                return this.value;
            }).get();

            console.log('Selected tracking IDs:', selectedTrackingIds);

            if (selectedTrackingIds.length > 0) {
                $('#cancelBluedartloader').show();
                $.ajax({
                    url: '<?= base_url('bluedart_management/cancelBluedartRequest') ?>',
                    type: 'POST',
                    data: {
                        tracking_ids: selectedTrackingIds
                    },
                    dataType: 'json',
                    success: function(response) {
                        console.log('AJAX request successful:', response);
                        $('#cancelBluedartloader').hide();
                        if (response.status === 'success' || response.status === 'partial') {
                            alert(response.message);
                            location.reload();
                        } else {
                            console.error('Error cancelling requests:', response.message);
                            alert('Error cancelling requests: ' + response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX request failed:', status, error);
                        $('#cancelBluedartloader').hide();
                        alert('An error occurred while processing your request.');
                    }
                });
            } else {
                console.warn('No shipments selected');
                alert('Please select at least one shipment to cancel.');
            }
        });


        // Bulk edit functionality
        $('.bulk-edit, .dimension-input').on('change', function() {
            var field = $(this).attr('name').split('[')[0];
            var value = $(this).val();
            var checkedBoxes = $('.Bluedartrequest-ordercheckbox:checked');

            if (checkedBoxes.length > 0) {
                checkedBoxes.each(function() {
                    var shipmentId = $(this).val();
                    $(`[name="${field}[${shipmentId}]"]`).val(value);
                });
            }
        });

        // Disable "Create Selected Shipment Order" button initially
        $('#createSelectedShipments').prop('disabled', true);

        // Function to check if any selected order has null or empty values
        function checkSelectedOrdersForNullValues() {
            let allFieldsFilled = true;

            $('.Bluedartrequest-ordercheckbox:checked').each(function () {
                const shipmentId = $(this).val();
                const packageType = $(`select[name="package_type[${shipmentId}]"]`).val();
                const numPackages = parseInt($(`input[name="num_packages[${shipmentId}]"]`).val()) || 1;

                // Validate multi-package fields
                if (packageType === 'multi') {
                    const fields = ['weight', 'length', 'breadth', 'height'];
                    fields.forEach(field => {
                        const inputs = $(`input[name="${field}[${shipmentId}][]"]`);
                        if (inputs.length < numPackages || inputs.toArray().some(input => !$(input).val().trim())) {
                            allFieldsFilled = false;
                        }
                    });
                } else {
                    // Validate single-package fields
                    const fields = [
                        $(`input[name="weight[${shipmentId}]"]`),
                        $(`input[name="length[${shipmentId}]"]`),
                        $(`input[name="breadth[${shipmentId}]"]`),
                        $(`input[name="height[${shipmentId}]"]`),
                        $(`input[name="billing_address[${shipmentId}]"]`),
                        $(`input[name="billing_pincode[${shipmentId}]"]`),
                        $(`input[name="PickupDate[${shipmentId}]"]`)
                    ];

                    fields.forEach(field => {
                        if (!field.length || !field.val().trim()) {
                            allFieldsFilled = false;
                        }
                    });
                }

                if (!allFieldsFilled) return false; // Break the outer loop if any invalid field is found
            });

            return allFieldsFilled;
        }
        

        // Function to update the "Create Selected Shipment Order" button state
        function updateCreateButtonState() {
            const allFieldsValid = checkSelectedOrdersForNullValues();
            $('#createSelectedShipments').prop('disabled', !allFieldsValid);
        }


        // Event listener for checkbox changes
        $(document).on('change', '.Bluedartrequest-ordercheckbox', function () {
            updateCreateButtonState();
        });

        // Event listener for input field changes (for dynamically added fields)
        $(document).on('input', '.bulk-edit, .dimension-input, .num-packages', function () {
            updateCreateButtonState();
        });

        // Trigger state update on page load in case fields are pre-filled
        updateCreateButtonState();


        // Modify the existing saveChanges function
        $('#saveChanges').click(function () {
        $('#saveLoader').show();
        console.log('Saving changes...');

        var shipments = {};
        $('.Bluedartrequest-ordercheckbox').each(function () {
            var shipmentId = $(this).val();
            var packageType = $(`select[name="package_type[${shipmentId}]"]`).val();
            var noOfPackages = $(`input[name="num_packages[${shipmentId}]"]`).val() || 1;

            if (packageType === 'multi') {
                // Multi-package: Collect dimensions as arrays
                shipments[shipmentId] = {
                    pickup_location: $(`select[name="pickup_location[${shipmentId}]"]`).val(),
                    weight: $(`input[name="weight[${shipmentId}][]"]`).map(function () { return $(this).val(); }).get(),
                    length: $(`input[name="length[${shipmentId}][]"]`).map(function () { return $(this).val(); }).get(),
                    breadth: $(`input[name="breadth[${shipmentId}][]"]`).map(function () { return $(this).val(); }).get(),
                    height: $(`input[name="height[${shipmentId}][]"]`).map(function () { return $(this).val(); }).get(),
                    ProductCode: $(`select[name="ProductCode[${shipmentId}]"]`).val(),
                    SubProductCode: $(`select[name="SubProductCode[${shipmentId}]"]`).val(),
                    billing_address: $(`input[name="billing_address[${shipmentId}]"]`).val(),
                    billing_pincode: $(`input[name="billing_pincode[${shipmentId}]"]`).val(),
                    PickupDate: $(`input[name="PickupDate[${shipmentId}]"]`).val(),
                    collectable_amount: $(`input[name="collectable_amount[${shipmentId}]"]`).val(),
                    ProductType: $(`select[name="ProductType[${shipmentId}]"]`).val(),
                    no_of_packages: noOfPackages
                };
            } else {
                // Single-package: Collect single values
                shipments[shipmentId] = {
                    pickup_location: $(`select[name="pickup_location[${shipmentId}]"]`).val(),
                    weight: $(`input[name="weight[${shipmentId}]"]`).val(),
                    length: $(`input[name="length[${shipmentId}]"]`).val(),
                    breadth: $(`input[name="breadth[${shipmentId}]"]`).val(),
                    height: $(`input[name="height[${shipmentId}]"]`).val(),
                    ProductCode: $(`select[name="ProductCode[${shipmentId}]"]`).val(),
                    SubProductCode: $(`select[name="SubProductCode[${shipmentId}]"]`).val(),
                    billing_address: $(`input[name="billing_address[${shipmentId}]"]`).val(),
                    billing_pincode: $(`input[name="billing_pincode[${shipmentId}]"]`).val(),
                    PickupDate: $(`input[name="PickupDate[${shipmentId}]"]`).val(),
                    collectable_amount: $(`input[name="collectable_amount[${shipmentId}]"]`).val(),
                    ProductType: $(`select[name="ProductType[${shipmentId}]"]`).val(),
                    no_of_packages: noOfPackages
                };
            }
        });

        $.ajax({
            url: '<?= base_url('bluedart_management/saveChanges') ?>',
            method: 'POST',
            data: {
                shipments: shipments
            },
            success: function (response) {
                $('#saveLoader').hide();
                console.log('Save changes response:', response);
                if (response.status === 'success') {
                    alert('Changes saved successfully');
                    location.reload(); // Refresh the page to get updated data
                } else {
                    alert('Error: ' + response.message);
                }
            },
            error: function (xhr) {
                $('#saveLoader').hide();
                console.error('AJAX Error:', xhr.responseText);
                alert('An error occurred while saving changes');
            }
        });
    });


        // Existing code for createSelectedShipments
        $('#createSelectedShipments').click(function() {
            let selectedShipments = [];
            $('.Bluedartrequest-ordercheckbox:checked').each(function() {
                selectedShipments.push($(this).val());
            });

            if (selectedShipments.length === 0) {
                alert('Please select at least one shipment to generate a Waybill.');
                return;
            }

            $('#loader').show();

            $.ajax({
                url: '<?= base_url('bluedart_management/generateWaybill') ?>',
                method: 'POST',
                data: {
                    order_shipment_ids: selectedShipments
                },
                success: function(response) {
                    $('#loader').hide();
                    console.log('Full API Response:', response);

                    if (response.status === 'success' || response.status === 'partial') {
                        alert(response.message);
                        location.reload();
                    } else {
                        alert('Error: ' + response.message);
                    }
                },
                error: function(xhr) {
                    $('#loader').hide();
                    console.error('AJAX Error:', xhr.responseText);
                    alert('An error occurred: ' + xhr.statusText);
                }
            });
        });
    });

    $(document).ready(function () {
        // Handle Package Type Dropdown Change
        $(document).on('change', '.package-type-dropdown', function () {
            const shipmentId = $(this).data('shipment-id');
            const packageType = $(this).val();

            if (packageType === 'multi') {
                $(`input[name="num_packages[${shipmentId}]"]`).show();
                generateMultiPackageFields(shipmentId, 1); // Default to 1 package
            } else {
                $(`input[name="num_packages[${shipmentId}]"]`).hide();
                resetSinglePackageFields(shipmentId);
            }
        });

        // Handle Number of Packages Change
        $(document).on('input', '.num-packages', function () {
            const shipmentId = $(this).data('shipment-id');
            const numPackages = parseInt($(this).val()) || 1;
            generateMultiPackageFields(shipmentId, numPackages);
        });

        // Generate Multi-Package Fields
        function generateMultiPackageFields(shipmentId, numPackages) {
            updateDimensionsColumn(shipmentId, 'length', numPackages);
            updateDimensionsColumn(shipmentId, 'breadth', numPackages);
            updateDimensionsColumn(shipmentId, 'height', numPackages);
            updateDimensionsColumn(shipmentId, 'weight', numPackages);
        }

        // Update Dimension Columns
        function updateDimensionsColumn(shipmentId, dimensionType, numPackages) {
            const columnId = `#dimensions-${dimensionType}-${shipmentId}`;
            $(columnId).empty(); // Clear existing inputs

            for (let i = 1; i <= numPackages; i++) {
                $(columnId).append(`
                    <input type="number" class="form-control dimension-input" name="${dimensionType}[${shipmentId}][]" placeholder="${dimensionType.charAt(0).toUpperCase() + dimensionType.slice(1)} (cm)" min="0" step="0.1" style="margin-bottom: 5px;">
                `);
            }
        }

        // Reset to Single Package
        function resetSinglePackageFields(shipmentId) {
            resetDimensionsColumn(shipmentId, 'length');
            resetDimensionsColumn(shipmentId, 'breadth');
            resetDimensionsColumn(shipmentId, 'height');
            resetDimensionsColumn(shipmentId, 'weight');
        }

        // Reset Dimension Columns
        function resetDimensionsColumn(shipmentId, dimensionType) {
            const columnId = `#dimensions-${dimensionType}-${shipmentId}`;
            $(columnId).html(`
                <input type="number" class="form-control dimension-input" name="${dimensionType}[${shipmentId}]" placeholder="${dimensionType.charAt(0).toUpperCase() + dimensionType.slice(1)} (cm)" min="0" step="0.1">
            `);
        }

        // Handle Payment Method Dropdown Change
        $(document).on('change', '.payment-method-dropdown', function () {
            const shipmentId = $(this).data('shipment-id');
            const paymentMethod = $(this).val();
            const totalField = $(`input[name="total[${shipmentId}]"]`); // Ensure 'total' input exists
            const collectableAmountField = $(`input[name="collectable_amount[${shipmentId}]"]`);

            if (paymentMethod === 'C') {
                // Show the collectable amount field
                collectableAmountField.show();

                // Calculate the collectable amount: 70% of total + 300
                const total = parseFloat(totalField.val()) || 0;
                const collectableAmount = (total * 0.7) + 300;

                // Set the calculated value in the input field
                collectableAmountField.val(collectableAmount.toFixed(2));
            } else {
                // Hide the collectable amount field and clear its value for non-COD
                collectableAmountField.hide();
                collectableAmountField.val('');
            }
        });

        // Recalculate collectable amount on total input change for COD
        $(document).on('input', 'input[name^="total"]', function () {
            const shipmentId = $(this).closest('tr').find('.payment-method-dropdown').data('shipment-id');
            const paymentMethod = $(`select[name="SubProductCode[${shipmentId}]"]`).val();
            const collectableAmountField = $(`input[name="collectable_amount[${shipmentId}]"]`);

            if (paymentMethod === 'C') {
                const total = parseFloat($(this).val()) || 0;
                const collectableAmount = (total * 0.7) + 300;
                collectableAmountField.val(collectableAmount.toFixed(2));
            }
        });

        // Handle Package Type Dropdown Change (if required for additional logic)
        $(document).on('change', '.package-type-dropdown', function () {
            const shipmentId = $(this).data('shipment-id');
            const packageType = $(this).val();
            const numPackagesField = $(`input[name="num_packages[${shipmentId}]"]`);

            if (packageType === 'multi') {
                numPackagesField.show();
            } else {
                numPackagesField.hide();
                numPackagesField.val('');
            }
        });
    });





    $('.data-table-export').DataTable({
        scrollX: true,
        scrollCollapse: true,
        autoWidth: false,
        responsive: false,
        columnDefs: [{
            targets: "datatable-nosort",
            orderable: false,
        }],
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
        ],
        "language": {
            "info": "_START_-_END_ of _TOTAL_ entries",
            searchPlaceholder: "Search",
            paginate: {
                next: '<i class="ion-chevron-right"></i>',
                previous: '<i class="ion-chevron-left"></i>'
            }
        },
    });


    $(document).ready(function() {
        $('#generateLabels').on('click', function() {
            console.log('Generate Labels button clicked');
            var selectedShipments = $('input[name="selected_shipments_id[]"]:checked').map(function() {
                return this.value;
            }).get();

            console.log('Selected shipments:', selectedShipments);

            if (selectedShipments.length > 0) {
                $('#loader').show();
                $.ajax({
                    url: '<?= base_url('shiprocket_management/generate_labels') ?>',
                    type: 'POST',
                    data: {
                        shipment_id: selectedShipments
                    },
                    dataType: 'json',
                    success: function(response) {
                        console.log('AJAX request successful:', response);
                        $('#loader').hide();
                        if (response.success) {
                            console.log('Labels generated successfully');
                            if (response.label_url) {
                                window.open(response.label_url, '_blank');
                            } else {
                                alert('Labels generated successfully, but no URL was provided.');
                            }
                        } else {
                            console.error('Error generating labels:', response.message);
                            alert('Error generating labels: ' + response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX request failed:', status, error);
                        $('#loader').hide();
                        alert('An error occurred while processing your request.');
                    }
                });
            } else {
                console.warn('No shipments selected');
                alert('Please select at least one shipment.');
            }
        });
    });
</script>

</html>