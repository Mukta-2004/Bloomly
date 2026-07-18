<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Contact Bloomly</title>
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

.contact-hero{background:linear-gradient(135deg,#fff0f3,#f0fff4);padding:4rem 2rem;text-align:center;border-bottom:1px solid #f0e0e4;}
.contact-hero h1{font-size:38px;font-family:Georgia,serif;color:#333;margin-bottom:0.6rem;}
.contact-hero h1 span{color:#e8748a;}
.contact-hero p{color:#888;font-size:15px;max-width:500px;margin:0 auto;}

.contact-section{max-width:900px;margin:0 auto;padding:3rem 2rem;}
.contact-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(240px,1fr));gap:1.5rem;margin-bottom:2.5rem;}
.contact-card{background:#fff;border:2px solid #f0e0e4;border-radius:16px;padding:1.6rem;text-align:center;transition:all 0.2s;}
.contact-card:hover{transform:translateY(-3px);box-shadow:0 8px 24px rgba(232,116,138,0.12);}
.contact-icon{font-size:28px;margin-bottom:0.6rem;}
.contact-card h3{font-family:Georgia,serif;font-size:16px;color:#333;margin-bottom:0.5rem;}
.contact-card p{font-size:14px;color:#666;margin:2px 0;}
.contact-card a{color:#e8748a;text-decoration:none;font-weight:500;}
.contact-card a:hover{text-decoration:underline;}

.location-card{background:#fff;border:2px solid #f0e0e4;border-radius:16px;padding:2rem;text-align:center;margin-bottom:2.5rem;}
.location-card .contact-icon{font-size:32px;}
.location-card h3{font-family:Georgia,serif;font-size:18px;color:#333;margin-bottom:0.5rem;}
.location-card p{font-size:14px;color:#666;}

.social-section{background:linear-gradient(135deg,#fff0f3,#f0fff4);border-radius:20px;padding:2.5rem 2rem;text-align:center;}
.social-section p{font-size:15px;color:#555;margin-bottom:1.2rem;}
.social-links{display:flex;justify-content:center;gap:1rem;flex-wrap:wrap;}
.social-btn{display:inline-flex;align-items:center;gap:8px;background:#fff;border:2px solid #f0e0e4;border-radius:24px;padding:10px 22px;text-decoration:none;color:#333;font-size:14px;font-weight:500;transition:all 0.2s;}
.social-btn:hover{border-color:#e8748a;color:#e8748a;}
</style>
</head>
<body>

<nav>
  <a href="{{ route('home') }}" class="logo">Bloom<span>ly</span></a>
  <ul class="nav-links">
    <li><a href="{{ route('home') }}">Home</a></li>
    <li><a href="{{ route('arrangements.style') }}">Styles</a></li>
    <li><a href="{{ route('arrangements.about') }}">About</a></li>
    <li><a href="{{ route('arrangements.contact') }}" class="active">Contact</a></li>
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

<div class="contact-hero">
  <h1>Let's Get in <span>Touch</span> 💌</h1>
  <p>Got a question, a special request, or just want to say hello? We'd love to hear from you.</p>
</div>

<div class="contact-section">

  <div class="contact-grid">
    <div class="contact-card">
      <div class="contact-icon">👩‍💼</div>
      <h3>Manager</h3>
      <p><a href="tel:+8801316419081">+880 1316419081</a></p>
    </div>
    <div class="contact-card">
      <h3>Advisor 1</h3>
      <p><a href="tel:+8801799017436">+880 1799017436</a></p>
    </div>
    <div class="contact-card">
      <h3>Advisor 2</h3>
      <p><a href="tel:+8801745659880">+880 1745659880</a></p>
    </div>
     <div class="contact-card">
      <h3>Advisor 3</h3>
      <p><a href="tel:+8801716142026">+880 1716142026</a></p>
    </div>
    <div class="contact-card">
      <div class="contact-icon">☎️</div>
      <h3>Helpline</h3>
      <p><a href="tel:+8801XXXXXXXXX">+880 1XXX-XXXXXX</a></p>
    </div>
  </div>

  <div class="location-card">
    <div class="contact-icon">📍</div>
    <h3>Find Us Here</h3>
    <p>South Kutubkhali, Jatrabari, Dhaka</p>
  </div>

  <div class="social-section">
    <p>You can also find us here 🌸</p>
    <div class="social-links">
      <a href="https://facebook.com/YOUR_PAGE" target="_blank" class="social-btn">📘 Facebook</a>
      <a href="tel:+8801XXXXXXXXX" class="social-btn">📞 +880 1XXX-XXXXXX</a>
    </div>
  </div>

</div>

</body>
</html>