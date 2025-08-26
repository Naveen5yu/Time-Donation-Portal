<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Donor Details - Time Donation Portal</title>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(135deg, #3b0000, #7a7573ff, #0d5393ff, #0c5b05ff, #9400d3);
            color: #fff8e1;
            margin: 0;
            padding: 0;
            text-align: center;
            overflow-x: hidden;
        }

        .container {
            margin: 80px auto;
            padding: 30px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 12px;
            max-width: 500px;
            box-shadow: 0 0 20px rgba(255, 77, 77, 0.3);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 204, 0, 0.3);
            position: relative;
        }

        .container::before {
            content: '';
            position: absolute;
            top: -20%;
            left: -20%;
            width: 140%;
            height: 140%;
            background: radial-gradient(circle, rgba(255, 69, 0, 0.1) 0%, transparent 70%);
            z-index: -1;
        }

        .logo {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, rgba(255, 204, 0, 0.6), rgba(255, 77, 77, 0.6), rgba(148, 0, 211, 0.6));
            backdrop-filter: blur(10px);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            box-shadow: 0 0 15px rgba(255, 204, 0, 0.5);
        }

        .logo::before {
            content: 'TDP';
            font-family: 'Orbitron', sans-serif;
            font-size: 1.2rem;
            font-weight: 700;
            color: #fff8e1;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            text-shadow: 0 0 10px rgba(255, 204, 0, 0.7);
        }

        h1 {
            font-size: 28px;
            margin-bottom: 20px;
            color: #0e0e0eff;
            text-shadow: 0 0 8px #ff4500, 0 0 15px #9400d3;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        p {
            font-size: 18px;
            margin: 12px 0;
            color: #ffecd2;
        }

        strong {
            color: #fff8e1;
            text-shadow: 0 0 5px #17d43aff;
        }

        a {
            display: inline-block;
            margin-top: 25px;
            padding: 12px 24px;
            background: linear-gradient(90deg, rgba(255, 204, 0, 0.5), rgba(255, 77, 77, 0.5), rgba(148, 0, 211, 0.5));
            color: #1f1e1dff;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 204, 0, 0.3);
        }

        a:hover {
            background: linear-gradient(90deg, rgba(255, 204, 0, 0.7), rgba(255, 77, 77, 0.7), rgba(148, 0, 211, 0.7));
            transform: scale(1.05);
            box-shadow: 0 0 10px rgba(255, 77, 77, 0.5);
        }

        /* Custom scrollbar */
        body::-webkit-scrollbar {
            width: 8px;
        }

        body::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 4px;
        }

        body::-webkit-scrollbar-thumb {
            background: linear-gradient(180deg, rgba(255, 204, 0, 0.5), rgba(255, 77, 77, 0.5), rgba(148, 0, 211, 0.5));
            border-radius: 4px;
        }

        body::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(180deg, rgba(255, 204, 0, 0.7), rgba(255, 77, 77, 0.7), rgba(148, 0, 211, 0.7));
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo"></div>
        <h1>Donor Profile</h1>
        <p><strong>Name:</strong> {{ $donor->name }}</p>
        <p><strong>Email:</strong> {{ $donor->email }}</p>
        <p><strong>Role:</strong> {{ ucfirst($donor->role) }}</p>

        <a href="{{ route('seeker.donors.index') }}">Back to Donors</a>
    </div>
</body>
</html>