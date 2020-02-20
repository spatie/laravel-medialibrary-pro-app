<template>
    <div>
        <medialibrary endpoint="temp_upload">
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
