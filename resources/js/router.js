import Vue from 'vue';
import VueRouter from 'vue-router';
import axios from 'axios';
import VueAxios from 'vue-axios';

Vue.use(VueRouter);
Vue.use(VueAxios, axios);


import Home from './components/layout/Home';
import Login from './components/login/Login';
import SingleProduct from './components/products/ProductsCarousel';

export default new VueRouter({
    mode: 'history',
    routes:[
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/login',
            name: 'login',
            component: Login,
            meta: {
                auth: false
            }
        },
        {
            path: '/products/:id',
            name: 'singleproduct',
            component: SingleProduct,
            meta: {
                auth: false
            }
        },
    ]
})

