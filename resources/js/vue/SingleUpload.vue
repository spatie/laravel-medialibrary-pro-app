<template>
    <media-library :initial-media="old" :endpoint="tempEndpoint">
        <div slot-scope="{ mediaLibrary }">
            <input
                type="file"
                :accept="accept"
                :multiple="multiple"
                @change="e => handleUpload(e, mediaLibrary)"
            />

            <draggable
                v-model="mediaLibrary.state.media"
                @update="handleOrderChange(mediaLibrary)"
            >
                <div
                    v-for="(media, i) in mediaLibrary.state.media"
                    :key="media.uuid"
                    style="border: 1px solid black; margin: 5px; padding: 3px;"
                >
                    <input
                        v-for="key in Object.keys(mediaLibrary.value[i])"
                        :key="key"
                        :name="`media[${i}][${key}]`"
                        type="hidden"
                        :value="getValue(mediaLibrary.value[i][key])"
                    />

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
            </draggable>
        </div>
    </media-library>
</template>

<script>
import MediaLibrary from "@spatie/medialibrary-pro-vue";
import Draggable from "vuedraggable";

export default {
    props: {
        old: { required: true, type: Array },
        tempEndpoint: { required: true, type: String }
    },

    components: { MediaLibrary, Draggable },

    data: () => ({
        accept: "",
        multiple: true
    }),

    methods: {
        handleUpload(changeEvent, mediaLibrary) {
            Array.from(changeEvent.target.files).forEach(file =>
                mediaLibrary.addFile(file)
            );
        },

        getValue(value) {
            if (value === undefined || value === null) {
                return null;
            }

            return ["string", "number"].includes(typeof value)
                ? value
                : JSON.stringify(value);
        },

        handleOrderChange(mediaLibrary) {
            mediaLibrary.state.media = mediaLibrary.state.media.map((object, i) => ({
                ...object,
                order: i
            }));
        }
    }
};
</script>
