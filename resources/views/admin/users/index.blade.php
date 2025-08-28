<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>User Management - Time Donation Portal</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body, html {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            font-family: 'Roboto', sans-serif;
            background-color: #e6f0fa;
            color: #333;
            overflow-y: auto;
            overflow-x: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            background: #e0e8f0;
            border-radius: 20px;
            padding: 30px;
            width: 600px;
            text-align: center;
            box-shadow: 5px 5px 15px #d3dee9, -5px -5px 15px #ffffff; /* Neumorphic shadow */
        }

        .header-section {
            margin-bottom: 20px;
        }

        .header-section h1 {
            font-size: 1.8rem;
            color: #2c3e50;
            margin: 0;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        }

        .button-bar {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .dashboard-btn {
            padding: 10px 20px;
            border: none;
            border-radius: 20px;
            background: linear-gradient(to right, #00c6ff, #0072ff);
            box-shadow: 5px 5px 15px #d3dee9, -5px -5px 15px #ffffff; /* Neumorphic shadow */
            color: white;
            font-size: 1rem;
            cursor: pointer;
            transition: box-shadow 0.3s, transform 0.3s;
        }

        .dashboard-btn:hover {
            box-shadow: 3px 3px 10px #d3dee9, -3px -3px 10px #ffffff;
            transform: translateY(-2px);
        }

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
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 5px 5px 15px #d3dee9, -5px -5px 15px #ffffff; /* Neumorphic shadow */
        }

        th, td {
            padding: 10px;
            text-align: left;
            color: #2c3e50;
            white-space: nowrap;
            background: linear-gradient(145deg, #e0e8f0, #ffffff);
            box-shadow: inset 2px 2px 5px #d3dee9, inset -2px -2px 5px #ffffff; /* Inner neumorphic effect */
        }

        th {
            color: #34495e;
            font-weight: bold;
        }

        tr {
            border-bottom: 1px solid #e0e8f0;
            transition: transform 0.3s;
        }

        tr:hover {
            transform: translateZ(5px);
            box-shadow: 3px 3px 10px #d3dee9, -3px -3px 10px #ffffff;
        }

        a {
            color: #0072ff;
            text-decoration: none;
            margin-right: 10px;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
        }

        a:hover {
            text-decoration: underline;
            color: #0056b3;
        }

        .delete-btn {
            padding: 5px 10px;
            border: none;
            border-radius: 20px;
            background: linear-gradient(to right, #ff4d4d, #cc0000);
            box-shadow: 5px 5px 15px #d3dee9, -5px -5px 15px #ffffff; /* Neumorphic shadow */
            color: white;
            font-size: 0.9rem;
            cursor: pointer;
            transition: box-shadow 0.3s, transform 0.3s;
        }

        .delete-btn:hover {
            box-shadow: 3px 3px 10px #d3dee9, -3px -3px 10px #ffffff;
            transform: translateY(-2px);
            background: linear-gradient(to right, #e60000, #990000);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header-section">
            <h1>User Management</h1>
        </div>

        <div class="button-bar">
            <a href="{{ route('admin.dashboard') }}">
                <button class="dashboard-btn">⬅ Back to Dashboard</button>
            </a>
            <a href="{{ route('admin.users.create') }}">
                <button class="dashboard-btn">➕ Add User</button>
            </a>
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
                    <tr>
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
        </div>
    </div>
</body>
</html>