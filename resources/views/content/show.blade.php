@extends('layouts.app')

@section('title', 'View Content')

@section('content')
<div class="container">
    <h1>{{ $content->title }}</h1>
    <p>{{ $content->body }}</p>
    <p><strong>Author:</strong> {{ $content->user->name }}</p>
    <a href="{{ route('contents.index') }}" class="btn btn-secondary">Back to List</a>
</div>
@endsection
