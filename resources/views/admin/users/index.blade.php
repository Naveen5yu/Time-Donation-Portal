<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>User Management - Time Donation Portal</title>
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
            width: 600px;
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

        /* Header Section */
        .header-section {
            margin-bottom: 20px;
            position: relative;
        }

        .header-section h1 {
            font-size: 1.8rem;
            font-family: 'Orbitron', sans-serif;
            color: #3b82f6;
            margin: 0;
            text-shadow: 2px 2px 5px rgba(0,0,0,0.1);
            transition: color 0.5s ease;
        }

        body.dark-mode .header-section h1 {
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

        /* Button Bar */
        .button-bar {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .dashboard-btn {
            padding: 10px 20px;
            border: none;
            border-radius: 25px;
            background: linear-gradient(135deg, #6ee7b7, #3b82f6);
            box-shadow: 6px 6px 12px #a3b1c6,
                        -6px -6px 12px #ffffff;
            color: white;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            font-family: 'Inter', sans-serif;
            font-weight: 600;
        }

        body.dark-mode .dashboard-btn {
            box-shadow: 6px 6px 12px #151520,
                        -6px -6px 12px #2a2a3a;
        }

        .dashboard-btn:hover {
            box-shadow: inset 6px 6px 12px #a3b1c6,
                        inset -6px -6px 12px #ffffff;
            transform: scale(1.05);
        }

        body.dark-mode .dashboard-btn:hover {
            box-shadow: inset 6px 6px 12px #151520,
                        inset -6px -6px 12px #2a2a3a;
        }

        /* Filter Section */
        .filter-section {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }

        .filter-input {
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

        body.dark-mode .filter-input {
            background: #2b2e3b;
            box-shadow: inset 6px 6px 12px #151520,
                        inset -6px -6px 12px #2a2a3a;
            color: #e0e5ec;
        }

        .filter-input:focus {
            outline: none;
            border: 1px solid #3b82f6;
        }

        body.dark-mode .filter-input:focus {
            border: 1px solid #6ee7b7;
        }

        /* Table Container */
        .table-container {
            width: 100%;
            margin-top: 20px;
            overflow-x: auto;
        }

        table {
            width: 100%;
            min-width: 500px;
            border-collapse: collapse;
            background: #f0f4f8;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 8px 8px 16px #a3b1c6,
                        -8px -8px 16px #ffffff;
            transition: all 0.5s ease;
        }

        body.dark-mode table {
            background: #2d2f3a;
            box-shadow: 8px 8px 16px #151520,
                        -8px -8px 16px #2a2a3a;
        }

        th, td {
            padding: 10px;
            text-align: left;
            color: #2c3e50;
            white-space: nowrap;
            background: linear-gradient(145deg, #e0e8f0, #ffffff);
            box-shadow: inset 4px 4px 8px #d3dee9,
                        inset -4px -4px 8px #ffffff;
            transition: all 0.3s ease;
        }

        body.dark-mode th, body.dark-mode td {
            color: #e0e5ec;
            background: linear-gradient(145deg, #2b2e3b, #1f222e);
            box-shadow: inset 4px 4px 8px #151520,
                        inset -4px -4px 8px #2a2a3a;
        }

        th {
            color: #34495e;
            font-weight: 700;
        }

        body.dark-mode th {
            color: #f3f3f3;
        }

        tr {
            border-bottom: 1px solid #e0e8f0;
            transition: transform 0.3s;
        }

        body.dark-mode tr {
            border-bottom: 1px solid #2b2e3b;
        }

        tr:hover {
            transform: translateY(-2px);
            box-shadow: 6px 6px 12px #a3b1c6,
                        -6px -6px 12px #ffffff;
        }

        body.dark-mode tr:hover {
            box-shadow: 6px 6px 12px #151520,
                        -6px -6px 12px #2a2a3a;
        }

        a {
            color: #0072ff;
            text-decoration: none;
            margin-right: 10px;
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

        .delete-btn {
            padding: 5px 10px;
            border: none;
            border-radius: 20px;
            background: linear-gradient(to right, #ff4d4d, #cc0000);
            box-shadow: 6px 6px 12px #a3b1c6,
                        -6px -6px 12px #ffffff;
            color: white;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        body.dark-mode .delete-btn {
            box-shadow: 6px 6px 12px #151520,
                        -6px -6px 12px #2a2a3a;
        }

        .delete-btn:hover {
            box-shadow: inset 6px 6px 12px #a3b1c6,
                        inset -6px -6px 12px #ffffff;
            transform: scale(1.05);
            background: linear-gradient(to right, #e60000, #990000);
        }

        body.dark-mode .delete-btn:hover {
            box-shadow: inset 6px 6px 12px #151520,
                        inset -6px -6px 12px #2a2a3a;
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

        .table-container::-webkit-scrollbar {
            width: 6px;
        }

        .table-container::-webkit-scrollbar-track {
            background: #e0e5ec;
            border-radius: 3px;
        }

        body.dark-mode .table-container::-webkit-scrollbar-track {
            background: #2b2e3b;
        }

        .table-container::-webkit-scrollbar-thumb {
            background: linear-gradient(180deg, #6ee7b7, #3b82f6);
            border-radius: 3px;
        }

        .table-container::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(180deg, #3b82f6, #6ee7b7);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header-section">
            <h1>User Management</h1>
            <button class="toggle-btn" id="themeToggle" onclick="toggleMode()">
                <span class="icon">🌙</span>
            </button>
        </div>

        <div class="button-bar">
            <a href="{{ route('admin.dashboard') }}">
                <button class="dashboard-btn">⬅ Back to Dashboard</button>
            </a>
            <a href="{{ route('admin.users.create') }}">
                <button class="dashboard-btn">➕ Add User</button>
            </a>
        </div>

        <div class="filter-section">
            <input type="text" id="user-search" class="filter-input" placeholder="Search by ID, Name, or Email...">
        </div>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr data-filter="{{ strtolower($user->id . ' ' . $user->name . ' ' . $user->email) }}">
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <a href="{{ route('admin.users.edit', $user->id) }}">Edit</a> |
                            <form action="{{ route('admin.users.delete', $user->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-btn">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div id="no-results" style="display: none; color: #666; padding: 10px;">No users match your search.</div>
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

        // Filter Functionality
        document.addEventListener('DOMContentLoaded', () => {
            const searchInput = document.getElementById('user-search');
            const rows = document.querySelectorAll('tbody tr');
            const noResults = document.getElementById('no-results');

            function filterRows() {
                const searchTerm = searchInput.value.toLowerCase().trim();
                let hasVisible = false;

                rows.forEach(row => {
                    const filterText = row.dataset.filter || '';
                    const matchesSearch = !searchTerm || filterText.includes(searchTerm);
                    row.style.display = matchesSearch ? 'table-row' : 'none';
                    if (matchesSearch) hasVisible = true;
                });

                noResults.style.display = hasVisible ? 'none' : 'block';
            }

            if (searchInput && rows.length > 0) {
                searchInput.addEventListener('input', filterRows);
                filterRows(); // Initial filter on load
            } else {
                console.error('Filter elements not found:', { searchInput, rows });
            }
        });
    </script>
</body>
</html>