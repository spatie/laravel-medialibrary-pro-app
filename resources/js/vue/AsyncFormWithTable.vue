<template>
    <div>
        <h1 class="h1">Async</h1>

        <p>
            <input class="border" name="name" type="text" placeholder="name" :value="oldValues.name" />
        </p>

        <media-table-component
            :before-upload="beforeUpload"
            :validation="{ accept: ['image/png'], maxSize: 1048576 }"
            name="media"
            :initial-value="value"
            :validation-errors="validationErrors"
            :temp-endpoint="tempEndpoint"
            :translations="{
                hint: { plural: 'Add files please!', singular: 'Add a file please!' },
                replace: 'Click or drag to replace',
            }"
            :drag-enabled="true"
            @change="onChange"
        >
            <template
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
                        {{ error }}
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

        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-2" @click="onSubmit">
            Submit
        </button>
    </div>
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

        onChange(value) {
            this.value = value;
        },

        onSubmit() {
            console.log(this.value);
            // TODO: axios.post().catch(errors => this.validationErrors = formattedErrors)
            /* this.validationErrors = { [this.value[0].uuid]: 'error' }; */
        },
    },

    data() {
        return {
            value: window.oldValues.media,
            validationErrors: window.errors,
            tempEndpoint: window.tempEndpoint,
            csrfToken: window.csrfToken,
            oldValues: window.oldValues,
        };
    },
};
</script>
