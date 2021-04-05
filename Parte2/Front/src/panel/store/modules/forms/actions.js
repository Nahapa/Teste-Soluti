const actions = {
    setFormShow(context) {
        context.commit('setForm', true);
    },
    setFormHide(context) {
        context.commit('setForm', false);
    }
}

export default actions