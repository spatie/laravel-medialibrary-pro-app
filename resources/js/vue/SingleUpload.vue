<template>
    <div>
        <form :action="endpoint" method="POST">
            <slot />

            <media-library :endpoint="tempEndpoint" @loaded="setMediaLibrary">
                <template slot-scope="{ mediaLibrary }">
                    <input
                        type="file"
                        :accept="accept"
                        :multiple="multiple"
                        @change="e => handleUpload(e, mediaLibrary)"
                    />
                </template>
            </media-library>

            <div>
                <input
                    type="hidden"
                    name="file_name"
                    :value="JSON.stringify(value)"
                />
            </div>

            <button>Submit</button>
        </form>
    </div>
</template>

<script>
import MediaLibrary from "@spatie/medialibrary-pro-vue";

export default {
    props: {
        tempEndpoint: { required: true, type: String },
        endpoint: { required: true, type: String }
    },

    components: { MediaLibrary },

    data: () => ({
        accept: "",
        multiple: true,
        mediaLibrary: null
    }),

    computed: {
        value() {
            return this.mediaLibrary ? this.mediaLibrary.state.media : [];
        }
    },

    methods: {
        setMediaLibrary(mediaLibrary) {
            this.mediaLibrary = mediaLibrary;
        },

        handleUpload(changeEvent, mediaLibrary) {
            Array.from(changeEvent.target.files).forEach(file =>
                mediaLibrary.addFile(file)
            );
        }
    }
};
</script>
