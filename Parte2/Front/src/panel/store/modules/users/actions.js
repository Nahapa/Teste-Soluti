import axios from 'axios'

const RESOURCE = '/users'

const actions = {
    setUsers({ commit }) {
        axios.get(RESOURCE)
            .then(response => {
                commit('SET_USERS', response.data.data)
            })
    },

    newUser({ commit }, params) {
        axios.post(RESOURCE, params)
            .then(response => {
                commit('SET_USER', response.data.data)
            })
    },

    updateUser({ commit }, params) {
        axios.put(`${RESOURCE}/${params.id}`, params)
            .then(response => {
                commit('PUT_USER', response.data.data)
            })
    },

    deleteUser({ commit }, id) {
        axios.delete(`${RESOURCE}/${id}`)
            .then(() => {
                commit('DELETE_USER', id)
            })
    }
}

export default actions