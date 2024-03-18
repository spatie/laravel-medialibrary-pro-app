@extends('layouts.master', ['pageTitle' => 'React: collection with custom property'])

@push('scripts')
    @viteReactRefresh
    @vite(['resources/js/react/app.tsx'])
    <script>
        window.initialValues = {};
        window.initialValues.images = @json($images);
        window.name = '{{ old('name', $formSubmission->name) }}';
    </script>
@endpush

@section('content')
    <div id="collection-custom-property"></div>
@endsection
