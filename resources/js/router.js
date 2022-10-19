import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import HomePage from './pages/HomePage';
import AboutPage from './pages/AboutPage';
import RestaurantShow from './pages/RestaurantShow';
import PageNotFound from './pages/errors/PageNotFound';

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
        },
        {
            path: '*',
            name: 'PageNotFound',
            component: PageNotFound,
        }
    ],
});

export default router;