import * as React from 'react';
import { MediaLibraryCollection } from 'media-library-pro-react-collection';
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
                            initialValue={window.initialValues.images}
                            validationRules={{ accept: ['image/png', 'image/jpeg'] }}
                            validationErrors={window.errors}
                            maxItems={3}
                            fieldsView={({
                                getCustomPropertyInputProps,
                                getCustomPropertyInputErrors,
                                getNameInputErrors,
                                getNameInputProps,
                            }) => (
                                <div className="media-library-properties">
                                    <div className="media-library-field">
                                        <label className="media-library-label">Name</label>
                                        <input
                                            className="media-library-input"
                                            {...getNameInputProps()}
                                            {...{ dusk: 'media-library-field-name' }}
                                        />

                                        {getNameInputErrors().map((error) => (
                                            <p key={error} className="media-library-text-error">
                                                {error}
                                            </p>
                                        ))}
                                    </div>

                                    <div className="media-library-field">
                                        <label className="media-library-label">Extra field</label>
                                        <input
                                            className="media-library-input"
                                            {...getCustomPropertyInputProps('extra_field')}
                                            {...{ dusk: 'media-library-extra-field' }}
                                        />

                                        {getCustomPropertyInputErrors('extra_field').map((error: string) => (
                                            <p key={error} className="media-library-text-error">
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
