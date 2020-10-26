require('../bootstrap');

// Vue 2
/* import Vue from 'vue';

import AsyncAttachments from './AsyncAttachments.vue';

import { MediaLibraryAttachment } from 'medialibrary-pro-vue-attachment';
import { MediaLibraryCollection } from 'medialibrary-pro-vue-collection';

new Vue({
    components: { AsyncAttachments, MediaLibraryAttachment, MediaLibraryCollection },

    el: '#app',

    data: () => ({
        window,
    }),
}); */

import { createApp } from 'vue';

import AsyncAttachments from './AsyncAttachments.vue';
import { MediaLibraryAttachment } from 'medialibrary-pro-vue3-attachment';
import { MediaLibraryCollection } from 'medialibrary-pro-vue3-collection';

const App = {
    components: { AsyncAttachments, MediaLibraryAttachment, MediaLibraryCollection },

    data() {
        return {
            window,
        };
    },
};

createApp(App).mount('#app');
