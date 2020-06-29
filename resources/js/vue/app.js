require('../bootstrap');

import Vue from 'vue';

import FormWithTable from './FormWithTable.vue';
import AsyncFormWithTable from './AsyncFormWithTable.vue';
import Single from './Single.vue';
import AsyncSingle from './AsyncSingle.vue';

import MediaSingleComponent from '../../../vendor/spatie/laravel-medialibrary-pro/ui/medialibrary-pro-vue-single';
import MediaTableComponent from '../../../vendor/spatie/laravel-medialibrary-pro/ui/medialibrary-pro-vue-table';

var app = new Vue({
    components: { FormWithTable, AsyncFormWithTable, Single, AsyncSingle, MediaSingleComponent, MediaTableComponent },

    el: '#app',

    data: () => ({
        window,
    }),
});
