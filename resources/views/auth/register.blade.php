<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register - Time Donation Portal</title>
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

    .register-container {
      background: #e0e5ec;
      padding: 40px;
      border-radius: 20px;
      width: 380px;
      max-width: 95%;
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

    input, select {
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

    input:focus, select:focus {
      box-shadow: inset 4px 4px 6px #a3b1c6,
                  inset -4px -4px 6px #ffffff,
                  0 0 6px rgba(59,130,246,0.4);
    }

    input::placeholder {
      color: #555;
    }

    label {
      font-size: 0.9rem;
      color: #444;
      display: block;
      text-align: left;
      margin: 8px 0 5px;
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

    .register-btn {
      background: linear-gradient(135deg, #f97316, #ef4444);
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
  <div class="register-container">
    <h1>⏳ Time Donation Portal</h1>
    <h2>Register</h2>

    <form method="POST" action="{{ route('register') }}">
      @csrf
      <input type="text" name="name" placeholder="Full Name" required>
      <input type="email" name="email" placeholder="Email Address" required>
      <input type="password" name="password" placeholder="Password" required>
      <input type="password" name="password_confirmation" placeholder="Confirm Password" required>

      <label for="role">Select Role:</label>
      <select name="role" id="role" required>
        <option value="donor">Donor</option>
        <option value="seeker">Seeker</option>
      </select>

      <button type="submit" class="register-btn">REGISTER</button>
    </form>

    <a href="{{ route('login') }}">Already have an account? Login</a>
    <a href="{{ url('/') }}">Back to Landing Page</a>
  </div>
</body>
</html>
