import Vue from 'vue';
import VueRouter from 'vue-router';
import axios from 'axios';
import VueAxios from 'vue-axios';

Vue.use(VueRouter);
Vue.use(VueAxios, axios);


import Home from './components/layout/Home';
import Login from './components/login/Login';
import Register from './components/login/Register';

import SingleProduct from './components/products/ProductsCarousel';
import CreateProduct from './components/products/CreateProduct';

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
            path: '/register',
            name: 'register',
            component: Register,
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
        {
            path: '/products/create',
            name: 'singleproduct',
            component: CreateProduct,
            meta: {
                auth: true
            }
        },

    ]
})

