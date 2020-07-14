/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';

// import VueQuillEditor from 'vue-quill-editor';
import Vue2Filters from "vue2-filters";
import Notifications from 'vue-notification';
import VeeValidate from 'vee-validate';
import 'flatpickr/dist/flatpickr.css';
import VueCookie from 'vue-cookie';
import { Admin } from 'craftable';
import BootstrapVue, {BootstrapVueIcons} from "bootstrap-vue";
import Vue from 'vue';
import Loading from "vue-loading-overlay"
import 'vue-loading-overlay/dist/vue-loading.css';
import './web/app-components/bootstrap';
import './frontend-components';
//
// import 'craftable/dist/ui';

Vue.component('multiselect', ()=>import(/*webpackChunkName: 'vue-multiselect'*/ "vue-multiselect"));
Vue.component('typeahead', () => import(/*webpackChunkName: 'typeahead'*/ "vue-bootstrap-typeahead"));
Vue.use(VeeValidate, {strict: true});
Vue.component('datetime', () => import(/* webpackChunkName: 'flatpickr-datetime'*/ "vue-flatpickr-component")) ;

Vue.use(BootstrapVue);
Vue.use(BootstrapVueIcons);
// Vue.use(VueQuillEditor);
Vue.use(Notifications);
Vue.use(VueCookie);
Vue.use(Vue2Filters);
Vue.use(Loading,{
    // props
    color: 'green',
    loader: 'dots'
});
new Vue({
    mixins: [Admin]
});
