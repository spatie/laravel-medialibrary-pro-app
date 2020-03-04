<template>
    <div>
        <medialibrary :initial-media="initialValue" :endpoint="tempEndpoint" ref="medialibrary">
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
                    replaceObjectMedia,
                }"
            >
                <media-form-values :name="name" :media-state="state.media" />

                <div class="cursor-pointer p-4 border border-dashed" @click="$refs.fileInputRef.click()">
                    <!-- TODO: dropzone -->
                    <p class="text-center">Click here or drag a file to add media…</p>
                </div>

                <input
                    ref="fileInputRef"
                    type="file"
                    class="hidden"
                    :accept="accept"
                    :multiple="multiple"
                    v-bind="getFileInputProps()"
                    v-on="getFileInputListeners()"
                />

                <div v-dragula="state.media" bag="dragula-bag">
                    <div
                        v-for="object in state.media"
                        :key="object.uuid"
                        class="border m-2 p-2 relative"
                        :data-medialibrary-uuid="object.uuid"
                    >
                        <span
                            style="top: 5px; right: 5px;"
                            class="absolute cursor-pointer"
                            @click="removeMediaObject(object)"
                        >
                            x
                        </span>

                        <preview-image
                            :getImgProps="() => getImgProps(object)"
                            @replace="replaceObjectMedia(object, $event)"
                        ></preview-image>

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
                </div>
            </div>
        </medialibrary>
    </div>
</template>

<script>
import Vue from 'vue';
import VueDragula from 'vue-dragula';
import 'dragula/dist/dragula.min.css';
import { Medialibrary, MediaFormValues } from '@spatie/medialibrary-pro-vue';
import PreviewImage from './PreviewImage';

Vue.use(VueDragula);

export default {
    props: {
        name: { required: true, type: String },
        initialValue: { required: true, type: Array },
        errors: { default: [], type: Object | Array },
        tempEndpoint: { required: true, type: String },
    },

    components: { Medialibrary, MediaFormValues, PreviewImage },

    data: () => ({
        accept: '',
        multiple: true,
        medialibrary: null,
    }),

    created() {
        Vue.vueDragula.eventBus.$on('dragend', e => {
            this.$refs.medialibrary.setMediaOrder(
                Array.from(e[1].parentElement?.children || []).map(object => {
                    return object.getAttribute('data-medialibrary-uuid');
                }),
                false
            );
        });
    },
};
</script>
