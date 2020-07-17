import Vue from "vue"
Vue.component('login-component', () => import(/* webpackChunkName: `login-component` */ "./LoginComponent"))
Vue.component('home-component', () => import(/* webpackChunkName: `home-component` */ "./HomeComponent"))
Vue.component('ph-class-component', () => import(/* webpackChunkName: `/js/ph-class-component` */ "./PhClassComponent"))
Vue.component('profile-component', () => import(/* webpackChunkName: `/js/profile-component` */ "./ProfileComponent"))
Vue.component('header-component', () => import(/* webpackChunkName: `header-component` */ "./HeaderComponent"))
Vue.component('avatar-uploader', () => import(/* webpackChunkName: '/js/avatar-uploader'*/ "../web/app-components/Form/base/AvatarUploader"));
