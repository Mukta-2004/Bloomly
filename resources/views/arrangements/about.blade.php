<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>About Bloomly</title>
<style>
*{
    margin:0;padding:0;box-sizing:border-box;
}

body{
    font-family:'Segoe UI',sans-serif;background:#fff9f9;color:#333;
}
nav{
    background:rgba(255,255,255,0.97);border-bottom:1px solid #f0e0e4;padding:0 2rem;display:flex;align-items:center;justify-content:space-between;height:64px;position:sticky;top:0;z-index:100;
}
.logo{
    font-size:22px;font-weight:600;color:#e8748a;font-family:Georgia,serif;text-decoration:none;
}
.logo span{color:#6aab6a;}
.nav-links{display:flex;gap:1.5rem;list-style:none;margin:0;}
.nav-links a{text-decoration:none;color:#666;font-size:14px;}
.nav-links a:hover,.nav-links a.active{color:#e8748a;}
.nav-cta{background:#e8748a;color:#fff;border:none;padding:8px 20px;border-radius:20px;font-size:14px;cursor:pointer;}

.about-hero{
    background:linear-gradient(135deg,#fff0f3,#f0fff4);padding:4rem 2rem;text-align:center;border-bottom:1px solid #f0e0e4;
}
.about-hero h1{font-size:38px;font-family:Georgia,serif;color:#333;margin-bottom:0.6rem;}
.about-hero h1 span{color:#e8748a;}
.about-hero p{color:#888;font-size:15px;max-width:500px;margin:0 auto;}

.about-section{max-width:750px;margin:0 auto;padding:3rem 2rem;text-align:center;}
.about-section p{font-size:15px;line-height:1.8;color:#555;margin-bottom:1.4rem;}
.about-section .highlight{color:#e8748a;font-weight:600;}

.thank-you{
    background:#fff;border:2px solid #f0e0e4;border-radius:20px;max-width:600px;margin:2rem auto 4rem;padding:2.5rem 2rem;text-align:center;
}
.thank-you h2{font-family:Georgia,serif;font-size:24px;color:#333;margin-bottom:0.6rem;}
.thank-you h2 span{color:#6aab6a;}
.thank-you p{font-size:14px;color:#888;}
</style>
</head>
<body>

<nav>
  <a href="{{ route('home') }}" class="logo">Bloom<span>ly</span></a>
  <ul class="nav-links">
    <li><a href="{{ route('home') }}">Home</a></li>
    <li><a href="{{ route('arrangements.style') }}">Styles</a></li>
    <li><a href="{{ route('arrangements.about') }}" class="active">About</a></li>
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

<div class="about-hero">
  <h1>Welcome to <span>Bloomly</span> 🌸</h1>
  <p>Where every occasion finds its perfect bloom.</p>
</div>

<div class="about-section">
  <p>
    At <span class="highlight">Bloomly</span>, we believe every celebration deserves a little magic.
    From birthdays to weddings, anniversaries to quiet thank-yous, we bring your moments to life
    through thoughtfully arranged flowers and themed decorations crafted just for you.
  </p>
  <p>
    What started as a love for flowers has grown into a place where colors, petals, and care
    come together to tell your story. Whether you're planning something big or simply want to
    brighten someone's day, we're here to help you bloom beautifully.
  </p>
</div>

<div class="thank-you">
  <h2>Thank You for Visiting <span>🌿</span></h2>
  <p>We're so glad you stopped by — we can't wait to help you create something beautiful.</p>
</div>

</body>
</html>