@extends('layouts.master', ['pageTitle' => 'React: collection'])

@push('scripts')
    @viteReactRefresh
    @vite(['resources/js/react/app.tsx'])
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
