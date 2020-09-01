import * as React from 'react';
import MediaLibraryCollection from '../../../vendor/spatie/laravel-medialibrary-pro/ui/medialibrary-pro-react-collection/dist';
import H2 from './components/H2';
import Button from './components/Button';
import Grid from './components/Grid';
import Field from './components/Field';
import Input from './components/Input';

export default function() {
    const [value, setValue] = React.useState(window.oldValues.media);
    const [validationErrors, setValidationErrors] = React.useState(window.errors);

    function onSubmit() {
        console.log(value);

        setValidationErrors({
            [`media.${Object.keys(value)[0]}.custom_properties.tags`]: ['Field is required (this is a dummy error)'],
        });
    }

    return (
        <div>
            <H2>React: async collection</H2>

            <Grid>
            <Field label="name">
                <Input
                    name="name"
                    type="text"
                    placeholder="name"
                    defaultValue={window.oldValues.name}
                />
            </Field>

            <Field label="files">
            <MediaLibraryCollection
                name="media"
                initialValue={value}
                uploadEndpoint={window.uploadEndpoint}
                translations={{
                    hint: { plural: 'Add some files!', singular: 'Add a file!' },
                    replace: 'drag or click to replace',
                }}
                validation={{ accept: ['image/png'], maxSize: 1048576 }}
                validationErrors={validationErrors}
                sortable
                onChange={setValue}
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

            <Button onClick={onSubmit}>
                Submit
            </Button>
            </Grid>
        </div>
    );
}
