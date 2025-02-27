<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h1>Edit User</h1>
                @if(session()->has('fail'))
                    <div class="alert alert-danger">{{ session('fail') }}</div>
                @endif
            </div>   
            <div class="card-body">
                <form action="{{ route('EditUser') }}" method="post">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ $user->id ?? '' }}">
                   
                    <div class="mb-3">
                        <label for="full_name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" name="full_name" id="full_name" 
                               placeholder="Enter full name" value="{{ old('full_name', $user->name ?? '') }}">
                        @error('full_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="phone_number" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" name="phone_number" id="phone_number" 
                               placeholder="Enter phone number" value="{{ old('phone_number', $user->phone_number ?? '') }}">
                        @error('phone_number')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email" 
                               placeholder="Enter email" value="{{ old('email', $user->email ?? '') }}">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="password" 
                               placeholder="Enter password">
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" 
                               placeholder="Confirm password">
                    </div>

                    <button type="submit" class="btn btn-primary">Update User</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
