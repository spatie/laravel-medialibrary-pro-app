import * as React from 'react';
import ReactDOM from 'react-dom';

import Attachment from './Attachment';
import AsyncAttachment from './AsyncAttachment';
import Attachments from './Attachments';
import Collection from './Collection';
import CollectionCustomProperty from './CollectionCustomProperty';

const attachment = document.getElementById('attachment');
if (attachment) {
    ReactDOM.render(<Attachment />, attachment);
}

const attachments = document.getElementById('attachments');
if (attachments) {
    ReactDOM.render(<Attachments />, attachments);
}

const asyncAttachment = document.getElementById('async-attachment');
if (asyncAttachment) {
    ReactDOM.render(<AsyncAttachment />, asyncAttachment);
}

const collection = document.getElementById('collection');
if (collection) {
    ReactDOM.render(<Collection />, collection);
}

const collectionWithCustomProperty = document.getElementById('collection-custom-property');
if (collectionWithCustomProperty) {
    ReactDOM.render(<CollectionCustomProperty />, collectionWithCustomProperty);
}
