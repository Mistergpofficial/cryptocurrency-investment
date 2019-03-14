<template>
    <div>
        <header-up></header-up>
        <left-nav></left-nav>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="min-height: 1748.5px;">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Members Profile
                </h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a :href="`https://itradeoption.com/user/dashboard`"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="breadcrumb-item"><a :href="`https://itradeoption.com/user/profile`">Members</a></li>
                    <li class="breadcrumb-item active">Members Profile</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">

                <div class="row">
                    <div class="col-xl-4 col-lg-5">

                        <div class="alert alert-success" v-if="submit">
                            <button class="close" type="button" data-dismiss="alert" aria-hidden="true">&#215;</button>
                            Profile Picture Uploaded
                        </div>
                        <!-- Profile Image -->
                        <div class="box">
                            <div class="box-body box-profile">
                                <img class="profile-user-img rounded img-fluid mx-auto d-block" :src="`https://itradeoption.com/public/images/find_user.png`"  v-if="authUser.pro_pic == null">
                                <img class="profile-user-img rounded img-fluid mx-auto d-block" :src="`https://itradeoption.com/public/crypto_images/` + authUser.pro_pic" v-else="authUser.pro_pic != null">

                                <h2 class="profile-username text-center mb-0">{{ authUser.full_name }}</h2>

                                <h4 class="text-muted text-center mt-0"><i class="fa fa-envelope-o mr-10"></i>{{ authUser.email }}</h4>

                                <!--<div class="row social-states">
                                    <div class="col-6 text-right"><a href="http://html-templates.multipurposethemes.com/bootstrap-4/admin/unique/02/unique-admin/crypto-dashboard/pages/members/member-profile.html#" class="link"><i class="ion ion-ios-people-outline"></i> 254</a></div>
                                    <div class="col-6 text-left"><a href="http://html-templates.multipurposethemes.com/bootstrap-4/admin/unique/02/unique-admin/crypto-dashboard/pages/members/member-profile.html#" class="link"><i class="ion ion-images"></i> 54</a></div>
                                </div>-->

                                <form enctype="multipart/form-data" @submit.prevent="updateProfilePicture()" @keydown="clear($event.target.name)">
                                    <div class="form-group">
                                        <input type="file" class="form-control" name="image" @change="onFileChange">  <br>
                                        <input type="hidden" name="id" v-model="authUser.id">
                                        <p class="help is-danger" style="color:red;">{{ getError('image') }}</p>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-success btn-quirk btn-block">Upload</button>
                                    </div>
                                </form>

                                <div class="row">
                              <!--      <div class="col-12">
                                        <div class="media-list media-list-hover media-list-divided w-p100 mt-30">
                                            <h4 class="media media-single p-15">
                                                <i class="fa fa-arrow-circle-o-right mr-10"></i><span class="title">My Profile</span>
                                            </h4>
                                            <h4 class="media media-single p-15">
                                                <i class="fa fa-arrow-circle-o-right mr-10"></i><span class="title">Invests</span>
                                            </h4>
                                            <h4 class="media media-single p-15">
                                                <i class="fa fa-arrow-circle-o-right mr-10"></i><span class="title">The Wallet</span>
                                            </h4>
                                            <h4 class="media media-single p-15">
                                                <i class="fa fa-arrow-circle-o-right mr-10"></i><span class="title">Deposit</span>
                                            </h4>
                                            <h4 class="media media-single p-15">
                                                <i class="fa fa-arrow-circle-o-right mr-10"></i><span class="title">Reports</span>
                                            </h4>
                                            <h4 class="media media-single p-15">
                                                <i class="fa fa-arrow-circle-o-right mr-10"></i><span class="title">Services</span>
                                            </h4>
                                            <h4 class="media media-single p-15">
                                                <i class="fa fa-arrow-circle-o-right mr-10"></i><span class="title">Support</span>
                                            </h4>
                                        </div>
                                    </div>-->
                                   <!-- <h2 class="title w-p100 mt-10 mb-0 p-20">Last Transactions</h2>
                                    <div class="col-12">
                                        <div class="media-list media-list-hover w-p100 mt-0">
                                            <h5 class="media media-single py-10 px-0 w-p100 justify-content-between">
                                                <p>
                                                    <i class="fa fa-circle text-red pr-10 font-size-12"></i>Deal number 1548
                                                    <span class="subtitle pl-20 mt-10">by<span class="text-red">Johen Doe</span></span>
                                                </p>
                                                <p class="text-right pull-right"><span class="badge badge-sm badge-danger mb-10">sell</span><br>0.12458921 BTC</p>
                                            </h5>
                                            <h5 class="media media-single py-10 px-0 w-p100 justify-content-between">
                                                <p>
                                                    <i class="fa fa-circle text-success pr-10 font-size-12"></i>Deal number 1548
                                                    <span class="subtitle pl-20 mt-10">by<span class="text-success">Johen Doe</span></span>
                                                </p>
                                                <p class="text-right pull-right"><span class="badge badge-sm badge-success mb-10">sell</span><br>0.12458921 BTC</p>
                                            </h5>
                                            <h5 class="media media-single py-10 px-0 w-p100 justify-content-between">
                                                <p>
                                                    <i class="fa fa-circle text-success pr-10 font-size-12"></i>Deal number 1548
                                                    <span class="subtitle pl-20 mt-10">by<span class="text-success">Johen Doe</span></span>
                                                </p>
                                                <p class="text-right pull-right"><span class="badge badge-sm badge-success mb-10">sell</span><br>0.12458921 BTC</p>
                                            </h5>
                                            <h5 class="media media-single py-10 px-0 w-p100 justify-content-between">
                                                <p>
                                                    <i class="fa fa-circle text-red pr-10 font-size-12"></i>Deal number 1548
                                                    <span class="subtitle pl-20 mt-10">by<span class="text-red">Johen Doe</span></span>
                                                </p>
                                                <p class="text-right pull-right"><span class="badge badge-sm badge-danger mb-10">sell</span><br>0.12458921 BTC</p>
                                            </h5>
                                            <h5 class="media media-single py-10 px-0 w-p100 justify-content-between">
                                                <p>
                                                    <i class="fa fa-circle text-success pr-10 font-size-12"></i>Deal number 1548
                                                    <span class="subtitle pl-20 mt-10">by<span class="text-success">Johen Doe</span></span>
                                                </p>
                                                <p class="text-right pull-right"><span class="badge badge-sm badge-success mb-10">sell</span><br>0.12458921 BTC</p>
                                            </h5>
                                        </div>
                                    </div>-->
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-xl-8 col-lg-7">
                        <form @submit.prevent="updateProfile" @keydown="clear($event.target.name)">
                        <div class="box box-solid bg-black">
                            <div class="box-header with-border">
                                <h3 class="box-title">Personal details</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="alert alert-success" v-if="submitted">
                                            <button class="close" type="button" data-dismiss="alert" aria-hidden="true">&#215;</button>
                                            Profile Update is Successful
                                        </div>
                                       <!-- <form @submit.prevent="updateProfile" @keydown="clear($event.target.name)">-->
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Full Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="full_name" v-model="authUser.full_name">
                                                <p class="help is-danger" style="color:red;">{{ getError('full_name') }}</p>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">UserName</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="username" v-model="authUser.username">
                                                <p class="help is-danger" style="color:red;">{{ getError('username') }}</p>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Email Adress</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" name="email" v-model="authUser.email">
                                                <p class="help is-danger" style="color:red;">{{ getError('email') }}</p>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Phone Number</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="phone" v-model="authUser.phone">
                                                <p class="help is-danger" style="color:red;">{{ getError('phone') }}</p>
                                            </div>
                                        </div>
                                           <!-- <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Bitcoin Wallet</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="btc" v-model="authUser.btc">
                                                    <p class="help is-danger" style="color:red;">{{ getError('btc') }}</p>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Ethereum Wallet</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="eth" v-model="authUser.eth">
                                                    <p class="help is-danger" style="color:red;">{{ getError('eth') }}</p>
                                                </div>
                                            </div>-->
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Country</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="country" v-model="authUser.country">
                                                    <p class="help is-danger" style="color:red;">{{ getError('country') }}</p>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">State</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="state" v-model="authUser.state">
                                                    <p class="help is-danger" style="color:red;">{{ getError('state') }}</p>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">City</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="city" v-model="authUser.city">
                                                    <p class="help is-danger" style="color:red;">{{ getError('city') }}</p>
                                                </div>
                                            </div>

                                            <input type="hidden" name="id" v-model="authUser.id">
                                    <!--    <div class="form-group row">
                                            <label class="col-sm-2 col-form-label"></label>
                                            <div class="col-sm-10">
                                                <button type="submit" class="btn btn-yellow">Update</button>
                                            </div>
                                        </div>-->

                                     <!--   </form>-->
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->

                        <div class="box box-solid bg-black">
                            <div class="box-header with-border">
                                <h3 class="box-title">Wallet Details</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Bitcoin Wallet</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="btc" v-model="authUser.btc">
                                                <p class="help is-danger" style="color:red;">{{ getError('btc') }}</p>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Ethereum Wallet</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="eth" v-model="authUser.eth">
                                                <p class="help is-danger" style="color:red;">{{ getError('eth') }}</p>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label"></label>
                                            <div class="col-sm-10">
                                                <button type="submit" class="btn btn-yellow">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                        </form>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer-up></footer-up>
    </div>
</template>


<script>
    import leftNav from '../components/leftNav.vue'
    import Header from '../components/Header.vue'
    import Footer from '../components/Footer.vue'
    import {updateProfile} from '../utilities/settings'
    import {updateProfilePicture} from '../utilities/settings'
    import {getUser} from '../utilities/settings'

    export default {

        data () {
            return {
                authUser: [],
                submitted: false,
                submit: false,
                errors: {},
                image: '',



            };
        },
        components: {
            'left-nav': leftNav,
            'header-up': Header,
            'footer-up' : Footer
        },


        created() {
            this.getAuthUser();
        },

        methods: {

            getAuthUser(){
                this.$http.get(getUser).then(function (response) {
                    // console.log(this.settings)
                    this.authUser = response.body;
                })
            },

            updateProfile() {
                this.$http.post(updateProfile, this.authUser)
                    .then(function (response) {
                        this.submitted = true;
                        // this.authUser = ""
                    })
                    .catch( (err) => {
                        this.submitted = false;
                        this.errors = err.body.errors || err.body;
                    })
            },
            updateProfilePicture() {
                this.$http.post(updateProfilePicture, {image: this.image})
                    .then(function (response) {
                        this.submit = true;
                        window.location = `${Laravel.appUrl}/user/profile`
                        // this.authUser = ""
                    })
                    .catch( (err) => {
                        this.submit = false;
                        this.errors = err.body.errors || err.body;
                    })
            },
            onFileChange(e) {
                let files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;
                this.createImage(files[0]);
            },
            createImage(file) {
                let reader = new FileReader();
                let vm = this;
                reader.onload = (e) => {
                    vm.image = e.target.result;
                };
                reader.readAsDataURL(file);
            },

            getError(field){

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


<style>

    .categoryName {
        color: #263238;
    }

    .categoryDescription {
        color: #20A8D8;
    }

</style>