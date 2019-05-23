
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
 Vue.component('subscribe', require('./components/form/subscribe.vue'));
 Vue.component('wizzard', require('./components/form/wizzard.vue'));

 /*--------partials-----------*/
Vue.component('navigation', require('./components/partials/navigation.vue'));
Vue.component('navigation-panel', require('./components/partials/sidebar.vue'));
Vue.component('carousel', require('./components/partials/carousel.vue'));
Vue.component('slider', require('./components/partials/slider.vue'));
Vue.component('drop-list', require('./components/partials/dropList.vue'));
Vue.component('gallery-overlay', require('./components/partials/gallery.vue'));
Vue.component('last-news', require('./components/partials/lastNews.vue'));
Vue.component('tabs', require('./components/partials/tabs/tabs.vue'));
Vue.component('tabs-content-general', require('./components/partials/tabs/contents/general.vue'));
Vue.component('tabs-content-home', require('./components/partials/tabs/contents/home.vue'));
Vue.component('content-tabs', require('./components/partials/tabs/content.vue'));

Vue.component('submenu', require('./components/contents/submenu.vue'));
Vue.component('projects', require('./components/contents/projects/projects.vue'));
Vue.component('services', require('./components/contents/services/services.vue'));


Vue.component('design-planning', require('./components/contents/services/design-planning/dessignPlanning.vue'));
Vue.component('concept', require('./components/contents/services/design-planning/partials/concept.vue'));
Vue.component('planning', require('./components/contents/services/design-planning/partials/planning.vue'));
Vue.component('material', require('./components/contents/services/design-planning/partials/material.vue'));
Vue.component('horientation', require('./components/contents/services/design-planning/partials/horientation.vue'));
Vue.component('original-designs', require('./components/contents/services/design-planning/partials/original.vue'));
Vue.component('estimate', require('./components/contents/services/design-planning/partials/estimate.vue'));

Vue.component('preparation', require('./components/contents/services/preparation/preparation.vue'));
Vue.component('shear', require('./components/contents/services/preparation/partials/shear.vue'));
Vue.component('forming-break', require('./components/contents/services/preparation/partials/formingBreak.vue'));
Vue.component('machine-mill', require('./components/contents/services/preparation/partials/machineMill.vue'));
Vue.component('forming-form', require('./components/contents/services/preparation/form/formingForm.vue'));

Vue.component('welding', require('./components/contents/services/welding/welding.vue'));
Vue.component('tig', require('./components/contents/services/welding/partials/tig.vue'));
Vue.component('mig', require('./components/contents/services/welding/partials/mig.vue'));
Vue.component('stick', require('./components/contents/services/welding/partials/stick.vue'));

Vue.component('finishes', require('./components/contents/services/finishes/finishes.vue'));
Vue.component('mirror', require('./components/contents/services/finishes/partials/mirrorFinish.vue'));
Vue.component('finish-seven', require('./components/contents/services/finishes/partials/finish7.vue'));
Vue.component('finish-six', require('./components/contents/services/finishes/partials/finish6.vue'));
Vue.component('brush', require('./components/contents/services/finishes/partials/brush.vue'));
Vue.component('vibration', require('./components/contents/services/finishes/partials/vibration.vue'));
Vue.component('sandblast', require('./components/contents/services/finishes/partials/sandblast.vue'));
Vue.component('timesaver', require('./components/contents/services/finishes/partials/timesaver.vue'));

Vue.component('painting', require('./components/contents/services/painting/painting.vue'));
Vue.component('wet-painting', require('./components/contents/services/painting/partials/wetPainting.vue'));
Vue.component('finish-cart', require('./components/contents/services/painting/partials/finishCart.vue'));
Vue.component('powder-coat', require('./components/contents/services/painting/partials/powderCoat.vue'));
Vue.component('patina', require('./components/contents/services/painting/partials/patina.vue'));

Vue.component('delivery', require('./components/contents/services/delivery/delivery.vue'));

Vue.component('panel', require('./components/panel/panel.vue'));
Vue.component('slides', require('./components/panel/slides.vue'));

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
