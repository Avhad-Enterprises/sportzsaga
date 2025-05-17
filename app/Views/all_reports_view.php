<!-- Head View Start -->
<?= $this->include('head_view') ?>
<!-- Head View End -->

<body class="dashboard-container">

    <!-- Header View Start -->
    <?= $this->include('header_view') ?>
    <!-- Header View End -->

    <!-- Left View Start -->
    <?= $this->include('left_view') ?>
    <!-- Left View Start -->

    <div class="mobile-menu-overlay"></div>

    <div class="main-container">
        <div class="xs-pd-20-10 pd-ltr-20">
            <div class="title pb-20 d-flex justify-content-between align-items-center">
                <h2 class="h3 mb-0">Reports</h2>
                <div class="d-flex align-items-center">
                    <a href="<?= base_url('analytics/generate_reports') ?>" class="btn btn-primary mb-3">Create</a>
                    <a href="<?= base_url('analytics/generate_reports/logs') ?>" class="btn btn-success mx-2 mb-3">Logs</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="pd-20 card-box mb-30">
                        <h4 class="mb-30">Saved Reports</h4>
                        <ul>
                            <?php foreach ($reports as $report) : ?>
                                <li class="SavedReportsLists d-flex justify-content-between align-items-center">
                                    <a href="<?= base_url('analytics/generate_reports/' . $report['id']) ?>" class="SavedReports">
                                        <?= esc($report['report_name']) ?>
                                    </a>
                                    <!-- Initially hidden delete icon -->
                                    <a href="javascript:void(0);" onclick="confirmbReportsDelete(<?= $report['id'] ?>)" class="delete-icon" style="display:none;">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer View Start -->
    <?= $this->include('footer_view') ?>
    <!-- Footer View End -->

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Select all the list items with the class 'SavedReportsLists'
            const reportItems = document.querySelectorAll('.SavedReportsLists');

            // Loop through each list item and add event listeners
            reportItems.forEach(function(item) {
                item.addEventListener('mouseenter', function() {
                    // Show the delete icon on hover
                    const deleteIcon = item.querySelector('.delete-icon');
                    if (deleteIcon) {
                        deleteIcon.style.display = 'inline'; // Show the delete icon
                    }
                });

                item.addEventListener('mouseleave', function() {
                    // Hide the delete icon when hover is removed
                    const deleteIcon = item.querySelector('.delete-icon');
                    if (deleteIcon) {
                        deleteIcon.style.display = 'none'; // Hide the delete icon
                    }
                });
            });
        });
    </script>

    <style>
        .delete-icon {
            display: none;
            /* Initially hide */
            transition: opacity 0.1s ease;
            /* Optional: smooth fade effect */
        }
    </style>

</body>