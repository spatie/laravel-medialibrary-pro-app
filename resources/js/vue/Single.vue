<template>
    <form method="POST" ref="form">
        <h1 class="h1 mt-16">Single image (avatar, …)</h1>

        <input type="hidden" name="_token" :value="csrfToken" />

        <p>
            <input type="text" name="name" placeholder="name" />
        </p>

        <media-single-component
            name="media"
            :before-upload="beforeUpload"
            :after-upload="afterUpload"
            :validation="{ accept: ['image/png'], maxSize: 1048576 }"
            :initial-value="initialValue"
            :initial-errors="initialErrors"
            :temp-endpoint="tempEndpoint"
            :translations="{ hint: 'Add a file please!', replace: 'Click or drag to replace' }"
        ></media-single-component>

        <p>
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-2">Submit</button>
        </p>
    </form>
</template>

<script>
import MediaSingleComponent from '@spatie/medialibrary-pro-vue-single';

export default {
    components: { MediaSingleComponent },

    methods: {
        beforeUpload() {
            return new Promise(resolve => {
                resolve();
            });
        },

        afterUpload({ success }) {
            if (success) {
                // TODO: need nextTick because thumbnail field isn't updated in the DOM yet when this method is called
                this.$nextTick(() => {
                    this.$refs.form.submit();
                });
            }
        },
    },

    data() {
        return {
            initialValue: window.oldValues.media,
            initialErrors: window.errors,
            tempEndpoint: window.tempEndpoint,
            csrfToken: window.csrfToken,
        };
    },
};
</script>
