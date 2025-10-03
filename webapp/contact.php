<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=yes">
    <title>Contact - BlackEye</title>
    <link rel="stylesheet" href="static/css/main.css">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700;900&family=Space+Mono:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <?php include 'includes/header.php'; ?>
    
    <main class="main-content">
        <div class="container">
            
            <section class="page-header">
                <h1 class="page-title">Contact Us</h1>
                <p class="page-subtitle">
                    Get in touch with our team to learn more about BlackEye, discuss collaboration opportunities, 
                    or get support for your exoplanet research projects.
                </p>
                <div class="contact-quick-stats">
                    <div class="quick-stat">
                        <span class="quick-stat-icon">📧</span>
                        <span class="quick-stat-text">24h Response Time</span>
                    </div>
                    <div class="quick-stat">
                        <span class="quick-stat-icon">🌍</span>
                        <span class="quick-stat-text">Global Support</span>
                    </div>
                    <div class="quick-stat">
                        <span class="quick-stat-icon">🔬</span>
                        <span class="quick-stat-text">Expert Team</span>
                    </div>
                </div>
            </section>

            
            <section class="contact-form-section">
                <div class="contact-grid">
                    <div class="contact-info">
                        <h2 class="section-title">Get In Touch</h2>
                        <p class="contact-description">
                            We're always excited to hear from researchers, astronomers, and space enthusiasts 
                            who are interested in advancing exoplanet science. Whether you have questions about 
                            our technology, want to collaborate, or need support, we're here to help.
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
                                    <p class="method-detail">contact@blackeye.site</p>
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
                                    <p class="method-detail">+20 1032554400</p>
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

                    <div class="contact-form-container">
                        <form class="contact-form" id="contactForm">
                            <div class="form-group">
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text" id="name" name="name" class="form-input" required>
                            </div>

                            <div class="form-group">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" id="email" name="email" class="form-input" required>
                            </div>

                            <div class="form-group">
                                <label for="organization" class="form-label">Organization (Optional)</label>
                                <input type="text" id="organization" name="organization" class="form-input">
                            </div>

                            <div class="form-group">
                                <label for="subject" class="form-label">Subject</label>
                                <select id="subject" name="subject" class="form-select" required>
                                    <option value="">Select a subject</option>
                                    <option value="general">General Inquiry</option>
                                    <option value="collaboration">Collaboration Opportunity</option>
                                    <option value="support">Technical Support</option>
                                    <option value="research">Research Partnership</option>
                                    <option value="media">Media & Press</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="message" class="form-label">Message</label>
                                <textarea id="message" name="message" class="form-textarea" rows="6" required></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary btn-submit">
                                <span class="btn-text">Send Message</span>
                                <span class="btn-icon">🚀</span>
                            </button>
                        </form>
                    </div>
                </div>
            </section>

            
            <section class="faq-section">
                <h2 class="section-title">Frequently Asked Questions</h2>
                <div class="faq-grid">
                    <div class="faq-item">
                        <div class="faq-question">
                            <h3 class="faq-title">How accurate is BlackEye's classification?</h3>
                            <span class="faq-icon">+</span>
                        </div>
                        <div class="faq-answer">
                            <p>BlackEye achieves 86% accuracy in exoplanet classification, significantly reducing false positives compared to traditional methods. Our AI model has been trained on extensive NASA datasets and continuously improves through community feedback.</p>
                        </div>
                    </div>

                    <div class="faq-item">
                        <div class="faq-question">
                            <h3 class="faq-title">What data formats does BlackEye support?</h3>
                            <span class="faq-icon">+</span>
                        </div>
                        <div class="faq-answer">
                            <p>BlackEye supports CSV files, manual data input, and integrates directly with NASA's data archives. We also provide API access for automated data processing and batch analysis capabilities.</p>
                        </div>
                    </div>

                    <div class="faq-item">
                        <div class="faq-question">
                            <h3 class="faq-title">Is BlackEye free to use?</h3>
                            <span class="faq-icon">+</span>
                        </div>
                        <div class="faq-answer">
                            <p>Yes! BlackEye is free for individual researchers, citizen scientists, and educational institutions. We also offer premium features for research organizations and commercial users.</p>
                        </div>
                    </div>

                    <div class="faq-item">
                        <div class="faq-question">
                            <h3 class="faq-title">How can I contribute to BlackEye's development?</h3>
                            <span class="faq-icon">+</span>
                        </div>
                        <div class="faq-answer">
                            <p>We welcome contributions from the community! You can contribute by reporting bugs, suggesting features, providing feedback, or even contributing code through our open-source repositories.</p>
                        </div>
                    </div>

                    <div class="faq-item">
                        <div class="faq-question">
                            <h3 class="faq-title">What kind of support do you provide?</h3>
                            <span class="faq-icon">+</span>
                        </div>
                        <div class="faq-answer">
                            <p>We provide comprehensive support including documentation, tutorials, API guides, and direct technical support. Our team responds to inquiries within 24 hours and offers specialized support for research collaborations.</p>
                        </div>
                    </div>

                    <div class="faq-item">
                        <div class="faq-question">
                            <h3 class="faq-title">Can I integrate BlackEye with my existing research workflow?</h3>
                            <span class="faq-icon">+</span>
                        </div>
                        <div class="faq-answer">
                            <p>Absolutely! BlackEye offers RESTful API access, batch processing capabilities, and can be integrated with popular astronomical software and research platforms. We also provide custom integration support for large-scale research projects.</p>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </main>

    <?php include 'includes/footer.php'; ?>
    <script src="static/js/main.js"></script>
</body>
</html>
