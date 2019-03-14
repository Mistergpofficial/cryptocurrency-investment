<template>
    <div>

        <!-- Notifications -->


                    <!-- inner menu: contains the actual data -->
                    <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 200px;"><ul class="menu inner-content-div" style="overflow: hidden; width: auto; height: 200px;">
                        <li v-for="notification in notifications">
                            <p>Someone just registered with your link<br><a href="#" v-on:click="MarkAsRead(notification)">
                                <i class="fa fa-users text-aqua"></i> {{ notification.data.link.address }}
                            </a></p>
                            <span class="tx-12">{{ notification.created_at | formatDate }}</span>
                        </li>
                    </ul><div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px; height: 142.857px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>

    </div>
</template>

<script>
    import {markAsRead} from '../utilities/settings'
    import {getUser} from '../utilities/settings'
    export default {
        props: ['notifications'],
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
            
             MarkAsRead: function(notification) {
                 let data = {
                     id: notification.id
                 };
                 this.$http.post(markAsRead, data).then(response => {
                     window.location.href = "https://itradeoption.com/user/dashboard";
                 })
             }
        }
    }
</script>
