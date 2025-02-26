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
                <div class="">
                    <div class="clearfix">
                        <div class="pull-left">
                            <h4 class=" h4">Edit User Info</h4>
                        </div>
                    </div>
                </div>

                <?php foreach ($users as $user) : ?>
                    <form id="usereditform" method="post" action="<?= base_url('registeredusers/updateuserdata/' . $user['user_id']) ?>" class="needs-validation" novalidate>
                        <div class="row">
                            <div class="col-md-8">

                                <div class="pd-20 card-box mb-30">
                                    <p class="text-blue">
                                        Customer
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
                                                        (<a href="<?= base_url() ?>admin_users/referral-history/<?= $user['user_id'] ?>">History</a>)
                                                    </label>
                                                    <div class="pointer" data-toggle="modal" data-target="#referralPointsModal">Set</div>
                                                </div>
                                                <input type="text" class="form-control" id="" value="<?= $user['referral_id'] ?>" placeholder="Referral ID" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="">Total Amount Spent</label>
                                                <i>
                                                    <p>&#8377; <?= number_format($amount_spent, 2) ?></p>
                                                </i>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Tags</label>
                                                <input type="text" name="tags" value="<?= $user['tags'] ?>" data-role="tagsinput" />
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
                                        <ul>
                                            <?php foreach ($cart_abandonment as $cart): ?>
                                                <li>
                                                    <img src="<?= base_url('uploads/' . $cart['product_image']); ?>" alt="<?= $cart['product_name']; ?>" style="width: 50px;height: 50px;object-fit: scale-down;">
                                                    <strong><?= $cart['product_name']; ?></strong> -
                                                    Price: <?= $cart['product_price']; ?>,
                                                    Added on: <strong><?= date('j F, Y, g:i a', strtotime($cart['added_on'])); ?></strong>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php else: ?>
                                        <p>No abandoned cart items.</p>
                                    <?php endif; ?>
                                </div>

                                <div class="pd-20 card-box mb-30">
                                    <p class="text-blue mb-30">Royality Program</p>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Loyalty Program Status</label>
                                                <select class="form-control" name="loyalty_program_status">
                                                    <option value="active" <?= $user['loyalty_program_status'] == 'active' ? 'selected' : '' ?>>Active</option>
                                                    <option value="inactive" <?= $user['loyalty_program_status'] == 'inactive' ? 'selected' : '' ?>>Inactive</option>
                                                </select>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">This field can't be empty</div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Reward Points</label>
                                                <input class="form-control" name="reward_points" value="<?= $user['reward_points'] ?>" type="number" />
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">This field can't be empty</div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Credit Balance</label>
                                                <input class="form-control" name="credit_balance" value="<?= $user['credit_balance'] ?>" type="number" step="0.01" />
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">This field can't be empty</div>
                                            </div>
                                        </div>
                                    </div>
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

                                    <div class="row">
                                        <div class="col">
                                            <label>Shipping Address</label>
                                            <div class="form-group">
                                                <?= $user['address_information'] ?>, <?= $user['landmark'] ?>, <?= $user['city'] ?>, <?= $user['state'] ?>, <?= $user['country'] ?>, <?= $user['pincode'] ?>
                                                <button id="editAddress" class="btn btn-sm btn-light ml-2" type="button">Edit</button>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="addressForm" style="display: none;">
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Address Line 1</label>
                                                    <input class="form-control" name="address_information" value="<?= $user['address_information'] ?>" type="text" />
                                                    <div class="valid-feedback">Looks good!</div>
                                                    <div class="invalid-feedback">This field can't be empty</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Landmark</label>
                                                    <input class="form-control" name="landmark" value="<?= $user['landmark'] ?>" type="text" />
                                                    <div class="valid-feedback">Looks good!</div>
                                                    <div class="invalid-feedback">This field can't be empty</div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Pincode</label>
                                                    <input class="form-control" name="pincode" value="<?= $user['pincode'] ?>" type="text" />
                                                    <div class="valid-feedback">Looks good!</div>
                                                    <div class="invalid-feedback">This field can't be empty</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>City</label>
                                                    <input class="form-control" name="city" value="<?= $user['city'] ?>" type="text" />
                                                    <div class="valid-feedback">Looks good!</div>
                                                    <div class="invalid-feedback">This field can't be empty</div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>State</label>
                                                    <input class="form-control" name="state" value="<?= $user['state'] ?>" type="text" />
                                                    <div class="valid-feedback">Looks good!</div>
                                                    <div class="invalid-feedback">This field can't be empty</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Country</label>
                                                    <input class="form-control" name="country" value="<?= $user['country'] ?>" type="text" />
                                                    <div class="valid-feedback">Looks good!</div>
                                                    <div class="invalid-feedback">This field can't be empty</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Notes</label>
                                        <input class="form-control" name="notes" value="<?= $user['notes'] ?>" type="text" />
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">This field can't be empty</div>
                                    </div>

                                </div>

                                <div class="pd-20 card-box mb-30">
                                    <p class="text-blue mb-30">Change Password</p>

                                    <div class="form-group">
                                        <label>Current Password</label>
                                        <div class="input-group">
                                            <input class="form-control" value="<?= $user['password'] ?>" type="text" id="current-password" disabled />
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" id="edit-password-btn" type="button">Edit</button>
                                            </div>
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
                                                $bgColor = 'background-color: #ffc107;'; // Yellow for Placed
                                                $iconClass = 'fas fa-box'; // Box icon for Placed
                                                ?>

                                                <div class="badge-icon" style="<?= $bgColor ?>">
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
                                                    $bgColor = 'background-color: #17a2b8;'; // Blue for Fulfilled
                                                    $iconClass = 'fas fa-truck'; // Truck icon for Fulfilled
                                                    ?>

                                                    <div class="badge-icon" style="<?= $bgColor ?>">
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
                                                    $bgColor = 'background-color: #007bff;'; // Blue for Delivered
                                                    $iconClass = 'fas fa-box'; // Box icon for Delivered
                                                    ?>

                                                    <div class="badge-icon" style="<?= $bgColor ?>">
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
                                                    $bgColor = 'background-color: #dc3545;'; // Red for Returned
                                                    $iconClass = 'fas fa-undo'; // Undo icon for Returned
                                                    ?>

                                                    <div class="badge-icon" style="<?= $bgColor ?>">
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
                                                <div class="badge-icon" style="background-color: <?= $order['email_send'] == 'yes' ? '#17a2b8' : '#ffc107' ?>;">
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

</body>
<!-- Footer View Start -->
<?= $this->include('footer_view') ?>
<!-- Footer View End -->

</html>