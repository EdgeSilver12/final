@extends('layouts.app')

@section('title', 'All Contents')

@section('content')
<div class="container">
    <h1 class="mb-4">All Contents</h1>
    
    <a href="{{ route('contents.create') }}" class="btn btn-primary mb-3">Create New Content</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

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
                    <td>{{ $content->body }}</td>
                    <td>{{ $content->user->name }}</td>
                    <td>
                        <a href="{{ route('contents.edit', $content) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('contents.destroy', $content) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
