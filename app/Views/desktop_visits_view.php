<!-- Head View Start -->
<?= $this->include('head_view') ?>
<!-- Head View End -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/dragscroll/0.5.1/dragscroll.min.js"></script>

<style>
    #map {
        height: 500px;
        width: 100%;
        margin-top: 20px;
    }

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
            <div class="title pb-20 d-flex justify-content-between">
                <div class="d-flex align-items-center">
                    <a href="<?= base_url('analytics') ?>" class="mx-3"><i class="fa-solid fa-arrow-left"></i></a>
                    <h2 class="h3 mb-0">Overview</h2>
                </div>
                <div>
                    <div class="visitor-count-container d-flex justify-content-end mb-3">
                        <h5 id="visitorCount" class="text-muted">0</h5>
                    </div>
                </div>
            </div>

            <div class="FullChartView">
                <div>
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="text-blue">Desktop Views <small>(Last 30 Days)</small></h4>
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
                            <div class="col-md-2">
                                <label for="operatingSystem">Operating System</label>
                                <select id="operatingSystem" class="form-control">
                                    <option value="all">All OS</option>
                                    <?php foreach ($operating_systems as $os): ?>
                                        <option value="<?= esc($os['operating_system']) ?>"><?= esc($os['operating_system']) ?></option>
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
                    <canvas id="desktopVisitsChart" class="desktopVisitsChart"></canvas>
                </div>
            </div>

            <!-- Export Data Filters -->
            <div class="card-box mb-30 pd-20" id="exportFilters" style="display: none;">
                <h4 class="card-title">Export</h4>
                <form action="<?= base_url('analytics/export_desktop_visitors') ?>" method="post" id="exportForm">
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

            <!-- Export Desktop Visitors Data Filters -->
            <div class="card-box mb-30 pd-20" id="desktopExportFilters" style="display: none;">
                <h4 class="card-title">Export Desktop Visitors</h4>
                <form action="<?= base_url('analytics/export_desktop_visitors') ?>" method="post" id="desktopExportForm">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="desktopExportDateRange">Date Range</label>
                            <select id="desktopExportDateRange" name="dateRange" class="form-control">
                                <option value="custom">Custom</option>
                                <option value="last30days">Last 30 Days</option>
                                <option value="lastMonth">Last Month</option>
                                <option value="last6months">Last 6 Months</option>
                                <option value="thisYear">This Year</option>
                                <option value="lastYear">Last Year</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="desktopExportStartDate">Start Date</label>
                            <input type="date" id="desktopExportStartDate" name="startDate" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="desktopExportEndDate">End Date</label>
                            <input type="date" id="desktopExportEndDate" name="endDate" class="form-control">
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

            <!-- Desktop Visitors Trends Table -->
            <div class="card-box mb-30">
                <div class="pd-20 d-flex justify-content-between align-items-center">
                    <h4 class="text-blue h4">Desktop Views</h4>
                    <div class="d-flex align-items-center">
                        <div class="visitor-count-container d-flex justify-content-end mb-3 mt-3 m-3">
                            <h5 id="desktopVisitorCount" class="text-muted">Total: 0</h5>
                        </div>
                        <div class="ChartFilterbtn">
                            <button id="toggleDesktopTableFilters"><i class="fa-solid fa-filter"></i></button>
                        </div>
                        <div class="ExportBtnAna">
                            <a href="javascript:void(0);" id="toggleDesktopExportFilters">
                                <i class="fa-solid fa-arrow-up-from-bracket"></i> Export
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Filters for Desktop Visitors -->
                <div class="filter-container mb-3 p-3" id="desktopTableFilterContainer" style="display: none;">
                    <div class="form-row">
                        <div class="col-md-2">
                            <label for="desktopTableDateRange">Date Range</label>
                            <select id="desktopTableDateRange" class="form-control">
                                <option value="custom">Custom</option>
                                <option value="last30days" selected>Last 30 Days</option>
                                <option value="lastMonth">Last Month</option>
                                <option value="last6months">Last 6 Months</option>
                                <option value="thisYear">This Year</option>
                                <option value="lastYear">Last Year</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="desktopTableStartDate">Start Date</label>
                            <input type="date" id="desktopTableStartDate" class="form-control">
                        </div>
                        <div class="col-md-2">
                            <label for="desktopTableEndDate">End Date</label>
                            <input type="date" id="desktopTableEndDate" class="form-control">
                        </div>
                        <div class="col-md-2">
                            <label for="desktopTableDeviceType">Device Type</label>
                            <select id="desktopTableDeviceType" class="form-control" readonly>
                                <option value="Desktop" selected>Desktop</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="desktopTableVisitType">Visit Type</label>
                            <select id="desktopTableVisitType" class="form-control">
                                <option value="all">All Visits</option>
                                <option value="new">New Visits</option>
                                <option value="returning">Returning Visits</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="desktopTableLocation">Location</label>
                            <select id="desktopTableLocation" class="form-control">
                                <option value="all">All Locations</option>
                                <!-- Add PHP dynamic content for locations -->
                                <?php foreach ($locations as $loc): ?>
                                    <option value="<?= esc($loc['location']) ?>"><?= esc($loc['location']) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-2 mt-3">
                            <label for="desktopTableReferrer">Referrer</label>
                            <select id="desktopTableReferrer" class="form-control">
                                <option value="all">All Referrers</option>
                                <!-- Add PHP dynamic content for referrers -->
                                <?php foreach ($referrers as $ref): ?>
                                    <option value="<?= esc($ref['referrer']) ?>"><?= esc($ref['referrer']) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-2 mt-4">
                            <button id="resetDesktopTableFilters" class="btn btn-secondary mt-4">Reset</button>
                        </div>
                    </div>
                </div>

                <div class="pb-20">
                    <table id="desktop-visitor-table" class="table display">
                        <thead>
                            <tr>
                                <th class="table-plus">ID</th>
                                <th>Device</th>
                                <th>Location</th>
                                <th>Referrer</th>
                                <th>Visit Type</th>
                                <th>Date and Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($desktopVisitsData as $visitor) : ?>
                                <tr>
                                    <td><?= $visitor['id'] ?></td>
                                    <td><?= $visitor['device_type'] ?></td>
                                    <td><?= $visitor['location'] ?></td>
                                    <td><?= strlen($visitor['referrer']) > 50 ? substr($visitor['referrer'], 0, 50) . '...' : $visitor['referrer'] ?></td>
                                    <td><?= $visitor['visit_type'] ?></td>
                                    <td><?= date('d M Y, H:i', strtotime($visitor['visited_at'])) ?></td>
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

    <script>
        $(document).ready(function() {
            // Existing DataTable initialization and filter logic remain here

            // Toggle export filters visibility for Desktop Visitors
            $('#toggleDesktopExportFilters').on('click', function() {
                const exportContainer = $('#desktopExportFilters');
                if (exportContainer.is(':hidden')) {
                    exportContainer.slideDown();
                    $(this).find('i').removeClass('fa-arrow-up-from-bracket').addClass('fa-times');
                } else {
                    exportContainer.slideUp();
                    $(this).find('i').removeClass('fa-times').addClass('fa-arrow-up-from-bracket');
                }
            });

            // Handle export date range change
            $('#desktopExportDateRange').on('change', function() {
                const range = this.value;
                const startDateInput = $('#desktopExportStartDate');
                const endDateInput = $('#desktopExportEndDate');
                if (range === 'custom') {
                    startDateInput.prop('disabled', false).val('');
                    endDateInput.prop('disabled', false).val('');
                } else {
                    startDateInput.prop('disabled', true);
                    endDateInput.prop('disabled', true);
                    // Optional: You could pre-fill dates here if desired, but the server will handle it
                }
            });

            // Existing filter and table logic remain here
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const desktopVisitsData = <?= json_encode($desktopVisitsData) ?>;
            let desktopVisitsChart;

            // Function to filter data for desktop visits
            function filterDesktopVisitsData(filters) {
                return desktopVisitsData.filter(data => {
                    const matchesDateRange = checkDateRange(data.visited_at, filters.dateRange, filters.startDate, filters.endDate);
                    const matchesVisitType = filters.visitType === 'all' || data.visit_type === filters.visitType;
                    const matchesBrowser = filters.browser === 'all' || data.browser === filters.browser;
                    const matchesOperatingSystem = filters.operatingSystem === 'all' || data.operating_system === filters.operatingSystem;
                    const matchesLocation = filters.location === 'all' || data.location === filters.location;
                    const matchesReferrer = filters.referrer === 'all' || data.referrer === filters.referrer;

                    return matchesDateRange && matchesVisitType && matchesBrowser && matchesOperatingSystem && matchesLocation && matchesReferrer;
                });
            }

            // Function to check if the date falls within the selected range
            function checkDateRange(date, range, startDate, endDate) {
                const rowDate = new Date(date);
                const currentDate = new Date();
                let start = startDate ? new Date(startDate) : null;
                let end = endDate ? new Date(endDate) : null;

                if (range === 'last30days') {
                    start = new Date(currentDate.setDate(currentDate.getDate() - 30));
                } else if (range === 'lastMonth') {
                    start = new Date(currentDate.setMonth(currentDate.getMonth() - 1));
                } else if (range === 'last6months') {
                    start = new Date(currentDate.setMonth(currentDate.getMonth() - 6));
                } else if (range === 'thisYear') {
                    start = new Date(currentDate.getFullYear(), 0, 1);
                } else if (range === 'lastYear') {
                    start = new Date(currentDate.getFullYear() - 1, 0, 1);
                    end = new Date(currentDate.getFullYear() - 1, 11, 31);
                }

                return rowDate >= start && (end ? rowDate <= end : true);
            }

            // Function to aggregate filtered data
            function aggregateDesktopVisitsData(filteredData) {
                const trends = {};
                filteredData.forEach(d => {
                    const date = new Date(d.visited_at).toISOString().split('T')[0];
                    if (!trends[date]) {
                        trends[date] = {
                            visit_date: date,
                            total_visits: 0,
                        };
                    }
                    trends[date].total_visits++;
                });
                return Object.values(trends).sort((a, b) => new Date(a.visit_date) - new Date(b.visit_date));
            }

            // Function to get datasets for chart
            function getDesktopVisitsChartData(aggregatedTrends) {
                const labels = aggregatedTrends.map(data => data.visit_date);
                const datasets = [{
                    label: 'Total Desktop Visits',
                    data: aggregatedTrends.map(d => d.total_visits),
                    borderColor: '#36A2EB',
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    fill: true,
                    tension: 0.3
                }];
                return {
                    labels,
                    datasets
                };
            }

            // Function to update the desktop visits chart
            function updateDesktopVisitsChart(filters) {
                const filteredData = filterDesktopVisitsData(filters);
                const aggregatedData = aggregateDesktopVisitsData(filteredData);
                const chartData = getDesktopVisitsChartData(aggregatedData);

                // Update the visitor count
                const totalVisitors = aggregatedData.reduce((sum, data) => sum + data.total_visits, 0);
                document.getElementById('visitorCount').textContent = `Total: ${totalVisitors}`;

                if (desktopVisitsChart) {
                    desktopVisitsChart.data = chartData;
                    desktopVisitsChart.update();
                } else {
                    const desktopVisitsChartCtx = document.getElementById('desktopVisitsChart').getContext('2d');
                    desktopVisitsChart = new Chart(desktopVisitsChartCtx, {
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
            }

            // Handle filter changes
            document.getElementById('dateRange').addEventListener('change', function() {
                const filters = getFilters();
                updateDesktopVisitsChart(filters);
            });
            document.getElementById('startDate').addEventListener('change', function() {
                const filters = getFilters();
                updateDesktopVisitsChart(filters);
            });
            document.getElementById('endDate').addEventListener('change', function() {
                const filters = getFilters();
                updateDesktopVisitsChart(filters);
            });
            document.getElementById('visitType').addEventListener('change', function() {
                const filters = getFilters();
                updateDesktopVisitsChart(filters);
            });
            document.getElementById('browser').addEventListener('change', function() {
                const filters = getFilters();
                updateDesktopVisitsChart(filters);
            });
            document.getElementById('operatingSystem').addEventListener('change', function() {
                const filters = getFilters();
                updateDesktopVisitsChart(filters);
            });
            document.getElementById('location').addEventListener('change', function() {
                const filters = getFilters();
                updateDesktopVisitsChart(filters);
            });
            document.getElementById('referrer').addEventListener('change', function() {
                const filters = getFilters();
                updateDesktopVisitsChart(filters);
            });

            // Reset filters
            document.getElementById('resetFilters').addEventListener('click', function() {
                document.getElementById('dateRange').value = 'custom';
                document.getElementById('startDate').value = '';
                document.getElementById('endDate').value = '';
                document.getElementById('visitType').value = 'all';
                document.getElementById('browser').value = 'all';
                document.getElementById('operatingSystem').value = 'all';
                document.getElementById('location').value = 'all';
                document.getElementById('referrer').value = 'all';

                const filters = getFilters();
                updateDesktopVisitsChart(filters);
            });

            // Get all filters
            function getFilters() {
                return {
                    dateRange: document.getElementById('dateRange').value,
                    startDate: document.getElementById('startDate').value,
                    endDate: document.getElementById('endDate').value,
                    visitType: document.getElementById('visitType').value,
                    browser: document.getElementById('browser').value,
                    operatingSystem: document.getElementById('operatingSystem').value,
                    location: document.getElementById('location').value,
                    referrer: document.getElementById('referrer').value
                };
            }

            updateDesktopVisitsChart(getFilters());
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const toggleFiltersButton = document.getElementById("toggleFilters");
            const filterContainer = document.getElementById("filterContainer");

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
            // Initialize DataTable for Desktop Visitors
            const desktopTable = $('#desktop-visitor-table').DataTable({
                "paging": true,
                "searching": true,
                "pageLength": 20,
                "lengthMenu": [10, 20, 30, 50],
                "order": [
                    [5, 'desc'] // Sort by date (column index 5)
                ]
            });

            // Function to update the total results count
            function updateResultsCount() {
                const resultCount = desktopTable.rows({
                    filter: 'applied'
                }).count();
                $('#desktopVisitorCount').text(`Total: ${resultCount}`);
            }

            // Toggle filter visibility for Desktop Visitors Table
            $('#toggleDesktopTableFilters').on('click', function() {
                const filterContainer = $('#desktopTableFilterContainer');
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

            // Custom filter function for DataTable (Desktop Visitors)
            $.fn.dataTable.ext.search.push(function(settings, data, dataIndex) {
                const dateRange = $('#desktopTableDateRange').val();
                let startDate = $('#desktopTableStartDate').val();
                let endDate = $('#desktopTableEndDate').val();
                const deviceType = $('#desktopTableDeviceType').val();
                const visitType = $('#desktopTableVisitType').val();
                const location = $('#desktopTableLocation').val();
                const referrer = $('#desktopTableReferrer').val();

                // Apply predefined date range if not custom
                if (dateRange !== 'custom') {
                    const range = getDateRange(dateRange);
                    startDate = range.start;
                    endDate = range.end;
                    $('#desktopTableStartDate').val(startDate);
                    $('#desktopTableEndDate').val(endDate);
                }

                const rowDate = new Date(data[5]); // 'Date and Time' column (index 5)
                const rowDevice = data[1]; // 'Device' column (index 1)
                const rowLocation = data[2]; // 'Location' column (index 2)
                const rowReferrer = data[3]; // 'Referrer' column (index 3)
                const rowVisitType = data[4]; // 'Visit Type' column (index 4)

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

            // Event listeners for Desktop Visitors filters
            $('#desktopTableDateRange').on('change', function() {
                const range = this.value;
                const startDateInput = $('#desktopTableStartDate');
                const endDateInput = $('#desktopTableEndDate');
                if (range === 'custom') {
                    startDateInput.prop('disabled', false).val('');
                    endDateInput.prop('disabled', false).val('');
                } else {
                    startDateInput.prop('disabled', true);
                    endDateInput.prop('disabled', true);
                    desktopTable.draw(); // Redraw table after applying filters
                }
            });

            $('#desktopTableStartDate, #desktopTableEndDate, #desktopTableDeviceType, #desktopTableVisitType, #desktopTableLocation, #desktopTableReferrer').on('change', function() {
                desktopTable.draw(); // Redraw table after applying filters
            });

            // Reset filters for Desktop Visitors Table
            $('#resetDesktopTableFilters').on('click', function() {
                $('#desktopTableDateRange').val('custom');
                $('#desktopTableStartDate').val('').prop('disabled', false);
                $('#desktopTableEndDate').val('').prop('disabled', false);
                $('#desktopTableDeviceType').val('all');
                $('#desktopTableVisitType').val('all');
                $('#desktopTableLocation').val('all');
                $('#desktopTableReferrer').val('all');
                desktopTable.draw(); // Redraw table after resetting filters
            });

            // Update the results count initially
            updateResultsCount();

            // Redraw and update the results count whenever table is redrawn
            desktopTable.on('draw', function() {
                updateResultsCount();
            });
        });
    </script>

</body>