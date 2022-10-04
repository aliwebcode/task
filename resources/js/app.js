require('./bootstrap');

window.Vue = require('vue').default;

import routes from "./router/index"

Vue.component('App', require('./components/layout/App').default);


const app = new Vue({
    el: '#app',
    router: routes
});
