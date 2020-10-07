<template>
    <Grid>
        <div v-if="Object.keys(validationErrors).length" class="rounded-sm mb-8 px-4 py-2 bg-red-100 text-red-500">
            Please correct the errors in the form
        </div>

        <div v-if="isUploadSuccess" class="rounded-sm mb-8 px-4 py-2 bg-green-100 text-green-500">
            Your form has been submitted
        </div>

        <Field label="name">
            <Input name="name" id="name" placeholder="Your first name" v-model="value.name" />

            <error-message v-if="validationErrors && validationErrors.name">{{
                validationErrors.name[0]
            }}</error-message>
        </Field>

        <Field label="file">
            <media-library-attachment
                ref="mediacomponent"
                name="media"
                :initial-value="value.media"
                multiple
                :upload-endpoint="uploadEndpoint"
                :validation="{ accept: ['image/png', 'image/jpeg', 'application/pdf'] }"
                :validation-errors="validationErrors"
                @change="onChange"
            ></media-library-attachment>
        </Field>

        <Button type="button" @click="onSubmit">Submit</Button>
    </Grid>
</template>

<script>
import MediaLibraryAttachment from '../../../vendor/spatie/laravel-medialibrary-pro/ui/medialibrary-pro-vue-attachment';
import Button from './components/Button';
import Field from './components/Field';
import Input from './components/Input';
import Grid from './components/Grid';
import ErrorMessage from './components/ErrorMessage';

export default {
    components: { MediaLibraryAttachment, Button, Field, Input, Grid, ErrorMessage },

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

                        this.$refs.mediacomponent.mediaLibrary.changeState(state => {
                            state.media = [];
                        });
                    }
                })
                .catch(error => {
                    if (error && error.response && error.response.data) {
                        this.validationErrors = error.response.data.errors;
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
            uploadEndpoint: window.uploadEndpoint,
            isUploadSuccess: false,
        };
    },
};
</script>
