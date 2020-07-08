import * as React from 'react';
import ReactDOM from 'react-dom';

import Single from './Single';
import FormWithTable from './FormWithTable';
import AsyncSingle from './AsyncSingle';
import AsyncFormWithTable from './AsyncFormWithTable';

import MediaLibraryAttachment from 'medialibrary-pro-react-attachment';

const isAsync = window.location.search.includes('async=true');
const isMulti = window.location.search.includes('multi=true');

const single = document.getElementById('single');
if (single) {
    ReactDOM.render(
        <div>
            {isAsync && (
                <>
                    <h2>Async (axios)</h2>
                    <AsyncSingle />
                </>
            )}

            {isMulti && (
                <>
                    <h2>multi attachment</h2>
                    <MediaLibraryAttachment name="media" uploadEndpoint="/temp-upload" multiple />
                </>
            )}

            {!isAsync && !isMulti && (
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
