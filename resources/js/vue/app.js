require('../bootstrap');

import Vue from 'vue';

import UploadComponent from './UploadComponent.vue';

var app = new Vue({
    components: { UploadComponent },

    el: '#app',
});
