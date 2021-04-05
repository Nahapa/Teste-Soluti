import axios from 'axios'

const RESOURCE = '/certificates'

const actions = {
    setCertificates({ commit }) {
        axios.get(RESOURCE)
            .then(response => {
                commit('SET_CERTIFICATES', response.data.data)
            })
    },

    newCertificate({ commit }, params) {
        axios.post(RESOURCE, params)
            .then(response => {
                commit('SET_CERTIFICATE', response.data.data)
            })
    },

    deleteCertificate({ commit }, id) {
        axios.delete(`${RESOURCE}/${id}`)
            .then(() => {
                commit('DELETE_CERTIFICATE', id)
            })
    }
}

export default actions