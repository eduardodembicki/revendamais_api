require('./bootstrap');

window.Vue = require('vue').default;

Vue.component('ceps', require('../components/CepsComponent.vue').default);

const app = new Vue({
    el: '#app',
});
