import * as React from 'react';
import MediaTableComponent from '@spatie/medialibrary-pro-react-table';

export default function() {
    return (
        <form action="multi-upload" method="POST">
            <h1 className="h1">Form with Table</h1>

            <input type="hidden" name="_token" defaultValue={window.csrfToken}></input>

            <p>
                <input name="name" type="text" placeholder="name" defaultValue={window.oldValues.name} />
            </p>

            <MediaTableComponent
                name="media"
                initialValue={window.oldValues.media}
                tempEndpoint={window.tempEndpoint}
                strings={{
                    hint: { plural: 'Add some files!', singular: 'Add a file!' },
                    replace: 'drag or click to replace',
                }}
                validation={{ accept: ['image/png'], maxSize: 1024000 }}
                initialErrors={window.errors}
                dragEnabled
                beforeUpload={() => new Promise(resolve => resolve())}
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

            <button className="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-2">
                Submit
            </button>
        </form>
    );
}
