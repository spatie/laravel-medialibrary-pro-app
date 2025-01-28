@extends('layouts.master')

@push('scripts')
    @vite(['resources/js/vue/app.js'])
@endpush

@section('content')

<async-attachments></async-attachments>

@endsection
