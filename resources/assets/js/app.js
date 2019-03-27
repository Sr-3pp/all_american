
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


 /*--------form-----------*/
 Vue.component('upload-picture', require('./components/form/uploadPicture.vue'));
 Vue.component('upload-file', require('./components/form/uploadFile.vue'));
 Vue.component('select-list', require('./components/form/selectList.vue'));
 Vue.component('contact-form', require('./components/form/contactForm.vue'));

 /*--------partials-----------*/
Vue.component('navigation', require('./components/partials/navigation.vue'));
Vue.component('carousel', require('./components/partials/carousel.vue'));
Vue.component('slider', require('./components/partials/slider.vue'));
Vue.component('drop-list', require('./components/partials/dropList.vue'));
Vue.component('last-news', require('./components/partials/lastNews.vue'));
Vue.component('tabs', require('./components/partials/tabs/tabs.vue'));
Vue.component('content-tabs', require('./components/partials/tabs/content.vue'));

const EventBus = new Vue()

Object.defineProperties(Vue.prototype, {
  $bus: {
    get: function () {
      return EventBus
    }
  }
})

import Icon from 'vue2-svg-icon/Icon.vue';
Vue.component('icon', Icon);

import Vue from 'vue'
import VueAnimate from 'vue-animate-scroll'
 
Vue.use(VueAnimate)

const app = new Vue({
    el: '#app'
});
