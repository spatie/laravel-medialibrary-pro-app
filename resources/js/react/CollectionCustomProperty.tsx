import * as React from 'react';
import { MediaLibraryCollection } from '../../../vendor/spatie/laravel-medialibrary-pro/ui/medialibrary-pro-react-collection';
import PageTitle from './components/PageTitle';
import Grid from './components/Grid';
import Csrf from './components/Csrf';
import Field from './components/Field';
import Input from './components/Input';
import Button from './components/Button';
import ErrorMessage from './components/ErrorMessage';

export default function CollectionCustomProperty() {
    return (
        <>
            <PageTitle>React: collection with custom property</PageTitle>

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
                            fieldsView={({
                                getCustomPropertyInputProps,
                                getCustomPropertyInputErrors,
                                getNameInputErrors,
                                getNameInputProps,
                            }) => (
                                <div className="medialibrary-properties">
                                    <div className="medialibrary-field">
                                        <label className="medialibrary-label">Name</label>
                                        <input
                                            className="medialibrary-input"
                                            {...getNameInputProps()}
                                            {...{ dusk: 'medialibrary-field-name' }}
                                        />

                                        {getNameInputErrors().map(error => (
                                            <p key={error} className="medialibrary-text-error">
                                                {error}
                                            </p>
                                        ))}
                                    </div>

                                    <div className="medialibrary-field">
                                        <label className="medialibrary-label">Extra field</label>
                                        <input
                                            className="medialibrary-input"
                                            {...getCustomPropertyInputProps('extra_field')}
                                            {...{ dusk: 'medialibrary-extra-field' }}
                                        />

                                        {getCustomPropertyInputErrors('extra_field').map(error => (
                                            <p key={error} className="medialibrary-text-error">
                                                {error}
                                            </p>
                                        ))}
                                    </div>
                                </div>
                            )}
                        ></MediaLibraryCollection>
                    </Field>

                    <Button dusk="submit">Submit</Button>
                </Grid>
            </form>
        </>
    );
}
