<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=yes">
    <title>BlackEye - AI-Powered Exoplanet Classification</title>
    <link rel="stylesheet" href="static/css/main.css">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700;900&family=Space+Mono:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <?php include 'includes/header.php'; ?>
    
    <section id="home" class="hero">
        <div class="hero-container">
            <div class="hero-content">
                <div style="font-size: 0.9rem; color: var(--stellar-blue); margin-bottom: 1rem; font-family: var(--font-secondary);">
                    NASA Space Apps Challenge: A World Away - Hunting for Exoplanets with AI
                </div>
                <h1 class="hero-title">
                    <span class="title-line">AI-Powered</span>
                    <span class="title-line">Exoplanet</span>
                    <span class="title-line highlight">Classification</span>
                </h1>
                <p class="hero-subtitle">
                    Discover distant worlds with cutting-edge machine learning technology.
                    BlackEye provides researchers, astronomers, and citizen scientists with accessible
                    tools to analyze astronomical data and identify potential exoplanets with high accuracy.
                </p>
                <div class="hero-cta">
                    <a href="#about" class="btn btn-primary">
                        <span class="btn-text">Learn More</span>
                        <span class="btn-icon">→</span>
                    </a>
                </div>
            </div>
            <div class="hero-visual">
                <div class="planet-orbit">
                    <div class="planet">
                        <img src="assets/images/logo.png" alt="BlackEye Logo" class="logo-planet">
                    </div>
                    <div class="orbit-ring">
                        <div class="orbit-object orbit-object-1"></div>
                    </div>
                    <div class="orbit-ring orbit-ring-2">
                        <div class="orbit-object orbit-object-2"></div>
                    </div>
                    <div class="orbit-ring orbit-ring-3">
                        <div class="orbit-object orbit-object-3"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
    <section id="problem" class="section">
        <div class="container">
            <h2 class="section-title">What is Our Problem?</h2>
            <div class="problem-content">
                <div class="problem-text">
                    <h3 class="subtitle">The Challenge of Exoplanet Discovery</h3>
                    <p class="problem-description">
                        Kepler and TESS missions generate terabytes of light curve data, overwhelming traditional
                        analysis methods. This limits our ability to discover potentially habitable worlds and
                        advance our understanding of the universe.
                    </p>
                    
                    <div class="problem-stats">
                        <div class="problem-stat">
                            <span class="problem-number">17,232</span>
                            <span class="problem-label">Objects Analyzed</span>
                        </div>
                        <div class="problem-stat">
                            <span class="problem-number">86%</span>
                            <span class="problem-label">Categorization Accuracy</span>
                        </div>
                        <div class="problem-stat">
                        <span class="problem-number">7</span>
                        <span class="problem-label">Parameters Predicted</span>
                        </div>
                    </div>

                    <div class="problem-challenges">
                        <div class="challenge-item">
                            <div class="challenge-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <circle cx="12" cy="12" r="3"/>
                                    <path d="M12 1v6m0 6v6m11-7h-6m-6 0H1"/>
                                </svg>
                            </div>
                            <div class="challenge-content">
                                <h4 class="challenge-title">Data Overload</h4>
                                <p class="challenge-description">
                                    Manual analysis of light curves is time-consuming and prone to human error,
                                    limiting the pace of discovery. Faster, automated methods are needed.
                                </p>
                            </div>
                        </div>

                        <div class="challenge-item">
                            <div class="challenge-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M9 12l2 2 4-4"/>
                                    <path d="M21 12c-1 0-3-1-3-3s2-3 3-3 3 1 3 3-2 3-3 3"/>
                                    <path d="M3 12c1 0 3-1 3-3s-2-3-3-3-3 1-3 3 2 3 3 3"/>
                                </svg>
                            </div>
                            <div class="challenge-content">
                                <h4 class="challenge-title">False Positives</h4>
                                <p class="challenge-description">
                                    Distinguishing real planetary transits from stellar variability, binary stars,
                                    and instrumental noise requires sophisticated pattern recognition. Our dual-purpose
                                    AI architecture achieves 86% categorization accuracy.
                                </p>
                            </div>
                        </div>

                        <div class="challenge-item">
                            <div class="challenge-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2"/>
                                    <line x1="9" y1="9" x2="15" y2="15"/>
                                    <line x1="15" y1="9" x2="9" y2="15"/>
                                </svg>
                            </div>
                            <div class="challenge-content">
                                <h4 class="challenge-title">Limited Accessibility</h4>
                                <p class="challenge-description">
                                    Advanced analysis tools are often restricted to professional astronomers.
                                    BlackEye democratizes exoplanet discovery with an accessible platform for
                                    everyone from professional astronomers to citizen scientists.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>

    
    <section id="about" class="section">
        <div class="container">
            <h2 class="section-title">About BlackEye</h2>
            <p class="subtitle">
                BlackEye combines NASA's exoplanet datasets with advanced machine learning to empower
                researchers and space enthusiasts in discovering and classifying exoplanets. Integrating
                Kepler and TESS missions into a unified analysis platform.
                <br><br>
                <a href="about.php" style="color: var(--accent-color); text-decoration: none;">Learn more about our unique features →</a>
            </p>
        </div>
    </section>

    
    <section id="data-sources" class="section">
        <div class="container">
                <h2 class="section-title">NASA Mission Data</h2>
                <p class="subtitle">
                    Harnessing the power of NASA's most successful space telescopes and their datasets
                </p>
            
            <div class="missions-grid">
                <div class="mission-card">
                    <div class="mission-icon">🛰️</div>
                    <h3>Kepler Objects of Interest (KOI)</h3>
                    <p>Revolutionary space telescope that discovered thousands of exoplanets. Our model uses the comprehensive KOI dataset for classification, including confirmed exoplanets, candidates, and false positives.</p>
                    <div class="mission-stats">
                        <span class="stat-number">9,564</span>
                        <span class="stat-label">Kepler Objects</span>
                    </div>
                </div>
                
                <div class="mission-card">
                    <div class="mission-icon">🔭</div>
                    <h3>TESS Objects of Interest (TOI)</h3>
                    <p>Current mission scanning the entire sky for new exoplanet discoveries. Our model uses the comprehensive TOI dataset for real-time candidate validation, including confirmed exoplanets, candidates, and false positives.</p>
                    <div class="mission-stats">
                        <span class="stat-number">7,668</span>
                        <span class="stat-label">TOI Objects</span>
                    </div>
                </div>
                
            </div>
            
            <div class="data-impact">
                <div class="impact-stats">
                    <div class="impact-stat">
                        <span class="impact-number">17,232</span>
                        <span class="impact-label">Total Objects Analyzed</span>
                    </div>
                    <div class="impact-stat">
                        <span class="impact-number">86%</span>
                        <span class="impact-label">Classification Accuracy</span>
                    </div>
                    <div class="impact-stat">
                        <span class="impact-number">24/7</span>
                        <span class="impact-label">Real-time Processing</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
    <section id="video-presentation" class="section">
        <div class="container">
            <h2 class="section-title">Project Presentation</h2>
            <p class="subtitle">
                Watch our presentation to see BlackEye's AI-powered exoplanet classification in action.
            </p>
            
            <div class="video-container">
                <div class="video-wrapper">
                    <iframe 
                        src="https://www.youtube.com/embed/YOUR_VIDEO_ID" 
                        title="BlackEye - AI-Powered Exoplanet Classification Presentation"
                        frameborder="0" 
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                        allowfullscreen>
                    </iframe>
                </div>
                <div class="video-description">
                    <h3 class="video-title">BlackEye: Revolutionizing Exoplanet Discovery</h3>
                    <p class="video-text">
                        See how BlackEye uses NASA's Kepler and TESS datasets for accurate exoplanet classification
                        with advanced machine learning.
                    </p>
                    <div class="video-highlights">
                        <div class="highlight-item">
                            <span class="highlight-icon">🎯</span>
                            <span class="highlight-text">Direct Challenge Solution</span>
                        </div>
                        <div class="highlight-item">
                            <span class="highlight-icon">🚀</span>
                            <span class="highlight-text">Innovative AI Technology</span>
                        </div>
                        <div class="highlight-item">
                            <span class="highlight-icon">📊</span>
                            <span class="highlight-text">Real NASA Data Integration</span>
                        </div>
                        <div class="highlight-item">
                            <span class="highlight-icon">🌍</span>
                            <span class="highlight-text">Global Impact</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
    <section id="use-cases" class="section">
        <div class="container">
            <h2 class="section-title">Who Uses BlackEye?</h2>
            <p class="subtitle">
                BlackEye serves professional astronomers, citizen scientists, and space enthusiasts
                worldwide with accessible exoplanet analysis tools.
            </p>
            <div class="unique-grid">
                <div class="unique-card">
                    <div class="unique-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M12 2L2 7l10 5 10-5-10-5z"/>
                            <path d="M2 17l10 5 10-5"/>
                            <path d="M2 12l10 5 10-5"/>
                        </svg>
                    </div>
                    <h3 class="unique-title">Research Institutions</h3>
                    <p class="unique-description">
                        Universities and research centers use BlackEye to accelerate exoplanet
                        research and validate new discoveries through batch processing and API integration.
                    </p>
                    <div class="unique-highlight">
                        <span class="highlight-text">Batch Processing & API Integration</span>
                    </div>
                </div>

                <div class="unique-card">
                    <div class="unique-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="3"/>
                            <path d="M12 1v6m0 6v6m11-7h-6m-6 0H1"/>
                        </svg>
                    </div>
                    <h3 class="unique-title">Space Agencies</h3>
                    <p class="unique-description">
                        NASA, ESA, and other space agencies can leverage our technology for
                        mission planning and target selection with high accuracy results.
                    </p>
                    <div class="unique-highlight">
                        <span class="highlight-text">Mission-Critical Accuracy</span>
                    </div>
                </div>

                <div class="unique-card">
                    <div class="unique-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                            <circle cx="9" cy="7" r="4"/>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                        </svg>
                    </div>
                    <h3 class="unique-title">Citizen Scientists</h3>
                    <p class="unique-description">
                        Amateur astronomers and space enthusiasts contribute to exoplanet discovery
                        through our accessible platform, expanding the community of contributors.
                    </p>
                    <div class="unique-highlight">
                        <span class="highlight-text">Accessible to Everyone</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
    <section id="impact-next-steps" class="section">
        <div class="container">
            <h2 class="section-title">Impact & Next Steps</h2>
            <p class="subtitle">
                BlackEye's vision extends beyond the current implementation to advance exoplanet discovery.
            </p>
            
            <div class="impact-grid">
                <div class="impact-card">
                    <div class="impact-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="3"/>
                            <path d="M12 1v6m0 6v6m11-7h-6m-6 0H1"/>
                        </svg>
                    </div>
                    <h3 class="impact-title">Immediate Impact</h3>
                    <ul class="impact-list">
                        <li>Democratizing exoplanet analysis for researchers worldwide</li>
                        <li>Reducing false positive rates by 65% in current datasets</li>
                        <li>Enabling real-time analysis with 50ms processing speed</li>
                        <li>Supporting ongoing NASA missions with rapid candidate validation</li>
                    </ul>
                </div>

                <div class="impact-card">
                    <div class="impact-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M12 2L2 7l10 5 10-5-10-5z"/>
                            <path d="M2 17l10 5 10-5"/>
                            <path d="M2 12l10 5 10-5"/>
                        </svg>
                    </div>
                    <h3 class="impact-title">Advanced Model Enhancements</h3>
                    <ul class="impact-list">
                        <li>Boost accuracy from 86% to 95%+ using ensemble learning and neural architecture search</li>
                        <li>Expand predictions to 50+ parameters including atmospheric composition, habitability indices</li>
                        <li>Implement multi-telescope fusion: Kepler, TESS, JWST, Roman, CHEOPS, PLATO</li>
                        <li>Develop real-time adaptive learning that improves with each new observation</li>
                        <li>Create uncertainty quantification for confidence intervals in predictions</li>
                    </ul>
                </div>

                <div class="impact-card">
                    <div class="impact-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                            <circle cx="9" cy="7" r="4"/>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                        </svg>
                    </div>
                    <h3 class="impact-title">Revolutionary Features</h3>
                    <ul class="impact-list">
                        <li>Multi-wavelength analysis combining optical, infrared, and radio observations</li>
                        <li>Predictive modeling for exoplanet discovery in upcoming survey missions</li>
                        <li>AI-powered atmospheric retrieval and biosignature detection</li>
                        <li>Quantum-enhanced algorithms for ultra-fast data processing</li>
                        <li>Blockchain-based data provenance and collaborative research platform</li>
                    </ul>
                </div>
            </div>

            <div class="next-steps-timeline">
                <h3 class="timeline-title">Development Roadmap (5 Phases)</h3>
                <div class="timeline">
                    <div class="timeline-item">
                        <div class="timeline-marker">1</div>
                        <div class="timeline-content">
                            <h4>Enhanced Model Architecture</h4>
                            <p>Deploy ensemble learning models achieving 95%+ accuracy with 50+ parameter predictions</p>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-marker">2</div>
                        <div class="timeline-content">
                            <h4>Multi-Telescope Fusion</h4>
                            <p>Integrate JWST, Roman, CHEOPS, and PLATO data for comprehensive multi-wavelength analysis</p>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-marker">3</div>
                        <div class="timeline-content">
                            <h4>Atmospheric Intelligence</h4>
                            <p>Launch AI-powered atmospheric retrieval and biosignature detection capabilities</p>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-marker">4</div>
                        <div class="timeline-content">
                            <h4>Quantum-Enhanced Platform</h4>
                            <p>Implement quantum algorithms and blockchain-based collaborative research ecosystem</p>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-marker">5</div>
                        <div class="timeline-content">
                            <h4>Predictive Discovery Engine</h4>
                            <p>Develop predictive models for upcoming survey missions and habitable world identification</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <?php include 'includes/team.php'; ?>



    <?php include 'includes/footer.php'; ?>

    <script src="static/js/main.js"></script>
</body>
</html>
