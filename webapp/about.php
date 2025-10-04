<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=yes">
    <title>About - BlackEye</title>
    <link rel="stylesheet" href="static/css/main.css">
    <link rel="stylesheet" href="static/css/unified.css">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700;900&family=Space+Mono:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <?php include 'includes/header.php'; ?>
    
    <main class="main-content">
        <div class="container">

            <section class="page-header">
                <h1 class="page-title">About BlackEye</h1>
                <p class="page-subtitle">
                    BlackEye is a machine learning system that processes NASA's Kepler and TESS datasets to identify and characterize 
                    exoplanets through a multi-target learning approach. The system analyzes 17,232 astronomical objects using 12 raw 
                    features plus 3 physics-based engineered features, then uses XGBoost to classify objects and predict their physical properties.
                </p>
                <div class="stats">
                    <div class="stat stat-primary">
                        <span class="stat-value">2025</span>
                        <span class="stat-label">Founded</span>
                    </div>
                    <div class="stat stat-primary">
                        <span class="stat-value">6</span>
                        <span class="stat-label">Team Members</span>
                    </div>
                    <div class="stat stat-primary">
                        <span class="stat-value">NASA</span>
                        <span class="stat-label">Space Apps Challenge</span>
                    </div>
                </div>
            </section>


            <section class="section">
                <div class="container">
                    <div class="cards-grid">
                    <article class="card card-interactive">
                        <div class="card-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M12 2L2 7l10 5 10-5-10-5z"/>
                                <path d="M2 17l10 5 10-5"/>
                                <path d="M2 12l10 5 10-5"/>
                            </svg>
                        </div>
                        <div class="card-body">
                            <h3 class="card-title">Our Mission</h3>
                            <p class="card-description">
                                To advance exoplanet discovery through machine learning by creating a unified system that processes 
                                NASA's Kepler and TESS data to identify and characterize distant worlds with scientific rigor. 
                                BlackEye accelerates exoplanet discovery by providing researchers with powerful, automated analysis 
                                tools that can process NASA's massive datasets in real-time.
                            </p>
                        </div>
                    </article>

                    <article class="card card-interactive">
                        <div class="card-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="3"/>
                                <path d="M12 1v6m0 6v6m11-7h-6m-6 0H1"/>
                            </svg>
                        </div>
                        <div class="card-body">
                            <h3 class="card-title">Our Vision</h3>
                            <p class="card-description">
                                To develop a robust, scientifically-validated exoplanet detection system that serves as a foundation 
                                for future astronomical research and contributes to our understanding of planetary systems beyond our 
                                solar system. BlackEye advances our understanding of planetary systems by making NASA data more 
                                accessible to the research community, supporting ongoing NASA missions and future space telescope operations.
                            </p>
                        </div>
                    </article>
                </div>
                </div>
            </section>


            <section class="section">
                <div class="container">
                <div class="section-header">
                    <h2 class="section-title">What Makes Our Tool Unique</h2>
                </div>

                <div class="cards-grid">
                    <article class="card card-interactive">
                        <div class="card-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M9 12l2 2 4-4"/>
                                <path d="M21 12c-1 0-3-1-3-3s2-3 3-3 3 1 3 3-2 3-3 3"/>
                                <path d="M3 12c1 0 3-1 3-3s-2-3-3-3-3 1-3 3 2 3 3 3"/>
                            </svg>
                        </div>
                        <div class="card-body">
                            <h3 class="card-title">Unified Multi-Mission Approach</h3>
                            <p class="card-description">
                                Unlike traditional approaches that separate classification and parameter estimation, BlackEye handles both 
                                tasks simultaneously, providing comprehensive exoplanet characterization in a single framework. 
                                The system unifies data from multiple NASA missions into a single analysis framework, enabling 
                                researchers to process thousands of candidates efficiently while maintaining scientific rigor.
                        </p>
                        </div>
                        <div class="card-footer">
                            <div class="card-highlight">
                                <span class="card-highlight-text">Multi-Mission Integration</span>
                            </div>
                        </div>
                    </article>

                    <article class="card card-interactive">
                        <div class="card-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="3"/>
                                <path d="M12 1v6m0 6v6m11-7h-6m-6 0H1"/>
                                <path d="M20.2 4.2L16.8 7.6m-9.6 9.6L3.8 20.2"/>
                            </svg>
                        </div>
                        <div class="card-body">
                            <h3 class="card-title">Advanced Feature Engineering</h3>
                            <p class="card-description">
                                BlackEye incorporates physics-based feature engineering with custom features based on astronomical principles. 
                                The system uses 12 raw features plus 3 engineered features (period_to_duration_ratio, depth_to_mag_ratio, 
                                error_quality_score) for better model performance and cross-mission compatibility.
                                <a href="solution.php#ai-model" class="link-accent">Learn more about our AI technology →</a>
                            </p>
                        </div>
                        <div class="card-footer">
                            <div class="card-highlight">
                                <span class="card-highlight-text">Dual Classification & Prediction</span>
                            </div>
                        </div>
                    </article>

                    <article class="card card-interactive">
                        <div class="card-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="3" y="3" width="18" height="18" rx="2" ry="2"/>
                                <line x1="9" y1="9" x2="15" y2="15"/>
                                <line x1="15" y1="9" x2="9" y2="15"/>
                            </svg>
                        </div>
                        <div class="card-body">
                            <h3 class="card-title">Scientific Rigor</h3>
                            <p class="card-description">
                                BlackEye is based on peer-reviewed methodology and established astronomical practices. The system provides 
                                comprehensive validation with cross-validation and performance metrics, uncertainty quantification with 
                                confidence estimates for all predictions, and reproducible results through open-source implementation 
                                with detailed documentation.
                                <a href="solution.php#performance" class="link-accent">View performance details →</a>
                            </p>
                        </div>
                        <div class="card-footer">
                            <div class="card-highlight">
                                <span class="card-highlight-text">Real-Time Analysis</span>
                            </div>
                        </div>
                    </article>

                    <article class="card card-interactive">
                        <div class="card-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M12 2L2 7l10 5 10-5-10-5z"/>
                                <path d="M2 17l10 5 10-5"/>
                                <path d="M2 12l10 5 10-5"/>
                            </svg>
                        </div>
                        <div class="card-body">
                            <h3 class="card-title">Technical Excellence</h3>
                            <p class="card-description">
                                BlackEye features modular architecture with clean separation of concerns, scalable design that handles 
                                large datasets efficiently, Docker support for easy deployment and reproducibility, API-first design 
                                for integration with existing research workflows, and comprehensive hyperparameter tuning for all XGBoost models.
                            </p>
                        </div>
                        <div class="card-footer">
                            <div class="card-highlight">
                                <span class="card-highlight-text">Universal Accessibility</span>
                            </div>
                        </div>
                    </article>

                    <article class="card card-interactive">
                        <div class="card-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                                <polyline points="14,2 14,8 20,8"/>
                            </svg>
                        </div>
                        <div class="card-body">
                            <h3 class="card-title">Multi-Target Learning</h3>
                            <p class="card-description">
                                BlackEye employs a multi-target approach that combines classification and regression models to provide 
                                comprehensive exoplanet analysis. The system simultaneously classifies objects as CONFIRMED, CANDIDATE, 
                                FALSE_POSITIVE, or UNKNOWN while predicting 7 key scientific parameters including orbital period, 
                                planet radius, equilibrium temperature, and stellar properties.
                                <a href="solution.php#parameters" class="link-accent">Explore parameter predictions →</a>
                            </p>
                        </div>
                        <div class="card-footer">
                            <div class="card-highlight">
                                <span class="card-highlight-text">Multi-Parameter Analysis</span>
                            </div>
                        </div>
                    </article>

                    <article class="card card-interactive">
                        <div class="card-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                                <circle cx="9" cy="7" r="4"/>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                            </svg>
                        </div>
                        <div class="card-body">
                            <h3 class="card-title">Hyperparameter Customization</h3>
                            <p class="card-description">
                                BlackEye provides comprehensive hyperparameter tuning for all XGBoost models, allowing researchers to customize 
                                classifier, planet regressor, stellar regressor, and quality regressor parameters for optimal performance. 
                                The system includes configurable XGBoost parameters (learning rate, max depth, n_estimators, subsample, 
                                colsample_bytree) and custom model training capabilities for researcher-specific parameter configuration.
                            </p>
                        </div>
                        <div class="card-footer">
                            <div class="card-highlight">
                                <span class="card-highlight-text">Fully Customizable</span>
                            </div>
                        </div>
                    </article>
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
