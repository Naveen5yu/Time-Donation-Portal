<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Create User - Time Donation Portal</title>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body, html {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(145deg, #3b0000, #6b0f0f, white, green);
            background-size: 400% 400%;
            color: #fff8e1;
            overflow-y: auto;
            overflow-x: hidden;
            animation: bg-flow 12s ease infinite;
            perspective: 1000px;
        }

        @keyframes bg-flow {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, rgba(255, 77, 77, 0.1), rgba(255, 204, 0, 0.1));
            backdrop-filter: blur(6px);
            z-index: -1;
            animation: glass-shift 8s ease infinite;
        }

        @keyframes glass-shift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            max-width: 500px;
            margin: 20px auto;
        }

        .form-section {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(15px);
            border: 2px solid rgba(255, 204, 0, 0.3);
            border-radius: 12px;
            padding: 20px;
            width: 100%;
            box-shadow: 0 4px 15px rgba(255, 77, 77, 0.3);
            transform-style: preserve-3d;
            transition: transform 0.7s ease, box-shadow 0.7s ease;
        }

        .form-section:hover {
            transform: translateZ(20px);
            box-shadow: 0 8px 25px rgba(255, 77, 77, 0.5);
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
            animation: logo-rotate 8s infinite linear;
            transform-style: preserve-3d;
            transition: transform 0.7s ease;
        }

        .logo:hover {
            transform: scale(1.3);
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
            animation: logo-rotate-text 8s infinite linear;
        }

        @keyframes logo-rotate {
            0% { transform: rotateY(0deg); }
            100% { transform: rotateY(360deg); }
        }

        @keyframes logo-rotate-text {
            0% { transform: rotateY(0deg); }
            100% { transform: rotateY(-360deg); }
        }

        h2 {
            font-family: 'Orbitron', sans-serif;
            font-size: 1.8rem;
            color: #131313ff;
            text-transform: uppercase;
            text-shadow: 0 0 15px rgba(255, 204, 0, 0.6);
            animation: text-glow 4s infinite ease-in-out;
            text-align: center;
            margin: 0 0 15px;
        }

        @keyframes text-glow {
            0% { text-shadow: 0 0 10px #ffcc00, 0 0 20px rgba(255, 204, 0, 0.6); }
            50% { text-shadow: 0 0 25px #ff4d4d, 0 0 40px rgba(255, 77, 77, 0.7); }
            100% { text-shadow: 0 0 10px #ffcc00, 0 0 20px rgba(255, 204, 0, 0.6); }
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        label {
            font-family: 'Roboto', sans-serif;
            font-size: 0.9rem;
            color: #111010ff;
            margin-top: 10px;
            font-weight: bold;
            transition: transform 0.5s ease;
            transform-style: preserve-3d;
        }

        .form-section:hover label {
            transform: translateZ(10px);
        }

        input, select {
            width: 100%;
            padding: 10px;
            font-size: 0.9rem;
            font-family: 'Roboto', sans-serif;
            color: Blackred;
            background: rgba(222, 17, 17, 0.33);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 204, 0, 0.3);
            border-radius: 8px;
            outline: none;
            transition: all 0.5s ease;
            transform-style: preserve-3d;
        }

        input:focus, select:focus {
            border-color: #ff4d4d;
            box-shadow: 0 0 12px rgba(255, 77, 77, 0.5);
            transform: translateZ(10px) scale(1.05);
            background: rgba(255, 255, 255, 0.15);
        }

        input::placeholder {
            color: #ffecd2;
            opacity: 0.7;
            transition: opacity 0.3s ease;
        }

        input:focus::placeholder {
            opacity: 0.3;
        }

        button {
            padding: 10px;
            font-family: 'Orbitron', sans-serif;
            font-size: 1rem;
            font-weight: 700;
            color: #121313ff;
            background: linear-gradient(90deg, rgba(255, 204, 0, 0.4), rgba(255, 77, 77, 0.4));
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 204, 0, 0.3);
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.5s ease;
            transform-style: preserve-3d;
            position: relative;
            overflow: hidden;
            margin-top: 15px;
        }

        button:hover {
            background: linear-gradient(90deg, rgba(255, 204, 0, 0.6), rgba(255, 77, 77, 0.6));
            transform: scale(1.1) translateZ(10px);
            box-shadow: 0 0 15px rgba(255, 77, 77, 0.7);
        }

        button::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            transition: width 0.7s ease, height 0.7s ease;
            z-index: -1;
        }

        button:hover::after {
            width: 150px;
            height: 150px;
        }

        a {
            display: block;
            margin-top: 10px;
            font-family: 'Orbitron', sans-serif;
            font-size: 0.9rem;
            color: #10100fff;
            text-decoration: none;
            text-align: center;
            transition: color 0.5s ease, transform 0.5s ease;
            transform-style: preserve-3d;
        }

        a:hover {
            color: #ff4d4d;
            text-shadow: 0 0 12px rgba(255, 77, 77, 0.6);
            transform: translateZ(10px);
        }

        .glass-shards {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: -1;
        }

        .shard {
            position: absolute;
            width: 10px;
            height: 10px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 204, 0, 0.2);
            border-radius: 5px;
            animation: float-shard 10s infinite linear;
        }

        @keyframes float-shard {
            0% { transform: translateY(100vh) rotate(0deg) translateZ(0px); opacity: 0.4; }
            50% { opacity: 0.6; }
            100% { transform: translateY(-100vh) rotate(360deg) translateZ(20px); opacity: 0.2; }
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
    <div class="glass-shards">
        <div class="shard" style="left: 10%; animation-delay: 0s;"></div>
        <div class="shard" style="left: 30%; animation-delay: 2s;"></div>
        <div class="shard" style="left: 50%; animation-delay: 4s;"></div>
        <div class="shard" style="left: 70%; animation-delay: 6s;"></div>
        <div class="shard" style="left: 90%; animation-delay: 8s;"></div>
    </div>
    <div class="container">
        <div class="form-section">
            <div class="logo"></div>
            <h2>Create User</h2>
            <form action="{{ route('admin.users.store') }}" method="POST">
                @csrf
                <label>Name:</label>
                <input type="text" name="name" required>
                <label>Email:</label>
                <input type="email" name="email" required>
                <label>Password:</label>
                <input type="password" name="password" required>
                <label>Role:</label>
                <select name="role" required>
                    <option value="admin">Admin</option>
                    <option value="donor">Donor</option>
                    <option value="seeker">Seeker</option>
                </select>
                <button type="submit">Create User</button>
            </form>
            <a href="{{ route('admin.users.index') }}">Back to Users List</a>
        </div>
    </div>
</body>
</html>