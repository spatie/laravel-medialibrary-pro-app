require('../bootstrap');

import { createApp } from 'vue';

/* import AsyncAttachments from './AsyncAttachments.vue'; */
import { MediaLibraryCollection } from '@spatie/media-library-pro-vue3-collection';
/* import { MediaLibraryCollection } from '@spatie/media-library-pro-vue3-collection'; */

const App = {
    components: { MediaLibraryCollection },

    data() {
        return {
            window,
        };
    },
};

createApp(App).mount('#app');
