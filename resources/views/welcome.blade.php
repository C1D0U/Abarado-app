<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YORHA EXPRESS - Advanced Cloud Scripting Platform</title>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600;700&family=Poppins:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #ff006e;
            --secondary: #00d9ff;
            --accent: #ffd700;
            --dark: #0d0221;
            --darker: #020014;
            --light: #f0f0f0;
            --gray: #b0b0b0;
            --code-bg: #1a1a2e;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, var(--darker) 0%, #1a0033 50%, #0d0221 100%);
            color: var(--light);
            line-height: 1.6;
            overflow-x: hidden;
        }

        /* Animated background */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                radial-gradient(circle at 20% 50%, rgba(255, 0, 110, 0.08) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(0, 217, 255, 0.08) 0%, transparent 50%);
            pointer-events: none;
            z-index: -1;
        }

        /* Navigation */
        nav {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            background: rgba(13, 2, 33, 0.95);
            backdrop-filter: blur(10px);
            border-bottom: 2px solid rgba(255, 0, 110, 0.3);
            padding: 1rem 2rem;
        }

        .nav-container {
            max-width: 1400px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-family: 'JetBrains Mono', monospace;
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--secondary);
            text-shadow: 0 0 10px rgba(0, 217, 255, 0.5);
            letter-spacing: 1px;
        }

        .logo-accent {
            color: var(--primary);
        }

        .nav-links {
            display: flex;
            gap: 2.5rem;
            list-style: none;
        }

        .nav-links a {
            color: var(--light);
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 0.9rem;
            font-weight: 500;
            position: relative;
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            transition: width 0.3s ease;
        }

        .nav-links a:hover::after {
            width: 100%;
        }

        .nav-links a:hover {
            color: var(--secondary);
        }

        /* Hero Section */
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding: 8rem 2rem 2rem;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 50%;
            right: -10%;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(0, 217, 255, 0.1) 0%, transparent 70%);
            border-radius: 50%;
            animation: float 8s ease-in-out infinite;
        }

        .hero::after {
            content: '';
            position: absolute;
            bottom: 10%;
            left: -5%;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(255, 0, 110, 0.1) 0%, transparent 70%);
            border-radius: 50%;
            animation: float 10s ease-in-out infinite reverse;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(40px); }
        }

        .hero-content {
            max-width: 1400px;
            width: 100%;
            position: relative;
            z-index: 10;
            margin: 0 auto;
            padding: 0 2rem;
        }

        h1 {
            font-family: 'JetBrains Mono', monospace;
            font-size: clamp(2.5rem, 8vw, 5rem);
            font-weight: 700;
            margin-bottom: 1rem;
            line-height: 1.1;
            animation: slideInUp 0.8s ease-out;
        }

        .hero-title {
            color: var(--secondary);
            text-shadow: 0 0 20px rgba(0, 217, 255, 0.6);
        }

        .hero-highlight {
            color: var(--primary);
            text-shadow: 0 0 20px rgba(255, 0, 110, 0.6);
        }

        .hero p {
            font-size: 1.2rem;
            color: var(--gray);
            max-width: 700px;
            margin-bottom: 2rem;
            animation: slideInUp 0.8s ease-out 0.2s both;
        }

        .cta-buttons {
            display: flex;
            gap: 1.5rem;
            flex-wrap: wrap;
            animation: slideInUp 0.8s ease-out 0.4s both;
        }

        .btn {
            padding: 1rem 2.5rem;
            border: 2px solid var(--primary);
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            font-family: 'Poppins', sans-serif;
            position: relative;
            overflow: hidden;
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: var(--primary);
            transition: left 0.3s ease;
            z-index: -1;
        }

        .btn:hover::before {
            left: 0;
        }

        .btn-primary {
            background: var(--primary);
            color: #fff;
            box-shadow: 0 0 20px rgba(255, 0, 110, 0.4);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 0 30px rgba(255, 0, 110, 0.8);
        }

        .btn-secondary {
            background: transparent;
            border: 2px solid var(--secondary);
            color: var(--secondary);
        }

        .btn-secondary:hover {
            background: var(--secondary);
            color: var(--darker);
            transform: translateY(-3px);
        }

        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Features Section */
        .features {
            padding: 6rem 2rem;
            position: relative;
            z-index: 5;
        }

        .features-container {
            max-width: 1400px;
            margin: 0 auto;
        }

        .section-title {
            font-family: 'JetBrains Mono', monospace;
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            text-align: center;
            color: var(--secondary);
            text-shadow: 0 0 20px rgba(0, 217, 255, 0.3);
        }

        .section-subtitle {
            text-align: center;
            color: var(--gray);
            margin-bottom: 4rem;
            font-size: 1.1rem;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .feature-card {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(0, 217, 255, 0.2);
            border-radius: 12px;
            padding: 2rem;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .feature-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(0, 217, 255, 0.1), rgba(255, 0, 110, 0.05));
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: -1;
        }

        .feature-card:hover {
            border-color: var(--primary);
            transform: translateY(-8px);
            box-shadow: 0 0 25px rgba(255, 0, 110, 0.2);
        }

        .feature-card:hover::before {
            opacity: 1;
        }

        .feature-icon {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .feature-card h3 {
            font-family: 'JetBrains Mono', monospace;
            font-size: 1.3rem;
            margin-bottom: 0.8rem;
            color: var(--secondary);
        }

        .feature-card p {
            color: var(--gray);
            font-size: 0.95rem;
        }

        /* Pricing Section */
        .pricing {
            padding: 6rem 2rem;
            position: relative;
            z-index: 5;
            background: linear-gradient(180deg, transparent, rgba(0, 217, 255, 0.05));
        }

        .pricing-container {
            max-width: 1400px;
            margin: 0 auto;
        }

        .pricing-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }

        .pricing-card {
            background: linear-gradient(135deg, rgba(255, 0, 110, 0.05), rgba(0, 217, 255, 0.05));
            border: 2px solid rgba(0, 217, 255, 0.3);
            border-radius: 12px;
            padding: 2.5rem;
            transition: all 0.3s ease;
            position: relative;
        }

        .pricing-card.featured {
            border-color: var(--primary);
            transform: scale(1.05);
            box-shadow: 0 0 30px rgba(255, 0, 110, 0.3);
        }

        .pricing-card:hover {
            border-color: var(--accent);
            transform: translateY(-10px);
            box-shadow: 0 0 25px rgba(255, 0, 110, 0.2);
        }

        .pricing-card.featured:hover {
            transform: scale(1.05) translateY(-10px);
        }

        .plan-name {
            font-family: 'JetBrains Mono', monospace;
            font-size: 1.5rem;
            color: var(--secondary);
            margin-bottom: 0.5rem;
        }

        .plan-price {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--accent);
            margin-bottom: 0.5rem;
        }

        .plan-price span {
            font-size: 1rem;
            color: var(--gray);
        }

        .plan-description {
            color: var(--gray);
            margin-bottom: 2rem;
            font-size: 0.9rem;
        }

        .plan-features {
            list-style: none;
            margin-bottom: 2rem;
        }

        .plan-features li {
            padding: 0.7rem 0;
            color: var(--gray);
            border-bottom: 1px solid rgba(0, 217, 255, 0.1);
            display: flex;
            align-items: center;
        }

        .plan-features li::before {
            content: '✓';
            color: var(--secondary);
            margin-right: 0.8rem;
            font-weight: 700;
        }

        /* API Documentation Section */
        .api-docs {
            padding: 6rem 2rem;
            position: relative;
            z-index: 5;
        }

        .api-container {
            max-width: 1400px;
            margin: 0 auto;
        }

        .api-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            align-items: center;
        }

        .api-text h3 {
            font-family: 'JetBrains Mono', monospace;
            color: var(--secondary);
            margin-bottom: 1rem;
            font-size: 1.5rem;
        }

        .api-text p {
            color: var(--gray);
            margin-bottom: 1.5rem;
        }

        .code-block {
            background: var(--code-bg);
            border: 1px solid rgba(0, 217, 255, 0.2);
            border-radius: 8px;
            padding: 1.5rem;
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.85rem;
            color: #00ff00;
            overflow-x: auto;
            line-height: 1.5;
        }

        .code-comment {
            color: #888;
        }

        .code-string {
            color: #ffb347;
        }

        .code-keyword {
            color: #00d9ff;
        }

        /* Stats Section */
        .stats {
            padding: 6rem 2rem;
            position: relative;
            z-index: 5;
        }

        .stats-container {
            max-width: 1400px;
            margin: 0 auto;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            text-align: center;
        }

        .stat-item {
            padding: 2rem;
            border: 1px solid rgba(0, 217, 255, 0.2);
            border-radius: 8px;
            animation: fadeInUp 0.6s ease-out;
            transition: all 0.3s ease;
        }

        .stat-item:hover {
            border-color: var(--primary);
            box-shadow: 0 0 20px rgba(255, 0, 110, 0.2);
            transform: translateY(-5px);
        }

        .stat-number {
            font-family: 'JetBrains Mono', monospace;
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--accent);
            margin-bottom: 0.5rem;
        }

        .stat-label {
            color: var(--gray);
            font-size: 0.9rem;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* CTA Section */
        .cta-section {
            padding: 6rem 2rem;
            text-align: center;
            position: relative;
            z-index: 5;
        }

        .cta-section h2 {
            font-family: 'JetBrains Mono', monospace;
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: var(--secondary);
        }

        .cta-section p {
            color: var(--gray);
            font-size: 1.1rem;
            margin-bottom: 2rem;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        /* Footer */
        footer {
            border-top: 1px solid rgba(0, 217, 255, 0.1);
            padding: 3rem 2rem;
            color: var(--gray);
            text-align: center;
            position: relative;
            z-index: 5;
        }

        .footer-content {
            max-width: 1400px;
            margin: 0 auto;
        }

        .footer-links {
            display: flex;
            justify-content: center;
            gap: 2rem;
            margin-bottom: 2rem;
            flex-wrap: wrap;
        }

        .footer-links a {
            color: var(--gray);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-links a:hover {
            color: var(--secondary);
        }

        /* Responsive */
        @media (max-width: 768px) {
            h1 {
                font-size: 2rem;
            }

            .cta-buttons {
                flex-direction: column;
            }

            .btn {
                width: 100%;
                text-align: center;
            }

            .section-title {
                font-size: 1.8rem;
            }

            .api-content {
                grid-template-columns: 1fr;
            }

            .pricing-card.featured {
                transform: scale(1);
            }

            .pricing-card.featured:hover {
                transform: translateY(-10px);
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav>
        <div class="nav-container">
            <div class="logo">{ <span class="logo-accent">YORHA</span> }</div>
            <ul class="nav-links">
                <li><a href="#features">Features</a></li>
                <li><a href="#pricing">Pricing</a></li>
                <li><a href="#api">API Docs</a></li>
                <li><a href="#stats">Stats</a></li>
            </ul>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1><span class="hero-title">YORHA EXPRESS</span><br><span class="hero-highlight">Cloud Scripting Platform</span></h1>
            <p>Deploy intelligent scripts at scale. Enterprise-grade cloud computing with lightning-fast execution, advanced APIs, and unlimited scalability. Build the future, today.</p>
            <div class="cta-buttons">
                <button class="btn btn-primary" onclick="scrollToSection('pricing')">Start Free Trial</button>
                <button class="btn btn-secondary" onclick="scrollToSection('api')">View Documentation</button>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="features">
        <div class="features-container">
            <h2 class="section-title">Powerful Features</h2>
            <p class="section-subtitle">Everything you need to build and deploy advanced scripts</p>
            
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">⚡</div>
                    <h3>Lightning Performance</h3>
                    <p>Execute scripts in milliseconds. Optimized infrastructure for sub-100ms response times globally.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">📡</div>
                    <h3>Global CDN</h3>
                    <p>Deploy your scripts across 150+ edge locations worldwide. Minimal latency guaranteed.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">🔒</div>
                    <h3>Enterprise Security</h3>
                    <p>End-to-end encryption, advanced access controls, and compliance with SOC 2, GDPR standards.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">📊</div>
                    <h3>Real-time Analytics</h3>
                    <p>Monitor performance, track execution metrics, and get detailed insights instantly.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">🔗</div>
                    <h3>Easy Integration</h3>
                    <p>RESTful APIs, webhooks, and SDKs for Python, JavaScript, Go, and more.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">🚀</div>
                    <h3>Auto-Scaling</h3>
                    <p>Automatically scale from 0 to millions of requests. Pay only for what you use.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section id="pricing" class="pricing">
        <div class="pricing-container">
            <h2 class="section-title">Simple, Transparent Pricing</h2>
            <p class="section-subtitle">Choose the perfect plan for your needs</p>
            
            <div class="pricing-grid">
                <div class="pricing-card">
                    <div class="plan-name">Starter</div>
                    <div class="plan-price">$0<span>/month</span></div>
                    <p class="plan-description">Perfect for testing and small projects</p>
                    <ul class="plan-features">
                        <li>100K monthly executions</li>
                        <li>50 MB storage</li>
                        <li>Community support</li>
                        <li>Basic analytics</li>
                        <li>2 custom domains</li>
                    </ul>
                    <button class="btn btn-secondary" onclick="alert('Getting Started with Free Tier')">Get Started</button>
                </div>
                
                <div class="pricing-card featured">
                    <div class="plan-name">Professional</div>
                    <div class="plan-price">$29<span>/month</span></div>
                    <p class="plan-description">For growing applications and teams</p>
                    <ul class="plan-features">
                        <li>10M monthly executions</li>
                        <li>500 GB storage</li>
                        <li>Priority support</li>
                        <li>Advanced analytics</li>
                        <li>Unlimited custom domains</li>
                        <li>API rate limiting: 10K/min</li>
                    </ul>
                    <button class="btn btn-primary" onclick="alert('Starting Professional Plan')">Start Trial</button>
                </div>
                
                <div class="pricing-card">
                    <div class="plan-name">Enterprise</div>
                    <div class="plan-price">Custom<span>/month</span></div>
                    <p class="plan-description">Unlimited scale for enterprises</p>
                    <ul class="plan-features">
                        <li>Unlimited executions</li>
                        <li>Unlimited storage</li>
                        <li>24/7 dedicated support</li>
                        <li>Custom integrations</li>
                        <li>SLA guarantee 99.99%</li>
                        <li>On-premise option</li>
                    </ul>
                    <button class="btn btn-secondary" onclick="alert('Contact sales@yorhaexpress.com')">Contact Sales</button>
                </div>
            </div>
        </div>
    </section>

    <!-- API Documentation Section -->
    <section id="api" class="api-docs">
        <div class="api-container">
            <h2 class="section-title">API Documentation</h2>
            <p class="section-subtitle">Simple, powerful REST API for script deployment and management</p>
            
            <div class="api-content" style="margin-top: 3rem;">
                <div class="api-text">
                    <h3>Deploy Scripts Instantly</h3>
                    <p>Use our REST API to deploy, update, and manage your scripts programmatically. Full control with simple endpoints.</p>
                    <p><strong>Base URL:</strong> <code style="color: #00d9ff;">https://api.yorhaexpress.com/v1</code></p>
                    <p style="margin-top: 1.5rem;"><strong>Authentication:</strong> Bearer token-based API keys with granular permissions.</p>
                </div>
                <div class="code-block">
<span class="code-comment">// Deploy a new script</span>
curl -X POST https://api.yorhaexpress.com/v1/scripts \
  -H <span class="code-string">"Authorization: Bearer YOUR_API_KEY"</span> \
  -H <span class="code-string">"Content-Type: application/json"</span> \
  -d <span class="code-string">'{
  "name": "my-script",
  "code": "console.log(...)",
  "runtime": "node18"
}'</span>

<span class="code-comment">// Response:</span>
{
  <span class="code-string">"id"</span>: <span class="code-string">"script_abc123"</span>,
  <span class="code-string">"status"</span>: <span class="code-string">"deployed"</span>,
  <span class="code-string">"url"</span>: <span class="code-string">"https://api.yorhaexpress.com/run/abc123"</span>
}
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section id="stats" class="stats">
        <div class="stats-container">
            <h2 class="section-title">Trusted By Developers</h2>
            <div class="stats-grid">
                <div class="stat-item">
                    <div class="stat-number">50K+</div>
                    <div class="stat-label">Active Developers</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">10B+</div>
                    <div class="stat-label">Daily Script Executions</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">99.99%</div>
                    <div class="stat-label">Uptime SLA</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">50ms</div>
                    <div class="stat-label">Avg Response Time</div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <h2>Ready to Deploy Your Scripts?</h2>
        <p>Join thousands of developers and start building with YORHA EXPRESS today. Free trial, no credit card required.</p>
        <button class="btn btn-primary" onclick="alert('Welcome to YORHA EXPRESS! Sign up at dashboard.yorhaexpress.com')">Start Free Trial Now</button>
    </section>

    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <div class="footer-links">
                <a href="#features">Features</a>
                <a href="#pricing">Pricing</a>
                <a href="#api">API Docs</a>
                <a href="#">Status</a>
                <a href="#">Blog</a>
                <a href="#">Contact</a>
            </div>
            <p>&copy; 2024 YORHA EXPRESS. Advanced cloud scripting platform. Built for developers. Powered by innovation.</p>
        </div>
    </footer>

    <script>
        // Smooth scrolling navigation
        function scrollToSection(id) {
            const element = document.getElementById(id);
            element?.scrollIntoView({ behavior: 'smooth' });
        }

        // Animate stats on scroll
        function animateStats() {
            const stats = document.querySelectorAll('.stat-item');
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.animation = 'fadeInUp 0.6s ease-out forwards';
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.5 });

            stats.forEach(stat => observer.observe(stat));
        }

        // Feature card animations
        const featureCards = document.querySelectorAll('.feature-card');
        const cardObserver = new IntersectionObserver((entries) => {
            entries.forEach((entry, index) => {
                if (entry.isIntersecting) {
                    entry.target.style.animation = `slideInUp 0.6s ease-out ${index * 0.1}s forwards`;
                    cardObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });

        featureCards.forEach(card => cardObserver.observe(card));

        // Initialize
        document.addEventListener('DOMContentLoaded', animateStats);
    </script>
</body>
</html>