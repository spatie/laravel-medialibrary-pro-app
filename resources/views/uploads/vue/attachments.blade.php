@extends('layouts.master')

@push('scripts')
<script defer src="/js/vue/app.js"></script>
@endpush

@section('content')

<x-h2>Vue: multiple attachments</x-h2>

<form method="POST" ref="form">
    @csrf

    <x-grid>
        <x-field label="name">
            <x-input id="name" name="name" placeholder="Your first name" />
        </x-field>
            
        <x-field label="files">
            <media-library-attachment
                name="attachments"
                upload-endpoint="/temp-upload"
                multiple
            ></media-library-attachment>
        </x-field>

        <x-button data-testing-role="submit">Submit</x-button>
    </x-grid>
</form>

@endsection
