@extends('layouts.master')

@push('scripts')
<script defer src="{{ asset('js/vue/app.js') }}"></script>
@endpush

@section('content')

<async-attachments></async-attachments>

@endsection
