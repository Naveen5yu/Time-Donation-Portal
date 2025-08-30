<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Create Time Request - Time Donation Portal</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
    <style>
        /* Global Neumorphic Base */
        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background: #e0e5ec;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            transition: all 0.3s ease;
        }

        body.dark-mode {
            background: #2b2e3b;
            color: #e0e5ec;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        /* Stronger Neumorphic Header */
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 50px;
            background: #e0e5ec;
            box-shadow: 12px 12px 24px #a3b1c6,
                        -12px -12px 24px #ffffff;
            border-radius: 0 0 20px 20px;
            position: sticky;
            top: 0;
            z-index: 10;
            transition: all 0.3s ease;
        }

        body.dark-mode header {
            background: #2b2e3b;
            box-shadow: 12px 12px 24px #1c1e26,
                        -12px -12px 24px #3a3e4f;
        }

        header .logo {
            font-size: 1.2rem;
            font-weight: 800;
            color: #3b82f6;
            text-transform: uppercase;
            letter-spacing: 1.5px;
        }

        body.dark-mode header .logo {
            color: #6ee7b7;
        }

        header h1 {
            font-size: 1.8rem;
            font-weight: 800;
            color: #3b82f6;
            margin: 0;
        }

        body.dark-mode header h1 {
            color: #6ee7b7;
        }

        .header-links a, .toggle-btn {
            margin-left: 20px;
            padding: 10px 20px;
            border-radius: 25px;
            background: #e0e5ec;
            box-shadow: 6px 6px 12px #a3b1c6,
                        -6px -6px 12px #ffffff;
            font-weight: 600;
            transition: all 0.3s ease;
            cursor: pointer;
            border: none;
            color: #333;
        }

        body.dark-mode .header-links a, body.dark-mode .toggle-btn {
            background: #2b2e3b;
            box-shadow: 6px 6px 12px #1c1e26,
                        -6px -6px 12px #3a3e4f;
            color: #e0e5ec;
        }

        .header-links a:hover, .toggle-btn:hover {
            box-shadow: inset 6px 6px 12px #a3b1c6,
                        inset -6px -6px 12px #ffffff;
        }

        body.dark-mode .header-links a:hover, body.dark-mode .toggle-btn:hover {
            box-shadow: inset 6px 6px 12px #1c1e26,
                        inset -6px -6px 12px #3a3e4f;
        }

        /* Card */
        .card {
            background: #e0e5ec;
            border-radius: 20px;
            padding: 30px;
            width: 400px;
            box-shadow: 10px 10px 20px #a3b1c6,
                        -10px -10px 20px #ffffff;
            transition: all 0.3s ease;
        }

        body.dark-mode .card {
            background: #2b2e3b;
            box-shadow: 10px 10px 20px #1c1e26,
                        -10px -10px 20px #3a3e4f;
        }

        .card:hover {
            box-shadow: inset 10px 10px 20px #a3b1c6,
                        inset -10px -10px 20px #ffffff;
        }

        body.dark-mode .card:hover {
            box-shadow: inset 10px 10px 20px #1c1e26,
                        inset -10px -10px 20px #3a3e4f;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 1.6rem;
            font-weight: 800;
            color: #3b82f6;
        }

        body.dark-mode h1 {
            color: #6ee7b7;
        }

        label {
            display: block;
            margin-bottom: 15px;
            font-size: 0.9rem;
            font-weight: 600;
            color: #333;
        }

        body.dark-mode label {
            color: #e0e5ec;
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            border-radius: 15px;
            border: none;
            outline: none;
            margin-top: 6px;
            background: #e0e5ec;
            box-shadow: inset 6px 6px 12px #a3b1c6,
                        inset -6px -6px 12px #ffffff;
            color: #333;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        body.dark-mode input, body.dark-mode textarea {
            background: #2b2e3b;
            box-shadow: inset 6px 6px 12px #1c1e26,
                        inset -6px -6px 12px #3a3e4f;
            color: #e0e5ec;
        }

        input:focus, textarea:focus {
            box-shadow: 6px 6px 12px #a3b1c6,
                        -6px -6px 12px #ffffff;
            border: 1px solid #3b82f6;
        }

        body.dark-mode input:focus, body.dark-mode textarea:focus {
            box-shadow: 6px 6px 12px #1c1e26,
                        -6px -6px 12px #3a3e4f;
            border: 1px solid #6ee7b7;
        }

        /* Validation Feedback */
        .input-container {
            position: relative;
            margin-bottom: 20px;
        }

        .input-container.valid::after {
            content: '✅';
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 1rem;
        }

        .input-container.invalid::after {
            content: '❌';
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 1rem;
        }

        button {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #6ee7b7, #3b82f6);
            border: none;
            border-radius: 25px;
            color: #fff;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            margin-top: 15px;
            box-shadow: 6px 6px 12px #a3b1c6,
                        -6px -6px 12px #ffffff;
            transition: all 0.3s ease;
        }

        body.dark-mode button {
            box-shadow: 6px 6px 12px #1c1e26,
                        -6px -6px 12px #3a3e4f;
        }

        button:hover {
            box-shadow: inset 6px 6px 12px #a3b1c6,
                        inset -6px -6px 12px #ffffff;
            transform: scale(1.05);
        }

        body.dark-mode button:hover {
            box-shadow: inset 6px 6px 12px #1c1e26,
                        inset -6px -6px 12px #3a3e4f;
        }

        a.back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            padding: 10px 20px;
            border-radius: 25px;
            background: #e0e5ec;
            box-shadow: 6px 6px 12px #a3b1c6,
                        -6px -6px 12px #ffffff;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        body.dark-mode a.back-link {
            background: #2b2e3b;
            box-shadow: 6px 6px 12px #1c1e26,
                        -6px -6px 12px #3a3e4f;
        }

        a.back-link:hover {
            box-shadow: inset 6px 6px 12px #a3b1c6,
                        inset -6px -6px 12px #ffffff;
        }

        body.dark-mode a.back-link:hover {
            box-shadow: inset 6px 6px 12px #1c1e26,
                        inset -6px -6px 12px #3a3e4f;
        }

        /* Custom Scrollbar */
        body::-webkit-scrollbar {
            width: 8px;
        }

        body::-webkit-scrollbar-track {
            background: #e0e5ec;
            border-radius: 4px;
        }

        body.dark-mode::-webkit-scrollbar-track {
            background: #2b2e3b;
        }

        body::-webkit-scrollbar-thumb {
            background: linear-gradient(180deg, #6ee7b7, #3b82f6);
            border-radius: 4px;
        }

        body::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(180deg, #3b82f6, #6ee7b7);
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">TDP</div>
        <h1>Create Time Request</h1>
        <div class="header-links">
            <a href="{{ route('seeker.dashboard') }}">Back to Dashboard</a>
            <a href="{{ route('seeker.time_requests.index') }}">Back to Requests</a>
            <button class="toggle-btn">Toggle Dark Mode</button>
        </div>
    </header>

    <div class="card">
        <form method="POST" action="{{ route('seeker.time_requests.store') }}">
            @csrf
            <div class="input-container">
                <label>Title:
                    <input type="text" name="title" required>
                </label>
            </div>
            <div class="input-container">
                <label>Description:
                    <textarea name="description" rows="4" required></textarea>
                </label>
            </div>
            <div class="input-container">
                <label>Requested Time:
                    <input type="datetime-local" name="requested_time" required>
                </label>
            </div>
            <button type="submit">Submit</button>
        </form>
        <a href="{{ route('seeker.time_requests.index') }}" class="back-link">Back to Requests</a>
    </div>

    <script>
        // Dark Mode Toggle
        const toggleBtn = document.querySelector('.toggle-btn');
        toggleBtn.addEventListener('click', () => {
            document.body.classList.toggle('dark-mode');
            toggleBtn.textContent = document.body.classList.contains('dark-mode') 
                ? 'Toggle Light Mode' 
                : 'Toggle Dark Mode';
        });

        // Real-time Input Validation Feedback
        const inputs = document.querySelectorAll('input, textarea');
        inputs.forEach(input => {
            input.addEventListener('input', () => {
                const container = input.closest('.input-container');
                if (input.name === 'requested_time') {
                    const selectedDate = new Date(input.value);
                    const now = new Date();
                    if (input.value && selectedDate > now) {
                        container.classList.remove('invalid');
                        container.classList.add('valid');
                    } else {
                        container.classList.remove('valid');
                        container.classList.add('invalid');
                    }
                } else {
                    if (input.value.trim()) {
                        container.classList.remove('invalid');
                        container.classList.add('valid');
                    } else {
                        container.classList.remove('valid');
                        container.classList.add('invalid');
                    }
                }
            });
        });
    </script>
</body>
</html>