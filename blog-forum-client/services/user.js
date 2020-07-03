import axios from "axios";
import csrf from "./csrf";

export default {
    async register(form) {
        await csrf.getCookie();
        
        return axios.post("/register", form);
    },

    async login(form) {
        await csrf.getCookie();

        return axios.post("/login", form);
    },

    async logout() {
        await csrf.getCookie();

        return axios.post("/logout");
    },

    auth() {
        return axios.get("/user");
    }
};
