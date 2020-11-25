/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

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

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
*/

var SocialSharing = require('vue-social-sharing');
 
Vue.use(SocialSharing);



/* new components starts  */
Vue.component('emmitbutton', require('./n_components/partials/emmitButton.vue').default);
Vue.component('serviceimg', require('./n_components/partials/serviceImg.vue').default);
Vue.component('lazyimg', require('./n_components/partials/lazyImg.vue').default);
Vue.component('comment-form', require('./n_components/partials/comment-form.vue').default);
Vue.component('comments', require('./n_components/partials/comments.vue').default);
Vue.component('like-button', require('./n_components/partials/likeBtn.vue').default);
Vue.component('comment-button', require('./n_components/partials/commentBtn.vue').default);
Vue.component('new-entry', require('./n_components/partials/newEntry.vue').default);
Vue.component('slickslider', require('./n_components/slick.vue').default);
Vue.component('c-tabs', require('./n_components/tabs.vue').default);
Vue.component('c-modal', require('./n_components/modal.vue').default);
Vue.component('droplist', require('./n_components/droplist.vue').default);
/* new components ends  */


 /*--------form-----------*/
 Vue.component('upload-picture', require('./components/form/uploadPicture.vue').default);
 Vue.component('upload-file', require('./components/form/uploadFile.vue').default);
 Vue.component('select-list', require('./components/form/selectList.vue').default);
 Vue.component('contact-form', require('./components/form/contactForm.vue').default);
 Vue.component('subscribe', require('./components/form/subscribe.vue').default);
 Vue.component('wizzard', require('./components/form/wizzard.vue').default);
 Vue.component('faq-wizzard', require('./components/form/faqWizzard.vue').default);
 Vue.component('valorate', require('./components/form/valorate.vue').default);

 /*--------partials-----------*/
Vue.component('navigation', require('./components/partials/navigation.vue').default);
Vue.component('navigation-panel', require('./components/partials/sidebar.vue').default);
Vue.component('carousel', require('./components/partials/carousel.vue').default);
Vue.component('modal', require('./components/partials/modal.vue').default);
Vue.component('slider', require('./components/partials/slider.vue').default);
//Vue.component('slickslider', require('./components/partials/slick.vue').default);
Vue.component('drop-list', require('./components/partials/dropList.vue').default);
Vue.component('gallery-overlay', require('./components/partials/gallery.vue').default);
Vue.component('last-news', require('./components/partials/lastNews.vue').default);
Vue.component('tabs', require('./components/partials/tabs/tabs.vue').default);
Vue.component('tabs-content-general', require('./components/partials/tabs/contents/general.vue').default);
Vue.component('tabs-content-home', require('./components/partials/tabs/contents/home.vue').default);
Vue.component('content-tabs', require('./components/partials/tabs/content.vue').default);
Vue.component('editor', require('./components/partials/editor.vue').default);
Vue.component('social-new', require('./components/partials/socialNew.vue').default);
Vue.component('loader', require('./components/partials/loader.vue').default);
Vue.component('animated-number', require('./components/partials/animatedNumber.vue').default);
Vue.component('animated-progress', require('./components/partials/animatedProgress.vue').default);
Vue.component('faq-list', require('./components/partials/faqList.vue').default);
Vue.component('comment-modal', require('./components/partials/commentModal.vue').default);
Vue.component('overlay', require('./components/partials/overlay.vue').default);

Vue.component('submenu', require('./components/contents/submenu.vue').default);
Vue.component('projects', require('./components/contents/projects/projects.vue').default);
Vue.component('services', require('./components/contents/services/services.vue').default);


Vue.component('design-planning', require('./components/contents/services/design-planning/dessignPlanning.vue').default);
Vue.component('concept', require('./components/contents/services/design-planning/partials/concept.vue').default);
Vue.component('planning', require('./components/contents/services/design-planning/partials/planning.vue').default);
Vue.component('material', require('./components/contents/services/design-planning/partials/material.vue').default);
Vue.component('horientation', require('./components/contents/services/design-planning/partials/horientation.vue').default);
Vue.component('original-designs', require('./components/contents/services/design-planning/partials/original.vue').default);
Vue.component('estimate', require('./components/contents/services/design-planning/partials/estimate.vue').default);

Vue.component('preparation', require('./components/contents/services/preparation/preparation.vue').default);
Vue.component('shear', require('./components/contents/services/preparation/partials/shear.vue').default);
Vue.component('forming-break', require('./components/contents/services/preparation/partials/formingBreak.vue').default);
Vue.component('machine-mill', require('./components/contents/services/preparation/partials/machineMill.vue').default);
Vue.component('forming-form', require('./components/contents/services/preparation/form/formingForm.vue').default);

Vue.component('welding', require('./components/contents/services/welding/welding.vue').default);
Vue.component('tig', require('./components/contents/services/welding/partials/tig.vue').default);
Vue.component('mig', require('./components/contents/services/welding/partials/mig.vue').default);
Vue.component('stick', require('./components/contents/services/welding/partials/stick.vue').default);

Vue.component('finishes', require('./components/contents/services/finishes/finishes.vue').default);
Vue.component('finish-detail', require('./components/contents/services/finishes/partials/finish-detail.vue').default);

Vue.component('painting', require('./components/contents/services/painting/painting.vue').default);
Vue.component('wet-painting', require('./components/contents/services/painting/partials/wetPainting.vue').default);
Vue.component('paint-detail', require('./components/contents/services/painting/partials/painting-detail.vue').default);

Vue.component('delivery', require('./components/contents/services/delivery/delivery.vue').default);

Vue.component('panel', require('./components/panel/panel.vue').default);
Vue.component('inbox', require('./components/panel/inbox.vue').default);
Vue.component('votes', require('./components/panel/votes.vue').default);

Vue.component('sitio', require('./components/panel/sitio/sitio.vue').default);
Vue.component('slides', require('./components/panel/sitio/slides.vue').default);
Vue.component('mills', require('./components/panel/sitio/mills.vue').default);
Vue.component('projects-panel', require('./components/panel/sitio/projects.vue').default);
Vue.component('painting-panel', require('./components/panel/sitio/painting.vue').default);
Vue.component('finishes-panel', require('./components/panel/sitio/finishes.vue').default);
Vue.component('faqs', require('./components/panel/sitio/faqs.vue').default);
Vue.component('skills', require('./components/panel/sitio/skills.vue').default);
Vue.component('materials', require('./components/panel/sitio/materials.vue').default);
Vue.component('panel-forms', require('./components/panel/sitio/forming.vue').default);

Vue.component('news', require('./components/panel/news/news.vue').default);

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
import 'froala-editor/css/froala_editor.pkgd.min.css';
import 'froala-editor/js/froala_editor.pkgd.min.js';
import 'froala-editor/js/plugins.pkgd.min.js';
 
// Import and use Vue Froala lib.
import VueFroala from 'vue-froala-wysiwyg'
Vue.use(VueFroala)
 
Vue.use(VueAnimate)

const app = new Vue({
    el: '#app',
});
