<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donor Details</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #141e30, #243b55);
            color: #fff;
            text-align: center;
        }

        .container {
            margin: 80px auto;
            padding: 30px;
            background: rgba(255, 255, 255, 0.08);
            border-radius: 12px;
            max-width: 500px;
            box-shadow: 0 0 20px rgba(0, 255, 200, 0.3);
            backdrop-filter: blur(8px);
        }

        h1 {
            font-size: 28px;
            margin-bottom: 20px;
            color: #00ffc8;
        }

        p {
            font-size: 18px;
            margin: 12px 0;
            color: #ddd;
        }

        strong {
            color: #00e6a8;
        }

        a {
            display: inline-block;
            margin-top: 25px;
            padding: 12px 24px;
            background: #00ffc8;
            color: #141e30;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
            transition: 0.3s;
        }

        a:hover {
            background: #00cc99;
            transform: scale(1.05);
        }

    </style>
</head>
<body>
    <div class="container">
        <h1>Donor Profile</h1>
        <p><strong>Name:</strong> {{ $donor->name }}</p>
        <p><strong>Email:</strong> {{ $donor->email }}</p>
        <p><strong>Role:</strong> {{ ucfirst($donor->role) }}</p>

        <a href="{{ route('seeker.donors.index') }}">⬅ Back to Donors</a>
    </div>
</body>
</html>
