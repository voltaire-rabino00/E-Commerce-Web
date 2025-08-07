const loginForm = document.getElementById('loginForm');
const loadingModal = document.getElementById('loadingModal');
loginForm.addEventListener('submit', function(e) {
    e.preventDefault();
    loadingModal.style.display = 'flex';
setTimeout(() => {
    loginForm.submit();
}, 2000);
});

// Logout loading modal logic
const logoutLink = document.getElementById('logoutLink');
const loadingModalLogout = document.getElementById('loadingModal_logout');

if (logoutLink && loadingModalLogout) {
    logoutLink.addEventListener('click', function(e) {
        e.preventDefault();
        loadingModalLogout.style.display = 'flex';
        setTimeout(() => {
            window.location.href = logoutLink.href;
        }, 1500); // Show modal for 1.5 seconds before redirect
    });
}

// Reusable function for logout modal and redirect
function showLogoutModalAndRedirect() {
    // Create modal if not present
    let modal = document.getElementById('loadingModal_logout');
    if (!modal) {
        modal = document.createElement('div');
        modal.id = 'loadingModal_logout';
        modal.style.display = 'flex';
        modal.innerHTML = `
            <div class="modal-content">
                <img src="../assets/gif/Spinner-3.gif" alt="Loading...">
                <div id="loadingText">Logging out...</div>
            </div>
        `;
        document.body.appendChild(modal);
    } else {
        modal.style.display = 'flex';
    }
    setTimeout(function() {
        window.location.href = "logout.php";
    }, 1500);
}





