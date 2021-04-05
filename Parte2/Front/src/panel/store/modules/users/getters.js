const getters = {
    getUsersAll(state) {
        return state.users
    },

    getUserById: (state) => (id) => {
        return state.users.find(user => user.id == id)
    }
}

export default getters