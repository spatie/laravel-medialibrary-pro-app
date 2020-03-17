<template>
    <form action="multi-upload" method="POST">
        <h1 class="h1">Form with Table</h1>

        <input type="hidden" name="_token" :value="csrfToken" />

        <p>
            <input name="name" type="text" placeholder="name" :value="oldValues.name" />
        </p>

        <media-table-component
            :before-upload="beforeUpload"
            :validation="{ accept: ['image/png'], maxSize: 1048576 }"
            name="media"
            :initial-value="initialValue"
            :initial-errors="initialErrors"
            :temp-endpoint="tempEndpoint"
            :strings="{
                hint: { plural: 'Add files please!', singular: 'Add a file please!' },
                replace: 'Click or drag to replace',
            }"
            :drag-enabled="true"
        >
            <template
                slot-scope="{
                    getCustomPropertyInputProps,
                    getCustomPropertyInputListeners,
                    getCustomPropertyInputErrors,
                }"
            >
                <div class="mb-2">
                    <input
                        placeholder="tags (custom property)"
                        class="border rounded"
                        v-bind="getCustomPropertyInputProps('tags')"
                        v-on="getCustomPropertyInputListeners('tags')"
                    />
                    <p v-for="error in getCustomPropertyInputErrors('tags')" :key="error" class="text-red-500">
                        {{ error }}
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
                        {{ error }}
                    </p>
                </div>
            </template>
        </media-table-component>

        <p>
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-2">Submit</button>
        </p>
    </form>
</template>

<script>
import MediaTableComponent from '@spatie/medialibrary-pro-vue-table';

export default {
    components: { MediaTableComponent },

    methods: {
        beforeUpload() {
            return new Promise(resolve => {
                resolve();
            });
        },
    },

    data() {
        return {
            initialValue: window.oldValues.media,
            initialErrors: window.errors,
            tempEndpoint: window.tempEndpoint,
            csrfToken: window.csrfToken,
            oldValues: window.oldValues,
        };
    },
};
</script>
