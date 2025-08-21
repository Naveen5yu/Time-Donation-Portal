<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Time Donation Portal</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #2b5876, #4e4376);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .register-container {
            background: rgba(255, 255, 255, 0.12);
            padding: 40px;
            border-radius: 15px;
            backdrop-filter: blur(15px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.4);
            width: 380px;
            color: white;
            text-align: center;
        }

        .register-container h2 {
            margin-bottom: 20px;
            font-size: 26px;
            font-weight: bold;
        }

        .register-container input, 
        .register-container select {
            width: 100%;
            padding: 12px;
            margin: 8px 0;
            border-radius: 8px;
            border: none;
            outline: none;
            font-size: 14px;
        }

        .register-container input {
            background: rgba(255, 255, 255, 0.8);
        }

        .register-container select {
            background: rgba(255, 255, 255, 0.9);
        }

        .register-container button {
            width: 100%;
            padding: 12px;
            margin-top: 15px;
            border: none;
            border-radius: 8px;
            background: linear-gradient(135deg, #00c6ff, #0072ff);
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        .register-container button:hover {
            transform: scale(1.05);
            background: linear-gradient(135deg, #0072ff, #00c6ff);
        }

        .register-container a {
            display: block;
            margin-top: 15px;
            text-decoration: none;
            color: #ffd700;
            font-weight: bold;
            transition: 0.3s;
        }

        .register-container a:hover {
            color: #ff8800;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h2>Create Your Account</h2>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <input type="text" name="name" placeholder="Full Name" required>
            <input type="email" name="email" placeholder="Email Address" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="password_confirmation" placeholder="Confirm Password" required>

            <label for="role">Select Role:</label>
            <select name="role" id="role" required>
                <option value="admin">Admin</option>
                <option value="donor">Donor</option>
                <option value="seeker">Seeker</option>
            </select>

            <button type="submit">Register</button>
        </form>
        <a href="{{ route('login') }}">Already have an account? Login</a>
    </div>
</body>
</html>
