const mutations = {
    SET_USERS(state, users) {
        state.users = users
    },

    SET_USER(state, user) {
        state.users.push(user)
    },

    PUT_USER(state, user) {
        let index = state.users.findIndex(_user => _user.id == user.id)
        state.users[index] = user
    },

    DELETE_USER(state, id) {
        let index = state.users.findIndex(_user => _user.id == id)
        state.users.splice(index)
    }
}

export default mutations