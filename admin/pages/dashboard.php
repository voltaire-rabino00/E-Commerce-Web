<?php 
include '../includes/auth.php'; 
include '../includes/db.php'; 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css"> <!-- Your custom CSS -->
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar p-0">
                <div class="sidebar-sticky pt-3">
                    <h4 class="text-center">Admin Dashboard</h4>
                    <ul class="nav flex-column mt-4">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Users</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Orders</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-danger" href="../actions/logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h2>Data Analytics</h2>
                </div>
                <div class="row">
                    <div class="col-md-3 mb-4">
                        <div class="card analytics-card text-center">
                            <div class="card-body">
                                <h5 class="card-title">Total Users</h5>
                                <p class="card-text display-4">123</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-4">
                        <div class="card analytics-card text-center">
                            <div class="card-body">
                                <h5 class="card-title">Total Orders</h5>
                                <p class="card-text display-4">456</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-4">
                        <div class="card analytics-card text-center">
                            <div class="card-body">
                                <h5 class="card-title">Revenue</h5>
                                <p class="card-text display-4">$7,890</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-4">
                        <div class="card analytics-card text-center">
                            <div class="card-body">
                                <h5 class="card-title">Products</h5>
                                <p class="card-text display-4">78</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Analytics Graph -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Orders Per Month</h5>
                        <canvas id="ordersChart" height="80"></canvas>
                    </div>
                </div>
                <!-- You can add more analytics, charts, or tables here -->
            </main>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="../assets/js/app.js"></script>
</body>

</html>