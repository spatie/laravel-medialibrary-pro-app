@extends('layouts.master')

@push('scripts')
    <script defer src="js/vue/app.js"></script>
@endpush

@section('content')
    <script>
        window.oldValues = @json(Session::getOldInput());
        window.errors = {!! $errors->isEmpty() ? '{}' : $errors !!};
        window.tempEndpoint = 'temp-upload';
        window.csrfToken = '{{ csrf_token() }}';
    </script>

    <form-with-table></form-with-table>

    <single></single>

@endsection
