<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1>Async Job Dashboard</h1>

    <h3 class="mt-4">Job Logs</h3>
    <pre style="background-color: #f8f9fa; padding: 20px;">{{ $jobLogs }}</pre>

    <h3 class="mt-4">Error Logs</h3>
    <pre style="background-color: #f8f9fa; padding: 20px; color: red;">{{ $errorLogs }}</pre>
</div>
</body>
</html>
