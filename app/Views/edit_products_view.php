<!-- Head View Start -->
<?= $this->include('head_view') ?>
<!-- Head View End -->

<body>

    <!-- Full Page Loader -->
    <div id="loaderOverlay" class="loader-overlay" style="display: none;">
        <div class="loadingspinner">
            <div id="square1"></div>
            <div id="square2"></div>
            <div id="square3"></div>
            <div id="square4"></div>
            <div id="square5"></div>
        </div>
    </div>

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

                <?php foreach ($products as $product) : ?>
                    <form action="<?= base_url('admin_products/updateproduct/' . $product['product_id']) ?>" id="EditNewProductsForm" class="validate-form" method="post" enctype="multipart/form-data">

                        <div class="mb-3 d-flex justify-content-between align-items-center">
                            <div>
                                <!-- Back Link -->
                                <a href="javascript:void(0);" class="mx-2" onclick="goBack()">
                                    <i class="fa-solid fa-arrow-right fa-flip-horizontal"></i>
                                </a>
                            </div>
                            <button value="submit" class="btn btn-primary btn-lg">
                                Update
                            </button>
                        </div>

                        <div class="d-flex justify-content-end">
                            <a href="<?= base_url() ?>admin-products/admin-products_logs/<?= $product['product_id'] ?>"
                                class="btn btn-outline-primary rounded-circle shadow-sm d-flex align-items-center justify-content-center"
                                style="width: 32px; height: 32px;"
                                data-toggle="tooltip"
                                data-placement="top"
                                title="View Product Logs">
                                <i class="fa-solid fa-ellipsis-vertical fa-sm"></i>
                            </a>
                        </div>

                        <div class="row">
                            <div class="col-md-8">
                                <div class="pd-20 card-box mb-30">
                                    <p class="text-blue">Product Details</p>
                                    <div class="form-group">
                                        <label>Product Title</label>
                                        <input class="form-control validate-required validate-minLength" data-error-message-required="Title is required!" data-min-length="60" value="<?= $product['product_title'] ?>" name="product-name" type="text" placeholder="Name of the Product">
                                    </div>

                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>Secondary Title</label>
                                                <input class="form-control validate-required validate-minLength"
                                                    data-error-message-required="Secondary Title is required!"
                                                    minlength="30"
                                                    name="second-name"
                                                    type="text"
                                                    placeholder="Secondary Title"
                                                    value="<?= $product['secondary_title'] ?>">
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Size</label>
                                                <input class="form-control validate-required"
                                                    data-error-message-required="Size is required!"
                                                    name="product-size"
                                                    type="text"
                                                    placeholder="Size"
                                                    value="<?= $product['size'] ?>">
                                            </div>
                                        </div>

                                        <div class="col-md">
                                            <div class="form-group">
                                                <label>Accessories</label>
                                                <div class="custom-control custom-checkbox mb-5">
                                                    <input type="checkbox" name="accessories-checked" class="custom-control-input" id="customCheck1-1" value="<?= $product['accessories'] ?>"
                                                        <?= isset($product['accessories']) && $product['accessories'] == 1 ? 'checked' : '' ?>>
                                                    <label class="custom-control-label" for="customCheck1-1"></label>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Includes Field (Hidden if Accessories is not checked) -->
                                        <div class="col-md-8" id="includesSection" style="display: <?= isset($product['accessories']) && $product['accessories'] == 1 ? 'block' : 'none' ?>;">
                                            <div class="form-group">
                                                <label>Includes</label>
                                                <input class="form-control validate-required"
                                                    data-error-message-required="Include is required!"
                                                    name="product-include"
                                                    type="text"
                                                    placeholder="Include Accessories"
                                                    value="<?= isset($product['accessories_includes']) ? esc($product['accessories_includes']) : '' ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="validationTextarea" class="form-label">Short Description</label>
                                        <textarea class="form-control validate-required resizable-textarea" data-error-message-required="Meta Description is required!"
                                            name="product-short-description" id="product-description" name="product-short-description"><?= $product['short_description'] ?></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="product-description" class="form-label">Product Description</label>
                                        <textarea id="editor" name="product-description" class="form-control"><?= $product['product_description'] ?></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>Primary Image</label>
                                        <div class="dropzone-area">
                                            <input type="file" name="product-new-image" accept="image/*" class="" />
                                            <input type="hidden" name="product-current-image" value="<?= $product['product_image'] ?>" />
                                            <?php if (!empty($product['product_image'])): ?>
                                                <img src="<?= $product['product_image'] ?>" class="border-radius-500 " width="200" height="200" alt="Product Image" />
                                            <?php endif; ?>
                                        </div>
                                        <div class="dropzone-description">
                                            <span>Supported formats: JPEG, JPG, PNG, WEBP, Size: 505 x 650 px.</span><br>
                                            <span>Size: 505 x 650 px.</span><br>
                                            <span>Max file size: 400kb</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="pd-20 card-box mb-30">
                                    <p class="text-blue">Product Prices</p>
                                    <div class="row">
                                        <div class="col-md">
                                            <label>Cost Price</label>
                                            <input type="number" value="<?= $product['cost_price'] ?>" name="cost-price" placeholder="Cost Price" data-error-message-required="Enter Cost Price!" class="form-control validate-required">
                                        </div>
                                        <div class="col-md">
                                            <div class="rupees">
                                                <label>Selling Price</label>
                                                <input type="number" value="<?= $product['selling_price'] ?>" name="selling-price" placeholder="Selling Price" data-error-message-required="Enter Selling Price!" class="form-control validate-required">
                                            </div>
                                        </div>
                                        <div class="col-md">
                                            <div class="form-group">
                                                <label>Compare at Price</label>
                                                <input type="number" value="<?= $product['compare_at_price'] ?>" name="compare-at-price" placeholder="Compare at Price" data-error-message-required="Enter Compare at Price!" class="form-control validate-required">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>SKU</label>
                                                <input type="text" name="sku" value="<?= $product['sku'] ?>" placeholder="SKU" data-error-message-required="Enter Unique SKU!" class="form-control validate-required">
                                                <small>Must be unique Everytime</small>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Barcode</label>
                                                <input type="text" name="barcode" value="<?= $product['barcode'] ?>" placeholder="Enter Barcode" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Inventory</label>
                                                <input type="number" id="total-inventory" value="<?= $product['inventory'] ?>" name="total_inventory" placeholder="Total Inventory" data-error-message-required="Inventory!" class="form-control validate-required">
                                                <small>Total Inventory</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="pd-20 card-box mb-30">
                                    <p class="text-blue">Categorization</p>
                                    <div class="row">
                                        <!-- Tier-1 Dropdown -->
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Tier-1</label>
                                                <select class="form-control validate-required" name="tier-1" id="tier-1" style="width: 100%; height: 38px;">
                                                    <option value="">Select</option>
                                                    <?php foreach ($tiers as $tier): ?>
                                                        <option value="<?= $tier['tier_1_id'] ?>" <?= $tier['tier_1_id'] == $product['tier_1'] ? 'selected' : '' ?>>
                                                            <?= $tier['tier_name'] ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Tier-2 Dropdown -->
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Tier-2</label>
                                                <select class="form-control" name="tier-2" id="tier-2" style="width: 100%; height: 38px;">
                                                    <option value="">Select</option>
                                                    <?php foreach ($tier_2 as $tier2): ?>
                                                        <option value="<?= $tier2['tier_2_id'] ?>" <?= $tier2['tier_2_id'] == $product['tier_2'] ? 'selected' : '' ?>>
                                                            <?= $tier2['tier_name'] ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Tier-3 Dropdown -->
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Tier-3</label>
                                                <select class="form-control" name="tier-3" id="tier-3" style="width: 100%; height: 38px;">
                                                    <option value="">Select</option>
                                                    <?php foreach ($tier_3 as $tier3): ?>
                                                        <option value="<?= $tier3['tier_3_id'] ?>" <?= $tier3['tier_3_id'] == $product['tier_3'] ? 'selected' : '' ?>>
                                                            <?= $tier3['tier_name'] ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Tier-4 Dropdown -->
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Tier-4</label>
                                                <select class="form-control" name="tier-4" id="tier-4" style="width: 100%; height: 38px;">
                                                    <option value="">Select</option>
                                                    <?php foreach ($tier_4 as $tier4): ?>
                                                        <option value="<?= $tier4['tier_4_id'] ?>" <?= $tier4['tier_4_id'] == $product['tier_4'] ? 'selected' : '' ?>>
                                                            <?= $tier4['tier_name'] ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="pd-20 card-box mb-30">
                                    <p class="text-blue">Product Images</p>

                                    <!-- Hidden Input for more_images -->
                                    <input type="hidden" name="more_images_data" id="more-images-data" value="<?= esc($product['more_images']) ?>">
                                    <!-- Hidden Input for removed images -->
                                    <input type="hidden" name="removed_images" id="removed-images" value="">

                                    <!-- Display Current Images -->
                                    <div id="current-images" class="row mb-3">
                                        <?php if (!empty($product['more_images'])): ?>
                                            <?php
                                            $currentImages = json_decode($product['more_images'], true);
                                            foreach ($currentImages as $index => $image):
                                            ?>
                                                <div class="col-md-2 image-upload-row">
                                                    <div class="form-group">
                                                        <img src="<?= esc($image) ?>" class="img-thumbnail" width="200" alt="Image <?= $index + 1 ?>">
                                                    </div>
                                                    <button type="button" class="btn btn-sm btn-danger mt-2 remove-current-image" data-url="<?= esc($image) ?>">
                                                        <i class="fa fa-times"></i> Remove
                                                    </button>
                                                </div>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <p>No current images available.</p>
                                        <?php endif; ?>
                                    </div>
                                </div>


                                <div class="pd-20 card-box mb-30">
                                    <p class="text-blue">Add New Images</p>
                                    <div id="image-upload-container" class="row">
                                        <div class="col-md-6 image-upload-row">
                                            <div class="form-group">
                                                <div class="d-flex align-items-center flex-column mb-3">
                                                    <input type="file" name="additional_images[]" accept="image/*" class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <small>Formats: JPG, PNG, JPEG, Required Size: 990 x 1272 px.</small>
                                    <button type="button" id="add-more-images" class="btn btn-sm btn-dark d-flex align-items-center">
                                        <i class="fa fa-plus mr-2"></i> Add
                                    </button>
                                </div>

                                <!-- FAQ Section -->
                                <div class="pd-20 card-box mb-30">
                                    <div class="form-group">
                                        <label for="faq_section">Product FAQs</label>
                                        <div id="faq-section">
                                            <!-- Decode the 'faqs' JSON string -->
                                            <?php
                                            // Check if 'faqs' field exists and decode it
                                            if (!empty($product['faqs'])) {
                                                $faqs = json_decode($product['faqs'], true); // Decode JSON into an array
                                            } else {
                                                $faqs = []; // If no FAQ, set to an empty array
                                            }
                                            ?>

                                            <!-- Loop through existing FAQs from the decoded array -->
                                            <?php if (!empty($faqs)): ?>
                                                <?php foreach ($faqs as $index => $faq): ?>
                                                    <div class="faq-item" data-index="<?= $index ?>">
                                                        <label>FAQ #<?= $index + 1 ?></label> <!-- Display the FAQ number -->
                                                        <input type="text" name="faq_question[]" class="form-control" placeholder="Question"
                                                            value="<?= esc($faq['question']) ?>" required>
                                                        <label>Answer</label>
                                                        <textarea name="faq_answer[]" class="resizable-textarea form-control" placeholder="Answer"
                                                            required><?= esc($faq['answer']) ?></textarea>
                                                        <button type="button" class="btn btn-danger remove-faq-btn" data-index="<?= $index ?>">Remove</button>
                                                    </div>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </div>
                                        <button type="button" class="btn btn-outline-dark mt-2" id="add-faq-btn"><i class="fa-solid fa-plus"></i></button>
                                    </div>
                                </div>

                                <!-- Product Variant Section -->
                                <!-- <div class="pd-20 card-box mb-30">
                                    <div class="form-group">
                                        <label>Select Product Variant</label>

                                        <?php
                                        $selectedVariants = !empty($product['product_variant']) ? json_decode($product['product_variant'], true) : [];
                                        ?>

                                        <select class="custom-select2 form-control" id="productVariantDropdown" multiple="multiple" style="width: 100%; height: 38px">
                                            <optgroup label="Select Products">
                                                <?php foreach ($all_products as $allproduct): ?>
                                                    <option value="<?= $allproduct['product_id'] ?>" <?= in_array($allproduct['product_id'], $selectedVariants) ? 'selected' : '' ?>>
                                                        <?= $allproduct['product_title'] ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </optgroup>
                                        </select>

                                        <div class="form-group my-3 mx-3">
                                            <input type="hidden" id="selectedVariants" name="selected_variants" value='<?= json_encode($selectedVariants) ?>'>
                                            <div class="row" id="selectedProductsContainer"></div>
                                        </div>
                                    </div>
                                </div> -->

                                <div class="pd-20 card-box mb-30">
                                    <!-- SERP Preview -->
                                    <div class="serp-preview mb-30">
                                        <p class="serp-title toggle-seo-content" id="serp-title-preview"><?= $product['meta_tag_title'] ?>
                                            <i class="fa fa-chevron-down ml-2" id="toggle-icon"></i>
                                        </p>
                                        <p class="serp-url" id="serp-url-preview"><?= base_url('products/' . $product['url']) ?></p>
                                        <p class="serp-description" id="serp-description-preview"><?= $product['meta_tag_description'] ?></p>
                                    </div>
                                    <p class="text-blue">

                                    </p>
                                    <div id="seo-content" class="seo-content">
                                        <!-- URL Field -->
                                        <div class="form-group">
                                            <label>URL</label>
                                            <input type="text" value="<?= $product['url'] ?>" class="form-control seo-input" name="url" id="seo-url" placeholder="sample-url">
                                            <span id="seo-url-feedback" class="text-danger" style="display: none;">This URL is already in use.</span>
                                            <span id="seo-url-available" class="text-success" style="display: none;">This URL is available.</span>
                                        </div>

                                        <!-- Meta-Tag Field -->
                                        <div class="form-group">
                                            <label>Meta Title</label>
                                            <input type="text" value="<?= $product['meta_tag_title'] ?>" class="form-control seo-input" name="meta-tag" id="seo-title" placeholder="sample-meta-tag">
                                        </div>

                                        <!-- Meta-Description Field -->
                                        <div class="form-group">
                                            <label>Meta Description</label>
                                            <textarea class="form-control resizable-textarea seo-input" name="meta-description" id="seo-description"><?= $product['meta_tag_description'] ?></textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-sm">
                                <div class="pd-20 card-box mb-30">
                                    <p class="text-blue">Amazon</p>
                                    <div class="form-group">
                                        <label for="end_date_and_time">Amazon Product Id</label>
                                        <input type="text" name="amz_product_id" id="amz_product_id" value="<?= $product['amz_product_id'] ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="pd-20 card-box mb-30">
                                    <p class="text-blue">Product Publishing</p>
                                    <div class="form-group">
                                        <label>Product Status</label>
                                        <select class="custom-select2 form-control validate-required"
                                            data-error-message-required="Please select a Product Status."
                                            id="product-status" name="product-status" style="width: 100%; height: 38px">
                                            <option value="">Select Status</option>
                                            <option value="active" <?= $product['product_status'] == 'active' ? 'selected' : '' ?>>Active</option>
                                            <option value="inactive" <?= $product['product_status'] == 'inactive' ? 'selected' : '' ?>>Inactive</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="selectOption" class="form-label">Sales Channel
                                            <span data-bs-toggle="tooltip" data-bs-placement="top" title="Choose where the product is sold or promoted (e.g., Web, Apps, Instagram, Facebook)">
                                                <i class="fa-solid fa-circle-question"></i>
                                            </span>
                                        </label>
                                        <select id="sale-channel" class="validate-required form-control" data-error-message-required="Please select a Sales Channel." name="sales-channel" style="width: 100%; height: 38px">
                                            <option value="online-store" <?= $product['sales_channel'] == 'online-store' ? 'selected' : '' ?>>Website</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="pd-20 card-box mb-30">
                                    <p class="text-blue">Dimensions</p>
                                    <div class="form-group mr-2">
                                        <label for="length">Enter length (cm)</label>
                                        <input
                                            type="number"
                                            name="length_num"
                                            id="length"
                                            value="<?= $product['length'] ?>"
                                            class="form-control"
                                            required
                                            min="0"
                                            step="0.01"
                                            placeholder="Enter length">
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter a valid length.</div>
                                    </div>
                                    <div class="form-group mr-2">
                                        <label for="breadth">Enter breadth (cm)</label>
                                        <input
                                            type="number"
                                            name="breadth_num"
                                            id="breadth"
                                            value="<?= $product['breadth'] ?>"
                                            class="form-control"
                                            required
                                            min="0"
                                            step="0.01"
                                            placeholder="Enter breadth">
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter a valid breadth.</div>
                                    </div>
                                    <div class="form-group mr-2">
                                        <label for="height">Enter height (cm)</label>
                                        <input
                                            type="number"
                                            name="height_num"
                                            id="height"
                                            value="<?= $product['height'] ?>"
                                            class="form-control"
                                            required
                                            min="0"
                                            step="0.01"
                                            placeholder="Enter height">
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter a valid height.</div>
                                    </div>
                                    <div class="form-group mr-2">
                                        <label for="weight">Enter Weight (Kg)</label>
                                        <input
                                            type="number"
                                            name="weight_num"
                                            id="weight"
                                            value="<?= $product['weight'] ?>"
                                            class="form-control"
                                            required
                                            min="0"
                                            step="0.01"
                                            placeholder="Enter weight">
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter a valid weight.</div>
                                    </div>

                                </div>

                                <div class="">
                                    <div class="pd-20 card-box mb-30">
                                        <p class="text-blue">Product Features</p>
                                        <div class="d-flex justify-content-between align-items-center" style="max-width: 100%;">
                                            <div class="form-group mr-2" style="flex: 1;">
                                                <label for="gift_wrap" class="form-label">Gift Wrap <span><i class="fa-solid fa-gift"></i></span></label>
                                                <select name="gift_wrap" id="gift_wrap" name="gift_wrap" class="form-control" style="width: 100%; height: 38px;">
                                                    <option value="">Select</option>
                                                    <option value="yes">Yes</option>
                                                    <option value="no" selected>No</option>
                                                </select>
                                            </div>
                                            <div class="form-group mr-2" id="label-field" style="flex: 1;">
                                                <label for="label" class="form-label">Label
                                                    <span data-bs-toggle="tooltip" data-bs-placement="top" title="Enter product label (e.g., Limited Edition, Exclusive, New, etc.)">
                                                        <i class="fa-solid fa-circle-question"></i>
                                                    </span>
                                                </label>
                                                <input type="text" placeholder="Label" class="form-control" name="product_label" value="<?= $product['label'] ?>" style="width: 100%; height: 38px;">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Bullet Points Section -->
                                <div class="pd-20 card-box mb-30">
                                    <div class="form-group">
                                        <p class="text-blue">Bullet Points</p>
                                        <div class="mb-20">
                                            <?php
                                            $bulletPointsArray = json_decode($bullet_points, true) ?? [];
                                            $bulletPointsValue = implode(',', array_filter($bulletPointsArray, 'trim'));
                                            ?>
                                            <input type="text" class="form-control" data-role="tagsinput" id="product-bullet-points" name="product-bullet-points" placeholder="Add Bullet Points" value="<?= esc($bulletPointsValue); ?>" />
                                        </div>
                                    </div>
                                </div>

                                <div class="pd-20 card-box mb-30">
                                    <div class="form-group">
                                        <label>Add Tags</label>
                                        <div class="input-group">
                                            <?php
                                            $selectedTags = json_decode($product['product_tags'], true);
                                            ?>
                                            <?php if (!empty($tags)): ?>
                                                <select class="custom-select2 custom-select-tags form-control" name="product-tags[]" multiple="multiple" style="width: 80%">
                                                    <optgroup label="Available Tags">
                                                        <?php foreach ($tags as $tag): ?>
                                                            <option value="<?= esc($tag['tag_value']) ?>"
                                                                <?= (!empty($selectedTags) && in_array($tag['tag_value'], $selectedTags)) ? 'selected' : '' ?>>
                                                                <?= esc($tag['tag_name']) ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </optgroup>
                                                </select>
                                            <?php else: ?>
                                                <p class="text-danger">No tags available</p>
                                            <?php endif; ?>
                                        </div>
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#multiSelectProductModal">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="pd-20 card-box mb-30">
                                    <p class="text-blue">Preorder</p>
                                    <div class="form-group">
                                        <label>Preorder tag</label>
                                        <select class="custom-select2 form-control" id="preorder-tag" name="preorder-tag" style="width: 100%; height: 38px">
                                            <option value="">Select</option>
                                            <option value="yes" <?= $product['preorder_tag'] == 'yes' ? 'selected' : '' ?>>Yes</option>
                                            <option value="no" <?= $product['preorder_tag'] == 'no' ? 'selected' : '' ?>>No</option>
                                        </select>
                                    </div>
                                    <div class="form-group" id="preorder-date-container" style="display: <?= $product['preorder_tag'] == 'yes' ? 'block' : 'none' ?>;">
                                        <label>Preorder Date</label>
                                        <input type="date" class="form-control" value="<?= $product['preorder_date'] ?>" name="preorder_date" id="preorder-date">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                <?php endforeach; ?>

            </div>
        </div>

        <!-- Modal to Add New Product -->
        <div class="modal fade" id="multiSelectProductModal" tabindex="-1" role="dialog" aria-labelledby="multiSelectProductModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="multiSelectProductModalLabel">Add New Product</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="addMultiSelectProductForm">
                            <div class="form-group">
                                <label for="newProductName">Product Name</label>
                                <input type="text" class="form-control" id="newProductName" placeholder="Enter new product name">
                            </div>
                            <div class="form-group">
                                <label for="newProductValue">Product Value</label>
                                <input type="text" class="form-control" id="newProductValue" placeholder="Product value">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="addNewProduct">Add</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                document.getElementById("addNewProduct").addEventListener("click", function(event) {
                    event.preventDefault();

                    var productName = $.trim($("#newProductName").val());
                    var productValue = $.trim($("#newProductValue").val());

                    if (productName === "" || productValue === "") {
                        alert("Please enter both Product Name and Product Value.");
                        return;
                    }

                    console.log("Submitting product:", productName, productValue);

                    $.ajax({
                        url: "<?= base_url('products/AddNewProductTags') ?>",
                        type: "POST",
                        data: {
                            product_name: productName,
                            product_value: productValue,
                            "<?= csrf_token() ?>": "<?= csrf_hash() ?>"
                        },
                        dataType: "json",
                        success: function(response) {
                            console.log("AJAX Response:", response);

                            if (response.status === "success") {
                                $(".custom-select-products").append('<option value="' + productValue + '" selected>' + productName + '</option>');
                                $(".custom-select-products").trigger("change");

                                $("#multiSelectProductModal").modal("hide");

                                $("#newProductName").val("");
                                $("#newProductValue").val("");

                                alert("Product added successfully!");
                            } else {
                                alert(response.message || "Failed to add product. Please try again.");
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error("AJAX Error:", xhr.responseText);
                            alert("Error: " + xhr.responseText);
                        }
                    });
                });

                if ($.fn.select2) {
                    $(".custom-select2").select2({
                        placeholder: "Select products",
                        allowClear: true
                    });
                }
            });
        </script>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                let productNameInput = document.getElementById("newProductName");
                let productValueInput = document.getElementById("newProductValue");

                productNameInput.addEventListener("input", function() {
                    let productName = productNameInput.value.trim().toLowerCase();
                    let productValue = productName.replace(/\s+/g, "-");
                    productValueInput.value = productValue;
                });
            });
        </script>

        <!--chaitanya text editor -->
        <script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js"></script>

        <!-- Footer View Start -->
        <?= $this->include('footer_view') ?>
        <!-- Footer View End -->

        <script>
            document.querySelector("#product-description").addEventListener("keydown", function(e) {
                if (e.key === "Enter") {
                    e.stopPropagation();
                    e.preventDefault();
                    this.value += "\n";
                }
            });
        </script>

        <script>
            // Initialize the FormValidator
            new FormValidator('#EditNewProductsForm', {
                onSuccess: (form) => {
                    // Show the loader
                    document.getElementById('loaderOverlay').style.display = 'flex';

                    // Submit the form programmatically
                    form.submit();
                },
            });
        </script>
        <!-- Page Main Content End -->

</body>

<script>
    $(document).ready(function() {
        // Tier-1 Change Event
        $('#tier-1').on('change', function() {
            var tier1ID = $(this).val();
            if (tier1ID) {
                $('#tier-2').attr('disabled', true);

                // AJAX Request to Fetch Tier-2 Data
                $.ajax({
                    url: '<?= base_url('tiers/get_tier2') ?>',
                    type: 'POST',
                    data: {
                        tier_1_id: tier1ID
                    },
                    dataType: 'json',
                    success: function(response) {
                        $('#tier-2').attr('disabled', false).html('<option value="">Select</option>');
                        $.each(response, function(key, value) {
                            $('#tier-2').append('<option value="' + value.tier_2_id + '">' + value.tier_name + '</option>');
                        });
                    },
                    error: function() {
                        alert('Error fetching Tier-2 data. Please try again.');
                    }
                });
            } else {
                $('#tier-2').attr('disabled', true).html('<option value="">Select</option>');
                $('#tier-3').attr('disabled', true).html('<option value="">Select</option>');
                $('#tier-4').attr('disabled', true).html('<option value="">Select</option>');
            }
        });

        // Tier-2 Change Event
        $('#tier-2').on('change', function() {
            var tier2ID = $(this).val();
            if (tier2ID) {
                $('#tier-3').attr('disabled', true);

                // AJAX Request to Fetch Tier-3 Data
                $.ajax({
                    url: '<?= base_url('tiers/get_tier3') ?>',
                    type: 'POST',
                    data: {
                        tier_2_id: tier2ID
                    },
                    dataType: 'json',
                    success: function(response) {
                        $('#tier-3').attr('disabled', false).html('<option value="">Select</option>');
                        $.each(response, function(key, value) {
                            $('#tier-3').append('<option value="' + value.tier_3_id + '">' + value.tier_name + '</option>');
                        });
                    },
                    error: function() {
                        alert('Error fetching Tier-3 data. Please try again.');
                    }
                });
            } else {
                $('#tier-3').attr('disabled', true).html('<option value="">Select</option>');
                $('#tier-4').attr('disabled', true).html('<option value="">Select</option>');
            }
        });

        // Tier-3 Change Event
        $('#tier-3').on('change', function() {
            var tier3ID = $(this).val();
            if (tier3ID) {
                $('#tier-4').attr('disabled', true);

                // AJAX Request to Fetch Tier-4 Data
                $.ajax({
                    url: '<?= base_url('tiers/get_tier4') ?>',
                    type: 'POST',
                    data: {
                        tier_3_id: tier3ID
                    },
                    dataType: 'json',
                    success: function(response) {
                        $('#tier-4').attr('disabled', false).html('<option value="">Select</option>');
                        $.each(response, function(key, value) {
                            $('#tier-4').append('<option value="' + value.tier_4_id + '">' + value.tier_name + '</option>');
                        });
                    },
                    error: function() {
                        alert('Error fetching Tier-4 data. Please try again.');
                    }
                });
            } else {
                $('#tier-4').attr('disabled', true).html('<option value="">Select</option>');
            }
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // ... (previous FAQ logic remains unchanged)

        // Variant Section Script
        const addVariantBtn = document.getElementById('add-variant-btn');
        const variantSection = document.getElementById('variant-section');
        let variantCount = <?= isset($variants) ? count($variants) : 1 ?>;

        addVariantBtn.addEventListener('click', function() {
            const newVariantItem = document.createElement('div');
            newVariantItem.classList.add('variant-item');
            newVariantItem.setAttribute('data-index', variantCount);
            newVariantItem.innerHTML = `
                <div class="row">
                    <div class="col-md-3">
                        <label>Variant Name #${variantCount + 1}</label>
                        <input type="text" name="variant_name[]" class="form-control" placeholder="Variant Name" required>
                    </div>
                    <div class="col-md-3">
                        <label>Price</label>
                        <input type="number" name="variant_price[]" class="form-control" placeholder="Price" required>
                    </div>
                    <div class="col-md-3">
                        <label>SKU</label>
                        <input type="text" name="product_sku[]" class="form-control" placeholder="SKU" required>
                    </div>
                </div>
                <button type="button" class="btn btn-danger remove-variant-btn" data-index="${variantCount}">Remove</button>
            `;
            variantSection.appendChild(newVariantItem);
            variantCount++;
        });

        // Remove Variant item functionality (unchanged)
        variantSection.addEventListener('click', function(e) {
            if (e.target && e.target.classList.contains('remove-variant-btn')) {
                const variantItem = e.target.closest('.variant-item');
                variantSection.removeChild(variantItem);
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('input[name="sku"]').on('blur', function() {
            var sku = $(this).val();
            if (sku) {
                $.ajax({
                    url: '<?= base_url("admin-products/check_sku") ?>',
                    type: 'POST',
                    data: {
                        sku: sku
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.exists) {
                            // SKU already exists
                            $('#sku-error').text('SKU is already in use').show();
                            $('input[name="sku"]').addClass('is-invalid').removeClass('is-valid');
                        } else {
                            // SKU is available
                            $('#sku-error').text('SKU is available').show();
                            $('input[name="sku"]').addClass('is-valid').removeClass('is-invalid');
                        }
                    },
                    error: function() {
                        $('#sku-error').text('Error checking SKU').show();
                    }
                });
            } else {
                $('#sku-error').text('SKU cannot be empty').show();
                $('input[name="sku"]').removeClass('is-valid').removeClass('is-invalid');
            }
        });
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const addButton = document.getElementById("add-more-images");
        const container = document.getElementById("image-upload-container");
        const currentImages = document.querySelectorAll('.remove-current-image');

        // Add new image upload field
        addButton.addEventListener("click", function() {
            const newRow = document.createElement("div");
            newRow.classList.add("col-md-6", "image-upload-row");
            newRow.innerHTML = `
                <div class="form-group">
                    <div class="d-flex align-items-center mb-3">
                        <input type="file" name="additional_images[]" accept="image/*" class="form-control" />
                        <button type="button" class="btn btn-sm btn-danger ml-2 remove-image">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
            `;
            container.appendChild(newRow);

            // Add event listener to the remove button for newly added field
            newRow.querySelector(".remove-image").addEventListener("click", function() {
                container.removeChild(newRow);
            });
        });

        // Remove current images
        currentImages.forEach(button => {
            button.addEventListener('click', function() {
                const index = this.dataset.index;
                const parent = this.closest('.image-upload-row');
                parent.remove();
                // Add logic to update hidden inputs or mark image for deletion if necessary
            });
        });
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const removedImagesInput = document.getElementById("removed-images");
        const currentImages = document.querySelectorAll(".remove-current-image");

        currentImages.forEach(button => {
            button.addEventListener("click", function() {
                const parent = this.closest(".image-upload-row");
                const imageUrl = this.dataset.url;

                // Add the URL to the removed images input field
                let removedImages = JSON.parse(removedImagesInput.value || "[]");
                removedImages.push(imageUrl);
                removedImagesInput.value = JSON.stringify(removedImages);

                // Remove the image from the DOM
                parent.remove();
            });
        });
    });
</script>

<script>
    function goBack() {
        // Redirects to the previous page in browser history
        window.history.back();
    }
</script>
<script>
    $(document).ready(function() {
        const maxLength = 160;

        // Attach the input event to the textarea
        $('#metaDescription').on('input', function() {
            const currentLength = $(this).val().length;
            $('#charCounter').text(`${currentLength}/${maxLength} characters`);
        });
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const toggleButton = document.querySelector(".toggle-seo-content");
        const seoContent = document.getElementById("seo-content");
        const toggleIcon = document.getElementById("toggle-icon");

        // Initially hide the SEO content
        seoContent.style.display = "none";

        toggleButton.addEventListener("click", function() {
            if (seoContent.style.display === "none") {
                seoContent.style.display = "block";
                toggleIcon.classList.remove("fa-chevron-down");
                toggleIcon.classList.add("fa-chevron-up");
            } else {
                seoContent.style.display = "none";
                toggleIcon.classList.remove("fa-chevron-up");
                toggleIcon.classList.add("fa-chevron-down");
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        // Input fields
        const $titleInput = $('#seo-title');
        const $urlInput = $('#seo-url');
        const $descriptionInput = $('#seo-description');

        // Preview fields
        const $titlePreview = $('#serp-title-preview');
        const $urlPreview = $('#serp-url-preview');
        const $descriptionPreview = $('#serp-description-preview');

        // Update preview on input change
        $titleInput.on('input', function() {
            const titleValue = $(this).val();
            $titlePreview.text(titleValue);
        });

        $urlInput.on('input', function() {
            const urlValue = $(this).val();
            $urlPreview.text(`${location.origin}/${urlValue}`);
        });

        $descriptionInput.on('input', function() {
            const descriptionValue = $(this).val();
            $descriptionPreview.text(descriptionValue);
        });
    });
</script>

<script>
    document.getElementById('seo-url').addEventListener('input', function() {
        const urlInput = this.value.trim();
        const feedback = document.getElementById('seo-url-feedback');
        const available = document.getElementById('seo-url-available');

        feedback.style.display = 'none';
        available.style.display = 'none';

        if (urlInput) {
            fetch('<?= base_url('check-url') ?>', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        url: urlInput
                    }),
                })
                .then(response => response.json())
                .then(data => {
                    if (data.exists) {
                        feedback.style.display = 'block';
                        available.style.display = 'none';
                    } else {
                        feedback.style.display = 'none';
                        available.style.display = 'block';
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }
    });
</script>

<script>
    $(document).ready(function() {
        let selectedOptions = []; // Stores selected product IDs
        let selectedTexts = {}; // Stores selected product names (object for easy lookup)

        // Load previously selected variants
        let initialSelected = $('#selectedVariants').val();
        if (initialSelected) {
            selectedOptions = JSON.parse(initialSelected); // Convert JSON string to array

            // Populate selectedTexts with product titles
            selectedOptions.forEach(id => {
                let optionText = $('#productVariantDropdown option[value="' + id + '"]').text();
                if (optionText) {
                    selectedTexts[id] = optionText;
                }
            });

            updateSelectedProductsUI();
        }

        // On selecting products from dropdown
        $('#productVariantDropdown').on('change', function() {
            let newSelections = $(this).val() || []; // Get selected values (IDs)

            // Add new selections without removing previous ones
            newSelections.forEach(productId => {
                if (!selectedOptions.includes(productId)) {
                    selectedOptions.push(productId);
                    selectedTexts[productId] = $('#productVariantDropdown option[value="' + productId + '"]').text();
                }
            });

            // Remove items from selectedOptions if they were removed from dropdown
            selectedOptions = selectedOptions.filter(id => newSelections.includes(id));

            updateSelectedProductsUI();
        });

        // Function to Update UI with Selected Products
        function updateSelectedProductsUI() {
            let displayHtml = selectedOptions.length > 0 ?
                selectedOptions.map(id => `
                    <span class="badge rounded-pill bg-dark text-light selected-product" data-id="${id}" 
                        style="cursor: pointer; font-size: 0.9rem; padding: 7px 17px; display: inline-block; margin: 5px;">
                        ${selectedTexts[id]} 
                        <i class="fa fa-times remove-product" data-id="${id}" 
                            style="cursor: pointer; font-size: 1.2rem; margin-left: 8px;"></i>
                    </span>
                `).join("") :
                `<span style="font-size: 1.2rem; color: gray;">Selected Products Will Be Shown Here</span>`; // Default message if none selected

            $('#selectedProductsContainer').html(displayHtml);

            // Update Hidden Input with JSON Encoded IDs
            $('#selectedVariants').val(JSON.stringify(selectedOptions));

            // Update the dropdown to reflect the new selections
            $('#productVariantDropdown').val(selectedOptions).trigger('change.select2');
        }

        // Remove Product from Selected List when clicking the badge
        $(document).on('click', '.remove-product', function() {
            let productId = $(this).attr('data-id');

            // Remove product ID from array
            selectedOptions = selectedOptions.filter(id => id !== productId);

            // Remove from object
            delete selectedTexts[productId];

            updateSelectedProductsUI();
        });
    });
</script>

<script>
    $(document).ready(function() {
        let checkbox = $('#customCheck1-1');
        let includesSection = $('#includesSection');
        let includesInput = $('input[name="product-include"]');

        // Show/Hide Includes field based on checkbox
        checkbox.change(function() {
            if ($(this).is(':checked')) {
                includesSection.fadeIn();
            } else {
                includesSection.fadeOut(); // Hide the input field
                includesInput.val(''); // Clear input field value when unchecked
            }
        });

        // Ensure the Includes field is visible if checkbox was already checked
        if (checkbox.is(':checked')) {
            includesSection.show();
        }
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get the FAQ section and add FAQ button
        const addFaqBtn = document.getElementById('add-faq-btn');
        const faqSection = document.getElementById('faq-section');
        let faqCount = document.querySelectorAll('.faq-item').length; // Get the initial count of FAQs from the existing DOM

        // Add new FAQ when clicking the button
        addFaqBtn.addEventListener('click', function() {
            faqCount++; // Increment the FAQ count

            // Create a new FAQ item div
            const newFaqItem = document.createElement('div');
            newFaqItem.classList.add('faq-item');
            newFaqItem.setAttribute('data-index', faqCount - 1); // Set data-index starting from the current count

            // HTML for the new FAQ item
            newFaqItem.innerHTML = `
                <label>FAQ #${faqCount}</label>
                <input type="text" name="faq_question[]" class="form-control" placeholder="Question" required>
                <label>Answer</label>
                <textarea name="faq_answer[]" class="resizable-textarea form-control" placeholder="Answer" required></textarea>
                <button type="button" class="btn btn-danger remove-faq-btn" data-index="${faqCount - 1}">Remove</button>
            `;

            // Append the new FAQ item to the FAQ section
            faqSection.appendChild(newFaqItem);
        });

        // Remove FAQ functionality
        faqSection.addEventListener('click', function(e) {
            if (e.target && e.target.classList.contains('remove-faq-btn')) {
                const faqItem = e.target.closest('.faq-item');
                const index = parseInt(faqItem.getAttribute('data-index'));

                // Remove the FAQ item from the DOM
                faqSection.removeChild(faqItem);

                // Update data-index and labels for remaining FAQs
                const remainingFaqs = faqSection.querySelectorAll('.faq-item');
                remainingFaqs.forEach((item, i) => {
                    item.setAttribute('data-index', i);
                    const label = item.querySelector('label');
                    label.textContent = `FAQ #${i + 1}`;
                    const removeBtn = item.querySelector('.remove-faq-btn');
                    removeBtn.setAttribute('data-index', i);
                });

                // Update faqCount to reflect the new number of FAQs
                faqCount = remainingFaqs.length;
            }
        });
    });
</script>