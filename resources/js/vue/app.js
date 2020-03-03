require('../bootstrap');

import Vue from 'vue';
import VueDragula from 'vue-dragula';

import UploadComponent from './UploadComponent.vue';

Vue.use(VueDragula);

var app = new Vue({
    components: { UploadComponent },

    el: '#app',
});
