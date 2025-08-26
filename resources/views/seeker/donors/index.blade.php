<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Donors - Time Donation Portal</title>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(135deg, #3b0000, #ff4500, #0e5c76ff, #164e11ff, #9400d3);
            color: #fff8e1;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            overflow-x: hidden;
        }

        .container {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(15px);
            padding: 40px;
            border-radius: 18px;
            box-shadow: 0 8px 25px rgba(255, 77, 77, 0.4);
            width: 420px;
            text-align: center;
            border: 1px solid rgba(255, 204, 0, 0.3);
            position: relative;
        }

        .container::before {
            content: '';
            position: absolute;
            top: -25%;
            left: -25%;
            width: 150%;
            height: 150%;
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
            margin: 0 auto 25px;
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
            margin-bottom: 25px;
            color: #0e0e0eff;
            text-shadow: 0 0 8px #ff4500, 0 0 15px #9400d3;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        p {
            font-size: 16px;
            color: #ffecd2;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        ul li {
            margin: 12px 0;
        }

        ul li a {
            text-decoration: none;
            font-size: 18px;
            color: #1f1e1dff;
            background: linear-gradient(45deg, rgba(255, 204, 0, 0.5), rgba(255, 77, 77, 0.5), rgba(148, 0, 211, 0.5));
            padding: 12px 18px;
            border-radius: 8px;
            display: inline-block;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 204, 0, 0.3);
        }

        ul li a:hover {
            background: linear-gradient(45deg, rgba(255, 204, 0, 0.7), rgba(255, 77, 77, 0.7), rgba(148, 0, 211, 0.7));
            transform: translateY(-3px);
            box-shadow: 0 0 10px rgba(255, 77, 77, 0.5);
        }

        .btn {
            display: inline-block;
            margin-top: 25px;
            padding: 12px 20px;
            font-size: 16px;
            text-decoration: none;
            color: #1f1e1dff;
            background: linear-gradient(90deg, rgba(255, 204, 0, 0.5), rgba(255, 77, 77, 0.5), rgba(148, 0, 211, 0.5));
            border-radius: 8px;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 204, 0, 0.3);
        }

        .btn:hover {
            background: linear-gradient(90deg, rgba(255, 204, 0, 0.7), rgba(255, 77, 77, 0.7), rgba(148, 0, 211, 0.7));
            transform: scale(1.05);
            box-shadow: 0 0 12px rgba(255, 77, 77, 0.7);
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
        <h1>Available Donors</h1>

        @if($donors->isEmpty())
            <p>No donors available at the moment.</p>
        @else
            <ul>
                @foreach($donors as $donor)
                    <li>
                        <a href="{{ route('seeker.donors.show', $donor->id) }}">
                            {{ $donor->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        @endif

        <a href="{{ route('seeker.dashboard') }}" class="btn">Back to Dashboard</a>
    </div>
</body>
</html>