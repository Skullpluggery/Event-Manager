
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./materialize');
require('luxon');
require('vue-datetime');
require('moment');
require('./init');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import moment from 'moment';
Vue.prototype.moment = moment;

import { Datetime } from 'vue-datetime';
Vue.component('datetime', Datetime);

//Event Component
Vue.component('event-index', require('./components/events/EventIndex.vue'));
Vue.component('event-create', require('./components/events/EventCreate.vue'));

//User Component
Vue.component('user-component', require('./components/UserComponent.vue'));

const app = new Vue({
    el: '#app'
});
