<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; margin:0; padding:0; background:#f0f2f5; }
        .container { padding: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table, th, td { border: 1px solid #ccc; }
        th, td { padding: 10px; text-align: left; }
        th { background: #007BFF; color: white; }
        a { text-decoration: none; color: #007BFF; }
        a:hover { text-decoration: underline; }
        .btn { padding: 5px 10px; background: #28a745; color: white; border-radius: 4px; }
        .btn:hover { background: #218838; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Users List</h1>
        <a href="{{ route('admin.users.create') }}" class="btn">➕ Add User</a>
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
                            <button type="submit" class="btn" style="background:#dc3545;">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
