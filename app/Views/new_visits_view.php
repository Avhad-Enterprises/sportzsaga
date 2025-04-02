<!-- Head View Start -->
<?= $this->include('head_view') ?>
<!-- Head View End -->

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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

    table td:nth-child(4) {
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
                        <h4 class="text-blue">New Visits <small>(Last 30 Days)</small></h4>
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
                            <div class="col-md-2">
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
                                <label for="resetFilters"></label>
                                <button id="resetFilters" class="btn btn-secondary mt-4">Reset</button>
                            </div>
                        </div>
                    </div>

                    <!-- Chart -->
                    <canvas id="newVisitsChart" class="newVisitsChart"></canvas>
                </div>
            </div>

            <div class="card-box mb-30">
                <div class="pd-20 d-flex justify-content-between align-items-center">
                    <h4 class="text-blue h4">New Visits</h4>
                    <div class="d-flex align-items-center">
                        <div class="visitor-count-container d-flex justify-content-end mb-3 mt-3 m-3">
                            <h5 id="newVisitorCount" class="text-muted">Total: 0</h5>
                        </div>
                        <div class="ChartFilterbtn">
                            <button id="toggleNewTableFilters"><i class="fa-solid fa-filter"></i></button>
                        </div>
                        <div class="ExportBtnAna">
                            <a href="javascript:void(0);" id="toggleNewExportFilters">
                                <i class="fa-solid fa-arrow-up-from-bracket"></i> Export
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Filters for New Visitors -->
                <div class="filter-container mb-3 p-3" id="newTableFilterContainer" style="display: none;">
                    <div class="form-row">
                        <div class="col-md-2">
                            <label for="newTableDateRange">Date Range</label>
                            <select id="newTableDateRange" class="form-control">
                                <option value="custom">Custom</option>
                                <option value="last30days" selected>Last 30 Days</option>
                                <option value="lastMonth">Last Month</option>
                                <option value="last6months">Last 6 Months</option>
                                <option value="thisYear">This Year</option>
                                <option value="lastYear">Last Year</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="newTableStartDate">Start Date</label>
                            <input type="date" id="newTableStartDate" class="form-control">
                        </div>
                        <div class="col-md-2">
                            <label for="newTableEndDate">End Date</label>
                            <input type="date" id="newTableEndDate" class="form-control">
                        </div>
                        <div class="col-md-2">
                            <label for="newTableDeviceType">Device Type</label>
                            <select id="newTableDeviceType" class="form-control">
                                <option value="all">All Devices</option>
                                <?php foreach ($device_types as $device): ?>
                                    <option value="<?= esc($device['device_type']) ?>"><?= esc($device['device_type']) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="newTableLocation">Location</label>
                            <select id="newTableLocation" class="form-control">
                                <option value="all">All Locations</option>
                                <?php foreach ($locations as $loc): ?>
                                    <option value="<?= esc($loc['location']) ?>"><?= esc($loc['location']) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="newTableReferrer">Referrer</label>
                            <select id="newTableReferrer" class="form-control">
                                <option value="all">All Referrers</option>
                                <?php foreach ($referrers as $ref): ?>
                                    <option value="<?= esc($ref['referrer']) ?>"><?= esc($ref['referrer']) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <button id="resetNewTableFilters" class="btn btn-secondary mt-4">Reset</button>
                        </div>
                    </div>
                </div>

                <!-- Table for New Visitors -->
                <div class="pb-20">
                    <table id="new-visitor-table" class="table display">
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
                            <?php foreach ($newVisitsData as $visitor): ?>
                                <tr>
                                    <td><?= esc($visitor['id']) ?></td>
                                    <td><?= esc($visitor['device_type']) ?></td>
                                    <td><?= esc($visitor['location']) ?></td>
                                    <td><?= strlen($visitor['referrer']) > 50 ? substr($visitor['referrer'], 0, 50) . '...' : esc($visitor['referrer']) ?></td>
                                    <td><?= esc($visitor['visit_type']) ?></td>
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

</body>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const newVisitsData = <?= json_encode($newVisitsData) ?>;
        let newVisitsChart;

        // Function to filter data for new visits
        function filterNewVisitsData(filters) {
            return newVisitsData.filter(data => {
                const matchesDateRange = checkDateRange(data.visited_at, filters.dateRange, filters.startDate, filters.endDate);
                const matchesBrowser = filters.browser === 'all' || data.browser === filters.browser;
                const matchesOperatingSystem = filters.operatingSystem === 'all' || data.operating_system === filters.operatingSystem;
                const matchesLocation = filters.location === 'all' || data.location === filters.location;
                const matchesReferrer = filters.referrer === 'all' || data.referrer === filters.referrer;

                return matchesDateRange && matchesBrowser && matchesOperatingSystem && matchesLocation && matchesReferrer;
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
        function aggregateNewVisitsData(filteredData) {
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
        function getNewVisitsChartData(aggregatedTrends) {
            const labels = aggregatedTrends.map(data => data.visit_date);
            const datasets = [{
                label: 'Total New Visits',
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

        // Function to update the new visits chart
        function updateNewVisitsChart(filters) {
            const filteredData = filterNewVisitsData(filters);
            const aggregatedData = aggregateNewVisitsData(filteredData);
            const chartData = getNewVisitsChartData(aggregatedData);

            // Update the visitor count
            const totalVisitors = aggregatedData.reduce((sum, data) => sum + data.total_visits, 0);
            document.getElementById('visitorCount').textContent = `Total: ${totalVisitors}`;

            if (newVisitsChart) {
                newVisitsChart.data = chartData;
                newVisitsChart.update();
            } else {
                const newVisitsChartCtx = document.getElementById('newVisitsChart').getContext('2d');
                newVisitsChart = new Chart(newVisitsChartCtx, {
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
            updateNewVisitsChart(filters);
        });
        document.getElementById('startDate').addEventListener('change', function() {
            const filters = getFilters();
            updateNewVisitsChart(filters);
        });
        document.getElementById('endDate').addEventListener('change', function() {
            const filters = getFilters();
            updateNewVisitsChart(filters);
        });
        document.getElementById('browser').addEventListener('change', function() {
            const filters = getFilters();
            updateNewVisitsChart(filters);
        });
        document.getElementById('operatingSystem').addEventListener('change', function() {
            const filters = getFilters();
            updateNewVisitsChart(filters);
        });
        document.getElementById('location').addEventListener('change', function() {
            const filters = getFilters();
            updateNewVisitsChart(filters);
        });
        document.getElementById('referrer').addEventListener('change', function() {
            const filters = getFilters();
            updateNewVisitsChart(filters);
        });

        // Reset filters
        document.getElementById('resetFilters').addEventListener('click', function() {
            document.getElementById('dateRange').value = 'custom';
            document.getElementById('startDate').value = '';
            document.getElementById('endDate').value = '';
            document.getElementById('browser').value = 'all';
            document.getElementById('operatingSystem').value = 'all';
            document.getElementById('location').value = 'all';
            document.getElementById('referrer').value = 'all';

            const filters = getFilters();
            updateNewVisitsChart(filters);
        });

        // Get all filters
        function getFilters() {
            return {
                dateRange: document.getElementById('dateRange').value,
                startDate: document.getElementById('startDate').value,
                endDate: document.getElementById('endDate').value,
                browser: document.getElementById('browser').value,
                operatingSystem: document.getElementById('operatingSystem').value,
                location: document.getElementById('location').value,
                referrer: document.getElementById('referrer').value
            };
        }

        updateNewVisitsChart(getFilters());
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
<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        // Initialize DataTable for New Visitors
        const newTable = $('#new-visitor-table').DataTable({
            paging: true,
            searching: true,
            pageLength: 20,
            lengthMenu: [10, 20, 30, 50],
            order: [
                [5, 'desc']
            ] // Sort by date (column index 5)
        });

        // Function to update the total results count
        function updateResultsCount() {
            const resultCount = newTable.rows({
                filter: 'applied'
            }).count();
            $('#newVisitorCount').text(`Total: ${resultCount}`);
        }

        // Toggle filter visibility for New Visitors Table
        $('#toggleNewTableFilters').on('click', function() {
            const filterContainer = $('#newTableFilterContainer');
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

        // Custom filter function for DataTable (New Visitors)
        $.fn.dataTable.ext.search.push(function(settings, data, dataIndex) {
            const dateRange = $('#newTableDateRange').val();
            let startDate = $('#newTableStartDate').val();
            let endDate = $('#newTableEndDate').val();
            const deviceType = $('#newTableDeviceType').val();
            const location = $('#newTableLocation').val();
            const referrer = $('#newTableReferrer').val();

            // Apply predefined date range if not custom
            if (dateRange !== 'custom') {
                const range = getDateRange(dateRange);
                startDate = range.start;
                endDate = range.end;
                $('#newTableStartDate').val(startDate);
                $('#newTableEndDate').val(endDate);
            }

            // Parse the row date correctly
            const rowDate = parseDate(data[5]); // 'Date and Time' column (index 5)
            const rowDevice = data[1]; // 'Device' column (index 1)
            const rowLocation = data[2]; // 'Location' column (index 2)
            const rowReferrer = data[3]; // 'Referrer' column (index 3)

            // Date filter
            if (startDate && new Date(startDate) > rowDate) return false;
            if (endDate && new Date(endDate) < rowDate) return false;

            // Other filters
            if (deviceType !== 'all' && rowDevice !== deviceType) return false;
            if (location !== 'all' && rowLocation !== location) return false;
            if (referrer !== 'all' && rowReferrer.indexOf(referrer) === -1) return false;

            return true;
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

        // Event listeners for New Visitors filters
        $('#newTableDateRange').on('change', function() {
            const range = this.value;
            const startDateInput = $('#newTableStartDate');
            const endDateInput = $('#newTableEndDate');
            if (range === 'custom') {
                startDateInput.prop('disabled', false).val('');
                endDateInput.prop('disabled', false).val('');
            } else {
                startDateInput.prop('disabled', true);
                endDateInput.prop('disabled', true);
                newTable.draw();
            }
        });

        $('#newTableStartDate, #newTableEndDate, #newTableDeviceType, #newTableLocation, #newTableReferrer').on('change', function() {
            newTable.draw();
        });

        // Reset filters for New Visitors Table
        $('#resetNewTableFilters').on('click', function() {
            $('#newTableDateRange').val('last30days');
            const range = getDateRange('last30days');
            $('#newTableStartDate').val(range.start).prop('disabled', true);
            $('#newTableEndDate').val(range.end).prop('disabled', true);
            $('#newTableDeviceType').val('all');
            $('#newTableLocation').val('all');
            $('#newTableReferrer').val('all');
            newTable.draw();
        });

        // Initial load with default filter
        const defaultRange = getDateRange('last30days');
        $('#newTableStartDate').val(defaultRange.start).prop('disabled', true);
        $('#newTableEndDate').val(defaultRange.end).prop('disabled', true);
        newTable.draw();

        // Update the results count initially and on redraw
        updateResultsCount();
        newTable.on('draw', function() {
            updateResultsCount();
        });
    });
</script>