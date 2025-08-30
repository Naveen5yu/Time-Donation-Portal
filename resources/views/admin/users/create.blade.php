<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Create User - Time Donation Portal</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500;700&display=swap" rel="stylesheet">
    <style>
        /* Global Neumorphic Base */
        body, html {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #e0e5ec 0%, #d1d9e6 100%);
            color: #333;
            overflow-y: auto;
            overflow-x: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: all 0.5s ease;
        }

        body.dark-mode {
            background: linear-gradient(135deg, #2b2e3b 0%, #1f222e 100%);
            color: #e0e5ec;
        }

        /* Container */
        .container {
            background: #e0e5ec;
            border-radius: 25px;
            padding: 30px;
            width: 400px;
            text-align: center;
            box-shadow: 12px 12px 24px #a3b1c6,
                        -12px -12px 24px #ffffff;
            transition: all 0.5s ease;
        }

        body.dark-mode .container {
            background: #2b2e3b;
            box-shadow: 12px 12px 24px #151520,
                        -12px -12px 24px #2a2a3a;
        }

        /* Form Section */
        .form-section {
            margin-bottom: 20px;
            position: relative;
        }

        .form-section h2 {
            font-size: 1.8rem;
            font-family: 'Orbitron', sans-serif;
            color: #3b82f6;
            margin: 0 0 20px;
            text-shadow: 2px 2px 5px rgba(0,0,0,0.1);
            transition: color 0.5s ease;
        }

        body.dark-mode .form-section h2 {
            color: #6ee7b7;
        }

        /* Toggle Button */
        .toggle-btn {
            position: absolute;
            top: 0;
            right: 0;
            width: 60px;
            height: 30px;
            border-radius: 15px;
            background: #e0e5ec;
            box-shadow: inset 2px 2px 5px #a3b1c6,
                        inset -2px -2px 5px #ffffff;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            overflow: hidden;
        }

        body.dark-mode .toggle-btn {
            background: #2b2e3b;
            box-shadow: inset 2px 2px 5px #151520,
                        inset -2px -2px 5px #2a2a3a;
        }

        .toggle-btn::before {
            content: '';
            position: absolute;
            left: 3px;
            width: 24px;
            height: 24px;
            border-radius: 50%;
            background: linear-gradient(135deg, #a1c4fd, #c2e9fb);
            box-shadow: 3px 3px 6px #a3b1c6, -3px -3px 6px #ffffff;
            transition: all 0.3s ease;
            z-index: 2;
        }

        body.dark-mode .toggle-btn::before {
            transform: translateX(30px);
            background: linear-gradient(135deg, #ff80a0, #ff0080);
            box-shadow: 3px 3px 6px #151520, -3px -3px 6px #2a2a3a;
        }

        .toggle-btn .icon {
            position: absolute;
            font-size: 1rem;
            font-weight: bold;
            color: #ffffff;
            transition: all 0.3s ease;
            z-index: 3;
            left: 10px;
        }

        body.dark-mode .toggle-btn .icon {
            left: 36px;
        }

        .toggle-btn:hover {
            box-shadow: inset 1px 1px 3px #a3b1c6,
                        inset -1px -1px 3px #ffffff;
        }

        body.dark-mode .toggle-btn:hover {
            box-shadow: inset 1px 1px 3px #151520,
                        inset -1px -1px 3px #2a2a3a;
        }

        .toggle-btn:active {
            box-shadow: inset 2px 2px 5px #a3b1c6,
                        inset -2px -2px 5px #ffffff;
        }

        body.dark-mode .toggle-btn:active {
            box-shadow: inset 2px 2px 5px #151520,
                        inset -2px -2px 5px #2a2a3a;
        }

        /* Back to Dashboard Button */
        .back-btn {
            display: inline-block;
            margin: 10px 0 20px;
            padding: 10px 20px;
            background: linear-gradient(135deg, #6ee7b7, #3b82f6);
            color: #fff;
            font-family: 'Inter', sans-serif;
            font-size: 1rem;
            font-weight: 600;
            border-radius: 25px;
            box-shadow: 6px 6px 12px #a3b1c6,
                        -6px -6px 12px #ffffff;
            transition: all 0.3s ease;
        }

        body.dark-mode .back-btn {
            box-shadow: 6px 6px 12px #151520,
                        -6px -6px 12px #2a2a3a;
        }

        .back-btn:hover {
            box-shadow: inset 6px 6px 12px #a3b1c6,
                        inset -6px -6px 12px #ffffff;
            transform: scale(1.05);
        }

        body.dark-mode .back-btn:hover {
            box-shadow: inset 6px 6px 12px #151520,
                        inset -6px -6px 12px #2a2a3a;
        }

        /* Form */
        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        label {
            text-align: left;
            color: #34495e;
            font-weight: 600;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.1);
            transition: color 0.5s ease;
        }

        body.dark-mode label {
            color: #f3f3f3;
        }

        input, select {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 15px;
            background: linear-gradient(145deg, #e0e8f0, #ffffff);
            box-shadow: inset 6px 6px 12px #d3dee9,
                        inset -6px -6px 12px #ffffff;
            color: #333;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        body.dark-mode input, body.dark-mode select {
            background: linear-gradient(145deg, #2b2e3b, #1f222e);
            box-shadow: inset 6px 6px 12px #151520,
                        inset -6px -6px 12px #2a2a3a;
            color: #e0e5ec;
        }

        input:focus, select:focus {
            box-shadow: inset 4px 4px 8px #d3dee9,
                        inset -4px -4px 8px #ffffff,
                        0 0 10px rgba(59, 130, 246, 0.5);
            outline: none;
        }

        body.dark-mode input:focus, body.dark-mode select:focus {
            box-shadow: inset 4px 4px 8px #151520,
                        inset -4px -4px 8px #2a2a3a,
                        0 0 10px rgba(110, 231, 183, 0.5);
        }

        button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 25px;
            background: linear-gradient(135deg, #6ee7b7, #3b82f6);
            box-shadow: 8px 8px 16px #a3b1c6,
                        -8px -8px 16px #ffffff;
            color: white;
            font-size: 1.1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            font-family: 'Inter', sans-serif;
            font-weight: 600;
        }

        body.dark-mode button {
            box-shadow: 8px 8px 16px #151520,
                        -8px -8px 16px #2a2a3a;
        }

        button:hover {
            box-shadow: inset 6px 6px 12px #a3b1c6,
                        inset -6px -6px 12px #ffffff;
            transform: scale(1.05);
        }

        body.dark-mode button:hover {
            box-shadow: inset 6px 6px 12px #151520,
                        inset -6px -6px 12px #2a2a3a;
        }

        a {
            color: #0072ff;
            text-decoration: none;
            margin-top: 10px;
            display: inline-block;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.1);
        }

        body.dark-mode a {
            color: #60a5fa;
        }

        a:hover {
            text-decoration: underline;
            color: #0056b3;
        }

        body.dark-mode a:hover {
            color: #3b82f6;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="{{ route('admin.dashboard') }}" class="back-btn">⬅ Back to Dashboard</a>
        <div class="form-section">
            <h2>Create User</h2>
            <button class="toggle-btn" id="themeToggle" onclick="toggleMode()">
                <span class="icon">🌙</span>
            </button>
            <form action="{{ route('admin.users.store') }}" method="POST">
                @csrf
                <label>Name:</label>
                <input type="text" name="name" id="name" required>
                <label>Email:</label>
                <input type="email" name="email" id="email" required>
                <label>Password:</label>
                <input type="password" name="password" id="password" required>
                <label>Role:</label>
                <select name="role" id="role" required>
                    <option value="admin">Admin</option>
                    <option value="donor">Donor</option>
                    <option value="seeker">Seeker</option>
                </select>
                <button type="submit">Create User</button>
            </form>
            <a href="{{ route('admin.users.index') }}">Back to Users List</a>
        </div>
    </div>

    <script>
        const toggleBtn = document.getElementById('themeToggle');
        const toggleIcon = toggleBtn.querySelector('.icon');

        function toggleMode() {
            document.body.classList.toggle('dark-mode');
            console.log('Toggle clicked', document.body.classList); // Debug log
            if (document.body.classList.contains('dark-mode')) {
                toggleIcon.textContent = '☀️';
            } else {
                toggleIcon.textContent = '🌙';
            }
        }
    </script>
</body>
</html>