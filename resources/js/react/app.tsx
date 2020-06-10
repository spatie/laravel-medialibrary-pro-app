import * as React from 'react';
import ReactDOM from 'react-dom';

import Single from './Single';
import FormWithTable from './FormWithTable';
import AsyncSingle from './AsyncSingle';
import AsyncFormWithTable from './AsyncFormWithTable';

const isAsync = window.location.search.includes('async=true');

const single = document.getElementById('single');
if (single) {
    ReactDOM.render(
        <div>
            {isAsync ? (
                <>
                    <h2>Async (axios)</h2>
                    <AsyncSingle />
                </>
            ) : (
                <>
                    <h2>Sync (form submit, uploads automatically)</h2>
                    <Single />
                </>
            )}
        </div>,
        single
    );
}

const multiple = document.getElementById('multiple');
if (multiple) {
    ReactDOM.render(<div>{isAsync ? <AsyncFormWithTable /> : <FormWithTable />}</div>, multiple);
}
