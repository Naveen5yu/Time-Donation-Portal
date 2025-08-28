<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Donor Dashboard</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&family=Orbitron:wght@500;700&display=swap" rel="stylesheet">
  <style>
    :root {
      --bg: #ecf0f3;
      --text: #34495e;
      --shadow-dark: #a3b1c6;
      --shadow-light: #ffffff;
      --accent-blue: #007bff;
      --accent-pink: #ff0080;
      --accent-green: #28a745;
      --card-gradient-blue: linear-gradient(135deg, #4facfe, #00f2fe);
      --card-gradient-pink: linear-gradient(135deg, #f093fb, #f5576c);
      --card-gradient-green: linear-gradient(135deg, #a1c4fd, #c2e9fb);
      --card-text-light: #ffffff;
      --navbar-gradient: linear-gradient(90deg, #ecf0f3, #e0e5ec);
      --header-text-gradient: linear-gradient(90deg, #34495e, #5a6e81);
      --logout-gradient: linear-gradient(135deg, #f5576c, #f093fb);
    }

    body.dark-mode {
      --bg: #1e1e2a;
      --text: #f3f3f3;
      --shadow-dark: #151520;
      --shadow-light: #2a2a3a;
      --accent-blue: #60a5fa;
      --accent-pink: #ff80a0;
      --accent-green: #90ee90;
      --card-gradient-blue: linear-gradient(135deg, #1a2a6c, #b21f1f, #fdbb2d);
      --card-gradient-pink: linear-gradient(135deg, #ee9ca7, #ffdde1);
      --card-gradient-green: linear-gradient(135deg, #a1c4fd, #c2e9fb);
      --card-text-light: #ffffff;
      --navbar-gradient: linear-gradient(90deg, #1e1e2a, #2c2c3a);
      --header-text-gradient: linear-gradient(90deg, #f3f3f3, #d3d3d3);
      --logout-gradient: linear-gradient(135deg, #ffdde1, #ee9ca7);
    }

    body {
      margin: 0;
      font-family: 'Inter', sans-serif;
      background: var(--bg);
      color: var(--text);
      transition: background 0.5s ease-in-out, color 0.5s ease-in-out;
      display: flex;
      flex-direction: column;
      align-items: center;
      min-height: 100vh;
      padding: 0 20px;
    }

    .navbar {
      width: 100%;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 15px 25px;
      background: var(--navbar-gradient);
      box-shadow: 8px 8px 16px var(--shadow-dark), -8px -8px 16px var(--shadow-light);
      border-radius: 0 0 25px 25px;
      margin-bottom: 40px;
      max-width: 900px;
      transition: all 0.5s ease-in-out;
    }

    .navbar-left {
      display: flex;
      align-items: center;
      gap: 15px;
    }

    .navbar-left h2 {
      margin: 0;
      font-size: 1.3rem;
      color: var(--text);
      transition: color 0.5s ease-in-out;
    }

    .navbar-right {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .toggle-btn {
      padding: 10px 20px;
      border: none;
      border-radius: 30px;
      font-weight: bold;
      cursor: pointer;
      background: var(--bg);
      color: var(--text);
      box-shadow: 6px 6px 12px var(--shadow-dark), -6px -6px 12px var(--shadow-light);
      transition: all 0.4s ease;
      position: relative;
      overflow: hidden;
    }

    .toggle-btn::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: var(--card-gradient-blue);
      opacity: 0;
      transition: opacity 0.4s ease;
      border-radius: 30px;
      z-index: -1;
    }

    .toggle-btn:hover::before {
      opacity: 1;
    }
    .toggle-btn:hover {
      color: var(--card-text-light);
      text-shadow: 1px 1px 3px rgba(0,0,0,0.3);
    }
    .toggle-btn:active {
      box-shadow: inset 8px 8px 16px var(--shadow-dark), inset -8px -8px 16px var(--shadow-light);
      transform: scale(0.95);
    }

    body.dark-mode .toggle-btn::before {
        background: var(--card-gradient-pink);
    }

    .header {
      text-align: center;
      margin: 0 0 40px 0;
    }

    .header h1 {
      margin: 0;
      font-size: 2.2rem;
      font-family: 'Orbitron', sans-serif;
      background: var(--header-text-gradient);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      text-shadow: 2px 2px 5px rgba(0,0,0,0.1);
      transition: all 0.5s ease-in-out;
    }

    .header h3 {
      margin: 10px 0 0 0;
      font-size: 1.4rem;
      color: var(--text);
      transition: color 0.5s ease-in-out;
    }

    .dashboard {
      width: 100%;
      max-width: 900px;
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 30px;
      flex-wrap: wrap;
      padding-bottom: 40px;
    }

    .card {
      width: 250px;
      height: 180px;
      border-radius: 25px;
      display: flex;
      justify-content: center;
      align-items: center;
      font-size: 1.3rem;
      font-weight: bold;
      text-shadow: 1px 1px 3px rgba(0,0,0,0.3);
      box-shadow: 12px 12px 24px var(--shadow-dark), -12px -12px 24px var(--shadow-light);
      transition: transform 0.4s ease, box-shadow 0.4s ease;
      text-decoration: none;
      color: var(--card-text-light);
      position: relative;
      overflow: hidden;
      background-size: 200% 200%;
      animation: gradientShift 10s ease infinite alternate;
    }

    @keyframes gradientShift {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    .card-my-donations {
      background: var(--card-gradient-blue);
      box-shadow: 12px 12px 24px rgba(79, 172, 254, 0.4), -12px -12px 24px var(--shadow-light);
    }
    .card-seeker-requests {
      background: var(--card-gradient-pink);
      box-shadow: 12px 12px 24px rgba(240, 147, 251, 0.4), -12px -12px 24px var(--shadow-light);
    }
    .card-chat {
      background: var(--card-gradient-green);
      box-shadow: 12px 12px 24px rgba(161, 196, 253, 0.4), -12px -12px 24px var(--shadow-light);
    }

    .card:hover {
      transform: translateY(-8px) scale(1.02);
      box-shadow: 10px 10px 20px var(--shadow-dark), -10px -10px 20px var(--shadow-light);
    }

    body.dark-mode .card-my-donations {
        box-shadow: 12px 12px 24px rgba(26, 42, 108, 0.4), -12px -12px 24px var(--shadow-light);
    }
    body.dark-mode .card-seeker-requests {
        box-shadow: 12px 12px 24px rgba(238, 156, 167, 0.4), -12px -12px 24px var(--shadow-light);
    }
    body.dark-mode .card-chat {
        box-shadow: 12px 12px 24px rgba(161, 196, 253, 0.4), -12px -12px 24px var(--shadow-light);
    }

    .chat-list {
      width: 100%;
      max-width: 900px;
      padding: 20px;
      background: var(--bg);
      border-radius: 25px;
      box-shadow: 12px 12px 24px var(--shadow-dark), -12px -12px 24px var(--shadow-light);
      margin-bottom: 40px;
    }

    .chat-list h3 {
      font-size: 1.5rem;
      color: var(--text);
      margin-bottom: 20px;
    }

    .chat-item {
      padding: 15px;
      background: var(--card-gradient-green);
      border-radius: 15px;
      margin-bottom: 10px;
      text-decoration: none;
      color: var(--card-text-light);
      display: block;
      box-shadow: 8px 8px 16px rgba(161, 196, 253, 0.4), -8px -8px 16px var(--shadow-light);
      transition: transform 0.4s ease, box-shadow 0.4s ease;
    }

    .chat-item:hover {
      transform: translateY(-5px);
      box-shadow: 10px 10px 20px var(--shadow-dark), -10px -10px 20px var(--shadow-light);
    }

    .no-chats {
      color: var(--text);
      text-align: center;
      padding: 20px;
      font-size: 1.1rem;
    }

    .logout-form {
      margin-top: 40px;
      margin-bottom: 60px;
      text-align: center;
    }

    .logout-btn {
      padding: 14px 30px;
      border: none;
      border-radius: 35px;
      font-weight: bold;
      cursor: pointer;
      background: var(--logout-gradient);
      color: var(--card-text-light);
      box-shadow: 8px 8px 16px rgba(245, 87, 108, 0.4), -8px -8px 16px var(--shadow-light);
      transition: all 0.3s ease;
      display: inline-block;
      width: 200px;
      font-size: 1.1rem;
      text-shadow: 1px 1px 3px rgba(0,0,0,0.3);
    }

    .logout-btn:hover {
      box-shadow: inset 7px 7px 14px rgba(245, 87, 108, 0.5), inset -7px -7px 14px var(--shadow-light);
      transform: scale(0.97);
      color: white;
    }
    .logout-btn:active {
      box-shadow: inset 10px 10px 20px rgba(245, 87, 108, 0.6), inset -10px -10px 20px var(--shadow-light);
      transform: scale(0.94);
    }
  </style>
</head>
<body>
  <!-- Navbar -->
  <div class="navbar">
    <div class="navbar-left">
      <h2>Welcome, {{ Auth::user()->name }}</h2>
    </div>
    <div class="navbar-right">
      <button class="toggle-btn" onclick="toggleDarkMode()">🌙 Toggle Dark Mode</button>
    </div>
  </div>

  <!-- Page Header -->
  <div class="header">
    <h1>Donor Dashboard</h1>
    <h3>TDP</h3>
  </div>

  <!-- Dashboard Cards -->
  <div class="dashboard">
    <a href="{{ route('donor.my_donations') }}" class="card card-my-donations">My Donations</a>
    <a href="{{ route('donor.seeker_requests') }}" class="card card-seeker-requests">Seeker Requests</a>
  </div>

  <!-- Chat List -->
  <div class="chat-list">
    <h3>Active Chats</h3>
    @if ($donations->isEmpty())
        <p class="no-chats">No active chats available.</p>
    @else
        @foreach ($donations as $donation)
            <a href="{{ route('donor.chat', ['timeRequest' => $donation->id]) }}" class="chat-item">
                Chat for {{ $donation->title }}
                @if ($donation->messages->isNotEmpty())
                    <small>(Last message: {{ $donation->messages->first()->created_at->diffForHumans() }})</small>
                @endif
            </a>
        @endforeach
    @endif
  </div>

  <!-- Logout button -->
  <form action="{{ route('logout') }}" method="POST" class="logout-form">
    @csrf
    <button type="submit" class="logout-btn">Logout</button>
  </form>

  <script>
    function toggleDarkMode() {
      document.body.classList.toggle('dark-mode');
      const toggleBtn = document.querySelector('.toggle-btn');
      if (document.body.classList.contains('dark-mode')) {
        toggleBtn.textContent = '☀️ Toggle Dark Mode';
      } else {
        toggleBtn.textContent = '🌙 Toggle Dark Mode';
      }
    }

    window.onload = function() {
      const toggleBtn = document.querySelector('.toggle-btn');
      if (document.body.classList.contains('dark-mode')) {
        toggleBtn.textContent = '☀️ Toggle Dark Mode';
      } else {
        toggleBtn.textContent = '🌙 Toggle Dark Mode';
      }
    };
  </script>
</body>
</html>