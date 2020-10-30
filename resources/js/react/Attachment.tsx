import * as React from 'react';
import { MediaLibraryAttachment } from 'media-library-pro-react-attachment';
import H2 from './components/PageTitle';
import Field from './components/Field';
import Input from './components/Input';
import Csrf from './components/Csrf';
import Grid from './components/Grid';
import Button from './components/Button';
import ErrorMessage from './components/ErrorMessage';

export default function Attachment() {
    return (
        <>
            <H2>React: attachment</H2>

            <form method="POST">
                <Grid>
                    <Csrf token={window.csrfToken} />

                    <Field label="name">
                        <Input
                            name="name"
                            placeholder="Your first name"
                            type="text"
                            defaultValue={window.oldValues.name}
                        />

                        <ErrorMessage>{window.errors.name}</ErrorMessage>
                    </Field>

                    <Field label="file">
                        <MediaLibraryAttachment
                            name="media"
                            initialValue={window.oldValues.media}
                            validationRules={{ accept: ['image/png', 'image/jpeg', 'application/pdf'] }}
                            validationErrors={window.errors}
                        ></MediaLibraryAttachment>
                    </Field>

                    <Button dusk="submit">Submit</Button>
                </Grid>
            </form>
        </>
    );
}
