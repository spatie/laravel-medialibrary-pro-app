import * as React from 'react';
import MediaTableComponent from '@spatie/medialibrary-pro-react-table';

export default function() {
    const [value, setValue] = React.useState(window.oldValues.media);

    function submit() {
        console.log(value);
    }

    return (
        <div>
            <h1 className="h1">Async</h1>

            <MediaTableComponent
                name="media"
                initialValue={value}
                tempEndpoint={window.tempEndpoint}
                translations={{
                    hint: { plural: 'Add some files!', singular: 'Add a file!' },
                    replace: 'drag or click to replace',
                }}
                validation={{ accept: ['image/png'], maxSize: 1048576 }}
                validationErrors={window.errors}
                dragEnabled
                onChange={setValue}
            >
                {({ getCustomPropertyInputProps, getCustomPropertyInputErrors }) => (
                    <>
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
            </MediaTableComponent>

            <button
                className="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-2"
                onClick={submit}
            >
                Submit
            </button>
        </div>
    );
}
