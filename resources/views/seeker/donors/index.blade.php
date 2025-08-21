<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donors</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #1f1c2c, #928DAB);
            margin: 0;
            padding: 0;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .container {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(15px);
            padding: 40px;
            border-radius: 18px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
            width: 420px;
            text-align: center;
            animation: fadeIn 1s ease-in-out;
        }
        h1 {
            font-size: 28px;
            margin-bottom: 25px;
            color: #00f2fe;
        }
        p {
            font-size: 16px;
            color: #ddd;
        }
        ul {
            list-style: none;
            padding: 0;
        }
        ul li {
            margin: 12px 0;
        }
        ul li a {
            text-decoration: none;
            font-size: 18px;
            color: #fff;
            background: linear-gradient(45deg, #ff512f, #dd2476);
            padding: 12px 18px;
            border-radius: 8px;
            display: inline-block;
            transition: 0.3s;
        }
        ul li a:hover {
            background: linear-gradient(45deg, #24c6dc, #514a9d);
            transform: translateY(-3px);
        }
        .btn {
            display: inline-block;
            margin-top: 25px;
            padding: 12px 20px;
            font-size: 16px;
            text-decoration: none;
            color: #fff;
            background: linear-gradient(90deg, #11998e, #38ef7d);
            border-radius: 8px;
            transition: 0.3s;
        }
        .btn:hover {
            background: linear-gradient(90deg, #38ef7d, #11998e);
            transform: scale(1.05);
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(15px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Available Donors</h1>

        @if($donors->isEmpty())
            <p>No donors available at the moment.</p>
        @else
            <ul>
                @foreach($donors as $donor)
                    <li>
                        <a href="{{ route('seeker.donors.show', $donor->id) }}">
                            {{ $donor->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        @endif

        <a href="{{ route('seeker.dashboard') }}" class="btn">⬅ Back to Dashboard</a>
    </div>
</body>
</html>
