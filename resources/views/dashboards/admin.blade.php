<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard - Time Donation Portal</title>
  <style>
    :root {
      --bg: #e0e5ec;
      --text: #333;
      --shadow-dark: #a3b1c6;
      --shadow-light: #ffffff;
      --accent: #3b82f6;
    }

    body.dark {
      --bg: #1e1e2a;
      --text: #f3f3f3;
      --shadow-dark: #151520;
      --shadow-light: #2a2a3a;
      --accent: #60a5fa;
    }

    body {
      margin: 0;
      font-family: 'Inter', sans-serif;
      background: var(--bg);
      color: var(--text);
      display: flex;
      height: 100vh;
      transition: all 0.4s ease;
    }

    /* Sidebar */
    .sidebar {
      width: 240px;
      background: var(--bg);
      padding: 20px;
      box-shadow: 6px 0 12px var(--shadow-dark), -6px 0 12px var(--shadow-light);
      border-radius: 0 20px 20px 0;
      display: flex;
      flex-direction: column;
      align-items: center;
      transition: all 0.4s ease;
    }

    .logo {
      width: 80px;
      height: 80px;
      border-radius: 50%;
      background: var(--bg);
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: bold;
      font-size: 1.2rem;
      color: var(--accent);
      margin-bottom: 20px;
      box-shadow: inset 6px 6px 12px var(--shadow-dark),
                  inset -6px -6px 12px var(--shadow-light);
      transition: all 0.4s ease;
    }

    .sidebar h2 {
      font-size: 1.3rem;
      margin-bottom: 25px;
      color: var(--text);
    }

    .sidebar a {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      border-radius: 30px;
      text-align: center;
      background: var(--bg);
      text-decoration: none;
      color: var(--text);
      font-weight: 500;
      box-shadow: 6px 6px 12px var(--shadow-dark),
                  -6px -6px 12px var(--shadow-light);
      transition: all 0.3s ease;
    }

    .sidebar a:hover {
      box-shadow: inset 6px 6px 12px var(--shadow-dark),
                  inset -6px -6px 12px var(--shadow-light);
      color: var(--accent);
    }

    /* Content */
    .content {
      flex: 1;
      padding: 40px;
      display: flex;
      flex-direction: column;
      transition: all 0.4s ease;
    }

    .content h1 {
      font-size: 1.8rem;
      font-weight: bold;
      margin-bottom: 20px;
      color: var(--text);
    }

    .card {
      background: var(--bg);
      padding: 25px;
      border-radius: 20px;
      margin-bottom: 20px;
      box-shadow: 7px 7px 15px var(--shadow-dark),
                  -7px -7px 15px var(--shadow-light);
      width: 350px;
      transition: all 0.4s ease;
    }

    .card h2 {
      font-size: 1.2rem;
      margin-bottom: 15px;
      color: var(--accent);
    }

    .card p {
      margin: 8px 0;
      color: var(--text);
      font-size: 1rem;
    }

    /* Buttons */
    .logout-btn,
    .toggle-btn {
      padding: 12px 25px;
      font-size: 1rem;
      font-weight: bold;
      border: none;
      border-radius: 30px;
      cursor: pointer;
      background: linear-gradient(135deg, #60a5fa, #3b82f6);
      color: #fff;
      box-shadow: 6px 6px 12px var(--shadow-dark),
                  -6px -6px 12px var(--shadow-light);
      transition: transform 0.3s ease, all 0.4s ease;
      margin-top: 15px;
      width: 180px;
    }

    .logout-btn:hover,
    .toggle-btn:hover {
      transform: scale(1.05);
    }
  </style>
</head>
<body>
  <!-- Sidebar -->
  <div class="sidebar">
    <div class="logo">TDP</div>
    <h2>Admin Control</h2>
    <a href="{{ route('admin.users.index') }}">User Management</a>
    <a href="{{ route('admin.reports.index') }}">Reports</a>
  </div>

  <!-- Content -->
  <div class="content">
    <h1>Welcome, {{ Auth::user()->name }}</h1>
    <div class="card">
      <h2>Quick Stats</h2>
      <p>Users Registered: {{ $userCount }}</p>
      <p>Reports Generated: {{ $reportCount }}</p>
    </div>

    <!-- Toggle Button -->
    <button class="toggle-btn" onclick="toggleMode()">🌙 Toggle Dark Mode</button>

    <!-- Logout -->
    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <button type="submit" class="logout-btn">Logout</button>
    </form>
  </div>

  <script>
    function toggleMode() {
      document.body.classList.toggle('dark');
    }
  </script>
</body>
</html>
