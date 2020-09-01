import * as React from 'react';
import ReactDOM from 'react-dom';

import Attachment from './Attachment';
import AttachmentAsync from './AttachmentAsync';
import AttachmentMultiple from './AttachmentMultiple';
import Collection from './Collection';
import CollectionAsync from './CollectionAsync';

const isAsync = window.location.search.includes('async=true');
const isMulti = window.location.search.includes('multi=true');

const attachment = document.getElementById('attachment');
if (attachment) {
    ReactDOM.render(
        <div>

            {/* <MediaLibraryAttachment name="media" uploadEndpoint="/temp-upload" multiple={false} /> */}

            {isAsync && (
                <AttachmentAsync />
            )}

            {isMulti && (
                <AttachmentMultiple />
            )}

            {!isAsync && !isMulti && (
                <Attachment />
            )}
        </div>,
        attachment
    );
}

const collection = document.getElementById('collection');
if (collection) {
    ReactDOM.render(<div>{isAsync ? <CollectionAsync /> : <Collection />}</div>, collection);
}
