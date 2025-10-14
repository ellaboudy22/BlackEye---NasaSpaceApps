<div id="starfield">
        <div class="stars"></div>
        <div class="stars2"></div>
        <div class="galaxy-spiral"></div>
        <div id="shooting-stars-container"></div>
    </div>

    <nav class="navbar">
        <div class="nav-container">
            <div class="nav-logo">
                <img src="assets/images/logo.png" alt="BlackEye Logo" class="logo-img">
                <div class="header-links-row">
                    <!-- <a href="https://github.com/ellaboudy22/BlackEye---NasaSpaceApps" class="footer-icon-link" target="_blank" rel="noopener noreferrer" title="View Repository">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="footer-icon">
                            <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                        </svg>
                    </a> -->
                    <a href="https://www.canva.com/design/DAG0wQJunos/MWhaah2OwT0ehGiDVl_6Lw/view?utm_content=DAG0wQJunos&utm_campaign=designshare&utm_medium=link2&utm_source=uniquelinks&utlId=h3d2e8cf762" class="footer-icon-link" target="_blank" rel="noopener noreferrer" title="View Presentation">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="footer-icon">
                            <path d="M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M18,20H6V4H13V9H18V20Z"/>
                        </svg>
                    </a>
                </div>
            </div>
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="https://blackeye.site" class="nav-link active">Home</a>
                </li>
                <li class="nav-item">
                    <a href="about.php" class="nav-link">About</a>
                </li>
                <li class="nav-item">
                    <a href="solution.php" class="nav-link">Our Solution</a>
                </li>
                <li class="nav-item">
                    <a href="contact.php" class="nav-link">Contact</a>
                </li>
                <li class="nav-item">
                    <a href="model-dashboard.php" class="nav-link try-button">
                        <span class="try-text">Try!</span>
                        <span class="try-glow"></span>
                    </a>
                </li>
            </ul>
            <button class="hamburger" type="button" aria-label="Toggle navigation" aria-expanded="false">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </button>
        </div>
    </nav>

    <script>
function initNavigation() {
    const hamburger = document.querySelector('.hamburger');
    const navMenu = document.querySelector('.nav-menu');
    const navLinks = document.querySelectorAll('.nav-link');
    const navbar = document.querySelector('.navbar');

    // Toggle mobile menu
    if (hamburger && navMenu) {
        hamburger.addEventListener('click', function() {
            const isActive = this.classList.toggle('active');
            navMenu.classList.toggle('active');
            document.body.classList.toggle('menu-open');
            this.setAttribute('aria-expanded', isActive);
        });

        // Close menu when clicking a link
        navLinks.forEach(link => {
            link.addEventListener('click', function() {
                if (window.innerWidth < 768) {
                    hamburger.classList.remove('active');
                    navMenu.classList.remove('active');
                    document.body.classList.remove('menu-open');
                    hamburger.setAttribute('aria-expanded', 'false');
                }
            });
        });
    }

    // Navbar scroll effect
    if (navbar) {
        window.addEventListener('scroll', function() {
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
    }
}
        </script>
