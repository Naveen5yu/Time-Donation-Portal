<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>My Donations - Time Donation Portal</title>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(135deg, #3b0000, #6b0f0f, #17d43aff, #15ff00ff);
            color: #fff8e1;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 900px;
            margin: 50px auto;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0px 8px 25px rgba(255, 77, 77, 0.4);
        }

        .logo {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, rgba(255, 204, 0, 0.5), rgba(255, 77, 77, 0.5));
            backdrop-filter: blur(10px);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 10px;
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
            text-align: center;
            font-size: 2.5rem;
            color: #0e0e0eff;
            margin-bottom: 25px;
            text-shadow: 0 0 10px #ffcc00, 0 0 20px #ff4d4d;
        }

        .donation-card {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 204, 0, 0.3);
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 15px;
            transition: all 0.3s ease-in-out;
            backdrop-filter: blur(10px);
        }

        .donation-card:hover {
            transform: translateY(-5px);
            background: rgba(255, 255, 255, 0.2);
            box-shadow: 0px 4px 20px rgba(255, 77, 77, 0.4);
        }

        .donation-title {
            font-size: 1.3rem;
            font-weight: bold;
            margin-bottom: 5px;
            color: #fff8e1;
        }

        .donation-status {
            font-size: 1rem;
            color: #ffecd2;
        }

        .empty-message {
            text-align: center;
            font-size: 1.2rem;
            color: #ffecd2;
            font-style: italic;
        }

        .back-btn {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 20px;
            background: linear-gradient(90deg, rgba(255, 204, 0, 0.4), rgba(255, 77, 77, 0.4));
            color: #1f1e1dff;
            font-family: 'Orbitron', sans-serif;
            font-size: 1rem;
            font-weight: 700;
            border-radius: 8px;
            text-decoration: none;
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 204, 0, 0.3);
            backdrop-filter: blur(10px);
        }

        .back-btn:hover {
            background: linear-gradient(90deg, rgba(255, 204, 0, 0.6), rgba(255, 77, 77, 0.6));
            transform: scale(1.05);
            box-shadow: 0 0 15px rgba(255, 77, 77, 0.7);
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
            background: linear-gradient(180deg, rgba(255, 204, 0, 0.5), rgba(255, 77, 77, 0.5));
            border-radius: 4px;
        }

        body::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(180deg, rgba(255, 204, 0, 0.7), rgba(255, 77, 77, 0.7));
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo"></div>
        <h1>My Donations</h1>

        @if($donations->isEmpty())
            <p class="empty-message">No donations assigned yet.</p>
        @else
            @foreach($donations as $donation)
                <div class="donation-card">
                    <div class="donation-title">{{ $donation->title }}</div>
                    <div class="donation-status">Status: {{ ucfirst($donation->status) }}</div>
                </div>
            @endforeach
        @endif

        <a href="{{ route('donor.dashboard') }}" class="back-btn">Back to Dashboard</a>
    </div>
</body>
</html>