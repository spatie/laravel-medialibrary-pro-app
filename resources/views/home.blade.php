@extends('layouts.master')

@section('content')
    
    <h1 class="mb-16 text-4xl font-bold leading-snug">Medialibrary Pro <br>Components</h1>

    <h2 class="mb-4 text-xl font-bold uppercase tracking-widest">Vue</h2>

    <ul class="list-disc list-inside">
        <li><a class="text-indigo-500 hover:bg-indigo-100" href="{{ route('vue.single') }}">Single</a></li>
        <li><a class="text-indigo-500 hover:bg-indigo-100" href="{{ route('vue.single') }}?async=true">Single (async)</a></li>
        <li class="mt-2"><a class="text-indigo-500 hover:bg-indigo-100" href="{{ route('vue.multiple') }}">Multiple</a></li>
        <li><a class="text-indigo-500 hover:bg-indigo-100" href="{{ route('vue.multiple') }}?async=true">Multiple (async)</a></li>
    </ul>

    <h2 class="mt-16 mb-4  text-xl font-bold uppercase tracking-widest">React</h2>
    
    <ul class="list-disc list-inside">
        <li><a class="text-indigo-500 hover:bg-indigo-100" href="{{ route('react.single') }}">Single</a></li>
        <li><a class="text-indigo-500 hover:bg-indigo-100" href="{{ route('react.single') }}?async=true">Single (async)</a></li>
        <li class="mt-2"><a class="text-indigo-500 hover:bg-indigo-100" href="{{ route('react.multiple') }}">Multiple</a></li>
        <li><a class="text-indigo-500 hover:bg-indigo-100" href="{{ route('react.multiple') }}?async=true">Multiple (async)</a></li>
    </ul>

    <h2 class="mt-16 mb-4  text-xl font-bold uppercase tracking-widest">Livewire</h2>
    
    <ul class="list-disc list-inside">
        <li><a class="text-indigo-500 hover:bg-indigo-100" href="{{ route('livewire.attachment-single') }}">Single attachment</a></li>
        <li><a class="text-indigo-500 hover:bg-indigo-100" href="{{ route('livewire.attachment-multiple') }}">Multiple attachments</a></li>
        <li class="mt-2"r><a class="text-indigo-500 hover:bg-indigo-100" href="{{ route('livewire.collection') }}?async=true">Collection</a></li>
        <li class="mt-2"><a class="text-indigo-500 hover:bg-indigo-100" href="{{ route('vapor') }}">Vapor</a></li>
    </ul>
@endsection
