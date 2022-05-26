import Vuex from 'vuex'
import VuexPersist from 'vuex-persist'

import transaction from './stores/transaction'
import alert from './stores/alert'
import auth from './stores/auth'
import dialog from './stores/dialog'

const vuexPersist = new VuexPersist({
    key: 'sanbercode',
    storage: localStorage
})

export default new Vuex.Store({
    plugins: [vuexPersist.plugin],
    modules: {
        transaction,
        alert,
        auth,
        dialog
    }
})
