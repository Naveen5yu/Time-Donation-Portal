<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Admin Reports - Time Donation Portal</title>
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
            width: 95%;
            max-width: 900px; /* Adjusted for better table visibility */
            text-align: center;
            box-shadow: 5px 5px 15px #d3dee9, -5px -5px 15px #ffffff; /* Neumorphic shadow */
        }

        .form-section {
            margin-bottom: 20px;
        }

        .form-section h1 {
            font-size: 1.8rem;
            color: #2c3e50;
            margin: 0 0 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        }

        a {
            display: block;
            margin: 10px auto;
            padding: 10px;
            font-family: 'Roboto', sans-serif;
            font-size: 0.9rem;
            font-weight: bold;
            color: white;
            background: linear-gradient(to right, #00c6ff, #0072ff);
            border: none;
            border-radius: 20px;
            text-decoration: none;
            text-align: center;
            box-shadow: 5px 5px 15px #d3dee9, -5px -5px 15px #ffffff; /* Neumorphic shadow */
            transition: box-shadow 0.3s, transform 0.3s;
            width: 48%; /* Adjusted for two buttons side by side */
            max-width: 200px;
        }

        a:hover {
            box-shadow: 3px 3px 10px #d3dee9, -3px -3px 10px #ffffff;
            transform: translateY(-2px);
            background: linear-gradient(to right, #00b5e6, #0066cc);
        }

        .button-bar {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .table-container {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            min-width: 600px; /* Minimum width to ensure all columns fit */
            border-collapse: collapse;
            background: #f0f4f8;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 5px 5px 15px #d3dee9, -5px -5px 15px #ffffff; /* Neumorphic shadow */
        }

        th, td {
            padding: 12px 15px;
            text-align: center;
            color: #2c3e50;
            white-space: nowrap;
            background: linear-gradient(145deg, #e0e8f0, #ffffff);
            box-shadow: inset 2px 2px 5px #d3dee9, inset -2px -2px 5px #ffffff; /* Inner neumorphic effect */
        }

        th {
            color: #34495e;
            font-weight: bold;
            text-transform: uppercase;
        }

        tr {
            border-bottom: 1px solid #e0e8f0;
            transition: transform 0.3s;
        }

        tr:hover {
            transform: translateZ(5px);
            box-shadow: 3px 3px 10px #d3dee9, -3px -3px 10px #ffffff;
        }

        .no-data {
            margin-top: 20px;
            text-align: center;
            font-style: italic;
            color: #34495e;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-section">
            <h1>Admin Reports</h1>
            <div class="button-bar">
                <a href="{{ route('admin.reports.exportPDF') }}" target="_blank">Export as PDF</a>
                <a href="{{ route('admin.dashboard') }}">Go to Dashboard</a>
            </div>

            <div class="table-container">
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
    </div>
</body>
</html>