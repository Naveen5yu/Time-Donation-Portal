<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Time Donation Portal</title>
    <!-- Google Fonts for sleek look -->
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(135deg, #1f1c2c, #928dab);
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }
        .hero {
            text-align: center;
            color: #fff;
            animation: fadeIn 2s ease-in;
        }
        h1 {
            font-family: 'Orbitron', sans-serif;
            font-size: 4rem;
            margin-bottom: 1rem;
            text-shadow: 0 0 20px #ffcc00, 0 0 40px #ff6600;
            animation: glow 2s infinite alternate;
        }
        p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            text-shadow: 0 0 10px rgba(0,0,0,0.5);
        }
        .btn {
            display: inline-block;
            margin: 0 1rem;
            padding: 1rem 2rem;
            color: #fff;
            font-weight: bold;
            font-size: 1.2rem;
            text-decoration: none;
            border: 2px solid #fff;
            border-radius: 10px;
            transition: 0.3s;
            box-shadow: 0 0 20px rgba(255,255,255,0.2);
        }
        .btn:hover {
            background: #ffcc00;
            color: #1f1c2c;
            box-shadow: 0 0 40px #ffcc00;
            transform: scale(1.1);
        }
        @keyframes glow {
            from { text-shadow: 0 0 10px #ffcc00, 0 0 20px #ff6600; }
            to { text-shadow: 0 0 20px #ffcc00, 0 0 40px #ff6600; }
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>
    <div class="hero">
        <h1>Time Donation Portal</h1>
        <p>Donate your time, change someone's life. One click at a time.</p>
        <a href="{{ route('login') }}" class="btn">Login</a>
        <a href="{{ route('register') }}" class="btn">Register</a>
    </div>
</body>
</html>
