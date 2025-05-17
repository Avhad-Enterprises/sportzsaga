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
                <a href="<?= base_url('analytics/reports') ?>"><i class="fa-solid fa-arrow-left"></i></a>
            </div>

            <div class="card-box mb-30">
                <div class="pd-20">
                    <h4 class="text-blue h4"></h4>
                </div>
                <div class="pb-20">
                    <table class="table hover table-hover">
                        <thead>
                            <tr>
                                <th class="table-plus">ID</th>
                                <th>Report</th>
                                <th>Section</th>
                                <th>Attributes</th>
                                <th>Filters</th>
                                <th>Created</th>
                                <th>Created By</th>
                                <th>Updated</th>
                                <th>Updated By</th>
                                <th>Deleted By</th>
                                <th>Deleted At</th>
                                <th>Deleted</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($logs as $log) : ?>
                                <tr>
                                    <td class="table-plus"><?= $log['id'] ?></td>
                                    <td><?= $log['report_name'] ?></td>
                                    <td><?= $log['table_name'] ?></td>
                                    <td>
                                        <?php
                                        $columns = json_decode($log['columns'], true);
                                        if ($columns && is_array($columns)) {
                                            foreach ($columns as $key => $value) {
                                                echo "<strong>" . ucfirst($key) . ":</strong> " . htmlspecialchars($value) . "<br>";
                                            }
                                        } else {
                                            echo "Invalid JSON data.";
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        $filters = json_decode($log['filters'], true);
                                        if ($filters && is_array($filters)) {
                                            foreach ($filters as $key => $value) {
                                                echo "<strong>" . ucfirst(str_replace('_', ' ', $key)) . ":</strong> ";
                                                if (is_array($value)) {
                                                    echo implode(", ", $value);
                                                } else {
                                                    echo htmlspecialchars($value);
                                                }
                                                echo "<br>";
                                            }
                                        } else {
                                            echo "Invalid JSON data.";
                                        }
                                        ?>
                                    </td>
                                    <td><?= date('F j, Y, g:i a', strtotime($log['created_at'])) ?></td>
                                    <td>
                                        <?= $log['created_by'] == 0 ? '-' : esc($log['created_by_name']) ?>
                                    </td>
                                    <td><?= date('F j, Y, g:i a', strtotime($log['updated_at'])) ?></td>
                                    <td>
                                        <?= $log['updated_by'] == 0 ? '-' : esc($log['updated_by_name']) ?>
                                    </td>
                                    <td>
                                        <?= $log['deleted_by'] == 0 ? '-' : esc($log['deleted_by_name']) ?>
                                    <td><?= $log['deleted_at'] ? date('F j, Y, g:i a', strtotime($log['deleted_at'])) : '-' ?></td>
                                    <td>
                                        <?php if ($log['is_deleted'] == 1) : ?>
                                            <span class="badge badge-danger">Deleted</span>
                                        <?php else : ?>
                                            <span class="badge badge-success">Active</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <a class="dropdown-item" href="javascript:void(0);" onclick="confirmbGReportRestore(<?= $log['id'] ?>)"><i class="bi bi-recycle" style="font-size: 20px;"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>


                </div>
            </div>

        </div>
    </div>

    <!-- Footer View Start -->
    <?= $this->include('footer_view') ?>
    <!-- Footer View End -->

</body>