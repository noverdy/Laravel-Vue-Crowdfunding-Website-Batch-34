require('./bootstrap');

import * as Vue from 'vue'
import router from './router.js'
import App from './App.vue'

Vue.createApp({
    components: {
        App
    }
}).use(router).mount('#app');
