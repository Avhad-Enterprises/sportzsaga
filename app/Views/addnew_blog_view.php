<!-- Head View Start -->
<?= $this->include('head_view') ?>
<!-- Head View End -->

<style>
    .serp-preview {
        border: 1px solid #e0e0e0;
        padding: 10px;
        background-color: #f8f9fa;
        font-family: Arial, sans-serif;
    }

    .serp-url {
        color: #1a0dab;
        font-size: 14px;
        text-decoration: none;
    }

    .serp-title {
        color: #1a0dab;
        font-size: 18px;
        margin: 5px 0;
    }

    .serp-description {
        color: #4d5156;
        font-size: 13px;
        line-height: 1.4;
    }
</style>

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

                <form id="NewEditblogform" method="post" action="<?= base_url() ?>blogs/publishmyblog" enctype="multipart/form-data" class="needs-validation" novalidate>
                    <div class="mb-3 d-flex justify-content-between">
                        <i class="fa-solid fa-arrow-left" onclick="goBack()"></i>
                        <button value="submit" class="btn btn-primary btn-lg">
                            Publish
                        </button>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="pd-20 card-box mb-30">
                                <p class="text-blue">Blog </p>
                                <div class="form-group">
                                    <label>Title</label>
                                    <input class="form-control" name="blog-title" type="text" placeholder="Johnny Brown" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        This feild can't be Empty
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control resizable-textarea" name="blog-description" maxlength="150" required></textarea>
                                    <small>Max 150 Characters</small>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        This feild can't be Empty
                                    </div>
                                </div>
                                <div id="main-content-container">
                                    <label>Content</label>
                                    <textarea class="form-control resizable-textarea editor" id="editor" name="blog-main-content"></textarea>
                                </div>
                            </div>

                            <div class="pd-20 card-box mb-30">
                                <p class="text-blue mb-30">Blog Subsections</p>
                                <div id="sections-container">
                                    <div class="form-section" id="section-1">
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input class="form-control" type="text" name="section_title[]" placeholder="Title">
                                        </div>

                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control" name="section_description[]"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Section Image</label>
                                            <input type="file" class="form-control-file form-control height-auto" name="section_image[]">
                                            <i>
                                                <p style="font-size: 12px; margin-left:10px; margin-top:5px">Formats: JPG, PNG, JPEG, (WEBP), Recommended Size: 720 x 560 px.</p>
                                            </i>
                                        </div>
                                    </div>
                                </div>

                                <button type="button" id="add-section-btn" class="btn btn-primary">+ Add Section</button>

                            </div>

                            <div class="pd-20 card-box mb-30">
                                <p class="text-blue mb-30">Add Meta Fields</p>
                                <!-- Meta Title -->
                                <div class="mb-3">
                                    <label for="meta-title" class="form-label">Meta Title</label>
                                    <input type="text" class="form-control" id="meta-title" name="blog-meta-title" placeholder="Keep it concise (around 50-60 characters) to ensure it displays properly in search engine results." required>
                                    <div id="blogpost-error-7" class="blogpost-error"></div>
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">This field can't be empty</div>
                                </div>
                                <!-- Meta Description -->
                                <div class="mb-3">
                                    <label for="meta-description" class="form-label">Meta Description</label>
                                    <input type="text" class="form-control" id="meta-description" name="blog-meta-description" placeholder="Include your target keyword naturally and keep the length under 160 characters." required>
                                    <div id="blogpost-error-8" class="blogpost-error"></div>
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">This field can't be empty</div>
                                </div>
                                <!-- Meta URL -->
                                <div class="mb-3">
                                    <label for="meta-url" class="form-label">Meta URL</label>
                                    <input type="text" class="form-control" id="meta-url" name="blog-meta-url" placeholder="https://www.example.com/sample-title" required>
                                    <div id="blogpost-error-9" class="blogpost-error"></div>
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">This field can't be empty</div>
                                </div>
                            </div>

                            <div class="pd-20 card-box mb-30">
                                <p class="text-blue mb-30">SERP Preview</p>
                                <div id="serp-preview" class="serp-preview">
                                    <a href="#" id="serp-url" class="serp-url">https://www.driphunter.in/sample-title</a>
                                    <h3 id="serp-title" class="serp-title">Sample Meta Title</h3>
                                    <p id="serp-description" class="serp-description">Sample Meta Description goes here. It includes your target keyword naturally and is under 160 characters.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="pd-20 card-box mb-30">
                                <p class="text-blue mb-30">Visibility & Category</p>
                                <div class="form-group">
                                    <label for="blog-visibility">Visibility</label>
                                    <select class=" custom-select2 form-control" id="blog-visibility" name="blog-visibility" style="width: 100%; height: 38px" required>
                                        <option value="">Select Visibility</option>
                                        <option value="active">Active</option>
                                        <option value="draft">Draft</option>
                                    </select>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        This field can't be empty.
                                    </div>
                                </div>
                                <div class="form-group">
                                    <p class="text-blue mb-30">Category</p>
                                    <div class="input-group">
                                        <select class="custom-select2 form-control" name="blog_category" id="service_category">
                                            <option value="">Select Category--</option>
                                            <?php foreach ($categories as $category): ?>
                                                <option value="<?= $category['category_value'] ?>"><?= $category['category_name'] ?></option>
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
                                <p class="text-blue">Main Blog PC Image</p>
                                <div class="form-group">
                                    <input type="file" name="blog-pc-image" class="form-control-file form-control height-auto" onchange="previewpcImage(event)" required>
                                    <div id="pc-image-error" class="text-danger" style="font-size: 12px; margin-top: 5px;"></div>
                                    <small>Formats: JPG, PNG, JPEG, (WEBP), Recommended Size: 1330 x 800 px.</small>
                                    <div id="pcimage-preview-container">
                                        <img id="pc-image-preview" src="#" alt="PC Image Preview" style="display: none;">
                                        <button type="button" id="pc-image-remove-btn" onclick="removepcImage()" style="position: absolute; top: 5px; right: 5px; border: none; background: transparent; cursor: pointer; display: none;">
                                            <i class="fa-solid fa-circle-xmark" style="color: #000;"></i>
                                        </button>
                                    </div>

                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        This field can't be empty
                                    </div>
                                </div>
                            </div>

                            <div class="pd-20 card-box mb-30">
                                <p class="text-blue">Main Blog Mobile Image</p>
                                <div class="form-group">
                                    <input type="file" name="blog-mobile-image" class="form-control-file form-control height-auto" onchange="previewmobileImage(event)" required>
                                    <div id="mobile-image-error" class="text-danger" style="font-size: 12px; margin-top: 5px;"></div>
                                    <small>Formats: JPG, PNG, JPEG, (WEBP), Recommended Size: 800 x 800 px.</small>
                                    <div id="mobileimage-preview-container">
                                        <img id="mobile-image-preview" src="#" alt="Mobile Image Preview" style="display: none;">
                                        <button type="button" id="mobile-image-remove-btn" onclick="removemobieImage()" style="position: absolute; top: 5px; right: 5px; border: none; background: transparent; cursor: pointer; display: none;">
                                            <i class="fa-solid fa-circle-xmark" style="color: #ffffff;"></i>
                                        </button>
                                    </div>

                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        This field can't be empty
                                    </div>
                                </div>
                            </div>

                            <div class="pd-20 card-box mb-30">
                                <div class="form-group">
                                    <label>Add Tags</label>
                                    <div class="input-group">
                                        <?php if (!empty($tags)): ?>
                                            <select class="custom-select2 custom-select-tags form-control" name="blog-tags[]" multiple="multiple" style="width: 80%">
                                                <optgroup label="Available Tags">
                                                    <?php foreach ($tags as $tag): ?>
                                                        <option value="<?= esc($tag['tag_value']) ?>"><?= esc($tag['tag_name']) ?></option>
                                                    <?php endforeach; ?>
                                                </optgroup>
                                            </select>
                                        <?php else: ?>
                                            <p class="text-danger">No tags available</p>
                                        <?php endif; ?>

                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#multiSelectModal">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="pd-20 card-box mb-30">
                                <p class="text-blue mb-30">Author</p>
                                <div class="form-group">
                                    <label>Enter Name</label>
                                    <input class="form-control" name="blog-author-name" type="text" placeholder="Enter Your Name/Author Name">
                                </div>
                            </div>

                        </div>
                    </div>
                </form>

                <!-- Modal to Add New Tag -->
                <div class="modal fade" id="multiSelectModal" tabindex="-1" role="dialog" aria-labelledby="multiSelectModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="multiSelectModalLabel">Add New Tag</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="addMultiSelectOptionForm">
                                    <div class="form-group">
                                        <label for="newOptionText">Tag Name</label>
                                        <input type="text" class="form-control" id="newOptionText" placeholder="Enter new tag name">
                                    </div>
                                    <div class="form-group">
                                        <label for="newOptionValue">Tag Value</label>
                                        <input type="text" class="form-control" id="newOptionValue" placeholder="Tag value">
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="addNewOption">Add</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="categoryModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="categoryModalLabel">Add New Category</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="categoryForm">
                                    <div class="form-group">
                                        <label for="category_name">Category Name:</label>
                                        <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Enter Category Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="category_value">Category Value:</label>
                                        <input type="text" class="form-control" id="category_value" name="category_value" placeholder="Enter Category Value">
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="saveCategoryBtn">Save Category</button>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        document.getElementById("saveCategoryBtn").addEventListener("click", function() {
                            var categoryName = document.getElementById("category_name").value.trim();
                            var categoryValue = document.getElementById("category_value").value.trim();

                            if (categoryName && categoryValue) {
                                $.ajax({
                                    url: "<?= base_url('blogs/add-category') ?>",
                                    method: "POST",
                                    data: {
                                        category_name: categoryName,
                                        category_value: categoryValue
                                    },
                                    dataType: "json",
                                    success: function(response) {
                                        if (response.success) {
                                            var newOption = new Option(response.name, response.value);
                                            document.getElementById("service_category").add(newOption);
                                            document.getElementById("service_category").value = response.value;

                                            $("#categoryModal").modal("hide");
                                            document.getElementById("categoryForm").reset();
                                        } else {
                                            alert(response.message);
                                        }
                                    },
                                    error: function(xhr, status, error) {
                                        console.error("Category AJAX Error:", xhr.responseText);
                                        alert("An error occurred while adding the category.");
                                    }
                                });
                            } else {
                                alert("Please fill in both fields.");
                            }
                        });
                    });
                </script>

                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        document.getElementById("addNewOption").addEventListener("click", function(event) {
                            event.preventDefault();

                            var tagName = $.trim($("#newOptionText").val());
                            var tagValue = $.trim($("#newOptionValue").val());

                            if (tagName === "" || tagValue === "") {
                                alert("Please enter both Tag Name and Tag Value.");
                                return;
                            }

                            console.log("Submitting tag:", tagName, tagValue);

                            $.ajax({
                                url: "<?= base_url('blogs/add_new_tag') ?>",
                                type: "POST",
                                data: {
                                    tag_name: tagName,
                                    tag_value: tagValue,
                                    "<?= csrf_token() ?>": "<?= csrf_hash() ?>"
                                },
                                dataType: "json",
                                success: function(response) {
                                    console.log("AJAX Response:", response);

                                    if (response.status === "success") {
                                        $(".custom-select-tags").append('<option value="' + tagValue + '" selected>' + tagName + '</option>');
                                        $(".custom-select-tags").trigger("change");

                                        $("#multiSelectModal").modal("hide");

                                        $("#newOptionText").val("");
                                        $("#newOptionValue").val("");

                                        alert("Tag added successfully!");
                                    } else {
                                        alert(response.message || "Failed to add tag. Please try again.");
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
                                placeholder: "Select tags",
                                allowClear: true
                            });
                        }
                    });
                </script>

                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        let tagNameInput = document.getElementById("newOptionText");
                        let tagValueInput = document.getElementById("newOptionValue");

                        tagNameInput.addEventListener("input", function() {
                            let tagName = tagNameInput.value.trim().toLowerCase();
                            let tagValue = tagName.replace(/\s+/g, "-");
                            tagValueInput.value = tagValue;
                        });
                    });
                </script>

            </div>
        </div>
        <!-- Page Main Content End -->

        <!-- Footer View Start -->
        <?= $this->include('footer_view') ?>
        <!-- Footer View End -->

</body>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const sectionsContainer = document.getElementById('sections-container');
        const addSectionBtn = document.getElementById('add-section-btn');
        let sectionCount = 1;

        addSectionBtn.addEventListener('click', function() {
            if (sectionCount >= 10) {
                alert('You can only add up to 10 sections.');
                return;
            }

            sectionCount++;
            const newSection = document.createElement('div');
            newSection.classList.add('form-section');
            newSection.id = 'section-' + sectionCount;
            newSection.innerHTML = `
                <div class="form-group">
                    <label>Title ${sectionCount}</label>
                    <input class="form-control" type="text" name="section_title[]" placeholder="Title ${sectionCount}">
                    <i>
                        <p style="font-size: 12px; margin-left:10px; margin-top:5px">Max 70 chars, Min 10 chars, Exclude %, &, $, Avoid 'Free', 'Sale', 'Best'</p>
                    </i>
                </div>

                <div class="form-group">
                    <label>Description ${sectionCount}</label>
                    <textarea class="form-control" name="section_description[]"></textarea>
                    <i>
                        <p style="font-size: 12px; margin-left:10px; margin-top:5px">No contact info, Exclude emails, phones, links</p>
                    </i>
                </div>

                <div class="form-group">
                    <label>Section Image ${sectionCount}</label>
                    <input type="file" class="form-control-file form-control height-auto" name="section_image[]">
                    <i>
                        <p style="font-size: 12px; margin-left:10px; margin-top:5px">Formats: JPG, PNG, JPEG, (WEBP), Recommended Size: 720 x 560 px.</p>
                    </i>
                </div>
            `;
            sectionsContainer.appendChild(newSection);
        });
    });
</script>

<script>
    function previewpcImage(event) {
        const file = event.target.files[0];
        const reader = new FileReader();
        const errorContainer = document.getElementById('pc-image-error');

        errorContainer.textContent = "";

        if (file.size > 1024 * 1024) {
            errorContainer.textContent = "Desktop Image must be under 1 MB.";
            event.target.value = "";
            return;
        }

        reader.onload = function() {
            const img = new Image();
            img.src = reader.result;

            img.onload = function() {
                if (img.width !== 1330 || img.height !== 800) {
                    errorContainer.textContent = "Desktop Image must be 1330 width x height 800 pixels.";
                    event.target.value = "";
                    return;
                }

                const imagePreview = document.getElementById('pc-image-preview');
                const imageRemoveBtn = document.getElementById('pc-image-remove-btn');
                imagePreview.src = img.src;
                imagePreview.style.display = 'block';
                imageRemoveBtn.style.display = 'block';
            };
        };
        reader.readAsDataURL(file);
    }

    function removepcImage() {
        const imagePreview = document.getElementById('pc-image-preview');
        const imageRemoveBtn = document.getElementById('pc-image-remove-btn');
        const fileInput = document.querySelector('input[name="blog-pc-image"]');
        const errorContainer = document.getElementById('pc-image-error');

        imagePreview.src = '#';
        imagePreview.style.display = 'none';
        imageRemoveBtn.style.display = 'none';
        fileInput.value = '';
        errorContainer.textContent = "";
    }

    function previewmobileImage(event) {
        const file = event.target.files[0];
        const reader = new FileReader();
        const errorContainer = document.getElementById('mobile-image-error');

        errorContainer.textContent = "";

        if (file.size > 1024 * 1024) {
            errorContainer.textContent = "Mobile Image must be under 1 MB.";
            event.target.value = "";
            return;
        }

        reader.onload = function() {
            const img = new Image();
            img.src = reader.result;

            img.onload = function() {
                if (img.width !== 800 || img.height !== 800) {
                    errorContainer.textContent = "Mobile Image must be 800 width x height 800 pixels.";
                    event.target.value = "";
                    return;
                }

                const imagePreview = document.getElementById('mobile-image-preview');
                const imageRemoveBtn = document.getElementById('mobile-image-remove-btn');
                imagePreview.src = img.src;
                imagePreview.style.display = 'block';
                imageRemoveBtn.style.display = 'block';
            };
        };
        reader.readAsDataURL(file);
    }

    function removemobieImage() {
        const imagePreview = document.getElementById('mobile-image-preview');
        const imageRemoveBtn = document.getElementById('mobile-image-remove-btn');
        const fileInput = document.querySelector('input[name="blog-mobile-image"]');
        const errorContainer = document.getElementById('mobile-image-error');

        imagePreview.src = '#';
        imagePreview.style.display = 'none';
        imageRemoveBtn.style.display = 'none';
        fileInput.value = '';
        errorContainer.textContent = "";
    }
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const titleInput = document.querySelector('input[name="blog-title"]');
        const metaUrlInput = document.querySelector('input[name="blog-meta-url"]');
        const serpUrl = document.getElementById('serp-url'); // Optional: For displaying in SERP preview

        function generateSlug(title) {
            return title
                .toLowerCase() // Convert to lowercase
                .trim() // Remove leading/trailing spaces
                .replace(/[^a-z0-9]+/g, '-') // Replace non-alphanumeric characters with hyphens
                .replace(/^-+|-+$/g, ''); // Remove leading and trailing hyphens
        }

        titleInput.addEventListener('input', function() {
            if (titleInput.value.trim() !== "") {
                const slug = generateSlug(titleInput.value);
                metaUrlInput.value = `https://www.sprotzsaga.in/${slug}`;

                if (serpUrl) {
                    serpUrl.textContent = metaUrlInput.value; // Update SERP preview if needed
                }
            } else {
                metaUrlInput.value = ""; // Clear URL if title is empty
                if (serpUrl) {
                    serpUrl.textContent = "";
                }
            }
        });
    });
</script>

<!-- Footer View End -->
<script>
    function goBack() {
        // Redirects to the previous page in browser history
        window.history.back();
    }
</script>

</html>