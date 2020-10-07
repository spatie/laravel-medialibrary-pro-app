require('../bootstrap');

import Vue from 'vue';

import AsyncAttachments from './AsyncAttachments.vue';

import MediaLibraryAttachment from '../../../vendor/spatie/laravel-medialibrary-pro/ui/medialibrary-pro-vue-attachment/dist';
import MediaLibraryCollection from '../../../vendor/spatie/laravel-medialibrary-pro/ui/medialibrary-pro-vue-collection/dist';

var app = new Vue({
    components: { AsyncAttachments, MediaLibraryAttachment, MediaLibraryCollection },

    el: '#app',

    data: () => ({
        window,
    }),
});
