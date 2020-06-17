@extends('layouts.master')

@section('content')

    <div class="max-w-sm">
        <form method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium leading-5 text-gray-700">Name
                </label>
                <div class="mt-1 relative rounded-md shadow-sm">
                    <input id="name" name="name" placeholder="your name" class="form-input block w-full sm:text-sm sm:leading-5"/>
                </div>
            </div>

            <x-media-library-upload name="media" rules="mimes:png,jpg,pdf"/>

            <button type="submit"  class="mt-4 inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150">Submit</button>
        </form>
    </div>

@endsection
