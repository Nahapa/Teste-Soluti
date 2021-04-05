const mutations = {
    SET_CERTIFICATES(state, certificates) {
        state.certificates = certificates
    },

    SET_CERTIFICATE(state, certificate) {
        state.certificates.push(certificate)
    },

    DELETE_CERTIFICATE(state, id) {
        let index = state.certificates.findIndex(_certificate => _certificate.id == id)
        state.certificates.splice(index)
    }
}

export default mutations