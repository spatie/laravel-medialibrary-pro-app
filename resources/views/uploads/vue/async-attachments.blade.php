@extends('layouts.master')

@push('scripts')
<script defer src="/js/vue/app.js"></script>
@endpush

@section('content')
<x-h2>Vue: attachments with async submit</x-h2>

<async-attachments></async-attachments>

@endsection
