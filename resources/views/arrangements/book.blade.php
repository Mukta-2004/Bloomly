<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Book Your Arrangement - Bloomly</title>
<style>
*{margin:0;padding:0;box-sizing:border-box;}
body{font-family:'Segoe UI',sans-serif;background:#fff9f9;color:#333;}
nav{background:rgba(255,255,255,0.97);border-bottom:1px solid #f0e0e4;padding:0 2rem;display:flex;align-items:center;justify-content:space-between;height:64px;position:sticky;top:0;z-index:100;}
.logo{font-size:22px;font-weight:600;color:#e8748a;font-family:Georgia,serif;text-decoration:none;}
.logo span{color:#6aab6a;}
.nav-links{display:flex;gap:1.5rem;list-style:none;margin:0;}
.nav-links a{text-decoration:none;color:#666;font-size:14px;}
.nav-links a:hover{color:#e8748a;}
.nav-cta{background:#e8748a;color:#fff;border:none;padding:8px 20px;border-radius:20px;font-size:14px;cursor:pointer;}

.page-hero{background:linear-gradient(135deg,#fff0f3,#f0fff4);padding:3rem 2rem;text-align:center;border-bottom:1px solid #f0e0e4;}
.page-hero h1{font-size:32px;font-family:Georgia,serif;color:#333;margin-bottom:0.4rem;}
.page-hero h1 span{color:#e8748a;}
.page-hero p{color:#888;font-size:14px;}

.summary-recap{max-width:600px;margin:1.5rem auto 0;text-align:center;font-size:13px;color:#888;}
.summary-recap strong{color:#e8748a;}

.section{max-width:700px;margin:0 auto;padding:2.5rem 2rem;}
.section-label{font-size:11px;letter-spacing:3px;text-transform:uppercase;color:#e8748a;margin-bottom:0.5rem;}
.section-title{font-size:22px;font-family:Georgia,serif;color:#333;margin-bottom:1.5rem;}

.occasion-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(150px,1fr));gap:1rem;margin-bottom:2rem;}
.occasion-card{border:2px solid #f0e0e4;border-radius:14px;padding:1.2rem 1rem;text-align:center;cursor:pointer;transition:all 0.2s;background:#fff;}
.occasion-card:hover{transform:translateY(-3px);box-shadow:0 8px 24px rgba(232,116,138,0.12);}
.occasion-card.selected{border-color:#e8748a;box-shadow:0 0 0 3px rgba(232,116,138,0.2);background:#fff0f3;}
.occasion-emoji{font-size:26px;margin-bottom:0.4rem;}
.occasion-name{font-size:13px;font-weight:600;color:#333;}

.field-group{margin-bottom:1.4rem;}
.field-group label{display:block;font-size:13px;color:#666;margin-bottom:6px;font-weight:500;}
.field-group input{width:100%;padding:12px;border:1px solid #f0e0e4;border-radius:10px;font-size:14px;}

.btn-submit{width:100%;background:#e8748a;color:#fff;border:none;padding:14px;border-radius:24px;font-size:15px;font-weight:500;cursor:pointer;margin-top:1rem;}
.btn-submit:disabled{background:#ddd;cursor:not-allowed;}
.error-msg{color:#c0392b;font-size:12px;margin-top:4px;}
</style>
</head>
<body>

<nav>
  <a href="{{ route('home') }}" class="logo">Bloom<span>ly</span></a>
  <ul class="nav-links">
    <li><a href="{{ route('home') }}">Home</a></li>
    <li><a href="{{ route('arrangements.style') }}">Styles</a></li>
    <li><a href="{{ route('arrangements.about') }}">About</a></li>
    <li><a href="{{ route('arrangements.contact') }}">Contact</a></li>
  </ul>
  <button class="nav-cta">Share an idea</button>
</nav>

<div class="page-hero">
  <h1>Almost <span>There</span> 🎉</h1>
  <p>Tell us the occasion and when you'd like it delivered.</p>
</div>

<div class="summary-recap" id="styleRecap"></div>

<div class="section">

@if($errors->any())
<div class="error-msg" style="margin-bottom:1rem;">
  <ul style="padding-left:18px;">
    @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif

<form method="POST" action="{{ route('arrangements.store') }}" id="bookingForm">
@csrf
<input type="hidden" name="color_theme" id="color_theme">
<input type="hidden" name="flowers" id="flowers">

<div class="section-label">step 3</div>
<div class="section-title">What's the occasion?</div>

<div class="occasion-grid" id="occasionGrid">
  <div class="occasion-card" data-value="Wedding"><div class="occasion-emoji">💍</div><div class="occasion-name">Wedding</div></div>
  <div class="occasion-card" data-value="Birthday"><div class="occasion-emoji">🎂</div><div class="occasion-name">Birthday</div></div>
  <div class="occasion-card" data-value="Engagement"><div class="occasion-emoji">💐</div><div class="occasion-name">Engagement</div></div>
  <div class="occasion-card" data-value="Farewell"><div class="occasion-emoji">👋</div><div class="occasion-name">Farewell</div></div>
  <div class="occasion-card" data-value="Office Party"><div class="occasion-emoji">🏢</div><div class="occasion-name">Office Party</div></div>
  <div class="occasion-card" data-value="Others"><div class="occasion-emoji">✨</div><div class="occasion-name">Others</div></div>
</div>
<input type="hidden" name="occasion" id="occasion" required>

<div class="field-group">
  <label>Event Date</label>
  <input type="date" name="event_date" required>
</div>

<div class="field-group">
  <label>Event Time</label>
  <input type="time" name="event_time" required>
</div>

<button type="submit" class="btn-submit" id="submitBtn" disabled>Confirm Booking →</button>

</form>
</div>

<script>
  // Recover style selections from sessionStorage
  const theme = sessionStorage.getItem('bloomly_theme');
  const flowers = JSON.parse(sessionStorage.getItem('bloomly_flowers') || '[]');

  document.getElementById('color_theme').value = theme || '';
  document.getElementById('flowers').value = flowers.join(', ');

  document.getElementById('styleRecap').innerHTML = theme
    ? `🎨 Theme: <strong>${theme}</strong> &nbsp;·&nbsp; 🌸 Flowers: <strong>${flowers.join(', ') || 'None'}</strong>`
    : `⚠️ No style selected — <a href="{{ route('arrangements.style') }}">go back and choose one</a>.`;

  // Occasion card selection
  const cards = document.querySelectorAll('.occasion-card');
  const occasionInput = document.getElementById('occasion');
  const submitBtn = document.getElementById('submitBtn');

  cards.forEach(card => {
    card.addEventListener('click', () => {
      cards.forEach(c => c.classList.remove('selected'));
      card.classList.add('selected');
      occasionInput.value = card.dataset.value;
      submitBtn.disabled = false;
    });
  });
</script>

</body>
</html>