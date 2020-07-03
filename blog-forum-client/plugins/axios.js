import axios from 'axios';


export default ({ app, store, redirect }) => {
    axios.defaults.baseURL = 'http://localhost:8000/api/';
    axios.defaults.withCredentials = true;


    // Request interceptor
    axios.interceptors.request.use((request) => {
        const token = store.getters['auth/token'];

        if (token) {
            request.headers.common.Authorization = `Bearer ${token}`
        }

        return request;
    });

    // axios.interceptors.response.use(function (response) {
    //     return response.data;
    // });
}