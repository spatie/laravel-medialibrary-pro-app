<template>
    <div>
        <medialibrary :endpoint="endpoint">
            <template slot-scope="{ mediaLibrary }">
                <input
                    type="file"
                    :accept="accept"
                    :multiple="multiple"
                    @change="e => handleUpload(e, mediaLibrary)"
                />
            </template>
        </medialibrary>
    </div>
</template>

<script>
import Medialibrary from "@spatie/medialibrary-pro-vue";

export default {
    props: {
        endpoint: { required: true, type: String }
    },

    components: { Medialibrary },

    data() {
        return {
            accept: "",
            multiple: true
        };
    },

    methods: {
        handleUpload(changeEvent, mediaLibrary) {
            Array.from(changeEvent.target.files).forEach(file =>
                mediaLibrary.addFile(file)
            );
        }
    }
};
</script>
