@extends('layouts.master', ['pageTitle' => 'React: collection'])

@push('scripts')
    <script defer src="/js/react/app.js"></script>
@endpush

@section('content')
    <x-h2>React: Collection</x-h2>

    <div id="collection"></div>
@endsection
