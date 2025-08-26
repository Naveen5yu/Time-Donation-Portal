<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Admin Reports - Time Donation Portal</title>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body, html {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(145deg, #3b0000, green, white, orange);
            background-size: 400% 400%;
            color: #fff8e1;
            overflow-y: auto;
            overflow-x: hidden;
            animation: bg-flow 12s ease infinite;
            perspective: 1000px;
        }

        @keyframes bg-flow {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, rgba(255, 77, 77, 0.1), rgba(255, 204, 0, 0.1));
            backdrop-filter: blur(6px);
            z-index: -1;
            animation: glass-shift 8s ease infinite;
        }

        @keyframes glass-shift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            max-width: 95%;
            margin: 20px auto;
        }

        .form-section {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(15px);
            border: 2px solid rgba(255, 204, 0, 0.3);
            border-radius: 12px;
            padding: 20px;
            width: 100%;
            box-shadow: 0 4px 15px rgba(255, 77, 77, 0.3);
            transform-style: preserve-3d;
            transition: transform 0.7s ease, box-shadow 0.7s ease;
            animation: subtle-shake 4s infinite ease-in-out;
        }

        /* Subtle shake animation */
        @keyframes subtle-shake {
            0%, 100% { transform: translate(0, 0) rotate(0deg); }
            25% { transform: translate(1px, -1px) rotate(-0.3deg); }
            50% { transform: translate(-1px, 1px) rotate(0.3deg); }
            75% { transform: translate(1px, 1px) rotate(-0.3deg); }
        }

        .logo {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, rgba(255, 204, 0, 0.5), rgba(255, 77, 77, 0.5));
            backdrop-filter: blur(10px);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 10px;
            animation: logo-rotate 8s infinite linear, subtle-shake 5s infinite ease-in-out;
            transform-style: preserve-3d;
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

        @keyframes logo-rotate {
            0% { transform: rotateY(0deg); }
            100% { transform: rotateY(360deg); }
        }

        h1 {
            font-family: 'Orbitron', sans-serif;
            font-size: 1.8rem;
            color: #111111ff;
            text-transform: uppercase;
            text-shadow: 0 0 15px rgba(255, 204, 0, 0.6);
            animation: text-glow 4s infinite ease-in-out;
            text-align: center;
            margin: 0 0 15px;
        }

        @keyframes text-glow {
            0% { text-shadow: 0 0 10px #ffcc00, 0 0 20px rgba(255, 204, 0, 0.6); }
            50% { text-shadow: 0 0 25px #ff4d4d, 0 0 40px rgba(255, 77, 77, 0.7); }
            100% { text-shadow: 0 0 10px #ffcc00, 0 0 20px rgba(255, 204, 0, 0.6); }
        }

        a {
            display: block;
            margin: 10px auto;
            padding: 10px;
            font-family: 'Orbitron', sans-serif;
            font-size: 0.9rem;
            font-weight: bold;
            color: #10100fff;
            background: linear-gradient(90deg, rgba(255, 204, 0, 0.4), rgba(255, 77, 77, 0.4));
            border: 1px solid rgba(255, 204, 0, 0.3);
            border-radius: 8px;
            text-decoration: none;
            text-align: center;
            transition: all 0.5s ease;
        }

        a:hover {
            background: linear-gradient(90deg, rgba(255, 204, 0, 0.6), rgba(255, 77, 77, 0.6));
            color: #ffcc00;
            box-shadow: 0 0 12px rgba(255, 77, 77, 0.6);
        }

        /* Table styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            border: 2px solid rgba(255, 204, 0, 0.3);
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
        }

        th, td {
            padding: 12px 15px;
            border: 1px solid rgba(255, 204, 0, 0.3);
            text-align: center;
            color: #0f0f0eff;
        }

        th {
            background: linear-gradient(90deg, rgba(255, 77, 77, 0.4), rgba(255, 204, 0, 0.4));
            font-family: 'Orbitron', sans-serif;
            font-size: 1rem;
            font-weight: 700;
            text-transform: uppercase;
            text-shadow: 0 0 10px rgba(255, 204, 0, 0.6);
        }

        td {
            background: rgba(255, 255, 255, 0.05);
        }

        /* No data message */
        .no-data {
            margin-top: 20px;
            text-align: center;
            font-style: italic;
            color: #131212ff;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-section">
            <div class="logo"></div>
            <h1>Admin Reports</h1>
            <a href="{{ route('admin.reports.exportPDF') }}" target="_blank" class="export-btn">Export as PDF</a>
            <a href="{{ route('admin.dashboard') }}" class="export-btn">Go to Dashboard</a>

            @if($reports->count() > 0)
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>User</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reports as $report)
                    <tr>
                        <td>{{ $report->id }}</td>
                        <td>{{ $report->title }}</td>
                        <td>{{ $report->user->name ?? 'N/A' }}</td>
                        <td>{{ $report->created_at->format('d-m-Y H:i') }}</td>
                        <td><a href="{{ route('admin.reports.show', $report->id) }}">Show</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <p class="no-data">No reports found.</p>
            @endif
        </div>
    </div>
</body>
</html>
