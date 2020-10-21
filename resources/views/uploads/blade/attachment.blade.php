@extends('layouts.master', ['pageTitle' => 'Blade: attachment'])

@section('content')

    <x-h2>Blade: attachment</x-h2>

    <form method="POST">
        <x-grid>
            @csrf

            <x-field label="name">
                <x-input autocomplete="off" id="name" name="name" placeholder="Your first name"/>
            </x-field>

            <x-field label="file">
                <x-media-library-attachment name="media" rules="mimes:png,jpeg,pdf"/>
            </x-field>

            <x-button dusk="submit">Submit</x-button>
        </x-grid>
    </form>

@endsection
