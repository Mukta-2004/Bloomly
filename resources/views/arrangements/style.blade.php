<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<style>
*{margin:0;padding:0;box-sizing:border-box;}
body{font-family:'Segoe UI',sans-serif;background:#fff9f9;color:#333;}
nav{background:rgba(255,255,255,0.97);border-bottom:1px solid #f0e0e4;padding:0 2rem;display:flex;align-items:center;justify-content:space-between;height:64px;position:sticky;top:0;z-index:100;}
.logo{font-size:22px;font-weight:600;color:#e8748a;font-family:Georgia,serif;text-decoration:none;}
.logo span{color:#6aab6a;}
.nav-links{display:flex;gap:1.5rem;list-style:none;margin:0;}
.nav-links a{text-decoration:none;color:#666;font-size:14px;}
.nav-links a:hover,.nav-links a.active{color:#e8748a;}
.nav-cta{background:#e8748a;color:#fff;border:none;padding:8px 20px;border-radius:20px;font-size:14px;cursor:pointer;}

.page-hero{background:linear-gradient(135deg,#fff0f3,#f0fff4);padding:3.5rem 2rem;text-align:center;border-bottom:1px solid #f0e0e4;}
.page-hero h1{font-size:38px;font-family:Georgia,serif;color:#333;margin-bottom:0.5rem;}
.page-hero h1 span{color:#e8748a;}
.page-hero p{color:#888;font-size:15px;max-width:480px;margin:0 auto;}

.section{max-width:900px;margin:0 auto;padding:3rem 2rem;}
.section-label{font-size:11px;letter-spacing:3px;text-transform:uppercase;color:#e8748a;margin-bottom:0.5rem;}
.section-title{font-size:24px;font-family:Georgia,serif;color:#333;margin-bottom:0.4rem;}
.section-sub{font-size:13px;color:#aaa;margin-bottom:2rem;}

.color-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(130px,1fr));gap:1rem;}
.color-card{border:2px solid #f0e0e4;border-radius:14px;padding:1.2rem 1rem;text-align:center;cursor:pointer;transition:all 0.2s;background:#fff;}
.color-card:hover{transform:translateY(-3px);box-shadow:0 8px 24px rgba(232,116,138,0.12);}
.color-card.selected{border-color:#e8748a;box-shadow:0 0 0 3px rgba(232,116,138,0.2);}
.color-swatch{width:48px;height:48px;border-radius:50%;margin:0 auto 0.7rem;border:3px solid rgba(255,255,255,0.8);box-shadow:0 2px 8px rgba(0,0,0,0.1);}
.color-name{font-size:13px;font-weight:600;color:#333;margin-bottom:2px;}
.color-desc{font-size:11px;color:#aaa;}
.check{display:none;color:#e8748a;font-size:16px;margin-top:4px;}
.color-card.selected .check{display:block;}

.divider{border:none;border-top:1px solid #f0e0e4;margin:0;}

.flower-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(110px,1fr));gap:1rem;}
.flower-card{border:2px solid #f0e0e4;border-radius:14px;padding:1rem 0.8rem;text-align:center;cursor:pointer;transition:all 0.2s;background:#fff;position:relative;}
.flower-card:hover{transform:translateY(-3px);box-shadow:0 8px 24px rgba(232,116,138,0.12);}
.flower-card.selected{border-color:#6aab6a;box-shadow:0 0 0 3px rgba(106,171,106,0.2);}
.flower-emoji{font-size:32px;margin-bottom:0.5rem;}
.flower-name{font-size:12px;font-weight:600;color:#333;}
.flower-check{display:none;position:absolute;top:8px;right:8px;background:#6aab6a;color:#fff;border-radius:50%;width:18px;height:18px;font-size:10px;align-items:center;justify-content:center;}
.flower-card.selected .flower-check{display:flex;}

.summary-bar{position:sticky;bottom:0;background:#fff;border-top:1px solid #f0e0e4;padding:1rem 2rem;display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:1rem;}
.summary-text{font-size:14px;color:#666;}
.summary-text strong{color:#333;}
.btn-proceed{background:#e8748a;color:#fff;border:none;padding:12px 32px;border-radius:24px;font-size:14px;cursor:pointer;font-weight:500;}
.btn-proceed:disabled{background:#ddd;cursor:not-allowed;}
.tag{display:inline-block;background:#fff0f3;color:#e8748a;border-radius:10px;padding:3px 10px;font-size:11px;margin:2px;}
.tag.green{background:#f0fff4;color:#6aab6a;}
</style>
</head>
<body>

<nav>
  <a href="#" class="logo">Bloom<span>ly</span></a>
  <ul class="nav-links">
    <li><a href="{{ route('home') }}">Home</a></li>
    <li><a href="#" class="active">Styles</a></li>
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
  <button class="nav-cta">Share an idea</button>
</nav>

<div class="page-hero">
  <h1>Choose Your <span>Style</span> 🌸</h1>
  <p>Pick a color theme and your favorite flowers — we'll craft the perfect arrangement just for you.</p>
</div>

<div class="section">
  <div class="section-label">step 1</div>
  <div class="section-title">Choose a color theme</div>
  <div class="section-sub">Select one theme that matches your occasion's mood.</div>

  <div class="color-grid">
    <div class="color-card" onclick="selectColor(this,'Pastel')">
      <div class="color-swatch" style="background:linear-gradient(135deg,#f9c5d1,#c8e6c9,#b3d9f7);"></div>
      <div class="color-name">Pastel</div>
      <div class="color-desc">Soft & dreamy</div>
      <div class="check">✓ Selected</div>
    </div>
    <div class="color-card" onclick="selectColor(this,'Red Romance')">
      <div class="color-swatch" style="background:linear-gradient(135deg,#c0392b,#e74c3c,#ff6b6b);"></div>
      <div class="color-name">Red Romance</div>
      <div class="color-desc">Bold & passionate</div>
      <div class="check">✓ Selected</div>
    </div>
    <div class="color-card" onclick="selectColor(this,'Golden Glow')">
      <div class="color-swatch" style="background:linear-gradient(135deg,#f39c12,#f1c40f,#ffe066);"></div>
      <div class="color-name">Golden Glow</div>
      <div class="color-desc">Warm & luxurious</div>
      <div class="check">✓ Selected</div>
    </div>
    <div class="color-card" onclick="selectColor(this,'White Elegance')">
      <div class="color-swatch" style="background:linear-gradient(135deg,#fff,#f5f5f5,#e0e0e0);border:1px solid #eee;"></div>
      <div class="color-name">White Elegance</div>
      <div class="color-desc">Pure & timeless</div>
      <div class="check">✓ Selected</div>
    </div>
    <div class="color-card" onclick="selectColor(this,'Lavender Dream')">
      <div class="color-swatch" style="background:linear-gradient(135deg,#9b59b6,#d7bde2,#e8daef);"></div>
      <div class="color-name">Lavender Dream</div>
      <div class="color-desc">Calm & romantic</div>
      <div class="check">✓ Selected</div>
    </div>
    <div class="color-card" onclick="selectColor(this,'Sunset Blush')">
      <div class="color-swatch" style="background:linear-gradient(135deg,#e8748a,#f39c12,#fff0f3);"></div>
      <div class="color-name">Sunset Blush</div>
      <div class="color-desc">Warm & cheerful</div>
      <div class="check">✓ Selected</div>
    </div>
  </div>
</div>

<hr class="divider">

<div class="section">
  <div class="section-label">step 2</div>
  <div class="section-title">Choose your flowers</div>
  <div class="section-sub">Select one or more — combinations are welcome! 🌸</div>

  <div class="flower-grid">
    <div class="flower-card" onclick="toggleFlower(this,'Red Rose')">
      <div class="flower-check">✓</div>
      <div class="flower-emoji">🌹</div>
      <div class="flower-name">Red Rose</div>
    </div>
    <div class="flower-card" onclick="toggleFlower(this,'White Rose')">
      <div class="flower-check">✓</div>
      <div class="flower-emoji">🤍</div>
      <div class="flower-name">White Rose</div>
    </div>
    <div class="flower-card" onclick="toggleFlower(this,'Pink Rose')">
      <div class="flower-check">✓</div>
      <div class="flower-emoji">🌸</div>
      <div class="flower-name">Pink Rose</div>
    </div>
    <div class="flower-card" onclick="toggleFlower(this,'Lily')">
      <div class="flower-check">✓</div>
      <div class="flower-emoji">💐</div>
      <div class="flower-name">Lily</div>
    </div>
    <div class="flower-card" onclick="toggleFlower(this,'Sunflower')">
      <div class="flower-check">✓</div>
      <div class="flower-emoji">🌻</div>
      <div class="flower-name">Sunflower</div>
    </div>
    <div class="flower-card" onclick="toggleFlower(this,'Tulip')">
      <div class="flower-check">✓</div>
      <div class="flower-emoji">🌷</div>
      <div class="flower-name">Tulip</div>
    </div>
    <div class="flower-card" onclick="toggleFlower(this,'Orchid')">
      <div class="flower-check">✓</div>
      <div class="flower-emoji">🪷</div>
      <div class="flower-name">Orchid</div>
    </div>
    <div class="flower-card" onclick="toggleFlower(this,'Daisy')">
      <div class="flower-check">✓</div>
      <div class="flower-emoji">🌼</div>
      <div class="flower-name">Daisy</div>
    </div>
    <div class="flower-card" onclick="toggleFlower(this,'Lavender')">
      <div class="flower-check">✓</div>
      <div class="flower-emoji">💜</div>
      <div class="flower-name">Lavender</div>
    </div>
    <div class="flower-card" onclick="toggleFlower(this,'Baby Breath')">
      <div class="flower-check">✓</div>
      <div class="flower-emoji">🌿</div>
      <div class="flower-name">Baby Breath</div>
    </div>
  </div>
</div>

<div class="summary-bar">
  <div class="summary-text">
    <div id="colorSummary">🎨 No theme selected yet</div>
    <div id="flowerSummary" style="margin-top:4px;">🌸 No flowers selected yet</div>
  </div>
  <button class="btn-proceed" id="proceedBtn" disabled onclick="proceed()">Continue to Book →</button>
</div>

<script>
let selectedColor = null;
let selectedFlowers = [];

function selectColor(el, name) {
  document.querySelectorAll('.color-card').forEach(c => c.classList.remove('selected'));
  el.classList.add('selected');
  selectedColor = name;
  updateSummary();
}

function toggleFlower(el, name) {
  el.classList.toggle('selected');
  if (selectedFlowers.includes(name)) {
    selectedFlowers = selectedFlowers.filter(f => f !== name);
  } else {
    selectedFlowers.push(name);
  }
  updateSummary();
}

function updateSummary() {
  const colorEl = document.getElementById('colorSummary');
  const flowerEl = document.getElementById('flowerSummary');
  const btn = document.getElementById('proceedBtn');

  colorEl.innerHTML = selectedColor
    ? `🎨 Theme: <strong>${selectedColor}</strong>`
    : '🎨 No theme selected yet';

  flowerEl.innerHTML = selectedFlowers.length
    ? `🌸 Flowers: ${selectedFlowers.map(f => `<span class="tag green">${f}</span>`).join('')}`
    : '🌸 No flowers selected yet';

  btn.disabled = !(selectedColor && selectedFlowers.length > 0);
}

function proceed() {
  alert(`Style saved!\nTheme: ${selectedColor}\nFlowers: ${selectedFlowers.join(', ')}\n\nProceeding to booking...`);
}
</script>
</body>
</html>