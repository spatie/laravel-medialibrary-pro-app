@extends('layouts.master')

@push('scripts')
<script defer src="/js/vue/app.js"></script>
@endpush

@section('content')

<x-h2>Vue: attachment</x-h2>

<form method="POST" ref="form">
    @csrf

    <x-grid>
        <x-field label="name">
            <x-input id="name" name="name" placeholder="Your first name" />
        </x-field>

        <x-field label="file">
            <media-library-attachment
                name="media"
                upload-endpoint="/temp-upload"
                :validation="{ accept: ['image/png'], maxSize: 1048576 }"
            />
        </x-field>
        
        @error('media')
            <p class="rounded-sm text-xs mb-8 px-4 py-2 bg-red-100 text-red-500">{{ $message }}</p>
        @enderror

        <x-button data-testing-role="submit">Submit</x-button>
    </x-grid>
</form>

@endsection
