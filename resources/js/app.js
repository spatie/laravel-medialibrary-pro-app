require("./bootstrap");

import Vue from "vue";
import Index from "./vue/Index.vue";

var app = new Vue({
    components: { Index },

    el: "#app"
});
