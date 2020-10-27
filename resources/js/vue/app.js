require('../bootstrap');

import { createApp } from 'vue';

import AsyncAttachments from './AsyncAttachments.vue';
import { MediaLibraryAttachment } from 'media-library-pro-vue3-attachment';
import { MediaLibraryCollection } from 'media-library-pro-vue3-collection';

const App = {
    components: { AsyncAttachments, MediaLibraryAttachment, MediaLibraryCollection },

    data() {
        return {
            window,
        };
    },
};

createApp(App).mount('#app');
