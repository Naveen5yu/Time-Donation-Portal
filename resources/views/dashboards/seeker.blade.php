<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <title>Seeker Dashboard - Time Donation Portal</title>
  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Roboto', sans-serif;
      background: #dce3eb;
      color: #333;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      transition: background 0.4s, color 0.4s;
    }

    body.dark {
      background: #1e1e1e;
      color: #f0f0f0;
    }

    .dashboard-container {
      max-width: 1000px;
      width: 90%;
      padding: 40px;
      background: #e0e5ec;
      border-radius: 20px;
      text-align: center;
      box-shadow: 10px 10px 20px #a3b1c6,
                  -10px -10px 20px #ffffff;
      transition: background 0.4s, box-shadow 0.4s;
    }

    body.dark .dashboard-container {
      background: #2b2b2b;
      box-shadow: 10px 10px 20px #111,
                  -10px -10px 20px #333;
    }

    .top-bar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 30px;
    }

    .welcome-text {
      font-size: 1.2rem;
      font-weight: bold;
      font-family: 'Orbitron', sans-serif;
    }

    .toggle-btn {
      background: #e0e5ec;
      border: none;
      border-radius: 50%;
      width: 45px;
      height: 45px;
      cursor: pointer;
      font-size: 1.3rem;
      box-shadow: 5px 5px 10px #a3b1c6,
                  -5px -5px 10px #ffffff;
      transition: 0.3s;
    }

    body.dark .toggle-btn {
      background: #2b2b2b;
      box-shadow: 5px 5px 10px #111,
                  -5px -5px 10px #333;
      color: #f0f0f0;
    }

    .logo {
      width: 90px;
      height: 90px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 25px;
      background: #e0e5ec;
      box-shadow: inset 6px 6px 12px #a3b1c6,
                  inset -6px -6px 12px #ffffff;
      font-family: 'Orbitron', sans-serif;
      font-size: 1.6rem;
      font-weight: 700;
      color: #444;
      transition: background 0.4s, color 0.4s, box-shadow 0.4s;
    }

    body.dark .logo {
      background: #2b2b2b;
      color: #f0f0f0;
      box-shadow: inset 6px 6px 12px #111,
                  inset -6px -6px 12px #333;
    }

    h1 {
      font-size: 2rem;
      margin-bottom: 40px;
      color: #333;
      font-family: 'Orbitron', sans-serif;
      transition: color 0.4s;
    }

    body.dark h1 {
      color: #f0f0f0;
    }

    .modules {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 25px;
      margin-bottom: 40px;
    }

    .module-card {
      background: #e0e5ec;
      padding: 25px;
      border-radius: 15px;
      text-decoration: none;
      color: #333;
      font-weight: bold;
      font-size: 1.1rem;
      text-transform: uppercase;
      display: flex;
      align-items: center;
      justify-content: center;
      box-shadow: 7px 7px 15px #a3b1c6,
                  -7px -7px 15px #ffffff;
      transition: all 0.3s ease, background 0.4s, color 0.4s;
    }

    .module-card:hover {
      transform: translateY(-5px);
      box-shadow: inset 5px 5px 10px #a3b1c6,
                  inset -5px -5px 10px #ffffff;
    }

    body.dark .module-card {
      background: #2b2b2b;
      color: #f0f0f0;
      box-shadow: 7px 7px 15px #111,
                  -7px -7px 15px #333;
    }

    .logout-btn {
      background: linear-gradient(135deg, #6ee7b7, #3b82f6);
      border: none;
      padding: 15px 30px;
      border-radius: 30px;
      color: white;
      font-size: 1.1rem;
      font-weight: bold;
      cursor: pointer;
      transition: 0.3s ease;
      box-shadow: 6px 6px 12px #a3b1c6,
                  -6px -6px 12px #ffffff;
    }

    .logout-btn:hover {
      transform: scale(1.05);
    }
  </style>
</head>
<body>
  <div class="dashboard-container">

    <!-- Top bar with Welcome + Dark Mode Toggle -->
    <div class="top-bar">
      <div class="welcome-text">Welcome, {{ Auth::user()->name }}</div>
      <button class="toggle-btn" id="themeToggle">🌙</button>
    </div>

    <div class="logo">TDP</div>
    <h1>Seeker Dashboard</h1>

    <div class="modules">
      <a href="{{ route('seeker.time_requests.index') }}" class="module-card">My Time Requests</a>
      <a href="{{ route('seeker.donors.index') }}" class="module-card">Donors Module</a>
      <a href="{{ route('seeker.chat') }}" class="module-card">Chat with Donors</a>
    </div>

    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <button type="submit" class="logout-btn">Logout</button>
    </form>
  </div>

  <script>
    const toggleBtn = document.getElementById('themeToggle');
    toggleBtn.addEventListener('click', () => {
      document.body.classList.toggle('dark');
      toggleBtn.textContent = document.body.classList.contains('dark') ? '☀️' : '🌙';
    });
  </script>
</body>
</html>
