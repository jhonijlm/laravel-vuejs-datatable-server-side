// require('./bootstrap');

// import 'bootstrap/dist/css/bootstrap.min.css';

window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.Vue = require('vue').default;

import IndexView from "./views/Index.vue";

const app = new Vue({
    el: '#app',
    // router,
    components: {
        "index-view": IndexView,
    },

});

