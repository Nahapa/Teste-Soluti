import { createStore } from "vuex"

import auth from './modules/auth/auth'
import certificate from './modules/certificates/certificate'
import form from './modules/forms/form'
import user from './modules/users/user'

const store = createStore({
    modules: {
        auth,
        certificate,
        form,
        user
    }
})

export default store