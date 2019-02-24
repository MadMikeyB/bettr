
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import VueQuill from 'vue-quill'
import VeeValidate from 'vee-validate';
import moment from 'moment'
import VCalendar from 'v-calendar';
import 'v-calendar/lib/v-calendar.min.css';

// Use v-calendar, v-date-picker & v-popover components
Vue.use(VCalendar)

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

const files = require.context('./', true, /\.vue$/i)
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.mixin({
    methods: {
        route: route
    }
});
Vue.use(VueQuill)
Vue.use(VeeValidate)
Vue.prototype.moment = moment

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app'
});
