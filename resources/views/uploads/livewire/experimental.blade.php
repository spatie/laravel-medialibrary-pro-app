@extends('layouts.master')

@section('content')

    <form method="POST">
        @csrf

        Name: <input type="text" name="name" value="{{ old('name', $formSubmission->name) }}">

        <h1 class="text-2xl">Images</h1>
        <livewire:media-library-livewire-experimental-collection
            :model="$formSubmission"
            name="images"
            collectionName="images"
        />

        <h1>Downloads</h1>
        <livewire:media-library-livewire-experimental-collection
            :model="$formSubmission"
            name="downloads"
            collectionName="downloads"
        />

        <button type="submit">Submit</button>
    </form>

@endsection
