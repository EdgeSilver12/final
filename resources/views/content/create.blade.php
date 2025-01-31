@extends('layouts.app')

@section('content')
    <h1>Create Content</h1>
    <form action="{{ route('contents.store') }}" method="POST">
        @csrf
        <label>Title</label>
        <input type="text" name="title" required>

        <label>Body</label>
        <textarea name="body" required></textarea>

        <button type="submit">Create</button>
    </form>
@endsection
