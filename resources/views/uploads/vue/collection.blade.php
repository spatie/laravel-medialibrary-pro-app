@extends('layouts.master')

@push('scripts')
<script defer src="/js/vue/app.js"></script>
<script>
    window.initialValues = {};
    window.initialValues.images = {{ $images }};
    window.initialValues.downloads = {{ $downloads }};
</script>
@endpush

@section('content')

<x-h2>Vue: collection</x-h2>

<form method="POST" ref="form">
    @csrf

    <x-grid>
        <x-field label="name">
            <x-input id="name" name="name" placeholder="Your first name" value="{{ old('name', $formSubmission->name) }}" />
        </x-field>
            
        <x-field label="images">
            <media-library-collection
                name="images"
                :validation="{ accept: ['image/png'], maxSize: 1048576 }"
                :translations="{
                    hint: { plural: 'Add files please!', singular: 'Add a file please!' },
                    replace: 'Click or drag to replace',
                }"
                upload-endpoint="/temp-upload"
                drag-enabled
                :validation-errors="window.errors"
                :initial-value="window.oldValues.images || window.initialValues.images"
            />
        </x-field>
        
        <x-field label="downloads">
            <media-library-collection
                :initial-value="window.oldValues.downloads || window.initialValues.downloads"
                name="downloads"
                :validation="{ accept: ['image/png'], maxSize: 1048576 }"
                :translations="{
                    hint: { plural: 'Add files please!', singular: 'Add a file please!' },
                    replace: 'Click or drag to replace',
                }"
                upload-endpoint="/temp-upload"
                drag-enabled
                :validation-errors="window.errors"
            />
        </x-field>

        <x-button data-testing-role="submit">Submit</x-button>
    </x-grid>
</form>

@endsection

<!-- <template
    slot="fieldsView"
    slot-scope="{
        getCustomPropertyInputProps,
        getCustomPropertyInputListeners,
        getCustomPropertyInputErrors,
        getNameInputProps,
        getNameInputListeners,
        getNameInputErrors,
    }"
>
    <div class="mb-2">
        <input
            placeholder="image name"
            class="border rounded"
            v-bind="getNameInputProps()"
            v-on="getNameInputListeners()"
        />
        <p v-for="error in getNameInputErrors()" :key="error" class="text-red-500">
            @{{ error }}
        </p>
    </div>

    <div class="mb-2">
        <input
            placeholder="tags (custom property)"
            class="border rounded"
            v-bind="getCustomPropertyInputProps('tags')"
            v-on="getCustomPropertyInputListeners('tags')"
        />
        <p v-for="error in getCustomPropertyInputErrors('tags')" :key="error" class="text-red-500">
            @{{ error }}
        </p>
    </div>

    <div class="mb-2">
        <input
            placeholder="caption (custom property)"
            class="border rounded"
            v-bind="getCustomPropertyInputProps('caption')"
            v-on="getCustomPropertyInputListeners('caption')"
        />
        <p v-for="error in getCustomPropertyInputErrors('caption')" :key="error" class="text-red-500">
            @{{ error }}
        </p>
    </div>
</template> -->
