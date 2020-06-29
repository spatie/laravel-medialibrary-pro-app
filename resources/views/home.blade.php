@extends('layouts.master')

@section('content')
    <ul>
        <h1 class="text-3xl font-bold">Vue</h1>
        <li><a href="{{ route('vue.single') }}">Single</a></li>
        <li><a href="{{ route('vue.single') }}?async=true">Single (async)</a></li>

        <br />

        <li><a href="{{ route('vue.multiple') }}">Multiple</a></li>
        <li><a href="{{ route('vue.multiple') }}?async=true">Multiple (async)</a></li>

        <br />

        <h1 class="text-3xl font-bold">React</h1>
        <li><a href="{{ route('react.single') }}">Single</a></li>
        <li><a href="{{ route('react.single') }}?async=true">Single (async)</a></li>

        <br />

        <li><a href="{{ route('react.multiple') }}">Multiple</a></li>
        <li><a href="{{ route('react.multiple') }}?async=true">Multiple (async)</a></li>

        <br />

        <h1 class="text-3xl font-bold">Livewire</h1>
        <li><a href="{{ route('livewire.attachment-single') }}">Single attachment</a></li>
        <li><a href="{{ route('livewire.attachment-multiple') }}">Multiple attachments</a></li>

        <li><a href="{{ route('livewire.collection') }}?async=true">Collection</a></li>

        <br />

        <li><a href="{{ route('vapor') }}">Vapor</a></li>
    </ul>
@endsection
