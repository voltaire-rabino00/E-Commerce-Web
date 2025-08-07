<?php
// error_message.php: Show a modal error message with a back button
$errorMsg = isset($_GET['msg']) ? $_GET['msg'] : 'An error occurred.';
$backUrl = isset($_GET['back']) ? $_GET['back'] : '../actions/login.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Error</title>
    <link rel="stylesheet" href="../assets/css/modal.css">
    <link rel="stylesheet" href="../assets/css/error-modal.css">
</head>
<body>
    <div id="errorModal" class="error-modal-overlay">
        <div class="modal-content error-modal-content">
            <img src="../assets/gif/Spinner-3.gif" alt="Error" class="error-modal-img">
            <div id="errorText" class="error-modal-text">
                <?= htmlspecialchars($errorMsg) ?>
            </div>
            <button id="backToLoginBtn" class="error-modal-btn">Back</button>
        </div>
    </div>
    <script src="../assets/js/error-modal.js"></script>
    <script>
        // Fallback if JS fails to load
        document.getElementById('backToLoginBtn').onclick = function() {
            window.location.href = "<?= htmlspecialchars($backUrl) ?>";
        };
    </script>
</body>
</html>