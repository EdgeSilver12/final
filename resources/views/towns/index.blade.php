@extends('layouts.app')

@section('title', 'Towns')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Towns</h2>
    <ul>
        @foreach ($towns as $town)
            <li>
                <strong>{{ $town->tname }}</strong>
                <p>County: {{ $town->county->cname }}</p>
                <p>County Seat: {{ $town->countyseat ? 'Yes' : 'No' }}</p>
            </li>
        @endforeach
    </ul>
@endsection
