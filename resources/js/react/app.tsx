import * as React from 'react';
import ReactDOM from 'react-dom';

import Single from './Single';
import FormWithTable from './FormWithTable';
import AsyncSingle from './AsyncSingle';

const single = document.getElementById('single');
if (single) {
    ReactDOM.render(
        <div>
            <h2>Sync (form submit, uploads automatically)</h2>
            <Single />

            <br />
            <br />

            <h2>Async (axios)</h2>
            <AsyncSingle />
        </div>,
        single
    );
}

const multiple = document.getElementById('multiple');
if (multiple) {
    ReactDOM.render(
        <div>
            <FormWithTable />
        </div>,
        multiple
    );
}
