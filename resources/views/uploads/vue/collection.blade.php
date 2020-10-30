@extends('layouts.master')

@push('scripts')
<script defer src="{{ asset('js/vue/app.js') }}"></script>
@endpush

@section('content')

<x-h2>Vue: collection</x-h2>

<form method="POST" ref="form">
    @csrf

    <x-grid>
        <x-field label="name">
            <x-input id="name" name="name" placeholder="Your first name" value="{{ old('name', $formSubmission->name) }}" />
        </x-field>

        <x-field label="images">
            <media-library-collection
                name="images"
                :initial-value="{{ $images }}"
                :validation-rules="{ accept: ['image/png', 'image/jpeg'] }"
                :validation-errors="window.errors"
                :max-items="3"
            />
        </x-field>

        <x-field label="downloads">
            <media-library-collection
                name="downloads"
                :initial-value="{{ $downloads }}"
                :validation-rules="{ accept: ['application/pdf'] }"
                :validation-errors="window.errors"
                :max-items="2"
            />
        </x-field>

        <x-button dusk="submit">Submit</x-button>
    </x-grid>
</form>

@endsection
