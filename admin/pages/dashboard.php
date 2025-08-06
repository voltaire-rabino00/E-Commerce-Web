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
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar p-0">
                <div class="sidebar-sticky pt-3">
                    <h4 class="text-center mb-3">Welcome,<?= htmlspecialchars($admin['name']) ?></h4>
                    <div class="d-flex flex-column align-items-center mb-3">
                        <img id="profilePreview" src="<?= htmlspecialchars($profileImg) ?>" alt="Profile" class="mb-2"
                            style="box-shadow: 0 4px 18px rgba(0,147,233,0.13); border-radius: 50%; width: 96px; height: 96px; object-fit: cover; border: 4px solid #fff; background: #fff;">
                        <form class="mt-2" action="../actions/upload_profile.php" method="POST" enctype="multipart/form-data">
                            <input type="file" id="profileImgInput" name="profile_pic" accept="image/*" required style="display:none;">
                            <button type="button" class="btn btn-primary mt-2" id="triggerProfileUpload">
                                <?= empty($admin['profile_pic']) ? 'Upload Profile Picture' : 'Update Profile Picture' ?>
                            </button>
                            <button type="submit" id="submitProfileBtn" style="display:none;"></button>
                        </form>
                    </div>
                    <ul class="nav flex-column mt-4">
                        <li class="nav-item"><a class="nav-link active" href="#">Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">User Management</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Product Management</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Orders</a></li>
                        <li class="nav-item"><a class="nav-link text-danger" href="../actions/logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
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
    <script>
        // When the button is clicked, open the file picker
        document.getElementById('triggerProfileUpload').addEventListener('click', function() {
            document.getElementById('profileImgInput').click();
        });
        // When a file is selected, show the submit button
        document.getElementById('profileImgInput').addEventListener('change', function() {
            document.getElementById('submitProfileBtn').style.display = 'inline-block';
            document.getElementById('submitProfileBtn').textContent = 'Save';
            document.getElementById('submitProfileBtn').className = 'btn btn-success mt-2';
        });
    </script>
</body>

</html>