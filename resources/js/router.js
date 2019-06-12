
import VueRouter from 'vue-router';
import Vue from "vue";

import Home from './components/layout/Home.vue'
import ProductCarousel from './components/products/ProductsCarousel.vue';
// window.VueRouter = VueRouter;
Vue.use(VueRouter);
export default new VueRouter({
    mode: 'history',
    routes:[
        {
            path:'/products/:id',
            name:'product-carousel',
            component: ProductCarousel
        },
        {
            path:'/home',
            name:'home',
            component: Home
        }
    ]
})