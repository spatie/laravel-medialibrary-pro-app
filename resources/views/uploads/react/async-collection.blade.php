@extends('layouts.master', ['pageTitle' => 'React: collection'])

@push('scripts')
    <script defer src="/js/react/app.js"></script>
@endpush

@section('content')
    <div id="collection"></div>
@endsection
