@extends('layouts.master', ['pageTitle' => 'Livewire: multiple attachments'])

@section('content')

    <x-h2>Livewire: multiple attachments</x-h2>

    <x-form method="POST">
        @csrf

        <x-field label="name">
            <x-input id="name" name="name" placeholder="Your first name" />
        </x-field>

        <x-field label="files">
            <x-media-library-attachment multiple name="media" rules="mimes:png,jpg,pdf" />
        </x-field>

        <x-button data-testing-role="submit" type="submit">Submit</x-button>
    </x-form>

@endsection
