@extends('layouts.master')

@section('content')

    <form method="POST" enctype="multipart/form-data">
        @csrf

        Name: <input type="text" name="name">

        <x-media-library-upload name="media" rules="mimes:png,jpg,pdf" />

        <button type="submit">Submit</button>
    </form>

@endsection
