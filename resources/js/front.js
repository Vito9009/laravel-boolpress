window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.Vue = require('vue');

import App from './App.vue';
import router from './router';

const app = new Vue({
    el: '#app',
    render: h => h(App),
    router
});
