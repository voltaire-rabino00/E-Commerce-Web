<?php
include '../includes/auth.php';
include '../includes/db.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['admin'])) {
    http_response_code(403);
    exit('Unauthorized');
}

$username = $_SESSION['admin'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['profile_pic'])) {
    $file = $_FILES['profile_pic'];
    $allowed = ['jpg', 'jpeg', 'png'];
    $maxSize = 20 * 1024 * 1024;// 20MB
    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

    if (!in_array($ext, $allowed)) {
        exit('Invalid file type. Only JPG, JPEG, PNG allowed.');
    }
    if ($file['size'] > $maxSize) {
        exit('File too large. Max 20MB allowed.');
    }
    $check = getimagesize($file['tmp_name']);
    if ($check === false) {
        exit('File is not an image.');
    }

    $targetDir = '../assets/profile/';
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }
    $newFileName = $username . '_' . time() . '.' . $ext;
    $targetFile = $targetDir . $newFileName;

    if (move_uploaded_file($file['tmp_name'], $targetFile)) {
        // Save correct relative path to DB (with slash)
        $profilePath = '../assets/profile/' . $newFileName;
        $sql = "UPDATE admins SET profile_pic = ? WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $profilePath, $username);
        $stmt->execute();
        header('Location: ../pages/dashboard.php?upload=success');
        exit();
    } else {
        exit('Failed to upload image.');
    }
} else {
    exit('No file uploaded.');
}
