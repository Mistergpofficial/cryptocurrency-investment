<template>
    <div>
        <header class="main-header">
            <!-- Logo -->
            <a href="#" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <b class="logo-mini">
                    <span class="light-logo" style="font-family: AR BLANCA;"><b>iTrade Option</b></span><!--
                    <span class="dark-logo"><img :src="`https://itradeoption.com/images/Capture.png`" alt="logo"></span>-->
                </b>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><!--
		  <img src="" alt="logo" class="light-logo">
	  	  <img src="" alt="logo" class="dark-logo">-->
	  </span>
            </a>
            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">

                        <li class="search-box">
                            <a class="nav-link hidden-sm-down" href="javascript:void(0)"><i class="mdi mdi-magnify"></i></a>
                            <form class="app-search" style="display: none;">
                                <input type="text" class="form-control" placeholder="Search &amp; enter"> <a class="srh-btn"><i class="ti-close"></i></a>
                            </form>
                        </li>

                        <!-- Notifications -->
                        <li class="dropdown notifications-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <i class="icon ion-ios-bell-outline tx-24"></i>
                            </a>
                            <ul class="dropdown-menu scale-up">
                                <li class="header" v-if="notifications.length == 0">You have {{ notifications.length }} notifications</li>
                                <li class="header" v-if="notifications.length != 0">You have {{ notifications.length }} notifications</li>
                                <li>
                                    <Notification v-bind:notifications="notifications"></Notification>
                                </li>
                                <li class="footer"><a href="#">View all</a></li>
                            </ul>
                        </li>


                        <!-- User Account -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <img :src="`https://itradeoption.com/public/images/find_user.png`" class="user-image rounded-circle" v-if="authUser.pro_pic == null">
                                <img :src="`https://itradeoption.com/public/crypto_images/` + authUser.pro_pic" class="user-image rounded-circle" v-if="authUser.pro_pic != null">
                            </a>
                            <ul class="dropdown-menu scale-up">
                                <!-- User image -->
                                <li class="user-header">
                                    <img :src="`https://itradeoption.com/public/images/find_user.png`" class="float-left rounded-circle"  v-if="authUser.pro_pic == null">
                                    <img :src="`https://itradeoption.com/public/crypto_images/` + authUser.pro_pic" class="float-left rounded-circle"  v-if="authUser.pro_pic != null">

                                    <p style="font-size: 15px;">
                                        {{ authUser.full_name }}
                                        <small class="mb-5">{{ authUser.email }}</small>
                                        <a :href="`https://itradeoption.com/user/profile`" class="btn btn-danger btn-sm btn-rounded">View Profile</a>
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <li class="user-body">
                                    <div class="row no-gutters">
                                        <div class="col-12 text-left">
                                            <a :href="`https://itradeoption.com/user/profile`"><i class="fa fa-user"></i> My Profile</a>
                                        </div>
                                        <div role="separator" class="divider col-12"></div>
                                        <div class="col-12 text-left">
                                            <a :href="`https://itradeoption.com/logout`"><i class="fa fa-power-off"></i> Logout</a>
                                        </div>
                                    </div>
                                    <!-- /.row -->
                                </li>
                            </ul>
                        </li>
                        <!-- Control Sidebar Toggle Button -->
                        <li>
                            <a href="#" data-toggle="control-sidebar"><i class="fa fa-cog fa-spin"></i></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
    </div>
</template>

<script>
    import {getUser} from '../utilities/settings'
    import {allNotifications} from '../utilities/settings'
    import {markAsRead} from '../utilities/settings'
    export default {
        data() {
            return {
                authUser: {},
                notifications: {},

            }
        },
        created() {
            this.getUser();
            this.getNotifications();
        },
        methods: {
            getUser() {
                this.$http.get(getUser).then(function (response) {
                    this.authUser = response.body;
                })
                    .catch( (err) => {
                        console.log(err)
                    });
            },
            getNotifications() {
                this.$http.get(allNotifications).then(function (response) {
                    this.notifications = response.body;
                });

            },
            MarkAsRead: function(notification) {
                let data = {
                    id: notification.id
                };
                this.$http.post(markAsRead, data).then(response => {
                    window.location.href = "https://itradeoption.com/user/dashboard/";
                })
            }
        }
    }
</script>