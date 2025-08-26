<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Time Donation Portal</title>
  <style>
    body {
      margin: 0;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      background: #dce3eb;
      font-family: Arial, sans-serif;
    }

    .login-container {
      background: #e0e5ec;
      padding: 40px;
      border-radius: 20px;
      width: 350px;
      max-width: 90%;
      text-align: center;
      box-shadow: 7px 7px 15px #a3b1c6,
                  -7px -7px 15px #ffffff;
    }

    h1 {
      margin-bottom: 5px;
      font-size: 1.4rem;
      color: #444;
    }

    h2 {
      margin-bottom: 20px;
      color: #333;
      font-size: 1.8rem;
      font-weight: bold;
    }

    input {
      width: 100%;
      padding: 15px;
      margin: 12px 0;
      border: none;
      border-radius: 30px;
      background: #e0e5ec;
      box-shadow: inset 6px 6px 8px #a3b1c6,
                  inset -6px -6px 8px #ffffff;
      font-size: 1rem;
      color: #333;
      outline: none;
      transition: 0.3s;
    }

    input::placeholder {
      color: #555;
    }

    input:focus {
      box-shadow: inset 4px 4px 6px #a3b1c6,
                  inset -4px -4px 6px #ffffff,
                  0 0 6px rgba(59,130,246,0.4);
    }

    button {
      width: 100%;
      padding: 15px;
      margin-top: 15px;
      border: none;
      border-radius: 30px;
      font-size: 1.1rem;
      font-weight: bold;
      cursor: pointer;
      box-shadow: 6px 6px 12px #a3b1c6,
                  -6px -6px 12px #ffffff;
      transition: 0.3s;
    }

    button:hover {
      transform: scale(1.05);
    }

    .login-btn {
      background: linear-gradient(135deg, #6ee7b7, #3b82f6);
      color: white;
    }

   

    a {
      display: block;
      margin-top: 15px;
      color: #555;
      font-size: 0.9rem;
      text-decoration: none;
    }

    a:hover {
      color: #3b82f6;
    }
  </style>
</head>
<body>
  <div class="login-container">
    <h1>⏳ Time Donation Portal</h1>
    <h2>Login</h2>

    <form method="POST" action="{{ route('login') }}">
      @csrf
      <input type="email" name="email" placeholder="Email" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit" class="login-btn">LOGIN</button>
    </form>

    <a href="{{ route('register') }}">Create Account</a>
    <a href="{{ url('/') }}">Back to Landing Page</a>
  </div>
</body>
</html>
