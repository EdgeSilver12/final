@extends('layouts.app')

@section('title', 'Edit Content')

@section('content')
<div class="container">
    <h1>Edit Content</h1>

    <form action="{{ route('contents.update', $content) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" value="{{ $content->title }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Body</label>
            <textarea name="body" class="form-control" rows="4" required>{{ $content->body }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
