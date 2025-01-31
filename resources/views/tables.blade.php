@extends('layouts.app')

@section('title', 'Table Data')

@section('content')
<div class="container">
    <div class="card p-4 shadow-sm">
        <h1 class="mb-3">Table: {{ ucfirst($table) }}</h1>

        @if(count($tableData) > 0)
            <table class="table table-bordered">
                <thead>
                    <tr>
                        @foreach(array_keys((array)$tableData[0]) as $column)
                            <th>{{ ucfirst($column) }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach($tableData as $row)
                        <tr>
                            @foreach($row as $value)
                                <td>{{ $value }}</td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No data available in this table.</p>
        @endif

        <a href="{{ route('dashboard') }}" class="btn btn-secondary">Back to Dashboard</a>
    </div>
</div>
@endsection
