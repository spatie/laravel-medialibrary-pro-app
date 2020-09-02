import * as React from 'react';
import ReactDOM from 'react-dom';

import Attachment from './Attachment';
import AsyncAttachment from './AsyncAttachment';
import Attachments from './Attachments';
import Collection from './Collection';
import AsyncCollection from './AsyncCollection';

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

const asyncCollection = document.getElementById('async-collection');
if (asyncCollection) {
    ReactDOM.render(<AsyncCollection />, asyncCollection);
}
