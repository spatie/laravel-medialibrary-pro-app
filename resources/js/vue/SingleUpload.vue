<template>
    <media-library :initial-media="old" :endpoint="tempEndpoint">
        <template slot-scope="{ mediaLibrary }">
            <input
                type="file"
                :accept="accept"
                :multiple="multiple"
                @change="e => handleUpload(e, mediaLibrary)"
            />

            <div
                v-for="(media, i) in mediaLibrary.state.media"
                :key="media.uuid"
                style="border: 1px solid black; margin: 5px; padding: 3px;"
            >
                <template v-for="key in Object.keys(mediaLibrary.value[i])">
                    <input
                        :key="key"
                        :name="`media[${i}][${key}]`"
                        type="hidden"
                        :value="
                            ['string', 'number'].includes(
                                typeof mediaLibrary.value[i][key]
                            )
                                ? mediaLibrary.value[i][key]
                                : JSON.stringify(mediaLibrary.value[i][key])
                        "
                    />
                </template>

                <img
                    :src="media.preview || media.thumbnail"
                    style="height: 50px; width: 50px;"
                />

                <p>uuid: {{ media.uuid }}</p>

                <p>
                    name:
                    <input
                        type="text"
                        :value="media.name"
                        @change="
                            mediaLibrary.setMediaObjectName(
                                media.uuid,
                                $event.target.value
                            )
                        "
                    />
                </p>
            </div>
        </template>
    </media-library>
</template>

<script>
import MediaLibrary from "@spatie/medialibrary-pro-vue";

export default {
    props: {
        old: { required: true, type: Array },
        tempEndpoint: { required: true, type: String }
    },

    components: { MediaLibrary },

    data: () => ({
        accept: "",
        multiple: true
    }),

    methods: {
        handleUpload(changeEvent, mediaLibrary) {
            Array.from(changeEvent.target.files).forEach(file =>
                mediaLibrary.addFile(file)
            );
        }
    }
};
</script>
