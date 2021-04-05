import axios from 'axios'

const RESOURCE = '/certificates'

const actions = {
    setCertificates({ commit }) {
        axios.get(RESOURCE)
            .then(response => {
                commit('SET_CERTIFICATES', response.data.data)
            })
    },

    newCertificate({ commit }) {
        let formData = new FormData();
        axios.post(RESOURCE, formData,
            {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
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