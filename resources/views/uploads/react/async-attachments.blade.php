@extends('layouts.master', ['pageTitle' => 'React: attachment'])

@push('scripts')
    @vite(['resources/js/react/app.js'])
@endpush

@section('content')
    <div id="async-attachments"></div>
@endsection
