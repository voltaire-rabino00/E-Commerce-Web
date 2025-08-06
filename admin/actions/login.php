<?php
session_start();
if (isset($_SESSION['admin'])) {
    header("Location: ../pages/dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link rel="stylesheet" href="../assets/css/login.css">
    <link rel="stylesheet" href="../assets/css/modal.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../node_modules/bootstrap-icons/font/bootstrap-icons.css">

</head>

<body>
    <!-- Login Form -->
    <form id="loginForm" action="login_process.php" method="POST" autocomplete="off">
        <div class="admin-icon">
            <i class="bi bi-person-circle"></i>
        </div>

        <h2>Admin Login</h2>
        <label>Username:</label>
        <input type="text" name="username" autocomplete="off" required>

        <label>Password:</label>
        <input type="password" name="password" autocomplete="off" required>

        <button type="submit">Login</button>
    </form>
    <!-- Loading Modal -->
    <div id="loadingModal">
        <div class="modal-content">
            <img src="../assets/gif/Spinner-3.gif" alt="Loading...">
            <div class="loading-text">Logging in...</div>
        </div>
    </div>
    <script src="../assets/js/modalGif.js"></script>
    </script>

</body>

</html>