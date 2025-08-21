<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
            color: #fff;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(12px);
            position: fixed;
            left: 0;
            top: 0;
            padding-top: 40px;
            box-shadow: 2px 0 15px rgba(0, 0, 0, 0.5);
        }

        .sidebar h2 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 1.4rem;
            letter-spacing: 2px;
            color: #00e6e6;
        }

        .sidebar a {
            display: block;
            padding: 12px 20px;
            margin: 10px;
            text-decoration: none;
            color: #fff;
            border-radius: 8px;
            transition: all 0.3s ease-in-out;
        }

        .sidebar a:hover {
            background: #00e6e6;
            color: #000;
            transform: translateX(8px);
        }

        .content {
            margin-left: 250px;
            padding: 30px;
        }

        .content h1 {
            font-size: 2.2rem;
            margin-bottom: 20px;
            color: #00e6e6;
        }

        .card {
            background: rgba(255, 255, 255, 0.08);
            padding: 20px;
            border-radius: 12px;
            margin-bottom: 20px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.3);
        }

        .logout-btn {
            display: inline-block;
            padding: 12px 20px;
            background: #ff4d4d;
            border: none;
            border-radius: 8px;
            color: #fff;
            font-size: 1rem;
            cursor: pointer;
            transition: 0.3s;
        }

        .logout-btn:hover {
            background: #cc0000;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>⚡ Admin Panel</h2>
        <a href="#">👥 User Management</a>
        <a href="#">⏳ Time Slot Management</a>
        <a href="#">📊 Reports</a>
    </div>

    <div class="content">
        <h1>Welcome, {{ Auth::user()->name }}</h1>

        <div class="card">
            <h2>📌 Quick Stats</h2>
            <p>Users Registered: 120</p>
            <p>Active Time Slots: 35</p>
            <p>Reports Generated: 12</p>
        </div>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="logout-btn">🚪 Logout</button>
        </form>
    </div>
</body>
</html>
