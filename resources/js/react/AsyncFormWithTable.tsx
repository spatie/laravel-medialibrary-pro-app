import * as React from 'react';
import MediaLibraryCollection from '../../../vendor/spatie/laravel-medialibrary-pro/ui/medialibrary-pro-react-collection';

export default function() {
    const [value, setValue] = React.useState(window.oldValues.media);

    function onSubmit() {
        console.log(value);
    }

    return (
        <div>
            <h1 className="h1">Async</h1>

            <p>
                <input
                    className="border"
                    name="name"
                    type="text"
                    placeholder="name"
                    defaultValue={window.oldValues.name}
                />
            </p>

            <MediaLibraryCollection
                name="media"
                initialValue={value}
                uploadEndpoint={window.uploadEndpoint}
                translations={{
                    hint: { plural: 'Add some files!', singular: 'Add a file!' },
                    replace: 'drag or click to replace',
                }}
                validation={{ accept: ['image/png'], maxSize: 1048576 }}
                validationErrors={window.errors}
                sortable
                onChange={setValue}
            >
                {({
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
            </MediaLibraryCollection>

            <button
                className="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-2"
                onClick={onSubmit}
            >
                Submit
            </button>
        </div>
    );
}
