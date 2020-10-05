import * as React from 'react';
import MediaLibraryAttachment from '../../../vendor/spatie/laravel-medialibrary-pro/ui/medialibrary-pro-react-attachment/dist';
import { MediaLibrary } from 'medialibrary-pro-core/dist/types';
import H2 from './components/H2';
import Button from './components/Button';
import Field from './components/Field';
import Grid from './components/Grid';
import ErrorMessage from './components/ErrorMessage';
import Input from './components/Input';

export default function AsyncAttachments() {
    function submit() {
        // This can also be placed in the `afterUpload` prop of the component
        /* TODO:
        axios.post(…)
        .catch(errors => {
            setValidationErrors(errors);
        });
        */
    }

    const [value, setValue] = React.useState(window.oldValues.media);
    const [validationErrors, setValidationErrors] = React.useState<MediaLibrary.State['validationErrors']>();

    return (
        <div>
            <H2>React: attachments with async submit</H2>

            <Grid>
                <Field label="Name">
                    <Input
                        name="name"
                        type="text"
                        placeholder="Your first name"
                        defaultValue={window.oldValues.name || window.name}
                    />
                    <ErrorMessage>{window.errors.name}</ErrorMessage>
                </Field>

                <Field label="file">
                    <MediaLibraryAttachment
                        name="media"
                        initialValue={value}
                        multiple
                        uploadEndpoint={window.uploadEndpoint}
                        validation={{ accept: ['image/png', 'image/jpeg'] }}
                        validationErrors={validationErrors}
                        onChange={setValue}
                    ></MediaLibraryAttachment>
                </Field>

                <Button onClick={submit} dusk="submit">
                    Submit
                </Button>
            </Grid>
        </div>
    );
}
