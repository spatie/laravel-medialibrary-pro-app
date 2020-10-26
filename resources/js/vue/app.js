require('../bootstrap');

import Vue from 'vue';

import AsyncAttachments from './AsyncAttachments.vue';

import { MediaLibraryAttachment } from 'medialibrary-pro-vue-attachment';
import { MediaLibraryCollection } from 'medialibrary-pro-vue-collection';

new Vue({
    components: { AsyncAttachments, MediaLibraryAttachment, MediaLibraryCollection },

    el: '#app',

    data: () => ({
        window,
    }),
});
