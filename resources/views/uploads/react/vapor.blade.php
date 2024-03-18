@extends('layouts.master', ['pageTitle' => 'React: collection on vapor'])

@push('scripts')
    @viteReactRefresh
    @vite(['resources/js/react/app.tsx'])
@endpush

@section('content')
    React collections on vapor
@endsection
