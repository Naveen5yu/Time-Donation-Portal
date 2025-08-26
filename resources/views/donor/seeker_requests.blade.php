<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <title>Seeker Requests - Time Donation Portal</title>
  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Roboto', sans-serif;
      background: linear-gradient(135deg, #3b0000, #6b0f0f, #1ad417ff, #00ff40ff);
      color: #fff8e1;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 1000px;
      margin: 50px auto;
      background: rgba(255, 255, 255, 0.05);
      border-radius: 15px;
      padding: 30px;
      box-shadow: 0px 8px 25px rgba(255, 77, 77, 0.4);
      backdrop-filter: blur(12px);
    }

    .logo {
      width: 65px;
      height: 65px;
      background: linear-gradient(135deg, rgba(255, 204, 0, 0.5), rgba(255, 77, 77, 0.5));
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 15px;
      backdrop-filter: blur(10px);
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
    }

    h1 {
      text-align: center;
      font-size: 2.3rem;
      margin-bottom: 35px;
      color: #0e0e0e;
      text-shadow: 0 0 10px #ffcc00, 0 0 20px #ff4d4d;
      font-family: 'Orbitron', sans-serif;
    }

    .card {
      background: rgba(255, 255, 255, 0.1);
      border: 1px solid rgba(255, 204, 0, 0.3);
      border-radius: 12px;
      padding: 20px;
      margin-bottom: 20px;
      backdrop-filter: blur(10px);
      transition: all 0.3s ease-in-out;
      box-shadow: 0px 6px 20px rgba(255, 77, 77, 0.3);
    }

    .card:hover {
      transform: translateY(-6px);
      background: rgba(255, 255, 255, 0.18);
      box-shadow: 0px 8px 25px rgba(255, 77, 77, 0.5);
    }

    .card h5 {
      font-weight: 700;
      font-size: 1.3rem;
      margin-bottom: 12px;
      color: #fff8e1;
    }

    .card p {
      margin-bottom: 15px;
      color: #ffecd2;
    }

    .btn-action {
      border-radius: 8px;
      padding: 10px 18px;
      font-weight: 600;
      font-family: 'Orbitron', sans-serif;
      border: none;
      cursor: pointer;
      margin-right: 10px;
      transition: all 0.3s ease;
    }

    .btn-accept {
      background: linear-gradient(135deg, rgba(0, 191, 255, 0.7), rgba(0, 122, 255, 0.9));
      color: #fff;
      box-shadow: 0 0 12px rgba(0,122,255,0.6);
    }

    .btn-accept:hover {
      background: linear-gradient(135deg, rgba(0, 191, 255, 1), rgba(0, 122, 255, 1));
      box-shadow: 0 0 18px rgba(0,122,255,1);
      transform: scale(1.05);
    }

    .btn-reject {
      background: linear-gradient(135deg, rgba(255, 77, 77, 0.8), rgba(255, 30, 30, 0.9));
      color: #fff;
      box-shadow: 0 0 12px rgba(255,77,77,0.6);
    }

    .btn-reject:hover {
      background: linear-gradient(135deg, rgba(255, 77, 77, 1), rgba(200, 0, 0, 1));
      box-shadow: 0 0 18px rgba(255,0,0,1);
      transform: scale(1.05);
    }

    .btn-back {
      display: inline-block;
      margin-top: 25px;
      padding: 12px 24px;
      background: linear-gradient(90deg, rgba(255, 204, 0, 0.4), rgba(255, 77, 77, 0.4));
      border-radius: 10px;
      text-decoration: none;
      font-weight: 700;
      font-family: 'Orbitron', sans-serif;
      color: #1f1e1d;
      backdrop-filter: blur(8px);
      transition: all 0.3s ease;
      border: 1px solid rgba(255, 204, 0, 0.3);
    }

    .btn-back:hover {
      background: linear-gradient(90deg, rgba(255, 204, 0, 0.6), rgba(255, 77, 77, 0.6));
      transform: scale(1.05);
      box-shadow: 0 0 15px rgba(255, 77, 77, 0.7);
    }

    .empty-msg {
      text-align: center;
      font-size: 1.2rem;
      margin-top: 30px;
      color: #100f0f;
      font-style: italic;
    }

    /* Custom scrollbar */
    body::-webkit-scrollbar {
      width: 8px;
    }
    body::-webkit-scrollbar-track {
      background: rgba(255, 255, 255, 0.1);
      border-radius: 4px;
    }
    body::-webkit-scrollbar-thumb {
      background: linear-gradient(180deg, rgba(255, 204, 0, 0.5), rgba(255, 77, 77, 0.5));
      border-radius: 4px;
    }
    body::-webkit-scrollbar-thumb:hover {
      background: linear-gradient(180deg, rgba(255, 204, 0, 0.7), rgba(255, 77, 77, 0.7));
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="logo"></div>
    <h1>Seeker Requests</h1>

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
              <p><strong>Requested Time:</strong> {{ $request->requested_time }}</p>
              <button class="btn-action btn-accept">Accept</button>
              <button class="btn-action btn-reject">Reject</button>
            </div>
          </div>
        @endforeach
      </div>
    @endif

    
  </div>
</body>
</html>
