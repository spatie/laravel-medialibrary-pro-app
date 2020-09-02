require('../bootstrap');

import Vue from 'vue';

import AsyncSingle from './AsyncSingle.vue';

import MediaLibraryAttachment from '../../../vendor/spatie/laravel-medialibrary-pro/ui/medialibrary-pro-vue-attachment';
import MediaLibraryCollection from '../../../vendor/spatie/laravel-medialibrary-pro/ui/medialibrary-pro-vue-collection';

var app = new Vue({
    components: { AsyncSingle, MediaLibraryAttachment, MediaLibraryCollection },

    el: '#app',

    data: () => ({
        window,
    }),
});
