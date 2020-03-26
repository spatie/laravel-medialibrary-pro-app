@extends('layouts.master')

@push('scripts')
    <script defer src="/js/vue/app.js"></script>
@endpush

@section('content')
    <h1>Vue single</h1>

    <single></single>
@endsection
