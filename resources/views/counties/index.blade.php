@extends('layouts.app')

@section('title', 'Counties')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Counties</h2>
    <ul>
        @foreach ($counties as $county)
            <li class="mb-2">
                <strong>{{ $county->cname }}</strong>
                <ul>
                    @foreach ($county->towns as $town)
                        <li>{{ $town->tname }}</li>
                    @endforeach
                </ul>
            </li>
        @endforeach
    </ul>
@endsection
