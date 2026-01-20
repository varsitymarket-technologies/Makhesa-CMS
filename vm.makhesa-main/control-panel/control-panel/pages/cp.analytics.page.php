<?php
$internal_page = map_page()[3] ?? false;
if (empty($internal_page)) {
    $internal_page = "dashboard";
}
?>

<div class="wrapper" style="overflow: auto">
    <?php include_once "blade.navbar.sidebar.php"; ?>
    <div class="main-container" id="application_canvas" style="overflow: visible">
        <div style="padding: 1rem;">

        </div>
        <div class="main-header anim" style="--delay: 0s; text-align: center; padding: 1rem 3rem; position: inherit;">
            <svg style="width: 2rem;"  fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M64 64c0-17.7-14.3-32-32-32S0 46.3 0 64L0 400c0 44.2 35.8 80 80 80l400 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L80 416c-8.8 0-16-7.2-16-16L64 64zm406.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L320 210.7 262.6 153.4c-12.5-12.5-32.8-12.5-45.3 0l-96 96c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l73.4-73.4 57.4 57.4c12.5 12.5 32.8 12.5 45.3 0l128-128z"/></svg>
           Analytics
        </div>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <style>
            /* Optional basic styling for the container */
            #analytics-container {
                width: 80%;
                margin: 50px auto;
            }
        </style>

        <div id="analytics-container">
            <canvas id="salesChart"></canvas>
        </div>

        <script>
            // Data for the graph (can be dynamically generated in a real application)
            const labels = [
                'Oct 10',
                'Oct 11',
                'Oct 12',
                'Oct 13',
                'Oct 14',
                'Oct 15',
                'Oct 16'
            ];
            const data = {
                labels: labels,
                datasets: [{
                    label: 'Revenue ($)',
                    backgroundColor: 'rgba(75, 192, 192, 0.5)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                    data: [1250, 980, 1520, 1100, 1850, 1600, 2050], // Example revenue values
                }]
            };

            // Configuration options
            const config = {
                type: 'bar', // Can be 'line', 'pie', 'doughnut', etc.
                data: data,
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            };

            // Initialize and render the chart
            const salesChart = new Chart(
                document.getElementById('salesChart'),
                config
            );
        </script>


        <div>
    
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            
            <style>
                /* Basic mobile-responsive container styling using CSS Flexbox */
                #analytics-dashboard {
                    display: flex;
                    flex-wrap: wrap; /* Allows items to wrap onto the next line on small screens */
                    gap: 20px; /* Space between the charts */
                    padding: 10px;
                    max-width: 1200px;
                    margin: 20px auto;
                }

                .chart-container {
                    /* On large screens: take up 50% width each */
                    flex: 1 1 45%; 
                    min-width: 300px; /* Minimum width to ensure it doesn't shrink too much */
                    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
                    padding: 20px;
                    border-radius: 8px;
                }

                /* Enforce a height for the GeoChart to render properly */
                #geo-chart-div {
                    height: 350px; 
                    width: 100%;
                }

                /* Media query for very small screens (full width) */
                @media (max-width: 768px) {
                    .chart-container {
                        flex-basis: 100%; /* Full width on smaller screens */
                    }
                }
            </style>

            <div id="analytics-dashboard">
                
                <div class="chart-container">
                    <h2>Geographic Analytics</h2>
                    <div id="geo-chart-div"></div>
                </div>

                <div class="chart-container">
                    <h2>Most Visited Pages</h2>
                    <canvas id="pageViewsChart"></canvas>
                </div>

            </div>

            <script>
                // === 1. Geographic Graph (Google GeoChart) ===
                
                // Load the Google GeoChart package
                google.charts.load('current', {
                    'packages': ['geochart']
                });
                google.charts.setOnLoadCallback(drawRegionsMap);

                function drawRegionsMap() {
                    // Sample Data: Country Name and Session Count
                    const data = google.visualization.arrayToDataTable([
                        ['Country', 'Sessions'],
                        ['Germany', 8500],
                        ['United States', 22000],
                        ['Canada', 5100],
                        ['Brazil', 1500],
                        ['India', 9500],
                        ['United Kingdom', 6300]
                    ]);

                    const options = {
                        colorAxis: {
                            colors: ['#e7f3ff', '#004c99'] // Light Blue to Dark Blue gradient
                        },
                        defaultColor: '#f5f5f5', // Color for countries with no data
                        backgroundColor: '#ffffff',
                        datalessRegionColor: '#f5f5f5',
                        // Make the chart responsive by setting explicit width/height in CSS, and relying on the div
                        width: '100%',
                        keepAspectRatio: true,
                    };

                    const chart = new google.visualization.GeoChart(document.getElementById('geo-chart-div'));
                    chart.draw(data, options);

                    // Add a window resize listener to make Google Charts truly responsive
                    window.addEventListener('resize', function() {
                        chart.draw(data, options);
                    });
                }


                // === 2. Most Visited Pages Graph (Chart.js Bar Chart) ===
                
                // Sample Data: Page Path and View Count
                const pageLabels = [
                    '/product/new-widget',
                    '/checkout/cart',
                    '/category/sale',
                    '/home',
                    '/account/login'
                ];
                const pageViews = {
                    labels: pageLabels,
                    datasets: [{
                        label: 'Views',
                        data: [18000, 15500, 12000, 9500, 4800], // Example view counts
                        backgroundColor: 'rgba(255, 99, 132, 0.7)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    }]
                };

                // Configuration for the Horizontal Bar Chart
                const pageConfig = {
                    type: 'bar', // Set as 'bar' (it becomes horizontal with the indexAxis option)
                    data: pageViews,
                    options: {
                        responsive: true,
                        indexAxis: 'y', // This makes the bar chart horizontal
                        scales: {
                            x: {
                                beginAtZero: true,
                                title: {
                                    display: true,
                                    text: 'Total Views'
                                }
                            }
                        },
                        plugins: {
                            legend: {
                                display: false
                            }
                        }
                    }
                };

                // Initialize and render the chart after the DOM is ready
                document.addEventListener('DOMContentLoaded', () => {
                    new Chart(
                        document.getElementById('pageViewsChart'),
                        pageConfig
                    );
                });

            </script>

        </div>


        <div>
    
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        
        <script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/moment.min.js"></script>
        
        <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-moment@1.0.0/dist/chartjs-adapter-moment.min.js"></script>
        
        <style>
            /* Basic mobile-responsive container styling using CSS Flexbox */
            #time-series-dashboard {
                display: flex;
                flex-wrap: wrap; 
                gap: 20px; 
                padding: 10px;
                max-width: 1200px;
                margin: 20px auto;
            }

            .chart-container {
                /* On large screens: take up 50% width each */
                flex: 1 1 45%; 
                min-width: 300px; 
                box-shadow: 0 4px 8px rgba(0,0,0,0.1);
                padding: 20px;
                border-radius: 8px;
                background-color: #ffffff;
            }

            /* Media query for small screens (full width) */
            @media (max-width: 768px) {
                .chart-container {
                    flex-basis: 100%; 
                }
            }
        </style>


        <div id="time-series-dashboard">
            
            <div class="chart-container">
                <h2>Last 30 Days - Daily Orders 📅</h2>
                <canvas id="oneMonthChart"></canvas>
            </div>

            <div class="chart-container">
                <h2>Last 5 Years - Monthly Revenue Trend 📈</h2>
                <canvas id="fiveYearChart"></canvas>
            </div>

        </div>

        <script>
            // Helper function to generate dummy time-series data
            function generateTimeSeriesData(durationInDays, startValue, variance, unit) {
                const data = [];
                const endDate = moment();
                let currentDate = moment(endDate).subtract(durationInDays, 'days');

                for (let i = 0; i <= durationInDays; i++) {
                    const value = Math.max(0, startValue + (Math.random() - 0.5) * variance);
                    data.push({
                        x: currentDate.format('YYYY-MM-DD'),
                        y: Math.round(value)
                    });
                    currentDate = currentDate.add(1, unit);
                }
                return data;
            }


            // === 1. Last 30 Days (Daily Orders - Bar Chart) ===
            
            const oneMonthData = generateTimeSeriesData(30, 75, 50, 'days'); // 30 days of data

            const oneMonthConfig = {
                type: 'bar',
                data: {
                    datasets: [{
                        label: 'Daily Orders',
                        data: oneMonthData,
                        backgroundColor: 'rgba(54, 162, 235, 0.7)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1,
                    }]
                },
                options: {
                    responsive: true,
                    parsing: false, // Tell Chart.js to use the 'x' and 'y' properties
                    scales: {
                        x: {
                            type: 'time',
                            time: {
                                unit: 'day',
                                tooltipFormat: 'MMM D, YYYY'
                            },
                            title: {
                                display: true,
                                text: 'Date'
                            }
                        },
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Number of Orders'
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            };

            // Initialize 1-Month Chart
            new Chart(
                document.getElementById('oneMonthChart'),
                oneMonthConfig
            );


            // === 2. Last 5 Years (Monthly Revenue - Line Chart) ===

            // 60 months in 5 years
            const fiveYearData = generateTimeSeriesData(60, 50000, 30000, 'months'); 

            const fiveYearConfig = {
                type: 'line',
                data: {
                    datasets: [{
                        label: 'Monthly Revenue ($)',
                        data: fiveYearData,
                        borderColor: 'rgba(75, 192, 192, 1)',
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        tension: 0.4, // Smooth the line
                        fill: true
                    }]
                },
                options: {
                    responsive: true,
                    parsing: false,
                    scales: {
                        x: {
                            type: 'time',
                            time: {
                                unit: 'month',
                                tooltipFormat: 'MMM YYYY'
                            },
                            title: {
                                display: true,
                                text: 'Date'
                            }
                        },
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Revenue ($)'
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: true
                        }
                    }
                }
            };

            // Initialize 5-Year Chart
            new Chart(
                document.getElementById('fiveYearChart'),
                fiveYearConfig
            );
        </script>


        </div>

    </div>
</div>

<?php
#This is an Internal JS Function 

$page_id = hash("sha256", "new-website-page");
?>
<script>
    async function add_faq() {
        operate_loader();
        const question = document.getElementById("edt_faq_question").value;
        const response = document.getElementById("edt_response").value;

        if (question.trim() === "" || response.trim() === "") {
            operate_loader("stop");
            error_feedback('Please fill in both the question and response fields.');
            return;
        }
        const data = new URLSearchParams();
        data.append('request', 'create-faq');
        data.append('question', question);
        data.append('response', response);
        let registration_confirmation = await sendAndReceiveData(data, "<?php echo __PROTOCOL__ . __DOMAIN_NAME__ . '/@scripts/scripts.php'; ?>");
        try {
            registration_confirmation = JSON.parse(registration_confirmation);
            operate_loader('stop'); 
            if (registration_confirmation.success) {
                window.location = "<?php echo __PAGE__ . map_page()[2]; ?>/";
            } else {
                error_feedback(registration_confirmation.message);
            }
        } catch (error) {
            console.error(error);
            error_feedback();
            operate_loader('stop');
        }
    }

    async function delete_faq(faq_id) {
        operate_loader();
    
        const data = new URLSearchParams();
        data.append('request', 'delete-faq');
        data.append('id', faq_id);

        let registration_confirmation = await sendAndReceiveData(data, "<?php echo __PROTOCOL__ . __DOMAIN_NAME__ . '/scripts/scripts.php'; ?>");
        try {
            registration_confirmation = JSON.parse(registration_confirmation);
            operate_loader('stop'); 
            if (registration_confirmation.success) {
                window.location = "<?php echo __PAGE__ . map_page()[2]; ?>/";
            } else {
                error_feedback(registration_confirmation.message);
            }
        } catch (error) {
            console.error(error);
            error_feedback();
            operate_loader('stop');
        }
    }

    async function edit_faq(faq_id) {
        operate_loader();
        const question = document.getElementById("edt_faq_question").value;
        const response = document.getElementById("edt_response").value;

        if (question.trim() === "" || response.trim() === "") {
            operate_loader("stop");
            error_feedback('Please fill in both the question and response fields.');
            return;
        }
        const data = new URLSearchParams();
        data.append('request', 'update-faq');
        data.append('question', question);
        data.append('response', response);
        data.append('id', faq_id);

        let registration_confirmation = await sendAndReceiveData(data, "<?php echo __PROTOCOL__ . __DOMAIN_NAME__ . '/@scripts/scripts.php'; ?>");
        try {
            registration_confirmation = JSON.parse(registration_confirmation);
            operate_loader('stop'); 
            if (registration_confirmation.success) {
                window.location = "<?php echo __PAGE__ . map_page()[2]; ?>/";
            } else {
                error_feedback(registration_confirmation.message);
            }
        } catch (error) {
            console.error(error);
            error_feedback();
            operate_loader('stop');
        }
    }
</script>