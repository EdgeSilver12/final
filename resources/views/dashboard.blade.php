{{-- resources/views/user/dashboard.blade.php --}}


@extends('layouts.app')

@section('title', 'User Dashboard')

@section('content')
    <div class="container">
        <h1>Welcome to your Dashboard, {{ Auth::user()->name }}!</h1>
        <p>This is your personal dashboard where you can view your profile, manage settings, and more.</p>

        <!-- You can add more content for the user dashboard here -->
    </div>
@endsection

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
</head>
<body>
    <h1>Welcome to your Dashboard, {{ auth()->user()->name }}!</h1>
    
    <p><a href="{{ route('user.profile') }}">Go to Profile</a></p>
</body>
</html>
