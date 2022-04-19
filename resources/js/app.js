
import Vue from 'vue'
import App from './App.vue'
import router from './router';
import { BootstrapVue, BootstrapVueIcons } from 'bootstrap-vue'
import { http } from './configurations/backend'
import VueToast from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-sugar.css';
Vue.prototype.$http = http;
Vue.use(BootstrapVue)
Vue.use(BootstrapVueIcons)

import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
const app = new Vue({
    el: '#app',
    router,
    template: '<App/>',
    components: { App },
});

