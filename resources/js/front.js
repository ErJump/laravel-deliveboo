import VueRouter from 'vue-router';
import Vue from 'vue';

window.Vue = require('vue');
Vue.use(VueRouter);

import App from './views/App';
import router from './router';


const app = new Vue({
    el: '#root',
    render: h => h(App),
    router
});