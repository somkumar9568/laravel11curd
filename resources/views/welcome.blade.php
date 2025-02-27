<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        #updateForm {
            display: none;
        }
        .card {
            margin-top: 50px;
        }
        .dropdown-menu {
            right: 0;
            left: auto;
        }
        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="card w-75 mx-auto">
            <div class="card-header">
                <div>
                    <h3>Welcome, {{ $user->name }}</h3>
                    <p>You're logged in as {{ $user->email }}</p>
                </div>
                <div class="dropdown text-end">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        Profile Options
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li>
                            <button class="dropdown-item" id="showUpdateFormBtn">Update Profile</button>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card-body">
                <div id="updateForm" class="mt-3">
                    <form method="POST" action="{{ route('updateProfile') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Update Profile</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('showUpdateFormBtn').addEventListener('click', function() {
            const updateForm = document.getElementById('updateForm');
            if (updateForm.style.display === 'none' || updateForm.style.display === '') {
                updateForm.style.display = 'block';
                this.textContent = 'Hide Profile Update'; 
            } else {
                updateForm.style.display = 'none';
                this.textContent = 'Update Profile';  
            }
        });
    </script>
</body>
</html>
