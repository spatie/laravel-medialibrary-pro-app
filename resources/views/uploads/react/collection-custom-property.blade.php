@extends('layouts.master', ['pageTitle' => 'React: collection with custom property'])

@push('scripts')
    <script defer src="{{ asset('js/react/app.js') }}"></script>
    <script>
        window.initialValues = {};
        window.initialValues.images = @json($images);
        window.name = '{{ old('name', $formSubmission->name) }}';
    </script>
@endpush

@section('content')
    <div id="collection-custom-property"></div>
@endsection
