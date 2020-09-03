<template>
    <Grid>
        <Field label="name">
            <Input name="name" id="name" placeholder="Your first name" v-model="name" />
        </Field>

        <Field label="file">
            <media-library-attachment
                name="media"
                :validation="{ accept: ['image/png'], maxSize: 1048576 }"
                :initial-value="value"
                :validation-errors="validationErrors"
                :upload-endpoint="uploadEndpoint"
                :translations="{ hint: 'Add a file please!', replace: 'Click or drag to replace' }"
                @change="onChange"
            ></media-library-attachment>
        </Field>

        <Button @click="onSubmit">Submit</Button>
    </Grid>
</template>

<script>
import MediaLibraryAttachment from '../../../vendor/spatie/laravel-medialibrary-pro/ui/medialibrary-pro-vue-attachment';
import Button from './components/Button';
import Field from './components/Field';
import Input from './components/Input';
import Grid from './components/Grid';

export default {
    components: { MediaLibraryAttachment, Button, Field, Input, Grid },

    methods: {
        onChange(value) {
            this.value = value;
        },

        onSubmit() {
            console.log('submitting', this.value);
            // axios.post().catch(errors => this.validationErrors = errors)

            const firstUuid = Object.values(this.value)[0].uuid;
            this.validationErrors = { [firstUuid]: 'error' };
        },
    },

    data() {
        return {
            name: '',
            value: window.oldValues.media,
            validationErrors: window.errors,
            uploadEndpoint: window.uploadEndpoint,
            csrfToken: window.csrfToken,
        };
    },
};
</script>
