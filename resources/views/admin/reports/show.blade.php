<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Details</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background: #f0f2f5; }
        h1, h2 { color: #333; }
        p { font-size: 1rem; color: #555; }
        a { color: #007BFF; text-decoration: none; }
        a:hover { text-decoration: underline; }
        .card { background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); margin-top: 20px; }
    </style>
</head>
<body>

<h1>Report Details</h1>
<a href="{{ route('admin.reports.index') }}">← Back to Reports</a>

<div class="card">
    <h2>{{ $report->title }}</h2>
    <p><strong>User:</strong> {{ $report->user->name ?? 'N/A' }}</p>
    <p><strong>Created At:</strong> {{ $report->created_at->format('d-m-Y H:i') }}</p>
    <p><strong>Content:</strong></p>
    <p>{{ $report->content ?? 'No content available.' }}</p>
</div>

</body>
</html>
