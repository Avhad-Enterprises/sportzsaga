<!-- Head View Start -->
<?= $this->include('head_view') ?>
<!-- Head View End -->

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<style>
    .filter-container {
        margin-bottom: 20px;
        padding: 10px;
    }

    .card-box {
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    .pd-20 {
        padding: 20px;
    }

    .mb-30 {
        margin-bottom: 30px;
    }

    .text-blue {
        color: #007bff;
    }

    table td:nth-child(3) {
        max-width: 200px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .form-row .col-md-2 {
        padding: 0 10px;
    }

    .form-control {
        width: 100%;
    }
</style>

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
                <div class="d-flex align-items-center">
                    <a href="<?= base_url('referral_link') ?>" class="mx-3"><i class="fa-solid fa-arrow-left"></i></a>
                    <h2 class="h3 mb-0">Overview</h2>
                </div>
                <div>
                    <div class="visitor-count-container d-flex justify-content-end mb-3">
                        <h5 id="visitorCount" class="text-muted">Total: 0</h5>
                    </div>
                </div>
            </div>

            <div class="FullChartView">
                <div>
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="text-blue">Referral Link Analytics <small>(Last 30 Days)</small></h4>
                        <div class="ChartFilterbtn">
                            <button id="toggleReferralFilters"><i class="fa-solid fa-table-columns"></i></button>
                        </div>
                    </div>

                    <!-- Filters for Referral Link Analytics -->
                    <div class="filter-container mb-3" id="referralFilterContainer" style="display: none;">
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="dateRange">Date Range</label>
                                <select id="referralDateRange" class="form-control">
                                    <option value="custom">Custom</option>
                                    <option value="last30days" selected>Last 30 Days</option>
                                    <option value="lastMonth">Last Month</option>
                                    <option value="last6months">Last 6 Months</option>
                                    <option value="thisYear">This Year</option>
                                    <option value="lastYear">Last Year</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label for="startDate">Start Date</label>
                                <input type="date" id="referralStartDate" class="form-control">
                            </div>
                            <div class="col-md-2">
                                <label for="endDate">End Date</label>
                                <input type="date" id="referralEndDate" class="form-control">
                            </div>
                            <div class="col-md-2">
                                <label for="platform">Platform</label>
                                <select id="referralPlatform" class="form-control">
                                    <option value="all">All Platforms</option>
                                    <?php foreach ($platforms as $platform): ?>
                                        <option value="<?= esc($platform['platform']) ?>"><?= esc($platform['platform']) ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label for="referrer">Original Referrer</label>
                                <select id="referralReferrer" class="form-control">
                                    <option value="all">All Referrers</option>
                                    <?php foreach ($referrers as $referrer): ?>
                                        <option value="<?= esc($referrer['original_referrer']) ?>"><?= esc($referrer['original_referrer']) ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label for="sourceMatching">Source Matching</label>
                                <select id="referralSourceMatching" class="form-control">
                                    <option value="all">All</option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label for="resetFilters"></label>
                                <button id="resetReferralFilters" class="btn btn-secondary mt-4">Reset</button>
                            </div>
                        </div>
                    </div>

                    <!-- Chart for Referral Link Analytics -->
                    <canvas id="referralLinkChart"></canvas>
                </div>
            </div>

            <div class="card-box mb-30">
                <div class="pd-20 d-flex justify-content-between align-items-center">
                    <h4 class="text-blue h4">Referral Links Analytics</h4>
                    <div class="d-flex align-items-center">
                        <div class="visitor-count-container d-flex justify-content-end mb-3 mt-3 m-3">
                            <h5 id="referralVisitorCount" class="text-muted">Total: 0</h5>
                        </div>
                        <div class="ChartFilterbtn">
                            <button id="toggleReferralTableFilters"><i class="fa-solid fa-filter"></i></button>
                        </div>
                        <div class="ExportBtnAna">
                            <a href="javascript:void(0);" id="toggleReferralExportFilters">
                                <i class="fa-solid fa-arrow-up-from-bracket"></i> Export
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Filters for Referral Links -->
                <div class="filter-container mb-3 p-3" id="referralTableFilterContainer" style="display: none;">
                    <div class="form-row">
                        <div class="col-md-2">
                            <label for="referralTableDateRange">Date Range</label>
                            <select id="referralTableDateRange" class="form-control">
                                <option value="custom">Custom</option>
                                <option value="last30days" selected>Last 30 Days</option>
                                <option value="lastMonth">Last Month</option>
                                <option value="last6months">Last 6 Months</option>
                                <option value="thisYear">This Year</option>
                                <option value="lastYear">Last Year</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="referralTableStartDate">Start Date</label>
                            <input type="date" id="referralTableStartDate" class="form-control">
                        </div>
                        <div class="col-md-2">
                            <label for="referralTableEndDate">End Date</label>
                            <input type="date" id="referralTableEndDate" class="form-control">
                        </div>
                        <div class="col-md-2">
                            <label for="referralTablePlatform">Platform</label>
                            <select id="referralTablePlatform" class="form-control">
                                <option value="all">All Platforms</option>
                                <?php foreach ($platforms as $platform): ?>
                                    <option value="<?= esc($platform['platform']) ?>"><?= esc($platform['platform']) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="referralTableReferrer">Referrer</label>
                            <select id="referralTableReferrer" class="form-control">
                                <option value="all">All Referrers</option>
                                <?php foreach ($referrers as $ref): ?>
                                    <option value="<?= esc($ref['original_referrer']) ?>"><?= esc($ref['original_referrer']) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-2 mt-3">
                            <label for="referralTableSourceMatch">Source Match</label>
                            <select id="referralTableSourceMatch" class="form-control">
                                <option value="all">All</option>
                                <?php foreach ($is_source_matching as $match): ?>
                                    <option value="<?= esc($match['is_source_matching']) ?>"><?= esc($match['is_source_matching'] ? 'Yes' : 'No') ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-2 mt-4">
                            <button id="resetReferralTableFilters" class="btn btn-secondary mt-4">Reset</button>
                        </div>
                    </div>
                </div>

                <!-- Table for Referral Links -->
                <div class="pb-20">
                    <table id="referral-visitor-table" class="table display">
                        <thead>
                            <tr>
                                <th class="table-plus">ID</th>
                                <th>Platform</th>
                                <th>Referrer</th>
                                <th>Source Match</th>
                                <th>Date and Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($referralClicksData as $click): ?>
                                <tr>
                                    <td><?= esc($click['id']) ?></td>
                                    <td><?= esc($click['platform']) ?></td>
                                    <td><?= strlen($click['original_referrer']) > 50 ? substr($click['original_referrer'], 0, 50) . '...' : esc($click['original_referrer']) ?></td>
                                    <td><?= esc($click['is_source_matching'] ? 'Yes' : 'No') ?></td>
                                    <td><?= date('d M Y, H:i', strtotime($click['created_at'])) ?></td>
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

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const toggleFiltersButton = document.getElementById("toggleReferralFilters");
        const filterContainer = document.getElementById("referralFilterContainer");

        // Initially hide the filter container (you already have 'display: none' in the HTML)
        filterContainer.style.display = "none";

        // Add event listener to toggle the filters
        toggleFiltersButton.addEventListener("click", function() {
            if (filterContainer.style.display === "none") {
                filterContainer.style.display = "block"; // Show filters
            } else {
                filterContainer.style.display = "none"; // Hide filters
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        // Fetch raw referral clicks data from the controller
        const rawReferralData = <?= json_encode($referralClicksData) ?>;
        let referralChart;

        // Function to calculate date ranges
        function getDateRange(range) {
            const today = new Date();
            let startDate, endDate = new Date(today);

            switch (range) {
                case 'last30days':
                    startDate = new Date(today.setDate(today.getDate() - 30));
                    break;
                case 'lastMonth':
                    startDate = new Date(today.getFullYear(), today.getMonth() - 1, 1);
                    endDate = new Date(today.getFullYear(), today.getMonth(), 0);
                    break;
                case 'last6months':
                    startDate = new Date(today.setMonth(today.getMonth() - 6));
                    break;
                case 'thisYear':
                    startDate = new Date(today.getFullYear(), 0, 1);
                    break;
                case 'lastYear':
                    startDate = new Date(today.getFullYear() - 1, 0, 1);
                    endDate = new Date(today.getFullYear() - 1, 11, 31);
                    break;
                default:
                    startDate = null;
                    endDate = null;
                    break;
            }
            return {
                start: startDate ? startDate.toISOString().split('T')[0] : '',
                end: endDate ? endDate.toISOString().split('T')[0] : ''
            };
        }

        // Function to filter referral data based on selected filters
        function filterReferralData(data) {
            const dateRange = $('#referralDateRange').val();
            let startDate = $('#referralStartDate').val();
            let endDate = $('#referralEndDate').val();
            const platform = $('#referralPlatform').val();
            const referrer = $('#referralReferrer').val();
            const sourceMatching = $('#referralSourceMatching').val();

            if (dateRange !== 'custom') {
                const range = getDateRange(dateRange);
                startDate = range.start;
                endDate = range.end;
                $('#referralStartDate').val(startDate);
                $('#referralEndDate').val(endDate);
            }

            let filteredData = [...data];

            if (startDate) {
                filteredData = filteredData.filter(d => new Date(d.created_at) >= new Date(startDate));
            }
            if (endDate) {
                filteredData = filteredData.filter(d => new Date(d.created_at) <= new Date(endDate));
            }
            if (platform !== 'all') {
                filteredData = filteredData.filter(d => d.platform === platform);
            }
            if (referrer !== 'all') {
                filteredData = filteredData.filter(d => d.original_referrer === referrer);
            }
            if (sourceMatching !== 'all') {
                filteredData = filteredData.filter(d => d.is_source_matching === sourceMatching);
            }

            return filteredData;
        }

        // Function to aggregate filtered data
        function aggregateReferralData(filteredData) {
            const trends = {};
            filteredData.forEach(d => {
                const date = new Date(d.created_at).toISOString().split('T')[0];
                if (!trends[date]) {
                    trends[date] = {
                        visit_date: date,
                        total_clicks: 0,
                        source_matching_yes: 0,
                        source_matching_no: 0
                    };
                }
                trends[date].total_clicks++;
                if (d.is_source_matching === 'yes') trends[date].source_matching_yes++;
                if (d.is_source_matching === 'no') trends[date].source_matching_no++;
            });
            return Object.values(trends).sort((a, b) => new Date(a.visit_date) - new Date(b.visit_date));
        }

        // Function to get datasets for the chart
        function getReferralChartData(aggregatedTrends) {
            const labels = aggregatedTrends.map(data => data.visit_date);
            const datasets = [{
                    label: 'Total Clicks',
                    data: aggregatedTrends.map(d => d.total_clicks),
                    borderColor: '#36A2EB',
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    fill: true,
                    tension: 0.3
                },
                {
                    label: 'Source Matching (Yes)',
                    data: aggregatedTrends.map(d => d.source_matching_yes),
                    borderColor: '#FF5733',
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    fill: false,
                    tension: 0.3
                },
                {
                    label: 'Source Matching (No)',
                    data: aggregatedTrends.map(d => d.source_matching_no),
                    borderColor: '#FFBD33',
                    backgroundColor: 'rgba(255, 159, 64, 0.2)',
                    fill: false,
                    tension: 0.3
                }
            ];

            return {
                labels,
                datasets
            };
        }

        // Function to update the chart
        function updateReferralLinkChart() {
            const filteredData = filterReferralData(rawReferralData);
            const aggregatedData = aggregateReferralData(filteredData);
            const chartData = getReferralChartData(aggregatedData);

            // Update the chart data
            if (referralChart) {
                referralChart.data = chartData;
                referralChart.update();
            } else {
                const referralChartCtx = $('#referralLinkChart')[0].getContext('2d');
                referralChart = new Chart(referralChartCtx, {
                    type: 'line',
                    data: chartData,
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                display: true,
                                position: 'top'
                            }
                        },
                        scales: {
                            x: {
                                title: {
                                    display: true,
                                    text: 'Dates'
                                }
                            },
                            y: {
                                title: {
                                    display: true,
                                    text: 'Number of Clicks'
                                },
                                beginAtZero: true
                            }
                        }
                    }
                });
            }

            // Update the total visitor count
            const totalClicks = aggregatedData.reduce((acc, data) => acc + data.total_clicks, 0);
            $('#visitorCount').text(totalClicks);
        }

        // Reset filters
        function resetReferralFilters() {
            $('#referralDateRange').val('custom');
            $('#referralStartDate').val('');
            $('#referralStartDate').prop('disabled', false);
            $('#referralEndDate').val('');
            $('#referralEndDate').prop('disabled', false);
            $('#referralPlatform').val('all');
            $('#referralReferrer').val('all');
            $('#referralSourceMatching').val('all');
            updateReferralLinkChart();
        }

        // Event listeners for filters
        $('#referralDateRange').change(function() {
            const range = $(this).val();
            const startDateInput = $('#referralStartDate');
            const endDateInput = $('#referralEndDate');
            if (range === 'custom') {
                startDateInput.prop('disabled', false);
                endDateInput.prop('disabled', false);
                startDateInput.val('');
                endDateInput.val('');
            } else {
                startDateInput.prop('disabled', true);
                endDateInput.prop('disabled', true);
                updateReferralLinkChart();
            }
        });

        // Event listeners for other filters
        $('#referralStartDate').change(updateReferralLinkChart);
        $('#referralEndDate').change(updateReferralLinkChart);
        $('#referralPlatform').change(updateReferralLinkChart);
        $('#referralReferrer').change(updateReferralLinkChart);
        $('#referralSourceMatching').change(updateReferralLinkChart);
        $('#resetReferralFilters').click(resetReferralFilters);

        // Initial chart render
        if (rawReferralData.length > 0) {
            updateReferralLinkChart();
        } else {
            console.error("No referral data available on load.");
        }
    });
</script>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        // Initialize DataTable for Referral Links
        const referralTable = $('#referral-visitor-table').DataTable({
            paging: true,
            searching: true,
            pageLength: 20,
            lengthMenu: [10, 20, 30, 50],
            order: [
                [4, 'desc']
            ] // Sort by date (column index 4)
        });

        // Function to update the total results count
        function updateResultsCount() {
            const resultCount = referralTable.rows({
                filter: 'applied'
            }).count();
            $('#referralVisitorCount').text(`Total: ${resultCount}`);
        }

        // Toggle filter visibility for Referral Links Table
        $('#toggleReferralTableFilters').on('click', function() {
            const filterContainer = $('#referralTableFilterContainer');
            if (filterContainer.is(':hidden')) {
                filterContainer.slideDown();
                $(this).find('i').removeClass('fa-filter').addClass('fa-times');
            } else {
                filterContainer.slideUp();
                $(this).find('i').removeClass('fa-times').addClass('fa-filter');
            }
        });

        // Function to calculate date ranges
        function getDateRange(range) {
            const today = new Date();
            let startDate, endDate = new Date(today);

            switch (range) {
                case 'last30days':
                    startDate = new Date(today.setDate(today.getDate() - 30));
                    endDate = new Date();
                    break;
                case 'lastMonth':
                    startDate = new Date(today.getFullYear(), today.getMonth() - 1, 1);
                    endDate = new Date(today.getFullYear(), today.getMonth(), 0);
                    break;
                case 'last6months':
                    startDate = new Date(today);
                    startDate.setMonth(today.getMonth() - 6);
                    break;
                case 'thisYear':
                    startDate = new Date(today.getFullYear(), 0, 1);
                    break;
                case 'lastYear':
                    startDate = new Date(today.getFullYear() - 1, 0, 1);
                    endDate = new Date(today.getFullYear() - 1, 11, 31);
                    break;
                default:
                    startDate = null;
                    endDate = null;
                    break;
            }
            return {
                start: startDate ? startDate.toISOString().split('T')[0] : '',
                end: endDate ? endDate.toISOString().split('T')[0] : ''
            };
        }

        // Custom filter function for DataTable (Referral Links)
        $.fn.dataTable.ext.search.push(function(settings, data, dataIndex) {
            const dateRange = $('#referralTableDateRange').val();
            let startDate = $('#referralTableStartDate').val();
            let endDate = $('#referralTableEndDate').val();
            const platform = $('#referralTablePlatform').val();
            const referrer = $('#referralTableReferrer').val();
            const sourceMatch = $('#referralTableSourceMatch').val();

            // Apply predefined date range if not custom
            if (dateRange !== 'custom') {
                const range = getDateRange(dateRange);
                startDate = range.start;
                endDate = range.end;
                $('#referralTableStartDate').val(startDate);
                $('#referralTableEndDate').val(endDate);
            }

            // Parse the row data
            const rowDate = parseDate(data[4]); // 'Date and Time' column (index 4)
            const rowPlatform = data[1]; // 'Platform' column (index 1)
            const rowReferrer = data[2]; // 'Referrer' column (index 2)
            const rowSourceMatch = data[3]; // 'Source Match' column (index 3)

            // All conditions must be true for the row to be included
            let dateMatch = true;
            if (startDate || endDate) {
                if (startDate && new Date(startDate) > rowDate) dateMatch = false;
                if (endDate && new Date(endDate) < rowDate) dateMatch = false;
            }

            let platformMatch = (platform === 'all' || rowPlatform === platform);
            let referrerMatch = (referrer === 'all' || rowReferrer.indexOf(referrer) !== -1);
            let sourceMatchCondition = (sourceMatch === 'all' ||
                (sourceMatch === '1' && rowSourceMatch === 'Yes') ||
                (sourceMatch === '0' && rowSourceMatch === 'No'));

            // Return true only if all conditions are satisfied
            return dateMatch && platformMatch && referrerMatch && sourceMatchCondition;
        });

        // Date parsing function
        function parseDate(dateStr) {
            const parts = dateStr.split(', ');
            const dateParts = parts[0].split(' ');
            const timeParts = parts[1].split(':');
            const monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
            const day = parseInt(dateParts[0], 10);
            const month = monthNames.indexOf(dateParts[1]);
            const year = parseInt(dateParts[2], 10);
            const hour = parseInt(timeParts[0], 10);
            const minute = parseInt(timeParts[1], 10);
            return new Date(year, month, day, hour, minute);
        }

        // Event listeners for Referral Links filters
        $('#referralTableDateRange').on('change', function() {
            const range = this.value;
            const startDateInput = $('#referralTableStartDate');
            const endDateInput = $('#referralTableEndDate');
            if (range === 'custom') {
                startDateInput.prop('disabled', false).val('');
                endDateInput.prop('disabled', false).val('');
            } else {
                startDateInput.prop('disabled', true);
                endDateInput.prop('disabled', true);
                referralTable.draw();
            }
        });

        $('#referralTableStartDate, #referralTableEndDate, #referralTablePlatform, #referralTableReferrer, #referralTableSourceMatch').on('change', function() {
            referralTable.draw();
        });

        // Reset filters for Referral Links Table
        $('#resetReferralTableFilters').on('click', function() {
            $('#referralTableDateRange').val('last30days');
            const range = getDateRange('last30days');
            $('#referralTableStartDate').val(range.start).prop('disabled', true);
            $('#referralTableEndDate').val(range.end).prop('disabled', true);
            $('#referralTablePlatform').val('all');
            $('#referralTableReferrer').val('all');
            $('#referralTableSourceMatch').val('all');
            referralTable.draw();
        });

        // Initial load with default filter
        const defaultRange = getDateRange('last30days');
        $('#referralTableStartDate').val(defaultRange.start).prop('disabled', true);
        $('#referralTableEndDate').val(defaultRange.end).prop('disabled', true);
        referralTable.draw();

        // Update the results count initially and on redraw
        updateResultsCount();
        referralTable.on('draw', function() {
            updateResultsCount();
        });
    });
</script>