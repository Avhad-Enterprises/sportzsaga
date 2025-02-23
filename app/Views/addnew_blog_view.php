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

    <!-- Page Main Content Start -->
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <!-- Header Section -->
                <div class="clearfix mb-3">
                    <div class="pull-left d-flex align-items-center">
                        <!-- Back Button -->
                        <button type="button" class="btn btn-secondary mr-3" onclick="goBack()">
                            <i class="fa fa-arrow-left"></i>
                        </button>
                        <h4 class="h4 mb-0">Add New Blog</h4>
                    </div>
                </div>

                <!-- Blog Form -->
                <form id="newblogform" method="post" action="<?= base_url() ?>blogs/publishmyblog"
                    enctype="multipart/form-data" class="needs-validation" novalidate>
                    <div class="row">
                        <!-- Left Section -->
                        <div class="col-md-8">
                            <!-- Blog Details -->
                            <div class="pd-20 card-box mb-30">
                                <p class="text-blue">Blog Details</p>
                                <div class="form-group">
                                    <label>Title</label>
                                    <input class="form-control" name="blog-title" type="text"
                                        placeholder="Enter Blog Title" required>
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">This field can't be empty.</div>
                                </div>
                                <div class="form-group">
                                    <label>Blogs Quote</label>
                                    <input class="form-control" name="blog-quote" type="text" placeholder="Enter quote"
                                        required>
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">This field can't be empty.</div>
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" name="blog-description"
                                        placeholder="Enter Blog Description" required></textarea>
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">This field can't be empty.</div>
                                </div>
                                <div class="form-group">
                                    <label>Main Content</label>
                                    <textarea id="editor" name="blog-main-content"></textarea>
                                </div>
                            </div>

                            <!-- Blog Subsections -->
                            <div class="pd-20 card-box mb-30">
                                <p class="text-blue mb-30">Blog Subsections</p>
                                <div id="sections-container">
                                    <div class="form-section" id="section-1">
                                        <div class="form-group">
                                            <label>Section Title</label>
                                            <input class="form-control" type="text" name="section_title[]"
                                                placeholder="Section Title">
                                        </div>
                                        <div class="form-group">
                                            <label>Section Description</label>
                                            <textarea class="form-control" name="section_description[]"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Section Image</label>
                                            <input type="file" class="form-control" name="section_image[]">
                                        </div>
                                    </div>
                                </div>
                                <button type="button" id="add-section-btn" class="btn btn-primary">+ Add
                                    Section</button>
                            </div>

                            <!-- Meta Fields -->
                            <div class="pd-20 card-box mb-30">
                                <p class="text-blue mb-30">Meta Fields</p>
                                <div class="form-group">
                                    <label>Meta Title</label>
                                    <input type="text" class="form-control" name="blog-meta-title"
                                        placeholder="Meta Title" required>
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">This field can't be empty.</div>
                                </div>
                                <div class="form-group">
                                    <label>Meta Description</label>
                                    <textarea class="form-control" name="blog-meta-description"
                                        placeholder="Meta Description" required></textarea>
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">This field can't be empty.</div>
                                </div>
                                <div class="form-group">
                                    <label>Meta URL</label>
                                    <input type="text" class="form-control" name="blog-meta-url" placeholder="Meta URL"
                                        required>
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">This field can't be empty.</div>
                                </div>
                            </div>
                        </div>

                        <!-- Right Section -->
                        <div class="col">
                            <!-- Blog Images -->
                            <div class="pd-20 card-box mb-30">
                                <p class="text-blue mb-30">Blog Images</p>
                                <div class="form-group">
                                    <label>Featured Image</label>
                                    <input type="file" class="form-control" name="blog-main-image" required>
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">This field can't be empty.</div>
                                </div>
                                <div class="form-group">
                                    <label>Mobile Image</label>
                                    <input type="file" class="form-control" name="blog-mobile-image" required>
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">This field can't be empty.</div>
                                </div>
                            </div>

                            <!-- Category & Visibility -->
                            <div class="pd-20 card-box mb-30">
                                <p class="text-blue mb-30">Category and Visibility</p>
                                <div class="form-group">
                                    <label>Category</label>
                                    <select class="form-control" name="blog-category" required>
                                        <option value="">Select Category</option>
                                        <?php foreach ($sheader as $sheaders): ?>
                                            <option value="<?= $sheaders['data_filter']; ?>"><?= $sheaders['label']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">This field can't be empty.</div>
                                </div>
                                <div class="form-group">
                                    <label>Visibility</label>
                                    <select class="form-control" name="blog-visibility" required>
                                        <option value="">Select Visibility</option>
                                        <option value="active">Active</option>
                                        <option value="draft">Draft</option>
                                    </select>
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">This field can't be empty.</div>
                                </div>

                                <div class="form-group">
                                    <label for="publish_date_and_time">Publish Date and Time</label>
                                    <input type="datetime-local" name="publish_date_and_time" id="publish_date_and_time"
                                        class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="end_date_and_time">End Date and Time</label>
                                    <input type="datetime-local" name="end_date_and_time" id="end_date_and_time"
                                        class="form-control">
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

                                <div class="form-group">
                                    <label for="publish_for">Publish For</label>
                                    <select name="publish_for" id="publish_for" class="form-control">
                                        <option value="">Select User</option>
                                        <?php foreach ($users as $user): ?>
                                            <option value="<?= $user['user_id']; ?>"><?= $user['name']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="pd-20 card-box mb-30">
                                <p class="text-blue">Tags</p>
                                <div class="mb-20">
                                    <label>Add Tags</label>
                                    <!-- Dropdown for selecting tags with reduced size -->
                                    <select id="product-tags" name="product-tags[] " multiple="multiple"
                                        class="form-control custom-dropdown">
                                        <?php foreach ($tags as $tag): ?>
                                            <option value="<?= $tag['tag_name']; ?>"><?= $tag['tag_name']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <small id="tag-error" class="text-danger"></small>
                                    <!-- (+) Icon to open the modal -->
                                    <button type="button" class="btn btn-sm btn-primary" id="add-tag-btn"
                                        data-toggle="modal" data-target="#tagModal">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>

                            <!-- Author Details -->
                            <div class="pd-20 card-box mb-30">
                                <p class="text-blue mb-30">Author</p>
                                <div class="form-group">
                                    <label>Author Name</label>
                                    <input type="text" class="form-control" name="blog-author-name"
                                        placeholder="Author Name">
                                </div>
                            </div>

                        </div>

                    </div>

                    <!-- Submit Button -->
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary btn-lg">Publish</button>
                    </div>
                </form>


                <div class="modal fade" id="tagModal" tabindex="-1" role="dialog" aria-labelledby="tagModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="tagModalLabel">Add New Tag</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="tag-form">
                                    <div class="form-group">
                                        <label for="tag_name">Tag Name</label>
                                        <input type="text" id="tag_name" class="form-control" placeholder="Enter tag name">
                                    </div>
                                    <small id="tag-modal-error" class="text-danger"></small>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" id="save-tag-btn" class="btn btn-primary">Save Tag</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Page Main Content End -->


    <!-- Footer View Start -->
    <?= $this->include('footer_view') ?>
    <!-- Footer View End -->

    <!-- Include Select2 CSS and JS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const form = document.getElementById("newblogform");
            const inputs = form.querySelectorAll(
                "input:not([type='hidden']):not([type='button']):not([type='submit']):not([disabled]), textarea:not([disabled]), select:not([disabled])"
            );

            // Log all inputs for debugging
            console.log(
                "Inputs found:",
                Array.from(inputs).map((input) => input.name || input.id)
            );

            inputs.forEach((input, index) => {
                input.addEventListener("keydown", function(e) {
                    if (e.key === "Enter") {
                        if (input.tagName.toLowerCase() === "textarea") {
                            // For textarea, add a new line instead of moving to the next field
                            e.preventDefault();
                            const cursorPosition = this.selectionStart;
                            const textBefore = this.value.substring(0, cursorPosition);
                            const textAfter = this.value.substring(cursorPosition);
                            this.value = textBefore + "\n" + textAfter;
                            this.selectionStart = this.selectionEnd = cursorPosition + 1;
                        } else {
                            // For other inputs, move to the next field
                            e.preventDefault();
                            let nextInput = inputs[index + 1];
                            while (nextInput && (nextInput.disabled || nextInput.hidden)) {
                                index++;
                                nextInput = inputs[index + 1];
                            }

                            if (nextInput) {
                                console.log(`Moving to next input: ${nextInput.name || nextInput.id}`);
                                nextInput.focus();
                            } else {
                                console.log("No more inputs to navigate to.");
                            }
                        }
                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            // Initialize Select2 for tags
            $('#product-tags').select2({
                placeholder: 'Select Tags',
                allowClear: true
            });

            // Handle saving new tags
            $('#save-tag-btn').on('click', function(e) {
                e.preventDefault();
                const tagName = $('#tag_name').val().trim();

                if (tagName) {
                    $.ajax({
                        url: '<?= base_url('Tags/save') ?>',
                        type: 'POST',
                        data: {
                            tag_name: tagName
                        },
                        success: function(response) {
                            if (response.success) {
                                // Add new tag to the dropdown
                                const newOption = new Option(tagName, tagName, false, true);
                                $('#product-tags').append(newOption).trigger('change');
                                $('#tag_name').val('');
                                $('#tagModal').modal('hide');
                            } else {
                                $('#tag-modal-error').text(response.message);
                            }
                        },
                        error: function() {
                            $('#tag-modal-error').text('An error occurred. Please try again.');
                        }
                    });
                } else {
                    $('#tag-modal-error').text('Tag name cannot be empty.');
                }
            });
        });
    </script>

    <script>
        let sectionCount = 1;

        // Function to add a new section
        document.getElementById('add-section-btn').addEventListener('click', function() {
            sectionCount++;
            const sectionsContainer = document.getElementById('sections-container');

            // Create a new section card
            const newSection = document.createElement('div');
            newSection.classList.add('form-section', 'card', 'mb-3', 'p-3');
            newSection.id = `section-${sectionCount}`;

            // Close button for the section
            newSection.innerHTML = `
            <button type="button" onclick="removeSection(${sectionCount})" 
                    style="position: absolute; top: 10px; right: 10px; border: none; background: transparent; cursor: pointer;">
                <i class="fa fa-times-circle" style="color: #ff0000;"></i>
            </button>
            <div class="form-group">
                <label>Title</label>
                <input class="form-control" type="text" name="section_title[]" placeholder="Title">
                <p class="error-message" style="color: black; font-size: 12px; display: none;"></p>
            </div>
            <div class="form-group">
                <label>Description</label>
                <div id="editor-${sectionCount}" class="quill-editor"></div>
                <input type="hidden" name="section_description[]"/>
                <p class="error-message" style="color: black; font-size: 12px; display: none;"></p>
            </div>
          <div class="form-group" style="border: 2px solid #ccc; padding: 15px; border-radius: 8px;">
    <label>Section Image</label>
    <input type="file" class="form-control-file" name="section_image[]" onchange="previewSectionImage(event, ${sectionCount})">
    <p class="error-message" style="color: black; font-size: 12px;">Formats: JPG, PNG, JPEG, WEBP, Recommended Size: 720x560px.</p>
    <div id="image-preview-container-${sectionCount}" style="position: relative; display: none;">
        <img id="image-preview-${sectionCount}" src="#" alt="Image Preview" style="width: 100%; max-width: 500px;">
        <button type="button" onclick="removeSectionImage(${sectionCount})" 
                style="position: absolute; top: 5px; right: 5px; border: none; background: transparent; cursor: pointer;">
            <i class="fa fa-times-circle" style="color: #ffffff;"></i>
        </button>
    </div>
            </div>`;

            // Append new section
            sectionsContainer.appendChild(newSection);

            // Initialize Quill editor for the new section
            new Quill(`#editor-${sectionCount}`, {
                theme: 'snow'
            });
        });

        // Function to remove a section
        function removeSection(sectionId) {
            const sectionToRemove = document.getElementById(`section-${sectionId}`);
            if (sectionToRemove) {
                sectionToRemove.remove();
            }
        }
    </script>



    <script>
        function goBack() {
            // Redirects to the previous page in browser history
            window.history.back();
        }
    </script>


    </html>