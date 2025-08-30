<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Donor Details - Time Donation Portal</title>
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
            text-align: center;
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

        /* Container */
        .container {
            margin: 30px auto;
            padding: 30px;
            background: #e0e5ec;
            border-radius: 20px;
            max-width: 500px;
            box-shadow: 10px 10px 20px #a3b1c6,
                        -10px -10px 20px #ffffff;
            transition: all 0.3s ease;
        }

        body.dark-mode .container {
            background: #2b2e3b;
            box-shadow: 10px 10px 20px #1c1e26,
                        -10px -10px 20px #3a3e4f;
        }

        .container:hover {
            box-shadow: inset 10px 10px 20px #a3b1c6,
                        inset -10px -10px 20px #ffffff;
        }

        body.dark-mode .container:hover {
            box-shadow: inset 10px 10px 20px #1c1e26,
                        inset -10px -10px 20px #3a3e4f;
        }

        h1 {
            font-size: 1.6rem;
            margin-bottom: 20px;
            font-weight: 800;
            color: #3b82f6;
        }

        body.dark-mode h1 {
            color: #6ee7b7;
        }

        p {
            font-size: 1.1rem;
            margin: 12px 0;
            color: #555;
        }

        body.dark-mode p {
            color: #b0b3c1;
        }

        strong {
            color: #3b82f6;
            font-weight: 600;
        }

        body.dark-mode strong {
            color: #6ee7b7;
        }

        /* Copy Button */
        .copy-btn {
            display: inline-block;
            margin-left: 10px;
            padding: 8px 12px;
            border-radius: 15px;
            background: #e0e5ec;
            box-shadow: 6px 6px 12px #a3b1c6,
                        -6px -6px 12px #ffffff;
            font-size: 0.9rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
        }

        body.dark-mode .copy-btn {
            background: #2b2e3b;
            box-shadow: 6px 6px 12px #1c1e26,
                        -6px -6px 12px #3a3e4f;
        }

        .copy-btn:hover {
            box-shadow: inset 6px 6px 12px #a3b1c6,
                        inset -6px -6px 12px #ffffff;
        }

        body.dark-mode .copy-btn:hover {
            box-shadow: inset 6px 6px 12px #1c1e26,
                        inset -6px -6px 12px #3a3e4f;
        }

        /* Copy Tooltip */
        .copy-btn .tooltip {
            visibility: hidden;
            position: absolute;
            top: -30px;
            left: 50%;
            transform: translateX(-50%);
            background: #e0e5ec;
            box-shadow: 6px 6px 12px #a3b1c6,
                        -6px -6px 12px #ffffff;
            padding: 6px 10px;
            border-radius: 10px;
            font-size: 0.8rem;
            color: #333;
            white-space: nowrap;
            z-index: 10;
        }

        body.dark-mode .copy-btn .tooltip {
            background: #2b2e3b;
            box-shadow: 6px 6px 12px #1c1e26,
                        -6px -6px 12px #3a3e4f;
            color: #e0e5ec;
        }

        .copy-btn.copied .tooltip {
            visibility: visible;
        }

        a.back-link {
            display: inline-block;
            margin-top: 25px;
            padding: 12px 24px;
            background: linear-gradient(135deg, #6ee7b7, #3b82f6);
            color: #fff;
            border-radius: 25px;
            font-weight: 600;
            box-shadow: 6px 6px 12px #a3b1c6,
                        -6px -6px 12px #ffffff;
            transition: all 0.3s ease;
        }

        body.dark-mode a.back-link {
            box-shadow: 6px 6px 12px #1c1e26,
                        -6px -6px 12px #3a3e4f;
        }

        a.back-link:hover {
            box-shadow: inset 6px 6px 12px #a3b1c6,
                        inset -6px -6px 12px #ffffff;
            transform: scale(1.05);
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
        <h1>Donor Profile</h1>
        <div class="header-links">
            <a href="{{ route('seeker.dashboard') }}">Back to Dashboard</a>
            <a href="{{ route('seeker.donors.index') }}">Back to Donors</a>
            <button class="toggle-btn">Toggle Dark Mode</button>
        </div>
    </header>

    <div class="container">
        <p><strong>Name:</strong> {{ $donor->name }}</p>
        <p><strong>Email:</strong> {{ $donor->email }} <button class="copy-btn" data-email="{{ $donor->email }}">Copy</button><span class="tooltip">Copied!</span></p>
        <p><strong>Role:</strong> {{ ucfirst($donor->role) }}</p>

        <a href="{{ route('seeker.donors.index') }}" class="back-link">Back to Donors</a>
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

        // Copy-to-Clipboard Functionality
        const copyBtn = document.querySelector('.copy-btn');
        copyBtn.addEventListener('click', () => {
            const email = copyBtn.dataset.email;
            navigator.clipboard.writeText(email).then(() => {
                copyBtn.classList.add('copied');
                setTimeout(() => {
                    copyBtn.classList.remove('copied');
                }, 2000); // Hide tooltip after 2 seconds
            }).catch(() => {
                alert('Failed to copy email. Please copy it manually.');
            });
        });
    </script>
</body>
</html>