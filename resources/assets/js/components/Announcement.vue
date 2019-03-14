<template>
    <div>
        <header-up></header-up>
        <left-nav></left-nav>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="min-height: 1748.5px;">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Announcements
                </h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a :href="`https://itradeoption.com/user/dashboard`"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="breadcrumb-item"><a :href="`https://itradeoption.com/user/create-announcement`">Announcement</a></li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">

                <div class="row">
                    <div class="col-xl-4 col-lg-5">

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
                        <div class="box box-solid bg-black">
                            <div class="box-header with-border">
                                <h3 class="box-title">Add Details</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="alert alert-success" v-if="submitted">
                                            <button class="close" type="button" data-dismiss="alert" aria-hidden="true">&#215;</button>
                                            Announcement created successfully
                                        </div>
                                        <form @submit.prevent="postAnnouncement" @keydown="clear($event.target.name)">    <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Full Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="subject" placeholder="Subject*" v-model="announcementData.subject">
                                                    <p class="help is-danger" style="color:red;">{{ getError('subject') }}</p>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">UserName</label>
                                                <div class="col-sm-10">
                                                    <textarea class="form-control" placeholder="Message*" name="content" v-model="announcementData.content"></textarea>
                                                    <p class="help is-danger" style="color:red;">{{ getError('subject') }}</p>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label"></label>
                                                <div class="col-sm-10">
                                                    <button type="submit" class="btn btn-yellow">Create Announcement</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->

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
    import {getUser} from '../utilities/settings'

    export default {

        data () {
            return {
                authUser: [],
                submitted: false,
                errors: {},
                announcementData: {
                    subject: '',
                    content: ''
                }


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

            postAnnouncement(){
                this.$http.post(  `${Laravel.appUrl}/user/post-create-announcement` , this.announcementData).then(function (response) {
                    this.submitted = true;
                    this.announcementData = "";
                })  .catch( (err) => {
                    this.submitted = false;
                    this.errors = err.body.errors;
                })
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