<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Reports</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background: #f0f2f5; }
        h1 { color: #333; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: left; }
        th { background: #007BFF; color: #fff; }
        a { color: #007BFF; text-decoration: none; }
        a:hover { text-decoration: underline; }
        .no-data { margin-top: 20px; font-style: italic; color: #555; }
        .export-btn { margin-top: 10px; display: inline-block; padding: 8px 12px; background: #28a745; color: #fff; border-radius: 4px; }
        .export-btn:hover { background: #218838; }
    </style>
</head>
<body>

<h1>All Reports</h1>

<a href="{{ route('admin.reports.exportPDF') }}" target="_blank" class="export-btn">Export as PDF</a>

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

</body>
</html>
