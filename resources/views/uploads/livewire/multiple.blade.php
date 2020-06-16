@extends('layouts.master')

@section('content')

    <form method="POST" enctype="multipart/form-data">
        @csrf

        Name: <input type="text" name="name" value="{{ $formSubmission->name }}">

        <x-media-library-collection
            name="media"
            :model="$formSubmission"
            collectionName="images"
            collection-rules="max:3"
        />

        <button type="submit">Submit</button>
    </form>

@endsection
