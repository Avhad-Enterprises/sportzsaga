<!-- Head View Start -->
<?= $this->include('head_view') ?>
<!-- Head View End -->

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/dragscroll/0.5.1/dragscroll.min.js"></script>

<style>
    #map {
        height: 500px;
        width: 100%;
        margin-top: 20px;
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
                <h2 class="h3 mb-0">Overview</h2>
            </div>

            <div class="row pb-10">
                <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
                    <div class="card-box height-100-p widget-style3">
                        <div class="d-flex flex-wrap">
                            <div class="widget-data">
                                <div class="weight-700 font-24 text-dark"><?= $usersVisitedToday ?></div>
                                <div class="font-14 text-secondary weight-500">
                                    Users Visited Today
                                </div>
                            </div>
                            <div class="widget-icon">
                                <div class="icon" data-color="#00eccf">
                                    <i class="icon-copy bi bi-bar-chart-line"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
                    <div class="card-box height-100-p widget-style3">
                        <div class="d-flex flex-wrap">
                            <div class="widget-data">
                                <div class="weight-700 font-24 text-dark"><?= $newUsersToday ?></div>
                                <div class="font-14 text-secondary weight-500">
                                    New Users Today
                                </div>
                            </div>
                            <div class="widget-icon">
                                <div class="icon" data-color="#ff5b5b">
                                    <span class="icon-copy bi bi-bar-chart-line"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
                    <div class="card-box height-100-p widget-style3">
                        <div class="d-flex flex-wrap">
                            <div class="widget-data">
                                <div class="weight-700 font-24 text-dark"><?= $avgDesktopLoadTime ?> seconds</div>
                                <div class="font-14 text-secondary weight-500">Loading Time (Desktop)</div>
                            </div>
                            <div class="widget-icon">
                                <div class="icon" data-color="#09cc06">
                                    <i class="icon-copy bi bi-bar-chart-line" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
                    <div class="card-box height-100-p widget-style3">
                        <div class="d-flex flex-wrap">
                            <div class="widget-data">
                                <div class="weight-700 font-24 text-dark"><?= number_format($avgMobileLoadTime, 2) ?>
                                    seconds</div>
                                <div class="font-14 text-secondary weight-500">Loading Time (Mobile)</div>
                            </div>
                            <div class="widget-icon">
                                <div class="icon" data-color="#09cc06">
                                    <i class="icon-copy bi bi-bar-chart-line" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="my-2">
                <div class="ChartTitles">
                    <h4 class="text-blue">Views</h4>
                    <a href="<?= base_url('analytics/visits_overview') ?>">More <i
                            class="fa-solid fa-chevron-right"></i></a>
                </div>
                <div class="AnalycticschartsSli dragscroll">
                    <div class="AnalycticschartBox p-3">
                        <h4 class="text-blue">Total Views <small style="font-size: 50%;">(Last 30 Days)</small></h4>
                        <a href="<?= base_url('analytics/visits_overview') ?>">
                            <canvas id="totalVisitsChart"></canvas>
                        </a>
                    </div>
                    <div class="AnalycticschartBox p-3">
                        <h4 class="text-blue">Desktop Views <small style="font-size: 50%;">(Last 30 Days)</small></h4>
                        <a href="<?= base_url('analytics/desktop_visits_overview') ?>">
                            <canvas id="desktopVisitsChart"></canvas>
                        </a>
                    </div>
                    <div class="AnalycticschartBox p-3">
                        <h4 class="text-blue">Mobile Views <small style="font-size: 50%;">(Last 30 Days)</small></h4>
                        <a href="<?= base_url('analytics/mobile_visits_overview') ?>">
                            <canvas id="mobileVisitsChart"></canvas>
                        </a>
                    </div>
                    <div class="AnalycticschartBox p-3">
                        <h4 class="text-blue">Tablet Views <small style="font-size: 50%;">(Last 30 Days)</small></h4>
                        <a href="<?= base_url('analytics/tablet_visits_overview') ?>">
                            <canvas id="tabletVisitsChart"></canvas>
                        </a>
                    </div>
                    <div class="AnalycticschartBox p-3">
                        <h4 class="text-blue">New Views <small style="font-size: 50%;">(Last 30 Days)</small></h4>
                        <a href="<?= base_url('analytics/New_visits_overview') ?>">
                            <canvas id="newVisitsChart"></canvas>
                        </a>
                    </div>
                    <div class="AnalycticschartBox p-3">
                        <h4 class="text-blue">Returning Views</h4>
                        <a href="<?= base_url('analytics/') ?>">
                            <canvas id="returningVisitsChart"></canvas>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer View Start -->
    <?= $this->include('footer_view') ?>
    <!-- Footer View End -->

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        // Data passed from backend
        const userBehaviorLogs = <?= json_encode($userBehaviorLogs) ?>;

        // Debugging: Log data in the console
        console.log("User Behavior Logs: ", userBehaviorLogs);

        // User Behavior Line Chart
        const behaviorLineCtx = document.getElementById('userBehaviorBarChart').getContext('2d');
        if (userBehaviorLogs.length > 0) {
            const behaviorLabels = userBehaviorLogs.map(log => log.log_date);
            const behaviorCounts = userBehaviorLogs.map(log => log.event_count);

            new Chart(behaviorLineCtx, {
                type: 'line', 
                data: {
                    labels: behaviorLabels,
                    datasets: [{
                        label: 'Event Count',
                        data: behaviorCounts,
                        backgroundColor: 'rgba(54, 162, 235, 0.2)', 
                        borderColor: 'rgba(54, 162, 235, 1)', 
                        borderWidth: 2,
                        fill: true, 
                        tension: 0.4, 
                        pointBackgroundColor: 'rgba(54, 162, 235, 1)',
                        pointBorderColor: '#fff', 
                        pointHoverBackgroundColor: '#fff', 
                        pointHoverBorderColor: 'rgba(54, 162, 235, 1)', 
                    }],
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top',
                        },
                    },
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Dates',
                            },
                            ticks: {
                                autoSkip: true,
                                maxRotation: 45,
                                minRotation: 0,
                            },
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'Event Count',
                            },
                            beginAtZero: true,
                        },
                    },
                },
            });
        } else {
            console.error("No user behavior data available.");
        }
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBbQ8Hl3aMcxF2jAGFirEl_sv1cxjRG7cU&callback=initMap"
        async defer></script>

    <!-- Font Awesome for the icon -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <script>
        // Data passed from backend
        const visitorLocations = <?= json_encode($visitorLocations) ?>;

        // Initialize Google Maps
        function initMap() {
            const map = new google.maps.Map(document.getElementById('map'), {
                zoom: 2, // World view
                center: {
                    lat: 20,
                    lng: 0
                }, // Centered on the world
            });

            // Create a custom icon using Font Awesome icon
            const createIcon = () => {
                const iconElement = document.createElement('div');
                iconElement.innerHTML = `<i class="fa-solid fa-location-dot" style="color: #bd0000; font-size: 25px;"></i>`;
                const iconUrl = 'data:image/svg+xml;charset=UTF-8,' + encodeURIComponent(iconElement.outerHTML);
                return iconUrl;
            };

            const customIconUrl = createIcon();

            // Add markers for visitor locations
            visitorLocations.forEach(location => {
                if (location.location) {
                    const [city, state, country] = location.location.split(',').map(l => l.trim());
                    const geocodeUrl = `https://maps.googleapis.com/maps/api/geocode/json?address=${encodeURIComponent(location.location)}&key=AIzaSyBbQ8Hl3aMcxF2jAGFirEl_sv1cxjRG7cU`;

                    // Fetch latitude and longitude for each location using Google Geocoding API
                    fetch(geocodeUrl)
                        .then(response => response.json())
                        .then(data => {
                            if (data.status === 'OK' && data.results[0]) {
                                const {
                                    lat,
                                    lng
                                } = data.results[0].geometry.location;

                                // Create a custom marker for each location using Font Awesome icon
                                const marker = new google.maps.Marker({
                                    position: {
                                        lat,
                                        lng
                                    },
                                    map: map,
                                    icon: customIconUrl, // Use custom icon URL
                                    title: `${city || ''}, ${state || ''}, ${country || ''}`
                                });

                                // Create an InfoWindow for each marker
                                const infoWindow = new google.maps.InfoWindow({
                                    content: `<b>${city || ''}, ${state || ''}, ${country || ''}</b><br>Visitors: ${location.count}`
                                });

                                // Open InfoWindow when marker is clicked
                                marker.addListener('click', function () {
                                    infoWindow.open(map, marker);
                                });
                            }
                        });
                }
            });
        }
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const visitorTrends = <?= json_encode($visitorTrends) ?>;
            console.log("Visitor Trends: ", visitorTrends);

            // Labels for all charts
            const visitorLabels = visitorTrends.map(data => data.visit_date);

            // Data for each chart
            const totalVisits = visitorTrends.map(data => data.total_visits);
            const desktopVisits = visitorTrends.map(data => data.desktop_visits);
            const mobileVisits = visitorTrends.map(data => data.mobile_visits);
            const tabletVisits = visitorTrends.map(data => data.tablet_visits);
            const newVisits = visitorTrends.map(data => data.new_visits);
            const returningVisits = visitorTrends.map(data => data.returning_visits);

            // Total Visits Chart
            const totalVisitsCtx = document.getElementById('totalVisitsChart').getContext('2d');
            new Chart(totalVisitsCtx, {
                type: 'line',
                data: {
                    labels: visitorLabels,
                    datasets: [{
                        label: 'Total Visits',
                        data: totalVisits,
                        borderColor: '#36A2EB',
                        backgroundColor: 'rgba(255, 255, 255, 0.2)',
                        fill: true,
                        tension: 0.3,
                    }]
                },
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
                        },
                    },
                },
            });

            // Desktop Visits Chart
            const desktopVisitsCtx = document.getElementById('desktopVisitsChart').getContext('2d');
            new Chart(desktopVisitsCtx, {
                type: 'line',
                data: {
                    labels: visitorLabels,
                    datasets: [{
                        label: 'Desktop Visits',
                        data: desktopVisits,
                        borderColor: '#36A2EB',
                        backgroundColor: 'rgba(255, 255, 255, 0.2)',
                        fill: false,
                        tension: 0.3,
                    }]
                },
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
                        },
                    },
                },
            });

            // Mobile Visits Chart
            const mobileVisitsCtx = document.getElementById('mobileVisitsChart').getContext('2d');
            new Chart(mobileVisitsCtx, {
                type: 'line',
                data: {
                    labels: visitorLabels,
                    datasets: [{
                        label: 'Mobile Visits',
                        data: mobileVisits,
                        borderColor: '#36A2EB',
                        backgroundColor: 'rgba(255, 255, 255, 0.2)',
                        fill: false,
                        tension: 0.3,
                    }]
                },
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
                        },
                    },
                },
            });

            // Tablet Visits Chart
            const tabletVisitsCtx = document.getElementById('tabletVisitsChart').getContext('2d');
            new Chart(tabletVisitsCtx, {
                type: 'line',
                data: {
                    labels: visitorLabels,
                    datasets: [{
                        label: 'Tablet Visits',
                        data: tabletVisits,
                        borderColor: '#36A2EB',
                        backgroundColor: 'rgba(255, 255, 255, 0.2)',
                        fill: false,
                        tension: 0.3,
                    }]
                },
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
                        },
                    },
                },
            });

            // New Visits Chart
            const newVisitsCtx = document.getElementById('newVisitsChart').getContext('2d');
            new Chart(newVisitsCtx, {
                type: 'line',
                data: {
                    labels: visitorLabels,
                    datasets: [{
                        label: 'New Visits',
                        data: newVisits,
                        borderColor: '#36A2EB',
                        backgroundColor: 'rgba(255, 255, 255, 0.2)',
                        fill: false,
                        tension: 0.3,
                    }]
                },
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
                        },
                    },
                },
            });

            // Returning Visits Chart
            const returningVisitsCtx = document.getElementById('returningVisitsChart').getContext('2d');
            new Chart(returningVisitsCtx, {
                type: 'line',
                data: {
                    labels: visitorLabels,
                    datasets: [{
                        label: 'Returning Visits',
                        data: returningVisits,
                        borderColor: '#36A2EB',
                        backgroundColor: 'rgba(255, 255, 255, 0.2)',
                        fill: false,
                        tension: 0.3,
                    }]
                },
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
                        },
                    },
                },
            });
        });
    </script>

</body>