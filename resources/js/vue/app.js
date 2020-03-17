require('../bootstrap');

import Vue from 'vue';

import FormWithTable from './FormWithTable.vue';
import Single from './Single.vue';

var app = new Vue({
    components: { FormWithTable, Single },

    el: '#app',
});
