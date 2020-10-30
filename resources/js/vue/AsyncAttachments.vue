<template>
    <div>
        <page-title>Vue: attachments with async submit</page-title>

        <div
            v-if="Object.keys(validationErrors).length || isUploadSuccess"
            class="rounded-sm mb-8 px-4 py-2"
            :class="Object.keys(validationErrors).length ? 'bg-red-100 text-red-500' : 'bg-green-100 text-green-500'"
        >
            <template v-if="Object.keys(validationErrors).length">
                Please correct the errors in the form
            </template>
            <template v-else>
                Your form has been submitted
            </template>
        </div>

        <Grid>
            <Field label="name">
                <Input name="name" id="name" placeholder="Your first name" :value="value.name" @input="value.name = $event.target.value" />

                <error-message v-if="validationErrors && validationErrors.name">{{
                    validationErrors.name[0]
                }}</error-message>
            </Field>

            <Field label="file">
                <media-library-attachment
                    ref="mediaComponent"
                    name="media"
                    :initial-value="value.media"
                    :validation-rules="{ accept: ['image/png', 'image/jpeg', 'application/pdf'] }"
                    :validation-errors="validationErrors"
                    multiple
                    @change="onChange"
                ></media-library-attachment>
            </Field>

            <Button type="button" @click="onSubmit" dusk="submit">Submit</Button>
        </Grid>
    </div>
</template>

<script>
import { MediaLibraryAttachment } from 'media-library-pro-vue3-attachment';
import Button from './components/Button';
import Field from './components/Field';
import Input from './components/Input';
import Grid from './components/Grid';
import PageTitle from './components/PageTitle';
import ErrorMessage from './components/ErrorMessage';

export default {
    components: { MediaLibraryAttachment, Button, Field, Input, Grid, ErrorMessage, PageTitle },

    methods: {
        onChange(media) {
            this.value.media = media;
        },

        onSubmit() {
            this.isUploadSuccess = false;
            this.validationErrors = {};

            axios
                .post('', this.value)
                .then(res => {
                    if (res.data.success) {
                        this.isUploadSuccess = true;
                        this.value = { name: '', media: {} };

                        this.$refs.mediaComponent.mediaLibrary.changeState(state => {
                            state.media = [];
                        });
                    }
                })
                .catch(error => {
                    console.error(error);

                    if (error && error.response && error.response.data) {
                        this.validationErrors = error.response.data.errors || {};
                    }
                });
        },
    },

    data() {
        return {
            value: {
                name: '',
                media: {},
            },
            validationErrors: {},
            isUploadSuccess: false,
        };
    },
};
</script>
