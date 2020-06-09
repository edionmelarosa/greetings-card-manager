window.Vue = require('vue');

require('./bootstrap');
require('./functions');

import Notifications from 'vue-notification'
Vue.use(Notifications)

import router from './router';

Vue.component('app', require('./App.vue').default);

const app = new Vue({
    el: '#app',
    router
});
