<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chat with Seekers</title>
  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&display=swap" rel="stylesheet">
  <style>
    body {
      margin: 0;
      font-family: 'Orbitron', sans-serif;
      background: linear-gradient(135deg, #1a0000, #330000, #1eb6abff, #10bda6ff);
      background-size: 400% 400%;
      animation: gradientBG 12s ease infinite;
      color: #ffffff;
      display: flex;
      flex-direction: column;
      align-items: center;
      min-height: 100vh;
    }

    @keyframes gradientBG {
      0% {background-position: 0% 50%;}
      50% {background-position: 100% 50%;}
      100% {background-position: 0% 50%;}
    }

    header {
      width: 100%;
      padding: 20px;
      background: rgba(255, 215, 0, 0.08);
      backdrop-filter: blur(12px);
      text-align: center;
      border-bottom: 1px solid rgba(255,215,0,0.3);
    }

    header h1 {
      margin: 0;
      font-size: 2rem;
      letter-spacing: 2px;
      color: #131310ff;
      text-shadow: 0 0 12px #ff0000, 0 0 24px #201f1dff;
    }

    .chat-container {
      width: 90%;
      max-width: 700px;
      margin-top: 50px;
      padding: 30px;
      background: rgba(255, 255, 255, 0.08);
      border-radius: 18px;
      box-shadow: 0 8px 25px rgba(0,0,0,0.7);
      backdrop-filter: blur(15px);
      text-align: center;
      border: 1px solid rgba(255,215,0,0.2);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .chat-container:hover {
      transform: translateY(-6px);
      box-shadow: 0 0 20px #ff4d00, 0 0 35px #1d1c19ff;
    }

    .chat-container p {
      font-size: 1.2rem;
      color: #efe2e2ff;
      margin-bottom: 25px;
      text-shadow: 0 0 6px #ff0000;
    }

    .btn {
      display: inline-block;
      padding: 14px 28px;
      font-size: 1rem;
      font-weight: bold;
      color: #000;
      background: linear-gradient(90deg, #2a2a27ff, #ff4d00);
      border: none;
      border-radius: 10px;
      cursor: pointer;
      text-decoration: none;
      transition: all 0.3s ease;
      box-shadow: 0 0 12px #5b5b58ff;
    }

    .btn:hover {
      background: linear-gradient(90deg, #ff4d00, #ffd700);
      transform: scale(1.08);
      box-shadow: 0 0 20px #ff4d00, 0 0 35px #a8a27eff;
    }

    footer {
      margin-top: auto;
      padding: 15px;
      font-size: 0.9rem;
      color: #ffdead;
      text-shadow: 0 0 6px #ff4d00;
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
