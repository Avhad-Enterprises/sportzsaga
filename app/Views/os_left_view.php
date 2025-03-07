<!-- Full Page Loader -->
<div id="loaderOverlay" class="loader-overlay" style="display: none;">
    <div class="dot-spinner">
        <div class="dot-spinner__dot"></div>
        <div class="dot-spinner__dot"></div>
        <div class="dot-spinner__dot"></div>
        <div class="dot-spinner__dot"></div>
        <div class="dot-spinner__dot"></div>
        <div class="dot-spinner__dot"></div>
        <div class="dot-spinner__dot"></div>
        <div class="dot-spinner__dot"></div>
    </div>
</div>

<div class="left-side-bar">
    <div class="brand-logo">
        <a href="<?= base_url(); ?>online_store">
            <i class="fa-solid fa-arrow-right-from-bracket fa-flip-horizontal" style="color: #000000;"></i>Exit
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">

                <li id="web-home" class="web-section dropdown">
                    <a class="no-chevron dropdown-toggle">
                        <span class="micon bi bi-house"></span><span class="mtext">Home</span>
                    </a>
                </li>
                <li id="web-blogs" style="display: none;" class="web-section dropdown">
                    <a class="no-chevron dropdown-toggle">
                        <span class="micon bi bi-rss"></span><span class="mtext">Blogs</span>
                    </a>
                </li>
                <li id="web-singleblog" style="display: none;" class="web-section dropdown">
                    <a class="no-chevron dropdown-toggle">
                        <span class="micon bi bi-rss"></span><span class="mtext">Single Blog</span>
                    </a>
                </li>
                <li id="web-about" style="display: none;" class="web-section dropdown">
                    <a class="no-chevron dropdown-toggle">
                        <span class="micon bi bi-info-square"></span><span class="mtext">About</span>
                    </a>
                </li>
                <li id="web-contact" style="display: none;" class="web-section dropdown">
                    <a class="no-chevron dropdown-toggle">
                        <span class="micon bi bi-phone"></span><span class="mtext">Contact</span>
                    </a>
                </li>
                <li id="web-search" style="display: none;" class="web-section dropdown">
                    <a class="no-chevron dropdown-toggle">
                        <span class="micon bi bi-search"></span><span class="mtext">Search Bar</span>
                    </a>
                </li>
                <li id="web-wishlist" style="display: none;" class="web-section dropdown">
                    <a class="no-chevron dropdown-toggle">
                        <span class="micon bi bi-search"></span><span class="mtext">Wishlist</span>
                    </a>
                </li>
                <li id="web-cart" style="display: none;" class="web-section dropdown">
                    <a class="no-chevron dropdown-toggle">
                        <span class="micon bi bi-search"></span><span class="mtext">Cart Page</span>
                    </a>
                </li>
                <li id="web-checkout" style="display: none;" class="web-section dropdown">
                    <a class="no-chevron dropdown-toggle">
                        <span class="micon bi bi-search"></span><span class="mtext">User Checkout Page</span>
                    </a>
                </li>
                <li id="web-tracking" style="display: none;" class="web-section dropdown">
                    <a class="no-chevron dropdown-toggle">
                        <span class="micon bi bi-search"></span><span class="mtext">User Tracking Page</span>
                    </a>
                </li>
                <li id="web-404" style="display: none;" class="web-section dropdown">
                    <a class="no-chevron dropdown-toggle">
                        <span class="micon bi bi-search"></span><span class="mtext">404 Page</span>
                    </a>
                </li>
                <li id="web-header" style="display: none;" class="web-section dropdown">
                    <a class="no-chevron dropdown-toggle">
                        <span class="micon bi bi-house"></span><span class="mtext">Header</span>
                    </a>
                </li>
                <li id="web-collection" style="display: none;" class="web-section dropdown">
                    <a class="no-chevron dropdown-toggle">
                        <span class="micon bi bi-house"></span><span class="mtext">Collection</span>
                    </a>
                </li>


                <li id="web-home" class="web-section dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-list"></span>
                        <span class="mtext">Hero Section</span>
                    </a>
                    <ul class="submenu">

                        <!-- First Level Submenu -->
                        <li class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle">
                                <span class="micon bi bi-three-dots"></span>
                                <span class="mtext">Carousel</span>
                            </a>
                            <ul class="submenu child">

                                <!-- Plus Button to Add New -->
                                <div class="hr-container">
                                    <hr class="line">
                                    <button id="toggleCarouselFormButton" class="circle-button">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                    <hr class="line">
                                </div>

                                <!-- Add Form -->
                                <div class="ImageUploadBox" id="carouselAddForm" style="display: none;">
                                    <form action="<?= base_url('online_store/add_new_carousel') ?>" id="carouselForm"
                                        method="post" enctype="multipart/form-data">

                                        <!-- Title -->
                                        <div class="form-group">
                                            <label for="carousel_title">Title</label>
                                            <input type="text" class="form-control" id="carousel_title"
                                                name="carousel_title" placeholder="Enter Title"
                                                data-error-message-required="Username is required." />
                                        </div>

                                        <!-- Top Text -->
                                        <div class="form-group">
                                            <label for="carousel_top_text">Description</label>
                                            <textarea class="resizable-textarea" class="form-control"
                                                name="carousel_description" id="carousel_description"></textarea>
                                        </div>

                                        <!-- Select Field (Dropdown) -->
                                        <div class="form-group">
                                            <label for="select_link">Select Field</label>
                                            <select class="custom-select2 form-control" id="select_link"
                                                name="select_link" style="width: 100%; height: 38px">
                                                <option value="">Select</option>
                                                <option value="product">Product</option>
                                                <option value="collection">Collection</option>
                                            </select>
                                        </div>

                                        <!-- Product Field (Hidden by Default) -->
                                        <div class="form-group" id="ShowProductField" style="display: none;">
                                            <label for="carousel_product">Product</label>
                                            <select class="custom-select2 form-control" id="selected_product"
                                                name="selected_product" style="width: 100%; height: 38px">
                                                <option value="">Select a Product</option>
                                                <?php foreach ($mewproducts as $mewproduct): ?>
                                                    <option value="<?php echo $mewproduct['product_id']; ?>">
                                                        <?php echo $mewproduct['product_title']; ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>

                                        <!-- Collection Field (Hidden by Default) -->
                                        <div class="form-group" id="ShowCollectionField" style="display: none;">
                                            <label for="carousel_collection">Collection</label>
                                            <select class="custom-select2 form-control" id="selected_collection"
                                                name="selected_collection" style="width: 100%; height: 38px">
                                                <option value="">Select a Collection</option>
                                                <?php foreach ($collections as $collection): ?>
                                                    <option value="<?php echo $collection['collection_id']; ?>">
                                                        <?php echo $collection['collection_title']; ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>

                                        <!-- Image -->
                                        <div class="form-group">
                                            <label for="carousel_image">Banner Image</label>
                                            <input type="file" id="carousel_image" class="form-control"
                                                name="carousel_image">
                                            <small>Formats:JPG, PNG, JPEG, (WEBP), Max-size: 400 KB, Recommended
                                                Dimensions:1342 x 534 px.</small>
                                        </div>

                                        <!-- Mobile Image -->
                                        <div class="form-group">
                                            <label for="carousel_image">Banner Image Mobile</label>
                                            <input type="file" class="form-control" id="carousel_image_mobile"
                                                name="carousel_image_mobile" />
                                            <small>Formats: JPG, PNG, JPEG, (WEBP), Max-size: 400 KB, Recommended
                                                Dimensions: 430 x 278 px.</small>
                                        </div>

                                        <!-- Visibility -->
                                        <div class="form-group">
                                            <label for="carousel_visibility">Visibility</label>
                                            <select name="carousel_visibility" class="form-control"
                                                id="carousel_visibility">
                                                <option value="1">Active</option>
                                                <option value="0">Draft</option>
                                            </select>
                                        </div>

                                        <!-- Submit Button -->
                                        <button type="submit" class="btn btn-primary">Add</button>
                                    </form>
                                </div>

                                <!-- List of Added Carousels -->
                                <div class="CarouselBoxContainer" id="carouselBoxContainer">
                                    <?php foreach ($carousels as $carousel): ?>
                                        <div class="CarouselBox" id="carouselBox-<?= $carousel['id'] ?>"
                                            data-id="<?= $carousel['id'] ?>">
                                            <div class="d-flex justify-content-between CarouselHeader">
                                                <div class="handle" id="handle">
                                                    ☰ <?= mb_strimwidth($carousel['title'], 0, 16, '...') ?>
                                                </div>
                                                <div class="d-flex actions">
                                                    <!-- Expand/Collapse Icon -->
                                                    <button type="button" class="btn btn-link"
                                                        style="margin-top: 0; padding: 0 12px;"
                                                        onclick="toggleEditFormCarousel(<?= $carousel['id'] ?>)">
                                                        <i id="chevron-<?= $carousel['id'] ?>"
                                                            class="fas fa-chevron-down"></i>
                                                    </button>
                                                    <!-- Delete Button -->
                                                    <a href="javascript:void(0);"
                                                        onclick="deleteCarousel(<?= $carousel['id'] ?>)"
                                                        style="color: red; padding: 0;" class="delete-carousel">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>
                                                </div>
                                            </div>

                                            <!-- Collapsible Edit Form -->
                                            <div class="carousel-edit-form" id="editForm-<?= $carousel['id'] ?>"
                                                style="display:none;">
                                                <form
                                                    action="<?= base_url('online_store/update_carousel/' . $carousel['id']) ?>"
                                                    id="carouselEditForm" class="validate-form" method="post"
                                                    enctype="multipart/form-data">
                                                    <input type="hidden" name="carousel_id" value="<?= $carousel['id'] ?>">

                                                    <!-- Title -->
                                                    <div class="form-group">
                                                        <label for="carousel_title_<?= $carousel['id'] ?>">Title:</label>
                                                        <input type="text" name="carousel_title"
                                                            id="carousel_title_<?= $carousel['id'] ?>"
                                                            class="form-control validate-required"
                                                            data-error-message-required="Username is required."
                                                            value="<?= $carousel['title'] ?>">
                                                    </div>

                                                    <!-- Description -->
                                                    <div class="form-group">
                                                        <label
                                                            for="carousel_description_<?= $carousel['id'] ?>">Description:</label>
                                                        <textarea name="carousel_description"
                                                            id="carousel_description_<?= $carousel['id'] ?>"
                                                            class="form-control resizable-textarea validate-required"
                                                            data-error-message-required="Description is required."><?= $carousel['description'] ?></textarea>
                                                    </div>

                                                    <!-- Select Field (Dropdown) -->
                                                    <div class="form-group">
                                                        <label for="select_link_<?= $carousel['id'] ?>">Select Field</label>
                                                        <select class="custom-select2 form-control select_link"
                                                            id="select_link_<?= $carousel['id'] ?>" name="select_link"
                                                            style="width: 100%; height: 38px">
                                                            <option value="">Select</option>
                                                            <option value="product" <?= ($carousel['selection_type'] != null) ? 'selected' : '' ?>>Product</option>
                                                            <option value="collection" <?= ($carousel['selection_type'] != null) ? 'selected' : '' ?>>Collection</option>
                                                        </select>
                                                    </div>

                                                    <!-- Product Field (Hidden by Default) -->
                                                    <div class="form-group productField"
                                                        id="ShowProductField_<?= $carousel['id'] ?>"
                                                        style="<?= ($carousel['product_id'] != null) ? 'display:block;' : 'display:none;' ?>">
                                                        <label for="selected_product_<?= $carousel['id'] ?>">Product</label>
                                                        <select class="custom-select2 form-control"
                                                            id="selected_product_<?= $carousel['id'] ?>"
                                                            name="selected_product" style="width: 100%; height: 38px">
                                                            <option value="">Select a Product</option>
                                                            <?php foreach ($mewproducts as $mewproduct): ?>
                                                                <option value="<?= $mewproduct['product_id']; ?>"
                                                                    <?= ($carousel['product_id'] == $mewproduct['product_id']) ? 'selected' : '' ?>>
                                                                    <?= esc($mewproduct['product_title']); ?>
                                                                </option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>

                                                    <!-- Collection Field (Hidden by Default) -->
                                                    <div class="form-group collectionField"
                                                        id="ShowCollectionField_<?= $carousel['id'] ?>"
                                                        style="<?= ($carousel['collection_id'] != null) ? 'display:block;' : 'display:none;' ?>">
                                                        <label
                                                            for="selected_collection_<?= $carousel['id'] ?>">Collection</label>
                                                        <select class="custom-select2 form-control"
                                                            id="selected_collection_<?= $carousel['id'] ?>"
                                                            name="selected_collection" style="width: 100%; height: 38px">
                                                            <option value="">Select a Collection</option>
                                                            <?php foreach ($collections as $collection): ?>
                                                                <option value="<?= $collection['collection_id']; ?>"
                                                                    <?= ($carousel['collection_id'] == $collection['collection_id']) ? 'selected' : '' ?>>
                                                                    <?= esc($collection['collection_title']); ?>
                                                                </option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>

                                                    <!-- Banner Image -->
                                                    <div class="form-group">
                                                        <label for="carousel_image_<?= $carousel['id'] ?>">Banner
                                                            Image:</label>
                                                        <input type="file" name="carousel_image"
                                                            id="carousel_image_<?= $carousel['id'] ?>"
                                                            class="form-control validate-file validate-fileType validate-imageDimensions"
                                                            data-image-width="1917" data-image-height="764"
                                                            data-error-message-required="Banner image is required!"
                                                            data-error-message-imageDimensions="The banner image must be exactly 1917 x 764 pixels.">
                                                        <small>Formats: JPG, PNG, JPEG, (WEBP), Max-size: 400 KB,
                                                            Recommended Dimensions: 1342 x 534 px.</small>
                                                        <input type="hidden" name="carousel_pre_image"
                                                            value="<?= $carousel['image'] ?>">
                                                        <img src="<?= $carousel['image'] ?>" alt="Current Image" width="200"
                                                            style="margin-top: 10px;">
                                                    </div>

                                                    <!-- Mobile Image -->
                                                    <div class="form-group">
                                                        <label for="carousel_image_mobile_<?= $carousel['id'] ?>">Banner
                                                            Image Mobile:</label>
                                                        <input type="file" name="carousel_image_mobile"
                                                            id="carousel_image_mobile_<?= $carousel['id'] ?>"
                                                            class="form-control validate-file validate-fileType validate-imageDimensions"
                                                            data-image-width="430" data-image-height="278"
                                                            data-error-message-required="Mobile Banner image is required!"
                                                            data-error-message-imageDimensions="The banner image must be exactly 430 x 278 pixels.">
                                                        <input type="hidden" name="carousel_pre_image_mobile"
                                                            value="<?= $carousel['image_mobile'] ?>">
                                                        <small>Formats: JPG, PNG, JPEG, (WEBP), Max-size: 400 KB,
                                                            Recommended Dimensions: 430 x 278 px.</small>
                                                        <img src="<?= $carousel['image_mobile'] ?>"
                                                            alt="Current Mobile Image" width="200"
                                                            style="margin-top: 10px;">
                                                    </div>

                                                    <!-- Visibility -->
                                                    <div class="form-group">
                                                        <label
                                                            for="carousel_visibility_<?= $carousel['id'] ?>">Visibility:</label>
                                                        <select name="carousel_visibility"
                                                            id="carousel_visibility_<?= $carousel['id'] ?>"
                                                            class="form-control validate-required"
                                                            data-error-message-required="Please select a Visibility.">
                                                            <option value="1" <?= ($carousel['visibility'] == 1) ? 'selected' : '' ?>>Active</option>
                                                            <option value="0" <?= ($carousel['visibility'] == 0) ? 'selected' : '' ?>>Draft</option>
                                                        </select>
                                                    </div>

                                                    <!-- Submit Button -->
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </form>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </ul>
                        </li>
                    </ul>
                </li>

                <!--------------------------------------------------------------------------------------------- Logo form in Home page--------------------------------------------------------------------------------->

                <li id="web-home" class="web-section dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-list"></span>
                        <span class="mtext">Add Logo</span>
                    </a>
                    <ul class="submenu">

                        <!-- First Level Submenu -->
                        <li class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle">
                                <span class="micon bi bi-three-dots"></span>
                                <span class="mtext">Logo</span>
                            </a>
                            <ul class="submenu child">

                                <!-- Plus Button to Add New -->
                                <div class="hr-container">
                                    <hr class="line">
                                    <button id="togglelogoFormButton" class="circle-button">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                    <hr class="line">
                                </div>

                                <!-- Add Logo Form -->
                                <div class="ImageUploadBox" id="logoAddForm" style="display: none;">
                                    <form id="homeLogoForm" class="validate-form" method="post"
                                        enctype="multipart/form-data">

                                        <!-- Title Field -->
                                        <div class="form-group">
                                            <label for="title">Title</label>
                                            <input type="text" id="title" name="title" class="form-control" required />
                                        </div>

                                        <!-- Logo Field -->
                                        <div class="form-group">
                                            <label for="logo">Logo</label>
                                            <input type="file" class="form-control" id="logo" name="logo" />
                                            <small>Formats: JPG, PNG, JPEG, (WEBP), Max-size: 400 KB, Recommended
                                                Dimensions: 240 x 90 px.</small>
                                        </div>

                                        <!-- Visibility Field -->
                                        <div class="form-group">
                                            <label for="visibility">Visibility</label>
                                            <select id="visibility" name="visibility" class="form-control">
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                            </select>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Save Logo</button>
                                    </form>
                                </div>

                                <!-- List of Added Logos with Edit Option -->
                                <div class="LogoBoxContainer" id="logoBoxContainer">
                                    <?php foreach ($logos as $logo): ?>
                                        <div class="LogoBox" id="logoBox-<?= htmlspecialchars($logo['id']) ?>">
                                            <div class="d-flex justify-content-between align-items-center">

                                                <!-- Display Title -->
                                                <div class="logo-title">
                                                    <strong><?= htmlspecialchars($logo['title']) ?></strong>
                                                </div>

                                                <!-- Logo Preview -->
                                                <img src="<?= htmlspecialchars($logo['logo']) ?>" alt="Logo" width="40" />

                                                <div class="actions">
                                                    <!-- Toggle Edit Button -->
                                                    <button type="button" class="btn btn-link"
                                                        onclick="toggleEditFormLogo(<?= $logo['id'] ?>)">
                                                        <i id="chevron-<?= $logo['id'] ?>" class="fas fa-chevron-down"></i>
                                                    </button>

                                                    <button type="button" class="btn btn-danger btn-sm"
                                                        onclick="deleteLogo(<?= $logo['id'] ?>)">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>

                                                </div>
                                            </div>

                                            <!-- Collapsible Edit Form -->
                                            <div class="ImageUploadBox" id="editForm_<?= $logo['id'] ?>"
                                                style="display: none;">
                                                <form id="editLogoForm-<?= $logo['id'] ?>" class="validate-form"
                                                    method="post" enctype="multipart/form-data">
                                                    <input type="hidden" name="id"
                                                        value="<?= htmlspecialchars($logo['id']) ?>" />

                                                    <!-- Title Field -->
                                                    <div class="form-group">
                                                        <label for="title_<?= $logo['id'] ?>">Title</label>
                                                        <input type="text" id="title_<?= $logo['id'] ?>" name="title"
                                                            class="form-control"
                                                            value="<?= htmlspecialchars($logo['title']) ?>" required />
                                                    </div>

                                                    <!-- Logo Upload Field -->
                                                    <div class="form-group">
                                                        <label for="logo_<?= $logo['id'] ?>">Logo</label>
                                                        <input type="file" class="form-control" id="logo_<?= $logo['id'] ?>" name="logo"
                                                            onchange="previewLogo(event, <?= $logo['id'] ?>)" />
                                                        <small>Formats: JPG, PNG, JPEG, (WEBP), Max-size: 400 KB, Recommended
                                                            Dimensions: 240 x 90 px.</small>
                                                    </div>

                                                    <!-- Preview of Existing Logo -->
                                                    <div class="form-group">
                                                        <label>Current Logo</label>
                                                        <img id="previewLogo-<?= $logo['id'] ?>"
                                                            src="<?= htmlspecialchars($logo['logo']) ?>" alt="Logo Preview"
                                                            width="100" />
                                                    </div>

                                                    <!-- Visibility Field -->
                                                    <div class="form-group">
                                                        <label for="visibility_<?= $logo['id'] ?>">Visibility</label>
                                                        <select id="visibility_<?= $logo['id'] ?>" name="visibility"
                                                            class="form-control">
                                                            <option value="yes" <?= ($logo['visibility'] == 'yes') ? 'selected' : '' ?>>Yes</option>
                                                            <option value="no" <?= ($logo['visibility'] == 'no') ? 'selected' : '' ?>>No</option>
                                                        </select>
                                                    </div>

                                                    <!-- Submit Button -->
                                                    <button type="button" class="btn btn-primary"
                                                        onclick="updateLogo(<?= $logo['id'] ?>)">Update Logo</button>
                                                </form>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </ul>
                        </li>
                    </ul>
                </li>

                <!------------------------------------------------------------------------------------------------- Collections in Home page--------------------------------------------------------------------------------->

                <!-- Collection Section -->
                <li id="web-home" class="web-section dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-list"></span>
                        <span class="mtext">Collection Section</span>
                    </a>
                    <ul class="submenu">
                        <form id="homecollection-form">
                            <div class="ImageUploadBox">
                                <div class="form-group">
                                    <label for="fav_collection">Favorite Collections</label>
                                    <div class="dropdown">
                                        <button class="btn p-3 pr-5 btn-secondary dropdown-toggle" type="button"
                                            id="favCollectionsDropdown" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            Select Favorite Collections
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="favCollectionsDropdown">
                                            <?php
                                            // Convert comma-separated collection IDs into an array
                                            $selectedCollectionsArray = explode(',', $selectedCollections ?? '');

                                            // Iterate through available collections to generate checkboxes
                                            foreach ($availableCollections as $collection): ?>
                                                <div class="dropdown-item">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox"
                                                            class="custom-control-input collection-checkbox"
                                                            id="collection_<?= $collection['collection_id'] ?>"
                                                            data-id="<?= $collection['collection_id'] ?>"
                                                            data-title="<?= $collection['collection_title'] ?>"
                                                            <?= in_array($collection['collection_id'], $selectedCollectionsArray) ? 'checked' : '' ?>>
                                                        <label class="custom-control-label"
                                                            for="collection_<?= $collection['collection_id'] ?>">
                                                            <?= $collection['collection_title'] ?>
                                                        </label>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                                <!-- Display Selected Collections -->
                                <ul class="sortable-list" id="favCollectionsList"></ul>
                                <!-- Hidden Input to Store Selected Collection IDs -->
                                <input type="hidden" name="fav_collection" id="fav_collection_input"
                                    value="<?= isset($selectedCollections) ? implode(',', $selectedCollectionsArray) : '' ?>">
                            </div>
                        </form>
                    </ul>
                </li>


                <!-------------------------------------------------------------- Product in Home page--------------------------------------------------------------------------------->

                <li id="web-home" class="web-section dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-list"></span>
                        <span class="mtext">Product Carousel</span>
                    </a>
                    <ul class="submenu child">
                        <!-- Plus Button to Add New -->
                        <div class="hr-container">
                            <hr class="line">
                            <button id="toggleProductFormButton" class="circle-button">
                                <i class="fas fa-plus"></i>
                            </button>
                            <hr class="line">
                        </div>

                        <!-- Add Product Form -->
                        <div class="ImageUploadBox" id="productAddForm" style="display: none;">
                            <form action="<?= base_url('online_store/add_new_product') ?>" id="productForm"
                                method="post" enctype="multipart/form-data">
                                <!-- Title -->
                                <div class="form-group">
                                    <label for="product_title">Title</label>
                                    <input type="text" class="form-control" id="product_title" name="product_title"
                                        placeholder="Enter Title" required />
                                </div>

                                <!-- Description -->
                                <div class="form-group">
                                    <label for="product_description">Description</label>
                                    <textarea class="resizable-textarea form-control" name="product_description"
                                        id="product_description"></textarea>
                                </div>

                                <!-- Select Field (Dropdown) -->
                                <div class="form-group">
                                    <label for="select_type">Select Field</label>
                                    <select class="custom-select2 form-control" id="select_type" name="select_type" style="width: 100%; height: 38px">
                                        <option value="">Select</option>
                                        <option value="product">Product</option>
                                        <option value="collection">Collection</option>
                                    </select>
                                </div>

                                <!-- Product Field (Hidden by Default) -->
                                <div class="form-group" id="ShowProduct" style="display: none;">
                                    <label for="productSearch">Select Product</label>

                                    <!-- Search Bar -->
                                    <input type="text" id="productSearch" class="form-control" placeholder="Product name or SKU...">

                                    <div class="SelectProductBox">
                                        <ul id="productList">
                                            <?php foreach ($products as $product): ?>
                                                <li class="selectable-product" data-id="<?= $product['product_id']; ?>" data-sku="<?= esc($product['sku']); ?>">
                                                    <span class="product-title"><?= esc($product['product_title']); ?></span>
                                                    <span class="product-sku" style="display: none;"><?= esc($product['sku']); ?></span>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </div>

                                <!-- Collection Field (Hidden by Default) -->
                                <div class="form-group" id="ShowCollection" style="display: none;">
                                    <label for="collectionSearch">Select Collection</label>

                                    <!-- Search Bar -->
                                    <input type="text" id="collectionSearch" class="form-control" placeholder="Search collections by name or ID...">

                                    <div class="SelectCollectionBox">
                                        <ul id="collectionList">
                                            <?php foreach ($collections as $collection): ?>
                                                <li class="selectable-collection" data-id="<?= $collection['collection_id']; ?>" data-collection-id="<?= esc($collection['collection_id']); ?>">
                                                    <span class="collection-title"><?= esc($collection['collection_title']); ?></span>
                                                    <span class="collection-id" style="display: none;"><?= esc($collection['collection_id']); ?></span>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </div>

                                <!-- Hidden Input to Store Selected IDs -->
                                <input type="hidden" name="selected_product_items" id="selected_product_items">
                                <input type="hidden" name="selected_collection_items" id="selected_collection_items">

                                <!-- Submit Button -->
                                <button type="submit" class="btn btn-primary">Add</button>
                            </form>
                        </div>

                        <!-- List of Added Products -->
                        <div class="ProductBoxContainer" id="productBoxContainer">
                            <?php foreach ($product_list as $product): ?>
                                <div class="ProductBox" id="productBox-<?= $product['id'] ?>"
                                    data-id="<?= $product['id'] ?>">
                                    <div class="d-flex justify-content-between ProductHeader">
                                        <div class="handle">☰ <?= mb_strimwidth($product['title'], 0, 16, '...') ?></div>
                                        <div class="d-flex actions">
                                            <button type="button" class="btn btn-link"
                                                onclick="toggleEditFormProduct(<?= $product['id'] ?>)">
                                                <i id="chevron-<?= $product['id'] ?>" class="fas fa-chevron-down"></i>
                                            </button>
                                            <a href="javascript:void(0);" onclick="deleteProduct(<?= $product['id'] ?>)"
                                                style="color: red; padding: 0;" class="delete-product">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </div>
                                    </div>

                                    <!-- Collapsible Edit Form -->
                                    <div class="product-edit-form" id="editForm-<?= $product['id'] ?>"
                                        style="display:none;">
                                        <form action="<?= base_url('online_store/update_product/' . $product['id']) ?>"
                                            method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="product_id" value="<?= $product['id'] ?>">

                                            <div class="form-group">
                                                <label for="product_title_<?= $product['id'] ?>">Title:</label>
                                                <input type="text" name="product_title"
                                                    id="product_title_<?= $product['id'] ?>" class="form-control"
                                                    value="<?= $product['title'] ?>">
                                            </div>

                                            <div class="form-group">
                                                <label for="product_description_<?= $product['id'] ?>">Description:</label>
                                                <textarea name="product_description"
                                                    id="product_description_<?= $product['id'] ?>"
                                                    class="form-control"><?= $product['description'] ?></textarea>
                                            </div>

                                            <!-- Select Type -->
                                            <div class="form-group">
                                                <label for="select_type_<?= $product['id'] ?>">Select Field</label>
                                                <select class="custom-select2 form-control select-type" id="select_type_<?= $product['id'] ?>" name="select_type" style="width: 100%; height: 38px">
                                                    <option value="product" <?= ($product['selection_type'] == "product") ? 'selected' : '' ?>>Product</option>
                                                    <option value="collection" <?= ($product['selection_type'] == "collection") ? 'selected' : '' ?>>Collection</option>
                                                </select>
                                            </div>

                                            <?php
                                                $selectedItems = json_decode($product['selected_items'], true);
                                                $selectedProducts = $selectedItems;
                                            ?>

                                            <!-- Product Field (Hidden by Default) -->
                                            <div class="form-group product-section" id="ShowProduct_<?= $product['id'] ?>" style="<?= ($product['selection_type'] == 'product') ? 'display:block;' : 'display:none;' ?>">
                                                <label for="selected_products_<?= $product['id'] ?>">Selected Products</label>
                                                <select class="custom-select2 form-control selected-products" id="selected_products_<?= $product['id'] ?>" name="selected_product[]" multiple style="width: 100%; height: 38px">
                                                    <?php foreach ($products as $prod): ?>
                                                        <option value="<?= $prod['product_id']; ?>" <?= in_array($prod['product_id'], $selectedProducts) ? 'selected' : '' ?>>
                                                            <?= esc($prod['product_title']); ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>

                                            <!-- Collection Field (Hidden by Default) -->
                                            <div class="form-group collection-section" id="ShowCollection_<?= $product['id'] ?>" style="<?= ($product['selection_type'] == 'collection') ? 'display:block;' : 'display:none;' ?>">
                                                <label for="selected_collections_<?= $product['id'] ?>">Selected Collections</label>
                                                <select class="custom-select2 form-control selected-collections" id="selected_collections_<?= $product['id'] ?>" name="selected_collection[]" multiple style="width: 100%; height: 38px">
                                                    <?php foreach ($collections as $col): ?>
                                                        <option value="<?= $col['collection_id']; ?>" <?= $col['collection_id'] == $product['collection_id'] ? 'selected' : '' ?>>
                                                            <?= esc($col['collection_title']); ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>

                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </form>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </ul>
                </li>

                <!-------------------------------------------------------------- Blogs in Home page--------------------------------------------------------------------------------->

                <form id="homeblog-form">
                    <!-- Blog Section -->
                    <li id="web-home" style="display: none;" class="web-section dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon bi bi-list"></span>
                            <span class="mtext">Blog Section</span>
                        </a>
                        <ul class="submenu">
                            <div class="ImageUploadBox">
                                <div class="form-group">
                                    <label for="fav_blog">Favorite Blogs</label>
                                    <div class="dropdown">
                                        <button class="btn p-3 pr-5 btn-secondary dropdown-toggle" type="button"
                                            id="favBlogsDropdown" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            Select Favorite Blogs
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="favBlogsDropdown">
                                            <?php
                                            // Iterate through all available blogs to generate the checkboxes
                                            foreach ($blogs as $blog): ?>
                                                <div class="dropdown-item">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input blog-checkbox"
                                                            id="blog_<?= $blog['blog_id'] ?>"
                                                            data-id="<?= $blog['blog_id'] ?>"
                                                            data-title="<?= $blog['blog_title'] ?>"
                                                            <?= in_array($blog['blog_id'], $selectedBlogs) ? 'checked' : '' ?>>
                                                        <label class="custom-control-label"
                                                            for="blog_<?= $blog['blog_id'] ?>">
                                                            <?= $blog['blog_title'] ?>
                                                        </label>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                                <!-- Display Selected Blogs -->
                                <ul class="sortable-list" id="favBlogsList"></ul>
                                <!-- Hidden Input to Store Selected Blog IDs -->
                                <input type="hidden" name="fav_blog" id="fav_blog_input"
                                    value="<?= implode(',', $selectedBlogs ?? []) ?>">
                            </div>
                        </ul>
                    </li>
                </form>


                <!-------------------------------------------------------------- home_carousel2--------------------------------------------------------------------------------->

                <li id="web-home" class="web-section dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-list"></span>
                        <span class="mtext">Hero Section</span>
                    </a>
                    <ul class="submenu">
                        <li class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle">
                                <span class="micon bi bi-three-dots"></span>
                                <span class="mtext">Carousel 2</span>
                            </a>
                            <ul class="submenu child">
                                <!-- List of Added Carousel Items -->
                                <div class="CarouselBoxContainer" id="carousel2BoxContainer">
                                    <?php foreach ($carousel2 as $item): ?>
                                        <div class="CarouselBox" id="carouselBox-<?= $item['id'] ?>">
                                            <div class="carousel-header d-flex justify-content-between align-items-center">
                                                <div class="carousel-title"><?= $item['title'] ?></div>
                                                <div class="carousel-buttons">
                                                    <button class="btn btn-sm btn-outline-dark"
                                                        onclick="toggleEditForm(<?= $item['id'] ?>)">Edit</button>
                                                </div>
                                            </div>

                                            <div class="carousel-edit-form" id="editForm-<?= $item['id'] ?>"
                                                style="display:none;">
                                                <form action="<?= base_url('carousel2/update_carsecond/' . $item['id']) ?>"
                                                    method="post" enctype="multipart/form-data" class="carousel-form"
                                                    id="carousel-form">
                                                    <input type="hidden" name="id" value="<?= $item['id'] ?>" />

                                                    <div class="form-group">
                                                        <label>Title</label>
                                                        <input type="text" name="title" value="<?= $item['title'] ?>"
                                                            class="form-control" />
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Description</label>
                                                        <textarea name="description"
                                                            class="form-control"><?= $item['description'] ?></textarea>
                                                    </div>

                                                    <!-- Select Field (Dropdown) -->
                                                    <div class="form-group">
                                                        <label for="select_link_<?= htmlspecialchars($item['id']) ?>"
                                                            class="font-weight-bold">Select Type</label>
                                                        <select
                                                            class="custom-select form-control select_link border-dark shadow-sm"
                                                            id="select_link_<?= htmlspecialchars($item['id']) ?>"
                                                            name="select_link"
                                                            style="width: 100%; height: 42px; font-size: 16px;">
                                                            <option value="">Select</option>
                                                            <option value="product" <?= (!empty($item['select_link']) && $item['select_link'] == 'product') ? 'selected' : '' ?>>
                                                                Product</option>
                                                            <option value="collection" <?= (!empty($item['select_link']) && $item['select_link'] == 'collection') ? 'selected' : '' ?>>
                                                                Collection</option>
                                                        </select>
                                                    </div>

                                                    <!-- Product Field -->
                                                    <div class="card shadow-sm border-dark p-3 productField"
                                                        id="ShowProductField_<?= $item['id'] ?>"
                                                        style="<?= ($item['select_link'] == 'product') ? 'display:block;' : 'display:none;' ?>">
                                                        <h6 class="text-success"><i class="bi bi-box-seam"></i> Selected
                                                            Product</h6>
                                                        <select class="custom-select form-control border-dark shadow-sm"
                                                            id="selected_product_<?= $item['id'] ?>" name="selected_product"
                                                            style="width: 100%; height: 42px; font-size: 16px;"
                                                            onchange="updatePreview('product', <?= $item['id'] ?>)">
                                                            <option value="">Select a Product</option>
                                                            <?php foreach ($mewproducts as $mewproduct): ?>
                                                                <option value="<?= $mewproduct['product_id']; ?>"
                                                                    <?= ($item['selected_product'] == $mewproduct['product_id']) ? 'selected' : '' ?>>
                                                                    <?= esc($mewproduct['product_title']); ?>
                                                                </option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <div class="mt-2" id="productPreview_<?= $item['id'] ?>"></div>
                                                    </div>

                                                    <!-- Collection Field -->
                                                    <div class="card shadow-sm border-dark p-3 collectionField"
                                                        id="ShowCollectionField_<?= $item['id'] ?>"
                                                        style="<?= ($item['select_link'] == 'collection') ? 'display:block;' : 'display:none;' ?>">
                                                        <h6 class="text-info"><i class="bi bi-collection"></i> Selected
                                                            Collection</h6>
                                                        <select class="custom-select form-control border-dark shadow-sm"
                                                            id="selected_collection_<?= $item['id'] ?>"
                                                            name="selected_collection"
                                                            style="width: 100%; height: 42px; font-size: 16px;"
                                                            onchange="updatePreview('collection', <?= $item['id'] ?>)">
                                                            <option value="">Select a Collection</option>
                                                            <?php foreach ($collections as $collection): ?>
                                                                <option value="<?= $collection['collection_id']; ?>"
                                                                    <?= ($item['selected_collection'] == $collection['collection_id']) ? 'selected' : '' ?>>
                                                                    <?= esc($collection['collection_title']); ?>
                                                                </option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <div class="mt-2" id="collectionPreview_<?= $item['id'] ?>"></div>
                                                    </div>


                                                    <div class="form-group">
                                                        <label>Banner Image</label>
                                                        <input type="file" name="image" class="form-control-file" />
                                                        <small>Formats: JPG, PNG, JPEG, (WEBP), Max-size: 400 KB,
                                                            Recommended Dimensions: 1755 x 726px.</small>
                                                        <div class="preview-container">
                                                            <img src="<?= ($item['image']) ?>" class="img-preview" />
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Mobile Banner Image</label>
                                                        <input type="file" name="image_mobile" class="form-control-file" />
                                                        <small>Formats: JPG, PNG, JPEG, (WEBP), Max-size: 400 KB,
                                                            Recommended Dimensions: 91 x 677px.</small>
                                                        <div class="preview-container">
                                                            <img src="<?= ($item['image_mobile']) ?>" class="img-preview" />
                                                        </div>
                                                    </div>

                                                    <button type="submit" class="btn btn-primary btn-sm">Update</button>
                                                </form>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </ul>
                        </li>
                    </ul>
                </li>

                <!---------------------------------------------------------------------- All Image Form ----------------------------------------------------------------------------------------------->

                <li id="web-home" class="web-section dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-list"></span>
                        <span class="mtext">Images</span>
                    </a>
                    <ul class="submenu child">
                        <div class="ImageUploadBox">
                            <?php foreach ($dataimages as $dataimage): ?>
                                <form action="<?= base_url('home-image/save') ?>" id="homeImageForm" method="post"
                                    enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="image_title1">Image Title 1</label>
                                        <input type="text" name="image_title1" id="image_title1" class="form-control"
                                            value="<?= esc($dataimage['image_title1'] ?? '') ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="description1">Description</label>
                                        <textarea name="description1" id="description1"
                                            class="form-control"><?= esc($dataimage['description1'] ?? '') ?></textarea>
                                    </div>
                                    <!-- Image 1 Upload -->
                                    <div class="form-group">
                                        <label for="background_image1">Background Image 1</label>
                                        <input type="file" name="background_image1" id="background_image1"
                                            class="form-control" accept="image/*"
                                            onchange="previewImage(event, 'previewImage1')">
                                        <small>Formats: JPG, PNG, JPEG, (WEBP), Max-size: 400 KB, Recommended Dimensions:
                                            570 x 534 px.</small>

                                        <!-- Image Preview -->
                                        <div style="margin-top: 10px;">
                                            <img id="previewImage1"
                                                src="<?= !empty($dataimage['background_image1']) ? esc($dataimage['background_image1']) : '' ?>"
                                                alt="Image Preview 1"
                                                style="width: 120px; border: 1px solid #ddd; padding: 5px; display: <?= !empty($dataimage['background_image1']) ? 'block' : 'none' ?>; margin-top: 10px;">
                                        </div>
                                    </div>

                                    <!-- Product/Collection Selection -->
                                    <div class="form-group">
                                        <label for="select_link1" class="font-weight-bold">Select Field</label>
                                        <select class="custom-select form-control border-dark shadow-sm" id="select_link1"
                                            name="select_link1" style="width: 100%; height: 42px; font-size: 16px;"
                                            onchange="toggleFields(1)">
                                            <option value="">Select</option>
                                            <option value="product" <?= ($dataimage['select_link1'] == "product") ? 'selected' : '' ?>>Product</option>
                                            <option value="collection" <?= ($dataimage['select_link1'] == "collection") ? 'selected' : '' ?>>Collection</option>
                                        </select>
                                    </div>

                                    <!-- Product Selection -->
                                    <div class="card shadow-sm border-dark p-3" id="ShowProductField1"
                                        style="display: <?= ($dataimage['select_link1'] == "product") ? 'block' : 'none' ?>;">
                                        <h6 class="text-dark"><i class="bi bi-box-seam"></i> Products</h6>
                                        <select class="custom-select form-control border-dark shadow-sm"
                                            id="selected_product1" name="selected_product1[]"
                                            onchange="updatePreview('product')">
                                            <?php
                                            $selectedProducts1 = is_array(json_decode($dataimage['selected_product1'], true)) ? json_decode($dataimage['selected_product1'], true) : [(int) $dataimage['selected_product1']];
                                            foreach ($products as $prod): ?>
                                                <option value="<?= $prod['product_id']; ?>" <?= in_array($prod['product_id'], $selectedProducts1) ? 'selected' : '' ?>>
                                                    <?= esc($prod['product_title']); ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                        <div class="mt-2" id="productPreview"></div>
                                    </div>

                                    <!-- Collection Selection -->
                                    <div class="card shadow-sm border-dark p-3" id="ShowCollectionField1"
                                        style="display: <?= ($dataimage['select_link1'] == "collection") ? 'block' : 'none' ?>;">
                                        <h6 class="text-info"><i class="bi bi-collection"></i>Collections</h6>
                                        <select class="custom-select form-control border-dark shadow-sm"
                                            id="selected_collection1" name="selected_collection1[]"
                                            onchange="updatePreview('collection')">
                                            <?php
                                            $selectedCollections1 = is_array(json_decode($dataimage['selected_collection1'], true))
                                                ? json_decode($dataimage['selected_collection1'], true)
                                                : [(int) $dataimage['selected_collection1']];
                                            foreach ($collections as $col): ?>
                                                <option value="<?= $col['collection_id']; ?>" <?= in_array($col['collection_id'], $selectedCollections1) ? 'selected' : '' ?>>
                                                    <?= esc($col['collection_title']); ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                        <div class="mt-2" id="collectionPreview"></div>
                                    </div>

                                    <!-- Image 2 -->
                                    <div class="form-group">
                                        <label for="title2">Image Title 2</label>
                                        <input type="text" name="title2" id="title2" class="form-control"
                                            value="<?= esc($dataimage['title2'] ?? '') ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="description2">Description</label>
                                        <textarea name="description2" id="description2"
                                            class="form-control"><?= esc($dataimage['description2'] ?? '') ?></textarea>
                                    </div>

                                    <!-- Image 2 Upload -->
                                    <div class="form-group">
                                        <label for="background_image2">Background Image 2</label>
                                        <input type="file" name="background_image2" id="background_image2"
                                            class="form-control" accept="image/*"
                                            onchange="previewImage(event, 'previewImage2')">
                                        <small>Formats: JPG, PNG, JPEG, (WEBP), Max-size: 400 KB, Recommended Dimensions:
                                            570 x 534 px.</small>
                                        <!-- Image Preview -->
                                        <div style="margin-top: 10px;">
                                            <img id="previewImage2"
                                                src="<?= !empty($dataimage['background_image2']) ? esc($dataimage['background_image2']) : '' ?>"
                                                alt="Image Preview 2"
                                                style="width: 120px; border: 1px solid #ddd; padding: 5px; display: <?= !empty($dataimage['background_image2']) ? 'block' : 'none' ?>; margin-top: 10px;">
                                        </div>
                                    </div>

                                    <!-- Product/Collection Selection 2 -->
                                    <div class="form-group">
                                        <label for="select_link2" class="font-weight-bold">Select Field</label>
                                        <select class="custom-select form-control border-dark shadow-sm" id="select_link2"
                                            name="select_link2" style="width: 100%; height: 42px; font-size: 16px;"
                                            onchange="toggleFields(2)">
                                            <option value="">Select</option>
                                            <option value="product" <?= ($dataimage['select_link2'] == "product") ? 'selected' : '' ?>>Product</option>
                                            <option value="collection" <?= ($dataimage['select_link2'] == "collection") ? 'selected' : '' ?>>Collection</option>
                                        </select>
                                    </div>

                                    <!-- Product Selection -->
                                    <div class="card shadow-sm border-dark p-3" id="ShowProductField2"
                                        style="display: <?= ($dataimage['select_link2'] == "product") ? 'block' : 'none' ?>;">
                                        <h6 class="text-success"><i class="bi bi-box-seam"></i> Products</h6>
                                        <select class="custom-select form-control border-dark shadow-sm"
                                            id="selected_product2" name="selected_product2[]"
                                            onchange="updatePreview('product', 2)">
                                            <?php
                                            $selectedProducts2 = is_array(json_decode($dataimage['selected_product2'], true))
                                                ? json_decode($dataimage['selected_product2'], true)
                                                : [(int) $dataimage['selected_product2']];
                                            foreach ($products as $prod): ?>
                                                <option value="<?= $prod['product_id']; ?>" <?= in_array($prod['product_id'], $selectedProducts2) ? 'selected' : '' ?>>
                                                    <?= esc($prod['product_title']); ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                        <div class="mt-2" id="productPreview2"></div>
                                    </div>

                                    <!-- Collection Selection -->
                                    <div class="card shadow-sm border-dark p-3" id="ShowCollectionField2"
                                        style="display: <?= ($dataimage['select_link2'] == "collection") ? 'block' : 'none' ?>;">
                                        <h6 class="text-info"><i class="bi bi-collection"></i>Collections</h6>
                                        <select class="custom-select form-control border-dark shadow-sm"
                                            id="selected_collection2" name="selected_collection2[]"
                                            onchange="updatePreview('collection', 2)">
                                            <?php
                                            $selectedCollections2 = is_array(json_decode($dataimage['selected_collection2'], true))
                                                ? json_decode($dataimage['selected_collection2'], true)
                                                : [(int) $dataimage['selected_collection2']];
                                            foreach ($collections as $col): ?>
                                                <option value="<?= $col['collection_id']; ?>" <?= in_array($col['collection_id'], $selectedCollections2) ? 'selected' : '' ?>>
                                                    <?= esc($col['collection_title']); ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                        <div class="mt-2" id="collectionPreview2"></div>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Save</button>
                                </form>
                            <?php endforeach; ?>
                        </div>
                    </ul>
                </li>




 <!-------------------------------------------------------------------------------------------------- All Blogs Form -------------------------------------------------------------------->


                <!-- Blogs Section -->
                <li id="web-blogs" class="web-section dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-list"></span>
                        <span class="mtext">Blogs Section</span>
                    </a>
                    <ul class="submenu">
                        <div class="ImageUploadBox">
                            <form id="blog-settings-form">
                                <!-- Blogs Title -->
                                <div class="form-group">
                                    <label for="blogs_title">Blogs Section Title</label>
                                    <input type="text" name="blogs_title" id="blogs_title" class="form-control"
                                        value="<?= esc($settings['blogs_title'] ?? '') ?>">
                                </div>

                                <!-- Popular Tags -->
                                <div class="form-group">
                                    <label for="popular_tags">Popular Tags</label>
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                            id="tagsDropdown" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            Select Tags
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="tagsDropdown">
                                            <?php foreach ($tags as $tag): ?>
                                                <div class="dropdown-item">
                                                    <input type="checkbox" class="tag-checkbox" id="tag_<?= $tag['id'] ?>"
                                                        data-id="<?= $tag['id'] ?>"
                                                        data-title="<?= esc($tag['tag_name']) ?>" <?= in_array($tag['id'], explode(',', $settings['popular_tags'] ?? '')) ? 'checked' : '' ?>>
                                                    <label for="tag_<?= $tag['id'] ?>"><?= esc($tag['tag_name']) ?></label>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                                <ul class="sortable-list" id="tagsList"></ul>
                                <input type="hidden" name="popular_tags" id="tags_input"
                                    value="<?= $settings['popular_tags'] ?? '' ?>">

                                <!-- Popular Posts -->
                                <div class="form-group">
                                    <label for="popular_posts">Select Popular Posts</label>
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                            id="popularPostsDropdown" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            Select Popular Posts
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="popularPostsDropdown">
                                            <?php foreach ($blogs as $blog): ?>
                                                <div class="dropdown-item">
                                                    <input type="checkbox" class="popular-post-checkbox"
                                                        id="post_<?= $blog['blog_id'] ?>" data-id="<?= $blog['blog_id'] ?>"
                                                        data-title="<?= esc($blog['blog_title']) ?>"
                                                        <?= in_array($blog['blog_id'], explode(',', $settings['popular_posts'] ?? '')) ? 'checked' : '' ?>>
                                                    <label
                                                        for="post_<?= $blog['blog_id'] ?>"><?= esc($blog['blog_title']) ?></label>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                                <ul class="sortable-list" id="popularPostsList"></ul>
                                <input type="hidden" name="popular_posts" id="popular_posts_input"
                                    value="<?= $settings['popular_posts'] ?? '' ?>">
                            </form>
                        </div>
                    </ul>
                </li>

                <!-------------------------------------------------------------------------------------------------- All Blogs Form Chaitanya-------------------------------------------------------------------->


                <!-- Blogs Section -->
                <li id="web-blogs" style="display: none;" class="web-section dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-list"></span>
                        <span class="mtext">Blogs</span>
                    </a>
                    <ul class="submenu">
                        <!-- Plus Button to Add New -->
                        <div class="hr-container">
                            <hr class="line">
                            <button type="button" id="blogsplus" class="circle-button">
                                <i class="fas fa-plus"></i>
                            </button>
                            <hr class="line">
                        </div>

                        <!-- Add New blogs Form -->
                        <div class="ImageUploadBox" id="AddNewblogsForm" style="display: none;">
                            <form id="addblogs" method="post" enctype="multipart/form-data">
                                <h6 class="mt-3">Add Blogs</h6>
                                <hr class="mt-1">
                                <!-- Title -->
                                <div class="form-group">
                                    <label for="blogs_name">Name</label>
                                    <input type="text" name="blogs_name" id="blogs_name" class="form-control" placeholder="Enter blogs">
                                </div>
                                <div class="form-group">
                                    <label for="blogs_description">About Description</label>
                                    <div class="quill-editor" data-target="blogs_description"></div>
                                    <input type="hidden" name="blogs_description" id="blogs_description">
                                </div>


                                <!-- Selection Dropdown -->
                                <div class="form-group">
                                    <label for="contentType">Select Content Type</label>
                                    <select id="contentType" name="content_type" class="form-control">
                                        <option value="">-- Select --</option>
                                        <option value="blogs">Blogs</option>
                                        <option value="tags">Tags</option>
                                    </select>
                                </div>


                                <!-- Blog Selection (Hidden Initially) -->
                                <div id="blogSelection" style="display: none;">
                                    <div class="form-group">
                                        <label for="newblog"></label>
                                        <div class="dropdown">
                                            <button class="btn p-3 pr-5 btn-secondary dropdown-toggle" type="button"
                                                id="newblogDropdown" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                Select Blogs
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="newblogDropdown">
                                                <div class="dropdown-item search_bar p-2">
                                                    <input type="text" class="form-control dropdown-search" placeholder="Search items...">
                                                </div>
                                                <?php foreach ($blogs as $blog): ?>
                                                    <div class="dropdown-item search-item">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input newblog-checkbox"
                                                                id="newblog_<?= $blog['blog_id'] ?>"
                                                                data-id="<?= $blog['blog_id'] ?>"
                                                                data-title="<?= $blog['blog_title'] ?>">
                                                            <label class="custom-control-label"
                                                                for="newblog_<?= $blog['blog_id'] ?>"><?= $blog['blog_title'] ?></label>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="newblogsBoxContainer" id="newblogsboxcontainer"></div>
                                </div>


                                <!-- Tag Selection (Hidden Initially) -->
                                <div id="tagSelection" style="display: none;">
                                    <div class="form-group">
                                        <label for="newtag"></label>
                                        <div class="dropdown">
                                            <button class="btn p-3 pr-5 btn-secondary dropdown-toggle" type="button"
                                                id="newtagDropdown" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                Select Tags
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="newtagDropdown">
                                                <div class="dropdown-item search_bar p-2">
                                                    <input type="text" class="form-control dropdown-search" placeholder="Search items...">
                                                </div>
                                                <?php foreach ($tags as $tag): ?>
                                                    <div class="dropdown-item search-item">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input newtag-checkbox"
                                                                id="newtag_<?= $tag['id'] ?>"
                                                                data-id="<?= $tag['id'] ?>"
                                                                data-title="<?= $tag['tag_name'] ?>">
                                                            <label class="custom-control-label"
                                                                for="newtag_<?= $tag['id'] ?>"><?= $tag['tag_name'] ?></label>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="newtagsBoxContainer" id="newtagsboxcontainer"></div>
                                </div>

                                <!-- Submit Button -->
                                <button type="submit" class="btn btn-primary">Add</button>
                            </form>
                        </div>


                        <!-- List of blogs -->
                        <div class="blogsBoxContainer" id="blogsBoxContainer">
                            <?php foreach ($os_blogs as $os_blog) : ?>
                                <div class="blogsBox" id="blogBox-<?= $os_blog['id'] ?>" data-id="<?= $os_blog['id'] ?>">

                                    <div class="CarouselHeader">
                                        <div class="handle" id="handle">☰ <?= (strlen($os_blog['blogs_name']) > 6) ? substr($os_blog['blogs_name'], 0, 6) . '...' : $os_blog['blogs_name'] ?></div>
                                        <div class="actions">
                                            <!-- Expand/Collapse Icon -->
                                            <button type="button" class="btn btn-link" style="margin-top: 0;" onclick="toggleEditFormblog(<?= $os_blog['id'] ?>)">
                                                <i id="chevron-<?= $os_blog['id'] ?>" class="fas fa-chevron-down"></i>
                                            </button>
                                            <!-- Delete Button -->
                                            <a href="javascript:void(0);" onclick="deleteblog(<?= $os_blog['id'] ?>)" class="" style="color: red; padding: 0;">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </div>
                                    </div>

                                    <!-- Collapsible Edit Form -->
                                    <div class="edit-form" id="editblogForm-<?= $os_blog['id'] ?>" style="display:none;">
                                        <form id="editNewblogForm-<?= $os_blog['id'] ?>" method="post" enctype="multipart/form-data">
                                            <h6 class="mt-3">Edit blog</h6>
                                            <hr class="mt-1">

                                            <!-- Title -->
                                            <div class="form-group">
                                                <label for="blogs_name">Name</label>
                                                <input type="text" name="blogs_name" value="<?= $os_blog['blogs_name'] ?>" id="blogs_name" class="form-control" placeholder="Enter blogs name">
                                            </div>

                                            <div class="form-group">
                                                <label for="blogs_description">About Description</label>
                                                <div class="quill-editor" data-target="blogs_description"><?= $os_blog['blogs_description'] ?></div>
                                                <input type="hidden" value="<?= $os_blog['blogs_description'] ?>" name="blogs_description" id="blogs_description">
                                            </div>

                                            <input type="hidden" id="selectedContentType" name="content_type" value="<?= $os_blog['content_type'] ?>">

                                            <select id="contentType_<?= $os_blog['id'] ?>" name="content_type" class="form-control contentTypeDropdown" data-id="<?= $os_blog['id'] ?>">
                                                <option value="">-- Select --</option>
                                                <option value="blogs" <?= ($os_blog['content_type'] == 'blogs') ? 'selected' : '' ?>>Blogs</option>
                                                <option value="tags" <?= ($os_blog['content_type'] == 'tags') ? 'selected' : '' ?>>Tags</option>
                                            </select>

                                            <!-- Blog Selection Dropdown -->
                                            <div class="form-group blogSelection_<?= $os_blog['id'] ?>" <?= ($os_blog['content_type'] == 'blogs') ? '' : 'style="display:none;"' ?>>
                                                <label for="updateblog"></label>
                                                <div class="dropdown">
                                                    <button class="btn p-3 pr-5 btn-secondary dropdown-toggle" type="button"
                                                        id="updateblogDropdown_<?= $os_blog['id'] ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Select Blogs
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <div class="dropdown-item search_bar p-2">
                                                            <input type="text" class="form-control dropdown-search" placeholder="Search items...">
                                                        </div>
                                                        <?php
                                                        $selectedBlogs = json_decode($os_blog['blogs'], true) ?? [];
                                                        foreach ($blogs as $blog): ?>
                                                            <div class="dropdown-item search-item">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input updateblog-checkbox"
                                                                        id="updateblog_<?= $os_blog['id'] ?>_<?= $blog['blog_id'] ?>"
                                                                        name="blogs[]" value="<?= $blog['blog_id'] ?>"
                                                                        data-id="<?= $blog['blog_id'] ?>"
                                                                        data-title="<?= $blog['blog_title'] ?>"
                                                                        <?= in_array($blog['blog_id'], $selectedBlogs) ? 'checked' : '' ?>>
                                                                    <label class="custom-control-label"
                                                                        for="updateblog_<?= $os_blog['id'] ?>_<?= $blog['blog_id'] ?>"><?= $blog['blog_title'] ?></label>
                                                                </div>
                                                            </div>
                                                        <?php endforeach; ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="updateblogsBoxContainer" id="updateblogsboxcontainer">

                                            </div>

                                            <!-- Tag Selection Dropdown -->
                                            <div class="form-group tagSelection_<?= $os_blog['id'] ?>" <?= ($os_blog['content_type'] == 'tags') ? '' : 'style="display:none;"' ?>>
                                                <label for="updatetag"></label>
                                                <div class="dropdown">
                                                    <button class="btn p-3 pr-5 btn-secondary dropdown-toggle" type="button"
                                                        id="updatetagDropdown_<?= $os_blog['id'] ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Select Tags
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <div class="dropdown-item search_bar p-2">
                                                            <input type="text" class="form-control dropdown-search" placeholder="Search items...">
                                                        </div>
                                                        <?php
                                                        $selectedTags = json_decode($os_blog['tags'], true) ?? [];
                                                        foreach ($tags as $tag): ?>
                                                            <div class="dropdown-item search-item">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input updatetag-checkbox"
                                                                        id="updatetag_<?= $os_blog['id'] ?>_<?= $tag['id'] ?>"
                                                                        name="tags[]" value="<?= $tag['id'] ?>"
                                                                        data-id="<?= $tag['id'] ?>"
                                                                        data-title="<?= $tag['tag_name'] ?>"
                                                                        <?= in_array($tag['id'], $selectedTags) ? 'checked' : '' ?>>
                                                                    <label class="custom-control-label"
                                                                        for="updatetag_<?= $os_blog['id'] ?>_<?= $tag['id'] ?>"><?= $tag['tag_name'] ?></label>
                                                                </div>
                                                            </div>
                                                        <?php endforeach; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="updatetagsBoxContainer" id="updatetagsboxcontainer">

                                            </div>

                                            <!-- Submit Button -->
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </form>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </ul>
                </li>

                <!----------------------------------------------------------------------------------------- Single blog Form -------------------------------------------------------------------------------------->

                <li id="web-singleblog" style="display: none;" class="web-section dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-list"></span>
                        <span class="mtext">Blogs Section</span>
                    </a>
                    <ul class="submenu">
                        <div class="ImageUploadBox">
                            <form id="singleblog-form">
                                <div>
                                    <label for="page_title">Page Title</label>
                                    <input type="text" id="page_title" name="page_title"
                                        value="<?= $page_data['page_title'] ?? '' ?>" required>
                                </div>

                                <!-- Related Blogs -->
                                <div class="form-group">
                                    <label for="related_blogs">Related Blogs</label>
                                    <div class="dropdown">
                                        <button class="btn p-3 pr-5 btn-secondary dropdown-toggle" type="button"
                                            id="relatedBlogsDropdown" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            Select Related Blogs
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="relatedBlogsDropdown">
                                            <?php
                                            $selectedRelatedBlogs = explode(',', $page_data['related_blogs'] ?? '');
                                            foreach ($blogs as $blog):
                                            ?>
                                                <div class="dropdown-item">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox"
                                                            class="custom-control-input related-blog-checkbox"
                                                            id="related_blog_<?= $blog['blog_id'] ?>"
                                                            data-id="<?= $blog['blog_id'] ?>"
                                                            data-title="<?= $blog['blog_title'] ?>"
                                                            <?= in_array($blog['blog_id'], $selectedRelatedBlogs) ? 'checked' : '' ?>>
                                                        <label class="custom-control-label"
                                                            for="related_blog_<?= $blog['blog_id'] ?>"><?= $blog['blog_title'] ?></label>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                                <ul class="sortable-list" id="relatedBlogsList"></ul>
                                <input type="hidden" name="related_blogs" id="related_blogs_input"
                                    value="<?= $page_data['related_blogs'] ?? '' ?>">


                                <!-- Tags Section -->
                                <div class="form-group">
                                    <label for="tags">Tags</label>
                                    <div class="dropdown">
                                        <button class="btn p-3 pr-5 btn-secondary dropdown-toggle" type="button"
                                            id="tagsDropdownsingle" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            Select Tags
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="tagsDropdownsingle">
                                            <?php
                                            $selectedTags = explode(',', $page_data['tags'] ?? '');
                                            foreach ($tags as $tag):
                                            ?>
                                                <div class="dropdown-item">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input tag1-checkbox"
                                                            id="tag1_<?= $tag['id'] ?>" data-id="<?= $tag['id'] ?>"
                                                            data-title="<?= $tag['tag_name'] ?>" <?= in_array($tag['id'], $selectedTags) ? 'checked' : '' ?>>
                                                        <label class="custom-control-label"
                                                            for="tag1_<?= $tag['id'] ?>"><?= $tag['tag_name'] ?></label>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                                <ul class="sortable-list" id="tagsListsingle"></ul>
                                <input type="hidden" name="tags" id="tags_input_single"
                                    value="<?= $page_data['tags'] ?? '' ?>">



                                <!-- Popular Posts -->
                                <div class="form-group">
                                    <label for="popular_posts">Popular Posts</label>
                                    <div class="dropdown">
                                        <button class="btn p-3 pr-5 btn-secondary dropdown-toggle" type="button"
                                            id="popularPostsDropdownsingle" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            Select Popular Posts
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="popularPostsDropdownsingle">
                                            <?php
                                            $selectedPopularPosts = explode(',', $page_data['popular_posts'] ?? '');
                                            foreach ($blogs as $blog):
                                            ?>
                                                <div class="dropdown-item">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox"
                                                            class="custom-control-input popular-post-checkbox"
                                                            id="popular_post_<?= $blog['blog_id'] ?>"
                                                            data-id="<?= $blog['blog_id'] ?>"
                                                            data-title="<?= $blog['blog_title'] ?>"
                                                            <?= in_array($blog['blog_id'], $selectedPopularPosts) ? 'checked' : '' ?>>
                                                        <label class="custom-control-label"
                                                            for="popular_post_<?= $blog['blog_id'] ?>"><?= $blog['blog_title'] ?></label>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                                <ul class="sortable-list" id="popularPostsListsingle"></ul>
                                <input type="hidden" name="popular_posts" id="popular_posts_input_single"
                                    value="<?= $page_data['popular_posts'] ?? '' ?>">
                            </form>
                        </div>
                    </ul>
                </li>


                <!--------------------------------------------------------------------------------------- header page----------------------------------------------------------------------------------------------------->



                <!----------------------------------------------------------------collection form ---------------------------------------------------------------->

                <form id="collection-form">
                    <!-- Collection Section -->
                    <li id="web-collection" style="display: none;" class="web-section dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon bi bi-collection"></span>
                            <span class="mtext">Collection Section</span>
                        </a>
                        <ul class="submenu">
                            <div class="ImageUploadBox">
                                <form id="collection-form">

                                    <div>
                                        <label for="title">Title</label>
                                        <input type="text" class="form-control" id="title" name="title"
                                            value="<?= $page1_data['title'] ?? '' ?>" required>
                                    </div>

                                    <!-- Favorite Blogs -->
                                    <div class="form-group">
                                        <label for="fav_product">Favorite product</label>
                                        <div class="dropdown">
                                            <button class="btn p-3 pr-5 btn-light dropdown-toggle" type="button"
                                                id="favBlogsDropdown" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                Select Favorite Product
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="favBlogsDropdown">
                                                <?php
                                                $selectedFavproduct = explode(',', $page1_data['fav_product'] ?? '');
                                                foreach ($products as $Product):
                                                    $isChecked = in_array($Product['product_id'], $selectedFavproduct) ? 'checked' : '';
                                                ?>
                                                    <div class="dropdown-item">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox"
                                                                class="custom-control-input fav-blog-checkbox"
                                                                id="fav_product_<?= $Product['product_id'] ?>"
                                                                name="fav_product[]" data-id="<?= $Product['product_id'] ?>"
                                                                data-title="<?= $Product['product_title'] ?>" <?= $isChecked ?>>

                                                            <label class="custom-control-label"
                                                                for="fav_product_<?= $Product['product_id'] ?>">
                                                                <?= $Product['product_title'] ?>
                                                            </label>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Display Selected Products -->
                                    <ul class="sortable-list" id="favBlogsList">
                                        <?php
                                        foreach ($products as $Product):
                                            if (in_array($Product['product_id'], $selectedFavproduct)): ?>
                                                <li class="sortable-item p-2 mb-2 bg-light rounded border d-flex justify-content-between align-items-center"
                                                    data-id="<?= $Product['product_id'] ?>">
                                                    <span><?= $Product['product_title'] ?></span>
                                                    <button class="btn btn-danger btn-sm remove-item"
                                                        data-id="<?= $Product['product_id'] ?>">Delete</button>
                                                </li>
                                        <?php endif;
                                        endforeach; ?>
                                    </ul>
                                    <input type="hidden" name="fav_product" id="fav_blogs_input"
                                        value="<?= $page1_data['fav_product'] ?? '' ?>">

                                </form>
                            </div>
                        </ul>
                    </li>
                </form>

                <!---------------------------------------------------------------- header page----------------------------------------------------------------------------------------------------->

                <li id="web-header" style="display: none;" class="web-section dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-collection"></span>
                        <span class="mtext">Navbar</span>
                    </a>
                    <ul class="submenu child">
                        <!-- Plus Button to Add New -->
                        <div class="hr-container">
                            <hr class="line">
                            <button id="togglepageFormButton" class="circle-button">
                                <i class="fas fa-plus"></i>
                            </button>
                            <hr class="line">
                        </div>

                        <!-- Add Form -->
                        <div class="ImageUploadBox" id="pageAddForm" style="display: none;">
                            <form id="pageForm" action="<?= base_url('header/add_new_page') ?>" method="post"
                                enctype="multipart/form-data">
                                <!-- Title -->
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" id="title" name="title" placeholder="Enter Page Title"
                                        class="form-control" required />
                                </div>

                                <!-- Link -->
                                <div class="form-group">
                                    <label for="link">Link</label>
                                    <input type="text" name="link" id="link" class="form-control" />
                                </div>

                                <!-- Add Image Field -->
                                <div class="form-group">
                                    <label for="image">Upload Image</label>
                                    <input type="file" name="image" id="image" class="form-control" accept="image/*"
                                        required />
                                    <small>Formats: JPG, PNG, JPEG, (WEBP), Max-size: 400 KB, Recommended
                                        Dimensions: 424 x 412 px.</small>
                                </div>


                                <!-- Visibility -->
                                <div class="form-group">
                                    <label for="visibility">Visibility</label>
                                    <select name="visibility" id="visibility" class="form-control" required>
                                        <option value="1">Active</option>
                                        <option value="0">Draft</option>
                                    </select>
                                </div>

                                <!-- 1st Field: Select Page Type -->
                                <div class="form-group">
                                    <label>Select Page Type</label>
                                    <div id="pageTypeDropdownContainer" class="dropdown-container">
                                        <button type="button" id="togglePageTypeDropdown" class="form-control">
                                            Select Page Type ▼
                                        </button>
                                        <div id="pageTypeCheckboxDropdown" class="dropdown-content"
                                            style="display: none;">
                                            <!--  <label><input type="checkbox" value="collection" class="page-type-checkbox">
                                                Collection</label> -->
                                            <label><input type="checkbox" value="blogs" class="page-type-checkbox">
                                                Blogs</label>
                                            <label><input type="checkbox" value="about_us" class="page-type-checkbox">
                                                About Us</label>
                                            <label><input type="checkbox" value="contact_us" class="page-type-checkbox">
                                                Contact Us</label>
                                        </div>
                                    </div>
                                    <div id="selectedPageTypesContainer" class="selected-items-container"></div>
                                    <input type="hidden" name="page_type" id="selectedPageTypes">
                                </div>

                                <!-- Plus Button to Add New -->
                                <div class="hr-container">
                                    <hr class="line">
                                    <button type="button" id="toggleSubtypeButton" class="circle-button">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                    <hr class="line">
                                </div>

                                <!-- Container for Multiple Subtype Fields -->
                                <div id="subtypeFieldContainer"></div>

                                <!-- 2nd Field: Select Subtype -->
                                <div class="form-group" id="subtypeField" style="display: none;">
                                    <label for="subtype">Select Subtype</label>
                                    <select name="subtype[]" id="subtype_${fieldCounter}"
                                        class="form-control subtype-select">
                                        <option value="" disabled selected>Select Subtype</option>
                                        <!-- Added default -->
                                        <option value="collection">Collection</option>
                                        <option value="blogs">Blogs</option>
                                        <option value="product">Product</option>
                                    </select>
                                </div>

                                <div class="form-group" id="specificItemField" style="display: none;">
                                    <label>Select Specific Items</label>
                                    <div id="specificItemDropdown" class="dropdown-container">
                                        <button type="button" id="toggleDropdown" class="form-control">
                                            Select Items
                                        </button>
                                        <div id="checkboxDropdown" class="dropdown-content" style="display: none;">
                                            <!-- Dynamic checkboxes will be appended here -->
                                        </div>
                                    </div>
                                    <div id="selectedItemsContainer" class="selected-items-container">
                                        <!-- Selected items will be displayed here -->
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Add Page</button>
                            </form>
                        </div>


                        <!-- List of Added Pages -->
                        <div class="PageBoxContainer" id="pageBoxContainer">
                            <?php foreach ($pages as $page): ?>
                                <div class="PageBox" id="pageBox-<?= $page['id'] ?>" data-id="<?= $page['id'] ?>">
                                    <div class="d-flex justify-content-between PageHeader">
                                        <div class="handle">
                                            ☰ <?= mb_strimwidth($page['title'], 0, 16, '...') ?>
                                        </div>
                                        <div class="actions">
                                            <!-- Edit Button -->
                                            <button type="button" class="btn btn-link"
                                                onclick="toggleEditFormPage(<?= (int) $page['id'] ?>)">
                                                <i id="chevron-<?= (int) $page['id'] ?>" class="fas fa-chevron-down"></i>
                                            </button>
                                            <!-- Delete Button -->
                                            <a href="javascript:void(0);" onclick="deletePage(<?= (int) $page['id'] ?>)"
                                                style="color: red; padding: 0;">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </div>
                                    </div>

                                    <!-- Collapsible Edit Form -->
                                    <div id="editForm_<?= (int) $page['id'] ?>" style="display:none;">

                                        <form id="pageForm" action="<?= base_url('header/update_page/' . $page['id']) ?>"
                                            method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="page_id" value="<?= $page['id'] ?>">

                                            <!-- Title -->
                                            <div class="form-group">
                                                <label for="title_<?= $page['id'] ?>">Title:</label>
                                                <input type="text" name="title" id="title_<?= $page['id'] ?>"
                                                    class="form-control" required value="<?= esc($page['title']) ?>">
                                            </div>

                                            <!-- Link -->
                                            <div class="form-group">
                                                <label for="link_<?= $page['id'] ?>">Link:</label>
                                                <input type="text" name="link" id="link_<?= $page['id'] ?>"
                                                    class="form-control" required value="<?= esc($page['link']) ?>">
                                            </div>

                                            <!-- Image Upload Field -->
                                            <div class="form-group">
                                                <label for="image_<?= $page['id'] ?>">Image:</label>
                                                <input type="file" name="image" id="image_<?= $page['id'] ?>"
                                                    class="form-control"
                                                    onchange="previewImage(event, 'preview_<?= $page['id'] ?>')">

                                                <!-- Display the Uploaded Image Below -->
                                                <?php if (!empty($page['image'])): ?>
                                                    <div class="mt-2">
                                                        <img id="preview_<?= $page['id'] ?>" src="<?= esc($page['image']) ?>"
                                                            alt="Uploaded Image"
                                                            style="max-width: 200px; max-height: 200px; border-radius: 10px; border: 1px solid #ddd;">
                                                    </div>
                                                <?php else: ?>
                                                    <div class="mt-2">
                                                        <img id="preview_<?= $page['id'] ?>" src="" alt="Image Preview"
                                                            style="max-width: 200px; max-height: 200px; border-radius: 10px; border: 1px solid #ddd; display: none;">
                                                    </div>
                                                <?php endif; ?>
                                                <!-- Image -->
                                                <div class="form-group">
                                                    <label for="image_<?= $page['id'] ?>">Image:</label>
                                                    <input type="file" name="image" id="image_<?= $page['id'] ?>"
                                                        class="form-control">
                                                </div>

                                                <!-- Visibility -->
                                                <div class="form-group">
                                                    <label for="visibility_<?= $page['id'] ?>">Visibility:</label>
                                                    <select name="visibility" id="visibility_<?= $page['id'] ?>"
                                                        class="form-control" required>
                                                        <option value="1" <?= ($page['visibility'] == 1) ? 'selected' : '' ?>>
                                                            Active</option>
                                                        <option value="0" <?= ($page['visibility'] == 0) ? 'selected' : '' ?>>Draft
                                                        </option>
                                                    </select>
                                                </div>

                                                <!-- Select Page Type -->
                                                <div class="form-group">
                                                    <label>Select Page Type</label>
                                                    <div id="pageTypeDropdownContainer" class="dropdown-container">
                                                        <button type="button" id="togglePageTypeDropdown" class="form-control">
                                                            Select Page Type ▼
                                                        </button>
                                                        <div id="pageTypeCheckboxDropdown" class="dropdown-content"
                                                            style="display: none;">
                                                            <label><input type="checkbox" value="blogs"
                                                                    class="page-type-checkbox" <?= (strpos($page['page_type'], 'blogs') !== false) ? 'checked' : '' ?>> Blogs</label>
                                                            <label><input type="checkbox" value="about_us"
                                                                    class="page-type-checkbox" <?= (strpos($page['page_type'], 'about_us') !== false) ? 'checked' : '' ?>> About Us</label>
                                                            <label><input type="checkbox" value="contact_us"
                                                                    class="page-type-checkbox" <?= (strpos($page['page_type'], 'contact_us') !== false) ? 'checked' : '' ?>> Contact
                                                                Us</label>
                                                        </div>
                                                    </div>
                                                    <div id="selectedPageTypesContainer" class="selected-items-container"></div>
                                                    <input type="hidden" name="page_type" id="selectedPageTypes"
                                                        value="<?= esc($page['page_type']) ?>">
                                                </div>

                                                <!-- Plus Button to Add New Subtype -->
                                                <div class="hr-container">
                                                    <hr class="line">
                                                    <button type="button" id="toggleSubtypeButton" class="circle-button">
                                                        <i class="fas fa-plus"></i>
                                                    </button>
                                                    <hr class="line">
                                                </div>

                                                <!-- Container for Multiple Subtype Fields -->
                                                <div id="subtypeFieldContainer">
                                                    <?php
                                                    $subtypes = !empty($page['subtype']) ? explode(',', $page['subtype']) : [];
                                                    $specificItems = !empty($page['specific_item']) ? json_decode($page['specific_item'], true) : [];
                                                    $counter = 0;

                                                    foreach ($subtypes as $subtype): ?>
                                                        <div class="subtype-field-set">
                                                            <div class="form-group">
                                                                <label for="subtype_<?= $counter ?>">Select Subtype</label>
                                                                <select name="subtype[]" id="subtype_<?= $counter ?>"
                                                                    class="form-control subtype-select">
                                                                    <option value="blogs" <?= ($subtype == 'blogs') ? 'selected' : '' ?>>Blogs</option>
                                                                    <option value="product" <?= ($subtype == 'product') ? 'selected' : '' ?>>Product</option>
                                                                    <option value="collection" <?= ($subtype == 'collection') ? 'selected' : '' ?>>Collection</option>
                                                                </select>
                                                            </div>

                                                            <div class="form-group specific-item-field"
                                                                id="specificItemField_<?= $counter ?>">
                                                                <label>Select Specific Items</label>
                                                                <div id="specificItemDropdown_<?= $counter ?>"
                                                                    class="dropdown-container">
                                                                    <button type="button" id="toggleDropdown_<?= $counter ?>"
                                                                        class="form-control">
                                                                        Select Items ▼
                                                                    </button>
                                                                    <div id="checkboxDropdown_<?= $counter ?>"
                                                                        class="dropdown-content">
                                                                        <?php
                                                                        if (isset($specificItems[$subtype])) {
                                                                            foreach (explode(',', $specificItems[$subtype]) as $item) {
                                                                                echo '<label>
                                                                                    <input type="checkbox" class="specific-item-checkbox" value="' . $item . '" checked>
                                                                                    ' . $item . '
                                                                                  </label>';
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                </div>

                                                                <div id="selectedItemsContainer_<?= $counter ?>"
                                                                    class="selected-items-container">
                                                                    <?php if (isset($specificItems[$subtype])): ?>
                                                                        <?php foreach (explode(',', $specificItems[$subtype]) as $item): ?>

                                                                        <?php endforeach; ?>
                                                                    <?php endif; ?>
                                                                </div>

                                                                <input type="hidden" name="specific_item[<?= $counter ?>][]"
                                                                    id="selectedSpecificItems_<?= $counter ?>"
                                                                    value="<?= isset($specificItems[$subtype]) ? $specificItems[$subtype] : '' ?>">
                                                            </div>
                                                        </div>
                                                    <?php $counter++;
                                                    endforeach; ?>
                                                </div>

                                                <button type="submit" class="btn btn-primary">Update Page</button>
                                        </form>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </ul>
                </li>

                <!---------------------------------------------------------------- About page----------------------------------------------------------------------------------------------------->

                <li id="web-about" style="display: none;" class="web-section dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-list"></span>
                        <span class="mtext">Hero Section</span>
                    </a>
                    <ul class="submenu">
                        <!-- Edit Form -->
                        <div class="ImageUploadBox">

                            <!-- Title -->
                            <div class="form-group">
                                <label for="about_title">Title</label>
                                <input type="text" name="about_title" id="about_title" class="form-control"
                                    value="<?= $about['about_title'] ?? '' ?>">
                            </div>

                            <div class="form-group">
                                <label for="about_description">About Description</label>
                                <div class="quill-editor" data-target="about_description">
                                    <?= $about['about_description'] ?? '' ?>
                                </div>
                                <input type="hidden" value="<?= $about['about_description'] ?? '' ?>"
                                    name="about_description" id="about_description">
                            </div>

                            <div class="form-group">
                                <label for="about_bg">Background Image</label>
                                <input type="file" name="about_bg" id="about_bg" class="form-control file-preview"
                                    accept="image/*">
                                <small>Recommended size 1920x707</small>
                                <div id="about_bg_preview" class="preview-container mt-2">
                                    <?php if (!empty($about['about_bg'])): ?>
                                        <img src="<?= $about['about_bg'] ?>" class="img-fluid img-thumbnail"
                                            style="max-width: 200px; margin-top: 10px;">
                                    <?php endif; ?>
                                </div>
                            </div>

                        </div>
                    </ul>
                </li>
                <li id="web-about" style="display: none;" class="web-section dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-list"></span>
                        <span class="mtext">Why Shop With Us?</span>
                    </a>
                    <ul class="submenu">
                        <!-- Edit Form -->
                        <div class="ImageUploadBox"> <!-- Title -->
                            <div class="form-group">
                                <label for="why_title">Title</label>
                                <input type="text" name="why_title" id="why_title" class="form-control"
                                    value="<?= $about['why_title'] ?? '' ?>">
                            </div>
                            <div class="icons">
                                <?php
                                for ($i = 1; $i <= 5; $i++):
                                    $iconKey = "icon{$i}";
                                    // Ensure the value is JSON before decoding
                                    $iconData = is_string($about[$iconKey] ?? null) ? json_decode($about[$iconKey], true) : ($about[$iconKey] ?? []);
                                    if (!empty($iconData) || $i == 1):
                                ?>
                                        <div class="iconsubsection mb-4">
                                            <div class="form-group">
                                                <div class="d-flex justify-content-between align-items-baseline">
                                                    <label>Icon <?= $i ?></label>
                                                    <?php if ($i > 1): ?>
                                                        <a class="btn removeicon btn-danger mb-3">X</a>
                                                    <?php endif; ?>
                                                </div>
                                                <input type="file" name="icon[]" class="form-control file-preview"
                                                    accept="image/*">
                                                <small>Recommended size 104x104</small>
                                                <div class="preview-container mt-2">
                                                    <?php if (!empty($iconData['icon'])): ?>
                                                        <img src="<?= $iconData['icon'] ?>" class="img-fluid img-thumbnail"
                                                            style="max-width: 200px;">
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Icon Title</label>
                                                <input type="text" name="icon_title[]" class="form-control"
                                                    value="<?= $iconData['icon_title'] ?? '' ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Icon Description</label>
                                                <input type="text" name="icon_description[]" class="form-control"
                                                    value="<?= $iconData['icon_description'] ?? '' ?>">
                                            </div>
                                            <hr>
                                        </div>
                                <?php
                                    endif;
                                endfor;
                                ?>
                                <a class="btn btn-success addicon">Add Icon</a>
                            </div>

                        </div>
                    </ul>
                </li>
                <li id="web-about" style="display: none;" class="web-section dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-list"></span>
                        <span class="mtext">Info Data</span>
                    </a>
                    <ul class="submenu">
                        <!-- Edit Form -->
                        <div class="ImageUploadBox">
                            <?php
                            // Ensure the input is a string before decoding
                            $infoData1 = is_string($about['info_data1'] ?? null) ? json_decode($about['info_data1'], true) : ($about['info_data1'] ?? []);
                            $infoData2 = is_string($about['info_data2'] ?? null) ? json_decode($about['info_data2'], true) : ($about['info_data2'] ?? []);
                            $infoData3 = is_string($about['info_data3'] ?? null) ? json_decode($about['info_data3'], true) : ($about['info_data3'] ?? []);
                            ?>

                            <!-- Info Data 1 -->
                            <div class="info-section mb-3">
                                <h6>Information 1</h6>
                                <div class="form-group">
                                    <label for="datacount1">Data count 1 % (excellent Reviews)</label>
                                    <input type="number" name="datacount1" id="datacount1" class="form-control"
                                        value="<?= $infoData1['count'] ?? '' ?>">
                                </div>
                                <div class="form-group">
                                    <label for="datatitle1">Data Title 1</label>
                                    <input type="text" name="datatitle1" id="datatitle1" class="form-control"
                                        value="<?= $infoData1['title'] ?? '' ?>">
                                </div>
                                <div class="form-group">
                                    <label for="datadescription1">Data Description 1</label>
                                    <textarea name="datadescription1" id="datadescription1"
                                        class="form-control resizable-textarea"><?= $infoData1['description'] ?? '' ?></textarea>
                                </div>
                            </div>

                            <!-- Info Data 2 -->
                            <div class="info-section mb-3">
                                <h6>Information 2</h6>
                                <div class="form-group">
                                    <label for="datacount2">Data count 2 (sales)</label>
                                    <input type="number" name="datacount2" id="datacount2" class="form-control"
                                        value="<?= $infoData2['count'] ?? '' ?>">
                                </div>
                                <div class="form-group">
                                    <label for="datatitle2">Data Title 2</label>
                                    <input type="text" name="datatitle2" id="datatitle2" class="form-control"
                                        value="<?= $infoData2['title'] ?? '' ?>">
                                </div>
                                <div class="form-group">
                                    <label for="datadescription2">Data Description 2</label>
                                    <textarea name="datadescription2" id="datadescription2"
                                        class="form-control resizable-textarea"><?= $infoData2['description'] ?? '' ?></textarea>
                                </div>
                            </div>

                            <!-- Info Data 3 -->
                            <div class="info-section mb-3">
                                <h6>Information 3</h6>
                                <div class="form-group">
                                    <label for="datacount3">Data count 3 % (Happy customers)</label>
                                    <input type="number" name="datacount3" id="datacount3" class="form-control"
                                        value="<?= $infoData3['count'] ?? '' ?>">
                                </div>
                                <div class="form-group">
                                    <label for="datatitle3">Data Title 3</label>
                                    <input type="text" name="datatitle3" id="datatitle3" class="form-control"
                                        value="<?= $infoData3['title'] ?? '' ?>">
                                </div>
                                <div class="form-group">
                                    <label for="datadescription3">Data Description 3</label>
                                    <textarea name="datadescription3" id="datadescription3"
                                        class="form-control resizable-textarea"><?= $infoData3['description'] ?? '' ?></textarea>
                                </div>
                            </div>
                        </div>
                    </ul>
                </li>
                <li id="web-about" style="display: none;" class="web-section dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-list"></span>
                        <span class="mtext">Our Team</span>
                    </a>
                    <ul class="submenu">
                        <div class="form-group">
                            <label for="team_title">Title</label>
                            <input type="text" name="team_title" id="team_title" class="form-control"
                                value="<?= $about['team_title'] ?? '' ?>" placeholder="Enter Title text">
                        </div>
                        <!-- Plus Button to Add New -->
                        <div class="hr-container">
                            <hr class="line">
                            <button type="button" id="toggleteamsFormButton" class="circle-button">
                                <i class="fas fa-plus"></i>
                            </button>
                            <hr class="line">
                        </div>

                        <!-- Add teams Form -->
                        <div class="ImageUploadBox" id="AddteamsForm" style="display: none;">
                            <form id="addteamsform" method="post" enctype="multipart/form-data">
                                <h6 class="mt-3">Add Team Member</h6>
                                <hr class="mt-1">
                                <!-- Title -->
                                <div class="form-group">
                                    <label for="member_name">Name</label>
                                    <input type="text" name="member_name" id="member_name" class="form-control"
                                        placeholder="Enter Name">
                                </div>

                                <div class="form-group">
                                    <label for="member_occupation">Occupation</label>
                                    <input type="text" name="member_occupation" id="member_occupation"
                                        class="form-control" placeholder="Enter Occupation">
                                </div>

                                <!-- Image -->
                                <div class="form-group">
                                    <label for="member_pic">Profile pic</label>
                                    <input type="file" name="member_pic" id="member_pic" class="form-control"
                                        accept="image/*">
                                    <small>Formats: PNG, Should Be Under 400kb, Recommended Size: 430x610</small>
                                    <img id="preview_member_pic" src="" style="display:none; ">
                                </div>


                                <div class="form-group">
                                    <label for="member_email">Email</label>
                                    <input type="text" name="member_email" id="member_email" class="form-control"
                                        placeholder="Enter Email">
                                </div>

                                <div class="form-group">
                                    <label for="member_linkedin">Linked In</label>
                                    <input type="text" name="member_linkedin" id="member_linkedin" class="form-control"
                                        placeholder="Enter Linked in url">
                                </div>

                                <!-- Visibility -->
                                <div class="form-group">
                                    <label for="member_visibility">Visibility</label>
                                    <select name="member_visibility" id="member_visibility" class="form-control">
                                        <option value="1">Active</option>
                                        <option value="0">Draft</option>
                                    </select>
                                </div>

                                <!-- Submit Button -->
                                <button type="submit" id="addteamsBtn" class="btn btn-primary">Add</button>
                            </form>
                        </div>

                        <!-- List of members -->
                        <div class="membersBoxContainer" id="membersBoxContainer">
                            <?php foreach ($members as $member): ?>
                                <div class="MembersBox" id="memberBox-<?= $member['id'] ?>" data-id="<?= $member['id'] ?>">
                                    <div class="CarouselHeader">
                                        <div class="handle" id="handle">☰
                                            <?= (strlen($member['member_name']) > 6) ? substr($member['member_name'], 0, 6) . '...' : $member['member_name'] ?>
                                        </div>
                                        <div class="actions">
                                            <!-- Expand/Collapse Icon -->
                                            <button type="button" class="btn btn-link" style="margin-top: 0;"
                                                onclick="toggleEditFormMember(<?= $member['id'] ?>)">
                                                <i id="chevron-<?= $member['id'] ?>" class="fas fa-chevron-down"></i>
                                            </button>
                                            <!-- Delete Button -->
                                            <a href="javascript:void(0);" onclick="deleteMember(<?= $member['id'] ?>)"
                                                class="" style="color: red; padding: 0;">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </div>
                                    </div>

                                    <!-- Collapsible Edit Form -->
                                    <div class="edit-form" id="editmemberForm-<?= $member['id'] ?>" style="display:none;">
                                        <form id="edit_memberForm-<?= $member['id'] ?>" method="post"
                                            enctype="multipart/form-data">
                                            <h6 class="mt-3">Edit Team Member</h6>
                                            <hr class="mt-1">
                                            <!-- Title -->
                                            <div class="form-group">
                                                <label for="member_name">Name</label>
                                                <input type="text" name="member_name" value="<?= $member['member_name'] ?>"
                                                    id="member_name" class="form-control" placeholder="Enter Name">
                                            </div>

                                            <input type="hidden" name="member_id" value="<?= $member['id'] ?>"
                                                id="member_id" class="form-control">

                                            <div class="form-group">
                                                <label for="member_occupation">Occupation</label>
                                                <input type="text" name="member_occupation"
                                                    value="<?= $member['member_occupation'] ?>" id="member_occupation"
                                                    class="form-control" placeholder="Enter Occupation">
                                            </div>

                                            <!-- Image -->
                                            <div class="form-group">
                                                <label for="member_pic">Profile pic</label>
                                                <input type="file" name="member_pic" id="member_pic" class="form-control"
                                                    accept="image/*">
                                                <small>Formats: PNG, Should Be Under 400kb, Recommended Size:
                                                    430x610</small>
                                                <img id="preview_member_pic_<?= $member['id'] ?>"
                                                    src="<?= $member['member_pic'] ?? '' ?>" style="display:none; ">
                                            </div>

                                            <div class="form-group">
                                                <label for="member_email">Email</label>
                                                <input type="text" name="member_email"
                                                    value="<?= $member['member_email'] ?>" id="member_email"
                                                    class="form-control" placeholder="Enter Email">
                                            </div>

                                            <div class="form-group">
                                                <label for="member_linkedin">Linked in</label>
                                                <input type="text" name="member_linkedin"
                                                    value="<?= $member['member_linkedin'] ?>" id="member_linkedin"
                                                    class="form-control" placeholder="Enter Linked in url">
                                            </div>

                                            <!-- Visibility -->
                                            <div class="form-group">
                                                <label for="member_visibility">Visibility</label>
                                                <select name="member_visibility" id="member_visibility"
                                                    class="form-control">
                                                    <option <?= ($member['visibility'] == 1) ? 'selected' : '' ?> value="1">
                                                        Active</option>
                                                    <option <?= ($member['visibility'] == 0) ? 'selected' : '' ?> value="0">
                                                        Draft</option>
                                                </select>
                                            </div>

                                            <!-- Submit Button -->
                                            <button type="submit" id="editmembersBtn"
                                                class="btn btn-primary">Update</button>
                                        </form>

                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </ul>
                </li>
                <li id="web-about" style="display: none;" class="web-section dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-list"></span>
                        <span class="mtext">Subscribe</span>
                    </a>
                    <ul class="submenu">
                        <!-- Edit Form -->
                        <div class="ImageUploadBox">
                            <div class="form-group">
                                <label for="subscribe_title">Subscribe Title</label>
                                <input type="text" name="subscribe_title" id="subscribe_title" class="form-control"
                                    value="<?= $about['subscribe_title'] ?? '' ?>">
                            </div>
                            <div class="form-group">
                                <label for="subscribe_subtitle">Subscribe Subtitle</label>
                                <input type="text" name="subscribe_subtitle" id="subscribe_subtitle"
                                    class="form-control" value="<?= $about['subscribe_subtitle'] ?? '' ?>">
                            </div>
                            <div class="form-group">
                                <label for="subscribe_placeholder">Placeholder Text</label>
                                <input type="text" name="subscribe_placeholder" id="subscribe_placeholder"
                                    class="form-control" value="<?= $about['subscribe_placeholder'] ?? '' ?>">
                            </div>
                            <div class="form-group">
                                <label for="subscribe_btn">Button Text</label>
                                <input type="text" name="subscribe_btn" id="subscribe_btn" class="form-control"
                                    value="<?= $about['subscribe_btn'] ?? '' ?>">
                            </div>
                        </div>
                    </ul>
                </li>
                <li id="web-about" style="display: none;" class="web-section dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-list"></span>
                        <span class="mtext">Blogs</span>
                    </a>
                    <ul class="submenu">
                        <!-- Edit Form -->
                        <div class="ImageUploadBox">
                            <div id="blog" class="content-section">
                                <div class="form-group">
                                    <label for="blogs_title">Blogs section title</label>
                                    <input type="text" name="blogs_title" id="blogs_title" class="form-control"
                                        value="<?= $about['blogs_title'] ?? '' ?>">
                                </div>
                                <div class="form-group">
                                    <label for="blogs"></label>
                                    <div class="dropdown">
                                        <button class="btn p-3 pr-5 btn-secondary dropdown-toggle" type="button"
                                            id="blogsDropdown" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            Select Blogs
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="blogsDropdown">
                                            <!-- Search Bar -->
                                            <div class="dropdown-item search_bar p-2">
                                                <input type="text" class="form-control dropdown-search"
                                                    placeholder="Search items...">
                                            </div>
                                            <?php
                                            $selectedBlogs = explode(',', $about['blogs'] ?? '');
                                            foreach ($blogs as $blog):
                                            ?>
                                                <div class="dropdown-item search-item">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input blog-checkbox"
                                                            id="blog_<?= $blog['blog_id'] ?>"
                                                            data-id="<?= $blog['blog_id'] ?>"
                                                            data-title="<?= $blog['blog_title'] ?>"
                                                            <?= in_array($blog['blog_id'], $selectedBlogs) ? 'checked' : '' ?>>
                                                        <label class="custom-control-label"
                                                            for="blog_<?= $blog['blog_id'] ?>"><?= $blog['blog_title'] ?></label>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="blogsBoxContainer" id="blogsboxcontainer">

                                </div>
                            </div>
                        </div>
                    </ul>
                </li>




                <!---------------------------------------------------------------- contact page----------------------------------------------------------------------------------------------------->

                <li id="web-contact" style="display: none;" class="web-section dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-list"></span>
                        <span class="mtext">Hero Section</span>
                    </a>
                    <ul class="submenu">
                        <!-- Edit Form -->
                        <div class="ImageUploadBox">

                            <!-- Title -->
                            <div class="form-group">
                                <label for="contact_title">Title</label>
                                <input type="text" name="contact_title" id="contact_title" class="form-control"
                                    value="<?= $contact['contact_title'] ?? '' ?>">
                            </div>

                            <div class="form-group">
                                <label for="contact_description">Contact Description</label>
                                <div class="quill-editor" data-target="contact_description">
                                    <?= $contact['contact_description'] ?? '' ?>
                                </div>
                                <input type="hidden" value="<?= $contact['contact_description'] ?? '' ?>"
                                    name="contact_description" id="contact_description">
                            </div>

                            <div class="form-group">
                                <label for="contact_bg">Background Image</label>
                                <input type="file" name="contact_bg" id="contact_bg" class="form-control file-preview"
                                    accept="image/*">
                                <small>Recommended size 1920x707</small>
                                <div id="contact_bg_preview" class="preview-container mt-2">
                                    <?php if (!empty($contact['contact_bg'])): ?>
                                        <img src="<?= $contact['contact_bg'] ?>" class="img-fluid img-thumbnail"
                                            style="max-width: 200px; margin-top: 10px;">
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="quote">Quote</label>
                                <input type="text" name="quote" id="quote" class="form-control"
                                    value="<?= $contact['quote'] ?? '' ?>">
                            </div>
                            <div class="form-group">
                                <label for="quote_author">Title</label>
                                <input type="text" name="quote_author" id="quote_author" class="form-control"
                                    value="<?= $contact['quote_author'] ?? '' ?>">
                            </div>

                        </div>
                    </ul>
                </li>
                <li id="web-contact" style="display: none;" class="web-section dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-list"></span>
                        <span class="mtext">Our Information</span>
                    </a>
                    <ul class="submenu">
                        <!-- Edit Form -->
                        <div class="ImageUploadBox">

                            <!-- Title -->
                            <div class="form-group">
                                <label for="contact_info_title">Title</label>
                                <input type="text" name="contact_info_title" id="contact_info_title"
                                    class="form-control" value="<?= $contact['contact_info_title'] ?? '' ?>">
                            </div>

                            <div class="form-group">
                                <label for="contact_info_description">Description</label>
                                <div class="quill-editor" data-target="contact_info_description">
                                    <?= $contact['contact_info_description'] ?? '' ?>
                                </div>
                                <input type="hidden" value="<?= $contact['contact_info_description'] ?? '' ?>"
                                    name="contact_info_description" id="contact_info_description">
                            </div>

                            <div class="form-group">
                                <label for="address_title">Address Title</label>
                                <input type="text" name="address_title" id="address_title" class="form-control"
                                    value="<?= $contact['address_title'] ?? '' ?>">
                            </div>

                            <div class="form-group">
                                <label for="address">Address</label>
                                <div class="quill-editor" data-target="address"><?= $contact['address'] ?? '' ?></div>
                                <input type="hidden" value="<?= $contact['address'] ?? '' ?>" name="address"
                                    id="address">
                            </div>

                            <div class="form-group">
                                <label for="phone_title">Phone Title</label>
                                <input type="text" name="phone_title" id="phone_title" class="form-control"
                                    value="<?= $contact['phone_title'] ?? '' ?>">
                            </div>

                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <div class="quill-editor" data-target="phone"><?= $contact['phone'] ?? '' ?></div>
                                <input type="hidden" value="<?= $contact['phone'] ?? '' ?>" name="phone" id="phone">
                            </div>

                            <div class="form-group">
                                <label for="info_title">Info Title</label>
                                <input type="text" name="info_title" id="info_title" class="form-control"
                                    value="<?= $contact['info_title'] ?? '' ?>">
                            </div>

                            <div class="form-group">
                                <label for="info">Info</label>
                                <div class="quill-editor" data-target="info"><?= $contact['info'] ?? '' ?></div>
                                <input type="hidden" value="<?= $contact['info'] ?? '' ?>" name="info" id="info">
                            </div>

                            <div class="form-group">
                                <label for="help_title">Help Title</label>
                                <input type="text" name="help_title" id="help_title" class="form-control"
                                    value="<?= $contact['help_title'] ?? '' ?>">
                            </div>

                            <div class="form-group">
                                <label for="help_details">Help Details</label>
                                <div class="quill-editor" data-target="help_details">
                                    <?= $contact['help_details'] ?? '' ?>
                                </div>
                                <input type="hidden" value="<?= $contact['help_details'] ?? '' ?>" name="help_details"
                                    id="help_details">
                            </div>
                        </div>
                    </ul>
                </li>
                <li id="web-contact" style="display: none;" class="web-section dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-list"></span>
                        <span class="mtext">Get In Touch</span>
                    </a>
                    <ul class="submenu">
                        <!-- Edit Form -->
                        <div class="ImageUploadBox">
                            <div class="form-group">
                                <label for="git_title">Title</label>
                                <input type="text" name="git_title" id="git_title" class="form-control"
                                    value="<?= $contact['git_title'] ?? '' ?>">
                            </div>
                            <div class="form-group">
                                <label for="git_description">Descriptione</label>
                                <div class="quill-editor" data-target="git_description">
                                    <?= $contact['git_description'] ?? '' ?>
                                </div>
                                <input type="hidden" value="<?= $contact['git_description'] ?? '' ?>"
                                    name="git_description" id="git_description">
                            </div>
                        </div>
                    </ul>
                </li>
                <li id="web-contact" style="display: none;" class="web-section dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-list"></span>
                        <span class="mtext">Subscribe</span>
                    </a>
                    <ul class="submenu">
                        <!-- Edit Form -->
                        <div class="ImageUploadBox">
                            <div class="form-group">
                                <label for="contact_subscribe_title">Subscribe Title</label>
                                <input type="text" name="contact_subscribe_title" id="contact_subscribe_title"
                                    class="form-control" value="<?= $contact['contact_subscribe_title'] ?? '' ?>">
                            </div>
                            <div class="form-group">
                                <label for="contact_subscribe_subtitle">Subscribe Subtitle</label>
                                <input type="text" name="contact_subscribe_subtitle" id="contact_subscribe_subtitle"
                                    class="form-control" value="<?= $contact['contact_subscribe_subtitle'] ?? '' ?>">
                            </div>
                            <div class="form-group">
                                <label for="contact_subscribe_placeholder">Placeholder Text</label>
                                <input type="text" name="contact_subscribe_placeholder"
                                    id="contact_subscribe_placeholder" class="form-control"
                                    value="<?= $contact['contact_subscribe_placeholder'] ?? '' ?>">
                            </div>
                            <div class="form-group">
                                <label for="contact_subscribe_btn">Button Text</label>
                                <input type="text" name="contact_subscribe_btn" id="contact_subscribe_btn"
                                    class="form-control" value="<?= $contact['contact_subscribe_btn'] ?? '' ?>">
                            </div>
                        </div>
                    </ul>
                </li>

                <!---------------------------------------------------------------- search page----------------------------------------------------------------------------------------------------->

                <li id="web-search" style="display: none;" class="web-section dropdown">
                    <div class="d-block rounded submenu">
                        <div class="form-group">
                            <label for="search_placeholder">Placeholder</label>
                            <input type="text" name="search_placeholder" id="search_placeholder" class="form-control"
                                value="<?= $search['search_placeholder'] ?? '' ?>">
                        </div>
                    </div>
                </li>

                <li id="web-search" style="display: none;" class="web-section dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-list"></span>
                        <span class="mtext">Section 1</span>
                    </a>
                    <ul class="submenu">
                        <!-- Edit Form -->
                        <div class="ImageUploadBox">
                            <div class="form-group">
                                <label for="sec1_title">Title</label>
                                <input type="text" name="sec1_title" id="sec1_title" class="form-control"
                                    value="<?= $search['sec1_title'] ?? '' ?>">
                            </div>
                            <div class="form-group">
                                <label for="r_product"></label>
                                <div class="dropdown">
                                    <button class="btn p-3 pr-5 btn-secondary dropdown-toggle" type="button"
                                        id="r_productDropdown" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        Select Products
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="r_productDropdown">
                                        <!-- Search Bar -->
                                        <div class="dropdown-item search_bar p-2">
                                            <input type="text" class="form-control dropdown-search"
                                                placeholder="Search items...">
                                        </div>
                                        <?php
                                        $selectedr_product = explode(',', $search['r_products'] ?? '');
                                        foreach ($products as $product):
                                        ?>
                                            <div class="dropdown-item search-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input r_product-checkbox"
                                                        id="r_product_<?= $product['product_id'] ?>"
                                                        data-id="<?= $product['product_id'] ?>"
                                                        data-title="<?= $product['product_title'] ?>"
                                                        <?= in_array($product['product_id'], $selectedr_product) ? 'checked' : '' ?>>
                                                    <label class="custom-control-label"
                                                        for="r_product_<?= $product['product_id'] ?>"><?= $product['product_title'] ?></label>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="r_productsBoxContainer" id="r_productsboxcontainer">

                            </div>
                        </div>
                    </ul>
                </li>
                <li id="web-search" style="display: none;" class="web-section dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-list"></span>
                        <span class="mtext">Section 2</span>
                    </a>
                    <ul class="submenu">
                        <!-- Edit Form -->
                        <div class="ImageUploadBox">
                            <div class="form-group">
                                <label for="sec2_title">Title</label>
                                <input type="text" name="sec2_title" id="sec2_title" class="form-control"
                                    value="<?= $search['sec2_title'] ?? '' ?>">
                            </div>
                            <div class="form-group">
                                <label for="t_product"></label>
                                <div class="dropdown">
                                    <button class="btn p-3 pr-5 btn-secondary dropdown-toggle" type="button"
                                        id="t_productDropdown" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        Select Products
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="t_productDropdown">

                                        <!-- Search Bar -->
                                        <div class="dropdown-item search_bar p-2">
                                            <input type="text" class="form-control dropdown-search"
                                                placeholder="Search items...">
                                        </div>
                                        <?php
                                        $selectedt_product = explode(',', $search['t_products'] ?? '');
                                        foreach ($products as $product):
                                        ?>
                                            <div class="dropdown-item  search-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input t_product-checkbox"
                                                        id="t_product_<?= $product['product_id'] ?>"
                                                        data-id="<?= $product['product_id'] ?>"
                                                        data-title="<?= $product['product_title'] ?>"
                                                        <?= in_array($product['product_id'], $selectedt_product) ? 'checked' : '' ?>>
                                                    <label class="custom-control-label"
                                                        for="t_product_<?= $product['product_id'] ?>"><?= $product['product_title'] ?></label>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="t_productsBoxContainer" id="t_productsboxcontainer">

                            </div>
                        </div>
                    </ul>
                </li>
                <li id="web-search" style="display: none;" class="web-section dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-list"></span>
                        <span class="mtext">Section 3</span>
                    </a>
                    <ul class="submenu">
                        <!-- Edit Form -->
                        <div class="ImageUploadBox">
                            <div class="form-group">
                                <label for="sec3_title">Title</label>
                                <input type="text" name="sec3_title" id="sec3_title" class="form-control"
                                    value="<?= $search['sec3_title'] ?? '' ?>">
                            </div>
                            <div class="form-group">
                                <label for="m_product"></label>
                                <div class="dropdown">
                                    <button class="btn p-3 pr-5 btn-secondary dropdown-toggle" type="button"
                                        id="m_productDropdown" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        Select Products
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="m_productDropdown">

                                        <!-- Search Bar -->
                                        <div class="dropdown-item search_bar p-2">
                                            <input type="text" class="form-control dropdown-search"
                                                placeholder="Search items...">
                                        </div>
                                        <?php
                                        $selectedm_product = explode(',', $search['m_products'] ?? '');
                                        foreach ($products as $product):
                                        ?>
                                            <div class="dropdown-item  search-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input m_product-checkbox"
                                                        id="m_product_<?= $product['product_id'] ?>"
                                                        data-id="<?= $product['product_id'] ?>"
                                                        data-title="<?= $product['product_title'] ?>"
                                                        <?= in_array($product['product_id'], $selectedm_product) ? 'checked' : '' ?>>
                                                    <label class="custom-control-label"
                                                        for="m_product_<?= $product['product_id'] ?>"><?= $product['product_title'] ?></label>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="m_productsBoxContainer" id="m_productsboxcontainer">

                            </div>
                        </div>
                    </ul>
                </li>
                <li id="web-search" style="display: none;" class="web-section dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-list"></span>
                        <span class="mtext">Section 4</span>
                    </a>
                    <ul class="submenu">
                        <!-- Edit Form -->
                        <div class="ImageUploadBox">
                            <div class="form-group">
                                <label for="sec4_title">Title</label>
                                <input type="text" name="sec4_title" id="sec4_title" class="form-control"
                                    value="<?= $search['sec4_title'] ?? '' ?>">
                            </div>
                            <div class="form-group">
                                <label for="s_blog"></label>
                                <div class="dropdown">
                                    <button class="btn p-3 pr-5 btn-secondary dropdown-toggle" type="button"
                                        id="s_blogDropdown" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        Select Blogs
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="s_blogDropdown">

                                        <!-- Search Bar -->
                                        <div class="dropdown-item search_bar p-2">
                                            <input type="text" class="form-control dropdown-search"
                                                placeholder="Search items...">
                                        </div>
                                        <?php
                                        $selecteds_blog = explode(',', $search['s_blogs'] ?? '');
                                        foreach ($blogs as $blog):
                                        ?>
                                            <div class="dropdown-item search-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input s_blog-checkbox"
                                                        id="s_blog_<?= $blog['blog_id'] ?>"
                                                        data-id="<?= $blog['blog_id'] ?>"
                                                        data-title="<?= $blog['blog_title'] ?>"
                                                        <?= in_array($blog['blog_id'], $selecteds_blog) ? 'checked' : '' ?>>
                                                    <label class="custom-control-label"
                                                        for="s_blog_<?= $blog['blog_id'] ?>"><?= $blog['blog_title'] ?></label>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="s_blogsBoxContainer" id="s_blogsboxcontainer">

                            </div>
                        </div>
                    </ul>
                </li>
                <!---------------------------------------------------------------- cart page----------------------------------------------------------------------------------------------------->

                <li id="web-cart" style="display: none;" class="web-section dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-list"></span>
                        <span class="mtext">Cart</span>
                    </a>
                    <ul class="submenu">
                        <!-- Edit Form -->
                        <div class="ImageUploadBox">
                            <div class="form-group">
                                <label for="cart_title">Cart Title</label>
                                <input type="text" name="cart_title" id="cart_title" class="form-control"
                                    value="<?= $cart_page['cart_title'] ?? '' ?>">
                            </div>
                            <div class="form-group">
                                <label for="offer_title">Offer Title</label>
                                <input type="text" name="offer_title" id="offer_title" class="form-control"
                                    value="<?= $cart_page['offer_title'] ?? '' ?>">
                            </div>
                            <div class="form-group">
                                <label for="offer_subtitle">Offer Subtitle</label>
                                <input type="text" name="offer_subtitle" id="offer_subtitle" class="form-control"
                                    value="<?= $cart_page['offer_subtitle'] ?? '' ?>">
                            </div>
                            <div class="form-group">
                                <label for="offer_bg">Offer Image</label>
                                <input type="file" name="offer_bg" id="offer_bg" class="form-control file-preview"
                                    accept="image/*">
                                <small>Recommended size 400x180</small>
                                <div id="offer_bg_preview" class="preview-container mt-2">
                                    <?php if (!empty($cart_page['offer_bg'])): ?>
                                        <img src="<?= $cart_page['offer_bg'] ?>" class="img-fluid img-thumbnail"
                                            style="max-width: 200px; margin-top: 10px;">
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </ul>
                </li>
                <li id="web-cart" style="display: none;" class="web-section dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-list"></span>
                        <span class="mtext">Shipping info</span>
                    </a>
                    <ul class="submenu">
                        <!-- Edit Form -->
                        <div class="ImageUploadBox">
                            <div class="form-group">
                                <label for="shipping_title">Title</label>
                                <input type="text" name="shipping_title" id="shipping_title" class="form-control"
                                    value="<?= $cart_page['shipping_title'] ?? '' ?>">
                            </div>
                            <div class="form-group">
                                <label for="shipping_subtitle">Subtitle</label>
                                <input type="text" name="shipping_subtitle" id="shipping_subtitle" class="form-control"
                                    value="<?= $cart_page['shipping_subtitle'] ?? '' ?>">
                            </div>
                            <div class="form-group">
                                <label for="shipping_description">Descriptione</label>
                                <div class="quill-editor" data-target="shipping_description">
                                    <?= $cart_page['shipping_description'] ?? '' ?>
                                </div>
                                <input type="hidden" value="<?= $cart_page['shipping_description'] ?? '' ?>"
                                    name="shipping_description" id="shipping_description">
                            </div>
                        </div>
                    </ul>
                </li>
                <li id="web-cart" style="display: none;" class="web-section dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-list"></span>
                        <span class="mtext">Instructions</span>
                    </a>
                    <ul class="submenu">
                        <!-- Edit Form -->
                        <div class="ImageUploadBox">
                            <div class="form-group">
                                <label for="discount_info">Discount</label>
                                <input type="text" name="discount_info" id="discount_info" class="form-control"
                                    value="<?= $cart_page['discount_info'] ?? '' ?>">
                            </div>
                            <div class="form-group">
                                <label for="note_info">Note</label>
                                <input type="text" name="note_info" id="note_info" class="form-control"
                                    value="<?= $cart_page['note_info'] ?? '' ?>">
                            </div>
                        </div>
                    </ul>
                </li>

                <li id="web-cart" style="display: none;" class="web-section dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-list"></span>
                        <span class="mtext">More Products</span>
                    </a>
                    <ul class="submenu">
                        <!-- Edit Form -->
                        <div class="ImageUploadBox">
                            <div class="form-group">
                                <label for="more_title">Title</label>
                                <input type="text" name="more_title" id="more_title" class="form-control"
                                    value="<?= $cart_page['more_title'] ?? '' ?>">
                            </div>
                            <div class="form-group">
                                <label for="cm_product"></label>
                                <div class="dropdown">
                                    <button class="btn p-3 pr-5 btn-secondary dropdown-toggle" type="button"
                                        id="cm_productDropdown" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        Select Products
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="cm_productDropdown">

                                        <!-- Search Bar -->
                                        <div class="dropdown-item search_bar p-2">
                                            <input type="text" class="form-control dropdown-search"
                                                placeholder="Search items...">
                                        </div>
                                        <?php
                                        $selectedcm_product = explode(',', $cart_page['cm_products'] ?? '');
                                        foreach ($products as $product):
                                        ?>
                                            <div class="dropdown-item  search-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input cm_product-checkbox"
                                                        id="cm_product_<?= $product['product_id'] ?>"
                                                        data-id="<?= $product['product_id'] ?>"
                                                        data-title="<?= $product['product_title'] ?>"
                                                        <?= in_array($product['product_id'], $selectedcm_product) ? 'checked' : '' ?>>
                                                    <label class="custom-control-label"
                                                        for="cm_product_<?= $product['product_id'] ?>"><?= $product['product_title'] ?></label>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="cm_productsBoxContainer" id="cm_productsboxcontainer">

                            </div>
                        </div>
                    </ul>
                </li>
                <!---------------------------------------------------------------- account page----------------------------------------------------------------------------------------------------->


                <!---------------------------------------------------------------- wishlist page----------------------------------------------------------------------------------------------------->

                <li id="web-wishlist" style="display: none;" class="web-section dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-list"></span>
                        <span class="mtext">Wishlist</span>
                    </a>
                    <ul class="submenu">
                        <!-- Edit Form -->
                        <div class="ImageUploadBox">
                            <div class="form-group">
                                <label for="wishlist_title">Wishlist Title</label>
                                <input type="text" name="wishlist_title" id="wishlist_title" class="form-control"
                                    value="<?= $wishlist_page['wishlist_title'] ?? '' ?>">
                            </div>
                        </div>
                    </ul>
                </li>

                <!---------------------------------------------------------------- order page----------------------------------------------------------------------------------------------------->


                <!---------------------------------------------------------------- checkout page----------------------------------------------------------------------------------------------------->

                <li id="web-checkout" style="display: none;" class="web-section dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-list"></span>
                        <span class="mtext">Checkout page</span>
                    </a>
                    <ul class="submenu">
                        <!-- Edit Form -->
                        <div class="ImageUploadBox">
                            <div class="form-group">
                                <label for="checkout_title">Title</label>
                                <input type="text" name="checkout_title" id="checkout_title" class="form-control"
                                    value="<?= $checkout_page['checkout_title'] ?? '' ?>">
                            </div>
                        </div>
                    </ul>
                </li>
                <li id="web-checkout" style="display: none;" class="web-section dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-list"></span>
                        <span class="mtext">Instructions</span>
                    </a>
                    <ul class="submenu">
                        <!-- Edit Form -->
                        <div class="ImageUploadBox">
                            <div class="form-group">
                                <label for="comment_info">Comment</label>
                                <input type="text" name="comment_info" id="comment_info" class="form-control"
                                    value="<?= $checkout_page['comment_info'] ?? '' ?>">
                            </div>
                            <div class="form-group">
                                <label for="promocode_info">Promocode</label>
                                <input type="text" name="promocode_info" id="promocode_info" class="form-control"
                                    value="<?= $checkout_page['promocode_info'] ?? '' ?>">
                            </div>
                        </div>
                    </ul>
                </li>

                <!---------------------------------------------------------------- tracking page----------------------------------------------------------------------------------------------------->

                <li id="web-tracking" style="display: none;" class="web-section dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-list"></span>
                        <span class="mtext">Tracking page</span>
                    </a>
                    <ul class="submenu">
                        <!-- Edit Form -->
                        <div class="ImageUploadBox">
                            <div class="form-group">
                                <label for="tracking_title">Title</label>
                                <input type="text" name="tracking_title" id="tracking_title" class="form-control"
                                    value="<?= $tracking['tracking_title'] ?? '' ?>">
                            </div>
                        </div>
                    </ul>
                </li>
                <li id="web-tracking" style="display: none;" class="web-section dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-list"></span>
                        <span class="mtext">Banner</span>
                    </a>
                    <ul class="submenu">
                        <!-- Edit Form -->
                        <div class="ImageUploadBox">
                            <div class="form-group">
                                <label for="bnr_title">Title</label>
                                <input type="text" name="bnr_title" id="bnr_title" class="form-control"
                                    value="<?= $tracking['bnr_title'] ?? '' ?>">
                            </div>
                            <div class="form-group">
                                <label for="bnr_subtitle">SubTitle</label>
                                <input type="text" name="bnr_subtitle" id="bnr_subtitle" class="form-control"
                                    value="<?= $tracking['bnr_subtitle'] ?? '' ?>">
                            </div>
                            <div class="form-group">
                                <label for="bnr_bg">Banner Image (pc)</label>
                                <input type="file" name="bnr_bg" id="bnr_bg" class="form-control file-preview"
                                    accept="image/*">
                                <small>Recommended size 1755x726</small>
                                <div id="bnr_bg_preview" class="preview-container mt-2">
                                    <?php if (!empty($tracking['bnr_bg'])): ?>
                                        <img src="<?= $tracking['bnr_bg'] ?>" class="img-fluid img-thumbnail"
                                            style="max-width: 200px; margin-top: 10px;">
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="mobbnr_bg">Banner Image (mobile)</label>
                                <input type="file" name="mobbnr_bg" id="mobbnr_bg" class="form-control file-preview"
                                    accept="image/*">
                                <small>Recommended size 1500x1000</small>
                                <div id="mobbnr_bg_preview" class="preview-container mt-2">
                                    <?php if (!empty($tracking['mobbnr_bg'])): ?>
                                        <img src="<?= $tracking['mobbnr_bg'] ?>" class="img-fluid img-thumbnail"
                                            style="max-width: 200px; margin-top: 10px;">
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="bnr_link">Banner link</label>
                                <input type="text" name="bnr_link" id="bnr_link" class="form-control"
                                    value="<?= $tracking['bnr_link'] ?? '' ?>">
                            </div>
                            <div class="form-group">
                                <label for="bnr_btntext">Banner Button text</label>
                                <input type="text" name="bnr_btntext" id="bnr_btntext" class="form-control"
                                    value="<?= $tracking['bnr_btntext'] ?? '' ?>">
                            </div>
                        </div>
                    </ul>
                </li>
                <li id="web-tracking" style="display: none;" class="web-section dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-list"></span>
                        <span class="mtext">Instagram Post</span>
                    </a>
                    <ul class="submenu">
                        <!-- Edit Form -->
                        <div class="ImageUploadBox">
                            <div class="form-group mb-3">
                                <label>View Type:</label>
                                <select class="form-control" name="view_type" id="viewType">
                                    <option value="all" <?= ($tracking['view_type'] == 'all') ? 'selected' : '' ?>>All
                                        Posts</option>
                                    <option value="single" <?= ($tracking['view_type'] == 'single') ? 'selected' : '' ?>>
                                        Single Post</option>
                                    <option value="carousel" <?= ($tracking['view_type'] == 'carousel') ? 'selected' : '' ?>>Multiple Posts</option>
                                </select>
                            </div>

                            <div class="form-group mb-3" id="sortSelectContainer" style="display: none;">
                                <label>Sort:</label>
                                <select class="form-control" name="sort">
                                    <option value="newest" <?= ($tracking['sort_order'] == 'newest') ? 'selected' : '' ?>>
                                        Newest to Oldest</option>
                                    <option value="likes" <?= ($tracking['sort_order'] == 'likes') ? 'selected' : '' ?>>
                                        Most Liked to Less Liked</option>
                                    <option value="comments" <?= ($tracking['sort_order'] == 'comments') ? 'selected' : '' ?>>Most Commented to Less Commented</option>
                                </select>
                            </div>

                            <div class="form-group" id="postSelectContainer" style="display: none;">
                                <button class="btn p-3 pr-5 btn-secondary dropdown-toggle" type="button"
                                    id="postDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Select Post
                                </button>
                                <div class="dropdown-menu" aria-labelledby="postDropdown">

                                    <!-- Search Bar -->
                                    <div class="dropdown-item search_bar p-2">
                                        <input type="text" class="form-control dropdown-search"
                                            placeholder="Search items...">
                                    </div>
                                    <?php
                                    $selected_posts = explode(',', $tracking['selected_posts'] ?? '');
                                    foreach ($posts as $post): ?>
                                        <div class="dropdown-item post-ig-item search-item">
                                            <?php if (!empty($post['media_url'])): ?>
                                                <img src="<?= htmlspecialchars($post['media_url']) ?>"
                                                    style="object-fit: cover;aspect-ratio: 1;" class="box-shadow" width="50"
                                                    height="50" alt="Instagram post">
                                            <?php endif; ?>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input post-checkbox"
                                                    id="<?= htmlspecialchars($post['id'] ?? '') ?>"
                                                    data-id="<?= htmlspecialchars($post['id'] ?? '') ?>"
                                                    data-title="<?= htmlspecialchars($post['caption'] ?? '') ?>"
                                                    <?= in_array($post['id'], $selected_posts) ? 'checked' : '' ?>>
                                                <label class="custom-control-label"
                                                    for="<?= htmlspecialchars($post['id'] ?? '') ?>">
                                                    <?= htmlspecialchars(mb_substr($post['caption'] ?? 'No caption', 0, 20)) ?>
                                                </label>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="post-preview">
                                <h6>Post Preview</h6>
                            </div>
                        </div>
                    </ul>
                </li>
                <li id="web-tracking" style="display: none;" class="web-section dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-list"></span>
                        <span class="mtext">Instructions</span>
                    </a>
                    <ul class="submenu">
                        <!-- Edit Form -->
                        <div class="ImageUploadBox">
                            <div class="form-group">
                                <label for="textinfo">Text</label>
                                <input type="text" name="textinfo" id="textinfo" class="form-control"
                                    value="<?= $tracking['textinfo'] ?? '' ?>">
                            </div>
                            <div class="form-group">
                                <label for="tbtntext">Button Text</label>
                                <input type="text" name="tbtntext" id="tbtntext" class="form-control"
                                    value="<?= $tracking['tbtntext'] ?? '' ?>">
                            </div>
                        </div>
                    </ul>
                </li>

                <!---------------------------------------------------------------- 404 page----------------------------------------------------------------------------------------------------->

                <li id="web-404" style="display: none;" class="web-section dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-list"></span>
                        <span class="mtext">error page</span>
                    </a>
                    <ul class="submenu">
                        <!-- Edit Form -->
                        <div class="ImageUploadBox">
                            <div class="form-group">
                                <label for="error_head">Head</label>
                                <input type="text" name="error_head" id="error_head" class="form-control"
                                    value="<?= $error['error_head'] ?? '' ?>">
                            </div>
                            <div class="form-group">
                                <label for="error_title">Title</label>
                                <input type="text" name="error_title" id="error_title" class="form-control"
                                    value="<?= $error['error_title'] ?? '' ?>">
                            </div>

                            <div class="form-group">
                                <label for="error_description">Description</label>
                                <div class="quill-editor" data-target="error_description">
                                    <?= $error['error_description'] ?? '' ?>
                                </div>
                                <input type="hidden" value="<?= $error['error_description'] ?? '' ?>"
                                    name="error_description" id="error_description">
                            </div>
                        </div>
                    </ul>
                </li>
                <li id="web-404" style="display: none;" class="web-section dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-list"></span>
                        <span class="mtext">Banner</span>
                    </a>
                    <ul class="submenu">
                        <!-- Edit Form -->
                        <div class="ImageUploadBox">
                            <div class="form-group">
                                <label for="errorbnr_title">Title</label>
                                <input type="text" name="errorbnr_title" id="errorbnr_title" class="form-control"
                                    value="<?= $error['errorbnr_title'] ?? '' ?>">
                            </div>
                            <div class="form-group">
                                <label for="errorbnr_subtitle">SubTitle</label>
                                <input type="text" name="errorbnr_subtitle" id="errorbnr_subtitle" class="form-control"
                                    value="<?= $error['errorbnr_subtitle'] ?? '' ?>">
                            </div>
                            <div class="form-group">
                                <label for="errorbnr_bg">Banner Image </label>
                                <input type="file" name="errorbnr_bg" id="errorbnr_bg" class="form-control file-preview"
                                    accept="image/*">
                                <small>Recommended size 1755x726</small>
                                <div id="errorbnr_bg_preview" class="preview-container mt-2">
                                    <?php if (!empty($error['errorbnr_bg'])): ?>
                                        <img src="<?= $error['errorbnr_bg'] ?>" class="img-fluid img-thumbnail"
                                            style="max-width: 200px; margin-top: 10px;">
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="errorbnr_link">Button link</label>
                                <input type="text" name="errorbnr_link" id="errorbnr_link" class="form-control"
                                    value="<?= $error['errorbnr_link'] ?? '' ?>">
                            </div>
                            <div class="form-group">
                                <label for="errorbnr_btntext">Banner Button text</label>
                                <input type="text" name="errorbnr_btntext" id="errorbnr_btntext" class="form-control"
                                    value="<?= $error['errorbnr_btntext'] ?? '' ?>">
                            </div>
                        </div>
                    </ul>
                </li>
                <li id="web-404" style="display: none;" class="web-section dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-list"></span>
                        <span class="mtext">Pointers</span>
                    </a>
                    <ul class="submenu">
                        <!-- Edit Form -->
                        <div class="ImageUploadBox">
                            <h6>Pointer 1</h6>
                            <div class="form-group">
                                <label for="point_bg1">Background Image </label>
                                <input type="file" name="point_bg1" id="point_bg1" class="form-control file-preview"
                                    accept="image/*">
                                <div id="point_bg1_preview" class="preview-container mt-2">
                                    <?php if (!empty($error['point_bg1'])): ?>
                                        <img src="<?= $error['point_bg1'] ?>" class="img-fluid img-thumbnail"
                                            style="max-width: 200px; margin-top: 10px;">
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <select class="form-control element-select" name="element1" id="element1">
                                    <option <?= ($error['element1'] == 'product') ? 'selected' : '' ?> value="product">
                                        Product</option>
                                    <option <?= ($error['element1'] == 'collection') ? 'selected' : '' ?>
                                        value="collection">Collection</option>
                                    <option <?= ($error['element1'] == 'blog') ? 'selected' : '' ?> value="blog">Blog
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="product-wrapper"
                                    style="<?= ($error['element1'] == 'product') ? '' : 'display: none' ?>">
                                    <label for="product">Select Product</label>
                                    <select class="form-control element-id-select custom-select2 " style="width:100%"
                                        name="element_id1" id="product">
                                        <?php foreach ($products as $product): ?>
                                            <option <?= (($error['element1'] == 'product') && ($error['element_id1'] == $product['product_id'])) ? 'selected' : '' ?>
                                                value="<?= $product['product_id'] ?>"><?= $product['product_title'] ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="collection-wrapper"
                                    style="<?= ($error['element1'] == 'collection') ? '' : 'display: none' ?>">
                                    <label for="collection">Select Collection</label>
                                    <select class="form-control element-id-select custom-select2 " style="width:100%"
                                        name="element_id1" id="collection">
                                        <?php foreach ($collections as $collection): ?>
                                            <option <?= (($error['element1'] == 'collection') && ($error['element_id1'] == $collection['collection_id'])) ? 'selected' : '' ?>
                                                value="<?= $collection['collection_id'] ?>">
                                                <?= $collection['collection_title'] ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="blog-wrapper"
                                    style="<?= ($error['element1'] == 'blog') ? '' : 'display: none' ?>">
                                    <label for="blog">Select Blog</label>
                                    <select class="form-control element-id-select custom-select2 " style="width:100%"
                                        name="element_id1" id="blog">
                                        <?php foreach ($blogs as $blog): ?>
                                            <option <?= (($error['element1'] == 'blog') && ($error['element_id1'] == $blog['blog_id'])) ? 'selected' : '' ?>
                                                value="<?= $blog['blog_id'] ?>"><?= $blog['blog_title'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <hr>

                            <h6>Pointer 2</h6>
                            <div class="form-group">
                                <label for="point_bg2">Background Image </label>
                                <input type="file" name="point_bg2" id="point_bg2" class="form-control file-preview"
                                    accept="image/*">
                                <div id="point_bg2_preview" class="preview-container mt-2">
                                    <?php if (!empty($error['point_bg2'])): ?>
                                        <img src="<?= $error['point_bg2'] ?>" class="img-fluid img-thumbnail"
                                            style="max-width: 200px; margin-top: 10px;">
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <select class="form-control element-select" name="element2" id="element2">
                                    <option <?= ($error['element2'] == 'product') ? 'selected' : '' ?> value="product">
                                        Product</option>
                                    <option <?= ($error['element2'] == 'collection') ? 'selected' : '' ?>
                                        value="collection">Collection</option>
                                    <option <?= ($error['element2'] == 'blog') ? 'selected' : '' ?> value="blog">Blog
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="product-wrapper"
                                    style="<?= ($error['element2'] == 'product') ? '' : 'display: none' ?>">
                                    <label for="product">Select Product</label>
                                    <select class="form-control element-id-select custom-select2 " style="width:100%"
                                        name="element_id2" id="product">
                                        <?php foreach ($products as $product): ?>
                                            <option <?= (($error['element2'] == 'product') && ($error['element_id2'] == $product['product_id'])) ? 'selected' : '' ?>
                                                value="<?= $product['product_id'] ?>"><?= $product['product_title'] ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="collection-wrapper"
                                    style="<?= ($error['element2'] == 'collection') ? '' : 'display: none' ?>">
                                    <label for="collection">Select Collection</label>
                                    <select class="form-control element-id-select custom-select2 " style="width:100%"
                                        name="element_id2" id="collection">
                                        <?php foreach ($collections as $collection): ?>
                                            <option <?= (($error['element2'] == 'collection') && ($error['element_id2'] == $collection['collection_id'])) ? 'selected' : '' ?>
                                                value="<?= $collection['collection_id'] ?>">
                                                <?= $collection['collection_title'] ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="blog-wrapper"
                                    style="<?= ($error['element2'] == 'blog') ? '' : 'display: none' ?>">
                                    <label for="blog">Select Blog</label>
                                    <select class="form-control element-id-select custom-select2 " style="width:100%"
                                        name="element_id2" id="blog">
                                        <?php foreach ($blogs as $blog): ?>
                                            <option <?= (($error['element2'] == 'blog') && ($error['element_id2'] == $blog['blog_id'])) ? 'selected' : '' ?>
                                                value="<?= $blog['blog_id'] ?>"><?= $blog['blog_title'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <hr>

                            <h6>Pointer 3</h6>
                            <div class="form-group">
                                <label for="point_bg3">Background Image </label>
                                <input type="file" name="point_bg3" id="point_bg3" class="form-control file-preview"
                                    accept="image/*">
                                <div id="point_bg3_preview" class="preview-container mt-2">
                                    <?php if (!empty($error['point_bg3'])): ?>
                                        <img src="<?= $error['point_bg3'] ?>" class="img-fluid img-thumbnail"
                                            style="max-width: 200px; margin-top: 10px;">
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <select class="form-control element-select" name="element3" id="element3">
                                    <option <?= ($error['element3'] == 'product') ? 'selected' : '' ?> value="product">
                                        Product</option>
                                    <option <?= ($error['element3'] == 'collection') ? 'selected' : '' ?>
                                        value="collection">Collection</option>
                                    <option <?= ($error['element3'] == 'blog') ? 'selected' : '' ?> value="blog">Blog
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="product-wrapper"
                                    style="<?= ($error['element3'] == 'product') ? '' : 'display: none' ?>">
                                    <label for="product">Select Product</label>
                                    <select class="form-control element-id-select custom-select2 " style="width:100%"
                                        name="element_id3" id="product">
                                        <?php foreach ($products as $product): ?>
                                            <option <?= (($error['element3'] == 'product') && ($error['element_id3'] == $product['product_id'])) ? 'selected' : '' ?>
                                                value="<?= $product['product_id'] ?>"><?= $product['product_title'] ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="collection-wrapper"
                                    style="<?= ($error['element3'] == 'collection') ? '' : 'display: none' ?>">
                                    <label for="collection">Select Collection</label>
                                    <select class="form-control element-id-select custom-select2 " style="width:100%"
                                        name="element_id3" id="collection">
                                        <?php foreach ($collections as $collection): ?>
                                            <option <?= (($error['element3'] == 'collection') && ($error['element_id3'] == $collection['collection_id'])) ? 'selected' : '' ?>
                                                value="<?= $collection['collection_id'] ?>">
                                                <?= $collection['collection_title'] ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="blog-wrapper"
                                    style="<?= ($error['element3'] == 'blog') ? '' : 'display: none' ?>">
                                    <label for="blog">Select Blog</label>
                                    <select class="form-control element-id-select custom-select2 " style="width:100%"
                                        name="element_id3" id="blog">
                                        <?php foreach ($blogs as $blog): ?>
                                            <option <?= (($error['element3'] == 'blog') && ($error['element_id3'] == $blog['blog_id'])) ? 'selected' : '' ?>
                                                value="<?= $blog['blog_id'] ?>"><?= $blog['blog_title'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <hr>

                            <h6>Pointer 4</h6>
                            <div class="form-group">
                                <label for="point_bg4">Background Image </label>
                                <input type="file" name="point_bg4" id="point_bg4" class="form-control file-preview"
                                    accept="image/*">
                                <div id="point_bg4_preview" class="preview-container mt-2">
                                    <?php if (!empty($error['point_bg4'])): ?>
                                        <img src="<?= $error['point_bg4'] ?>" class="img-fluid img-thumbnail"
                                            style="max-width: 200px; margin-top: 10px;">
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <select class="form-control element-select" name="element4" id="element4">
                                    <option <?= ($error['element4'] == 'product') ? 'selected' : '' ?> value="product">
                                        Product</option>
                                    <option <?= ($error['element4'] == 'collection') ? 'selected' : '' ?>
                                        value="collection">Collection</option>
                                    <option <?= ($error['element4'] == 'blog') ? 'selected' : '' ?> value="blog">Blog
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="product-wrapper"
                                    style="<?= ($error['element4'] == 'product') ? '' : 'display: none' ?>">
                                    <label for="product">Select Product</label>
                                    <select class="form-control element-id-select custom-select2 " style="width:100%"
                                        name="element_id4" id="product">
                                        <?php foreach ($products as $product): ?>
                                            <option <?= (($error['element4'] == 'product') && ($error['element_id4'] == $product['product_id'])) ? 'selected' : '' ?>
                                                value="<?= $product['product_id'] ?>"><?= $product['product_title'] ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="collection-wrapper"
                                    style="<?= ($error['element4'] == 'collection') ? '' : 'display: none' ?>">
                                    <label for="collection">Select Collection</label>
                                    <select class="form-control element-id-select custom-select2 " style="width:100%"
                                        name="element_id4" id="collection">
                                        <?php foreach ($collections as $collection): ?>
                                            <option <?= (($error['element4'] == 'collection') && ($error['element_id4'] == $collection['collection_id'])) ? 'selected' : '' ?>
                                                value="<?= $collection['collection_id'] ?>">
                                                <?= $collection['collection_title'] ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="blog-wrapper"
                                    style="<?= ($error['element4'] == 'blog') ? '' : 'display: none' ?>">
                                    <label for="blog">Select Blog</label>
                                    <select class="form-control element-id-select custom-select2 " style="width:100%"
                                        name="element_id4" id="blog">
                                        <?php foreach ($blogs as $blog): ?>
                                            <option <?= (($error['element4'] == 'blog') && ($error['element_id4'] == $blog['blog_id'])) ? 'selected' : '' ?>
                                                value="<?= $blog['blog_id'] ?>"><?= $blog['blog_title'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <hr>

                            <h6>Pointer 5</h6>
                            <div class="form-group">
                                <label for="point_bg5">Background Image </label>
                                <input type="file" name="point_bg5" id="point_bg5" class="form-control file-preview"
                                    accept="image/*">
                                <div id="point_bg5_preview" class="preview-container mt-2">
                                    <?php if (!empty($error['point_bg5'])): ?>
                                        <img src="<?= $error['point_bg5'] ?>" class="img-fluid img-thumbnail"
                                            style="max-width: 200px; margin-top: 10px;">
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <select class="form-control element-select" name="element5" id="element5">
                                    <option <?= ($error['element5'] == 'product') ? 'selected' : '' ?> value="product">
                                        Product</option>
                                    <option <?= ($error['element5'] == 'collection') ? 'selected' : '' ?>
                                        value="collection">Collection</option>
                                    <option <?= ($error['element5'] == 'blog') ? 'selected' : '' ?> value="blog">Blog
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="product-wrapper"
                                    style="<?= ($error['element5'] == 'product') ? '' : 'display: none' ?>">
                                    <label for="product">Select Product</label>
                                    <select class="form-control element-id-select custom-select2 " style="width:100%"
                                        name="element_id5" id="product">
                                        <?php foreach ($products as $product): ?>
                                            <option <?= (($error['element5'] == 'product') && ($error['element_id5'] == $product['product_id'])) ? 'selected' : '' ?>
                                                value="<?= $product['product_id'] ?>"><?= $product['product_title'] ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="collection-wrapper"
                                    style="<?= ($error['element5'] == 'collection') ? '' : 'display: none' ?>">
                                    <label for="collection">Select Collection</label>
                                    <select class="form-control element-id-select custom-select2 " style="width:100%"
                                        name="element_id5" id="collection">
                                        <?php foreach ($collections as $collection): ?>
                                            <option <?= (($error['element5'] == 'collection') && ($error['element_id5'] == $collection['collection_id'])) ? 'selected' : '' ?>
                                                value="<?= $collection['collection_id'] ?>">
                                                <?= $collection['collection_title'] ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="blog-wrapper"
                                    style="<?= ($error['element5'] == 'blog') ? '' : 'display: none' ?>">
                                    <label for="blog">Select Blog</label>
                                    <select class="form-control element-id-select custom-select2 " style="width:100%"
                                        name="element_id5" id="blog">
                                        <?php foreach ($blogs as $blog): ?>
                                            <option <?= (($error['element5'] == 'blog') && ($error['element_id5'] == $blog['blog_id'])) ? 'selected' : '' ?>
                                                value="<?= $blog['blog_id'] ?>"><?= $blog['blog_title'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <hr>

                            <h6>Pointer 6</h6>
                            <div class="form-group">
                                <label for="point_bg6">Background Image </label>
                                <input type="file" name="point_bg6" id="point_bg6" class="form-control file-preview"
                                    accept="image/*">
                                <div id="point_bg6_preview" class="preview-container mt-2">
                                    <?php if (!empty($error['point_bg6'])): ?>
                                        <img src="<?= $error['point_bg6'] ?>" class="img-fluid img-thumbnail"
                                            style="max-width: 200px; margin-top: 10px;">
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <select class="form-control element-select" name="element6" id="element6">
                                    <option <?= ($error['element6'] == 'product') ? 'selected' : '' ?> value="product">
                                        Product</option>
                                    <option <?= ($error['element6'] == 'collection') ? 'selected' : '' ?>
                                        value="collection">Collection</option>
                                    <option <?= ($error['element6'] == 'blog') ? 'selected' : '' ?> value="blog">Blog
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="product-wrapper"
                                    style="<?= ($error['element6'] == 'product') ? '' : 'display: none' ?>">
                                    <label for="product">Select Product</label>
                                    <select class="form-control element-id-select custom-select2 " style="width:100%"
                                        name="element_id6" id="product">
                                        <?php foreach ($products as $product): ?>
                                            <option <?= (($error['element6'] == 'product') && ($error['element_id6'] == $product['product_id'])) ? 'selected' : '' ?>
                                                value="<?= $product['product_id'] ?>"><?= $product['product_title'] ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="collection-wrapper"
                                    style="<?= ($error['element6'] == 'collection') ? '' : 'display: none' ?>">
                                    <label for="collection">Select Collection</label>
                                    <select class="form-control element-id-select custom-select2 " style="width:100%"
                                        name="element_id6" id="collection">
                                        <?php foreach ($collections as $collection): ?>
                                            <option <?= (($error['element6'] == 'collection') && ($error['element_id6'] == $collection['collection_id'])) ? 'selected' : '' ?>
                                                value="<?= $collection['collection_id'] ?>">
                                                <?= $collection['collection_title'] ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="blog-wrapper"
                                    style="<?= ($error['element6'] == 'blog') ? '' : 'display: none' ?>">
                                    <label for="blog">Select Blog</label>
                                    <select class="form-control element-id-select custom-select2 " style="width:100%"
                                        name="element_id6" id="blog">
                                        <?php foreach ($blogs as $blog): ?>
                                            <option <?= (($error['element6'] == 'blog') && ($error['element_id6'] == $blog['blog_id'])) ? 'selected' : '' ?>
                                                value="<?= $blog['blog_id'] ?>"><?= $blog['blog_title'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </ul>
                </li>
                <li id="web-404" style="display: none;" class="web-section dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-list"></span>
                        <span class="mtext">Product list</span>
                    </a>
                    <ul class="submenu">
                        <!-- Edit Form -->
                        <div class="ImageUploadBox">
                            <div class="form-group">
                                <label for="errormore_title">Title</label>
                                <input type="text" name="errormore_title" id="errormore_title" class="form-control"
                                    value="<?= $error['errormore_title'] ?? '' ?>">
                            </div>
                            <div class="form-group">
                                <label for="error_product"></label>
                                <div class="dropdown">
                                    <button class="btn p-3 pr-5 btn-secondary dropdown-toggle" type="button"
                                        id="error_productDropdown" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        Select Products
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="error_productDropdown">

                                        <!-- Search Bar -->
                                        <div class="dropdown-item search_bar p-2">
                                            <input type="text" class="form-control dropdown-search"
                                                placeholder="Search items...">
                                        </div>
                                        <?php
                                        $selectederror_product = explode(',', $error['error_products'] ?? '');
                                        foreach ($products as $product):
                                        ?>
                                            <div class="dropdown-item  search-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox"
                                                        class="custom-control-input error_product-checkbox"
                                                        id="error_product_<?= $product['product_id'] ?>"
                                                        data-id="<?= $product['product_id'] ?>"
                                                        data-title="<?= $product['product_title'] ?>"
                                                        <?= in_array($product['product_id'], $selectederror_product) ? 'checked' : '' ?>>
                                                    <label class="custom-control-label"
                                                        for="error_product_<?= $product['product_id'] ?>"><?= $product['product_title'] ?></label>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="error_productsBoxContainer" id="error_productsboxcontainer">

                            </div>
                        </div>
                    </ul>
                </li>

                <!---------------------------------------------------------------- footer page----------------------------------------------------------------------------------------------------->
                <li id="web-Footer" style="display: none;" class="web-section dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-list"></span>
                        <span class="mtext">Footer</span>
                    </a>
                    <ul class="submenu">
                        <div class="ImageUploadBox" id="AddNewFooterForm">
                            <form id="addFooterdata" method="post" enctype="multipart/form-data">
                                <h6 class="mt-3">Footer</h6>
                                <hr class="mt-1">

                                <!-- Image -->
                                <div class="form-group">
                                    <label for="Footer_Image">Image</label>
                                    <input type="file" name="Footer_Image" id="Footer_Image" class="form-control"
                                        accept="image/*">
                                    <small>Formats: JPG, PNG, JPEG, (WEBP), Max-size: 400 KB, Recommended
                                        Dimensions: 120 x 61 px.</small>
                                    <?php if (!empty($footer_data['footer_image'])): ?>
                                        <img id="Footer_Image" src="<?= $footer_data['footer_image'] ?>">
                                    <?php endif; ?>
                                </div>

                                <!-- Title -->
                                <div class="form-group">
                                    <label for="Footer_mail">E-mail</label>
                                    <input type="text" name="Footer_mail" id="Footer_mail"
                                        value="<?= $footer_data['footer_email'] ?>" class="form-control"
                                        placeholder="Enter E-mail">
                                </div>
                                <div class="form-group">
                                    <label for="Footer_Hours">Hours</label>
                                    <input type="text" name="Footer_Hours" id="Footer_Hours"
                                        value="<?= $footer_data['footer_hours'] ?>" class="form-control"
                                        placeholder="Enter Hours">
                                </div>

                                <div id="socialMediaContainer">
                                    <div class="social-media-group">
                                        <div class="form-group">
                                            <label for="Facebook_link">Facebook</label>
                                            <input type="url" name="Facebook_link[]"
                                                value="<?= $footer_data['facebook'] ?>" class="form-control"
                                                placeholder="Enter Link">
                                        </div>
                                        <div class="form-group">
                                            <label for="Instagram_link">Instagram</label>
                                            <input type="url" name="Instagram_link[]"
                                                value="<?= $footer_data['instagram'] ?>" class="form-control"
                                                placeholder="Enter Link">
                                        </div>
                                        <div class="form-group">
                                            <label for="Twitter_link">Twitter</label>
                                            <input type="url" name="Twitter_link[]"
                                                value="<?= $footer_data['twitter'] ?>" class="form-control"
                                                placeholder="Enter Link">
                                        </div>
                                        <div class="form-group">
                                            <label for="Youtube_link">Youtube</label>
                                            <input type="url" name="Youtube_link[]"
                                                value="<?= $footer_data['youtube'] ?>" class="form-control"
                                                placeholder="Enter Link">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="Footer_payment">Title</label>
                                    <input type="text" name="Footer_payment" id="Footer_payment"
                                        value="<?= $footer_data['footer_name'] ?>" class="form-control"
                                        placeholder="Enter Name">
                                </div>

                                <div id="paymentContainer">
                                    <div class="payment-group">
                                        <div class="form-group">
                                            <label for="Footer_paymentImage1">Image 1</label>
                                            <input type="file" name="Footer_paymentImage1" id="Footer_paymentImage1"
                                                class="form-control" accept="image/*">
                                            <small>Formats: JPG, PNG, JPEG, (WEBP), Max-size: 400 KB, Recommended
                                                Dimensions: 60 x 60 px.</small>
                                            <?php if (!empty($footer_data['footer_payment_image1'])): ?>
                                                <img id="Footer_paymentImage1"
                                                    src="<?= $footer_data['footer_payment_image1'] ?>">
                                            <?php endif; ?>
                                        </div>

                                        <div class="form-group">
                                            <label for="socialpayment_link1">Link 1</label>
                                            <input type="url" name="socialpayment_link1[]"
                                                value="<?= $footer_data['footer_payment_link1'] ?>" class="form-control"
                                                placeholder="Enter Link">
                                        </div>
                                    </div>

                                    <div class="payment-group">
                                        <div class="form-group">
                                            <label for="Footer_paymentImage2">Image 2</label>
                                            <input type="file" name="Footer_paymentImage2" id="Footer_paymentImage2"
                                                class="form-control" accept="image/*">
                                            <small>Formats: JPG, PNG, JPEG, (WEBP), Max-size: 400 KB, Recommended
                                                Dimensions: 60 x 60 px.</small>
                                            <?php if (!empty($footer_data['footer_payment_image2'])): ?>
                                                <img id="Footer_paymentImage2"
                                                    src="<?= $footer_data['footer_payment_image2'] ?>">
                                            <?php endif; ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="socialpayment_link2">Link 2</label>
                                            <input type="url" name="socialpayment_link2[]"
                                                value="<?= $footer_data['footer_payment_link2'] ?>" class="form-control"
                                                placeholder="Enter Link">
                                        </div>
                                    </div>

                                    <div class="payment-group">
                                        <div class="form-group">
                                            <label for="Footer_paymentImage3">Image 3</label>
                                            <input type="file" name="Footer_paymentImage3" id="Footer_paymentImage3"
                                                class="form-control" accept="image/*">
                                            <small>Formats: JPG, PNG, JPEG, (WEBP), Max-size: 400 KB, Recommended
                                                Dimensions: 60 x 60 px.</small>
                                            <?php if (!empty($footer_data['footer_payment_image3'])): ?>
                                                <img id="Footer_paymentImage3"
                                                    src="<?= $footer_data['footer_payment_image3'] ?>">
                                            <?php endif; ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="socialpayment_link3">Link 3</label>
                                            <input type="url" name="socialpayment_link3[]"
                                                value="<?= $footer_data['footer_payment_link3'] ?>" class="form-control"
                                                placeholder="Enter Link">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </ul>
                </li>


                <!---------------------------------------------------------------- policy page----------------------------------------------------------------------------------------------------->


                <li id="web-otherpages" style="display: none;" class="web-section dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-list"></span>
                        <span class="mtext">Policy</span>
                    </a>
                    <ul class="submenu">
                        <!-- Plus Button to Add New -->
                        <div class="hr-container">
                            <hr class="line">
                            <button type="button" id="policyplus" class="circle-button">
                                <i class="fas fa-plus"></i>
                            </button>
                            <hr class="line">
                        </div>

                        <!-- Add New Policy Form -->
                        <div class="ImageUploadBox" id="AddNewPolicyForm" style="display: none;">
                            <form id="addpolicy" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">
                                <h6 class="mt-3">Add Policy</h6>
                                <hr class="mt-1">
                                <!-- Title -->
                                <div class="form-group">
                                    <label for="policy_name">Name</label>
                                    <input type="text" name="policy_name" id="policy_name" class="form-control"
                                        placeholder="Enter policy">
                                </div>
                                <div class="form-group">
                                    <label for="policy_description">About Description</label>
                                    <div class="quill-editor" data-target="policy_description"></div>
                                    <input type="hidden" name="policy_description" id="policy_description">
                                </div>

                                <div class="form-group">
                                    <label for="policy_link">Link</label>
                                    <input type="text" name="policy_link" id="policy_link"
                                        class="form-control validate-required"
                                        data-error-message-required="Link is required." placeholder="Enter Link"
                                        readonly>
                                </div>

                                <!-- Submit Button -->
                                <button type="submit" class="btn btn-primary">Add</button>
                            </form>
                        </div>
                        <!-- List of Policies -->
                        <div class="policiesBoxContainer" id="policiesBoxContainer">
                            <?php foreach ($policies as $policy): ?>
                                <div class="PoliciesBox" id="policyBox-<?= $policy['id'] ?>" data-id="<?= $policy['id'] ?>">

                                    <div class="CarouselHeader">
                                        <div class="handle" id="handle">☰
                                            <?= (strlen($policy['policy_name']) > 6) ? substr($policy['policy_name'], 0, 6) . '...' : $policy['policy_name'] ?>
                                        </div>
                                        <div class="actions">
                                            <!-- Expand/Collapse Icon -->
                                            <button type="button" class="btn btn-link" style="margin-top: 0;"
                                                onclick="toggleEditFormPolicy(<?= $policy['id'] ?>)">
                                                <i id="chevron-<?= $policy['id'] ?>" class="fas fa-chevron-down"></i>
                                            </button>
                                            <!-- Delete Button -->
                                            <a href="javascript:void(0);" onclick="deletePolicy(<?= $policy['id'] ?>)"
                                                class="" style="color: red; padding: 0;">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </div>
                                    </div>

                                    <!-- Collapsible Edit Form -->
                                    <div class="edit-form" id="editPolicyForm-<?= $policy['id'] ?>" style="display:none;">
                                        <form id="editNewPolicyForm-<?= $policy['id'] ?>" method="post"
                                            enctype="multipart/form-data">
                                            <h6 class="mt-3">Edit Policy</h6>
                                            <hr class="mt-1">
                                            <!-- Title -->
                                            <div class="form-group">
                                                <label for="policy_name">Name</label>
                                                <input type="text" name="policy_name" value="<?= $policy['policy_name'] ?>"
                                                    id="policy_name" class="form-control" placeholder="Enter policy name">
                                            </div>

                                            <div class="form-group">
                                                <label for="policy_description">About Description</label>
                                                <div class="quill-editor" data-target="policy_description">
                                                    <?= $policy['policy_description'] ?>
                                                </div>
                                                <input type="hidden" value="<?= $policy['policy_description'] ?>"
                                                    name="policy_description" id="policy_description">
                                            </div>

                                            <!-- Link -->
                                            <div class="form-group">
                                                <label for="policy_link">Link</label>
                                                <input type="text" name="policy_link" value="<?= $policy['policy_link'] ?>"
                                                    id="policy_link" class="form-control" placeholder="Enter Link">
                                            </div>

                                            <!-- Submit Button -->
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </form>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </ul>
                </li>


                <!---------------------------------------------------------------- product page----------------------------------------------------------------------------------------------------->

                <form id="productForm">
                    <li id="web-product" style="display: none;" class="web-section dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon bi bi-list"></span>
                            <span class="mtext">Product</span>
                        </a>
                        <ul class="submenu">
                            <form id="productForm">
                                <div class="ImageUploadBox">
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" name="productpagetitle" id="productpagetitle" value="<?= $product_setting['title'] ?>" class="form-control" required>
                                    </div>


                                    <div class="form-group">
                                        <label for="Description">Description</label>
                                        <input type="text" name="Description" id="Description" value="<?= $product_setting['Description'] ?>" class="form-control" required>
                                    </div>


                                    <div class="form-group">
                                        <button type="button" id="showProductBtn" class="btn btn-secondary">Select Products</button>
                                    </div>


                                    <!-- Product Dropdown with Search Bar -->
                                    <div id="productCheckboxContainer" class="form-group" style="display: none; margin-top: 10px;">
                                        <label>Select Products:</label>
                                        <input type="text" id="productSearch" class="form-control" placeholder="Search products...">
                                        <div id="productList">
                                            <?php
                                            $selectedproducts = explode(',', $product_setting['product_id'] ?? '');
                                            foreach ($products as $product):
                                            ?>
                                                <div class="product-item">
                                                    <input type="checkbox" class="product-checkbox" id="product-<?= $product['product_id'] ?>" value="<?= $product['product_id'] ?>" data-title="<?= $product['product_title'] ?>" <?= in_array($product['product_id'], $selectedproducts) ? 'checked' : '' ?>>
                                                    <label for="product-<?= $product['product_id'] ?>"><?= $product['product_title'] ?></label>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>


                                    <div id="selectedProducts" class="sortable-container" style="margin-top: 20px;"></div>


                                    <div class="form-group">
                                        <button type="button" id="showbundletBtn" class="btn btn-secondary">Select bundle</button>
                                    </div>


                                    <!-- Bundle Dropdown with Search Bar -->
                                    <div id="bundleCheckboxContainer" class="form-group" style="display: none; margin-top: 10px;">
                                        <label>Select bundle:</label>
                                        <input type="text" id="bundleSearch" class="form-control" placeholder="Search bundles...">
                                        <div id="bundleList">
                                            <?php
                                            $selectedbundle = explode(',', $product_setting['bundle_id'] ?? '');
                                            foreach ($bundles as $bundle):
                                            ?>
                                                <div class="bundle-item">
                                                    <input type="checkbox" class="bundle-checkbox" id="bundle-<?= $bundle['bundle_id'] ?>" value="<?= $bundle['bundle_id'] ?>" data-title="<?= $bundle['bundle_name'] ?>" <?= in_array($bundle['bundle_id'], $selectedbundle) ? 'checked' : '' ?>>
                                                    <label for="bundle-<?= $bundle['bundle_id'] ?>"><?= $bundle['bundle_name'] ?></label>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>


                                    <div id="selectedbundle" class="sortable-container" style="margin-top: 20px;"></div>
                                </div>
                            </form>
                        </ul>
                    </li>


                    <!---------------------------------------------------------------- Marquee Page Start----------------------------------------------------------------------------------------------------->

                    <li id="web-home" class="web-section dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon bi bi-list"></span>
                            <span class="mtext">Marquee</span>
                        </a>
                        <ul class="submenu">
                            <!-- First Level Submenu -->
                            <li class="dropdown">
                                <a href="javascript:;" class="dropdown-toggle">
                                    <span class="micon bi bi-three-dots"></span>
                                    <span class="mtext">Top line Text</span>
                                </a>
                                <ul class="submenu child">
                                    <!-- Plus Button to Add New -->
                                    <div class="hr-container">
                                        <hr class="line">
                                        <button type="button" id="toggleTextFormButton" class="circle-button">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                        <hr class="line">
                                    </div>

                                    <!-- The form is initially hidden -->
                                    <form id="addmarqueeText" method="post" enctype="multipart/form-data"
                                        style="display: none;">
                                        <hr class="mt-1">
                                        <div id="marqueeTextContainer">
                                            <div class="text-media-group">
                                                <div class="form-group">
                                                    <label for="marqueeText">Enter text</label>
                                                    <input type="text" name="marqueeText" class="form-control"
                                                        placeholder="Enter text" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="marqueeText_link">Link</label>
                                                    <input type="url" name="marqueeText_link" class="form-control"
                                                        placeholder="Enter Link">
                                                </div>
                                                <div class="form-group">
                                                    <label for="text_visibility">Visibility</label>
                                                    <select name="text_visibility" id="text_visibility"
                                                        class="form-control">
                                                        <option value="1">Active</option>
                                                        <option value="0">Draft</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary mt-2">Save</button>
                                    </form>


                                    <div class="textBoxContainer" id="textBoxContainer">
                                        <?php if (!empty($marqueeTexts)): // Assuming $marqueeTexts is an array of records fetched from the database 
                                        ?>
                                            <?php foreach ($marqueeTexts as $text): ?>
                                                <div class="textBox" data-id="<?= $text['id']; ?>">
                                                    <div class="CarouselHeader">
                                                        <div class="handle">
                                                            ☰<?= (strlen($text['marqueeText']) > 6) ? substr($text['marqueeText'], 0, 6) . '...' : $text['marqueeText'] ?>
                                                        </div>
                                                        <div class="actions">
                                                            <!-- Expand/Collapse Icon -->
                                                            <button type="button" class="btn btn-link" style="margin-top: 0;">
                                                                <i id="chevron--<?= $text['id'] ?>" class="fas fa-chevron-down"></i>
                                                            </button>
                                                            <!-- Delete Button -->
                                                            <a href="javascript:void(0);" class="delete-button"
                                                                data-id="<?= $text['id']; ?>" style="color: red; padding: 0;">
                                                                <i class="fas fa-trash-alt"></i>
                                                            </a>
                                                        </div>
                                                    </div>

                                                    <!-- Collapsible Edit Form -->
                                                    <div class="edit-form" style="display: none;">
                                                        <form id="edittextForm-<?= $text['id']; ?>" method="post"
                                                            enctype="multipart/form-data">
                                                            <div class="form-group">
                                                                <label for="marqueeText">Enter text</label>
                                                                <input type="text" name="marqueeText" class="form-control"
                                                                    placeholder="Enter text"
                                                                    value="<?= htmlspecialchars($text['marqueeText']); ?>" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="marqueeText_link">Link</label>
                                                                <input type="url" name="marqueeText_link" class="form-control"
                                                                    placeholder="Enter Link"
                                                                    value="<?= htmlspecialchars($text['marqueeText_link']); ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="text_visibility">Visibility</label>
                                                                <select name="text_visibility" class="form-control">
                                                                    <option value="1" <?= $text['text_visibility'] == '1' ? 'selected' : ''; ?>>Active</option>
                                                                    <option value="0" <?= $text['text_visibility'] == '0' ? 'selected' : ''; ?>>Draft</option>
                                                                </select>
                                                            </div>
                                                            <!-- Submit Button -->
                                                            <button type="submit" class="btn btn-primary">Update</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <p>No marquee texts found.</p>
                                        <?php endif; ?>
                                    </div>

                                </ul>
                            </li>

                            <li class="dropdown">
                                <a href="javascript:;" class="dropdown-toggle">
                                    <span class="micon bi bi-three-dots"></span>
                                    <span class="mtext">Bottom line Text</span>
                                </a>
                                <ul class="submenu child">
                                    <form id="addmarqueebottomText" method="post" enctype="multipart/form-data">
                                        <hr class="mt-1">
                                        <div id="marqueebottomTextContainer">
                                            <div class="text-media-group">
                                                <div class="form-group">
                                                    <label for="marqueebottomText1">Enter text 1</label>
                                                    <input type="text" name="marqueebottomText1" class="form-control"
                                                        value="<?= $marqueebottomText['marqueebottomText1'] ?>"
                                                        placeholder="Enter text" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="marqueebottomDescription1">Description 1</label>
                                                    <textarea class="form-control" name="marqueebottomDescription1"
                                                        id="marqueebottomDescription2">value="<?= $marqueebottomText['marqueebottomDescription1'] ?>"</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="marqueebottomText2">Enter text 2</label>
                                                    <input type="text" name="marqueebottomText2" class="form-control"
                                                        value="<?= $marqueebottomText['marqueebottomText2'] ?>"
                                                        placeholder="Enter text" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="marqueebottomDescription2">Description2</label>
                                                    <textarea class="form-control" name="marqueebottomDescription2"
                                                        id="marqueebottomDescription2">value="<?= $marqueebottomText['marqueebottomDescription2'] ?>"</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="marqueebottomText3">Enter text 3</label>
                                                    <input type="text" name="marqueebottomText3" class="form-control"
                                                        value="<?= $marqueebottomText['marqueebottomText3'] ?>"
                                                        placeholder="Enter text" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="marqueebottomDescription3">Description 3</label>
                                                    <textarea class="form-control" name="marqueebottomDescription3"
                                                        id="marqueebottomDescription3">value="<?= $marqueebottomText['marqueebottomDescription3'] ?>"</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary mt-2">Save</button>
                                    </form>
                                </ul>
                            </li>
                        </ul>
                    </li>


                    <!---------------------------------------------------------------- Marquee Page End----------------------------------------------------------------------------------------------------->


                    <li id="web-Email_POP_UP" style="display: none;" class="web-section dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon bi bi-list"></span>
                            <span class="mtext">Email POP UP</span>
                        </a>
                        <ul class="submenu">
                            <div class="ImageUploadBox" id="AddNewEmail_POP_UPForm">
                                <form id="addEmail_POP_UPdata" method="post" enctype="multipart/form-data">
                                    <hr class="mt-1">
                                    <!-- Image Upload -->
                                    <div class="form-group">
                                        <label for="Email_POP_UP_Image">Image</label>
                                        <input type="file" name="Email_POP_UP_Image" id="Email_POP_UP_Image"
                                            class="form-control" accept="image/*">
                                        <br>
                                        <?php if (!empty($email_pop_up['email_pop_up_image'])): ?>
                                            <img id="previewImage" src="<?= $email_pop_up['email_pop_up_image'] ?>" alt="Image Preview" style="max-width: 150px; margin-top: 10px; display: ;">
                                        <?php endif; ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="Email_POP_UP_mail_Title">Title</label>
                                        <input type="text" name="Email_POP_UP_mail_Title" id="Email_POP_UP_mail_Title"
                                            value="<?= $email_pop_up['email_pop_up_mail_title'] ?>" class="form-control"
                                            placeholder="Enter Name">
                                    </div>

                                    <div class="form-group">
                                        <label for="Email_POP_UP_mail_text">Short Description</label>
                                        <textarea class="form-control" name="Email_POP_UP_mail_text"
                                            id="Email_POP_UP_mail_text"><?= $email_pop_up['email_pop_up_mail_text'] ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="Email_POP_UP_mail_linktext">link text</label>
                                        <input type="text" name="Email_POP_UP_mail_linktext" id="Email_POP_UP_mail_linktext"
                                            value="<?= $email_pop_up['email_pop_up_mail_linktext'] ?>" class="form-control"
                                            placeholder="Enter Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="Email_POP_UP_description">Link Description </label>
                                        <div class="quill-editor" data-target="Email_POP_UP_description"></div>
                                        <input type="hidden" value="<?= $email_pop_up['email_pop_up_description'] ?>"
                                            name="Email_POP_UP_description" id="Email_POP_UP_description">
                                    </div>
                                </form>
                            </div>
                        </ul>
                    </li>

            </ul>
        </div>
    </div>
</div>

<!-- Include Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />

<!-- Include jQuery (required for Select2) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        // Initialize Select2 for all select elements with the 'select2' class
        $('.select2').select2({
            placeholder: "Select an option",
            allowClear: true
        });
    });
</script>