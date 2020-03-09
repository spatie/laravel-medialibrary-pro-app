import * as React from 'react';
import MediaTableComponent from '@spatie/medialibrary-pro-react-table';

export default function() {
    return (
        <>
            <MediaTableComponent name="media" initialValue={window.oldValues.media} tempEndpoint={window.tempEndpoint}>
                {({ getCustomPropertyInputProps }) => (
                    <>
                        <div className="mb-2">
                            <input
                                className="border rounded"
                                placeholder="tags"
                                {...getCustomPropertyInputProps('tags')}
                            />
                        </div>

                        <div className="mb-2">
                            <input
                                className="border rounded"
                                placeholder="caption"
                                {...getCustomPropertyInputProps('caption')}
                            />
                        </div>
                    </>
                )}
            </MediaTableComponent>

            <button className="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-2">
                Submit
            </button>
        </>
    );
}
