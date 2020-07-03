// Init state
export const state = () => ({
    busy: false
})

// getters
export const getters = {
    busy: state => state.busy,
}

// mutations
export const mutations = {
    set_busy(state, status) {
        state.busy = status
    }
}

// actions
export const actions = {
    setBusy({ commit }, status) {
        commit('set_busy', status);
    }
}
