import user from '@/services/user';
import Cookies from 'js-cookie';

// state
export const state = () => ({
    user: null,
    token: null,
    check: false
})

// getters
export const getters = {
    user: state => state.user,
    token: state => state.token,
    check: state => state.check
}

// mutations
export const mutations = {
    set_token(state, token) {
        state.token = token;
    },

    fetch_user_success(state, user) {
        state.user = user;
        state.check = true;
    },

    fetch_user_fail(state) {
        state.token = null;
        state.check = false;
    },

    logout(state) {
        state.user = null;
        state.token = null;
        state.check = false;
    }
}

// actions
export const actions = {
    saveToken({ commit }, { token, remember }) {
        commit('set_token', token);

        Cookies.set('token', token, { expires: remember ? 365 : null });
    },

    async fetchUser({ commit }) {
        await user.auth().then(res => {
            commit('fetch_user_success', res.data);
        }).catch(error => {
            Cookies.remove('token');

            commit('fetch_user_fail');
        });
    },

    logout({ commit }) {
        user.logout().then(() => {
            Cookies.remove('token')

            commit('logout');
        }).catch(e => {
            console.log(e);
        });
    }
}
