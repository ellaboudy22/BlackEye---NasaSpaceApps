<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=yes">
    <title>Our Solution - BlackEye</title>
    <link rel="stylesheet" href="static/css/main.css">
    <link rel="stylesheet" href="static/css/unified.css">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700;900&family=Space+Mono:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <?php include 'includes/header.php'; ?>
    
    
    <main class="main-content">
        <div class="container">
            
            <section class="page-header">
                <h1 class="page-title">Our Solution</h1>
                <p class="page-subtitle">
                    BlackEye transforms how we explore the universe. Our advanced observation platform combines NASA's space telescope data 
                    with intelligent AI to discover new worlds, analyze cosmic phenomena, and make universe exploration accessible to everyone. 
                    Experience the future of space discovery with cutting-edge technology that brings the cosmos to your fingertips.
                </p>
                <div class="stats">
                    <div class="stat stat-primary">
                        <span class="stat-value">17,232</span>
                        <span class="stat-label">Objects Analyzed</span>
                    </div>
                    <div class="stat stat-primary">
                        <span class="stat-value">12+3</span>
                        <span class="stat-label">Features</span>
                    </div>
                    <div class="stat stat-primary">
                        <span class="stat-value">7</span>
                        <span class="stat-label">Parameters</span>
                    </div>
                </div>
            </section>


            <section class="section">
                <h2 class="section-title">Exploring the Universe Together</h2>
                <p class="section-subtitle">
                    The universe holds countless mysteries waiting to be discovered. From distant planets to cosmic phenomena, 
                    space exploration has always been limited by our ability to process and understand vast amounts of data. 
                    BlackEye changes this by making universe observation accessible, accurate, and exciting for everyone - 
                    from professional astronomers to space enthusiasts.
                    <a href="index.php#problem" class="link-accent">Discover our approach →</a>
                </p>
            </section>

            
            <section id="ai-model" class="section">
                <h2 class="section-title">How Our Machine Learning System Works</h2>
                <p class="section-subtitle">
                    BlackEye uses a smart approach that combines finding planets and learning about their properties to provide comprehensive 
                    planet analysis using advanced AI and smart calculations. The system uses advanced AI for learning, 
                    scikit-learn, pandas, and NumPy for machine learning and data processing, with FastAPI for the Python backend 
                    and Docker containerization for deployment.
                </p>
                
                <div class="cards-grid">
                    <div class="card">
                        <div class="card-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M9 12l2 2 4-4"/>
                                <path d="M21 12c-1 0-3-1-3-3s2-3 3-3 3 1 3 3-2 3-3 3"/>
                                <path d="M3 12c1 0 3-1 3-3s-2-3-3-3-3 1-3 3 2 3 3 3"/>
                            </svg>
                        </div>
                        <div class="card-content">
                            <h3 class="card-title">Multi-Target Learning</h3>
                            <p class="card-description">
                                Our system performs both finding planets (CONFIRMED/CANDIDATE/FALSE_POSITIVE/UNKNOWN) and learning about their properties 
                                at the same time using AI models, providing comprehensive planet analysis in a unified framework. 
                                The system analyzes 17,232 space objects using 12 basic features plus 3 smart calculated features, 
                                then uses AI to identify objects and predict 7 key scientific measurements.
                            </p>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="3"/>
                                <path d="M12 1v6m0 6v6m11-7h-6m-6 0H1"/>
                            </svg>
                        </div>
                        <div class="card-content">
                            <h3 class="card-title">Algorithm Selection</h3>
                            <ul class="card-list">
                                <li><strong>AI Planet Finder:</strong> Planet identification (CONFIRMED/CANDIDATE/FALSE_POSITIVE/UNKNOWN)</li>
                                <li><strong>AI Property Predictor:</strong> Planet and star properties prediction (7 key measurements)</li>
                                <li><strong>Feature Engineering:</strong> Physics-based features (period_to_duration_ratio, depth_to_mag_ratio, error_quality_score)</li>
                                <li><strong>Data Quality Control:</strong> Automated filtering and preprocessing with quality assessment</li>
                                <li><strong>Customization Options:</strong> Configurable AI settings for all models</li>
                            </ul>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M12 2L2 7l10 5 10-5-10-5z"/>
                                <path d="M2 17l10 5 10-5"/>
                                <path d="M2 12l10 5 10-5"/>
                            </svg>
                        </div>
                        <div class="card-content">
                            <h3 class="card-title">Data Processing Pipeline</h3>
                            <ul class="card-list">
                                <li><strong>Data Ingestion:</strong> Load and standardize multiple astronomical datasets (Kepler KOI, TESS TOI)</li>
                                <li><strong>Feature Engineering:</strong> Create unified feature set across all surveys (12 raw + 3 engineered)</li>
                                <li><strong>Planet Detection Training:</strong> Train AI planet finder on labeled survey data</li>
                                <li><strong>Regression Training:</strong> Train individual parameter predictors on confirmed exoplanets</li>
                                <li><strong>Unified Prediction:</strong> Single interface for both finding planets and learning about their properties</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

            <section id="development" class="section">
                <h2 class="section-title">How We Built BlackEye</h2>
                <p class="section-subtitle">
                    Our development process involved extensive research, data analysis, and iterative model refinement 
                    to create a robust and accurate planet detection system.
                </p>
                
                <div class="timeline-section">
                    <div class="timeline">
                        <div class="timeline-item">
                            <div class="timeline-marker">1</div>
                            <div class="timeline-content">
                                <h4>Data Collection & Analysis</h4>
                                <p>Collected and analyzed 17,232 objects from NASA's Kepler and TESS missions, identifying key features and patterns in exoplanet light curves.</p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-marker">2</div>
                            <div class="timeline-content">
                                <h4>Feature Engineering</h4>
                                <p>Developed comprehensive feature extraction methods to capture essential characteristics of planetary transits and stellar variability.</p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-marker">3</div>
                            <div class="timeline-content">
                                <h4>Model Development</h4>
                                <p>Implemented and tested multiple AI approaches, selecting the best combinations for finding planets and learning about their properties.</p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-marker">4</div>
                            <div class="timeline-content">
                                <h4>Validation & Optimization</h4>
                                <p>Conducted extensive testing and optimization to improve AI models for finding planets and learning about their properties.</p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-marker">5</div>
                            <div class="timeline-content">
                                <h4>Platform Integration</h4>
                                <p>Developed RESTful API and web interface to make the technology accessible to researchers and astronomers worldwide.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="features" class="section">
                <h2 class="section-title">Special Features & Innovations</h2>
                <p class="section-subtitle">
                    BlackEye incorporates several unique features that set it apart from traditional exoplanet analysis tools.
                </p>
                
                <div class="cards-grid">
                    <div class="card">
                        <div class="card-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M9 12l2 2 4-4"/>
                                <path d="M21 12c-1 0-3-1-3-3s2-3 3-3 3 1 3 3-2 3-3 3"/>
                                <path d="M3 12c1 0 3-1 3-3s-2-3-3-3-3 1-3 3 2 3 3 3"/>
                            </svg>
                        </div>
                        <div class="card-content">
                            <h3 class="card-title">Multi-Mission Integration</h3>
                            <p class="card-description">
                                Unlike traditional tools that focus on single missions, BlackEye integrates data from multiple NASA missions 
                                (Kepler, TESS) into a unified analysis platform, providing comprehensive insights across different 
                                observational techniques and time periods.
                            </p>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="3"/>
                                <path d="M12 1v6m0 6v6m11-7h-6m-6 0H1"/>
                            </svg>
                        </div>
                        <div class="card-content">
                            <h3 class="card-title">Real-Time Processing</h3>
                            <p class="card-description">
                                With efficient machine learning processing, BlackEye enables real-time analysis of astronomical data, 
                                making it suitable for live mission support and rapid response to new discoveries as they happen.
                            </p>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                                <polyline points="14,2 14,8 20,8"/>
                            </svg>
                        </div>
                        <div class="card-content">
                            <h3 class="card-title">Comprehensive Parameter Prediction</h3>
                            <p class="card-description">
                                Beyond simple planet detection, BlackEye predicts 7 key scientific measurements including planet radius, 
                                equilibrium temperature, insolation flux, stellar temperature, stellar surface gravity, stellar radius, 
                                and signal-to-noise ratio.
                            </p>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="3" y="3" width="18" height="18" rx="2" ry="2"/>
                                <line x1="9" y1="9" x2="15" y2="15"/>
                                <line x1="15" y1="9" x2="9" y2="15"/>
                            </svg>
                        </div>
                        <div class="card-content">
                            <h3 class="card-title">Accessibility & Usability</h3>
                            <p class="card-description">
                                From professional astronomers to researchers, BlackEye's intuitive interface and comprehensive 
                                documentation make advanced exoplanet analysis accessible to users with varying technical backgrounds.
                            </p>
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
                        <div class="card-content">
                            <h3 class="card-title">Model Customization</h3>
                            <p class="card-description">
                                Advanced customization options for all AI models (planet finder, planet property predictor, star property predictor, quality predictor) 
                                with customizable parameters including n_estimators, max_depth, learning_rate, and subsample settings.
                            </p>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M12 2L2 7l10 5 10-5-10-5z"/>
                                <path d="M2 17l10 5 10-5"/>
                                <path d="M2 12l10 5 10-5"/>
                            </svg>
                        </div>
                        <div class="card-content">
                            <h3 class="card-title">Data Split Configuration</h3>
                            <p class="card-description">
                                Configurable data split ratios for training (70%), validation (20%), testing (5%), and future testing (5%), 
                                allowing researchers to customize the model training process for their specific research needs.
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <section id="performance" class="section">
                <h2 class="section-title">Performance Metrics & Technical Specifications</h2>
                <p class="section-subtitle">
                    BlackEye delivers exceptional performance across all key metrics, making it the ideal solution for 
                    modern exoplanet research and analysis.
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
                    <div class="stat-card">
                        <span class="stat-value">17,232</span>
                        <span class="stat-label">Objects Analyzed</span>
                    </div>
                </div>

                <div class="cards-grid">
                    <div class="card">
                        <div class="card-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M9 12l2 2 4-4"/>
                                <path d="M21 12c-1 0-3-1-3-3s2-3 3-3 3 1 3 3-2 3-3 3"/>
                                <path d="M3 12c1 0 3-1 3-3s-2-3-3-3-3 1-3 3 2 3 3 3"/>
                            </svg>
                        </div>
                        <div class="card-content">
                            <h3 class="card-title">Model Performance</h3>
                            <ul class="card-list">
                                <li>Objects Analyzed: 17,232</li>
                                <li>Features Used: 12 raw + 3 engineered</li>
                                <li>Parameters Predicted: 7</li>
                                <li>Dataset Size: 17,232 objects</li>
                                <li>Kepler Objects: 9,564</li>
                                <li>TESS TOI Objects: 7,668</li>
                            </ul>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M12 2L2 7l10 5 10-5-10-5z"/>
                                <path d="M2 17l10 5 10-5"/>
                                <path d="M2 12l10 5 10-5"/>
                            </svg>
                        </div>
                        <div class="card-content">
                            <h3 class="card-title">Data Sources</h3>
                            <ul class="card-list">
                                <li>NASA Kepler Objects of Interest (KOI) Dataset</li>
                                <li>NASA TESS Objects of Interest (TOI) Dataset</li>
                                <li>Supervised Learning with Disposition Columns</li>
                            </ul>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="3"/>
                                <path d="M12 1v6m0 6v6m11-7h-6m-6 0H1"/>
                            </svg>
                        </div>
                        <div class="card-content">
                            <h3 class="card-title">API Capabilities</h3>
                            <ul class="card-list">
                                <li>RESTful API Interface</li>
                                <li>Batch Processing Support</li>
                                <li>Real-time Analysis</li>
                                <li>Custom Model Training</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

            <section id="parameters" class="section">
                <h2 class="section-title">Predicted Parameters</h2>
                <p class="section-subtitle">
                    BlackEye predicts 7 key scientific parameters that provide comprehensive characterization of exoplanetary systems.
                </p>
                
                <div class="cards-grid">
                    <div class="card">
                        <div class="card-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="10"/>
                                <circle cx="12" cy="12" r="6"/>
                                <circle cx="12" cy="12" r="2"/>
                            </svg>
                        </div>
                        <div class="card-content">
                            <h3 class="card-title">Planetary Properties</h3>
                            <ul class="card-list">
                                <li><strong>Planet Radius:</strong> Physical size of the exoplanet</li>
                                <li><strong>Equilibrium Temperature:</strong> Theoretical surface temperature</li>
                                <li><strong>Insolation Flux:</strong> Stellar radiation received</li>
                            </ul>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="3"/>
                                <path d="M12 1v6m0 6v6m11-7h-6m-6 0H1"/>
                            </svg>
                        </div>
                        <div class="card-content">
                            <h3 class="card-title">Stellar Properties</h3>
                            <ul class="card-list">
                                <li><strong>Stellar Temperature:</strong> Effective temperature of the host star</li>
                                <li><strong>Stellar Surface Gravity:</strong> Surface gravitational acceleration</li>
                                <li><strong>Stellar Radius:</strong> Physical size of the host star</li>
                            </ul>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M9 12l2 2 4-4"/>
                                <path d="M21 12c-1 0-3-1-3-3s2-3 3-3 3 1 3 3-2 3-3 3"/>
                                <path d="M3 12c1 0 3-1 3-3s-2-3-3-3-3 1-3 3 2 3 3 3"/>
                            </svg>
                        </div>
                        <div class="card-content">
                            <h3 class="card-title">Quality Metrics</h3>
                            <ul class="card-list">
                                <li><strong>Signal-to-Noise Ratio:</strong> Measurement quality indicator</li>
                                <li><strong>Confidence Score:</strong> Prediction reliability assessment</li>
                                <li><strong>Classification Probability:</strong> Category assignment confidence</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

            


            <section class="cta-section">
                <div class="cta-content">
                    <h2 class="cta-title">Ready to Discover New Worlds?</h2>
                    <p class="cta-description">
                        Join thousands of researchers and astronomers who are already using BlackEye
                        to accelerate their exoplanet discovery process.
                    </p>
                    <div class="cta-buttons">
                        <a href="model-dashboard.php" class="btn btn-primary">
                            <span class="btn-text">Try BlackEye Now</span>
                            <span class="btn-icon">🚀</span>
                        </a>
                        <a href="contact.php" class="btn btn-secondary">
                            <span class="btn-text">Schedule Demo</span>
                            <span class="btn-icon">📅</span>
                        </a>
                    </div>
                </div>
            </section>
        </div>
    </main>

    <?php include 'includes/footer.php'; ?>

        <script src="static/js/main.js"></script>
</body>
</html>
