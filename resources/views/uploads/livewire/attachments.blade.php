@extends('layouts.master', ['pageTitle' => 'Livewire: multiple attachments'])

@section('content')

    <x-h2>Livewire: multiple attachments</x-h2>

    <form method="POST">
        <x-grid>
            @csrf

            <x-field label="name">
                <x-input id="name" name="name" placeholder="Your first name" />
            </x-field>

            <x-field label="files">
                <x-media-library-attachment multiple name="media" rules="mimes:png,jpeg,pdf" />
            </x-field>

            <x-button dusk="submit">Submit</x-button>
        </x-grid>
    </form>

@endsection
