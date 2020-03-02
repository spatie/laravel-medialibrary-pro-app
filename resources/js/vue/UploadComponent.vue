<template>
    <div>
        <media-library :initial-media="initialValue" :endpoint="tempEndpoint">
            <div
                slot-scope="{
                    state,
                    removeMediaObject,
                    setMediaObjectProperty,
                    getImgProps,
                    getCustomPropertyInputProps,
                    getCustomPropertyInputListeners,
                    getNameInputProps,
                    getNameInputListeners,
                    getFileInputProps,
                    getFileInputListeners,
                }"
            >
                <media-form-values :name="name" :media-state="state.media" />

                <input
                    type="file"
                    :accept="accept"
                    :multiple="multiple"
                    v-bind="getFileInputProps()"
                    v-on="getFileInputListeners()"
                />

                <draggable v-model="state.media" @update="handleOrderChange(state.media, setMediaObjectProperty)">
                    <div
                        v-for="object in state.media"
                        :key="object.uuid"
                        style="border: 1px solid black; margin: 5px; padding: 3px; position: relative;"
                    >
                        <span
                            style="position: absolute; top: 5px; right: 5px; cursor: pointer;"
                            @click="removeMediaObject(object.uuid)"
                        >
                            x
                        </span>

                        <img v-bind="getImgProps(object)" style="height: 50px; width: 50px;" />

                        <progress max="100" :value="object.upload.uploadProgress" />

                        <input
                            placeholder="image name"
                            v-bind="getNameInputProps(object)"
                            v-on="getNameInputListeners(object)"
                        />

                        <input
                            placeholder="username (custom property)"
                            v-bind="getCustomPropertyInputProps(object, 'username')"
                            v-on="getCustomPropertyInputListeners(object, 'username')"
                        />

                        <input
                            placeholder="last name (custom property)"
                            v-bind="getCustomPropertyInputProps(object, 'lastname')"
                            v-on="getCustomPropertyInputListeners(object, 'lastname')"
                        />
                    </div>
                </draggable>
            </div>
        </media-library>
    </div>
</template>

<script>
import { MediaLibrary, MediaFormValues } from '@spatie/medialibrary-pro-vue';
import Draggable from 'vuedraggable';

export default {
    props: {
        name: { required: true, type: String },
        initialValue: { required: true, type: Array },
        errors: { default: [], type: Object | Array },
        tempEndpoint: { required: true, type: String },
    },

    components: { MediaLibrary, MediaFormValues, Draggable },

    data: () => ({
        accept: '',
        multiple: true,
    }),

    methods: {
        handleOrderChange(mediaState, setMediaObjectProperty) {
            mediaState.forEach((object, i) => {
                setMediaObjectProperty(object.uuid, 'order', i);
            });
        },
    },
};
</script>
