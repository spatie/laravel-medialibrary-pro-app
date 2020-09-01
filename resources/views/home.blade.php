@extends('layouts.master')

@section('content')

    <x-h2>Vue</x-h2>

    <ul class="list-disc list-inside">
        <li><a class="text-red-500 hover:bg-red-100" href="{{ route('vue.single-attachment') }}">Attachment</a></li>
        <li><a class="text-red-500 hover:bg-red-100" href="{{ route('vue.single-async-attachment') }}">Attachment (async)</a></li>
        <li><a class="text-red-500 hover:bg-red-100" href="{{ route('vue.multiple-attachments') }}">Attachment (multiple)</a></li>
        <li class="mt-2"><a class="text-red-500 hover:bg-red-100" href="{{ route('vue.collection') }}">Collection</a></li>
        <li><a class="text-red-500 hover:bg-red-100" href="{{ route('vue.async-collection') }}">Collection (async)</a></li>
    </ul>

    <x-h2 class="mt-12">React</x-h2>

    <ul class="list-disc list-inside">
        <li><a class="text-red-500 hover:bg-red-100" href="{{ route('react.attachment') }}">Attachment</a></li>
        <li><a class="text-red-500 hover:bg-red-100" href="{{ route('react.attachment') }}?async=true">Attachment (async)</a></li>
        <li><a class="text-red-500 hover:bg-red-100" href="{{ route('react.attachment') }}?multi=true">Attachment (multiple)</a></li>
        <li class="mt-2"><a class="text-red-500 hover:bg-red-100" href="{{ route('react.collection') }}">Collection</a></li>
        <li><a class="text-red-500 hover:bg-red-100" href="{{ route('react.collection') }}?async=true">Collection (async)</a></li>
    </ul>

    <x-h2 class="mt-12">Livewire</x-h2>

    <ul class="list-disc list-inside">
        <li><a class="text-red-500 hover:bg-red-100" href="{{ route('livewire.single-attachment') }}">Attachment</a></li>
        <li><a class="text-red-500 hover:bg-red-100" href="{{ route('livewire.multiple-attachments') }}">Attachment (multiple)</a></li>
        <li class="mt-2"r><a class="text-red-500 hover:bg-red-100" href="{{ route('livewire.collection') }}?async=true">Collection</a></li>
        <li class="mt-2"><a class="text-red-500 hover:bg-red-100" href="{{ route('livewire.vapor') }}">Vapor</a></li>
    </ul>
@endsection
