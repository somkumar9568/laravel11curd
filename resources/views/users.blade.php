<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel 11 CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <span class="btn-lg">Laravel 11 CRUD</span>
                <a href="/add/users" class="btn btn-success btn-sm float-end">Add New User</a>
            </div>
            @if(session()->has('success'))  
                <div class="alert alert-success p-2">{{ session('success') }}</div>
            @endif

            @if(session()->has('fail'))  
                <div class="alert alert-danger p-2">{{ session('fail') }}</div>
            @endif

        </div>
    </div>
</body>
</html>
