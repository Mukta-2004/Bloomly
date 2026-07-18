<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bloomly — Every Occasion Deserves to Bloom</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
</head>
<body>

<nav>
    <div class="logo">Bloom<span>ly</span></div>
    <ul class="nav-links">
        <li><a href="/">Home</a></li>
        <li><a href="{{ route('arrangements.style') }}">Styles</a></li>
        <li><a href="/arrangements">Book</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Contact</a></li>
    </ul>
    <button class="nav-cta">Share an idea</button>
</nav>

<div class="hero">
    <div class="slide slide-1 active"></div>
    <div class="slide slide-2"></div>
    <div class="slide slide-3"></div>
    <div class="slide slide-4"></div>
    <div class="overlay"></div>
    <div class="hero-content">
        <div class="hero-badge">🌸 Welcome to Bloomly</div>
        <h1 class="hero-title">Every occasion deserves<br>to <span>bloom</span></h1>
        <p class="hero-sub">Handcrafted floral arrangements for your most cherished moments — weddings, birthdays, anniversaries and beyond.</p>
        <div class="mt-3">
            <a href="/arrangements" class="btn-hero-primary">Book a decoration</a>
            <a href="/arrangements" class="btn-hero-outline">Browse styles</a>
        </div>
    </div>
    <div class="dots" id="dots">
        <div class="dot active" onclick="goTo(0)"></div>
        <div class="dot" onclick="goTo(1)"></div>
        <div class="dot" onclick="goTo(2)"></div>
        <div class="dot" onclick="goTo(3)"></div>
    </div>
</div>

<p class="section-label">why bloomly</p>
<h2 class="section-title">Celebrations made unforgettable</h2>
<p class="section-sub">From a single bloom to a full venue — we bring your vision to life.</p>

<div class="features">
    <div class="feature-card">
        <div class="feature-icon">💐</div>
        <div class="feature-title">Curated arrangements</div>
        <div class="feature-desc">Handpicked flowers styled for each occasion — nothing generic, ever.</div>
    </div>
    <div class="feature-card">
        <div class="feature-icon">📅</div>
        <div class="feature-title">Easy booking</div>
        <div class="feature-desc">Pick a date, choose your style, and we handle the rest.</div>
    </div>
    <div class="feature-card">
        <div class="feature-icon">✨</div>
        <div class="feature-title">Real-time status</div>
        <div class="feature-desc">Track your booking from pending to confirmed — always in the loop.</div>
    </div>
    <div class="feature-card">
        <div class="feature-icon">🎨</div>
        <div class="feature-title">Share your vision</div>
        <div class="feature-desc">Have a unique idea? Send it our way — we love a creative challenge.</div>
    </div>
</div>

<div class="quote-section">
    <span class="quote-mark">"</span>
    <p class="quote-text">Occasions are the kindest way to escape the busy, toxic rush of everyday life — and step into something wholesome, sweet, and beautifully loud.</p>
    <p class="quote-author">— the bloomly spirit</p>
</div>

<footer>
    &copy; 2026 Bloomly &nbsp;·&nbsp; Made with 🌸 for every occasion
    &nbsp;·&nbsp; <a href="/arrangements">Browse arrangements</a>
</footer>

<script>
    let current = 0;
    const slides = document.querySelectorAll('.slide');
    const dots = document.querySelectorAll('.dot');

    function goTo(n) {
        slides[current].classList.remove('active');
        dots[current].classList.remove('active');
        current = n;
        slides[current].classList.add('active');
        dots[current].classList.add('active');
    }

    setInterval(() => { goTo((current + 1) % slides.length); }, 3000);
</script>
</body>
</html>