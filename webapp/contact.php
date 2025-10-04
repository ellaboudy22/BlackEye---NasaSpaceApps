<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=yes">
    <title>Contact - BlackEye</title>
    <link rel="stylesheet" href="static/css/main.css">
    <link rel="stylesheet" href="static/css/unified.css">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700;900&family=Space+Mono:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <?php include 'includes/header.php'; ?>
    
    <main class="main-content">
        <div class="container">
            
            <section class="page-header">
                <h1 class="page-title">Contact Us</h1>
                <p class="page-subtitle">
                    Get in touch with our team to learn more about BlackEye, discuss research collaboration, 
                    or get support for your exoplanet analysis projects. Our team consists of 6 members working 
                    on the NASA Space Apps Challenge project to advance exoplanet discovery through machine learning.
                </p>
                <div class="stats">
                    <div class="stat stat-primary">
                        <span class="stat-value">24h</span>
                        <span class="stat-label">Response Time</span>
                    </div>
                    <div class="stat stat-primary">
                        <span class="stat-value">Global</span>
                        <span class="stat-label">Support</span>
                    </div>
                    <div class="stat stat-primary">
                        <span class="stat-value">Expert</span>
                        <span class="stat-label">Team</span>
                    </div>
                </div>
            </section>

            
            <section class="section">
                <div class="contact-grid">
                    <div class="contact-info">
                        <h2 class="section-title">Get In Touch</h2>
                        <p class="contact-description">
                            We're always excited to hear from researchers and astronomers who are interested in advancing exoplanet science. 
                            Whether you have questions about our machine learning system, want to collaborate, or need support, we're here to help. 
                            BlackEye is developed for the NASA Space Apps Challenge, addressing the challenge of improving exoplanet detection 
                            and characterization through automated analysis of NASA's Kepler and TESS datasets.
                        </p>
                        
                        <div class="contact-methods">
                            <div class="contact-method">
                                <div class="method-icon">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                                        <polyline points="22,6 12,13 2,6"/>
                                    </svg>
                                </div>
                                <div class="method-content">
                                    <h3 class="method-title">Email</h3>
                                    <p class="method-detail">moazellaboudy@gmail.com</p>
                                    <p class="method-description">Send us an email and we'll respond within 24 hours</p>
                                </div>
                            </div>

                            <div class="contact-method">
                                <div class="method-icon">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                                    </svg>
                                </div>
                                <div class="method-content">
                                    <h3 class="method-title">Phone</h3>
                                    <p class="method-detail">+20 2022311051</p>
                                    <p class="method-description">Available Monday-Friday, 9 AM - 6 PM EST</p>
                                </div>
                            </div>

                            <div class="contact-method">
                                <div class="method-icon">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
                                        <circle cx="12" cy="10" r="3"/>
                                    </svg>
                                </div>
                                <div class="method-content">
                                    <h3 class="method-title">Office</h3>
                                    <p class="method-detail">Space Research Center</p>
                                    <p class="method-description">Cairo, Mokattam, 53, Ivy stem international school</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
        </div>
    </main>

    <?php include 'includes/footer.php'; ?>
    <script src="static/js/main.js"></script>
    <style>
        .contact-grid {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        .contact-info {
            text-align: center;
            max-width: 800px;
        }
        
        @media (max-width: 768px) {
            .contact-info {
                max-width: 100%;
                padding: 0 1rem;
            }
        }
    </style>
</body>
</html>
