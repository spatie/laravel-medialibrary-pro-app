@extends('layouts.master')

@push('scripts')
<script defer src="/js/vue/app.js"></script>
@endpush

@section('content')

<x-h2>Vue: collection</x-h2>

<form method="POST" ref="form">
    @csrf

    <x-grid>
        <x-field label="name">
            <x-input id="name" name="name" placeholder="Your first name" />
        </x-field>
            
        <x-field label="file collection">
            <media-library-collection
                name="media"
                :initial-value="window.oldValues.media"
                :validation="{ accept: ['image/png'], maxSize: 1048576 }"
                :translations="{
                    hint: { plural: 'Add files please!', singular: 'Add a file please!' },
                    replace: 'Click or drag to replace',
                }"
                upload-endpoint="/temp-upload"
                drag-enabled
            >
                <template
                    slot="afterItems"
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
                </template>
            </media-library-collection>
        </x-field>

        <x-button data-testing-role="submit">Submit</x-button>
    </x-grid>
</form>

@endsection
