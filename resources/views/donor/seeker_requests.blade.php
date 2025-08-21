<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seeker Requests</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500&family=Roboto:wght@300;500&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
            color: #fff;
            min-height: 100vh;
        }

        .container {
            margin-top: 50px;
        }

        h1 {
            font-family: 'Orbitron', sans-serif;
            font-size: 2.5rem;
            text-align: center;
            margin-bottom: 30px;
            color: #00f7ff;
            text-shadow: 0px 0px 10px #00f7ff, 0px 0px 20px #00f7ff;
        }

        .card {
            background: rgba(255, 255, 255, 0.08);
            border: none;
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 20px;
            transition: 0.3s ease-in-out;
        }

        .card:hover {
            transform: scale(1.05);
            background: rgba(0, 247, 255, 0.15);
            box-shadow: 0px 0px 15px rgba(0, 247, 255, 0.6);
        }

        .btn-back {
            background: #00f7ff;
            border: none;
            color: #000;
            font-weight: bold;
            border-radius: 50px;
            padding: 10px 20px;
            transition: 0.3s ease-in-out;
        }

        .btn-back:hover {
            background: #00c4cc;
            transform: scale(1.1);
        }

        .empty-msg {
            text-align: center;
            font-size: 1.2rem;
            margin-top: 30px;
            color: #bbb;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>⚡ Seeker Requests ⚡</h1>

    @if($requests->isEmpty())
        <p class="empty-msg">No pending requests. All clear for now 🚀</p>
    @else
        <div class="row">
            @foreach($requests as $request)
                <div class="col-md-6">
                    <div class="card">
                        <h5 class="text-info">{{ $request->title }}</h5>
                        <p><strong>Requested Time:</strong> {{ $request->requested_time }}</p>
                        <button class="btn btn-success btn-sm">Accept</button>
                        <button class="btn btn-danger btn-sm">Reject</button>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    <div class="text-center mt-4">
        <a href="{{ route('donor.dashboard') }}" class="btn btn-back">⬅ Back to Dashboard</a>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
