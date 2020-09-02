@extends('layouts.master')

@section('content')

    <x-h2>Vue</x-h2>
    <ul class="list-disc list-inside">
        <li><x-list-link route="vue.single-attachment">Single attachment</x-list-link></li>
        <li><x-list-link route="vue.single-async-attachment">Single async attachment</x-list-link></li>
        <li><x-list-link route="vue.attachments">Multiple attachments</x-list-link></li>
        <li><x-list-link route="vue.collection">Collection</x-list-link></li>
        <li><x-list-link route="vue.async-collection">Async collection</x-list-link></li>
    </ul>

    <x-h2 class="mt-12">React</x-h2>
    <ul class="list-disc list-inside">
        <li><x-list-link route="react.single-attachment">Single attachment</x-list-link></li>
        <li><x-list-link route="react.single-async-attachment">Single async attachment</x-list-link></li>
        <li><x-list-link route="react.attachments">Multiple attachments</x-list-link></li>
        <li><x-list-link route="react.collection">Collection</x-list-link></li>
        <li><x-list-link route="react.async-collection">Async collection</x-list-link></li>
    </ul>

    <x-h2 class="mt-12">Livewire</x-h2>
    <ul class="list-disc list-inside">
        <li><x-list-link route="livewire.single-attachment">Single attachment</x-list-link></li>
        <li><x-list-link route="livewire.attachments">Multiple attachments</x-list-link></li>
        <li><x-list-link route="livewire.collection">Collection</x-list-link></li>
        <li><x-list-link route="livewire.vapor">Vapor</x-list-link></li>
    </ul>
@endsection
