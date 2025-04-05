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

    <!-- Page Main Content Start -->
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <!-- Default Basic Forms Start -->


                <form action="<?= base_url(); ?>admin-products/publishproduct" method="post" id="AddnewProductsForm" class="validate-form" enctype="multipart/form-data">

                    <div class="mb-3 d-flex justify-content-between">
                        <a href="javascript:void(0);" class="mx-2" onclick="goBack()">
                            <i class="fa-solid fa-arrow-right fa-flip-horizontal"></i>
                        </a>
                        <button value="submit" class="btn btn-primary btn-lg">
                            Publish
                        </button>
                    </div>

                    <div class="row">
                        <div class="col-md-8">
                            <div class="pd-20 card-box mb-30">
                                <p class="text-blue">Products Details <i class="fa-solid fa-star-of-life" style="color: #f00000; font-size: 7px;"></i></p>
                                <div class="form-group">
                                    <label>Products Title</label>
                                    <input class="form-control validate-required validate-minLength" data-error-message-required="Title is required!" data-min-length="60" name="product-name" type="text" placeholder="Name of the Product">
                                </div>

                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label>Secondary Title <i class="fa-solid fa-star-of-life" style="color: #f00000; font-size: 7px;"></i></label>
                                            <input class="form-control validate-required validate-minLength" data-error-message-required="Secondary Title is required!" minlength="30" name="second-name" type="text" placeholder="Secondary Title">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Size <i class="fa-solid fa-star-of-life" style="color: #f00000; font-size: 7px;"></i></label>
                                            <input class="form-control validate-required" data-error-message-required="Size is required!" name="product-size" type="text" placeholder="Size">
                                        </div>
                                    </div>
                                    <div class="col-md">
                                        <div class="form-group">
                                            <label>Accessories</label>
                                            <div class="custom-control custom-checkbox mb-5">
                                                <input type="checkbox" name="accessories-checked" class="custom-control-input" id="customCheck1-1" value="1">
                                                <label class="custom-control-label" for="customCheck1-1"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8" id="includesSection" style="display: none;">
                                        <div class="form-group">
                                            <label>Includes</label>
                                            <input class="form-control validate-required" data-error-message-required="Include is required!" name="product-include" type="text" placeholder="Include Accessories">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="validationTextarea" class="form-label">Short/Meta Description <i class="fa-solid fa-star-of-life" style="color: #f00000; font-size: 7px;"></i></label>
                                    <textarea class="form-control validate-required resizable-textarea"
                                        data-error-message-required="Meta Description is required!"
                                        name="product-short-description"
                                        placeholder="Required example textarea"
                                        id="metaDescription"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="quillEditor" class="form-label">Product Description <i class="fa-solid fa-star-of-life" style="color: #f00000; font-size: 7px;"></i></label>
                                    <div id="quillEditor" style="height: 300px; border: 1px solid #ccc;"></div>
                                    <textarea class="form-control resizable-textarea" id="product-description" name="product-description" style="display: none;"></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Primary Image <i class="fa-solid fa-star-of-life" style="color: #f00000; font-size: 7px;"></i></label>
                                    <div class="dropzone-area">
                                        <div class="file-upload-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-cloud-upload" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#D4DCE6" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M7 18a4.6 4.4 0 0 1 0 -9a5 4.5 0 0 1 11 2h1a3.5 3.5 0 0 1 0 7h-1" />
                                                <path d="M9 15l3 -3l3 3" />
                                                <path d="M12 12l0 9" />
                                            </svg>
                                        </div>
                                        <input
                                            type="file"
                                            id="upload-file" name="product-image"
                                            accept="image/*"
                                            class="validate-required validate-file validate-fileType validate-imageDimensions"
                                            data-image-width="990"
                                            data-image-height="1272"
                                            data-error-message-required="Banner image is required!"
                                            data-error-message-imageDimensions="The banner image must be exactly 990 x 1272 pixels.">
                                        <p class="file-info">No Files Selected</p>
                                        <div class="image-preview" style="margin-top: 10px;"></div>
                                    </div>
                                    <div class="dropzone-description">
                                        <span>
                                            Supported formats: JPEG, JPG, PNG, WEBP
                                        </span>
                                        <span>
                                            Required Size: 990 x 1272 px.
                                        </span>
                                        <span>
                                            Max file size: 400kb
                                        </span>
                                    </div>
                                </div>

                            </div>

                            <div class="pd-20 card-box mb-30">
                                <p class="text-blue">Price</p>
                                <div class="row">
                                    <div class="col-md">
                                        <label>Cost Price <i class="fa-solid fa-star-of-life" style="color: #f00000; font-size: 7px;"></i></label>
                                        <input type="number" name="cost-price" data-error-message-required="Enter Cost Price!" placeholder="Cost Price"
                                            class="form-control validate-required">
                                    </div>
                                    <div class="col-md">
                                        <label>Selling Price <i class="fa-solid fa-star-of-life" style="color: #f00000; font-size: 7px;"></i></label>
                                        <input type="number" name="selling-price" data-error-message-required="Enter Selling Price!" placeholder="Selling Price"
                                            class="form-control validate-required">
                                    </div>
                                    <div class="col-md">
                                        <div class="form-group">
                                            <label> MRP <i class="fa-solid fa-star-of-life" style="color: #f00000; font-size: 7px;"></i></label>
                                            <input type="number" name="compare-at-price" data-error-message-required="Enter Compare at Price!" placeholder="MRP"
                                                class="form-control validate-required">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>SKU <i class="fa-solid fa-star-of-life" style="color: #f00000; font-size: 7px;"></i></label>
                                            <input type="text" name="sku" placeholder="SKU" data-error-message-required="Enter Unique SKU!" class="form-control validate-required">
                                            <div id="sku-error"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Barcode</label>
                                            <input type="text" name="barcode" placeholder="Enter Barcode"
                                                class="form-control">
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
                                            <label>Tier-1 <i class="fa-solid fa-star-of-life" style="color: #f00000; font-size: 7px;"></i></label>
                                            <select class="form-control validate-required" data-error-message-required="Enter Tier 1" name="tier-1" id="tier-1"
                                                style="width: 100%; height: 38px;">
                                                <option value="">Select</option>
                                                <?php foreach ($tiers as $tier): ?>
                                                    <option value="<?= $tier['tier_1_id'] ?>"><?= $tier['tier_name'] ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Tier-2 Dropdown -->
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Tier-2 <i class="fa-solid fa-star-of-life" style="color: #f00000; font-size: 7px;"></i></label>
                                            <select class="form-control" name="tier-2" id="tier-2"
                                                style="width: 100%; height: 38px;" disabled>
                                                <option value="">Select</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Tier-3 Dropdown -->
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Tier-3 <i class="fa-solid fa-star-of-life" style="color: #f00000; font-size: 7px;"></i></label>
                                            <select class="form-control" name="tier-3" id="tier-3"
                                                style="width: 100%; height: 38px;" disabled>
                                                <option value="">Select</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Tier-4 <i class="fa-solid fa-star-of-life" style="color: #f00000; font-size: 7px;"></i></label>
                                            <select class="form-control" name="tier-4" id="tier-4"
                                                style="width: 100%; height: 38px;" disabled>
                                                <option value="">Select</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="pd-20 card-box mb-30">
                                <p class="text-blue">Add Product Images</p>
                                <div class="row" id="image-upload-container">
                                    <div class="col-md-6 image-upload-row">
                                        <div class="form-group">
                                            <div class="d-flex align-items-center flex-column mb-3">
                                                <input type="file" name="product_images[]" accept="image/*" class="form-control" data-preview-width="800" data-preview-height="auto" />
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
                                        <div class="faq-item">
                                            <label>Question</label>
                                            <input type="text" name="faq_question[]" class="form-control" placeholder="Question">
                                            <label>Answer</label>
                                            <textarea name="faq_answer[]" class="resizable-textarea form-control" placeholder="Answer"></textarea>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-outline-dark mt-2" id="add-faq-btn"><i class="fa-solid fa-plus"></i></button>
                                </div>
                            </div>

                            <!-- Product Variant Section -->
                            <!-- <div class="pd-20 card-box mb-30">
                                <div class="form-group">
                                    <label>Select Product Variant</label>
                                    <select class="custom-select2 form-control" id="productVariantDropdown" multiple="multiple" style="width: 100%; height: 38px">
                                        <optgroup label="Select Products">
                                            <?php foreach ($all_products as $allproduct): ?>
                                                <option value="<?= $allproduct['product_id'] ?>"><?= $allproduct['product_title'] ?></option>
                                            <?php endforeach; ?>
                                        </optgroup>
                                    </select>
                                    <div class="form-group my-3 mx-3">
                                        <input type="hidden" id="selectedVariants" name="selected_variants">
                                        <div class="row" id="selectedProductsContainer"></div>
                                    </div>
                                </div>
                            </div> -->

                            <!-- Product Variant Section
                            <div class="pd-20 card-box mb-30">
                                <div class="form-group">
                                    <label for="variant_section">Product Variants</label>
                                    <div id="variant-section">
                                        <div class="variant-item">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label>Variant Name</label>
                                                    <input type="text" name="variant_name[]" class="form-control" placeholder="Variant Name">
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Price</label>
                                                    <input type="number" name="variant_price[]" class="form-control" placeholder="Price">
                                                </div>
                                                <div class="col-md-3">
                                                    <label>SKU</label>
                                                    <input type="number" name="product_sku[]" class="form-control" placeholder="SKU">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-outline-dark mt-2" id="add-variant-btn">
                                        <i class="fa-solid fa-plus"></i>
                                    </button>
                                </div>
                            </div> -->

                            <!-- SEO Section -->
                            <div class="pd-20 card-box mb-30">
                                <p class="text-blue">
                                    <span class="toggle-seo-content" style="cursor: pointer; display: flex; align-items: center;">
                                        SEO
                                    </span>
                                </p>
                                <div id="seo-content" class="seo-content">
                                    <!-- URL Field -->
                                    <div class="form-group">
                                        <label>URL</label>
                                        <input type="text" class="form-control" id="url" name="url" placeholder="Enter URL">
                                        <span id="url-feedback" class="text-danger" style="display: none;">This URL is already in use.</span>
                                        <span id="url-available" class="text-success" style="display: none;">This URL is available.</span>
                                    </div>

                                    <!-- Meta-Tag Field -->
                                    <div class="form-group">
                                        <label>Meta Title</label>
                                        <input type="text" class="form-control" id="meta-tag" name="meta-tag" placeholder="Enter Meta Title">
                                    </div>

                                    <!-- Meta-Description Field -->
                                    <div class="form-group">
                                        <label>Meta Description</label>
                                        <textarea class="form-control resizable-textarea" id="meta-description" name="meta-description" placeholder="Enter Meta Description"></textarea>
                                    </div>
                                </div>
                            </div>

                            <!-- Google SERP Preview
                            <div class="pd-20 card-box mb-30 google-serp-preview">
                                <p class="serp-title" id="serp-title-preview">Meta Title Preview</p>
                                <p class="serp-url" id="serp-url-preview"><?= base_url('products/') ?><span id="serp-url-slug">sample-url</span></p>
                                <p class="serp-description" id="serp-description-preview">Meta Description Preview</p>
                            </div> -->
                        </div>


                        <div class="col-sm">
                            <div class="pd-20 card-box mb-30">
                                <p class="text-blue">Amazon</p>
                                <div class="form-group">
                                    <label for="end_date_and_time">Amazon Product Id</label>
                                    <input type="text" name="amz_product_id" id="amz_product_id" class="form-control">
                                </div>
                            </div>
                            <div class="pd-20 card-box mb-30">
                                <p class="text-blue">Product Publishing</p>

                                <div class="form-group">
                                    <label>Product Status</label>
                                    <select
                                        class="custom-select2 form-control validate-required"
                                        data-error-message-required="Please select a Product Status."
                                        name="product-status"
                                        id="product-status"
                                        style="width: 100%; height: 38px">
                                        <option value="">Select Status</option>
                                        <option value="active">Active</option>
                                        <option value="inactive" selected>Draft</option>
                                    </select>
                                    <div class="invalid-feedback">invalid select</div>
                                </div>

                                <div class="form-group">
                                    <div class="custom-control custom-checkbox mb-5">
                                        <input
                                            type="checkbox"
                                            class="custom-control-input"
                                            id="customCheck1" />
                                        <label class="custom-control-label" for="customCheck1">Schedule</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="selectOption" class="form-label">Sales Channel
                                        <span data-bs-toggle="tooltip" data-bs-placement="top" title="Choose where the product is sold or promoted (e.g., Web, Apps, Instagram, Facebook)">
                                            <i class="fa-solid fa-circle-question"></i>
                                        </span>
                                    </label>
                                    <select id="sale-channel" class="validate-required form-control" data-error-message-required="Please select a Sales Channel." name="sales-channel" style="width: 100%; height: 38px">
                                        <option value="online-store">Website</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Delist</label>
                                    <select class="custom-select2 form-control" name="delist" style="width: 100%; height: 38px">
                                        <option value="">Select</option>
                                        <option value="yes">Yes</option>
                                        <option value="no" selected>No</option>
                                    </select>
                                </div>

                                <div id="schedule-options" class="Schedule-Main" style="display: none;">
                                    <label>Schedule Product</label>
                                    <div class="form-group">
                                        <label for="publish_date_and_time">Publish Date and Time</label>
                                        <input type="datetime-local" name="publish_date_and_time" id="publish_date_and_time" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="end_date_and_time">End Date and Time</label>
                                        <input type="datetime-local" name="end_date_and_time" id="end_date_and_time" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="recurrence">Recurrence</label>
                                        <select name="recurrence" id="recurrence" class="form-control">
                                            <option value="">Select Recurrence</option>
                                            <option value="monthly">Monthly</option>
                                            <option value="weekly">Weekly</option>
                                            <option value="daily">Daily</option>
                                            <option value="yearly">Yearly</option>
                                            <option value="none">None</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="pd-20 card-box mb-30">
                                <p class="text-blue">Dimensions</p>

                                <!-- length Number Field -->
                                <div class="form-group mr-2">
                                    <label for="length">Enter Length (cm) <i class="fa-solid fa-star-of-life" style="color: #f00000; font-size: 7px;"></i></label>
                                    <input type="number" name="length" id="length" value=""
                                        class="form-control validate-required"
                                        data-error-message-required="Enter length.">
                                </div>
                                <!-- breadth Number Field -->
                                <div class="form-group mr-2">
                                    <label for="breadth">Enter Breadth (cm) <i class="fa-solid fa-star-of-life" style="color: #f00000; font-size: 7px;"></i></label>
                                    <input type="number" name="breadth" id="breadth" value=""
                                        class="form-control validate-required"
                                        data-error-message-required="Enter breadth.">
                                </div>
                                <!-- height Number Field -->
                                <div class="form-group mr-2">
                                    <label for="height">Enter Height (cm) <i class="fa-solid fa-star-of-life" style="color: #f00000; font-size: 7px;"></i></label>
                                    <input type="number" name="height" id="height" value=""
                                        class="form-control validate-required"
                                        data-error-message-required="Enter height.">
                                </div>
                                <!-- Weight Number Field -->
                                <div class="form-group mr-2">
                                    <label for="weight">Enter Weight (Kg) <i class="fa-solid fa-star-of-life" style="color: #f00000; font-size: 7px;"></i></label>
                                    <input type="number" name="weight" id="weight" value=""
                                        class="form-control validate-required"
                                        data-error-message-required="Enter Weight.">
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
                                        <div class="form-group mr-2" style="flex: 1;">
                                            <label for="limited_edition" class="form-label">Limited Edition</label>
                                            <select name="limited_edition" id="limited_edition" class="form-control" style="width: 100%; height: 38px;">
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no" selected>No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center" style="max-width: 100%;">
                                        <div class="form-group mr-2" id="label-field" style="display:none; flex: 1;">
                                            <label for="label" class="form-label">Label
                                                <span data-bs-toggle="tooltip" data-bs-placement="top" title="Enter product label (e.g., Limited Edition, Exclusive On Driphunter, New, etc.)">
                                                    <i class="fa-solid fa-circle-question"></i>
                                                </span>
                                            </label>
                                            <input type="text" name="label" placeholder="Label" class="form-control" name="product-label" style="width: 100%; height: 38px;">
                                        </div>
                                        <div class="form-group" id="label-color-field" style="display:none; flex: 1;">
                                            <label for="label_color" class="form-label">Label Color
                                                <span data-bs-toggle="tooltip" data-bs-placement="top" title="Pick a color for the label">
                                                    <i class="fa-solid fa-circle-question"></i>
                                                </span>
                                            </label>
                                            <input type="color" name="label_color" id="label_color" class="form-control" value="FFCF00" style="width: 100%; height: 38px;">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="pd-20 card-box mb-30">
                                <p class="text-blue">Preorder</p>
                                <div class="form-group">
                                    <label>Preorder tag</label>
                                    <select class="custom-select2 form-control validate-required" id="preorder-tag" name="preorder-tag"
                                        data-error-message-required="Please select a Preorder Tag."
                                        style="width: 100%; height: 38px">
                                        <option value="">Select</option>
                                        <option value="yes">Yes</option>
                                        <option selected value="no">No</option>
                                    </select>
                                </div>
                                <div class="form-group" id="preorder-date-container" style="display: none;">
                                    <label>Preorder Date</label>
                                    <input
                                        type="date"
                                        class="form-control"
                                        name="preorder_date"
                                        id="preorder-date"
                                        data-conditional-field="#preorder-tag"
                                        data-conditional-value="yes"
                                        data-error-message-required="Preorder Date is required."/>
                                </div>
                            </div>

                            <div class="pd-20 card-box mb-30">
                                <div class="form-group">
                                    <p class="text-blue">Bullet Points</p>
                                    <div class="mb-20">
                                        <input type="text" class="form-control" data-role="tagsinput" id="product-bullet-points" name="product-bullet-points" placeholder="Add Bullet Points" />
                                    </div>
                                </div>
                            </div>

                            <div class="pd-20 card-box mb-30">
                                <div class="form-group">
                                    <label>Add Tags</label>
                                    <div class="input-group">
                                        <?php if (!empty($tags)): ?>
                                            <select class="custom-select2 custom-select-products form-control" name="product-tags[]" multiple="multiple" style="width: 80%">
                                                <optgroup label="Available Products">
                                                    <?php foreach ($tags as $tag): ?>
                                                        <option value="<?= esc($tag['tag_value']) ?>"><?= esc($tag['tag_name']) ?></option>
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
                        </div>
                    </div>
                </form>
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

        <!-- Footer View Start -->
        <?= $this->include('footer_view') ?>
        <!-- Footer View End -->

        <script>
            // Initialize the FormValidator
            new FormValidator('#AddnewProductsForm', {
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

<script type="text/javascript">
    $(document).ready(function() {
        // Tier-1 Change Event
        $('#tier-1').on('change', function() {
            var tier1ID = $(this).val();
            if (tier1ID) {
                $('#tier2-loader').show();
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
                        $('#tier2-loader').hide();
                        $('#tier-2').attr('disabled', false);
                        $('#tier-2').html('<option value="">Select</option>');
                        $.each(response, function(key, value) {
                            $('#tier-2').append('<option value="' + value.tier_2_id + '">' + value.tier_name + '</option>');
                        });
                    },
                    error: function() {
                        alert('Error fetching Tier-2 data. Please try again.');
                        $('#tier2-loader').hide();
                    }
                });
            } else {
                $('#tier-2').html('<option value="">Select</option>');
                $('#tier-2').attr('disabled', true);
                $('#tier-3').html('<option value="">Select</option>');
                $('#tier-3').attr('disabled', true);
            }
        });

        // Tier-2 Change Event
        $('#tier-2').on('change', function() {
            var tier2ID = $(this).val();
            if (tier2ID) {
                $('#tier2-loader').show();
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
                        $('#tier2-loader').hide();
                        $('#tier-3').attr('disabled', false);
                        $('#tier-3').html('<option value="">Select</option>');
                        $.each(response, function(key, value) {
                            $('#tier-3').append('<option value="' + value.tier_3_id + '">' + value.tier_name + '</option>');
                        });
                    },
                    error: function() {
                        alert('Error fetching Tier-3 data. Please try again.');
                        $('#tier2-loader').hide();
                    }
                });
            } else {
                $('#tier-3').html('<option value="">Select</option>');
                $('#tier-3').attr('disabled', true);
            }
        });

        // Tier-3 Change Event
        $('#tier-3').on('change', function() {
            var tier3ID = $(this).val();
            if (tier3ID) {
                $('#tier4-loader').show();
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
                        $('#tier4-loader').hide();
                        $('#tier-4').attr('disabled', false);
                        $('#tier-4').html('<option value="">Select</option>');
                        $.each(response, function(key, value) {
                            $('#tier-4').append('<option value="' + value.tier_4_id + '">' + value.tier_name + '</option>');
                        });
                    },
                    error: function() {
                        alert('Error fetching Tier-4 data. Please try again.');
                        $('#tier4-loader').hide();
                    }
                });
            } else {
                $('#tier-4').html('<option value="">Select</option>');
                $('#tier-4').attr('disabled', true);
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
    function goBack() {
        window.history.back();
    }
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const scheduleCheckbox = document.getElementById('customCheck1'); // Reference the styled checkbox
        const scheduleOptions = document.getElementById('schedule-options');

        // Add event listener for checkbox
        scheduleCheckbox.addEventListener('change', function() {
            if (scheduleCheckbox.checked) {
                scheduleOptions.style.display = 'block'; // Show additional fields
            } else {
                scheduleOptions.style.display = 'none'; // Hide additional fields
            }
        });

        // Initialize visibility for page reloads
        if (scheduleCheckbox.checked) {
            scheduleOptions.style.display = 'block';
        }
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const addButton = document.getElementById("add-more-images");
        const container = document.getElementById("image-upload-container");

        addButton.addEventListener("click", function() {
            // Create a new row for image upload
            const newRow = document.createElement("div");
            newRow.classList.add("col-md-6", "image-upload-row");

            newRow.innerHTML = `
                <div class="form-group">
                    <div class="d-flex align-items-center mb-3">
                        <input type="file" name="product_images[]" accept="image/*" class="form-control" data-preview-width="800" data-preview-height="auto"/>
                        <button type="button" class="btn btn-sm btn-danger ml-2 remove-image">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
            `;

            container.appendChild(newRow);

            // Add event listener to the remove button
            newRow.querySelector(".remove-image").addEventListener("click", function() {
                container.removeChild(newRow);
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        // Hide or show the preorder date field based on the dropdown selection
        $('#preorder-tag').on('change', function() {
            if ($(this).val() === 'yes') {
                $('#preorder-date-container').show(); // Show the date field
            } else {
                $('#preorder-date-container').hide(); // Hide the date field
            }
        });

        // Set initial state
        if ($('#preorder-tag').val() !== 'yes') {
            $('#preorder-date-container').hide();
        }
    });
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
    document.getElementById('limited_edition').addEventListener('change', function() {
        var labelField = document.getElementById('label-field');
        var colorField = document.getElementById('label-color-field');

        if (this.value === 'yes') {
            labelField.style.display = 'block';
            colorField.style.display = 'block';
        } else {
            labelField.style.display = 'none';
            colorField.style.display = 'none';
        }
    });
</script>

<script>
    document.getElementById('url').addEventListener('input', function() {
        const urlInput = this.value.trim();
        const feedback = document.getElementById('url-feedback');
        const available = document.getElementById('url-available');

        // Hide feedback messages initially
        feedback.style.display = 'none';
        available.style.display = 'none';

        if (urlInput) {
            // Make AJAX request to check URL
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
                        // Show error message
                        feedback.style.display = 'block';
                        available.style.display = 'none';
                    } else {
                        // Show success message
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
    document.addEventListener('DOMContentLoaded', function() {
        // FAQ Section Script
        const addFaqBtn = document.getElementById('add-faq-btn');
        const faqSection = document.getElementById('faq-section');
        let faqCount = 1;

        addFaqBtn.addEventListener('click', function() {
            const newFaqItem = document.createElement('div');
            newFaqItem.classList.add('faq-item');
            newFaqItem.innerHTML = `
                <label>FAQ #${faqCount}</label>
                <input type="text" name="faq_question[]" class="form-control" placeholder="Question" required>
                <label>Answer</label>
                <textarea name="faq_answer[]" class="resizable-textarea form-control" placeholder="Answer" required></textarea>
                `;
            faqSection.appendChild(newFaqItem);
            faqCount++;
        });

        // Variant Section Script
        const addVariantBtn = document.getElementById('add-variant-btn');
        const variantSection = document.getElementById('variant-section');
        let variantCount = 1;

        addVariantBtn.addEventListener('click', function() {
            const newVariantItem = document.createElement('div');
            newVariantItem.classList.add('variant-item');
            newVariantItem.innerHTML = `
                <div class="row">
                    <div class="col-md-3">
                        <label>Variant Name</label>
                        <input type="text" name="variant_name[]" class="form-control" placeholder="Variant Name">
                    </div>
                    <div class="col-md-3">
                        <label>Price</label>
                        <input type="number" name="variant_price[]" class="form-control" placeholder="Price">
                    </div>
                    <div class="col-md-3">
                        <label>SKU</label>
                        <input type="number" name="product_sku[]" class="form-control" placeholder="SKU">
                    </div>
                </div>
                `;
            variantSection.appendChild(newVariantItem);
            variantCount++;
        });
    });
</script>

<script>
    $(document).ready(function() {
        let selectedOptions = []; // Stores selected product IDs
        let selectedTexts = {}; // Stores selected product names (object for easy lookup)

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

            // Update UI
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
        $('#customCheck1-1').change(function() {
            if ($(this).is(':checked')) {
                $('#includesSection').fadeIn();
            } else {
                $('#includesSection').fadeOut();
            }
        });
    });
</script>