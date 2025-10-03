<style>
/* Header Navigation Styles */
.navbar {
    position: fixed;
    top: 20px;
    left: 50%;
    transform: translateX(-50%);
    width: 90%;
    max-width: 1200px;
    background: rgba(0, 0, 0, 0.8);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(107, 70, 193, 0.3);
    border-radius: 25px;
    z-index: 1000;
    transition: all 0.3s ease;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
    overflow: hidden;
}

.navbar.scrolled {
    backdrop-filter: blur(30px);
    background: rgba(0, 0, 0, 0.9);
    box-shadow: 0 12px 40px rgba(0, 0, 0, 0.4);
}

.nav-container {
    padding: 0 1rem;
    height: 70px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.nav-logo {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.logo-img {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    transition: var(--transition-normal);
}

.logo-text {
    font-family: var(--font-primary);
    font-size: 1.2rem;
    font-weight: 500;
    color: var(--cosmic-teal);
    letter-spacing: 0.5px;
}

/* Desktop Navigation */
.nav-menu {
    display: flex;
    list-style: none;
    gap: 0.5rem;
    margin: 0;
    padding: 0;
}

.nav-link {
    color: var(--star-white);
    text-decoration: none;
    font-weight: 500;
    transition: var(--transition-normal);
    position: relative;
    padding: 0.8rem 1.5rem;
    border-radius: 12px;
    background: transparent;
    font-size: 1rem;
    display: flex;
    align-items: center;
}

.nav-link:hover,
.nav-link.active {
    color: var(--stellar-blue);
    background: rgba(59, 130, 246, 0.15);
    transform: translateY(-3px);
}

.nav-link::after {
    content: '';
    position: absolute;
    bottom: 5px;
    left: 50%;
    width: 0;
    height: 2px;
    background: var(--nebula-gradient);
    transition: var(--transition-normal);
    transform: translateX(-50%);
}

.nav-link:hover::after,
.nav-link.active::after {
    width: 70%;
}


/* Try Button Styles */
.try-button {
    position: relative;
    background: linear-gradient(135deg, var(--nebula-purple), var(--stellar-blue));
    border-radius: 25px;
    padding: 0.8rem 1.5rem !important;
    margin-left: 1rem;
    overflow: hidden;
    border: 2px solid transparent;
    background-clip: padding-box;
    box-shadow: 0 0 10px rgba(107, 70, 193, 0.3);
    animation: tryButtonPulse 3s ease-in-out infinite;
}

.try-button::before {
    display: none;
}

.try-text {
    position: relative;
    z-index: 2;
    font-weight: 700;
    font-size: 0.9rem;
    letter-spacing: 1px;
    text-transform: uppercase;
    background: linear-gradient(45deg, #ffffff, var(--cosmic-teal));
    background-clip: text;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    animation: tryTextGlow 1.5s ease-in-out infinite alternate;
}

.try-glow {
    position: absolute;
    top: 50%;
    left: 50%;
    width: 0;
    height: 0;
    background: radial-gradient(circle, rgba(107, 70, 193, 0.8) 0%, transparent 70%);
    border-radius: 50%;
    transform: translate(-50%, -50%);
    animation: tryGlowPulse 2s ease-in-out infinite;
    z-index: 1;
}


.try-button:hover {
    transform: translateY(-2px) scale(1.05);
    box-shadow: 0 0 15px rgba(107, 70, 193, 0.5);
    animation-play-state: paused;
}

.try-button:hover .try-glow {
    animation-play-state: paused;
    width: 60px;
    height: 60px;
}

.try-button:hover .try-text {
    animation-play-state: paused;
    background: linear-gradient(45deg, #ffffff, #ffffff);
    background-clip: text;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

/* Hamburger Menu */
.hamburger {
    display: none;
    flex-direction: column;
    cursor: pointer;
    padding: 1rem;
    min-height: 44px;
    min-width: 44px;
    justify-content: center;
    align-items: center;
    position: relative;
    z-index: 1001;
}

.bar {
    width: 25px;
    height: 3px;
    background: var(--star-white);
    margin: 3px 0;
    transition: var(--transition-fast);
}

.hamburger.active .bar:nth-child(2) {
    opacity: 0;
}

.hamburger.active .bar:nth-child(1) {
    transform: translateY(8px) rotate(45deg);
}

.hamburger.active .bar:nth-child(3) {
    transform: translateY(-8px) rotate(-45deg);
}

/* Mobile Navigation */
@media (max-width: 767px) {
    body {
        overflow-x: hidden;
    }
    
    .navbar {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        width: 100vw;
        max-width: 100vw;
        transform: none;
        border-radius: 0;
        border-left: none;
        border-right: none;
        border-top: none;
        margin: 0;
        padding: 0;
    }
    
    .nav-container {
        padding: 0 1rem;
        height: 70px;
        width: 100%;
        max-width: 100%;
        margin: 0;
    }
    
    .nav-menu {
        position: fixed;
        left: -100vw;
        top: 70px;
        flex-direction: column;
        background: rgba(0, 0, 0, 0.95);
        width: 100vw;
        height: calc(100vh - 70px);
        text-align: center;
        transition: left 0.3s ease;
        padding: 2rem 0;
        gap: 1rem;
        backdrop-filter: blur(20px);
        z-index: 999;
        overflow-y: auto;
    }
    
    .nav-menu.active {
        left: 0;
    }
    
    .nav-link {
        justify-content: center;
        padding: 1rem;
        min-height: 44px;
        width: 100%;
    }
    
    .try-button {
        margin-left: 0;
        margin-top: 0.5rem;
        padding: 0.6rem 1.2rem !important;
        min-height: 44px;
    }
    
    .try-text {
        font-size: 0.8rem;
    }
    
    .hamburger {
        display: flex;
        position: relative;
        z-index: 1001;
    }
}

/* Extra Small Mobile Styles */
@media (max-width: 480px) {
    body {
        overflow-x: hidden;
    }
    
    .navbar {
        top: 0;
        left: 0;
        right: 0;
        width: 100vw;
        max-width: 100vw;
        transform: none;
        border-radius: 0;
        border-left: none;
        border-right: none;
        border-top: none;
        margin: 0;
        padding: 0;
    }
    
    .nav-container {
        padding: 0 0.5rem;
        height: 60px;
        width: 100%;
        max-width: 100%;
        margin: 0;
    }
    
    .nav-logo {
        gap: 0.5rem;
    }
    
    .logo-img {
        width: 40px;
        height: 40px;
    }
    
    .logo-text {
        font-size: 1rem;
    }
    
    .hamburger {
        padding: 0.8rem;
        min-height: 44px;
        min-width: 44px;
        position: relative;
        z-index: 1001;
    }
    
    .bar {
        width: 22px;
        height: 2px;
    }
    
    .nav-menu {
        top: 60px;
        height: calc(100vh - 60px);
    }
}

/* Tablet Styles */
@media (min-width: 480px) and (max-width: 767px) {
    .nav-container {
        padding: 0 1.5rem;
        height: 80px;
    }
    
    .nav-menu {
        top: 80px;
        padding: 1.5rem 0;
    }
}

/* Desktop Styles */
@media (min-width: 768px) {
    .nav-container {
        padding: 0 2rem;
        height: 90px;
    }
    
    .nav-menu {
        position: static;
        flex-direction: row;
        background: transparent;
        width: auto;
        text-align: left;
        padding: 0;
        gap: 0.5rem;
        backdrop-filter: none;
    }
    
    .nav-link {
        justify-content: flex-start;
        padding: 0.8rem 1.5rem;
        min-height: auto;
    }
    
    .try-button {
        margin-left: 1rem;
        margin-top: 0;
        padding: 0.8rem 1.5rem !important;
    }
    
    .try-text {
        font-size: 0.9rem;
    }
    
    
    .hamburger {
        display: none;
    }
}

/* Touch Device Optimizations */
@media (hover: none) and (pointer: coarse) {
    .nav-link {
        padding: 1rem;
        min-height: 44px;
    }
    
    
    .hamburger {
        padding: 1rem;
        min-height: 44px;
        min-width: 44px;
    }
}

/* High Contrast Support */
@media (prefers-contrast: high) {
    .nav-link {
        border: 1px solid transparent;
    }
    
    .nav-link:hover {
        border-color: var(--stellar-blue);
    }
}

/* Animation Keyframes */
@keyframes tryButtonPulse {
    0%, 100% { box-shadow: 0 0 10px rgba(107, 70, 193, 0.3); }
    50% { box-shadow: 0 0 15px rgba(107, 70, 193, 0.5); }
}

@keyframes tryTextGlow {
    0% { opacity: 0.8; }
    100% { opacity: 1; }
}

@keyframes tryGlowPulse {
    0%, 100% { width: 0; height: 0; }
    50% { width: 30px; height: 30px; }
}

</style>
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
                    <a href="https://github.com/your-username/Nasa-Space-Apps" class="nav-link" target="_blank" rel="noopener noreferrer">
                        <span>📁 Repository</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="model-dashboard.php" class="nav-link try-button">
                        <span class="try-text">Try!</span>
                        <span class="try-glow"></span>
                    </a>
                </li>
            </ul>
            <div class="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </div>
    </nav>

    <script>
// Navigation functionality
function initNavigation() {
    const hamburger = document.querySelector('.hamburger');
    const navMenu = document.querySelector('.nav-menu');
    const navLinks = document.querySelectorAll('.nav-link');

    if (hamburger && navMenu) {
        hamburger.addEventListener('click', function() {
            hamburger.classList.toggle('active');
            navMenu.classList.toggle('active');
        });

        navLinks.forEach(link => {
            link.addEventListener('click', function() {
                hamburger.classList.remove('active');
                navMenu.classList.remove('active');
            });
        });
    }


    // Smooth scrolling for anchor links
    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            if (href.startsWith('#')) {
                e.preventDefault();
                const target = document.querySelector(href);
                if (target) {
                    const offsetTop = target.offsetTop - 70; 
                    window.scrollTo({
                        top: offsetTop,
                        behavior: 'smooth'
                    });
                }
            }
        });
    });

    // Active navigation highlighting
    window.addEventListener('scroll', function() {
        const sections = document.querySelectorAll('section[id]');
        const scrollPos = window.scrollY + 100;

        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            const sectionHeight = section.offsetHeight;
            const sectionId = section.getAttribute('id');

            if (scrollPos >= sectionTop && scrollPos < sectionTop + sectionHeight) {
                navLinks.forEach(link => {
                    link.classList.remove('active');
                    if (link.getAttribute('href') === `#${sectionId}`) {
                        link.classList.add('active');
                    }
                });
            }
        });
    });

    // Navbar blur effect on scroll
    const navbar = document.querySelector('.navbar');
    window.addEventListener('scroll', function() {
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });
}

// Enhanced scroll animations
function initScrollAnimations() {
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('revealed');
                
                // Add staggered animation for cards
                if (entry.target.classList.contains('feature-card') || 
                    entry.target.classList.contains('tech-card') ||
                    entry.target.classList.contains('use-case-card') ||
                    entry.target.classList.contains('testimonial-card')) {
                    const cards = entry.target.parentElement.querySelectorAll('.feature-card, .tech-card, .use-case-card, .testimonial-card');
                    cards.forEach((card, index) => {
                        setTimeout(() => {
                            card.style.opacity = '1';
                            card.style.transform = 'translateY(0)';
                        }, index * 200);
                    });
                }
            }
        });
    }, observerOptions);

    // Observe elements for scroll animations
    const elementsToAnimate = document.querySelectorAll('.feature-card, .tech-card, .use-case-card, .testimonial-card, .about-content, .stats, .process-step, .data-flow');
    elementsToAnimate.forEach(element => {
        element.classList.add('scroll-reveal');
        observer.observe(element);
    });

    // Initialize card animations
    const cards = document.querySelectorAll('.feature-card, .tech-card, .use-case-card, .testimonial-card');
    cards.forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(30px)';
        card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
    });
}
        </script>
