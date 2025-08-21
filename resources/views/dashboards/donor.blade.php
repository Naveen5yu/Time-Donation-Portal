<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donor Dashboard</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #00bcd4, #4caf50);
            color: #fff;
            text-align: center;
        }

        header {
            padding: 20px;
            background: rgba(0, 0, 0, 0.3);
        }

        header h1 {
            margin: 0;
            font-size: 2.2em;
        }

        .dashboard {
            margin: 50px auto;
            max-width: 900px;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 25px;
        }

        .card {
            background: rgba(255, 255, 255, 0.15);
            border-radius: 12px;
            padding: 25px;
            width: 260px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.25);
            transition: transform 0.3s, background 0.3s;
        }

        .card:hover {
            transform: scale(1.08);
            background: rgba(255, 255, 255, 0.25);
        }

        .card a {
            color: #fff;
            font-size: 1.2em;
            font-weight: bold;
            text-decoration: none;
            display: block;
            margin-top: 10px;
        }

        form {
            margin-top: 40px;
        }

        button {
            padding: 12px 25px;
            background: #ff3d00;
            border: none;
            border-radius: 8px;
            color: white;
            font-size: 1em;
            cursor: pointer;
            transition: background 0.3s;
        }

        button:hover {
            background: #d32f2f;
        }
    </style>
</head>
<body>

    <header>
        <h1>🚀 Donor Dashboard</h1>
        <p>Welcome, Super Donor! Manage your contributions and connect with seekers 💙</p>
    </header>

    <section class="dashboard">
        <div class="card">
            <h2>📦 My Donations</h2>
            <a href="{{ route('donor.my_donations') }}">View Donations</a>
        </div>

        <div class="card">
            <h2>🤝 Seeker Requests</h2>
            <a href="{{ route('donor.seeker_requests') }}">View Requests</a>
        </div>

        <div class="card">
            <h2>💬 Chat with Seekers</h2>
            <a href="{{ route('donor.chat') }}">Start Chat</a>
        </div>
    </section>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">🚪 Logout</button>
    </form>

</body>
</html>
