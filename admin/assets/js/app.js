const ctx = document.getElementById('ordersChart').getContext('2d');
        const ordersChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug'],
                datasets: [{
                    label: 'Orders',
                    data: [30, 45, 60, 40, 80, 55, 70, 90],
                    backgroundColor: 'rgba(0, 123, 255, 0.6)',
                    borderColor: 'rgba(0, 123, 255, 1)',
                    borderWidth: 1,
                    borderRadius: 8
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: false },
                    title: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: { stepSize: 20 }
                    }
                }
            }
        });

    //   

  function showSection(sectionId, clickedLink = null) {
    const sections = ['dashboard', 'userManagement'];
    const navLinks = document.querySelectorAll('.nav-link');

    // Show selected section
    sections.forEach(id => {
      const section = document.getElementById(id);
      if (section) {
        section.style.display = (id === sectionId) ? 'block' : 'none';
      }
    });

    // Highlight nav link
    navLinks.forEach(link => link.classList.remove('active'));
    if (clickedLink) clickedLink.classList.add('active');
  }

  // Default section on load
  window.onload = function () {
    showSection('dashboard');
  };

// Theme toggle logic
const themeToggleBtn = document.getElementById('themeToggleBtn');
const themeToggleIcon = document.getElementById('themeToggleIcon');

function setTheme(isDark) {
    if (isDark) {
        document.body.classList.add('dark-theme');
        if (themeToggleIcon) themeToggleIcon.className = 'bi bi-sun-fill';
        localStorage.setItem('theme', 'dark');
    } else {
        document.body.classList.remove('dark-theme');
        if (themeToggleIcon) themeToggleIcon.className = 'bi bi-moon-stars-fill';
        localStorage.setItem('theme', 'light');
    }
}

if (themeToggleBtn) {
    themeToggleBtn.addEventListener('click', function() {
        const isDark = !document.body.classList.contains('dark-theme');
        setTheme(isDark);
    });
}

// On page load, set theme from localStorage
(function() {
    const savedTheme = localStorage.getItem('theme');
    if (savedTheme === 'dark') {
        setTheme(true);
    } else {
        setTheme(false);
    }
})();

