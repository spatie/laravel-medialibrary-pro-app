import * as React from 'react';
import ReactDOM from 'react-dom';

import Single from './Single';
import FormWithTable from './FormWithTable';

const single = document.getElementById('single');
if (single) {
    ReactDOM.render(
        <div>
            <Single />
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
