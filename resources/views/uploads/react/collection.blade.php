@extends('layouts.master', ['pageTitle' => 'React: collection'])

@push('scripts')
    <script defer src="{{ asset('js/react/app.js') }}"></script>
    <script>
        window.initialValues = {};
        window.initialValues.images = @json($images);
        window.initialValues.downloads = @json($downloads);
        window.name = '{{ old('name', $formSubmission->name) }}';
    </script>
@endpush

@section('content')
    <div id="collection"></div>
@endsection
