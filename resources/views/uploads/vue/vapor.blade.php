@extends('layouts.master')

@push('scripts')
    @vite(['resources/js/vue/app.js'])
@endpush

@section('content')
    <h1>Vue collections on Vapor</h1>
@endsection
