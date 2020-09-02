@extends('layouts.master', ['pageTitle' => 'React: attachment'])

@push('scripts')
    <script defer src="/js/react/app.js"></script>
@endpush

@section('content')
    <div id="async-attachment"></div>
@endsection
