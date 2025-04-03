<div class="left-side-bar">
    <div class="brand-logo">
        <a href="<?= base_url(); ?>">
            <img src="<?= base_url(); ?>images/logo.png" alt="" class="dark-logo" />
            <img src="<?= base_url(); ?>images/logo-light.png" alt="" class="light-logo" />
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
                <ul id="accordion-menu">
                    <?php
                    $accountType = session()->get('admin_type');
                    ?>

                    <?php if ($accountType === 'super_admin'): ?>
                        <li class="dropdown">
                            <a href="<?= base_url(); ?>dashboard" class="no-chevron dropdown-toggle">
                                <span class="micon bi bi-house"></span><span class="mtext">Home</span>
                            </a>
                        </li>
                        
                        <li class="dropdown">
                            <a href="<?= base_url(); ?>permissions_view" class="no-chevron dropdown-toggle">
                                <span class="micon bi bi-tags-fill"></span><span class="mtext">User Access</span>
                            </a>
                        </li>

                        <li class="dropdown">
                            <a href="<?= base_url(); ?>analytics" class="no-chevron dropdown-toggle">
                                <span class="micon bi bi-bar-chart-line"></span><span class="mtext">Analytics</span>
                            </a>
                        </li>

                        <li class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle">
                                <span class="micon bi bi-person-circle"></span><span class="mtext">Users</span>
                            </a>
                            <ul class="submenu">
                                <li><a href="<?= base_url(); ?>registeredusers">Customers</a></li>
                                <li><a href="<?= base_url(); ?>employee">Employee</a></li>
                                <li><a href="<?= base_url(); ?>company_view">Company</a></li>
                                <li><a href="<?= base_url(); ?>customer_segment_view">Customer Segment</a></li>
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle">
                                <span class="micon bi bi-gear-wide-connected"></span><span class="mtext">Customer
                                    Service</span>
                            </a>
                            <ul class="submenu">
                                <li><a href="<?= base_url(); ?>fetchConversations">Customer Service</a></li>
                                <li><a href="<?= base_url(); ?>statics">Statistics</a></li>
                                <!--<li><a href="<?= base_url(); ?>email">Emails</a></li>-->
                                <li><a href="<?= base_url(); ?>automations">Automations</a></li>
                                <li><a href="<?= base_url(); ?>supplier_list_view">Supplier</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="<?= base_url(); ?>admin_blogs" class="no-chevron dropdown-toggle">
                                <span class="micon bi bi-rss"></span><span class="mtext">Blogs</span>
                            </a>
                        </li>

                        <!-- <li class="dropdown">
                            <a href="<?= base_url(); ?>brands" class="no-chevron dropdown-toggle">
                                <span class="micon bi bi-bookmark-star-fill"></span><span class="mtext">Brand</span>
                            </a>
                        </li> -->
                        <li class="dropdown">
                            <a href="<?= base_url(); ?>tiers" class="no-chevron dropdown-toggle">
                                <span class="micon bi bi-tags-fill"></span><span class="mtext">Tiers</span>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle">
                                <span class="micon bi bi-shop"></span><span class="mtext">Bundle </span>
                            </a>
                            <ul class="submenu">
                                <li><a href="<?= base_url(); ?>bundle_view">Bundle </a></li>
                                <li><a href="<?= base_url(); ?>bundlecollection_view">Bundle Lines</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="<?= base_url(); ?>giftcard_view" class="no-chevron dropdown-toggle">
                                <span class="micon bi bi-gift"></span><span class="mtext">Gift card</span>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle">
                                <span class="micon bi bi-archive"></span><span class="mtext">Products</span>
                            </a>
                            <ul class="submenu">
                                <li><a href="<?= base_url(); ?>admin-products">Products</a></li>
                                <li><a href="<?= base_url(); ?>pincode-mapping">Pincode Mapping</a></li>
                                <li><a href="<?= base_url(); ?>collections">Collections</a></li>
                                <li><a href="<?= base_url(); ?>catalog_view">Catalogs </a></li>
                                <li><a href="<?= base_url(); ?>relatedproduct_table_view">Related Product</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle">
                                <span class="micon bi bi-shop"></span><span class="mtext">Inventory Managment</span>
                            </a>
                            <ul class="submenu">
                                <li><a href="<?= base_url(); ?>inventory_list_view">Inventory</a></li>
                                <li><a href="<?= base_url(); ?>transfer_inventory_view">Transfer</a></li>
                                <li><a href="<?= base_url(); ?>po_list_view">Purchase order</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="<?= base_url(); ?>discountcodegenerator" class="no-chevron dropdown-toggle">
                                <span class="micon dw dw-invoice"></span><span class="mtext">Discount Code</span>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="<?= base_url(); ?>generate_report" class="no-chevron dropdown-toggle">
                                <span class="micon bi bi-graph-up-arrow"></span><span class="mtext">Reports</span>
                            </a>
                        </li>

                        <li class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle">
                                <span class="micon bi bi-shop-window"></span><span class="mtext">Order Management</span>
                            </a>
                            <ul class="submenu">
                                <li><a href="<?= base_url(); ?>ordermanagement">Order</a></li>
                                <li><a href="<?= base_url(); ?>abandoned_view">Abandoned Order</a></li>
                                <li><a href="<?= base_url(); ?>draft_orders_view">Draft Order</a></li>
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle">
                                <span class="micon bi bi-box"></span><span class="mtext">Shipments</span>
                            </a>
                            <ul class="submenu">
                                <li><a href="<?= base_url(); ?>bluedart_management">Bluedart</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="<?= base_url(); ?>online_store" class="no-chevron dropdown-toggle">
                                <span class="micon bi bi-shop"></span><span class="mtext">Online Store</span>
                            </a>
                        </li>
                        <!-- <li class="dropdown">
                            <a href="<?= base_url(); ?>getUserEventsdata" class="no-chevron dropdown-toggle">
                                <span class="micon bi bi-search"></span><span class="mtext">Search & Discovery</span>
                            </a>
                        </li>-->


                    <?php elseif ($accountType === 'employee'): ?>
                        <li class="dropdown">
                            <a href="<?= base_url(); ?>dashboard" class="no-chevron dropdown-toggle">
                                <span class="micon bi bi-house"></span><span class="mtext">Home</span>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle">
                                <span class="micon bi bi-person-circle"></span><span class="mtext">Users</span>
                            </a>
                            <ul class="submenu">
                                <li><a href="<?= base_url(); ?>registeredusers">Customers</a></li>
                                <li><a href="<?= base_url(); ?>employee">Employee</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle">
                                <span class="micon bi bi-gear-wide-connected"></span><span class="mtext">Customer
                                    Service</span>
                            </a>
                            <ul class="submenu">
                                <li><a href="<?= base_url(); ?>fetchConversations">Customer Service</a></li>
                                <li><a href="<?= base_url(); ?>statics">Statistics</a></li>
                                <!-- <li><a href="<?= base_url(); ?>email">Emails</a></li>  -->
                                <li><a href="<?= base_url(); ?>automations">Automations</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="<?= base_url(); ?>admin_blogs" class="no-chevron dropdown-toggle">
                                <span class="micon bi bi-rss"></span><span class="mtext">Blogs</span>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="<?= base_url(); ?>brands" class="no-chevron dropdown-toggle">
                                <span class="micon bi bi-bookmark-star-fill"></span><span class="mtext">Brand</span>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="<?= base_url(); ?>tiers" class="no-chevron dropdown-toggle">
                                <span class="micon bi bi-tags-fill"></span><span class="mtext">Tiers</span>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle">
                                <span class="micon bi bi-archive"></span><span class="mtext">Products</span>
                            </a>
                            <ul class="submenu">
                                <li><a href="<?= base_url(); ?>admin-products">Products </a></li>
                                <li><a href="<?= base_url(); ?>admin-products/pincode-mapping">Pincode Mapping</a></li>
                                <li><a href="<?= base_url(); ?>admin-products/collections">Collections</a></li>
                                <li><a href="<?= base_url(); ?>admin-products/inventory">Inventory </a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle">
                                <span class="micon bi bi-shop"></span><span class="mtext">Inventory Managment</span>
                            </a>
                            <ul class="submenu">
                                <li><a href="<?= base_url(); ?>inventory_list_view">Inventory</a></li>
                                <li><a href="<?= base_url(); ?>transfer_inventory_view">Transfer</a></li>
                                <li><a href="<?= base_url(); ?>po_list_view">Purchase order</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="<?= base_url(); ?>discount_code_view" class="no-chevron dropdown-toggle">
                                <span class="micon dw dw-invoice"></span><span class="mtext">Discount Code</span>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="<?= base_url(); ?>generate_report" class="no-chevron dropdown-toggle">
                                <span class="micon bi bi-graph-up-arrow"></span><span class="mtext">Reports</span>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="<?= base_url(); ?>ordermanagement" class="no-chevron dropdown-toggle">
                                <span class="micon bi bi-bag-dash-fill"></span><span class="mtext">Orders</span>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle">
                                <span class="micon bi bi-box"></span><span class="mtext">Shipments Partners</span>
                            </a>
                            <ul class="submenu"> <!-- Add a submenu container -->
                                <li><a href="<?= base_url(); ?>bluedart_management">Bluedart</a></li>
                                <!-- <li><a href="<?= base_url(); ?>shipment_view">Shipment</a></li> -->
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="<?= base_url(); ?>online_store" class="no-chevron dropdown-toggle">
                                <span class="micon bi bi-shop"></span><span class="mtext">Online Store</span>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </ul>
        </div>
    </div>
    <div class="sidebar-footer">
        <a href="<?= base_url(); ?>setting" class="btn btn-primary btn-block">
            <span class="micon bi bi-gear"></span> <span class="mtext">Settings</span>
        </a>
    </div>
</div>