<style>
    .footer {
	background: var(--space-darker);
	border-top: 1px solid rgba(107, 70, 193, 0.2);
	padding: 3rem 0 1rem;
}
.footer-content {
	display: grid;
	grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
	gap: 2rem;
	margin-bottom: 2rem;
}
.footer-logo {
	margin-bottom: 1rem;
	display: flex;
	justify-content: flex-start;
}
.footer-logo-img {
	width: 80px;
	height: 80px;
	border-radius: 50%;
	object-fit: cover;
	transition: var(--transition-normal);
}
.footer-logo-img:hover {
	transform: scale(1.1);
	box-shadow: 0 0 20px rgba(20, 184, 166, 0.5);
}
.footer-title {
	font-family: var(--font-primary);
	font-size: 1.5rem;
	margin-bottom: 1rem;
	background: var(--nebula-gradient);
	-webkit-background-clip: text;
	-webkit-text-fill-color: transparent;
	background-clip: text;
}
.footer-subtitle {
	font-family: var(--font-primary);
	font-size: 1.1rem;
	margin-bottom: 1rem;
	color: var(--star-white);
}
.footer-links {
	list-style: none;
}
.footer-links li {
	margin-bottom: 0.5rem;
}
.footer-links a {
	color: var(--star-dim);
	text-decoration: none;
	transition: var(--transition-fast);
}
.footer-links a:hover {
	color: var(--stellar-blue);
}
.footer-bottom {
	text-align: center;
	padding-top: 2rem;
	border-top: 1px solid rgba(107, 70, 193, 0.2);
	color: var(--star-dim);
}

    </style>
<footer id="contact" class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <div class="footer-logo">
                        <img src="assets/images/logo.png" alt="BlackEye Logo" class="footer-logo-img">
                    </div>
                    <p class="footer-description">
                        Advancing exoplanet discovery through AI-powered classification and analysis.
                    </p>
                </div>
                <div class="footer-section">
                    <h4 class="footer-subtitle">Quick Links</h4>
                    <ul class="footer-links">
                        <li><a href="https://blackeye.site">Home</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="solution.php">Our Solution</a></li>
						<li><a href="contact.php">Contact</a></li>
                        <li><a href="https://github.com/your-username/Nasa-Space-Apps" target="_blank" rel="noopener noreferrer">📁 Repository</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h4 class="footer-subtitle">Data Sources</h4>
                    <ul class="footer-links">
                        <li><a href="https://exoplanetarchive.ipac.caltech.edu/" target="_blank" rel="noopener noreferrer">NASA Kepler Objects of Interest (KOI)</a></li>
                        <li><a href="https://tess.mit.edu/science/tess-science-data/" target="_blank" rel="noopener noreferrer">NASA TESS Objects of Interest (TOI)</a></li>
                    </ul>
                </div>
               
            </div>
            <div class="footer-bottom">
                <p>&copy; 2025 BlackEye. Where AI meets the cosmos. 🚀✨</p>
                <p style="margin-top: 0.5rem; color: var(--stellar-blue); font-size: 0.9rem;">NASA Space Apps Challenge: A World Away - Hunting for Exoplanets with AI</p>
            </div>
        </div>
    </footer>
