/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import Vue from 'vue';

window.Vue = Vue;
window.VueRouter = VueRouter;
import VueRouter from 'vue-router';
import router from './router'
import VueAuth from '@websanova/vue-auth'

Vue.router = router;

Vue.use(VueAuth, {
    auth: require('@websanova/vue-auth/drivers/auth/bearer.js'),
    http: require('@websanova/vue-auth/drivers/http/axios.1.x.js'),
    router: require('@websanova/vue-auth/drivers/router/vue-router.2.x.js'),
    rolesVar: 'role'
  });


import VueAnime from 'vue-animejs';
Vue.use(VueAnime)

import Vue2TouchEvents from 'vue2-touch-events'
 
Vue.use(Vue2TouchEvents, {
    touchClass: '',
    tapTolerance: 10,
    swipeTolerance: 10,
    longTapTimeInterval: 400
})

// VueTouch.registerCustomEvent('horizontal-swipe', {
//     type: 'swipe',
//     direction: 'right',
//     threshold: 10
//   })

var VueTouch = require('vue-touch')
Vue.use(VueTouch, {name: 'v-touch'})

// VueTouch.config.pan = {
//     threshold: 10
// }

import VueAgile from 'vue-agile'

Vue.use(VueAgile)

import jQuery from 'jquery';
window.jQuery = jQuery;
require('./functions');

export const EventBus = new Vue();
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));
Vue.component('main-layout', require('./components/layout/Main.vue').default);

Vue.component('home-blade', require('./components/layout/Home.vue').default);

Vue.component('logo-component', require('./components/shared/logo.vue').default);

//products pages
// Vue.component('new-products',require('./components/LatestProducts.vue').default);
// Vue.component('single-product',require('./components/Product.vue').default);
// Vue.component('products-list', require('./components/ProductsList.vue').default);
// Vue.component('create-product',require('./components/CreateProduct.vue').default);
Vue.component('single-image-modal', require('./components/products/SingleImageModal.vue').default);

Vue.component('products-carousel',require('./components/products/ProductsCarousel.vue').default)
Vue.component('single-product',require('./components/products/SingleProduct.vue').default);


//messages 
Vue.component('chat-component',require('./components/messages/Messages.vue').default);

//global components 
Vue.component('search-bar',require('./components/shared/Search.vue').default);

Vue.component('passport-clients',require('./components/passport/Clients.vue').default);

Vue.component('passport-authorized-clients',require('./components/passport/AuthorizedClients.vue').default);

Vue.component('passport-personal-access-tokens',require('./components/passport/PersonalAccessTokens.vue').default);


//user
Vue.component('user-profile',require('./components/user_profile/Profile.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router
});
