<?php 
include '../includes/auth.php'; 
include '../includes/db.php'; 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<h2>Welcome, <?php echo $_SESSION['admin']; ?>!</h2>
<a href="../logout.php">Logout</a>
