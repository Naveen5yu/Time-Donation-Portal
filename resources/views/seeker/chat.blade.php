<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat with Donors</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
            color: #fff;
            margin: 0;
            display: flex;
            height: 100vh;
        }

        .sidebar {
            width: 25%;
            background: rgba(0,0,0,0.7);
            padding: 20px;
            overflow-y: auto;
            border-right: 1px solid #444;
        }

        .sidebar h2 {
            margin-top: 0;
            font-size: 1.2rem;
            border-bottom: 1px solid #444;
            padding-bottom: 10px;
        }

        .donor {
            padding: 10px;
            margin: 5px 0;
            background: rgba(255,255,255,0.1);
            border-radius: 6px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .donor:hover {
            background: rgba(255,255,255,0.2);
        }

        .chat-container {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .chat-header {
            padding: 15px;
            background: rgba(0,0,0,0.8);
            font-weight: bold;
            font-size: 1.1rem;
            border-bottom: 1px solid #444;
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
        }

        .sent {
            background: #007bff;
            margin-left: auto;
            text-align: right;
        }

        .received {
            background: #444;
            margin-right: auto;
        }

        .chat-input {
            display: flex;
            border-top: 1px solid #444;
            padding: 10px;
        }

        .chat-input input {
            flex: 1;
            padding: 10px;
            border: none;
            border-radius: 20px;
            outline: none;
        }

        .chat-input button {
            background: #007bff;
            border: none;
            padding: 10px 20px;
            margin-left: 10px;
            border-radius: 20px;
            color: #fff;
            cursor: pointer;
            transition: background 0.3s;
        }

        .chat-input button:hover {
            background: #0056b3;
        }

        .back-link {
            display: block;
            text-align: center;
            padding: 15px;
            background: rgba(0,0,0,0.7);
            border-top: 1px solid #444;
            color: #fff;
            text-decoration: none;
        }

        .back-link:hover {
            background: rgba(255,255,255,0.1);
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
        <div class="chat-header">Chat with Donor 1</div>
        <div class="chat-messages">
            <div class="message received">Hello, how can I help you today?</div>
            <div class="message sent">I need assistance with a project.</div>
        </div>
        <form class="chat-input">
            <input type="text" placeholder="Type a message..." required>
            <button type="submit">Send</button>
        </form>
        <a href="{{ route('seeker.dashboard') }}" class="back-link">⬅ Back to Dashboard</a>
    </div>
</body>
</html>
