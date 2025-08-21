<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Donations</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
            color: #ffffff;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 900px;
            margin: 50px auto;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0px 8px 25px rgba(0, 0, 0, 0.4);
        }

        h1 {
            text-align: center;
            font-size: 2.5rem;
            color: #00d4ff;
            margin-bottom: 25px;
        }

        .donation-card {
            background: rgba(0, 212, 255, 0.1);
            border: 1px solid rgba(0, 212, 255, 0.3);
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 15px;
            transition: all 0.3s ease-in-out;
        }

        .donation-card:hover {
            transform: translateY(-5px);
            background: rgba(0, 212, 255, 0.2);
            box-shadow: 0px 4px 20px rgba(0, 212, 255, 0.4);
        }

        .donation-title {
            font-size: 1.3rem;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .donation-status {
            font-size: 1rem;
            color: #00ffa6;
        }

        .empty-message {
            text-align: center;
            font-size: 1.2rem;
            color: #ff7eb3;
        }

        .back-btn {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 20px;
            border: none;
            border-radius: 8px;
            background: #00d4ff;
            color: #000;
            font-size: 1rem;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .back-btn:hover {
            background: #00ffa6;
            transform: scale(1.05);
        }

        /* Futuristic glow animation */
        @keyframes glow {
            0% { text-shadow: 0 0 5px #00d4ff; }
            50% { text-shadow: 0 0 20px #00ffa6; }
            100% { text-shadow: 0 0 5px #00d4ff; }
        }

        h1 {
            animation: glow 2s infinite alternate;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>✨ My Donations ✨</h1>

        @if($donations->isEmpty())
            <p class="empty-message">🚫 No donations assigned yet.</p>
        @else
            @foreach($donations as $donation)
                <div class="donation-card">
                    <div class="donation-title">{{ $donation->title }}</div>
                    <div class="donation-status">Status: {{ ucfirst($donation->status) }}</div>
                </div>
            @endforeach
        @endif

        <a href="{{ route('donor.dashboard') }}" class="back-btn">⬅ Back to Dashboard</a>
    </div>
</body>
</html>
