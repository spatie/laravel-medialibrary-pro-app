@extends('layouts.master')

@push('scripts')
<script defer src="/js/vue/app.js"></script>
@endpush

@section('content')

<x-h2>Vue: attachment (submits on upload)</x-h2>

<form method="POST" ref="form">
    @csrf

    <x-grid>
        <x-field label="file">
            <media-library-attachment
                name="avatar"
                upload-endpoint="/temp-upload"
                :after-upload="() => $nextTick(() => $refs.form.submit())"
                :validation="{ accept: ['image/png'], maxSize: 1048576 }"
            ></media-library-attachment>
        </x-field>
    </x-grid>
</form>

@endsection
