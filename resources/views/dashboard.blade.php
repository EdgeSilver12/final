@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container">
    <h1 class="mb-4">Welcome, {{ Auth::user()->name }}!</h1>

    <div class="row">
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">Total Users</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $totalUsers }}</h5>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Total Posts</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $totalContents }}</h5>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-danger mb-3">
                <div class="card-header">Your Posts</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $userContents }}</h5>
                </div>
            </div>
        </div>
    </div>

    <h2 class="mt-5">Latest Content</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Title</th>
                <th>Body</th>
                <th>Author</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($contents as $content)
                <tr>
                    <td>{{ $content->title }}</td>
                    <td>{{ Str::limit($content->body, 50) }}</td>
                    <td>{{ $content->user->name }}</td>
                    <td>
                        @if(Auth::id() === $content->user_id || Auth::user()->role === 'admin')
                            <a href="{{ route('contents.edit', $content) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('contents.destroy', $content) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
