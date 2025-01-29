{{-- resources/views/user/dashboard.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - {{ auth()->user()->name }}</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 30px;
        }
        .card-header {
            background-color: #007bff;
            color: white;
            font-size: 1.5rem;
        }
        .card-body {
            background-color: white;
        }
        .alert {
            font-size: 1.1rem;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3>Welcome to your Dashboard, {{ auth()->user()->name }}!</h3>
                    </div>

                    <div class="card-body">
                        <p>You are logged in as a <strong>{{ auth()->user()->role }}</strong>.</p>
                        
                        @if (auth()->user()->role == 'admin')
                            <div class="alert alert-info">
                                You have administrator privileges. You can manage users and settings.
                            </div>
                        @elseif (auth()->user()->role == 'user')
                            <div class="alert alert-success">
                                As a user, you can manage your profile and access personalized content.
                            </div>
                        @endif

                        <div class="mt-3">
                            <h5>Quick Links</h5>
                            <ul>
                                <li><a href="{{ route('profile') }}">Profile</a></li>
                                <li><a href="{{ route('logout') }}">Logout</a></li>
                                @if(auth()->user()->role == 'admin')
                                    <li><a href="{{ route('admin.dashboard') }}">Admin Dashboard</a></li>
                                @endif
                            </ul>
                        </div>

                        <hr>

                        <div class="mt-4">
                            <h5>Activity</h5>
                            <p>Recent activity will be shown here soon.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS & Popper.js (needed for Bootstrap JS components like dropdowns) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
