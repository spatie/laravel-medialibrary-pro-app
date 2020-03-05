import * as React from 'react';
import ReactDOM from 'react-dom';
import MediaLibraryClass from '@spatie/medialibrary-pro-core';

import MediaTableComponent from '@spatie/medialibrary-pro-react-table'

declare const window: {
    oldValues: { name: string; media: MediaLibraryClass['state']['media'] };
    errors: { [key: string]: string };
    tempEndpoint: string;
};

ReactDOM.render(
    <div>
        <MediaTableComponent
            name="media"
            initialValue={window.oldValues.media}
            errors={window.errors}
            tempEndpoint={window.tempEndpoint}
        ></MediaTableComponent>
    </div>,
    document.getElementById('app')
);
