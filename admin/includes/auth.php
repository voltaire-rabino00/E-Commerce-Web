<?php
session_start();

$timeout = 300; // 300 seconds = 5 minutes

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY']) > $timeout) {
    // Last request was more than 5 minutes ago
    session_unset();     // Unset session variables
    session_destroy();   // Destroy session
    header("Location: ../login.php?timeout=1");
    exit();
}

$_SESSION['LAST_ACTIVITY'] = time(); // update last activity timestamp


// Check if the session is not started
if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
    exit();
}
