<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Edit User - Time Donation Portal</title>
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
            width: 400px;
            text-align: center;
            box-shadow: 5px 5px 15px #d3dee9, -5px -5px 15px #ffffff; /* Neumorphic shadow */
        }

        .form-section {
            margin-bottom: 20px;
        }

        .form-section h2 {
            font-size: 1.8rem;
            color: #2c3e50;
            margin: 0 0 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        label {
            text-align: left;
            color: #34495e;
            font-weight: bold;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
        }

        input, select {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 10px;
            background: linear-gradient(145deg, #e0e8f0, #ffffff);
            box-shadow: inset 4px 4px 8px #d3dee9, inset -4px -4px 8px #ffffff; /* Inner neumorphic effect */
            color: #333;
            font-size: 1rem;
            transition: box-shadow 0.3s;
        }

        input:focus, select:focus {
            box-shadow: inset 2px 2px 4px #d3dee9, inset -2px -2px 4px #ffffff, 0 0 10px rgba(0, 114, 255, 0.3);
            outline: none;
        }

        button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 20px;
            background: linear-gradient(to right, #00c6ff, #0072ff);
            box-shadow: 5px 5px 15px #d3dee9, -5px -5px 15px #ffffff; /* Neumorphic button shadow */
            color: white;
            font-size: 1.1rem;
            cursor: pointer;
            transition: box-shadow 0.3s, transform 0.3s;
        }

        button:hover {
            background: linear-gradient(to right, #00b5e6, #0066cc);
            box-shadow: 3px 3px 10px #d3dee9, -3px -3px 10px #ffffff;
            transform: translateY(-2px);
        }

        a {
            color: #0072ff;
            text-decoration: none;
            margin-top: 10px;
            display: inline-block;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
        }

        a:hover {
            text-decoration: underline;
            color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-section">
            <h2>Edit User</h2>
            <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <label>Name:</label>
                <input type="text" name="name" value="{{ $user->name }}" required>
                <label>Email:</label>
                <input type="email" name="email" value="{{ $user->email }}" required>
                <label>Role:</label>
                <select name="role" required>
                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="donor" {{ $user->role == 'donor' ? 'selected' : '' }}>Donor</option>
                    <option value="seeker" {{ $user->role == 'seeker' ? 'selected' : '' }}>Seeker</option>
                </select>
                <button type="submit">Update User</button>
            </form>
            <a href="{{ route('admin.users.index') }}">Back to Users List</a>
        </div>
    </div>
</body>
</html>