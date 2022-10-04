import axios from "axios";

// Define Global API Options
let api = axios.create({
    baseURL: ('/api'),
    withCredentials: false,
    'Content-Type': 'multipart/form-data',
    Authorization: "Bearer " + localStorage.getItem("token"),
    accept: "application/json",
})

api.interceptors.request.use(
    function(config) {
        const token = localStorage.getItem("token")
        if (token) {
            config.headers["Authorization"] = 'Bearer ' + token
        }
        return config;
    },
    function(error) {
        return Promise.reject(error);
    }
);

export default api
