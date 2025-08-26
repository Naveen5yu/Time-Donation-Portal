<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Donor Dashboard</title>
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: #dce3eb;
      color: #333;
      transition: background 0.3s, color 0.3s;
    }

    .dark-mode {
      background: #1e1e1e;
      color: #e0e0e0;
    }

    .navbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 15px 25px;
      background: #e0e5ec;
      box-shadow: 6px 6px 12px #a3b1c6, -6px -6px 12px #ffffff;
    }

    .dark-mode .navbar {
      background: #2c2c2c;
      box-shadow: 6px 6px 12px #111, -6px -6px 12px #333;
    }

    .navbar-left {
      display: flex;
      align-items: center;
      gap: 15px;
    }

    .navbar-left h2 {
      margin: 0;
      font-size: 1.3rem;
    }

    .navbar-right {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .toggle-btn, .logout-btn {
      padding: 10px 20px;
      border: none;
      border-radius: 30px;
      font-weight: bold;
      cursor: pointer;
      transition: 0.3s;
    }

    .toggle-btn {
      background: linear-gradient(135deg, #6ee7b7, #3b82f6);
      color: white;
    }

    .toggle-btn:hover {
      transform: scale(1.05);
    }

    .logout-btn {
      background: linear-gradient(135deg, #f87171, #ef4444);
      color: white;
    }

    .logout-btn:hover {
      transform: scale(1.05);
    }

    .header {
      text-align: center;
      margin: 40px 0 20px 0;
      color: #0ecfafff;
    }

    .header h1 {
      margin: 0;
      font-size: 2rem;
    }

    .header h3 {
      margin: 5px 0 0 0;
      font-size: 1.3rem;
      color: #555;
    }

    .dashboard {
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
      background: #e0e5ec;
      border-radius: 20px;
      display: flex;
      justify-content: center;
      align-items: center;
      font-size: 1.2rem;
      font-weight: bold;
      box-shadow: 7px 7px 15px #a3b1c6, -7px -7px 15px #ffffff;
      transition: transform 0.3s;
      text-decoration: none;
      color: inherit;
    }

    .card:hover {
      transform: scale(1.05);
    }

    .dark-mode .card {
      background: #2c2c2c;
      box-shadow: 7px 7px 15px #111, -7px -7px 15px #333;
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
      <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="logout-btn">Logout</button>
      </form>
    </div>
  </div>

  <!-- Page Header -->
  <div class="header">
    <h1>Donor Dashboard</h1>
    <h3>Time Donation Portal</h3>
  </div>

  <!-- Dashboard Cards -->
  <div class="dashboard">
    <a href="{{ route('donor.my_donations') }}" class="card">My Donations</a>
    <a href="{{ route('donor.seeker_requests') }}" class="card">Seeker Requests</a>
    <a href="{{ route('donor.chat') }}" class="card">Chat</a>
  </div>

  <script>
    function toggleDarkMode() {
      document.body.classList.toggle('dark-mode');
    }
  </script>
</body>
</html>
