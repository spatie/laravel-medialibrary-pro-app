import * as React from 'react';
import MediaLibraryCollection from '../../../vendor/spatie/laravel-medialibrary-pro/ui/medialibrary-pro-react-collection/dist';
import H2 from './components/H2';
import Grid from './components/Grid';
import Csrf from './components/Csrf';
import Field from './components/Field';
import Input from './components/Input';
import Button from './components/Button';

export default function Collection() {
    const [isReadyToSubmit, setIsReadyToSubmit] = React.useState(true);

    return (
        <>
            <H2>React: collection</H2>

            <form method="POST">
                <Grid>
                    <Csrf token={window.csrfToken} />

                    <Field label="Name">
                        <Input name="name" type="text" placeholder="name" defaultValue={window.oldValues.name} />
                        <p className="text-red-500 text-sm">{window.errors.name}</p>
                    </Field>

                    <Field label="Images">
                        <MediaLibraryCollection
                            name="images"
                            initialValue={window.oldValues.images}
                            uploadEndpoint={window.uploadEndpoint}
                            translations={{
                                hint: { plural: 'Add some files!', singular: 'Add a file!' },
                                replace: 'drag or click to replace',
                            }}
                            validation={{ accept: ['image/*'], maxSize: 1048576 }}
                            validationErrors={window.errors}
                            sortable
                            beforeUpload={() => new Promise(resolve => resolve())}
                            onIsReadyToSubmitChange={setIsReadyToSubmit}
                        ></MediaLibraryCollection>

                        <p className="text-red-500 text-sm">{window.errors.images}</p>
                    </Field>

                    <Field label="Downloads">
                        <MediaLibraryCollection
                            name="downloads"
                            initialValue={window.oldValues.downloads}
                            uploadEndpoint={window.uploadEndpoint}
                            translations={{
                                hint: { plural: 'Add some files!', singular: 'Add a file!' },
                                replace: 'drag or click to replace',
                            }}
                            validation={{ accept: ['image/*'], maxSize: 1048576 }}
                            validationErrors={window.errors}
                            sortable
                            beforeUpload={() => new Promise(resolve => resolve())}
                            onIsReadyToSubmitChange={setIsReadyToSubmit}
                            fieldsView={({
                                getCustomPropertyInputProps,
                                getCustomPropertyInputErrors,
                                getNameInputProps,
                                getNameInputErrors,
                            }) => (
                                <>
                                    <div className="mb-2">
                                        <input
                                            className="border rounded"
                                            placeholder="image name"
                                            {...getNameInputProps()}
                                        />
                                        {getNameInputErrors().map(error => (
                                            <p key={error} className="text-red-500">
                                                {error}
                                            </p>
                                        ))}
                                    </div>

                                    <div className="mb-2">
                                        <input
                                            className="border rounded"
                                            placeholder="tags"
                                            {...getCustomPropertyInputProps('tags')}
                                        />
                                        {getCustomPropertyInputErrors('tags').map(error => (
                                            <p key={error} className="text-red-500">
                                                {error}
                                            </p>
                                        ))}
                                    </div>

                                    <div className="mb-2">
                                        <input
                                            className="border rounded"
                                            placeholder="caption"
                                            {...getCustomPropertyInputProps('caption')}
                                        />
                                        {getCustomPropertyInputErrors('caption').map(error => (
                                            <p key={error} className="text-red-500">
                                                {error}
                                            </p>
                                        ))}
                                    </div>
                                </>
                            )}
                        ></MediaLibraryCollection>

                        <p className="text-red-500 text-sm">{window.errors.downloads}</p>
                    </Field>

                    <Button disabled={!isReadyToSubmit}>Submit</Button>
                </Grid>
            </form>
        </>
    );
}
