<template>
    <div>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar -->
            <section class="sidebar" style="height: auto;">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="ulogo">
                        <a :href="`https://itradeoption.com/user/dashboard`">
                            <!-- logo for regular state and mobile devices -->
                            <span style="font-family: 'AR BLANCA';"><b>iTrade</b>&nbsp;Option</span>
                        </a>
                    </div>
                    <div class="image">
                        <img :src="`https://itradeoption.com/public/images/find_user.png`" class="rounded-circle" v-if="authUser.pro_pic == null">
                        <img :src="`https://itradeoption.com/public/crypto_images/` + authUser.pro_pic" class="rounded-circle"  v-if="authUser.pro_pic != null">
                    </div>
                    <div class="info">
                        <p>{{ authUser.full_name }}</p>
                        <p>{{ authUser.email }}</p>
                      <!--  <a href="#" class="link" data-toggle="tooltip" title="" data-original-title="Settings"><i class="ion ion-gear-b"></i></a>
                      -->  <a :href="`https://itradeoption.com/user/profile`" class="link" data-toggle="tooltip" title="" data-original-title="Profile"><i class="fa fa-user"></i></a>
                        <a :href="`https://itradeoption.com/logout`" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="fa fa-power-off"></i></a>
                    </div>
                </div>
                <!-- sidebar menu -->
                <span v-if="authUser.role_id == 2">
                <ul class="sidebar-menu tree" data-widget="tree">

                    <li class="nav-devider"></li>
                    <li class="header nav-small-cap">NAVIGATION</li>
                    <li class="active">
                        <a :href="`https://itradeoption.com/user/dashboard`">
                            <i class="icon icon-home"></i> <span>User Dashboard</span>
                            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                        </a>
                    </li>
                    <li>
                        <a :href="`https://itradeoption.com/user/transaction`">
                            <i class="icon-wallet"></i> <span>Transaction</span>
                            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                        </a>
                    </li>
                    <li>
                        <a :href="`https://itradeoption.com/user/deposit`">
                            <i class="icon-envelope-open"></i> <span>Make Deposit</span>
                            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                        </a>
                    </li>
                    <li>
                        <a :href="`https://itradeoption.com/user/withdraw`">
                            <i class="icon-envelope-open"></i> <span>Process Returns</span>
                            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                        </a>
                    </li>
                    <li>
                        <a :href="`https://itradeoption.com/user/profile`">
                            <i class="icon-envelope-open"></i> <span>Profile</span>
                            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                        </a>
                    </li>

                    <li>
                        <a :href="`https://itradeoption.com/user/referrals`">
                            <i class="icon-envelope-open"></i> <span>Referrals</span>
                            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                        </a>
                    </li>
                    <li>
                        <a :href="`https://itradeoption.com/logout`">
                            <i class="icon-envelope-open"></i> <span>Logout</span>
                            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                        </a>
                    </li>
                </ul>
                     </span>

                <span v-if="authUser.role_id == 1">
                    <ul class="sidebar-menu tree" data-widget="tree">
                          <li class="nav-devider"></li>
                    <li class="header nav-small-cap">NAVIGATION</li>
                    <li class="active">
                        <a :href="`https://itradeoption.com/user/dashboard`">
                            <i class="icon-home"></i> <span>Admin Dashboard</span>
                            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                        </a>
                    </li>
                    <li>
                        <a :href="`https://itradeoption.com/user/create-announcement`">
                            <i class="icon-wallet"></i> <span>Announcements</span>
                            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                        </a>
                    </li>
                            <li>
                        <a :href="`https://itradeoption.com/user/withdraw`">
                            <i class="icon-envelope-open"></i> <span>Process Returns</span>
                            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                        </a>
                    </li>
                    <li>
                        <a :href="`https://itradeoption.com/user/transactions`">
                            <i class="icon-envelope-open"></i> <span>View Transactions</span>
                            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                        </a>
                    </li>
                    <li>
                        <a :href="`https://itradeoption.com/user/withdrawals`">
                            <i class="icon-envelope-open"></i> <span>View Withdrawals</span>
                            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                        </a>
                    </li>
                         <li>
                        <a :href="`https://itradeoption.com/user/withdrawals_recycle`">
                            <i class="icon-envelope-open"></i> <span>View Trashed Withdrawals</span>
                            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                        </a>
                    </li>
                    <li>
                        <a :href="`https://itradeoption.com/user/profile`">
                            <i class="icon-envelope-open"></i> <span>Profile</span>
                            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                        </a>
                    </li>

                    <li>
                        <a :href="`https://itradeoption.com/user/manage-users`">
                            <i class="icon-envelope-open"></i> <span>Manage Users</span>
                            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                        </a>
                    </li>
                    <li>
                        <a :href="`https://itradeoption.com/logout`">
                            <i class="icon-envelope-open"></i> <span>Logout</span>
                            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                        </a>
                    </li>
                    </ul>
                </span>
            </section>
        </aside>
    </div>
</template>


<script>
    import {getUser} from '../utilities/settings'
    export default {
        data() {
            return {
                authUser: {},
            }
        },
        created() {
            this.getUser();
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

        }
    }
</script>