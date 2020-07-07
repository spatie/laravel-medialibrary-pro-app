require('../bootstrap');

import Vue from 'vue';

import FormWithTable from './FormWithTable.vue';
import AsyncFormWithTable from './AsyncFormWithTable.vue';
import Single from './Single.vue';
import AsyncSingle from './AsyncSingle.vue';

import MediaLibraryAttachment from '../../../vendor/spatie/laravel-medialibrary-pro/ui/medialibrary-pro-vue-attachment';
import MediaLibraryCollection from '../../../vendor/spatie/laravel-medialibrary-pro/ui/medialibrary-pro-vue-collection';

var app = new Vue({
    components: { FormWithTable, AsyncFormWithTable, Single, AsyncSingle, MediaLibraryAttachment, MediaLibraryCollection },

    el: '#app',

    data: () => ({
        window,
    }),
});
