<template>
    <div class="col-xs-12">
        <form id="contact-form" @submit.prevent="validateBeforeSubmit">

            <div class="form-group text-left" id="contact-name">
                <label for="name">Name</label>
                <input
                       name="name"
                       id="name"
                       class="form-control"
                       v-model="name"
                       v-validate="'required'"
                       type="text" form="contact-form">

                <span v-show="errors.has('name')" class="help text-danger">{{ errors.first('name') }}</span>

            </div>
            <div class="form-group text-left" id="contact-email">
                <label for="email">Email</label>
                <input
                       name="email"
                       id="email"
                       class="form-control"
                       v-model="email"
                       v-validate="'required|email'"
                       type="text" form="contact-form">

                <span v-show="errors.has('email')" class="help text-danger">{{ errors.first('email') }}</span>

            </div>

            <div class="form-group text-left" id="contact-message">
                <label for="name">Message</label>
                <textarea
                       class="form-control"
                       name="message"
                       id="message"
                       autocomplete="on"
                       autocapitalize="sentences"
                       v-model="message"
                       v-validate="'required'"
                       form="contact-form"
                       rows="5"></textarea>

                <span v-show="errors.has('message')" class="help text-danger">{{ errors.first('message') }}</span>

            </div>

            <div class="form-group text-left" id="contact-phone">
                <label for="name">Phone</label>
                <vue-phone-number-input v-model="phone" valid-color="#3c763d" error-color="#a94442"></vue-phone-number-input>
            </div>
            <button type="submit" class="btn btn-default btn-lg">Send message</button>

        </form>
    </div>
</template>


<script>
import VuePhoneNumberInput from 'vue-phone-number-input';
import 'vue-phone-number-input/dist/vue-phone-number-input.css';

Vue.component('vue-phone-number-input', VuePhoneNumberInput);

export default {
    name: 'contact-form',
    data: () => ({
        name: null,
        email: null,
        message: null,
        phone: null,
    }),
    methods: {
        validateBeforeSubmit(evt) {
            this.$validator.validateAll().then((result,evt) => {
                if (result) {
                    this.postData(evt);
                    return;
                }

            });
        },
        postData(evt) {

            axios.post('/messages/store', {
                name: this.name,
                email: this.email,
                message: this.message,
                phone: this.phone,
            })
                .then( data => {
                    Event.$emit('contact-form-submitted', true);
                })
                .catch( errors => {

                    console.log('Do something with the errors.', errors);

                });

        }
    }
};
</script>


