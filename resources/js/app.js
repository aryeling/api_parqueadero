/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// window.Vue = require('vue').default;

require('./bootstrap');
import Vue from "vue";
import VueRouter from 'vue-router'
import routes from "./router";
import VueAxios from 'vue-axios';
import axios from 'axios';

Vue.use(VueRouter);
Vue.use(VueAxios, axios);

const router = new VueRouter({
    hash: false,
    routes: routes
})


Vue.component('navbar', require('./components/NavbarComponent.vue').default);

const app = new Vue({
    el: '#app',
    router: router,
}).$mount('#app')