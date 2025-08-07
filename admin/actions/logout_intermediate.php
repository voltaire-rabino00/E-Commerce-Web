<?php
// logout_intermediate.php is now only responsible for redirecting after a delay
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Logging Out...</title>
    <link rel="stylesheet" href="../assets/css/modal.css">
    <style>body { margin:0; }</style>
</head>
<body>
    <div id="loadingModal_logout" style="display:flex;">
        <div class="modal-content">
            <img src="../assets/gif/Spinner-3.gif" alt="Loading...">
            <div id="loadingText">Logging out...</div>
        </div>
    </div>
    <script>
        setTimeout(function() {
            window.location.href = "logout.php";
        }, 1500);
    </script>
</body>
</html>
