<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>User Management - Time Donation Portal</title>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body, html {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(145deg, #3b0000, #6b0f0f, white, white);
            background-size: 400% 400%;
            color: #fff8e1;
            overflow-y: auto;
            overflow-x: hidden;
            animation: bg-flow 12s ease infinite;
            perspective: 1000px;
        }

        @keyframes bg-flow {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, rgba(255, 77, 77, 0.1), rgba(255, 204, 0, 0.1));
            backdrop-filter: blur(6px);
            z-index: -1;
            animation: glass-shift 8s ease infinite;
        }

        @keyframes glass-shift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            max-width: 700px;
            margin: 20px auto;
        }

        .header-section {
            background: linear-gradient(135deg, rgba(255, 77, 77, 0.3), rgba(255, 204, 0, 0.3));
            backdrop-filter: blur(15px);
            border: 2px solid rgba(255, 204, 0, 0.3);
            border-radius: 12px;
            padding: 15px;
            width: 100%;
            text-align: center;
            margin-bottom: 15px;
            box-shadow: 0 4px 15px rgba(255, 77, 77, 0.3);
            transform-style: preserve-3d;
            transition: transform 0.7s ease, box-shadow 0.7s ease;
        }

        .header-section:hover {
            transform: translateZ(20px);
            box-shadow: 0 8px 25px rgba(255, 77, 77, 0.5);
        }

        .logo {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, rgba(255, 204, 0, 0.5), rgba(255, 77, 77, 0.5));
            backdrop-filter: blur(10px);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 10px;
            animation: logo-rotate 8s infinite linear;
            transform-style: preserve-3d;
            transition: transform 0.7s ease;
        }

        .logo:hover {
            transform: scale(1.3);
        }

        .logo::before {
            content: 'TDP';
            font-family: 'Orbitron', sans-serif;
            font-size: 1.2rem;
            font-weight: 700;
            color: #fff8e1;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            text-shadow: 0 0 10px rgba(255, 204, 0, 0.7);
            animation: logo-rotate-text 8s infinite linear;
        }

        @keyframes logo-rotate {
            0% { transform: rotateY(0deg); }
            100% { transform: rotateY(360deg); }
        }

        @keyframes logo-rotate-text {
            0% { transform: rotateY(0deg); }
            100% { transform: rotateY(-360deg); }
        }

        .header-section h1 {
            font-family: 'Orbitron', sans-serif;
            font-size: 1.8rem;
            color: #121211ff;
            text-transform: uppercase;
            text-shadow: 0 0 15px rgba(255, 204, 0, 0.6);
            animation: text-glow 4s infinite ease-in-out;
            margin: 0;
        }

        @keyframes text-glow {
            0% { text-shadow: 0 0 10px #ffcc00, 0 0 20px rgba(255, 204, 0, 0.6); }
            50% { text-shadow: 0 0 25px #ff4d4d, 0 0 40px rgba(255, 77, 77, 0.7); }
            100% { text-shadow: 0 0 10px #ffcc00, 0 0 20px rgba(255, 204, 0, 0.6); }
        }

        .button-bar {
            display: flex;
            justify-content: space-between;
            width: 100%;
            margin-bottom: 15px;
        }

        .table-container {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(15px);
            border: 2px solid rgba(255, 204, 0, 0.3);
            border-radius: 12px;
            padding: 10px;
            width: 100%;
            box-shadow: 0 4px 15px rgba(255, 77, 77, 0.3);
            transform-style: preserve-3d;
            transition: transform 0.7s ease, box-shadow 0.7s ease;
            max-height: 400px;
            overflow-y: auto;
        }

        .table-container:hover {
            transform: translateZ(15px);
            box-shadow: 0 8px 25px rgba(255, 77, 77, 0.5);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: left;
            font-family: 'Roboto', sans-serif;
            font-size: 0.85rem;
            color: #070707ff;
        }

        th {
            background: linear-gradient(90deg, rgba(255, 204, 0, 0.4), rgba(255, 77, 77, 0.4));
            color: #080807ff;
            font-family: 'Orbitron', sans-serif;
            font-weight: 700;
        }

        tr {
            transition: all 0.5s ease;
        }

        tr:hover {
            background: rgba(255, 77, 77, 0.2);
            transform: translateZ(5px);
        }

        a {
            text-decoration: none;
            color: #171615ff;
            font-family: 'Roboto', sans-serif;
            font-weight: bold;
            transition: color 0.3s ease, transform 0.3s ease;
            transform-style: preserve-3d;
        }

        a:hover {
            color: #ff4d4d;
            text-shadow: 0 0 10px rgba(255, 77, 77, 0.6);
            transform: translateZ(5px);
        }

        .btn, .dashboard-btn {
            padding: 8px 15px;
            font-family: 'Orbitron', sans-serif;
            font-size: 0.9rem;
            font-weight: 700;
            color: #0a0a0aff;
            background: linear-gradient(90deg, rgba(255, 204, 0, 0.4), rgba(255, 77, 77, 0.4));
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 204, 0, 0.3);
            border-radius: 8px;
            cursor: pointer;
            margin: 5px;
            transition: all 0.5s ease;
            transform-style: preserve-3d;
            position: relative;
            overflow: hidden;
        }

        .btn:hover, .dashboard-btn:hover {
            background: linear-gradient(90deg, rgba(255, 204, 0, 0.6), rgba(255, 77, 77, 0.6));
            transform: scale(1.1) translateZ(10px);
            box-shadow: 0 0 15px rgba(255, 77, 77, 0.7);
        }

        .delete-btn {
            background: linear-gradient(90deg, rgba(255, 77, 77, 0.4), rgba(255, 204, 0, 0.4));
        }

        .delete-btn:hover {
            background: linear-gradient(90deg, rgba(255, 77, 77, 0.6), rgba(255, 204, 0, 0.6));
            box-shadow: 0 0 12px rgba(255, 77, 77, 0.7);
        }
    </style>
</head>
<body>
    <div class="glass-shards">
        <div class="shard" style="left: 10%; animation-delay: 0s;"></div>
        <div class="shard" style="left: 30%; animation-delay: 2s;"></div>
        <div class="shard" style="left: 50%; animation-delay: 4s;"></div>
        <div class="shard" style="left: 70%; animation-delay: 6s;"></div>
        <div class="shard" style="left: 90%; animation-delay: 8s;"></div>
    </div>
    <div class="container">
        <div class="header-section">
            <div class="logo"></div>
            <h1>User Management</h1>
        </div>

        <!-- Buttons on top -->
        <div class="button-bar">
            <a href="{{ route('admin.dashboard') }}">
                <button class="dashboard-btn">⬅ Back to Dashboard</button>
            </a>
            <a href="{{ route('admin.users.create') }}">
                <button class="dashboard-btn">➕ Add User</button>
            </a>
        </div>

        <!-- Table -->
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
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <a href="{{ route('admin.users.edit', $user->id) }}">Edit</a> |
                            <form action="{{ route('admin.users.delete', $user->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn delete-btn">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
