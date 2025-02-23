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
                                <h4>Inventory</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-box mb-30">
                    <div class="pd-20">
                        <h4 class="text-blue h4">Inventory Table</h4>
                    </div>
                    <div class="pb-20">
                        <!-- Element-1: Inventory Table -->
                        <table class="table hover multiple-select-row data-table-export">
                            <thead>
                                <tr>
                                    <th class="table-plus">ID</th>
                                    <th>Product</th>
                                    <th>Total Inventory</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($inventory as $inventorys) : ?>
                                    <tr>
                                        <td class="table-plus"><?= $inventorys['product_id'] ?></td>
                                        <td>
                                            <a class="b_line" href="<?= base_url(); ?>admin-products/editinventory/<?= $inventorys['product_id'] ?>">
                                                <?= $inventorys['product_title'] ?>
                                            </a>
                                        </td>
                                        <td>
                                            <span id="inventory-text-<?= $inventorys['product_id'] ?>">
                                                <?= $inventorys['inventory'] ?>
                                            </span>
                                        </td>
                                        <td>
                                            <div class="table-actions">
                                                <a href="javascript:;" class="edit-btn" data-id="<?= $inventorys['product_id'] ?>" data-title="<?= $inventorys['product_title'] ?>" style="color: #265ed7;">
                                                    <i class="icon-copy dw dw-edit2"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        
                        <!-- Inventory Edit Modal -->
                        <div id="inventoryModal" class="modal" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Inventory</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p id="product-name"></p>
                                        <label for="inventory-input-modal">New Inventory</label>
                                        <input type="number" id="inventory-input-modal" class="form-control" min="0">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary save-modal-btn">Save changes</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Export Datatable End -->
            </div>
        </div>
    </div>

    <!-- Footer View Start -->
    <?= $this->include('footer_view') ?>
    <!-- Footer View End -->
</body>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var inventoryModal = document.getElementById('inventoryModal');
        var productNameElement = document.getElementById('product-name');
        var inventoryInputModal = document.getElementById('inventory-input-modal');
        var currentProductId = null;
    
        // Handle the click event for the edit button
        document.querySelectorAll('.edit-btn').forEach(function(editButton) {
            editButton.addEventListener('click', function() {
                currentProductId = this.getAttribute('data-id');
                var productTitle = this.getAttribute('data-title');
                var currentInventory = document.getElementById('inventory-text-' + currentProductId).innerText.trim();
    
                // Set modal title and input field with current values
                productNameElement.innerText = 'Product: ' + productTitle;
                inventoryInputModal.value = currentInventory;
    
                // Show the modal
                $('#inventoryModal').modal('show');
            });
        });
    
        // Handle the save button inside the modal
        document.querySelector('.save-modal-btn').addEventListener('click', function() {
            var newInventory = inventoryInputModal.value;
    
            // Send the updated inventory to the server via AJAX
            fetch('<?= base_url('admin-products/updateinventory') ?>/' + currentProductId, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest',
                    },
                    body: JSON.stringify({
                        inventory: newInventory
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Update the inventory text with the new value
                        document.getElementById('inventory-text-' + currentProductId).innerText = newInventory;
    
                        // Close the modal
                        $('#inventoryModal').modal('hide');
                    } else {
                        alert('Failed to update inventory');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while updating inventory');
                });
        });
    });
</script>


</html>