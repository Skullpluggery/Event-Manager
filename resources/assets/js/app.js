
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./materialize');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//Event Component
Vue.component('event-component', require('./components/EventComponent.vue'));

//User Component
Vue.component('user-component', require('./components/UserComponent.vue'));

const app = new Vue({
    el: '#app'
});
