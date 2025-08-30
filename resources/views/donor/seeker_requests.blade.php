<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Seeker Requests - Time Donation Portal</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500;700&display=swap" rel="stylesheet">
    <style>
        /* Global Neumorphic Base */
        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #e0e5ec 0%, #d1d9e6 100%);
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
            padding: 0 20px;
            transition: all 0.3s ease;
        }

        body.dark-mode {
            background: linear-gradient(135deg, #2b2e3b 0%, #1f222e 100%);
            color: #e0e5ec;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        /* Neumorphic Container */
        .container {
            max-width: 1000px;
            margin: 50px auto;
            padding: 30px;
            background: #e0e5ec;
            border-radius: 25px;
            box-shadow: 12px 12px 24px #a3b1c6,
                        -12px -12px 24px #ffffff;
            width: 90%;
            transition: all 0.3s ease;
        }

        body.dark-mode .container {
            background: #2b2e3b;
            box-shadow: 12px 12px 24px #1c1e26,
                        -12px -12px 24px #3a3e4f;
        }

        /* Logo */
        .logo {
            width: 65px;
            height: 65px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            background: linear-gradient(135deg, #e0e5ec, #ffffff);
            box-shadow: inset 6px 6px 12px #a3b1c6,
                        inset -6px -6px 12px #ffffff;
            transition: all 0.3s ease;
        }

        body.dark-mode .logo {
            background: linear-gradient(135deg, #2b2e3b, #1f222e);
            box-shadow: inset 6px 6px 12px #1c1e26,
                        inset -6px -6px 12px #3a3e4f;
        }

        .logo::before {
            content: 'TDP';
            font-family: 'Orbitron', sans-serif;
            font-size: 1.2rem;
            font-weight: 700;
            color: #3b82f6;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
        }

        body.dark-mode .logo::before {
            color: #6ee7b7;
        }

        /* Header */
        h1 {
            text-align: center;
            font-size: 2.3rem;
            font-family: 'Orbitron', sans-serif;
            font-weight: 700;
            margin-bottom: 25px;
            color: #3b82f6;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
            animation: pulse 2s ease-in-out infinite;
        }

        body.dark-mode h1 {
            color: #6ee7b7;
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.02); }
            100% { transform: scale(1); }
        }

        /* Toggle Button */
        .toggle-btn {
            position: absolute;
            top: 20px;
            right: 20px;
            padding: 10px 20px;
            border: none;
            border-radius: 25px;
            font-weight: 600;
            cursor: pointer;
            background: #e0e5ec;
            color: #333;
            box-shadow: 6px 6px 12px #a3b1c6,
                        -6px -6px 12px #ffffff;
            transition: all 0.3s ease;
        }

        body.dark-mode .toggle-btn {
            background: #2b2e3b;
            box-shadow: 6px 6px 12px #1c1e26,
                        -6px -6px 12px #3a3e4f;
            color: #e0e5ec;
        }

        .toggle-btn:hover {
            box-shadow: inset 6px 6px 12px #a3b1c6,
                        inset -6px -6px 12px #ffffff;
            transform: scale(1.05);
        }

        body.dark-mode .toggle-btn:hover {
            box-shadow: inset 6px 6px 12px #1c1e26,
                        inset -6px -6px 12px #3a3e4f;
        }

        /* Filter Section */
        .filter-section {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }

        .filter-input, .filter-select {
            padding: 12px;
            border: none;
            border-radius: 15px;
            background: #e0e5ec;
            box-shadow: inset 6px 6px 12px #a3b1c6,
                        inset -6px -6px 12px #ffffff;
            font-size: 1rem;
            font-weight: 600;
            color: #333;
            transition: all 0.3s ease;
        }

        body.dark-mode .filter-input, body.dark-mode .filter-select {
            background: #2b2e3b;
            box-shadow: inset 6px 6px 12px #1c1e26,
                        inset -6px -6px 12px #3a3e4f;
            color: #e0e5ec;
        }

        .filter-input:focus, .filter-select:focus {
            outline: none;
            border: 1px solid #3b82f6;
        }

        body.dark-mode .filter-input:focus, body.dark-mode .filter-select:focus {
            border: 1px solid #6ee7b7;
        }

        /* Card */
        .card {
            background: linear-gradient(135deg, #f0f4f8, #e0e8f0);
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 8px 8px 16px #a3b1c6,
                        -8px -8px 16px #ffffff;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
            font-size: 1.2rem;
            font-weight: 700;
            border: 1px solid rgba(59, 130, 246, 0.3);
            display: block;
            width: 100%;
        }

        body.dark-mode .card {
            background: linear-gradient(135deg, #2d2f3a, #1f222e);
            box-shadow: 8px 8px 16px #1c1e26,
                        -8px -8px 16px #3a3e4f;
            border: 1px solid rgba(110, 231, 183, 0.3);
        }

        .card:nth-child(odd) {
            background: linear-gradient(135deg, #60a5fa, #3b82f6);
        }

        .card:nth-child(even) {
            background: linear-gradient(135deg, #6ee7b7, #059669);
        }

        .card:hover {
            transform: translateY(-5px) scale(1.02);
            box-shadow: inset 8px 8px 16px #a3b1c6,
                        inset -8px -8px 16px #ffffff;
        }

        body.dark-mode .card:hover {
            box-shadow: inset 8px 8px 16px #1c1e26,
                        inset -8px -8px 16px #3a3e4f;
        }

        .card h5 {
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 12px;
            color: #fff;
        }

        .card p {
            margin-bottom: 15px;
            color: #e0e5ec;
            font-style: italic;
            opacity: 0.9;
        }

        /* Buttons */
        .btn-action {
            padding: 10px 18px;
            border: none;
            border-radius: 15px;
            font-weight: 600;
            cursor: pointer;
            margin-right: 10px;
            transition: all 0.3s ease;
            box-shadow: 6px 6px 12px #a3b1c6,
                        -6px -6px 12px #ffffff;
        }

        body.dark-mode .btn-action {
            box-shadow: 6px 6px 12px #1c1e26,
                        -6px -6px 12px #3a3e4f;
        }

        .btn-accept {
            background: linear-gradient(to right, #00c6ff, #0072ff);
            color: #fff;
        }

        .btn-accept:hover {
            box-shadow: inset 6px 6px 12px #a3b1c6,
                        inset -6px -6px 12px #ffffff;
            transform: scale(1.05);
        }

        body.dark-mode .btn-accept:hover {
            box-shadow: inset 6px 6px 12px #1c1e26,
                        inset -6px -6px 12px #3a3e4f;
        }

        .btn-reject {
            background: linear-gradient(to right, #ff4d4d, #cc0000);
            color: #fff;
        }

        .btn-reject:hover {
            box-shadow: inset 6px 6px 12px #a3b1c6,
                        inset -6px -6px 12px #ffffff;
            transform: scale(1.05);
        }

        body.dark-mode .btn-reject:hover {
            box-shadow: inset 6px 6px 12px #1c1e26,
                        inset -6px -6px 12px #3a3e4f;
        }

        /* Back to Dashboard Button */
        .back-btn {
            display: inline-block;
            margin: 20px 0;
            padding: 12px 24px;
            background: linear-gradient(135deg, #6ee7b7, #3b82f6);
            color: #fff;
            font-family: 'Inter', sans-serif;
            font-size: 1rem;
            font-weight: 700;
            border-radius: 25px;
            box-shadow: 6px 6px 12px #a3b1c6,
                        -6px -6px 12px #ffffff;
            transition: all 0.3s ease;
        }

        body.dark-mode .back-btn {
            box-shadow: 6px 6px 12px #1c1e26,
                        -6px -6px 12px #3a3e4f;
        }

        .back-btn:hover {
            box-shadow: inset 6px 6px 12px #a3b1c6,
                        inset -6px -6px 12px #ffffff;
            transform: scale(1.05);
        }

        body.dark-mode .back-btn:hover {
            box-shadow: inset 6px 6px 12px #1c1e26,
                        inset -6px -6px 12px #3a3e4f;
        }

        /* Alert */
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 15px;
            box-shadow: 6px 6px 12px #a3b1c6,
                        -6px -6px 12px #ffffff;
            text-align: center;
        }

        body.dark-mode .alert {
            box-shadow: 6px 6px 12px #1c1e26,
                        -6px -6px 12px #3a3e4f;
        }

        .alert-success {
            background: linear-gradient(to right, #28a745, #218838);
            color: #fff;
        }

        /* Empty Message */
        .empty-msg {
            text-align: center;
            font-size: 1.2rem;
            font-weight: 600;
            color: #555;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
            margin-top: 30px;
        }

        body.dark-mode .empty-msg {
            color: #b0b3c1;
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
    <div class="container">
        <div class="logo"></div>
        <h1>Seeker Requests</h1>
        <a href="{{ route('donor.dashboard') }}" class="back-btn">⬅ Back to Dashboard</a>
        <button class="toggle-btn">Toggle Dark Mode</button>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="filter-section">
            <input type="text" id="request-search" class="filter-input" placeholder="Search requests by title...">
            <select id="request-status" class="filter-select">
                <option value="all">All</option>
                <option value="pending">Pending</option>
                <option value="accepted">Accepted</option>
                <option value="rejected">Rejected</option>
            </select>
        </div>

        <div id="request-items">
            @if($requests->isEmpty())
                <p class="empty-msg">No pending requests. All clear for now.</p>
            @else
                @foreach($requests as $request)
                    <div class="card" 
                         data-title="{{ strtolower($request->title) }}" 
                         data-status="{{ strtolower($request->status ?? 'pending') }}">
                        <h5>{{ $request->title }}</h5>
                        <p><strong>Seeker:</strong> {{ $request->seeker->name }}</p>
                        <p><strong>Description:</strong> {{ $request->description }}</p>
                        <p><strong>Requested Time:</strong> {{ $request->requested_time }}</p>
                        <form action="{{ route('donor.accept_request', $request->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn-action btn-accept">Accept</button>
                        </form>
                        <form action="{{ route('donor.reject_request', $request->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn-action btn-reject">Reject</button>
                        </form>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

    <script>
        // Dark Mode Toggle
        const toggleBtn = document.querySelector('.toggle-btn');
        if (toggleBtn) {
            toggleBtn.addEventListener('click', () => {
                document.body.classList.toggle('dark-mode');
                toggleBtn.textContent = document.body.classList.contains('dark-mode') 
                    ? 'Toggle Light Mode' 
                    : 'Toggle Dark Mode';
            });
        } else {
            console.error('Toggle button not found');
        }

        // Request Filter
        document.addEventListener('DOMContentLoaded', () => {
            const searchInput = document.getElementById('request-search');
            const statusSelect = document.getElementById('request-status');
            const requestItems = document.querySelectorAll('.card');
            const emptyMessage = document.querySelector('.empty-msg');

            function filterRequests() {
                const searchTerm = searchInput.value.toLowerCase().trim();
                const status = statusSelect.value;

                let hasVisible = false;
                requestItems.forEach(item => {
                    const title = item.dataset.title;
                    const itemStatus = item.dataset.status;
                    const matchesSearch = title.includes(searchTerm);
                    const matchesStatus = status === 'all' || itemStatus === status;

                    if (matchesSearch && matchesStatus) {
                        item.style.display = 'block';
                        hasVisible = true;
                    } else {
                        item.style.display = 'none';
                    }
                });

                if (emptyMessage) {
                    emptyMessage.style.display = hasVisible ? 'none' : 'block';
                }
            }

            searchInput.addEventListener('input', filterRequests);
            statusSelect.addEventListener('change', filterRequests);
            filterRequests(); // Initial filter on load
        });
    </script>
</body>
</html>