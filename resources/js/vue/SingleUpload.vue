<template>
    <media-library
        :initial-media="initialValue"
        :endpoint="tempEndpoint"
        :resource-name="name"
    >
        <div slot-scope="{ mediaLibrary, mediaHelpers }">
            <input
                type="file"
                :accept="accept"
                :multiple="multiple"
                v-on="mediaHelpers.getFileInputListeners()"
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
                    <!-- {{ mediaLibrary.getFormInputs(media) }} ? -->
                    <input
                        v-for="key in Object.keys(mediaLibrary.value[i])"
                        :key="key"
                        type="hidden"
                        v-bind="mediaHelpers.getInputProps(media, key)"
                    />

                    <img
                        v-bind="mediaHelpers.getImgProps(media)"
                        style="height: 50px; width: 50px;"
                    />

                    <input
                        placeholder="image name"
                        v-bind="mediaHelpers.getInputProps(media, 'name')"
                        v-on="mediaHelpers.getInputListeners(media, 'name')"
                    />

                    <input
                        placeholder="username (custom property)"
                        v-bind="
                            mediaHelpers.getInputProps(
                                media,
                                'custom_properties.username'
                            )
                        "
                        v-on="
                            mediaHelpers.getInputListeners(
                                media,
                                'custom_properties.username'
                            )
                        "
                    />

                    <input
                        placeholder="last name (custom property)"
                        v-bind="
                            mediaHelpers.getInputProps(
                                media,
                                'custom_properties.lastname'
                            )
                        "
                        v-on="
                            mediaHelpers.getInputListeners(
                                media,
                                'custom_properties.lastname'
                            )
                        "
                    />

                    <!-- Figure out a good way to get an object's error (below code depends on the index, which changes when changing the order of the objects) -->
                    <!-- <p style="color: red;">{{ errors[`${name}.${i}.name`] }}</p> -->
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
        name: { required: true, type: String },
        initialValue: { required: true, type: Array },
        errors: { default: [], type: Object | Array },
        tempEndpoint: { required: true, type: String }
    },

    components: { MediaLibrary, Draggable },

    data: () => ({
        accept: "",
        multiple: true
    }),

    methods: {
        handleOrderChange(mediaLibrary) {
            mediaLibrary.state.media = mediaLibrary.state.media.map(
                (object, i) => ({
                    ...object,
                    order: i
                })
            );
        }
    }
};
</script>
