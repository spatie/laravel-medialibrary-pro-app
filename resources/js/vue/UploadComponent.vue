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

                        <div class="relative w-32 h-32 cursor-pointer overflow-hidden" @click="() => {}">
                            <img v-bind="getImgProps(object)" class="h-full w-full object-cover" />
                            <div class="absolute inset-0 opacity-0 hover:opacity-50 hover:bg-red-500 duration-150">
                                <p class="text-center m-auto text-white">Click here or drag a file to add media…</p>
                            </div>
                        </div>

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
import 'react-dragula/dist/dragula.min.css';
import { Medialibrary, MediaFormValues } from '@spatie/medialibrary-pro-vue';
import Vue from 'vue';

export default {
    props: {
        name: { required: true, type: String },
        initialValue: { required: true, type: Array },
        errors: { default: [], type: Object | Array },
        tempEndpoint: { required: true, type: String },
    },

    components: { Medialibrary, MediaFormValues },

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
