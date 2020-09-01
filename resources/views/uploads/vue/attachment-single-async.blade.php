@extends('layouts.master')

@push('scripts')
    <script defer src="/js/vue/app.js"></script>
@endpush

@section('content')
    <h1>Vue multiple attachments</h1>

    <template>
        <async-single></async-single>
    </template>

@endsection
