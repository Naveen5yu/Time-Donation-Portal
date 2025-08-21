<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Time Requests</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #1a1f2b, #2a2f45);
            color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
        header {
            background: #121826;
            padding: 20px;
            text-align: center;
            border-bottom: 2px solid #3a3f5a;
        }
        header h1 {
            margin: 0;
            font-size: 28px;
            color: #00c6ff;
            text-shadow: 0px 0px 8px rgba(0, 198, 255, 0.6);
        }
        .container {
            max-width: 900px;
            margin: 30px auto;
            padding: 20px;
        }
        .btn {
            display: inline-block;
            padding: 12px 20px;
            margin-bottom: 20px;
            background: #00c6ff;
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            border-radius: 8px;
            transition: 0.3s ease;
        }
        .btn:hover {
            background: #0088cc;
            box-shadow: 0px 0px 12px rgba(0, 198, 255, 0.7);
        }
        .card {
            background: #1f2536;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 15px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.3);
            transition: transform 0.2s;
        }
        .card:hover {
            transform: translateY(-3px);
            box-shadow: 0px 0px 15px rgba(0, 198, 255, 0.3);
        }
        .card h3 {
            margin: 0 0 8px;
            font-size: 20px;
            color: #00c6ff;
        }
        .status {
            display: inline-block;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: bold;
        }
        .status.pending {
            background: #ffb74d;
            color: #222;
        }
        .status.approved {
            background: #4caf50;
            color: #fff;
        }
        .status.rejected {
            background: #f44336;
            color: #fff;
        }
        footer {
            margin-top: 30px;
            text-align: center;
        }
        footer a {
            color: #00c6ff;
            text-decoration: none;
            font-weight: bold;
            transition: 0.3s;
        }
        footer a:hover {
            color: #0088cc;
            text-shadow: 0px 0px 8px rgba(0, 198, 255, 0.6);
        }
    </style>
</head>
<body>
    <header>
        <h1>📅 My Time Requests</h1>
    </header>

    <div class="container">
        <a href="{{ route('seeker.time_requests.create') }}" class="btn">+ Create New Request</a>

        @if($requests->isEmpty())
            <p>No time requests yet. ⏳</p>
        @else
            @foreach($requests as $req)
                <div class="card">
                    <h3>{{ $req->title }}</h3>
                    <p>Status: 
                        <span class="status 
                            {{ strtolower($req->status) }}">
                            {{ ucfirst($req->status) }}
                        </span>
                    </p>
                </div>
            @endforeach
        @endif

        <footer>
            <a href="{{ route('seeker.dashboard') }}">⬅ Back to Dashboard</a>
        </footer>
    </div>
</body>
</html>
