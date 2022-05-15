require('./bootstrap');

import * as Vue from 'vue'
import router from './router.js'
import App from './App.vue'
import vuetify from './plugins/vuetify.js'

Vue.createApp({
    components: {
        App
    }
}).use(router).use(vuetify).mount('#app');
