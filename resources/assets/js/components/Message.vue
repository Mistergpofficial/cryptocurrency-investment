<template>
    <div class="box box-primary">
        <div class="center">
            <h2>Drop Your Message</h2>
            <p class="lead">Be sure to get quick feedback as soon as possible.</p>
            <div class="alert alert-success" v-if="submitted">
                <button class="close" type="button" data-dismiss="alert" aria-hidden="true">&#215;</button>
                Your Message has been sent successfully
            </div>
        </div>
        <!-- form start -->
        <form @submit.prevent="postContact" @keydown="clear($event.target.name)">
            <div class="box-body">
                <div class="form-group">
                    <label>Name *</label>
                    <input type="text" name="name" v-model="contactDetails.name" class="form-control">
                    <span class="help is-danger" style="color:red;">{{ getContactError('name') }}</span>
                </div>
                <div class="form-group">
                    <label>Email *</label>
                    <input type="email" name="email" v-model="contactDetails.email" class="form-control">
                    <span class="help is-danger" style="color:red;">{{ getContactError('email') }}</span>
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input type="text" name="phone" v-model="contactDetails.phone" class="form-control">
                    <span class="help is-danger" style="color:red;">{{ getContactError('phone') }}</span>
                </div>
                <br>

                <div class="form-group">
                    <label>Subject *</label>
                    <input type="text" name="subject" v-model="contactDetails.subject" class="form-control">
                    <span class="help is-danger" style="color:red;">{{ getContactError('subject') }}</span>
                </div>

                <div class="form-group">
                    <label>Message *</label>
                    <textarea name="message" id="message" v-model="contactDetails.message"  class="form-control" rows="8"></textarea>
                    <span class="help is-danger" style="color:red;">{{ getContactError('message') }}</span>
                </div>

            </div>
            <!-- /.box-body -->

            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-primary btn-lg">Submit Message</button>
            </div>
        </form>
    </div>




</template>

<script>
    import {postMessage} from '../utilities/settings'
    export default {
        data () {
            return {
                contactDetails: {
                    name: '',
                    email: '',
                    phone: '',
                    subject: '',
                    message: ''
                },
                errors: {},
                submitted: false

            }
        },
        methods: {
            postContact() {
                this.$http.post(postMessage, this.contactDetails)
                    .then(function (response) {
                        this.submitted = true;
                        this.contactDetails = ""
                    })
                    .catch( (err) => {
                        this.errors = err.body.errors;
                    })
            },
            getContactError(field){

                if (this.errors.hasOwnProperty(field) ) {



                    if (typeof this.errors[field] === "object") {

                        return this.errors[field][0];
                    }

                    if ( typeof this.errors[field] === "string" ) {

                        return this.errors[field]

                    }



                }

            },

            clear(field) {
                delete this.errors[field];
            },

            any() {
                return Object.keys(this.errors).length > 0;
            }
        }
    }
</script>