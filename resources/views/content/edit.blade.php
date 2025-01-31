<!-- resources/views/content/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Content</h1>

        <form action="{{ route('content.update', $content->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $content->title }}" required>
            </div>
            <div class="form-group">
                <label for="body">Body</label>
                <textarea name="body" id="body" class="form-control" rows="4" required>{{ $content->body }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Update Content</button>
        </form>
    </div>
@endsection
