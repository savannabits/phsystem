import axios from 'axios';
import _ from 'lodash';
import Vue from 'vue';
import jQuery from 'jquery';
import moment from 'moment';
window.$ = window.jQuery = jQuery;
window.Vue = Vue;
window._ = _;
window.axios = axios;
window.moment = moment;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.axios.defaults.baseURL = `${window.Laravel?.baseUrl}`;
/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
    $.ajaxSetup({headers: {'X-CSRF-TOKEN': token.content}});
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}
let baseUrl = document.head.querySelector('meta[name="app-base-url"]');
let apiPrefix = document.head.querySelector('meta[name="api-prefix"]');

if (apiPrefix) {
    window.apiPrefix = apiPrefix.content;
    console.log(window.apiPrefix);
} else {
    console.error("API PREFIX NOT SET");
}

if (baseUrl) {
    window.baseUrl = baseUrl.content;
    window.axios.defaults.baseURL = `${baseUrl.content}`;
    console.log(window.axios.defaults.baseURL);
} else {
    console.error("BASE URL NOT SET");
}
