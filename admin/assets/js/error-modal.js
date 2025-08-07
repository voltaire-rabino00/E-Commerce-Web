// error-modal.js: Handles the back button for the error modal

document.addEventListener('DOMContentLoaded', function() {
    var backBtn = document.getElementById('backToLoginBtn');
    var urlParams = new URLSearchParams(window.location.search);
    var backUrl = urlParams.get('back') || '../actions/login.php';
    if (backBtn) {
        backBtn.onclick = function() {
            window.location.href = backUrl;
        };
    }
});