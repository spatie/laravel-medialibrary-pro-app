@extends('layouts.master')

@push('scripts')
<script defer src="{{ asset('js/vue/app.js') }}"></script>
@endpush

@section('content')

<x-h2>Vue: multiple attachments</x-h2>

<form method="POST" ref="form">
    @csrf

    <x-grid>
        <x-field label="name">
            <x-input id="name" name="name" placeholder="Your first name" value="{{ old('name') }}" />
        </x-field>

        <x-field label="files">
            <media-library-attachment
                name="media"
                :initial-value="{{ json_encode(old('media')) }}"
                :validation-errors="{{ $errors }}"
                :validation-rules="{ accept: ['image/png', 'image/jpeg', 'application/pdf'] }"
                multiple
            ></media-library-attachment>
        </x-field>

        <x-button dusk="submit">Submit</x-button>
    </x-grid>
</form>

@endsection
