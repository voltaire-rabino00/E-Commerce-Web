<?php
include '../includes/db.php';
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM admins WHERE username = '$username'";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) == 1) {
    $admin = mysqli_fetch_assoc($result);
    if (hash('sha256', $password) == $admin['password']) {
        $_SESSION['admin'] = $admin['username'];
        header("Location: ../pages/dashboard.php");
    } else {
        echo "Invalid password!";
    }
} else {
    echo "Admin not found!";
}
?>