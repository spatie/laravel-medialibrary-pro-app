require("./bootstrap");

import Vue from "vue";

import SingleUpload from "./vue/SingleUpload.vue";

var app = new Vue({
    components: { SingleUpload },

    el: "#app"
});
