<template>
    <media-table-component
        :before-upload="beforeUpload"
        :validation="{ accept: ['image/png'], maxSize: 1024000 }"
        name="media"
        :initial-value="initialValue"
        :initial-errors="initialErrors"
        :temp-endpoint="tempEndpoint"
        :strings="{ hint: 'Add files please!', replace: 'Click or drag to replace' }"
    >
        <template
            slot-scope="{ getCustomPropertyInputProps, getCustomPropertyInputListeners, getCustomPropertyInputErrors }"
        >
            <div class="mb-2">
                <input
                    placeholder="tags (custom property)"
                    class="border rounded p-1 mb-1"
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
                    class="border rounded p-1 mb-1"
                    v-bind="getCustomPropertyInputProps('caption')"
                    v-on="getCustomPropertyInputListeners('caption')"
                />
                <p v-for="error in getCustomPropertyInputErrors('caption')" :key="error" class="text-red-500">
                    {{ error }}
                </p>
            </div>
        </template>
    </media-table-component>
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
        };
    },
};
</script>
