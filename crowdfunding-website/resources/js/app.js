require('./bootstrap');

import * as Vue from 'vue'
import router from './router.js'
import store from './store.js'
import vuetify from './plugins/vuetify.js'

import App from './App.vue'
import CampaignItem from './components/CampaignItem.vue'
import Alert from './components/Alert.vue'
import Search from './components/Search.vue'
import Login from './components/Login.vue'

const app = Vue.createApp()

app.component('App', App)
    .component('campaign-item', CampaignItem)
    .component('alert', Alert)
    .component('search', Search)
    .component('login', Login)

app.use(router)
    .use(vuetify)
    .use(store)

app.mount('#app')
