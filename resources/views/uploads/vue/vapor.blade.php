@extends('layouts.master')

@push('scripts')
    <script defer src="{{ asset('js/vue/app.js') }}"></script>
@endpush

@section('content')
    <h1>Vue collections on Vapor</h1>
@endsection
