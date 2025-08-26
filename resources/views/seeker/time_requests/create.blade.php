<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Create Time Request - Time Donation Portal</title>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(135deg, #3b0000, #817774ff, #0d7b93ff, #083a1aff, #9400d3);
            color: #fff8e1;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow-x: hidden;
        }

        .card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(15px);
            border-radius: 15px;
            padding: 30px;
            width: 400px;
            box-shadow: 0 10px 25px rgba(255, 77, 77, 0.4);
            border: 1px solid rgba(255, 204, 0, 0.3);
            position: relative;
        }

        .card::before {
            content: '';
            position: absolute;
            top: -20%;
            left: -20%;
            width: 140%;
            height: 140%;
            background: radial-gradient(circle, rgba(255, 69, 0, 0.1) 0%, transparent 70%);
            z-index: -1;
        }

        .logo {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, rgba(255, 204, 0, 0.6), rgba(255, 77, 77, 0.6), rgba(148, 0, 211, 0.6));
            backdrop-filter: blur(10px);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            box-shadow: 0 0 15px rgba(255, 204, 0, 0.5);
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
            margin-bottom: 20px;
            font-size: 26px;
            color: #0e0e0eff;
            text-shadow: 0 0 8px #ff4500, 0 0 15px #9400d3;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        label {
            display: block;
            margin-bottom: 15px;
            font-size: 14px;
            font-weight: bold;
            color: #fff8e1;
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            border-radius: 8px;
            border: none;
            outline: none;
            margin-top: 6px;
            background: rgba(255, 255, 255, 0.2);
            color: #fff;
            backdrop-filter: blur(5px);
        }

        input:focus, textarea:focus {
            border: 1px solid rgba(255, 204, 0, 0.6);
            box-shadow: 0 0 8px rgba(255, 77, 77, 0.6);
        }

        button {
            width: 100%;
            padding: 12px;
            background: linear-gradient(90deg, rgba(255, 204, 0, 0.5), rgba(255, 77, 77, 0.5), rgba(148, 0, 211, 0.5));
            border: 1px solid rgba(255, 204, 0, 0.3);
            border-radius: 8px;
            color: #1f1e1dff;
            font-size: 16px;
            cursor: pointer;
            margin-top: 15px;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }

        button:hover {
            background: linear-gradient(90deg, rgba(255, 204, 0, 0.7), rgba(255, 77, 77, 0.7), rgba(148, 0, 211, 0.7));
            transform: translateY(-2px);
            box-shadow: 0 0 12px rgba(255, 77, 77, 0.7);
        }

        a {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #1f1e1dff;
            text-decoration: none;
            transition: all 0.3s ease;
            padding: 8px 12px;
            background: linear-gradient(90deg, rgba(255, 204, 0, 0.4), rgba(255, 77, 77, 0.4));
            border-radius: 6px;
            backdrop-filter: blur(10px);
        }

        a:hover {
            color: #fff8e1;
            background: linear-gradient(90deg, rgba(255, 204, 0, 0.6), rgba(255, 77, 77, 0.6));
            box-shadow: 0 0 10px rgba(255, 77, 77, 0.5);
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
            background: linear-gradient(180deg, rgba(255, 204, 0, 0.5), rgba(255, 77, 77, 0.5), rgba(148, 0, 211, 0.5));
            border-radius: 4px;
        }

        body::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(180deg, rgba(255, 204, 0, 0.7), rgba(255, 77, 77, 0.7), rgba(148, 0, 211, 0.7));
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="logo"></div>
        <h1>Create Time Request</h1>
        <form method="POST" action="{{ route('seeker.time_requests.store') }}">
            @csrf
            <label>Title:
                <input type="text" name="title" required>
            </label>
            <label>Description:
                <textarea name="description" rows="4" required></textarea>
            </label>
            <label>Requested Time:
                <input type="datetime-local" name="requested_time" required>
            </label>
            <button type="submit">Submit</button>
        </form>
        <a href="{{ route('seeker.time_requests.index') }}">Back to Requests</a>
    </div>
</body>
</html>