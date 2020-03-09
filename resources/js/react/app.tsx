import * as React from 'react';
import ReactDOM from 'react-dom';

import FormWithTable from './FormWithTable';

ReactDOM.render(
    <div>
        <FormWithTable />
    </div>,
    document.getElementById('app')
);

/* errors={window.errors} */
/* { getCustomPropertyErrors('caption').map(error => <p>{error}</p>) } */
