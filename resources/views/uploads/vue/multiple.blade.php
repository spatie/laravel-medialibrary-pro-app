@extends('layouts.master')

@push('scripts')
    <script defer src="/js/vue/app.js"></script>
@endpush

@section('content')
    <h1>Vue multiple</h1>

    <form-with-table></form-with-table>
@endsection
