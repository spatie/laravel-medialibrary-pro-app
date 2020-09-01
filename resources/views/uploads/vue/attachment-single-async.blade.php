@extends('layouts.master')

@push('scripts')
    <script defer src="/js/vue/app.js"></script>
@endpush

@section('content')
    <h1>Vue single</h1>

    <template>
        <async-single></async-single>
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
