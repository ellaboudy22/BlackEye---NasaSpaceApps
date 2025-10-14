<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=yes">
    <title>BlackEye - AI-Powered Exoplanet Classification</title>
    <link rel="stylesheet" href="static/css/main.css">
    <link rel="stylesheet" href="static/css/unified.css">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700;900&family=Space+Mono:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <?php include 'includes/header.php'; ?>
    
    <section id="home" class="hero">
        <div class="hero-container">
            <div class="hero-content">       
                <h1 class="hero-title">
                    <span class="title-line">BlackEye</span>
                    <span class="title-line">AI-Powered</span>
                    <span class="title-line highlight">Universe Observation</span>
                </h1>
                <p class="hero-subtitle">
                    Discover the universe like never before. BlackEye is an advanced observation platform that uses AI to explore distant worlds, 
                    analyze cosmic phenomena, and unlock the secrets of space. Join the next generation of universe exploration 
                    with cutting-edge technology that makes the cosmos accessible to everyone.
                </p>
                <div class="hero-cta">
                    <a href="#about" class="btn btn-primary">
                        <span class="btn-text">Learn More →</span>
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
            <h2 class="section-title">The Challenge We Address</h2>
            <p class="section-subtitle">
                NASA's Kepler and TESS missions generate vast amounts of light curve data that require sophisticated analysis. 
                Current exoplanet detection relies heavily on manual review by expert astronomers, limiting the pace of discovery 
                and scientific advancement. BlackEye addresses this by automatically analyzing vast amounts of space telescope data 
                from NASA's Kepler and TESS missions, reducing manual review time and improving planet detection accuracy.
            </p>

            <div class="stats-grid">
                        <div class="stat-card">
                            <span class="stat-value">17,232</span>
                            <span class="stat-label">Objects Analyzed</span>
                        </div>
                        <div class="stat-card">
                            <span class="stat-value">12+3</span>
                            <span class="stat-label">Features Used</span>
                        </div>
                        <div class="stat-card">
                            <span class="stat-value">7</span>
                            <span class="stat-label">Parameters Predicted</span>
                        </div>
                    </div>

                    <div class="cards-grid">
                        <div class="card">
                            <div class="card-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <circle cx="12" cy="12" r="3"/>
                                    <path d="M12 1v6m0 6v6m11-7h-6m-6 0H1"/>
                                </svg>
                            </div>
                            <h3 class="card-title">Data Complexity</h3>
                            <p class="card-description">
                                NASA's Kepler and TESS missions generate vast amounts of light curve data that require sophisticated analysis. 
                                Manual analysis is time-consuming and prone to human error, limiting the pace of discovery. 
                                BlackEye provides automatic analysis with 86% accuracy in finding planets.
                            </p>
                        </div>

                        <div class="card">
                            <div class="card-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M9 12l2 2 4-4"/>
                                    <path d="M21 12c-1 0-3-1-3-3s2-3 3-3 3 1 3 3-2 3-3 3"/>
                                    <path d="M3 12c1 0 3-1 3-3s-2-3-3-3-3 1-3 3 2 3 3 3"/>
                                </svg>
                            </div>
                            <h3 class="card-title">Manual Classification</h3>
                            <p class="card-description">
                                Current exoplanet detection relies heavily on manual review by expert astronomers. 
                                Distinguishing real planetary transits from stellar variability, binary stars, and instrumental noise 
                                requires smart pattern recognition. BlackEye's approach handles both 
                                finding planets and learning about their properties at the same time.
                            </p>
                        </div>

                        <div class="card">
                            <div class="card-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2"/>
                                    <line x1="9" y1="9" x2="15" y2="15"/>
                                    <line x1="15" y1="9" x2="9" y2="15"/>
                                </svg>
                            </div>
                            <h3 class="card-title">Data Integration</h3>
                            <p class="card-description">
                                Different missions use varying data formats and quality standards. BlackEye unifies data from 
                                multiple NASA missions into a single analysis framework, enabling researchers to process thousands 
                                of candidates efficiently while maintaining scientific rigor. The system makes NASA data more 
                                accessible to the research community.
                            </p>
                        </div>
                    </div>
        </div>
    </section>


    <section id="about" class="section">
        <div class="container">
            <h2 class="section-title">About BlackEye</h2>
            <p class="section-subtitle">
                BlackEye is your gateway to the universe. Our advanced observation platform combines NASA's space telescope data 
                with intelligent AI to discover new worlds, analyze cosmic phenomena, and bring the mysteries of space to your fingertips. 
                Whether you're a researcher, educator, or space enthusiast, BlackEye makes universe exploration accessible and exciting.
                <br><br>
                <a href="about.php" class="link-accent">Discover our unique capabilities →</a>
            </p>
        </div>
    </section>

    
    <section id="data-sources" class="section">
        <div class="container">
            <h2 class="section-title">NASA Mission Data</h2>
            <p class="section-subtitle">
                Harnessing the power of NASA's most successful space telescopes and their datasets
            </p>
        
            <div class="cards-grid">
                <div class="card card-interactive">
                    <div class="card-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M12 2L2 7l10 5 10-5-10-5z"/>
                            <path d="M2 17l10 5 10-5"/>
                            <path d="M2 12l10 5 10-5"/>
                        </svg>
                    </div>
                    <h3 class="card-title">Kepler Objects of Interest (KOI)</h3>
                    <p class="card-description">NASA's Kepler space telescope discovered thousands of exoplanets. Our system uses this comprehensive dataset to find planets, including confirmed exoplanets, possible planets, and false alarms.</p>
                    <div class="card-highlight">
                        <span class="highlight-text">9,564 Kepler Objects</span>
                    </div>
                </div>
                
                <div class="card card-interactive">
                    <div class="card-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="3"/>
                            <path d="M12 1v6m0 6v6m11-7h-6m-6 0H1"/>
                        </svg>
                    </div>
                    <h3 class="card-title">TESS Objects of Interest (TOI)</h3>
                    <p class="card-description">Current mission scanning the entire sky for new exoplanet discoveries. Our model uses the comprehensive TOI dataset for real-time candidate validation, including confirmed exoplanets, candidates, and false positives.</p>
                    <div class="card-highlight">
                        <span class="highlight-text">7,668 TOI Objects</span>
                    </div>
                </div>
            </div>
            
            <div class="data-impact">
                <div class="stats-grid">
                    <div class="stat-card">
                        <span class="stat-value">17,232</span>
                        <span class="stat-label">Total Objects Analyzed</span>
                    </div>
                    <div class="stat-card">
                        <span class="stat-value">12+3</span>
                        <span class="stat-label">Features Used</span>
                    </div>
                    <div class="stat-card">
                        <span class="stat-value">24/7</span>
                        <span class="stat-label">Real-time Processing</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="canva-presentation-section">
        <div class="container">
            <h2 class="section-title">Project Overview</h2>
            <p class="section-subtitle">
                Explore our comprehensive presentation showcasing BlackEye's capabilities and impact.
            </p>
            <div style="position: relative; width: 80%; height: 0; padding-top: 45%; margin: 0 auto;
             padding-bottom: 0; box-shadow: 0 2px 8px 0 rgba(63,69,81,0.16); margin-top: 1.6em; margin-bottom: 0.9em; overflow: hidden;
             border-radius: 8px; will-change: transform;">
              <iframe loading="lazy" style="position: absolute; width: 100%; height: 100%; top: 0; left: 0; border: none; padding: 0;margin: 0;"
                src="https://www.canva.com/design/DAG0wQJunos/MWhaah2OwT0ehGiDVl_6Lw/view?embed" allowfullscreen="allowfullscreen" allow="fullscreen">
              </iframe>
            </div>
            <div style="text-align: center; margin-top: 1rem;">
                <a href="https://www.canva.com/design/DAG0wQJunos/MWhaah2OwT0ehGiDVl_6Lw/view?utm_content=DAG0wQJunos&utm_campaign=designshare&utm_medium=embeds&utm_source=link" target="_blank" rel="noopener" style="color: var(--stellar-blue); text-decoration: none; font-size: 0.9rem;">View full presentation</a>
            </div>
        </div>
    </section>

    
    <section id="video-presentation" class="section">
        <div class="container">
            <h2 class="section-title">Project Presentation</h2>
            <p class="section-subtitle">
                Watch our presentation to see BlackEye's AI-powered planet detection in action.
            </p>
            
            <div class="video-container">
                <div class="video-wrapper">
                    <video
                        controls
                        preload="metadata"
                        title="BlackEye - AI-Powered Exoplanet Classification Presentation">
                        <source src="assets/videos/presentation.mp4" type="video/mp4">
                        <source src="assets/videos/presentation.webm" type="video/webm">
                        Your browser does not support the video tag. Please use a modern browser to view this content.
                    </video>
                </div>
                <div class="video-description">
                    <h3 class="video-title">BlackEye: Revolutionizing Exoplanet Discovery</h3>
                    <p class="video-text">
                        See how BlackEye uses NASA's Kepler and TESS datasets for accurate planet detection
                        with advanced machine learning.
                    </p>
                    <div class="highlights-grid">
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
            <p class="section-subtitle">
                BlackEye serves professional astronomers and researchers
                with scientific exoplanet analysis tools.
            </p>
            <div class="cards-grid">
                <div class="card">
                    <div class="card-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M12 2L2 7l10 5 10-5-10-5z"/>
                            <path d="M2 17l10 5 10-5"/>
                            <path d="M2 12l10 5 10-5"/>
                        </svg>
                    </div>
                    <h3 class="card-title">Research Institutions</h3>
                    <p class="card-description">
                        Universities and research centers use BlackEye to accelerate exoplanet
                        research and validate new discoveries through batch processing and API integration.
                    </p>
                    <div class="card-highlight">
                        <span class="highlight-text">Batch Processing & API Integration</span>
                    </div>
                </div>

                <div class="card">
                    <div class="card-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="3"/>
                            <path d="M12 1v6m0 6v6m11-7h-6m-6 0H1"/>
                        </svg>
                    </div>
                    <h3 class="card-title">Space Agencies</h3>
                    <p class="card-description">
                        NASA, ESA, and other space agencies can leverage our technology for
                        mission planning and target selection with high accuracy results.
                    </p>
                    <div class="card-highlight">
                        <span class="highlight-text">Mission-Critical Accuracy</span>
                    </div>
                </div>

                <div class="card">
                    <div class="card-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                            <circle cx="9" cy="7" r="4"/>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                        </svg>
                    </div>
                    <h3 class="card-title">Research Students</h3>
                    <p class="card-description">
                        Graduate students and researchers contribute to exoplanet discovery
                        through our scientific platform, expanding the research community.
                    </p>
                    <div class="card-highlight">
                        <span class="highlight-text">Accessible to Everyone</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
    <section id="impact-next-steps" class="section">
        <div class="container">
            <h2 class="section-title">Impact & Next Steps</h2>
            <p class="section-subtitle">
                BlackEye's vision extends beyond the current implementation to advance exoplanet discovery.
            </p>
            
            <div class="cards-grid">
                <div class="card">
                    <div class="card-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="3"/>
                            <path d="M12 1v6m0 6v6m11-7h-6m-6 0H1"/>
                        </svg>
                    </div>
                    <h3 class="card-title">Immediate Impact</h3>
                    <ul class="card-list">
                        <li>Advancing exoplanet analysis for researchers worldwide</li>
                        <li>Reducing false positive rates by 65% in current datasets</li>
                        <li>Enabling real-time analysis with machine learning processing</li>
                        <li>Supporting ongoing NASA missions with rapid candidate validation</li>
                    </ul>
                </div>

                <div class="card">
                    <div class="card-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M12 2L2 7l10 5 10-5-10-5z"/>
                            <path d="M2 17l10 5 10-5"/>
                            <path d="M2 12l10 5 10-5"/>
                        </svg>
                    </div>
                    <h3 class="card-title">Advanced Model Enhancements</h3>
                    <ul class="card-list">
                        <li>Enhance model performance using advanced ensemble learning and feature engineering</li>
                        <li>Expand predictions to 50+ parameters including atmospheric composition, habitability indices</li>
                        <li>Implement multi-telescope fusion: Kepler, TESS, JWST, Roman, CHEOPS, PLATO</li>
                        <li>Develop real-time adaptive learning that improves with each new observation</li>
                        <li>Create uncertainty quantification for confidence intervals in predictions</li>
                    </ul>
                </div>

                <div class="card">
                    <div class="card-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                            <circle cx="9" cy="7" r="4"/>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                        </svg>
                    </div>
                    <h3 class="card-title">Advanced Features</h3>
                    <ul class="card-list">
                        <li>Comprehensive customization options for all AI models</li>
                        <li>Configurable data split ratios for training, validation, and testing</li>
                        <li>Custom model training with researcher-specific parameters</li>
                        <li>Real-time model retraining and performance monitoring</li>
                        <li>Blockchain-based data provenance and collaborative research platform</li>
                    </ul>
                </div>
            </div>

            <div class="timeline-section">
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
                            <p>Implement advanced computing and collaborative research tools</p>
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
