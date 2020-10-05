@extends('layouts.master')

@section('content')

    <x-h2>Livewire: collection</x-h2>

    <form method="POST">
        <x-grid>
            @csrf

            <x-field label="name">
                <x-input id="name" name="name" placeholder="Name" value="{{ old('name', $formSubmission->name) }}"  />
            </x-field>

            <x-field label="Images">
                <x-media-library-collection
                    name="images"
                    :model="$formSubmission"
                    collection="images"
                    max-items="3"
                    rules="mimes:png,jpeg"
                />
            </x-field>

            <x-field label="Downloads">
                <x-media-library-collection
                    name="downloads"
                    :model="$formSubmission"
                    collection="downloads"
                    rules="mimes:pdf"
                    max-items="2"
                    props-view="uploads.livewire.partials.custom-properties"
                />
            </x-field>

            <x-button dusk="submit" type="submit">Submit</x-button>
        </x-grid>
    </form>

@endsection
