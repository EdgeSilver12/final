<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>

    <!-- Link to Bootstrap for styling -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .container {
            margin-top: 100px;
            text-align: center;
        }
        .btn {
            margin: 10px;
        }
        .welcome-message {
            font-size: 1.5rem;
            margin-bottom: 30px;
            color: #333;
        }
    </style>
</head>
<body>

<div class="container">
    <!-- Check if the user is logged in -->
    @if (Auth::check())
        <!-- Display a welcome message if the user is logged in -->
        <div class="welcome-message">
            <h2>Welcome, {{ Auth::user()->name }}!</h2>
            <p>We're happy to have you back.</p>
        </div>
        
        <!-- Logout button -->
        <a href="{{ route('logout') }}" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>

    @else
        <!-- Display login and register buttons if the user is not logged in -->
        <h2>Welcome to Our Website!</h2>
        <p>Please log in or register to get started.</p>
        <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
        <a href="{{ route('register') }}" class="btn btn-success">Register</a>
    @endif
</div>

<!-- Bootstrap JS (optional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
