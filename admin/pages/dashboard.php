<?php
include '../includes/auth.php';
include '../includes/db.php';
include '../actions/profile_image.php';


if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['admin'])) {
    header("Location: ../actions/login.php");
    exit();
}

$username = $_SESSION['admin'];

$sql = "SELECT * FROM admins WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$admin = $result->fetch_assoc();

$profileImg = getProfileImage($admin['profile_pic'] ?? null);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/modal.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar p-0">
                <div class="sidebar-sticky pt-3">
                    <h4 class="text-center mb-3">Welcome, <?= htmlspecialchars($admin['name']) ?></h4>
                    <div class="d-flex flex-column align-items-center mb-3">
                        <img id="profilePreview" src="<?= htmlspecialchars($profileImg) ?>" alt="Profile"
                            class="profile-img mb-2">
                        <form class="profile-upload-form mt-2" action="../actions/upload_profile.php" method="POST"
                            enctype="multipart/form-data">
                            <input type="file" id="profileImgInput" name="profile_pic" accept="image/*" required
                                class="profile-img-input">
                            <button type="button" class="profile-upload-btn btn btn-primary mt-2"
                                id="triggerProfileUpload">
                                <?= empty($admin['profile_pic']) ? 'Upload Profile Picture' : 'Update Profile Picture' ?>
                            </button>
                            <button type="submit" id="submitProfileBtn" class="profile-submit-btn"></button>
                        </form>
                    </div>
                    <ul class="nav flex-column mt-4">
                        <li class="nav-item">
                            <a class="nav-link active" href="#" onclick="showSection('dashboard', this)">
                                <i class="bi bi-bar-chart"></i> Dashboard
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#" onclick="showSection('userManagement', this)">
                                <i class="bi bi-people"></i> User
                                Management</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="#" onclick="showSection('productManagement', this)">
                                <i class="bi bi-box-seam"></i> Product Management
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="bi bi-bag-check"></i> Orders</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" onclick="showSection('settings', this)">
                                <i class="bi bi-gear"></i> Settings
                            </a>
                        </li>
                        <li class="nav-item mt-auto">
                            <a class="nav-link logout" href="../actions/logout_intermediate.php" id="logoutLink">
                                <i class="bi bi-box-arrow-right"></i> Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <!-- Theme Toggle Icon -->
                <div class="theme-toggle-container d-flex justify-content-end align-items-center"
                    style="margin-top: 18px; margin-bottom: -30px;">
                    <button id="themeToggleBtn" class="btn btn-light border-0" aria-label="Toggle theme">
                        <i id="themeToggleIcon" class="bi bi-moon-stars-fill" style="font-size: 1.5rem;"></i>
                    </button>
                </div>
                <!-- DASHBOARD SECTION -->
                <div id="dashboard">
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
                </div>
                <!-- END of #dashboard -->

                <!-- USER MANAGEMENT SECTION -->
                <div id="userManagement" style="display: none;">
                    <?php include 'partial/user_management.php'; ?>
                </div>

                <!-- Product Management -->
                <div id="productManagement" style="display: none;">
                    <?php include 'partial/product_management.php'; ?>
                </div>


            </main>
        </div>
    </div>

    <!-- Logout GIF Modal -->
    <div id="loadingModal_logout">
        <div class="modal-content">
            <img src="../assets/gif/Spinner-3.gif" alt="Loading...">
            <div id="loadingText">Logging out...</div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script src="../assets/js/app.js"></script>
    <script src="../assets/js/update_profile.js"></script>
    <script src="../assets/js/modalGif.js"></script>
    <script src="../assets/js/auto_refresh.js"></script>
</body>

</html>