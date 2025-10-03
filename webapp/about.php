<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=yes">
    <title>About - BlackEye</title>
    <link rel="stylesheet" href="static/css/main.css">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700;900&family=Space+Mono:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <?php include 'includes/header.php'; ?>
    
    <main class="main-content">
        <div class="container">
            
            <section class="page-header">
                <h1 class="page-title">About BlackEye</h1>
                <p class="page-subtitle">
                    BlackEye combines NASA's Kepler and TESS datasets with advanced machine learning to empower
                    researchers, astronomers, and space enthusiasts in discovering and classifying exoplanets.
                </p>
                <div class="page-stats">
                    <div class="page-stat">
                        <span class="page-stat-number">86%</span>
                        <span class="page-stat-label">Accuracy Rate</span>
                    </div>
                    <div class="page-stat">
                        <span class="page-stat-number">17,232</span>
                        <span class="page-stat-label">Objects Analyzed</span>
                    </div>
                    <div class="page-stat">
                        <span class="page-stat-number">50ms</span>
                        <span class="page-stat-label">Processing Speed</span>
                    </div>
                </div>
            </section>

            
            <section class="mission-vision">
                <div class="mission-vision-grid">
                    <div class="mission-card">
                        <div class="mission-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M12 2L2 7l10 5 10-5-10-5z"/>
                                <path d="M2 17l10 5 10-5"/>
                                <path d="M2 12l10 5 10-5"/>
                            </svg>
                        </div>
                        <h3 class="mission-title">Our Mission</h3>
                        <p class="mission-text">
                            To democratize exoplanet discovery by providing accessible, accurate, and fast AI-powered
                            analysis tools that enable researchers, astronomers, and citizen scientists worldwide to
                            contribute to the search for habitable worlds beyond our solar system.
                        </p>
                    </div>
                    
                    <div class="vision-card">
                        <div class="vision-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="3"/>
                                <path d="M12 1v6m0 6v6m11-7h-6m-6 0H1"/>
                            </svg>
                        </div>
                        <h3 class="vision-title">Our Vision</h3>
                        <p class="vision-text">
                            To become the leading platform for exoplanet analysis, fostering a global community of
                            space enthusiasts and researchers working together to unlock the mysteries of distant worlds
                            and advance humanity's understanding of the universe.
                        </p>
                    </div>
                </div>
            </section>

            
            <section class="unique-features">
                <h2 class="section-title">What Makes Our Tool Unique</h2>
                
                <div class="unique-grid">
                    <div class="unique-card">
                        <div class="unique-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M9 12l2 2 4-4"/>
                                <path d="M21 12c-1 0-3-1-3-3s2-3 3-3 3 1 3 3-2 3-3 3"/>
                                <path d="M3 12c1 0 3-1 3-3s-2-3-3-3-3 1-3 3 2 3 3 3"/>
                            </svg>
                        </div>
                        <h3 class="unique-title">Unified Multi-Mission Approach</h3>
                        <p class="unique-description">
                            Unlike traditional tools that focus on single missions, BlackEye integrates data from multiple NASA missions 
                            (Kepler, TESS) into a unified analysis platform, providing comprehensive insights across different 
                            observational techniques and time periods.
                        </p>
                        <div class="unique-highlight">
                            <span class="highlight-text">Multi-Mission Integration</span>
                        </div>
                    </div>

                    <div class="unique-card">
                        <div class="unique-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="3"/>
                                <path d="M12 1v6m0 6v6m11-7h-6m-6 0H1"/>
                                <path d="M20.2 4.2L16.8 7.6m-9.6 9.6L3.8 20.2"/>
                            </svg>
                        </div>
                        <h3 class="unique-title">Dual-Purpose AI Architecture</h3>
                        <p class="unique-description">
                        Our innovative model performs both classification (CONFIRMED/CANDIDATE/FALSE_POSITIVE) and parameter 
                        prediction (7 scientific measurements) simultaneously using XGBoost for classification and planet properties, 
                        Random Forest for stellar properties, and Ridge regression for quality metrics, reducing computational 
                        overhead while providing comprehensive analysis in a single pass.
                        </p>
                        <div class="unique-highlight">
                            <span class="highlight-text">Dual Classification & Prediction</span>
                        </div>
                    </div>

                    <div class="unique-card">
                        <div class="unique-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="3" y="3" width="18" height="18" rx="2" ry="2"/>
                                <line x1="9" y1="9" x2="15" y2="15"/>
                                <line x1="15" y1="9" x2="9" y2="15"/>
                            </svg>
                        </div>
                        <h3 class="unique-title">Real-Time Processing Capability</h3>
                        <p class="unique-description">
                            With processing speeds of ~50ms per object, BlackEye enables real-time analysis of astronomical data, 
                            making it suitable for live mission support and rapid response to new discoveries as they happen.
                        </p>
                        <div class="unique-highlight">
                            <span class="highlight-text">50ms Processing Speed</span>
                        </div>
                    </div>

                    <div class="unique-card">
                        <div class="unique-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M12 2L2 7l10 5 10-5-10-5z"/>
                                <path d="M2 17l10 5 10-5"/>
                                <path d="M2 12l10 5 10-5"/>
                            </svg>
                        </div>
                        <h3 class="unique-title">Accessible to All User Levels</h3>
                        <p class="unique-description">
                            From professional astronomers to citizen scientists, BlackEye's intuitive interface and comprehensive 
                            documentation make advanced exoplanet analysis accessible to users with varying technical backgrounds, 
                            democratizing space science.
                        </p>
                        <div class="unique-highlight">
                            <span class="highlight-text">Universal Accessibility</span>
                        </div>
                    </div>

                    <div class="unique-card">
                        <div class="unique-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                                <polyline points="14,2 14,8 20,8"/>
                            </svg>
                        </div>
                        <h3 class="unique-title">Comprehensive Parameter Prediction</h3>
                        <p class="unique-description">
                        Beyond simple classification, BlackEye predicts 7 key scientific parameters including planet radius, 
                        equilibrium temperature, insolation flux, stellar temperature, stellar surface gravity, stellar radius, 
                        and signal-to-noise ratio, providing researchers with detailed characterization data for further analysis.
                        </p>
                        <div class="unique-highlight">
                            <span class="highlight-text">7 Parameters Predicted</span>
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
                        <h3 class="unique-title">Community-Driven Development</h3>
                        <p class="unique-description">
                            Built by a diverse team of scientists, engineers, and space enthusiasts, BlackEye incorporates 
                            feedback from the astronomical community and continuously evolves to meet the changing needs of 
                            exoplanet research.
                        </p>
                        <div class="unique-highlight">
                            <span class="highlight-text">Community-Focused</span>
                        </div>
                    </div>
                </div>

            </section>


            <?php include 'includes/team.php'; ?>
        </div>
    </main>
    <?php include 'includes/footer.php'; ?>

    <script src="static/js/main.js"></script>
</body>
</html>
