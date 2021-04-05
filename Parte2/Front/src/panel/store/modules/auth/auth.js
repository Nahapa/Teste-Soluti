import axios from 'axios'

import { TOKEN_NAME } from '@/panel/configs/api'

export default {
    state: {
        me: {},
        authenticated: false,
    },

    mutations: {
        SET_AUTHENTICATED(state, status) {
            state.authenticated = status
        },
        SET_ME(state, me) {
            state.me = me
        },
        LOGOUT(state) {
            state.authenticated = false
        }
    },

    actions: {
        login({ dispatch }, params) {
            return axios.post('login', params)
                .then(response => {
                    const token = response.data.data.token
                    localStorage.setItem(TOKEN_NAME, token)
                    dispatch('getMe')
                })
        },

        register({ dispatch }, params) {
            return axios.post('register', params)
                .then(() => {
                    dispatch('login', params)
                })
        },

        logout() {
            const token = localStorage.getItem(TOKEN_NAME)

            return axios.post('logout', {}, {
                headers: {
                    'Authorization': `Bearer ${token}`
                }
            })
                .finally(() => localStorage.removeItem(TOKEN_NAME))
        },

        getMe({ commit }) {
            const token = localStorage.getItem(TOKEN_NAME)

            return axios.get('me', {
                headers: {
                    'Authorization': `Bearer ${token}`
                }
            })
                .then(response => commit('SET_ME', response.data.data))
                .catch(() => localStorage.removeItem(TOKEN_NAME))
        }
    }
}