@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Admin Dashboard</h1>
    
    <h2>All Counties</h2>
    <ul>
        @foreach($counties as $county)
            <li>{{ $county->cname }}</li>
        @endforeach
    </ul>

    <h2>All Towns</h2>
    <ul>
        @foreach($towns as $town)
            <li>{{ $town->tname }}</li>
        @endforeach
    </ul>

    <h2>All Population Data</h2>
    <ul>
        @foreach($populations as $population)
            <li>Town ID: {{ $population->townid }} - Year: {{ $population->ryear }} - Total: {{ $population->total }}</li>
        @endforeach
    </ul>

    <h2>All Contents</h2>
    <ul>
        @foreach($contents as $content)
            <li>{{ $content->title }} - {{ $content->user->name }}</li>
        @endforeach
    </ul>
</div>
@endsection
