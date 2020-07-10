@extends('layouts.master')

@push('scripts')
    <script defer src="/js/vue/app.js"></script>
@endpush

@section('content')
    <h1>Vue single</h1>

    <!-- <media-library-attachment
        name="media"
        upload-endpoint="/temp-upload"
    ></media-library-attachment> -->

    <template v-if="window.location.search.includes('async=true')">
        <h2>Async (axios)</h2>
        <async-single></async-single>
    </template>

    <template v-else-if="window.location.search.includes('multi=true')">
        <h2>Multiple</h2>
        <media-library-attachment name="media" :multiple="true"></media-library-attachment>
    </template>

    <template v-else>
        <h2>Sync (form submit)</h2>
        <single></single>
    </template>

    <!-- working minimal example
    <media-library-attachment name="avatar" temp-endpoint="temp-upload"></media-library-attachment>
    -->

    <!-- <media-library-attachment
        name="media"
        :validation="{ accept: ['image/png', 'image/jpeg'], maxSize: 500000 }"
        :initial-value="user.avatar"
        temp-endpoint="temp-upload"
        :validation-errors="validationErrors"
    ></media-library-attachment> -->

@endsection
