<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Time Donation Portal</title>
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
            color: white;
        }

        .login-container {
            background: rgba(0, 0, 0, 0.75);
            padding: 40px;
            border-radius: 15px;
            width: 350px;
            text-align: center;
            box-shadow: 0px 0px 25px rgba(0, 255, 255, 0.6);
            animation: glow 2s infinite alternate;
        }

        @keyframes glow {
            from { box-shadow: 0px 0px 15px rgba(0, 255, 255, 0.3); }
            to { box-shadow: 0px 0px 30px rgba(0, 255, 255, 0.9); }
        }

        h2 {
            margin-bottom: 20px;
            font-size: 28px;
            color: cyan;
            text-shadow: 0 0 15px cyan;
        }

        input {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border-radius: 8px;
            border: none;
            outline: none;
            background: #111;
            color: white;
            font-size: 16px;
            transition: 0.3s;
        }

        input:focus {
            background: #222;
            box-shadow: 0px 0px 10px cyan;
        }

        button {
            width: 100%;
            padding: 12px;
            background: cyan;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            margin-top: 10px;
            transition: 0.3s;
        }

        button:hover {
            background: #00bcd4;
            box-shadow: 0px 0px 15px cyan;
        }

        a {
            display: inline-block;
            margin-top: 15px;
            color: cyan;
            text-decoration: none;
            transition: 0.3s;
        }

        a:hover {
            color: white;
            text-shadow: 0 0 8px cyan;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>🔐 Login</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <a href="{{ route('register') }}">Create Account</a>
    </div>
</body>
</html>
