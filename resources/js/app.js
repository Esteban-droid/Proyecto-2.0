import Vue from 'vue'
//import Vuetify from '../plugins/vuetify'
//import App from './components/ExampleComponent'
import Vuetify from 'vuetify'
import "vuetify/dist/vuetify.min.css"

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
//import vue from 'vue' //El profe me hizo poner esto


require('./bootstrap');

//vue.use(axios) //El profe me hizo poner esto
window.Vue = require('vue');
import axios from 'axios' //El profe me hizo poner esto
//vue.use(axios);



/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('libros', require('./components/libros.vue').default);
Vue.component('informacion', require('./components/informacion.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

 Vue.use(Vuetify)

const app = new Vue({
    //new Vue({
    vuetify : new Vuetify(),
    //Vuetify,
    el: '#app',
    axios,
    //render: (h) => h(App)
})//.$mount('#app');