@extends('layouts.master')

@push('scripts')
<script defer src="/js/vue/app.js"></script>
@endpush

@section('content')

<x-h2>Vue: attachment</x-h2>

<form method="POST" ref="form">
    @csrf

    <x-grid>
        <x-field label="file">
            <media-library-attachment
                name="media"
                upload-endpoint="/temp-upload"
                :validation="{ accept: ['image/png'], maxSize: 1048576 }"
            />
        </x-field>

        <button type="submit">submit</button>
    </x-grid>
</form>

@endsection
