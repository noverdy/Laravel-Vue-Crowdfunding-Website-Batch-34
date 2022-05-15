import {
    createVuetify
} from 'vuetify'
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'
import 'vuetify/styles'

const opts = {
    components,
    directives
}
const vuetify = createVuetify(opts)

export default vuetify
