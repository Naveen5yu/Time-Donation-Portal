<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>My Donations - Time Donation Portal</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #e6f0fa; /* Changed to light blue for neuromorphic base */
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: 100vh;
        }

        .container {
            max-width: 900px;
            margin: 50px auto;
            background: #e0e8f0;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 5px 5px 15px #d3dee9, -5px -5px 15px #ffffff; /* Neumorphic shadow */
            width: 90%;
        }

        .logo {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 10px;
            background: linear-gradient(135deg, #e0e8f0, #ffffff); /* Subtle gradient */
            box-shadow: inset 2px 2px 6px #d3dee9, inset -2px -2px 6px #ffffff; /* Inner neumorphic effect */
        }

        .logo::before {
            content: 'TDP';
            font-family: 'Roboto', sans-serif; /* Changed to Roboto for consistency */
            font-size: 1.2rem;
            font-weight: 700;
            color: #2c3e50;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            font-size: 2.5rem;
            margin-bottom: 25px;
            color: #2c3e50;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1); /* Subtle shadow */
        }

        .donation-card {
            background: #f0f4f8;
            border: 1px solid #d3dee9;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 15px;
            box-shadow: 5px 5px 15px #d3dee9, -5px -5px 15px #ffffff; /* Neumorphic shadow */
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .donation-card:hover {
            transform: translateY(-5px);
            box-shadow: 3px 3px 10px #d3dee9, -3px -3px 10px #ffffff;
        }

        .donation-title {
            font-size: 1.3rem;
            font-weight: bold;
            margin-bottom: 5px;
            color: #34495e;
        }

        .donation-status {
            font-size: 1rem;
            color: #34495e;
        }

        .empty-message {
            text-align: center;
            font-size: 1.2rem;
            color: #34495e;
            font-style: italic;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
        }

        .back-btn {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 20px;
            background: linear-gradient(to right, #00c6ff, #0072ff);
            color: #fff;
            font-family: 'Roboto', sans-serif; /* Changed to Roboto for consistency */
            font-size: 1rem;
            font-weight: 700;
            border-radius: 8px;
            text-decoration: none;
            box-shadow: 2px 2px 6px #d3dee9, -2px -2px 6px #ffffff; /* Neumorphic shadow */
            transition: all 0.3s ease;
        }

        .back-btn:hover {
            background: linear-gradient(to right, #00b5e6, #0066cc);
            transform: scale(1.05);
            box-shadow: 1px 1px 4px #d3dee9, -1px -1px 4px #ffffff;
        }

        /* Removed custom scrollbar for simplicity */
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