<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat with Seekers</title>
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
            color: #ffffff;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            min-height: 100vh;
        }

        header {
            width: 100%;
            padding: 20px;
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(12px);
            text-align: center;
            border-bottom: 1px solid rgba(255,255,255,0.2);
        }

        header h1 {
            margin: 0;
            font-size: 2rem;
            letter-spacing: 1.5px;
            color: #00f7ff;
            text-shadow: 0 0 12px #00f7ff;
        }

        .chat-container {
            width: 90%;
            max-width: 700px;
            margin-top: 40px;
            padding: 25px;
            background: rgba(255, 255, 255, 0.08);
            border-radius: 16px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.6);
            text-align: center;
            backdrop-filter: blur(14px);
        }

        .chat-container p {
            font-size: 1.1rem;
            color: #ddd;
            margin-bottom: 20px;
        }

        .btn {
            display: inline-block;
            padding: 12px 25px;
            font-size: 1rem;
            font-weight: bold;
            color: #ffffff;
            background: linear-gradient(90deg, #00f7ff, #0072ff);
            border: none;
            border-radius: 8px;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .btn:hover {
            background: linear-gradient(90deg, #0072ff, #00f7ff);
            transform: scale(1.05);
            box-shadow: 0 0 15px #00f7ff;
        }

        footer {
            margin-top: auto;
            padding: 15px;
            font-size: 0.9rem;
            color: #aaa;
        }
    </style>
</head>
<body>
    <header>
        <h1>Chat with Seekers</h1>
    </header>

    <div class="chat-container">
        <p>💬 Chat module coming soon... stay tuned for a real-time futuristic messaging experience.</p>
        <a href="{{ route('donor.dashboard') }}" class="btn">⬅ Back to Dashboard</a>
    </div>

    <footer>
        &copy; {{ date('Y') }} Time Donation Portal. All rights reserved.
    </footer>
</body>
</html>
