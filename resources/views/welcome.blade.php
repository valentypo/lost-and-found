<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LoaF - Lost and Found System</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800" rel="stylesheet" />
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            overflow-x: hidden;
            background: #F0F9FF;
            min-height: 100vh;
            position: relative;
        }

        /* Floating shapes animation */
        .floating-shape {
            position: absolute;
            opacity: 0.08;
            animation: float-shapes 20s ease-in-out infinite;
        }

        .shape-1 {
            top: 10%;
            left: 5%;
            width: 100px;
            height: 100px;
            background: #3B82F6;
            border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
            animation-delay: 0s;
        }

        .shape-2 {
            top: 60%;
            right: 10%;
            width: 150px;
            height: 150px;
            background: #60A5FA;
            border-radius: 70% 30% 30% 70% / 70% 70% 30% 30%;
            animation-delay: 2s;
        }

        .shape-3 {
            bottom: 15%;
            left: 15%;
            width: 120px;
            height: 120px;
            background: #3B82F6;
            border-radius: 50% 50% 30% 70% / 30% 30% 70% 70%;
            animation-delay: 4s;
        }

        .shape-4 {
            top: 30%;
            right: 20%;
            width: 80px;
            height: 80px;
            background: #93C5FD;
            border-radius: 30% 70% 70% 30% / 70% 30% 30% 70%;
            animation-delay: 1s;
        }

        @keyframes float-shapes {
            0%, 100% {
                transform: translate(0, 0) rotate(0deg);
            }
            33% {
                transform: translate(30px, -30px) rotate(120deg);
            }
            66% {
                transform: translate(-20px, 20px) rotate(240deg);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(40px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes bounceIn {
            0% {
                opacity: 0;
                transform: scale(0.3);
            }
            50% {
                transform: scale(1.05);
            }
            70% {
                transform: scale(0.9);
            }
            100% {
                opacity: 1;
                transform: scale(1);
            }
        }

        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.05);
            }
        }

        .container {
            position: relative;
            z-index: 10;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }

        .hero-content {
            max-width: 1000px;
            text-align: center;
            animation: fadeInUp 1s ease-out;
        }

        .logo-section {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1rem;
            margin-bottom: 2rem;
            animation: bounceIn 1s ease-out;
        }

        .logo-icon {
            font-size: 5rem;
            animation: pulse 3s ease-in-out infinite;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .logo-icon:hover {
            transform: rotate(10deg) scale(1.1);
        }

        .logo-text {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .logo-title {
            font-size: 4rem;
            font-weight: 800;
            color: #1E40AF;
            letter-spacing: -0.02em;
        }

        .logo-subtitle {
            font-size: 1rem;
            color: #0d4296;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.1em;
        }

        h1 {
            font-size: 3.5rem;
            font-weight: 800;
            color: #1E3A8A;
            margin-bottom: 1.5rem;
            line-height: 1.2;
        }

        .subtitle {
            font-size: 1.5rem;
            color: #1E40AF;
            margin-bottom: 3rem;
            line-height: 1.6;
            font-weight: 500;
        }

        .cta-buttons {
            display: flex;
            gap: 1.5rem;
            justify-content: center;
            flex-wrap: wrap;
            animation: fadeInUp 1.2s ease-out;
            margin-bottom: 4rem;
        }

        .btn {
            padding: 1.25rem 3rem;
            font-size: 1.125rem;
            font-weight: 700;
            border-radius: 12px;
            text-decoration: none;
            transition: all 0.3s ease;
            cursor: pointer;
            border: none;
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            box-shadow: 0 4px 15px rgba(59, 130, 246, 0.2);
            position: relative;
            overflow: hidden;
        }

        .btn::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.4);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }

        .btn:hover::after {
            width: 400px;
            height: 400px;
        }

        .btn span {
            position: relative;
            z-index: 1;
        }

        .btn-primary {
            background: #3B82F6;
            color: white;
        }

        .btn-primary:hover {
            background: #2563EB;
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(59, 130, 246, 0.4);
        }

        .btn-primary:active {
            transform: translateY(-1px);
        }

        .btn-secondary {
            background: white;
            color: #3B82F6;
            border: 2px solid #3B82F6;
        }

        .btn-secondary:hover {
            background: #EFF6FF;
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(59, 130, 246, 0.3);
        }

        .btn-secondary:active {
            transform: translateY(-1px);
        }

        .stats {
            display: flex;
            gap: 4rem;
            flex-wrap: wrap;
            justify-content: center;
            animation: fadeInUp 1.4s ease-out;
            margin-bottom: 5rem;
        }

        .stat {
            text-align: center;
            padding: 1.5rem;
            background: white;
            border-radius: 16px;
            min-width: 150px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(59, 130, 246, 0.1);
            border: 1px solid #DBEAFE;
        }

        .stat:hover {
            transform: translateY(-5px) scale(1.05);
            box-shadow: 0 8px 25px rgba(59, 130, 246, 0.2);
            border-color: #93C5FD;
        }

        .stat-number {
            font-size: 3rem;
            font-weight: 800;
            color: #3B82F6;
            animation: pulse 2s ease-in-out infinite;
        }

        .stat-label {
            font-size: 1rem;
            color: #1E40AF;
            margin-top: 0.5rem;
            font-weight: 600;
        }

        .features {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 2.5rem;
            max-width: 1200px;
            width: 100%;
            animation: fadeInUp 1.6s ease-out;
        }

        .feature-card {
            background: white;
            padding: 3rem;
            border-radius: 20px;
            text-align: center;
            transition: all 0.4s ease;
            cursor: pointer;
            box-shadow: 0 4px 15px rgba(59, 130, 246, 0.1);
            border: 1px solid #DBEAFE;
        }

        .feature-card:hover {
            transform: translateY(-10px) rotate(-2deg);
            box-shadow: 0 15px 40px rgba(59, 130, 246, 0.25);
            border-color: #3B82F6;
        }

        .feature-card:nth-child(even):hover {
            transform: translateY(-10px) rotate(2deg);
        }

        .feature-icon {
            font-size: 4rem;
            margin-bottom: 1.5rem;
            display: inline-block;
            animation: pulse 2s ease-in-out infinite;
        }

        .feature-card:hover .feature-icon {
            animation: bounceIn 0.6s ease-out;
        }

        .feature-card h3 {
            font-size: 1.5rem;
            color: #1E3A8A;
            margin-bottom: 1rem;
            font-weight: 700;
        }

        .feature-card p {
            color: #1E40AF;
            font-size: 1rem;
            line-height: 1.6;
            font-weight: 500;
        }

        /* Interactive particles */
        .particle {
            position: absolute;
            width: 8px;
            height: 8px;
            background: #3B82F6;
            border-radius: 50%;
            pointer-events: none;
            animation: particle-rise 4s ease-in infinite;
            opacity: 0;
        }

        @keyframes particle-rise {
            0% {
                transform: translateY(0) scale(1);
                opacity: 0;
            }
            20% {
                opacity: 1;
            }
            80% {
                opacity: 1;
            }
            100% {
                transform: translateY(-100px) scale(0);
                opacity: 0;
            }
        }

        @media (max-width: 768px) {
            .logo-icon {
                font-size: 3rem;
            }

            .logo-title {
                font-size: 2rem;
            }

            .logo-subtitle {
                font-size: 0.9rem;
            }

            h1 {
                font-size: 2rem;
            }

            .subtitle {
                font-size: 1.125rem;
            }

            .cta-buttons {
                flex-direction: column;
                width: 100%;
            }

            .btn {
                width: 100%;
                justify-content: center;
            }

            .stats {
                gap: 1.5rem;
            }

            .stat-number {
                font-size: 2rem;
            }

            .features {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <!-- Floating shapes -->
    <div class="floating-shape shape-1"></div>
    <div class="floating-shape shape-2"></div>
    <div class="floating-shape shape-3"></div>
    <div class="floating-shape shape-4"></div>

    <div class="container">
        <div class="hero-content">
            <div class="logo-section">
                <img src="{{ asset('images/logo.png') }}" alt="LoaF Logo" class="logo-icon" style="width: 120px; height: 120px; object-fit: contain;">
                <div class="logo-text">
                    <div class="logo-title">LoaF</div>
                    <div class="logo-subtitle">Lost and Found System</div>
                </div>
            </div>
            
            <h1>Reunite With What You Lost</h1>
            
            <p class="subtitle">
                A smart community-driven platform connecting people with their lost belongings. Report, search, and help others find their way back home.
            </p>

            <div class="cta-buttons">
                <a href="/register" class="btn btn-primary">
                    <span>Get Started</span>
                    <span>→</span>
                </a>
                <a href="/login" class="btn btn-secondary">
                    <span>Sign In</span>
                </a>
            </div>

            <div class="stats">
                <div class="stat">
                    <div class="stat-number">10K+</div>
                    <div class="stat-label">Items Reunited</div>
                </div>
                <div class="stat">
                    <div class="stat-number">50K+</div>
                    <div class="stat-label">Active Users</div>
                </div>
                <div class="stat">
                    <div class="stat-number">95%</div>
                    <div class="stat-label">Success Rate</div>
                </div>
            </div>

            <div class="features">
                <div class="feature-card">
                    <div class="feature-icon">📝</div>
                    <h3>Post Lost Items</h3>
                    <p>Report your lost belongings with detailed descriptions, photos, and last known location to help others identify them</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">✅</div>
                    <h3>Post Found Items</h3>
                    <p>Found something? Post it on our platform so the rightful owner can claim it and get their belongings back</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">🔍</div>
                    <h3>Search Items</h3>
                    <p>Browse through our database of lost and found items using powerful search filters to find what you're looking for</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">💬</div>
                    <h3>Contact Finder</h3>
                    <p>Connect directly with people who found your items through our secure messaging system to arrange returns</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Create particles on mouse move
        let particleTimeout;
        document.addEventListener('mousemove', (e) => {
            clearTimeout(particleTimeout);
            particleTimeout = setTimeout(() => {
                createParticle(e.clientX, e.clientY);
            }, 50);
        });

        function createParticle(x, y) {
            const particle = document.createElement('div');
            particle.className = 'particle';
            particle.style.left = x + 'px';
            particle.style.top = y + 'px';
            particle.style.animationDelay = Math.random() * 0.5 + 's';
            document.body.appendChild(particle);

            setTimeout(() => {
                particle.remove();
            }, 4000);
        }

        // Interactive feature cards
        const featureCards = document.querySelectorAll('.feature-card');
        featureCards.forEach(card => {
            card.addEventListener('mouseenter', () => {
                card.style.animationPlayState = 'paused';
            });
            card.addEventListener('mouseleave', () => {
                card.style.animationPlayState = 'running';
            });
        });

        // Logo icon click animation
        const logoIcon = document.querySelector('.logo-icon');
        logoIcon.addEventListener('click', () => {
            logoIcon.style.animation = 'none';
            setTimeout(() => {
                logoIcon.style.animation = 'bounceIn 0.6s ease-out, pulse 3s ease-in-out infinite 0.6s';
            }, 10);
        });

        // Stats counter animation on scroll
        const statsObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const statNumbers = entry.target.querySelectorAll('.stat-number');
                    statNumbers.forEach(stat => {
                        const target = stat.textContent;
                        const isPercent = target.includes('%');
                        const number = parseInt(target.replace(/\D/g, ''));
                        let current = 0;
                        const increment = number / 50;
                        const timer = setInterval(() => {
                            current += increment;
                            if (current >= number) {
                                stat.textContent = target;
                                clearInterval(timer);
                            } else {
                                stat.textContent = Math.floor(current) + (isPercent ? '%' : (target.includes('K') ? 'K+' : '+'));
                            }
                        }, 30);
                    });
                    statsObserver.unobserve(entry.target);
                }
            });
        });

        const statsSection = document.querySelector('.stats');
        if (statsSection) {
            statsObserver.observe(statsSection);
        }

        // Add ripple effect to buttons
        const buttons = document.querySelectorAll('.btn');
        buttons.forEach(button => {
            button.addEventListener('click', function(e) {
                const rect = this.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;
                
                const ripple = document.createElement('span');
                ripple.style.cssText = `
                    position: absolute;
                    width: 20px;
                    height: 20px;
                    background: rgba(255, 255, 255, 0.6);
                    border-radius: 50%;
                    transform: scale(0);
                    animation: ripple-effect 0.6s ease-out;
                    left: ${x}px;
                    top: ${y}px;
                    pointer-events: none;
                `;
                
                this.appendChild(ripple);
                setTimeout(() => ripple.remove(), 600);
            });
        });

        // Add CSS for ripple animation
        const style = document.createElement('style');
        style.textContent = `
            @keyframes ripple-effect {
                to {
                    transform: scale(20);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);
    </script>
</body>
</html>