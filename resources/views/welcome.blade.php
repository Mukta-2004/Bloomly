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
        <li><a href="{{ route('home') }}">Home</a></li>
        <li><a href="{{ route('arrangements.style') }}">Styles</a></li>
        <li><a href="{{ route('arrangements.about') }}">About</a></li>
        <li><a href="{{ route('arrangements.contact') }}">Contact</a></li>
        @auth
        @if(auth()->user()->is_admin)
         <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        @endif
        @else
         <li><a href="{{ route('login') }}">Admin Login</a></li>
        @endauth
    </ul>
    <button class="nav-cta">
      <a href="{{ route('arrangements.contact') }}" class="nav-cta">Share an idea</a>
    </button>
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
           <a href="{{ route('arrangements.style') }}" class="btn-hero-primary">Book a decoration</a> 
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

<div class="section" style="max-width:900px;margin:0 auto;padding:3rem 2rem;">
  <p class="section-label">live from our api</p>
  <h2 class="section-title">Recent Bloomly Bookings</h2>
  <p class="section-sub">Pulled live via our REST API — see it update in real time.</p>
  <div id="recentBookings" style="display:grid;grid-template-columns:repeat(auto-fill,minmax(220px,1fr));gap:1rem;margin-top:1.5rem;">
    <p style="color:#999;">Loading...</p>
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
<script>
fetch('/api/arrangements')
  .then(res => res.json())
  .then(data => {
    const container = document.getElementById('recentBookings');
    if (!data.length) {
      container.innerHTML = '<p style="color:#999;">No bookings yet.</p>';
      return;
    }
    container.innerHTML = data.slice(0, 6).map(b => `
      <div style="background:#fff;border:2px solid #f0e0e4;border-radius:14px;padding:1.2rem;">
        <div style="font-size:12px;color:#e8748a;text-transform:uppercase;letter-spacing:1px;">${b.occasion}</div>
        <div style="font-family:Georgia,serif;font-size:16px;margin:6px 0;">${b.color_theme || 'Custom Style'}</div>
        <div style="font-size:13px;color:#888;">🌸 ${b.flowers || 'Not specified'}</div>
        <div style="font-size:12px;color:#aaa;margin-top:6px;">${b.event_date || ''}</div>
      </div>
    `).join('');
  })
  .catch(() => {
    document.getElementById('recentBookings').innerHTML = '<p style="color:#c0392b;">Could not load bookings.</p>';
  });
</script>
</body>
</html>