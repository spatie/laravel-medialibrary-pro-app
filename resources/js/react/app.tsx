import * as React from 'react';
import ReactDOM from 'react-dom';
import MedialibraryClass from '@spatie/medialibrary-pro-core';

import TableComponent from '@spatie/medialibrary-pro-react-table'

declare const window: {
    oldValues: { name: string; media: MedialibraryClass['state']['media'] };
    errors: { [key: string]: string };
    tempEndpoint: string;
};

ReactDOM.render(
    <div>
        <TableComponent
            name="media"
            initialValue={window.oldValues.media}
            errors={window.errors}
            tempEndpoint={window.tempEndpoint}
        ></TableComponent>
    </div>,
    document.getElementById('app')
);
