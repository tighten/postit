/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import "./bootstrap";
import "../css/main.css";

import Vue from "vue";
window.Vue = Vue;
import axios from "axios";
window.axios = axios;
import moment from "moment";
window.moment = moment;
Vue.config.productionTip = false;

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import Dashboard from "./components/Dashboard.vue";

const app = new Vue({
    components: {
        Dashboard
    }
}).$mount("#app");
