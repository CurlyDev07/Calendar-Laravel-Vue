/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue';
import App from './components/App.vue';
import VueRouter from 'vue-router';
import { routes } from './routes';

import 'vue-toast-notification/dist/theme-default.css';
import VueToast from 'vue-toast-notification';

Vue.use(VueToast);
Vue.use(VueRouter);

const router = new VueRouter({
  routes,
  mode: 'history' // this will remove the hashTag in the url
});

const app = new Vue({
    el: '#app',
    router,
    render: h => h(App)
});
