<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background: #f0f2f5; }
        .container { max-width: 600px; margin: 50px auto; padding: 20px; background: white; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        h2 { color: #28a745; }
        label { display: block; margin-top: 10px; font-weight: bold; }
        input, select { width: 100%; padding: 8px; margin-top: 5px; border-radius: 4px; border: 1px solid #ccc; }
        button { margin-top: 20px; padding: 10px 15px; background: #28a745; color: white; border: none; border-radius: 5px; cursor: pointer; }
        button:hover { background: #218838; }
        a { display: inline-block; margin-top: 20px; color: #007BFF; text-decoration: none; }
        a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Create New User</h2>
        <form action="{{ route('admin.users.store') }}" method="POST">
            @csrf
            <label>Name:</label>
            <input type="text" name="name" required>

            <label>Email:</label>
            <input type="email" name="email" required>

            <label>Password:</label>
            <input type="password" name="password" required>

            <label>Role:</label>
            <select name="role" required>
                <option value="admin">Admin</option>
                <option value="donor">Donor</option>
                <option value="seeker">Seeker</option>
            </select>

            <button type="submit">Create User</button>
        </form>
        <a href="{{ route('admin.users.index') }}">← Back to Users List</a>
    </div>
</body>
</html>
