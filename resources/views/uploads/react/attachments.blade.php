@extends('layouts.master', ['pageTitle' => 'React: attachment'])

@push('scripts')
    <script defer src="{{ asset('js/react/app.js') }}"></script>
@endpush

@section('content')
    <div id="attachments"></div>
@endsection
