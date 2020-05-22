@extends('layouts.master')

@push('scripts')
    <script defer src="/js/vue/app.js"></script>
@endpush

@section('content')
    <h1>Vue single</h1>

    <h2>Sync (form submit)</h2>
    <single></single>

    <br /><br />

    <h2>Async (axios)</h2>
    <async-single></async-single>
@endsection
