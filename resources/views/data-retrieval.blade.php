@extends('layouts.app')

@section('title', 'Retrieve Data')

@section('content')
<div class="container">
    <h1>Retrieve Data</h1>

    <form method="GET" action="{{ route('retrieve.data') }}">
        <div class="mb-3">
            <label for="table" class="form-label">Select Table:</label>
            <select name="table" id="table" class="form-control">
                <option value="users">Users</option>
                <option value="contents">Contents</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Filter by Role:</label><br>
            <input type="radio" name="role" value="admin"> Admin
            <input type="radio" name="role" value="user"> User
        </div>

        <button type="submit" class="btn btn-primary">Retrieve</button>
    </form>

    @if(isset($data))
        <h2 class="mt-5">Results</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    @foreach($columns as $column)
                        <th>{{ $column }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach($data as $row)
                    <tr>
                        @foreach($row as $value)
                            <td>{{ $value }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
