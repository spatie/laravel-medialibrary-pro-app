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

                    <Csrf token={window.csrfToken}/>

                    <Field label="Name">
                <Input
                    name="name"
                    type="text"
                    placeholder="name"
                    defaultValue={window.oldValues.name}
                />
            </Field>

            <Field label="Files">
                <MediaLibraryCollection
                name="media"
                initialValue={window.oldValues.media}
                uploadEndpoint={window.uploadEndpoint}
                translations={{
                    hint: { plural: 'Add some files!', singular: 'Add a file!' },
                    replace: 'drag or click to replace',
                }}
                validation={{ accept: ['image/png'], maxSize: 1048576 }}
                validationErrors={window.errors}
                sortable
                beforeUpload={() => new Promise(resolve => resolve())}
                onIsReadyToSubmitChange={setIsReadyToSubmit}
                afterItems={({
                    getCustomPropertyInputProps,
                    getCustomPropertyInputErrors,
                    getNameInputProps,
                    getNameInputErrors,
                }) => (
                    <>
                        <div className="mb-2">
                            <input className="border rounded" placeholder="image name" {...getNameInputProps()} />
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
            </Field>

            <Button disabled={!isReadyToSubmit}>
                Submit
            </Button>
            </Grid>
        </form>
        </>
    );
}
