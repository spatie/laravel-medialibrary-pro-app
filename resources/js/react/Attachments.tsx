import * as React from 'react';
import MediaLibraryAttachment from '../../../vendor/spatie/laravel-medialibrary-pro/ui/medialibrary-pro-react-attachment/dist';
import H2 from './components/H2';
import Field from './components/Field';
import Grid from './components/Grid';
import Button from './components/Button';
import Csrf from './components/Csrf';
import Input from './components/Input';
import ErrorMessage from './components/ErrorMessage';

export default function Attachments() {
    return (
        <form method="POST">
            <Csrf token={window.csrfToken} />

            <H2>React: multiple attachment</H2>

            <Grid>
                <Field label="name">
                    <Input name="name" placeholder="Your first name" type="text" defaultValue={window.oldValues.name} />
                    <ErrorMessage>{window.errors.name}</ErrorMessage>
                </Field>

                <Field label="files">
                    <MediaLibraryAttachment
                        name="media"
                        initialValue={window.oldValues.media}
                        uploadEndpoint="/temp-upload"
                        validation={{ accept: ['image/png', 'image/jpeg', 'application/pdf'] }}
                        validationErrors={window.errors}
                        multiple
                    />
                </Field>

                <Button dusk="submit">Submit</Button>
            </Grid>
        </form>
    );
}
