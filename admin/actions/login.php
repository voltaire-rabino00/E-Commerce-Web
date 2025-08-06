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
</head>

<body>
    <!-- Login Form -->
    <form action="login_process.php" method="POST">
        <h2>Admin Login</h2>
        <label>Username:</label>
        <input type="text" name="username" required>

        <label>Password:</label>
        <input type="password" name="password" required>

        <button type="submit">Login</button>
    </form>

</body>

</html>