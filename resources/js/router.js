import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import HomePage from './pages/HomePage';
import AboutPage from './pages/AboutPage';
import RestaurantShow from './pages/RestaurantShow';

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: HomePage,
        },
        {
            path: '/about',
            name: 'about',
            component: AboutPage,
        },
        {
            path:'/RestaurantShow/:id',
            name:'RestaurantShow',
            component:RestaurantShow,
        }
    ],
});

export default router;