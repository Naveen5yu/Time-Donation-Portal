<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Seeker Requests - Time Donation Portal</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #e6f0fa;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: 100vh;
        }

        .container {
            max-width: 1000px;
            margin: 50px auto;
            background: #e0e8f0;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 5px 5px 15px #d3dee9, -5px -5px 15px #ffffff;
            width: 90%;
        }

        .logo {
            width: 65px;
            height: 65px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            background: linear-gradient(135deg, #e0e8f0, #ffffff);
            box-shadow: inset 2px 2px 6px #d3dee9, inset -2px -2px 6px #ffffff;
        }

        .logo::before {
            content: 'TDP';
            font-family: 'Roboto', sans-serif;
            font-size: 1.2rem;
            font-weight: 700;
            color: #2c3e50;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            font-size: 2.3rem;
            margin-bottom: 35px;
            color: #2c3e50;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        }

        .card {
            background: #f0f4f8;
            border: 1px solid #d3dee9;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 5px 5px 15px #d3dee9, -5px -5px 15px #ffffff;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-6px);
            box-shadow: 3px 3px 10px #d3dee9, -3px -3px 10px #ffffff;
        }

        .card h5 {
            font-weight: 700;
            font-size: 1.3rem;
            margin-bottom: 12px;
            color: #34495e;
        }

        .card p {
            margin-bottom: 15px;
            color: #34495e;
        }

        .btn-action {
            border-radius: 8px;
            padding: 10px 18px;
            font-weight: 600;
            font-family: 'Roboto', sans-serif;
            border: none;
            cursor: pointer;
            margin-right: 10px;
            transition: all 0.3s ease;
            box-shadow: 2px 2px 6px #d3dee9, -2px -2px 6px #ffffff;
        }

        .btn-accept {
            background: linear-gradient(to right, #00c6ff, #0072ff);
            color: #fff;
        }

        .btn-accept:hover {
            background: linear-gradient(to right, #00b5e6, #0066cc);
            transform: scale(1.05);
            box-shadow: 1px 1px 4px #d3dee9, -1px -1px 4px #ffffff;
        }

        .btn-reject {
            background: linear-gradient(to right, #ff4d4d, #cc0000);
            color: #fff;
        }

        .btn-reject:hover {
            background: linear-gradient(to right, #e60000, #990000);
            transform: scale(1.05);
            box-shadow: 1px 1px 4px #d3dee9, -1px -1px 4px #ffffff;
        }

        .btn-back {
            display: inline-block;
            margin-top: 25px;
            padding: 12px 24px;
            background: linear-gradient(to right, #00c6ff, #0072ff);
            border-radius: 10px;
            text-decoration: none;
            font-weight: 700;
            font-family: 'Roboto', sans-serif;
            color: #fff;
            box-shadow: 2px 2px 6px #d3dee9, -2px -2px 6px #ffffff;
            transition: all 0.3s ease;
        }

        .btn-back:hover {
            background: linear-gradient(to right, #00b5e6, #0066cc);
            transform: scale(1.05);
            box-shadow: 1px 1px 4px #d3dee9, -1px -1px 4px #ffffff;
        }

        .empty-msg {
            text-align: center;
            font-size: 1.2rem;
            margin-top: 30px;
            color: #34495e;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
        }

        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 2px 2px 6px #d3dee9, -2px -2px 6px #ffffff;
        }

        .alert-success {
            background: linear-gradient(to right, #28a745, #218838);
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo"></div>
        <h1>Seeker Requests</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="text-center mt-4">
            <a href="{{ route('donor.dashboard') }}" class="btn-back">⬅ Back to Dashboard</a>
        </div>

        @if($requests->isEmpty())
            <p class="empty-msg">No pending requests. All clear for now.</p>
        @else
            <div class="row">
                @foreach($requests as $request)
                    <div class="col-md-6">
                        <div class="card">
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
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</body>
</html>