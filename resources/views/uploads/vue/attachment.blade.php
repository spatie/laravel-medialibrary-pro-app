@extends('layouts.master')

@push('scripts')
    @vite(['resources/js/vue/app.js'])
@endpush

@section('content')

<x-h2>Vue: attachment</x-h2>

<form method="POST" ref="form">
    @csrf

    <x-grid>
        <x-field label="name">
            <x-input id="name" name="name" placeholder="Your first name" value="{{ old('name') }}" />
        </x-field>

        <x-field label="file">
            <media-library-attachment
                name="media"
                :validation-rules="{ accept: ['image/png', 'image/jpeg', 'image/gif', 'application/pdf'] }"
                :validation-errors="{{ $errors }}"
                :initial-value="{{ json_encode(old('media')) }}"
            />
        </x-field>

        <x-button dusk="submit">Submit</x-button>
    </x-grid>
</form>

@endsection
