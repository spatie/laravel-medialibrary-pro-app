@extends('layouts.master', ['pageTitle' => 'Traditional'])

@section('content')

    <x-h2>Upload</x-h2>

    <form method="POST" enctype="multipart/form-data">
        <x-grid>
            @csrf

            <x-field label="name">
                <x-input id="name" name="name" placeholder="Your first name" />
            </x-field>

            <x-field label="file">
                <input type="file" name="file">
                @error('file')
                    {{ $message }}
                @enderror
            </x-field>

            <x-button dusk="submit">Submit</x-button>
        </x-grid>
    </form>

@endsection
