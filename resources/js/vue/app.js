require('../bootstrap');

// Vue 2
/* import Vue from 'vue';

import AsyncAttachments from './AsyncAttachments.vue';

import { MediaLibraryAttachment } from '../../../vendor/spatie/laravel-medialibrary-pro/ui/medialibrary-pro-vue-attachment';
import { MediaLibraryCollection } from '../../../vendor/spatie/laravel-medialibrary-pro/ui/medialibrary-pro-vue-collection';

new Vue({
    components: { AsyncAttachments, MediaLibraryAttachment, MediaLibraryCollection },

    el: '#app',

    data: () => ({
        window,
    }),
}); */

import { createApp } from 'vue';
import { MediaLibraryAttachment } from '../../../vendor/spatie/laravel-medialibrary-pro/ui/medialibrary-pro-vue-attachment';

const App = {
    components: { MediaLibraryAttachment },

    data() {
        return {
            window,
        };
    },
};

createApp(App).mount('#app');
