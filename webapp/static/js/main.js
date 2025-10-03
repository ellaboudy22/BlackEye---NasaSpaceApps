document.addEventListener('DOMContentLoaded', function() {
    initNavigation();
    initScrollAnimations();
    initParallaxEffects();
    initInteractiveElements();
    initAccessibility();
    initShootingStars();
    initLandingPageAnimations();
});

function initParallaxEffects() {
    const parallaxElements = document.querySelectorAll('.parallax-element');

    window.addEventListener('scroll', function() {
        const scrolled = window.pageYOffset;
        const rate = scrolled * -0.5;

        parallaxElements.forEach(element => {
            element.style.transform = `translateY(${rate}px)`;
        });
    });
}

function initInteractiveElements() {
    const buttons = document.querySelectorAll('.btn');
    buttons.forEach(button => {
        button.addEventListener('mouseenter', function() {
            if (window.innerWidth > 768) {
                this.style.transform = 'translateY(-2px) scale(1.02)';
            }
        });

        button.addEventListener('mouseleave', function() {
            if (window.innerWidth > 768) {
                this.style.transform = 'translateY(0) scale(1)';
            }
        });

        button.addEventListener('touchstart', function(e) {
            e.preventDefault();
            this.style.transform = 'translateY(-1px) scale(1.01)';
            this.style.transition = 'transform 0.1s ease';
        });

        button.addEventListener('touchend', function(e) {
            e.preventDefault();
            this.style.transform = 'translateY(0) scale(1)';
            this.style.transition = 'transform 0.2s ease';
            setTimeout(() => {
                this.click();
            }, 100);
        });

        button.addEventListener('touchcancel', function() {
            this.style.transform = 'translateY(0) scale(1)';
            this.style.transition = 'transform 0.2s ease';
        });
    });

    const allCards = document.querySelectorAll('.feature-card, .tech-card, .use-case-card, .testimonial-card, .unique-card, .team-member, .testimonial-card');
    allCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            if (window.innerWidth > 768) {
                this.style.transform = 'translateY(-10px) scale(1.02)';
                this.style.boxShadow = '0 25px 50px rgba(107, 70, 193, 0.3)';
                this.style.borderColor = 'var(--nebula-purple)';
            }
        });

        card.addEventListener('mouseleave', function() {
            if (window.innerWidth > 768) {
                this.style.transform = 'translateY(0) scale(1)';
                this.style.boxShadow = '0 20px 40px rgba(107, 70, 193, 0.2)';
                this.style.borderColor = 'rgba(107, 70, 193, 0.2)';
            }
        });

        card.addEventListener('touchstart', function(e) {
            e.preventDefault();
            this.style.transform = 'translateY(-5px) scale(1.01)';
            this.style.boxShadow = '0 15px 30px rgba(107, 70, 193, 0.2)';
            this.style.borderColor = 'var(--nebula-purple)';
            this.style.transition = 'all 0.1s ease';
        });

        card.addEventListener('touchend', function(e) {
            e.preventDefault();
            this.style.transform = 'translateY(0) scale(1)';
            this.style.boxShadow = '0 20px 40px rgba(107, 70, 193, 0.2)';
            this.style.borderColor = 'rgba(107, 70, 193, 0.2)';
            this.style.transition = 'all 0.2s ease';
        });

        card.addEventListener('touchcancel', function() {
            this.style.transform = 'translateY(0) scale(1)';
            this.style.boxShadow = '0 20px 40px rgba(107, 70, 193, 0.2)';
            this.style.borderColor = 'rgba(107, 70, 193, 0.2)';
            this.style.transition = 'all 0.2s ease';
        });
    });

    const processSteps = document.querySelectorAll('.process-step');
    processSteps.forEach(step => {
        step.addEventListener('mouseenter', function() {
            if (window.innerWidth > 768) {
                const stepNumber = this.querySelector('.step-number');
                stepNumber.style.transform = 'scale(1.1)';
                stepNumber.style.color = 'var(--stellar-blue)';
                this.style.transform = 'translateY(-5px) scale(1.02)';
                this.style.boxShadow = '0 15px 30px rgba(107, 70, 193, 0.3)';
            }
        });

        step.addEventListener('mouseleave', function() {
            if (window.innerWidth > 768) {
                const stepNumber = this.querySelector('.step-number');
                stepNumber.style.transform = 'scale(1)';
                stepNumber.style.color = 'var(--nebula-purple)';
                this.style.transform = 'translateY(0) scale(1)';
                this.style.boxShadow = '0 10px 20px rgba(107, 70, 193, 0.2)';
            }
        });

        step.addEventListener('touchstart', function(e) {
            e.preventDefault();
            const stepNumber = this.querySelector('.step-number');
            stepNumber.style.transform = 'scale(1.05)';
            stepNumber.style.color = 'var(--stellar-blue)';
            this.style.transform = 'translateY(-3px) scale(1.01)';
            this.style.boxShadow = '0 12px 25px rgba(107, 70, 193, 0.2)';
            this.style.transition = 'all 0.1s ease';
        });

        step.addEventListener('touchend', function(e) {
            e.preventDefault();
            const stepNumber = this.querySelector('.step-number');
            stepNumber.style.transform = 'scale(1)';
            stepNumber.style.color = 'var(--nebula-purple)';
            this.style.transform = 'translateY(0) scale(1)';
            this.style.boxShadow = '0 10px 20px rgba(107, 70, 193, 0.2)';
            this.style.transition = 'all 0.2s ease';
        });

        step.addEventListener('touchcancel', function() {
            const stepNumber = this.querySelector('.step-number');
            stepNumber.style.transform = 'scale(1)';
            stepNumber.style.color = 'var(--nebula-purple)';
            this.style.transform = 'translateY(0) scale(1)';
            this.style.boxShadow = '0 10px 20px rgba(107, 70, 193, 0.2)';
            this.style.transition = 'all 0.2s ease';
        });
    });

    const flowArrows = document.querySelectorAll('.flow-arrow');
    flowArrows.forEach(arrow => {
        arrow.addEventListener('mouseenter', function() {
            if (window.innerWidth > 768) {
                this.style.transform = 'scale(1.2)';
                this.style.color = 'var(--cosmic-teal)';
            }
        });

        arrow.addEventListener('mouseleave', function() {
            if (window.innerWidth > 768) {
                this.style.transform = 'scale(1)';
                this.style.color = 'var(--stellar-blue)';
            }
        });

        arrow.addEventListener('touchstart', function(e) {
            e.preventDefault();
            this.style.transform = 'scale(1.1)';
            this.style.color = 'var(--cosmic-teal)';
            this.style.transition = 'all 0.1s ease';
        });

        arrow.addEventListener('touchend', function(e) {
            e.preventDefault();
            this.style.transform = 'scale(1)';
            this.style.color = 'var(--stellar-blue)';
            this.style.transition = 'all 0.2s ease';
        });

        arrow.addEventListener('touchcancel', function() {
            this.style.transform = 'scale(1)';
            this.style.color = 'var(--stellar-blue)';
            this.style.transition = 'all 0.2s ease';
        });
    });

    window.addEventListener('scroll', function() {
        const scrolled = window.pageYOffset;
        const maxScroll = document.body.scrollHeight - window.innerHeight;
        const scrollPercent = scrolled / maxScroll;

        if (window.innerWidth <= 768) {
            const parallaxElements = document.querySelectorAll('.parallax-element');
            parallaxElements.forEach(element => {
                const speed = 0.3;
                const yPos = -(scrolled * speed);
                element.style.transform = `translateY(${yPos}px)`;
            });

            const stars = document.querySelectorAll('.stars, .stars2');
            stars.forEach(star => {
                const opacity = 0.2 + (scrollPercent * 0.3);
                star.style.opacity = Math.min(opacity, 0.6);
            });

            return;
        }

        const stars = document.querySelectorAll('.stars, .stars2');
        stars.forEach(star => {
            const opacity = 0.3 + (scrollPercent * 0.7);
            star.style.opacity = opacity;
        });

    });

    allCards.forEach(card => {
        card.addEventListener('click', function() {
            if (window.innerWidth > 768) {
                this.style.transform = 'translateY(-5px) scale(0.98)';
                setTimeout(() => {
                    this.style.transform = 'translateY(-10px) scale(1.02)';
                }, 100);
            }
        });

        card.addEventListener('touchend', function(e) {
            if (window.innerWidth <= 768) {
                e.preventDefault();
                this.style.transform = 'translateY(-3px) scale(0.99)';
                setTimeout(() => {
                    this.style.transform = 'translateY(0) scale(1)';
                }, 150);
            }
        });
    });

    const heroTitle = document.querySelector('.hero-title');
    if (heroTitle) {
        const titleLines = heroTitle.querySelectorAll('.title-line');
        titleLines.forEach((line, index) => {
            const text = line.textContent;
            line.textContent = '';
            line.style.opacity = '1';

            const typingSpeed = window.innerWidth <= 768 ? 30 : 50;
            const delayBetweenLines = window.innerWidth <= 768 ? 300 : 500;

            setTimeout(() => {
                let i = 0;
                const typeWriter = setInterval(() => {
                    if (i < text.length) {
                        line.textContent += text.charAt(i);
                        i++;
                    } else {
                        clearInterval(typeWriter);
                    }
                }, typingSpeed);
            }, index * delayBetweenLines);
        });
    }
}

function initAccessibility() {
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Tab') {
            document.body.classList.add('keyboard-navigation');
        }
    });

    document.addEventListener('mousedown', function() {
        document.body.classList.remove('keyboard-navigation');
    });

    document.addEventListener('touchstart', function() {
        document.body.classList.add('touch-navigation');
    });

    document.addEventListener('touchend', function() {
        setTimeout(() => {
            document.body.classList.remove('touch-navigation');
        }, 100);
    });


    const hamburger = document.querySelector('.hamburger');
    const navMenu = document.querySelector('.nav-menu');

    if (hamburger && navMenu) {
        hamburger.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                this.click();
            }
        });

        hamburger.addEventListener('touchstart', function(e) {
            e.preventDefault();
            this.style.transform = 'scale(0.95)';
            this.style.transition = 'transform 0.1s ease';
        });

        hamburger.addEventListener('touchend', function(e) {
            e.preventDefault();
            this.style.transform = 'scale(1)';
            this.style.transition = 'transform 0.2s ease';
            this.click();
        });

        hamburger.addEventListener('touchcancel', function() {
            this.style.transform = 'scale(1)';
            this.style.transition = 'transform 0.2s ease';
        });
    }

    const focusableElements = document.querySelectorAll('button, a, input, textarea, select, [tabindex]:not([tabindex="-1"])');
    focusableElements.forEach(element => {
        element.addEventListener('focus', function() {
            if (window.innerWidth <= 768) {
                this.style.outline = '2px solid var(--nebula-purple)';
                this.style.outlineOffset = '2px';
            }
        });

        element.addEventListener('blur', function() {
            this.style.outline = '';
            this.style.outlineOffset = '';
        });
    });


    if (window.innerWidth <= 768) {
        const smallButtons = document.querySelectorAll('.btn, .nav-link, .hamburger');
        smallButtons.forEach(button => {
            const computedStyle = window.getComputedStyle(button);
            const minHeight = parseInt(computedStyle.minHeight) || 0;
            const minWidth = parseInt(computedStyle.minWidth) || 0;

            if (minHeight < 44) {
                button.style.minHeight = '44px';
            }
            if (minWidth < 44) {
                button.style.minWidth = '44px';
            }
        });

        const lowContrastElements = document.querySelectorAll('.text-muted, .text-secondary');
        lowContrastElements.forEach(element => {
            element.style.opacity = '0.8';
        });
    }

}

function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

function throttle(func, limit) {
    let inThrottle;
    return function() {
        const args = arguments;
        const context = this;
        if (!inThrottle) {
            func.apply(context, args);
            inThrottle = true;
            setTimeout(() => inThrottle = false, limit);
        }
    };
}


const optimizedScrollHandler = throttle(function() {

    const scrolled = window.pageYOffset;


    if (window.innerWidth <= 768) {
        const parallaxElements = document.querySelectorAll('.parallax-element');
        parallaxElements.forEach(element => {
            const speed = 0.3;
            const yPos = -(scrolled * speed);
            element.style.transform = `translateY(${yPos}px)`;
        });

        const stars = document.querySelectorAll('.stars, .stars2');
        stars.forEach(star => {
            const opacity = 0.2 + (scrolled / window.innerHeight * 0.3);
            star.style.opacity = Math.min(opacity, 0.6);
        });

        return;
    }

    const navbar = document.querySelector('.navbar');
    if (navbar) {
        const opacity = Math.min(0.95, 0.9 + (scrolled * 0.0001));
        navbar.style.background = `rgba(0, 0, 0, ${opacity})`;
    }

    const stars = document.querySelectorAll('.stars, .stars2, .stars3');
    const maxScroll = document.body.scrollHeight - window.innerHeight;
    const scrollPercent = scrolled / maxScroll;

    stars.forEach(star => {
        const intensity = 0.3 + (scrollPercent * 0.7);
        star.style.opacity = intensity;
    });
}, 16); // ~60fps

window.addEventListener('scroll', optimizedScrollHandler);

const optimizedResizeHandler = debounce(function() {

    const isMobile = window.innerWidth <= 768;
    const navMenu = document.querySelector('.nav-menu');
    const hamburger = document.querySelector('.hamburger');

    if (isMobile && navMenu && hamburger) {
        navMenu.classList.remove('active');
        hamburger.classList.remove('active');
        document.body.style.overflow = '';
    }

    if (isMobile) {

        const animatedElements = document.querySelectorAll('.animate-on-scroll');
        animatedElements.forEach(element => {
            element.style.animationDuration = '0.6s';
        });


        const buttons = document.querySelectorAll('.btn, .nav-link');
        buttons.forEach(button => {
            button.style.minHeight = '44px';
            button.style.minWidth = '44px';
        });


        const parallaxElements = document.querySelectorAll('.parallax-element');
        parallaxElements.forEach(element => {
            element.style.transform = 'translateY(0)';
        });
    } else {

        const animatedElements = document.querySelectorAll('.animate-on-scroll');
        animatedElements.forEach(element => {
            element.style.animationDuration = '1s';
        });


        const buttons = document.querySelectorAll('.btn, .nav-link');
        buttons.forEach(button => {
            button.style.minHeight = '';
            button.style.minWidth = '';
        });
    }


    initScrollAnimations();
}, 250);

window.addEventListener('resize', optimizedResizeHandler);


window.addEventListener('error', function(e) {
    console.error('BlackEye Error:', e.error);

    if (window.innerWidth <= 768) {

        const errorMessage = document.createElement('div');
        errorMessage.style.cssText = `
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: rgba(0, 0, 0, 0.9);
            color: white;
            padding: 1rem;
            border-radius: 8px;
            z-index: 10000;
            text-align: center;
            max-width: 90%;
        `;
        errorMessage.textContent = 'Something went wrong. Please refresh the page.';
        document.body.appendChild(errorMessage);

        setTimeout(() => {
            errorMessage.remove();
        }, 5000);
    }


});

function initShootingStars() {
    const container = document.getElementById('shooting-stars-container');
    if (!container) return;


    const isMobile = window.innerWidth <= 768;
    const animationDuration = isMobile ? 2000 : 3000;
    const starSize = isMobile ? 2 : 3;
    const starCount = isMobile ? 3 : 5;
    const distanceRange = isMobile ? [400, 800] : [600, 1400];

    function createShootingStar() {

        const shootingStar = document.createElement('div');
        shootingStar.className = 'shooting-star';


        if (isMobile) {
            shootingStar.style.width = starSize + 'px';
            shootingStar.style.height = starSize + 'px';
            shootingStar.style.opacity = '0.7';
        } else {
            shootingStar.style.width = starSize + 'px';
            shootingStar.style.height = starSize + 'px';
        }


        const startPositions = [{
                x: -200,
                y: Math.random() * window.innerHeight
            }, // Left edge
            {
                x: window.innerWidth + 200,
                y: Math.random() * window.innerHeight
            }, // Right edge
            {
                x: Math.random() * window.innerWidth,
                y: -200
            }, // Top edge
            {
                x: Math.random() * window.innerWidth,
                y: window.innerHeight + 200
            } // Bottom edge
        ];

        const startPos = startPositions[Math.floor(Math.random() * startPositions.length)];


        const angle = Math.random() * 2 * Math.PI; // Random angle in radians
        const distance = Math.random() * (distanceRange[1] - distanceRange[0]) + distanceRange[0]; // Random distance


        const endX = startPos.x + Math.cos(angle) * distance;
        const endY = startPos.y + Math.sin(angle) * distance;


        shootingStar.style.left = startPos.x + 'px';
        shootingStar.style.top = startPos.y + 'px';


        const deltaX = endX - startPos.x;
        const deltaY = endY - startPos.y;


        const rotationAngle = Math.atan2(deltaY, deltaX) * (180 / Math.PI);


        shootingStar.style.setProperty('--end-x', deltaX + 'px');
        shootingStar.style.setProperty('--end-y', deltaY + 'px');
        shootingStar.style.setProperty('--rotation', rotationAngle + 'deg');


        container.appendChild(shootingStar);


        const animationDuration = isMobile ? '0.6s' : '0.8s';
        shootingStar.style.animation = `shootingStarMove ${animationDuration} ease-out forwards`;


        setTimeout(() => {
            if (shootingStar.parentNode) {
                shootingStar.parentNode.removeChild(shootingStar);
            }
        }, isMobile ? 600 : 800);
    }


    const intervalDuration = isMobile ? 2000 : 1500;
    const initialDelay = isMobile ? 800 : 500;

    const intervalId = setInterval(createShootingStar, intervalDuration);

    setTimeout(createShootingStar, initialDelay);

    window.shootingStarsInterval = intervalId;
}


function initLandingPageAnimations() {
    const isMobile = window.innerWidth <= 768;


    const animationDuration = isMobile ? '0.6s' : '1s';
    const animationDelay = isMobile ? '0.1s' : '0.2s';

    const elementsToAnimate = document.querySelectorAll(`
        .hero-content, .hero-title, .hero-subtitle, .hero-cta,
        .feature-card, .feature-icon,
        .about-content, .about-text, .about-visual,
        .stats, .stat-item, .stat-number,
        .section-title, .btn,
        .technology, .data-sources, .use-cases, .process, .testimonials,
        .team-grid, .contact-content, .footer-content
    `);


    elementsToAnimate.forEach((element, index) => {
        element.classList.add('animate-on-scroll');
        element.style.animationDelay = `${index * 0.1}s`;
    });


    const observerOptions = {
        threshold: 0.1,
        rootMargin: isMobile ? '0px 0px -30px 0px' : '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animated');


                setTimeout(() => {
                    if (entry.target.classList.contains('hero-title')) {
                        entry.target.style.animation = isMobile ?
                            'heroTitleGlow 2s ease-in-out infinite' :
                            'heroTitleGlow 3s ease-in-out infinite';
                    }

                    if (entry.target.classList.contains('feature-card')) {
                        entry.target.style.animation = isMobile ?
                            'cardFloat 4s ease-in-out infinite' :
                            'cardFloat 6s ease-in-out infinite';
                    }

                    if (entry.target.classList.contains('feature-icon')) {
                        entry.target.style.animation = isMobile ?
                            'cardIconSpin 6s linear infinite' :
                            'cardIconSpin 8s linear infinite';
                    }

                    if (entry.target.classList.contains('stat-number')) {
                        entry.target.style.animation = isMobile ?
                            'statGlow 2s ease-in-out infinite' :
                            'statGlow 3s ease-in-out infinite';
                        animateCounter(entry.target);
                    }

                    if (entry.target.classList.contains('btn')) {
                        entry.target.style.animation = isMobile ?
                            'buttonPulse 3s ease-in-out infinite' :
                            'buttonPulse 4s ease-in-out infinite';
                    }
                }, isMobile ? 600 : 800); // Wait for fade-in to complete
            }
        });
    }, observerOptions);


    elementsToAnimate.forEach(el => {
        observer.observe(el);
    });


    addHoverEffects();
}


function addHoverEffects() {
    const buttons = document.querySelectorAll('.btn');
    buttons.forEach(button => {
        button.addEventListener('mouseenter', function() {
            this.style.animationPlayState = 'paused';
            this.style.animation = 'buttonGlow 1s ease-in-out infinite';
        });

        button.addEventListener('mouseleave', function() {
            this.style.animationPlayState = 'running';
            this.style.animation = 'buttonPulse 4s ease-in-out infinite';
        });
    });

    const featureCards = document.querySelectorAll('.feature-card');
    featureCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.animationPlayState = 'paused';
            this.style.animation = 'cardGlow 2s ease-in-out infinite';
        });

        card.addEventListener('mouseleave', function() {
            this.style.animationPlayState = 'running';
            this.style.animation = 'cardFloat 6s ease-in-out infinite';
        });
    });
}

function initScrollAnimations() {
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animated');


                if (entry.target.classList.contains('feature-card')) {
                    entry.target.style.animationDelay = `${Math.random() * 0.5}s`;
                }

                if (entry.target.classList.contains('stat-item')) {
                    animateCounter(entry.target);
                }
            }
        });
    }, observerOptions);


    document.querySelectorAll('.animate-on-scroll, .animate-slide-left, .animate-slide-right, .animate-fade-in').forEach(el => {
        observer.observe(el);
    });
}

function animateCounter(element) {
    const counter = element.querySelector('.stat-number');
    if (!counter) return;
    const target = parseInt(counter.textContent);
    const isMobile = window.innerWidth <= 768;
    const duration = isMobile ? 1500 : 2000;
    const increment = target / (duration / 16);
    let current = 0;

    const timer = setInterval(() => {
        current += increment;
        if (current >= target) {
            counter.textContent = target;
            clearInterval(timer);
        } else {
            counter.textContent = Math.floor(current);
        }
    }, 16);
}

if (typeof module !== 'undefined' && module.exports) {
    module.exports = {
        debounce,
        throttle,
        initNavigation,
        initScrollAnimations,
        initInteractiveElements,
        initAccessibility,
        initShootingStars,
        initLandingPageAnimations,
        animateCounter
    };
}