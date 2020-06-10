require('../bootstrap');

import Vue from 'vue';

import FormWithTable from './FormWithTable.vue';
import AsyncFormWithTable from './AsyncFormWithTable.vue';
import Single from './Single.vue';
import AsyncSingle from './AsyncSingle.vue';

var app = new Vue({
    components: { FormWithTable, AsyncFormWithTable, Single, AsyncSingle },

    el: '#app',

    data: () => ({
        window,
    }),
});
