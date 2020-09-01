<template>
    <div class="grid gap-8 justify-items-start">
        <div class="grid gap-2 w-full max-w-2xl">
            <label class="font-bold text-xs text-gray-500 uppercase tracking-widest">name</label>
            <input
                v-model="name"
                id="name"
                placeholder="Your first name"
                class="h-10 px-3 border-gray-200 text-gray-700 placeholder-gray-300 border-2 focus:outline-none focus:border-yellow-500 shadow-inner"
            />
        </div>

        <div class="grid gap-2 w-full max-w-2xl">
            <label class="font-bold text-xs text-gray-500 uppercase tracking-widest">file</label>
            <media-library-attachment
                name="media"
                :validation="{ accept: ['image/png'], maxSize: 1048576 }"
                :initial-value="value"
                :validation-errors="validationErrors"
                :upload-endpoint="uploadEndpoint"
                :translations="{ hint: 'Add a file please!', replace: 'Click or drag to replace' }"
                @change="onChange"
            ></media-library-attachment>
        </div>

        <button
            data-testing-role="submit"
            class="group flex items-center pl-6 h-10 bg-red-500 hover:bg-red-600 text-white font-bold text-xs uppercase tracking-widest shadow-md hover:shadow"
            @click="onSubmit"
        >
            Submit
            <span
                class="ml-3 px-3 border-l border-white border-opacity-50 opacity-75 group-hover:opacity-100 group-hover:text-yellow-500"
                >-&gt;</span
            >
        </button>
    </div>
</template>

<script>
import MediaLibraryAttachment from '../../../vendor/spatie/laravel-medialibrary-pro/ui/medialibrary-pro-vue-attachment';

export default {
    components: { MediaLibraryAttachment },

    methods: {
        onChange(value) {
            this.value = value;
        },

        onSubmit() {
            console.log('submitting', this.value);
            // TODO: axios.post().catch(errors => this.validationErrors = formattedErrors)

            const firstUuid = this.value[0].uuid;
            this.validationErrors = {
                [firstUuid]: 'error',
                [`${firstUuid}.custom_properties.tags`]: 'Field is required (this is a dummy error)',
            };
        },
    },

    data() {
        return {
            name: '',
            value: window.oldValues.media,
            validationErrors: window.errors,
            uploadEndpoint: window.uploadEndpoint,
            csrfToken: window.csrfToken,
        };
    },
};
</script>
