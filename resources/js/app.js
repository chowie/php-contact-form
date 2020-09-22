require('./bootstrap');

window.Vue = require('vue');

Vue.component('contact-form', require('./components/ContactForm.vue').default);
Vue.component('success', require('./components/Success.vue').default);

window.VeeValidate = require('vee-validate');
Vue.use(VeeValidate, {
    classes: true,
    classNames: {
        valid: 'is-valid',
        invalid: 'is-invalid',
    },
});

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
window.Event = new Vue();

const app = new Vue({
    el: '#app',
    data: {
        // testing
        submitted: false,
    },

    created() {
        Event.$on('contact-form-submitted', event => {
            this.submitted = event;
        });
    },
});
