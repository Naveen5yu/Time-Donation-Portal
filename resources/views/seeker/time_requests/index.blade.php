<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>My Time Requests - Time Donation Portal</title>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(135deg, #3b0000, #086888ff, #032f54ff, #143910ff, #9400d3);
            color: #fff8e1;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        header {
            background: rgba(255, 255, 255, 0.05);
            padding: 20px;
            text-align: center;
            border-bottom: 2px solid rgba(255, 204, 0, 0.3);
            backdrop-filter: blur(10px);
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
            margin: 0 auto 10px;
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

        header h1 {
            margin: 0;
            font-size: 28px;
            color: #0e0e0eff;
            text-shadow: 0 0 8px #ff4500, 0 0 15px #9400d3;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .container {
            max-width: 900px;
            margin: 30px auto;
            padding: 20px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(255, 77, 77, 0.4);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 204, 0, 0.3);
            position: relative;
        }

        .container::before {
            content: '';
            position: absolute;
            top: -30%;
            left: -30%;
            width: 160%;
            height: 160%;
            background: radial-gradient(circle, rgba(255, 69, 0, 0.1) 0%, transparent 70%);
            z-index: -1;
        }

        .btn {
            display: inline-block;
            padding: 12px 20px;
            margin-bottom: 20px;
            background: linear-gradient(90deg, rgba(255, 204, 0, 0.5), rgba(255, 77, 77, 0.5), rgba(148, 0, 211, 0.5));
            color: #1f1e1dff;
            text-decoration: none;
            font-weight: bold;
            border-radius: 8px;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 204, 0, 0.3);
        }

        .btn:hover {
            background: linear-gradient(90deg, rgba(255, 204, 0, 0.7), rgba(255, 77, 77, 0.7), rgba(148, 0, 211, 0.7));
            box-shadow: 0 0 12px rgba(255, 77, 77, 0.7);
            transform: scale(1.05) rotate(-2deg);
        }

        .card {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.1), rgba(148, 0, 211, 0.05));
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 15px;
            box-shadow: 0 0 10px rgba(255, 77, 77, 0.3);
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 204, 0, 0.3);
            position: relative;
        }

        .card::before {
            content: '';
            position: absolute;
            top: -20%;
            left: -20%;
            width: 140%;
            height: 140%;
            background: radial-gradient(circle, rgba(23, 212, 58, 0.1) 0%, transparent 70%);
            z-index: -1;
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px) rotate(1deg);
            box-shadow: 0 0 15px rgba(255, 77, 77, 0.5);
        }

        .card:hover::before {
            transform: translate(10%, 10%);
        }

        .card h3 {
            margin: 0 0 8px;
            font-size: 20px;
            color: #fff8e1;
            text-shadow: 0 0 5px #ff4500;
        }

        .status {
            display: inline-block;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: bold;
            background: linear-gradient(90deg, rgba(255, 204, 0, 0.3), rgba(148, 0, 211, 0.3));
            backdrop-filter: blur(5px);
        }

        .status.pending {
            background: linear-gradient(90deg, #ffb74d, #9400d3);
            color: #222;
        }

        .status.approved {
            background: linear-gradient(90deg, #4caf50, #15ff00ff);
            color: #fff;
        }

        .status.rejected {
            background: linear-gradient(90deg, #f44336, #ff4500);
            color: #fff;
        }

        footer {
            margin-top: 30px;
            text-align: center;
        }

        footer a {
            color: #1f1e1dff;
            text-decoration: none;
            font-weight: bold;
            transition: all 0.3s ease;
            padding: 10px 15px;
            background: linear-gradient(90deg, rgba(255, 204, 0, 0.4), rgba(255, 77, 77, 0.4));
            border-radius: 6px;
            backdrop-filter: blur(10px);
        }

        footer a:hover {
            color: #fff8e1;
            background: linear-gradient(90deg, rgba(255, 204, 0, 0.6), rgba(255, 77, 77, 0.6));
            box-shadow: 0 0 10px rgba(255, 77, 77, 0.5);
            transform: translateY(-2px);
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
    <header>
        <div class="logo"></div>
        <h1>My Time Requests</h1>
    </header>

    <div class="container">
        <a href="{{ route('seeker.time_requests.create') }}" class="btn">Create New Request</a>

        @if($requests->isEmpty())
            <p>No time requests yet.</p>
        @else
            @foreach($requests as $req)
                <div class="card">
                    <h3>{{ $req->title }}</h3>
                    <p>Status: 
                        <span class="status {{ strtolower($req->status) }}">
                            {{ ucfirst($req->status) }}
                        </span>
                    </p>
                </div>
            @endforeach
        @endif

        <footer>
            <a href="{{ route('seeker.dashboard') }}">Back to Dashboard</a>
        </footer>
    </div>
</body>
</html>