<template>
    <form method="POST" ref="form">
        <h1 class="h1">Single image (avatar, …)</h1>

        <input type="hidden" name="_token" :value="csrfToken" />

        <p>
            <input type="text" name="name" placeholder="name" class="border" />
        </p>

        <media-library-attachment
            name="media"
            :before-upload="beforeUpload"
            :after-upload="afterUpload"
            :validation="{ accept: ['image/png'], maxSize: 1048576 }"
            :initial-value="initialValue"
            :validation-errors="validationErrors"
            :upload-endpoint="uploadEndpoint"
            :translations="{ hint: 'Add a file please!', replace: 'Click or drag to replace' }"
        ></media-library-attachment>
    </form>
</template>

<script>
import MediaLibraryAttachment from '../../../vendor/spatie/laravel-medialibrary-pro/ui/medialibrary-pro-vue-single';

export default {
    data() {
        return {
            initialValue: window.oldValues.media,
            validationErrors: window.errors,
            uploadEndpoint: window.uploadEndpoint,
            csrfToken: window.csrfToken,
        };
    },

    components: { MediaLibraryAttachment },

    methods: {
        beforeUpload() {
            return new Promise(resolve => {
                resolve();
            });
        },

        afterUpload({ success }) {
            if (success) {
                // TODO: need nextTick because thumbnail field isn't updated in the DOM yet when this method is called. Can we solve this in a cleaner way?
                this.$nextTick(() => {
                    this.$refs.form.submit();
                });
            }
        },
    },
};
</script>
