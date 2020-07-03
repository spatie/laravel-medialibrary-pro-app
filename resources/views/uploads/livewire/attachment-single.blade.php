@extends('layouts.master')

@section('content')

    <x-h2>Livewire: attachment</x-h2>

    <x-form method="POST">
        @csrf

        <x-input id="name" name="name" placeholder="Your first name" />

        <x-media-library-attachment name="media"
        />

        <x-button>Submit</x-button>
    </x-form>

@endsection
