        const loginForm = document.getElementById('loginForm');
        const loadingModal = document.getElementById('loadingModal');
        loginForm.addEventListener('submit', function(e) {
            e.preventDefault();
            loadingModal.style.display = 'flex';
            setTimeout(() => {
                loginForm.submit();
            }, 2000);
        });