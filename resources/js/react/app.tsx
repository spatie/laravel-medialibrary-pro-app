import * as React from 'react';
import ReactDOM from 'react-dom';
import MediaLibraryClass from '@spatie/medialibrary-pro-core';

import MediaTableComponent from '@spatie/medialibrary-pro-react-table';

declare const window: {
    oldValues: { name: string; media: MediaLibraryClass['state']['media'] };
    errors: { [key: string]: string };
    tempEndpoint: string;
};

ReactDOM.render(
    <div>
        <MediaTableComponent name="media" initialValue={window.oldValues.media} tempEndpoint={window.tempEndpoint}>
            {({ getCustomPropertyInputProps }) => (
                <>
                    <div className="mb-2">
                        <input className="border rounded" placeholder="tags" {...getCustomPropertyInputProps('tags')} />
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
    </div>,
    document.getElementById('app')
);

/* errors={window.errors} */
/* { getCustomPropertyErrors('caption').map(error => <p>{error}</p>) } */
