import * as React from 'react';
import MediaLibraryCollection from '../../../vendor/spatie/laravel-medialibrary-pro/ui/medialibrary-pro-react-collection/dist';
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
                            initialValue={window.oldValues.images || window.initialValues.images || {}}
                            uploadEndpoint={window.uploadEndpoint}
                            validation={{ accept: ['image/png', 'image/jpeg'] }}
                            validationErrors={window.errors}
                            maxItems={3}
                        ></MediaLibraryCollection>
                    </Field>

                    <Field label="Downloads">
                        <MediaLibraryCollection
                            name="downloads"
                            initialValue={window.oldValues.downloads || window.initialValues.downloads || {}}
                            uploadEndpoint={window.uploadEndpoint}
                            validation={{ accept: ['application/pdf'] }}
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
