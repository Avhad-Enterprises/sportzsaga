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
                <!-- Page Header -->
                <div class="clearfix mb-3">
                    <div class="pull-left d-flex align-items-center">
                        <button type="button" class="btn btn-secondary mr-3" onclick="goBack()">
                            <i class="fa fa-arrow-left"></i> Back
                        </button>
                        <h4 class="h4 mb-0">Add Inventory</h4>


                    </div>
                </div>

                <!-- Inventory Form -->
                <div class="pd-20 card-box mb-30">
                    <form id="addInventoryForm" method="post" action="<?= base_url('inventory/store') ?>">

                        <!-- Product Selection -->
                        <div class="d-flex align-items-center mb-3">
                            <label for="product_id" class="mr-2">Product Name</label>
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                data-target="#addProductModal">
                                Add (+)
                            </button>
                        </div>

                        <!-- Product Selection -->
                        <div class="form-group">
                            <select id="product_id" name="product_id" class="form-control" required>
                                <option value="">Select Product</option>
                                <?php foreach ($products as $product): ?>
                                    <option value="<?= $product['product_id'] ?>">
                                        <?= $product['product_title'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <!-- Dynamic Product Details -->
                        <div id="productDetails">
                            <div class="form-group">
                                <label for="sku">SKU</label>
                                <input type="text" id="sku" name="sku" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inner_barcode">Inner Barcode</label>
                                <input type="text" id="inner_barcode" name="inner_barcode" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="outer_barcode">Outer Barcode</label>
                                <input type="text" id="outer_barcode" name="outer_barcode" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="length">Length</label>
                                <input type="text" id="length" name="length" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="width">Width</label>
                                <input type="text" id="width" name="width" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="height">Height</label>
                                <input type="text" id="height" name="height" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="breadth">Breadth</label>
                                <input type="text" id="breadth" name="breadth" class="form-control">
                            </div>
                            <!-- Additional Product Details -->
                            <div class="form-group">
                                <label for="category">Category</label>
                                <input type="text" id="category" name="category" class="form-control"
                                    placeholder="Category (e.g., Electronics)" required>
                            </div>
                            <div class="form-group">
                                <label for="brand_name">Brand Name</label>
                                <input type="text" id="brand_name" name="brand_name" class="form-control"
                                    placeholder="Brand Name" required>
                            </div>
                            <div class="form-group">
                                <label for="supplier">Supplier</label>
                                <input type="text" id="supplier" name="supplier" class="form-control"
                                    placeholder="Supplier Name" required>
                            </div>
                            <div class="form-group">
                                <label for="supplier_item_code">Supplier Item Code</label>
                                <input type="text" id="supplier_item_code" name="supplier_item_code"
                                    class="form-control" placeholder="Supplier Item Code" required>
                            </div>
                            <div class="form-group">
                                <label for="base_unit">Base Unit of Measure</label>
                                <input type="text" id="base_unit" name="base_unit" class="form-control"
                                    placeholder="Base Unit (e.g., kg, pieces)" required>
                            </div>
                            <div class="form-group">
                                <label for="layer">Layer</label>
                                <input type="number" id="layer" name="layer" class="form-control"
                                    placeholder="Number of Layers in Pallet" required>
                            </div>
                            <div class="form-group">
                                <label for="pallet">Pallet</label>
                                <input type="number" id="pallet" name="pallet" class="form-control"
                                    placeholder="Items in a Pallet" required>
                            </div>
                            <div class="form-group">
                                <label for="manufacturer">Manufacturer</label>
                                <input type="text" id="manufacturer" name="manufacturer" class="form-control"
                                    placeholder="Manufacturer Name" required>
                            </div>
                            <div class="form-group">
                                <label for="manufacturer_location">Location of Manufacturer</label>
                                <input type="text" id="manufacturer_location" name="manufacturer_location"
                                    class="form-control" placeholder="Manufacturer Location" required>
                            </div>
                        </div>

                        <!-- Inventory Levels -->
                        <h5>Inventory Levels</h5>
                        <div class="form-group">
                            <label for="stock_quantity">Stock Quantity</label>
                            <input type="number" id="stock_quantity" name="stock_quantity" class="form-control"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="reorder_level">Reorder Level</label>
                            <input type="number" id="reorder_level" name="reorder_level" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="safety_stock">Safety Stock</label>
                            <input type="number" id="safety_stock" name="safety_stock" class="form-control" required>
                        </div>

                        <!-- Pricing and Valuation -->
                        <h5>Pricing and Valuation</h5>
                        <div class="form-group">
                            <label for="single_unit_price">Single Unit Price</label>
                            <input type="number" id="single_unit_price" name="single_unit_price" class="form-control"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="case_price">Case Price</label>
                            <input type="number" id="case_price" name="case_price" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="compare_at_price">Compare-at Price</label>
                            <input type="number" id="compare_at_price" name="compare_at_price" class="form-control">
                        </div>

                        <!-- Lot and Batch Tracking -->
                        <h5>Lot and Batch Tracking</h5>
                        <div class="form-group">
                            <label for="batch_number">Batch Number</label>
                            <input type="text" id="batch_number" name="batch_number" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="lot_number">Lot Number</label>
                            <input type="text" id="lot_number" name="lot_number" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="manufacturing_date">Manufacturing Date</label>
                            <input type="date" id="manufacturing_date" name="manufacturing_date" class="form-control"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="expiration_date">Expiration Date</label>
                            <input type="date" id="expiration_date" name="expiration_date" class="form-control">
                        </div>

                        <!-- Location Information -->
                        <h5>Location Information</h5>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Warehouse Name</th>
                                    <th>Location</th>
                                    <th>Inventory Count</th>
                                    <th>Storage Location</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($warehouses as $warehouse): ?>
                                    <tr>
                                        <td>
                                            <?= $warehouse['name'] ?>
                                            <input type="hidden" name="warehouse_ids[]" value="<?= $warehouse['id'] ?>">
                                        </td>
                                        <td><?= $warehouse['location'] ?></td>
                                        <td>
                                            <input type="number" name="inventory_counts[]" class="form-control" required>
                                        </td>
                                        <td>
                                            <input type="text" name="storage_locations[]" class="form-control">
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                        <!-- Compliance and Taxation -->
                        <h5>Compliance and Taxation</h5>
                        <div class="form-group">
                            <label for="vat_gst">GST Details</label>
                            <input type="text" id="vat_gst" name="vat_gst" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="state_gst">State-Wise GST</label>
                            <input type="text" id="state_gst" name="state_gst" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="custom_duty">Customs Duty</label>
                            <input type="text" id="custom_duty" name="custom_duty" class="form-control">
                        </div>

                        <!-- Custom Attributes -->
                        <h5>Custom Attributes</h5>
                        <div class="form-group">
                            <label for="origin">Origin of Product</label>
                            <input type="text" id="origin" name="origin" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="custom_labels">Custom Labels</label>
                            <input type="text" id="custom_labels" name="custom_labels" class="form-control">
                        </div>

                        <!-- Inventory Policies -->
                        <h5>Inventory Policies</h5>
                        <div class="form-group">
                            <label for="fifo_lifo">FIFO or LIFO</label>
                            <select id="fifo_lifo" name="fifo_lifo" class="form-control">
                                <option value="FIFO">FIFO (First-In, First-Out)</option>
                                <option value="LIFO">LIFO (Last-In, First-Out)</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="stock_rotation">Stock Rotation Policy</label>
                            <textarea id="stock_rotation" name="stock_rotation" class="form-control"></textarea>
                        </div>

                        <!-- Submit Button -->
                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary">Save Inventory</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?= $this->include('footer_view') ?>
    <script>
        function goBack() {
            window.history.back();
        }

        // Fetch product details via AJAX
        document.getElementById('product_id').addEventListener('change', function () {
            const productId = this.value;

            if (productId) {
                fetch(`<?= base_url('inventory/productDetails') ?>/${productId}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data) {
                            document.getElementById('sku').value = data.sku;
                            document.getElementById('inner_barcode').value = data.inner_barcode;
                            document.getElementById('length').value = data.length;
                            document.getElementById('width').value = data.width;
                            document.getElementById('height').value = data.height;
                            document.getElementById('breadth').value = data.breadth;
                            document.getElementById('outer_barcode').value = data.outer_barcode || '';
                        }
                    })
                    .catch(error => console.error('Error fetching product details:', error));
            } else {
                document.getElementById('sku').value = '';
                document.getElementById('inner_barcode').value = '';
                document.getElementById('length').value = '';
                document.getElementById('width').value = '';
                document.getElementById('height').value = '';
                document.getElementById('breadth').value = '';
            }
        });
    </script>


    <!-- Add Product Modal -->
    <div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="addProductModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addProductModalLabel">Add New Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addProductForm">
                        <div class="form-group">
                            <label for="product_title">Product Title</label>
                            <input type="text" id="product_title" name="product_title" class="form-control" required>
                        </div>
                        <div class="text-right">
                            <button type="button" class="btn btn-primary" id="saveProductButton">Save Product</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const saveProductButton = document.getElementById('saveProductButton');
            if (saveProductButton) {
                saveProductButton.addEventListener('click', function () {
                    const formElement = document.getElementById('addProductForm');
                    if (!formElement) {
                        console.error('Form element with ID "addProductForm" not found.');
                        return;
                    }

                    const formData = new FormData(formElement);

                    fetch('<?= base_url('product/storenewproduct') ?>', {
                        method: 'POST',
                        body: formData,
                    })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                const productDropdown = document.getElementById('product_id');
                                const newOption = document.createElement('option');
                                newOption.value = data.product.product_id;
                                newOption.text = data.product.product_title;
                                productDropdown.appendChild(newOption);
                                productDropdown.value = data.product.product_id;
                                $('#addProductModal').modal('hide');
                                formElement.reset();
                            } else {
                                alert('Error adding product: ' + data.message);
                            }
                        })
                        .catch(error => console.error('Error:', error));
                });
            }
        });


    </script>

    </div>
</body>

</html>