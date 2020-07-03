import axios from "axios";
import Cookie from "js-cookie";

// Special call request. Init csrf cookie.
const baseURL = 'http://localhost:8000';

export default {
    getCookie() {
        let token = Cookie.get("XSRF-TOKEN");

        if (token) {
            return new Promise(resolve => {
                resolve(token);
            });
        }

        return axios.get(`${ baseURL }/sanctum/csrf-cookie`);
    }
};
