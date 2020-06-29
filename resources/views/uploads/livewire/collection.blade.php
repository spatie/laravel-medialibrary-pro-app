@extends('layouts.master')

@section('content')

    <form method="POST" enctype="multipart/form-data">
        @csrf

        Name: <input type="text" name="name" value="{{ old('name', $formSubmission->name) }}">


        <h1 class="text-2xl">Images</h1>

        <x-media-library-collection
            name="images"
            :model="$formSubmission"
            collectionName="images"
            max-items="3"
        />

        <h1 class="text-2xl">Downloads</h1>

        <x-media-library-collection
            :model="$formSubmission"
            name="downloads"
            collection-name="downloads"
            max-items="2"
        >

        </x-media-library-collection>

        <button type="submit">Submit</button>
    </form>

@endsection
