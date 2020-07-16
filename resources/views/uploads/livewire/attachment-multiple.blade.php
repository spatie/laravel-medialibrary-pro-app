@extends('layouts.master')

@section('content')

    <div>
        <form method="POST">
            @csrf

            <input id="name" name="name" placeholder="Your first name">

            <x-media-library-attachment multiple name="media" rules="mimes:png,jpg,pdf" />

            <button data-testing-role="submit" type="submit">Submit</button>
        </form>
    </div>

@endsection
