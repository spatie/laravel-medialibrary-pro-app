@extends('layouts.master')

@section('content')

<x-h2>Vue</x-h2>
<ul class="list-disc list-inside">
    <li>
        <x-list-link route="vue.attachment">Attachment</x-list-link>
    </li>
    <li>
        <x-list-link route="vue.async-attachment">Async attachment</x-list-link>
    </li>
    <li>
        <x-list-link route="vue.attachments">Attachments</x-list-link>
    </li>
    <li>
        <x-list-link route="vue.collection">Collection</x-list-link>
    </li>
    <li>
        <x-list-link route="vue.vapor">Vapor</x-list-link>
    </li>
</ul>

<x-h2 class="mt-12">React</x-h2>
<ul class="list-disc list-inside">
    <li>
        <x-list-link route="react.attachment">Attachment</x-list-link>
    </li>
    <li>
        <x-list-link route="react.async-attachment">Async attachment</x-list-link>
    </li>
    <li>
        <x-list-link route="react.attachments">Attachments</x-list-link>
    </li>
    <li>
        <x-list-link route="react.collection">Collection</x-list-link>
    </li>
    <li>
        <x-list-link route="react.vapor">Vapor</x-list-link>
    </li>

</ul>

<x-h2 class="mt-12">Livewire</x-h2>
<ul class="list-disc list-inside">
    <li>
        <x-list-link route="livewire.attachment">Attachment</x-list-link>
    </li>
    <li>
        <x-list-link route="livewire.attachments">Attachments</x-list-link>
    </li>
    <li>
        <x-list-link route="livewire.collection">Collection</x-list-link>
    </li>

    <li>
        <x-list-link route="livewire.collection-custom-property">Collection with custom property</x-list-link>
    </li>
    <li>
        <x-list-link route="livewire.vapor">Vapor</x-list-link>
    </li>
</ul>
@endsection
