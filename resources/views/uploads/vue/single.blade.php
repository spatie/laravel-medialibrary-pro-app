@extends('layouts.master')

@push('scripts')
    <script defer src="/js/vue/app.js"></script>
@endpush

@section('content')
    <h1>Vue single</h1>

    <template v-if="window.location.search.includes('async=true')">
        <h2>Async (axios)</h2>
        <async-single></async-single>
    </template>

    <template v-else>
        <h2>Sync (form submit)</h2>
        <single></single>
    </template>

@endsection
