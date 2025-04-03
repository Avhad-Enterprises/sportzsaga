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
                <div class="pd-20 card-box mb-30">
                    <div class="clearfix">
                        <div class="pull-left">
                            <h4 class="text-blue h4">Edit Product-Collection</h4>
                            <p class="mb-30">Update Product-Collection Details</p>
                        </div>
                    </div>
                    <form id="editbundleform" method="post"
                        action="<?= base_url() ?>bundle/updateproductcollection/<?= $bundle['bundle_id'] ?>">
                        

                            <div class="d-flex justify-content-end">
                                <a href="<?= base_url() ?>bundle/bundle_product_logs/<?= $bundle['bundle_id'] ?>" 
                                    class="btn btn-outline-primary px-3 py-2 rounded-circle shadow-sm"
                                    data-toggle="tooltip" data-placement="top" title="View Bundle Line Logs">
                                    <i class="fa-solid fa-ellipsis-vertical fa-lg"></i>
                                </a>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm">
                                    <label for="bundle_name">Title</label>
                                    <input class="form-control" name="bundle_name" type="text" placeholder="Bundle Name"
                                        value="<?= esc($bundle['bundle_name']) ?>">
                                </div>
                            </div>

                        <!-- Selling Price -->
                            <div class="form-group row">
                                <div class="col-sm">
                                    <label for="bundle_price">Selling Price</label>
                                    <input class="form-control" name="selling_price" type="number"
                                        placeholder="Bundle Price" value="<?= esc($bundle['selling_price']) ?>">
                                </div>
                            </div>

                        <!-- Discount Type -->
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Discount Type</label>
                                <div class="col-sm-10">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="discount_type"
                                            id="discount_percent" value="percent" <?= $bundle['discount_type'] === 'percent' ? 'checked' : '' ?>>
                                        <label class="form-check-label" for="discount_percent">Percentage</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="discount_type"
                                            id="discount_value" value="value" <?= $bundle['discount_type'] === 'value' ? 'checked' : '' ?>>
                                        <label class="form-check-label" for="discount_value">Fixed Value</label>
                                    </div>
                                </div>
                            </div>
                        <!-- Discount Percentage -->
                            <div class="form-group row" id="percent-group"
                                style="<?= $bundle['discount_type'] === 'value' ? 'display: none;' : '' ?>">
                                <div class="col-sm">
                                    <label for="discount_percent_input">Discount Percentage</label>
                                    <input class="form-control" name="discount_percent_input" type="number"
                                        placeholder="Discount Percentage" min="0" max="100"
                                        value="<?= esc($bundle['discount_percent_input']) ?>">
                                </div>
                            </div>

                        <!-- Discount Value -->
                            <div class="form-group row" id="value-group"
                                style="<?= $bundle['discount_type'] === 'percent' ? 'display: none;' : '' ?>">
                                <div class="col-sm">
                                    <label for="discount_value_input">Discount Value</label>
                                    <input class="form-control" name="discount_value_input" type="number"
                                        placeholder="Discount Value" value="<?= esc($bundle['discount_value_input']) ?>">
                                </div>
                            </div>

                        <!-- Select Products -->
                            <div class="form-group row">
                                <div class="col-sm">
                                    <label for="selected_products">Select Product</label>
                                    <select class="form-control select2" name="selected_products[]" id="selected_products"
                                        multiple required>
                                        <?php if (!empty($products)): ?>
                                            <?php foreach ($products as $product): ?>
                                                <option value="<?= esc($product['product_id']); ?>"
                                                    data-price="<?= esc($product['cost_price']); ?>"
                                                    <?= in_array($product['product_id'], $selectedProducts) ? 'selected' : '' ?>>
                                                    <?= esc($product['product_title']); ?>
                                                </option>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <option disabled>No products available</option>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>

                        <!-- Select Collections -->
                            <div class="form-group row">
                                <div class="col-sm">
                                    <label for="selected_collection">Select Collections</label>
                                    <select class="form-control select2" name="selected_collection[]"
                                        id="selected_collection" multiple required>
                                        <?php if (!empty($collections)): ?>
                                            <?php foreach ($collections as $collection): ?>
                                                <option value="<?= esc($collection['collection_id']); ?>"
                                                    <?= in_array($collection['collection_id'], $selectedCollection) ? 'selected' : '' ?>>
                                                    <?= esc($collection['collection_title']); ?>
                                                </option>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <option disabled>No collections available</option>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>
                        <!-- Quantity -->
                            <div class="form-group row">
                                <div class="col-sm">
                                    <label for="quantity">Quantity</label>
                                    <input class="form-control" type="number" name="quantity" placeholder="Enter Quantity"
                                        min="1" value="<?= esc($bundle['quantity']) ?>">
                                </div>
                            </div>

                        <div class="form-group">
                            <button value="submit" class="btn btn-primary btn-lg">Update Bundle</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <!-- Footer View Start -->
    <?= $this->include('footer_view') ?>
    <!-- Footer View End -->

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const percentGroup = document.getElementById('percent-group');
            const valueGroup = document.getElementById('value-group');
            const discountTypeInputs = document.querySelectorAll('input[name="discount_type"]');

            discountTypeInputs.forEach(input => {
                input.addEventListener('change', function () {
                    if (this.value === 'percent') {
                        percentGroup.style.display = 'block';
                        valueGroup.style.display = 'none';
                    } else {
                        percentGroup.style.display = 'none';
                        valueGroup.style.display = 'block';
                    }
                });
            });
        });

        $(document).ready(function () {
            $('.select2').select2({
                placeholder: 'Search and select products',
                allowClear: true
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const selectedProduct = document.getElementById('selected_products');
            const sellingPriceField = document.querySelector('input[name="selling_price"]');

            sellingPriceField.readOnly = true;

            const updatePrice = () => {
                const selectedOption = selectedProduct.selectedOptions[0];

                if (selectedOption) {

                    const productPrice = parseFloat(selectedOption.getAttribute('data-price')) || 0;

                    sellingPriceField.value = productPrice.toFixed(2);
                } else {
                    sellingPriceField.value = '0.00';
                }
            };

            selectedProduct.addEventListener('change', updatePrice);

            updatePrice();
        });

    </script>



</body>



</html>