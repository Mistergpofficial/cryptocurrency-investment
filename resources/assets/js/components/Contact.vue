<template>

    <div class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="bg-color-white inerspace40">
                        <h2>Write us a message</h2>
                        <p>We will give you a feedback ASAP</p>
                        <div class="alert alert-success" v-if="submitted">
                            <button class="close" type="button" data-dismiss="alert" aria-hidden="true">&#215;</button>
                            Your Message has been sent successfully
                        </div>
                        <form @submit.prevent="postContact()" @keydown="clear($event.target.name)">
                            <div class="row">
                                <p class="help is-danger" style="color:red;"></p>
                                <div class="col-md-12 form-group">
                                    <label class=" control-label" for="email">Name</label>
                                    <input id="name" name="name" type="text"  placeholder="" v-model="contactDetails.name" class="form-control input-md" >
                                    <p class="help is-danger" style="color:red;">{{ getContactError('name') }}</p>
                                </div>
                                <div class="col-md-12 form-group">
                                    <label class=" control-label" for="email">E-mail</label>
                                    <input id="email" name="email" type="email"  placeholder="" v-model="contactDetails.email" class="form-control input-md" >
                                    <p class="help is-danger" style="color:red;">{{ getContactError('email') }}</p>
                                </div>
                                <div class="col-md-12 form-group">
                                    <label class=" control-label" for="phone">Phone</label>
                                    <input id="phone" name="phone" type="text"  placeholder="" v-model="contactDetails.phone" class="form-control input-md" >
                                    <p class="help is-danger" style="color:red;">{{ getContactError('phone') }}</p>
                                </div>

                                <div class="col-md-12 form-group">
                                    <label>Subject *</label>
                                    <input type="text" name="subject"class="form-control" v-model="contactDetails.subject">
                                    <span class="help is-danger" style="color:red;">{{ getContactError('subject') }}</span>
                                </div>

                                <div class="col-md-12 form-group">
                                    <label>Message *</label>
                                    <textarea name="message" id="message"  class="form-control" rows="8" v-model="contactDetails.message"></textarea>
                                    <span class="help is-danger" style="color:red;">{{ getContactError('message') }}</span>
                                </div>

                                <div class="form-group">
                                    <button type="submit" name="submit" class="btn btn-primary btn-lg">Submit Message</button>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                <div class="col-md-4">
                    <div class="sidebar"><!-- sidebar -->
                       <!-- <div class="row" >

                            <div class="col-md-12">
                                <div class="testimonial-block bg-color-white inerspace40 btmspace-40" style="background: url('/images/2.jpg');background-size:cover;">
                                    <p class="testimonial-text">“As part of brief interaction, have noticed a very high professionalism on Insight Tax's part! They are very prompt and have managed to keep their word as part of process”</p>
                                    <div class="testimonial-client">
                                        <div class="testimonial-img"> <img src="" class="" alt=""> </div>
                                        <div class="testimonial-meta">
                                            <h3 class="client-name">Julie K. Davisson</h3>
                                            <p class="client-designation">- Scorpio Shop Owner</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>-->

                        <div class="gmap-area">
                            <div class="container">
                                <div class="col-sm-3 text-center">
                            <div class="gmap">
                                <iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=JoomShaper,+Dhaka,+Dhaka+Division,+Bangladesh&amp;aq=0&amp;oq=joomshaper&amp;sll=37.0625,-95.677068&amp;sspn=42.766543,80.332031&amp;ie=UTF8&amp;hq=JoomShaper,&amp;hnear=Dhaka,+Dhaka+Division,+Bangladesh&amp;ll=23.73854,90.385504&amp;spn=0.001515,0.002452&amp;t=m&amp;z=14&amp;iwloc=A&amp;cid=1073661719450182870&amp;output=embed"></iframe>
                            </div>
                        </div>
                            </div>
                        </div>

                    </div>
                    <!-- /.sidebar -->
                </div>
                </div>
            </div>
        </div>


</template>


<script>
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
                this.$http.post(   `${Laravel.appUrl}/contact` , this.contactDetails)
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