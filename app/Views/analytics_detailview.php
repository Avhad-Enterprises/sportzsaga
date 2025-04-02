<!-- Head View Start -->
<?= $this->include('head_view') ?>
<!-- Head View End -->

<style>
    table td:nth-child(4) {
        max-width: 200px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .filter-container {
        margin-bottom: 20px;
    }

    .form-row .col-md-3 {
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
                    <a href="<?= base_url('analytics') ?>" class="mx-3"><i class="fa-solid fa-arrow-left"></i></a>
                    <h2 class="h3 mb-0">Overview</h2>
                </div>
            </div>

            <div class="FullChartView">
                <div>
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="text-blue">User's Trends <small>(Last 30 Days)</small></h4>
                        <div class="ChartFilterbtn">
                            <button id="toggleFilters"><i class="fa-solid fa-table-columns"></i></button>
                        </div>
                    </div>

                    <!-- Filters -->
                    <div class="filter-container mb-3" id="filterContainer" style="display: none;">
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="dateRange">Date Range</label>
                                <select id="dateRange" class="form-control">
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
                                <input type="date" id="startDate" class="form-control">
                            </div>
                            <div class="col-md-2">
                                <label for="endDate">End Date</label>
                                <input type="date" id="endDate" class="form-control">
                            </div>
                            <div class="col-md-2">
                                <label for="deviceType">Device Type</label>
                                <select id="deviceType" class="form-control">
                                    <option value="all">All Devices</option>
                                    <option value="Desktop">Desktop</option>
                                    <option value="Mobile">Mobile</option>
                                    <option value="Tablet">Tablet</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label for="visitType">Visit Type</label>
                                <select id="visitType" class="form-control">
                                    <option value="all">All Visits</option>
                                    <option value="new">New Visits</option>
                                    <option value="returning">Returning Visits</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label for="browser">Browser</label>
                                <select id="browser" class="form-control">
                                    <option value="all">All Browsers</option>
                                    <?php foreach ($browsers as $b): ?>
                                        <option value="<?= esc($b['browser']) ?>"><?= esc($b['browser']) ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-2 mt-3">
                                <label for="operatingSystem">Operating System</label>
                                <select id="operatingSystem" class="form-control">
                                    <option value="all">All OS</option>
                                    <?php foreach ($operating_systems as $os): ?>
                                        <option value="<?= esc($os['operating_system']) ?>">
                                            <?= esc($os['operating_system']) ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-2 mt-3">
                                <label for="location">Location</label>
                                <select id="location" class="form-control">
                                    <option value="all">All Locations</option>
                                    <?php foreach ($locations as $loc): ?>
                                        <option value="<?= esc($loc['location']) ?>"><?= esc($loc['location']) ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-2 mt-3">
                                <label for="referrer">Referrer</label>
                                <select id="referrer" class="form-control">
                                    <option value="all">All Referrers</option>
                                    <?php foreach ($referrers as $ref): ?>
                                        <option value="<?= esc($ref['referrer']) ?>"><?= esc($ref['referrer']) ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-2 mt-4">
                                <label for="referrer"></label>
                                <button id="resetFilters" class="btn btn-secondary mt-4">Reset</button>
                            </div>
                        </div>
                    </div>

                    <!-- Chart -->
                    <canvas id="visitorLineChart"></canvas>
                </div>
            </div>

            <!-- Full Chart View
            <div class="FullChartView">
                <div>
                    <h4 class="text-blue">User's Trends</h4>
                    <canvas id="visitorLineChart"></canvas>
                </div>
            </div> -->

            <!-- Export Data Filters -->
            <div class="card-box mb-30 pd-20" id="exportFilters" style="display: none;">
                <h4 class="card-title">Export</h4>
                <form action="<?= base_url('analytics/export_visitors') ?>" method="post" id="exportForm">
                    <div class="row">

                        <div class="col-md-3">
                            <label for="exportDateRange">Date Range</label>
                            <select id="exportDateRange" name="dateRange" class="form-control">
                                <option value="custom">Custom</option>
                                <option value="last30days">Last 30 Days</option>
                                <option value="lastMonth">Last Month</option>
                                <option value="last6months">Last 6 Months</option>
                                <option value="thisYear">This Year</option>
                                <option value="lastYear">Last Year</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="exportStartDate">Start Date</label>
                            <input type="date" id="exportStartDate" name="startDate" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="exportEndDate">End Date</label>
                            <input type="date" id="exportEndDate" name="endDate" class="form-control">
                        </div>
                        <div class="col-md-3 mt-4">
                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa-solid fa-download"></i> Download
                                </button>
                            </div>
                        </div>

                    </div>
                </form>
            </div>

            <!-- Visitors Trends Table -->
            <div class="card-box mb-30">
                <div class="pd-20 d-flex justify-content-between align-items-center">
                    <h4 class="text-blue h4">Users</h4>
                    <div class="d-flex align-items-center">
                        <div class="ChartFilterbtn">
                            <button id="toggleTableFilters"><i class="fa-solid fa-filter"></i></button>
                        </div>
                        <div class="ExportBtnAna">
                            <a href="javascript:void(0);" id="toggleExportFilters">
                                <i class="fa-solid fa-arrow-up-from-bracket"></i> Export
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Filters -->
                <div class="filter-container mb-3 p-3" id="tableFilterContainer" style="display: none;">
                    <div class="form-row">
                        <div class="col-md-2">
                            <label for="tableDateRange">Date Range</label>
                            <select id="tableDateRange" class="form-control">
                                <option value="custom">Custom</option>
                                <option value="last30days" selected>Last 30 Days</option>
                                <option value="lastMonth">Last Month</option>
                                <option value="last6months">Last 6 Months</option>
                                <option value="thisYear">This Year</option>
                                <option value="lastYear">Last Year</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="tableStartDate">Start Date</label>
                            <input type="date" id="tableStartDate" class="form-control">
                        </div>
                        <div class="col-md-2">
                            <label for="tableEndDate">End Date</label>
                            <input type="date" id="tableEndDate" class="form-control">
                        </div>
                        <div class="col-md-2">
                            <label for="tableDeviceType">Device Type</label>
                            <select id="tableDeviceType" class="form-control">
                                <option value="all">All Devices</option>
                                <?php foreach ($device_types as $dt): ?>
                                    <option value="<?= esc($dt['device_type']) ?>"><?= esc($dt['device_type']) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="tableVisitType">Visit Type</label>
                            <select id="tableVisitType" class="form-control">
                                <option value="all">All Visits</option>
                                <?php foreach ($visit_types as $vt): ?>
                                    <option value="<?= esc($vt['visit_type']) ?>"><?= esc($vt['visit_type']) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="tableLocation">Location</label>
                            <select id="tableLocation" class="form-control">
                                <option value="all">All Locations</option>
                                <?php foreach ($locations as $loc): ?>
                                    <option value="<?= esc($loc['location']) ?>"><?= esc($loc['location']) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-2 mt-3">
                            <label for="tableReferrer">Referrer</label>
                            <select id="tableReferrer" class="form-control">
                                <option value="all">All Referrers</option>
                                <?php foreach ($referrers as $ref): ?>
                                    <option value="<?= esc($ref['referrer']) ?>"><?= esc($ref['referrer']) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-2 mt-4">
                            <button id="resetTableFilters" class="btn btn-secondary mt-4">Reset</button>
                        </div>
                    </div>
                </div>

                <div class="pb-20">
                    <table id="user-table" class="table display">
                        <thead>
                            <tr>
                                <th class="table-plus">ID</th>
                                <th>Device</th>
                                <th>Location</th>
                                <th>Referrer</th>
                                <th>Type</th>
                                <th>Date and Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($visiters as $visiter): ?>
                                <tr>
                                    <td><?= $visiter['id'] ?></td>
                                    <td><?= $visiter['device_type'] ?></td>
                                    <td><?= $visiter['location'] ?></td>
                                    <td><?= strlen($visiter['referrer']) > 50 ? substr($visiter['referrer'], 0, 50) . '...' : $visiter['referrer'] ?>
                                    </td>
                                    <td><?= $visiter['visit_type'] ?></td>
                                    <td><?= date('d M Y, H:i', strtotime($visiter['visited_at'])) ?></td>
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
    document.addEventListener('DOMContentLoaded', function () {
        const rawVisitorData = <?= json_encode($rawVisitorData) ?>;
        let visitorChart;

        console.log("Raw Visitor Data: ", rawVisitorData);

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

        // Function to filter raw data
        function filterData(data) {
            const dateRange = document.getElementById('dateRange').value;
            let startDate = document.getElementById('startDate').value;
            let endDate = document.getElementById('endDate').value;
            const deviceType = document.getElementById('deviceType').value;
            const visitType = document.getElementById('visitType').value;
            const browser = document.getElementById('browser').value;
            const operatingSystem = document.getElementById('operatingSystem').value;
            const location = document.getElementById('location').value;
            const referrer = document.getElementById('referrer').value;

            if (dateRange !== 'custom') {
                const range = getDateRange(dateRange);
                startDate = range.start;
                endDate = range.end;
                document.getElementById('startDate').value = startDate;
                document.getElementById('endDate').value = endDate;
            }

            let filteredData = [...data];

            if (startDate) {
                filteredData = filteredData.filter(d => new Date(d.visited_at) >= new Date(startDate));
            }
            if (endDate) {
                filteredData = filteredData.filter(d => new Date(d.visited_at) <= new Date(endDate));
            }
            if (deviceType !== 'all') {
                filteredData = filteredData.filter(d => d.device_type === deviceType);
            }
            if (visitType !== 'all') {
                filteredData = filteredData.filter(d => d.visit_type === visitType);
            }
            if (browser !== 'all') {
                filteredData = filteredData.filter(d => d.browser === browser);
            }
            if (operatingSystem !== 'all') {
                filteredData = filteredData.filter(d => d.operating_system === operatingSystem);
            }
            if (location !== 'all') {
                filteredData = filteredData.filter(d => d.location === location);
            }
            if (referrer !== 'all') {
                filteredData = filteredData.filter(d => d.referrer === referrer);
            }

            return filteredData;
        }

        // Function to aggregate filtered data
        function aggregateData(filteredData) {
            const trends = {};
            filteredData.forEach(d => {
                const date = new Date(d.visited_at).toISOString().split('T')[0];
                if (!trends[date]) {
                    trends[date] = {
                        visit_date: date,
                        total_visits: 0,
                        desktop_visits: 0,
                        mobile_visits: 0,
                        tablet_visits: 0,
                        new_visits: 0,
                        returning_visits: 0,
                        browser_visits: 0,
                        os_visits: 0,
                        location_visits: 0,
                        referrer_visits: 0
                    };
                }
                trends[date].total_visits++;
                if (d.device_type === 'Desktop') trends[date].desktop_visits++;
                if (d.device_type === 'Mobile') trends[date].mobile_visits++;
                if (d.device_type === 'Tablet') trends[date].tablet_visits++;
                if (d.visit_type === 'new') trends[date].new_visits++;
                if (d.visit_type === 'returning') trends[date].returning_visits++;
                if (d.browser) trends[date].browser_visits++;
                if (d.operating_system) trends[date].os_visits++;
                if (d.location) trends[date].location_visits++;
                if (d.referrer) trends[date].referrer_visits++;
            });
            return Object.values(trends).sort((a, b) => new Date(a.visit_date) - new Date(b.visit_date));
        }

        // Function to get datasets
        function getFilteredDatasets(trends) {
            const deviceType = document.getElementById('deviceType').value;
            const visitType = document.getElementById('visitType').value;

            const visitorLabels = trends.map(data => data.visit_date);
            const datasets = [{
                label: 'Total Visits',
                data: trends.map(d => d.total_visits),
                borderColor: '#36A2EB',
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                fill: true,
                tension: 0.3
            },
            {
                label: 'Desktop Visits',
                data: trends.map(d => d.desktop_visits),
                borderColor: '#36A2EB',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                fill: false,
                tension: 0.3,
                hidden: deviceType !== 'all' && deviceType !== 'Desktop'
            },
            {
                label: 'Mobile Visits',
                data: trends.map(d => d.mobile_visits),
                borderColor: '#36A2EB',
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                fill: false,
                tension: 0.3,
                hidden: deviceType !== 'all' && deviceType !== 'Mobile'
            },
            {
                label: 'Tablet Visits',
                data: trends.map(d => d.tablet_visits),
                borderColor: '#36A2EB',
                backgroundColor: 'rgba(255, 206, 86, 0.2)',
                fill: false,
                tension: 0.3,
                hidden: deviceType !== 'all' && deviceType !== 'Tablet'
            },
            {
                label: 'New Visits',
                data: trends.map(d => d.new_visits),
                borderColor: '#36A2EB',
                backgroundColor: 'rgba(153, 102, 255, 0.2)',
                fill: false,
                tension: 0.3,
                hidden: visitType !== 'all' && visitType !== 'new'
            },
            {
                label: 'Returning Visits',
                data: trends.map(d => d.returning_visits),
                borderColor: '#36A2EB',
                backgroundColor: 'rgba(255, 159, 64, 0.2)',
                fill: false,
                tension: 0.3,
                hidden: visitType !== 'all' && visitType !== 'returning'
            },
            {
                label: 'Browser Visits',
                data: trends.map(d => d.browser_visits),
                borderColor: '#36A2EB',
                backgroundColor: 'rgba(142, 68, 173, 0.2)',
                fill: false,
                tension: 0.3
            },
            {
                label: 'OS Visits',
                data: trends.map(d => d.os_visits),
                borderColor: '#36A2EB',
                backgroundColor: 'rgba(231, 76, 60, 0.2)',
                fill: false,
                tension: 0.3
            },
            {
                label: 'Location Visits',
                data: trends.map(d => d.location_visits),
                borderColor: '#36A2EB',
                backgroundColor: 'rgba(255, 255, 255, 0.2)',
                fill: false,
                tension: 0.3
            },
            {
                label: 'Referrer Visits',
                data: trends.map(d => d.referrer_visits),
                borderColor: '#36A2EB',
                backgroundColor: 'rgba(243, 156, 18, 0.2)',
                fill: false,
                tension: 0.3
            }
            ];

            return {
                labels: visitorLabels,
                datasets
            };
        }

        // Function to update chart
        function updateChart() {
            const filteredData = filterData(rawVisitorData);
            const aggregatedTrends = aggregateData(filteredData);
            const chartData = getFilteredDatasets(aggregatedTrends);

            if (aggregatedTrends.length > 0) {
                if (visitorChart) {
                    visitorChart.data = chartData;
                    visitorChart.update();
                } else {
                    const visitorLineCtx = document.getElementById('visitorLineChart').getContext('2d');
                    visitorChart = new Chart(visitorLineCtx, {
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
                                        text: 'Number of Visits'
                                    },
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                }
            } else {
                console.error("No filtered visitor data available.");
                if (visitorChart) {
                    visitorChart.destroy();
                    visitorChart = null;
                }
            }
        }

        // Reset filters
        function resetFilters() {
            document.getElementById('dateRange').value = 'custom';
            document.getElementById('startDate').value = '';
            document.getElementById('startDate').disabled = false;
            document.getElementById('endDate').value = '';
            document.getElementById('endDate').disabled = false;
            document.getElementById('deviceType').value = 'all';
            document.getElementById('visitType').value = 'all';
            document.getElementById('browser').value = 'all';
            document.getElementById('operatingSystem').value = 'all';
            document.getElementById('location').value = 'all';
            document.getElementById('referrer').value = 'all';
            updateChart();
        }

        // Initial chart render
        if (rawVisitorData.length > 0) {
            updateChart();
        } else {
            console.error("No visitor data available on load.");
        }

        // Event listeners
        document.getElementById('dateRange').addEventListener('change', function () {
            const range = this.value;
            const startDateInput = document.getElementById('startDate');
            const endDateInput = document.getElementById('endDate');
            if (range === 'custom') {
                startDateInput.disabled = false;
                endDateInput.disabled = false;
                startDateInput.value = '';
                endDateInput.value = '';
            } else {
                startDateInput.disabled = true;
                endDateInput.disabled = true;
                updateChart();
            }
        });
        document.getElementById('startDate').addEventListener('change', updateChart);
        document.getElementById('endDate').addEventListener('change', updateChart);
        document.getElementById('deviceType').addEventListener('change', updateChart);
        document.getElementById('visitType').addEventListener('change', updateChart);
        document.getElementById('browser').addEventListener('change', updateChart);
        document.getElementById('operatingSystem').addEventListener('change', updateChart);
        document.getElementById('location').addEventListener('change', updateChart);
        document.getElementById('referrer').addEventListener('change', updateChart);
        document.getElementById('resetFilters').addEventListener('click', resetFilters);
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const showExportFormBtn = document.getElementById("showExportFormBtn");
        const exportForm = document.getElementById("exportForm");

        // Toggle the visibility of the filter container
        showExportFormBtn.addEventListener("click", function () {
            if (exportForm.style.display === "none" || exportForm.style.display === "") {
                exportForm.style.display = "block"; // Show the form
            } else {
                exportForm.style.display = "none"; // Hide the form
            }
        });
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const toggleFiltersButton = document.getElementById("toggleFilters");
        const filterContainer = document.getElementById("filterContainer");

        // Initially hide the filter container (you already have 'display: none' in the HTML)
        filterContainer.style.display = "none";

        // Add event listener to toggle the filters
        toggleFiltersButton.addEventListener("click", function () {
            if (filterContainer.style.display === "none") {
                filterContainer.style.display = "block"; // Show filters
            } else {
                filterContainer.style.display = "none"; // Hide filters
            }
        });
    });
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        // Toggle export filters visibility
        $('#toggleExportFilters').click(function () {
            const exportFilters = $('#exportFilters');
            if (exportFilters.is(':visible')) {
                exportFilters.slideUp();
            } else {
                exportFilters.slideDown();
            }
        });

        // Handle date range selection
        $('#exportDateRange').change(function () {
            const range = $(this).val();
            const startDateInput = $('#exportStartDate');
            const endDateInput = $('#exportEndDate');

            const today = new Date();
            let startDate, endDate = new Date(today);

            switch (range) {
                case 'custom':
                    startDateInput.val('').prop('disabled', false);
                    endDateInput.val('').prop('disabled', false);
                    break;
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
            }

            if (range !== 'custom') {
                startDateInput.val(startDate ? startDate.toISOString().split('T')[0] : '').prop('disabled', false);
                endDateInput.val(endDate ? endDate.toISOString().split('T')[0] : '').prop('disabled', false);
            }
        });

        // Debug form submission
        $('#exportForm').submit(function (e) {
            console.log('Form submitted with data:', {
                dateRange: $('#exportDateRange').val(),
                startDate: $('#exportStartDate').val(),
                endDate: $('#exportEndDate').val()
            });
        });
    });
</script>

<script>
    document.getElementById('resetFilters').addEventListener('click', function () {
        document.getElementById('startDate').value = '';
        document.getElementById('endDate').value = '';
        document.getElementById('deviceType').value = 'all';
        document.getElementById('visitType').value = 'all';
        updateChart();
    });
</script>

<!-- Include DataTables CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

<!-- Include jQuery (required by DataTables) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include DataTables JS -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<!-- Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<script>
    $(document).ready(function () {
        // Initialize DataTable
        const table = $('#user-table').DataTable({
            "paging": true,
            "searching": true,
            "pageLength": 20,
            "lengthMenu": [10, 20, 30, 50],
            "order": [
                [5, 'desc']
            ]
        });

        // Toggle filter visibility
        $('#toggleTableFilters').on('click', function () {
            const filterContainer = $('#tableFilterContainer');
            if (filterContainer.is(':hidden')) {
                filterContainer.slideDown();
                $(this).find('i').removeClass('fa-table-columns').addClass('fa-times');
            } else {
                filterContainer.slideUp();
                $(this).find('i').removeClass('fa-times').addClass('fa-table-columns');
            }
        });

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

        // Custom filter function for DataTable
        $.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
            const dateRange = $('#tableDateRange').val();
            let startDate = $('#tableStartDate').val();
            let endDate = $('#tableEndDate').val();
            const deviceType = $('#tableDeviceType').val();
            const visitType = $('#tableVisitType').val();
            const location = $('#tableLocation').val();
            const referrer = $('#tableReferrer').val();

            // Apply predefined date range if not custom
            if (dateRange !== 'custom') {
                const range = getDateRange(dateRange);
                startDate = range.start;
                endDate = range.end;
                $('#tableStartDate').val(startDate);
                $('#tableEndDate').val(endDate);
            }

            const rowDate = new Date(data[5]); // 'Date and Time' column (index 5)
            const rowDevice = data[1]; // 'Device' column (index 1)
            const rowLocation = data[2]; // 'Location' column (index 2)
            const rowReferrer = data[3]; // 'Referrer' column (index 3)
            const rowVisitType = data[4]; // 'Type' column (index 4)

            // Date filter
            if (startDate && new Date(startDate) > rowDate) return false;
            if (endDate && new Date(endDate) < rowDate) return false;

            // Other filters
            if (deviceType !== 'all' && rowDevice !== deviceType) return false;
            if (visitType !== 'all' && rowVisitType !== visitType) return false;
            if (location !== 'all' && rowLocation !== location) return false;
            if (referrer !== 'all' && rowReferrer.indexOf(referrer) === -1) return false;

            return true;
        });

        // Event listeners for filters
        $('#tableDateRange').on('change', function () {
            const range = this.value;
            const startDateInput = $('#tableStartDate');
            const endDateInput = $('#tableEndDate');
            if (range === 'custom') {
                startDateInput.prop('disabled', false).val('');
                endDateInput.prop('disabled', false).val('');
            } else {
                startDateInput.prop('disabled', true);
                endDateInput.prop('disabled', true);
                table.draw();
            }
        });
        $('#tableStartDate, #tableEndDate, #tableDeviceType, #tableVisitType, #tableLocation, #tableReferrer').on('change', function () {
            table.draw();
        });

        // Reset filters
        $('#resetTableFilters').on('click', function () {
            $('#tableDateRange').val('custom');
            $('#tableStartDate').val('').prop('disabled', false);
            $('#tableEndDate').val('').prop('disabled', false);
            $('#tableDeviceType').val('all');
            $('#tableVisitType').val('all');
            $('#tableLocation').val('all');
            $('#tableReferrer').val('all');
            table.draw();
        });
    });
</script>