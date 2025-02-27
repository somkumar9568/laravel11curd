<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel 11 CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    {{-- Here we will pass a list of all users --}}
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

            <div class="card-body">
                <table class="table table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>S/N</th>
                            <th>Full Name</th>
                            <th>Phone Number</th>
                            <th>Email</th>
                            <th>Registration Date</th>
                            <th>Last Updated</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Check if there are users --}}
                        @if (count($all_users) > 0)
                            @foreach ($all_users as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->phone_number }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->updated_at }}</td>
                                    <td>
                                        <a href="/edit/{{$item->id}}" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="/delete/{{$item->id}}" class="btn btn-danger btn-sm" 
                                           onclick="return confirm('Are you sure you want to delete this user?');">
                                           Delete
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="7" class="text-center">No users found</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
