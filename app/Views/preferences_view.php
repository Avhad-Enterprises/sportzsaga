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

                <div class="container d-flex justify-content-center align-items-center">
                    <div class="pd-10 card-box mb-30" style="width: 100%;">
                        <div class="d-flex justify-content-center flex-column">
                            <div class="row">
                                <!-- Sidebar with buttons -->
                                <div class="col-md-2 col-sm-12">
                                    <div class=" mb-30">
                                        <div class="d-flex flex-column">
                                            <button type="button" class="btn btn-outline-secondary custom-btn mb-1 fw-bold" id="btn1">Tecnical SEO</button>
                                            <button type="button" class="btn btn-outline-secondary custom-btn mb-1 fw-bold" id="btn2">Logo and Favicon</button>
                                            <button type="button" class="btn btn-outline-secondary custom-btn mb-1 fw-bold" id="btn3">Robots.txt</button>
                                            <button type="button" class="btn btn-outline-secondary custom-btn mb-1 fw-bold" id="btn4">Google Analytics</button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Content Area -->
                                <div class="col-md-10 col-sm-12" id="contentArea">
                                    <div class="p-2 mb-30">

                                        <div class="content" id="content1">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="title">
                                                        <h4>Meta Title's</h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="">
                                                <div class="pd-20">
                                                </div>
                                                <div class="pb-20">
                                                    <table class="table hover table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>Page Name</th>
                                                                <th>Meta Title</th>
                                                                <th>Meta Description</th>
                                                                <th>Last Updated</th>
                                                                <th>Updated By</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach ($meta as $item): ?>
                                                                <tr>
                                                                    <td><?= !empty($item['page_name']) ? $item['page_name'] : '-' ?></td>
                                                                    <td>
                                                                        <?= !empty($item['meta_title']) ? '<a href="' . base_url() . 'setting/site-meta/edit/' . $item['id'] . '">' . substr($item['meta_title'], 0, 50) . (strlen($item['meta_title']) > 50 ? '...' : '') . '</a>' : '-' ?>
                                                                    </td>
                                                                    <td><?= !empty($item['meta_description']) ? substr($item['meta_description'], 0, 50) . (strlen($item['meta_description']) > 50 ? '...' : '') : '-' ?></td>
                                                                    <td>
                                                                        <?= !empty($item['updated_at']) ? date('F j, Y, g:i A', strtotime($item['updated_at'])) : '-' ?>
                                                                    </td>
                                                                    <td><?= !empty($item['updated_by']) ? $item['updated_by'] : '-' ?></td>
                                                                </tr>
                                                            <?php endforeach; ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="content" id="content2" style="display:none; padding: 20px;">
                                            <h4>Upload Logos and Favicon</h4>
                                            <div class="row">
                                                <div class="col-md-4 text-center">
                                                    <div class="BoxBorder" style="margin: 10px;">
                                                        <?php if (isset($logos['navbar_logo_mobile'])): ?>
                                                            <img src="<?= $logos['navbar_logo_mobile']; ?>" alt="Navbar Mobile Logo">
                                                        <?php endif; ?>
                                                    </div>
                                                    <p>Navbar Mobile Logo</p>
                                                </div>
                                                <div class="col-md-4 text-center">
                                                    <div class="BoxBorder BoxBorderFavicon" style="margin: 10px;">
                                                        <?php if (isset($logos['favicon'])): ?>
                                                            <img src="<?= $logos['favicon']; ?>" alt="Favicon">
                                                        <?php endif; ?>
                                                    </div>
                                                    <p>Favicon</p>
                                                </div>
                                                <div class="col-md-4 text-center">
                                                    <div class="BoxBorder" style="margin: 10px;">
                                                        <?php if (isset($logos['footer_logo'])): ?>
                                                            <img src="<?= $logos['footer_logo']; ?>" alt="Footer Logo">
                                                        <?php endif; ?>
                                                    </div>
                                                    <p>Footer Logo</p>
                                                </div>
                                                <div class="col-md-4 text-center">
                                                    <div class="BoxBorder" style="margin: 10px;">
                                                        <?php if (isset($logos['navbar_logo'])): ?>
                                                            <img src="<?= $logos['navbar_logo']; ?>" alt="Navbar Logo">
                                                        <?php endif; ?>
                                                    </div>
                                                    <p>Navbar Logo</p>
                                                </div>
                                            </div>
                                            <div style="margin-top: 10px;">
                                                <a href="<?= base_url('setting/upload-logo') ?>"><button type="button" class="btn btn-outline-secondary">Edit</button></a>
                                            </div>
                                        </div>


                                        <div class="content" id="content3" style="display:none;">
                                            <h4 class="mb-30">Robots.txt</h4>

                                            <?php if (session()->getFlashdata('success')): ?>
                                                <div class="alert alert-success">
                                                    <?= session()->getFlashdata('success') ?>
                                                </div>
                                            <?php endif; ?>

                                            <form action="<?= base_url('setting/robots-txt/update') ?>" method="post">
                                                <div class="form-group">
                                                    <label for="robots_content">Edit robots.txt File:</label>
                                                    <textarea id="robotsContent" name="robots_content" class="form-control" rows="20" cols="80" readonly><?= isset($robots_content['content']) && $robots_content['content'] !== '' ? esc($robots_content['content']) : '-' ?></textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <button type="button" id="editButton" class="btn btn-secondary">Edit</button>
                                                    <button type="submit" class="btn btn-primary btn-lg" disabled id="submitButton">Submit</button>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="content" id="content4" style="display:none; padding: 20px;">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="title">
                                                        <h4>Google Analytics </h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="">
                                                <div class="pd-20">
                                                </div>
                                                <div class="pb-20">
                                                    <table class="table hover table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>Google Analytics ID</th>
                                                                <th>Last Updated</th>
                                                                <th>Updated By</th>
                                                                <th>Edit</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php if (!empty($analytics)): ?>
                                                                <?php foreach ($analytics as $analytic): ?>
                                                                    <tr>
                                                                        <td>
                                                                            <div class="edit-field" data-id="<?= $analytic['id'] ?>">
                                                                                <span class="display-mode">
                                                                                    <?= !empty($analytic['google_analytics_id']) ? substr($analytic['google_analytics_id'], 0, 50) . (strlen($analytic['google_analytics_id']) > 50 ? '...' : '') : '-' ?>

                                                                                </span>
                                                                                <span class="edit-mode" style="display: none;">
                                                                                    <input type="text" class="form-control" name="google_analytics_id" value="<?= $analytic['google_analytics_id'] ?>" />
                                                                                    <button class="btn btn-primary save-btn" data-id="<?= $analytic['id'] ?>">Save</button>
                                                                                    <button class="btn btn-secondary cancel-btn" data-id="<?= $analytic['id'] ?>">Cancel</button>
                                                                                </span>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <?= !empty($analytic['updated_at']) ? date('F j, Y, g:i a', strtotime($analytic['updated_at'])) : '-' ?>
                                                                        </td>
                                                                        <td><?= !empty($analytic['updated_by']) ? $analytic['updated_by'] : '-' ?></td>
                                                                        <td><a href="javascript:void(0);" class="edit-btn" data-id="<?= $analytic['id'] ?>">Edit</a></td>
                                                                    </tr>
                                                                <?php endforeach; ?>
                                                            <?php else: ?>
                                                                <tr>
                                                                    <td colspan="3">No data available</td>
                                                                </tr>
                                                            <?php endif; ?>
                                                        </tbody>
                                                    </table>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

                            <!-- ClipboardJS -->
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>

                            <script>
                                $(document).ready(function() {

                                    $('.custom-btn').click(function() {

                                        $('.custom-btn').removeClass('btn-secondary').addClass('btn-outline-secondary');

                                        $(this).removeClass('btn-outline-secondary').addClass('btn-secondary');

                                        $('.content').hide();
                                        $('#content' + this.id.slice(-1)).show();
                                    });

                                    $('#btn1').click();
                                });
                            </script>

                            <script>
                                document.addEventListener("DOMContentLoaded", function() {
                                    // Toggle edit mode
                                    document.querySelectorAll(".edit-btn").forEach((button) => {
                                        button.addEventListener("click", function() {
                                            const id = this.dataset.id;
                                            const fieldContainer = document.querySelector(`.edit-field[data-id="${id}"]`);
                                            fieldContainer.querySelector(".display-mode").style.display = "none";
                                            fieldContainer.querySelector(".edit-mode").style.display = "inline-block";
                                        });
                                    });

                                    // Cancel edit mode
                                    document.querySelectorAll(".cancel-btn").forEach((button) => {
                                        button.addEventListener("click", function() {
                                            const id = this.dataset.id;
                                            const fieldContainer = document.querySelector(`.edit-field[data-id="${id}"]`);
                                            fieldContainer.querySelector(".display-mode").style.display = "inline-block";
                                            fieldContainer.querySelector(".edit-mode").style.display = "none";
                                        });
                                    });

                                    // Save edited data
                                    document.querySelectorAll(".save-btn").forEach((button) => {
                                        button.addEventListener("click", function() {
                                            const id = this.dataset.id;
                                            const fieldContainer = document.querySelector(`.edit-field[data-id="${id}"]`);
                                            const googleAnalyticsId = fieldContainer.querySelector('input[name="google_analytics_id"]').value;

                                            fetch(`preferences/g-tag/update/${id}`, {
                                                    method: "POST",
                                                    headers: {
                                                        "Content-Type": "application/json",
                                                    },
                                                    body: JSON.stringify({
                                                        google_analytics_id: googleAnalyticsId
                                                    }),
                                                })
                                                .then((response) => response.json())
                                                .then((data) => {
                                                    if (data.success) {
                                                        // Update the display
                                                        fieldContainer.querySelector(".display-mode").innerHTML = `
                                                            ${googleAnalyticsId} <a href="javascript:void(0);" class="edit-btn" data-id="${id}">Edit</a>
                                                        `;
                                                        fieldContainer.querySelector(".display-mode").style.display = "inline-block";
                                                        fieldContainer.querySelector(".edit-mode").style.display = "none";
                                                        alert("Google Analytics ID updated successfully!");
                                                    } else {
                                                        alert("Failed to update. Please try again.");
                                                    }
                                                })
                                                .catch((error) => console.error("Error:", error));
                                        });
                                    });
                                });
                            </script>
                            <script>
                                document.addEventListener("DOMContentLoaded", function() {
                                    const editButton = document.getElementById("editButton");
                                    const submitButton = document.getElementById("submitButton");
                                    const robotsContent = document.getElementById("robotsContent");

                                    editButton.addEventListener("click", function() {
                                        robotsContent.removeAttribute("readonly"); // Enable textarea
                                        submitButton.removeAttribute("disabled"); // Enable submit button
                                        editButton.setAttribute("disabled", "true"); // Disable edit button
                                    });
                                });
                            </script>
                            <script>
                                document.addEventListener("DOMContentLoaded", function() {
                                    const editFooterButton = document.getElementById("editFooterButton");
                                    const submitFooterButton = document.getElementById("submitFooterButton");
                                    const footerContent = document.getElementById("footerContent");

                                    editFooterButton.addEventListener("click", function() {
                                        footerContent.removeAttribute("readonly"); // Enable textarea
                                        submitFooterButton.removeAttribute("disabled"); // Enable submit button
                                        editFooterButton.setAttribute("disabled", "true"); // Disable edit button
                                    });
                                });
                            </script>

                            <script>
                                // Load ClipboardJS
                                new ClipboardJS('.copy-btn');

                                $(document).ready(function() {
                                    // When a referral link is copied, show the toast notification and change button text
                                    $(".copy-btn").on("click", function() {
                                        // Change button text to "Copied"
                                        const button = $(this);
                                        const originalText = button.text().trim();

                                        // Show success toast
                                        showToast("Referral link copied to clipboard!", "success");
                                    });
                                });
                            </script>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Footer View Start -->
    <?= $this->include('footer_view') ?>
    <!-- Footer View End -->
</body>

</html>