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
                                <h4>Order Management Table</h4>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 text-right blogs-imex">
                            <div class="dropdown">
                                <a class="btn btn-primary fw-bold" href="<?= base_url(); ?>ordermanagement/addneworder" role="button">
                                    Create Order
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-box mb-30">
                    <div class="pd-20">
                        <h4 class="text-blue h4">Orders</h4>
                    </div>
                    <div class="pb-20">
                        <table class="table hover data-table-export">
                            <thead>
                                <tr>
                                    <th class="table-plus">Number</th>
                                    <th>Customer</th>
                                    <th>Order Creation</th>
                                    <th>Fulfillment Status</th>
                                    <th>Item</th>
                                    <th>Vendors</th>
                                    <th>Delivery Price</th>
                                    <th>Return </th> <!-- New Column -->
                                    <th>Discount</th>
                                    <th class="datatable-nosort">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($orders as $order) : ?>
                                    <tr>
                                        <td><a class="b_line" href="<?= base_url(); ?>ordermanagement/editorder/<?= $order['order_id'] ?>"><?= $order['order_number'] ?></a></td>
                                        <td><?= $order['customer'] ?></td>
                                        <td><?php $date = new DateTime($order['created_at']);
                                            echo $date->format('d-M-Y');?></td>
                                        <td><?= $order['fulfillment_status'] ?></td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton<?= $order['order_id'] ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <?= count(explode(', ', $order['product_name'])) ?> items
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton<?= $order['order_id'] ?>">
                                                    <?php foreach (explode(', ', $order['product_name']) as $productTitle) : ?>
                                                        <a class="dropdown-item" href="#"><?= $productTitle ?></a>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
                                        </td>
                                        <!-- Vendors Column -->
                                        <td>
                                            <?php if (!empty($order['vendors'])) : ?>
                                                <div class="dropdown">
                                                    <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton<?= $order['order_id'] ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Select Vendor
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton<?= $order['order_id'] ?>">
                                                        <?php foreach ($order['vendors'] as $vendor) : ?>
                                                            <?php if ($vendor['pickup'] == 'Y' && $vendor['delivery'] == 'Y' && $vendor['cod'] == 'Y') : ?>
                                                                <a class="dropdown-item" href="#" 
                                                                data-vendor-id="<?= $vendor['id'] ?>" 
                                                                data-vendor-name="<?= $vendor['delivery_partner'] ?>" 
                                                                data-delivery-cost="<?= $vendor['cost'] ?>" 
                                                                data-discount="<?= $vendor['discount'] ?>"> <!-- Added data-discount -->
                                                                    <?= $vendor['delivery_partner'] ?> 
                                                                    (Delivery Cost: <?= $vendor['cost'] ?>, Discount: <?= $vendor['discount'] ?>%) <!-- Display info -->
                                                                </a>
                                                            <?php endif; ?>
                                                        <?php endforeach; ?>
                                                    </div>
                                                </div>
                                            <?php else : ?>
                                                <span>No Vendors Available</span>
                                            <?php endif; ?>
                                        </td>


                                      <!-- New Column for Delivery Cost -->
                                        <td class="delivery-cost">
                                            <?= empty($order['vendors']) ? '0' : (isset($order['vendors'][0]['cost']) ? $order['vendors'][0]['cost'] : '0') ?>
                                        </td>

                                        <!-- New Column for Return and Reverse -->
                                        <td>
                                            <?php
                                                $returnReverse = "No"; // Default to No
                                                if (!empty($order['vendors'])) {
                                                    foreach ($order['vendors'] as $vendor) {
                                                        // Check if the vendor has pickup enabled
                                                        if ($vendor['pickup'] == 'Y') {
                                                            $returnReverse = "Available";
                                                            break; // If any vendor can pick up, show "Yes"
                                                        }
                                                    }
                                                }
                                                echo $returnReverse;
                                            ?>
                                        </td>

                                        <!-- New Column for Discounts -->
                                        <td class="discount">
                                            <?= empty($order['vendors']) 
                                                ? '0%' 
                                                : (isset($order['vendors'][0]['discount']) 
                                                    ? $order['vendors'][0]['discount'] . '%' 
                                                    : '0%') ?>
                                        </td>


                                        <td>
                                            <div class="table-actions">
                                                <a href="javascript:void(0);" onclick="confirmorderDelete(<?= $order['order_id'] ?>)" data-color="#e95959"><i class="icon-copy dw dw-delete-3"></i></a>
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

<script>
$(document).ready(function() {
    // Handle vendor selection
    $('.dropdown-item').on('click', function() {
        var vendorName = $(this).data('vendor-name');
        var vendorId = $(this).data('vendor-id');
        var deliveryCost = $(this).data('delivery-cost');
        var discount = $(this).data('discount'); // Get discount from the clicked vendor
        var orderId = $(this).closest('tr').find('a.b_line').text();

        // Update the dropdown button text
        $(this).closest('.dropdown').find('.dropdown-toggle').text(vendorName);

        // Update the Delivery Cost column
        var deliveryCostCell = $(this).closest('tr').find('.delivery-cost');
        deliveryCostCell.text(deliveryCost);

        // Update the Discount column
        var discountCell = $(this).closest('tr').find('.discount');
        discountCell.text(discount);

        // Optionally send the vendor selection to the backend via AJAX
        /*
        $.ajax({
            url: 'your_backend_endpoint',
            method: 'POST',
            data: {
                order_id: orderId,
                vendor_id: vendorId
            },
            success: function(response) {
                console.log(response);
            }
        });
        */
    });

    // Set default delivery cost and discount to 0 if no vendor is selected
    $('td.delivery-cost, td.discount').each(function() {
        var currentValue = $(this).text();
        if (currentValue === "" || currentValue === 'No Vendors Available') {
            $(this).text("0");
        }
    });
});

</script>

</html>