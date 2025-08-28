<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Time Donation Portal</title>
  <style>
    /* Global Neumorphic Base */
    body {
      margin: 0;
      font-family: 'Inter', sans-serif;
      background: #e0e5ec;
      color: #333;
    }

    a {
      text-decoration: none;
      color: inherit;
    }

    /* Navbar */
    .navbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 15px 50px;
      background: #e0e5ec;
      box-shadow: 6px 6px 12px #a3b1c6,
                  -6px -6px 12px #ffffff;
      position: sticky;
      top: 0;
      z-index: 10;
      border-radius: 0 0 15px 15px;
    }

    .navbar h1 {
      font-size: 1.6rem;
      font-weight: bold;
    }

    .navbar .links a {
      margin-left: 20px;
      font-weight: 500;
      padding: 8px 18px;
      border-radius: 30px;
      background: #e0e5ec;
      box-shadow: 6px 6px 12px #a3b1c6,
                  -6px -6px 12px #ffffff;
      transition: all 0.3s ease;
    }

    .navbar .links a:hover {
      box-shadow: inset 6px 6px 12px #a3b1c6,
                  inset -6px -6px 12px #ffffff;
    }

    /* Hero */
    .hero {
      text-align: center;
      padding: 100px 20px;
    }

    .hero h2 {
      font-size: 2.5rem;
      margin-bottom: 20px;
      font-weight: bold;
      color: #333;
    }

    .hero p {
      font-size: 1.2rem;
      margin-bottom: 30px;
      color: #555;
    }

    .hero .btn {
      padding: 15px 30px;
      border-radius: 30px;
      font-size: 1rem;
      font-weight: bold;
      background: linear-gradient(135deg, #6ee7b7, #3b82f6);
      color: #fff;
      border: none;
      cursor: pointer;
      box-shadow: 6px 6px 12px #a3b1c6,
                  -6px -6px 12px #ffffff;
      transition: transform 0.2s ease;
    }

    .hero .btn:hover {
      transform: scale(1.05);
    }

    /* Section Cards */
    .section {
      padding: 60px 20px;
      text-align: center;
    }

    .section h3 {
      font-size: 2rem;
      margin-bottom: 40px;
      font-weight: bold;
    }

    .card-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 30px;
      max-width: 1100px;
      margin: 0 auto;
    }

    .card {
      background: #e0e5ec;
      padding: 30px;
      border-radius: 20px;
      text-align: center;
      box-shadow: 7px 7px 15px #a3b1c6,
                  -7px -7px 15px #ffffff;
      transition: all 0.3s ease;
    }

    .card:hover {
      box-shadow: inset 7px 7px 15px #a3b1c6,
                  inset -7px -7px 15px #ffffff;
    }

    .card h4 {
      margin-bottom: 15px;
      font-size: 1.2rem;
      font-weight: bold;
    }

    .card p {
      font-size: 0.95rem;
      color: #555;
    }

    /* Footer */
    footer {
      background: #e0e5ec;
      padding: 20px;
      text-align: center;
      font-size: 0.9rem;
      color: #444;
      box-shadow: -6px -6px 12px #ffffff,
                  6px 6px 12px #a3b1c6;
      border-radius: 15px 15px 0 0;
      margin-top: 40px;
    }
  </style>
</head>
<body>
  <!-- Navbar -->
  <div class="navbar">
    <h1>⏳ Time Donation Portal</h1>
    <div class="links">
      <a href="#stories">Stories</a>
      <a href="#faq">FAQ</a>
      <a href="{{ route('login') }}">Login</a>
      <a href="{{ route('register') }}">Register</a>
    </div>
  </div>

  <!-- Hero Section -->
  <section class="hero">
    <h2>Donate Your Time, Change a Life</h2>
    <p>Our portal connects donors with seekers to exchange valuable hours of support and guidance.</p>
    <a href="{{ route('register') }}"><button class="btn">Get Started</button></a>
  </section>

  <!-- Stories -->
  <section class="section" id="stories">
    <h3>Real Impact Stories</h3>
    <div class="card-grid">
      <div class="card">
        <h4>✨ Volunteer Teaching</h4>
        <p>Donors helped students learn coding basics in just 10 sessions.</p>
      </div>
      <div class="card">
        <h4>🤝 Mentorship</h4>
        <p>Professionals donated career guidance hours to college students.</p>
      </div>
      <div class="card">
        <h4>🌍 Community Support</h4>
        <p>Neighbors exchanged hours of help for errands, child care, and tutoring.</p>
      </div>
    </div>
  </section>

  <!-- FAQ -->
  <section class="section" id="faq">
    <h3>Frequently Asked Questions</h3>
    <div class="card-grid">
      <div class="card">
        <h4>How does time donation work?</h4>
        <p>You donate your hours instead of money. Seekers can request time for learning, support, or guidance.</p>
      </div>
      <div class="card">
        <h4>Is there any cost?</h4>
        <p>No, it’s completely free. The only currency here is your valuable time.</p>
      </div>
      <div class="card">
        <h4>Can I both donate and seek time?</h4>
        <p>Yes, you can sign up as both a donor and a seeker within the same account.</p>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer>
    © 2025 Time Donation Portal • All Rights Reserved
  </footer>
</body>
</html>
