@extends('layouts.master')

@section('content')
    
    <x-h2>Vue</x-h2>

    <ul class="list-disc list-inside">
        <li><a class="text-red-500 hover:bg-red-100" href="{{ route('vue.single') }}">Single</a></li>
        <li><a class="text-red-500 hover:bg-red-100" href="{{ route('vue.single') }}?async=true">Single (async)</a></li>
        <li class="mt-2"><a class="text-red-500 hover:bg-red-100" href="{{ route('vue.multiple') }}">Multiple</a></li>
        <li><a class="text-red-500 hover:bg-red-100" href="{{ route('vue.multiple') }}?async=true">Multiple (async)</a></li>
    </ul>

    <x-h2 class="mt-12">React</x-h2>
    
    <ul class="list-disc list-inside">
        <li><a class="text-red-500 hover:bg-red-100" href="{{ route('react.single') }}">Single</a></li>
        <li><a class="text-red-500 hover:bg-red-100" href="{{ route('react.single') }}?async=true">Single (async)</a></li>
        <li class="mt-2"><a class="text-red-500 hover:bg-red-100" href="{{ route('react.multiple') }}">Multiple</a></li>
        <li><a class="text-red-500 hover:bg-red-100" href="{{ route('react.multiple') }}?async=true">Multiple (async)</a></li>
    </ul>

    <x-h2 class="mt-12">Livewire</x-h2>
    
    <ul class="list-disc list-inside">
        <li><a class="text-red-500 hover:bg-red-100" href="{{ route('livewire.attachment-single') }}">Attachment</a></li>
        <li><a class="text-red-500 hover:bg-red-100" href="{{ route('livewire.attachment-multiple') }}">Attachment (multiple)</a></li>
        <li class="mt-2"r><a class="text-red-500 hover:bg-red-100" href="{{ route('livewire.collection') }}?async=true">Collection</a></li>
        <li class="mt-2"><a class="text-red-500 hover:bg-red-100" href="{{ route('vapor') }}">Vapor</a></li>
    </ul>
@endsection
