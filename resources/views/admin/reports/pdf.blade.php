<!DOCTYPE html>
<html>
<head>
    <title>Reports PDF</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #333; padding: 5px; text-align: left; }
        th { background: #007BFF; color: white; }
    </style>
</head>
<body>
    <h2>All Reports</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>User</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reports as $report)
            <tr>
                <td>{{ $report->id }}</td>
                <td>{{ $report->title }}</td>
                <td>{{ $report->user->name ?? 'N/A' }}</td>
                <td>{{ $report->created_at->format('d-m-Y H:i') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
