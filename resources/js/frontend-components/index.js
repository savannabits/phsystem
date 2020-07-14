import Vue from "vue"
Vue.component('login-component', () => import(/* webpackChunkName: `login-component` */ "./LoginComponent"))
Vue.component('home-component', () => import(/* webpackChunkName: `home-component` */ "./HomeComponent"))
Vue.component('header-component', () => import(/* webpackChunkName: `header-component` */ "./HeaderComponent"))
