<div class="wrapper" style="overflow: auto">
    <?php include_once "blade.navbar.sidebar.php"; ?>
    <div class="main-container" id="application_canvas" style="overflow: visible">

        <div class="main-header anim" style="--delay: 0s; text-align: center; padding: 1rem 3rem">
            Welcome Back
        </div>

        <style>
            .intro_container {
                background: linear-gradient(to right,
                        rgb(0, 0, 0, 0.4),
                        rgb(0, 0, 0, 0),
                    );
            }
        </style>
        <div>
            <div class="intro_container">
                <div
                    style="background-image: url(`https://cdn.varsitymarket.shop/img/timeline/cover-2024-11-arc.jpg`);">
                </div>
                Welcome
            </div>
        </div>

        <div class="main-blog anim"
            style="--delay: 0.1s; width: 100%; height: max-content; background-color: bisque; background: linear-gradient(181deg, #8e8e8f, transparent); margin: 1rem 0rem;">
            <div class="main-blog__author">
                <div class="author-img__wrapper">
                    <img class="author-img" src="favicon.png">
                </div>
                <div class="author-detail">
                    <div class="author-name" style="filter: blur(4px);">[USERNAME_PLACEHOLDER]</div>
                    <div class="author-info" style="filter: blur(1px);">
                        https://github.com/varsitymarket-tech/control-panel/</div>
                </div>
            </div>

            <div class="main-blog__time">Github Control</div>
        </div>







        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            }

            body {
                background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
                color: #e2e8f0;
                min-height: 100vh;
                padding: 20px;
            }

            .container {
                max-width: 1400px;
                margin: 0 auto;
            }

            header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 20px 0;
                margin-bottom: 30px;
                border-bottom: 1px solid #334155;
            }

            .logo {
                font-size: 28px;
                font-weight: 700;
                background: linear-gradient(90deg, #4f46e5 0%, #ec4899 100%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
            }

            .user-info {
                display: flex;
                align-items: center;
                gap: 15px;
            }

            .user-avatar {
                width: 45px;
                height: 45px;
                border-radius: 50%;
                background: linear-gradient(45deg, #7e22ce, #e879f9);
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 20px;
            }

            .dashboard-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
                gap: 25px;
                margin-bottom: 30px;
            }

            .card {
                background: #1e293b;
                border-radius: 16px;
                padding: 25px;
                box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
                transition: transform 0.3s ease, box-shadow 0.3s ease;
            }

            .card:hover {
                transform: translateY(-5px);
                box-shadow: 0 12px 20px rgba(0, 0, 0, 0.3);
            }

            .stat-card {
                display: flex;
                flex-direction: column;
            }

            .stat-header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 20px;
            }

            .stat-icon {
                width: 50px;
                height: 50px;
                border-radius: 12px;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 24px;
            }

            .followers-icon {
                background: linear-gradient(45deg, #3b82f6, #1e40af);
            }

            .engagement-icon {
                background: linear-gradient(45deg, #10b981, #047857);
            }

            .growth-icon {
                background: linear-gradient(45deg, #f59e0b, #b45309);
            }

            .posts-icon {
                background: linear-gradient(45deg, #ec4899, #be185d);
            }

            .stat-value {
                font-size: 32px;
                font-weight: 700;
                margin-bottom: 5px;
            }

            .stat-label {
                color: #94a3b8;
                font-size: 14px;
            }

            .stat-change {
                display: flex;
                align-items: center;
                margin-top: 10px;
                font-size: 14px;
                color: #10b981;
            }

            .chart-container {
                height: 250px;
                margin-top: 15px;
            }

            .chart-card {
                grid-column: span 2;
            }

            .half-grid {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 25px;
            }

            .post-card {
                display: flex;
                align-items: center;
                margin-bottom: 15px;
                padding-bottom: 15px;
                border-bottom: 1px solid #334155;
            }

            .post-card:last-child {
                margin-bottom: 0;
                padding-bottom: 0;
                border-bottom: none;
            }

            .post-img {
                width: 60px;
                height: 60px;
                border-radius: 12px;
                margin-right: 15px;
                object-fit: cover;
            }

            .post-info {
                flex: 1;
            }

            .post-title {
                font-weight: 600;
                margin-bottom: 5px;
            }

            .post-stats {
                display: flex;
                gap: 15px;
                color: #94a3b8;
                font-size: 13px;
            }

            .post-stat {
                display: flex;
                align-items: center;
                gap: 5px;
            }

            .audience-gender {
                display: flex;
                justify-content: space-around;
                margin-top: 20px;
            }

            .gender-stat {
                text-align: center;
            }

            .gender-value {
                font-size: 24px;
                font-weight: 700;
                margin: 10px 0;
            }

            .gender-label {
                color: #94a3b8;
                font-size: 14px;
            }

            .progress-bar {
                height: 8px;
                background: #334155;
                border-radius: 4px;
                overflow: hidden;
                margin: 15px 0;
            }

            .progress-fill {
                height: 100%;
                border-radius: 4px;
            }

            .age-group {
                margin-bottom: 15px;
            }

            .age-label {
                display: flex;
                justify-content: space-between;
                margin-bottom: 5px;
                font-size: 14px;
            }

            h2 {
                font-size: 20px;
                margin-bottom: 20px;
                color: #e2e8f0;
            }

            @media (max-width: 1000px) {
                .half-grid {
                    grid-template-columns: 1fr;
                }

                .chart-card {
                    grid-column: span 1;
                }
            }

            @media (max-width: 768px) {
                .dashboard-grid {
                    grid-template-columns: 1fr;
                }
            }
        </style>

        <div class="container">
            <header>
                <div class="logo">SocioAnalytics</div>
                <div class="user-info">
                    <div class="notifications">
                        <i class="fas fa-bell"></i>
                    </div>
                    <div class="user-avatar">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="user-name">@dev</div>
                </div>
            </header>

            <div class="dashboard-grid">
                <div class="card stat-card">
                    <div class="stat-header">
                        <h3>Followers</h3>
                        <div class="stat-icon followers-icon">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                    <div class="stat-value">184.3K</div>
                    <div class="stat-label">Total Followers</div>
                    <div class="stat-change">
                        <i class="fas fa-arrow-up"></i> 12.5% from last month
                    </div>
                </div>

                <div class="card stat-card">
                    <div class="stat-header">
                        <h3>Engagement Rate</h3>
                        <div class="stat-icon engagement-icon">
                            <i class="fas fa-heart"></i>
                        </div>
                    </div>
                    <div class="stat-value">8.2%</div>
                    <div class="stat-label">Avg. Engagement</div>
                    <div class="stat-change">
                        <i class="fas fa-arrow-up"></i> 3.1% from last month
                    </div>
                </div>

                <div class="card stat-card">
                    <div class="stat-header">
                        <h3>Growth</h3>
                        <div class="stat-icon growth-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                    </div>
                    <div class="stat-value">+5,289</div>
                    <div class="stat-label">New Followers</div>
                    <div class="stat-change">
                        <i class="fas fa-arrow-up"></i> 8.7% from last month
                    </div>
                </div>

                <div class="card stat-card">
                    <div class="stat-header">
                        <h3>Posts</h3>
                        <div class="stat-icon posts-icon">
                            <i class="fas fa-image"></i>
                        </div>
                    </div>
                    <div class="stat-value">36</div>
                    <div class="stat-label">This Month</div>
                    <div class="stat-change">
                        <i class="fas fa-arrow-up"></i> 4 posts from last month
                    </div>
                </div>

                <div class="card chart-card">
                    <h2>Follower Growth</h2>
                    <div class="chart-container">
                        <canvas id="growthChart"></canvas>
                    </div>
                </div>

                <div class="card chart-card">
                    <h2>Engagement Metrics</h2>
                    <div class="chart-container">
                        <canvas id="engagementChart"></canvas>
                    </div>
                </div>

                <div class="card">
                    <h2>Top Posts</h2>
                    <div class="post-card">
                        <img src="https://picsum.photos/id/237/200/200" class="post-img" alt="Post">
                        <div class="post-info">
                            <div class="post-title">Sunset Vibes 🌅</div>
                            <div class="post-stats">
                                <div class="post-stat"><i class="fas fa-heart"></i> 12.4K</div>
                                <div class="post-stat"><i class="fas fa-comment"></i> 1.2K</div>
                                <div class="post-stat"><i class="fas fa-share"></i> 589</div>
                            </div>
                        </div>
                    </div>

                    <div class="post-card">
                        <img src="https://picsum.photos/id/1005/200/200" class="post-img" alt="Post">
                        <div class="post-info">
                            <div class="post-title">Morning Coffee ☕</div>
                            <div class="post-stats">
                                <div class="post-stat"><i class="fas fa-heart"></i> 9.8K</div>
                                <div class="post-stat"><i class="fas fa-comment"></i> 987</div>
                                <div class="post-stat"><i class="fas fa-share"></i> 421</div>
                            </div>
                        </div>
                    </div>

                    <div class="post-card">
                        <img src="https://picsum.photos/id/1025/200/200" class="post-img" alt="Post">
                        <div class="post-info">
                            <div class="post-title">Product Launch 🚀</div>
                            <div class="post-stats">
                                <div class="post-stat"><i class="fas fa-heart"></i> 8.7K</div>
                                <div class="post-stat"><i class="fas fa-comment"></i> 756</div>
                                <div class="post-stat"><i class="fas fa-share"></i> 312</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <h2>Audience Demographics</h2>

                    <div class="audience-gender">
                        <div class="gender-stat">
                            <div class="gender-label">Male</div>
                            <div class="gender-value">62%</div>
                        </div>
                        <div class="gender-stat">
                            <div class="gender-label">Female</div>
                            <div class="gender-value">35%</div>
                        </div>
                        <div class="gender-stat">
                            <div class="gender-label">Other</div>
                            <div class="gender-value">3%</div>
                        </div>
                    </div>

                    <h3 style="margin-top: 25px;">Age Groups</h3>

                    <div class="age-group">
                        <div class="age-label">
                            <span>18-24</span>
                            <span>32%</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: 32%; background: #4f46e5;"></div>
                        </div>
                    </div>

                    <div class="age-group">
                        <div class="age-label">
                            <span>25-34</span>
                            <span>41%</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: 41%; background: #ec4899;"></div>
                        </div>
                    </div>

                    <div class="age-group">
                        <div class="age-label">
                            <span>35-44</span>
                            <span>18%</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: 18%; background: #10b981;"></div>
                        </div>
                    </div>

                    <div class="age-group">
                        <div class="age-label">
                            <span>45+</span>
                            <span>9%</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: 9%; background: #f59e0b;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            // Wait for the DOM to be fully loaded
            document.addEventListener('DOMContentLoaded', function () {
                // Follower Growth Chart
                const growthCtx = document.getElementById('growthChart').getContext('2d');
                const growthChart = new Chart(growthCtx, {
                    type: 'line',
                    data: {
                        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                        datasets: [{
                            label: 'Followers (in K)',
                            data: [120, 125, 130, 132, 138, 142, 148, 155, 162, 170, 177, 184.3],
                            borderColor: '#4f46e5',
                            backgroundColor: 'rgba(79, 70, 229, 0.1)',
                            borderWidth: 3,
                            fill: true,
                            tension: 0.4
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: false
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: false,
                                grid: {
                                    color: 'rgba(255, 255, 255, 0.1)'
                                },
                                ticks: {
                                    color: '#94a3b8'
                                }
                            },
                            x: {
                                grid: {
                                    color: 'rgba(255, 255, 255, 0.1)'
                                },
                                ticks: {
                                    color: '#94a3b8'
                                }
                            }
                        }
                    }
                });

                // Engagement Metrics Chart
                const engagementCtx = document.getElementById('engagementChart').getContext('2d');
                const engagementChart = new Chart(engagementCtx, {
                    type: 'bar',
                    data: {
                        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                        datasets: [{
                            label: 'Engagement Rate (%)',
                            data: [5.2, 5.5, 5.8, 6.2, 6.5, 6.7, 7.0, 7.3, 7.6, 7.9, 8.0, 8.2],
                            backgroundColor: 'rgba(236, 72, 153, 0.8)',
                            borderColor: 'rgba(236, 72, 153, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: false
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                grid: {
                                    color: 'rgba(255, 255, 255, 0.1)'
                                },
                                ticks: {
                                    color: '#94a3b8'
                                }
                            },
                            x: {
                                grid: {
                                    color: 'rgba(255, 255, 255, 0.1)'
                                },
                                ticks: {
                                    color: '#94a3b8'
                                }
                            }
                        }
                    }
                });
            });
        </script>

    </div>
</div>