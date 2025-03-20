<!-- Head View Start -->
<?= $this->include('head_view') ?>
<!-- Head View End -->

<body>

    <!-- Header View Start -->
    <?= $this->include('header_view') ?>
    <!-- Header View End -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

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
                <div class="d-flex justify-content-between mb-2">
                    <!-- Left Button -->
                    <a href="<?= base_url() ?>registeredusers" class="px-2">
                        <i class="fa-solid fa-arrow-left"></i>
                    </a>
                </div>
                <?php foreach ($users as $user) : ?>
                    <form id="usereditform" method="post" action="<?= base_url('registeredusers/updateuserdata/' . $user['user_id']) ?>" class="needs-validation" novalidate>
                        <div class="d-flex justify-content-end">
                            <a href="<?= base_url() ?>registeredusers/customer_logs/<?= $user['user_id'] ?>" class="px-2">
                                <i class="fa-solid fa-ellipsis-vertical fa-2x" style="font-weight: 900;"></i>
                            </a>
                        </div>

                        <div class="row">
                            <div class="col-md-8">

                                <div class="pd-20 card-box mb-30">
                                    <p class="text-blue">
                                        <span class="badge 
                                                <?php
                                                if ($user['account_status'] === 'active') {
                                                    echo 'badge-success';
                                                } elseif ($user['account_status'] === 'inactive') {
                                                    echo 'badge-warning';
                                                } elseif ($user['account_status'] === 'suspended') {
                                                    echo 'badge-danger';
                                                } else {
                                                    echo 'badge-secondary';
                                                }
                                                ?>">
                                            <?= ucfirst($user['account_status']) ?>
                                        </span>
                                    </p>


                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="">Risk Profile</label>
                                                <?php

                                                $riskProfile = !empty($user['risk_profile']) ? $user['risk_profile'] : 'Low';

                                                $badgeClass = 'badge-success';
                                                if ($riskProfile === 'High') {
                                                    $badgeClass = 'badge-danger';
                                                } elseif ($riskProfile === 'Medium') {
                                                    $badgeClass = 'badge-warning';
                                                }
                                                ?>
                                                <span class="badge badge-pill <?= $badgeClass ?>">
                                                    <?= ucfirst($riskProfile) ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input class="form-control" name="name" value="<?= $user['name'] ?>" type="text" placeholder="Johnny Brown" required />
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">This field can't be empty</div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input class="form-control" name="email" value="<?= $user['email'] ?>" type="email" required />
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">This field can't be empty</div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Phone No.</label>
                                                <input class="form-control" name="phoneno" value="<?= $user['phone_no'] ?>" type="tel" required />
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">This field can't be empty</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Account Type</label>
                                                <input class="form-control" name="name" value="<?= $user['account_type'] ?>" type="text" placeholder="Johnny Brown" required disabled />
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">This field can't be empty</div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <div class="d-flex justify-content-between">
                                                    <label for="" class="form-label">Referral ID
                                                        (<a href="<?= base_url() ?>registeredusers/referral-history/<?= $user['user_id'] ?>">History</a>)
                                                    </label>
                                                    <div class="pointer" data-toggle="modal" data-target="#referralPointsModal">Set</div>
                                                </div>
                                                <input type="text" class="form-control" id="" value="<?= $user['referral_id'] ?>" placeholder="Referral ID" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Total Amount Spent</label>
                                                <input type="number" class="form-control" id="" value="<?= number_format($amount_spent, 2) ?>" placeholder="Spend" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h6 class="card-title">
                                                    Loyalty
                                                    <?php
                                                    // Set default value to 'NA' if loyalty_program_status is empty or not set
                                                    $loyaltyStatus = !empty($user['loyalty_program_status']) ? $user['loyalty_program_status'] : 'NA';

                                                    // Determine Bootstrap Badge Class
                                                    $badgeClass = 'badge-secondary'; // Default for NA (Gray)
                                                    if ($loyaltyStatus === 'active') {
                                                        $badgeClass = 'badge-success'; // Green for Active
                                                    } elseif ($loyaltyStatus === 'inactive') {
                                                        $badgeClass = 'badge-warning'; // Yellow for Inactive
                                                    }
                                                    ?>
                                                    <span class="badge <?= $badgeClass ?>">
                                                        <?= ucfirst($loyaltyStatus) ?>
                                                    </span>
                                                </h6>
                                                <div class="form-group">
                                                    <input type="number" class="form-control" id="" value="<?= $user['loyalty_points'] ?>" placeholder="Points" readonly>
                                                    <div class="d-flex justify-content-between">
                                                        <label for="" class="form-label">Reward Points (<a href="<?= base_url() ?>registeredusers/loyality_points_history/<?= $user['user_id'] ?>">History</a>)</label>
                                                        <p for="">1 Point = <?= $loyalty_point_value ?> GBP <a href="<?= base_url() ?>registeredusers/SetLoyaltyPointValue">Change</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="pd-20 card-box mb-30">
                                    <p class="text-blue mb-30">Order Details</p>
                                    <div class="form-group">
                                        <label>Orders</label>
                                        <i>
                                            <p>Total Orders:- <strong>(<?= $total_orders ?>)</strong>
                                                <b>
                                                    <u>
                                                        <a href="<?= base_url() ?>users/view_all_orders/<?= $user['user_id'] ?>">View All Orders</a>
                                                    </u>
                                                </b>
                                            </p>
                                        </i>
                                    </div>
                                    <div class="form-group">
                                        <label>Last Order Placed</label>
                                        <?php if (!empty($last_order)): ?>
                                            <i>
                                                <p>Product:- <?= esc($last_order['product_name']) ?></p>
                                                <p>Date:- <?= date('d M Y H:i A', strtotime($last_order['order_date'])) ?></p>
                                            </i>
                                        <?php else: ?>
                                            <i>No orders placed yet.</i>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Average Order Value</label>
                                        <i>
                                            <p>&#8377;<?= $average_order_value ?></p>
                                        </i>
                                    </div>
                                </div>

                                <div class="pd-20 card-box mb-30">
                                    <p class="text-blue mb-30">Cart Abandonment</p>
                                    <?php if (!empty($cart_abandonment)): ?>
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>Product Image</th>
                                                        <th>Product Name</th>
                                                        <th>Price (₹)</th>
                                                        <th>Quantity</th>
                                                        <th>Added On</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($cart_abandonment as $cart): ?>
                                                        <tr>
                                                            <td>
                                                                <img src="<?= esc($cart['product_image']); ?>"
                                                                    onerror="this.src='<?= base_url('assets/images/default-product.jpg'); ?>';"
                                                                    style="width: 50px; height: 50px; object-fit: cover;">
                                                            </td>
                                                            <td><strong><?= esc($cart['product_name']); ?></strong></td>
                                                            <td>₹<?= number_format($cart['product_price'], 2); ?></td>
                                                            <td><?= esc($cart['quantity']); ?></td>
                                                            <td><strong><?= date('j F, Y, g:i a', strtotime($cart['added_on'])); ?></strong></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    <?php else: ?>
                                        <p>No abandoned cart items.</p>
                                    <?php endif; ?>
                                </div>

                                <div class="pd-20 card-box mb-30">
                                    <p class="text-blue mb-30">Customer Behaviour</p>

                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Marketing Preferences</label>
                                                <input class="form-control" name="marketing_preferences" value="<?= $user['marketing_preferences'] ?>" type="text" />
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">This field can't be empty</div>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="form-group">
                                                <label>Communication Preferences</label>
                                                <input class="form-control" name="communication_preferences" value="<?= $user['communication_preferences'] ?>" type="text" />
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">This field can't be empty</div>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="form-group">
                                                <label>Return History</label>
                                                <input class="form-control" name="return_history" value="<?= $user['return_history'] ?>" type="text" />
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">This field can't be empty</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Feedback and Ratings</label>
                                                <input class="form-control" name="feedback_and_ratings" value="<?= $user['feedback_and_ratings'] ?>" type="text" />
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">This field can't be empty</div>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="form-group">
                                                <label>Support Tickets</label>
                                                <input class="form-control" name="support_tickets" value="<?= $user['support_tickets'] ?>" type="text" />
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">This field can't be empty</div>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="form-group">
                                                <label>Custom Attributes</label>
                                                <input class="form-control" name="custom_attributes" value="<?= $user['custom_attributes'] ?>" type="text" />
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">This field can't be empty</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Subscription Status</label>
                                                <input class="form-control" name="subscription_status" value="<?= $user['subscription_status'] ?>" type="text" />
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">This field can't be empty</div>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="form-group">
                                                <label>GDPR Compliance Status</label>
                                                <select class="form-control" name="gdpr_compliance_status">
                                                    <option value="yes" <?= $user['gdpr_compliance_status'] == 'yes' ? 'selected' : '' ?>>Yes</option>
                                                    <option value="no" <?= $user['gdpr_compliance_status'] == 'no' ? 'selected' : '' ?>>No</option>
                                                </select>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">This field can't be empty</div>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="form-group">
                                                <label>Payment Methods</label>
                                                <input class="form-control" name="payment_methods" value="<?= $user['payment_methods'] ?>" type="text" />
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">This field can't be empty</div>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="form-group">
                                                <label>Tax Exemptions</label>
                                                <input class="form-control" name="tax_exemptions" value="<?= $user['tax_exemptions'] ?>" type="text" />
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">This field can't be empty</div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="col-md-4">

                                <div class="pd-20 card-box mb-30">
                                    <p class="text-blue mb-30">Customer Address</p>
                                    <div class="form_section">
                                        <div class="form-group">
                                            <label for="" class="form-label">Address Line 1</label>
                                            <input type="text" class="form-control" id="" value="<?= $user['address_one'] ?>" placeholder="Address line 2">
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="form-label">Address Line 2</label>
                                            <input type="text" class="form-control" id="" value="<?= $user['address_two'] ?>" placeholder="Address line 2">
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="" class="form-label">City</label>
                                                    <input type="text" class="form-control" id="" value="<?= $user['city'] ?>" placeholder="City">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="" class="form-label">State</label>
                                                    <input type="text" class="form-control" id="" value="<?= $user['state'] ?>" placeholder="State">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="" class="form-label">Pincode</label>
                                                    <input type="text" class="form-control" id="" value="<?= $user['pincode'] ?>" placeholder="Name">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="" class="form-label">Country</label>
                                                    <input type="text" class="form-control" id="" value="<?= $user['country'] ?>" placeholder="Name">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="pd-20 card-box mb-30">
                                    <div class="form-group">
                                        <label>Notes</label>
                                        <textarea class="form-control resizable-textarea" name="notes"><?= $user['notes'] ?></textarea>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">This field can't be empty</div>
                                    </div>
                                </div>

                                <div class="pd-20 card-box mb-30">
                                    <p class="text-blue">Password</p>

                                    <div class="">
                                        <div class="input-group">
                                            <input class="form-control" value="<?= $user['password'] ?>" type="password" id="current-password" disabled />
                                        </div>
                                    </div>

                                    <div id="new-password-fields" style="display:none;">
                                        <div class="form-group">
                                            <label>New Password</label>
                                            <input class="form-control" name="new_password" type="password" id="new-password" />
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">This field can't be empty</div>
                                        </div>
                                        <div class="form-group">
                                            <label>Repeat New Password</label>
                                            <input class="form-control" name="confirmpassword" type="password" id="repeat-password" />
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">This field can't be empty</div>
                                        </div>
                                    </div>

                                </div>

                                <div class="pd-20 card-box mb-30">
                                    <div class="form-group">
                                        <p class="text-blue">Tags</p>
                                        <div class="mb-20">
                                            <input type="text" class="form-control" value="<?= $user['tags'] ?>" data-role="tagsinput" id="user_tags" name="user_tags" />
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- Submit Button -->
                        <div class="form-group row">
                            <div class="col-sm-12 col-md-10">
                                <button type="submit" class="btn btn-lg btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                <?php endforeach; ?>

                <div class="row">
                    <div class="col-md-9">
                        <div class="pd-20 card-box mb-30">
                            <h4 class="text-blue mb-30">Activity Timeline</h4>
                            <div class="timeline">
                                <?php if (!empty($orders)): ?>
                                    <?php foreach ($orders as $order): ?>
                                        <!-- Order Placed -->
                                        <div class="timeline-item">
                                            <div class="timeline-badge">
                                                <?php
                                                $iconClass = 'fas fa-box'; // Box icon for Placed
                                                ?>

                                                <div>
                                                    <i class="<?= $iconClass ?>"></i>
                                                </div>
                                            </div>
                                            <div class="timeline-content">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Order Placed</h5>
                                                        <p class="card-text">
                                                            Order <?= $order['order_number'] ?> placed on <?= date('d M Y h:i A', strtotime($order['order_date'])) ?>
                                                            for <strong><?= $order['product_name'] ?></strong> X (Quantity: <?= $order['product_quantities'] ?>, Size: <?= $order['product_size'] ?>).
                                                        </p>
                                                        <p class="text-muted"><small><i class="fas fa-clock"></i> <?= date('d M Y h:i A', strtotime($order['order_date'])) ?></small></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Order Fulfilled -->
                                        <?php if ($order['fulfillment_status'] == 'Fulfilled'): ?>
                                            <div class="timeline-item">
                                                <div class="timeline-badge">
                                                    <?php
                                                    $iconClass = 'fas fa-truck'; // Truck icon for Fulfilled
                                                    ?>

                                                    <div>
                                                        <i class="<?= $iconClass ?>"></i>
                                                    </div>
                                                </div>
                                                <div class="timeline-content">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h5 class="card-title">Order Fulfilled</h5>
                                                            <p class="card-text">
                                                                Order <?= $order['order_number'] ?> has been fulfilled on <?= date('d M Y h:i A', strtotime($order['fulfillment_date'])) ?>.
                                                            </p>
                                                            <p class="text-muted"><small><i class="fas fa-clock"></i> <?= date('d M Y h:i A', strtotime($order['fulfillment_date'])) ?></small></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>

                                        <!-- Order Delivered -->
                                        <?php if ($order['fulfillment_status'] == 'Delivered'): ?>
                                            <div class="timeline-item">
                                                <div class="timeline-badge">
                                                    <?php
                                                    $iconClass = 'fas fa-box'; // Box icon for Delivered
                                                    ?>

                                                    <div>
                                                        <i class="<?= $iconClass ?>"></i>
                                                    </div>
                                                </div>
                                                <div class="timeline-content">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h5 class="card-title">Order Delivered</h5>
                                                            <p class="card-text">
                                                                Order <?= $order['order_number'] ?> was delivered on <?= date('d M Y h:i A', strtotime($order['delivery_date'])) ?> */.
                                                            </p>
                                                            <p class="text-muted"><small><i class="fas fa-clock"></i> <?= date('d M Y h:i A', strtotime($order['delivery_date'])) ?></small></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>

                                        <!-- Order Returned -->
                                        <?php if ($order['fulfillment_status'] == 'Returned'): ?>
                                            <div class="timeline-item">
                                                <div class="timeline-badge">
                                                    <?php
                                                    $iconClass = 'fas fa-undo'; // Undo icon for Returned
                                                    ?>

                                                    <div>
                                                        <i class="<?= $iconClass ?>"></i>
                                                    </div>
                                                </div>
                                                <div class="timeline-content">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h5 class="card-title">Order Returned</h5>
                                                            <p class="card-text">
                                                                Order <?= $order['order_number'] ?> was returned on <?= date('d M Y h:i A', strtotime($order['return_date'])) ?>.
                                                            </p>
                                                            <p class="text-muted"><small><i class="fas fa-clock"></i> <?= date('d M Y h:i A', strtotime($order['return_date'])) ?></small></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>

                                        <!-- Email Sent Timeline Item -->
                                        <div class="timeline-item">
                                            <div class="timeline-badge">
                                                <div>
                                                    <i class="fas fa-envelope"></i>
                                                </div>
                                            </div>
                                            <div class="timeline-content">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Email Sent
                                                            <span>
                                                                <?php if ($order['email_send'] == 'yes'): ?>
                                                                    <button type="button" class="btn btn-light">
                                                                        View Email
                                                                    </button>
                                                                <?php else: ?>
                                                                    <span class="text-muted">Email not sent</span>
                                                                <?php endif; ?>
                                                            </span>
                                                        </h5>
                                                        <p class="card-text">
                                                            <?php if ($order['email_send'] == 'yes'): ?>
                                                                An email was successfully sent to the client regarding the order status.
                                                            <?php else: ?>
                                                                Email has not been sent yet. Please check the email configuration.
                                                            <?php endif; ?>
                                                        </p>
                                                        <p class="text-muted"><small><i class="fas fa-clock"></i> <?= date('d M Y h:i A', strtotime($order['order_date'])) ?></small></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <p>No order activity found.</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Main Content End -->

        <!-- Modal -->
        <div class="modal fade" id="referralPointsModal" tabindex="-1" role="dialog" aria-labelledby="referralPointsModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="referralPointsModalLabel">Manage Referral Points</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url('registeredusers/updateRefpoints') ?>" method="POST">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="points_for_referrer">Points for Referrer:</label>
                                <input type="number" class="form-control" id="points_for_referrer" name="points_for_referrer" value="<?= $referralConfig['points_for_referrer'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="points_for_referred">Points for Referred User:</label>
                                <input type="number" class="form-control" id="points_for_referred" name="points_for_referred" value="<?= $referralConfig['points_for_referred'] ?>" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

</body>
<!-- Footer View Start -->
<?= $this->include('footer_view') ?>
<!-- Footer View End -->

</html>