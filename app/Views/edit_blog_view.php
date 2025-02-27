<head>
    <!-- Head View Start -->
    <?= $this->include('head_view') ?>
    <!-- Head View End -->
</head>

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

                <?php foreach ($posts as $post) : ?>
                    <form id="editblogform" method="post" action="<?= base_url('blogs/editmyblog/' . $post['blog_id']) ?>" enctype="multipart/form-data" class="needs-validation" novalidate>

                        <div class="mb-3 d-flex justify-content-between">
                            <i class="fa-solid fa-arrow-left" onclick="goBack()"></i>
                            <button value="submit" class="btn btn-primary btn-lg">Update</button>
                        </div>

                        <div class="row">
                            <div class="col-md-8">
                                <div class="pd-20 card-box mb-30">
                                    <p class="text-blue">Blog </p>
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input class="form-control" value="<?= $post['blog_title'] ?>" name="blog-title" type="text" placeholder="Johnny Brown" required>
                                        <small>Min 60 Character, Max 70 Character</small>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        <div class="invalid-feedback">
                                            This feild can't be Empty
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea class="form-control" name="blog-description" required><?= $post['blog_description'] ?></textarea>
                                        <small>Min 400-600 Words</small>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        <div class="invalid-feedback">
                                            This feild can't be Empty
                                        </div>
                                    </div>
                                    <div id="main-content-container">
                                        <textarea id="editor" name="blog-main-content"><?= $post['main_description'] ?></textarea>
                                    </div>
                                </div>

                                <?php $maxSections = 10; ?>
                                <div id="blog-sections">
                                    <?php for ($i = 1; $i <= $maxSections; $i++) : ?>
                                        <?php if (!empty($post['section_title_' . $i])) : ?>
                                            <div class="pd-20 card-box mb-30 section-container" data-section-number="<?= $i ?>">
                                                <p class="text-blue mb-30">Blog Subsections</p>
                                                <div class="form-group">
                                                    <label for="section_title_<?= $i ?>">Title <?= $i ?></label>
                                                    <input class="form-control" type="text" id="section_title_<?= $i ?>" name="section_title_<?= $i ?>" value="<?= esc($post['section_title_' . $i]) ?>" placeholder="Enter title <?= $i ?>">
                                                    <small>Max 70 characters, Min 10 characters</small>
                                                </div>

                                                <div class="form-group">
                                                    <label for="section_description_<?= $i ?>">Description <?= $i ?></label>
                                                    <textarea class="form-control" id="section_description_<?= $i ?>" name="section_description_<?= $i ?>" placeholder="Enter description <?= $i ?>"><?= esc($post['section_description_' . $i]) ?></textarea>
                                                    <small>Max 150 characters, Min 110 characters</small>
                                                </div>

                                                <div class="form-group">
                                                    <label for="section_image_<?= $i ?>">Section Image <?= $i ?></label>
                                                    <input type="file" class="form-control-file form-control height-auto" id="section_image_<?= $i ?>" name="section_image_<?= $i ?>">
                                                    <small>Formats: JPG, PNG, JPEG, (WEBP), Recommended Size: 720 x 560 px.</small>

                                                    <?php if (!empty($post['section_image_' . $i])) : ?>
                                                        <img src="<?= $post['section_image_' . $i] ?>" alt="Section Image <?= $i ?>" width="500px" style="margin: 16px;">
                                                        <input type="hidden" name="current_section_image_<?= $i ?>" value="<?= esc($post['section_image_' . $i]) ?>">
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    <?php endfor; ?>
                                </div>

                                <!-- Button to add more sections -->
                                <button type="button" id="add-section" class="btn btn-primary my-3">Add</button>

                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        let maxSections = <?= $maxSections ?>;

                                        // Calculate the current number of sections by counting the number of existing .section-container divs
                                        let sectionCount = document.querySelectorAll('.section-container').length;

                                        document.getElementById('add-section').addEventListener('click', function() {
                                            // Only add new sections if we're below the max limit
                                            if (sectionCount < maxSections) {
                                                sectionCount++; // Increment section count for the next section

                                                const newSectionHTML = `
                                                    <div class="pd-20 card-box mb-30 section-container" data-section-number="${sectionCount}">
                                                        <p class="text-blue mb-30">Blog Subsections</p>
                                                        <div class="form-group">
                                                            <label for="section_title_${sectionCount}">Title ${sectionCount}</label>
                                                            <input class="form-control" type="text" id="section_title_${sectionCount}" name="section_title_${sectionCount}" placeholder="Enter title ${sectionCount}">
                                                            <small>Max 70 characters, Min 10 characters</small>
                                                        </div>
                                
                                                        <div class="form-group">
                                                            <label for="section_description_${sectionCount}">Description ${sectionCount}</label>
                                                            <textarea class="form-control" id="section_description_${sectionCount}" name="section_description_${sectionCount}" placeholder="Enter description ${sectionCount}"></textarea>
                                                            <small>Max 150 characters, Min 110 characters</small>
                                                        </div>
                                
                                                        <div class="form-group">
                                                            <label for="section_image_${sectionCount}">Section Image ${sectionCount}</label>
                                                            <input type="file" class="form-control-file form-control height-auto" id="section_image_${sectionCount}" name="section_image_${sectionCount}">
                                                            <small>Formats: JPG, PNG, JPEG, (WEBP), Recommended Size: 720 x 560 px.</small>
                                                        </div>
                                                    </div>`;

                                                // Append the new section to the #blog-sections div
                                                document.getElementById('blog-sections').insertAdjacentHTML('beforeend', newSectionHTML);
                                            } else {
                                                alert(`You can add up to ${maxSections} sections.`);
                                            }
                                        });
                                    });
                                </script>

                                <div class="pd-20 card-box mb-30">
                                    <p class="text-blue mb-30">Add Meta Fields</p>
                                    <!-- Meta Title -->
                                    <div class="mb-3">
                                        <label for="meta-title" class="form-label">Meta Title</label>
                                        <input type="text" class="form-control" id="meta-title" value="<?= $post['blog_metatitle'] ?>" name="blog-meta-title" placeholder="Keep it concise (around 50-60 characters) to ensure it displays properly in search engine results.">
                                        <div id="blogpost-error-7" class="blogpost-error"></div>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">This field can't be empty</div>
                                    </div>
                                    <!-- Meta Description -->
                                    <div class="mb-3">
                                        <label for="meta-description" class="form-label">Meta Description</label>
                                        <input type="text" class="form-control" id="meta-description" value="<?= $post['blog_metadescription'] ?>" name="blog-meta-description" placeholder="Include your target keyword naturally and keep the length under 160 characters.">
                                        <div id="blogpost-error-8" class="blogpost-error"></div>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">This field can't be empty</div>
                                    </div>
                                    <!-- Meta URL -->
                                    <div class="mb-3">
                                        <label for="meta-url" class="form-label">Meta URL</label>
                                        <input type="text" class="form-control" id="meta-url" value="<?= $post['blog_metaurl'] ?>" name="blog-meta-url" placeholder="https://www.example.com/sample-title">
                                        <div id="blogpost-error-9" class="blogpost-error"></div>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">This field can't be empty</div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-4">

                                <div class="pd-20 card-box mb-30">
                                    <div class="form-group">
                                        <label for="blog-visibility">Visibility</label>
                                        <select class=" custom-select2 form-control" id="blog-visibility" name="blog-visibility" style="width: 100%; height: 38px" required>
                                            <optgroup label="Select Visibility">
                                                <option value="active" <?= $post['blog_visibility'] == 'active' ? 'selected' : '' ?>>Active</option>
                                                <option value="draft" <?= $post['blog_visibility'] == 'draft' ? 'selected' : '' ?>>Draft</option>
                                            </optgroup>
                                        </select>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        <div class="invalid-feedback">
                                            This field can't be empty.
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="service_category">Category:</label>
                                        <div class="input-group">
                                            <select class="form-control" name="blog_category" id="service_category">
                                                <option value="">Select Category--</option>
                                                <?php foreach ($categories as $category): ?>
                                                    <option value="<?= $category['category_value'] ?>"
                                                        <?= ($post['category'] == $category['category_value']) ? 'selected' : '' ?>>
                                                        <?= $category['category_name'] ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                            <div class="input-group-append">
                                                <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#categoryModal">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="pd-20 card-box mb-30">
                                    <p class="text-blue">Featured Image</p>
                                    <div class="form-group">
                                        <label>Blog Image (Desktop)</label>
                                        <input type="file" name="blog-main-image" class="form-control-file form-control height-auto" onchange="previewImage(event)">
                                        <small>Formats: JPG, PNG, JPEG, (WEBP), Recommended Size: 1330 x 800 px.</small>
                                        <div class="pre-img" id="image-preview-container" style="position: relative;">
                                            <img id="desktop-image-preview" src="<?= esc($post['blog_image']) ?>" alt="Image Preview" width="500">
                                            <i class="fa-solid fa-circle-xmark" id="remove-image" style="color: #ffffff; position: absolute; top: 10px; right: 10px; cursor: pointer; display: none;" onclick="removeImage()"></i>
                                        </div>
                                        <input type="hidden" name="current-blog-image" value="<?= esc($post['blog_image']) ?>">
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">This field can't be empty</div>
                                    </div>
                                </div>

                                <div class="pd-20 card-box mb-30">
                                    <p class="text-blue">Blog Image (Mobile)</p>
                                    <div class="form-group">
                                        <label>Blog Featured Mobile Image</label>
                                        <input type="file" name="blog-mobile-image" class="form-control-file form-control height-auto" onchange="previewMobileImage(event)">
                                        <small>Formats: JPG, PNG, JPEG, (WEBP), Recommended Size: 800 x 800 px.</small>
                                        <div class="pre-img">
                                            <img id="new-mobile-image-preview" src="<?= esc($post['blog_mobile_image']) ?>" alt="Mobile Image Preview" width="350">
                                        </div>
                                        <input type="hidden" name="current-blog-mobile-image" value="<?= esc($post['blog_mobile_image']) ?>">
                                    </div>
                                </div>

                                <div class="pd-20 card-box mb-30">
                                    <div class="form-group">
                                        <div class="">
                                            <div class="">
                                                <h5 class="h5">Add Tags</h5>
                                                <p>
                                                    Press Enter to Seprate
                                                </p>
                                                <input type="text" value="<?= $post['blog_tags'] ?>" name="blog-tags" data-role="tagsinput" required />
                                            </div>
                                        </div>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        <div class="invalid-feedback">
                                            This feild can't be Empty
                                        </div>
                                    </div>
                                </div>

                                <div class="pd-20 card-box mb-30">
                                    <p class="text-blue mb-30">Author</p>
                                    <div class="form-group">
                                        <label>Enter Name</label>
                                        <input class="form-control" value="<?= $post['author_name'] ?>" name="blog-author-name" type="text" placeholder="Enter Your Name/Author Name">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <!-- Page Main Content End -->

    <!-- Footer View Start -->
    <?= $this->include('footer_view') ?>

    <!-- Footer View End -->
    <script>
        function goBack() {
            // Redirects to the previous page in browser history
            window.history.back();
        }
    </script>
</body>

</html>