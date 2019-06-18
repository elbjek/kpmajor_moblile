import Vue from 'vue';
import VueRouter from 'vue-router';
import axios from 'axios';
import VueAxios from 'vue-axios';

Vue.use(VueRouter);
Vue.use(VueAxios, axios);


import Home from './components/layout/Home';

import Login from './components/login/Login';
import Register from './components/login/Register';

import CreateProduct from './components/products/CreateProduct';
import SingleProduct from './components/products/ProductsCarousel';

import UserProfile from './components/user_profile/Profile';

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
            path: '/products/create',
            name: 'products.create',
            component: CreateProduct,
        },
        {
            path: '/products/:id',
            name: 'products.show',
            component: SingleProduct,
            meta: {
                auth: false
            }
        },
        {
            path: '/users/:id',
            name: 'users.show',
            component: UserProfile,
        },

    ]
})

