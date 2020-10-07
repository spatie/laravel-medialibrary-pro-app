@extends('layouts.master')

@push('scripts')
<script defer src="/js/vue/app.js"></script>
@endpush

@section('content')

<async-attachments></async-attachments>

@endsection
