@extends('layouts.app')

@section('content')
    <h1>All Contents</h1>
    <a href="{{ route('contents.create') }}" class="btn btn-primary">Create New Content</a>

    @foreach ($contents as $content)
        <div class="card mt-3">
            <div class="card-body">
                <h5>{{ $content->title }}</h5>
                <p>{{ $content->body }}</p>
                <a href="{{ route('contents.show', $content) }}" class="btn btn-info">View</a>

                @if(auth()->user()->id == $content->user_id || auth()->user()->hasRole('admin'))
                    <a href="{{ route('contents.edit', $content) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('contents.destroy', $content) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                @endif
            </div>
        </div>
    @endforeach
@endsection
