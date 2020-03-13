require('../bootstrap');

import Vue from 'vue';

import FormWithTable from './FormWithTable.vue';

var app = new Vue({
    components: { FormWithTable },

    el: '#app',
});
