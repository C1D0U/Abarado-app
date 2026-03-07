{{-- 
old Welcome.blade.php 

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
    </style>
</head>

<body>

    <!-- Old Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>
                <span class="hero-title">YORHA EXPRESS</span><br>
                <span class="hero-highlight">Cloud Scripting Platform</span>
            </h1>

            <p>
                Deploy intelligent scripts at scale. Enterprise-grade cloud computing with lightning-fast execution,
                advanced APIs, and unlimited scalability.
            </p>

            <div class="cta-buttons">
                <button class="btn btn-primary">Start Free Trial</button>
                <button class="btn btn-secondary">View Documentation</button>
            </div>
        </div>
    </section>

</body>
</html>

--}}