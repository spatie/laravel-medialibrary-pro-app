<template>
    <div>
        <media-single-component
            name="media"
            :validation="{ accept: ['image/png'], maxSize: 1048576 }"
            :initial-value="value"
            :validation-errors="validationErrors"
            :temp-endpoint="tempEndpoint"
            :translations="{ hint: 'Add a file please!', replace: 'Click or drag to replace' }"
            @change="onChange"
        ></media-single-component>

        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-2" @click="onSubmit">
            Submit
        </button>
    </div>
</template>

<script>
import MediaSingleComponent from '@spatie/medialibrary-pro-vue-single';

export default {
    components: { MediaSingleComponent },

    methods: {
        onChange(value) {
            this.value = value;
        },

        onSubmit() {
            // TODO: axios.post().catch(errors => this.validationErrors = formattedErrors)
            this.validationErrors = { [this.value[0].uuid]: 'error' };
        },
    },

    data() {
        return {
            value: window.oldValues.media,
            validationErrors: window.errors,
            tempEndpoint: window.tempEndpoint,
            csrfToken: window.csrfToken,
        };
    },
};
</script>
