<template>
    <div>
        <media-library-attachment
            name="media"
            :validation="{ accept: ['image/png'], maxSize: 1048576 }"
            :initial-value="value"
            :validation-errors="validationErrors"
            :upload-endpoint="uploadEndpoint"
            :translations="{ hint: 'Add a file please!', replace: 'Click or drag to replace' }"
            @change="onChange"
        ></media-library-attachment>

        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-2" @click="onSubmit">
            Submit
        </button>
    </div>
</template>

<script>
import MediaLibraryAttachment from '../../../vendor/spatie/laravel-medialibrary-pro/ui/medialibrary-pro-vue-single';

export default {
    components: { MediaLibraryAttachment },

    methods: {
        onChange(value) {
            this.value = value;
        },

        onSubmit() {
            // TODO: axios.post().catch(errors => this.validationErrors = formattedErrors)
            /* this.validationErrors = { [this.value[0].uuid]: 'error' }; */
        },
    },

    data() {
        return {
            value: window.oldValues.media,
            validationErrors: window.errors,
            uploadEndpoint: window.uploadEndpoint,
            csrfToken: window.csrfToken,
        };
    },
};
</script>
