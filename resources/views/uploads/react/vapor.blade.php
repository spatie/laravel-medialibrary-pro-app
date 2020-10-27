@extends('layouts.master', ['pageTitle' => 'React: collection on vapor'])

@push('scripts')
    <script defer src="{{ asset('js/react/app.js') }}"></script>
@endpush

@section('content')
    React collections on vapor
@endsection
