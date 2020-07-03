import { cookieFromRequest } from '@/helpers/GetCookie';

export const actions = {
    nuxtServerInit({ commit }, { req }) {
        const token = cookieFromRequest(req, 'token');
        
        if (token) {
            commit('auth/set_token', token);
        }
    },
}
