<template>
    <Grid>
        <Field label="name">
            <Input name="name" id="name" placeholder="Your first name" v-model="value.name" />

            <error-message v-if="validationErrors && validationErrors.name">{{
                validationErrors.name[0]
            }}</error-message>
        </Field>

        <Field label="file">
            <media-library-attachment
                name="media"
                :initial-value="value.media"
                multiple
                :upload-endpoint="uploadEndpoint"
                :validation="{ accept: ['image/png', 'image/jpeg'] }"
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
            axios
                .post('', this.value)
                .then(res => {
                    if (res.data.success) {
                        this.validationErrors = {};
                        console.log('top!');
                        // TODO: show flash message
                    }
                })
                .catch(errors => {
                    this.validationErrors = errors.response.data.errors;
                    // TODO: show flash message
                });
        },
    },

    data() {
        return {
            value: {
                name: '',
                media: {},
            },
            validationErrors: window.errors,
            uploadEndpoint: window.uploadEndpoint,
            csrfToken: window.csrfToken,
        };
    },
};
</script>
