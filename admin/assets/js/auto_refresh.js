    // Auto-logout after 5 minutes (300 seconds) of inactivity
    let inactivityTimeout = 300; // seconds
    let inactivityTimer;
    function resetInactivityTimer() {
        clearTimeout(inactivityTimer);
        inactivityTimer = setTimeout(function() {
            alert('Automatic logout because of inactivity');
            window.location.href = '../actions/login.php?timeout=1';
        }, inactivityTimeout * 1000);
    }
    // Reset timer on any user interaction
    ['click', 'mousemove', 'keydown', 'scroll', 'touchstart'].forEach(function(evt) {
        document.addEventListener(evt, resetInactivityTimer, true);
    });
    resetInactivityTimer(); // Start timer on page load