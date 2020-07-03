@extends('layouts.master')

@section('content')

    <x-h2>Livewire: attachment</x-h2>

    <div>
        <form method="POST">
            @csrf

            <input id="name" name="name" placeholder="Your first name">

            <x-media-library-attachment name="media"
            />

            <button type="submit">Submit</button>
        </form>
    </div>

@endsection
