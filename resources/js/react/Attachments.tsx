import * as React from 'react';
import { MediaLibraryAttachment } from 'media-library-pro-react-attachment';
import PageTitle from './components/PageTitle';
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

            <PageTitle>React: multiple attachment</PageTitle>

            <Grid>
                <Field label="name">
                    <Input name="name" placeholder="Your first name" type="text" defaultValue={window.oldValues.name} />
                    <ErrorMessage>{window.errors.name}</ErrorMessage>
                </Field>

                <Field label="files">
                    <MediaLibraryAttachment
                        name="media"
                        initialValue={window.oldValues.media}
                        validationRules={{ accept: ['image/png', 'image/jpeg', 'application/pdf'] }}
                        validationErrors={window.errors}
                        multiple
                    />
                </Field>

                <Button dusk="submit">Submit</Button>
            </Grid>
        </form>
    );
}
