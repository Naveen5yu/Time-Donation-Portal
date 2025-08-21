<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seeker Dashboard</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(120deg, #00c6ff, #0072ff);
            color: #fff;
        }

        .dashboard-container {
            max-width: 1000px;
            margin: 60px auto;
            padding: 30px;
            background: rgba(0, 0, 0, 0.6);
            border-radius: 12px;
            text-align: center;
            box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.4);
        }

        h1 {
            font-size: 2.5rem;
            margin-bottom: 25px;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: #ffeb3b;
        }

        .modules {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .module-card {
            background: rgba(255, 255, 255, 0.1);
            padding: 20px;
            border-radius: 10px;
            transition: all 0.3s ease;
            text-decoration: none;
            color: #fff;
            font-weight: bold;
            display: block;
        }

        .module-card:hover {
            background: #ffeb3b;
            color: #333;
            transform: scale(1.05);
        }

        .logout-btn {
            background: #ff4d4d;
            border: none;
            padding: 12px 25px;
            border-radius: 6px;
            color: white;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        .logout-btn:hover {
            background: #e60000;
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <h1>Seeker Dashboard</h1>

        <div class="modules">
            <a href="{{ route('seeker.time_requests.index') }}" class="module-card">📅 My Time Requests</a>
            <a href="{{ route('seeker.donors.index') }}" class="module-card">🤝 Donors Module</a>
            <a href="{{ route('seeker.chat') }}" class="module-card">💬 Chat with Donors</a>
        </div>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="logout-btn">🚪 Logout</button>
        </form>
    </div>
</body>
</html>
