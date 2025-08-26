<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Chat with Donors - Time Donation Portal</title>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(135deg, #3b0000, #817b78ff, #0a5c88ff, #104f0aff, #9400d3);
            color: #fff8e1;
            margin: 0;
            display: flex;
            height: 100vh;
            overflow-x: hidden;
        }

        .sidebar {
            width: 25%;
            background: rgba(255, 255, 255, 0.05);
            padding: 20px;
            overflow-y: auto;
            border-right: 1px solid rgba(255, 204, 0, 0.3);
            backdrop-filter: blur(10px);
            position: relative;
        }

        .sidebar::before {
            content: '';
            position: absolute;
            top: -10%;
            left: -10%;
            width: 120%;
            height: 120%;
            background: radial-gradient(circle, rgba(255, 69, 0, 0.1) 0%, transparent 70%);
            z-index: -1;
        }

        .sidebar h2 {
            margin-top: 0;
            font-size: 1.2rem;
            border-bottom: 1px solid rgba(255, 204, 0, 0.3);
            padding-bottom: 10px;
            color: #0e0e0eff;
            text-shadow: 0 0 5px #ff4500;
            font-family: 'Orbitron', sans-serif;
        }

        .donor {
            padding: 10px;
            margin: 5px 0;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.3s ease;
            backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 204, 0, 0.3);
        }

        .donor:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateX(5px);
        }

        .chat-container {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .chat-header {
            padding: 15px;
            background: rgba(255, 255, 255, 0.05);
            font-weight: bold;
            font-size: 1.1rem;
            border-bottom: 1px solid rgba(255, 204, 0, 0.3);
            backdrop-filter: blur(10px);
            position: relative;
        }

        .chat-header .logo {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, rgba(255, 204, 0, 0.6), rgba(255, 77, 77, 0.6), rgba(148, 0, 211, 0.6));
            backdrop-filter: blur(10px);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 10px;
            box-shadow: 0 0 10px rgba(255, 204, 0, 0.5);
        }

        .chat-header .logo::before {
            content: 'TDP';
            font-family: 'Orbitron', sans-serif;
            font-size: 1rem;
            font-weight: 700;
            color: #fff8e1;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            text-shadow: 0 0 8px rgba(255, 204, 0, 0.7);
        }

        .chat-messages {
            flex: 1;
            padding: 20px;
            overflow-y: auto;
        }

        .message {
            margin: 10px 0;
            padding: 10px 15px;
            border-radius: 15px;
            max-width: 60%;
            backdrop-filter: blur(5px);
        }

        .sent {
            background: linear-gradient(90deg, rgba(255, 204, 0, 0.5), rgba(255, 77, 77, 0.5));
            margin-left: auto;
            text-align: right;
            border: 1px solid rgba(255, 204, 0, 0.3);
        }

        .received {
            background: linear-gradient(90deg, rgba(23, 212, 58, 0.3), rgba(148, 0, 211, 0.3));
            margin-right: auto;
            border: 1px solid rgba(23, 212, 58, 0.5);
        }

        .chat-input {
            display: flex;
            border-top: 1px solid rgba(255, 204, 0, 0.3);
            padding: 10px;
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
        }

        .chat-input input {
            flex: 1;
            padding: 10px;
            border: none;
            border-radius: 20px;
            outline: none;
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
            backdrop-filter: blur(5px);
        }

        .chat-input input:focus {
            border: 1px solid rgba(255, 204, 0, 0.6);
            box-shadow: 0 0 8px rgba(255, 77, 77, 0.6);
        }

        .chat-input button {
            background: linear-gradient(90deg, rgba(255, 204, 0, 0.5), rgba(255, 77, 77, 0.5), rgba(148, 0, 211, 0.5));
            border: none;
            padding: 10px 20px;
            margin-left: 10px;
            border-radius: 20px;
            color: #1f1e1dff;
            cursor: pointer;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 204, 0, 0.3);
        }

        .chat-input button:hover {
            background: linear-gradient(90deg, rgba(255, 204, 0, 0.7), rgba(255, 77, 77, 0.7), rgba(148, 0, 211, 0.7));
            transform: scale(1.05);
            box-shadow: 0 0 10px rgba(255, 77, 77, 0.5);
        }

        .back-link {
            display: block;
            text-align: center;
            padding: 15px;
            background: rgba(255, 255, 255, 0.05);
            border-top: 1px solid rgba(255, 204, 0, 0.3);
            color: #1f1e1dff;
            text-decoration: none;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }

        .back-link:hover {
            background: rgba(255, 255, 255, 0.2);
            color: #fff8e1;
            transform: translateY(-2px);
            box-shadow: 0 0 8px rgba(255, 77, 77, 0.4);
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
    <!-- Sidebar with Donors -->
    <div class="sidebar">
        <h2>Donors</h2>
        <div class="donor">Donor 1</div>
        <div class="donor">Donor 2</div>
        <div class="donor">Donor 3</div>
        <!-- You can loop through donors dynamically here -->
    </div>

    <!-- Chat Window -->
    <div class="chat-container">
        <div class="chat-header">
            <div class="logo"></div>
            Chat with Donor 1
        </div>
        <div class="chat-messages">
            <div class="message received">Hello, how can I help you today?</div>
            <div class="message sent">I need assistance with a project.</div>
        </div>
        <form class="chat-input">
            <input type="text" placeholder="Type a message..." required>
            <button type="submit">Send</button>
        </form>
        <a href="{{ route('seeker.dashboard') }}" class="back-link">Back to Dashboard</a>
    </div>
</body>
</html>