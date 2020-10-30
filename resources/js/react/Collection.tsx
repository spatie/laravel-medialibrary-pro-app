import * as React from 'react';
import { MediaLibraryCollection } from 'media-library-pro-react-collection';
import PageTitle from './components/PageTitle';
import Grid from './components/Grid';
import Csrf from './components/Csrf';
import Field from './components/Field';
import Input from './components/Input';
import Button from './components/Button';
import ErrorMessage from './components/ErrorMessage';

export default function Collection() {
    return (
        <>
            <PageTitle>React: collection</PageTitle>

            <form method="POST">
                <Grid>
                    <Csrf token={window.csrfToken} />

                    <Field label="Name">
                        <Input
                            name="name"
                            type="text"
                            placeholder="Your first name"
                            defaultValue={window.oldValues.name || window.name}
                        />
                        <ErrorMessage>{window.errors.name}</ErrorMessage>
                    </Field>

                    <Field label="Images">
                        <MediaLibraryCollection
                            name="images"
                            initialValue={window.initialValues.images}
                            validationRules={{ accept: ['image/png', 'image/jpeg'] }}
                            validationErrors={window.errors}
                            maxItems={3}
                        ></MediaLibraryCollection>
                    </Field>

                    <Field label="Downloads">
                        <MediaLibraryCollection
                            name="downloads"
                            initialValue={window.initialValues.downloads}
                            validationRules={{ accept: ['application/pdf'] }}
                            validationErrors={window.errors}
                            maxItems={2}
                        ></MediaLibraryCollection>
                    </Field>

                    <Button dusk="submit">Submit</Button>
                </Grid>
            </form>
        </>
    );
}
