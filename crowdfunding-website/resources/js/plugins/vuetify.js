import {
    createVuetify
} from 'vuetify'
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'
import {
    aliases,
    mdi
} from 'vuetify/iconsets/mdi'
import 'vuetify/styles'

const opts = {
    components,
    directives,
    icons: {
        defaultSet: 'mdi',
        aliases,
        sets: {
            mdi,
        }
    },
}
const vuetify = createVuetify(opts)

export default vuetify