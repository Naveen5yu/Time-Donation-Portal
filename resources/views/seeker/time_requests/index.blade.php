<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>My Time Requests - Time Donation Portal</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
    <style>
        /* Global Neumorphic Base */
        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background: #e0e5ec;
            color: #333;
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

        /* Container */
        .container {
            max-width: 900px;
            margin: 30px auto;
            padding: 20px;
            background: #e0e5ec;
            border-radius: 20px;
            box-shadow: 10px 10px 20px #a3b1c6,
                        -10px -10px 20px #ffffff;
            transition: all 0.3s ease;
        }

        body.dark-mode .container {
            background: #2b2e3b;
            box-shadow: 10px 10px 20px #1c1e26,
                        -10px -10px 20px #3a3e4f;
        }

        /* Create New Request Button */
        .btn {
            display: inline-block;
            padding: 12px 20px;
            margin-bottom: 20px;
            background: linear-gradient(135deg, #6ee7b7, #3b82f6);
            color: #fff;
            font-weight: 600;
            border-radius: 25px;
            box-shadow: 6px 6px 12px #a3b1c6,
                        -6px -6px 12px #ffffff;
            transition: all 0.3s ease;
        }

        body.dark-mode .btn {
            box-shadow: 6px 6px 12px #1c1e26,
                        -6px -6px 12px #3a3e4f;
        }

        .btn:hover {
            box-shadow: inset 6px 6px 12px #a3b1c6,
                        inset -6px -6px 12px #ffffff;
            transform: scale(1.05);
        }

        body.dark-mode .btn:hover {
            box-shadow: inset 6px 6px 12px #1c1e26,
                        inset -6px -6px 12px #3a3e4f;
        }

        /* Filter Dropdown */
        .filter {
            margin-bottom: 20px;
            display: flex;
            justify-content: flex-end;
        }

        .filter select {
            padding: 10px 20px;
            border-radius: 25px;
            background: #e0e5ec;
            box-shadow: 6px 6px 12px #a3b1c6,
                        -6px -6px 12px #ffffff;
            border: none;
            font-size: 1rem;
            font-weight: 600;
            color: #333;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        body.dark-mode .filter select {
            background: #2b2e3b;
            box-shadow: 6px 6px 12px #1c1e26,
                        -6px -6px 12px #3a3e4f;
            color: #e0e5ec;
        }

        .filter select:hover {
            box-shadow: inset 6px 6px 12px #a3b1c6,
                        inset -6px -6px 12px #ffffff;
        }

        body.dark-mode .filter select:hover {
            box-shadow: inset 6px 6px 12px #1c1e26,
                        inset -6px -6px 12px #3a3e4f;
        }

        /* Card */
        .card {
            background: #e0e5ec;
            border-radius: 20px;
            padding: 20px;
            margin-bottom: 15px;
            box-shadow: 8px 8px 16px #a3b1c6,
                        -8px -8px 16px #ffffff;
            transition: all 0.3s ease;
        }

        body.dark-mode .card {
            background: #2b2e3b;
            box-shadow: 8px 8px 16px #1c1e26,
                        -8px -8px 16px #3a3e4f;
        }

        .card:hover {
            box-shadow: inset 8px 8px 16px #a3b1c6,
                        inset -8px -8px 16px #ffffff;
        }

        body.dark-mode .card:hover {
            box-shadow: inset 8px 8px 16px #1c1e26,
                        inset -8px -8px 16px #3a3e4f;
        }

        .card h3 {
            margin: 0 0 8px;
            font-size: 1.2rem;
            font-weight: 800;
            color: #3b82f6;
        }

        body.dark-mode .card h3 {
            color: #6ee7b7;
        }

        .status {
            display: inline-block;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 600;
        }

        .status.pending {
            background: linear-gradient(90deg, #ffb74d, #3b82f6);
            color: #fff;
        }

        .status.approved {
            background: linear-gradient(90deg, #4caf50, #6ee7b7);
            color: #fff;
        }

        .status.rejected {
            background: linear-gradient(90deg, #f44336, #ff4500);
            color: #fff;
        }

        /* Footer */
        footer {
            margin-top: 30px;
            text-align: center;
        }

        footer a {
            padding: 10px 20px;
            border-radius: 25px;
            background: #e0e5ec;
            box-shadow: 6px 6px 12px #a3b1c6,
                        -6px -6px 12px #ffffff;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        body.dark-mode footer a {
            background: #2b2e3b;
            box-shadow: 6px 6px 12px #1c1e26,
                        -6px -6px 12px #3a3e4f;
        }

        footer a:hover {
            box-shadow: inset 6px 6px 12px #a3b1c6,
                        inset -6px -6px 12px #ffffff;
        }

        body.dark-mode footer a:hover {
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
        <h1>My Time Requests</h1>
        <div class="header-links">
            <a href="{{ route('seeker.dashboard') }}">Back to Dashboard</a>
            <button class="toggle-btn">Toggle Dark Mode</button>
        </div>
    </header>

    <div class="container">
        <div class="filter">
            <select id="status-filter">
                <option value="all">All Statuses</option>
                <option value="pending">Pending</option>
                <option value="approved">accepted</option>
                <option value="rejected">Rejected</option>
            </select>
        </div>
        <a href="{{ route('seeker.time_requests.create') }}" class="btn">Create New Request</a>

        @if($requests->isEmpty())
            <p>No time requests yet.</p>
        @else
            @foreach($requests as $req)
                <div class="card" data-status="{{ strtolower($req->status) }}">
                    <h3>{{ $req->title }}</h3>
                    <p>Status: 
                        <span class="status {{ strtolower($req->status) }}">
                            {{ ucfirst($req->status) }}
                        </span>
                    </p>
                </div>
            @endforeach
        @endif

        <footer>
            <a href="{{ route('seeker.dashboard') }}">Back to Dashboard</a>
        </footer>
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

        // Filter Functionality
        const filterSelect = document.querySelector('#status-filter');
        const cards = document.querySelectorAll('.card');

        filterSelect.addEventListener('change', () => {
            const selectedStatus = filterSelect.value.toLowerCase(); // Normalize to lowercase
            cards.forEach(card => {
                const cardStatus = card.dataset.status.toLowerCase(); // Normalize card status
                if (selectedStatus === 'all' || cardStatus === selectedStatus) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    </script>
</body>
</html>