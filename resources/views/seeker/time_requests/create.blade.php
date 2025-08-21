<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Time Request</title>
    <style>
        body {
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #141e30, #243b55);
            color: #fff;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(15px);
            border-radius: 15px;
            padding: 30px;
            width: 400px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.4);
            animation: fadeIn 0.6s ease-in-out;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 26px;
            color: #00c6ff;
        }

        label {
            display: block;
            margin-bottom: 15px;
            font-size: 14px;
            font-weight: bold;
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
        }

        input:focus, textarea:focus {
            border: 1px solid #00c6ff;
            box-shadow: 0 0 8px #00c6ff;
        }

        button {
            width: 100%;
            padding: 12px;
            background: linear-gradient(90deg, #00c6ff, #0072ff);
            border: none;
            border-radius: 8px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            margin-top: 15px;
            transition: 0.3s;
        }

        button:hover {
            background: linear-gradient(90deg, #0072ff, #00c6ff);
            transform: translateY(-2px);
        }

        a {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #aaa;
            text-decoration: none;
            transition: 0.3s;
        }

        a:hover {
            color: #00c6ff;
        }

        @keyframes fadeIn {
            from {opacity: 0; transform: translateY(20px);}
            to {opacity: 1; transform: translateY(0);}
        }
    </style>
</head>
<body>
    <div class="card">
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
        <a href="{{ route('seeker.time_requests.index') }}">⬅ Back to Requests</a>
    </div>
</body>
</html>
