<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=yes">
    <title>Our Solution - BlackEye</title>
    <link rel="stylesheet" href="static/css/main.css">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700;900&family=Space+Mono:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <?php include 'includes/header.php'; ?>
    
    
    <main class="main-content">
        <div class="container">
            
            <section class="page-header">
                <h1 class="page-title">Our Solution</h1>
                <p class="page-subtitle">
                    BlackEye addresses critical challenges in exoplanet discovery through AI technology,
                    providing researchers with powerful tools to analyze astronomical data with high accuracy and speed.
                </p>
                <div class="solution-quick-stats">
                    <div class="solution-stat">
                        <span class="solution-stat-icon">🎯</span>
                        <span class="solution-stat-text">86% Accuracy</span>
                    </div>
                    <div class="solution-stat">
                        <span class="solution-stat-icon">⚡</span>
                        <span class="solution-stat-text">50ms Processing</span>
                    </div>
                    <div class="solution-stat">
                        <span class="solution-stat-icon">🔬</span>
                        <span class="solution-stat-text">18+ Parameters</span>
                    </div>
                </div>
            </section>


            <section class="problem">
                <h2 class="section-title">The Challenge We Solve</h2>
                <p class="problem-description" style="text-align: center; max-width: 800px; margin: 0 auto 2rem;">
                    Kepler and TESS missions generate terabytes of light curve data, overwhelming traditional analysis methods.
                    <a href="index.php#problem" style="color: var(--accent-color); text-decoration: none;">Learn more about the challenges →</a>
                </p>
            </section>

            
            <section class="solution-features">
                <h2 class="section-title">How BlackEye Solves These Challenges</h2>
            </section>

            
            <section class="tech-specs">
                <h2 class="section-title">Technical Specifications</h2>
                <div class="specs-grid">
                    <div class="spec-item">
                        <div class="spec-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M9 12l2 2 4-4"/>
                                <path d="M21 12c-1 0-3-1-3-3s2-3 3-3 3 1 3 3-2 3-3 3"/>
                                <path d="M3 12c1 0 3-1 3-3s-2-3-3-3-3 1-3 3 2 3 3 3"/>
                            </svg>
                        </div>
                        <div class="spec-content">
                            <h3 class="spec-title">Model Performance</h3>
                            <ul class="spec-list">
                                <li>Classification Accuracy: 86%</li>
                                <li>Processing Speed: 50ms per object</li>
                                <li>Parameters Predicted: 7</li>
                                <li>Dataset Size: 17,232 objects</li>
                                <li>Kepler Objects: 9,564</li>
                                <li>TESS TOI Objects: 7,668</li>
                            </ul>
                        </div>
                    </div>

                    <div class="spec-item">
                        <div class="spec-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M12 2L2 7l10 5 10-5-10-5z"/>
                                <path d="M2 17l10 5 10-5"/>
                                <path d="M2 12l10 5 10-5"/>
                            </svg>
                        </div>
                        <div class="spec-content">
                            <h3 class="spec-title">Data Sources</h3>
                            <ul class="spec-list">
                                <li>NASA Kepler Objects of Interest (KOI) Dataset</li>
                                <li>NASA TESS Objects of Interest (TOI) Dataset</li>
                                <li>Supervised Learning with Disposition Columns</li>
                            </ul>
                        </div>
                    </div>

                    <div class="spec-item">
                        <div class="spec-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="3"/>
                                <path d="M12 1v6m0 6v6m11-7h-6m-6 0H1"/>
                            </svg>
                        </div>
                        <div class="spec-content">
                            <h3 class="spec-title">API Capabilities</h3>
                            <ul class="spec-list">
                                <li>RESTful API Interface</li>
                                <li>Batch Processing Support</li>
                                <li>Real-time Analysis</li>
                                <li>Custom Model Training</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

            
            <section class="pricing-section">
                <h2 class="section-title">Choose Your Plan</h2>
                <div class="pricing-grid">
                    <div class="pricing-card">
                        <div class="pricing-header">
                            <h3 class="pricing-title">Free</h3>
                            <div class="pricing-price">
                                <span class="price-currency">$</span>
                                <span class="price-amount">0</span>
                                <span class="price-period">/month</span>
                            </div>
                        </div>
                        <div class="pricing-features">
                            <ul class="feature-list">
                                <li class="feature-item">✓ Up to 100 analyses per month</li>
                                <li class="feature-item">✓ Basic classification results</li>
                                <li class="feature-item">✓ Community support</li>
                                <li class="feature-item">✓ Educational resources</li>
                            </ul>
                        </div>
                        <div class="pricing-cta">
                            <a href="model-dashboard.html" class="btn btn-secondary">Get Started</a>
                        </div>
                    </div>

                    <div class="pricing-card featured">
                        <div class="pricing-badge">Most Popular</div>
                        <div class="pricing-header">
                            <h3 class="pricing-title">Professional</h3>
                            <div class="pricing-price">
                                <span class="price-currency">$</span>
                                <span class="price-amount">99</span>
                                <span class="price-period">/month</span>
                            </div>
                        </div>
                        <div class="pricing-features">
                            <ul class="feature-list">
                                <li class="feature-item">✓ Unlimited analyses</li>
                                <li class="feature-item">✓ Full parameter predictions</li>
                                <li class="feature-item">✓ API access</li>
                                <li class="feature-item">✓ Priority support</li>
                                <li class="feature-item">✓ Batch processing</li>
                                <li class="feature-item">✓ Custom model training</li>
                            </ul>
                        </div>
                        <div class="pricing-cta">
                            <a href="contact.html" class="btn btn-primary">Contact Sales</a>
                        </div>
                    </div>

                    <div class="pricing-card">
                        <div class="pricing-header">
                            <h3 class="pricing-title">Enterprise</h3>
                            <div class="pricing-price">
                                <span class="price-currency">$</span>
                                <span class="price-amount">Custom</span>
                            </div>
                        </div>
                        <div class="pricing-features">
                            <ul class="feature-list">
                                <li class="feature-item">✓ Everything in Professional</li>
                                <li class="feature-item">✓ On-premise deployment</li>
                                <li class="feature-item">✓ Dedicated support</li>
                                <li class="feature-item">✓ Custom integrations</li>
                                <li class="feature-item">✓ SLA guarantees</li>
                                <li class="feature-item">✓ Training & consultation</li>
                            </ul>
                        </div>
                        <div class="pricing-cta">
                            <a href="contact.html" class="btn btn-secondary">Contact Sales</a>
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
                        <a href="model-dashboard.html" class="btn btn-primary">
                            <span class="btn-text">Try BlackEye Now</span>
                            <span class="btn-icon">🚀</span>
                        </a>
                        <a href="contact.html" class="btn btn-secondary">
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
