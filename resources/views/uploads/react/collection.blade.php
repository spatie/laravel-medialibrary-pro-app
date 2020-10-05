@extends('layouts.master', ['pageTitle' => 'React: collection'])

@push('scripts')
    <script defer src="/js/react/app.js"></script>
    <script>
        window.initialValues = {};
        window.initialValues.images = {{ $images }};
        window.initialValues.downloads = {{ $downloads }};
        window.name = '{{ old('name', $formSubmission->name) }}';
    </script>
@endpush

@section('content')
    <div id="collection"></div>
@endsection
