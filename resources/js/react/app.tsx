import * as React from 'react';
import ReactDOM from 'react-dom';

import FormWithTable from './FormWithTable';
import Single from './Single';

ReactDOM.render(
    <div>
        <FormWithTable />

        <Single />
    </div>,
    document.getElementById('app')
);
