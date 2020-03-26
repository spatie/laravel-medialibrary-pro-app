import * as React from 'react';
import ReactDOM from 'react-dom';

import Single from './Single';
import FormWithTable from './FormWithTable';

ReactDOM.render(
    <div>
        <Single />
    </div>,
    document.getElementById('single')
);


ReactDOM.render(
    <div>
        <FormWithTable />
    </div>,
    document.getElementById('multiple')
);
