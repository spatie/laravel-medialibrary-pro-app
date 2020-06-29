@extends('layouts.master')

@push('scripts')
    <script defer src="/js/vue/app.js"></script>
@endpush

@section('content')
    <h1>Vue single</h1>

    <!-- <media-single-component
        name="media"
        upload-endpoint="/temp-upload"
    ></media-single-component> -->

    <template v-if="window.location.search.includes('async=true')">
        <h2>Async (axios)</h2>
        <async-single></async-single>
    </template>

    <template v-else>
        <h2>Sync (form submit)</h2>
        <single></single>
    </template>

    <media-single-component
        name="media"
        :validation="{ accept: ['image/png', 'image/jpeg'], maxSize: 500000 }"
        :initial-value="user.avatar"
        temp-endpoint="temp-upload"
        :validation-errors="validationErrors"
    ></media-single-component>

@endsection
