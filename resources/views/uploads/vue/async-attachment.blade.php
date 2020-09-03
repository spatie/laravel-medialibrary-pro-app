@extends('layouts.master')

@push('scripts')
<script defer src="/js/vue/app.js"></script>
@endpush

@section('content')
<x-h2>Vue: multiple attachments with asynchronous submit</x-h2>

<async-attachment></async-attachment>

@endsection
